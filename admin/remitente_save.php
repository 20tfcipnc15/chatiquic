<?
session_start();
if (!isset($_SESSION['paso_por_donde_yo_quiero']))
{ 
	header ("Location: index.php"); 
	exit; 
} 

$id_c1 = $_POST['id_c'];

   include("../funciones1.php");
   $link=conexion();
if(isset($_POST['enviar_rem'])!=0)
{  $nombre = $_POST['nombre'];
   $paterno = $_POST['paterno'];
   $materno = $_POST['materno'];
   $ci = $_POST['ci'];   
   $e_mail = $_POST['e_mail'];
   $fono = $_POST['fono'];
	if($ci==null)
	{
		mt_srand (time());
		$ci = mt_rand(0,10000000); 
	}
	$nombre1=$nombre." ".$paterno." ".$materno;
	$nombre1=strtoupper($nombre1);
//	$nombre1=espacios($nombre1);
	$sql="INSERT INTO unidad(id_unidad,cod_uni,nombre,sigla,responsable,direccion,e_mail,telefono) VALUES  	
	(NULL,'$ci','$nombre1','0','0','0','$e_mail','$fono')";
	$result = mysql_query($sql) or die("fallo".mysql_Error());

	//Modificamos el campo responsable de la tabla correspondecnia
	$sql="SELECT id_c FROM correspondencia order by id_c DESC limit 2";
	$result = mysql_query($sql) or die("fallo".mysql_Error());
	while ($linea=mysql_fetch_array($result))
		$id_c = $linea["id_c"];	
	
	$sql="UPDATE correspondencia SET unidad ='$nombre1' WHERE id_c = $id_c";
	$result = mysql_query($sql) or die("fallo".mysql_Error());
    header("Location: remitente.php?id=".$id_c1);	
}
else
	echo '<h1><center>No se ha enviado nada</center></h1>';
?>