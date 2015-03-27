<?php
//mi vida no tiene sentido ni razón d ser,tu eres todo en mi vida,t has convertido
include("../funciones1.php");
$link = conexion();
$usuario = $_POST['usuario'];
$password = md5($_POST["password"]); 

$consulta ="SELECT id_user,nombre,contrasenia,id_unidad,cargo FROM user WHERE usuario like '$usuario' and contrasenia like '$password' and (tipo = '2' or tipo = '3')";
$resultado=mysql_query($consulta) or die ("Error de búsqueda en la BD: ". mysql_Error());
$numResultados = mysql_num_rows($resultado);
if($numResultados > 0 and $usuario != null and $password != null)
{   
	 $linea=mysql_fetch_array($resultado);
	 $nom=$linea["nombre"];  
 	 $id=$linea["id_user"];  
	 $id_unidad=$linea["id_unidad"]; 
	 $cargo=$linea["cargo"]; 
	 
	 $consulta1 ="SELECT nombre FROM unidad WHERE id_unidad = '$id_unidad'";
	 $resultado1 = mysql_query($consulta1) or die ("Error de búsqueda en la BD: ". mysql_Error());			
	 $numResultados1 = mysql_num_rows($resultado1);
	 $linea1 = mysql_fetch_array($resultado1);
	 $unidad_db = $linea1['nombre'];
  	 $password=$linea["contrasenia"];  
	 session_start(); 
	 $_SESSION['super usuario'] = TRUE; 
	 
	 $_SESSION['id_user'] = $id;
	 $_SESSION['password'] = $password;
 	 $_SESSION['nombre_ini'] = $nom;
  	 $_SESSION['unidad_ini'] = $unidad_db;
   	 $_SESSION['id_unidad'] = $id_unidad;

   	 $_SESSION['cargo'] = $cargo;
	 /////////////////////////////
	 //BUSCAMOS LA EXISTENIA DE LA SESION
/*	 $sql ="SELECT online FROM user WHERE id_unidad = '$id_unidad' and id_user = '$id'";
	 $res = mysql_query($sql) or die ("Error de búsqueda en la BD: ". mysql_Error());			
	 $num = mysql_num_rows($res);
	 if($num > 0)
	 {
	 	 $filas = mysql_fetch_array($res);
		 $online = $filas['online'];
		 if($online != 0)
		 {
//			echo 'El usuario ya inicio otra sesion';
		 	//header("Location: close_last_session.php");
			header("Location: close_sesion.php");
		 }
	 }*/
	 /////////////////////////////
 	 $ultimo_clic = time(); 
	 $ultimo_clic.'</h1>';
	 $query=mysql_query("UPDATE user SET online='$ultimo_clic' WHERE id_user='$id'"); 
	 header("location: reporte.php");
   } 
