<?php 
session_start();
if (!isset($_SESSION['super usuario']))
{ 
	header ("Location: ../index.php"); 
	exit; 
};
?> 
<html>
<head>
<title>Chasqui Digital</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<LINK href="../../javascript/estilos.css" type=text/css rel=stylesheet>
<link href="../../javascript/estilo_noticias.css" rel="stylesheet" type="text/css" />
<SCRIPT language=JavaScript src="../../javascript/fecha-hora_bc.js"></SCRIPT>
<script language=JavaScript src="../../javascript/generador_noticias.js"></script>
<SCRIPT language=javascript src="../../javascript/barra_de_estado.js"></SCRIPT>
<SCRIPT language=JavaScript src="../../javascript/contador.js"></SCRIPT>
<script type="text/javascript" src="../../Sothink DHTML Menu/Resource/js/stmenu.js"></script>
</head>
<body bottommargin="0" leftmargin="0" rightmargin="0" topmargin="0" bgcolor="#EDF7FF" onload=escrolea() oncontextmenu="return false">
<table style="position:absolute;left:110px;" width="780" border="0" align="center" cellspacing="0">
  <tr>
    <td width="270" height="28" bordercolor="0" background="../../img/umsa_banner1.GIF"><div align="left"></div></td>
    <td width="510" height="28" bordercolor="0" background="../../img/fondo_banner_rojo1.gif"><div align="right" class="Estilo13">
	<strong><font color="#ffffff">
      <SCRIPT>today();</SCRIPT></font>
    </strong></div></td>
  </tr>
  <tr>
    <td height="4" colspan="2" background="../../img/fondo_delgado.gif"><img src="../../img/fondo_delgado.gif" width="2" height="4"></td>
  </tr>
  <tr>
    <td height="133" colspan="2"><table width="780" height="131" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="132" height="110" background="../../img/encabezado_01.gif">
		<div align="center"><img src="../../img/umsa_escudo1.gif" width="54" height="106"></div>		</td>
        <td width="25"><img src="../../img/encabezado_03.gif" width="25" height="110"></td>
        <td width="445" background="../../img/encabezado_04.gif"><div align="center">
          <p><img src="../../img/chasqui_digital_azul2 copia.jpg" width="445" height="60"></p>
          </div></td>
        <td width="28"><img src="../../img/encabezado_06.gif" width="28" height="110"></td>
        <td width="150" background="../../img/encabezado_01.gif"><div align="center"><img src="../../imagenes/logotipo_chasqui.jpg" width="100" height="107"></div></td>
      </tr>
      <tr>
        <td width="132" height="21" background="../../img/fondo_izq1.gif">&nbsp;</td>
        <td  width="498" colspan="3"><table width="487" height="21" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td background="../../img/fondo_cuerpo.gif" bgcolor="#8fb1d2"><table width="420" border="0" align="center" cellpadding="0" cellspacing="0" heigth="21">
                <tr>
                  <td width="191"><span class="Estilo10 Estilo20">&nbsp;<span class="Estilo21">Monoblok Central, Avenida Villazon N&deg; 1995</span></span></td>
                  <td width="32"><div align="center"><img src="../../img/correo.gif" width="21" height="21"></div></td>
                  <td width="197"><span class="Estilo21"> <a href="mailto: hemeroteca@correo.umsa.bo" class="Estilo10"><span class="Estilo21">E-mail: fcpn@yahoo.es</span></a></span></td>
                </tr>
              </table></td>
            </tr>
        </table></td>
        <td width="150" height="21" background="../../img/fondo_der1.gif">&nbsp;</td>
      </tr>      
	    </table>    </td>
  </tr>
  <tr>
    <td height="248" colspan="2"><table width="780" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td height="246">  
				<iframe src="autenticacion.php" id="marco" style="width:622;height:363;">            
				</iframe>
			</td>             
            <td width="150" rowspan="3" bgcolor="#8fb1d2">
			 <table style="position:absolute; top:171px; width: 145px; left: 634px;"width="139" border="0" cellpadding="0" cellspacing="0">
			  <tr>
			  	<td><span class="Estilo3">
				<form action="../index.php" method="post">
			  	 <input name="buscar2" type="submit" class="Estilo2"style="background-color:#336699;border:0px;margin:1px;padding:0px;width:143px;" value="INICIO">
				</form>
			  	</span></td>
			  </tr>
            </table>
            <p>&nbsp;</p></td>
          </tr>                 
    </table></td>
  </tr>
  <tr>
    <td height="22" colspan="2"><table width="780" height="20" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="15" height="20"><img src="../../img/No_fondo1.gif" width="15" height="20"></td>
        <td width="750" background="../../img/No_fondo2.gif">&nbsp;</td>
        <td width="15"><img src="../../img/No_fondo3.gif" width="15" height="20"></td>
      </tr>
    </table></td>
  </tr>
</table>

<map name="Map2">
  <area shape="rect" coords="0,-1,94,26" href="#http://www.la-razon.com" target="http://www.la-razon.com" alt="Peri&oacute;dico La Raz&oacute;n">
</map>
<map name="Map3">
<area shape="rect" coords="-2,2,88,21" href="#http://www.eldiario.net" target="http://www.eldiario.net" alt="Peri&oacute;dico El diario">
</map>
<map name="Map4">
  <area shape="rect" coords="0,1,90,24" href="#http://www.laprensa.com.bo" target="http://www.laprensa.com.bo" alt="Peri&oacute;dico La Prensa">
</map></body>
</html>