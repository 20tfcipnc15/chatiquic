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
$id_user = $_SESSION['id_user'];
$nombre = $_SESSION['nombre_ini']; 
$unidad_ini = $_SESSION['unidad_ini']; 
$id_unidad = $_SESSION['id_unidad']; 

include("../funciones1.php");
$link = conexion();

$i=0;

//Capturamos todos los valores enviados desde el script Registrar
$sql = "SELECT rut FROM correspondencia WHERE destino like '' and sw = 1 and comentario != '%Concluido:%' and comentario != '%PENDIENTE%' order by id_c DESC";
$res = mysql_query($sql,$link);
while($linea = mysql_fetch_array($res))
{

//	$id_c = $linea["id_c"];
	$rut = $linea["rut"];
//	$comentario = $linea["comentario"];
	
//	echo 'ALEIDA '.$rut.'  RAQUEL '.$id_d.'<br>';
	
	$sql2 = "SELECT id_c FROM correspondencia WHERE rut = '$rut' and destino like '' order by id_c DESC limit 1";
	$res2 = mysql_query($sql2,$link);
	$num2 = mysql_num_rows($res2);
	if ($num2 > 0)
	while($linea2 = mysql_fetch_array($res2))
	{
		$id_c = $linea2["id_c"];
//		$comentario = $linea["comentario"];
		echo 'ALEIDA '.$rut.'  RAQUEL '.$id_d.'<br>';
		$i++;
		
		$comentario2 = 'Concluido: '.$comentario.' Tramite Archivado';
		$consulta ="UPDATE correspondencia SET destino = 'Archivo' and comentario = '$comentario2' WHERE id_c = '$id_c'";
		$resultado=mysql_query($consulta) or die ("Error de búsqueda en la BD: ". mysql_Error());
		
	}
}
echo 'TOTAL '.$i;
?>