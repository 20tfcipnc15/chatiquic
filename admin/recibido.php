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
//$id_user=$_SESSION['id_user'];
$cargo=$_SESSION['cargo'];
$nombre=$_SESSION['nombre_ini']; 
$unidad1=$_SESSION['unidad_ini']; 
$id_unidad=$_SESSION['id_unidad']; 

$ip=$_SERVER['REMOTE_ADDR'];

include("../funciones1.php");
$link=conexion();
include("../php/fecha_hora.php");
$fecha=fecha_hora();

$todo = $_GET['cad'];
$vector = explode(",",$todo);
$long = count($vector);

if($todo != 'undefined')
{
			for ($i=0; $i<$long; $i++)
			{
				$id_c = $vector[$i];
				//$id_c = (int)$id_c4;
				//echo $id_c;
				$sql = "INSERT INTO recibido(id_re,id_unidad,reg_int,id_c,recibido_por,ip,fecha) VALUES 
				(NULL,'$id_unidad','$id_c','$id_c','$nombre','$ip','$fecha')";
				$result = mysql_query($sql,$link);
			}
}
/*if ($cargo == 'Mensajero' or $cargo == 'Mensajera')
    header ("location: recibido_mens.php");
else
    header ("location: recibido_admin.php");*/
	?>
	<script> 
	window.close();
	</script>
<?	
?>
