<? 
session_start();
if (!isset($_SESSION['super usuario']))
{ 
	header ("Location: index.php"); 
	exit; 
} 
$id_user =$_SESSION['id_user'];

session_name("sesiondirh"); 
//session_start(); 
//session_unset(); 
session_destroy(); 
include("../funciones1.php");
$link=conexion();
$query=mysql_query("UPDATE user SET online='0' WHERE id_user='$id_user'"); 
header ("Location: index.php"); 
?> 
<?
/*session_start(); 
if (!isset($_SESSION['paso_por_donde_yo_quiero']))
{ 
	header ("Location: index.php"); 
	exit; 
} 
else
{ 
session_name("sesiondirh"); 
session_start(); 

	session_unset(); 
	session_destroy(); 
	echo "Las variables de sesión han sido eliminadas, y la sesión se ha dado por finalizada 	
	correctamente ;-)"; 
} */
?>
<?
/*//iniciamos la sesión 
//session_name("loginUsuario"); 
session_start(); 

//antes de hacer los cálculos, compruebo que el usuario está logueado 
//utilizamos el mismo script que antes 
//if ($_SESSION["autentificado"] != "SI")
if (!isset($_SESSION['paso_por_donde_yo_quiero']))
{ 
    //si no está logueado lo envío a la página de autentificación 
    header("Location: index.php"); 
}
else
{ 
    //sino, calculamos el tiempo transcurrido 
//	$_SESSION["ultimoAcceso"] = date("Y-n-j H:i:s"); 
    $fechaGuardada = $_SESSION["ultimoAcceso"]; 
    $ahora = date("Y-n-j H:i:s"); 
    $tiempo_transcurrido = (strtotime($ahora)-strtotime($fechaGuardada)); 

    //comparamos el tiempo transcurrido 
     if($tiempo_transcurrido >= 600)
	 { 
     //si pasaron 10 minutos o más 
      session_destroy(); // destruyo la sesión 
      header("Location: index.php"); //envío al usuario a la pag. de autenticación 
      //sino, actualizo la fecha de la sesión 
     }
	else
	 { 
    	$_SESSION["ultimoAcceso"] = $ahora; 
     } 
} */
?>