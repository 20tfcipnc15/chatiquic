<?php
require('fpdf.php');
include("../../funciones.php");
$link=conexion();
$valor=$_POST['fecha'];
$ip=$_SERVER['REMOTE_ADDR']; 
class PDF extends FPDF
{
	function Header()
	{	global $valor;
		//Select Arial bold 15
		$this->SetFont('Arial','B',11);
		//Move to the right
		$this->Cell(80);
		//Framed title
		$this->Cell(220,7,'',0,1,'C');
		$this->Cell(220,4,'CHASQUI  DIGITAL',0,1,'C');
		$this->Cell(220,4,'DECANATO F.C.P.N.',0,1,'C');
		$this->Ln();
		$this->Cell(220,4,'CORRESPONDENCIA RECIBIDA',0,1,'C');
		$this->Cell(220,4,'REPORTE: '.$valor,0,1,'C');
		$this->Image('../../imagenes/loguito.jpeg',187,6,19,20,'JPEG');
		$this->Image('../../imagenes/escudo.jpeg',8,6,11,22,'JPEG');
	}
	function Footer()
	{	include("../../php/fecha_hora.php");
		$fecha=fecha_hora();
		global $valor;
    	//Posición a 1,5 cm del final
	    $this->SetY(-15);
    	//Arial itálica 8
	    $this->SetFont('Arial','I',8);
    	//Color del texto en gris
	    $this->SetTextColor(128);
		$this->Cell(0,3,'Monoblock Central Edificio Antiguo P.B. Av. villazón No 1995',0,1,'C');
		$this->Cell(0,3,'2441570 - 2440571 Fax: 2441092',0,1,'C');
		$this->Cell(0,3,'La Paz - Bolivia',0,1,'C');
		$this->Cell(0,3,$fecha,0,1,'C');
		$sql="INSERT INTO reportes (id_report,fecha,fecha_sol,responsable,ip,accion) VALUES (NULL,'$valor','$fecha','$nom','$ip','Recibido')";
		$result = mysql_query($sql);
	   	//Número de página
	//    $this->Cell(0,3,'Página '.$this->PageNo(),0,0,'C');
	}
	function ChapterTitle($num,$label)
	{
    	//Arial 12
	    $this->SetFont('Arial','B',7);
    	//Color de fondo
	    $this->SetFillColor(200,220,255);
	    $this->Ln(4);
	}
	function PrintChapter($num,$title,$file)
	{	
    	$this->AddPage();
	    $this->ChapterTitle($num,$title);
	}
}
$pdf=new PDF('p','mm','letter');
$pdf->SetMargins(2.5,2.5,2.5) ;
$pdf->SetAuthor('Aleida Ibañez');
$pdf->PrintChapter(1,'','');
$pdf->Ln();
$pdf->Cell(30,7,'FECHA',1,0,'C','1');
$pdf->Cell(25,7,'RECIBIDO POR',1,0,'C','1');
$pdf->Cell(10,7,'R. INT.',1,0,'C','1');
$pdf->Cell(52,7,'PROCEDENCIA',1,0,'C','1');
$pdf->Cell(20,7,'REG.EXT.',1,0,'C','1');
$pdf->Cell(12,7,'H. RUTA',1,0,'C','1');
$pdf->Cell(62,7,'REFERENCIAS',1,1,'C','1');
session_start();
if (!isset($_SESSION['paso_por_donde_yo_quiero']))
{ 
	header ("Location: ../index.php"); 
	exit; 
} 
$user=$_SESSION['id_user'];
$cod=$_SESSION['password']; 
$sql = "SELECT nombre FROM user WHERE usuario like '%$user%' and contrasenia like '%$cod%'"; 
$resp=mysql_query($sql);
$num = mysql_num_rows($resp);
if($num>0)
{
	$linea=mysql_fetch_array($resp);
	$nom=$linea["nombre"]; 
}
$sql = "SELECT * FROM correspondencia WHERE fecha_hora like '%$valor%'";
$resp=mysql_query($sql);
$filas=mysql_num_rows($resp);
$i=0;
if($filas!=0)
{ 
    while($linea=mysql_fetch_array($resp))
	{  
		$i++;
	    $fecha=$linea["fecha_hora"];
 		$rut=$linea["rut"];
	 	$unidad=$linea["unidad"];
		$destino=$linea["destino"];
		$referencias=$linea["referencias"];
 		$responsable=$linea["responsable"];    
		$hoja_ruta=$linea["hoja_ruta"];  
   		$tipo=$linea["tipo"];
   		$correlativo=$linea["correlativo"];
   		$comentario=$linea["comentario"];
	 
		$pdf->Cell(30,12,$fecha,1,0,'L');
		$pdf->Cell(25,12,$responsable,1,0,'L');
		$pdf->Cell(10,12,$rut,1,0,'C');
		$pdf->Cell(52,12,$unidad,1,0,'L');
		$pdf->Cell(20,12,$correlativo,1,0,'L');
		$pdf->Cell(12,12,$hoja_ruta,1,0,'C');		
		$pdf->Cell(62,3,$refrencias,1,0,'C');
		$pdf->Cell(1,3,'','L',0,'L');
		$pdf->Ln();
	}
}
$pdf->Ln();
$pdf->Output();
?>