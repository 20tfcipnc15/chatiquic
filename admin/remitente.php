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
$id_c1 = $_GET['id'];
  include("../funciones1.php");
  $link=conexion();
	$consulta ="SELECT * FROM unidad order by id_unidad DESC limit 1";
	$resultado=mysql_query($consulta) or die ("Error de búsqueda en la BD: ". mysql_Error());
	$linea=mysql_fetch_array($resultado);
	$nombre=$linea["nombre"]; 
	$cod_rem=$linea["cod_uni"];
	$e_mail=$linea["e_mail"];
	$telefono=$linea["telefono"];
?>
<html>
<head>
<title>Chasqui Digital</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<LINK href="../javascript/estilos.css" type=text/css rel=stylesheet>
<LINK href="../javascript/estilo_noticias.css" type=text/css rel=stylesheet>
<SCRIPT language=JavaScript src="../javascript/funciones.js"></SCRIPT>
<SCRIPT language=JavaScript src="../javascript/fecha-hora_bc.js"></SCRIPT>
<SCRIPT language=javascript src="../javascript/barra_de_estado.js"></SCRIPT>
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
                  <td width="177"><span class="Estilo34"><a href="mailto: hemeroteca@correo.umsa.bo" class="Estilo40">E-mail: dec_fcpn@yahoo.es</a></span></td>
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
			<table style="position:absolute; top:172px; left:3px; height: 268px;" width="132" height="246" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td height="92"><script src="menu_admin.js"></script></td>
              </tr>
              <tr>
                <td><p>&nbsp;</p>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
</td>
              </tr>
              
            </table></td>
            <td width="498"><div align="center">
              <table width="498" height="246" border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td width="2">&nbsp;</td>
                  <td width="494" bgcolor="#336699"><div align="center">
                    <table width="488" height="257" border="2" cellpadding="0" cellspacing="0" bordercolor="#8fb1d2">
                      <tr>
                        <td background="../img/fondo_cuerpo.gif"><center>
                            <p class="Estilo51"><br>
                              Los datos de la correspondencia<br>
                              <br>
                              han sido registrados satisfactoriamente...! </p>
                          <table width="400" border="0" cellpadding="0" cellspacing="0">
                              <tr>
                                <td width="29" height="21" background="../img/encabezado_tabla_01.gif">&nbsp;</td>
                                <td width="342" background="../img/encabezado_tabla_02.gif"><div align="center" class="Estilo59">CORRESPONDENCIA RECIBIDA </div></td>
                                <td width="29" background="../img/encabezado_tabla_04.gif">&nbsp;</td>
                              </tr>
                              <tr>
                                <td height="2" colspan="3"></td>
                              </tr>
                            </table>
                          <table width="400" border="0" cellpadding="0" cellspacing="2" bgcolor="#74ABD3">
                              <tr>
                                <td></td>
                              </tr>
                              <tr>
                                <td bgcolor="#B1CBE4"><table width="396" border="0" align="center" cellpadding="0" cellspacing="2" bordercolor="#EDF7FF">
                                    <tr>
                                      <td width="105" height="15" bordercolor="#74ABD3" class="Estilo78"><div align="right">Nombre:</div></td>
                                      <td width="285" height="15" bgcolor="#E1F1FF" class="Estilo65">&nbsp;
                                          <?php  echo $nombre;?>
                                      </td>
                                    </tr>
                                    <tr>
                                      <td height="15" class="Estilo78"><div align="right">C&oacute;digo: </div></td>
                                      <td height="15" bgcolor="#E1F1FF" class="Estilo65">&nbsp;
                                          <?php  echo $cod_rem;?></td>
                                    </tr>
                                    <tr>
                                      <td height="15" bgcolor="#CCDDEE"><div align="right"><span class="Estilo78">E - mail:</span></div></td>
                                      <td height="15" bgcolor="#E1F1FF" class="Estilo65">&nbsp; <?php echo $e_mail; ?></td>
                                    </tr>
                                    <tr>
                                      <td><div align="right"><span class="Estilo78">Tel&eacute;fono:</span></div></td>
                                      <td height="15" bgcolor="#E1F1FF" class="Estilo65">&nbsp; <?php echo $telefono;?></td>
                                    </tr>
                                    <tr>
<?
$con = "SELECT * FROM correspondencia WHERE id_c = $id_c1";
$res = mysql_query($con) or die ("Error de búsqueda en la BD: ". mysql_Error());
$lin = mysql_fetch_array($res);
$fojas = $lin["fojas"]; 
$tipo = $lin["tipo"];
$fecha = $lin["fecha"];
$rut = $lin["rut"];
$responsable = $lin["responsable"];
?>
                                      <td height="15" colspan="2" bgcolor="#CCDDEE" class="Estilo78"><form name="form1" method="post" action="reporte/reporte_rut.php">
                                          <div align="center">
                                            <input class="Estilo59" name="submit22" type="submit" style="background-color:#4791C5;border:0px;margin:1px;padding:0px; font-weight: bold;" value="Imprimir RUT">
                                            <input name="fecha" type="hidden" value="<? echo $fecha;?>" />
                                            <input name="procedencia" type="hidden" value="<? echo $unidad;?>" />
                                            <input name="rut" type="hidden" value="<? echo $rut;?>" />
                                            <input name="responsable" type="hidden" value="<? echo $responsable;?>" />
                                            <input name="fojas" type="hidden" value="<? echo $fojas;?>" />
                                            <input name="unidad" type="hidden" value="<? echo $unidad;?>" />
                                            <input name="tipo" type="hidden" value="<? echo $tipo;?>" />
</div>
                                      </form></td>
                                    </tr>
                                    <tr>
                                      <td height="15" colspan="2" class="Estilo78">&nbsp;</td>
                                    </tr>
                                </table></td>
                              </tr>
                              <tr>
                                <td height="1" bgcolor="#74ABD3"></td>
                              </tr>
                            </table>
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
 <?php 
//include("recibido_guardar.php");
?>