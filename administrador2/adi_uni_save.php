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

$nombre=$_POST["nombre"];
$direccion=$_POST["direccion"];
$telefono=$_POST["telefono"];
$codigo=$_POST["codigo"];
$sigla=$_POST["sigla"];
$responsable=$_POST["responsable"];
$e_mail=$_POST["e_mail"];

//**********************************
$contrasenia = md5($contrasenia);
$sql = "INSERT INTO unidad (id_unidad,cod_uni,nombre,sigla,responsable,direccion,e_mail,telefono) VALUES (NULL,'$codigo','$nombre','$sigla','$responsable','$direccion','$e_mail','$telefono')";
$result = mysql_query($sql,$link);

$consulta = "SELECT id_unidad FROM unidad order by id_unidad DESC";
$resultado= mysql_query($consulta) or die ("Error de b�squeda en la BD: ". mysql_Error());
$linea=mysql_fetch_array($resultado);
$id_unidad = $linea["id_unidad"];

header("Location: show_adi_uni.php?id=$id_unidad");
?>