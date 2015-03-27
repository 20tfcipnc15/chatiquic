<?php
include("../funciones1.php");
$link = conexion();

include("../php/fecha_hora.php");
$fecha_actual = fecha_hora();

$nombre_ini = $_POST['usuario'];
$unidad_ini = $_POST['unidad'];
$id_unidad_ini = $_POST['id'];
$uno = $_GET['var'];

$sql = "SELECT distinct(unidad),COUNT(unidad) as total
FROM correspondencia
WHERE destino like 'Decanato'
GROUP BY unidad
HAVING COUNT(unidad)>0
ORDER BY unidad ASC";	
$res = mysql_query($sql) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
$num = mysql_num_rows($res);
if($num > 0)
{	$i = 0;
	while ($vec = mysql_fetch_array($res))
	{
		$unidad = $vec["unidad"];
		$total = $vec["total"];
		$i++;
	}
}

include "libchart/libchart/classes/libchart.php";

	$chart = new PieChart();

	$dataSet = new XYDataSet();
	$dataSet->addPoint(new Point("Mozilla Firefox (80)", 80));
	$dataSet->addPoint(new Point("Konqueror (75)", 75));
	$dataSet->addPoint(new Point("Opera (50)", 50));
	$dataSet->addPoint(new Point("Safari (37)", 37));
	$dataSet->addPoint(new Point("Dillo (37)", 37));
	$dataSet->addPoint(new Point("Other (100)", 100));
	$chart->setDataSet($dataSet);

	$chart->setTitle("User agents for www.example.com");
	$chart->render("generated/demo3.png");
?>