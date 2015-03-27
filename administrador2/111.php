<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
</head>
<body>
<?
include("../funciones1.php");
$link=conexion();

$a=0;
$sql = "SELECT rut,id_r FROM reportes WHERE id_r between 464 and 720 order BY id_r ASC";
$res = mysql_query($sql);
$num = mysql_num_rows($res); 
if ($num > 0) 					
{	
	while($linea = mysql_fetch_array($res))
	{
	 	$a++;
	  echo   $rut = $linea["rut"];
	  echo '<br>';
		$id_r = $linea["id_r"];
		$rut = ",".$rut.",";
		$sql2 = "UPDATE reportes SET rut = '$rut' WHERE id_r like '$id_r'";
		$res2 = mysql_query($sql2);
	}
}
?>
</body>
</html>