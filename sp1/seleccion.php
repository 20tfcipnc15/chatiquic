<?php
session_start();
if (!isset($_SESSION['super usuario']))
{ 
	header ("Location: index.php"); 
	exit; 
} 
$id_unidad_ini = $_SESSION['id_unidad']; 
$id_user_ini = $_SESSION['id_user'];
$nom = $_SESSION['nombre_ini']; 
$uni = $_SESSION['unidad_ini']; 

include("../php/fecha_hora.php");
$fecha = fecha_hora();

$fecha = $_POST['fecha'];
$fecha_fin = $_POST['fecha_fin'];
$rut = $_POST['rut'];
$unidad = $_POST['unidad_sol'];
$otro = $_POST['otro'];
$opcion = $_POST['opcion'];
$usuario = $_POST['usuario'];

if ($rut != null)
	$opcion = 'rut';
	
//	echo '<h1>sdgsdg'.$rut.'</h1>';
if($unidad == null)
	$unidad = $otro;

switch ($opcion)
{	 
	case 'procedencia':	header ("Location: libchart/demo/procedencia1.php?var=$uni&var1=$nom&var2=$fecha&var3=$unidad&var4=$fecha_fin");	break; 
								
	case 'responsable':	header ("Location: libchart/demo/responsable_local.php?var=$uni&var1=$nom&var2=$fecha&var3=$unidad&var4=$fecha_fin"); 	break; 

	case 'concluido':	header ("Location: libchart/demo/concluido.php?var=$uni&var1=$nom&var2=$fecha&var3=$unidad&var4=$fecha_fin");		break; 

	case 'destino':		header ("Location: libchart/demo/destino.php?var=$uni&var1=$nom&var2=$fecha&var3=$unidad&var4=$fecha_fin");			break; 
	
	case 'rut':			header ("Location: libchart/demo/rut.php?var=$uni&var1=$nom&var2=$fecha&var3=$unidad&var4=$rut");					break; 

	case 'tipo': 		header ("Location: libchart/demo/tipo.php?var=$uni&var1=$nom&var2=$fecha&var3=$unidad&var4=$fecha_fin");			break;
	
	case 'total': 		header ("Location: libchart/demo/total_tramites_borrar.php?var=$uni&var1=$nom&var2=$fecha&var3=$unidad&var4=$fecha_fin");	break;
	
	case 'responsable_general':	header ("Location: libchart/demo/responsable_local_general.php?var=$uni&var1=$nom&var2=$fecha&var3=$unidad&var4=$fecha_fin");	break;
	
	case 'pendiente':	header ("Location: reporte/pendiente_unidad.php?var=$uni&var1=$nom&var2=$fecha&var3=$unidad&var4=$fecha_fin");		break;
	
	case 'mensajeros':	header ("Location: reporte/mensajeros.php?var=$uni&var1=$nom&var2=$fecha&var3=$unidad&var4=$fecha_fin");		break;
		
	case 'porcentajes':	header ("Location: libchart/demo/porcentajes.php?var=$uni&var1=$nom&var2=$fecha&var3=$unidad&var4=$fecha_fin");		break;
	
	case 'usuario':	header ("Location: libchart/demo/usu1.php?var=$uni&var1=$nom&var2=$fecha&var3=$unidad&var4=$usuario");		break;
}
?>