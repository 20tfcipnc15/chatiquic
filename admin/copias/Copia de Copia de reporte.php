<?
session_start();
if (!isset($_SESSION['paso_por_donde_yo_quiero']))
{ 
	header ("Location: index.php"); 
	exit; 
} 
?>
<html>
<head>
<title>Chasqui Digital</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<LINK href="../javascript/estilos.css" type=text/css rel=stylesheet>
<LINK href="../javascript/estilo_noticias.css" type=text/css rel=stylesheet>
<SCRIPT language=JavaScript src="../javascript/fecha-hora_bc.js"></SCRIPT>
<SCRIPT language=javascript src="../javascript/barra_de_estado.js"></SCRIPT>
<SCRIPT language=javascript src="../javascript/funciones.js"></SCRIPT>
<SCRIPT language=JavaScript src="../fecha-hora_bc.js"></SCRIPT>
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
        <td width="445" background="../img/encabezado_04.gif"><div align="center">
		<img src="../img/chasqui_digital_azul2 copia.jpg" width="445" height="60"></div></td>
        <td width="28"><img src="../img/encabezado_06.gif" width="28" height="110"></td>
        <td width="150" background="../img/encabezado_01.gif"><div align="center"><img src="../imagenes/logotipo_chasqui.jpg" width="100" height="107"></div></td>
      </tr>
      <tr>
        <td width="132" height="21" background="../img/fondo_izq1.gif">&nbsp;</td>
        <td  width="498" colspan="3"><table width="492" border="0" align="right" cellpadding="0" cellspacing="0">
          <tr>
            <td width="482" height="21" background="../img/fondo_inf.gif"><table width="420" border="0" align="center" cellpadding="0" cellspacing="0" heigth="21">
                <tr>
                  <td width="207" height="21" class="Estilo40">&nbsp;Monoblok Central, Avenida Villazon N&deg; 1995</td>
                  <td width="36"><div align="center"><img src="../img/correo.gif" width="21" height="21"></div></td>
                  <td width="177"> <span class="Estilo34"><a href="mailto: hemeroteca@correo.umsa.bo" class="Estilo40">E-mail: dec_fcpn@yahoo.es</a></span></td>
                </tr>
              </table></td>
            <td width="8">&nbsp;</td>
          </tr>
        </table></td>
        <td width="150" background="../img/fondo_der1.gif">&nbsp;</td>
      </tr>      
	    </table>    </td>
  </tr>
  <tr>
    <td height="248" colspan="2"><table width="780" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td width="130" height="246" bgcolor="#8fb1d2">
			<table style="position:absolute;top:172px;left:3px;" width="132" height="100" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td height="66"><script src="menu_admin.js"></script></td>
              </tr>
              <tr>
                <td><p>&nbsp;</p>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
                <p>&nbsp;</p>                <p>&nbsp;</p></td>
              </tr>
              
            </table></td>
            <td width="498"><div align="center">
              <table width="498" height="246" border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td width="2">&nbsp;</td>
                  <td width="494" bgcolor="#336699"><div align="center">
                    <table width="490" height="246" border="2" cellpadding="0" cellspacing="0" bordercolor="#8fb1d2">
                      <tr>
                        <td background="../img/fondo_cuerpo.gif"><center>
                            <form name="reporte" method="post" action="reporte/reporte1.php">
                              <table width="304" height="21" border="0" cellpadding="0" cellspacing="0">
                                <tr>
                                  <td width="29" height="21" background="../img/encabezado_tabla_01.gif">&nbsp;</td>
                                  <td width="246" background="../img/encabezado_tabla_02.gif"><div align="center" class="Estilo59">REPORTE: C. RECIBIDA </div></td>
                                  <td width="29" background="../img/encabezado_tabla_04.gif">&nbsp;</td>
                                </tr>
                                <tr>
                                  <td height="2" colspan="3"></td>
                                </tr>
                              </table>
                              <table width="304" border="0" align="center" cellpadding="0" cellspacing="2" bgcolor="#74ABD3">
                                <tr>
                                  <td></td>
                                </tr>
                                <tr>
                                  <td bgcolor="#B1CBE4"><table width="300" border="0" align="center" cellpadding="0" cellspacing="2">
                                      <tr>
                                        <td width="73" height="30" bordercolor="#74ABD3" bgcolor="#CCDDEE"><div align="right"><span class="Estilo78">Fecha:</span></div></td>
                                        <td width="221" height="30" bgcolor="#CCDDEE"><span class="Estilo64"> &nbsp;
                                              <input name="fecha" type="text" class="Estilo64" style="width:120px" value="" onKeyPress="return numeros_letras(event)"/>
                                              <input name="calendario" type="Reset" class="Estilo59" style="width:90px;background-color:#4791C5;border:0px;margin:1px;padding:0px; font-weight: bold;" value="Calendario" onClick="abrir('../php/calendario4.php');">
                                        </span></td>
                                      </tr>
                                      <tr>
                                        <td height="7" colspan="2"></td>
                                      </tr>
                                      <tr>
                                        <td height="5" colspan="2" class="Estilo59"></td>
                                      </tr>
                                      <tr>
                                        <td height="30" colspan="2" bgcolor="#CCDDEE" class="Estilo59"><div align="center">
                                            <input name="enviar3" type="submit" class="Estilo59" style="width:90px;background-color:#4791C5;border:0px;margin:1px;padding:0px; font-weight: bold;" value=" Reporte " >
                                          &nbsp;&nbsp;&nbsp;&nbsp;</div></td>
                                      </tr>
                                  </table></td>
                                </tr>
                                <tr>
                                  <td height="1" bgcolor="#74ABD3"></td>
                                </tr>
                              </table>
                            </form>
                          <p>&nbsp;</p>
                        </center></td>
                      </tr>
                    </table>
                  </div></td>
                  <td width="2">&nbsp;</td>
                </tr>
              </table>
            </div></td>
            <td width="150" height="200" bgcolor="#8fb1d2">&nbsp;</td>
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
