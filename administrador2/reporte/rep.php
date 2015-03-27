<?php
require('fpdf.php');
include("../../funciones1.php");
$link = conexion();

include("../../php/fecha_hora.php");
$fecha_actual = fecha_hora();

$nombre_ini = $_POST['usuario'];
$unidad_ini = $_POST['unidad'];
$id_unidad_ini = $_POST['id'];
$uno = $_GET['var'];

$fecha = $_POST['fecha'];
$rut = $_POST['rut'];
$unidad = $_POST['unidad'];
$otro = $_POST['otro'];
$procedencia = $_POST['procedencia'];
$responsable = $_POST['responsable'];
$concluido = $_POST['concluido'];
$destino = $_POST['destino'];
$estado = $_POST['estado'];
$tipo = $_POST['tipo'];
//*****************
if($unidad==null)
	$unidad=$otro;

$vector[0]= $procedencia;
$vector[1]= $responsable;
$vector[2]= $concluido;
$vector[3]= $destino;
$vector[4]= $estado;
$vector[5]= $tipo;

for ($i=0;$i<=5;$i++)
{
	$dato = $vector[$i];
	if($dato != null)
		$mes = $i;
}
/*if ($i != 2)
{
	$cad = $campo[$i].' like '.$vector[$i].' and unidad like ".$unidad_ini."';
	$cadena = $cadena.' '.$atributo." like '%".$valor."%' and ";
}
else
{
	
}
$sql = "SELECT * FROM correspondencia WHERE".$cad." GROUP BY rut ORDER BY rut ASC";
$res = mysql_query($sql) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
$num = mysql_num_rows($res); 
if ($num > 0) 					
{	
	while($fila = mysql_fetch_array($res))
	{
		$id_c = $fila['id_c'];
		$rut = $fila['rut'];
	}
}*/
switch ($mes)
{ 
	case 1: $mes = 0;	$sql = "SELECT distinct(unidad),COUNT(unidad)
								FROM correspondencia
								WHERE destino like '$unidad' and fecha like '%oct%'
								GROUP BY unidad
								HAVING COUNT(unidad)>0
								ORDER BY id_c ASC ";	break; 
								
	case 2: $mes = 1;	$sql = "SELECT id_unidad FROM unidad WHERE unidad like '$unidad'";
						$resp = mysql_query($sql);
						$filas = mysql_num_rows($resp);
						if($filas > 0)
						{ 	
						    $linea1 = mysql_fetch_array($resp);
							$id_unidad = $linea1['id_unidad'];
	
							$sql = "SELECT nombre FROM user WHERE id_unidad = '$id_unidad'";
							$resp = mysql_query($sql);
							$filas = mysql_num_rows($resp);
							if($filas!=0)
							{ 	
								$a=0;
							    while($linea1 = mysql_fetch_array($resp))
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
								$cad = $cad." or responsable like '".$nom."'";
							}
						}
						$cad = substr($cad,0,strlen($cad));
						$sql = "SELECT distinct(responsable),COUNT(responsable)
								FROM correspondencia
								WHERE unidad like '$unidad' and ( ".$cad."
								GROUP BY responsable
								HAVING COUNT(responsable) > 0
								ORDER BY id_c ASC";
						break; 

	case 3: $mes = 2;	$sqla = "SELECT distinct(rut) FROM correspondencia WHERE comentario like '%concluido%' order by id_c ASC";
						$resa = mysql_query($sqla) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
						$numa = mysql_num_rows($resa);
						if ($numa > 0)
						{		
							while ($linea = mysql_fetch_array($resa))
							{	
								$rut = $linea["rut"];	
								$sql = "SELECT * FROM correspondencia WHERE rut like '$rut' 
								ORDER BY id_c DESC limit 1";
								$res = mysql_query($sql) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
								$num = mysql_num_rows($res);
								if($num > 0)
								{	
									$vec = mysql_fetch_array($res);
									echo $comentario = $vec["comentario"];
									$sub = ':';
									$var = strpos($comentario,$sub);
									$estado = substr($comentario,0,$var);
									if($estado == 'Concluido')
									{	$rut = $vec["rut"];
										$fecha = $vec["fecha"];
										$unidad = $vec["responsable"];
										$rreferencias = $vec["referencias"];
									}
								}
							}
						}
						//Trabajamos con la segunda Base de Datos
						$sql = "SELECT *,COUNT(rut) 
								FROM correspondencia 
								GROUP BY rut HAVING COUNT(rut) > 0
								ORDER BY fecha ASC";
						break; 

	case 4: $mes = 3;	$sql = "SELECT nombre FROM user WHERE id_unidad = '$id_unidad_ini'";
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
							$cad = $cad." and destino != '".$nom."'";
						}
						$sql = "SELECT * FROM correspondencia 
								WHERE fecha like '%$fecha_solicitud%' and unidad like '$unidad_ini'".$cad." ORDER BY id_c ASC";
					
						$sql = "SELECT distinct(destino),COUNT(destino)
								FROM correspondencia
								WHERE unidad like '$unidad' ".cad."
								GROUP BY destino
								HAVING COUNT(destino)>0
								ORDER BY id_c ASC";
						break; 
	case 5: $mes = 4; 	break;
	case 6: $mes = 5; 	$sql = "SELECT DISTINCT (tipo), COUNT( tipo ) 
								FROM correspondencia
								WHERE unidad LIKE 'Decanato' AND tipo != ''
								GROUP BY tipo
								HAVING COUNT( tipo ) >0
								ORDER BY tipo ASC";
						break;
}
//*****************

$nom_unidad = strtoupper($unidad_ini);

$ip = $_SERVER['REMOTE_ADDR']; 

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

$pdf->Cell(0,4,'CORRESPONDENCIA RECIBIDA '.$uno.'  aaaaa'.$rut.' ALEIDA'.$id_c,0,1,'C');
$pdf->SetFont('Arial','B',10);
$pdf->Ln(4);
$pdf->Cell(5,7,'',0,0,'C');
$pdf->Cell(18,7,'R.U.T.'.$fecha,1,0,'C','1');
$pdf->Cell(45,7,'FECHA'.$rut,1,0,'C','1');
$pdf->Cell(45,7,'PROCEDENCIA'.$tipo,1,0,'C','1');
$pdf->Cell(35,7,'ENVIADO POR'.$unidad,1,0,'C','1');
$pdf->Cell(35,7,'REG.EXT.'.$otro,1,0,'C','1');
$pdf->Cell(22,7,'H. RUTA'.$responsable,1,0,'C','1');
$pdf->Cell(52,7,'DESTINO'.$concluido,1,0,'C','1');
$pdf->Cell(82,7,'REFERENCIAS'.$estado,1,1,'C','1');
$pdf->Cell(82,7,'REFERENCIAS'.$procedencia,1,1,'C','1');
$pdf->Cell(82,7,'REFERENCIAS'.$destino,1,1,'C','1');

$pdf->Ln();
$pdf->Output();
?>