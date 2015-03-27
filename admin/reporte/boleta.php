<?php
include("../../funciones1.php");
$link=conexion();
include("../../php/fecha_hora.php");
require('fpdf.php');
$pdf=new FPDF('p','mm','letter');
$pdf->SetMargins(0,0,0) ;
$pdf->SetAutoPageBreak(1,0);
$pdf->AddPage();

$pdf->Rect (2,2,212,65); 
//$pdf->Rect (141,29,70,45); 
$pdf->Line(180,2,180,22);
$pdf->Line(160,2,160,22);
$pdf->Line(2,22,214,22);
//efrain
$dias = array("DOM","LUN","MAR","MIE","JUE","VIE","SAB");
$fecha2 = $dias[date("w")];
//efrain
//$pdf->SetFont('Times','B',8);
//$pdf->Cell(352,2,'',0,1,'C');
$id_c = $_POST["id_c"];
$sql = "SELECT * FROM correspondencia WHERE id_c = '$id_c'"; 
$res=mysql_query($sql);
$num = mysql_num_rows($res);
if($num > 0)
{
//Obtenemos los datos del último Registro
	$linea=mysql_fetch_array($res);	
	$correlativo=$linea["correlativo"];
	$fecha=$linea["fecha"];
	$unidad=$linea["unidad"];
	$responsable=$linea["responsable"];
	$tipo=$linea["tipo"];
	$referencias=$linea["referencias"];
	$destino=$linea["destino"];
	$fojas=$linea["fojas"];
	$rut=$linea["rut"];

//OBTENEMOS LOS DATOS DEL PENULTIMO REGISTRO
	$pdf->SetFont('Times','B',10);
	$linea=mysql_fetch_array($res);	
	$procedencia=$linea["unidad"];
	$pdf->Cell(15,4,'',0,1,'L');
	$pdf->Cell(15,5,'',0,0,'L');
	$pdf->Cell(150,5,'FACULTAD DE CIENCIAS PURAS Y NATURALES',0,1,'C');
	$pdf->Cell(15,5,'',0,0,'L');
	$pdf->Cell(150,5,strtoupper($unidad),0,0,'C');
	$pdf->SetFont('Times','',10);
	$pdf->Cell(10,5,'No '.$correlativo,0,0,'C');
	$pdf->SetFont('Times','B',10);
	$pdf->Cell(45,5,'RUT:  '.$rut,0,1,'C');
	$pdf->Cell(15,5,'',0,0,'L');
	$pdf->Cell(150,5,'CHASQUI DIGITAL',0,1,'C');
	$pdf->Ln();


	$pdf->SetFont('Times','',11);
	$pdf->Cell(20,7,'',0,0,'L');
	$pdf->Cell(200,7,'Señor Jefe de '.strtoupper($destino),0,1,'L');
	$pdf->Cell(20,7,'',0,0,'L');
	$pdf->Cell(210,7,'El Señor Decano de la Facultad de Ciencias Puras y Naturales, solicita elevar a este despacho el',0,1,'L');
	$pdf->Cell(20,7,'',0,0,'L');
	$pdf->Cell(110,7,'Informe de '.strtoupper($tipo),0,1,'L');
	$pdf->Cell(20,7,'',0,0,'L');
	$pdf->Cell(210,7,'Del(a) Universitario(a): '.strtoupper($referencias),0,1,'L');
	
	$mes = substr($fecha,3,3);
	$mes = mes_completo_min($mes);
	$año = año($fecha);
	$pdf->Cell(20,7,'',0,0,'L');
	$pdf->Cell(75,7,'La Paz, '.$fecha2.substr($fecha,0,2).' de '.$mes.' de '.$año,0,0,'L');
	$pdf->Cell(70,7,'Fojas: '.$fojas,0,1,'L');
	$pdf->Cell(20,7,'',0,0,'L');
	$pdf->Cell(75,7,'Despachado por: '.$responsable,0,0,'L');
	$pdf->Cell(70,7,'Entregado a: ...........................................................',0,1,'L');
}
$pdf->Ln();
$pdf->Output();
?>