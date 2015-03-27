<?php
session_start();
if (!isset($_SESSION['habilitado']))
{ 
	header ("Location: index.php"); 
	exit; 
} 

include("funciones2.php");
$link=conexion2();
//$ref = $_GET['reg'];

$valor = $_GET['reg'];
$sub = '**';
$var = strpos($valor,$sub);
$rut1 = substr($valor,0,$var);
$ref = substr($valor,$var+2,strlen($valor));
?>
<head>
<title>Chasqui Digital</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<LINK href="javascript/estilos.css" type=text/css rel=stylesheet>
<LINK href="javascript/estilo_noticias.css" type=text/css rel=stylesheet>
<SCRIPT language=JavaScript src="javascript/fecha-hora_bc.js"></SCRIPT>
<SCRIPT language=javascript src="javascript/barra_de_estado.js"></SCRIPT>
<script language=JavaScript src="javascript/generador_noticias.js"></script>
<SCRIPT language=JavaScript src="fecha-hora_bc.js"></SCRIPT>
<script type="text/javascript" src="../Sothink DHTML Menu/Resource/js/stmenu.js"></script>
<style type="text/css">
<!--
.Estilo88 {font-size: 9px}
.Estilo90 {	font-size: 9px;
	font-family: Arial, Helvetica, sans-serif;
}
-->
</style>
</head>
<body bottommargin="0" leftmargin="0" rightmargin="0" topmargin="0" bgcolor="#EDF7FF" onload=escrolea() oncontextmenu="return false">
<table style="position:absolute;" width="1000" border="0" align="center" cellspacing="0">
  <tr>
    <td width="270" height="28" bordercolor="0" background="img/umsa_banner1.GIF"><div align="left"></div></td>
    <td width="710" height="28" bordercolor="0" background="img/fondo_banner_rojo1.gif"><div align="right" class="Estilo13">
	<strong><font color="#ffffff">
    <SCRIPT>today();</SCRIPT></font>    </strong></div></td>
  </tr>
  <tr>
    <td height="4" colspan="2" background="img/fondo_delgado.gif"><img src="../img/fondo_delgado.gif" width="2" height="4"></td>
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
        <td  width="700" colspan="3"><table width="700" height="21" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td width="3" height="21"><a href="mailto: hemeroteca@correo.umsa.bo" class="Estilo10"><span class="Estilo21">&nbsp;</span></a></td>
            <td width="661" height="21" background="img/fondo_cuerpo.gif" bgcolor="#8fb1d2"><table width="420" border="0" align="center" cellpadding="0" cellspacing="0" heigth="21">
                <tr>
                  <td width="191"><span class="Estilo10 Estilo20">&nbsp;<span class="Estilo21">Monoblok Central, Avenida Villazon N&deg; 1995</span></span></td>
                  <td width="32"><div align="center"><img src="img/correo.gif" width="21" height="21"></div></td>
                  <td width="197"><span class="Estilo21 Estilo90"> <a href="mailto: hemeroteca@correo.umsa.bo" class="Estilo21">E-mail: dec_fcpn@yahoo.es</a></span></td>
                </tr>
            </table></td>
            <td width="21" height="21" background="img/fondo_cuerpo.gif" bgcolor="#8fb1d2" class="Estilo37"><a href="close_sesion.php">Salir</a></td>
            <td width="3" height="21">&nbsp;</td>
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
              <td width="133"><table style="position:absolute;top:156px;left:4px;" width="132" height="250" border="0" cellpadding="0" cellspacing="0" align="center">
                <tr height="117">
                  <td><table width="132" height="200" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td height="2"></td>
                      </tr>
                      <tr>
                        <td><div align="center">
                            <script src="javascript/menu_usu.js"></script>
                        </div></td>
                      </tr>
                      <tr>
                        <td><form name="form1" method="post" action="verif_usu.php">
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
                        </form></td>
                      </tr>
                  </table></td>
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
                                <td width="37" height="15" bgcolor="#4791C5" class="Estilo2"><div align="center">R.U.T.</div></td>
                                <td width="77" height="15" bgcolor="#4791C5" class="Estilo2"><div align="center">Fecha</div></td>
                                <td width="80" bgcolor="#4791C5"><div align="center" class="Estilo2">Procedencia</div></td>
                                <td width="90" bgcolor="#4791C5"><div align="center" class="Estilo2">Tipo de Tr&aacute;mite </div></td>
                                <td width="85" bgcolor="#4791C5" class="Estilo2"><div align="center">Reg. Ext. </div></td>
								<td width="95" bgcolor="#4791C5" class="Estilo2"><div align="center">Hoja Ruta </div></td>
                                <td width="166" bgcolor="#4791C5"><div align="center" class="Estilo2">Referencias</div></td>
                                <td width="50" bgcolor="#4791C5"><div align="center" class="Estilo2">Fojas</div></td>
                                </tr>
