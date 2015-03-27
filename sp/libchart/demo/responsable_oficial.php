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
$pdf = new PDF('l','mm','legal');
$pdf->AddPage();
$pdf->SetMargins(2.5,2.5,2.5);

$pdf->SetAuthor('Aleida Ibañez');
$pdf->SetFont('Times','B',12);
$pdf->SetFillColor(200,220,255);

$unidad_sol = strtoupper($unidad_sol);
$pdf->SetFont('Times','B',12);
$pdf->Cell(0,4,'UBICACION ACTUAL DE LOS TRAMITES: '.$unidad_sol,0,1,'C');
$pdf->SetFont('Arial','B',10);
$pdf->Ln();
$pdf->Ln();

/*include "../libchart/classes/libchart.php";
$chart = new PieChart(550,450);
$dataSet = new XYDataSet();*/
		$sql7 = "SELECT id_unidad
				 FROM unidad 
				 WHERE nombre like '$unidad_sol' and id_unidad <= 65
				 ORDER BY nombre ASC ";
		$res7 = mysql_query($sql7) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
		$num7 = mysql_num_rows($res7);
		if ($num7 > 0)
		{		
			while ($linea7 = mysql_fetch_array($res7))
			{	
				$id_unidad = $linea7["id_unidad"];		
				$sql2 = "SELECT nombre 
						 FROM user 
						 WHERE id_unidad = $id_unidad 
						 ORDER BY nombre ASC";
				$res2 = mysql_query($sql2);
				$num2 = mysql_num_rows($res2);
				if($num2!=0)
				{ 	
					$unidad = strtoupper($unidad);
			    	while($linea2 = mysql_fetch_array($res2))
					{  	
						$pdf->SetFillColor(200,220,255);
						$nombre = $linea2['nombre'];
						$pdf->Cell(5,7,'',0,0,'L');
						$pdf->SetFont('Times','B',13);	
						$pdf->Cell(100,7,'NOMBRE: '.$nombre,0,1,'L');
						$pdf->SetFont('Arial','B',10);
						$pdf->Cell(5,7,'',0,0,'C');
						$pdf->Cell(18,7,'R.U.T.',1,0,'C','1');
						$pdf->Cell(45,7,'FECHA',1,0,'C','1');
						$pdf->Cell(45,7,'PROCEDENCIA',1,0,'C','1');
						$pdf->Cell(35,7,'ENVIADO POR',1,0,'C','1');
						$pdf->Cell(57,7,'REG.EXT.',1,0,'C','1');
						$pdf->Cell(52,7,'DESTINO',1,0,'C','1');
						$pdf->Cell(82,7,'REFERENCIAS',1,1,'C','1');

						$sql3 = "SELECT *
								 FROM correspondencia
								 WHERE destino like '$nombre'
								 ORDER BY id_c DESC ";
						$res3 = mysql_query($sql3) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
						$num3 = mysql_num_rows($res3);
						if ($num3 > 0)
						{	
							$i = 0;
							while ($linea3 = mysql_fetch_array($res3))
							{	
								$responsable = $linea3["responsable"];
								$correlativo = $linea3["correlativo"];
								$referencias = $linea3["referencias"];
								$unidad = $linea3["unidad"];
								$fecha = $linea3["fecha"];
								$fojas = $linea3["fojas"];
								$rut = $linea3["rut"];
								$destino = $linea3["destino"];
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
								$pdf->Cell(5,6,'',0,0,'L');
								if ($alert == 0)
								{
									$pdf->Cell(18,6,$rut,1,0,'C');
								}
								elseif ($alert == 1)
								{
									$pdf->SetFillColor(255,98,98);
									$pdf->Cell(18,6,$rut,1,0,'C',1);
									}
								elseif ($alert == 2)
								{
									$pdf->SetFillColor(255,255,0);
									$pdf->Cell(18,6,$rut,1,0,'C',1);                
								}
								$pdf->Cell(45,6,$fecha,1,0,'L');
								$pdf->Cell(45,6,$unidad,1,0,'L');
								$pdf->Cell(35,6,$responsable,1,0,'L');
								$pdf->Cell(57,6,$correlativo,1,0,'L');
								$pdf->Cell(52,6,$destino,1,0,'C');		
								$pdf->MultiCell(82,6,$referencias,1,1,'L');
							}
							$pdf->SetFont('Times','B',13);	
							$pdf->Cell(5,7,'',0,0,'C');
							$pdf->Cell(52,6,'TOTAL DE TRAMITES '.$i,0,1,'C');		
							$pdf->AddPage();					
						}
					}
				}
			}
		}
$pdf->Ln();
$pdf->Output();
?>