<?php
include("../../../funciones1.php");
$link = conexion();

include("../../../php/fecha_hora.php");
$fecha_actual = fecha_hora();

$nombre_ini = $_POST['usuario'];
$unidad_ini = $_POST['unidad'];
$id_unidad_ini = $_POST['id'];
$uno = $_GET['var'];

include "../libchart/classes/libchart.php";
$chart = new PieChart(550,450);
$dataSet = new XYDataSet();

$sql = "SELECT distinct(unidad),COUNT(unidad) as total
FROM correspondencia
WHERE destino like 'Decanato' and unidad != ''
GROUP BY unidad
HAVING COUNT(unidad) between 3 and 7
ORDER BY unidad ASC";	
$res = mysql_query($sql) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
$num = mysql_num_rows($res);
if($num > 0)
{	$sum = 0;
	while ($vec = mysql_fetch_array($res))
	{
		$unidad = $vec["unidad"];
		$sum=$sum+$total = $vec["total"];
		$dataSet->addPoint(new Point("$unidad($total)", $total));
	}
}
	$dataSet->addPoint(new Point("$unidad($total)", $total));
	$chart->setDataSet($dataSet);

	$chart->setTitle("Procedencia de los Trámites");
	$chart->render("generated/demo4.png");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Libchart pie chart demonstration</title>
	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-15" />
</head>
<body>
	<img alt="Pie chart"  src="generated/demo4.png" style="border: 1px solid gray"/>
</body>
</html>
<?
$chart = new PieChart(550,450);
$dataSet = new XYDataSet();

$sql = "SELECT distinct(unidad),COUNT(unidad) as total
FROM correspondencia
WHERE destino like 'Decanato' and unidad != ''
GROUP BY unidad
HAVING COUNT(unidad)>7
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
		$dataSet->addPoint(new Point("$unidad($total)", $total));
	}
}
	$dataSet->addPoint(new Point("Otros($sum)", $sum));
	$chart->setDataSet($dataSet);

	$chart->setTitle("Procedencia de los Trámites");
	$chart->render("generated/demo3.png");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Libchart pie chart demonstration</title>
	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-15" />
</head>
<body>
	<img alt="Pie chart"  src="generated/demo3.png" style="border: 1px solid gray;"/>
</body>
</html>