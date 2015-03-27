<?php
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
$nombre=$_SESSION['nombre_ini']; 
$unidad=$_SESSION['unidad_ini']; 
$id_unidad=$_SESSION['id_unidad']; 
include("../funciones1.php");
$link=conexion();

$consulta ="SELECT distinct(rut) FROM correspondencia WHERE comentario like '%Concluido%'";
$resultado=mysql_query($consulta) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
$numResultados = mysql_num_rows($resultado);
//echo 'numero de res '.$numResultados.'<br>';
$co=0;
if ($numResultados > 0)
{
	while($fila = mysql_fetch_array($resultado))
	{		
		$rut = $fila["rut"]; 
		echo '<h1>'.$rut.'</h1>';
		$sql = "SELECT * FROM correspondencia WHERE rut like '$rut'";
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
				$co++;
			}
			echo '<br>';
		}
//**********************************************
$sql = "DELETE FROM correspondencia WHERE rut like '$rut'";
$res = mysql_query($sql) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
//**********************************************
	}
}
//COPIAMOS LOS DATOS ANTERIORMENTE ALMACENADOS EN LA MATRIZ
include("../funciones2.php");
$link2=conexion2();

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
}
?>