<?php
require('../../reporte/fpdf.php');
include("../../../funciones1.php");
$link = conexion();
include ('../../fecha_int.php');
include "../libchart/classes/libchart.php";
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
$fecha_fin = $_GET['var4'];

$nom_unidad = strtoupper($uni);

$ip=$_SERVER['REMOTE_ADDR']; 
class PDF extends FPDF
{
	function Header()
	{	
		global $fecha_actual;
		global $nom_unidad;
		global $nom;
		global $uni;
		global $fecha;
		$this->SetFont('Times','B',14);
		$this->Cell(80);
		$this->Cell(200,7,'',0,1,'C');	
		$this->Cell(0,4,'CHASQUI  DIGITAL',0,1,'C');
		$this->Ln();
		$this->SetFont('Arial','B',11);
		$this->Cell(0,4,$nom_unidad.' F.C.P.N.',0,1,'C');
		$this->Ln();
		$this->Cell(0,4,'REPORTE DE FECHA: '.$fecha_actual,0,1,'C');
		$this->Cell(0,4,'',0,1,'C');
		$this->Image('../../../imagenes/UMSA.jpg',18,6,16,30,'JPG');
		$this->Image('../../../imagenes/loguito.jpeg',310,6,28,30,'JPEG');
		$this->Ln();
	}
	function Footer()
	{	
		global $fecha_actual;
	    $this->SetY(-15);
	    $this->SetFont('Arial','I',9);
	    $this->SetTextColor(128);
		$this->Cell(0,3,'Monoblock Central Edificio Antiguo P.B. Av. Villazón No 1995',0,1,'C');
		$this->Cell(0,3,'2441570 - 2440571 Fax: 2441092',0,1,'C');
		$this->Cell(0,3,'La Paz - Bolivia',0,1,'C');
		$this->Cell(0,3,'Página '.$this->PageNo().'   '.$fecha_actual,0,1,'C');
		$result = mysql_query($sql);
	}
	function ChapterTitle($num,$label)
	{
	    $this->SetFont('Arial','B',10);
	    $this->SetFillColor(200,220,255);
	    $this->Ln(4);
	}
	function PrintChapter($num,$title,$file)
	{	
    	$this->AddPage();
	    $this->ChapterTitle($num,$title);
	}
}
$pdf=new PDF('l','mm','legal');
$pdf->AddPage();
$pdf->SetMargins(2.5,2.5,2.5);
$pdf->SetAuthor('Aleida Ibañez');
$pdf->SetFont('Times','B',12);
$pdf->SetFillColor(200,220,255);

$unidad_sol = strtoupper($unidad_sol);
$pdf->SetFont('Arial','B',10);

$sql = "SELECT nombre FROM user";
$resp = mysql_query($sql);
$filas = mysql_num_rows($resp);
if($filas!=0)
{ 	
	$a=0;
    while($linea1=mysql_fetch_array($resp))
	{  	
		$nombre = $linea1['nombre'];
		$vec[$a]=$nombre;
		$a++;
	}
}
$cad='';
for ($b=0; $b < $a; $b++)
{	
	$nom = $vec[$b];
	$cad = $cad." and destino != '".$nom."'";
}
$var = strlen($cad);
$cad = substr($cad,4,$var);

$long = strlen($fecha);

$fecha_ini = fecha_entero($fecha);
$fecha_fin = fecha_entero($fecha_fin);

if($fecha_fin == null)
	$cad1 = "fecha like '%$fecha%' ";
else
	$cad1 = "fecha_int between '$fecha_ini' and '$fecha_fin' ";
	
