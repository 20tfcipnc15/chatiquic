<?
function tiempo_tramite($fecha1,$fecha2)
{
	$dia1=substr($fecha1,0,2);
	$mes1=substr($fecha1,3,3);
	$anio1=substr($fecha1,7,4);
	$dia2=substr($fecha2,0,2);
	$mes2=substr($fecha2,3,3);
	$anio2=substr($fecha2,7,4);
	$hora_total = obtiene_hora($fecha1,$fecha2).'<br>';

//Mostramos el tiempo total de espera
	$mes1=mes_numerico ($mes1);
	$mes2=mes_numerico ($mes2);
	$anio=$anio2 - $anio1;
/*	if ($anio == 1)
		$anio--;*/
	if ($mes2 < $mes1)
	{
		$mes = (12 - $mes1) + $mes2;
		$anio --;
	}
	else
		$mes = $mes2 - $mes1;
	
	if ($dia2 < $dia1)
	{
		$dia = (31 - $dia1) + $dia2;
		$mes --;
	}
	else
		$dia = $dia2 - $dia1;
	
	$fecha_total = obtiene_fecha($anio,$mes,$dia);
	echo $fecha_total.' y '.$hora_total;
}
//tratamos el mes
function mes_numerico($mes)
{
	switch ($mes)
	{ 
		case 'ENE': $mes=1;		break; 
		case 'FEB': $mes=2;		break; 
		case 'MAR': $mes=3;		break; 
		case 'ABR': $mes=4;		break; 
		case 'MAY': $mes=5; 	break;
		case 'JUN': $mes=6;		break;
		case 'JUL': $mes=7;		break; 
		case 'AGO': $mes=8;		break;
		case 'SEP': $mes=9;		break;
		case 'OCT': $mes=10;	break;
		case 'NOV': $mes=11;	break;
		case 'DIC': $mes=12;	break;
	}
	return $mes;
}
//trabajamos las horas	
function obtiene_hora($fecha1,$fecha2)
{
	$sub = '-';
	$var = strpos($fecha1,$sub);
	$hora1 = substr($fecha1,$var+2,22);

	$trozos1 = explode (":", $hora1);
	$trozos1[0];
	$trozos1[1];
	$trozos1[2];
	
	$sub = '-';
	$var = strpos($fecha2,$sub);
	$hora2 = substr($fecha2,$var+2,22);
	
	$trozos2 = explode (":", $hora2);
	$trozos2[0];
	$trozos2[1];
	$trozos2[2];

	$hora =  $trozos2[0]-$trozos1[0];
	$min =  $trozos2[1]-$trozos1[1];
	$seg  =  $trozos2[2]-$trozos1[2];

	$total=hora_total($hora,$min,$seg);
	$total = $total.' Hrs.';
	return $total;
}


//FUNCION TOTAL PARA OBTENER LA HORA TOTAL
function hora_total($hora,$min,$seg)
{	
	if($hora<0)
		$hora = $hora * (-1);
	if (strlen($hora)==1)
		$hora = '0'.$hora;
	
	if($min<0)
		$min = $min * (-1);
	if (strlen($min)==1)
		$min = '0'.$min;
	
	if($seg<0)
		$seg = $seg * (-1);
	if (strlen($seg)==1)
		$seg = '0'.$seg;
	$hora = $hora.':'.$min.':'.$seg;
	return $hora;
}
function obtiene_fecha($anio,$mes,$dia)
{	
	if($anio<0)
		$anio = $anio * (-1);
	
	if($mes<0)
		$mes = $mes * (-1);
	
	if($dia<0)
		$dia = $dia * (-1);
	$tiempo = $anio.' años '.$mes.' mes(es) '.$dia.' dia(s)';
	return $tiempo;
}
?>