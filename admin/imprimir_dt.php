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
include("../php/fecha_hora.php");
$fecha1 = fecha_hora();
$todo = $_GET['cad'];
$vector = explode(",",$todo);
$long = count($vector);
?>
<body OnLoad="document.pdf.submit();">
<!--<form name="pdf" method="post" action="http://fcpndigital.umsa.bo:8080/pdfservice/SilentPrintServlet">-->
<!--<form name="pdf" method="post" action="http://localhost:8080/p1/SilentPrintServlet">-->
<form name="pdf" method="post" action="http://200.7.170.250:8080/p1/SilentPrintServlet">
  <input type="hidden" name="action" value="1" >
  <input type="hidden" name="preview" value="Y">
  <input type="hidden" name="unidad" value="<? echo $unidad;?>">
  <input type="hidden" name="fecha" value="<? echo $fecha1;?>">
  <input type="hidden" name="responsable" value="<? echo $nombre; ?>">

<? $url='';
for($i=0;$i < $long;$i++)
{
	$id = $vector[$i];
        //$id++;
        $sql = "SELECT * FROM correspondencia WHERE rut like '$id' and fecha like '%2011%' and unidad like '$unidad' order by id_c ASC";
	$resp = mysql_query($sql);
	$num = mysql_num_rows($resp); 
	if ($num > 0) 					
	{	
		$linea = mysql_fetch_array($resp);
		$rut = $linea["rut"];
		$fecha1 = $linea["fecha"];
		$destino1 = $linea["destino"];
                $correlativo1 = $linea["correlativo"];
		$referencias1 = $linea["referencias"];
		$unidad1 = $linea["unidad"];
		
		if($rut == null or $rut == '')
			$rut = 'NaN';
		if($fecha1 == null or $fecha1 == '')
			$fecha1 = 'NaN';
		if($destino1 == null or $destino1 == '')
			$destino1 = 'NaN';
		if($correlativo1 == null or $correlativo1 == '')
			$correlativo1 = 'NaN';
		if($referencias1 == null or $referencias1 == '')
			$referencias1 = 'NaN';
		if($unidad1 == null or $unidad1 == '')
			$unidad1 = 'NaN';
			
		$url2 = $fecha1.'::'.$rut.'::'.$destino1.'::'.$correlativo1.'::'.$referencias1;
	}
	else
	{
		$url2 = "";
	}
	$sql = "SELECT * FROM correspondencia WHERE rut like '$id' and fecha like '%2009%' and unidad like '$unidad' order by id_c DESC";
	$resp = mysql_query($sql);
	$num = mysql_num_rows($resp); 
	if ($num > 0) 					
	{
		$linea=mysql_fetch_array($resp);
		$fecha=$linea["fecha"];
		$destino=$linea["destino"];
	   	$correlativo=$linea["correlativo"];
		$referencias=$linea["referencias"];
		$comentario=$linea["comentario"];
		$unidad=$linea["unidad"];
		
		if($fecha == null or $fecha == '')
			$fecha = 'NaN';
		if($destino == null or $destino == '')
			$destino = 'NaN';
		if($correlativo == null or $correlativo == '')
			$correlativo = 'NaN';
		if($comentario == null or $comentario == '')
			$comentario = 'NaN';
		if($unidad == null or $unidad == '')
			$unidad = 'NaN';

		if ($url2 == "")
			$url = $fecha.'::'.$id.'::'.$destino.'::'.$correlativo.'::'.$referencias.'::NaN::NaN::NaN::NaN';	
		else
		{
			if ($correlativo1 == $correlativo)
				$correlativo = 'NaN';
			$url = $url2.'::'.$destino.'::'.$fecha.'::'.$correlativo;	
		}
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
