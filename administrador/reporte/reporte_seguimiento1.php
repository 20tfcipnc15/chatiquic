<?php
$cid_user=$_SESSION['id_user'];
$cnombre=$_SESSION['nombre_ini']; 
$cunidad=$_SESSION['unidad_ini']; 
$cid_unidad=$_SESSION['id_unidad']; 

require('fpdf.php');
include("../../funciones1.php");
$link=conexion();
$valor=$_POST['fecha'];
$ip=$_SERVER['REMOTE_ADDR']; 
class PDF extends FPDF
{
	function Header()
	{	global $valor;
		$this->SetFont('Arial','B',11);
		$this->Cell(80);
		$this->Cell(220,7,'',0,1,'C');
		$this->Cell(220,4,'CHASQUI  DIGITAL',0,1,'C');
		$this->Cell(220,4,'DECANATO F.C.P.N.',0,1,'C');
		$this->Ln();
		$this->Cell(220,4,'CORRESPONDENCIA RECIBIDA',0,1,'C');
		$this->Cell(220,4,'REPORTE: '.$valor,0,1,'C');
	}
	function Footer()
	{	
		global $valor;
	    $this->SetY(-15);
	    $this->SetFont('Arial','I',8);
	    $this->SetTextColor(128);
		$this->Cell(0,3,'Monoblock Central Edificio Antiguo P.B. Av. villazón No 1995',0,1,'C');
		$this->Cell(0,3,'2441570 - 2440571 Fax: 2441092',0,1,'C');
		$this->Cell(0,3,'La Paz - Bolivia',0,1,'C');
	}
	function ChapterTitle($num,$label)
	{
	    $this->SetFont('Arial','B',7);
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
//pdf=new FPDF(’L',’cm’,'Legal’);
$pdf->SetMargins(2.5,2.5,2.5) ;
$pdf->SetAuthor('Aleida Ibañez');
$pdf->PrintChapter(1,'','');
$pdf->Ln();
$pdf->Image('../../imagenes/loguito.jpeg',187,6,19,20,'JPEG');
$pdf->Image('../../imagenes/UMSA.jpg',8,6,11,22,'JPG');
session_start();
if (!isset($_SESSION['paso_por_donde_yo_quiero']))
{ 
	header ("Location: ../index.php"); 
	exit; 
} 
$user=$_SESSION['id_user'];
$cod=$_SESSION['password']; 
$sql = "SELECT nombre FROM user WHERE usuario like '%$user%' and contrasenia like '%$cod%'"; 
$resp=mysql_query($sql);
$num = mysql_num_rows($resp);
if($num>0)
{
	$linea=mysql_fetch_array($resp);
	$nom=$linea["nombre"]; 
}
$consulta ="SELECT * FROM recibida WHERE fecha_hora like '%$valor%'";
$resultado=mysql_query($consulta) or die ("Error de búsqueda en la BD: ". mysql_Error());
$numResultados = mysql_num_rows($resultado);
if($numResultados>0)
{		$pdf->SetFillColor(200,220,255);
		$pdf->Cell(10,7,'R. INT.',1,0,'C','1');
		$pdf->Cell(30,7,'FECHA',1,0,'C','1');
		$pdf->Cell(25,7,'RECIBIDO POR',1,0,'C','1');
		$pdf->Cell(52,7,'PROCEDENCIA',1,0,'C','1');
		$pdf->Cell(20,7,'REG.EXT.',1,0,'C','1');
		$pdf->Cell(12,7,'H. RUTA',1,0,'C','1');
		$pdf->Cell(62,7,'REFERENCIAS',1,1,'C','1');

	while($linea=mysql_fetch_array($resultado))
	{	$reg_interno=$linea["reg_interno"]; 
		$fecha_hora=$linea["fecha_hora"];
		$recibido_por=$linea["recibido_por"];
		$procedencia=$linea["procedencia"];
		$reg_externo=$linea["reg_externo"];
		$hoja_ruta=$linea["hoja_ruta"];
		$referencias=$linea["referencias"];
		$sub_cadena = substr($referencias,0,47); 
		$sub= substr($referencias,47,47);
		$sub1= substr($referencias,96,45);	
		$pdf->Cell(10,12,$reg_interno,1,0,'C');
		$pdf->Cell(30,12,$fecha_hora,1,0,'L');
		$pdf->Cell(25,12,$recibido_por,1,0,'L');
		$pdf->Cell(52,12,$procedencia,1,0,'L');
		$pdf->Cell(20,12,$reg_externo,1,0,'L');
		$pdf->Cell(12,12,$hoja_ruta,1,0,'C');	
		if($referencias==null)	
			$pdf->Cell(62,12,'',1,1,'L');
		else		
			$pdf->MultiCell(62,6,$referencias,1,1,'L');
//		$pdf->Cell(12,1,'',0,1,'C');	
		$consulta1 ="SELECT accion,reg_interno,id_res_des FROM seguimiento where reg_interno like '%$reg_interno%'";
		$resultado1=mysql_query($consulta1) or die ("Error de búsqueda en la BD: ". mysql_Error());
		$numResultados1 = mysql_num_rows($resultado1);
		if($numResultados1>0)
		{	$i=0;
/*			$pdf->SetFillColor(100,220,255);
			$pdf->Cell(10,5,'OBS.',1,0,'C','1');
			$pdf->Cell(30,5,'FECHA',1,0,'C','1');
			$pdf->Cell(25,5,'RESPONSABLE',1,0,'C','1');
			$pdf->Cell(52,5,'UNIDAD',1,0,'C','1');					
			$pdf->Cell(20,5,'ESTADO',1,0,'C','1');
			$pdf->Cell(12,5,'ACCION',1,0,'C','1');
			$pdf->Cell(62,5,'TAREA',1,1,'C','1');	*/
			while($linea1=mysql_fetch_array($resultado1))
			{	$i++;
				$registro=$linea1["reg_interno"];
				$seg=$linea1["id_res_des"];
				$accion=$linea1["accion"];
				$id_seguimiento=$linea1["id_seguimiento"];			
				if ($accion=='Recibido')
				{
					$consulta2 ="SELECT id_remitente FROM recibida WHERE id_rec ='$seg'";
					$resultado2=mysql_query($consulta2) or die ("Error de búsqueda en la BD: ". mysql_Error());
					$numResultados2 = mysql_num_rows($resultado2);
					$linea2=mysql_fetch_array($resultado);	
					$id_remitente=$linea2["id_remitente"]; 
					if($id_remitente <= 60)
					{
						$consulta3="SELECT ro.tarea,ro.responsable,re.nombre,se.observaciones,se.estado,se.accion,rec.fecha_hora
						FROM rol ro INNER JOIN cumple cu INNER JOIN remitente re INNER JOIN  recibida rec INNER JOIN seguimiento se
  						ON ro.id_rol=cu.id_rol and cu.id_receptor=rec.id_remitente and re.id_remitente=rec.id_remitente and 
						rec.reg_interno=se.reg_interno and rec.id_rec=se.id_res_des and rec.id_seg=se.id_seguimiento and 
						se.reg_interno=$registro and se.id_res_des=$seg";
					}
					else
					{
						$consulta3="SELECT re.nombre,se.observaciones,se.estado,se.accion,rec.fecha_hora
						FROM remitente re INNER JOIN recibida rec INNER JOIN seguimiento se
  						ON re.id_remitente=rec.id_remitente and rec.reg_interno=se.reg_interno and rec.id_rec=se.id_res_des and 
						rec.id_seg=se.id_seguimiento and se.reg_interno=$registro and se.id_res_des=$seg";
					}
				}
				else
				{
					$consulta2 ="SELECT id_receptor FROM despachada WHERE id_despachada ='$seg'";
					$resultado2=mysql_query($consulta2) or die ("Error de búsqueda en la BD: ". mysql_Error());
					$numResultados2 = mysql_num_rows($resultado2);
					$linea2=mysql_fetch_array($resultado2);	
					$id_receptor=$linea2["id_receptor"]; 
					if($id_receptor <= 63)
					{	
						$consulta3="SELECT ro.tarea,re.responsable,re.nombre,se.observaciones,se.estado,se.accion,des.fecha_hora
						FROM rol ro INNER JOIN cumple cu INNER JOIN receptor re INNER JOIN  despachada des INNER JOIN seguimiento se
  						ON ro.id_rol=cu.id_rol and cu.id_receptor=des.id_receptor and re.id_receptor=des.id_receptor and 
						des.id_despachada=se.id_res_des and se.reg_interno=$registro and se.id_res_des=$seg";
					}
					else
					{
						$consulta3="SELECT re.nombre,se.observaciones,se.estado,se.accion,des.fecha_hora
						FROM receptor re INNER JOIN despachada des INNER JOIN seguimiento se
	  					ON re.id_receptor=des.id_receptor and des.id_despachada=se.id_res_des and se.reg_interno=$registro and 
						se.id_res_des=$seg";
					}
				}
				$resultado3=mysql_query($consulta3) or die ("Error de  busqueda en la BD: ". mysql_Error());
				$numResultados3= mysql_num_rows($resultado3);
				if($numResultados3>0)
				{				
					$pdf->SetFillColor(212,227,250);
					$linea3=mysql_fetch_array($resultado3);	
					$var1=$linea3["fecha_hora"];
					$var2=$linea3["nombre"];
					$var3=$linea3["tarea"];
					$var4=$linea3["responsable"];
					$var5=$linea3["observaciones"];
					$var6=$linea3["estado"];
					$var7=$linea3["accion"];
					$pdf->Cell(10,6,'',0,0,'C','0');
					$pdf->Cell(30,6,$var1,1,0,'L','1');
					$pdf->Cell(25,6,$var4,1,0,'L','1');
					$pdf->Cell(52,6,$var2,1,0,'L','1');
					$pdf->Cell(20,6,$var7,1,0,'L','1');
					$pdf->Cell(12,6,$var6,1,0,'C','1');		
					$pdf->Cell(62,6,$var3,1,1,'L','1');
				}
			}
		}
	}
}
$pdf->Ln();
$pdf->Output();
?>