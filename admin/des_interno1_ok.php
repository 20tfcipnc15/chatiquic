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



$ip = $_SERVER['REMOTE_ADDR']; 
$id_c = $_POST['id_c'];
$aaaa = $id_c;
$admin = $_POST['admin'];
$unidad = $_POST['unidad'];
$rut = $_POST['rut'];
$correlativo = $_POST['correlativo'];
$hoja_ruta = $_POST['hoja_ruta'];
$tipo = $_POST['tipo'];
$referencias = $_POST['referencias'];
$fojas = $_POST['fojas'];
$recibido = $_POST['recibido'];
$comentario = $_POST['comentario'];
$comentario1 = $comentario;
$otro = $_POST['otro'];
$estado = $_POST['estado'];

$archivar = $_POST['archivar'];
$pendiente = $_POST['pendiente'];
$mens = $_POST['mens'];
$copias = $_POST['copias'];

if($archivar != null)
{	
	$estado_1 = 'Concluido: ';
	$comentario = $estado_1.$comentario.' Tramite Archivado';
}

if($pendiente != null)
{
	$comentario = 'PENDIENTE: '.$comentario;
}

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
	$estado = $estado_des;
if($fojas_des != null)
	$fojas = $fojas_des;
if($mens != null)
    $comentario = 'S/M '.$comentario;

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
if ($vector != $vector_2)
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
        {
           // $comentario = '';
            $rut1=$rut;
        }
        else
        {
            $ascii++;
            $abc = chr($ascii);
            $rut1 = $rut.'-'.$abc;
            $comentario = 'COPIA '.$comentario1;
        }
        //Insertamos el nuevo registro en la tabla correspondencia
		$sql = "INSERT INTO correspondencia
		(id_c,rut,unidad,fecha,correlativo,hoja_ruta,tipo,referencias,fojas,responsable,destino,comentario,ip,estado,sw) VALUES
		(NULL,'$rut1','$unidad1','$fecha','$correlativo','$hoja_ruta','$tipo','$referencias','$fojas','$nombre','$destino','$comentario','$ip','$estado','1')";
		$result = mysql_query($sql,$link);
//echo 'AAA '.$id_c;
		$consulta ="UPDATE correspondencia SET sw = 0 WHERE id_c = '$aaaa'";
		$resultado=mysql_query($consulta) or die ("Error de búsqueda en la BD: ". mysql_Error());

		//Obtenemos el id del ultimo registro insertado
		$sql1 = "SELECT id_c FROM correspondencia WHERE destino like '$destino2' order by id_c DESC limit $long";
		$result1 = mysql_query($sql1,$link);
		$linea = mysql_fetch_array($result1);
		$id_c = $linea["id_c"];

		//obtenemos el registro interno correspondiente a la unidad.
		$consulta = "SELECT reg_int FROM recibido WHERE id_unidad = $id_unidad order by id_re DESC limit 1";
		$resultado= mysql_query($consulta) or die ("Error de b�squeda en la BD: ". mysql_Error());
		$numResultados = mysql_num_rows($resultado);
		if($numResultados>0)
		{
			$linea=mysql_fetch_array($resultado);
			$reg_int = $linea["reg_int"];
			$reg_int = $reg_int + 1;
		}
		else
			$reg_int = 1;

		//Insertamos en la tabla recibido, habiendo obtenido los datos necesarios
		$sql="INSERT INTO recibido(id_re,id_unidad,reg_int,id_c,recibido_por,ip,fecha) VALUES (NULL,'$id_unidad','$reg_int','$id_c','0','0','0')";
		$result = mysql_query($sql,$link);
    }
}
if($cargo=='Mensajero' || $cargo=='Mensajera')
//header ("location: muestra_despacho.php?id=".$id_c);
	header ("location: recibido_mens.php");
else
	header ("location: recibido_admin.php");
?>