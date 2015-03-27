<?php
   $ci = $_POST['ci'];
   $rut = $_POST['rut'];
   include("funciones1.php");
   $link=conexion();
   $consulta ="SELECT c.rut,c.unidad
               FROM unidad u INNER JOIN correspondencia c
               WHERE c.rut = '$rut' and c.unidad = u.nombre and u.cod_uni = '$ci'";
   $resultado=mysql_query($consulta) or die ("Error de búsqueda en la BD: ". mysql_Error());
   $numResultados = mysql_num_rows($resultado);
if($numResultados>0)
{
	$linea=mysql_fetch_array($resultado);	
	$rut=$linea["rut"];
	$unidad=$linea["unidad"];
	session_start(); 
	$_SESSION['habilitado']=TRUE; 
	$_SESSION['rut'] = $id;
	$_SESSION['responsable'] = $unidad;

//	header("Location: reg_solicitado.php?rut=$rut"); 
	header("Location: seguimiento.php?rut=$rut");
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
<SCRIPT language=JavaScript src="fecha-hora_bc.js"></SCRIPT>
<SCRIPT language=JavaScript src="javascript/funciones.js"></SCRIPT>
<script type="text/javascript" src="Sothink DHTML Menu/Resource/js/stmenu.js"></script>
<style type="text/css">
<!--
.Estilo83 {
	color: #444F82;
	font-weight: bold;
}
.Estilo86 {
	font-family: Verdana;
	font-size: 12px;
}
.Estilo87 {color: #374393; font-family: "Courier New", Courier, monospace; }
.Estilo88 {color: #374393; font-family: "Courier New", Courier, monospace; font-size: 12px; }
.Estilo89 {font-family: "Courier New", Courier, monospace}
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
        <td  width="498" colspan="3"><table width="492" border="0" align="right" cellpadding="0" cellspacing="0">
          <tr>
            <td width="482" height="21" background="img/fondo_inf.gif"><table width="420" border="0" align="center" cellpadding="0" cellspacing="0" heigth="21">
                <tr>
                  <td width="207" height="21" class="Estilo40">&nbsp;Monoblok Central, Avenida Villazon N&deg; 1995</td>
                  <td width="36"><div align="center"><img src="img/correo.gif" width="21" height="21"></div></td>
                  <td width="177"><span class="Estilo34"><a href="mailto: hemeroteca@correo.umsa.bo" class="Estilo40">E-mail: dec_fcpn@yahoo.es</a></span></td>
                </tr>
            </table></td>
            <td width="8">&nbsp;</td>
          </tr>
        </table></td>
        <td width="150" background="img/fondo_der1.gif">&nbsp;</td>
      </tr>      
	    </table>    </td>
  </tr>
  <tr>
    <td height="248" colspan="2"><table width="780" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td width="130" height="246" bgcolor="#8fb1d2">&nbsp;</td>
            <td width="498"><div align="center">
              <table width="498" height="246" border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td width="2">&nbsp;</td>
                  <td width="494" bgcolor="#336699"><div align="center">
                   <table width="490" height="246" border="2" align="center" cellpadding="0" cellspacing="0" bordercolor="#8fb1d2">
                        <tr>
                                           <td background="img/fondo_cuerpo.gif"><center>
                                             <form name="registro_recibida" method="post" action="index.php">
                                               <p class="Estilo77"><center>
                                                 <p class="Estilo77"><strong>Lo sentimos... <br>
                                                 <br>
                                                 Usted ha ingresado datos incorrectos en ID y/o C&oacute;digo de Nota.
                                                 </strong></p>
                                                 <p class="Estilo77">&nbsp;</p>
                                                 <p class="Estilo77"><a href='index.php'>Volver a Intentar</a>    </p>
                                               </center>
                                               <p class="Estilo37">&nbsp;</p>
                                             </form>
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
        <td width="15" height="20"><img src="img/No_fondo1.gif" width="15" height="20"></td>
          <td width="750" background="img/No_fondo2.gif">&nbsp;</td>
          <td width="15"><img src="img/No_fondo3.gif" width="15" height="20"></td>
        </tr>
    </table></td>
  </tr>
</table>
</body>
</html>
<?
}
?>