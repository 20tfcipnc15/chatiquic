<?php
//$conex=mysql_connect("localhost","root","");
//$bd=mysql_select_db("sidworkflow",$conex);
include("funciones.php");
   $link=conexion();
$tex=explode("?",$num_inf);
$num_inf=$tex[0];
$anio_p=$tex[1];
$tipo=$tex[2];

$fecha=getdate();
$dia=$fecha[mday];
$mes=$fecha[mon];
$anio=$fecha[year];
$sw1==0;
$sw2==0;
$sw3==0;
$nc=$num_inf;
$sql="select * from informe ORDER BY num_inf";  //INFORME T.A.
$resp=mysql_query($sql);
$filas=mysql_num_rows($resp);
     if($filas!=0)
     {  
        while($datos=mysql_fetch_array($resp))
        {  if($datos["num_inf"]==$num_inf&&$sw1==0&&$datos["anio_c"]==$anio_p)
		   {
		   $num_inf=$datos["num_inf"];
		   $amo=$datos["amo"];
		   $carr=$datos["carrera"];
		   $i_c=$datos["inf_carrera"];
		   $d_i=$datos["dia_inf"];
		   $m_i=$datos["mes_inf"];
		   $a_i=$datos["ano_inf"];
		   $tem=$datos["temporada"];
		   $c_elab=$datos["c_elaborado"];
		}
	  }   
    }  
if($carr=="Informática"){$carr="Informatica";}
if($carr=="Biología"){$carr="Biologia";}
if($carr=="Matemática"){$carr="Matematica";}
if($carr=="Estadística"){$carr="Estadistica";}
if($carr=="Física"){$carr="Fisica";}
if($carr=="Ciencias Químicas"){$carr="Ciencias Quimicas";}
////////////////// Documento PDF ////////////////////////
require('fpdf.php');
$pdf=new FPDF('p','mm','Letter');
$pdf->SetMargins(0,0,0) ;
$pdf->SetAutoPageBreak(1,40);
$pdf->AddPage();
//$pdf->SetMargins(30,55,13);
$pdf->SetMargins(26,30,17);
$pdf->Ln(30);

$a_r2=$a_r;
substr($a_r2,2);

$fecha=getdate();
$dia=$fecha[mday];
$mes=$fecha[mon];
$anio=$fecha[year]; 

if($vector[mes_fin]==Enero){$mes_f=1;}
  if($vector[mes_fin]==Febrero){$mes_f=2;}
  if($vector[mes_fin]==Marzo){$mes_f=3;}
  if($vector[mes_fin]==Abril){$mes_f=4;}
  if($vector[mes_fin]==Mayo){$mes_f=5;}
  if($vector[mes_fin]==Junio){$mes_f=6;}
  if($vector[mes_fin]==Julio){$mes_f=7;}
  if($vector[mes_fin]==Agosto){$mes_f=8;}
  if($vector[mes_fin]==Septiembre){$mes_f=9;}
  if($vector[mes_fin]==Octubre){$mes_f=10;}
  if($vector[mes_fin]==Noviembre){$mes_f=11;}
  if($vector[mes_fin]==Diciembre){$mes_f=12;}
 $dato=strlen($num_inf);
 $cad1='00';
 $cad2='0';
 if($dato==1)
 {$num_inf=$cad1.$num_inf;}
 if($dato==2)
 {$num_inf=$cad2.$num_inf;}
$pdf->SetFont('Times','U',11);
$cad1=str_replace('*',$num_inf,'FCPN/INF.*/!');
$cad1=str_replace('!',$anio,$cad1);
$pdf->Cell(165,3,$cad1,0,1,'R');   //
$pdf->Ln(5);
$pdf->Ln();
$pdf->Ln();
$pdf->SetFont('Times','BU',16);
$pdf->Cell(165,5,'I N F O R M E',0,1,'C');  
$pdf->Ln(5);
$sql="select * from decanato_i";  //DECANATO
$resp=mysql_query($sql);
$fil=mysql_num_rows($resp);
     if($fil!=0)
     {  
        while($dat=mysql_fetch_array($resp))
        {  if($dat["num_inf"]==$num_inf&&$sw2==0&&$dat["anio_c"]==$anio_p)
		   {
		     $ci_d=$dat["ci_dec"]; 
		     $l_ci_d=$dat["lug_ci_dec"];
		     $n_d=$dat["nom_dec"];
		     $ap_d=$dat["ap_dec"];
		     $am_d=$dat["am_dec"];
		     $grado=$dat["grado_dec"];
			 $e=$dat["estado"];
		     $gen_d=$dat["gen_dec"];
		}
	  }
   }
$pdf->SetFont('Times','',11);
if($gen_d=='Masculino'||$gen_d=='')
{
//if($grado=='Mg.'){$grado1='Magister';}
if($grado=='M.Sc.'){$grado1='Magister';}
if($grado=='Lic.') {$grado1='Licenciado';}
if($grado=='Dr.'){$grado1='Doctor';}
if($grado=='Ing.'){$grado1='Ingeniero';}
if($grado==''){$grado1='Señor';}
}
else
{
//if($grado=='Mg.'){$grado1='Magister';}
if($grado=='M.Sc.'){$grado1='Magister';}
if($grado=='Lic.') {$grado1='Licenciada';}
if($grado=='Dr.'){$grado1='Doctora';}
if($grado=='Ing.'){$grado1='Ingeniera';}
if($grado==''){$grado1='Señora';}
}






