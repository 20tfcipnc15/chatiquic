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
$unidad1 = $_SESSION['unidad_ini']; 
$id_unidad = $_SESSION['id_unidad']; 
$cargo=$_SESSION['cargo']; 

include("../funciones1.php");
include("../php/fecha_hora.php");
$link = conexion();
$fecha = fecha_hora();
$ip=$_SERVER['REMOTE_ADDR']; 

$cad = $_GET["cad"];
$vector = explode(",",$cad);
$long = count($vector);

for ($i=0; $i<$long; $i++)
{
	$rut = $vector[$i];
	echo $rut;
	$sql = "SELECT * FROM correspondencia WHERE rut like '$rut' order by id_c DESC limit 1";
	$res = mysql_query($sql) or die ("Error de búsqueda en la BD: ". mysql_Error());
	$num = mysql_num_rows($res);
	if($num > 0)
	{	
		$vec = mysql_fetch_array($res);
		$destino = $vec["destino"];
		$id_c4 = $vec["id_c"];
		$correlativo = $vec['correlativo'];
		$hoja_ruta = $vec['hoja_ruta'];
		$tipo = $vec['tipo'];
		$referencias = $vec['referencias'];
		$fojas = $vec['fojas'];
		$comentario = $vec['comentario'];
		$estado = $vec['estado'];
		
		if($estado != 'R')		
		{
			
			$consulta ="UPDATE correspondencia SET sw = 0 WHERE id_c = '$id_c4'";
			$resultado=mysql_query($consulta) or die ("Error de búsqueda en la BD: ". mysql_Error());	
			
			$sql= "INSERT INTO correspondencia 	
			 (id_c,rut,unidad,fecha,correlativo,hoja_ruta,tipo,referencias,fojas,responsable,destino,comentario,ip,estado,sw) VALUES 	
			 (NULL,'$rut','$unidad1','$fecha','$correlativo','$hoja_ruta','$tipo','$referencias','$fojas','$nombre','Archivo','Concluido: Tramite Archivado','$ip','$estado','1')";
			$result = mysql_query($sql,$link);

			//Obtenemos id_c de correspondencia, para insertarlo en recibido
			$consulta = "SELECT id_c FROM correspondencia order by id_c DESC limit 1";
			$resultado = mysql_query($consulta) or die ("Error de búsqueda en la BD: ". mysql_Error());
			$numResultados = mysql_num_rows($resultado);
			$linea = mysql_fetch_array($resultado);
			$id_c = $linea["id_c"];
	
			//Insertamos en la tabla recibido, habiendo obtenido los datos necesarios
			$sql = "INSERT INTO recibido(id_re,id_unidad,reg_int,id_c,recibido_por,ip,fecha) VALUES (NULL,'$id_unidad','$id_c','$id_c','$nombre','$ip','$fecha')";
			$result = mysql_query($sql,$link);
		}
	}
}
//header ("location: recibido_admin.php");
?>
	<script> 
	window.close();
	</script>
<?	
?>