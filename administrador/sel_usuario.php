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

/*$fecha = $_POST['fecha'];
$fecha_fin = $_POST['fecha_fin'];
$rut = $_POST['rut'];
$unidad = $_POST['unidad_sol'];
$otro = $_POST['otro'];*/
$opcion = $_POST['radiobutton'];

switch ($opcion)
{	 
    case 'adicionar':	header ("Location: adi_user.php");	break;
								
    case 'eliminar':	header ("Location: eli_user.php"); 	break;

    case 'modificar':	header ("Location: mod_user.php");	break;
}
?>