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
include("../funciones1.php");
$link = conexion();
include ("../php/fecha_hora.php");
$fecha1=fecha_hora();
$todo = $_GET['cad'];
$vector = explode(",",$todo);
$long = count($vector);
?>
<body OnLoad="document.pdf.submit();">
<!--<form name="pdf" method="post" action="http://fcpndigital.umsa.bo:8080/pdfservice/SilentPrintServlet">-->
<!--<form name="pdf" method="post" action="http://localhost:8080/pdfservice/SilentPrintServlet">-->
<form name="pdf" method="post" action="http://fcpndigital.umsa.bo:8080/pdfservice_d/SilentPrintServlet">
 <input type="hidden" name="action" value="1"  <input type="hidden" name="preview" value="Y">
  <input type="hidden" name="unidad" value="<? echo $unidad;?>">
  <input type="hidden" name="fecha" value="<? echo $fecha1;?>">
  <input type="hidden" name="responsable" value="<? echo $nombre; ?>">

<? $url='';
for($i=0;$i < $long;$i++)
{
	$id=$vector[$i];
	$sql = "SELECT * FROM correspondencia WHERE rut like '$id' and fecha like '%2009%' order by id_c DESC";
	$resp = mysql_query($sql);
	$num = mysql_num_rows($resp); 
	if ($num > 0) 					
	{	
		$linea=mysql_fetch_array($resp);
 		$rut=$linea["rut"];
		$fecha=$linea["fecha"];
		$destino=$linea["destino"];
	   	$correlativo=$linea["correlativo"];
		$referencias=$linea["referencias"];
		$unidad=$linea["unidad"];
		
		if($rut == null or $rut == '')
			$rut = 'NaN';
		if($fecha == null or $fecha == '')
			$fecha = 'NaN';
		if($destino == null or $destino == '')
			$destino = 'NaN';
		if($correlativo == null or $correlativo == '')
			$correlativo = 'NaN';
		if($referencias == null or $referencias == '')
			$referencias = 'NaN';
		if($unidad == null or $unidad == '')
			$unidad = 'NaN';

		$url=$fecha.'::'.$rut.'::'.$destino.'::'.$correlativo.'::'.$referencias;
?>		  
		<textarea name="registros" type="hidden"><? echo $url;?></textarea>
<?
	}
}
?>
  <label>
  <input type="submit" name="Submit" value="Enviar">
  </label>
</form>
</body>