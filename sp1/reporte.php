<?
session_start();
if (!isset($_SESSION['super usuario']))
{ 
	header ("Location: index.php"); 
	exit; 
} 
$id_user_ini=$_SESSION['id_user'];
$nombre_ini=$_SESSION['nombre_ini']; 
$unidad_ini=$_SESSION['unidad_ini']; 
$id_unidad_ini=$_SESSION['id_unidad'];


include("../funciones1.php");
$link=conexion();

function generaPaises()
{
	$consulta=mysql_query("SELECT id_unidad, nombre FROM unidad WHERE id_unidad <80 order by nombre ASC ");
	echo "<select name='paises' id='paises' onChange='cargaContenido(this.id)' style='width:248px' class='Estilo64'>";
	echo "<option value='0'>Elige</option>";
	while($registro=mysql_fetch_row($consulta))
	{
		echo "<option value='".$registro[0]."'>".$registro[1]."</option>";
	}
	echo "</select>";
}
?>
<html>
<head>
<title>Chasqui Digital</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<LINK href="../javascript/estilos.css" type=text/css rel=stylesheet>
<LINK href="../javascript/estilo_noticias.css" type=text/css rel=stylesheet>
<SCRIPT language=JavaScript src="../javascript/fecha-hora_bc.js"></SCRIPT>
<SCRIPT language=javascript src="../javascript/barra_de_estado.js"></SCRIPT>
<SCRIPT language=javascript src="../javascript/funciones.js"></SCRIPT>
<script language=JavaScript src="../javascript/generador_noticias.js"></script>
<SCRIPT language=JavaScript src="../fecha-hora_bc.js"></SCRIPT>
<script type="text/javascript" src="../Sothink DHTML Menu/Resource/js/stmenu.js"></script>
</head>
<body bottommargin="0" leftmargin="0" rightmargin="0" topmargin="0" bgcolor="#EDF7FF" onload=escrolea() oncontextmenu="return false">
<table style="position:absolute; left:170px" width="780" border="0" align="center" cellspacing="0">
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
                            <p align="left" class="Estilo77">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo 'Unidad: '; echo $unidad_ini .' <br>&nbsp;&nbsp;&nbsp; Usuario: '. $nombre_ini;?><br>
                            </p>
							<form name="reporte" method="post" action="seleccion.php">
