<?php
session_start();
if (!isset($_SESSION['administrador']))
{
	header ("Location: index.php");
	exit;
}
$id_user=$_SESSION['id_user'];
$nombre1=$_SESSION['nombre_ini'];
$unidad1=$_SESSION['unidad_ini'];
$id_unidad=$_SESSION['id_unidad'];

include("../funciones1.php");
$link=conexion();

$id_c = $_POST['id_c'];

$rut = $_POST['rut'];
$unidad = $_POST['unidad'];
$fecha = $_POST['fecha'];
$correlativo= $_POST['correlativo'];
$hoja_ruta = $_POST['hoja_ruta'];
$tipo = $_POST['tipo'];
$referencias = $_POST['referencias'];
$referencias_old = $_POST['referencias_old'];
$fojas = $_POST['fojas'];
$responsable = $_POST['responsable'];
$destino = $_POST['destino'];
$comentario = $_POST['comentario'];
$ip = $_POST['ip'];
$estado = $_POST['estado'];
$sw = $_POST['sw'];

echo 'aleida'.$referencias_old;

if($rut!=null)
{
   	$consulta ="UPDATE correspondencia SET rut = '$rut' WHERE id_c= '$id_c'";
	$resultado=mysql_query($consulta) or die ("Error de b�squeda en la BD: ". mysql_Error());
}
if($unidad!=null)
{
	$consulta ="UPDATE correspondencia SET unidad = '$unidad' WHERE id_c= '$id_c'";
	$resultado=mysql_query($consulta) or die ("Error de b�squeda en la BD: ". mysql_Error());
}
if($fecha!=null)
{
	$consulta ="UPDATE correspondencia SET fecha = '$fecha' WHERE id_c= '$id_c'";
	$resultado=mysql_query($consulta) or die ("Error de b�squeda en la BD: ". mysql_Error());
}
if($correlativo!=null)
{
	$consulta ="UPDATE correspondencia SET correlativo = '$correlativo' WHERE id_c= '$id_c'";
	$resultado=mysql_query($consulta) or die ("Error de b�squeda en la BD: ". mysql_Error());
}
if($hoja_ruta!=null)
{
	$consulta ="UPDATE correspondencia SET hoja_ruta = '$hoja_ruta' WHERE id_c= '$id_c'";
	$resultado=mysql_query($consulta) or die ("Error de b�squeda en la BD: ". mysql_Error());
}
if($tipo!=null)
{
	$consulta ="UPDATE correspondencia SET tipo = '$tipo' WHERE id_c= '$id_c'";
	$resultado=mysql_query($consulta) or die ("Error de b�squeda en la BD: ". mysql_Error());
}
if($referencias!=null)
{
	$consulta ="UPDATE correspondencia SET referencias = '$referencias' WHERE referencias like '$referencias_old'";
	$resultado=mysql_query($consulta) or die ("Error de b�squeda en la BD: ". mysql_Error());
}
if($destino!=null)
{
	$consulta ="UPDATE correspondencia SET destino = '$destino' WHERE id_c= '$id_c'";
	$resultado=mysql_query($consulta) or die ("Error de b�squeda en la BD: ". mysql_Error());
}
if($comentario!=null)
{
	$consulta ="UPDATE correspondencia SET comentario = '$comentario' WHERE id_c= '$id_c'";
	$resultado=mysql_query($consulta) or die ("Error de b�squeda en la BD: ". mysql_Error());
}
if($fojas!=null)
{
	$consulta ="UPDATE correspondencia SET fojas = '$fojas' WHERE id_c= '$id_c'";
	$resultado=mysql_query($consulta) or die ("Error de b�squeda en la BD: ". mysql_Error());
}
if($ip!=null)
{
	$consulta ="UPDATE correspondencia SET ip = '$ip' WHERE id_c= '$id_c'";
	$resultado=mysql_query($consulta) or die ("Error de b�squeda en la BD: ". mysql_Error());
}
if($estado!=null)
{
	$consulta ="UPDATE correspondencia SET estado = '$estado' WHERE id_c= '$id_c'";
	$resultado=mysql_query($consulta) or die ("Error de b�squeda en la BD: ". mysql_Error());
}
if($sw!=null)
{
	$consulta ="UPDATE correspondencia SET sw = '$sw' WHERE id_c= '$id_c'";
	$resultado=mysql_query($consulta) or die ("Error de b�squeda en la BD: ". mysql_Error());
}

//Desplegamos por pantalla el registro modificado
$consulta = "SELECT * FROM correspondencia where id_c= '$id_c'";
$resultado = mysql_query($consulta) or die ("Error de b�squeda en la BD: ". mysql_Error());
$linea=mysql_fetch_array($resultado);

