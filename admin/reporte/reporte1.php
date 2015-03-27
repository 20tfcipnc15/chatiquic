<?php
session_start();
if (!isset($_SESSION['paso_por_donde_yo_quiero']))
{ 
	header ("Location: index.php"); 
	exit; 
} 
$id_user=$_SESSION['id_user'];
$password=$_SESSION['password']; 
$nombre=$_SESSION['nombre_ini']; 
$unidad=strtoupper($unidad=$_SESSION['unidad_ini']); 
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
		global $unidad;
		$this->SetFont('Arial','B',11);
		$this->Cell(80);
		$this->Cell(220,7,'',0,1,'C');
		$this->Cell(220,4,'CHASQUI  DIGITAL',0,1,'C');
		$this->Cell(220,4,$unidad.' F.C.P.N.',0,1,'C');
		$this->Ln();
		$this->Cell(220,4,'CORRESPONDENCIA RECIBIDA Y DESPACHADA',0,1,'C');
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
//		$sql="INSERT INTO reportes (id_report,fecha,fecha_sol,responsable,ip,accion) VALUES (NULL,'$valor','$fecha','$nom','$ip','Recibido')";
	//	$result = mysql_query($sql);
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
$pdf=new PDF('p','mm','letter');
$pdf->SetMargins(2.5,2.5,2.5) ;
$pdf->SetAuthor('Aleida Ibañez');
$pdf->PrintChapter(1,'','');
$pdf->Ln();

//Imprimimos los encabezados.
$pdf->Cell(10,6,'R.U.T.',1,0,'L');
$pdf->Cell(25,6,'FECHA',1,0,'L');
$pdf->Cell(30,6,'PROCEDENCIA',1,0,'L');
$pdf->Cell(30,6,'REFERENCIAS',1,0,'L');
$pdf->Cell(20,6,'RECIBIDO POR',1,0,'L');
$pdf->Cell(20,6,'DESTINO',1,0,'L');
$pdf->Cell(20,6,'COMENTARIOS',1,0,'L');
//$pdf->Cell(20,6,'RECIBIDO POR',1,0,'L');
//Obtenemos los datos necesrios de la Base de Datos
$consulta ="SELECT * FROM correspondencia WHERE fecha like '%$valor%'";
$resultado=mysql_query($consulta) or die ("Error de búsqueda en la BD: ". mysql_Error());
$numResultados = mysql_num_rows($resultado);
if($numResultados>0)
{	while($linea3=mysql_fetch_array($resultado))	
	{	$fecha=$linea3["fecha"];
		$rut=$linea3["rut"];
		$unidad=$linea3["unidad"];
		$correlativo=$linea3["correlativo"];
		$referencias=$linea3["referencias"];
		$comentarios=$linea3["comentarios"];
		$responsable=$linea3["responsable"];
		$destino=$linea3["destino"];
		$pdf->Cell(30,6,$rut,1,0,'L');
		$pdf->Cell(27,6,$fecha,1,0,'L');
		$pdf->Cell(30,6,$responsable,1,0,'L');
		$pdf->Cell(20,6,$referencias,1,0,'L');
		$pdf->Cell(16,6,$comentarios,1,1,'C');	
		$pdf->Cell(30,6,$destino,1,0,'L');
	}
}
$pdf->Ln();
$pdf->Output();
?>