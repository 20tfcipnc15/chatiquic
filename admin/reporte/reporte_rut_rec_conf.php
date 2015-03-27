<?php
$x = $_POST['izq'];
$y = $_POST['sup'];
$id_c = $_POST['id'];
$resp = $_POST['resp'];

if($y <= 233 and $y >= 2 and $x <= 144 and $x >= 2)
{
include("../../funciones1.php");
$link=conexion();

include("../../php/fecha_hora.php");
$fecha=fecha_hora();

$sql = "SELECT * FROM correspondencia WHERE id_c = '$id_c'";
$res = mysql_query($sql) or die ("Error de b&uacute;squeda en la BD: ".mysql_error());
$num = mysql_num_rows($res);
if($num > 0)
{			
	while ($vec = mysql_fetch_array($res))
	{			
		$rut = $vec["rut"];
		$unidad = $vec["unidad"];
		$tipo = $vec["tipo"];
		$fojas = $vec["fojas"];
		$estado = $vec["estado"];
	}		
}


include("../rutas.php");
$rutas = numero_rutas($vec[7]);


require('fpdf.php');
$pdf=new FPDF('p','mm','letter');
$pdf->SetMargins(0,0,0) ;
$pdf->SetAutoPageBreak(1,0);
$pdf->AddPage();
$pdf->Rect ($x+1,$y,68,43); 
$pdf->Rect ($x,$y-1,70,45); 
$pdf->Line($x+1,$y+17,$x+69,$y+17);
$pdf->SetFont('Times','B',8);
$pdf->Cell($x+2,$y+1,'',0,1,'C');
$pdf->Cell($x+2,5,'',0,0,'C');
$pdf->Cell(66,5,'FACULTAD DE CIENCIAS PURAS Y NATURALES',0,1,'C');
//$pdf->Ln(1);
$pdf->SetFont('Times','B',9);
$pdf->Cell($x+2,5,'',0,0,'C');
$pdf->Cell(66,5,strtoupper($unidad),0,1,'C');
$pdf->SetFont('Times','B',8);
$pdf->Cell($x+2,5,'',0,0,'C');
$pdf->Cell(66,5,'CHASQUI  DIGITAL',0,1,'C');
//////////////////////********************
$pdf->SetFont('Times','B',15);
$pdf->Cell($x+2,5,'',0,0,'C');
$pdf->Cell(66,-5,$estado,0,1,'R');
//////////////////////********************
$pdf->Ln(1);
$pdf->Image('../../img/escudo8.jpg',$x+5,$y+6,5,10,'JPG');
$pdf->SetFont('Arial','B',9);
$pdf->Cell($x+2,6,'',0,1,'L');
$pdf->Cell($x+2,5,'',0,0,'L');
$pdf->Cell(5,5,'R.U.T.: ',0,0,'L');
$pdf->SetFont('Arial','B',10);
$pdf->Cell(24,5,'',0,0,'L');
$pdf->Cell(15,5,$rut,0,0,'L');
////////////////////**********************
$pdf->Cell(8,5,'',0,0,'L');
$pdf->Cell(8,5,'Sec. ',0,0,'L');
$pdf->SetFont('Arial','B',10);
$pdf->Cell(1,5,'',0,0,'L');
$pdf->Cell(1,5,$rutas+1,0,1,'L');


$pdf->SetFont('Arial','B',8.5);
$pdf->Cell($x+2,6,'',0,0,'L');
$pdf->Cell(5,5,'TIPO DE TRAMITE:',0,0,'L');
$pdf->Cell(24,5,'',0,0,'L');
$pdf->SetFont('Arial','',9);
$pdf->Cell(10,5,substr($tipo,0,23),0,1,'L');


$pdf->SetFont('Arial','B',8.5);
$pdf->Cell($x+2,5,'',0,0,'L');
$pdf->Cell(5,5,'FECHA Y HORA:',0,0,'L');
$pdf->SetFont('Arial','',9);
$pdf->Cell(24,5,'',0,0,'L');
$pdf->Cell(5,5,$fecha,0,1,'L');

$pdf->SetFont('Arial','B',8.5);
$pdf->Cell($x+2,6,'',0,0,'L');
$pdf->Cell(5,5,'RECIBIDO POR: ',0,0,'L');
$pdf->SetFont('Arial','',9);
$pdf->Cell(24,5,'',0,0,'L');
$pdf->Cell(5,5,$resp,0,1,'L');

$pdf->SetFont('Arial','B',8.5);
$pdf->Cell($x+2,5,'',0,0,'L');
$pdf->Cell(5,5,'FS: ',0,0,'L');
$pdf->SetFont('Arial','',9);
$pdf->Cell(2,5,'',0,0,'L'); 
$pdf->Cell(5,5,substr($fojas,0,15),0,0,'L');
$pdf->Cell(17,5,'',0,0,'L');
$pdf->SetFont('Arial','B',8.5);
$pdf->Cell(11,5,'FIRMA: ',0,0,'L');
$pdf->SetFont('Arial','',9);
$pdf->Cell(5,5,'............................',0,1,'L');

$pdf->Ln();
$pdf->Output();
}
else 
{
?>
<style type="text/css">
<!--
.Estilo2 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	color: #25496D;
}
.Estilo3 {
	color: #25496D;
	font-size: 12px;
}
.Estilo4 {
	color: #FFFFFF;
	font-weight: bold;
	font-family: Arial, Helvetica, sans-serif;
	font-size: 14px;
}
.Estilo5 {font-size: 12px}
.Estilo6 {color: #25496D}
-->
</style>
<p>&nbsp;</p>
<table width="327" border="0" align="center" cellpadding="0" cellspacing="2" bgcolor="#74ABD3">
  <tr>
    <td><div align="center"><span class="Estilo59 Estilo79 Estilo88 Estilo4">ALERTA</span></div></td>
  </tr>
  <tr>
    <td bgcolor="#B1CBE4"><table width="318" border="0" align="center" bgcolor="#B1CBE4">
      <tr>
        <td><p class="Estilo78 Estilo79">&nbsp;</p>
              <p class="Estilo2">Por favor verifique las medidas, existe un error en los margenes definidos.</p>
              <p class="Estilo2"><br />
                Las medidas deben estar en el siguiente rango.</p>
              <p class="Estilo2">&nbsp;</p>
              <p class="Estilo3">Margen Izquierdo (eje X): 5 - 140</p>
              <p class="Estilo3">Margen Superior (eje Y): 5 - 230</p>
              <p class="Estilo3">&nbsp;</p>
            <p align="center" class="Estilo5"><a href="../config.php"><span class="Estilo78  Estilo6">Configurar el sello digital para la Impresi&oacute;n</span></a>
              <? 
}
?>
            </p>
              <p class="Estilo78 Estilo79">&nbsp;</p>          </td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="1" bgcolor="#74ABD3">&nbsp;</td>
  </tr>
</table>
