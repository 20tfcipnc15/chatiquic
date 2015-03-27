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
$ocupacion=$_POST["ocupacion"];
$usuario=$_POST["usuario"];
$contrasenia=$_POST["contrasenia"];
$ci=$_POST["ci"];
$clave=$_POST["clave"];
$unidad=$_POST["unidad"];
$otro=$_POST["otro"];
$rol=$_POST["rol"];

$cargo = $_POST["cargo"];
//**********************************
//Obtenemos el RUT correspondiente a la unidad. 
$consulta = "SELECT id_unidad FROM unidad WHERE nombre like '$unidad'";
$resultado= mysql_query($consulta) or die ("Error de b�squeda en la BD: ". mysql_Error());
$numResultados = mysql_num_rows($resultado);
if ($numResultados>0)
{
	$linea=mysql_fetch_array($resultado);
	$id_unidad = $linea["id_unidad"];

}

$contrasenia = md5($contrasenia);
$sql = "INSERT INTO user (id_user,nombre,id_unidad,usuario,contrasenia,clave,cargo,ci,tipo) VALUES (NULL,'$nombre','$id_unidad','$usuario','$contrasenia','$clave','$ocupacion','$ci','$cargo')";
$result = mysql_query($sql,$link);

$consulta = "SELECT id_user FROM user order by id_user DESC";
$resultado= mysql_query($consulta) or die ("Error de b�squeda en la BD: ". mysql_Error());
$linea=mysql_fetch_array($resultado);
$id_user = $linea["id_user"];

header("Location: show_adi_user1.php?id=$id_user&uni=$unidad");
?>