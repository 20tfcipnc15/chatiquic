<?php

require('../../reporte/fpdf.php');
include("../../../funciones1.php");
$link = conexion();

include("../../../php/fecha_hora.php");
$fecha_actual = fecha_hora();

$fecha_solicitud = $_POST['fecha'];
$nombre_ini = $_POST['usuario'];
$unidad_ini = $_POST['unidad'];
$id_unidad_ini = $_POST['id'];

$nom_unidad = strtoupper($unidad_ini);

$ip=$_SERVER['REMOTE_ADDR']; 
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
		$this->Image('../../../imagenes/UMSA.jpg',18,6,16,30,'JPG');
		$this->Image('../../../imagenes/loguito.jpeg',310,6,28,30,'JPEG');
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
		$this->Cell(0,3,'aleida',0,1,'C');
	    $this->SetFillColor(200,220,255);
	    $this->Ln(4);
	}
	function PrintChapter($num,$title,$file)
	{	
    	$this->AddPage();
	    $this->ChapterTitle($num,$title);
	}
	function Imagen111()
	{
		$this->Image('../../imagenes/loguito.jpeg',310,6,28,30,'JPEG');
		$this->Cell(0,3,'La Paz - Bolivia ALEDIA RAQUEL IBAÑEZ APAZA',0,1,'C');
	}
}
$pdf=new PDF('l','mm','legal');
$pdf->AddPage();
$pdf->SetMargins(2.5,2.5,2.5);
$pdf->SetAuthor('Aleida Ibañez');
$pdf->SetFont('Times','B',12);
$pdf->SetFillColor(200,220,255);
//$pdf->AddImage('../../imagenes/loguito.jpeg',310,6,28,30,'JPEG');
//$pdf->Imagen111();
//$pdf->ChapterTitle(2222,'hola');
$pdf->Cell(0,4,'CORRESPONDENCIA RECIBIDA',0,1,'C');
$pdf->SetFont('Arial','B',10);


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
	$pdf->Image('generated/demo4.png',30,50,200,150,'PNG');
$pdf->Ln();
$pdf->Output();
?>