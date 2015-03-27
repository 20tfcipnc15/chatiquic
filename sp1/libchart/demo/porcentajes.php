<?php
require('../../reporte/fpdf.php');
include("../../../funciones1.php");
$link = conexion();
include ('../../fecha_int.php');
include "../libchart/classes/libchart.php";
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
                global $unidad_sol;
		$this->SetFont('Times','B',14);
		$this->Cell(80);
		$this->Cell(200,7,'',0,1,'C');	
		$this->Cell(0,4,'CHASQUI  DIGITAL',0,1,'C');
		$this->Ln();
		$this->SetFont('Arial','B',11);
		$this->Cell(0,4,$nom_unidad.' F.C.P.N.',0,1,'C');
		$this->Ln();
		$this->Cell(0,4,'REPORTE DE FECHA: '.$fecha_actual,0,1,'C');
                $this->Ln();
                $this->Ln();
                $this->Cell(0,4,'UNIDAD: '.strtoupper($unidad_sol),0,1,'C');
		$this->Cell(0,4,'',0,1,'C');
		$this->Image('../../../imagenes/UMSA.jpg',18,6,16,30,'JPG');
		$this->Image('../../../imagenes/loguito.jpeg',170,6,28,30,'JPEG');
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
$pdf=new PDF('p','mm','letter');
$pdf->AddPage();
$pdf->SetMargins(2.5,2.5,2.5);
$pdf->SetAuthor('Aleida Iba�ez');
$pdf->SetFont('Times','B',12);
$pdf->SetFillColor(200,220,255);

$unidad_sol = strtoupper($unidad_sol);
$pdf->SetFont('Arial','B',10);
//*******************************
$sql = "SELECT id_unidad FROM unidad WHERE nombre like '$unidad_sol'";
$resp = mysql_query($sql);
$linea1 = mysql_fetch_array($resp);
$id_unidad = $linea1['id_unidad'];
$vector='';
//*******************************
$sql = "SELECT nombre FROM user WHERE id_unidad = '$id_unidad'";
$resp = mysql_query($sql);
$filas = mysql_num_rows($resp);
if($filas!=0)
{ 	
    $chart = new PieChart(550,450);
    $dataSet = new XYDataSet();
    $suma = 0;
    $i=0;
    while($linea1=mysql_fetch_array($resp))
    {
        $nombre = $linea1['nombre'];
        $names[$i] = $nombre;
        $sql2 = "SELECT responsable,COUNT(responsable) as total
		FROM correspondencia
		WHERE responsable like '$nombre'
		GROUP BY responsable
		HAVING COUNT(responsable) > 0
		ORDER BY responsable ASC";
	$res2 = mysql_query($sql2) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
	$num2 = mysql_num_rows($res2);

	$vec2 = mysql_fetch_array($res2);
	$responsable = $vec2["responsable"];
        $total = $vec2["total"];
        
        $vector[$i]=$total;
	$suma = $suma + $total;
        $i++;
    }
}
mysql_close();
include("../../../funciones2.php");
$link2 = conexion2();
$suma1 = 0;
for($j=0;$j<$i;$j++)
{
	$nombre = $names[$j];
        $sql2 = "SELECT responsable,COUNT(responsable) as total
		FROM correspondencia
		WHERE responsable like '$nombre'
		GROUP BY responsable
		HAVING COUNT(responsable) > 0
		ORDER BY responsable ASC";
	$res2 = mysql_query($sql2) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
	$num2 = mysql_num_rows($res2);

	$vec2 = mysql_fetch_array($res2);
	$responsable = $vec2["responsable"];
        $total = $vec2["total"];

        $total1 = $vector[$j] + $total;
	$suma1 = $suma1 + $total1;
	$dataSet->addPoint(new Point("$nombre($total1)", $total1));

}
$chart->setDataSet($dataSet);
//$chart->getPlot()->setGraphPadding(new Padding(25, 30, 20, 140));
$chart->setTitle("PORCENTAJES DE INTERACCION C0N EL SISTEMA DE UN TOTAL DE ".$suma1);
$chart->render("generated/demo4.png");
$pdf->Image('generated/demo4.png',20,50,200,150,'PNG');
/*    }
}
$cad='';
for ($b=0; $b < $a; $b++)
{
	$nom = $vec[$b];
	$cad = $cad." and destino != '".$nom."'";
}
$var = strlen($cad);
$cad = substr($cad,4,$var);

$long = strlen($fecha);

/*$fecha_ini = fecha_entero($fecha);
$fecha_fin = fecha_entero($fecha_fin);

if($fecha_fin == null)
	$cad1 = "fecha like '%$fecha%' ";
else
	$cad1 = "fecha_int between '$fecha_ini' and '$fecha_fin' ";*/
$pdf->Ln();
$pdf->Output();
?>