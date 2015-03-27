<?
session_start();
if (!isset($_SESSION['paso_por_donde_yo_quiero']))
{
	header ("Location: index.php");
	exit;
}
$id_user=$_SESSION['id_user'];
$nombre=$_SESSION['nombre_ini'];
$unidad=$_SESSION['unidad_ini'];
$id_unidad=$_SESSION['id_unidad'];
$cad = $_GET["cad"];
$vector = explode(",",$cad);
$long = count($vector);
include("../funciones1.php");
$link=conexion();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Chasqui Digital</title>
<LINK href="../javascript/estilos.css" type=text/css rel=stylesheet>
<LINK href="../javascript/estilo_noticias.css" type=text/css rel=stylesheet>
<LINK href="mensajes/dhtmlwindow.css" type=text/css rel=stylesheet>
<LINK href="mensajes/modal.css" type=text/css rel=stylesheet>
<SCRIPT language=JavaScript src="mensajes/dhtmlwindow.js"></SCRIPT>
<SCRIPT language=JavaScript src="mensajes/modal.js"></SCRIPT>
<SCRIPT language=JavaScript src="../javascript/mensajes.js"></SCRIPT>
<SCRIPT language=JavaScript src="../javascript/fecha-hora_bc.js"></SCRIPT>
<SCRIPT language=javascript src="../javascript/barra_de_estado.js"></SCRIPT>
<script language=JavaScript src="../javascript/generador_noticias.js"></script>
<SCRIPT language=javascript src="../javascript/funciones.js"></SCRIPT>
<SCRIPT language=JavaScript src="../fecha-hora_bc.js"></SCRIPT>
<script type="text/javascript" src="../Sothink DHTML Menu/Resource/js/stmenu.js"></script>
<SCRIPT language=JavaScript>
function verifica()
{
    if((document.asignar.unidad.value.length<2) && (document.asignar.otro.value.length<2) && (document.asignar.admin.value.length<2))
	{   //si el largo de nombre es menor a 2 caracteres
        document.asignar.unidad.focus(); //el puntero del mouse queda en nombre
		finalizarIns();
		var mensaje='Debe especificar el Destino del tramite';
		div=document.getElementById('mensaje');
		div.innerHTML=div.innerHTML + mensaje;
        return 0; //devolvemos un cero para dejar de validar
    }
  /*  if(document.asignar.estado.value.length < 1)
	{   //si el largo de nombre es menor a 2 caracteres
        document.asignar.estado.focus(); //el puntero del mouse queda en nombre
		finalizarIns();
		var mensaje='Debe seleccionar el Estado del Tr�mite';
		div=document.getElementById('mensaje');
		div.innerHTML=div.innerHTML + mensaje;
        return 0; //devolvemos un cero para dejar de validar
    }*/
    else
    { //sino enviamos el formulario
		document.asignar.submit(); //enviamos formulario
		opener.focus();
		opener.actualizar();
		window.close();
	}
}

</SCRIPT>
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
                            <p align="left" class="Estilo77">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo 'Unidad: '; echo $unidad .' <br>&nbsp;&nbsp;&nbsp; Usuario: '. $nombre;?><br>
                              <br>
                            </p>
                            <form name="asignar" method="post" action="asignar_save.php">
                              <table width="200" border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td><table width="400" height="21" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td width="29" height="21" background="../img/encabezado_tabla_01.gif">&nbsp;</td>
          <td width="342" background="../img/encabezado_tabla_02.gif"><div align="center" class="Estilo59">DESPACHAR CORRESPONDENCIA</div></td>
          <td width="29" background="../img/encabezado_tabla_04.gif">&nbsp;</td>
        </tr>
        <tr>
          <td height="2" colspan="3"></td>
        </tr>
      </table>
        <table width="400" border="0" align="left" cellpadding="0" cellspacing="2" bgcolor="#74ABD3">
          <tr>
            <td></td>
          </tr>
          <tr>
            <td bgcolor="#B1CBE4"><table width="396" border="0" cellpadding="0" cellspacing="2">
                <tr>
                  <td width="130"></td>
                </tr>
				<tr>
                  <td colspan="2" bgcolor="#CCDDEE" class="Estilo37"><p align="center">Los  Registros seleccionados son los siguientes:<span class="Estilo85">
                    </span></p>
                    <span class="Estilo85"><table width="380" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#74ABD3">
				<? for ($i=0;$i<$long;$i++)
					{
						if($i % 6==0)
						{
							echo "<tr>";
						}
						$j=$i+1;
					  echo '<td width = "55" height = "30" bgcolor="#CCDDEE">'.$vector[$i].'</td>';
						if($j % 6==0)
							echo '</tr>';
					}
					if ($i % 6!=0)
						echo '</tr>';
				?>
					</table>
					<br>
					</span>
					</p></td>
				  </tr>
                <tr>
                  <td class="Estilo37"><div align="right">Agrupar Registros:</div></td>
                  <td bgcolor="#CCDDEE">
                    <div align="left"><input style="width:242px" type="checkbox" name="unificar" value="checkbox" class="Estilo64" /></div>
		  </td>
                </tr>
                <tr>
                  <td class="Estilo37"><div align="right">Proveido:</div></td>
                  <td bgcolor="#CCDDEE"><p><span class="Estilo7">
                           &nbsp;<textarea style="width:242px; height:60px " name="comentario" class="Estilo64" onkeypress="return numeros_letras_especiales(event)"></textarea>
                  </span> </p></td>
                </tr>
                <tr>
                  <td bgcolor="#CCDDEE" class="Estilo37"><div align="right">Asignaci&oacute;n:</div></td>
                  <td width="257" bgcolor="#CCDDEE">
