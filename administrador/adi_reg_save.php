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

include("../funciones1.php");
$link = conexion();

$paises = $_POST["paises"];
$estados = $_POST["estados"];
$fecha = $_POST["fecha"];
$usuario = $_POST["usuario"];
$responsable=$_POST["responsable"];
$correlativo=$_POST["correlativo"];
$hoja_ruta=$_POST["hoja_ruta"];
$tipo=$_POST["tipo"];
$referencias=$_POST["referencias"];
$destino=$_POST["destino"];
$otro_des=$_POST["otro_des"];
$comentario=$_POST["comentario"];
$fojas=$_POST["fojas"];
$ip=$_POST["ip"];
$estado=$_POST["estado"];
$instruccion=$_POST["instruccion"];

//Almacenamos en mayusculas los valores de  RUT y FECHA
//$rut = strtoupper($rut);
$fecha = strtoupper($fecha);
/*
if($num == null)
{
//Obtenemos el RUT correspondiente a la unidad.
$consulta = "SELECT rut FROM rut WHERE id_unidad = '$id_unidad' order by id_rut DESC limit 1";
$resultado= mysql_query($consulta) or die ("Error de búsqueda en la BD: ". mysql_error());
$numResultados = mysql_num_rows($resultado);
if ($numResultados>0)
{
	$linea=mysql_fetch_array($resultado);
	$rut = $linea["rut"];	

	//Obtenemos la parte numérica, para incrementar su valor como nuevo Trámite
	$B = '-';
	
	$pos= strrpos($rut,$B);

	$num= substr($rut,0, $pos);
	$num++;
}
else
	$num=1;
*/	
/*	
//Obtenemos la sigla de la unidad correspondiente
$sql ="SELECT sigla FROM unidad WHERE id_unidad = '$id_unidad'";
$res=mysql_query($sql) or die ("Error de búsqueda en la BD: ". mysql_Error());
$vec=mysql_fetch_array($res);
$sigla = $vec["sigla"];	

//Concatenamos, para generar el RUT
$rut = $num.'-'.$sigla;
}*/
/*
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
//Insertamos el nuevo registro en la tabla correspondencia*/
/*if($otro != "")
    $unidad = $otro;*/

if($otro_des != "")
    $destino = $otro_des;
	
$consulta = "SELECT nombre FROM user WHERE id_user = $usuario";
$resultado= mysql_query($consulta) or die ("Error de b�squeda en la BD: ". mysql_error());
$linea=mysql_fetch_array($resultado);
$responsable = $linea["nombre"];

$consulta = "SELECT nombre FROM unidad WHERE id_unidad = $paises";
$resultado= mysql_query($consulta) or die ("Error de b�squeda en la BD: ". mysql_error());
$linea=mysql_fetch_array($resultado);
$unidad = $linea["nombre"];

$consulta = "SELECT rut FROM rut WHERE id_rut = $estados";
$resultado= mysql_query($consulta) or die ("Error de b�squeda en la BD: ". mysql_error());
$linea=mysql_fetch_array($resultado);
$rut = $linea["rut"];

$sql = "INSERT INTO correspondencia (id_c,rut,unidad,fecha,correlativo,hoja_ruta,tipo,referencias,fojas,responsable,destino,comentario,ip,estado,sw) VALUES ('$id_c','$rut','$unidad','$fecha','$correlativo','$hoja_ruta','$tipo','$referencias','$fojas','$responsable','$destino','$comentario','$ip','$instruccion','$estado')";
$result = mysql_query($sql,$link);

$consulta = "SELECT id_c FROM correspondencia order by id_c DESC";
$resultado= mysql_query($consulta) or die ("Error de b�squeda en la BD: ". mysql_error());
$linea=mysql_fetch_array($resultado);
$id_c = $linea["id_c"];

header("Location: show_adi_reg.php?id=$id_c");
?>