<?php
//Recibimos los datos del formulario anterior
$long = $_POST['long'];
$fecha = $_POST['fecha'];
$procedencia = $_POST['procedencia'];
$correlativo = $_POST['correlativo'];
$referencias = $_POST['referencias'];
$rut = $_POST['rut'];
$unidad = $_POST['unidad'];
$unidad=strtoupper($unidad);

include("../../funciones1.php");
$link=conexion();
require('fpdf.php');
//$id_c=$_POST['id_c'];
//$ip=$_SERVER['REMOTE_ADDR']; 
class PDF extends FPDF
{
	function Header()
	{	global $valor;
		global $unidad;
		global $id_c;
		$this->SetFont('Times','B',12);
		$this->Cell(80);
		$this->Cell(200,7,'',0,1,'C');
		$this->Cell(220,4,'CHASQUI  DIGITAL',0,1,'C');
		$this->SetFont('Arial','B',11);
		$this->Cell(220,7,$unidad.' F.C.P.N.',0,1,'C');
		$sql = "SELECT rut FROM correspondencia order by id_c Desc limit 1"; 
		$res=mysql_query($sql);
		$num = mysql_num_rows($res);

		$linea=mysql_fetch_array($res);	
		$rut=$linea["rut"];
		
		$this->Cell(220,4,'R.U.T.  Nº  '.$rut,0,1,'C');	
		$this->Image('../../imagenes/loguito.jpeg',185,6,19,20,'JPEG');
		$this->Image('../../imagenes/UMSA.jpg',10,6,11,22,'JPG');
	}
	function Footer()
	{	include("../../php/fecha_hora.php");
		$fecha=fecha_hora();
		global $valor;
	    $this->SetY(-15);
	    $this->SetFont('Arial','I',8);
	    $this->SetTextColor(128);
		$this->Cell(0,3,'http://www.fcpndigital.umsa.bo/chasqui',0,1,'C');
		$this->Cell(0,3,'Monoblock Central Edificio Antiguo P.B. Av. villazón No 1995',0,1,'C');
		$this->Cell(0,3,'2441570 - 2440571 Fax: 2441092',0,1,'C');
		$this->Cell(0,3,'La Paz - Bolivia',0,1,'C');
		$this->Cell(0,3,$fecha,0,1,'C');
	}
	function ChapterTitle($num,$label)
	{
	    $this->SetFont('Arial','B',7);
	    $this->SetFillColor(200,220,255);
	    $this->Ln(4);
	}
	function PrintChapter($num,$title,$file)
	{	
    	$this->AddPage();
	    $this->ChapterTitle($num,$title);
	}
}
$tam=array();
$tam[0]=210;
$tam[1]=320;
$pdf=new PDF('l','mm',$tam);
$pdf->SetMargins(3,3,3) ;
$pdf->SetAuthor('Aleida Ibañez');
$pdf->PrintChapter(1,'','');
$pdf->SetFont('Arial','B',8);
$pdf->Ln();

	$pdf->Cell(1,6,'',0,0,'C');
	$pdf->Cell(18,6,'RUT',1,0,'C','1');
	$pdf->Cell(34,6,'FECHA',1,0,'C','1');
	$pdf->Cell(45,6,'PROCEDENCIA',1,0,'C','1');
	$pdf->Cell(35,6,'REG. EXT.',1,0,'C','1');
	$pdf->Cell(80,6,'REFERENCIAS',1,0,'C','1');
	$pdf->Cell(34,6,'PRIMERA RUTA',1,0,'C','1');
	$pdf->Cell(34,6,'SEGUNDA RUTA',1,0,'C','1');
	$pdf->Cell(34,6,'TERCERA RUTA',1,1,'C','1');
//Desplegamos los datos correspondientes
	$pdf->Cell(1,25,'',0,0,'C');
	$pdf->Cell(18,25,$rut,1,0,'C','0');
	$pdf->Cell(34,25,$fecha,1,0,'C','0');
	$pdf->Cell(45,25,$procedencia,1,0,'C','0');
	$pdf->Cell(35,25,$correlativo,1,0,'C','0');
	$pdf->Cell(80,25,$referencias,1,0,'C','0');
	$pdf->Cell(34,25,'',1,0,'C','0');
	$pdf->Cell(34,25,'',1,0,'C','0');
	$pdf->Cell(34,25,'',1,1,'C','0');
$pdf->Ln();
$pdf->Output();
?>