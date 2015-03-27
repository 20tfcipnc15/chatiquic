<? 
session_start();
if (!isset($_SESSION['paso_por_donde_yo_quiero']))
{ 
	header ("Location: index.php"); 
	exit; 
} 
$id_user =$_SESSION['id_user'];

session_name("sesiondirh"); 
//session_start(); 
session_unset(); 
session_destroy(); 
/*include("../funciones1.php");
$link=conexion();
$query=mysql_query("UPDATE user SET online='0' WHERE id_user='$id_user'"); */
header ("Location: index.php"); 
?> 