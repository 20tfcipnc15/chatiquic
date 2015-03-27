<?
//vemos si el usuario y contraseña son válidos
if ($_POST["usuario"]=="usuario" && $_POST["contrasena"]=="123"){
//usuario y contraseña válidos
//se define una sesion y se guarda el dato session_start();
$_SESSION["autenticado"]= "SI";
header ("Location: aplicacion.php");
}else {
//si no existe se va a login.php
header("Location: login.php?errorusuario=si");
}
?>

