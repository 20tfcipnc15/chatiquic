<?
session_start();
	//Codigo tiempo de sesion 
	$fechaGuardada = $_SESSION['ultimoAcceso'];
	$ahora = date("Y-n-j H:i:s");
	$tiempo_transcurrido = (strtotime($ahora) - strtotime($fechaGuardada));

	if($tiempo_transcurrido >= 600){
		//si pasaronn 5 min o mas
		session_name("sesiondirh"); 
		session_unset(); 
		session_destroy(); 
		header ("Location: index.php"); 
	}
	else{
		$_SESSION['ultimoAcceso'] = $ahora;
	}

	if (!isset($_SESSION['paso_por_donde_yo_quiero']))
	{ 
		header ("Location: index.php"); 
		exit; 
	}
$id_user=$_SESSION['id_user'];
$nombre=$_SESSION['nombre_ini']; 
$unidad=$_SESSION['unidad_ini']; 
$id_unidad=$_SESSION['id_unidad']; 

$ip=$_SERVER['REMOTE_ADDR']; 

include("../funciones1.php");
$link = conexion();
include ("../php/fecha_hora.php");
$fecha=fecha_hora();
$todo = $_GET['cad'];
$vector = explode(",",$todo);
$long = count($vector);
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Chasqui Digital</title>
<LINK href="../javascript/estilos.css" type=text/css rel=stylesheet>
<LINK href="../javascript/estilo_noticias.css" type=text/css rel=stylesheet>
<SCRIPT language=JavaScript src="../javascript/fecha-hora_bc.js"></SCRIPT>
<SCRIPT language=JavaScript src="../fecha-hora_bc.js"></SCRIPT>
<SCRIPT language=JavaScript src="../javascript/funciones.js"></SCRIPT>
<script type="text/javascript" src="../Sothink DHTML Menu/Resource/js/stmenu.js"></script>
<style type="text/css">
<!--
.Estilo82 {
	font-size: 15px;
	font-family: "Times New Roman", Times, serif;
}
.Estilo83 {font-size: 18px}
.Estilo84 {font-size: 15px; font-family: "Times New Roman", Times, serif; font-weight: bold; }
-->
</style>
</head>
<body bottommargin="0" leftmargin="0" rightmargin="0" topmargin="0" bgcolor="#EDF7FF" onload=escrolea()>
<table width="612" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="612"><table width="612" border="0" cellpadding="0" cellspacing="0" style="position:left;" heigth="500">
      <tr>
        <td width="50"><center>
          <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
          <p>&nbsp;          </p>
        </center></td>
        <td><table width="612" border="0" cellpadding="0" cellspacing="0" bordercolor="#8fb1d2" style="position:left;" heigth="500">
          <tr>
            <td width="180" height="110"><div align="center"><img src="../img/umsa_escudo1.gif" width="42" height="85" /></div></td>
            <td width="757"><table width="370" border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#000000">
                <tr>
                  <td width="364" align="center"><p class="Estilo77 Estilo82 Estilo83">CHASQUI DIGITAL
                  <div align="center" class="Estilo77">
                                     <?php
					   $unidad = strtoupper($unidad);
					   echo '<BR>F.C.P.N. '.$unidad.'<br><br>';
					   ?>
                        </div>
                    <div align="left" class="Estilo77"> <? echo 'REPORTE DE FECHA: ';
					   echo $fecha.'<br>';
					   echo 'RESPONSABLE: ';
					   echo $nombre;
					   ?></div>
                    </p>
                  </td>
                </tr>
            </table></td>
            <td width="129"><div align="center"><img src="../imagenes/loguito.jpeg" width="87" height="85" /></div></td>
          </tr>
          <tr>
            <td height="21" colspan="3"><table width="1162" border="1" align="left" cellpadding="0" cellspacing="0" bordercolor="#000000">
                <tr>
                  <td width="41" height="15" bgcolor="#4791C5" class="Estilo82"><div align="center"><strong>RUT</strong></div></td>
                  <td width="94" height="15" bgcolor="#4791C5" class="Estilo82"><div align="center"><strong>FECHA</strong></div></td>
                  <td width="100" bgcolor="#4791C5"><div align="center" class="Estilo84">PROCEDENCIA</div></td>
                  <td width="70" bgcolor="#4791C5"><div align="center" class="Estilo84">REG. EXT. </div></td>
                  <td width="117" bgcolor="#4791C5"><div align="center" class="Estilo84">REFERENCIAS</div></td>
                  <td width="180" bgcolor="#4791C5"><div align="center" class="Estilo84">PRIMERA RUTA </div></td>
                  <td width="180" bgcolor="#4791C5" class="Estilo82"><div align="center"><strong>SEGUNDA RUTA </strong></div></td>
                  <td width="180" bgcolor="#4791C5" class="Estilo82"><div align="center"><strong>TERCERA RUTA </strong></div></td>
                  <td width="180" bgcolor="#4791C5" class="Estilo84"><div align="center">CUARTA RUTA </div></td>
                </tr>
                <?
for($i=0;$i < $long;$i++)
{
	$id=$vector[$i];
	$sql = "SELECT * FROM correspondencia WHERE rut like '$id'";
	$resp = mysql_query($sql);
	$num = mysql_num_rows($resp); 
	if ($num > 0) 					
	{	
		$linea=mysql_fetch_array($resp);
 		$rut=$linea["rut"];
		$fecha=$linea["fecha"];
		$destino=$linea["destino"];
	   	$correlativo=$linea["correlativo"];
		$referencias=$linea["referencias"];
		$unidad=$linea["unidad"];
			echo '
            <tr>
            <td height="144" class="Estilo78"><center>'; 
			echo $rut; 
			echo '</center></td>
            <td height="144" class="Estilo78"><center>'; 
			echo $fecha; 
			echo '</center></td>
            <td height="144" class="Estilo78"><center>';
			echo $unidad;
			echo '</center></td>
			<td height="144" class="Estilo78"><center>';
			echo $correlativo;
			echo'</center></td>
			<td height="144" class="Estilo78" align="left">'; ?>
                <table width="144" height="144" border="0" align="justify" class="Estilo78" >
                  <tr>
                    <td><? echo $referencias;?></td>
                  </tr>
                </table>
              <?			echo'</td>';
			echo'<td height="144" class="Estilo78"><center>';
			echo '.';
			echo'</center></td>
			<td height="144" class="Estilo78"><center>';
			echo '.';
			echo'</center></td>
			<td height="144" class="Estilo78"><center>';
			echo '.';
			echo'</center></td>
			<td height="144" class="Estilo78"><center>';
			echo '.';
			echo'</center></td>
            </tr>';
			}
	}
	?>
            </table></td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html>