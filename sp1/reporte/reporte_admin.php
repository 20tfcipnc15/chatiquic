<?php

require('fpdf.php');
include("../../funciones1.php");
$link = conexion();

include("../../php/fecha_hora.php");
$fecha_actual = fecha_hora();

$fecha_solicitud = $_POST['fecha'];
$nombre_ini = $_POST['usuario'];
$unidad_ini = $_POST['unidad'];

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
$pdf->SetFont('Arial','B',10);
$pdf->Ln(4);
$pdf->Cell(5,7,'',0,0,'C');
$pdf->Cell(18,7,'R.U.T.',1,0,'C','1');
$pdf->Cell(45,7,'FECHA',1,0,'C','1');
$pdf->Cell(45,7,'PROCEDENCIA',1,0,'C','1');
$pdf->Cell(35,7,'RESPONSABLE',1,0,'C','1');
$pdf->Cell(35,7,'REG.EXT.',1,0,'C','1');
$pdf->Cell(22,7,'H. RUTA',1,0,'C','1');
$pdf->Cell(52,7,'DESTINO',1,0,'C','1');
$pdf->Cell(82,7,'REFERENCIAS',1,1,'C','1');

$i=0;
$m=0;

$sql = "SELECT distinct(rut),id_c FROM correspondencia WHERE fecha like '%$fecha_solicitud%' and destino like '%$unidad_ini%' GROUP BY rut ORDER BY rut ASC";
$resp = mysql_query($sql);
$num = mysql_num_rows($resp); 
if ($num > 0) 					
{	
	while($fila=mysql_fetch_array($resp))
	{
		$id_c = $fila['id_c'];
		$rut = $fila['rut'];
		$vector_A[$m] = $id_c;
		$m++;
		//OBTENEMOS TODOS LOS CAMPOS DEL REGISTRO PARA DESPLEGARLOS POR PANATALLA
		$consulta ="SELECT * FROM correspondencia WHERE id_c = '$id_c'";
		$resultado=mysql_query($consulta) or die ("Error de búsqueda en la BD: ". mysql_Error());
		$numResultados = mysql_num_rows($resultado);  				
		if($numResultados > 0)
		{
		   while($linea=mysql_fetch_array($resultado))
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
 
			$pdf->Cell(5,6,'',0,0,'L');
			$pdf->Cell(18,6,$rut,1,0,'C');
			$pdf->Cell(45,6,$fecha,1,0,'L');
			$pdf->Cell(45,6,$unidad,1,0,'L');
			$pdf->Cell(35,6,$responsable,1,0,'L');
			$pdf->Cell(35,6,$correlativo,1,0,'L');
			$pdf->Cell(22,6,$hoja_ruta,1,0,'C');		
			$pdf->Cell(52,6,$destino,1,0,'C');		
			$pdf->MultiCell(82,6,$referencias,1,1,'L');
	 	 }
	  }
   }
}
$pdf->addpage('l');
//////////////////////////
$pdf->SetFont('Times','B',12);
$pdf->Cell(0,4,'CORRESPONDENCIA DESPACHADA',0,1,'C');
$pdf->SetFont('Arial','B',10);
$pdf->Ln(4);
$pdf->Cell(5,7,'',0,0,'C');
$pdf->Cell(18,7,'R.U.T.',1,0,'C','1');
$pdf->Cell(45,7,'FECHA',1,0,'C','1');
$pdf->Cell(45,7,'ORIGEN',1,0,'C','1');
$pdf->Cell(35,7,'RESPONSABLE',1,0,'C','1');
$pdf->Cell(35,7,'REG.EXT.',1,0,'C','1');
$pdf->Cell(22,7,'H. RUTA',1,0,'C','1');
$pdf->Cell(52,7,'DESTINO',1,0,'C','1');
$pdf->Cell(82,7,'REFERENCIAS',1,1,'C','1');

$n=0;
$j=0;

$sql = "SELECT distinct(rut),id_c FROM correspondencia WHERE fecha like '%$fecha_solicitud%' and unidad like '$unidad_ini' and tipo like 'Notas Despachadas' GROUP BY rut ORDER BY rut ASC";
$resp = mysql_query($sql);
$filas = mysql_num_rows($resp);
if($filas!=0)
{ 
    while($linea1=mysql_fetch_array($resp))
	{  	
		$id_c = $linea1['id_c'];
		$rut = $linea1['rut'];
/*		$vector_B[$n]=$id_c;
		$n++;
	}
}

//Filtrammos el resultado de los id_c, es decir buscamos la correspondencia despachada, de tal forma que no se confunda con los registros recibidos
$z=0;
$long_A=count($vector_A);
$long_B=count($vector_B);

if($long_A > $long_B)
{
	for($a=0;$a<=m;$a++)
	{
		$val_A=$vector_A[$a];
		for($b=0;$b<=n;$b++)
		{
			$val_B=$vector_B[$b];
			if($val_A != $val_B)
				$sw=0;
			else
				$sw=1;
		}
		if($sw == 0)
		{	
			$vector[$z]=$val_A;
			$z++;
		}
			
	}
}
else
{
	for($a=0;$a<=n;$a++)
	{
		$val_B=$vector_B[$a];
		for($b=0;$b<=m;$b++)
		{
			$val_A=$vector_A[$b];
			if($val_A != $val_B)
				$sw=0;
			else
				$sw=1;
		}
		if($sw == 0)
		{
			$vector[$z]=$val_B;
			$z++;
		}
	}
}*/
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
 
			$pdf->Cell(5,6,'',0,0,'L');
			$pdf->Cell(18,6,$rut,1,0,'C');
			$pdf->Cell(45,6,$fecha,1,0,'L');
			$pdf->Cell(45,6,$unidad,1,0,'L');
			$pdf->Cell(35,6,$responsable,1,0,'L');
			$pdf->Cell(35,6,$correlativo,1,0,'L');
			$pdf->Cell(22,6,$hoja_ruta,1,0,'C');		
			$pdf->Cell(52,6,$destino,1,0,'C');		
			$pdf->MultiCell(82,6,$referencias,1,1,'L');
			}
		}
	}
}
//////////////////////////
//INSERTAMOS EL REPORTE REALIZADO EN LA TABLA REPORTES, TOMANDO EN CONSIDERACIN LA FECHA DE EJECUCION Y SOLICITUD
/*		$sql="INSERT INTO reportes (id_report,fecha,fecha_sol,responsable,ip) VALUES 	
		(NULL,'$fecha_solicitud','$fecha_actual','$nombre_ini','$ip')";*/

$pdf->Ln();
$pdf->Output();
?>