<!--							<form name="reporte" method="post" action="aa.php">-->
                                <div align="center">
                                  <p class="Estilo77">  Especifique el tipo de Reporte que desea: </p>
                                  <table width="400" height="21" border="0" cellpadding="0" cellspacing="0">
                                    <tr>
                                      <td width="29" height="21" background="../img/encabezado_tabla_01.gif">&nbsp;</td>
                                      <td width="342" background="../img/encabezado_tabla_02.gif"><div align="center" class="Estilo59">BUSCAR CORRESPONDENCIA </div></td>
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
                                          <td height="15" bordercolor="#74ABD3" bgcolor="#CCDDEE"><div align="right"><span class="Estilo78">Fecha Inicial:</span></div></td>
                                          <td bgcolor="#CCDDEE"><span class="Estilo64"> &nbsp;
                                                <input name="fecha" type="text" class="Estilo64" style="width:120px" value="" onKeyPress="return numeros_letras(event)" />
                                                <input name="calendario1" type="button" class="Estilo59" style="width:90px;background-color:#4791C5;border:0px;margin:1px;padding:0px; font-weight: bold;" value="Calendario" onClick="abrir('../php/calendario6.php');">
                                          </span></td>
                                        </tr>
                                          <tr>
                                            <td width="130" height="15" bordercolor="#74ABD3" bgcolor="#CCDDEE"><div align="right"><span class="Estilo78">Fecha Final:</span></div></td>
                                            <td width="260" bgcolor="#CCDDEE"><span class="Estilo64"> &nbsp;
                                                  <input name="fecha_fin" type="text" class="Estilo64" style="width:120px" value="" onKeyPress="return numeros_letras(event)" />
                                                  <input name="calendario1" type="button" class="Estilo59" style="width:90px;background-color:#4791C5;border:0px;margin:1px;padding:0px; font-weight: bold;" value="Calendario" onClick="abrir('../php/calendario6.php');">
                                            </span></td>
                                          </tr>
                                          <tr>
                                            <td height="15"><div align="right"><span class="Estilo78">Unidad</span></div></td>
                                            <td bgcolor="#CCDDEE" class="Estilo64">&nbsp;
                                                <select name="unidad_sol2" style="width:248px" class="Estilo64">
                                                  <option selected><? echo $unidad_ini;?></option>
                                                  <option>Area Desconcentrada</option>
                                                  <option>Carrera de Informatica</option>
                                                  <option>Carrera de Biologia</option>
                                                  <option>Carrera de Estadistica</option>
                                                  <option>Carrera de Matematicas</option>
                                                  <option>Carrera de Quimica</option>
                                                  <option>Carrera de Fisica</option>
                                                  <option>Decanato</option>
                                                  <option>Instituto de Biologia Molecular</option>
                                                  <option>Instituto de Ecologia</option>
                                                  <option>Instituto de Estadistica</option>
                                                  <option>Instituto de Investigaciones Quimicas</option>
                                                  <option>Instituto de Fisica</option>
                                                  <option>Instituto de Matematica</option>
                                                  <option>Instituto de Inv. de Informatica</option>
                                                  <option>Laboratorio de Calidad Ambiental</option>
                                                  <option>Planetario</option>
                                                  <option>Prefacultativo</option>
                                                  <option>Postgrado en Informatica</option>
                                                  <option>Proyecto Caminar</option>
                                                  <option>TIC Facultativo</option>
                                                  <option>Vicedecanato</option>
                                                  <!--                                                  <option selected></option>
                                                  <option>Area Desconcentrada</option>
                                                  <option>Acreditaciones</option>
                                                  <option>Actas PostGrado</option>
                                                  <option>Administracion Central</option>
                                                  <option>Administracion FCPN</option>
                                                  <option>Asesoria Juridica</option>
                                                  <option>ASDI/SAREC</option>
                                                  <option>Asociacion de Docentes</option>
                                                  <option>Auditoria Interna</option>
                                                  <option>Acciones y Control</option>
                                                  <option>Bienestar Social</option>
                                                  <option>Bienes e Inventarios</option>
                                                  <option>Biblioteca</option>
                                                  <option>Carrera de Informatica</option>
                                                  <option>Carrera de Biologia</option>
                                                  <option>Carrera de Estadistica</option>
                                                  <option>Carrera de Matematica</option>
                                                  <option>Carrera de Quimica</option>
                                                  <option>Carrera de Fisica</option>
                                                  <option>CEFAC - FCPN</option>
                                                  <option>CE Informatica</option>
                                                  <option>CE Matematica</option>
                                                  <option>CE Biologia</option>
                                                  <option>CE Quimica</option>
                                                  <option>CE Fisica</option>
                                                  <option>CE Estadistica</option>
                                                  <option>Contabilidad</option>
                                                  <option>Decanato</option>
                                                  <option>Dpto. Docente</option>
                                                  <option>Dpto. Presupuestos</option>
                                                  <option>DAF</option>
                                                  <option>FEDSIDUMSA</option>
                                                  <option>F.U.L.</option>
                                                  <option>Gestiones</option>
                                                  <option>Honorable Consejo Facultativo</option>
                                                  <option>Honorable Consejo Universitario</option>
                                                  <option>Instituto de Desarrollo Regional</option>
                                                  <option>Instituto de Ecologia</option>
                                                  <option>Instituto de Investigacion FCPN</option>
                                                  <option>Instituto de Estadistica y Teo Aplicacion</option>
                                                  <option>Instituto de Fisica</option>
                                                  <option>Instituto de Matematica IETA</option>
                                                  <option>Instituto de Inv. de Informatica</option>
                                                  <option>Imprenta Universitaria</option>
                                                  <option>Infraestructura</option>
                                                  <option>Personal Administrativo</option>
                                                  <option>Planetario</option>
                                                  <option>Prefacultativo</option>
                                                  <option>Post Grado de Informatica</option>
                                                  <option>Post Grado de Fisica</option>
                                                  <option>Rectorado</option>
                                                  <option>Relaciones Publicas</option>
                                                  <option>Relaciones Internas</option>
                                                  <option>Secretaria Academica</option>
                                                  <option>Secretaria General</option>
                                                  <option>Sociedad Cientifica Estudiantil</option>
                                                  <option>STUMSA</option>
                                                  <option>TVU Canal 13</option>
                                                  <option>Tesoro Universitario</option>
                                                  <option>TIC Facultativo</option>
                                                  <option>Titulos y Diplomas</option>
                                                  <option>UMSATIC</option>
                                                  <option>Vicedecanato</option>
                                                  <option>Vicerrectorado</option>-->
                                              </select></td>
                                          </tr>


                                          <tr>
                                            <td height="15"><div align="right"><span class="Estilo78">Usuario:</span></div></td>
                                            <td bgcolor="#CCDDEE" class="Estilo64">&nbsp;<span class="Estilo59">
                                              <?
