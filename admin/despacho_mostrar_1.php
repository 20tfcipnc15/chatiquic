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
$id_user=$_SESSION['id_user'];
$nombre=$_SESSION['nombre_ini']; 
$unidad=$_SESSION['unidad_ini']; 
$id_unidad=$_SESSION['id_unidad']; 

$long = $_GET['long'];
$fecha = $_GET['fecha'];
$tipo = $_GET['tipo'];
$destino = $_GET['destino'];
$correlativo = $_GET['correlativo'];
$hoja_ruta = $_GET['hoja'];
$referencias = $_GET['referencias'];
$fojas = $_GET['fojas'];
$responsable = $_GET['nombre'];
$rut = $_GET['rut'];
$estado = $_GET['estado'];

include("../funciones1.php");
$link=conexion();

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
<table style="position:absolute;" width="780" border="0" align="center" cellspacing="0">
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
          <p><span class="Estilo77"><img src="../img/chasqui_digital_azul2 copia.jpg" width="445" height="60"></span></p>
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
    <td height="248" colspan="2"><table width="780" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td width="132" height="246" bgcolor="#8fb1d2">&nbsp;</td>             
            <td width="497" rowspan="3"><div align="center">
              <table width="493" height="246" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td width="480" bgcolor="#336699"><div align="center">
                    <table width="493" height="246" border="2" align="center" cellpadding="0" cellspacing="0" bordercolor="#8fb1d2">
                      <tr>
                        <td background="../img/fondo_cuerpo.gif"><center>
                            <p align="left" class="Estilo77">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo 'Unidad: '; echo $unidad .' <br>&nbsp;&nbsp;&nbsp; Usuario: '. $nombre;?><br><br>
                              &nbsp;</p>
                            <p class="Estilo51"><span class="Estilo77">Los datos de su Correspondencia <br>
                                  han sido enviados correctamente...! </span></p>
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
                                      <td height="15" colspan="2" bordercolor="#74ABD3" class="Estilo78"><div align="center" class="Estilo77">R.U.T. N&ordm;<? echo ' '.$rut;?></div></td>
                                    </tr>
                                    <tr>
                                      <td width="130" height="15" bordercolor="#74ABD3" bgcolor="#CCDDEE" class="Estilo78"><div align="right">Fecha y hora de salida:</div></td>
                                      <td width="260" height="15" bgcolor="#E1F1FF" class="Estilo65">&nbsp;
                                          <?php  echo $fecha;?></td>
                                    </tr>
                                    <tr>
                                      <td height="15" class="Estilo78"><div align="right">Tipo de Correspondencia:</div></td>
                                      <td height="15" bgcolor="#E1F1FF" class="Estilo65">&nbsp;
                                          <?php  echo $tipo;?>                                      </td>
                                    </tr>
                                    <tr>
                                      <td bgcolor="#CCDDEE"><div align="right"><span class="Estilo78">Correlativo:</span></div></td>
                                      <td height="15" bgcolor="#E1F1FF" class="Estilo65">&nbsp; <?php echo $correlativo;?></td>
                                    </tr>
                                    <tr>
                                      <td><div align="right"><span class="Estilo78">Dirigido:</span></div></td>
                                      <td height="15" bgcolor="#E1F1FF" class="Estilo65">&nbsp; <?php echo $destino;?></td>
                                    </tr>
                                    <tr>
                                      <td height="15" bgcolor="#CCDDEE" class="Estilo78"><div align="right">N&ordm; Hoja de Ruta </div></td>
                                      <td bgcolor="#E1F1FF" class="Estilo65">&nbsp; <?php echo $hoja_ruta;?> </td>
                                    </tr>
                                    <tr>
                                      <td height="60" class="Estilo78"><div align="right">Referencias:</div></td>
                                      <td height="60" bgcolor="#E1F1FF" class="Estilo65">&nbsp;
                                          <?php  echo $referencias;?>                                      </td>
                                    </tr>
                                    <tr>
                                      <td height="15" bgcolor="#CCDDEE" class="Estilo78"><div align="right">Enviado  por: </div></td>
                                      <td height="15" bgcolor="#E1F1FF" class="Estilo65">&nbsp;
                                          <?php  echo $responsable;?>                                      </td>
                                    </tr>
                                    <tr>
                                      <td height="15" class="Estilo78"><div align="right">Fojas:</div></td>
                                      <td height="15" bgcolor="#E1F1FF" class="Estilo65">&nbsp;
                                          <?php  echo $fojas; ?>
                                      </td>
                                    </tr>
                                    <tr>
                                      <td height="15" bgcolor="#CCDDEE" class="Estilo78"><div align="right">Estado:</div></td>
                                      <td height="15" bgcolor="#E1F1FF" class="Estilo65">&nbsp;
                                          <?php  echo $estado; ?>                                      </td>
                                    </tr>
    <?
	if($long > 0)
	{ 
		$long++;
		echo '<tr>
		<td height="15" class="Estilo78">
  	    <div align="right">Con Copia a:</div></td>
		<td bgcolor="#E1F1FF" class="Estilo65">';
		$consulta ="SELECT * FROM correspondencia order by id_c DESC limit $long";
		$resultado=mysql_query($consulta) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
		$numResultados = mysql_num_rows($resultado);
		if($numResultados>0)
		{
			while($linea=mysql_fetch_array($resultado,MYSQL_BOTH))
			{
				$destino1 = $linea["destino"]; 
				if ($destino1 != $destino)
				echo '&nbsp;&nbsp;* '.$destino1.'<br>';
			}
		}
        echo '</td></tr>';
	}
	?>
                                    <tr>
                                      <td height="15" colspan="2" bgcolor="#CCDDEE" class="Estilo78"><div align="center">
                                         <form name="form4" method="post" action="reporte/rut_des_1.php">                               
		<input class="Estilo59" name="submit2" type="submit" style="background-color:#4791C5;border:0px;margin:1px;padding:0px; font-weight: bold;" value="  R.U.T. ">
											  <input name="fecha" type="hidden" value="<? echo $fecha;?>" />
											  <input name="destino" type="hidden" value="<? echo $destino;?>" />
											  <input name="correlativo" type="hidden" value="<? echo $correlativo;?>" />
											  <input name="referencias" type="hidden" value="<? echo $referencias;?>" />
											  <input name="rut" type="hidden" value="<? echo $rut;?>" />
											  <input name="long" type="hidden" value="<? echo $long;?>" />
					                          <input name="unidad" type="hidden" value="<? echo $unidad;?>" />
                                          </form>
                                      </div></td>
                                    </tr>
                                    <tr>
                                      <td height="10" colspan="2" class="Estilo78"></td>
                                    </tr>
                                </table></td>
                              </tr>

                            </table>
                            <p class="Estilo37"><a href="../admin/notificar.php">&iquest;Desea enviar una Notificaci&oacute;n?</a></p>
                            <p class="Estilo37">&nbsp;</p>
                        </center></td>
                        </tr>
                    </table>
                  </div></td>
                </tr>
              </table>
            </div>              </td>
            <td width="153" rowspan="3" bgcolor="#8fb1d2">&nbsp;</td>
          </tr>                 
    </table></td>
  </tr>
  <tr>
    <td colspan="2"></td>
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
<table style="position:absolute;top:171px;left:1px;"width="132" height="240" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td height="92"><script src="menu_admin.js"></script></td>
  </tr>
  <tr>
    <td></td>
  </tr>
</table>
</body>
</html>