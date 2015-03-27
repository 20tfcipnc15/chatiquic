<?php
session_start();
if (!isset($_SESSION['administrador']))
{ 
	header ("Location: index.php"); 
	exit; 
} 
$id_unidad_ini = $_SESSION['id_unidad']; 
$id_user_ini = $_SESSION['id_user'];
$nom = $_SESSION['nombre_ini']; 
$uni = $_SESSION['unidad_ini']; 

include("../php/fecha_hora.php");
$fecha = fecha_hora();

$opcion = $_POST['radiobutton'];

$sigla = $_POST['sigla'];
$codigo = $_POST['codigo'];
$nombre1 = $_POST['nombre'];
$e_mail = $_POST['e_mail'];   
$telefono = $_POST['telefono'];
$direccion = $_POST['direccion'];
$responsable = $_POST['responsable'];

switch ($opcion)
{	 
	case 'adicionar':	header ("Location:uni.php?var=$sigla&var1=$codigo&var2=$nombre1&var3=$e_mail&var4=$telefono&var5=$direccion&var6=$responsable");	break; 
								
	case 'modificar':	header ("Location: mod_eli_unidad.php?var=$sigla&var1=$codigo&var2=$nombre1&var3=$e_mail&var4=$telefono&var5=$direccion&var6=$responsable"); 	break; 
}
?>