if($gen_d=='Masculino'||$gen_d=='')
{
if($e==1)
{$cad1=str_replace('*',strtoupper($grado1),'EL * ! ¿ ?, DECANO DE LA FACULTAD DE CIENCIAS PURAS Y NATURALES DE LA UNIVERSIDAD MAYOR DE SAN ANDRES.');
$cad1=str_replace('!',strtoupper($n_d),$cad1);
$cad1=str_replace('¿',strtoupper($ap_d),$cad1);
$cad1=str_replace('?',strtoupper($am_d),$cad1);
$pdf->MultiCell(165,5,$cad1,0,'J');
} 
else
{ $cad1=str_replace('*',strtoupper($grado1),'EL * ! ¿ ?, DECANO EN EJERCICIO. DE LA FACULTAD DE CIENCIAS PURAS Y NATURALES DE LA UNIVERSIDAD MAYOR DE SAN ANDRES.');
$cad1=str_replace('!',strtoupper($n_d),$cad1);
$cad1=str_replace('¿',strtoupper($ap_d),$cad1);
$cad1=str_replace('?',strtoupper($am_d),$cad1);
$pdf->MultiCell(165,5,$cad1,0,'J');
}
}
else
{
if($e==1)
{$cad1=str_replace('*',strtoupper($grado1),'LA * ! ¿ ?, DECANA DE LA FACULTAD DE CIENCIAS PURAS Y NATURALES DE LA UNIVERSIDAD MAYOR DE SAN ANDRES.');
$cad1=str_replace('!',strtoupper($n_d),$cad1);
$cad1=str_replace('¿',strtoupper($ap_d),$cad1);
$cad1=str_replace('?',strtoupper($am_d),$cad1);
$pdf->MultiCell(165,5,$cad1,0,'J');
} 
else
{ $cad1=str_replace('*',strtoupper($grado1),'LA * ! ¿ ?, DECANA EN EJERCICIO DE LA FACULTAD DE CIENCIAS PURAS Y NATURALES DE LA UNIVERSIDAD MAYOR DE SAN ANDRES.');
$cad1=str_replace('!',strtoupper($n_d),$cad1);
$cad1=str_replace('¿',strtoupper($ap_d),$cad1);
$cad1=str_replace('?',strtoupper($am_d),$cad1);
$pdf->MultiCell(165,5,$cad1,0,'J');
}
}
$pdf->Ln(5);
$pdf->SetFont('Times','',11);
$pdf->Cell(165,3,'INFORMA:',0,1,'L');
$pdf->Ln(5);
$pdf->SetFont('Times','',11);
$sql="select * from estudiante_i ORDER BY num_inf";  //ESTUDIANTE
$resp=mysql_query($sql);
$fil=mysql_num_rows($resp);
     if($fil!=0)
     {  
        while($dato=mysql_fetch_array($resp))
        {  if($dato["num_inf"]==$num_inf&&$sw3==0&&$dato["anio_c"]==$anio_p)
		   { 
		   $ci_est=$dato["ci_est"];
		   $l_ci_est=$dato["lug_ci"];
		   $n_est=$dato["nom_est"];
		   $ap_est=$dato["ap_est"];
		   $am_est=$dato["am_est"];
		   $gra=$dato["grado"];
		   $gen=$dato["genero"];
		   $carrera=$dato["carrera"];
		   $mencion=$dato["mencion"];
		   $cad1=strlen($n_est); 
		   $cad2=strlen($ap_est);
		   $cad3=strlen($am_est);
		}
	  }
	 } 

if($gen=='Masculino')
{	
 if($carr=='Informatica')
 {
  if($tipo=='Licenciatura')
  {
  $cad=str_replace('?',$gra,'Que, de acuerdo al informe presentado por la Carrera de # de nuestra Facultad, con +  de fecha [ de ] del *,  se evidencia que el señor Universitario : @ {, ha cumplido con todos los requisitos para obtener el Titulo Académico de LICENCIADO EN ¿.');
  $cad=str_replace('#',$carrera,$cad);
  $cad=str_replace('+',strtoupper($i_c),$cad);
  $cad=str_replace('[',$d_i,$cad);
  $cad=str_replace(']',$m_i,$cad);
  $cad=str_replace('*',$a_i,$cad);
  $cad=str_replace('(',$ci_est,$cad);
  $cad=str_replace(')',$l_ci_est,$cad);
  $cad=str_replace('¡',strtoupper($dat),$cad);
  $cad=str_replace('¿',strtoupper($carr),$cad);
  $cad=str_replace('{',strtoupper($am_est),$cad);
  $cad=str_replace(':',strtoupper($n_est),$cad);
   $cad=str_replace('@',strtoupper($ap_est),$cad);
  $pdf->MultiCell(165,5,$cad,0,'J');
  
  //$pdf->SetFont('Times','B',11);
  //$pdf->Cell(58,4,'Universitaria',0,0,'L');
  /*$pdf->SetFont('Times','',11);
  $cad1=str_replace('?',strtoupper($n_est),'Universitario ? # +, ha cumplido con todos los requisitos para obtener el Titulo Académico de LICENCIADO EN [.');
  $cad1=str_replace('#',strtoupper($ap_est),$cad1);
  $cad1=str_replace('+',strtoupper($am_est),$cad1);
  $cad1=str_replace('[',strtoupper($carr),$cad1);
  $pdf->MultiCell(165,5,$cad1,0,'J');*/
  if($mencion=='Ingenieria de Sistemas Informaticos')
  {$pdf->Ln(5);
  $pdf->SetFont('Times','',11);
  $pdf->Cell(75,5,'Asimismo, le corresponde la  obtención de su',0,0,'L');
  $pdf->SetFont('Times','B',11);
  $pdf->Cell(90,5,'Titulo en Provisión Nacional, con mención "Ingeniería',0,0,'R');
  $pdf->Ln();
  $pdf->Cell(73,5,'en Sistemas Informáticos".',0,0,'L');
  $pdf->Ln(5);}
  if($mencion=='Ciencias de la Computacion')
  {$pdf->Ln(5);
  $pdf->SetFont('Times','',11);
  $pdf->Cell(75,5,'Asimismo, le corresponde la  obtención de su',0,0,'L');
  $pdf->SetFont('Times','B',11);
  $pdf->Cell(90,5,'Titulo  en  Provisión  Nacional, con mención "Ciencias',0,0,'R');
  $pdf->Ln();
  $pdf->Cell(73,5,'de la Computación".',0,0,'L');
  $pdf->Ln(5);}
  }
  else
  {$cad=str_replace('?',$gra,'Que, de acuerdo al informe presentado por la Carrera de # de nuestra Facultad, con +  de fecha [ de ] del *,  se evidencia que el señor Universitario : @ {, ha cumplido con todos los requisitos para obtener el Titulo Académico de BACHILLER SUPERIOR EN CIENCIAS - ¿.');
  $cad=str_replace('#',$carrera,$cad);
  $cad=str_replace('+',strtoupper($i_c),$cad);
  $cad=str_replace('[',$d_i,$cad);
  $cad=str_replace(']',$m_i,$cad);
  $cad=str_replace('*',$a_i,$cad);
  $cad=str_replace('(',$ci_est,$cad);
  $cad=str_replace(')',$l_ci_est,$cad);
  $cad=str_replace('¡',strtoupper($dat),$cad);
  $cad=str_replace('¿',strtoupper($carr),$cad);
  $cad=str_replace('{',strtoupper($am_est),$cad);
  $cad=str_replace(':',strtoupper($n_est),$cad);
   $cad=str_replace('@',strtoupper($ap_est),$cad);
  $pdf->MultiCell(165,5,$cad,0,'J');
  //$pdf->SetFont('Times','B',11);
  //$pdf->Cell(58,4,'Universitaria',0,0,'L');
  /*$pdf->SetFont('Times','',11);
  $cad1=str_replace('?',strtoupper($n_est),'Universitario ? # +, ha cumplido con todos los requisitos para obtener el Titulo Académico de LICENCIADO EN [.');
  $cad1=str_replace('#',strtoupper($ap_est),$cad1);
  $cad1=str_replace('+',strtoupper($am_est),$cad1);
  $cad1=str_replace('[',strtoupper($carr),$cad1);
  $pdf->MultiCell(165,5,$cad1,0,'J');*/
   $pdf->Ln(5);
  }
 }
 else
 {if($tipo=='Licenciatura')
  {$cad=str_replace('?',$gra,'Que, de acuerdo al informe presentado por la Carrera de # de nuestra Facultad, con +  de fecha [ de ] del *,  se evidencia que el señor Universitario : @ {, ha cumplido con todos los requisitos para obtener el Titulo Académico de LICENCIADO EN ¿.');
  $cad=str_replace('#',$carrera,$cad);
  $cad=str_replace('+',strtoupper($i_c),$cad);
  $cad=str_replace('[',$d_i,$cad);
  $cad=str_replace(']',$m_i,$cad);
  $cad=str_replace('*',$a_i,$cad);
  $cad=str_replace('(',$ci_est,$cad);
  $cad=str_replace(')',$l_ci_est,$cad);
  $cad=str_replace('¡',strtoupper($dat),$cad);
  $cad=str_replace('¿',strtoupper($carr),$cad);
  $cad=str_replace('{',strtoupper($am_est),$cad);
  $cad=str_replace(':',strtoupper($n_est),$cad);
   $cad=str_replace('@',strtoupper($ap_est),$cad);
  $pdf->MultiCell(165,5,$cad,0,'J');
  //$pdf->SetFont('Times','B',11);
  //$pdf->Cell(58,4,'Universitaria',0,0,'L');
  /*$pdf->SetFont('Times','',11);
  $cad1=str_replace('?',strtoupper($n_est),'Universitaria ? # +, ha cumplido con todos los requisitos para obtener el Titulo Académico de LICENCIADO EN [.');
  $cad1=str_replace('#',strtoupper($ap_est),$cad1);
  $cad1=str_replace('+',strtoupper($am_est),$cad1);
  $cad1=str_replace('[',strtoupper($carr),$cad1);
  $pdf->MultiCell(165,5,$cad1,0,'J');*/
  }
  else
  {$cad=str_replace('?',$gra,'Que, de acuerdo al informe presentado por la Carrera de # de nuestra Facultad, con +  de fecha [ de ] del *,  se evidencia que el señor Universitario : @ {, ha cumplido con todos los requisitos para obtener el Titulo Académico de BACHILLER SUPERIOR EN CIENCIAS - ¿.');
  $cad=str_replace('#',$carrera,$cad);
  $cad=str_replace('+',strtoupper($i_c),$cad);
  $cad=str_replace('[',$d_i,$cad);
  $cad=str_replace(']',$m_i,$cad);
  $cad=str_replace('*',$a_i,$cad);
  $cad=str_replace('(',$ci_est,$cad);
  $cad=str_replace(')',$l_ci_est,$cad);
  $cad=str_replace('¡',strtoupper($dat),$cad);
  $cad=str_replace('¿',strtoupper($carr),$cad);
  $cad=str_replace('{',strtoupper($am_est),$cad);
  $cad=str_replace(':',strtoupper($n_est),$cad);
   $cad=str_replace('@',strtoupper($ap_est),$cad);
  $pdf->MultiCell(165,5,$cad,0,'J');

  //$pdf->SetFont('Times','B',11);
  //$pdf->Cell(58,4,'Universitaria',0,0,'L');
  /*$pdf->SetFont('Times','',11);
  $cad1=str_replace('?',strtoupper($n_est),'Universitaria ? # +, ha cumplido con todos los requisitos para obtener el Titulo Académico de LICENCIADO EN [.');
  $cad1=str_replace('#',strtoupper($ap_est),$cad1);
  $cad1=str_replace('+',strtoupper($am_est),$cad1);
  $cad1=str_replace('[',strtoupper($carr),$cad1);
  $pdf->MultiCell(165,5,$cad1,0,'J');*/
  }
 }
} 

