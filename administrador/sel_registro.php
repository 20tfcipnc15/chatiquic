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

$opcion = $_POST['radiobutton'];

switch ($opcion)
{	 
    case 'adicionar':	header ("Location: adi_registro.php");	break;
								
    case 'eliminar':	header ("Location: eli_registro.php"); 	break;

    case 'modificar':	header ("Location: mod_registro.php");	break;
}
?>