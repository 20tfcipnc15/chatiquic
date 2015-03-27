<?
session_start();
if (!isset($_SESSION['paso_por_donde_yo_quiero']))
{ 
	header ("Location: index.php"); 
	exit; 
} 
$id_user=$_SESSION['id_user'];
$nombre=$_SESSION['nombre_ini']; 
$unidad=$_SESSION['unidad_ini']; 
$id_unidad=$_SESSION['id_unidad']; 
$ip=$_SERVER['REMOTE_ADDR']; 
include("../funciones1.php");
$link=conexion();

//Capturamos todos los valores enviados desde el script Registrar
$tipo = $_POST['tipo'];
$procedencia = $_POST['procedencia'];
$otro = $_POST['otro'];
$correlativo = $_POST['correlativo'];
$hoja_ruta= $_POST['hoja_ruta'];
$referencias= $_POST['referencias'];
$fojas = $_POST['fojas'];
$destino= $_POST['destino'];
$id_c= $_POST['id_c'];
if($procedencia==null)
{	$procedencia=$otro;
	$sw=1;
}

//Modificamos el campo que asi lo requiera
if($tipo!=null)
{ 
	$consulta ="UPDATE correspondencia SET fecha_hora = '$fecha' WHERE id_rec = '$registro'";
	$resultado=mysql_query($consulta) or die ("Error de búsqueda en la BD: ". mysql_Error());
}
if($recibido_por!=null)
{
	$consulta ="UPDATE recibida SET recibido_por = '$recibido_por' WHERE id_rec = '$registro'";
	$resultado=mysql_query($consulta) or die ("Error de búsqueda en la BD: ". mysql_Error());
}
if($procedencia!=null)
{
	$consulta ="UPDATE recibida SET procedencia = '$procedencia' WHERE id_rec = '$registro'";
	$resultado=mysql_query($consulta) or die ("Error de búsqueda en la BD: ". mysql_Error());
}
if($reg_externo!=null)
{
	$consulta ="UPDATE recibida SET reg_externo = '$reg_externo' WHERE id_rec = '$registro'";
	$resultado=mysql_query($consulta) or die ("Error de búsqueda en la BD: ". mysql_Error());
}
if($hoja_ruta!=null)
{
	$consulta ="UPDATE recibida SET hoja_ruta = '$hoja_ruta' WHERE id_rec = '$registro'";
	$resultado=mysql_query($consulta) or die ("Error de búsqueda en la BD: ". mysql_Error());
}
if($referencias!=null)
{
	$consulta ="UPDATE recibida SET referencias = '$referencias' WHERE id_rec = '$registro'";
	$resultado=mysql_query($consulta) or die ("Error de búsqueda en la BD: ". mysql_Error());
}
if($tipo!=null)
{
	$consulta ="UPDATE recibida SET tipo = '$tipo' WHERE id_rec = '$registro'";
	$resultado=mysql_query($consulta) or die ("Error de búsqueda en la BD: ". mysql_Error());
}
if($fojas!=null)
{
	$consulta ="UPDATE recibida SET fojas = '$fojas' WHERE id_rec = '$registro'";
	$resultado=mysql_query($consulta) or die ("Error de búsqueda en la BD: ". mysql_Error());
}

else
	header("Location: registro_mostrar.php?id_c=".$id_c); 
?>