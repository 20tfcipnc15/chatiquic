<?php
session_start();
if (!isset($_SESSION['paso_por_donde_yo_quiero']))
{ 
	header ("Location: index.php"); 
	exit; 
} 
$id_user=$_SESSION['id_user'];
$nombre=$_SESSION['nombre']; 
$unidad=$_SESSION['unidad']; 
$id_unidad=$_SESSION['id_unidad']; 
include("../funciones1.php");
include("../php/funciones.php");
$link=conexion();
$rut = $_GET['reg'];
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
              <td width="133"><table style="position:absolute; top:171px; left:4px; width: 129px; height: 137px;"width="132" height="240" border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td width="132" height="92"><script src="admin/menu_admin.js"></script></td>
                </tr>
              </table></td>
              <td width="717" bgcolor="#EDF7FF"><table width="711" height="246" border="2" align="center" cellpadding="0" cellspacing="0" bordercolor="#8fb1d2">
                <tr>
                  <td width="705" background="img/fondo_cuerpo.gif"><span class="Estilo77">&nbsp;&nbsp;&nbsp;&nbsp;Unidad: <?php echo $unidad;?><br>
  &nbsp;&nbsp;&nbsp;&nbsp;Usuario: <? echo $nombre; ?></span><br>
                    <center><br>
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
                                  <td width="89" height="15" bgcolor="#4791C5" class="Estilo2"><div align="center">Fecha Ingreso </div></td>
                                  <td width="84" bgcolor="#4791C5"><div align="center" class="Estilo2">Procedencia</div></td>
                                  <td width="65" bgcolor="#4791C5"><div align="center" class="Estilo2">Tipo de Tr&aacute;mite </div></td>
                                  <td width="70" bgcolor="#4791C5" class="Estilo2"><div align="center">Reg. Ext. </div></td>
                                  <td width="122" bgcolor="#4791C5"><div align="center" class="Estilo2">Referencias</div></td>
                                  <td width="37" bgcolor="#4791C5"><div align="center" class="Estilo2">Fojas</div></td>
                                  <td width="69" bgcolor="#4791C5"><div align="center" class="Estilo2">Destino</div></td>
								  <td width="103" bgcolor="#4791C5"><div align="center" class="Estilo2">Recibido por</div></td>
                                </tr>
<?
	    $i=0;
		$sql = "SELECT * FROM correspondencia WHERE rut like '$rut' order by id_c ASC";
		$res = mysql_query($sql) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
		$vec = mysql_fetch_array($res);
		$filas = mysql_num_rows($res);
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
		
		//almacenasmos la fecha inicial
		$fecha_inicial = $fecha1;
	  ?>
                              <tr>
                                <td width="39" height="15" bgcolor="#E1F1FF" class="Estilo78"><div align="center"><? echo $rut;?></div></td>
                                  <td width="89" height="15" bgcolor="#E1F1FF" class="Estilo78"><div align="center"><? echo $fecha1;?></div></td>
                                  <td width="84" bgcolor="#E1F1FF"><div align="center"><span class="Estilo78"><? echo $unidad;?></span></div></td>
                                  <td width="65" bgcolor="#E1F1FF"><div align="center"><span class="Estilo78"><? echo $tipo;?></span></div></td>
                                  <td width="70" bgcolor="#E1F1FF"><div align="center"><span class="Estilo78"><? echo $correlativo;?></span></div></td>
  <? echo' <td width="170" height="50" bgcolor="#E1F1FF"><center><table width="166" height="50"><tr><td><div align="left" class="Estilo78">';
														 echo $referencias;
														 echo'</div></td></tr></table></center></td>'; ?>
                                <td width="122" bgcolor="#E1F1FF"><div align="center"><span class="Estilo78"><? echo $fojas;?></span></div></td>
                                  <td width="37" bgcolor="#E1F1FF"><div align="center"><span class="Estilo78"><? echo $destino;?></span></div></td>
							      <td width="69" bgcolor="#E1F1FF"><div align="center"><span class="Estilo78"><? echo $responsable; 
$i++; ?>
								</span></div></td>
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
                  </center></td></tr>
              </table></td>
              <td width="150" bgcolor="#8fb1d2">&nbsp;</td>
            </tr>
        </table></td>
        </tr>
    </table>
      </td>
  </tr>
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
/*$sql = "SELECT * FROM correspondencia WHERE rut like '$rut' order by id_c ASC";
		$res = mysql_query($sql) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());*/
	//	$vec = mysql_fetch_array($res);
//		$filas = mysql_num_rows($res);
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
//			if ($i == 3 || $i == 2)*/
				$id_c = $id_c - 1;
			$sql2 = "SELECT fecha FROM recibido WHERE id_c = '$id_c'";
			$res2 = mysql_query($sql2) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
			$vec2 = mysql_fetch_array($res2);
			$fecha_ingreso = $vec2["fecha"];

/*			if($i==2)
				$fecha_ingreso=$fecha1;*/
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
			echo $fecha;
			echo'</center></td>
			<td height="25" bgcolor="#E1F1FF" class="Estilo78"><center>';
			echo $destino;
			echo'</center></td>
			<td height="25" bgcolor="#E1F1FF" class="Estilo78"><center>';
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
            </table>
		<?
			  if($filas == $i)
		{	
			$sub = ':';
			$var = strpos($comentario,$sub);
			$estado = substr($comentario,0,$var);
			if($estado == 'Concluido')
			{	include ('tiempo_tramite.php');
				$fecha_final = $fecha;
	   ?>
              <table width="370" height="70" border="0" cellpadding="2" cellspacing="2" bgcolor="#E1F1FF">
                <tr>
                  <td class="Estilo77"> Fecha inicial del Trámite: <? echo $fecha_inicial;?></td>
                </tr>
				<tr>
                  <td class="Estilo77"> Fecha final del Trámite: <? echo $fecha_final;?></td>
                </tr>
				<tr>
                  <td class="Estilo77"> Tiempo Total de Duraci&oacute;n: <? $total = tiempo_tramite($fecha_inicial,$fecha_final);?></td>
                </tr>
              </table> <? } }?>
              </td>
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