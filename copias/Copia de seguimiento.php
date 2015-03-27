<?php
session_start();
if (!isset($_SESSION['habilitado']))
{ 
	header ("Location: index.php"); 
	exit; 
} 
$responsable = $_SESSION['responsable'];
include("funciones1.php");
$link=conexion();
$rut = $_GET['rut'];
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
<script type="text/javascript" src="Sothink DHTML Menu/Resource/js/stmenu.js"></script>
</head>
<body bottommargin="0" leftmargin="0" rightmargin="0" topmargin="0" bgcolor="#EDF7FF" onload=escrolea() oncontextmenu="return false">
<table style="position:absolute;left:110px;" width="1000" border="0" align="center" cellspacing="0">
  <tr>
    <td width="270" height="28" bordercolor="0" background="img/umsa_banner1.GIF"><div align="left"></div></td>
    <td width="710" height="28" bordercolor="0" background="img/fondo_banner_rojo1.gif"><div align="right" class="Estilo13">
	<strong><font color="#ffffff">
    <SCRIPT>today();</SCRIPT></font>    </strong></div></td>
  </tr>
  <tr>
    <td height="4" colspan="2" background="img/fondo_delgado.gif"><img src="img/fondo_delgado.gif" width="2" height="4"></td>
  </tr>
  <tr>
    <td height="133" colspan="2"><table width="1000" height="131" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="132" height="110" background="img/encabezado_01.gif">
		<div align="center"><img src="img/umsa_escudo1.gif" width="54" height="106"></div>		</td>
        <td width="25"><img src="img/encabezado_03.gif" width="25" height="110"></td>
        <td width="665" background="img/encabezado_04.gif"><div align="center">
          <p><img src="img/chasqui_digital_azul2 copia.jpg" width="445" height="60"></p>
          </div></td>
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
                  <td width="197"><span class="Estilo21"> <a href="mailto: hemeroteca@correo.umsa.bo" class="Estilo10"><span class="Estilo21">E-mail: dec_fcpn@yahoo.es</span></a></span></td>
                </tr>
              </table></td>
            </tr>
        </table></td>
        <td width="150" height="21" background="img/fondo_der1.gif">&nbsp;</td>
      </tr>      
	    </table>    </td>
  </tr>
  <tr>
    <td height="248" colspan="2"><table width="133" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="133" height="246" bgcolor="#8fb1d2">
		<table width="1000" height="246" border="0" cellpadding="0" cellspacing="0" align="center">
            <tr height="117">
              <td width="133"><table style="position:absolute; top:170px; left:3px; height: 170px;" width="132" height="465" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td><script src="javascript/menu_usu.js"></script>
                    &nbsp;</td>
                </tr>
                <tr>
                  <td><form name="form1" method="post" action="nuevo/verif_usu.php">
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
                                    <input name="ci" type="password" class="Estilo21" id="usuario"size="15" onKeyPress="return solo_numeros(event)">
                                  </div>
                                    <div align="center"></div></td>
                              </tr>
                          </table></td>
                        </tr>
                        <tr>
                          <td height="7"><p align="center"><span class="Estilo2">C&oacute;digo de Nota </span></p></td>
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
                  </form></td>
                </tr>
              </table></td>
              <td width="717" bgcolor="#EDF7FF"><table width="711" height="246" border="2" align="center" cellpadding="0" cellspacing="0" bordercolor="#8fb1d2">
                <tr>
                  <td width="705" background="img/fondo_cuerpo.gif"><center>
                    <table width="700" border="0" cellpadding="0" cellspacing="0">
                        <tr>
                          <td width="29" height="21" background="img/encabezado_tabla_01.gif">&nbsp;</td>
                          <td width="642" background="img/encabezado_tabla_02.gif"><div align="center" class="Estilo59">DATOS GENERALES DEL TR&Aacute;MITE </div></td>
                          <td width="29" background="img/encabezado_tabla_04.gif">&nbsp;</td>
                        </tr>
                        <tr>
                          <td height="2" colspan="3"></td>
                        </tr>
                      </table>
                      <table width="700" border="0" cellpadding="0" cellspacing="2" bgcolor="#74ABD3">
                        <tr>
                          <td></td>
                        </tr>
                        <tr>
                          <td bgcolor="#B1CBE4"><table width="698" border="0" align="center" cellpadding="0" cellspacing="2" bordercolor="#EDF7FF">
                              <tr>
                                <td width="39" height="15" bgcolor="#4791C5" class="Estilo2"><div align="center">R.U.T.</div></td>
                                <td width="107" height="15" bgcolor="#4791C5" class="Estilo2"><div align="center">Fecha Ingreso </div></td>
                                <td width="83" bgcolor="#4791C5"><div align="center" class="Estilo2">Procedencia</div></td>
                                <td width="75" bgcolor="#4791C5"><div align="center" class="Estilo2">Tipo de Tr&aacute;mite </div></td>
                                <td width="63" bgcolor="#4791C5" class="Estilo2"><div align="center">Reg. Ext. </div></td>
                                <td width="133" bgcolor="#4791C5"><div align="center" class="Estilo2">Referencias</div></td>
                                <td width="39" bgcolor="#4791C5"><div align="center" class="Estilo2">Fojas</div></td>
                                <td width="59" bgcolor="#4791C5"><div align="center" class="Estilo2">Destino</div></td>
								<td width="80" bgcolor="#4791C5"><div align="center" class="Estilo2">Recibido por</div></td>
                              </tr>
      <? $i=0;
		$sql = "SELECT * FROM correspondencia WHERE rut like '$rut'";
		$res = mysql_query($sql) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
		$vec = mysql_fetch_array($res);
		
		$unidad = $vec["unidad"];
		$destino = $vec["destino"];
		$id_c=$vec["id_c"];
		$rut=$vec["rut"]; 
		$correlativo=$vec["correlativo"];
		$responsable=$vec["responsable"];
		$fecha1=$vec["fecha"];
		$tipo=$vec["tipo"];
		$referencias=$vec["referencias"];
		$fojas=$vec["fojas"];
		$hoja_ruta=$vec["hoja_ruta"];
	  ?>
                              <tr>
                                <td width="39" height="15" bgcolor="#E1F1FF" class="Estilo78"><div align="center"><? echo $rut;?></div></td>
                                <td width="107" height="15" bgcolor="#E1F1FF" class="Estilo78"><div align="center"><? echo $fecha1;?></div></td>
                                <td width="83" bgcolor="#E1F1FF"><div align="center"><span class="Estilo78"><? echo $unidad;?></span></div></td>
                                <td width="75" bgcolor="#E1F1FF"><div align="center"><span class="Estilo78"><? echo $tipo;?></span></div></td>
                                <td width="63" bgcolor="#E1F1FF"><div align="center"><span class="Estilo78"><? echo $correlativo;?></span></div></td>
