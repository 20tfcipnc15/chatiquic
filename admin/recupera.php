<?
session_start();
	//Codigo tiempo de sesion 
	$fechaGuardada = $_SESSION['ultimoAcceso'];
	$ahora = date("Y-n-j H:i:s");
	$tiempo_transcurrido = (strtotime($ahora) - strtotime($fechaGuardada));

	if($tiempo_transcurrido >= 600){
		//si pasaronn 5 min o mas
		session_name("sesiondirh"); 
		session_unset(); 
		session_destroy(); 
		header ("Location: index.php"); 
	}
	else{
		$_SESSION['ultimoAcceso'] = $ahora;
	}

	if (!isset($_SESSION['paso_por_donde_yo_quiero']))
	{ 
		header ("Location: index.php"); 
		exit; 
	}
$id_user=$_SESSION['id_user'];
$nombre_ini=$_SESSION['nombre_ini']; 
$unidad=$_SESSION['unidad_ini']; 
$id_unidad = $_SESSION['id_unidad']; 
$ip=$_SERVER['REMOTE_ADDR']; 
include("../funciones1.php");
include ("../php/fecha_hora.php");
$fecha=fecha_hora(); 
$link=conexion();

//OBTENEMOS LA CADENA DE RUT A RECUPERAR
$rut = $_POST['rut'];
$ges = $_POST['ges'];

//Vaciams la cadena anterior en un vectr
$vector = explode(",",$rut);
$long = count ($vector);

//Identificamos a los usuarios de la misma unidad
//Obtenemos los id_user de usuarios, para considerar solo los despachos internos y no así los externos
$sql = "SELECT nombre FROM user WHERE id_unidad = '$id_unidad'";
$resp = mysql_query($sql);
$filas = mysql_num_rows($resp);
if($filas!=0)
{ 	
	$a=0;
    while($linea1=mysql_fetch_array($resp))
	{  	
		$nombre = $linea1['nombre'];
		$vec[$a]= $nombre;
		$a++;
	}
}
$cad='';
for ($b=0; $b < $a; $b++)
{	
	$nom = $vec[$b];
	$cad = $cad." or destino like '".$nom."'";
}
$cont = strlen($cad);
$cad = substr($cad,4,$cont);

//Buscamos si el RUT existe y actualizamos la Base de Datos
for ($i=0; $i<=$long ; $i++)
{
	$rut = $vector[$i];
	//para las gestiones
	$sql1 = "SELECT * FROM correspondencia WHERE rut like '$rut' GROUP BY referencias";
	//$sql1 = "SELECT * FROM correspondencia WHERE rut like '$rut' and (".$cad.") GROUP BY referencias";
	$res1 = mysql_query($sql1) or die ("Error de búsqueda en la BD: ". mysql_Error());
	$num1 = mysql_num_rows($res1);
	
	if ($num1 > 0)
	{
		while($linea1 = mysql_fetch_array($res1))
		{
			$refe = $linea1["referencias"];
		    
			//buscamos el inicio de esa referencia para la gestion
			$sql2 = "SELECT * FROM correspondencia WHERE rut like '$rut' and referencias = '$refe' ORDER BY id_c ASC limit 1";
			$res2 = mysql_query($sql2) or die ("Error de búsqueda en la BD: ". mysql_Error());
			$num2 = mysql_num_rows($res2);
			
			//PARA EL ULTIMO REGISTRO DELA MISMA REFERENCIA SI ESTA DENTRO DE LA UNIDAD EL DESTINO
			$sql3 = "SELECT * FROM correspondencia WHERE rut like '$rut' and referencias = '$refe' and (".$cad.") ORDER BY id_c DESC limit 1";
			$res3 = mysql_query($sql3) or die ("Error de búsqueda en la BD: ". mysql_Error());
			$num3 = mysql_num_rows($res3);
			
			//$linea3 = mysql_fetch_array($res3);
			if ($num3 > 0)
			{
			if ($num2 > 0)
			{
				while($linea2 = mysql_fetch_array($res2))
				{
						$id_c2 = $linea2["id_c"];
						$fech_in = $linea2["fecha"];
						
						$sub2 = substr($fech_in, 7, 4);
						
						if($ges == $sub2)
						{
							$rut = $vector[$i];
							$sql = "SELECT * FROM correspondencia WHERE rut like '$rut' and referencias = '$refe' order by id_c DESC limit 1";
							$res = mysql_query($sql) or die ("Error de búsqueda en la BD: ". mysql_Error());
							$num = mysql_num_rows($res);
							if ($num > 0)
							{
								while($linea=mysql_fetch_array($res))
								{	
									$rut = $linea["rut"];	
									$destino = $linea["destino"];
									$correlativo = $linea["correlativo"];
									$hoja_ruta = $linea["hoja_ruta"];	
									$tipo = $linea["tipo"];
									$referencias = $linea["referencias"];	
									$fojas = $linea["fojas"];
									$estado = $linea["estado"];
									$documento = $linea["documento"];
									$id_c1 = $linea["id_c"];
									
									if ($destino != $nombre_ini)	
									{
										//Insertamos el nuevo registro en la tabla correspondencia

										$consulta ="UPDATE correspondencia SET sw = 0 WHERE id_c = '$id_c1'";
										$resultado=mysql_query($consulta) or die ("Error de búsqueda en la BD: ". mysql_Error());
										
										$sql2="INSERT INTO correspondencia 	
										(id_c,rut,unidad,fecha,correlativo,hoja_ruta,tipo,referencias,fojas,responsable,destino,comentario,ip,estado,sw,documento,id_tc) VALUES 	
									(NULL,'$rut','$unidad','$fecha','$correlativo','$hoja_ruta','$tipo','$referencias','$fojas','$nombre_ini','$nombre_ini','Recuperado','$ip','$estado','1','$documento','')";
										$res2 = mysql_query($sql2,$link);
									
										$sql2 = "SELECT id_c FROM correspondencia order by id_c DESC limit 1";
										$res2 = mysql_query($sql2,$link);
										$linea2 = mysql_fetch_array($res2);
										$id_c = $linea2["id_c"]; 
							
										$sql = "INSERT INTO recibido(id_re,id_unidad,reg_int,id_c,recibido_por,ip,fecha) VALUES 
										(NULL,'$id_unidad','$id_c','$id_c','$nombre_ini','$ip','$fecha')";
										$result = mysql_query($sql,$link);
									}
								}
							}
							
						}
					}
				}
			}
		}
	}
}
header ("location: recibido_mens.php");
?>