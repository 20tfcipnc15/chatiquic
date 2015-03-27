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
$nombre=$_SESSION['nombre']; 
$unidad=$_SESSION['unidad']; 
$id_unidad=$_SESSION['id_unidad']; 
define("c_nombre", $nombre);
define("c_unidad", $unidad);
define("c_id_user", $id_user);
define("c_id_unidad", $id_unidad);
echo c_id_unidad.'<br>';
include("../funciones1.php");
$link=conexion();

//Obtenemos el RUT correspondiente a la unidad.
$consulta ="SELECT rut FROM rut WHERE id_unidad = c_id_unidad order by id_rut DESC limit 1";
$resultado=mysql_query($consulta) or die ("Error de búsqueda en la BD: ". mysql_Error());
$numResultados = mysql_num_rows($resultado);
if ($numResultados>0)
{
	$linea=mysql_fetch_array($resultado);
	$rut = $linea["rut"];	
	echo 'RUT '.$rut;
}
else
	echo 'nada de nada';
?>