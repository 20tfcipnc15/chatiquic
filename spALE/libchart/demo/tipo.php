<?php
require('../../reporte/fpdf.php');
include("../../../funciones1.php");
$link = conexion();

include ('../../fecha_int.php');
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
		$this->Cell(0,3,'Monoblock Central Edificio Antiguo P.B. Av. Villaz�n No 1995',0,1,'C');
		$this->Cell(0,3,'2441570 - 2440571 Fax: 2441092',0,1,'C');
		$this->Cell(0,3,'La Paz - Bolivia',0,1,'C');
		$this->Cell(0,3,'P�gina '.$this->PageNo().'   '.$fecha_actual,0,1,'C');
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
$pdf->SetAuthor('Aleida Iba�ez');
$pdf->SetFont('Times','B',12);
$pdf->SetFillColor(200,220,255);

$unidad_sol = strtoupper($unidad_sol);
$pdf->SetFont('Times','B',12);
$pdf->Cell(0,4,'TIPO DE TRAMITES FACULTATIVOS: '.$unidad_sol.' DEL '.strtoupper($fecha).' - '.strtoupper($fecha_fin),0,1,'C');

$pdf->SetFont('Arial','B',10);

include "../libchart/classes/libchart.php";

$chart = new PieChart(550,450);
$dataSet = new XYDataSet();

$fecha_ini = fecha_entero($fecha);
$fecha_fin = fecha_entero($fecha_fin);

if($fecha_fin == null)
	$cad = "fecha like '%$fecha%' ";
else
	$cad = "fecha_int between '$fecha_ini' and '$fecha_fin' ";

$sql = "SELECT DISTINCT (tipo), COUNT( tipo ) as total
		FROM correspondencia
		WHERE tipo != '' and unidad like '$unidad_sol' and ".$cad."
		GROUP BY tipo
		HAVING COUNT( tipo ) < 23
		ORDER BY tipo ASC";
$res = mysql_query($sql) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
$num = mysql_num_rows($res);
$sum = 0;
if($num > 0)
{	//$sum = 0;
	while ($vec = mysql_fetch_array($res))
	{
		$tipo = $vec["tipo"];
		$total = $vec["total"];
		$sum = $sum + $total;
		$dataSet->addPoint(new Point("$tipo($total)", $total));
	}
}
//$dataSet->addPoint(new Point("$tipo($total)", $total));
$chart->setDataSet($dataSet);
$chart->setTitle("TOTAL DE TRAMITES ".$sum);
$chart->render("generated/demo3.png");
$chart = new PieChart(550,450);
$dataSet = new XYDataSet();

$sql = "SELECT DISTINCT (tipo), COUNT( tipo ) as total
		FROM correspondencia
		WHERE tipo != '' and unidad like '$unidad_sol' and ".$cad."
		GROUP BY tipo
		HAVING COUNT( tipo ) >22
		ORDER BY tipo ASC";

$res = mysql_query($sql) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
$num = mysql_num_rows($res);
if($num > 0)
{	
	while ($vec = mysql_fetch_array($res))
	{
		$tipo = $vec["tipo"];
		$total = $vec["total"];
		$sum = $sum + $total;
		$dataSet->addPoint(new Point("$tipo($total)", $total));
	}
}
$dataSet->addPoint(new Point("Otros($sum)", $sum));
$chart->setDataSet($dataSet);
$chart->setTitle("TOTAL DE TRAMITES ".$sum);
$chart->render("generated/demo4.png");
$pdf->Image('generated/demo4.png',30,50,200,150,'PNG');
$pdf->AddPage();
$pdf->Image('generated/demo3.png',30,50,200,150,'PNG');
$pdf->Ln();
$pdf->Output();
?>