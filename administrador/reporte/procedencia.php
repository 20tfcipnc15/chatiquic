<?php
require('fpdf.php');
include("../../funciones1.php");
$link = conexion();

include("../../php/fecha_hora.php");
$fecha_actual = fecha_hora();

$nombre_ini = $_POST['usuario'];
$unidad_ini = $_POST['unidad'];
$id_unidad_ini = $_POST['id'];
$uno = $_GET['var'];

$nom_unidad = strtoupper($unidad_ini);

$ip = $_SERVER['REMOTE_ADDR']; 

class PDF extends FPDF
{
	function Header()
	{	$fecha_solicitud= $_POST['fecha'];
		global $fecha_solicitud;
		global $nom_unidad;
		$this->SetFont('Times','B',14);
		$this->Cell(80);
		$this->Cell(200,7,'',0,1,'C');	
		$this->Cell(0,4,'CHASQUI  DIGITAL',0,1,'C');
		$this->Ln();
		$this->SetFont('Arial','B',11);
		$this->Cell(0,4,$nom_unidad.' F.C.P.N.',0,1,'C');
		$this->Ln();
		$this->Cell(0,4,'REPORTE DE FECHA: '.$fecha_solicitud,0,1,'C');
		$this->Cell(0,4,'',0,1,'C');
		$this->Image('../../imagenes/UMSA.jpg',18,6,16,30,'JPG');
		$this->Image('../../imagenes/loguito.jpeg',310,6,28,30,'JPEG');
		$this->Ln();
	}
	function Footer()
	{	
		global $fecha_actual;
    	//Posición a 1,5 cm del final
	    $this->SetY(-15);
    	//Arial itálica 8
	    $this->SetFont('Arial','I',9);
    	//Color del texto en gris
	    $this->SetTextColor(128);
//		$this->Cell(0,3,'http://fcpndigital.umsa.bo/chasqui',0,1,'C');
		$this->Cell(0,3,'Monoblock Central Edificio Antiguo P.B. Av. Villazón No 1995',0,1,'C');
		$this->Cell(0,3,'2441570 - 2440571 Fax: 2441092',0,1,'C');
		$this->Cell(0,3,'La Paz - Bolivia',0,1,'C');
		$this->Cell(0,3,'Página '.$this->PageNo().'   '.$fecha_actual,0,1,'C');
		$result = mysql_query($sql);
	   	//Número de página
	}
	function ChapterTitle($num,$label)
	{
    	//Arial 12
	    $this->SetFont('Arial','B',10);
    	//Color de fondo
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
$pdf->SetMargins(3,3,3);
$pdf->SetAuthor('Aleida Ibañez');
$pdf->SetFont('Times','B',12);
$pdf->SetFillColor(200,220,255);

$pdf->Cell(0,4,'PROCEDENCIA DE LOS TRAMITES',0,1,'C');
$pdf->SetFont('Arial','B',10);
$pdf->Ln(4);
//$pdf->Cell(5,7,'',0,0,'C');
$pdf->Cell(18,7,' Nº. ',1,0,'C','1');
$pdf->Cell(45,7,'UNIDAD',1,0,'C','1');
$pdf->Cell(45,7,'TOTAL',1,1,'C','1');
$pdf->Image('../../img/UMSA1.jpg',22,9,36,62,'JPG');
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
		$pdf->Cell(18,7,$i,1,0,'C','0');
		$pdf->Cell(60,7,$unidad,1,0,'L','0');
		$pdf->Cell(45,7,$total,1,1,'C','0');
	}
}
///////////
	include "../libchart/classes/libchart.php";

/*	$chart = new PieChart();

	$dataSet = new XYDataSet();
	$dataSet->addPoint(new Point("Mozilla Firefox (80)", 80));
	$dataSet->addPoint(new Point("Konqueror (75)", 75));
	$dataSet->addPoint(new Point("Opera (50)", 50));
	$dataSet->addPoint(new Point("Safari (37)", 37));
	$dataSet->addPoint(new Point("Dillo (37)", 37));
	$dataSet->addPoint(new Point("Other (100)", 100));
	$chart->setDataSet($dataSet);

	$chart->setTitle("User agents for www.example.com");
	$chart->render("generated/demo3.png");*/
///////////
$pdf->Ln();
$pdf->Output();
?>