<? /* echo' <td width="170" height="50" bgcolor="#E1F1FF"><center><table width="166" height="50"><tr><td><div align="left" class="Estilo78">';
														 echo $referencias;
														 echo'</div></td></tr></table></center></td>'; */?>
			  				 	<td width="133" bgcolor="#E1F1FF"><div align="center"><span class="Estilo78"><? echo $referencias;?></span></div></td>
                                <td width="39" bgcolor="#E1F1FF"><div align="center"><span class="Estilo78"><? echo $fojas;?></span></div></td>
                                <td width="59" bgcolor="#E1F1FF"><div align="center"><span class="Estilo78"><? echo $destino;?></span></div></td>
							    <td width="80" bgcolor="#E1F1FF"><div align="center"><span class="Estilo78"><? echo $responsable; 
								$i++;?></span></div></td>
								</tr>
                              <tr>
                                <td height="7" colspan="9" bgcolor="#CCDDEE" class="Estilo78"></td>
                              </tr>
                              <tr>
                                <td height="15" colspan="9" class="Estilo78"></td>
                              </tr>
                          </table></td>
                        </tr>
                        <tr>
                          <td height="1" bgcolor="#74ABD3"></td>
                        </tr>
                      </table>
                  </center></td>
                </tr>
              </table></td>
              <td width="150" bgcolor="#8fb1d2"><table width="146" border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td><table style="position:absolute;top:171px;left:854px;" bgcolor="#336699" width="144" border="0" cellpadding="0" cellspacing="2" align="center">
                      <tr>
                        <td><div align="center" class="Estilo18">Agradeciemientos</div></td>
                      </tr>
                  </table></td>
                </tr>
                <tr>
                  <td><div style="position:absolute;top:191px;left:854px;" class="Contenido_principal">
                      <table cellspacing=0 cellpadding=1 border=0 align="center">
                        <tr>
                          <td><div align="center">
                              <script>escribe()</script>
                          </div></td>
                        </tr>
                      </table>
                  </div></td>
                </tr>
                <tr>
                  <td>
				  <table style="position:absolute;top:318px;left:854px;" width="146" height="91" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#8fb1d2">
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
                        <area shape="rect" coords="0,-1,94,26" href="http://www.la-razon.com" target="http://www.la-razon.com" alt="Peri&oacute;dico La Raz&oacute;n">
                      </map>
                      <map name="Map3MapMapMapMapMapMapMapMap">
                        <area shape="rect" coords="-2,2,88,21" href="http://www.eldiario.net" target="http://www.eldiario.net" alt="Peri&oacute;dico El diario">
                      </map>
                      <map name="Map4MapMapMapMapMapMapMapMap">
                        <area shape="rect" coords="0,1,90,24" href="http://www.laprensa.com.bo" target="http://www.laprensa.com.bo" alt="Peri&oacute;dico La Prensa">
                    </map></td>
                </tr>
              </table></td>
            </tr>
        </table></td>
        </tr>
    </table>
      </td>
  </tr>
