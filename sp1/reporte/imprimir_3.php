<?php
$todo=$_GET['cad'];
//echo '<h1>alecita '.$todo.'</h1>';
$vector = explode(",",$todo);
$long = count($vector);

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
$tam=array();
$tam[0]=215;
$tam[1]=279;
$pdf=new PDF('p','mm',$tam);
$pdf->SetMargins(3,3,3) ;
$pdf->SetAuthor('Aleida Ibañez');
$pdf->PrintChapter(1,'','');
$pdf->SetFont('Arial','B',8);

$pdf->Cell(1,6,'',0,0,'C');
$pdf->Cell(5,20,'',1,0,'C','1');
$pdf->Cell(18,6,'RUT',1,0,'C','1');
$pdf->Cell(34,6,'FECHA',1,0,'C','1');
$pdf->Cell(35,6,'DESTINO',1,0,'C','1');
$pdf->Cell(35,6,'REG. EXT.',1,0,'C','1');
$pdf->Cell(80,6,'REFERENCIAS',1,1,'C','1');
//Desplegamos los datos correspondientes
for($i=0;$i < $long;$i++)
{
	$id=$vector[$i];
	$sql = "SELECT * FROM correspondencia WHERE id_c='$id'";
	$resp = mysql_query($sql);
	$num = mysql_num_rows($resp); 
	if ($num > 0) 					
	{	
		$linea=mysql_fetch_array($resp);
 		$rut=$linea["rut"];
		$fecha=$linea["fecha"];
		$destino=$linea["destino"];
	   	$correlativo=$linea["correlativo"];
		$referencias=$linea["referencias"];
if($i!=0)
{
/*		$pdf->Cell(6,6,'',0,0,'C');
		$pdf->Cell(202,1,'',1,1,'C','0');*/
}		
		$pdf->Cell(1,6,'',0,0,'C');
		$pdf->Cell(5,30,$i,0,0,'C','1');
		$pdf->Cell(18,6,$rut,1,0,'C','0');
		$pdf->Cell(34,6,$fecha,1,0,'C','0');
		$pdf->Cell(35,6,$destino,1,0,'C','0');
		$pdf->Cell(35,6,$correlativo,1,0,'C','0');
		$pdf->MultiCell(80,6,$referencias,1,1,'C');

		if($i==0)
		{
		$pdf->Cell(1,6,'',0,0,'C');
		$pdf->Cell(5,20,'',0,0,'C','1');
		$pdf->Cell(40,6,'PRIMERA RUTA',1,0,'C','1');
		$pdf->Cell(41,6,'SEGUNDA RUTA',1,0,'C','1');
		$pdf->Cell(41,6,'TERCERA RUTA',1,0,'C','1');
		$pdf->Cell(40,6,'CUARTA RUTA',1,0,'C','1');
		$pdf->Cell(40,6,'QUINTA RUTA',1,1,'C','1');
		}
		if($i!=0)
		{
/*		$pdf->Cell(1,6,'',0,0,'C');
		$pdf->Cell(202,1,'',1,1,'C','0');*/
		$pdf->Cell(1,6,'',0,0,'C');
		$pdf->Cell(5,25,'',0,0,'C','1');
		$pdf->Cell(40,25,'',1,0,'C','0');
		$pdf->Cell(41,25,'',1,0,'C','0');
		$pdf->Cell(41,25,'',1,0,'C','0');
		$pdf->Cell(40,25,'',1,0,'C','0');
		$pdf->Cell(40,25,'',1,1,'C','0');

		$pdf->Cell(1,2,'',0,0,'C');
		$pdf->Cell(40,4,'',0,1,'C','0');

		}
		else
		{
		$pdf->Cell(1,6,'',0,0,'C');
		$pdf->Cell(5,20,'',0,0,'C','1');
		$pdf->Cell(40,25,'',1,0,'C','0');
		$pdf->Cell(41,25,'',1,0,'C','0');
		$pdf->Cell(41,25,'',1,0,'C','0');
		$pdf->Cell(40,25,'',1,0,'C','0');
		$pdf->Cell(40,25,'',1,1,'C','0');
		$pdf->Cell(1,2,'',0,0,'C');
		$pdf->Cell(40,4,'',0,1,'C','0');
		}
	}
}
$pdf->Ln();
$pdf->Output();
?>