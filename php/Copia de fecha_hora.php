<?php 
function fecha_hora()
{
$fecha = getdate(); 
$dia=$fecha["mday"];
$mes= $fecha["mon"];
$anio= $fecha["year"];
$hora=$fecha["hours"];
$min=$fecha["minutes"];
$seg=$fecha["seconds"];

switch ($mes)
{ 
	case 1: $mes=ENE;	break; 
	case 2: $mes=FEB;	break; 
	case 3: $mes=MAR;	break; 
	case 4: $mes=ABR;	break; 
	case 5: $mes=MAY; 	break;
	case 6: $mes=JUN;	break;
	case 7: $mes=JUL;	break; 
	case 8: $mes=AGO;	break;
	case 9: $mes=SEP;	break;
	case 10: $mes=OCT;	break;
	case 11: $mes=NOV;	break;
	case 12: $mes=DIC;	break;
}
switch ($dia)
{
	case 1: $dia='01';	break; 
	case 2: $dia='02';	break; 
	case 3: $dia='03';	break; 
	case 4: $dia='04';	break; 
	case 5: $dia='05'; 	break;
	case 6: $dia='06';	break;
	case 7: $dia='07';	break; 
	case 8: $dia='08';	break;
	case 9: $dia='09';	break;
}
switch ($hora)
{
	case 0: $hora='00';	break; 
	case 1: $hora='01';	break; 
	case 2: $hora='02';	break; 
	case 3: $hora='03';	break; 
	case 4: $hora='04';	break; 
	case 5: $hora='05'; break;
	case 6: $hora='06';	break;
	case 7: $hora='07';	break; 
	case 8: $hora='08';	break;
	case 9: $hora='09';	break;
}
switch ($min)
{
	case 0: $min='00';	break; 
	case 1: $min='01';	break; 
	case 2: $min='02';	break; 
	case 3: $min='03';	break; 
	case 4: $min='04';	break; 
	case 5: $min='05'; 	break;
	case 6: $min='06';	break;
	case 7: $min='07';	break; 
	case 8: $min='08';	break;
	case 9: $min='09';	break;
}
switch ($seg)
{
	case 0: $seg='00';	break; 
	case 1: $seg='01';	break; 
	case 2: $seg='02';	break; 
	case 3: $seg='03';	break; 
	case 4: $seg='04';	break; 
	case 5: $seg='05'; 	break;
	case 6: $seg='06';	break;
	case 7: $seg='07';	break; 
	case 8: $seg='08';	break;
	case 9: $seg='09';	break;
}
$hora = $hora - 1;
$fecha=$dia.' '.$mes.' '.$anio.' - '.$hora.':'.$min.':'.$seg;
return($fecha);
}
?>