else  //F
{
 if($carr=='Informatica')
  {
  if($tipo=='Licenciatura')
  {$cad=str_replace('?',$gra,'Que, de acuerdo al informe presentado por la Carrera de # de nuestra Facultad, con +  de fecha [ de ] del *,  se evidencia que la señorita Universitaria : @ {, ha cumplido con todos los requisitos para obtener el Titulo Académico de LICENCIADA EN ¿.');
  $cad=str_replace('#',$carrera,$cad);
  $cad=str_replace('+',strtoupper($i_c),$cad);
  $cad=str_replace('[',$d_i,$cad);
  $cad=str_replace(']',$m_i,$cad);
  $cad=str_replace('*',$a_i,$cad);
  $cad=str_replace('(',$ci_est,$cad);
  $cad=str_replace(')',$l_ci_est,$cad);
  $cad=str_replace('¡',strtoupper($dat),$cad);
  $cad=str_replace('¿',strtoupper($carr),$cad);
  $cad=str_replace('{',strtoupper($am_est),$cad);
  $cad=str_replace(':',strtoupper($n_est),$cad);
   $cad=str_replace('@',strtoupper($ap_est),$cad);
  $pdf->MultiCell(165,5,$cad,0,'J');
  //$pdf->SetFont('Times','B',11);
  //$pdf->Cell(58,4,'Universitaria',0,0,'L');
  /*$pdf->SetFont('Times','',11);
  $cad1=str_replace('?',strtoupper($n_est),'Universitario ? # +, ha cumplido con todos los requisitos para obtener el Titulo Académico de LICENCIADO EN [.');
  $cad1=str_replace('#',strtoupper($ap_est),$cad1);
  $cad1=str_replace('+',strtoupper($am_est),$cad1);
  $cad1=str_replace('[',strtoupper($carr),$cad1);
  $pdf->MultiCell(165,5,$cad1,0,'J');*/
  if($mencion=='Ingenieria de Sistemas Informaticos')
  {$pdf->Ln(5);
  $pdf->SetFont('Times','',11);
  $pdf->Cell(75,5,'Asimismo, le corresponde la  obtención de su',0,0,'L');
  $pdf->SetFont('Times','B',11);
  $pdf->Cell(90,5,'Titulo en Provisión Nacional, con mención "Ingeniería',0,0,'R');
  $pdf->Ln();
  $pdf->Cell(73,5,'en Sistemas Informáticos".',0,0,'L');
  $pdf->Ln(5);}
  if($mencion=='Ciencias de la Computacion')
  {$pdf->Ln(5);
  $pdf->SetFont('Times','',11);
  $pdf->Cell(75,5,'Asimismo, le corresponde la  obtención de su',0,0,'L');
  $pdf->SetFont('Times','B',11);
  $pdf->Cell(90,5,'Titulo  en  Provisión  Nacional, con mención "Ciencias',0,0,'R');
  $pdf->Ln();
  $pdf->Cell(73,5,'de la Computación".',0,0,'L');
  $pdf->Ln(5);}
  }
 else
 {$cad=str_replace('?',$gra,'Que, de acuerdo al informe presentado por la Carrera de # de nuestra Facultad, con +  de fecha [ de ] del *,  se evidencia que la señorita Universitaria : @ {, ha cumplido con todos los requisitos para obtener el Titulo Académico de BACHILLER SUPERIOR EN CIENCIAS - ¿. ');
  $cad=str_replace('#',$carrera,$cad);
  $cad=str_replace('+',strtoupper($i_c),$cad);
  $cad=str_replace('[',$d_i,$cad);
  $cad=str_replace(']',$m_i,$cad);
  $cad=str_replace('*',$a_i,$cad);
  $cad=str_replace('(',$ci_est,$cad);
  $cad=str_replace(')',$l_ci_est,$cad);
  $cad=str_replace('¡',strtoupper($dat),$cad);
  $cad=str_replace('¿',strtoupper($carr),$cad);
  $cad=str_replace('{',strtoupper($am_est),$cad);
  $cad=str_replace(':',strtoupper($n_est),$cad);
   $cad=str_replace('@',strtoupper($ap_est),$cad);
  $pdf->MultiCell(165,5,$cad,0,'J');
  //$pdf->SetFont('Times','B',11);
  //$pdf->Cell(58,4,'Universitaria',0,0,'L');
  /*$pdf->SetFont('Times','',11);
  $cad1=str_replace('?',strtoupper($n_est),'Universitario ? # +, ha cumplido con todos los requisitos para obtener el Titulo Académico de LICENCIADO EN [.');
  $cad1=str_replace('#',strtoupper($ap_est),$cad1);
  $cad1=str_replace('+',strtoupper($am_est),$cad1);
  $cad1=str_replace('[',strtoupper($carr),$cad1);
  $pdf->MultiCell(165,5,$cad1,0,'J');*/
   $pdf->Ln(5);
 }
 }
 else
 {if($tipo=='Licenciatura')
  {
   $cad=str_replace('?',$gra,'Que, de acuerdo al informe presentado por la Carrera de # de nuestra Facultad, con +  de fecha [ de ] del *,  se evidencia que la señorita Universitaria : @ {, ha cumplido con todos los requisitos para obtener el Titulo Académico de LICENCIADA EN ¿.');
  $cad=str_replace('#',$carrera,$cad);
  $cad=str_replace('+',strtoupper($i_c),$cad);
  $cad=str_replace('[',$d_i,$cad);
  $cad=str_replace(']',$m_i,$cad);
  $cad=str_replace('*',$a_i,$cad);
   $cad=str_replace('(',$ci_est,$cad);
  $cad=str_replace(')',$l_ci_est,$cad);
  $cad=str_replace('¡',strtoupper($dat),$cad);
  $cad=str_replace('¿',strtoupper($carr),$cad);
  $cad=str_replace('{',strtoupper($am_est),$cad);
  $cad=str_replace(':',strtoupper($n_est),$cad);
   $cad=str_replace('@',strtoupper($ap_est),$cad);
  $pdf->MultiCell(165,5,$cad,0,'J');
  //$pdf->SetFont('Times','B',11);
  //$pdf->Cell(58,4,'Universitaria',0,0,'L');
  /*$pdf->SetFont('Times','',11);
  $cad1=str_replace('?',strtoupper($n_est),'Universitaria ? # +, ha cumplido con todos los requisitos para obtener el Titulo Académico de LICENCIADO EN [.');
  $cad1=str_replace('#',strtoupper($ap_est),$cad1);
  $cad1=str_replace('+',strtoupper($am_est),$cad1);
  $cad1=str_replace('[',strtoupper($carr),$cad1);
  $pdf->MultiCell(165,5,$cad1,0,'J');*/
     }
  else
  { $cad=str_replace('?',$gra,'Que, de acuerdo al informe presentado por la Carrera de # de nuestra Facultad, con + de fecha [ de ] del *, se evidencia que la señorita Universitaria : @ {, ha cumplido con todos los requisitos para obtener el Titulo Académico de BACHILLER SUPERIOR EN CIENCIAS - ¿.');
  $cad=str_replace('#',$carrerra,$cad);
  $cad=str_replace('+',strtoupper($i_c),$cad);
  $cad=str_replace('[',$d_i,$cad);
  $cad=str_replace(']',$m_i,$cad);
  $cad=str_replace('*',$a_i,$cad);
  $cad=str_replace('(',$ci_est,$cad);
  $cad=str_replace(')',$l_ci_est,$cad);
  $cad=str_replace('¡',strtoupper($dat),$cad);
  $cad=str_replace('¿',strtoupper($carr),$cad);
  $cad=str_replace('{',strtoupper($am_est),$cad);
  $cad=str_replace(':',strtoupper($n_est),$cad);
   $cad=str_replace('@',strtoupper($ap_est),$cad);
  $pdf->MultiCell(165,5,$cad,0,'J');
  //$pdf->SetFont('Times','B',11);
  //$pdf->Cell(58,4,'Universitaria',0,0,'L');
  /*$pdf->SetFont('Times','',11);
  $cad1=str_replace('?',strtoupper($n_est),'Universitaria ? # +, ha cumplido con todos los requisitos para obtener el Titulo Académico de LICENCIADO EN [.');
  $cad1=str_replace('#',strtoupper($ap_est),$cad1);
  $cad1=str_replace('+',strtoupper($am_est),$cad1);
  $cad1=str_replace('[',strtoupper($carr),$cad1);
  $pdf->MultiCell(165,5,$cad1,0,'J');*/
  }
 }
} 

  $pdf->Ln(4);
  $pdf->SetFont('Times','',11);
  $pdf->Cell(58,5,'Es cuanto informo, en honor a la verdad y para fines consiguientes.',0,0,'L');
  $pdf->Ln(10);
  $pdf->SetFont('Times','',11);
  if($mes==1){$m='Enero';}
  if($mes==2){$m='Febrero';}
  if($mes==3){$m='Marzo';}
  if($mes==4){$m='Abril';}
  if($mes==5){$m='Mayo';}
  if($mes==6){$m='Junio';}
  if($mes==7){$m='Julio';}
  if($mes==8){$m='Agosto';}
  if($mes==9){$m='Septiembre';}
  if($mes==10){$m='Octubre';}
  if($mes==11){$m='Noviembre';}
  if($mes==12){$m='Diciembre';}
  $cad2=str_replace('*',$m,'La Paz, * ? de &.');
  $cad2=str_replace('?',$dia,$cad2);
  $cad2=str_replace('&',$anio,$cad2);
  $pdf->MultiCell(165,5,$cad2,0,'L'); 
  $pdf->Ln(20);
  $pdf->SetFont('Times','',11);

  $cad2=str_replace('*',$grado,'* ! ¿ ? ');
  $cad2=str_replace('!',$n_d,$cad2);
  $cad2=str_replace('¿',$ap_d,$cad2);
  $cad2=str_replace('?',$am_d,$cad2);
  $pdf->MultiCell(165,5,$cad2,0,'L'); 
 
   if($gen_d=='Masculino'||$gen_d=='')
 {
  if($e==1){$pdf->Cell(58,5,'           D E C A N O',0,0,'L');} 
  else{$pdf->Cell(58,5,'       D E C A N O a.i.',0,0,'L');} 
  }
  else
 {
  if($e==1){$pdf->Cell(58,5,'           D E C A N A',0,0,'L');} 
  else{$pdf->Cell(58,5,'       D E C A N A a.i.',0,0,'L');} 
  }
  $pdf->Ln(12);  
  $pdf->SetFont('Times','',7);
  $pdf->Cell(58,3,'Incl.: Documentación completa',0,0,'L');
  $pdf->Ln();
  $pdf->Cell(58,3,'Copia: Interezado (trámite de Título Académico), Archivo',0,0,'L');
   $pdf->Ln();
   $pdf->SetFont('Times','I',7);
  $cad3=str_replace('?',$c_elab,'?/ DIGITALDOC FCPN');
  $pdf->MultiCell(165,4,$cad3,0,'L'); 
  $pdf->Ln(); 
  
