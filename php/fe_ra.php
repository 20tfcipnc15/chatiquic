<?php 
function fecha_ho($entrada)
{
function mes_complet($mes)
{
	switch($mes)
	{
		case 'ENE': $mes = '01';		break; 
		case 'FEB': $mes = '02';		break; 
		case 'MAR': $mes = '03';		break; 
		case 'ABR': $mes = '04';		break; 
		case 'MAY': $mes = '05';		break; 
		case 'JUN': $mes = '06';		break; 
		case 'JUL': $mes = '07';		break; 
		case 'AGO': $mes = '08';		break; 
		case 'SEP': $mes = '09';		break; 
		case 'OCT': $mes = '10';		break; 
		case 'NOV': $mes = '11';		break; 
		case 'DIC': $mes = '12';		break; 
		case 'ene' : $mes = '01';		break; 
		case 'feb' : $mes = '02';		break; 
		case 'mar' : $mes = '03';		break; 
		case 'abr' : $mes = '04';		break; 
		case 'may' : $mes = '05';		break; 
		case 'jun' : $mes = '06';		break; 
		case 'jul' : $mes = '07';		break; 
		case 'ago': $mes = '08';		break; 
		case 'sep': $mes = '09';		break; 
		case 'oct': $mes = '10';		break; 
		case 'nov': $mes = '11';		break; 
		case 'dic': $mes = '12';		break; 

	}
	return $mes;
}

$pot2=mes_complet($entrada);
$fecha=$pot2;
return($fecha);
}
?>