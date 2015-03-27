<?php
session_start();
if (!isset($_SESSION['paso_por_donde_yo_quiero']))
{ 
	header ("Location: ../index.php"); 
	exit; 
} 
$id_user=$_SESSION['id_user'];
$nombre=$_SESSION['nombre_ini']; 
$unidad=$_SESSION['unidad_ini']; 
$id_unidad=$_SESSION['id_unidad']; 

$nom_unidad = strtoupper($unidad);

//$unidad=strtoupper($unidad);
include("../../funciones1.php");
$link=conexion();

require('fpdf.php');
$valor=$_POST['fecha'];

include("../../php/fecha_hora.php");
$fecha=fecha_hora();

//$ip=$_SERVER['REMOTE_ADDR']; 
class PDF extends FPDF
{
	function Header()
	{	global $valor;
		global $nom_unidad;
		$this->SetFont('Times','B',14);
		$this->Cell(80);
		$this->Cell(200,7,'',0,1,'C');
		$this->Cell(320,4,'CHASQUI  DIGITAL',0,1,'C');
		$this->Ln();
		$this->SetFont('Arial','B',11);
		$this->Cell(320,4,$nom_unidad.' F.C.P.N.',0,1,'C');
		$this->Ln();
		$this->Cell(320,4,'REPORTE DE CORRESPONDENCIA Y TRÁMITES',0,1,'C');
		$sql = "SELECT rut FROM correspondencia order by id_c Desc limit 1"; 
		$res=mysql_query($sql);
		$num = mysql_num_rows($res);

		$linea=mysql_fetch_array($res);	
		$rut=$linea["rut"];
		
		//$this->Cell(220,4,'Nº '.$rut,0,1,'C');
		$this->Image('../../imagenes/UMSA.jpg',18,6,11,22,'JPG');
		$this->Image('../../imagenes/loguito.jpeg',295,6,19,20,'JPEG');
	}
	function Footer()
	{	
		global $fecha;
//		global $valor;
	    $this->SetY(-15);
	    $this->SetFont('Arial','I',8);
	    $this->SetTextColor(128);
		$this->Cell(0,3,'Monoblock Central Edificio Antiguo P.B. Av. villazón No 1995',0,1,'C');
		$this->Cell(0,3,'2441570 - 2440571 Fax: 2441092',0,1,'C');
		$this->Cell(0,3,'La Paz - Bolivia',0,1,'C');
		$this->Cell(0,3,$fecha,0,1,'C');
	}
	function ChapterTitle($num,$label)
	{
	    $this->SetFont('Arial','B',10);
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
$pdf->SetMargins(3,3,3) ;
$pdf->SetAuthor('Aleida Ibañez');
$pdf->PrintChapter(1,'','');
$pdf->Ln();
$pdf->Cell(5,7,'',0,0,'C');
$pdf->Cell(15,7,'R.U.T.',1,0,'C','1');
$pdf->Cell(45,7,'FECHA',1,0,'C','1');
$pdf->Cell(40,7,'PROCEDENCIA',1,0,'C','1');
$pdf->Cell(35,7,'RESPONSABLE',1,0,'C','1');
$pdf->Cell(35,7,'REG.EXT.',1,0,'C','1');
$pdf->Cell(22,7,'H. RUTA',1,0,'C','1');
$pdf->Cell(52,7,'DESTINO',1,0,'C','1');
$pdf->Cell(72,7,'REFERENCIAS',1,1,'C','1');

//$sql = "SELECT rut FROM correspondencia WHERE fecha like '%$valor%' and (destino like '%$unidad%'
//		or unidad like '%$unidad%') GROUP BY rut ORDER BY fecha ASC";
//$sql = "SELECT rut FROM correspondencia WHERE fecha like '%$valor%'";
$sql = "SELECT rut FROM correspondencia";
$resp=mysql_query($sql);
$filas=mysql_num_rows($resp);
if($filas>0)
{ 
    while($linea=mysql_fetch_array($resp))
	{  
 		$rut1=$linea["rut"];

		// Buscamos las coincidencias respecto al valor de rut
		$sql1 = "SELECT * FROM correspondencia WHERE rut like '%$rut1%'";
		$resp1=mysql_query($sql1);
		$filas1=mysql_num_rows($resp1);
		if($filas1>0)
		{ 
		    while($linea1 = mysql_fetch_array($resp1))
			{  
				$i++;
		 		$rut=$linea1["rut"];
			 	$unidad=$linea1["unidad"];
	    		$fecha=$linea1["fecha"];
		   		$correlativo=$linea1["correlativo"];
				$hoja_ruta=$linea1["hoja_ruta"];  
		   		$tipo=$linea1["tipo"];
				$referencias=$linea1["referencias"];
		   		$fojas=$linea1["fojas"];
 				$responsable=$linea1["responsable"];    
		   		$destino=$linea1["destino"];
		   		$comentario=$linea1["comentario"];
	 
			    $pdf->Cell(5,6,'',0,0,'C');
				$pdf->Cell(15,6,$rut,1,0,'C');
				$pdf->Cell(45,6,$fecha,1,0,'L');
				$pdf->Cell(40,6,$unidad,1,0,'L');
				$pdf->Cell(35,6,$responsable,1,0,'L');
				$pdf->Cell(35,6,$correlativo,1,0,'L');
				$pdf->Cell(22,6,$hoja_ruta,1,0,'C');		
				$pdf->Cell(52,6,$destino,1,0,'L');
//				$pdf->Cell(72,6,$referencias,1,1,'L');
				$pdf->MultiCell(72,6,$referencias,1,'L',0);
			}
		}
	}
}
$pdf->Ln();
$pdf->Output();
?>