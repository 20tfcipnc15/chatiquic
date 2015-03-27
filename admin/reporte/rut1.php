<?php
include("../../funciones.php");
$link=conexion();

require('fpdf.php');
$tam=array();
$tam[0]=57;
$tam[1]=67;
$pdf=new FPDF('p','mm',$tam);
$pdf->SetMargins(0,0,0) ;
$pdf->SetAutoPageBreak(1,0);
$pdf->AddPage();
$pdf->SetFont('Arial','B',7);

$pdf->Cell(57,3,'CHASQUI  DIGITAL',0,1,'C');
$pdf->Ln();
$pdf->Cell(57,3,'Decanato F.C.P.N.',0,1,'C');
$pdf->Cell(57,3,'Monoblock Central Edificio Antiguo P.B.',0,1,'C');
$pdf->Cell(57,3,'Av. villazón No 1995',0,1,'C');
$pdf->Cell(57,3,'2441570 - 2440571 Fax: 2441092',0,1,'C');
$pdf->Cell(57,3,'La Paz - Bolivia',0,1,'C');
$pdf->Ln();
$pdf->Cell(57,3,'COMPROBANTE ORIGINAL',0,1,'C');
$pdf->Cell(57,3,'- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -',0,1,'C');
//////Obtenemos el código del remitente
$sql1 = "SELECT reg_interno FROM recibida ORDER BY reg_interno DESC";
$resp1=mysql_query($sql1);
$filas1=mysql_num_rows($resp1);
$datos1=mysql_fetch_array($resp1);
$id=$datos1["reg_interno"];
////////
$sql = "SELECT re.nombre,re.cod_rem,r.tipo,r.fecha_hora,r.recibido_por,r.reg_externo,r.reg_interno,hoja_ruta
           FROM remitente re INNER JOIN recibida r
	       WHERE r.id_remitente=re.id_remitente and r.reg_interno=$id"; 
$resp=mysql_query($sql);
$filas=mysql_num_rows($resp);
if($filas!=0)
     { 
           $datos=mysql_fetch_array($resp);
           $nombre=$datos["nombre"];
		   $cod_rem=$datos["cod_rem"];
		   $tipo=$datos["tipo"];
		   $fecha_hora=$datos["fecha_hora"];
		   $recibido_por=$datos["recibido_por"];
  	       $reg_externo=$datos["reg_externo"];
		   $reg_interno=$datos["reg_interno"];
		   $hoja_ruta=$datos["hoja_ruta"];
	 }
if($hoja_ruta==null)
	$hoja_ruta=ninguno;
$pdf->Cell(25,3,'REGISTRO Nº:',0,0,'L');
$pdf->Cell(25,3,$reg_interno,0,1,'L');
$pdf->Cell(25,3,'CODIGO:',0,0,'L');
$pdf->Cell(25,3,$cod_rem,0,1,'L');
//$pdf->Cell(57,3,'- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -',0,1,'C');
$pdf->Ln();
$long = strlen($nombre);
if($long > 23)
	$pdf->Cell(25,3,'REMITENTE:',0,1,'L');
else
	$pdf->Cell(25,3,'REMITENTE:',0,0,'L');
$pdf->Cell(25,3,eregi_replace('&nbsp;',' ', $nombre),0,1,'L');
////max 23
$long1 = strlen($tipo);
if($long1>23)
	$pdf->Cell(25,3,'TIPO DE TRAMITE:',0,1,'L');
else
	$pdf->Cell(25,3,'TIPO DE TRAMITE:',0,0,'L');
$pdf->Cell(25,3,$tipo,0,1,'L');
$pdf->Cell(25,3,'REGISTRO EXT:',0,0,'L');
$pdf->Cell(25,3,$reg_externo,0,1,'L');
$pdf->Cell(25,3,'HOJA DE RUTA Nº:',0,0,'L');
$pdf->Cell(25,3,$hoja_ruta,0,1,'L');
$pdf->Cell(25,3,'RECIBIDO POR:',0,0,'L');
$pdf->Cell(25,3,$recibido_por,0,1,'L');
$pdf->Cell(25,3,'FECHA:',0,0,'L');
$pdf->Cell(25,3,$fecha_hora,0,1,'L');
$pdf->Ln();
$pdf->Output();
?>