/******************COPIA********************************/
$fecha=getdate();
$dia=$fecha[mday];
$mes=$fecha[mon];
$anio=$fecha[year];

/*if($carr=="Informática"){$carr="Informatica";}
if($carr=="Biología"){$carr="Biologia";}
if($carr=="Matemáticas"){$carr="Matematicas";}
if($carr=="Estadística"){$carr="Estadistica";}
if($carr=="Física"){$carr="Fisica";}
if($carr=="Ciencias Químicas"){$carr="Ciencias Quimicas";}  

$sql="select * from informe ORDER BY num_inf";  //INFORME T.A.
$resp=mysql_query($sql);
$filas=mysql_num_rows($resp);
     if($filas!=0)
     {  
        while($datos=mysql_fetch_array($resp))
        {  $num_inf=$datos["num_inf"];
		   $amo=$datos["amo"];
		   $carr=$datos["carrera"];
		   $i_c=$datos["inf_carrera"];
		   $d_i=$datos["dia_inf"];
		   $m_i=$datos["mes_inf"];
		   $a_i=$datos["ano_inf"];
		   $tem=$datos["temporada"];
		   $c_elab=$datos["c_elaborado"];
		}
	  }  */ 
	  
////////////////// Documento PDF ////////////////////////
require('fpdf.php');
//$pdf=new FPDF('p','mm','Letter');
//$pdf->SetMargins(0,0,0) ;
//$pdf->SetAutoPageBreak(1,40);
//$pdf->AddPage();
//$pdf->SetMargins(30,55,13);
//$pdf->SetMargins(26,30,17);
$pdf->Ln(75);


