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
$id_user=$_SESSION['id_user'];
$nombre=$_SESSION['nombre_ini']; 
$unidad1=$_SESSION['unidad_ini']; 
$id_unidad=$_SESSION['id_unidad']; 
$cargo=$_SESSION['cargo']; 

include("../funciones1.php");
include("../php/fecha_hora.php");
$link=conexion();
$fecha=fecha_hora();

$ip = $_SERVER['REMOTE_ADDR']; 

$id_c = $_POST['id_c'];
$rut = $_POST['rut'];
$tipo = $_POST['tipo'];
$fojas = $_POST['fojas'];
$recibido = $_POST['recibido'];
$hoja_ruta = $_POST['hoja_ruta'];
$correlativo = $_POST['correlativo'];
$referencias = $_POST['referencias'];
//efffffff
$document=$_POST['documento'];
$comentario1 = $comentario;
$estado = $_POST['estado'];

$cargo = $_POST['cargo'];

$otro = $_POST['otro'];
$admin = $_POST['admin'];
$unidad = $_POST['unidad'];
$copias = $_POST['copias'];
$fojas_des = $_POST['fojas_des'];
$comentario = $_POST['comentario'];
$estado_des = $_POST['estado_des'];
$hoja_ruta_des= $_POST['hoja_ruta_des'];
$correlativo_des = $_POST['correlativo_des'];
//effffff
$nevenka=$id_c;

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
	$estado = $estado_des;
if($fojas_des != null)
	$fojas = $fojas_des;
	
if($cargo == 'Mensajero' or $cargo == 'Mensajera')
    $mens1 = '';
else
	$mens1 = 'S/M ';

$radio = $_POST['radio'];	
if($radio != null)
{
	if($radio == 'archivar')
		$comentario = 'Concluido: '.$mens1.' '.$comentario.' Tramite Archivado';
	if($radio == 'pendiente')
		$comentario = 'PENDIENTE: '.$mens1.' '.$comentario;
}
$vector = explode(",",$copias);
if($copias == '')
	$long = 0;
else
	$long = count($vector);

//Insertamos en la �ltima posici�n el destino original
//****************************************
$vector[$long]=$vector[0];
$vector[0]=$destino;
$destino2=$destino;
//****************************************

//Eliminamos los elementos duplicados en el vector "vector" y los rescatamos en el vector "vector_2"
$vector_2 = array_unique($vector);
if($vector != $vector_2)
{
	$long = count($vector_2);
	$long--;
	$vector = $vector_2;
}

//Insertamos los registros el n�mero de veces que indique la longitud del vector "vector" o "vector_2"
$ascii=64;
for($i=0; $i<=$long; $i++)
{
    $destino = $vector[$i];
    if($destino != $unidad1)
    {
        if($i == 0)
            $rut1 = $rut;
        else
        {
            $ascii++;
            $abc = chr($ascii);
            $rut1 = $rut.'-'.$abc;
            $comentario = 'COPIA '.$comentario1;
        }
		
		$consulta ="UPDATE correspondencia SET sw = 0 WHERE id_c = '$id_c'";
		$resultado=mysql_query($consulta) or die ("Error de búsqueda en la BD: ". mysql_Error());
		echo 'uno..';
		//effff----para el Juploadphp guarde uno a uno
		$clsInstanceName=new jUploadPHP($_FILES['fTheFileField4'],true);
		$clsInstanceName->setTempFolder('Escaneados/');
		$clsInstanceName->setMaxFileSizeAllowed(1800000)->setAllowedExtensions
		(
			array(
				'PDF',
				'pdf',
				'doc',
				'docx',
				'xls',
				'xlsx'
			)
		);
		if($clsInstanceName->uploadFile())
		{
			
			$gay4 = (string)$clsInstanceName->getFullFileLocation();
			
			
		}
		//effffffffffffff    hasta aqui el jUploadphp
		
        //Insertamos el nuevo registro en la tabla correspondencia
		$sql = "INSERT INTO correspondencia
		(id_c,rut,unidad,fecha,correlativo,hoja_ruta,tipo,referencias,fojas,responsable,destino,comentario,ip,estado,sw,documento,id_tc) VALUES
		(NULL,'$rut1','$unidad1','$fecha','$correlativo','$hoja_ruta','$tipo','$referencias','$fojas','$nombre','$destino','$comentario','$ip','$estado','1','$gay4','')";
		$result = mysql_query($sql,$link);
		//eeeeeffffff
		$cori='Compress/'.$rut1.'.'.'zip';
		$archivo = new PclZip($cori);
		$agregar = $archivo->add($gay4);
		//efffffffff
		}
}
if($copias == '')
	$limit = 1;
else
	$limit = $long;
//Obtenemos el id del ultimo registro insertado
$sql1 = "SELECT id_c FROM correspondencia WHERE destino like '$destino' order by id_c DESC limit $limit";
$result1 = mysql_query($sql1,$link);
$linea = mysql_fetch_array($result1);
$id_c = $linea["id_c"];

//Insertamos en la tabla recibido, habiendo obtenido los datos necesarios
$sql="INSERT INTO recibido(id_re,id_unidad,reg_int,id_c,recibido_por,ip,fecha) VALUES (NULL,'$id_unidad','0','$id_c','$nombre','$ip','$fecha')";
$result = mysql_query($sql,$link);
$sql = "INSERT INTO recibido(id_re,id_unidad,reg_int,id_c,recibido_por,ip,fecha) VALUES 
	(NULL,'$id_unidad','$nevenka','$nevenka','$nombre','$ip','$fecha')";
	$result = mysql_query($sql,$link);
if($cargo=='Mensajero' || $cargo=='Mensajera')
//header ("location: muestra_despacho.php?id=".$id_c);
	header ("location: recibido_mens.php");
else
	header ("location: recibido_admin.php");
?>
