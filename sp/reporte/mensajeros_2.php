<?php
require('fpdf.php');
include("../../funciones1.php");
$link = conexion();
include ('../fecha_int.php');
include("../../php/fecha_hora.php");
include ('../../admin/tiempo_tramite.php');

$fecha = $_POST['fecha'];
$fecha_fin = $_POST['fecha_fin'];
$nombre_ini = $_POST['usuario'];
$unidad_ini = $_POST['unidad'];
$id_unidad_ini = $_POST['id'];

$uni = $_GET['var'];
$nom = $_GET['var1'];
$fecha = $_GET['var2'];
$unidad_sol = $_GET['var3'];
$fecha_fin = $_GET['var4'];

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
//		$this->Image('../../../imagenes/UMSA.jpg',18,6,16,30,'JPG');
//		$this->Image('../../../imagenes/loguito.jpeg',310,6,28,30,'JPEG');
		$this->Ln();
	}
	function Footer()
	{	
		global $fecha_actual;
	    $this->SetY(-15);
	    $this->SetFont('Arial','I',9);
	    $this->SetTextColor(128);
		$this->Cell(0,3,'Monoblock Central Edificio Antiguo P.B. Av. Villaz�n No 1995',0,1,'C');
		$this->Cell(0,3,'2441570 - 2440571 Fax: 2441092',0,1,'C');
		$this->Cell(0,3,'La Paz - Bolivia',0,1,'C');
		$this->Cell(0,3,'P�gina '.$this->PageNo().'   '.$fecha_actual,0,1,'C');
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
$pdf=new PDF('p','mm','letter');
$pdf->AddPage();
$pdf->SetMargins(2.5,2.5,2.5);
$pdf->SetAuthor('Aleida Iba�ez');
$pdf->SetFont('Times','B',12);
$pdf->SetFillColor(200,220,255);

$unidad_sol = strtoupper($unidad_sol);
$pdf->SetFont('Arial','B',10);

$pdf->Cell(-2,7,'n',1,0,'C');
$pdf->Cell(10,7,'No',1,0,'C',1);
$pdf->Cell(55,7,'UNIDAD',1,0,'C',1);
$pdf->Cell(45,7,'NOMBRE',1,0,'C',1);
$pdf->Cell(25,7,'SIN ALERTA',1,0,'C',1);
$pdf->Cell(25,7,'A. AMARILLA',1,0,'C',1);
$pdf->Cell(25,7,'A. ROJA',1,0,'C',1);
$pdf->Cell(20,7,'TOTAL',1,1,'C',1);

/*$unidad[0] = 'Carrera de Matematicas';
$unidad[1] = 'Carrera de Estadistica';
$unidad[2] = 'Carrera de Biologia';
$unidad[3] = 'Carrera de Informatica';
$unidad[4] = 'Carrera de Quimica';
$unidad[5] = 'Carrera de Fisica';*/

$pdf->SetFont('Arial','',9);

$sql2 = "SELECT nombre,id_unidad FROM unidad WHERE id_unidad <= '71' order by nombre ASC";
$res2 = mysql_query($sql2) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());

$filas = mysql_num_rows($res2);
if($filas!=0)
{ 	
    $tt = 0;
    while($lin2=mysql_fetch_array($res2))
    {
	$tt++;
	$unidad = $lin2['nombre'];
	$id_unidad = $lin2['id_unidad'];

        $sql = "SELECT nombre FROM user WHERE cargo = 'Mensajero' or cargo = 'Mensajera' and id_unidad = '$id_unidad'";
        $resp = mysql_query($sql);
		
        while($linea1=mysql_fetch_array($resp))
	{
            $nombre = $linea1["nombre"];
            $pdf->Cell(5,7,'',0,0,'C');
            $pdf->Cell(10,7,$tt,1,0,'C');
            $pdf->Cell(55,7,$unidad,1,0,'L');
            $pdf->Cell(45,7,$nombre,1,0,'L');

            $a = 0;
            $b = 0;
            $c = 0;

            $aa = 0;
            $bb = 0;
            $cc = 0;

            $suma = 0;

            $consulta = "SELECT distinct(rut) FROM correspondencia WHERE destino like '$unidad' or destino like '$nombre' order by id_c DESC";
            $resultado=mysql_query($consulta) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
            $numResultados = mysql_num_rows($resultado);
            $i=0;
            if ($numResultados > 0)
            {
                $var=0;
                while ($linea = mysql_fetch_array($resultado))
                {
                    $rut = $linea["rut"];
                    $imprimir = 0;

                    $sql = "SELECT max(id_c) as id_c FROM correspondencia WHERE rut like '$rut'";
                    $res = mysql_query($sql) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
                    $vec = mysql_fetch_array($res);
                    $id_c = $vec["id_c"];
		
                    $sql = "SELECT * FROM correspondencia WHERE id_c = $id_c and (destino like '$unidad' or destino like '$nombre')";
                    $res = mysql_query($sql) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
                    $num = mysql_num_rows($res);

                    if($num > 0)
                    {
			$vec = mysql_fetch_array($res);
			$destino = $vec["destino"];
			$imprimir = 1;
			$fecha = $vec["fecha"];
			$id_c = $vec["id_c"];
                    }//end if
                    if($imprimir == 1)
                    {
		    //CALCULAMOS EL TIEMPO DE PERMANENCIA DEL TRAMITE
                        $fecha_fin = fecha_hora();
                        $fecha_ini = $fecha;
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
			if ($alert == 0)
			{
				$a++;
				$aa = $aa + $a;
			}
			elseif ($alert == 1)
			{
				$b++;
				$bb = $bb + $b;
			}
			elseif ($alert == 2)
			{
				$c++;
				$cc = $cc + $c;
			}
                    }

                }

            }//end while
            $suma = $suma + $a + $b + $c;
        }//end if($numResultados)

        $pdf->Cell(25,7,$a,1,0,'C');
        $pdf->Cell(25,7,$b,1,0,'C');
        $pdf->Cell(25,7,$c,1,0,'C');
        $pdf->Cell(20,7,$suma,1,1,'C');
    }
}
$pdf->Ln();
$pdf->Output();
?>