else 
   { 
?>  
<html>
<head>
<title>Chasqui Digital</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<LINK href="../javascript/estilos.css" type=text/css rel=stylesheet>
<link href="../javascript/estilo_noticias.css" rel="stylesheet" type="text/css" />
<SCRIPT language=JavaScript src="../javascript/fecha-hora_bc.js"></SCRIPT>
<script language=JavaScript src="../javascript/generador_noticias.js"></script>
<SCRIPT language=javascript src="../javascript/barra_de_estado.js"></SCRIPT>
<SCRIPT language=JavaScript src="../javascript/contador.js"></SCRIPT>
<script type="text/javascript" src="../Sothink DHTML Menu/Resource/js/stmenu.js"></script>
</head>
<body bottommargin="0" leftmargin="0" rightmargin="0" topmargin="0" bgcolor="#EDF7FF" onload=escrolea() oncontextmenu="return false">
<table width="780" border="0" align="center" cellspacing="0">
  <tr>
    <td width="270" height="28" bordercolor="0" background="../img/umsa_banner1.GIF"><div align="left"></div></td>
    <td width="510" height="28" bordercolor="0" background="../img/fondo_banner_rojo1.gif"><div align="right" class="Estilo13">
	<strong><font color="#ffffff">
      <SCRIPT>today();</SCRIPT></font>
    </strong></div></td>
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
                  <td width="197"><span class="Estilo21"> <a href="mailto: hemeroteca@correo.umsa.bo" class="Estilo10"><span class="Estilo21">E-mail: fcpn@yahoo.es</span></a></span></td>
                </tr>
              </table></td>
            </tr>
        </table></td>
        <td width="150" height="21" background="../img/fondo_der1.gif">&nbsp;</td>
      </tr>      
	    </table>    </td>
  </tr>
  <tr>
    <td height="248" colspan="2"><table width="780" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td width="132" height="246" bgcolor="#8fb1d2">
			<form name="form1" method="post" action="autenticacion.php">
                <table width="132" height="200" border="0" align="center" cellpadding="0" cellspacing="0">
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
                        <tr>
                          <td></td>
                        </tr>
                        <tr>
                          <td>&nbsp;</td>
                        </tr>
                    </table></td>
                  </tr>
                </table>
              </form>
            </td>
            <td width="498" rowspan="3"><div align="center">
              <table width="498" height="246" border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td width="2">&nbsp;</td>
                  <td width="494" bgcolor="#336699"><div align="center">
                    <table width="490" height="246" border="2" align="center" cellpadding="0" cellspacing="0" bordercolor="#8fb1d2">
                      <tr>
                        <td background="../img/fondo_cuerpo.gif" class="Estilo77"><center>
                            <strong>Lo sentimos... <br>
                              <br>
                              Usted ha ingresado datos incorrectos en Usuario y/o Password. </strong><br />
                          <br />
                            Volver a Intentar<br/>
                        </center></td>
                      </tr>
                    </table>
                  </div></td>
                  <td width="2">&nbsp;</td>
                </tr>
              </table>
            </div></td>
            <td width="150" rowspan="3" bgcolor="#8fb1d2"><table width="146" border="0" align="center" cellpadding="0" cellspacing="2">
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
                      <td>
                          <script>escribe()</script>
                      </td>
                    </tr>
                </table></td>
              </tr>
              <tr>
                <td><table width="146" height="91" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#8fb1d2">
                    <tr>
                      <td width="143" height="28" background="../img/fondo_cuerpo.gif" bgcolor="#336699"><div align="center"><img src="../img/razon1 copy.gif" width="90" height="26" border="0" usemap="#Map2MapMapMapMapMapMapMapMap"></div></td>
                    </tr>
                    <tr>
                      <td background="../img/fondo_cuerpo.gif" bgcolor="#336699"><div align="center"><img src="../img/diario1.gif" width="90" height="22" border="0" usemap="#Map3MapMapMapMapMapMapMapMap"></div></td>
                    </tr>
                    <tr>
                      <td background="../img/fondo_cuerpo.gif" bgcolor="#336699"><p align="center"><img src="../img/prensa1.gif" width="91" height="24" border="0" usemap="#Map4MapMapMapMapMapMapMapMap"></p></td>
                    </tr>
                  </table>
                    <map name="Map2MapMapMapMapMapMapMapMap">
                      <area shape="rect" coords="0,-1,94,26" href="http://www.la-razon.com" target="http://www.la-razon.com" alt="Peri&oacute;dico La Raz&oacute;n">
                    </map>
                    <map name="Map3MapMapMapMapMapMapMapMap">
                      <area shape="rect" coords="-2,2,88,21" href="http://www.eldiario.net" target="http://www.eldiario.net" alt="Peri&oacute;dico El diario">
                  </map></td>
              </tr>
            </table>
           </td>
          </tr>                 
    </table></td>
  </tr>
  <tr>
    <td colspan="2">
      <table width="780" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td><table width="780" height="21" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td width="132" height="21" background="../img/fondo_izq1.gif"><div align="center"><strong><span class="Estilo22">Visitantes</span></strong></div></td>
              <td width="498"><div align="center">
                <table width="490" height="21" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                    <td width="28" background="../img/fondo_encabezado_grande_01.gif">&nbsp;</td>
                    <td width="85" background="../img/fondo_encabezado_grande_02.gif">&nbsp;</td>
                    <td width="264" background="../img/fondo_encabezado_grande_03.gif"><div align="center" class="Estilo17">&Uacute;ltimas Adquicisiones</div></td>
                    <td width="83" background="../img/fondo_encabezado_grande_04.gif">&nbsp;</td>
                    <td width="30" background="../img/fondo_encabezado_grande_05.gif">&nbsp;</td>
                  </tr>
                </table>
              </div></td>
              <td width="150" background="../img/fondo_der3.gif"><div align="center" class="Estilo17">Novedades</div></td>
            </tr>
          </table></td>
        </tr>
        <tr>
		<tr> <td height="1"></td>		</tr>
          <td><table width="780" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td width="132" height="90" bgcolor="#8fb1d2"><table width="132" height="108" border="2" align="center" cellpadding="0" cellspacing="0" bordercolor="#8fb1d2" bgcolor="#336699">
                <tr>
                  <td height="68"><SCRIPT>
document.write("<div class='Estilo13'><font color='#ffffff'><center><strong>Usted ha visitado nuestra Página <b><br>" + amt() + "</b> veces.<br> Gracias...!</strong></center></font></div>")
</SCRIPT>			</td>
                </tr>
                <tr>
                  <td background="../img/fondo_cuerpo.gif" bgcolor="#8fb1d2"><div align="center"><img src="../img/google copy.gif" alt="B&uacute;squeda en Google" width="80" height="26" border="0" usemap="#Map"></div></td>
                </tr>
                
              </table></td>
              <td width="4">&nbsp;</td>
              <td width="490" bgcolor="#8fb1d2"><div align="center"><marquee width="484" height="110">
                
                  <table width="486" border="2" align="center" cellpadding="0" cellspacing="0" bordercolor="#336699">
                    <tr>
                      <td><img src="../img/novedades/3.jpg" width="89" height="106"></td>
                      <td><img src="../img/novedades/4.jpg" width="125" height="106"></td>
                      <td><img src="../img/novedades/5.jpg" width="110" height="106"></td>
                      <td><img src="../img/novedades/2.jpg" width="112" height="106"></td>
                      <td><img src="../img/novedades/1.jpg" width="105" height="106"></td>
                      <td><img src="../img/novedades/6.jpg" width="85" height="106"></td>
                    </tr>
                  </table>
              </marquee></div>              </td>
              <td width="4">&nbsp;</td>
              <td width="150" bgcolor="#8fb1d2"><table width="150" height="111" border="2" align="center" cellpadding="0" cellspacing="0" bordercolor="#8fb1d2" bgcolor="#336699">
                <tr>
                  <td>                  <div align="center"><img src="../img/novedades.GIF" width="105" height="112"></div></td>
                </tr>
                
              </table></td>
            </tr>
          </table></td>
        </tr>
      </table>    </td>
  </tr>
  <tr>
    <td height="22" colspan="2"><table width="780" height="20" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="15" height="20"><img src="../img/No_fondo1.gif" width="15" height="20"></td>
        <td width="750" background="../img/No_fondo2.gif">&nbsp;</td>
        <td width="15"><img src="../img/No_fondo3.gif" width="15" height="20"></td>
      </tr>
    </table></td>
  </tr>
</table>

<map name="Map">
  <area shape="rect" coords="0,1,85,31" href="#http://www.google.com" alt="B&uacute;squeda en Google">
</map>
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
<?
} 
?>