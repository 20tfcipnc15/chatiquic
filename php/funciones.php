<?php
/*  function conexion()
  { 
     $link=mysql_connect("localhost","root","777") or die("Error: ".mysql_error());
	 mysql_select_db("chasqui_digital",$link) or die("Error: ".mysql_error());
	 return($link);
  }*/
  function formato($dia,$mes,$anio)
  {
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
	$fecha=$dia.' '.$mes.' '.$anio;
	return $fecha;
  }
  function espacios($cadena) 
  { 
	$limpia    = ""; 
    $parts    = array(); 
    $parts = split(" ",$cadena);      
    foreach($parts as $subcadena) 
    { 
        $subcadena = trim($subcadena); 
        if($subcadena!="") 
			$limpia .= $subcadena." ";
    } 
    $limpia = trim($limpia); 
    return $limpia; 
  }
?>