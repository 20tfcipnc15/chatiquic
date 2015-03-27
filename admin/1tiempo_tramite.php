<?
function tiempo_tramite($fecha1,$fecha2)
{
	$dia1=substr($fecha1,0,2);
	$mes1=substr($fecha1,3,3);
	$anio1=substr($fecha1,7,4);
	$dia2=substr($fecha2,0,2);
	$mes2=substr($fecha2,3,3);
	$anio2=substr($fecha2,7,4);
	$hora1 = obtiene_hora($fecha1);
	$hora2 = obtiene_hora($fecha2);
	$hora = $hora2 - $hora1;
//	echo 'esta es la hora  '.$hora;
	$hora_total = hora_total($hora);
	
//Mostramos el tiempo total de espera
	$mes1=mes_numerico ($mes1);
	$mes2=mes_numerico ($mes2);
	$anio=$anio2 - $anio1;
	$mes=$mes2-$mes1;
	$dia = $dia2 - $dia1;
	echo 'El tiempo total de duracion de su tramite es: '.$anio.' años '.$mes.' meses '.$dia.' dias '.$hora_total.' horas.';
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
function obtiene_hora($fecha)
{
	$sub = '-';
	$var = strpos($fecha,$sub);
	$hora = substr($fecha,$var+2,22);
	$a = ':';
	$b = '';
	$hora=ereg_replace($a,$b,$hora);
	return $hora;
}
function hora_total($hora)
{	
	$long = strlen($hora);
	switch ($long)
	{ 
		case 1: $hora = '00:00:0'.$hora;	break; 
		case 2: $hora = '00:00:'.$hora;	break; 
		case 3:	$hora1 = substr($hora,1,2);
				$hora1 = ':'.$hora1;
				$hora2 = substr($hora,0,1);
				$hora = '00:0'.$hora2.$hora1;
				break; 
		case 4: $hora1 = substr($hora,2,3);
				$hora1 = ':'.$hora1;
				$hora2 = substr($hora,0,2);
				$hora = '00:'.$hora2.$hora1;
				break;
		case 5: $hora0 = substr($hora,3,4);
				$hora0 = ':'.$hora0;
				$hora1 = substr($hora,1,2);
				$hora1 = ':'.$hora1;
				$hora2 = substr($hora,0,1);
				$hora = '0'.$hora2.$hora1.$hora0;
				break;
		case 6: $hora0 = substr($hora,4,5);
				$hora0 = ':'.$hora0;
				$hora1 = substr($hora,2,2);
				$hora1 = ':'.$hora1;
				$hora2 = substr($hora,0,2);
				$hora = $hora2.$hora1.$hora0;
				break; 
	}
	return $hora;
}
?>