$fecha=getdate();
$dia=$fecha[mday];
$mes=$fecha[mon];
$anio=$fecha[year]; 

if($vector[mes_fin]==Enero){$mes_f=1;}
  if($vector[mes_fin]==Febrero){$mes_f=2;}
  if($vector[mes_fin]==Marzo){$mes_f=3;}
  if($vector[mes_fin]==Abril){$mes_f=4;}
  if($vector[mes_fin]==Mayo){$mes_f=5;}
  if($vector[mes_fin]==Junio){$mes_f=6;}
  if($vector[mes_fin]==Julio){$mes_f=7;}
  if($vector[mes_fin]==Agosto){$mes_f=8;}
  if($vector[mes_fin]==Septiembre){$mes_f=9;}
  if($vector[mes_fin]==Octubre){$mes_f=10;}
  if($vector[mes_fin]==Noviembre){$mes_f=11;}
  if($vector[mes_fin]==Diciembre){$mes_f=12;}
 $dato=strlen($num_inf);
 $cad1='00';
 $cad2='0';
 if($dato==1)
 {$num_inf=$cad1.$num_inf;}
 if($dato==2)
 {$num_inf=$cad2.$num_inf;}
$pdf->SetFont('Times','U',11);
$cad1=str_replace('*',$num_inf,'FCPN/INF.*/!');
$cad1=str_replace('!',$anio,$cad1);
$pdf->Cell(165,3,$cad1,0,1,'R');   
$pdf->Ln();
$pdf->SetFont('Times','',11);
$pdf->Cell(165,3,'COPIA',0,1,'R'); 
$pdf->Ln();
$pdf->SetFont('Times','BU',16);
$pdf->Cell(165,5,'I N F O R M E',0,1,'C');  
$pdf->Ln(5);
//$pdf->Ln();
/*$sql="select * from decanato_i";  //DECANATO
$resp=mysql_query($sql);
$fil=mysql_num_rows($resp);
     if($fil!=0)
     {  
        while($dat=mysql_fetch_array($resp))
        {  $ci_d=$dat["ci_dec"]; 
		   $l_ci_d=$dat["lug_ci"];
		   $n_d=$dat["nom_dec"];
		   $ap_d=$dat["ap_dec"];
		   $am_d=$dat["am_dec"];
		   $grado=$dat["grado"];
		}
	  }*/

$pdf->SetFont('Times','',11);

if($gen_d=='Masculino'||$gen_d=='')
{
if($e==1)
{$cad1=str_replace('*',strtoupper($grado1),'EL * ! ¿ ?, DECANO DE LA FACULTAD DE CIENCIAS PURAS Y NATURALES DE LA UNIVERSIDAD MAYOR DE SAN ANDRES.');
$cad1=str_replace('!',strtoupper($n_d),$cad1);
$cad1=str_replace('¿',strtoupper($ap_d),$cad1);
$cad1=str_replace('?',strtoupper($am_d),$cad1);
$pdf->MultiCell(165,5,$cad1,0,'J');
} 
else
{ $cad1=str_replace('*',strtoupper($grado1),'EL * ! ¿ ?, DECANO EN EJERCICIO. DE LA FACULTAD DE CIENCIAS PURAS Y NATURALES DE LA UNIVERSIDAD MAYOR DE SAN ANDRES.');
$cad1=str_replace('!',strtoupper($n_d),$cad1);
$cad1=str_replace('¿',strtoupper($ap_d),$cad1);
$cad1=str_replace('?',strtoupper($am_d),$cad1);
$pdf->MultiCell(165,5,$cad1,0,'J');
}
}
else
{
if($e==1)
{$cad1=str_replace('*',strtoupper($grado1),'LA * ! ¿ ?, DECANA DE LA FACULTAD DE CIENCIAS PURAS Y NATURALES DE LA UNIVERSIDAD MAYOR DE SAN ANDRES.');
$cad1=str_replace('!',strtoupper($n_d),$cad1);
$cad1=str_replace('¿',strtoupper($ap_d),$cad1);
$cad1=str_replace('?',strtoupper($am_d),$cad1);
$pdf->MultiCell(165,5,$cad1,0,'J');
} 
else
{ $cad1=str_replace('*',strtoupper($grado1),'LA * ! ¿ ?, DECANA EN EJERCICIO DE LA FACULTAD DE CIENCIAS PURAS Y NATURALES DE LA UNIVERSIDAD MAYOR DE SAN ANDRES.');
$cad1=str_replace('!',strtoupper($n_d),$cad1);
$cad1=str_replace('¿',strtoupper($ap_d),$cad1);
$cad1=str_replace('?',strtoupper($am_d),$cad1);
$pdf->MultiCell(165,5,$cad1,0,'J');
}
}
$pdf->Ln(5);
$pdf->SetFont('Times','',11);
$pdf->Cell(165,3,'INFORMA:',0,1,'L');
$pdf->Ln(5);
$pdf->SetFont('Times','',11);
/*$sql="select * from estudiante_i ORDER BY num_inf";  //ESTUDIANTE
$resp=mysql_query($sql);
$fil=mysql_num_rows($resp);
     if($fil!=0)
     {  
        while($dato=mysql_fetch_array($resp))
        {  $ci_est=$dato["ci_est"];
		   $l_ci_est=$dato["lug_ci"];
		   $n_est=$dato["nom_est"];
		   $ap_est=$dato["ap_est"];
		   $am_est=$dato["am_est"];
		   $gra=$dato["grado"];
		   $gen=$dato["genero"];
		   $carrera=$dato["carrera"];
		   $cad1=strlen($n_est); 
		   $cad2=strlen($ap_est);
		   $cad3=strlen($am_est);
		}
	  }*/
	  
