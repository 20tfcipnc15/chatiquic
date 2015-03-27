<?
session_start();
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

//Capturamos todos los valores enviados desde el script Registrar
$fecha= $_POST['fecha'];
$procedencia = $_POST['procedencia'];
$otro = $_POST['otro'];
$reg_ext = $_POST['reg_ext'];
$hoja_ruta= $_POST['hoja_ruta'];
$comentario= $_POST['comentario'];
$fojas = $_POST['fojas'];
$destino= $_POST['destino'];
$rut= $_POST['rut'];
if($procedencia==null)
{	$procedencia=$otro;
	$sw=1;
}

//Insertamos el nuevo registro en la tabla correspondencia
$sql="INSERT INTO correspondencia (id_c,rut,unidad,fecha,correlativo,hoja_ruta,tipo,referencias,fojas,responsable,destino,comentario,ip) VALUES (NULL,'$rut','$procedencia','$fecha','$reg_ext','$hoja_ruta','','$referencias','$fojas','$nombre','$unidad','$comentario','$ip')";
$result = mysql_query($sql,$link);

//Insertamos en la tabla recibida los datos de respaldo y el registro 
//obtenemos el id_unidad de unidad, para insertarlo en recibido
$sql1="SELECT id_c FROM correspondencia order by id_c DESC limit 1";
$result1 = mysql_query($sql1,$link);
$linea=mysql_fetch_array($result1);
$id_c=$linea["id_c"]; 
	
//Insertamos en la tabla recibido, habienod obtenido los datos necesarios
$sql="INSERT INTO recibido(id_re,id_unidad,reg_int,id_c,recibido_por,ip,fecha) VALUES 	
	  (NULL,'$id_unidad','0','$id_c','$nombre','$ip','$fecha')";
$result = mysql_query($sql,$link);

//Insertamos la primera asignación en la tabla correspondencia
$sql="INSERT INTO correspondencia (id_c,rut,unidad,fecha,correlativo,hoja_ruta,tipo,referencias,fojas,responsable,destino,ip) VALUES (NULL,'$rut','$unidad','$fecha','$reg_ext','$hoja_ruta','','$referencias','$fojas','$nombre','$destino','$ip')";
$result = mysql_query($sql,$link);

//if ($sw != 1)
	//header("Location: reg_remitente.php?nom=".$otro); 
//else
	header("Location: seguimiento_mostrar.php?id_c=".$id_c); 
?>