<?
$sql ="SELECT referencias FROM correspondencia WHERE rut like '$rut1' and id_c ='$ref' ORDER BY id_c ASC";
$res = mysql_query($sql) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
$filas = mysql_num_rows($res);
$vec = mysql_fetch_array($res);
		
$referencias1 = $vec["referencias"];

$i=0;

$sql ="SELECT * FROM correspondencia WHERE rut like '$rut1' and referencias like '$referencias1' ORDER BY id_c ASC";
$res = mysql_query($sql) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
$filas = mysql_num_rows($res);
$vec = mysql_fetch_array($res);
		
$unidad = $vec["unidad"];
$destino = $vec["destino"];
$id_c1=$vec["id_c"];
$rut=$vec["rut"]; 
$hoja_ruta=$vec["hoja_ruta"];
$correlativo=$vec["correlativo"];
$responsable=$vec["responsable"];
$fecha1=$vec["fecha"];
$tipo=$vec["tipo"];
$referencias=$vec["referencias"];
$fojas=$vec["fojas"];
		
//almacenamos la fecha inicial
$fecha_inicial = $fecha1;
?>
                              <tr>
                                <td width="37" height="15" bgcolor="#E1F1FF" class="Estilo78"><div align="center"><? echo $rut;?></div></td>
                                <td width="77" height="15" bgcolor="#E1F1FF" class="Estilo78"><div align="center"><? echo $fecha1;?></div></td>
                                <td width="80" bgcolor="#E1F1FF"><div align="center"><span class="Estilo78"><? echo $unidad;?></span></div></td>
                                <td width="90" bgcolor="#E1F1FF"><div align="center"><span class="Estilo78"><? echo $tipo;?></span></div></td>
                                <td width="85" bgcolor="#E1F1FF"><div align="center"><span class="Estilo78"><? echo $correlativo;?></span></div></td>
								<td width="95" bgcolor="#E1F1FF"><div align="center"><span class="Estilo78"><? echo $hoja_ruta;?></span></div></td>
								<td width="166" height="50" bgcolor="#E1F1FF"><center>
									<table width="166" height="50"><tr><td>
									<div align="left" class="Estilo78">
									<? echo $referencias; ?>
									</div></td></tr>
									</table></center></td>
								<td width="50" bgcolor="#E1F1FF"><div align="center"><span class="Estilo78"><? echo $fojas; $i++;
								?></span></div></td>
                                </tr>
                              <tr>
                                <td height="7" colspan="8" bgcolor="#CCDDEE" class="Estilo78"></td>
                              </tr>
                              <tr>
                                <td height="15" colspan="8" class="Estilo78"></td>
                              </tr>
                            </table></td>
                          </tr>
                          <tr>
                            <td height="1" bgcolor="#74ABD3"></td>
                          </tr>
                          </table>
                  </center></td></tr>
              </table></td>
              <td width="150" bgcolor="#8fb1d2" class="Estilo77"><? // include('online.php')?>
                <table style="position:absolute;top:170px;left:851px;" width="146" border="0" align="center" cellpadding="0" cellspacing="2">
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
                    <td><table width="146" height="61" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#8fb1d2">
                        <tr>
                          <td width="143" height="28" background="img/fondo_cuerpo.gif" bgcolor="#336699"><div align="center"><img src="img/razon1 copy.gif" width="90" height="26" border="0" usemap="#Map2MapMapMapMapMapMapMapMap"></div></td>
                        </tr>
                        <tr>
                          <td background="img/fondo_cuerpo.gif" bgcolor="#336699"><div align="center"><img src="img/diario1.gif" width="90" height="22" border="0" usemap="#Map3MapMapMapMapMapMapMapMap"></div></td>
                        </tr>
                      </table>
                        <map name="Map2MapMapMapMapMapMapMapMap">
                          <area shape="rect" coords="0,1,94,28" href="http://www.la-razon.com" target="http://www.la-razon.com" alt="Peri&oacute;dico La Raz&oacute;n">
                        </map>
                        <map name="Map3MapMapMapMapMapMapMapMap">
                          <area shape="rect" coords="-1,2,89,21" href="http://www.eldiario.net" target="http://www.eldiario.net" alt="Peri&oacute;dico El diario">
                      </map></td>
                  </tr>
                </table></td>
            </tr>
        </table></td>
        </tr>
    </table>
    </td>
  </tr>
  <tr>
    <td height="22" colspan="2"><table width="1000" height="60" border="0" cellpadding="0" cellspacing="0">
	  <tr>
        <td height="20"><table width="1000" border="0" cellpadding="0" cellspacing="0">
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
                  <td width="40" height="15" bgcolor="#4791C5" class="Estilo2"><div align="center">R.U.T.</div></td>
                  <td width="121" height="15" bgcolor="#4791C5" class="Estilo2"><div align="center">Fecha Ingreso </div></td>
                  <td width="110" bgcolor="#4791C5"><div align="center" class="Estilo2">Unidad</div></td>
                  <td width="115" bgcolor="#4791C5"><div align="center" class="Estilo2">Responsable</div>                    </td>
				  <td width="105" bgcolor="#4791C5"><div align="center" class="Estilo2">Reg. Externo</div></td>
				  <td width="69" bgcolor="#4791C5"><div align="center" class="Estilo2">Hoja Ruta</div></td>
                  <td width="137" bgcolor="#4791C5"><div align="center" class="Estilo2">Fecha de Salida </div></td>
                  <td width="148" bgcolor="#4791C5"><div align="center" class="Estilo2">Destino</div></td>
                  <td width="131" bgcolor="#4791C5"><div align="center" class="Estilo2">Comentarios</div></td>
                  </tr>
                <tr>
                  <td height="2" colspan="8" bgcolor="#8fb1d2" class="Estilo78"></td>
                  </tr>