$result8=mysql_query("select nombre from user order by nombre ASC",$link);
//Llenamos el combo
if ($row8 = mysql_fetch_array($result8))
{ 
	echo '<select name= "usuario" style="width:248px" class="Estilo64">';
	do { 
   	    echo '<option value= "'.$row["nombre"].'">'.$row["nombre"].'</option>';
	} while ($row = mysql_fetch_array($result8)); 
	echo '</select>';
}
?>
                                            </span></td>
                                          </tr>
                                          <tr>
                                            <td height="15" bgcolor="#CCDDEE"><div align="right"><span class="Estilo78">Otro:</span></div></td>
                                            <td background="../admin/img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;
                                                  <input name="otro" value="" type="text" style="width:248px" class="Estilo64" onKeyPress="return solo_letras(event)"/>
                                            </span></td>
                                          </tr>
                                          <tr>
                                            <td height="15"><div align="right"><span class="Estilo78">R.U.T.:</span></div></td>
                                            <td background="../admin/img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;
                                                  <input name="rut" type="text" style="width:248px" class="Estilo64" onKeyPress="return numeros_letras_especiales(event)"/>
                                            </span></td>
                                          </tr>

                                          <tr>
                                            <td height="15" colspan="2" class="Estilo78"><span class="Estilo65">
                                              </span>
                                              <table width="390" border="0" align="center" cellpadding="0" cellspacing="2" bgcolor="#CCDDEE">
                                                <tr>
                                                  <td class="Estilo78"><div align="right">Tipo:</div></td>
                                                  <td bgcolor="#b1cbe4"><div align="center">
                                                      <input name="opcion" type="radio" value="tipo">
                                                  </div></td>
                                                  <td width="166" class="Estilo78"><div align="right">Responsable: </div></td>
                                                  <td width="38" bgcolor="#b1cbe4"><div align="center">
                                                      <input name="opcion" type="radio" value="responsable">
													  <input name="opcion" type="radio" value="responsable_general">
                                                  </div></td>
                                                </tr>
                                                <tr>
                                                  <td bgcolor="#b1cbe4" class="Estilo78"><div align="right">Seg&uacute;n su  Procedencia:</div></td>
                                                  <td><div align="center">
                                                      <input name="opcion" type="radio" value="procedencia">
                                                  </div></td>
                                                  <td bgcolor="#b1cbe4" class="Estilo78"><div align="right">Seg&uacute;n su Destino: </div></td>
                                                  <td><div align="center">
                                                      <input name="opcion" type="radio" value="destino">
                                                  </div></td>
                                                </tr>
                                                <tr>
                                                  <td class="Estilo78"><div align="right">Tr&aacute;mites Conclu&iacute;dos: </div></td>
                                                  <td bgcolor="#b1cbe4"><div align="center">
                                                      <input name="opcion" type="radio" value="concluido">
                                                  </div></td>
                                                  <td class="Estilo78"><div align="right">Total de Tr&aacute;mites: </div></td>
                                                  <td bgcolor="#b1cbe4"><div align="center">
                                                      <input name="opcion" type="radio" value="total">
                                                  </div></td>
                                                </tr>
                                                <tr>
                                                  <td class="Estilo78"><div align="right">Pendientes:</div></td>
                                                  <td bgcolor="#b1cbe4"><div align="center">
                                                      <input name="opcion" type="radio" value="pendiente">
                                                  </div></td>
                                                  <td class="Estilo78"><div align="right">Mensajeros: </div></td>
                                                  <td bgcolor="#b1cbe4"><div align="center">
                                                      <input name="opcion" type="radio" value="mensajeros">
                                                  </div></td>
                                                </tr>  
					        <tr>
                                                  <td class="Estilo78"><div align="right">Porcentajes de Interaccion:</div></td>
                                                  <td bgcolor="#b1cbe4"><div align="center">
                                                      <input name="opcion" type="radio" value="porcentajes">
                                                  </div></td>
                                                  <td class="Estilo78"><div align="right">usuario</div></td>
                                                  <td bgcolor="#b1cbe4"><input name="opcion" type="radio" value="usuario"></td>
                                                </tr>
                                              </table>
                                              <span class="Estilo65">
                                              <label for="checkbox"></label>
                                              </span></td>
                                          </tr>
                                          <tr>
                                            <td height="10" colspan="2" class="Estilo59"></td>
                                          </tr>
                                          
                                          
                                          <tr>
                                            <td height="17" colspan="2" bgcolor="#CCDDEE" class="Estilo59"><div align="center">
                                              <input name="enviar3" type="submit" class="Estilo59" style="width:90px;background-color:#4791C5;border:0px;margin:1px;padding:0px; font-weight: bold;" value=" Reporte " >
                                              &nbsp;&nbsp;&nbsp;&nbsp;
                                              <input name="cancelar" type="reset" class="Estilo59" style="width:90px;background-color:#4791C5;border:0px;margin:1px;padding:0px; font-weight: bold;" value="Cancelar" >
                                            </div></td>
                                          </tr>
                                        </table>
                                       </td>
                                    </tr>
                                    <tr>
                                      <td height="1" bgcolor="#74ABD3"></td>
                                    </tr>
                                  </table>
                                </div>
                                <p align="center">&nbsp;</p>
                                <table width="400" border="0" align="center" cellpadding="0" cellspacing="2" bgcolor="#74ABD3">
                                  <tr>
                                    <td></td>
                                  </tr>
                                  <tr>
                                    <td bgcolor="#B1CBE4"><table width="396" border="0" align="center" cellpadding="0" cellspacing="2">
                                        <tr>
                                          <td height="15"><div id="demo" style="width:248px;">
                                              <table width="396" border="0" cellpadding="0" cellspacing="2">
                                                <tr>
                                                  <td width="90"><div align="right"><span class="Estilo78">Unidad:</span></div></td>
                                                  <td width="306" bgcolor="#CCDDEE"><div id="demoIzq2">&nbsp;
                                                          <?php generaPaises(); ?>
                                                  </div></td>
                                                </tr>
                                                <tr>
                                                  <td bgcolor="#CCDDEE"><div align="right"><span class="Estilo78">RUT/Responsable:</span></div></td>
                                                  <td><div id="demo" style="width:248px;">
                                                      <table width="200" border="0" cellpadding="0" cellspacing="0">
                                                        <tr>
                                                          <td></td>
                                                        </tr>
                                                        <tr>
                                                          <td bgcolor="#CCDDEE"><div id="demoDer" class="Estilo64">
                                                              <select disabled="disabled" name="estados" id="estados" class="Estilo64" style="width:248px">
                                                                <option value="0">Selecciona opci&oacute;n...</option>
                                                              </select>
                                                          </div></td>
                                                        </tr>
                                                      </table>
                                                  </div></td>
                                                </tr>
                                              </table>
                                          </div></td>
                                        </tr>

                                        
                                        
                                        <tr>
                                          <td height="10" class="Estilo59"></td>
                                        </tr>
                                        <tr>
                                          <td height="17" bgcolor="#CCDDEE" class="Estilo59"><div align="center">
                                              <input name="enviar2" type="submit" class="Estilo59" style="cursor:pointer; width:90px;background-color:#4791C5;border:0px;margin:1px;padding:0px; font-weight: bold;" value="Aceptar" >
                                            &nbsp;&nbsp;&nbsp;&nbsp;
                                            <input name="cancelar2" type="reset" class="Estilo59" style="cursor:pointer; width:90px;background-color:#4791C5;border:0px;margin:1px;padding:0px; font-weight: bold;" value="Cancelar" >
                                          </div></td>
                                        </tr>
                                    </table></td>
                                  </tr>
                                  <tr>
                                    <td height="1" bgcolor="#74ABD3"></td>
                                  </tr>
                                </table>
                                <p align="center">&nbsp;</p>
                                <p align="center">&nbsp;</p>
                                <p align="center"><span class="Estilo64">
                                  <input name="usuario" type="hidden" class="Estilo64" style="width:120px" value="<? echo $nombre_ini;?>" />
                                  </span><span class="Estilo64">
                                  <input name="unidad" type="hidden" class="Estilo64" style="width:120px" value="<? echo $unidad_ini;?>" />
                                  <input name="id" type="hidden" class="Estilo64" style="width:120px" value="<? echo $id_unidad_ini;?>" />
                                    
                                    </span></p>
							</form>
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
<table style="position:absolute;top:168px;left:171px;"width="132" height="240" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td height="92"><script src="menu_sp.js"></script></td>
  </tr>
  <tr>
    <td></td>
  </tr>
</table>
</body>
</html>