<?
session_start();
if (!isset($_SESSION['paso_por_donde_yo_quiero']))
{ 
	header ("Location: index.php"); 
	exit; 
} 
	include("../../funciones1.php");
	$link=conexion();
    $user=$_SESSION['id_user'];
    $cod=$_SESSION['password']; 
	$password=$_POST['password'];
	$password2=$_POST['password2'];
	$clave=$_POST['clave'];	
	if($password==$password2)
	{	
		$password = md5($password);
		$sql = "SELECT id_user FROM user WHERE id_user like '%$user%' and contrasenia like '%$cod%'"; 
		$resp=mysql_query($sql);
		$num = mysql_num_rows($resp);
		if($num>0)
		{
			$linea=mysql_fetch_array($resp);
			$id_user=$linea["id_user"]; 
    
			$consulta ="UPDATE user SET contrasenia = '$password', clave = '$clave' WHERE id_user = '$id_user'";
			$resultado=mysql_query($consulta) or die ("Error de búsqueda en la BD: ". mysql_Error());
		}	
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
    <td colspan="2"><table height="161" width="780" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="132" bgcolor="#8fb1d2"><table style="position:absolute; left: 4px; top:169px;" width="132" height="92" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td height="92"><script src="menu_perfil.js"></script></td>
            </tr>
        </table></td>
        <td bgcolor="#EDF7FF" width="2"></td>
        <td width="494" align="right" bgcolor="#8fb1d2"><table width="491" height="157" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td height="148" background="../../img/fondo_cuerpo.gif"><br>
              <table width="344" height="21" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td width="29" height="21" background="../../img/encabezado_tabla_01.gif"></td>
                  <td width="286" background="../../img/encabezado_tabla_02.gif"><div align="center" class="Estilo59">NUEVA CONTRSE&Ntilde;A</div></td>
                  <td width="29" background="../../img/encabezado_tabla_04.gif"></td>
                </tr>
                <tr>
                  <td height="2" colspan="3"></td>
                </tr>
              </table>
              <table width="344" border="0" align="center" cellpadding="0" cellspacing="2" bgcolor="#74ABD3">
                <tr>
                  <td></td>
                </tr>
                <tr>
                  <td bgcolor="#B1CBE4">
                  <table width="340" border="0" align="center" cellpadding="0" cellspacing="2">
                      <tr>
                        <td height="18" bordercolor="#74ABD3" bgcolor="#CCDDEE">
                            <p class="Estilo78" align="center"><strong>Su Contrase&ntilde;a ha sido modificada correctamente...! </strong></p>
                            </td>
                      </tr>
                      <tr>
                        <td class="Estilo59"></td>
                      </tr>
                    </table>
                     </td>
                </tr>
                <tr>
                  <td height="1" bgcolor="#74ABD3"></td>
                </tr>
              </table>
              <br></td>
            </tr>
        </table></td>
        <td width="2" align="right" bgcolor="#EDF7FF"></td>
        <td width="150" align="right" bgcolor="#8fb1d2">&nbsp;</td>
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
</body>
</html>
<?
	}
	else
	{ 
		echo 'Lo sentimos... Los datos no coinciden';
	}
?>