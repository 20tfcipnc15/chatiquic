<?
session_start();
	//Codigo tiempo de sesion 
	$fechaGuardada = $_SESSION['ultimoAcceso'];
	$ahora = date("Y-n-j H:i:s");
	$tiempo_transcurrido = (strtotime($ahora) - strtotime($fechaGuardada));

	if($tiempo_transcurrido >= 600){
		//si pasaronn 5 min o mas
		session_name("sesiondirh"); 
		session_unset(); 
		session_destroy(); 
		header ("Location: index.php"); 
	}
	else{
		$_SESSION['ultimoAcceso'] = $ahora;
	}

	if (!isset($_SESSION['paso_por_donde_yo_quiero']))
	{ 
		header ("Location: index.php"); 
		exit; 
	}
$id_user=$_SESSION['id_user'];
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
//effffff
$nevenka=$id_c;

$archivar = $_POST['archivar'];
$pendiente = $_POST['pendiente'];

$mens = $_POST['mens'];
$correlativo_des = $_POST['correlativo_des'];
$hoja_ruta_des= $_POST['hoja_ruta_des'];
$fojas_des = $_POST['fojas_des'];// local
$estado_des = $_POST['estado_des'];

if($correlativo_des!= null)
	$correlativo=$correlativo_des;
if($hoja_ruta_des != null)
	$hoja_ruta = $hoja_ruta_des;
if($admin!=null)
	$destino = $admin;
if($unidad!=null)
	$destino = $unidad;
if($unidad == null && $admin == null)
	$destino = $otro;

if($estado_des != null)
{
	$estado = $estado_des;
}
if($fojas_des != null)
	$fojas = $fojas_des;

if($mens != null)
    $comentario = 'S/M '.$comentario;


if($archivar != null)
{	
	$estado_1 = 'Concluido: ';
	$comentario = $estado_1.$comentario.' Tramite Archivado';
	if($destino == '')
		$destino = 'Archivo';
}

if($pendiente != null)
{
	$comentario = 'PENDIENTE: '.$comentario;
}

$sql="INSERT INTO correspondencia (id_c,rut,unidad,fecha,correlativo,hoja_ruta,tipo,referencias,fojas,responsable,destino,comentario,ip,estado,sw) VALUES (NULL,'$rut','$unidad1','$fecha','$correlativo','$hoja_ruta','$tipo','$referencias','$fojas','$nombre','$destino','$comentario','$ip','$estado','1')";
$result = mysql_query($sql,$link);


	$consulta ="UPDATE correspondencia SET sw = 0 WHERE id_c = '$id_c'";
	$resultado=mysql_query($consulta) or die ("Error de búsqueda en la BD: ". mysql_Error());

	$sql = "INSERT INTO recibido(id_re,id_unidad,reg_int,id_c,recibido_por,ip,fecha) VALUES 
	(NULL,'$id_unidad','$id_c','$id_c','$nombre','$ip','$fecha')";
	$result = mysql_query($sql,$link);
	//hacer insert al recibido con el nuevo id_c cuando se marca pendiente
	if($pendiente != null)
	{
	$consulta1 = "SELECT id_c FROM correspondencia WHERE rut = '$rut' order by id_c DESC limit 1";
	$result1 = mysql_query($consulta1,$link);
	$linea2 = mysql_fetch_array($result1);
	$id_c1 = $linea2["id_c"];
	
	$sql="INSERT INTO recibido(id_re,id_unidad,reg_int,id_c,recibido_por,ip,fecha) VALUES (NULL,'$id_unidad','0','$id_c1','$nombre','$ip','$fecha')";
	$result = mysql_query($sql,$link);
	
	$sql = "INSERT INTO recibido(id_re,id_unidad,reg_int,id_c,recibido_por,ip,fecha) VALUES 
	(NULL,'$id_unidad','$nevenka','$nevenka','$nombre','$ip','$fecha')";
	$result = mysql_query($sql,$link);
	}

if($cargo=='Mensajero' || $cargo=='Mensajera')
	header ("location: recibido_mens.php");
else
	header ("location: recibido_admin.php");
?>