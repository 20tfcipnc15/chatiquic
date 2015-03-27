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
	{	
		$fecha_solicitud= $_POST['fecha'];
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
		$this->Image('../../imagenes/UMSA.jpg',35,6,16,30,'JPG');
		$this->Image('../../imagenes/loguito.jpeg',325,6,28,30,'JPEG');
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

$pdf->Cell(0,4,'CORRESPONDENCIA RECIBIDA',0,1,'C');
$pdf->SetFont('Times','B',10);
$pdf->Ln(4);
$pdf->Cell(20,7,'',0,0,'C');
$pdf->Cell(18,7,'R.U.T.',1,0,'C','1');
$pdf->Cell(6,7,'ES.',1,0,'C','1');
$pdf->Cell(36,7,'FECHA',1,0,'C','1');
$pdf->Cell(42,7,'PROCEDENCIA',1,0,'C','1');
$pdf->Cell(35,7,'REGISTRADO POR',1,0,'C','1');
$pdf->Cell(40,7,'REG.EXT.',1,0,'C','1');
$pdf->Cell(12,7,'H.RUT',1,0,'C','1');
$pdf->Cell(36,7,'DESTINO',1,0,'C','1');
$pdf->Cell(104,7,'REFERENCIAS',1,1,'C','1');

$pdf->SetFont('Times','',11);

$i=0;
$m=0;

$sql = "SELECT * FROM correspondencia WHERE fecha like '%$fecha_solicitud%' and destino like '$unidad_ini' ORDER BY id_c ASC";
$resp = mysql_query($sql);
$num = mysql_num_rows($resp); 
if ($num > 0) 					
{	
	while($linea=mysql_fetch_array($resp))
	{
			$i++;
		    $fecha=$linea["fecha"];
 			$rut=$linea["rut"];
		 	$unidad=$linea["unidad"];
			$destino=$linea["destino"];
			$referencias=$linea["referencias"];
	 		$responsable=$linea["responsable"];    
			$hoja_ruta=$linea["hoja_ruta"];  
   			$tipo=$linea["tipo"];
	   		$correlativo=$linea["correlativo"];
   			$comentario=$linea["comentario"];
   			$estado = $linea["estado"];
			if ($estado == 'R' or $estado == 'U' or $estado == 'C')
				$estado = 'T';
			elseif ($estado == null and destino != null)
					$estado = 'T';	
			$pdf->Cell(20,6,'',0,0,'L');
			$pdf->Cell(18,6,$rut,1,0,'C');
			$pdf->Cell(6,6,$estado,1,0,'C');

			$fecha = substr($fecha,0,19);
			$pdf->Cell(36,6,$fecha,1,0,'L');
			$unidad = substr($unidad,0,22);
			$pdf->Cell(42,6,$unidad,1,0,'L');
			$pdf->Cell(35,6,$responsable,1,0,'L');

			if (strlen($correlativo)>20)
			{
				$long = strlen($correlativo) - 19;
				$correlativo = substr($correlativo,$long,strlen($correlativo));					
			}
			$pdf->Cell(40,6,$correlativo,1,0,'L');
			$pdf->Cell(12,6,$hoja_ruta,1,0,'C');		

			$destino = substr($destino,0,22);
			$pdf->Cell(36,6,$destino,1,0,'C');		
			$pdf->MultiCell(104,6,$referencias,1,1,'L');

   }
}
$pdf->Cell(20,6,'',0,0,'L');
$pdf->Cell(100,6,'TOTAL CORRESPONDENCIA RECIBIDA  '.$i,0,0,'L');
$pdf->addpage('l');
//////////////////////////
$pdf->SetFont('Times','B',12);
$pdf->Cell(0,4,'CORRESPONDENCIA DESPACHADA',0,1,'C');
//$pdf->SetFont('Arial','B',10);
$pdf->SetFont('Times','B',10);
$pdf->Ln(4);
$pdf->Cell(20,7,'',0,0,'C');
$pdf->Cell(18,7,'R.U.T.',1,0,'C','1');
$pdf->Cell(6,7,'ES.',1,0,'C','1');
$pdf->Cell(36,7,'FECHA',1,0,'C','1');
$pdf->Cell(42,7,'ORIGEN',1,0,'C','1');
$pdf->Cell(35,7,'DESPACHADO POR',1,0,'C','1');
$pdf->Cell(40,7,'CORRELATIVO',1,0,'C','1');
$pdf->Cell(12,7,'H.RUT',1,0,'C','1');
$pdf->Cell(36,7,'DESTINO',1,0,'C','1');
$pdf->Cell(104,7,'REFERENCIAS',1,1,'C','1');

$pdf->SetFont('Times','',11);

$n=0;
$j=0;
//**********************************************
//Obtenemos los id_user de usuarios, para considerar solo los despachos externos y no así los internos
$sql = "SELECT nombre FROM user WHERE id_unidad = '$id_unidad_ini'";
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
//$pdf->Cell(18,6,$cad.' Aleida',1,1,'C');
//***************
$sql = "SELECT * FROM correspondencia WHERE fecha like '%$fecha_solicitud%' and unidad like '$unidad_ini'".$cad." ORDER BY id_c ASC";
//$pdf->Cell(18,6,$sql.' Raquel',1,1,'C');
$resp = mysql_query($sql);
$filas = mysql_num_rows($resp);
if($filas!=0)
{ 
    while($linea1=mysql_fetch_array($resp))
	{  	
		$id_c = $linea1['id_c'];
		$rut = $linea1['rut'];
//OOBTENEMOS TODOS LOS REGISTROS DE CORRESPONDENCIA DESPACHADA

		//OBTENEMOS TODOS LOS CAMPOS DEL REGISTRO PARA DESPLEGARLOS POR PANATALLA
		$consulta ="SELECT * FROM correspondencia WHERE id_c = '$id_c'";
		$resultado=mysql_query($consulta) or die ("Error de búsqueda en la BD: ". mysql_Error());
		$numResultados = mysql_num_rows($resultado);  				
		if($numResultados > 0)
		{
		   while($linea=mysql_fetch_array($resultado))
		   { 
			$j++;
		    $fecha=$linea["fecha"];
 			$rut=$linea["rut"];
	 		$unidad=$linea["unidad"];
			$destino=$linea["destino"];
			$referencias=$linea["referencias"];
 			$responsable=$linea["responsable"];    
			$hoja_ruta=$linea["hoja_ruta"];  
   			$tipo=$linea["tipo"];
   			$correlativo=$linea["correlativo"];
	   		$comentario=$linea["comentario"];
 			$estado=$linea["estado"];
			if ($estado == 'R' or $estado == 'U' or $estado == 'C')
				$estado = 'T';
			elseif ($estado == null and destino != null)
					$estado = 'T';	
			//Verificamos si el reggistro ha sido archivado, por haber concluído
 			if($destino == null)
			{
				$destino = 'Trámite Archivado';
				$estado = 'F';
			}
			$pdf->Cell(20,6,'',0,0,'L');
			$pdf->Cell(18,6,$rut,1,0,'C');
			$pdf->Cell(6,6,$estado,1,0,'C');
			
			$fecha = substr($fecha,0,19);
			$pdf->Cell(36,6,$fecha,1,0,'L');
			$unidad = substr($unidad,0,22);
			$pdf->Cell(42,6,$unidad,1,0,'C');
			$pdf->Cell(35,6,$responsable,1,0,'L');

			if (strlen($correlativo)>20)
			{
				$long = strlen($correlativo) - 19;
				$correlativo = substr($correlativo,$long,strlen($correlativo));					
			}
			$pdf->Cell(40,6,$correlativo,1,0,'L');
			$pdf->Cell(12,6,$hoja_ruta,1,0,'C');	
			$destino = substr($destino,0,22);	
			$pdf->Cell(36,6,$destino,1,0,'L');		
			$pdf->MultiCell(104,6,$referencias,1,1,'L');
			}
		}
	}
}
$pdf->Cell(20,6,' ',0,0,'L');
$pdf->Cell(100,6,'TOTAL CORRESPONDENCIA DESPACHADA  '.$j,0,0,'L');		
//////////////////////////
//INSERTAMOS EL REPORTE REALIZADO EN LA TABLA REPORTES, TOMANDO EN CONSIDERACIN LA FECHA DE EJECUCION Y SOLICITUD
/*		$sql="INSERT INTO reportes (id_report,fecha,fecha_sol,responsable,ip) VALUES 	
		(NULL,'$fecha_solicitud','$fecha_actual','$nombre_ini','$ip')";*/

$pdf->Ln();
$pdf->Output();
?>