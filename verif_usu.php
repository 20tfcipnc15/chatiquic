<?php
$sw = 0;
$ci = $_POST['ci'];
$rut = $_POST['rut'];

include("funciones1.php");
$link=conexion();

if ($ci == 'fcpn')
	$sw = 1;
else
	header ("location: index.php");
/*   $consulta ="SELECT c.rut,c.unidad
               FROM unidad u INNER JOIN correspondencia c
               WHERE c.rut = '$rut' and c.unidad = u.nombre and u.cod_uni = '$ci'";*/
$consulta ="SELECT rut
            FROM correspondencia
            WHERE rut = '$rut'";
$resultado=mysql_query($consulta) or die ("Error de búsqueda en la BD: ". mysql_Error());
$numResultados = mysql_num_rows($resultado);
if($numResultados>0 and $sw==1)
{
	$linea=mysql_fetch_array($resultado);	
	$id=$linea["rut"];
	session_start(); 
	$_SESSION['habilitado']=TRUE; 
	$_SESSION['rut'] = $id;
	$_SESSION['responsable'] = $unidad;
	header("Location: buscar.php?rut=".$rut);
}
else
{
	mysql_close();
	include("funciones2.php");
	$link2 = conexion2();
	
	$consulta ="SELECT rut
    	        FROM correspondencia
        	    WHERE rut = '$rut'";
	$resultado=mysql_query($consulta) or die ("Error de búsqueda en la BD: ". mysql_Error());
	$numResultados = mysql_num_rows($resultado);
	if($numResultados>0 and $sw==1)
	{
		$linea=mysql_fetch_array($resultado);	
		$id=$linea["rut"];
		session_start(); 
		$_SESSION['habilitado']=TRUE; 
		$_SESSION['rut'] = $id;
		$_SESSION['responsable'] = $unidad;
		header("Location: buscar.php?rut=".$rut);
	}
	else
	{
?>
<html>
<head>
<title>Chasqui Digital</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<LINK href="javascript/estilos.css" type=text/css rel=stylesheet>
<LINK href="javascript/estilo_noticias.css" type=text/css rel=stylesheet>
<SCRIPT language=JavaScript src="javascript/fecha-hora_bc.js"></SCRIPT>
<SCRIPT language=javascript src="javascript/barra_de_estado.js"></SCRIPT>
<script language=JavaScript src="javascript/generador_noticias.js"></script>
<SCRIPT language=JavaScript src="fecha-hora_bc.js"></SCRIPT>
<SCRIPT language=JavaScript src="javascript/funciones.js"></SCRIPT>
<script type="text/javascript" src="Sothink DHTML Menu/Resource/js/stmenu.js"></script>
<style type="text/css">
<!--
.Estilo90 {
	font-size: 9px;
	font-family: Arial, Helvetica, sans-serif;
}
-->
</style>
</head>
<body bottommargin="0" leftmargin="0" rightmargin="0" topmargin="0" bgcolor="#EDF7FF" onload=escrolea()>
<table style="position:absolute;left:110px;" width="780" border="0" align="center" cellspacing="0">
  <tr>
    <td width="270" height="28" bordercolor="0" background="img/umsa_banner1.GIF"><div align="left"></div></td>
    <td width="510" height="28" bordercolor="0" background="img/fondo_banner_rojo1.gif">
	<div align="right" class="Estilo30"><strong><font color="#ffffff">
      <SCRIPT>today();</SCRIPT>
  </font></strong></div></td>
  </tr>
  <tr>
    <td height="7" colspan="2" background="img/fondo_delgado.gif"><img src="admin/img/fondo_delgado.gif" width="2" height="4"></td>
  </tr>
  <tr>
    <td height="133" colspan="2"><table width="780" height="131" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="132" height="110" background="img/encabezado_01.gif">
		<div align="center"><img src="img/umsa_escudo1.gif" width="54" height="106"></div>		</td>
        <td width="25"><img src="img/encabezado_03.gif" width="25" height="110"></td>
        <td width="445" background="img/encabezado_04.gif"><div align="center">
		<img src="img/chasqui_digital_azul2 copia.jpg" width="445" height="60"></div></td>
        <td width="28"><img src="img/encabezado_06.gif" width="28" height="110"></td>
        <td width="150" background="img/encabezado_01.gif"><div align="center"><img src="imagenes/logotipo_chasqui.jpg" width="100" height="107"></div></td>
      </tr>
      <tr>
        <td width="132" height="21" background="img/fondo_izq1.gif">&nbsp;</td>
        <td  width="498" colspan="3"><table width="487" height="21" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td background="img/fondo_cuerpo.gif" bgcolor="#8fb1d2"><table width="420" border="0" align="center" cellpadding="0" cellspacing="0" heigth="21">
                <tr>
                  <td width="191"><span class="Estilo10 Estilo20">&nbsp;<span class="Estilo21">Monoblok Central, Avenida Villazon N&deg; 1995</span></span></td>
                  <td width="32"><div align="center"><img src="img/correo.gif" width="21" height="21"></div></td>
                  <td width="197"><span class="Estilo21 Estilo90"> <a href="mailto: hemeroteca@correo.umsa.bo" class="Estilo21">E-mail: dec_fcpn@yahoo.es</a></span></td>
                </tr>
            </table></td>
          </tr>
        </table></td>
        <td width="150" background="img/fondo_der1.gif">&nbsp;</td>
      </tr>      
	    </table>    </td>
  </tr>
  <tr>
    <td height="248" colspan="2"><table width="780" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td width="130" height="200" bgcolor="#8fb1d2"><table style="position:absolute; top:169px; left:3px; height: 185px;" width="132" height="119" border="0" align="right" cellpadding="0" cellspacing="0">
              <tr>
                <td height="2"><div align="right"></div></td>
              </tr>
              <tr>
                <td><div align="right">
                    <script src="javascript/menu_usu.js"></script>
                </div></td>
              </tr>
              <tr>
                <td height="38"><form name="form1" method="post" action="verif_usu.php">
                    <div align="right">
                      <table width="127" height="80" border="0" align="left" cellpadding="0" cellspacing="2" bgcolor="#74ABD3">
                        <tr>
                          <td height="15"><div align="center"><span class="Estilo2">N&uacute;mero de CI o ID </span></div></td>
                        </tr>
                        <tr>
                          <td bgcolor="#B1CBE4"><table width="123" border="0" align="center" cellpadding="0" cellspacing="2">
                              <tr>
                                <td height="5" class="Estilo21"><div align="center" class="Estilo37"></div></td>
                              </tr>
                              <tr>
                                <td height="30"><div align="center">
                                    <input name="ci" type="password" class="Estilo21" id="usuario"size="15" onKeyPress="return solo_numeros(event)" value="fcpn">
                                  </div>
                                    <div align="center"></div></td>
                              </tr>
                          </table></td>
                        </tr>
                        <tr>
                          <td height="7"><p align="center"><span class="Estilo2">R.U.T.</span></p></td>
                        </tr>
                        <tr>
                          <td><table width="123" border="0" align="center" cellpadding="0" cellspacing="2" bgcolor="#CCDDEE">
                              <tr>
                                <td height="5" class="Estilo21"><div align="center" class="Estilo37"></div></td>
                              </tr>
                              <tr>
                                <td height="30"><div align="center">
                                    <input name="rut" type="text" class="Estilo21" id="codigo2"size="15" onKeyPress="return numeros_letras_especiales(event)">
                                  </div>
                                    <div align="center"></div></td>
                              </tr>
                              <tr>
                                <td height="30" bgcolor="#CCDDEE"><div align="center"><span class="Estilo3">
                                    <input name="buscar2" type="submit" class="Estilo2" id="buscar2" style="background-color:#4791C5;border:0px;margin:1px;padding:0px" value=" Ingresar ">
                                </span></div></td>
                              </tr>
                          </table></td>
                        </tr>
                        <tr>
                          <td height="1"></td>
                        </tr>
                      </table>
                    </div>
                </form></td>
              </tr>
            </table></td>
            <td width="498"><div align="center">
              <table width="497" height="246" border="0" align="right" cellpadding="0" cellspacing="0">
                <tr>
                  <td width="2" height="272"></td>
                  <td width="498" height="272" bgcolor="#336699"><div align="center">
                    <table width="496" height="280" border="2" align="right" cellpadding="0" cellspacing="0" bordercolor="#8fb1d2">
                      <tr>
                        <td height="274" background="img/fondo_cuerpo.gif"><center>
                              <center>
                                <p class="Estilo77"><strong>Lo sentimos... <br>
                                      <br>
                                  Usted ha ingresado datos incorrectos en n&uacute;mero de R.U.T. </strong></p>
                                <p class="Estilo77">&nbsp;</p>
                                <p class="Estilo77"><a href='index.php'>Volver a Intentar</a> </p>
                              </center>
                        </center></td>
                      </tr>
                    </table>
                  </div></td>
                  <td width="2"></td>
                </tr>
              </table>
            </div></td>
            <td width="150" height="200" bgcolor="#8fb1d2"><table width="146" border="0" align="center" cellpadding="0" cellspacing="2">
              <tr>
                <td><table bgcolor="#336699" width="144" border="0" cellpadding="0" cellspacing="2" align="center">
                    <tr>
                      <td><div align="center" class="Estilo18">Agradecimientos</div></td>
                    </tr>
                </table></td>
              </tr>
              <tr>
                <td><table cellspacing=0 cellpadding=1 border=0 align="center">
                    <tr>
                      <td><div align="center">
                          <script>escribe()</script>
                      </td>
                    </tr>
                </table></td>
              </tr>
              <tr>
                <td><table width="146" height="91" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#8fb1d2">
                    <tr>
                      <td width="143" height="28" background="img/fondo_cuerpo.gif" bgcolor="#336699"><div align="center"><img src="img/razon1 copy.gif" width="90" height="26" border="0" usemap="#Map2MapMapMapMapMapMapMapMap"></div></td>
                    </tr>
                    <tr>
                      <td background="img/fondo_cuerpo.gif" bgcolor="#336699"><div align="center"><img src="img/diario1.gif" width="90" height="22" border="0" usemap="#Map3MapMapMapMapMapMapMapMap"></div></td>
                    </tr>
                    <tr>
                      <td background="img/fondo_cuerpo.gif" bgcolor="#336699"><p align="center"><img src="img/prensa1.gif" width="91" height="24" border="0" usemap="#Map4MapMapMapMapMapMapMapMap"></p></td>
                    </tr>
                  </table>
                    <map name="Map2MapMapMapMapMapMapMapMap">
                      <area shape="rect" coords="-1,1,93,28" href="http://www.la-razon.com" target="http://www.la-razon.com" alt="Peri&oacute;dico La Raz&oacute;n">
                  </map>
                    <map name="Map3MapMapMapMapMapMapMapMap">
                      <area shape="rect" coords="0,2,90,21" href="http://www.eldiario.net" target="http://www.eldiario.net" alt="Peri&oacute;dico El diario">
                  </map></td>
              </tr>
            </table></td>
          </tr>
    </table></td>
  </tr>
  
  <tr>
    <td colspan="2"><table width="780" height="20" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="15" height="20"><img src="img/No_fondo1.gif" width="15" height="20"></td>
          <td width="750" background="img/No_fondo2.gif">&nbsp;</td>
          <td width="15"><img src="img/No_fondo3.gif" width="15" height="20"></td>
        </tr>
    </table></td>
  </tr>
</table>

<map name="Map4MapMapMapMapMapMapMapMap">
  <area shape="rect" coords="0,-1,91,23" href="http://www.laprensa.com.bo/noticias/19-03-09/index.php" target="http://www.laprensa.com.bo/noticias/19-03-09/index.php">
</map></body>
</html>
<?
}
}
?>