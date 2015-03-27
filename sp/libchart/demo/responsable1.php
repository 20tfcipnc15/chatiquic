<?php
require('../../reporte/fpdf.php');
include("../../../funciones1.php");
$link1 = conexion();

include("../../../php/fecha_hora.php");
$fecha_actual = fecha_hora();

$fecha_solicitud = $_POST['fecha'];
$nombre_ini = $_POST['usuario'];
$unidad_ini = $_POST['unidad'];
$id_unidad_ini = $_POST['id'];

$uni = $_GET['var'];
$nom = $_GET['var1'];
$fecha = $_GET['var2'];
$unidad_sol = $_GET['var3'];

$nom_unidad = strtoupper($uni);

$ip=$_SERVER['REMOTE_ADDR']; 
class PDF extends FPDF
{
	function Header()
	{	
		global $fecha_actual;
		global $nom_unidad;
		global $nom;
		global $uni;
		global $fecha;
		$this->SetFont('Times','B',14);
		$this->Cell(80);
		$this->Cell(200,7,'',0,1,'C');	
		$this->Cell(0,4,'CHASQUI  DIGITAL',0,1,'C');
		$this->Ln();
		$this->SetFont('Arial','B',11);
		$this->Cell(0,4,$nom_unidad.' F.C.P.N.',0,1,'C');
		$this->Ln();
		$this->Cell(0,4,'REPORTE DE FECHA: '.$fecha_actual,0,1,'C');
		$this->Cell(0,4,'',0,1,'C');
		$this->Image('../../../imagenes/UMSA.jpg',18,6,16,30,'JPG');
		$this->Image('../../../imagenes/loguito.jpeg',310,6,28,30,'JPEG');
		$this->Ln();
	}
	function Footer()
	{	
		global $fecha_actual;
	    $this->SetY(-15);
	    $this->SetFont('Arial','I',9);
	    $this->SetTextColor(128);
		$this->Cell(0,3,'Monoblock Central Edificio Antiguo P.B. Av. Villazón No 1995',0,1,'C');
		$this->Cell(0,3,'2441570 - 2440571 Fax: 2441092',0,1,'C');
		$this->Cell(0,3,'La Paz - Bolivia',0,1,'C');
		$this->Cell(0,3,'Página '.$this->PageNo().'   '.$fecha_actual,0,1,'C');
		$result = mysql_query($sql);
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
$pdf->AddPage();
$pdf->SetMargins(2.5,2.5,2.5);
$pdf->SetAuthor('Aleida Ibañez');
$pdf->SetFont('Times','B',12);
$pdf->SetFillColor(200,220,255);

$unidad_sol = strtoupper($unidad_sol);
$pdf->SetFont('Times','B',12);
$pdf->Cell(0,4,'TRAMITES PENDIENTES: '.$unidad_sol,0,1,'C');
$pdf->SetFont('Arial','B',10);

include "../libchart/classes/libchart.php";
$chart = new PieChart(550,450);
$dataSet = new XYDataSet();

$sql = "SELECT nombre FROM user";
$resp = mysql_query($sql);
$filas = mysql_num_rows($resp);
if($filas!=0)
{ 	
	$a=0;
    while($linea1=mysql_fetch_array($resp))
	{  	
		$nombre = $linea1['nombre'];
		$vec[$a]=$nombre;
		$a++;
	}
}
$cad='';
for ($b=0; $b < $a; $b++)
{	
	$nom = $vec[$b];
	$cad = $cad." or destino like '".$nom."' ";
}
$cad = substr($cad,3,strlen($cad));
$cad = "(".$cad.")";
$sql = "SELECT DISTINCT * , COUNT( destino ) AS total
		FROM correspondencia
		WHERE ".$cad."
		GROUP BY destino
		HAVING COUNT( destino )>0
		ORDER BY destino ASC ";
$res = mysql_query($sql) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
$num = mysql_num_rows($res);
if ($num > 0)
{		
	while ($linea = mysql_fetch_array($res))
	{	
		$rut = $linea["rut"];	
		$total = $linea["total"];	
		$unidad = $linea["destino"];

		$dataSet->addPoint(new Point("$unidad($total)", $total));
	}
	$chart->setDataSet($dataSet);
	$chart->setTitle("Procedencia de los Trámites");
	$chart->render("generated/demo3.png");
	$pdf->Image('generated/demo3.png',30,50,200,150,'PNG');
}
$pdf->Ln();
$pdf->Output();
?>