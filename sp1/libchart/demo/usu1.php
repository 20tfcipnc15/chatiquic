<?php
require('../../reporte/fpdf.php');
include("../../../funciones1.php");
$link1 = conexion();
include ('../../../admin/tiempo_tramite.php');
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
$usuario = $_GET['var4'];
$usuario = strtoupper($usuario);
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
		$this->Image('../../../imagenes/loguito.jpeg',174,6,28,30,'JPEG');
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
$pdf = new PDF('p','mm','letter');
$pdf->AddPage();
$pdf->SetMargins(2.5,2.5,2.5);

$pdf->SetAuthor('Aleida Ibañez');
$pdf->SetFont('Times','B',12);
$pdf->SetFillColor(200,220,255);

$unidad_show = strtoupper($unidad_sol);
$pdf->SetFont('Times','B',12);
$pdf->Cell(0,4,'CORRESPONDENCIA Y TRAMITES PENDIENTES: ROXANA FERNANDEZ - DECANATO',0,1,'C');
$pdf->SetFont('Arial','B',10);
$pdf->Ln();
$pdf->Ln();

$sql7 = "SELECT id_unidad
		 FROM unidad 
		 WHERE nombre like '$unidad_sol'";
$res7 = mysql_query($sql7) or die ("Error de b&uacute;squeda en la BD: ".mysql_error());
$num7 = mysql_num_rows($res7);
$linea7 = mysql_fetch_array($res7);
$id_unidad = $linea7["id_unidad"];	

//**************************
$pdf->Cell(28,7,'',0,0,'C');
$pdf->Cell(10,7,'No',1,0,'C',1);
$pdf->Cell(50,7,'RESPONSABLE',1,0,'C',1);
$pdf->Cell(25,7,'SIN ALERTA',1,0,'C',1);
$pdf->Cell(25,7,'A. AMARILLA',1,0,'C',1);
$pdf->Cell(25,7,'A. ROJA',1,0,'C',1);
$pdf->Cell(25,7,'TOTAL',1,1,'C',1);
$pdf->SetFont('Arial','',9);
$total_tr = 0;
$amarillo = 0;
$rojo = 0;
$normal = 0;
$cont = 0;
//**************************
 
/*$sql = "SELECT nombre,cargo FROM user WHERE id_unidad = '$id_unidad' ORDER BY nombre ASC";
$resp = mysql_query($sql);
$filas = mysql_num_rows($resp);
if($filas!=0)
{ 	
    while($linea1=mysql_fetch_array($resp))
	{  	*/
		$cont++;
		$nombre = 'Roxana Fernandez';
		$cargo = $linea1['cargo'];
		$pdf->SetFillColor(200,220,255);
		$pdf->Cell(28,7,'',0,0,'L');
		$pdf->SetFont('Arial','',9);	
		$pdf->Cell(10,7,$cont,1,0,'C');
		$pdf->Cell(50,7,$nombre,1,0,'L');		
		
		$consulta = "SELECT distinct(rut) FROM correspondencia WHERE destino like 'Roxana Fernandez' or destino like 'Decanato' ORDER BY id_c DESC";
		$resultado=mysql_query($consulta) or die ("Error de b&uacute;squeda en la BD: ".mysql_error());
		$numResultados = mysql_num_rows($resultado);
		if ($numResultados > 0)
		{		
			$i=0;
			$a=0;
			$b=0;
			$c=0;
			while ($linea = mysql_fetch_array($resultado))
			{	
				$rut = $linea["rut"];
				$imprimir = 0;		
				$sql8 = "SELECT * FROM correspondencia WHERE rut like '$rut' order by id_c DESC limit 1";
				$res8 = mysql_query($sql8) or die ("Error de b&uacute;squeda en la BD: ".mysql_error());
				$num8 = mysql_num_rows($res8);
				if($num8 > 0)
				{	
					$vec = mysql_fetch_array($res8);
					$destino = $vec["destino"];
					if($cargo == 'Mensajero' or $cargo == 'Mensajera')
					{
						if($destino == $nombre or $destino == $unidad_sol)
							$imprimir = 1;
					}	
					elseif($destino == $nombre)
						$imprimir = 1;
				}	
				if($imprimir == 1)
				{					
					$fecha = $vec["fecha"];
					$i++;
					//CALCULAMOS EL TIEMPO DE PERMANENCIA DEL TRAMITE
	                $fecha_fin=fecha_hora();
       				$fecha_ini=$fecha;
					$total = tiempo_tramite($fecha_ini,$fecha_fin);
					$vector = explode(",",$total);
					if ($vector [0]!=0)
						$alert=1;
					elseif ($vector [1]!=0)
						$alert = 1;
						elseif ($vector[2] >= 30)
							$alert =1;
							elseif ($vector[2] >= 15)
								$alert =2;
							else
								$alert=0;
					if ($alert == 0)
						$a++;
					elseif ($alert == 1)
						$b++;
					elseif ($alert == 2)
						$c++;
				}
			}
				$pdf->Cell(25,7,$a,1,0,'C');	
				$pdf->Cell(25,7,$c,1,0,'C');		
				$pdf->Cell(25,7,$b,1,0,'C');
				$pdf->Cell(25,7,$i,1,1,'C');
				$total_tr = $total_tr+$i;
				$normal = $normal + $a;
				$amarillo = $amarillo + $c;
				$rojo = $rojo + $b;
		} //end while
	//}//end if($numResultados)
//}
$pdf->SetFont('Arial','B',10);
$pdf->Cell(28,7,'',0,0,'C');
$pdf->Cell(60,7,'TOTAL',1,0,'C',1);
$pdf->Cell(25,7,$normal,1,0,'C',1);
$pdf->Cell(25,7,$amarillo,1,0,'C',1);
$pdf->Cell(25,7,$rojo,1,0,'C',1);
$pdf->Cell(25,7,$total_tr,1,0,'C',1);
$pdf->Ln();
$pdf->Output();
?>