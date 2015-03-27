<?php
include("../../funciones1.php");
$link=conexion();

include("../../php/fecha_hora.php");
$fecha1=fecha_hora();
$dias = array("DOM","LUN","MAR","MIE","JUE","VIE","SAB");
$fecha2=$dias[date("w")];

$fecha=$fecha2.' '.$fecha1;

$id_c = $_GET['rut'];
$vec = explode(",",$id_c);

/////////////////////////*****************************
include("../rutas.php");
$rutas = numero_rutas($vec[7]);
/////////////////////////*****************************

require('fpdf.php');
$pdf=new FPDF('p','mm','letter');
$pdf->SetMargins(0,0,0) ;
$pdf->SetAutoPageBreak(1,0);
$pdf->AddPage();
$pdf->Rect (142,30,68,43); 
$pdf->Rect (141,29,70,45); 
$pdf->Line(142,47,210,47);
$pdf->SetFont('Times','B',8);
$pdf->Cell(352,31,'',0,1,'C');
$pdf->Cell(352,5,'FACULTAD DE CIENCIAS PURAS Y NATURALES',0,1,'C');
//$pdf->Ln(1);
$pdf->SetFont('Times','B',9);
$pdf->Cell(355,5,strtoupper($vec[0]),0,1,'C');
$pdf->SetFont('Times','B',8);
$pdf->Cell(355,5,'CHASQUI  DIGITAL',0,1,'C');
//////////////////////********************
$pdf->SetFont('Times','B',15);
$pdf->Cell(410,-5,$vec[6],0,1,'C');
//////////////////////********************
$pdf->Ln(1);
$pdf->Image('../../img/escudo8.jpg',145,36,5,10,'JPG');
$pdf->SetFont('Arial','B',9);
$pdf->Cell(142,6,'',0,1,'L');
$pdf->Cell(142,5,'',0,0,'L');
$pdf->Cell(5,5,'R.U.T.: ',0,0,'L');
$pdf->SetFont('Arial','B',10);
$pdf->Cell(24,5,'',0,0,'L');
$pdf->Cell(15,5,$vec[1],0,0,'L');
////////////////////**********************
$pdf->Cell(8,5,'',0,0,'L');
$pdf->Cell(8,5,'Sec. ',0,0,'L');
$pdf->SetFont('Arial','B',10);
$pdf->Cell(1,5,'',0,0,'L');
$pdf->Cell(1,5,$rutas+1,0,1,'L');
//$pdf->Cell(15,-55,$vec[1],0,1,'L');

/*$pdf->Cell(5,79,'R.U.T.: ',0,0,'L');
$pdf->SetFont('Arial','B',10);
$pdf->Cell(7,5,'',0,0,'L');
$pdf->Cell(15,79,$vec[1],0,0,'L');
////////////////////**********************
$pdf->Cell(14,15,'',0,0,'L');
$pdf->Cell(16,79,'Secuencia ',0,0,'L');
$pdf->SetFont('Arial','B',10);
$pdf->Cell(4,15,'',0,0,'L');
$pdf->Cell(30,79,$rutas,0,1,'L');*/

$pdf->SetFont('Arial','B',8.5);
$pdf->Cell(142,6,'',0,0,'L');
$pdf->Cell(5,5,'TIPO DE TRAMITE:',0,0,'L');
$pdf->Cell(24,5,'',0,0,'L');
$pdf->SetFont('Arial','',9);
$pdf->Cell(10,5,substr($vec[2],0,23),0,1,'L');

/*$pdf->SetFont('Arial','B',8.5);
$pdf->Cell(142,-70,'',0,0,'L');
$pdf->Cell(355,-70,'RECIBIDO POR:         '.$responsable,0,0,'L');
//$pdf->Cell(142,-70,'',0,0,'L');
$pdf->SetFont('Arial','',9);
$pdf->Cell(360,-70,$responsable,0,1,'L');*/

$pdf->SetFont('Arial','B',8.5);
$pdf->Cell(142,5,'',0,0,'L');
$pdf->Cell(5,5,'FECHA Y HORA:',0,0,'L');
$pdf->SetFont('Arial','',8);
$pdf->Cell(24,5,'',0,0,'L');
$pdf->Cell(5,5,$fecha,0,1,'L');

$pdf->SetFont('Arial','B',8.5);
$pdf->Cell(142,6,'',0,0,'L');
$pdf->Cell(5,5,'RECIBIDO POR: ',0,0,'L');
$pdf->SetFont('Arial','',9);
$pdf->Cell(24,5,'',0,0,'L');
$pdf->Cell(5,5,$vec[4],0,1,'L');

$pdf->SetFont('Arial','B',8.5);
$pdf->Cell(142,5,'',0,0,'L');
$pdf->Cell(5,5,'FS: ',0,0,'L');
$pdf->SetFont('Arial','',9);
$pdf->Cell(2,5,'',0,0,'L'); 
$pdf->Cell(5,5,substr($vec[5],0,15),0,0,'L');
$pdf->Cell(17,5,'',0,0,'L');
$pdf->SetFont('Arial','B',8.5);
$pdf->Cell(10,5,'FIRMA: ',0,0,'L');
$pdf->SetFont('Arial','',9);
$pdf->Cell(15,5,'............................',0,1,'L');
///////////////////////////
/*$pdf->SetFont('Arial','B',8.5);
$pdf->Cell(142,75,'',0,0,'L');
$pdf->Cell(5,75,'RECIBIDO POR: ',0,0,'L');
$pdf->SetFont('Arial','',9);
$pdf->Cell(24,75,'',0,0,'L');
$pdf->Cell(5,75,$vec[6],0,1,'L');*/

/*$pdf->SetFont('Arial','B',8.5);
$pdf->Cell(142,80,'',0,0,'L');
$pdf->Cell(5,80,'FIRMA: ',0,0,'L');
$pdf->SetFont('Arial','',9);
$pdf->Cell(24,80,'',0,0,'L');
$pdf->Cell(15,80,'........................................',0,1,'L');*/
										
$pdf->Ln();
$pdf->Output();
//para actualizar en la Base de Datos

$id_unidadis=$vec[8];
$reg_int=$vec[7];
$id_cr=$vec[7];
$recibido_por=$vec[4];
$fechas=$fecha;
$ip=$vec[9];
			//Primero Verificamos si ya esta recibido y sino por else hacemos el insert.....
			$sqlr = "SELECT * FROM recibido WHERE id_unidad='$id_unidadis' and reg_int='$reg_int' and id_c='$id_cr' and recibido_por='$recibido_por'";
			$resr = mysql_query($sqlr) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
			$numr = mysql_num_rows($resr);
			
			if($numr <= 0)
			{	
				$sql = "INSERT INTO recibido(id_re,id_unidad,reg_int,id_c,recibido_por,ip,fecha) VALUES 
										(NULL,'$id_unidadis','$reg_int','$id_cr','$recibido_por','$ip','$fechas')";
										$result = mysql_query($sql,$link);
			}
?>