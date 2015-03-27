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
include("../../funciones1.php");
$link=conexion();

require('fpdf.php');
$tam=array();
/*$tam[0]=57;
$tam[1]=67;*/
$tam[0]=80;
$tam[1]=85;
$pdf=new FPDF('p','mm',$tam);
$pdf->SetMargins(0,0,0) ;
$pdf->SetAutoPageBreak(1,0);
$pdf->AddPage();
$pdf->SetFont('times','B',12);
//$pdf->SetFont('Arial','B',7);

//Insertamos el escudo de fondo
$pdf->Image('../../img/UMSA1.jpg',22,9,36,62,'JPG');
$pdf->Cell(0,3,'',0,1,'C');
$pdf->Cell(0,5,'CHASQUI  DIGITAL',0,1,'C');
$pdf->SetFont('Arial','B',11);
$pdf->Cell(0,5,$unidad,0,1,'C');
//$pdf->Ln();
$pdf->Cell(0,5,'COMPROBANTE ORIGINAL',0,1,'C');
$pdf->Cell(150,2,'','B',1,'C');
$pdf->Ln();

//Obtenemos el código para el trámite correspondiente.
$consulta = "SELECT id_c FROM correspondencia ORDER BY id_c DESC limit 1";
$resultado=mysql_query($consulta) or die ("Error de búsqueda en la BD: ". mysql_Error());
$linea=mysql_fetch_array($resultado);
$id_c=$linea["id_c"];
$id_c=$id_c-1;

$sql = "SELECT * FROM correspondencia WHERE id_c = $id_c"; 
$resp=mysql_query($sql);
$datos=mysql_fetch_array($resp);
$rut=$datos["rut"];
$tipo=$datos["tipo"];
//efff
$fecha1=$datos["fecha"];
$dias = array("DOM","LUN","MAR","MIE","JUE","VIE","SAB");
$fecha2 = $dias[date("w")];

$fecha5 = $fecha2.' '.$fecha1;
//efff
$unidad=$datos["unidad"];
$hoja_ruta=$datos["hoja_ruta"];
$responsable=$datos["responsable"];
$hoja_ruta=$datos["hoja_ruta"];
$correlativo=$datos["correlativo"];
if($hoja_ruta==null)
	$hoja_ruta=ninguno;

$responsable1=$datos["responsable"];

//Buscamos al responsable para generar el código correspondiente
$sql = "SELECT cod_uni FROM unidad WHERE nombre like '%$unidad%' or sigla like '%$unidad%'";
$res=mysql_query($sql) or die ("Error de búsqueda en la BD: ". mysql_Error());
$linea=mysql_fetch_array($res);
$cod_uni=$linea["cod_uni"];

$pdf->SetFont('Arial','B',9);
//Desplegamos por pantalla los datos necesarios para generar el reporte
$pdf->Cell(35,4,'R.U.T. Nº:',0,0,'L');
$pdf->Cell(35,4,$rut,0,1,'L');
$pdf->Cell(35,4,'CODIGO:',0,0,'L');
$pdf->Cell(35,4,$cod_uni,0,1,'L');
$pdf->Ln();
$long = strlen($nombre);
if($long > 23)
	$pdf->Cell(35,4,'REMITENTE:',0,1,'L');
else
	$pdf->Cell(35,4,'REMITENTE:',0,0,'L');
$pdf->Cell(35,4,eregi_replace('&nbsp;',' ', $unidad),0,1,'L');
////max 23
$long1 = strlen($tipo);
if($long1>23)
	$pdf->Cell(35,4,'TIPO DE TRAMITE:',0,1,'L');
else
	$pdf->Cell(35,4,'TIPO DE TRAMITE:',0,0,'L');
$pdf->Cell(35,4,$tipo,0,1,'L');
$pdf->Cell(35,4,'REGISTRO EXT:',0,0,'L');
$pdf->Cell(35,4,$correlativo,0,1,'L');
$pdf->Cell(35,4,'HOJA DE RUTA Nº:',0,0,'L');
$pdf->Cell(35,4,$hoja_ruta,0,1,'L');
$pdf->Cell(35,4,'RECIBIDO POR:',0,0,'L');
$pdf->Cell(35,4,$responsable,0,1,'L');
$pdf->Cell(35,4,'FECHA:',0,0,'L');
$pdf->Cell(35,4,$fecha5,0,1,'L');
//$pdf->Ln();
$pdf->Cell(150,2,'','B',1,'C');
$pdf->Ln();
$pdf->SetFont('Arial','B',7.5);
$pdf->Cell(0,3,'http://www.fcpndigital.umsa.bo/chasqui',0,1,'C');
$pdf->Cell(0,3,'Monoblock Central Edificio Antiguo P.B. Av. Villazón No 1995',0,1,'C');
$pdf->Cell(0,3,'2441570 - 2440571 Fax: 2441092',0,1,'C');
$pdf->Cell(0,3,'La Paz - Bolivia',0,1,'C');
$pdf->Output();
?>