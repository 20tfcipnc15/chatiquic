<?php
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
include("../funciones.php");
include("../php/fecha_hora.php"); 
$link=conexion();

$registro=$_POST['registro'];   
$fecha=$_POST['fecha'];
$recibido_por=$_POST['recibido_por'];
$procedencia = $_POST['procedencia'];
$reg_externo= $_POST['reg_externo']; 
$hoja_ruta= $_POST['hoja_ruta'];   
$referencias= $_POST['referencias'];
$tipo= $_POST['tipo'];
$otro= $_POST['otro'];
$fojas= $_POST['fojas'];

if($procedencia==null)
	$procedencia=$pa_otro;
		
if($fecha!=null)
{ 
	$consulta ="UPDATE recibida SET fecha_hora = '$fecha' WHERE id_rec = '$registro'";
	$resultado=mysql_query($consulta) or die ("Error de búsqueda en la BD: ". mysql_Error());
}
if($recibido_por!=null)
{
	$consulta ="UPDATE recibida SET recibido_por = '$recibido_por' WHERE id_rec = '$registro'";
	$resultado=mysql_query($consulta) or die ("Error de búsqueda en la BD: ". mysql_Error());
}
if($procedencia!=null)
{
	$consulta ="UPDATE recibida SET procedencia = '$procedencia' WHERE id_rec = '$registro'";
	$resultado=mysql_query($consulta) or die ("Error de búsqueda en la BD: ". mysql_Error());
}
if($reg_externo!=null)
{
	$consulta ="UPDATE recibida SET reg_externo = '$reg_externo' WHERE id_rec = '$registro'";
	$resultado=mysql_query($consulta) or die ("Error de búsqueda en la BD: ". mysql_Error());
}
if($hoja_ruta!=null)
{
	$consulta ="UPDATE recibida SET hoja_ruta = '$hoja_ruta' WHERE id_rec = '$registro'";
	$resultado=mysql_query($consulta) or die ("Error de búsqueda en la BD: ". mysql_Error());
}
if($referencias!=null)
{
	$consulta ="UPDATE recibida SET referencias = '$referencias' WHERE id_rec = '$registro'";
	$resultado=mysql_query($consulta) or die ("Error de búsqueda en la BD: ". mysql_Error());
}
if($tipo!=null)
{
	$consulta ="UPDATE recibida SET tipo = '$tipo' WHERE id_rec = '$registro'";
	$resultado=mysql_query($consulta) or die ("Error de búsqueda en la BD: ". mysql_Error());
}
if($fojas!=null)
{
	$consulta ="UPDATE recibida SET fojas = '$fojas' WHERE id_rec = '$registro'";
	$resultado=mysql_query($consulta) or die ("Error de búsqueda en la BD: ". mysql_Error());
}
//Desplegamos por pantalla el registro modificado
$consulta ="SELECT * FROM recibida where id_rec = '$registro'";
$resultado=mysql_query($consulta) or die ("Error de búsqueda en la BD: ". mysql_Error());
$numResultados = mysql_num_rows($resultado);   
?>
<html>
<head>
<title>Chasqui Digital</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<LINK href="../javascript/estilos.css" type=text/css rel=stylesheet>
<LINK href="../javascript/estilo_noticias.css" type=text/css rel=stylesheet>
<SCRIPT language=JavaScript src="../javascript/fecha-hora_bc.js"></SCRIPT>
<SCRIPT language=javascript src="../javascript/barra_de_estado.js"></SCRIPT>
<SCRIPT language=JavaScript src="../fecha-hora_bc.js"></SCRIPT>
<SCRIPT language=JavaScript src="../javascript/funciones.js"></SCRIPT>
<script type="text/javascript" src="../Sothink DHTML Menu/Resource/js/stmenu.js"></script>
</head>
<body bottommargin="0" leftmargin="0" rightmargin="0" topmargin="0" bgcolor="#EDF7FF" onload=escrolea()>
<table style="position:absolute;left:110px;" width="780" border="0" align="center" cellspacing="0">
  <tr>
    <td width="270" height="28" bordercolor="0" background="../img/umsa_banner1.GIF"><div align="left"></div></td>
    <td width="510" height="28" bordercolor="0" background="../img/fondo_banner_rojo1.gif">
	<div align="right" class="Estilo30"><strong><font color="#ffffff">
      <SCRIPT>today();</SCRIPT>
  </font></strong></div></td>
  </tr>
  <tr>
    <td height="7" colspan="2" background="../img/fondo_delgado.gif"><img src="../admin/img/fondo_delgado.gif" width="2" height="4"></td>
  </tr>
  <tr>
    <td height="133" colspan="2"><table width="780" height="131" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="132" height="110" background="../img/encabezado_01.gif">
		<div align="center"><img src="../img/umsa_escudo1.gif" width="54" height="106"></div>		</td>
        <td width="25"><img src="../img/encabezado_03.gif" width="25" height="110"></td>
        <td width="445" background="../img/encabezado_04.gif"><div align="center"><img src="../img/chasqui_digital_azul2 copia.jpg" width="445" height="60"></div></td>
        <td width="28"><img src="../img/encabezado_06.gif" width="28" height="110"></td>
        <td width="150" background="../img/encabezado_01.gif"><div align="center"><img src="../imagenes/logotipo_chasqui.jpg" width="100" height="107"></div></td>
      </tr>
      <tr>
        <td width="132" height="21" background="../img/fondo_izq1.gif">&nbsp;</td>
        <td  width="498" colspan="3">
		<table width="492" height="19" border="0" align="right" cellpadding="1" cellspacing="0">
          <tr>
            <td width="482" height="18" bgcolor="#8fb1d2"></td>
            <td width="5"></td>
          </tr>
        </table></td>
        <td width="150"><table width="150" height="21" border="0" cellpadding="1" cellspacing="0">
          <tr>
            <td bgcolor="#8fb1d2">&nbsp;</td>
          </tr>
        </table></td>
      </tr>      
	    </table>    </td>
  </tr>
  <tr>
    <td height="248" colspan="2"><table width="780" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td width="132" height="246" bgcolor="#8fb1d2">
			<table style="position:absolute;top:172px;left:3px;" width="132" height="265" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td height="92"><script src="menu_admin.js"></script></td>
              </tr>
              <tr>
                <td></td>
              </tr>
            </table></td>
            <td width="648" height="200"><table width="644" height="246" border="2" align="right" cellpadding="0" cellspacing="0" bordercolor="#8fb1d2">
              <tr>
                <td background="../img/fondo_cuerpo.gif"><center>
                    <p class="Estilo51">Su registro ha sido modificado correctamente...! </p>
                    <table width="624" border="0" cellpadding="0" cellspacing="0">
                      <tr>
                        <td width="29" height="21" background="../img/encabezado_tabla_01.gif">&nbsp;</td>
                        <td width="566" background="../img/encabezado_tabla_02.gif"><div align="center" class="Estilo59">DATOS GENERALES DEL TR&Aacute;MITE </div></td>
                        <td width="29" background="../img/encabezado_tabla_04.gif">&nbsp;</td>
                      </tr>
                      <tr>
                        <td height="2" colspan="3"></td>
                      </tr>
                    </table>
                    <table width="624" border="0" cellpadding="0" cellspacing="2" bgcolor="#74ABD3">
                      <tr>
                        <td width="514"></td>
                      </tr>
                      <tr>
                        <td bgcolor="#B1CBE4"><table width="620" border="0" align="center" cellpadding="0" cellspacing="2" bordercolor="#EDF7FF">
                            <tr>
                              <td width="89" height="15" bgcolor="#4791C5" class="Estilo2"><div align="center">Fecha Ingreso </div></td>
                              <td width="72" bgcolor="#4791C5"><div align="center" class="Estilo2">Recibido_por</div></td>
                              <td width="42" bgcolor="#4791C5"><div align="center" class="Estilo2">N&ordm; Reg. </div></td>
                              <td width="83" bgcolor="#4791C5"><div align="center" class="Estilo2">Procedencia</div></td>
                              <td width="51" bgcolor="#4791C5"><div align="center" class="Estilo2">N&ordm; Reg. </div></td>
                              <td width="49" bgcolor="#4791C5" class="Estilo2"><div align="center">Hoja de Ruta </div></td>
                              <td width="89" bgcolor="#4791C5"><div align="center" class="Estilo2">Referencias</div></td>
                              <td width="86" bgcolor="#4791C5" class="Estilo2"><div align="center">Tipo</div></td>
                              <td width="39" bgcolor="#4791C5" class="Estilo2"><div align="center">Fojas</div></td>
                            </tr>
                            <?php 
													if($numResultados>0)
													{
													    $linea=mysql_fetch_array($resultado,MYSQL_BOTH);
															$pa_fecha=$linea["fecha_hora"];
															$pa_reg_interno=$linea["reg_interno"];
															$pa_reg_externo=$linea["reg_externo"];
															$pa_procedencia=$linea["procedencia"];
															$pa_referencias=$linea["referencias"];
															$pa_recibido_por=$linea["recibido_por"];    
															$pa_hoja_ruta=$linea["hoja_ruta"];  
															$pa_tipo=$linea["tipo"];
															$fojas=$linea["fojas"];
													    echo '
                                                         <tr>
                                                         <td height="50" bgcolor="#E1F1FF" class="Estilo78"><center>'; 
														 echo $pa_fecha; 
														 echo '</center></td>
                                                         <td height="50" bgcolor="#E1F1FF" class="Estilo78"><center>'; 
														 echo $pa_recibido_por; 
														 echo '</center></td>
                                                         <td height="50" bgcolor="#E1F1FF" class="Estilo78"><center>';
														 echo $pa_reg_interno;
														 echo '</center></td>
                                                         <td height="50" bgcolor="#E1F1FF" class="Estilo78"><center>';
														 echo $pa_procedencia;
														 echo '</center></td>
                                                         <td height="50" bgcolor="#E1F1FF" class="Estilo78"><center>';
														 echo $pa_reg_externo;
														 echo'</center></td>
                                                         <td height="50" bgcolor="#E1F1FF" class="Estilo78"><center>';
														 echo $pa_hoja_ruta;
														 echo'</center></td>
														 <td height="50" bgcolor="#E1F1FF" class="Estilo78"><center>';
														 echo $pa_referencias;
														 echo'</center></td>
                                                         <td height="50" bgcolor="#E1F1FF" class="Estilo78"><center>';
														 echo $pa_tipo;
														 echo'</center></td>
														 <td height="50" bgcolor="#E1F1FF" class="Estilo78"><center>';
														 echo $fojas;
														 echo'</center></td>
                                                       </tr>';
													  }
													   ?>
                            <tr>
                              <td height="15" colspan="9" bgcolor="#CCDDEE" class="Estilo78"><div align="center">
                                  <input onClick="window.close();" class="Estilo59" name="submit" type="submit" style="background-color:#4791C5;border:0px;margin:1px;padding:0px; font-weight: bold;" value="   Salir   ">
                              </div></td>
                            </tr>
                            <tr>
                              <td height="15" colspan="9" class="Estilo78">&nbsp;</td>
                            </tr>
                        </table></td>
                      </tr>
                      <tr>
                        <td height="1" bgcolor="#74ABD3"></td>
                      </tr>
                    </table>
                    <p class="Estilo51">&nbsp;</p>
                    </center></td>
              </tr>
            </table></td>
          </tr>
    </table></td>
  </tr>
  
  <tr>
    <td colspan="2"><table width="780" height="20" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="15" height="20"><img src="../img/No_fondo1.gif" width="15" height="20"></td>
          <td width="750" background="../img/No_fondo2.gif">&nbsp;</td>
          <td width="15"><img src="../img/No_fondo3.gif" width="15" height="20"></td>
        </tr>
    </table></td>
  </tr>
</table>
</body>
</html>