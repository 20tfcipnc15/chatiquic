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

$ip = $_SERVER['REMOTE_ADDR']; 
include("../funciones1.php");
$link = conexion();

//Capturamos todos los valores enviados desde el script Registrar
$fecha = $_POST['fecha'];
$procedencia = $_POST['procedencia'];
$comentario = $_POST['comentario'];
$hoja_ruta = $_POST['hoja_ruta'];
$destino = $_POST['destino'];
$destino_ext = $_POST['destino_ext'];
$reg_ext = $_POST['reg_ext'];
$estado = $_POST['estado'];
$fojas = $_POST['fojas'];
$otro = $_POST['otro'];
$rut = $_POST['rut'];

if($procedencia == null)
{		
	$procedencia = $otro;
	$sw=1;
}
if($destino == null)
{		
	$destino = $destino_ext;
}

//Obtenemos los valores de referencia procedencia y otros
include("../php/fecha_hora.php");
$fecha = fecha_hora();

$sql1 = "SELECT * FROM correspondencia WHERE rut like '$rut' order by id_c DESC limit 1";
$result1 = mysql_query($sql1,$link);
$linea = mysql_fetch_array($result1);
$correlativo2 = $linea["correlativo"];
$referencias = $linea["referencias"];
$hoja_ruta2 = $linea["hoja_ruta"];
$destino2 = $linea["destino"];
$estado2 = $linea["estado"];
$fojas2 = $linea["fojas"];
$tipo = $linea["tipo"];
$idc2 = $linea["id_c"];

//*****************************************
//Verificamos si el destino y la procedencia coinciden
/*if($procedencia == $destino2)
{*/
	//Verificamos si todos los campos contienen información.
	if ($hoja_ruta == null)
		$hoja_ruta = $hoja_ruta2;

	if ($reg_ext == null)
		$reg_ext = $correlativo2;

	if ($fojas == null)
		$fojas = $fojas2;

	if ($estado == null)
		$estado = $estado2;
//*****************************************

//Insertamos el nuevo registro en la tabla correspondencia
$sql="INSERT INTO correspondencia (id_c,rut,unidad,fecha,correlativo,hoja_ruta,tipo,referencias,fojas,responsable,destino,comentario,ip,estado) VALUES (NULL,'$rut','$procedencia','$fecha','$reg_ext','$hoja_ruta','$tipo','$referencias','$fojas','$nombre','$unidad_ini','$comentario','$ip','$estado')";
$result = mysql_query($sql,$link);

//Insertamo en la tabla recibido, la fecha y hora de ingreso (retorno) a la unidad
$sql="INSERT INTO recibido (id_re,id_unidad,reg_int,id_c,recibido_por,ip,fecha) VALUES (NULL,'$id_unidad','0','$idc2','$nombre','$ip','$fecha')";
$result = mysql_query($sql,$link);

//Insertamos en la tabla recibida los datos de respaldo y el registro 
//obtenemos el id_unidad de unidad, para insertarlo en recibido
$sql1="SELECT id_c FROM correspondencia order by id_c DESC limit 1";
$result1 = mysql_query($sql1,$link);
$linea = mysql_fetch_array($result1);
$id_c = $linea["id_c"]; 
	
//Insertamos en la tabla recibido, habienod obtenido los datos necesarios
$sql="INSERT INTO recibido(id_re,id_unidad,reg_int,id_c,recibido_por,ip,fecha) VALUES (NULL,'$id_unidad','0','$id_c','$nombre','$ip','$fecha')";
$result = mysql_query($sql,$link);

//Insertamos la primera asignación en la tabla correspondencia
$sql="INSERT INTO correspondencia (id_c,rut,unidad,fecha,correlativo,hoja_ruta,tipo,referencias,fojas,responsable,destino,ip,estado) VALUES (NULL,'$rut','$unidad_ini','$fecha','$reg_ext','$hoja_ruta','$tipo','$referencias','$fojas','$nombre','$destino','$ip','$estado')";
$result = mysql_query($sql,$link);

//if ($sw != 1)
	//header("Location: reg_remitente.php?nom=".$otro); 
//else

	header("Location: seguimiento_mostrar.php?id_c=".$id_c); 
	//echo 'Esta bien';
/*}
else
{
	$sms = 'El registro no ha sido almacenado, debido a que la unidad destino y la procedencia no coinciden';
//	echo 'Esta mal';
	header("Location: seguimiento_mostrar.php?id_c=".$sms);
}*/
?>