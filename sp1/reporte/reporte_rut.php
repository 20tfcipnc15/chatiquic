<?php
require('fpdf.php');
include("../../funciones1.php");
$link = conexion();

include("../../php/fecha_hora.php");
$fecha_actual = fecha_hora();

$rut= $_POST['rut'];
$nombre_ini = $_POST['usuario'];
$unidad_ini= $_POST['unidad'];

$nom_unidad = strtoupper($unidad_ini);

$ip=$_SERVER['REMOTE_ADDR']; 

class PDF extends FPDF
{
	function Header()
	{	$rut = $_POST['rut'];
		$rut = strtoupper($rut);
//		global $fecha_solicitud;
		global $nom_unidad;
		$this->SetFont('Times','B',14);
		$this->Cell(80);
		$this->Cell(200,7,'',0,1,'C');	
		$this->Cell(0,4,'CHASQUI  DIGITAL',0,1,'C');
		$this->Ln();
		$this->SetFont('Arial','B',11);
		$this->Cell(0,4,$nom_unidad.' F.C.P.N.',0,1,'C');
		$this->Ln();
		$this->Cell(0,4,'R.U.T.: '.$rut,0,1,'C');
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

$pdf->Cell(0,4,'ESTADO ACTUAL DEL TRAMITE',0,1,'C');
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

/*$sql = "SELECT * FROM correspondencia WHERE rut like '$rut' ORDER BY id_c ASC";
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
			if ($i==1)
				$fecha_inicial = $fecha;
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
$pdf->Ln();

$fecha_final=$fecha;
include ('../tiempo_tramite_1.php');
$total = tiempo_tramite($fecha_inicial,$fecha_final);
$pdf->Cell(5,6,'',0,0,'L');
$pdf->Cell(82,6,$total,0,1,'L');*/

//*********************
//TRABAJAMOS CON EL SEGUIMIENTO DE LA CORRESPONDENCIA
$i=0;
$sql ="SELECT * FROM correspondencia WHERE rut like '%$rut%' ORDER BY id_c ASC";

		$res = mysql_query($sql) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
		$vec = mysql_fetch_array($res);
		$filas = mysql_num_rows($res);
		$unidad = $vec["unidad"];
		$destino = $vec["destino"];
		$id_c=$vec["id_c"];
		$rut=$vec["rut"]; 
		$hoja_ruta=$vec["hoja_ruta"];
		$correlativo=$vec["correlativo"];
		$responsable=$vec["responsable"];
		$fecha1=$vec["fecha"];
		$tipo=$vec["tipo"];
		$referencias=$vec["referencias"];
		$fojas=$vec["fojas"];
		
		//almacenasmos la fecha inicial
		$fecha_inicial = $fecha1;
		
		$filas = mysql_num_rows($res);
if($filas > 0)
{
		while($vec = mysql_fetch_array($res))
		{	
			$id_c=$vec["id_c"];
			$rut=$vec["rut"]; 
			$responsable=$vec["responsable"];
			$fecha=$vec["fecha"];
			$tipo=$vec["tipo"];
			$referencias=$vec["referencias"];
			$destino=$vec["destino"];
			$unidad=$vec["unidad"];
			$comentario=$vec["comentario"];
			$correlativo=$vec['correlativo'];
			$i++;
			/*if($i == 1)
				$fecha_inicial=$fecha;
////////////
			*/if($i == 2)
			{
				$fecha_ingreso=$fecha1;
			}
///////////
		else
		{	$sql2 = "SELECT fecha FROM recibido WHERE id_c = '$id_c'";
			$res2 = mysql_query($sql2) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
			$vec2 = mysql_fetch_array($res2);
			$fecha_ingreso = $vec2["fecha"];
		}
		
//VERIFICAMOS LA FINALIZACION DEL TRAMITE
		if($filas == $i)
		{	
			$sub = ':';
			$var = strpos($comentario,$sub);
			$estado = substr($comentario,0,$var);
			if($estado == 'Concluido')
	 
//*********************
$pdf->Ln();
$pdf->Output();
?>