$cont=0;
if( $long == 4 or $long == 0)
{	$chart = new PieChart(550,450);
	$dataSet = new XYDataSet();
	$sql = "SELECT distinct(destino),COUNT(destino) as total
			FROM correspondencia
			WHERE ".$cad." and destino !='' and ".$cad1."
			GROUP BY destino
			HAVING COUNT(destino) < 3
			ORDER BY destino ASC";	
	$res = mysql_query($sql) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
	$num = mysql_num_rows($res);
	if($num > 0)
	{	$sum1 = 0;
		while ($vec = mysql_fetch_array($res))
		{
			$unidad = $vec["destino"];
			$sum1 = $sum1 + $total = $vec["total"];
		}
	}
	$sql = "SELECT distinct(destino),COUNT(destino) as total
			FROM correspondencia
			WHERE ".$cad." and destino !='' and ".$cad1."
			GROUP BY destino
			HAVING COUNT(destino) between 7 and 22
			ORDER BY destino ASC";	
	$res = mysql_query($sql) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
	$num = mysql_num_rows($res);
	if($num > 0)
	{	$sum = 0;
		while ($vec = mysql_fetch_array($res))
		{
			$unidad = $vec["destino"];
			$sum = $sum + $total = $vec["total"];
			$dataSet->addPoint(new Point("$unidad($total)", $total));
			$j++;
		}
	}
	$dataSet->addPoint(new Point("Otras < 3($sum1)", $sum1));
	$chart->setDataSet($dataSet);
	$chart->setTitle("Otras Unidades Destino en Detalle");
	$chart->render("generated/demo4.png");

	$chart = new PieChart(550,450);
	$dataSet = new XYDataSet();
	$sql = "SELECT distinct(destino),COUNT(destino) as total
	FROM correspondencia
	WHERE ".$cad." and destino !='' and ".$cad1."
	GROUP BY destino
	HAVING COUNT(destino) > 22
	ORDER BY destino ASC";	
	$res = mysql_query($sql) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
	$num = mysql_num_rows($res);
	if($num > 0)
	{	
		while ($vec = mysql_fetch_array($res))
		{
			$unidad = $vec["destino"];
			$total = $vec["total"];
			$sum2 = $sum2 + $total;
			$dataSet->addPoint(new Point("$unidad($total)", $total));
			$j++;
		}
	}
	$dataSet->addPoint(new Point("Otros($sum)", $sum));
	$chart->setDataSet($dataSet);
	///////////////
	$cont=$sum+$sum1+$sum2;
//////////////////////////////////
	$chart->setTitle("Total de tramites: ".$cont);
	$chart->render("generated/demo3.png");
	$pdf->SetFont('Times','B',12);
	$pdf->Cell(0,4,'FLUJO DE TRAMITES FACULTATIVO ANUAL',0,1,'C');
	$pdf->Image('generated/demo3.png',30,50,200,150,'PNG');
	$pdf->AddPage();
	$pdf->Image('generated/demo4.png',30,50,200,150,'PNG');
}
elseif($long == 3)
{	$chart = new PieChart(550,450);
	$dataSet = new XYDataSet();
	$sql = "SELECT distinct(destino),COUNT(destino) as total
			FROM correspondencia
			WHERE ".$cad." and destino !='' and ".$cad1."
			GROUP BY destino
			HAVING COUNT(destino) between 3 and 7
			ORDER BY destino ASC";	
	$res = mysql_query($sql) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
	$num = mysql_num_rows($res);
	if($num > 0)
	{	$sum = 0;
		while ($vec = mysql_fetch_array($res))
		{
			$unidad = $vec["destino"];
			$sum = $sum + $total = $vec["total"];
			$dataSet->addPoint(new Point("$unidad($total)", $total));
			$j++;
		}
	}
	$chart->setDataSet($dataSet);
	$chart->setTitle("Otras Unidades Destino en Detalle");
	$chart->render("generated/demo4.png");
	$chart = new PieChart(550,450);
	$dataSet = new XYDataSet();
	$sql = "SELECT distinct(destino),COUNT(destino) as total
	FROM correspondencia
	WHERE ".$cad." and destino !='' and ".$cad1."
	GROUP BY destino
	HAVING COUNT(destino) > 7
	ORDER BY destino ASC";	
	$res = mysql_query($sql) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
	$num = mysql_num_rows($res);
	if($num > 0)
	{	
		while ($vec = mysql_fetch_array($res))
		{
			$unidad = $vec["destino"];
			$total = $vec["total"];
			$sum2 = $sum2 +$total;
			$dataSet->addPoint(new Point("$unidad($total)", $total));
			$j++;
		}
	}
	///////////////
	$cont=$sum+$sum2;
//////////////////////////////////
	$dataSet->addPoint(new Point("Otros($sum)", $sum));
	$chart->setDataSet($dataSet);
	$chart->setTitle("Total de tramites ".$cont);
	$chart->render("generated/demo3.png");
	$fecha = mes_completo($fecha);
	$pdf->Cell(0,4,'FLUJO DE TRAMITES FACULTATIVO MES DE: '.$fecha,0,1,'C');
	$pdf->Image('generated/demo3.png',30,50,200,150,'PNG');
	$pdf->AddPage();
	$pdf->Image('generated/demo4.png',30,50,200,150,'PNG');
}
elseif($long > 5)
{
	$chart = new PieChart(550,450);
	$dataSet = new XYDataSet();
	$pdf->Cell(0,4,'DESTINO DE LOS TRAMITES: '.$unidad_sol.' DEL '.strtoupper($fecha).' - '.strtoupper($fecha_fin),0,1,'C');
	
	$sql = "SELECT distinct(destino),COUNT(destino) as total
	FROM correspondencia
	WHERE ".$cad." and destino !='' and ".$cad."
	GROUP BY destino
	HAVING COUNT(destino) > 0
	ORDER BY destino ASC";	

	$res = mysql_query($sql) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
	$num = mysql_num_rows($res);
	if($num > 0)
	{	
		while ($vec = mysql_fetch_array($res))
		{
			$unidad = $vec["destino"];
			$total = $vec["total"];
			$sum = $sum+ $total;
			$dataSet->addPoint(new Point("$unidad($total)", $total));
		}
	}
	$chart->setDataSet($dataSet);
    $pdf->SetFont('Arial','I',12);
	$chart->setTitle("Total de Tramites " .$sum);
	$chart->render("generated/demo7.png");
	$pdf->Image('generated/demo7.png',30,50,200,150,'PNG');
}
$pdf->Ln();
$pdf->Output();
?>