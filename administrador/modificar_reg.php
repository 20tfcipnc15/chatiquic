<?php
session_start();
if (!isset($_SESSION['administrador']))
{ 
	header ("Location: index.php"); 
	exit; 
} 
$id_user=$_SESSION['id_user'];
$nombre=$_SESSION['nombre_ini']; 
$unidad1=$_SESSION['unidad_ini']; 
$id_unidad1=$_SESSION['id_unidad'];

include("../funciones1.php");
$link=conexion();

$id_c = $_GET['id'];

$sql = "select * from correspondencia where id_c = '$id_c'";
$res = mysql_query($sql) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
$linea = mysql_fetch_array($res);
/*            $rut = $fila['rut'];
            $unidad = $fila['unidad'];
            $fecha = $fila['fecha'];
            $correlativo= $fila['correlativo'];
            $hoja_ruta = $fila['hoja_ruta'];
            $tipo = $fila['tipo'];
            $referencias = $fila['referencias'];
            $fojas = $fila['fojas'];
            $responsable = $fila['responsable'];
            $destino = $fila['destino'];
            $comentario = $fila['comentario'];
            $ip = $fila['ip'];
            $estado = $fila['estado'];
            $sw = $fila['sw'];*/

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
                      <form name="mod_user" method="post" action="save_mod_reg.php">
                        <div align="center">
                          <table width="616" border="0" cellpadding="0" cellspacing="0">
                            <tr>
                              <td width="29" height="21" background="../img/encabezado_tabla_01.gif">&nbsp;</td>
                              <td width="558" background="../img/encabezado_tabla_02.gif"><div align="center" class="Estilo59">MODIFICAR DATOS DEL REGISTRO</div></td>
                              <td width="29" background="../img/encabezado_tabla_04.gif">&nbsp;</td>
                            </tr>
                            <tr>
                              <td height="2" colspan="3"></td>
                            </tr>
                                              </table>
                          <table width="616" border="0" cellpadding="0" cellspacing="2" bgcolor="#74ABD3">
                            <tr>
                              <td></td>
                            </tr>
                            <tr>
                              <td bgcolor="#B1CBE4"><table width="606" border="0" align="center" cellpadding="0" cellspacing="2" bordercolor="#EDF7FF">
                                  <tr>
                                    <td height="20" colspan="3" bgcolor="#CCDDEE" class="Estilo78"><div align="center">
                                        <div align="center" class="Estilo77">R.U.T. N&ordm;<? echo ' '.$rut=$linea["rut"];;?></div>
                                    </div></td>
                                  </tr>
                                  <tr>
                                    <td height="15" class="Estilo78"><div align="right">ID: </div></td>
                                    <td height="15" bgcolor="#EDF7FF" class="Estilo65">&nbsp;
                                        <?php  echo $id_c=$linea["id_c"];?></td>
                                    <td bgcolor="#CCDDEE" class="Estilo64">&nbsp;</td>
                                  </tr>
                                  <tr>
                                    <td height="15" bgcolor="#CCDDEE" class="Estilo78"><div align="right">RUT:</div></td>
                                    <td height="15" bgcolor="#EDF7FF" class="Estilo65">&nbsp;
                                        <?php  echo $rut;?></td>
                                    <td bgcolor="#CCDDEE" class="Estilo64">&nbsp;
                                        <input name="rut" value="" type="text" style="width:230px" class="Estilo64" onKeyPress="return solo_letras(event)" /></td>
                                  </tr>
                                  <tr>
                                    <td height="15" class="Estilo78"><div align="right">Fecha: </div></td>
                                    <td height="15" bgcolor="#EDF7FF" class="Estilo65">&nbsp;
                                        <?php  echo $fecha=$linea["fecha"];?></td>
                                    <td bgcolor="#CCDDEE" class="Estilo64">&nbsp;
                                    <input name="fecha" value="" type="text" style="width:230px" class="Estilo64" onKeyPress="return solo_letras(event)" /></td>
                                  </tr>
                                  <tr>
                                    <td width="124" height="15" bgcolor="#CCDDEE" class="Estilo78"><div align="right">Recibido por: </div></td>
                                    <td width="230" height="15" bgcolor="#EDF7FF" class="Estilo65">&nbsp;
                                        <?php  echo $responsable=$linea["responsable"];?></td>
                                    <td width="244" bgcolor="#CCDDEE" class="Estilo64">&nbsp;
                                    <input name="responsable" value="" type="text" style="width:230px" class="Estilo64" onKeyPress="return solo_letras(event)" /></td>
                                  </tr>
                                  <tr>
                                    <td height="15" class="Estilo78"><div align="right">Tipo de Correspondencia:</div></td>
                                    <td height="15" bgcolor="#EDF7FF" class="Estilo65">&nbsp;
                                        <?php  echo $tipo=$linea["tipo"];?>                                    </td>
                                    <td bgcolor="#CCDDEE" class="Estilo59">&nbsp;
                                        <?