<!--  <tr>
    <td colspan="1"></td>
  </tr>-->
  <tr>
    <td height="22" colspan="2"><table width="1000" height="60" border="0" cellpadding="0" cellspacing="0">
	  <tr>
        <td height="20" colspan="3"><table width="1000" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td width="29" height="21" background="img/encabezado_tabla_01.gif">&nbsp;</td>
            <td width="942" background="img/encabezado_tabla_02.gif"><div align="center" class="Estilo59">SEGUIMIENTO DEL TR&Aacute;MITE </div></td>
            <td width="29" background="img/encabezado_tabla_04.gif">&nbsp;</td>
          </tr>
          <tr>
            <td height="2" colspan="3"></td>
          </tr>
        </table>
          <table width="1000" border="0" cellpadding="0" cellspacing="2" bgcolor="#74ABD3">
          <tr>
            <td></td>
          </tr>
          <tr>
            <td bgcolor="#B1CBE4"><table width="996" border="0" align="center" cellpadding="0" cellspacing="2" bordercolor="#EDF7FF">
                <tr>
                  <td width="43" height="15" bgcolor="#4791C5" class="Estilo2"><div align="center">R.U.T.</div></td>
                  <td width="116" height="15" bgcolor="#4791C5" class="Estilo2"><div align="center">Fecha Ingreso </div></td>
                  <td width="140" bgcolor="#4791C5"><div align="center" class="Estilo2">Unidad</div></td>
                  <td width="122" bgcolor="#4791C5"><div align="center" class="Estilo2">Responsable</div>                    </td>
				  <td width="92" bgcolor="#4791C5"><div align="center" class="Estilo2">Reg. Externo</div></td>
                  <td width="210" bgcolor="#4791C5"><div align="center" class="Estilo2">Fecha de Salida </div></td>
                  <td width="140" bgcolor="#4791C5"><div align="center" class="Estilo2">Detino</div></td>
                  <td width="115" bgcolor="#4791C5"><div align="center" class="Estilo2">Comentarios</div></td>
                  </tr>
                <tr>
                  <td height="2" colspan="7" bgcolor="#8fb1d2" class="Estilo78"></td>
                  </tr>
                <?
		while($vec = mysql_fetch_array($res))
		{	
			$id_c=$vec["id_c"];
			$rut=$vec["rut"]; 
			$responsable=$vec["responsable"];
			$fecha=$vec["fecha"];
			$tipo=$vec["tipo"];
			$referencias=$vec["referencias"];
			$destino=$vec["destino"];
			$unidad=$vec["unidad"];
			$comentario=$vec['comentario'];
			$i++;
			$sql2 = "SELECT fecha FROM recibido WHERE id_c = '$id_c'";
			$res2 = mysql_query($sql2) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
			$vec2 = mysql_fetch_array($res2);
			$fecha_ingreso = $vec2["fecha"];

			if($i==2)
				$fecha_ingreso=$fecha1;
			echo '
            <tr>
            <td height="50" bgcolor="#E1F1FF" class="Estilo78"><center>'; 
			echo $rut; 
			echo '</center></td>
            <td height="50" bgcolor="#E1F1FF" class="Estilo78"><center>'; 
			echo $fecha_ingreso; 
			echo '</center></td>
            <td height="50" bgcolor="#E1F1FF" class="Estilo78"><center>';
			echo $unidad;
			echo '</center></td>
            <td height="50" bgcolor="#E1F1FF" class="Estilo78"><center>';
			echo $responsable;
			echo '	
			<td height="50" bgcolor="#E1F1FF" class="Estilo78"><center>';
			echo $correlativo;
			echo '	
			<td height="50" bgcolor="#E1F1FF" class="Estilo78"><center>';
			echo $fecha;
			echo'</center></td>
			<td height="50" bgcolor="#E1F1FF" class="Estilo78"><center>';
			echo $destino;
			echo'</center></td>
			<td height="50" bgcolor="#E1F1FF" class="Estilo78"><center>';
			echo $comentario;
			echo'</center></td>
            </tr>';
		 }
	   ?>
                <tr>
                  <td height="7" colspan="9" bgcolor="#CCDDEE" class="Estilo78"></td>
                </tr>
                <tr>
                  <td height="15" colspan="9" class="Estilo78"></td>
                </tr>
            </table></td>
          </tr>
          <tr>
            <td height="1" bgcolor="#74ABD3"></td>
          </tr>
        </table></td>
        </tr>
	  <tr>
	    <td height="2" colspan="3"></td>
	    </tr>
	  <tr>
	    <td width="15" height="20"><img src="img/No_fondo1.gif" width="15" height="20"></td>
	    <td width="970" height="20" background="img/No_fondo2.gif"></td>
	    <td width="15"><img src="img/No_fondo3.gif" width="15" height="20"></td>
	    </tr>
    </table></td>
  </tr>
</table>
</body>
</html>