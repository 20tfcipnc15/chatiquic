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
	echo "Las variables de sesi�n han sido eliminadas, y la sesi�n se ha dado por finalizada 	
	correctamente ;-)"; 
} */
?>
<?
/*//iniciamos la sesi�n 
//session_name("loginUsuario"); 
session_start(); 

//antes de hacer los c�lculos, compruebo que el usuario est� logueado 
//utilizamos el mismo script que antes 
//if ($_SESSION["autentificado"] != "SI")
if (!isset($_SESSION['paso_por_donde_yo_quiero']))
{ 
    //si no est� logueado lo env�o a la p�gina de autentificaci�n 
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
     //si pasaron 10 minutos o m�s 
      session_destroy(); // destruyo la sesi�n 
      header("Location: index.php"); //env�o al usuario a la pag. de autenticaci�n 
      //sino, actualizo la fecha de la sesi�n 
     }
	else
	 { 
    	$_SESSION["ultimoAcceso"] = $ahora; 
     } 
} */
?>