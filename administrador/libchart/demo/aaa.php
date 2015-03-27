<?php
include("../../../funciones1.php");
$link = conexion();

include("../../../php/fecha_hora.php");
$fecha_actual = fecha_hora();

$fecha_solicitud = $_POST['fecha'];
$nombre_ini = $_POST['usuario'];
$unidad_ini = $_POST['unidad'];
$id_unidad_ini = $_POST['id'];

$uni = $_GET['var'];
$nom = $_GET['var1'];
$fecha = $_GET['var2'];
$unidad_sol = $_GET['var3'];

$nom_unidad = strtoupper($uni);

$ip=$_SERVER['REMOTE_ADDR']; 

include "../libchart/classes/libchart.php";
$sql = "SELECT distinct(unidad),COUNT(unidad) as total
		FROM correspondencia
		WHERE destino like '$unidad_sol' and unidad != '' and fecha like '%$fecha%'
		GROUP BY unidad
		HAVING COUNT(unidad) > 10
		ORDER BY unidad ASC";	
$res = mysql_query($sql) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
$num = mysql_num_rows($res);
$num ++;
//if ($num > 15)
$c=0;
if($num > 0)
{	$sw=0;
	while ($sw==0)
	{	$sum = 0;
		$chart = new PieChart(550,450);
		$dataSet = new XYDataSet();
		while ($vec = mysql_fetch_array($res))
		{
			$unidad = $vec["unidad"];
			$sum = $sum + $total = $vec["total"];
			$dataSet->addPoint(new Point("$unidad($total)", $total));
			$c++;
			if($c >15)
				break;
		}
	$dataSet->addPoint(new Point("$unidad($total)", $total));
	$chart->setDataSet($dataSet);
	$chart->setTitle("Otras Unidades en Detalle");
	$chart->render("generated/demo3.png");
	}
}

$chart = new PieChart(550,450);
$dataSet = new XYDataSet();

$sql = "SELECT distinct(unidad),COUNT(unidad) as total
			FROM correspondencia
			WHERE destino like '$unidad_sol' and unidad != '' and fecha like '%$fecha%'
			GROUP BY unidad
			HAVING COUNT(unidad) between 5 and 10
			ORDER BY unidad ASC";	
$res = mysql_query($sql) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
$num = mysql_num_rows($res);
$num++;

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
$i++;
echo '<h1>raquel********'.$i.'---'.$unidad_sol.'</h1>';
$dataSet->addPoint(new Point("Otros($sum)", $sum));
$chart->setDataSet($dataSet);
$chart->setTitle("Procedencia de los Trámites");
$chart->render("generated/demo4.png");
/*}
else
{*/
/*$sql = "SELECT distinct(unidad),COUNT(unidad) as total
FROM correspondencia
WHERE destino like '$unidad_sol' and unidad != '' and fecha like '%$fecha%'
GROUP BY unidad
HAVING COUNT(unidad)>0
ORDER BY unidad ASC";	
$res = mysql_query($sql) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
$num = mysql_num_rows($res);
$num++;

echo '<h1>ibañez'.$num.'</h1>';
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
$chart->setDataSet($dataSet);
$chart->setTitle("Procedencia de los Trámites");
$chart->render("generated/demo5.png");*/
//}
?>
<img src="generated/demo3.png" width="550" height="450">
<img src="generated/demo4.png" width="550" height="450">