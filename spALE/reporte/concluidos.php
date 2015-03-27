<?php

require('fpdf.php');
include("../../funciones1.php");
$link = conexion();

include("../../php/fecha_hora.php");
$fecha_actual = fecha_hora();

$fecha_solicitud = $_POST['fecha'];
$nombre_ini = $_POST['usuario'];
$unidad_ini = $_POST['unidad'];
$id_unidad_ini = $_POST['id'];

$nom_unidad = strtoupper($unidad_ini);

$ip=$_SERVER['REMOTE_ADDR']; 

class PDF extends FPDF
{
	function Header()
	{	$fecha_solicitud= $_POST['fecha'];
		global $fecha_solicitud;
		global $nom_unidad;
		$this->SetFont('Times','B',14);
		$this->Cell(80);
		$this->Cell(200,7,'',0,1,'C');	
		$this->Cell(0,4,'CHASQUI  DIGITAL',0,1,'C');
		$this->Ln();
		$this->SetFont('Arial','B',11);
		$this->Cell(0,4,$nom_unidad.' F.C.P.N.',0,1,'C');
		$this->Ln();
		$this->Cell(0,4,'REPORTE DE FECHA: '.$fecha_solicitud,0,1,'C');
		$this->Cell(0,4,'',0,1,'C');
		$this->Image('../../imagenes/UMSA.jpg',18,6,16,30,'JPG');
		$this->Image('../../imagenes/loguito.jpeg',310,6,28,30,'JPEG');
		$this->Ln();
	}
	function Footer()
	{	
		global $fecha_actual;
    	//Posición a 1,5 cm del final
	    $this->SetY(-15);
    	//Arial itálica 8
	    $this->SetFont('Arial','I',9);
    	//Color del texto en gris
	    $this->SetTextColor(128);
//		$this->Cell(0,3,'http://fcpndigital.umsa.bo/chasqui',0,1,'C');
		$this->Cell(0,3,'Monoblock Central Edificio Antiguo P.B. Av. Villazón No 1995',0,1,'C');
		$this->Cell(0,3,'2441570 - 2440571 Fax: 2441092',0,1,'C');
		$this->Cell(0,3,'La Paz - Bolivia',0,1,'C');
		$this->Cell(0,3,'Página '.$this->PageNo().'   '.$fecha_actual,0,1,'C');
		$result = mysql_query($sql);
	   	//Número de página
	}
	function ChapterTitle($num,$label)
	{
    	//Arial 12
	    $this->SetFont('Arial','B',10);
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
$pdf=new PDF('l','mm','legal');
$pdf->AddPage();
$pdf->SetMargins(2.5,2.5,2.5);
$pdf->SetAuthor('Aleida Ibañez');
$pdf->SetFont('Times','B',12);
$pdf->SetFillColor(200,220,255);

$pdf->Cell(0,4,'TRAMITES CONCLUIDOS',0,1,'C');
$pdf->SetFont('Arial','B',10);
$pdf->Ln(4);
$pdf->Cell(5,7,'',0,0,'C');
$pdf->Cell(18,7,'R.U.T.',1,0,'C','1');
$pdf->Cell(45,7,'FECHA',1,0,'C','1');
$pdf->Cell(45,7,'PROCEDENCIA',1,0,'C','1');
$pdf->Cell(35,7,'ENVIADO POR',1,0,'C','1');
$pdf->Cell(35,7,'REG.EXT.',1,0,'C','1');
$pdf->Cell(22,7,'H. RUTA',1,0,'C','1');
$pdf->Cell(52,7,'DESTINO',1,0,'C','1');
$pdf->Cell(82,7,'REFERENCIAS',1,1,'C','1');

$i=0;
$m=0;
///////***************************************
$consulta = "SELECT distinct(rut) FROM correspondencia WHERE comentario like '%Concluido%' order by id_c ASC";
$resultado = mysql_query($consulta) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
$numResultados = mysql_num_rows($resultado);
//echo 'numero de res '.$numResultados.'<br>';
$co=0;
if ($numResultados > 0)
{
	while($fila = mysql_fetch_array($resultado))
	{		
		$rut = $fila["rut"];
		$pdf->Cell(18,6,$rut,1,0,'C'); 
		$sql = "SELECT * FROM correspondencia WHERE rut like '$rut' and comentario like '%Concluido%' order by id_c DESC limit 1";
		$res = mysql_query($sql) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
		$num = mysql_num_rows($res);
		if ($num > 0)
		{
			$linea = mysql_fetch_array($res);
			$id_c = $linea["id_c"];
			$correlativo = $linea["correlativo"];
			$referencias = $linea["referencias"];
			$responsable = $linea["responsable"];
			$comentario = $linea["comentario"];
			$hoja_ruta = $linea["hoja_ruta"];
			$destino = $linea["destino"];
			$unidad = $linea["unidad"];
			$fecha = $linea["fecha"];
			$fojas = $linea["fojas"];
			$tipo = $linea["tipo"];
			$rut = $linea["rut"];
			$ip = $linea["ip"];

			$pdf->Cell(5,6,'',0,0,'L');
			$pdf->Cell(18,6,$rut,1,0,'C');
			$pdf->Cell(45,6,$fecha,1,0,'L');
			$pdf->Cell(45,6,$unidad,1,0,'L');
			$pdf->Cell(35,6,$responsable,1,0,'L');
			$pdf->Cell(35,6,$correlativo,1,0,'L');
			$pdf->Cell(22,6,$hoja_ruta,1,0,'C');		
			$pdf->Cell(52,6,$destino,1,0,'C');		
			$pdf->MultiCell(82,6,$referencias,1,1,'L');
		}
	}
}
//////////************************************
//******************************************
mysql_close();
include("../../funciones2.php");
$link2 = conexion2();
/*include("../../funciones1.php");
$link = conexion();*/

$consulta = "SELECT distinct(rut) FROM correspondencia order by id_c ASC";
$resultado = mysql_query($consulta) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
$numResultados = mysql_num_rows($resultado);
//echo 'numero de res '.$numResultados.'<br>';
$co=0;
if ($numResultados > 0)
{
	while($fila = mysql_fetch_array($resultado))
	{		
		$rut = $fila["rut"];
		$pdf->Cell(18,6,$rut,1,0,'C'); 
		$sql = "SELECT * FROM correspondencia WHERE rut like '$rut' order by id_c DESC limit 1";
		$res = mysql_query($sql) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
		$num = mysql_num_rows($res);
		if ($num > 0)
		{
			$linea = mysql_fetch_array($res);
			$id_c = $linea["id_c"];
			$correlativo = $linea["correlativo"];
			$referencias = $linea["referencias"];
			$responsable = $linea["responsable"];
			$comentario = $linea["comentario"];
			$hoja_ruta = $linea["hoja_ruta"];
			$destino = $linea["destino"];
			$unidad = $linea["unidad"];
			$fecha = $linea["fecha"];
			$fojas = $linea["fojas"];
			$tipo = $linea["tipo"];
			$rut = $linea["rut"];
			$ip = $linea["ip"];

			$pdf->Cell(5,6,'',0,0,'L');
			$pdf->Cell(18,6,$rut,1,0,'C');
			$pdf->Cell(45,6,$fecha,1,0,'L');
			$pdf->Cell(45,6,$unidad,1,0,'L');
			$pdf->Cell(35,6,$responsable,1,0,'L');
			$pdf->Cell(35,6,$correlativo,1,0,'L');
			$pdf->Cell(22,6,$hoja_ruta,1,0,'C');		
			$pdf->Cell(52,6,$destino,1,0,'C');		
			$pdf->MultiCell(82,6,$referencias,1,1,'L');
		}
	}
}
//******************************************
$pdf->Ln();
$pdf->Output();
?>