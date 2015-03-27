<?php
require('fpdf.php');
include("../../funciones1.php");
$link = conexion();
include ('../fecha_int.php');
include("../../php/fecha_hora.php");

$fecha = $_POST['fecha'];
$fecha_fin = $_POST['fecha_fin'];
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
//		$this->Image('../../../imagenes/UMSA.jpg',18,6,16,30,'JPG');
//		$this->Image('../../../imagenes/loguito.jpeg',310,6,28,30,'JPEG');
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
$pdf->SetFont('Arial','B',10);

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

$pdf->Cell(10,7,'',1,0,'C',1);
$pdf->Cell(60,7,'UNIDAD',1,0,'C',1);
$pdf->Cell(20,7,'ENERO',1,0,'C',1);
$pdf->Cell(20,7,'FEBRERO',1,0,'C',1);
$pdf->Cell(20,7,'MARZO',1,0,'C',1);
$pdf->Cell(20,7,'ABRIL',1,0,'C',1);
$pdf->Cell(20,7,'MAYO',1,0,'C',1);
$pdf->Cell(20,7,'JUNIO',1,0,'C',1);
$pdf->Cell(20,7,'JULIO',1,0,'C',1);
$pdf->Cell(20,7,'TOTAL',1,1,'C',1);

$a = 0;
$sw=0;

$pdf->Cell(10,7,'',1,0,'C');
$pdf->Cell(60,7,$unidad_sol,1,0,'C');

$sql = "SELECT id_unidad FROM unidad WHERE nombre like '$unidad_sol'";
$res = mysql_query($sql) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
$lin = mysql_fetch_array($res);
$id = $lin["id_unidad"];

$sql = "SELECT nombre FROM user WHERE id_unidad = '$id'";
$resp = mysql_query($sql);
$filas = mysql_num_rows($resp);
if($filas!=0)
{ 	
	$cad='';
    while($linea1=mysql_fetch_array($resp))
	{  	
		$nombre = $linea1['nombre'];
		$usuarios[$a] = $nombre;
		$a++;
		$cad = $cad." or destino like '".$nombre."'";
	}
}
$var = strlen($cad);
$cad = substr($cad,4,$var);
$long = strlen($fecha);

for($j=0; $j<=4; $j++)
{
	$sum = 0;
	$cad1 = $mes[$i];
	$sql = "SELECT distinct(rut) FROM correspondencia WHERE ".$cad." or unidad like '$unidad_sol' and fecha like '%$cad1%'";
	$res = mysql_query($sql) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
	$num = mysql_num_rows($res);
	if($num > 0)
	{
		while ($vec = mysql_fetch_array($res))
		{
			$rut = $vec["rut"];
			$sql1 = "SELECT max(id_c) as id_c FROM correspondencia WHERE rut like '$rut'";
			$res1 = mysql_query($sql1) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
			$vec1 = mysql_fetch_array($res1);
			$id_c = $vec1["id_c"];
			
			$sql2 = "SELECT destino FROM correspondencia WHERE id_c = '$id_c'";
			$res2 = mysql_query($sql2) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
			$num2 = mysql_num_rows($res2);
			if($num2 > 0)
			{	
				$vec2 = mysql_fetch_array($res2);
				$destino = $vec2["destino"];
				for($i=0;$i<$a;$i++)
				{
					if($destino == $usuarios[$i])
						$sw=1;
				}
				if($sw == 1)
					$sum++;
			}
		}
		$pdf->Cell(20,7,$sum,1,0,'C');
	}
	$sum = $sum + $num;
	}
$pdf->Ln();
$pdf->Output();
?>