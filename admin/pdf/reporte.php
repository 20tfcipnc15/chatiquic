<?php
require('fpdf.php');
$tam=array();
$tam[0]=57;
$tam[1]=67;
$pdf=new FPDF('p','mm',$tam);
$pdf->SetMargins(0,0,0) ;
$pdf->SetAutoPageBreak(1,0);
$pdf->AddPage();
$pdf->SetFont('Arial','B',7);

$pdf->Cell(57,3,'Monoblock Central Edificio Antiguo P.B.',0,1,'C');
$pdf->Cell(57,3,'Av. villazón No 1995',0,1,'C');
$pdf->Cell(57,3,'2441570 - 2440571 Fax: 2441092',0,1,'C');
$pdf->Cell(57,3,'La Paz - Bolivia',0,1,'C');
$pdf->Ln();
$pdf->Cell(57,3,'COMPROBANTE ORIGINAL',0,1,'C');
$pdf->Cell(57,3,'- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -',0,1,'C');
////////
$pdf->Cell(25,3,'REGISTRO Nº:',0,0,'L');
$pdf->Cell(25,3,'campo 1', 1,0,1,'L');
$pdf->Cell(25,3,'CODIGO:',0,0,'L');
$pdf->Cell(25,3,'campo 2',0,1,'L');
//$pdf->Cell(57,3,'- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -',0,1,'C');
$pdf->Ln();
$pdf->Cell(25,3,'REMITENTE:',0,0,'L');
$pdf->Cell(25,3,'TIPO DE TRAMITE:',0,0,'L');
$pdf->Cell(25,3,'campo 3',0,1,'L');
$pdf->Cell(25,3,'REGISTRO EXT:',0,0,'L');
$pdf->Cell(25,3,'campo 4',0,1,'L');
$pdf->Ln();
$pdf->Output();
?>