&nbsp;<? $result=mysql_query("select nombre from  user  where id_unidad = '$id_unidad' order by nombre ASC",$link);
//Llenamos el combo
if ($row = mysql_fetch_array($result))
{
	echo '<select name= "admin" style="width:248px" class="Estilo64">';
	echo '<option selected></option>';
	do {
	//	 if($nombre != $row["nombre"])
    	   echo '<option value= "'.$row["nombre"].'">'.$row["nombre"].'</option>';
	   } while ($row = mysql_fetch_array($result));
	echo '</select>';
}
?></td>
</tr>
<?
$sql1="SELECT cargo FROM user WHERE id_user like '%$id_user%'";
$result1 = mysql_query($sql1,$link);
$linea=mysql_fetch_array($result1);
$cargo=$linea["cargo"];
if($cargo == 'Mensajero' or $nombre == 'Yomar Michel')
{
?>
                <tr>
                  <td height="17" class="Estilo37"><div align="right" class="Estilo37">Despacho Externo: </div></td>
                  <td height="17" bgcolor="#CCDDEE" class="Estilo65">
&nbsp;<? $result=mysql_query("select * from unidad order by nombre ASC",$link);
//Llenamos el combo
if ($row = mysql_fetch_array($result))
{
	echo '<select name= "unidad" style="width:248px" class="Estilo64">';
	echo '<option selected></option>';
	do {
		if ($row["id_unidad"] <= 75)
	   	   echo '<option value= "'.$row["nombre"].'">'.$row["nombre"].'</option>';
	} while ($row = mysql_fetch_array($result));
	echo '</select>';
}
?>                  </td>
                </tr>
                <tr>
                  <td bgcolor="#CCDDEE" class="Estilo37"><div align="right">Otro:</div></td>
                  <td bgcolor="#CCDDEE">
&nbsp;<input style="width:242px" type="text" name="otro" class="Estilo64" onKeyPress="return solo_letras(event)"/></td>
                </tr>
                <tr>
                  <td class="Estilo37"><div align="right">Correlativo:</div></td>
                  <td bgcolor="#CCDDEE">
&nbsp;<input style="width:242px" type="text" name="correlativo" class="Estilo64" onKeyPress="return numeros_letras_especiales(event)"/></td>
                </tr>
<tr>
                  <td height="15" bgcolor="#CCDDEE" class="Estilo78"><div align="right"><span class="Estilo37">Instrucci&oacute;n:</span></div></td>
                  <td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE">
&nbsp;<select name="estado" style="width:246px;" class="Estilo64">
                        <option selected="selected"></option>
                        <option value="C">C: Conocimiento</option>
			<option value="F">F: Finalizado</option>
                        <option value="PF">PF: Para Firma</option>
			<option value="PP">PP: Para Pago</option>
                        <option value="R">R: Respuesta</option>
                        <option value="T">T: En Transito</option>
                        <option value="U">U: Urgente</option>
                      </select>                  </td>
                </tr>
<? }?>
                <tr>
                  <td>&nbsp;</td>
                  <td><input type="hidden" name="cad" value="<? echo $cad;?>" /></td>
                </tr>
                <tr>
                  <td colspan="2"><div align="center">
                    <input name="enviar1" type="button" class="Estilo59" style="width:90px;background-color:#4791C5;border:0px;margin:1px;padding:0px; font-weight: bold;" value="Enviar" onclick="javascript:verifica()" />
                      &nbsp;&nbsp;&nbsp;&nbsp;
                    <input name="cancelar" type="reset" class="Estilo59" style="width:90px;background-color:#4791C5;border:0px;margin:1px;padding:0px; font-weight: bold;" value="Cancelar" />
                  </div></td>
                </tr>
            </table></td>
          </tr>
          <tr>
            <td height="1" bgcolor="#74ABD3"></td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
</form></p>
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
<table style="position:absolute;top:172px;left:3px;"width="132" height="240" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td height="92"><script src="menu_admin.js"></script></td>
  </tr>
  <tr>
    <td></td>
  </tr>
</table>
<div id="finalizarInscripcion" style="display:none">
  <div class="formPanel">
	<div>
        <p>
		<br>
		<table>
			<tr>
				<td>
				<img src="../img/888.jpg" width="31" height="32">
				</td>
				<td>
				<span id="mensaje" class="Estilo60"> </span>
				</td>
			</tr>
		</table>
		</p>
        <div class="PwdMeterBase" style="width:100%">
        <table align="center">
            <td>
			<input name="enviar2" type="button" class="Estilo59" style="width:90px;background-color:#4791C5;border:0px;margin:1px;padding:0px; font-weight: bold;" value="Cerrar" onClick="cancelIns()">
        </td>
        </table>
       </div>
    </div>
   </div>
</div>
</body>
</html>