$result=mysql_query("select tipo from tramites order by tipo ASC",$link);
//Llenamos el combo
if ($row = mysql_fetch_array($result))
{ 
	echo '<select name= "tipo" style="width:230px" class="Estilo64">';
	echo '<option selected></option>';
	do { 
		$long=strlen($row["tipo"]);
   	    echo '<option value= "'.$row["tipo"].'">'.$row["tipo"].'</option>';
	} while ($row = mysql_fetch_array($result)); 
	echo '</select>';
}
?></td>
                                  </tr>
                                  <tr>
                                    <td height="15" bgcolor="#CCDDEE"><div align="right"><span class="Estilo78">Procedencia:</span></div></td>
                                    <td height="15" bgcolor="#EDF7FF" class="Estilo65">&nbsp; <?php echo $unidad=$linea["unidad"]; ?></td>
                                    <td bgcolor="#CCDDEE" class="Estilo64">&nbsp;
                                        <?
//$result=mysql_query("select * from unidad order by nombre ASC",$link);
$result=mysql_query("select sigla,nombre from unidad where id_unidad < 74 order by nombre ASC",$link);
//Llenamos el combo
if ($row = mysql_fetch_array($result))
{ 
	echo '<select name= "unidad" style="width:230px" class="Estilo64">';
	echo '<option selected></option>';
	do { 
		$long=strlen($row["nombre"]);
		if($row["nombre"] != $cunidad and $long > 42)
    	   echo '<option value= "'.$row["sigla"].'">'.$row["sigla"].'</option>';
		else
    	   echo '<option value= "'.$row["nombre"].'">'.$row["nombre"].'</option>';
	} while ($row = mysql_fetch_array($result)); 
	echo '</select>';
}
?></td>
                                  </tr>
                                  <tr>
                                    <td><div align="right"><span class="Estilo78">Otro:</span></div></td>
                                    <td height="15" bgcolor="#EDF7FF" class="Estilo65">&nbsp;</td>
                                    <td background="../admin/img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;
                                          <input name="otro" value="" type="text" style="width:230px" class="Estilo64" onKeyPress="return solo_letras(event)" />
                                    </span></td>
                                  </tr>
                                  <tr>
                                    <td bgcolor="#CCDDEE"><div align="right"><span class="Estilo78">Correlativo:</span></div></td>
                                    <td height="15" bgcolor="#EDF7FF" class="Estilo65">&nbsp; <?php echo $correlativo=$linea["correlativo"];?></td>
                                    <td background="../admin/img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;
                                          <input name="correlativo" type="text" style="width:230px" class="Estilo64" onKeyPress="return numeros_letras_especiales(event)" value=""/>
                                      </span> </td>
                                  </tr>
                                  <tr>
                                    <td height="15" class="Estilo78"><div align="right">N&ordm; Hoja de Ruta: </div></td>
                                    <td bgcolor="#EDF7FF" class="Estilo65">&nbsp; <?php echo $hoja_ruta=$linea["hoja_ruta"];?> </td>
                                    <td background="../admin/img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;
                                          <input name="hoja_ruta" value=""type="text" style="width:230px" class="Estilo64" onKeyPress="return numeros_letras_especiales(event)" />
                                    </span></td>
                                  </tr>
                                  <tr>
                                    <td height="15" bgcolor="#CCDDEE" class="Estilo78"><div align="right">N&ordm; Fojas: </div></td>
                                    <td height="15" bgcolor="#EDF7FF" class="Estilo65">&nbsp;
                                        <?php  echo $fojas=$linea["fojas"];?>                                    </td>
                                    <td bgcolor="#CCDDEE" class="Estilo59">&nbsp;<span class="Estilo64">
                                      <input name="fojas" value=""type="text" style="width:230px" class="Estilo64" onKeyPress="return numeros_letras(event)" />
                                    </span></td>
                                  </tr>
                                  <tr>
                                    <td height="64" class="Estilo78"><div align="right">Referencias:</div></td>
                                    <td height="64" bgcolor="#EDF7FF" class="Estilo65"><table width="230" height="62" border="0" align="center" cellpadding="0" cellspacing="0">
                                        <tr>
                                          <td bgcolor="#EDF7FF"><table width="220" border="0" align="center" class="Estilo65">
                                              <tr>
                                                <td><?php  echo $referencias=$linea["referencias"];?></td>
                                              </tr>
                                          </table></td>
                                        </tr>
                                    </table></td>
                                    <td background="../admin/img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;
                                          <textarea style="width:230px; height:60px" name="referencias" class="Estilo7" onKeyPress="return numeros_letras_especiales(event)"></textarea>
                                    </span></td>
                                  </tr>
                                  <tr>
                                    <td height="64" bgcolor="#CCDDEE" class="Estilo78"><div align="right">Proveido:</div></td>
                                    <td height="64" bgcolor="#EDF7FF" class="Estilo65"><table width="230" height="82" border="0" align="center" cellpadding="0" cellspacing="0">
                                        <tr>
                                          <td bgcolor="#EDF7FF" class="Estilo65"><table width="220" border="0" align="center" class="Estilo65">
                                              <tr>
                                                <td><?php  echo $comentario=$linea["comentario"];?></td>
                                              </tr>
                                          </table></td>
                                        </tr>
                                    </table></td>
                                    <td background="../admin/img/fondo_cuadrado.jpg" bgcolor="#CCDDEE">&nbsp;
                                        <textarea style="width:230px; height:60px" name="comentario" class="Estilo7" onKeyPress="return numeros_letras_especiales(event)"></textarea>                                    </td>
                                  </tr>
                                  <tr>
                                    <td height="15" class="Estilo78"><div align="right">Destino:</div></td>
                                    <td height="15" bgcolor="#EDF7FF" class="Estilo65">&nbsp;
                                        <?php  echo $destino=$linea["destino"];?>                                    </td>
                                    <td bgcolor="#CCDDEE" class="Estilo59"><table width="234" border="0" align="center" cellpadding="0" cellspacing="2">
                                        <tr>
                                          <td><? if($destino != $unidad1)
{
$result=mysql_query("select nombre from user order by nombre ASC",$link);
//Llenamos el combo
echo '&nbsp;';
if ($row = mysql_fetch_array($result))
{ 
	echo '<option selected></option>';
	echo '<select name= "destino_in" style="width:230px" class="Estilo64">';
	do { 
    	   echo '<option value= "'.$row["nombre"].'">'.$row["nombre"].'</option>';
	} while ($row = mysql_fetch_array($result)); 
	echo '</select>';
}?></td>
                                        </tr>
                                        <tr>
                                          <td><? 
$result=mysql_query("select sigla,nombre from unidad order by nombre ASC",$link);
//Llenamos el combo
echo '&nbsp;';
if ($row = mysql_fetch_array($result))
{ 
	echo '<select name= "destino_ex" style="width:230px" class="Estilo64">';
	echo '<option selected></option>';
	do { 
		$long=strlen($row["nombre"]);
		if($row["nombre"] != $cunidad and $long > 22)
    	   echo '<option value= "'.$row["sigla"].'">'.$row["sigla"].'</option>';
		else
    	   echo '<option value= "'.$row["nombre"].'">'.$row["nombre"].'</option>';
	} while ($row = mysql_fetch_array($result)); 
	echo '</select>';
}
}
?>                                          </td>
                                        </tr>
                                      </table>
                                    
                                      <input name="otro_des" value=""type="text" style="width:230px" class="Estilo64" onKeyPress="return numeros_letras(event)" />                                    </td>
                                  </tr>
                                  <tr>
                                    <td height="15" bgcolor="#CCDDEE" class="Estilo78"><div align="right">Instruccion:</div></td>
                                    <td bgcolor="#EDF7FF" class="Estilo65">&nbsp; <?php echo $estado=$linea["estado"];?> </td>
                                    <td background="../admin/img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp; <span class="Estilo59">
                                      <?
