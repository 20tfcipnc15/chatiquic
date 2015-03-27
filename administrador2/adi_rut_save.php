<?
session_start();
if (!isset($_SESSION['administrador']))
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
$link = conexion();

$id_rut = $_POST["id_rut"];
$rut = $_POST["rut"];
$id_uni = $_POST["id_uni"];

$cargo = $_POST["cargo"];

$sql = "INSERT INTO rut (id_rut,rut,id_unidad) VALUES (NULL,'$id_rut','$id_unidad')";
$result = mysql_query($sql,$link);

$consulta = "SELECT id_rut FROM rut order by id_rut DESC";
$resultado= mysql_query($consulta) or die ("Error de b�squeda en la BD: ". mysql_Error());
$linea=mysql_fetch_array($resultado);
$id_rut = $linea["id_rut"];

header("Location: show_adi_rut.php?id=$id_rut");
//header("Location: dmostrar_xx.php?id_c=$id_c&long=$long");
?>