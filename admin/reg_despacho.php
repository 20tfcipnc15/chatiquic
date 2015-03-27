<?php
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
include("../funciones1.php");
$link=conexion();
?>
<html>
<head>
<title>Chasqui Digital</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
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
    if(document.reg_despacho.tipo.value.length < 2)
	{   //si el largo de nombre es menor a 2 caracteres 
        document.reg_despacho.tipo.focus(); //el puntero del mouse queda en nombre 
		finalizarIns();
		var mensaje='Debe especificar el Tipo de Trámite';
		div=document.getElementById('mensaje');
		div.innerHTML=div.innerHTML + mensaje;
        return 0; //devolvemos un cero para dejar de validar 
    } 
    if((document.reg_despacho.destino.value.length<2) && (document.reg_despacho.otro.value.length<2))
	{   //si el largo de nombre es menor a 2 caracteres 
        document.reg_despacho.destino.focus(); //el puntero del mouse queda en nombre 
		finalizarIns();
		var mensaje='Debe especificar el Destino del trámite';
		div=document.getElementById('mensaje');
		div.innerHTML=div.innerHTML + mensaje;
        return 0; //devolvemos un cero para dejar de validar 
    } 
    if(document.reg_despacho.correlativo.value.length < 2)
	{ //si el largo de marca es menor a 2 caracteres 
        document.reg_despacho.correlativo.focus(); //el puntero del mouse queda en marca 
		finalizarIns();
		var mensaje='Debe ingresar el Número Correlativo';
		div=document.getElementById('mensaje');
		div.innerHTML=div.innerHTML + mensaje;
        return 0; //devolvemos un cero para dejar de validar 
    } 
    if(document.reg_despacho.referencias.value.length < 2)
	{ //si el largo de precio es igual o menor a 0 caracteres 
        document.reg_despacho.referencias.focus(); //el puntero del mouse queda en precio 
		finalizarIns();
		var mensaje='Debe ingresar las Referencias';
		div=document.getElementById('mensaje');
		div.innerHTML=div.innerHTML + mensaje;
        return 0; //devolvemos un cero para dejar de validar 
    }
    if(document.reg_despacho.fojas.value.length < 1)
	{ //si el largo de precio es igual o menor a 0 caracteres 
        document.reg_despacho.fojas.focus(); //el puntero del mouse queda en precio 
		finalizarIns();
		var mensaje='Debe ingresar el Número de Fojas';
		div=document.getElementById('mensaje');
		div.innerHTML=div.innerHTML + mensaje;
        return 0; //devolvemos un cero para dejar de validar 
    }
    if(document.reg_despacho.estado.value.length < 1)
	{ //si el largo de precio es igual o menor a 0 caracteres 
        document.reg_despacho.estado.focus(); //el puntero del mouse queda en precio 
		finalizarIns();
		var mensaje='Debe seleccionar el Estado del Trámite';
		div=document.getElementById('mensaje');
		div.innerHTML=div.innerHTML + mensaje;
        return 0; //devolvemos un cero para dejar de validar 
    }
	else
	{ //sino enviamos el formulario 
        document.reg_despacho.submit(); //enviamos formulario     
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
                            </p>
                            <form name="reg_despacho" method="post" action="despacho_save_3.php">
                              <p><span class="Estilo77">&nbsp;&nbsp;Por favor ingrese los siguientes datos:</span></p>
                              <table width="406" height="21" border="0" cellpadding="0" cellspacing="0">
                                <tr>
                                  <td width="29" height="21" background="../img/encabezado_tabla_01.gif">&nbsp;</td>
                                  <td width="348" background="../img/encabezado_tabla_02.gif"><div align="center" class="Estilo59">CORRESPONDENCIA DESPACHADA </div></td>
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
                                  <td bgcolor="#B1CBE4"><table width="403" border="0" align="center" cellpadding="0" cellspacing="2">
                                      <tr>
                                        <td height="2" colspan="2" bordercolor="#74ABD3" bgcolor="#CCDDEE" class="Estilo37"></td>
                                      </tr>
                                      <tr>
                                        <td width="130" height="15" bordercolor="#74ABD3" bgcolor="#CCDDEE"><div align="right"><span class="Estilo78">Fecha y Hora de Salida: </span></div></td>
                                        <td width="267" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;&nbsp;
                                              <?php include ("../php/fecha_hora.php"); 
													   			echo $fecha=fecha_hora(); 
													   	   ?>
                                          &nbsp;
                                          <input name="fecha" type="hidden" class="Estilo64" style="width:248px" value="<?php echo $fecha;?>" />
                                        </span></td>
                                      </tr>
                                      <tr>
                                        <td height="15"><div align="right" class="Estilo78">Tipo deTr&aacute;mite: </div></td>
                                        <td height="15" bgcolor="#CCDDEE" class="Estilo59">&nbsp;
                                          <?
$result=mysql_query("select tipo from tramites order by tipo ASC",$link);
//Llenamos el combo
if ($row = mysql_fetch_array($result))
{ 
	echo '<select name= "tipo" style="width:248px" class="Estilo64">';
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
                                        <td height="15" bgcolor="#CCDDEE"><div align="right"><span class="Estilo78">Dirigido:</span><span class="Estilo74"></span></div></td>
                                        <td bgcolor="#CCDDEE" class="Estilo64">&nbsp;<span class="Estilo59">
                                            <?
$result=mysql_query("select sigla,nombre,id_unidad from unidad order by nombre ASC",$link);
//Llenamos el combo
if ($row = mysql_fetch_array($result))
{ 
	echo '<select name= "destino" style="width:248px" class="Estilo64">';
	echo '<option selected></option>';
	do { 
		$long=strlen($row["nombre"]);
		if($row["id_unidad"] < 65)
		{
			if($row["nombre"] != $cunidad and $long > 22)
    		   echo '<option value= "'.$row["sigla"].'">'.$row["sigla"].'</option>';
			else
	    	   echo '<option value= "'.$row["nombre"].'">'.$row["nombre"].'</option>';
		}
	} while ($row = mysql_fetch_array($result)); 
	echo '</select>';
}
?>
                                          </span></td>
                                      </tr>
                                      <tr>
                                        <td height="15"><div align="right"><span class="Estilo78">Otro:</span></div></td>
                                        <td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;
                                              <input name="otro" value="" type="text" style="width:248px" class="Estilo64" onKeyPress="return solo_letras(event)"/>
                                        </span></td>
                                      </tr>
                                      <tr>
                                        <td height="15" bgcolor="#CCDDEE"><div align="right"><span class="Estilo78">N&ordm; Correlativo:</span></div></td>
                                        <td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;
                                              <input name="correlativo" type="text" style="width:248px" class="Estilo64" onKeyPress="return numeros_letras_especiales(event)" />
                                        </span></td>
                                      </tr>
                                      <tr>
                                        <td height="15" class="Estilo78"><div align="right" class="Estilo78">N&ordm; Hoja de Ruta:</div></td>
                                        <td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;
                                              <input name="hoja_ruta" value=""type="text" style="width:248px" class="Estilo64" onKeyPress="return numeros_letras(event)" />
                                        </span></td>
                                      </tr>
                                      <tr>
                                        <td height="60" bgcolor="#CCDDEE" class="Estilo78"><div align="right" class="Estilo78">Referencias:</div></td>
                                        <td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;
                                              <textarea style="width:248px; height:60px " name="referencias" class="Estilo7" onKeyPress="return numeros_letras_especiales(event)"></textarea>
                                        </span></td>
                                      </tr>
                                      <tr>
                                        <td height="15"><div align="right"><span class="Estilo78">N&ordm; Fojas:</span></div></td>
                                        <td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;
                                              <input name="fojas" type="text" class="Estilo64" id="fojas" style="width:248px" onKeyPress="return numeros_letras(event)"/>
                                        </span></td>
                                      </tr>
                                      <tr>
                                        <td height="15" bgcolor="#CCDDEE"><div align="right"><span class="Estilo78">Con Copia a:</span></div></td>
                                        <td bgcolor="#CCDDEE" class="Estilo65"><table width="257" height="24" border="0" cellpadding="0" cellspacing="0">
                                            <tr>
                                              <td width="257"><div align="right">
                                                  <input name="unidades" type="button" class="Estilo59" style="width:80px;background-color:#4791C5;border:0px;margin:1px;padding:0px; font-weight: bold;" value="Unidades" onClick="abrir3('unidades.php');">
                                              </div></td>
                                            </tr>
                                          </table>
                                           
                                          <textarea style="width:248px; height:60px " name="copias" class="Estilo7" onKeyPress="return numeros_letras_especiales(event)"></textarea>                                        </td>
                                      </tr>
                                      <tr>
                                        <td height="15"><div align="right"><span class="Estilo78">Adjuntar Archivo:</span></div></td>
                                        <td bgcolor="#CCDDEE" class="Estilo65"><table width="257" height="24" border="0" cellpadding="0" cellspacing="0">
                                            <tr>
                                              <td width="257"><div align="right">
                                                  <input name="archivo" type="button" class="Estilo59" style="width:80px;background-color:#4791C5;border:0px;margin:1px;padding:0px; font-weight: bold;" value="Seleccionar" onClick="abrir5('upload/form.html');">
                                              </div></td>
                                            </tr>
                                          </table>
                                           
                                          <textarea style="width:248px; height:60px" name="archivos" class="Estilo7" onKeyPress="return numeros_letras_especiales(event)"></textarea>                                        </td>
                                      </tr>
                                      <tr>
                                        <td height="15" bgcolor="#CCDDEE"><div align="right"><span class="Estilo78">Enviado por: </span><span class="Estilo74"></span></div></td>
                                        <td bgcolor="#CCDDEE" class="Estilo65">&nbsp;&nbsp;&nbsp;<? echo $nombre;?></td>
                                      </tr>
                                      <tr>
                                        <td height="15" class="Estilo78"><div align="right"><span class="Estilo78">Estado:</span></div></td>
                                        <td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><p align="center">
                                            <select name="estado" style="width:248px;" class="Estilo64">
                                              <option selected></option>
                                              <option value="C">C: Conocimiento</option>
                                              <option value="C">F: Finalizado</option>
                                              <option value="R">R: Respuesta</option>
                                              <option value="U">U: Urgente</option>
                                            </select>
                                        </p></td>
                                      </tr>
                                    </table>
									<table width="403" border="0" align="center" cellpadding="0" cellspacing="2">
                                      <tr>
                                        <td width="397" bordercolor="#74ABD3" bgcolor="#CCDDEE" class="Estilo37"><p align="center">
                                            <input name="enviar3" type="button" class="Estilo59" style="width:90px;background-color:#4791C5;border:0px;margin:1px;padding:0px; font-weight: bold;" value="Enviar Datos" onClick="verifica()">
                                          &nbsp;&nbsp;&nbsp;&nbsp;
                                          <input name="cancelar22" type="reset" class="Estilo59" style="width:90px;background-color:#4791C5;border:0px;margin:1px;padding:0px; font-weight: bold;" value="Cancelar" >
                                        </p></td>
                                      </tr>
                                    </table>
									<br></td>
                                </tr>
                                <tr>
                                  <td height="1" bgcolor="#74ABD3"></td>
                                </tr>
                              </table>
                              </form>
							  <br>
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