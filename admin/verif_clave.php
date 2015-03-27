<?
function rand_string($len, $chars = 'qwertyuiopasdfghjklzxcvbnm1234567890')
{
   $string = '';
   for ($i = 0; $i < $len; $i++)
   {
       $pos = rand(0, strlen($chars)-1);
       $string .= $chars{$pos};
   }
   return $string;
}
$new_pass=rand_string(4);
$new_pass=strtoupper($new_pass);
$new_pass1=md5($new_pass);
$clave=$_POST['clave'];
if($clave!=null)
{
include("../funciones1.php");
$link=conexion();
$sql = "SELECT usuario,id_user FROM user WHERE  clave like '%$clave%'"; 
$resp=mysql_query($sql) or die ("Error de búsqueda en la BD: ". mysql_Error());;
$num = mysql_num_rows($resp);
if($num>0)
{
	$linea=mysql_fetch_array($resp);
	$usuario=$linea["usuario"]; 
	$id_user=$linea["id_user"]; 
	$consulta ="UPDATE user SET contrasenia = '$new_pass1' WHERE id_user='$id_user'";
	$resultado=mysql_query($consulta) or die ("Error de búsqueda en la BD: ". mysql_Error());
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
    <td height="7" colspan="2" background="../img/fondo_delgado.gif"><img src="img/fondo_delgado.gif" width="2" height="4"></td>
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
			<form name="form1" method="post" action="autenticacion1.php">
              <table width="132" height="150" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td><table width="127" height="80" border="0" align="center" cellpadding="0" cellspacing="2" bgcolor="#74ABD3">
                      <tr>
                        <td height="15"><div align="center" class="Estilo2">Usuario </div></td>
                      </tr>
                      <tr>
                        <td bgcolor="#B1CBE4"><table width="123" border="0" align="center" cellpadding="0" cellspacing="2">
                            <tr>
                              <td height="5" class="Estilo21"><div align="center" class="Estilo37"></div></td>
                            </tr>
                            <tr>
                              <td height="30"><div align="center">
                                  <input name="usuario" type="usuario" class="Estilo21" id="ci"size="15" onKeyPress="return numeros_letras(event)">
                                </div>
                                  <div align="center"></div></td>
                            </tr>
                        </table></td>
                      </tr>
                      <tr>
                        <td height="7"><p align="center" class="Estilo2">Contrase&ntilde;a</p></td>
                      </tr>
                      <tr>
                        <td><table width="123" border="0" align="center" cellpadding="0" cellspacing="2" bgcolor="#CCDDEE">
                            <tr>
                              <td height="5" class="Estilo21"><div align="center" class="Estilo37"></div></td>
                            </tr>
                            <tr>
                              <td height="30"><div align="center">
                                  <input name="password" type="password" class="Estilo21" id="codigo2"size="15" onKeyPress="return numeros_letras(event)">
                                </div>
                                  <div align="center"></div></td>
                            </tr>
                            <tr>
                              <td bgcolor="#CCDDEE" class="Estilo23"><div align="center" class="Estilo3"><br>
                                      <input name="buscar2" type="submit" class="Estilo2" id="buscar2" style="background-color:#4791C5;border:0px;margin:1px;padding:0px" value=" Ingresar ">
                                </div>
                                  <div align="center" class="Estilo13"><a href="../admin/password.php"><br>
                                    &iquest;Olvidaste tu contrase&ntilde;a?</a></div></td>
                            </tr>
                        </table></td>
                      </tr>
                  </table></td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                </tr>
              </table>
              </form>
            </td>
            <td width="498"><div align="center">
              <table width="498" height="246" border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td width="2">&nbsp;</td>
                  <td width="494" bgcolor="#336699"><div align="center">
                    <table width="490" height="246" border="2" align="center" cellpadding="0" cellspacing="0" bordercolor="#8fb1d2">
                        <tr>
                                           <td background="../img/fondo_cuerpo.gif"><center>
                                               <p class="Estilo65">&nbsp;</p>
                                               <p class="Estilo65">Sus datos son los siguientes... </p>
                                               <table width="340" height="21" border="0" cellpadding="0" cellspacing="0">
                                                 <tr>
                                                   <td width="29" height="21" background="../img/encabezado_tabla_01.gif">&nbsp;</td>
                                                   <td width="282" background="../img/encabezado_tabla_02.gif"><div align="center" class="Estilo59">PALABRA CLAVE </div></td>
                                                   <td width="29" background="../img/encabezado_tabla_04.gif">&nbsp;</td>
                                                 </tr>
                                                 <tr>
                                                   <td height="2" colspan="3"></td>
                                                 </tr>
                                               </table>
                                               <table width="340" border="0" align="center" cellpadding="0" cellspacing="2" bgcolor="#74ABD3">
                                                 <tr>
                                                   <td width="362"></td>
                                                 </tr>
                                                 <tr>
                                                   <td bgcolor="#B1CBE4"><table width="336" border="0" align="center" cellpadding="0" cellspacing="2">
                                                       <tr>
                                                         <td height="10" colspan="2" bordercolor="#74ABD3" bgcolor="#CCDDEE"></td>
                                                       </tr>
                                                       <tr>
                                                         <td><div align="right"><span class="Estilo78">Usuario:</span></div></td>
                                                         <td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo65">&nbsp;<? echo $usuario;?></span></td>
                                                       </tr>
                                                       <tr>
                                                         <td width="85" bgcolor="#CCDDEE"><div align="right"><span class="Estilo78">Contrase&ntilde;a:
                                                           </span>
                                                         </div>
                                                         <div align="right" class="Estilo78"></div></td>
                                                         <td width="245" background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo65">&nbsp;<? echo $new_pass;?></span></td>
                                                       </tr>
                                                       <tr>
                                                         <td height="10" colspan="2" class="Estilo59"></td>
                                                       </tr>
                                                       <tr>
                                                         <td height="7" colspan="2" bgcolor="#CCDDEE" class="Estilo59"></td>
                                                       </tr>
                                                     </table>
                                                    </td></tr>
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
<?
	}
	else
		{	$cad = 'La palabra clave introduciada es incorrecta.';
			header ('Location:password.php?msm='.$cad);
		}
}
else
	{
		$cad = 'Introduzca su palabra clave por favor.';
		header ('Location:password.php?msm='.$cad);
	}
?>
