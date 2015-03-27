<?
session_start();
if (!isset($_SESSION['paso_por_donde_yo_quiero']))
{ 
	header ("Location: index.php"); 
	exit; 
} 
//$id_user=$_SESSION['id_user'];
$nombre=$_SESSION['nombre_ini']; 
$unidad1=$_SESSION['unidad_ini']; 
$id_unidad=$_SESSION['id_unidad']; 

include("../funciones1.php");
include("../php/fecha_hora.php");
$link=conexion();
$fecha=fecha_hora();

$ip=$_SERVER['REMOTE_ADDR']; 
$id_c = $_POST['id_c'];
$estado = $_POST['estado'];
$recibido = $_POST['recibido'];
if($recibido != null)
{
	$sql="INSERT INTO recibido(id_re,id_unidad,reg_int,id_c,recibido_por,ip,fecha) VALUES 	
		  (NULL,'$id_unidad','0','$id_c','$nombre','$ip','$fecha')";
	$result = mysql_query($sql,$link);
}
header ("location: recibido_admin.php");
?>