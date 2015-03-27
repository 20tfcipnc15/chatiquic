<?php
/*session_start();
if (!isset($_SESSION['paso_por_donde_yo_quiero']))
{ 
	header ("Location: index.php"); 
	exit; 
} 
$id_user=$_SESSION['id_user'];
$nombre=$_SESSION['nombre']; 
$unidad=$_SESSION['unidad']; 
include("../../funciones1.php");
$link=conexion();*/

require('fpdf.php');
$tam=array();
$tam[0]=57;
$tam[1]=67;
$pdf=new FPDF('p','mm',$tam);
/*$pdf->SetMargins(0,0,0) ;
$pdf->SetAutoPageBreak(1,0);
$pdf->AddPage();
$pdf->SetFont('Arial','B',7);
$pdf->Cell(57,3,'',0,1,'C');
$pdf->Cell(57,3,'CHASQUI  DIGITAL',0,1,'C');
$pdf->Cell(57,3,$unidad,0,1,'C');
$pdf->Ln();
$pdf->Cell(57,3,'COMPROBANTE ORIGINAL',0,1,'C');
$pdf->Cell(150,2,'','B',1,'C');
$pdf->Ln();
//Obtenemos el código para el trámite correspondiente.
//$pdf->Image('../../imagenes/escudo.jpeg',8,6,11,22,'JPEG');
$consulta = "SELECT id_c FROM correspondencia ORDER BY id_c DESC limit 1";
$resultado=mysql_query($consulta) or die ("Error de búsqueda en la BD: ". mysql_Error());
$linea=mysql_fetch_array($resultado);
$id_c=$linea["id_c"];
$id_c=$id_c - 1;

$sql = "SELECT * FROM correspondencia WHERE id_c = $id_c"; 
$resp=mysql_query($sql);
$datos=mysql_fetch_array($resp);
$rut=$datos["rut"];
$tipo=$datos["tipo"];
$fecha=$datos["fecha"];
$unidad=$datos["unidad"];
$hoja_ruta=$datos["hoja_ruta"];
$responsable=$datos["responsable"];
$hoja_ruta=$datos["hoja_ruta"];
$correlativo=$datos["correlativo"];
if($hoja_ruta==null)
	$hoja_ruta=ninguno;

$responsable1=$datos["responsable"];
//Buscamos al responsable para generar el código correspondiente
$sql = "SELECT cod_uni FROM unidad WHERE nombre like '%$unidad%'";
$res=mysql_query($sql) or die ("Error de búsqueda en la BD: ". mysql_Error());
$linea=mysql_fetch_array($res);
$cod_uni=$linea["cod_uni"];
$pdf->Cell(25,3,'R.U.T. Nº:',0,0,'L');
$pdf->Cell(25,3,$rut,0,1,'L');
$pdf->Cell(25,3,'CODIGO:',0,0,'L');
$pdf->Cell(25,3,$cod_uni,0,1,'L');
$pdf->Ln();
$long = strlen($nombre);
if($long > 23)
	$pdf->Cell(25,3,'REMITENTE:',0,1,'L');
else
	$pdf->Cell(25,3,'REMITENTE:',0,0,'L');
$pdf->Cell(25,3,eregi_replace('&nbsp;',' ', $unidad),0,1,'L');
////max 23
$long1 = strlen($tipo);
if($long1>23)
	$pdf->Cell(25,3,'TIPO DE TRAMITE:',0,1,'L');
else
	$pdf->Cell(25,3,'TIPO DE TRAMITE:',0,0,'L');
$pdf->Cell(25,3,$tipo,0,1,'L');
$pdf->Cell(25,3,'REGISTRO EXT:',0,0,'L');
$pdf->Cell(25,3,$correlativo,0,1,'L');
$pdf->Cell(25,3,'HOJA DE RUTA Nº:',0,0,'L');
$pdf->Cell(25,3,$hoja_ruta,0,1,'L');
$pdf->Cell(25,3,'RECIBIDO POR:',0,0,'L');
$pdf->Cell(25,3,$responsable,0,1,'L');
$pdf->Cell(25,3,'FECHA:',0,0,'L');
$pdf->Cell(25,3,$fecha,0,1,'L');
$pdf->Ln();
$pdf->Cell(150,2,'','B',1,'C');
$pdf->Ln();
$pdf->SetFont('Arial','B',5);
$pdf->Cell(57,3,'Monoblock Central Edificio Antiguo P.B.',0,1,'C');
$pdf->Cell(57,3,'Av. Villazón No 1995',0,1,'C');
$pdf->Cell(57,3,'2441570 - 2440571 Fax: 2441092',0,1,'C');
$pdf->Cell(57,3,'La Paz - Bolivia',0,1,'C');*/
$pdf->Output();
?>