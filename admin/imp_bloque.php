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
$unidad=$_SESSION['unidad_ini']; 
$id_unidad=$_SESSION['id_unidad']; 

$ip=$_SERVER['REMOTE_ADDR']; 

include("../funciones1.php");
$link = conexion();
include ("../php/fecha_hora.php");
$fecha=fecha_hora();
$todo = $_GET['cad'];

//INSERTAMOS EN LA TABLA REPORTES, LOS ID SELECCIONADOS PARA IMPRESION
$sql = "INSERT INTO reportes (id_r,rut,fecha_sol,responsable,id_uni,ip) VALUES (NULL,'$todo','$fecha','$nombre','$id_unidad','$ip')";
$res = mysql_query($sql,$link);

$todo = substr($todo, 1,strlen($todo)-2); 
header ('Location: imprimir_r.php?cad='.$todo);
?>