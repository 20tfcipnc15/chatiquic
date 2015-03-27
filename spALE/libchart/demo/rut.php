<?php
require('../../reporte/fpdf.php');
include("../../../funciones1.php");
include("../../../php/fecha_hora.php");
$link2 = conexion();
$fecha_actual = fecha_hora();

$fecha_solicitud = $_POST['fecha'];
$nombre_ini = $_POST['usuario'];
$unidad_ini = $_POST['unidad'];
$id_unidad_ini = $_POST['id'];

$rut = $_GET['var4'];
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
$pdf->SetFont('Times','B',12);
$pdf->Cell(0,4,'SEGUIMIENTO PARA EL TRAMITE SOLICITADO '.$rut,0,1,'C');
$pdf->SetFont('Arial','B',10);
$pdf->Ln(4);
$pdf->Cell(5,7,'',0,0,'C');
$pdf->Cell(18,7,'R.U.T.',1,0,'C','1');
$pdf->Cell(45,7,'FECHA',1,0,'C','1');
$pdf->Cell(45,7,'ORIGEN',1,0,'C','1');
$pdf->Cell(35,7,'DESPACHADO POR',1,0,'C','1');
$pdf->Cell(35,7,'CORRELATIVO',1,0,'C','1');
$pdf->Cell(22,7,'H. RUTA',1,0,'C','1');
$pdf->Cell(52,7,'DESTINO',1,0,'C','1');
$pdf->Cell(82,7,'REFERENCIAS',1,1,'C','1');
//////////////********************
$i=0;
$sql ="SELECT * FROM correspondencia WHERE rut like '$rut' ORDER BY id_c ASC";
//$sql ="SELECT distinct(fecha),rut,destino,unidad,responsable,referencias,correlativo,hoja_ruta,id_c,tipo,fojas, comentario FROM correspondencia WHERE rut like '%$rut%' GROUP BY fecha ORDER BY id_c ASC";
		$res = mysql_query($sql) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
		$vec = mysql_fetch_array($res);
		$filas = mysql_num_rows($res);
		$unidad = $vec["unidad"];
		$destino = $vec["destino"];
		$id_c=$vec["id_c"];
		$rut=$vec["rut"]; 
		$hoja_ruta=$vec["hoja_ruta"];
		$correlativo=$vec["correlativo"];
		$responsable=$vec["responsable"];
		$fecha1=$vec["fecha"];
		$tipo=$vec["tipo"];
		$referencias=$vec["referencias"];
		$fojas=$vec["fojas"];
		
		//almacenamos la fecha inicial
		$fecha_inicial = $fecha1;
///////////////*******************
$sql = "SELECT *
		FROM correspondencia
		WHERE rut like '%$rut%'
		ORDER BY id_c ASC";
$res = mysql_query($sql) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
$num = mysql_num_rows($res);
if ($num > 0)
{		
	while ($linea = mysql_fetch_array($res))
	{	
		$responsable = $linea["responsable"];	
		$referencias = $linea["referencias"];
		$correlativo = $linea["correlativo"];
		$destino = $linea["destino"];	
		$unidad = $linea["unidad"];
		$fecha1 = $linea["fecha"];	
		$fojas = $linea["fojas"];
		$rut = $linea["rut"];	
				
		$pdf->Cell(5,6,'',0,0,'L');
		$pdf->Cell(18,6,$rut,1,0,'C');
		$pdf->Cell(45,6,$fecha1,1,0,'L');
		$pdf->Cell(45,6,$unidad,1,0,'L');
		$pdf->Cell(35,6,$responsable,1,0,'L');
		$pdf->Cell(35,6,$correlativo,1,0,'L');
		$pdf->Cell(22,6,$hoja_ruta,1,0,'C');		
		$pdf->Cell(52,6,$destino,1,0,'C');		
		$pdf->MultiCell(82,6,$referencias,1,1,'L');
	}
}
$pdf->Ln();
$pdf->Output();
?>