$rut = $linea['rut'];
$unidad = $linea['unidad'];
$fecha = $linea['fecha'];
$correlativo= $linea['correlativo'];
$hoja_ruta = $linea['hoja_ruta'];
$tipo = $linea['tipo'];
$referencias = $linea['referencias'];
$fojas = $linea['fojas'];
$responsable = $linea['responsable'];
$destino = $linea['destino'];
$comentario = $linea['comentario'];
$ip = $linea['ip'];
$estado = $linea['estado'];
$sw = $linea['sw'];
?>
<html>
<head>
<title>Chasqui Digital</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<LINK href="../javascript/estilos.css" type=text/css rel=stylesheet>
<LINK href="../javascript/estilo_noticias.css" type=text/css rel=stylesheet>
<SCRIPT language=JavaScript src="../javascript/fecha-hora_bc.js"></SCRIPT>
<SCRIPT language=javascript src="../javascript/barra_de_estado.js"></SCRIPT>
<script language=JavaScript src="../javascript/generador_noticias.js"></script>
<SCRIPT language=JavaScript src="../fecha-hora_bc.js"></SCRIPT>
<script type="text/javascript" src="../Sothink DHTML Menu/Resource/js/stmenu.js"></script>
</head>
<body bottommargin="0" leftmargin="0" rightmargin="0" topmargin="0" bgcolor="#EDF7FF" onload=escrolea() oncontextmenu="return false">
<table width="1000" border="0" cellspacing="0">
  <tr>
    <td width="270" height="28" bordercolor="0" background="../img/umsa_banner1.GIF"><div align="left"></div></td>
    <td width="730" height="28" bordercolor="0" background="../img/fondo_banner_rojo1.gif"><div align="right" class="Estilo13">
	<strong><font color="#ffffff">
    <SCRIPT>today();</SCRIPT></font>    </strong></div></td>
  </tr>
  <tr>
    <td height="4" colspan="2" background="../img/fondo_delgado.gif"><img src="../img/fondo_delgado.gif" width="2" height="4"></td>
  </tr>
  <tr>
    <td height="133" colspan="2"><table width="1000" height="131" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="132" height="110" background="../img/encabezado_01.gif">
		<div align="center"><img src="../img/umsa_escudo1.gif" width="54" height="106"></div>		</td>
        <td width="25"><img src="../img/encabezado_03.gif" width="25" height="110"></td>
        <td width="665" background="../img/encabezado_04.gif"><div align="center">
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
    <td height="248" colspan="2"><table width="133" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="133" height="246" bgcolor="#8fb1d2">
		<table width="1000" height="246" border="0" cellpadding="0" cellspacing="0" align="center">
            <tr height="117">
              <td width="133"><table style="position:absolute; top:171px; left:2px; width: 129px; height: 137px;"width="132" height="240" border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td width="132" height="92"><script src="menu_sp.js"></script></td>
                </tr>
              </table></td>
              <td width="717" bgcolor="#EDF7FF"><table width="711" height="246" border="2" align="center" cellpadding="0" cellspacing="0" bordercolor="#8fb1d2">
                <tr>
                  <td width="705" background="../img/fondo_cuerpo.gif"><br><p><span class="Estilo77">&nbsp;&nbsp;&nbsp;&nbsp;Unidad: <?php echo $unidad1;?><br>
  &nbsp;&nbsp;&nbsp;&nbsp;Usuario: <? echo $nombre; ?></span></p>
                    <p align="center" class="Estilo77">Se han encontrado <?php echo $numResultados;?> coincidencias.</p>
                    <div align="left">
                      <table width="400" height="21" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                          <td width="29" height="21" background="../img/encabezado_tabla_01.gif">&nbsp;</td>
                          <td width="342" background="../img/encabezado_tabla_02.gif"><div align="center" class="Estilo59">DATOS DE LA CORRESPONDENCIA</div></td>
                          <td width="29" background="../img/encabezado_tabla_04.gif">&nbsp;</td>
                        </tr>
                        <tr>
                          <td height="2" colspan="3"></td>
                        </tr>
                      </table>
                      <table width="400" border="0" align="center" cellpadding="0" cellspacing="2" bgcolor="#74ABD3">
                        <tr>
                          <td></td>
                        </tr>
                        <tr>
                          <td bgcolor="#B1CBE4"><table width="396" border="0" align="center" cellpadding="0" cellspacing="2">
                              <tr>
                                <td width="120" height="15" bgcolor="#CCDDEE" class="Estilo87"><div align="right"><span class="Estilo78">ID:</span></div></td>
                                <td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE" class="Estilo87"><span class="Estilo64">&nbsp;<? echo $id_c;?></span></td>
                              </tr>
                              <tr>
                                <td height="15" class="Estilo87"><div align="right"><span class="Estilo78">Rut:</span></div></td>
                                <td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE" class="Estilo87"><span class="Estilo64">&nbsp;<? echo $rut;?></span></td>
                              </tr>
                              <tr>
                                <td height="15" bgcolor="#CCDDEE" class="Estilo87"><div align="right" class="Estilo78">Unidad:</div></td>
                                <td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE" class="Estilo87"><span class="Estilo64">&nbsp;<? echo $unidad;?></span></td>
                              </tr>
                              <tr>
                                <td height="15" class="Estilo87"><div align="right" class="Estilo78">Fecha y Hora:</div></td>
                                <td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE" class="Estilo87"><span class="Estilo64">&nbsp;<? echo $fecha;?></span></td>
                              </tr>
                              <tr>
                                <td height="15" bgcolor="#CCDDEE" class="Estilo87"><div align="right"><span class="Estilo78">Correlativo:</span></div></td>
                                <td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE" class="Estilo87"><span class="Estilo64">&nbsp;<? echo $correlativo;?></span></td>
                              </tr>
                              <tr>
                                <td height="15" class="Estilo87"><div align="right"><span class="Estilo78">Hoja de Ruta:</span></div></td>
                                <td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE" class="Estilo87"><span class="Estilo64">&nbsp;<? echo $hoja_ruta;?></span></td>
                              </tr>
                              <tr>
                                <td height="15" bgcolor="#CCDDEE" class="Estilo87"><div align="right" class="Estilo78">Tipo:</div></td>
                                <td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE" class="Estilo87"><span class="Estilo64">&nbsp;<? echo $tipo;?></span></td>
                              </tr>
                              <tr>
                                <td height="15" class="Estilo87"><div align="right"><span class="Estilo78">Referencias:</span></div></td>
                                <td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE" class="Estilo87"><table width="264" height="60" border="0" align="right" cellpadding="0" cellspacing="0">
                                    <tr>
                                      <td class="Estilo65"><?php  echo $referencias;?></td>
                                    </tr>
                                </table></td>
                              </tr>
                              <tr>
                                <td height="15" bgcolor="#CCDDEE" class="Estilo87"><div align="right"><span class="Estilo78">Fojas:</span></div></td>
                                <td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE" class="Estilo87"><span class="Estilo64">&nbsp;<? echo $fojas;?></span></td>
                              </tr>
                              <tr>
                                <td height="15" class="Estilo87"><div align="right" class="Estilo78">Responsable:</div></td>
                                <td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE" class="Estilo87"><span class="Estilo64">&nbsp;<? echo $responsable;?></span></td>
                              </tr>
                              <tr>
                                <td height="15" bgcolor="#CCDDEE" class="Estilo87"><div align="right" class="Estilo78">Destino:</div></td>
                                <td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE" class="Estilo87"><span class="Estilo64">&nbsp;<? echo $destino;?></span></td>
                              </tr>
                              <tr>
                                <td height="15" class="Estilo87"><div align="right"><span class="Estilo78">Proveido:</span></div></td>
                                <td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE" class="Estilo87"><table width="264" height="60" border="0" align="right" cellpadding="0" cellspacing="0">
                                    <tr>
                                      <td class="Estilo65"><?php  echo $comentario;?></td>
                                    </tr>
                                </table></td>
                              </tr>
                              <tr>
                                <td height="15" bgcolor="#CCDDEE" class="Estilo87"><div align="right"><span class="Estilo78">IP:</span></div></td>
                                <td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE" class="Estilo87"><span class="Estilo64">&nbsp;<? echo $ip;?></span></td>
                              </tr>
                              <tr>
                                <td height="15" class="Estilo87"><div align="right" class="Estilo78">Instrucci&oacute;n:</div></td>
                                <td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE" class="Estilo87"><span class="Estilo64">&nbsp;<? echo $estado;?></span></td>
                              </tr>
                              <tr>
                                <td height="15" bgcolor="#CCDDEE" class="Estilo87"><div align="right" class="Estilo78">SW:</div></td>
                                <td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE" class="Estilo87"><span class="Estilo64">&nbsp;<? echo $sw;?></span></td>
                              </tr>
                              <tr>
                                <td height="10" colspan="2" class="Estilo59"></td>
                              </tr>
                              <tr>
                                <td height="17" colspan="2" bgcolor="#CCDDEE" class="Estilo59"><div align="center"></div></td>
                              </tr>
                          </table></td>
                        </tr>
                        <tr>
                          <td height="1" bgcolor="#74ABD3"></td>
                        </tr>
                      </table>
                      <p>&nbsp;</p>
                    </div></td></tr>
              </table></td>
              <td width="150" bgcolor="#8fb1d2" class="Estilo77"><? //include('online.php')?></td>
            </tr>
        </table></td>
        </tr>
    </table>
    </td>
  </tr>
  <tr>
    <td height="22" colspan="2"><table width="1000" height="20" border="0" cellpadding="0" cellspacing="0">
    
      <tr>
        <td height="2" colspan="3"></td>
      </tr>
      <tr>
        <td width="15" height="20"><img src="../img/No_fondo1.gif" width="15" height="20"></td>
        <td width="970" height="20" background="../img/No_fondo2.gif"></td>
        <td width="15"><img src="../img/No_fondo3.gif" width="15" height="20"></td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html>