if($gen=='Masculino')
{	
 if($carr=='Informatica')
 {
  if($tipo=='Licenciatura')
  {
  $cad=str_replace('?',$gra,'Que, de acuerdo al informe presentado por la Carrera de # de nuestra Facultad, con +  de fecha [ de ] del *,  se evidencia que el señor Universitario : @ {, ha cumplido con todos los requisitos para obtener el Titulo Académico de LICENCIADO EN ¿.');
  $cad=str_replace('#',$carrera,$cad);
  $cad=str_replace('+',strtoupper($i_c),$cad);
  $cad=str_replace('[',$d_i,$cad);
  $cad=str_replace(']',$m_i,$cad);
  $cad=str_replace('*',$a_i,$cad);
  $cad=str_replace('(',$ci_est,$cad);
  $cad=str_replace(')',$l_ci_est,$cad);
  $cad=str_replace('¡',strtoupper($dat),$cad);
  $cad=str_replace('¿',strtoupper($carr),$cad);
  $cad=str_replace('{',strtoupper($am_est),$cad);
  $cad=str_replace(':',strtoupper($n_est),$cad);
   $cad=str_replace('@',strtoupper($ap_est),$cad);
  $pdf->MultiCell(165,5,$cad,0,'J');
  
  //$pdf->SetFont('Times','B',11);
  //$pdf->Cell(58,4,'Universitaria',0,0,'L');
  /*$pdf->SetFont('Times','',11);
  $cad1=str_replace('?',strtoupper($n_est),'Universitario ? # +, ha cumplido con todos los requisitos para obtener el Titulo Académico de LICENCIADO EN [.');
  $cad1=str_replace('#',strtoupper($ap_est),$cad1);
  $cad1=str_replace('+',strtoupper($am_est),$cad1);
  $cad1=str_replace('[',strtoupper($carr),$cad1);
  $pdf->MultiCell(165,5,$cad1,0,'J');*/
  if($mencion=='Ingenieria de Sistemas Informaticos')
  {$pdf->Ln(5);
  $pdf->SetFont('Times','',11);
  $pdf->Cell(75,5,'Asimismo, le corresponde la  obtención de su',0,0,'L');
  $pdf->SetFont('Times','B',11);
  $pdf->Cell(90,5,'Titulo en Provisión Nacional, con mención "Ingeniería',0,0,'R');
  $pdf->Ln();
  $pdf->Cell(73,5,'en Sistemas Informáticos".',0,0,'L');
  $pdf->Ln(5);}
  if($mencion=='Ciencias de la Computacion')
  {$pdf->Ln(5);
  $pdf->SetFont('Times','',11);
  $pdf->Cell(75,5,'Asimismo, le corresponde la  obtención de su',0,0,'L');
  $pdf->SetFont('Times','B',11);
  $pdf->Cell(90,5,'Titulo  en  Provisión  Nacional, con mención "Ciencias',0,0,'R');
  $pdf->Ln();
  $pdf->Cell(73,5,'de la Computación".',0,0,'L');
  $pdf->Ln(5);}
  }
  else
  {$cad=str_replace('?',$gra,'Que, de acuerdo al informe presentado por la Carrera de # de nuestra Facultad, con +  de fecha [ de ] del *,  se evidencia que el señor Universitario : @ {, ha cumplido con todos los requisitos para obtener el Titulo Académico de BACHILLER SUPERIOR EN CIENCIAS - ¿.');
  $cad=str_replace('#',$carrera,$cad);
  $cad=str_replace('+',strtoupper($i_c),$cad);
  $cad=str_replace('[',$d_i,$cad);
  $cad=str_replace(']',$m_i,$cad);
  $cad=str_replace('*',$a_i,$cad);
  $cad=str_replace('(',$ci_est,$cad);
  $cad=str_replace(')',$l_ci_est,$cad);
  $cad=str_replace('¡',strtoupper($dat),$cad);
  $cad=str_replace('¿',strtoupper($carr),$cad);
  $cad=str_replace('{',strtoupper($am_est),$cad);
  $cad=str_replace(':',strtoupper($n_est),$cad);
   $cad=str_replace('@',strtoupper($ap_est),$cad);
  $pdf->MultiCell(165,5,$cad,0,'J');
  //$pdf->SetFont('Times','B',11);
  //$pdf->Cell(58,4,'Universitaria',0,0,'L');
  /*$pdf->SetFont('Times','',11);
  $cad1=str_replace('?',strtoupper($n_est),'Universitario ? # +, ha cumplido con todos los requisitos para obtener el Titulo Académico de LICENCIADO EN [.');
  $cad1=str_replace('#',strtoupper($ap_est),$cad1);
  $cad1=str_replace('+',strtoupper($am_est),$cad1);
  $cad1=str_replace('[',strtoupper($carr),$cad1);
  $pdf->MultiCell(165,5,$cad1,0,'J');*/
   $pdf->Ln(5);
  }
 }
 else
 {if($tipo=='Licenciatura')
  {$cad=str_replace('?',$gra,'Que, de acuerdo al informe presentado por la Carrera de # de nuestra Facultad, con +  de fecha [ de ] del *,  se evidencia que el señor Universitario : @ {, ha cumplido con todos los requisitos para obtener el Titulo Académico de LICENCIADO EN ¿.');
  $cad=str_replace('#',$carrera,$cad);
  $cad=str_replace('+',strtoupper($i_c),$cad);
  $cad=str_replace('[',$d_i,$cad);
  $cad=str_replace(']',$m_i,$cad);
  $cad=str_replace('*',$a_i,$cad);
  $cad=str_replace('(',$ci_est,$cad);
  $cad=str_replace(')',$l_ci_est,$cad);
  $cad=str_replace('¡',strtoupper($dat),$cad);
  $cad=str_replace('¿',strtoupper($carr),$cad);
  $cad=str_replace('{',strtoupper($am_est),$cad);
  $cad=str_replace(':',strtoupper($n_est),$cad);
   $cad=str_replace('@',strtoupper($ap_est),$cad);
  $pdf->MultiCell(165,5,$cad,0,'J');
  //$pdf->SetFont('Times','B',11);
  //$pdf->Cell(58,4,'Universitaria',0,0,'L');
  /*$pdf->SetFont('Times','',11);
  $cad1=str_replace('?',strtoupper($n_est),'Universitaria ? # +, ha cumplido con todos los requisitos para obtener el Titulo Académico de LICENCIADO EN [.');
  $cad1=str_replace('#',strtoupper($ap_est),$cad1);
  $cad1=str_replace('+',strtoupper($am_est),$cad1);
  $cad1=str_replace('[',strtoupper($carr),$cad1);
  $pdf->MultiCell(165,5,$cad1,0,'J');*/
  }
  else
  {$cad=str_replace('?',$gra,'Que, de acuerdo al informe presentado por la Carrera de # de nuestra Facultad, con +  de fecha [ de ] del *,  se evidencia que el señor Universitario : @ {, ha cumplido con todos los requisitos para obtener el Titulo Académico de BACHILLER SUPERIOR EN CIENCIAS - ¿.');
  $cad=str_replace('#',$carrera,$cad);
  $cad=str_replace('+',strtoupper($i_c),$cad);
  $cad=str_replace('[',$d_i,$cad);
  $cad=str_replace(']',$m_i,$cad);
  $cad=str_replace('*',$a_i,$cad);
  $cad=str_replace('(',$ci_est,$cad);
  $cad=str_replace(')',$l_ci_est,$cad);
  $cad=str_replace('¡',strtoupper($dat),$cad);
  $cad=str_replace('¿',strtoupper($carr),$cad);
  $cad=str_replace('{',strtoupper($am_est),$cad);
  $cad=str_replace(':',strtoupper($n_est),$cad);
   $cad=str_replace('@',strtoupper($ap_est),$cad);
  $pdf->MultiCell(165,5,$cad,0,'J');

  //$pdf->SetFont('Times','B',11);
  //$pdf->Cell(58,4,'Universitaria',0,0,'L');
  /*$pdf->SetFont('Times','',11);
  $cad1=str_replace('?',strtoupper($n_est),'Universitaria ? # +, ha cumplido con todos los requisitos para obtener el Titulo Académico de LICENCIADO EN [.');
  $cad1=str_replace('#',strtoupper($ap_est),$cad1);
  $cad1=str_replace('+',strtoupper($am_est),$cad1);
  $cad1=str_replace('[',strtoupper($carr),$cad1);
  $pdf->MultiCell(165,5,$cad1,0,'J');*/
  }
 }
} 