<?
$filas = mysql_num_rows($res);
if($filas > 0)
{
	$bbb = $id_c1;
	while($vec = mysql_fetch_array($res))
	{	
		$id_c=$vec["id_c"];
		$rut=$vec["rut"]; 
		$tipo=$vec["tipo"];
		$fecha=$vec["fecha"];
		$unidad=$vec["unidad"];
		$destino=$vec["destino"];
		$hoja_ruta=$vec["hoja_ruta"];
		$comentario=$vec["comentario"];
		$correlativo=$vec['correlativo'];
		$referencias=$vec["referencias"];
		$responsable=$vec["responsable"];
		
		$aaa = $id_c;
		
		$sql2 = "SELECT fecha FROM recibido WHERE id_c = '$bbb' order by id_re desc limit 1";
	    $res2 = mysql_query($sql2) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
		$vec2 = mysql_fetch_array($res2);
		$fecha_ingreso = $vec2["fecha"];	
		if ($fecha_ingreso == 0)	
			$fecha_ingreso = $fecha;
		echo '
        <tr>
        <td height="25" bgcolor="#E1F1FF" class="Estilo78"><center>'; 
		echo $rut; 
		echo '</center></td>
        <td height="25" bgcolor="#E1F1FF" class="Estilo78"><center>'; 
		echo $fecha_ingreso; 
		echo '</center></td>
        <td height="25" bgcolor="#E1F1FF" class="Estilo78"><center>';
		echo $unidad;
		echo '</center></td>
        <td height="25" bgcolor="#E1F1FF" class="Estilo78"><center>';
		echo $responsable;
		echo '
		<td height="25" bgcolor="#E1F1FF" class="Estilo78"><center>';
		echo $correlativo;
		echo '	
		<td height="25" bgcolor="#E1F1FF" class="Estilo78"><center>';
		echo $hoja_ruta;
		echo '</center></td>';
		echo '	
		<td height="25" bgcolor="#E1F1FF" class="Estilo78"><center>';
		echo $fecha;
		echo '</center></td>
		<td height="25" bgcolor="#E1F1FF" class="Estilo78"><center>';
		echo $destino;
		echo '</center></td>
		<td height="25" bgcolor="#E1F1FF" class="Estilo78" align="left">'; ?>
	    <table width="142" height="25" border="0" align="left" class="Estilo78">
             <tr>
                <td><? echo  $comentario;?></td>
                </tr>
        </table>
<?		echo'</td>
        </tr>'; 
		$bbb = $aaa;
		$i++;
	}
?>
                <tr>
                  <td height="7" colspan="9" bgcolor="#CCDDEE" class="Estilo78"></td>
                </tr>
                <tr>
                  <td height="15" colspan="9" class="Estilo78"></td>
                </tr>
            </table>
		<?
		if($filas == $i)
		{	
			$sub = ':';
			$var = strpos($comentario,$sub);
			$estado = substr($comentario,0,$var);
			if($estado == 'Concluido')
			{	include ('admin/tiempo_tramite1.php');
				$fecha_final = $fecha;
	   ?>
              <table width="370" height="70" border="0" cellpadding="2" cellspacing="2" bgcolor="#E1F1FF">
                <tr>
                  <td colspan="2" class="Estilo77"> Fecha inicial del Trámite: 
					<? echo $fecha_inicial;?> Fecha final del Trámite:
					<? echo $fecha_final;?> Tiempo Total de Duraci&oacute;n:
					<? $total = tiempo_tramite($fecha_inicial,$fecha_final);?></td>
                  </tr>
              </table> 
<? 			} 
	  	 } 
}
?>              </td>
          </tr>
          <tr>
            <td height="1" bgcolor="#74ABD3"></td>
          </tr>
        </table></td>
        </tr>
	  <tr>
	    <td height="2"></td>
	    </tr>
	  <tr>
	    <td height="20"><table width="1000" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td width="15"><img src="img/No_fondo1.gif" alt="" width="15" height="20"></td>
            <td width="945" background="img/No_fondo2.gif">&nbsp;</td>
            <td width="16"><img src="img/No_fondo3.gif" alt="" width="15" height="20"></td>
          </tr>
        </table></td>
	    </tr>
    </table></td>
  </tr>
</table>
</body>
</html>