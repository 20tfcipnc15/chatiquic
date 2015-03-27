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
include ("../php/fecha_hora.php");
$fecha = fecha_hora();

include("../funciones1.php");
$link = conexion();

$anio = año($fecha);
//**********************************
//Obtenemos el RUT correspondiente a la unidad.
$consulta = "SELECT rut FROM rut WHERE id_unidad = '$id_unidad' order by id_rut DESC limit 1";
$resultado= mysql_query($consulta) or die ("Error de búsqueda en la BD: ". mysql_Error());
$numResultados = mysql_num_rows($resultado);
if ($numResultados>0)
{
	$linea=mysql_fetch_array($resultado);
	$rut = $linea["rut"];	

	//Obtenemos la parte numérica, para incrementar su valor como nuevo Trámite
	$B = '-';
	
	$pos= strrpos($rut,$B);

	$num= substr($rut,0, $pos);
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
//**********************************

//$rut = $_POST['rut'];
$correlativo = $_POST['correlativo'];
$hoja_ruta= $_POST['hoja_ruta'];
$destino= $_POST['destino'];
$referencias= $_POST['referencias'];
$tipo = $_POST['tipo'];
$fojas = $_POST['fojas'];
$otro = $_POST['otro'];
$fecha = $_POST['fecha'];
$copias = $_POST['copias'];
$archivos = $_POST['archivos'];
$estado = $_POST['estado'];

if($destino==null)
	$destino=$otro;
//INSERTAMOS CON UN FOR LOS REGISTROS CON LAS COPIAS CORRESPONDIENTES PARA TODAS LAS UNIDADES DESTINO
//Convertimos la cadena "copias" en el array "vector"
$vector = explode(",",$copias);
if($copias == '')
	$long = 0;
else
	$long = count($vector);

//Insertamos en la última posición el destino original
$vector[$long] = $destino;

//Eliminamos los elementos duplicados en el vector "vector" y los rescatamos en el vector "vector_2"
$vector_2 = array_unique($vector); 
if ($vector != $vector_2)
{
	$long = count($vector_2);
	$long--;
	$vector = $vector_2;
}

//Insertamos los registros el número de veces que indique la longitud del vector "vector" o "vector_2"
////////*********************
if($long > 1)
	$comentario = 'Copia';
else
	$comentario = '';

////////*********************
for($i=0; $i <= $long; $i++)
{	$destino = $vector[$i];
	if($destino != $unidad)
	{
	
//Insertamos el nuevo registro en la tabla correspondencia
$sql="INSERT INTO correspondencia 	
(id_c,rut,unidad,fecha,correlativo,hoja_ruta,tipo,referencias,fojas,responsable,destino,comentario,ip,estado) VALUES (NULL,'$rut','$unidad','$fecha','$correlativo','$hoja_ruta','$tipo','$referencias','$fojas','$nombre','$destino','$comentario','$ip','$estado')";
$result = mysql_query($sql,$link);

	//Obtenemos el id del ultimo registro insertado
	$sql1="SELECT id_c FROM correspondencia order by id_c DESC limit 1";
	$result1 = mysql_query($sql1,$link);
	$linea=mysql_fetch_array($result1);
	$id_c= $linea["id_c"]; 
	
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
		  (NULL,'$id_unidad','$reg_int','$id_c','0','0','0')";
	$result = mysql_query($sql,$link);
	}
}
/////////////////////////////////////////////////////////
//Trabajamos con la Tabla de archivos adjuntos TBL_DOCUMENTOS
$vec_arch = explode(',',$archivos);
$anio = año($fecha);
$rut_d = $rut.'**'.$anio;
for($i=0; $i<count($vec_arch);$i++)
{
	$archivo = $vec_arch[$i];
	$sql = "UPDATE tbl_documentos SET rut = '$rut' WHERE rut like 'adjunto' and titulo like '$archivo'";
	$result = mysql_query($sql,$link);
}
header("Location: despacho_mostrar_1.php?long=$long&fecha=$fecha&tipo=$tipo&destino=$destino&correlativo=$correlativo&hoja=$hoja_ruta&referencias=$referencias&fojas=$fojas&nombre=$nombre&rut=$rut&estado=$estado");
?>