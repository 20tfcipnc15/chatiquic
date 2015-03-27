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
header("Location: despachado_guardar.php"); 
include("../funciones1.php");
$link=conexion();
$ip=$_SERVER['REMOTE_ADDR']; 
$admin = $_POST['admin'];
$unidad = $_POST['unidad_ini'];
if($admin!=null)
	$destino = $admin;
else
	$destino = $unidad;
$consulta ="SELECT id_unidad FROM unidad WHERE nombre like '%$dirigido%'";
$resultado=mysql_query($consulta) or die ("Error de búsqueda en la BD: ". mysql_Error());
$linea=mysql_fetch_array($resultado,MYSQL_BOTH)
$id_receptor=$linea["id_receptor"];
}
else
	$id_receptor=0;
$sql="INSERT INTO correspondencia (id_c,rut,origen,fecha,reg_int,reg_ext,hoja_ruta,tipo,referencias,fojas,recibido_por,destino,enviado_por,accion) VALUES (NULL,'$rut','$origen','$fecha','$reg_int','$hoja_ruta','$dirigido','$referencias','$recibido_por','$tipo','101','$fojas','$ip')";
$result = mysql_query($sql,$link);

if ($tipo == 'Defensa de Tesis' || $tipo == 'Convalidacion de Materias' || $tipo =='Conclusion de Materias')
	{
		$sql="INSERT INTO d_titulacion (id_despachada,tipo) VALUES ('$id_despachada','$tipo')";
		$result = mysql_query($sql,$link);                                                                            
if($tipo == 'Nomb. de Docentes' || $tipo == 'Nomb. de Auxiliares' || $tipo == 'Nomb. de Autoridades Academicas')
	{
		$sql="INSERT INTO d_nombramiento (id_despachada,tipo) VALUES ('$id_despachada','$tipo')";
		$result = mysql_query($sql,$link);
	}
if($tipo == 'Formularios de Vacacion')
	{
		$sql="INSERT INTO d_vacacion (id_despachada) VALUES ('$id_despachada')";
		$result = mysql_query($sql,$link);
	}
include("seguimiento.php");
?>