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
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
	<title>Envío de notificacion</title>
<LINK href="../javascript/estilos.css" type=text/css rel=stylesheet>
<link href="../javascript/estilo_noticias.css" rel="stylesheet" type="text/css" />
<SCRIPT language=JavaScript src="../javascript/fecha-hora_bc.js"></SCRIPT>
<script language=JavaScript src="../javascript/generador_noticias.js"></script>
<SCRIPT language=javascript src="../javascript/barra_de_estado.js"></SCRIPT>
<SCRIPT language=JavaScript src="../javascript/contador.js"></SCRIPT>
<script type="text/javascript" src="../Sothink DHTML Menu/Resource/js/stmenu.js"></script>
</head>
<body bottommargin="0" leftmargin="0" rightmargin="0" topmargin="0" bgcolor="#EDF7FF" onload=escrolea() oncontextmenu="return false">
<?
//header("Location: confirm_mail.php");
$fecha =$_POST['fecha'];
$de = $_POST['de'];
$correo='fcpn_dec@yahoo.com';
$num = $_POST['num'];
$destino = $_POST['para'];
$mensaje = $_POST['mensaje'];
//$cuerpo = 'Aleida';
if ($num!=76 and $num!=77)
	{	$pre=591;
		$dominio='@viva-gsm.com';
		$destinatario=$pre.$num.$destino.$dominio;
	}
else
	{	$dominio='@tigo.com.bo';
		$destinatario=$num.$destino.$dominio;
	}
$cuerpo=$mensaje;
//$asunto = $_POST['asunto'];
//$destinatario=$num.$destino.$dominio;
$headers .= "From: ".$de."<".$correo.">\r\n";
mail($destinatario,$asunto,$cuerpo,$headers);
include("../funciones1.php");
$link=conexion();
//$consulta ="INSERT INTO notificacion (id_notificacion,id_despachada,id_receptor,fecha_hora,enviado_por,tipo,asunto,mensaje) VALUES (NULL,'0','0','$fecha','$de','0','$asunto','$mensaje')";
//$resultado=mysql_query($consulta) or die ("Error de búsqueda en la BD: ". mysql_Error());
?>
<table width="780" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="270" height="28" bordercolor="0" background="../img/umsa_banner1.GIF"><div align="left"></div></td>
    <td width="510" height="28" bordercolor="0" background="../img/fondo_banner_rojo1.gif"><div align="right" class="Estilo13">
	<strong><font color="#ffffff">
    <SCRIPT>today();</SCRIPT></font>    </strong></div></td>
  </tr>
  <tr>
    <td height="4" colspan="2" background="../img/fondo_delgado.gif"><img src="../img/fondo_delgado.gif" width="2" height="4"></td>
  </tr>
  <tr>
    <td height="133" colspan="2"><table width="780" height="131" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="132" height="110" background="../img/encabezado_01.gif">
		<div align="center"><img src="../img/umsa_escudo1.gif" width="54" height="106"></div>		</td>
        <td width="25"><img src="../img/encabezado_03.gif" width="25" height="110"></td>
        <td width="445" background="../img/encabezado_04.gif"><div align="center">
          <p><img src="../img/chasqui_digital_azul2 copia.jpg" width="445" height="60"></p>
          </div></td>
        <td width="28"><img src="../img/encabezado_06.gif" width="28" height="110"></td>
        <td width="150" background="../img/encabezado_01.gif"><div align="center"><img src="../imagenes/logotipo_chasqui.jpg" width="100" height="107"></div></td>
      </tr>
      <tr>
        <td width="132" height="21" background="../img/fondo_izq1.gif">&nbsp;</td>
        <td  width="498" colspan="3"><table width="487" height="21" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td background="../img/fondo_cuerpo.gif" bgcolor="#8fb1d2"><table width="420" border="0" align="center" cellpadding="0" cellspacing="0" heigth="21">
                <tr>
                  <td width="191"><span class="Estilo10 Estilo20">&nbsp;<span class="Estilo21">Monoblok Central, Avenida Villazon N&deg; 1995</span></span></td>
                  <td width="32"><div align="center"><img src="../img/correo.gif" width="21" height="21"></div></td>
                  <td width="197"><span class="Estilo21"> <a href="mailto: hemeroteca@correo.umsa.bo" class="Estilo10"><span class="Estilo21">E-mail: dec_fcpn@yahoo.es</span></a></span></td>
                </tr>
              </table></td>
            </tr>
        </table></td>
        <td width="150" height="21" background="../img/fondo_der1.gif">&nbsp;</td>
      </tr>      
	    </table>    </td>
  </tr>
  <tr>
    <td colspan="2"><table width="780" border="0" cellpadding="0" cellspacing="0">
		<tr>
		  <td height="1"></td>
		</tr>
        <tr>
          <td width="132" height="246" bgcolor="#8fb1d2">
		   <table style="position:center;top:170px;" width="132" height="246" border="0" cellpadding="0" cellspacing="0" align="center">
              <tr height="123">
                <td><script src="menu_admin.js"></script></td>
              </tr>
              <tr height="117">
                <td>&nbsp;</td>
              </tr>
          </table></td>
          <td width="498" rowspan="3"><div align="center">
              <table width="498" height="246" border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td width="2">&nbsp;</td>
                  <td width="494" bgcolor="#336699"><div align="center">
                      <table width="484" height="246" border="2" align="center" cellpadding="0" cellspacing="0" bordercolor="#8fb1d2">
                        <tr>
                          <td background="../img/fondo_cuerpo.gif"><center>
                              <table width="480" height="246" border="2" align="center" cellpadding="0" cellspacing="0" bordercolor="#8fb1d2">
                                <tr>
                                  <td background="../img/fondo_cuerpo.gif"><center>
                                      <strong>Su notificaci&oacute;n ha sido enviada correctamente...!!! </strong><br />
                                      <a href='../admin/index.html'></a><br/>
                                  </center></td>
                                </tr>
                              </table>
                          </center></td>
                        </tr>
                      </table>
                  </div></td>
                  <td width="2">&nbsp;</td>
                </tr>
              </table>
          </div></td>
          <td width="150" rowspan="3" bgcolor="#8fb1d2"></td>
        </tr>
      </table></td>
  </tr>
</table>
<table width="780" height="20" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
	<td height="1"></td>
  <tr>
  <tr>
    <td width="15" height="20"><img src="../img/No_fondo1.gif" width="15" height="20"></td>
    <td width="750" background="../img/No_fondo2.gif">&nbsp;</td>
    <td width="15"><img src="../img/No_fondo3.gif" width="15" height="20"></td>
  </tr>
</table>
</body>
</html>