$result=mysql_query("select instruccion,valor from instruccion order by instruccion ASC",$link);
//Llenamos el combo
if ($row = mysql_fetch_array($result))
{ 
	echo '&nbsp;<select name= "estado" style="width:230px" class="Estilo64">';
	echo '<option></option>';
	do { 
		$long=strlen($row["tipo"]);
   	    echo '<option value= "'.$row["valor"].'">'.$row["instruccion"].'</option>';
	} while ($row = mysql_fetch_array($result)); 
	echo '</select>';
}
?>
                                    </span></span></td>
                                  </tr>
                                  <tr>
                                    <td height="15" class="Estilo78"><div align="right">Activado:</div></td>
                                    <td bgcolor="#EDF7FF" class="Estilo65">&nbsp; <?php echo $sw=$linea["sw"];?> </td>
                                    <td background="../admin/img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp; <span class="Estilo59">
                                      <?
$result=mysql_query("select desc_es,valor from estado order by id_e ASC",$link);
//Llenamos el combo
if ($row = mysql_fetch_array($result))
{ 
	echo '&nbsp;<select name= "sw" style="width:230px" class="Estilo64">';
	echo '<option></option>';
	do { 
		$long=strlen($row["tipo"]);
   	    echo '<option value= "'.$row["valor"].'">'.$row["valor"].' - '.$row["desc_es"].'</option>';
	} while ($row = mysql_fetch_array($result)); 
	echo '</select>';
}
?>
                                    </span></span></td>
                                  </tr>
                                  <tr>
                                    <td height="15" colspan="3" bgcolor="#CCDDEE" class="Estilo78"><div align="center">
                                        <input name="id_c" type="hidden" value="<?php  echo $id_c=$linea["id_c"];?>" >
                                        <input name="rut" type="hidden" value="<?php  echo $rut=$linea["rut"];?>" >
                                        <input name="referencias_old" type="hidden" value="<?php  echo $referencias;?>" >
                                        <input name="enviar" type="submit" class="Estilo59" style="width:90px;background-color:#4791C5;border:0px;margin:1px;padding:0px; font-weight: bold;" value="Aceptar" >
                                      &nbsp;&nbsp;&nbsp;&nbsp;
                                      <input name="cancelar2" type="reset" class="Estilo59" style="width:90px;background-color:#4791C5;border:0px;margin:1px;padding:0px; font-weight: bold;" value="Cancelar" >
                                    </div></td>
                                  </tr>
                                  <tr>
                                    <td height="7" colspan="3" class="Estilo78"></td>
                                  </tr>
                              </table></td>
                            </tr>
                            <tr>
                              <td height="1" bgcolor="#74ABD3"></td>
                            </tr>
                                              </table>
                        </div>
                        <p>&nbsp;</p>
                      </form>
                      </div>
                    </td></tr>
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