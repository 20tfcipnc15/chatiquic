<?
session_start();
if (!isset($_SESSION['paso_por_donde_yo_quiero']))
{ 
	header ("Location: ../index.php"); 
	exit; 
};
include("../../funciones1.php");
$link=conexion();

$id_user=$_SESSION['id_user'];
$nombre=$_SESSION['nombre_ini']; 

$sql = "SELECT cargo FROM user WHERE nombre like '%$nombre%'"; 
$res = mysql_query($sql);
$num = mysql_num_rows($res);
if($num>0)
{
	$linea = mysql_fetch_array($res);
	$cargo = $linea['cargo'];
	
	if($cargo == 'Mensajero' or $cargo == 'Mensajera')
		header("Location: ../recibido_mens.php");
	else
		header("Location: ../recibido_admin.php");
}
?>