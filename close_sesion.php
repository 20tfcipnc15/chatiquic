<? 
session_start();
if (!isset($_SESSION['habilitado']))
{ 
	header ("Location: index.php"); 
	exit; 
} 
session_destroy(); 
header("location: index.php");
?> 
