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
$link=conexion();

//Obtenemos el RUT correspondiente a la unidad.
$consulta ="SELECT rut FROM rut WHERE id_unidad = '$id_unidad' order by id_rut DESC limit 1";
$resultado=mysql_query($consulta) or die ("Error de búsqueda en la BD: ". mysql_Error());
$numResultados = mysql_num_rows($resultado);
if ($numResultados>0)
{
	$linea=mysql_fetch_array($resultado);
	$rut = $linea["rut"];	

	//Obtenemos la parte numérica, para incrementar su valor como nuevo Trámite
	$num= substr($rut,0,1);
	$num++;
}
else
	$num=1;
	
//Obtenemos la sigla de la unidad correspondiente
$sql ="SELECT sigla FROM unidad WHERE id_unidad = '$id_unidad'";
$res=mysql_query($sql) or die ("Error de búsqueda en la BD: ". mysql_Error());
$vec=mysql_fetch_array($res);
$sigla = $vec["sigla"];	

//Concatenamos, para generar el RUT
$rut = $num.'-'.$sigla;

//Insertamos en la BD el RUT generado
$sql="INSERT INTO rut(id_rut,rut,id_unidad) VALUES (NULL,'$rut','$id_unidad')";
$res = mysql_query($sql);

//Capturamos todos los valores enviados desde el script Registrar
$fecha= $_POST['fecha'];
$tipo = $_POST['tipo'];
$procedencia = $_POST['procedencia'];
$otro = $_POST['otro'];
$reg_ext = $_POST['reg_ext'];
$hoja_ruta= $_POST['hoja_ruta'];
$referencias= $_POST['referencias'];
$fojas = $_POST['fojas'];
$destino= $_POST['destino'];
if($procedencia==null)
{	$procedencia=$otro;
	$sw=1;
}
//Insertamos el nuevo registro en la tabla correspondencia
$sql="INSERT INTO correspondencia (id_c,rut,unidad,fecha,correlativo,hoja_ruta,tipo,referencias,fojas,responsable,destino,comentario,ip) VALUES (NULL,'$rut','$unidad','$fecha','$reg_ext','$hoja_ruta','$tipo','$referencias','$fojas','$procedencia','$unidad','','$ip')";
$result = mysql_query($sql,$link);

	//Insertamos en la tabla recibida los datos de respaldo y el registro 
	//obtenemos el id_unidad de unidad, para insertarlo en recibido
	$sql1="SELECT id_c FROM correspondencia order by id_c DESC limit 1";
	$result1 = mysql_query($sql1,$link);
	$linea=mysql_fetch_array($result1);
	$id_c=$linea["id_c"]; 
	
	//obtenemos el registro interno correspondiente a la unidad.
	$consulta ="SELECT reg_int FROM recibido WHERE id_unidad = $id_unidad order by id_re DESC limit 1";
	$resultado=mysql_query($consulta) or die ("Error de búsqueda en la BD: ". mysql_Error());
	$numResultados = mysql_num_rows($resultado);
	if ($numResultados>0)
	{
		$linea=mysql_fetch_array($resultado);
		$reg_int = $linea["reg_int"];	
		$reg_int = $reg_int + 1;
	}
	else
		$reg_int = 1;
	
	//Insertamos en la tabla recibido, habienod obtenido los datos necesarios
	$sql="INSERT INTO recibido(id_re,id_unidad,reg_int,id_c,recibido_por,ip,fecha) VALUES 	
		  (NULL,'$id_unidad','$reg_int','$id_c','$nombre','$ip','$fecha')";
	$result = mysql_query($sql,$link);

//Insertamos la primera asignación en la tabla correspondencia
$sql="INSERT INTO correspondencia (id_c,rut,unidad,fecha,correlativo,hoja_ruta,tipo,referencias,fojas,responsable,destino,ip) VALUES (NULL,'$rut','$unidad','$fecha','$reg_ext','$hoja_ruta','$tipo','$referencias','$fojas','$nombre','$destino','$ip')";
$result = mysql_query($sql,$link);

if ($sw == 1)
	header("Location: reg_remitente.php?nom=".$otro); 
else
	header("Location: registro_mostrar.php?id_c=".$id_c); 
?>