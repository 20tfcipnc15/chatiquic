<?
session_start();
if (!isset($_SESSION['paso_por_donde_yo_quiero']))
{ 
	header ("Location: index.php"); 
	exit; 
} 
//$id_user=$_SESSION['id_user'];
$nombre=$_SESSION['nombre_ini']; 
$unidad1=$_SESSION['unidad_ini']; 
$id_unidad=$_SESSION['id_unidad']; 
$cargo=$_SESSION['cargo']; 

include("../funciones1.php");
include("../php/fecha_hora.php");
$link=conexion();
$fecha=fecha_hora();

$ip=$_SERVER['REMOTE_ADDR']; 
$id_c= $_POST['id_c'];
$admin = $_POST['admin'];
$unidad = $_POST['unidad'];
$rut = $_POST['rut'];
$correlativo = $_POST['correlativo'];
$hoja_ruta = $_POST['hoja_ruta'];
$tipo = $_POST['tipo'];
$referencias = $_POST['referencias'];
$fojas= $_POST['fojas'];
$recibido= $_POST['recibido'];
$comentario = $_POST['comentario'];
$otro = $_POST['otro'];
$estado = $_POST['estado'];
//******
$archivar = $_POST['archivar'];

if($archivar != null)
{	$comentario = $comentario.' Tramite Archivado';
	$estado = 'Concluido';
}	
//******
$correlativo_des = $_POST['correlativo_des'];
$hoja_ruta_des= $_POST['hoja_ruta_des'];

if ($correlativo_des!= null)
	$correlativo=$correlativo_des;
if ($hoja_ruta_des != null)
	$hoja_ruta = $hoja_ruta_des;
if($admin!=null)
	$destino = $admin;
if($unidad!=null)
	$destino = $unidad;
if($unidad == null && $admin == null)
	$destino = $otro;

//Verificamos si el trámite ha concluído
if($estado=='Concluido')
{
	$comentario = $estado.': '.$comentario;
}
$sql="INSERT INTO correspondencia (id_c,rut,unidad,fecha,correlativo,hoja_ruta,tipo,referencias,fojas,responsable,destino,comentario,ip) VALUES (NULL,'$rut','$unidad1','$fecha','$correlativo','$hoja_ruta','$tipo','$referencias','$fojas','$nombre','$destino','$comentario','$ip')";
$result = mysql_query($sql,$link);

//Obtenemos id_c de correspondencia, para insertarlo en recibido
	$consulta ="SELECT id_c FROM correspondencia order by id_c DESC limit 1";
	$resultado=mysql_query($consulta) or die ("Error de búsqueda en la BD: ". mysql_Error());
	$numResultados = mysql_num_rows($resultado);
	$linea=mysql_fetch_array($resultado);
	$id_c=$linea["id_c"];
	
//Insertamos en la tabla recibido, habienod obtenido los datos necesarios
	$sql="INSERT INTO recibido(id_re,id_unidad,reg_int,id_c,recibido_por,ip,fecha) VALUES 	
		  (NULL,'$id_unidad','0','$id_c','$nombre','$ip','$fecha')";
	$result = mysql_query($sql,$link);

//header ("location: muestra_despacho.php?id=".$id_c);
if($cargo=='Mensajero' || $cargo=='Mensajera')
	header ("location: recibido_mens.php");
else
	header ("location: recibido_admin.php");?>