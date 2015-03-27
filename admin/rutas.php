<?php
/*session_start();
if (!isset($_SESSION['paso_por_donde_yo_quiero']))
{ 
	header ("Location: index.php"); 
	exit; 
} 
$id_user=$_SESSION['id_user'];
$nombre=$_SESSION['nombre_ini']; 
$unidad=$_SESSION['unidad_ini']; 
$id_unidad=$_SESSION['id_unidad']; */
function numero_rutas($valor)
{
/*include("../funciones1.php");
$link=conexion();*/

//$valor = $_GET['reg'];
$sub = '**';
$var = strpos($valor,$sub);
$rut1 = substr($valor,0,$var);
$ref = substr($valor,$var+2,strlen($valor));

$sql ="SELECT referencias FROM correspondencia WHERE rut like '$rut1' and id_c ='$ref' ORDER BY id_c ASC";
$res = mysql_query($sql) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
$filas = mysql_num_rows($res);
$vec = mysql_fetch_array($res);
		
$referencias1 = $vec["referencias"];

$i=0;

$sql ="SELECT * FROM correspondencia WHERE rut like '$rut1' and referencias like '$referencias1' ORDER BY id_c ASC";
$res = mysql_query($sql) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
$filas = mysql_num_rows($res);
$vec = mysql_fetch_array($res);

$unidad = $vec["unidad"];
$destino = $vec["destino"];
$id_c1=$vec["id_c"];
$rut=$vec["rut"]; 
$hoja_ruta=$vec["hoja_ruta"];
$correlativo=$vec["correlativo"];
$responsable=$vec["responsable"];
$fecha1=$vec["fecha"];
$tipo=$vec["tipo"];
$referencias=$vec["referencias"];
$fojas=$vec["fojas"];

//almacenamos la fecha inicial
$fecha_inicial = $fecha1;

$y=0;

$filas = mysql_num_rows($res);
if($filas > 0)
{
		$bbb = $id_c1;
		$ru = 0;
		while($vec = mysql_fetch_array($res))
		{	
			$id_c=$vec["id_c"];
			$rut=$vec["rut"]; 
			$fecha=$vec["fecha"];
			$unidad=$vec["unidad"];
			$destino=$vec["destino"];
		
			$aaa = $id_c;
			
			$sql2 = "SELECT fecha FROM recibido WHERE id_c = '$bbb' order by id_re desc limit 1";
		    $res2 = mysql_query($sql2) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
			$vec2 = mysql_fetch_array($res2);
			$fecha_ingreso = $vec2["fecha"];	
			if ($fecha_ingreso == 0)	
				$fecha_ingreso = $fecha;

			$bbb = $aaa;
			$i++;
			//Reporte por unidades
			if ($i >1)
			{
				$unidad_ru = $rep_uni[$ru-3];
				if($unidad_ru == $unidad)
				{
					$rep_uni[$ru-1] = $fecha;
				}
				else
				{
					$rep_uni[$ru] = $unidad;
					$rep_uni[$ru+1] = $fecha_ingreso;
					$rep_uni[$ru+2] = $fecha;
					$ru = $ru+3;
				}
			}
			else
			{
				$rep_uni[$ru] = $unidad;
				$rep_uni[$ru+1] = $fecha_ingreso;
				$rep_uni[$ru+2] = $fecha;
				$ru = $ru+3;
			}
		}
}
$ru=$ru/3;
return ($ru);
}
?>