<?php
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
?>