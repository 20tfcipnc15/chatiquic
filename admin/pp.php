<?
	$hora = '876324';
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
	echo $hora;
?>