else  //F
{
 if($carr=='Informatica')
  {
  if($tipo=='Licenciatura')
  {$cad=str_replace('?',$gra,'Que, de acuerdo al informe presentado por la Carrera de # de nuestra Facultad, con +  de fecha [ de ] del *,  se evidencia que la señorita Universitaria : @ {, ha cumplido con todos los requisitos para obtener el Titulo Académico de LICENCIADA EN ¿.');
  $cad=str_replace('#',$carrera,$cad);
  $cad=str_replace('+',strtoupper($i_c),$cad);
  $cad=str_replace('[',$d_i,$cad);
  $cad=str_replace(']',$m_i,$cad);
  $cad=str_replace('*',$a_i,$cad);
  $cad=str_replace('(',$ci_est,$cad);
  $cad=str_replace(')',$l_ci_est,$cad);
  $cad=str_replace('¡',strtoupper($dat),$cad);
  $cad=str_replace('¿',strtoupper($carr),$cad);
  $cad=str_replace('{',strtoupper($am_est),$cad);
  $cad=str_replace(':',strtoupper($n_est),$cad);
   $cad=str_replace('@',strtoupper($ap_est),$cad);
  $pdf->MultiCell(165,5,$cad,0,'J');
  //$pdf->SetFont('Times','B',11);
  //$pdf->Cell(58,4,'Universitaria',0,0,'L');
  /*$pdf->SetFont('Times','',11);
  $cad1=str_replace('?',strtoupper($n_est),'Universitario ? # +, ha cumplido con todos los requisitos para obtener el Titulo Académico de LICENCIADO EN [.');
  $cad1=str_replace('#',strtoupper($ap_est),$cad1);
  $cad1=str_replace('+',strtoupper($am_est),$cad1);
  $cad1=str_replace('[',strtoupper($carr),$cad1);
  $pdf->MultiCell(165,5,$cad1,0,'J');*/
  if($mencion=='Ingenieria de Sistemas Informaticos')
  {$pdf->Ln(5);
  $pdf->SetFont('Times','',11);
  $pdf->Cell(75,5,'Asimismo, le corresponde la  obtención de su',0,0,'L');
  $pdf->SetFont('Times','B',11);
  $pdf->Cell(90,5,'Titulo en Provisión Nacional, con mención "Ingeniería',0,0,'R');
  $pdf->Ln();
  $pdf->Cell(73,5,'en Sistemas Informáticos".',0,0,'L');
  $pdf->Ln(5);}
  if($mencion=='Ciencias de la Computacion')
  {$pdf->Ln(5);
  $pdf->SetFont('Times','',11);
  $pdf->Cell(75,5,'Asimismo, le corresponde la  obtención de su',0,0,'L');
  $pdf->SetFont('Times','B',11);
  $pdf->Cell(90,5,'Titulo  en  Provisión  Nacional, con mención "Ciencias',0,0,'R');
  $pdf->Ln();
  $pdf->Cell(73,5,'de la Computación".',0,0,'L');
  $pdf->Ln(5);}
  }
 else
 {$cad=str_replace('?',$gra,'Que, de acuerdo al informe presentado por la Carrera de # de nuestra Facultad, con +  de fecha [ de ] del *,  se evidencia que la señorita Universitaria : @ {, ha cumplido con todos los requisitos para obtener el Titulo Académico de BACHILLER SUPERIOR EN CIENCIAS - ¿. ');
  $cad=str_replace('#',$carrera,$cad);
  $cad=str_replace('+',strtoupper($i_c),$cad);
  $cad=str_replace('[',$d_i,$cad);
  $cad=str_replace(']',$m_i,$cad);
  $cad=str_replace('*',$a_i,$cad);
  $cad=str_replace('(',$ci_est,$cad);
  $cad=str_replace(')',$l_ci_est,$cad);
  $cad=str_replace('¡',strtoupper($dat),$cad);
  $cad=str_replace('¿',strtoupper($carr),$cad);
  $cad=str_replace('{',strtoupper($am_est),$cad);
  $cad=str_replace(':',strtoupper($n_est),$cad);
   $cad=str_replace('@',strtoupper($ap_est),$cad);
  $pdf->MultiCell(165,5,$cad,0,'J');
  //$pdf->SetFont('Times','B',11);
  //$pdf->Cell(58,4,'Universitaria',0,0,'L');
  /*$pdf->SetFont('Times','',11);
  $cad1=str_replace('?',strtoupper($n_est),'Universitario ? # +, ha cumplido con todos los requisitos para obtener el Titulo Académico de LICENCIADO EN [.');
  $cad1=str_replace('#',strtoupper($ap_est),$cad1);
  $cad1=str_replace('+',strtoupper($am_est),$cad1);
  $cad1=str_replace('[',strtoupper($carr),$cad1);
  $pdf->MultiCell(165,5,$cad1,0,'J');*/
   $pdf->Ln(5);
 }
 }
 else
 {if($tipo=='Licenciatura')
  {
   $cad=str_replace('?',$gra,'Que, de acuerdo al informe presentado por la Carrera de # de nuestra Facultad, con +  de fecha [ de ] del *,  se evidencia que la señorita Universitaria : @ {, ha cumplido con todos los requisitos para obtener el Titulo Académico de LICENCIADA EN ¿.');
  $cad=str_replace('#',$carrera,$cad);
  $cad=str_replace('+',strtoupper($i_c),$cad);
  $cad=str_replace('[',$d_i,$cad);
  $cad=str_replace(']',$m_i,$cad);
  $cad=str_replace('*',$a_i,$cad);
   $cad=str_replace('(',$ci_est,$cad);
  $cad=str_replace(')',$l_ci_est,$cad);
  $cad=str_replace('¡',strtoupper($dat),$cad);
  $cad=str_replace('¿',strtoupper($carr),$cad);
  $cad=str_replace('{',strtoupper($am_est),$cad);
  $cad=str_replace(':',strtoupper($n_est),$cad);
   $cad=str_replace('@',strtoupper($ap_est),$cad);
  $pdf->MultiCell(165,5,$cad,0,'J');
  //$pdf->SetFont('Times','B',11);
  //$pdf->Cell(58,4,'Universitaria',0,0,'L');
  /*$pdf->SetFont('Times','',11);
  $cad1=str_replace('?',strtoupper($n_est),'Universitaria ? # +, ha cumplido con todos los requisitos para obtener el Titulo Académico de LICENCIADO EN [.');
  $cad1=str_replace('#',strtoupper($ap_est),$cad1);
  $cad1=str_replace('+',strtoupper($am_est),$cad1);
  $cad1=str_replace('[',strtoupper($carr),$cad1);
  $pdf->MultiCell(165,5,$cad1,0,'J');*/
     }
  else
  { $cad=str_replace('?',$gra,'Que, de acuerdo al informe presentado por la Carrera de # de nuestra Facultad, con + de fecha [ de ] del *, se evidencia que la señorita Universitaria : @ {, ha cumplido con todos los requisitos para obtener el Titulo Académico de BACHILLER SUPERIOR EN CIENCIAS - ¿.');
  $cad=str_replace('#',$carrera,$cad);
  $cad=str_replace('+',strtoupper($i_c),$cad);
  $cad=str_replace('[',$d_i,$cad);
  $cad=str_replace(']',$m_i,$cad);
  $cad=str_replace('*',$a_i,$cad);
  $cad=str_replace('(',$ci_est,$cad);
  $cad=str_replace(')',$l_ci_est,$cad);
  $cad=str_replace('¡',strtoupper($dat),$cad);
  $cad=str_replace('¿',strtoupper($carr),$cad);
  $cad=str_replace('{',strtoupper($am_est),$cad);
  $cad=str_replace(':',strtoupper($n_est),$cad);
   $cad=str_replace('@',strtoupper($ap_est),$cad);
  $pdf->MultiCell(165,5,$cad,0,'J');
  //$pdf->SetFont('Times','B',11);
  //$pdf->Cell(58,4,'Universitaria',0,0,'L');
  /*$pdf->SetFont('Times','',11);
  $cad1=str_replace('?',strtoupper($n_est),'Universitaria ? # +, ha cumplido con todos los requisitos para obtener el Titulo Académico de LICENCIADO EN [.');
  $cad1=str_replace('#',strtoupper($ap_est),$cad1);
  $cad1=str_replace('+',strtoupper($am_est),$cad1);
  $cad1=str_replace('[',strtoupper($carr),$cad1);
  $pdf->MultiCell(165,5,$cad1,0,'J');*/
  }
 }
} 

  $pdf->Ln(4);
  $pdf->SetFont('Times','',11);
  $pdf->Cell(58,5,'Es cuanto informo, en honor a la verdad y para fines consiguientes.',0,0,'L');
  $pdf->Ln(10);
  $pdf->SetFont('Times','',11);
  if($mes==1){$m='Enero';}
  if($mes==2){$m='Febrero';}
  if($mes==3){$m='Marzo';}
  if($mes==4){$m='Abril';}
  if($mes==5){$m='Mayo';}
  if($mes==6){$m='Junio';}
  if($mes==7){$m='Julio';}
  if($mes==8){$m='Agosto';}
  if($mes==9){$m='Septiembre';}
  if($mes==10){$m='Octubre';}
  if($mes==11){$m='Noviembre';}
  if($mes==12){$m='Diciembre';}
  $cad2=str_replace('*',$m,'La Paz, * ? de &.');
  $cad2=str_replace('?',$dia,$cad2);
  $cad2=str_replace('&',$anio,$cad2);
  $pdf->MultiCell(165,5,$cad2,0,'L'); 
  $pdf->Ln(20);
  $pdf->SetFont('Times','',11);

  $cad2=str_replace('*',$grado,'* ! ¿ ? ');
  $cad2=str_replace('!',$n_d,$cad2);
  $cad2=str_replace('¿',$ap_d,$cad2);
  $cad2=str_replace('?',$am_d,$cad2);
  $pdf->MultiCell(165,5,$cad2,0,'L'); 
 
   if($gen_d=='Masculino'||$gen_d=='')
 {
  if($e==1){$pdf->Cell(58,5,'           D E C A N O',0,0,'L');} 
  else{$pdf->Cell(58,5,'       D E C A N O a.i.',0,0,'L');} 
  }
  else
 {
  if($e==1){$pdf->Cell(58,5,'           D E C A N A',0,0,'L');} 
  else{$pdf->Cell(58,5,'       D E C A N A a.i.',0,0,'L');} 
  }
  $pdf->Ln(12);  
  $pdf->SetFont('Times','',7);
  $pdf->Cell(58,3,'Incl.: Documentación completa',0,0,'L');
  $pdf->Ln();
  $pdf->Cell(58,3,'Copia: Interezado (trámite de Título Académico), Archivo',0,0,'L');
   $pdf->Ln();
   $pdf->SetFont('Times','I',7);
  $cad3=str_replace('?',$c_elab,'?/ DIGITALDOC FCPN');
  $pdf->MultiCell(165,4,$cad3,0,'L'); 
  $pdf->Ln(); 
  
/*******************************************************/
 $pdf->Output();
?>
