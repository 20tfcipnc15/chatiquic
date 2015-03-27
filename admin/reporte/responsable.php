<?php
require('../reporte/fpdf.php');
include("../../funciones1.php");
$link1 = conexion();
include ('../../admin/tiempo_tramite.php');
include("../../php/fecha_hora.php");
$fecha_actual = fecha_hora();

$fecha_solicitud = $_POST['fecha'];
$nombre_ini = $_POST['usuario'];
$unidad_ini = $_POST['unidad'];
$id_unidad_ini = $_POST['id'];

/*$uni = $_GET['var'];
$nom = $_GET['var1'];
$fecha = $_GET['var2'];
$unidad_sol = $_GET['var3'];
$nom_unidad = strtoupper($uni);*/

$ip = $_SERVER['REMOTE_ADDR']; 
class PDF extends FPDF
{
	function Header()
	{	
		global $fecha_actual;
///		global $nom_unidad;
//		global $nom;
		global $unidad_ini;
//		global $fecha;
		$this->SetFont('Times','B',14);
		$this->Cell(80);
		$this->Cell(200,7,'',0,1,'C');	
		$this->Cell(0,4,'CHASQUI  DIGITAL',0,1,'C');
		$this->Ln();
		$this->SetFont('Arial','B',11);
		$this->Cell(0,4,strtoupper($unidad_ini).' F.C.P.N.',0,1,'C');
		$this->Ln();
		$this->Cell(0,4,'REPORTE DE FECHA: '.$fecha_actual,0,1,'C');
		$this->Cell(0,4,'',0,1,'C');
		$this->Image('../../imagenes/UMSA.jpg',18,6,16,30,'JPG');
		$this->Image('../../imagenes/loguito.jpeg',310,6,28,30,'JPEG');
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

//$unidad_show = strtoupper($unidad_sol);
$pdf->SetFont('Times','B',12);
$pdf->Cell(0,4,'UBICACION ACTUAL DE LOS TRAMITES',0,1,'C');
$pdf->SetFont('Arial','B',10);
$pdf->Ln();
$pdf->Ln();

$sql7 = "SELECT id_unidad FROM unidad WHERE nombre like '$unidad_ini'";
$res7 = mysql_query($sql7) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
$num7 = mysql_num_rows($res7);
$linea7 = mysql_fetch_array($res7);
$id_unidad = $linea7["id_unidad"];	
 
$sql = "SELECT nombre,cargo FROM user WHERE id_unidad = '$id_unidad' ORDER BY nombre ASC";
$resp = mysql_query($sql);
$filas = mysql_num_rows($resp);
if($filas!=0)
{ 	
    while($linea1=mysql_fetch_array($resp))
	{  	
		$nombre = $linea1['nombre'];
		$cargo = $linea1['cargo'];
		$pdf->SetFillColor(200,220,255);
		$pdf->Cell(5,7,'',0,0,'L');
		$pdf->SetFont('Times','B',13);	
		$pdf->Cell(100,7,'NOMBRE: '.strtoupper($nombre),0,1,'L');		
		$pdf->SetFont('Arial','B',10);
		$pdf->Cell(5,7,'',0,0,'C');
		$pdf->Cell(18,7,'R.U.T.',1,0,'C','1');
		$pdf->Cell(45,7,'FECHA',1,0,'C','1');
		$pdf->Cell(45,7,'PROCEDENCIA',1,0,'C','1');
		$pdf->Cell(35,7,'ENVIADO POR',1,0,'C','1');
		$pdf->Cell(57,7,'REG.EXT.',1,0,'C','1');
		$pdf->Cell(52,7,'DESTINO',1,0,'C','1');
		$pdf->Cell(82,7,'REFERENCIAS',1,1,'C','1');

		$consulta = "SELECT distinct(rut) FROM correspondencia WHERE destino like '$unidad_ini' or destino like '$nombre' ORDER BY id_c DESC";
		$resultado = mysql_query($consulta) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
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
				$sql8 = "SELECT * FROM correspondencia WHERE rut like '$rut'";
				$res8 = mysql_query($sql8) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
				$num8 = mysql_num_rows($res8);
				if($num8 > 0)
				{	
					$vec = mysql_fetch_array($res8);
					$destino = $vec["destino"];
					if($cargo == 'Mensajero' or $cargo == 'Mensajera')
					{
						if($destino == $nombre or $destino == $unidad_ini)
							$imprimir = 1;
					}	
					elseif($destino == $nombre)
						$imprimir = 1;
				}	
				if($imprimir == 1)
				{					
					$responsable = $vec["responsable"];
					$correlativo = $vec["correlativo"];
					$referencias = $vec["referencias"];
					$destino = $vec["destino"];
					$unidad = $vec["unidad"];
					$fecha = $vec["fecha"];
					$fojas = $vec["fojas"];
					$rut = $vec["rut"];
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
					$pdf->SetFont('Arial','B',10);	
					$pdf->Cell(5,6,'',0,0,'L');
					if ($alert == 0)
					{
						$pdf->Cell(18,6,$rut,1,0,'C');
						$a++;
					}
					elseif ($alert == 1)
					{
						$pdf->SetFillColor(255,98,98);
						$pdf->Cell(18,6,$rut,1,0,'C',1);
						$b++;
					}
					elseif ($alert == 2)
					{
						$pdf->SetFillColor(255,255,0);
						$pdf->Cell(18,6,$rut,1,0,'C',1);                
						$c++;
					}
					$pdf->Cell(45,6,$fecha,1,0,'L');
					$pdf->Cell(45,6,$unidad,1,0,'L');
					$pdf->Cell(35,6,$responsable,1,0,'L');
					$pdf->Cell(57,6,$correlativo,1,0,'L');
					$pdf->Cell(52,6,$destino,1,0,'C');		
					$pdf->MultiCell(82,6,$referencias,1,1,'L');
				}
			}
				$pdf->SetFont('Times','B',13);	
				$pdf->Cell(6,4,'',0,0,'C');
				$pdf->Cell(6,4,'',1,0,'C');
				$pdf->Cell(88,6,'TRAMITES SIN ALERTA ',0,0,'L');	
				$pdf->Cell(10,6,$a,0,1,'L');	
				$pdf->SetFillColor(255,255,0);
				$pdf->Cell(6,4,'',0,0,'C');
				$pdf->Cell(6,4,'',1,0,'C',1);
				$pdf->Cell(88,6,'TRAMITES CON ALERTA AMARILLA ',0,0,'L');
				$pdf->Cell(10,6,$c,0,1,'L');		
				$pdf->SetFillColor(255,98,98);
				$pdf->Cell(6,4,'',0,0,'C');
				$pdf->Cell(6,4,'',1,0,'C',1);
				$pdf->Cell(88,6,'TRAMITES CON ALERTA ROJA ',0,0,'L');	
				$pdf->Cell(10,6,$b,0,1,'L');
				$pdf->Cell(4,4,'',0,1,'C');
				$pdf->Cell(4,4,'',0,0,'C');
				$pdf->Cell(88,6,'TOTAL DE TRAMITES ',0,0,'L');	
				$pdf->Cell(8,4,'',0,0,'C');
				$pdf->Cell(20,6,$i,0,1,'L');
				$pdf->Ln();
				$pdf->Ln();
		} //end while
	}//end if($numResultados)
}
$pdf->Ln();
$pdf->Output();
?>