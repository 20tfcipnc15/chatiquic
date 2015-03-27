<?
session_start();
if (!isset($_SESSION['paso_por_donde_yo_quiero']))
{ 
	header ("Location: index.php"); 
	exit; 
} 
$id_user=$_SESSION['id_user'];
$nombre=$_SESSION['nombre_ini']; 
$unidad=$_SESSION['unidad_ini']; 
$id_unidad=$_SESSION['id_unidad']; 

$ip=$_SERVER['REMOTE_ADDR']; 

include("../funciones1.php");
$link = conexion();
include ("../php/fecha_hora.php");
$fecha=fecha_hora();
$todo = $_GET['cad'];
$vector = explode(",",$todo);
$long = count($vector);
if($todo != 'undefined')
{
//INSERTAMOS EN LA TABLA REPORTES, LOS ID SELECCIONADOS PARA IMPRESION
$cad='';
for ($j=0;$j < $long;$j++)
{	
	if($j % 5==0 and $j != 0 )
	{
		$cad = substr ($cad,1,strlen($cad));
		$sql = "INSERT INTO reportes (id_r,rut,fecha_sol,responsable,id_uni,ip) VALUES (NULL,'$cad','$fecha','$nombre','$id_unidad','$ip')";
		$res = mysql_query($sql,$link);
		
		$cad = '';
		$cad = $cad.','.$vector[$j];
	}
	else
	{
		$cad = $cad.','.$vector[$j];
	}
}
if($cad != '')
{	
	$cad = substr ($cad,1,strlen($cad));
	$sql = "INSERT INTO reportes (id_r,rut,fecha_sol,responsable,id_uni,ip) VALUES (NULL,'$cad','$fecha','$nombre','$id_unidad','$ip')";
	$res = mysql_query($sql);
}
}
header ('Location: imprimir_1.php?cad='.$todo);
?>