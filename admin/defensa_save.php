<?
//efffff
require_once 'jUploadPHP.php';
include "./pclzip.lib.php";
//efffff
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
$cid_user=$_SESSION['id_user'];
$cnombre=$_SESSION['nombre_ini']; 
$cunidad=$_SESSION['unidad_ini']; 
$cid_unidad=$_SESSION['id_unidad']; 
$ip=$_SERVER['REMOTE_ADDR']; 
include("../funciones1.php");
$link=conexion();

//Obtenemos el RUT correspondiente a la unidad.
$consulta ="SELECT rut FROM rut WHERE id_unidad = '$cid_unidad' order by id_rut DESC limit 1";
$resultado=mysql_query($consulta) or die ("Error de búsqueda en la BD: ". mysql_Error());
$numResultados = mysql_num_rows($resultado);
if ($numResultados>0)
{
	$linea=mysql_fetch_array($resultado);
	$rut = $linea["rut"];	

	//Obtenemos la parte numérica, para incrementar su valor como nuevo Trámite
	$B = '-';
	$BB= strpos($rut,$B);
	$num= substr($rut,0,$BB);
	$num++;
}
else
	$num=1;
	
//Obtenemos la sigla de la unidad correspondiente
$sql ="SELECT sigla, id_unidad FROM unidad WHERE id_unidad = $cid_unidad";
$res=mysql_query($sql) or die ("Error de búsqueda en la BD: ". mysql_Error());
$vec=mysql_fetch_array($res);
$sigla = $vec["sigla"];
//pal recibido
$id_id = $vec["id_unidad"];
//efffffff
//Concatenamos, para generar el RUT con el año mas para no tener problemas
date_default_timezone_set('UTC');
$rut = $num.'-'.$sigla.'_'.date("Y");

//Insertamos en la BD el RUT generado
$sql="INSERT INTO rut(id_rut,rut,id_unidad) VALUES (NULL,'$rut','$cid_unidad')";
$res = mysql_query($sql);

//Capturamos todos los valores enviados desde el script Registrar
$destino = $_POST['destino'];
$referencias = $_POST['universitario'];
$tipo = $_POST['tipo'];
$fojas = $_POST['fojas'];
$otro = $_POST['otro'];
$fecha = $_POST['fecha'];
$estado = $_POST['estado'];
$procedencia = $_POST['procedencia'];
$correlativo = $_POST['reg_externo'];
////////efff---por si no se selecciono nada del combo destino
if($destino==null)
	$destino=$otro;
//////effff-----por si no llenan el campo correlativo del formularioreg_defensa.php
if($correlativo==null)
	$correlativo='S/N';
	//effff----para el Juploadphp guarde uno a uno
		$clsInstanceName=new jUploadPHP($_FILES['fTheFileField3'],true);
		$clsInstanceName->setTempFolder('Escaneados/');
		$clsInstanceName->setMaxFileSizeAllowed(1800000)->setAllowedExtensions
		(
			array(
				'pdf',
				'doc',
				'docx',
				'xls',
				'xlsx'
			)
		);
		if($clsInstanceName->uploadFile())
		{
			
			$gay2 = (string)$clsInstanceName->getFullFileLocation();
			
		}
		//effffffffffffff    hasta aqui el jUploadphp
		
//Insertamos el nuevo registro en la tabla correspondencia
$sql="INSERT INTO correspondencia (id_c,rut,unidad,fecha,correlativo,hoja_ruta,tipo,referencias,fojas,responsable,destino,comentario,ip,estado,sw,documento) VALUES (NULL,'$rut','$procedencia','$fecha','$correlativo','','$tipo','$referencias','$fojas','$cnombre','$cunidad','','$ip','$estado','0','$gay2')";
$result = mysql_query($sql,$link);
				//para el recibido
				$sql9="SELECT id_c FROM correspondencia order by id_c DESC limit 1";
				$result9 = mysql_query($sql9,$link);
				$linea1=mysql_fetch_array($result9);
				$id_c9=$linea1["id_c"];
				
				$sql6 = "INSERT INTO recibido(id_re,id_unidad,reg_int,id_c,recibido_por,ip,fecha) VALUES 
				(NULL,'$id_id','$id_c9','$id_c9','$cnombre','$ip','$fecha')";
				$result6 = mysql_query($sql6,$link);
				//hasta aqui el recibido
//efffffffffffff         ahora para el pclzip
		
		$archive2=$rut.'.'.'zip';
		$direccion2="Compress/";
		$completedirection2=$direccion2.$archive2;
		$archivo2 = new PclZip($completedirection2);
		/* Llamamos el metodo que creara el nuevo fichero añadiendo los ficheros especificados y separados por comas */
		$creacion2 = $archivo2->create($gay2);
		
		//effffffffffffffffff

//Insertamos en la tabla recibida los datos de respaldo y el registro 
//obtenemos el id_unidad de unidad, para insertarlo en recibido
$sql1="SELECT id_c FROM correspondencia order by id_c DESC limit 1";
$result1 = mysql_query($sql1,$link);
$linea=mysql_fetch_array($result1);
$id_c=$linea["id_c"]; 
	
//Insertamos en la tabla recibido, habiendo obtenido los datos necesarios
$sql="INSERT INTO recibido(id_re,id_unidad,reg_int,id_c,recibido_por,ip,fecha) VALUES 	
	  (NULL,'$cid_unidad','$reg_int','$id_c','$cnombre','$ip','$fecha')";
$result = mysql_query($sql,$link);

//Insertamos la primera asignación en la tabla correspondencia

$sql="INSERT INTO correspondencia (id_c,rut,unidad,fecha,correlativo,hoja_ruta,tipo,referencias,fojas,responsable,destino,comentario,ip,estado,sw,documento) VALUES (NULL,'$rut','$cunidad','$fecha','$correlativo','','$tipo','$referencias','$fojas','$cnombre','$destino','','$ip','$estado','1','$gay2')";
$result = mysql_query($sql,$link);

//Obtenemos el id del ultimo registro insertado
$sql1 = "SELECT id_c FROM correspondencia order by id_c DESC limit 1";
$result1 = mysql_query($sql1,$link);
$linea = mysql_fetch_array($result1);
$id_c = $linea["id_c"]; 

header("Location: mostrar_defensa.php?id_c=".$id_c); 
?>