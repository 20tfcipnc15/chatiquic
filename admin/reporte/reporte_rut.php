<?php
include("../../funciones1.php");
$link=conexion();

$rut = $_POST['rut'];
$fecha = $_POST['fecha'];
$responsable = $_POST['responsable'];
$correlativo = $_POST['correlativo'];
$hoja_ruta = $_POST['hoja_ruta'];
$fojas = $_POST['fojas'];
$referencias = $_POST['referencias'];
$procedencia = $_POST['procedencia'];
$unidad = $_POST['unidad'];
$unidad = strtoupper($unidad);
$fecha = $_POST['fecha'];
$tipo = $_POST['tipo'];
$nombre_ini = $_POST['usuario'];
$id_unidad_ini = $_POST['id'];

require('fpdf.php');
$pdf=new FPDF('p','mm','letter');
$pdf->SetMargins(0,0,0) ;
$pdf->SetAutoPageBreak(1,0);
$pdf->AddPage();
$pdf->Rect (142,30,68,43); 
$pdf->Rect (141,29,70,45); 
$pdf->Line(142,47,210,47);
$pdf->SetFont('Times','B',8);
$pdf->Cell(352,68,'FACULTAD DE CIENCIAS PURAS Y NATURALES',0,1,'C');
//$pdf->Ln(1);
$pdf->SetFont('Times','B',9);
$pdf->Cell(355,-58,$unidad,0,1,'C');
$pdf->SetFont('Times','B',8);
$pdf->Cell(355,67,'CHASQUI  DIGITAL',0,1,'C');
$pdf->Ln(1);
$pdf->Image('../../img/escudo8.jpg',145,36,5,10,'JPG');
$pdf->SetFont('Arial','B',9);
$pdf->Cell(142,15,'',0,0,'L');
$pdf->Cell(5,-55,'R.U.T.: ',0,0,'L');
$pdf->SetFont('Arial','B',10);
$pdf->Cell(24,5,'',0,0,'L');
$pdf->Cell(15,-55,$rut,0,1,'L');

$pdf->SetFont('Arial','B',8.5);
$pdf->Cell(142,5,'',0,0,'L');
$pdf->Cell(5,65,'TIPO DE TRAMITE:',0,0,'L');
$pdf->Cell(24,5,'',0,0,'L');
$pdf->SetFont('Arial','',9);
$pdf->Cell(10,65,substr($tipo,0,23),0,1,'L');

/*$pdf->SetFont('Arial','B',8.5);
$pdf->Cell(142,-70,'',0,0,'L');
$pdf->Cell(355,-70,'RECIBIDO POR:         '.$responsable,0,0,'L');
//$pdf->Cell(142,-70,'',0,0,'L');
$pdf->SetFont('Arial','',9);
$pdf->Cell(360,-70,$responsable,0,1,'L');*/

$pdf->SetFont('Arial','B',8.5);
$pdf->Cell(142,-55,'',0,0,'L');
$pdf->Cell(5,-55,'FECHA Y HORA:',0,0,'L');
$pdf->SetFont('Arial','',9);
$pdf->Cell(24,-55,'',0,0,'L');
$pdf->Cell(5,-55,$fecha,0,1,'L');

$pdf->SetFont('Arial','B',8.5);
$pdf->Cell(142,65,'',0,0,'L');
$pdf->Cell(5,65,'RECIBIDO POR: ',0,0,'L');
$pdf->SetFont('Arial','',9);
$pdf->Cell(24,65,'',0,0,'L');
$pdf->Cell(5,65,$responsable,0,1,'L');

$pdf->SetFont('Arial','B',8.5);
$pdf->Cell(142,-55,'',0,0,'L');
$pdf->Cell(5,-55,'FS: ',0,0,'L');
$pdf->SetFont('Arial','',9);
$pdf->Cell(2,-55,'',0,0,'L'); 
$pdf->Cell(5,-55,substr($fojas,0,15),0,0,'L');
$pdf->Cell(17,-55,'',0,0,'L');
$pdf->SetFont('Arial','B',8.5);
$pdf->Cell(10,-55,'FIRMA:',0,0,'L');
$pdf->SetFont('Arial','',9);
$pdf->Cell(15,-55,'   .........................',0,1,'L');

/*$pdf->SetFont('Arial','B',8.5);
$pdf->Cell(142,80,'',0,0,'L');
$pdf->Cell(5,80,'FIRMA: ',0,0,'L');
$pdf->SetFont('Arial','',9);
$pdf->Cell(24,80,'',0,0,'L');
$pdf->Cell(15,80,'........................................',0,1,'L');*/

$pdf->Ln();
$pdf->Output();
?>