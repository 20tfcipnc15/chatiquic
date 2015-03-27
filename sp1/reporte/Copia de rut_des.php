<?php
session_start();
if (!isset($_SESSION['paso_por_donde_yo_quiero']))
{ 
	header ("Location: index.php"); 
	exit; 
} 
$id_user=$_SESSION['id_user'];
$nombre=$_SESSION['nombre_ini']; 
$unidad=$_SESSION['unidad_ini']; 
$id_unidad=$_SESSION['id_unidad']; 
$unidad=strtoupper($unidad);
include("../../funciones1.php");
$link=conexion();
require('fpdf.php');
//$valor=$_POST['fecha'];
//$ip=$_SERVER['REMOTE_ADDR']; 
class PDF extends FPDF
{
	function Header()
	{	global $valor;
		global $unidad;
		$this->SetFont('Arial','B',11);
		$this->Cell(80);
		$this->Cell(200,7,'',0,1,'C');
		$this->Cell(220,4,'CHASQUI  DIGITAL',0,1,'C');
		$this->Cell(220,4,$unidad.' F.C.P.N.',0,1,'C');
		$this->Ln();
		$this->Cell(220,4,'REGISTRO UNICO DE TRAMITE',0,1,'C');
		
		$sql = "SELECT rut FROM correspondencia order by id_c Desc limit 1"; 
		$res=mysql_query($sql);
		$num = mysql_num_rows($res);

		$linea=mysql_fetch_array($res);	
		$rut=$linea["rut"];
		
		$this->Cell(220,4,'Nº '.$rut,0,1,'C');
		$this->Image('../../imagenes/loguito.jpeg',185,6,19,20,'JPEG');
		$this->Image('../../imagenes/UMSA.jpg',18,6,11,22,'JPG');
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
$tam[0]=215;
$tam[1]=140;
$pdf=new PDF('p','mm',$tam);
//pdf=new FPDF(’L',’cm’,'Legal’);
$pdf->SetMargins(3,3,3) ;
$pdf->SetAuthor('Aleida Ibañez');
$pdf->PrintChapter(1,'','');
$pdf->Ln();

	$pdf->Cell(5,6,'',0,0,'C');
	$pdf->Cell(30,6,'FECHA',1,0,'C','1');
	$pdf->Cell(30,6,'ORIGEN',1,0,'C','1');
	$pdf->Cell(27,6,'DESPACHADO POR',1,0,'C','1');
	$pdf->Cell(30,6,'TIPO',1,0,'C','1');
	$pdf->Cell(10,6,'FOJAS',1,0,'C','1');
	$pdf->Cell(30,6,'DESTINO',1,0,'C','1');
	$pdf->Cell(40,6,'REFERENCIAS',1,1,'C','1');
//	$pdf->ln();
	
$sql = "SELECT * FROM correspondencia order by id_c Desc limit 1"; 
$res=mysql_query($sql);
$num = mysql_num_rows($res);
if($num > 0)
{
	$linea=mysql_fetch_array($res);	
	$fecha=$linea["fecha"];
	$unidad=$linea["unidad"];
	$responsable=$linea["responsable"];
	$tipo=$linea["tipo"];
	$referencias=$linea["referencias"];
	$fojas=$linea["fojas"];
	$destino=$linea["destino"];
	$rut=$linea["rut"];
	$pdf->Cell(5,6,'',0,0,'C');
	$pdf->Cell(30,6,$fecha,1,0,'C');
	$pdf->Cell(30,6,$unidad,1,0,'C');
	$pdf->Cell(27,6,$responsable,1,0,'C');
	$pdf->Cell(30,6,$tipo,1,0,'C');
	$pdf->Cell(10,6,$fojas,1,0,'C');
	$pdf->Cell(30,6,$destino,1,0,'C');
	$pdf->MultiCell(40,3,$referencias,1,1,'L');
}
$pdf->Ln();
$pdf->Output();
?>