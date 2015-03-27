<?php
require('../../reporte/fpdf.php');
include("../../../funciones2.php");
$link = conexion2();

include ('../../fecha_int.php');
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
$fecha_fin = $_GET['var4'];
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
		$this->Cell(0,3,'Monoblock Central Edificio Antiguo P.B. Av. Villaz�n No 1995',0,1,'C');
		$this->Cell(0,3,'2441570 - 2440571 Fax: 2441092',0,1,'C');
		$this->Cell(0,3,'La Paz - Bolivia',0,1,'C');
		$this->Cell(0,3,'P�gina '.$this->PageNo().'   '.$fecha_actual,0,1,'C');
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
$pdf->SetAuthor('Aleida Iba�ez');
$pdf->SetFont('Times','B',12);
$pdf->SetFillColor(200,220,255);

$unidad_sol = strtoupper($unidad_sol);
$pdf->SetFont('Times','B',12);
$pdf->Cell(0,4,'TOTAL DE TRAMITES Y CORRESPONDENCIA A NIVEL FACULTATIVO',0,1,'C');

$pdf->SetFont('Arial','B',10);

include "../libchart/classes/libchart.php";

$chart = new PieChart(550,450);
$dataSet = new XYDataSet();

$fecha_ini = fecha_entero($fecha);
$fecha_fin = fecha_entero($fecha_fin);

if($fecha_fin == null)
	$cad = "fecha like '%$fecha%' ";
else
	$cad = "fecha_int between '$fecha_ini' and '$fecha_fin' ";

$mes[0] = 'ENE';
$mes[1] = 'FEB';
$mes[2] = 'MAR';
$mes[3] = 'ABR';
$mes[4] = 'MAY';
$mes[5] = 'JUN';
$mes[6] = 'JUL';
$mes[7] = 'AGO';
$mes[8] = 'SEP';
$mes[9] = 'OCT';
$mes[10] = 'NOV';
$mes[11] = 'DIC';

$pdf->Ln();
$pdf->Cell(5,7,'',0,0,'C');
$pdf->Cell(60,7,'UNIDAD/MES',1,0,'C',1);
$pdf->Cell(18,7,'ENERO',1,0,'C',1);
$pdf->Cell(18,7,'FEBRERO',1,0,'C',1);
$pdf->Cell(18,7,'MARZO',1,0,'C',1);
$pdf->Cell(18,7,'ABRIL',1,0,'C',1);
$pdf->Cell(18,7,'MAYO',1,0,'C',1);
$pdf->Cell(18,7,'JUNIO',1,0,'C',1);
$pdf->Cell(18,7,'JULIO',1,0,'C',1);
$pdf->Cell(18,7,'AGOSTO',1,0,'C',1);
$pdf->Cell(18,7,'SEPTIEM',1,0,'C',1);
$pdf->Cell(18,7,'OCTUBRE',1,0,'C',1);
$pdf->Cell(18,7,'NOVIEMB',1,0,'C',1);
$pdf->Cell(18,7,'DICIEMB',1,0,'C',1);
$pdf->Cell(18,7,'TOTAL',1,1,'C',1);
$pdf->SetFont('Arial','',9);

$unidad[0] = 'Decanato';
$unidad[1] = 'Vicedecanato';
$unidad[2] = 'Area Desconcentrada';
$unidad[3] = 'Carrera de Informatica';
$unidad[4] = 'Carrera de Matematicas';
$unidad[5] = 'Carrera de Estadistica';
$unidad[6] = 'Carrera de Biologia';
$unidad[7] = 'Carrera de Quimica';
$unidad[8] = 'Carrera de Fisica';
$unidad[9] = 'Instituto de Matematica';
$unidad[10] = 'Instituto de Ecologia';
$unidad[11] = 'Instituto de Fisica';
$unidad[12] = 'Instituto de Inv. de Informatica';
$unidad[13] = 'Instituto de Investigaciones Quimicas';
$unidad[14] = 'Instituto de Biologia Molecular';
$unidad[15] = 'Postgrado en Informatica';
$unidad[16] = 'Prefacultativo';
$unidad[17] = 'Tic Facultativo';
$unidad[18] = 'Planetario';
$unidad[19] = 'Laboratorio de Calidad Ambiental';
$unidad[20] = 'Proyecto Caminar';
$unidad[21] = 'Postgrado de Ecologia';
$unidad[22] = 'AVEIS';
$unidad[23] = 'Aula Virtual FCPN';

$suma_final = 0;
$total_tramites = 0;
for ($j=0;$j<=23; $j++)
{
	$unidad1 = $unidad[$j];
	$pdf->Cell(5,6,'',0,0,'C');
	$pdf->Cell(60,6,$unidad1,1,0,'L');
	$sum = 0;
	for ($i=0;$i<=11; $i++)
	{
        	$fecha = $mes[$i];
		$sqla = "SELECT distinct(rut)
			FROM correspondencia
			WHERE unidad like '$unidad1' and unidad != '' and fecha like '%$fecha%'";
		$resa = mysql_query($sqla) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
		$numa = mysql_num_rows($resa);
		$sum = $sum + $numa;
		$pdf->Cell(18,6,$numa,1,0,'C');
	}
	$pdf->Cell(18,6,$sum,1,1,'C');
	$suma_final = $suma_final + $sum;
}
$pdf->SetFont('Arial','B',9);
$pdf->Cell(5,7,'',0,0,'C');
$pdf->Cell(60,7,'TOTAL',1,0,'C',1);
$pdf->Cell(216,7,'',1,0,'C');
$pdf->Cell(18,7,$suma_final,1,1,'C',1);
$pdf->Ln();
$pdf->Output();
?>