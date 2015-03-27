<?php
session_start();
if (!isset($_SESSION['paso_por_donde_yo_quiero']))
{ 
	header ("Location: index.php"); 
	exit; 
} 

$id_user=$_SESSION['id_user'];
$password=$_SESSION['password']; 
$nombre=$_SESSION['nombre']; 
$unidad=$_SESSION['unidad']; 
$id_unidad=$_SESSION['id_unidad']; 

require('fpdf.php');
include("../../funciones1.php");
$link=conexion();
$valor=$_POST['fecha'];
$ip=$_SERVER['REMOTE_ADDR']; 
class PDF extends FPDF
{
	function Header()
	{	global $valor;
		$this->SetFont('Arial','B',11);
		$this->Cell(80);
		$this->Cell(220,7,'',0,1,'C');
		$this->Cell(220,4,'CHASQUI  DIGITAL',0,1,'C');
		$this->Cell(220,4,'DECANATO F.C.P.N.',0,1,'C');
		$this->Ln();
		$this->Cell(220,4,'CORRESPONDENCIA RECIBIDA',0,1,'C');
		$this->Cell(220,4,'REPORTE: '.$valor,0,1,'C');
		$this->Image('../../imagenes/loguito.jpeg',187,6,19,20,'JPEG');
		$this->Image('../../imagenes/UMSA.jpg',8,6,11,22,'JPG');
	}
	function Footer()
	{	include("../../php/fecha_hora.php");
		$fecha=fecha_hora();
		global $valor;
	    $this->SetY(-15);
	    $this->SetFont('Arial','I',8);
	    $this->SetTextColor(128);
		$this->Cell(0,3,'Monoblock Central Edificio Antiguo P.B. Av. villazón No 1995',0,1,'C');
		$this->Cell(0,3,'2441570 - 2440571 Fax: 2441092',0,1,'C');
		$this->Cell(0,3,'La Paz - Bolivia',0,1,'C');
		$this->Cell(0,3,$fecha,0,1,'C');
		$sql="INSERT INTO reportes (id_report,fecha,fecha_sol,responsable,ip,accion) VALUES (NULL,'$valor','$fecha','$nom','$ip','Recibido')";
		$result = mysql_query($sql);
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
$pdf=new PDF('L','mm','legal');
//pdf=new FPDF(’L',’cm’,'Legal’);
$pdf->SetMargins(2.5,2.5,2.5) ;
$pdf->SetAuthor('Aleida Ibañez');
$pdf->PrintChapter(1,'','');
$pdf->Ln();
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
$consulta ="SELECT * FROM recibida WHERE fecha_hora like '%$valor%'";
$resultado=mysql_query($consulta) or die ("Error de búsqueda en la BD: ". mysql_Error());
$numResultados = mysql_num_rows($resultado);
if($numResultados>0)
{		$linea3=mysql_fetch_array($resultado3);	
		$var1=$linea3["fecha_hora"];
		$var2=$linea3["nombre"];
		$var3=$linea3["tarea"];
		$var4=$linea3["responsable"];
		$var5=$linea3["observaciones"];
		$var6=$linea3["estado"];
		$var7=$linea3["accion"];
		$pdf->Cell(30,6,$var1,1,0,'L');
		$pdf->Cell(27,6,$var4,1,0,'L');
		$pdf->Cell(30,6,$var2,1,0,'L');
		$pdf->Cell(20,6,$var7,1,0,'L');
		$pdf->Cell(16,6,$var6,1,1,'C');		
//		$pdf->Cell(32,6,$var3,1,1,'L');
		$pdf->Cell(209,6,'',0,0,'L');
		$pdf->Cell(0,0,'',0,1,'L');
		$pdf->Cell(30,6,'',0,1,'L');
}
$pdf->Ln();
$pdf->Output();
?>