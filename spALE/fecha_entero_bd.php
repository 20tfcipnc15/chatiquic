<?php
include("../funciones2.php");
$link = conexion2();
function fecha_entero($fecha)
{
	//$fecha = '03 FEB 2009 - 11:44:21';
	$fecha = substr($fecha,0,11);
//	echo 'Aleida '.$fecha;
	$anio = substr($fecha,7,11);
//	echo '<br>Aleida '.$anio;
	$mes = substr($fecha,3,3);
//	echo '<br>Aleida '.$mes;
	
	switch ($mes)
	{ 
		case 'ENE': $mes = '01';	break; 
		case 'FEB': $mes = '02';	break; 
		case 'MAR': $mes = '03';	break; 
		case 'ABR': $mes = '04';	break; 
		case 'MAY': $mes = '05';	break; 
		case 'JUN': $mes = '06';	break; 
		case 'JUL': $mes = '07';	break; 
		case 'AGO': $mes = '08';	break; 
		case 'SEP': $mes = '09';	break; 
		case 'OCT': $mes = '10';	break; 
		case 'NOV': $mes = '11';	break; 
		case 'DIC': $mes = '12';	break; 
		case 'ene': $mes = '01';	break; 
		case 'feb': $mes = '02';	break; 
		case 'mar': $mes = '03';	break; 
		case 'abr': $mes = '04';	break; 
		case 'may': $mes = '05';	break; 
		case 'jun': $mes = '06';	break; 
		case 'jul': $mes = '07';	break; 
		case 'ago': $mes = '08';	break; 
		case 'sep': $mes = '09';	break; 
		case 'oct': $mes = '10';	break; 
		case 'nov': $mes = '11';	break; 
		case 'dic': $mes = '12';	break; 
	}
	
	$dia = substr($fecha,0,2);
//	echo '<br>Aleida '.$dia;
	$fecha_integer = $anio.$mes.$dia;
//	echo '<br>Aleida '.$fecha_int;
	return $fecha_integer;
}

$sql = "SELECT fecha FROM correspondencia WHERE fecha_int = '' limit 50";
//$sql = "SELECT fecha FROM correspondencia WHERE fecha_int = ''";
$res = mysql_query($sql) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
$num = mysql_num_rows($res);

if($num > 0)
{	
	while ($vec = mysql_fetch_array($res))
	{
		$fecha = $vec["fecha"];
		$fecha2 = fecha_entero($fecha);
		
		$sql1 = "UPDATE correspondencia SET fecha_int = '$fecha2' WHERE fecha like '$fecha'";
		$res1 = mysql_query($sql1) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
	}
}
?>