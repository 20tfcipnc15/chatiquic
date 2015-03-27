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
include("../funciones1.php");
$link = conexion();
include ("../php/fecha_hora.php");
$fecha1 = fecha_hora();
$todo = $_GET['cad'];
$vector = explode(",",$todo);
$long = count($vector);
?>
<body OnLoad="document.pdf.submit();">
<!--<form name="pdf" method="post" action="http://fcpndigital.umsa.bo:8080/pdfservice/SilentPrintServlet">-->
<!--<form name="pdf" method="post" action="http://localhost:8080/pdfservice/SilentPrintServlet">-->
<form name="pdf" method="post" action="http://200.7.170.250:8080/pdfservice/SilentPrintServlet">
 <input type="hidden" name="action" value="1"  <input type="hidden" name="preview" value="Y">
  <input type="hidden" name="unidad" value="<? echo $unidad;?>">
  <input type="hidden" name="fecha" value="<? echo $fecha1;?>">
  <input type="hidden" name="responsable" value="<? echo $nombre; ?>">

<? $url='';
for($i=0;$i < $long;$i++)
{
	$id=$vector[$i];
	$sql = "SELECT * FROM correspondencia WHERE rut like '$id' and fecha like '%2015%' order by id_c ASC";
	$resp = mysql_query($sql);
	$num = mysql_num_rows($resp); 
	if ($num > 0) 					
	{	
		$linea=mysql_fetch_array($resp);
 		$rut=$linea["rut"];
		$destino=$linea["destino"];
	   	$correlativo=$linea["correlativo"];
		$referencias=$linea["referencias"];
		$unidad=$linea["unidad"];
		$id_c=$linea["id_c"];
//*****************************
		$sqlr = "SELECT fecha FROM recibido WHERE id_c = '$id_c' and recibido_por like '%$nombre%'";
		$respr = mysql_query($sqlr);
		$numr = mysql_num_rows($respr); 
		if ($numr > 0) 	
		{
			$vector_r = mysql_fetch_array($respr);
			$fecha = $vector_r['fecha'];
			if($fecha == 0)
			{
				$fecha = $fecha1;
				$ip = $_SERVER['REMOTE_ADDR']; 
				$sql1 = "INSERT INTO recibido(id_re,id_unidad,reg_int,id_c,recibido_por,ip,fecha) VALUES (NULL,'$id_unidad','$id_c','$id_c','$nombre','$ip','$fecha')";
				$res1 = mysql_query($sql1,$link);
			}	
		}
		else
		{	

			$fecha = $fecha1;
			//insertar la fecha y hora de recepcion en la tabla recibido
			$ip = $_SERVER['REMOTE_ADDR']; 
			$sql1 = "INSERT INTO recibido(id_re,id_unidad,reg_int,id_c,recibido_por,ip,fecha) VALUES (NULL,'$id_unidad','$id_c','$id_c','$nombre','$ip','$fecha')";
			$res1 = mysql_query($sql1,$link);
		}
//*****************************
		
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

		$url=$fecha.'::'.$rut.'::'.$unidad.'::'.$correlativo.'::'.$referencias;
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
