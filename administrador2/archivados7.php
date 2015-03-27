<?php
session_start();
if (!isset($_SESSION['administrador']))
{ 
	header ("Location: index.php"); 
	exit; 
} 
$id_user=$_SESSION['id_user'];
$nombre=$_SESSION['nombre_ini']; 
$unidad=$_SESSION['unidad_ini']; 
$id_unidad=$_SESSION['id_unidad']; 
include("../funciones1.php");
$link=conexion();

$consulta ="SELECT distinct(rut) FROM correspondencia WHERE comentario like '%Concluido%' order by id_c ASC";
$resultado=mysql_query($consulta) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
$numResultados = mysql_num_rows($resultado);
//echo 'numero de res '.$numResultados.'<br>';
$co=0;
if ($numResultados > 0)
{
	while($fila = mysql_fetch_array($resultado))
	{		
		$rut = $fila["rut"]; 
		//echo '<h1>'.$rut.'-------'.$numResultados.'</h1>';
		$sql = "SELECT * FROM correspondencia WHERE rut like '$rut' order by id_c ASC";
		$res = mysql_query($sql) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
		$num = mysql_num_rows($res);
		if ($num > 0)
		{
			while($linea = mysql_fetch_array($res))
			{	
				$id_c=$linea["id_c"];
				$rut=$linea["rut"];
				$unidad=$linea["unidad"];
				$fecha=$linea["fecha"];
				$correlativo=$linea["correlativo"];
				$hoja_ruta=$linea["hoja_ruta"];
				$tipo=$linea["tipo"];
				$referencias=$linea["referencias"];
				$fojas=$linea["fojas"];
				$responsable=$linea["responsable"];
				$destino=$linea["destino"];
				$comentario=$linea["comentario"];
				$ip=$linea["ip"];

				$matriz[$co][0]=$rut;	
				$matriz[$co][1]=$unidad;	
				$matriz[$co][2]=$fecha;	
				$matriz[$co][3]=$correlativo;	
				$matriz[$co][4]=$hoja_ruta;		
				$matriz[$co][5]=$tipo;			
				$matriz[$co][6]=$referencias;	
				$matriz[$co][7]=$fojas;			
				$matriz[$co][8]=$responsable;	
				$matriz[$co][9]=$destino;
				$matriz[$co][10]=$comentario;		
				$matriz[$co][11]=$ip;	
				
				$sql7 = "SELECT * FROM recibido WHERE id_c = '$id_c'";
				$res7 = mysql_query($sql7) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
				$num7 = mysql_num_rows($res7);
				if($num7 > 0)
				{	$linea7 = mysql_fetch_array($res7);
					$cid_re = $linea7["id_re"];
					$cid_unidad = $linea7["id_unidad"];
					$creg_int = $linea7["reg_int"];
					$cid_c = $linea7["id_c"];
					$crecibido_por = $linea7["recibido_por"];
					$cip = $linea7["ip"];
					$cfecha = $linea7["fecha"];

					$mat_rec[$co][0]=$cid_re;
					$mat_rec[$co][1]=$cid_unidad;
					$mat_rec[$co][2]=$creg_int;
					$mat_rec[$co][3]=$cid_c;
					$mat_rec[$co][4]=$crecibido_por;
					$mat_rec[$co][5]=$cip;
					$mat_rec[$co][6]=$cfecha;
				}
				$co++;
			}
			//echo '<br>';
		}
//**********************************************
$sql = "DELETE FROM correspondencia WHERE rut like '$rut'";
$res = mysql_query($sql) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());

$sql = "DELETE FROM recibido WHERE id_re = '$id_re'";
$res = mysql_query($sql) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
//**********************************************
	}
}
//COPIAMOS LOS DATOS ANTERIORMENTE ALMACENADOS EN LA MATRIZ
include("../funciones2.php");
$link2=conexion2();

//Obtenemos el ultimo ID de los registros
$sql="SELECT id_c FROM correspondencia order by id_c DESC limit 1";
$res = mysql_query($sql);
$linea = mysql_fetch_array($res);
$num = mysql_num_rows($res);
$id = $linea["id_c"]; 
if($num <= 0)
	$id = 0;

for($i=0;$i<$co;$i++)
{
	echo $rut = $matriz[$i][0];
	echo '<br>';
	echo $unidad = $matriz[$i][1];
	echo '<br>';
	echo $fecha = $matriz[$i][2];
	echo '<br>';
	echo $correlativo = $matriz[$i][3];
	echo '<br>';
	echo $hoja_ruta = $matriz[$i][4];
	echo '<br>';
	echo $tipo = $matriz[$i][5];
	echo '<br>';
	echo $referencias = $matriz[$i][6];
	echo '<br>';
	echo $fojas = $matriz[$i][7];
	echo '<br>';
	echo $responsable = $matriz[$i][8];
	echo '<br>';	
	echo $destino = $matriz[$i][9];
	echo '<br>';	
	echo $comentario = $matriz[$i][10];
	echo '<br>';	
	echo $ip = $matriz[$i][11];
	echo '<br>CO '.$co;

	$sql="INSERT INTO correspondencia 	
	(id_c,rut,unidad,fecha,correlativo,hoja_ruta,tipo,referencias,fojas,responsable,destino,comentario,ip) VALUES (NULL,'$rut','$unidad','$fecha','$correlativo','$hoja_ruta','$tipo','$referencias','$fojas','$responsable','$destino','$comentario','$ip')";
	$res = mysql_query($sql);
	
/*	echo'<h1>**************************************************************** </h1>';
	//Insertamos en la tabla recibido
	echo $cid_re = $mat_rec[$i][0];
	echo ' ** ';
	echo $cid_unidad = $mat_rec[$i][1];
	echo ' ** ';
	echo $creg_int = $mat_rec[$i][2];
	echo ' ** ';
	echo $cid_c = $mat_rec[$i][3];
	echo ' ** ';
	echo $cnombre = $mat_rec[$i][4];
	echo ' ** ';
	echo $cip = $mat_rec[$i][5];
	echo ' ** ';
	echo $cfecha = $mat_rec[$i][6];
	echo '<br><br>';*/
	
	$id ++;
	$sql="INSERT INTO recibido(id_re,id_unidad,reg_int,id_c,recibido_por,ip,fecha) VALUES 	
	  (NULL,'$cid_unidad','$creg_int','$id','$cnombre','$cip','$cfecha')";
	$result = mysql_query($sql);
}
echo '<h1>Los trámites concluidos han sido archivados correctamente</h1>';
?>