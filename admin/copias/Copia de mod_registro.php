<?php
session_start();
if (!isset($_SESSION['paso_por_donde_yo_quiero']))
{ 
	header ("Location: index.php"); 
	exit; 
} 
$id_user=$_SESSION['id_user'];
$nombre=$_SESSION['nombre_ini']; 
$unidad1=$_SESSION['unidad_ini']; 
$id_unidad=$_SESSION['id_unidad']; 
include("../funciones1.php");
include("../php/fecha_hora.php"); 
$link=conexion();
$num=$_GET['reg'];
$consulta ="SELECT * FROM correspondencia where id_c = '$num'";
$resultado=mysql_query($consulta) or die ("Error de búsqueda en la BD: ". mysql_Error());
$numResultados = mysql_num_rows($resultado);   
$linea=mysql_fetch_array($resultado,MYSQL_BOTH);					
?>
<html>
<head>
<title>Chasqui Digital</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<LINK href="../javascript/estilos.css" type=text/css rel=stylesheet>
<LINK href="../javascript/estilo_noticias.css" type=text/css rel=stylesheet>
<SCRIPT language=JavaScript src="../javascript/fecha-hora_bc.js"></SCRIPT>
<SCRIPT language=javascript src="../javascript/barra_de_estado.js"></SCRIPT>
<SCRIPT language=JavaScript src="../fecha-hora_bc.js"></SCRIPT>
<SCRIPT language=JavaScript src="../javascript/funciones.js"></SCRIPT>
<script type="text/javascript" src="../Sothink DHTML Menu/Resource/js/stmenu.js"></script>
</head>
<body bottommargin="0" leftmargin="0" rightmargin="0" topmargin="0" bgcolor="#EDF7FF" onload=escrolea()>
<table style="position:absolute;left:110px;" width="780" border="0" align="center" cellspacing="0">
  <tr>
    <td width="270" height="28" bordercolor="0" background="../img/umsa_banner1.GIF"><div align="left"></div></td>
    <td width="510" height="28" bordercolor="0" background="../img/fondo_banner_rojo1.gif">
	<div align="right" class="Estilo30"><strong><font color="#ffffff">
      <SCRIPT>today();</SCRIPT>
  </font></strong></div></td>
  </tr>
  <tr>
    <td height="7" colspan="2" background="../img/fondo_delgado.gif"><img src="../admin/img/fondo_delgado.gif" width="2" height="4"></td>
  </tr>
  <tr>
    <td height="133" colspan="2"><table width="780" height="131" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="132" height="110" background="../img/encabezado_01.gif">
		<div align="center"><img src="../img/umsa_escudo1.gif" width="54" height="106"></div>		</td>
        <td width="25"><img src="../img/encabezado_03.gif" width="25" height="110"></td>
        <td width="445" background="../img/encabezado_04.gif"><div align="center"><img src="../img/chasqui_digital_azul2 copia.jpg" width="445" height="60"></div></td>
        <td width="28"><img src="../img/encabezado_06.gif" width="28" height="110"></td>
        <td width="150" background="../img/encabezado_01.gif"><div align="center"><img src="../imagenes/logotipo_chasqui.jpg" width="100" height="107"></div></td>
      </tr>
      <tr>
        <td width="132" height="21" background="../img/fondo_izq1.gif">&nbsp;</td>
        <td  width="498" colspan="3">
		<table width="492" height="19" border="0" align="right" cellpadding="1" cellspacing="0">
          <tr>
            <td width="482" height="18" bgcolor="#8fb1d2"></td>
            <td width="5"></td>
          </tr>
        </table></td>
        <td width="150"><table width="150" height="21" border="0" cellpadding="1" cellspacing="0">
          <tr>
            <td background="../img/fondo_der1.gif">&nbsp;</td>
          </tr>
        </table></td>
      </tr>      
	    </table>    </td>
  </tr>
  <tr>
    <td height="248" colspan="2"><table width="780" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td width="132" height="246" bgcolor="#8fb1d2">
			<table style="position:absolute;top:172px;left:3px;" width="132" height="265" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td height="92"><script src="menu_admin.js"></script></td>
              </tr>
              <tr>
                <td><p>&nbsp;</p>
                  <p>&nbsp;</p>
                  <p>&nbsp;</p></td>
              </tr>
            </table></td>
            <td width="648" height="200"><table width="644" height="246" border="2" align="right" cellpadding="0" cellspacing="0" bordercolor="#8fb1d2">
              <tr>
                <td background="../img/fondo_cuerpo.gif"><p class="Estilo51" align="left"><span class="Estilo77">&nbsp;&nbsp;Unidad: <? echo $unidad1; ?> <br>
&nbsp;&nbsp;Usuario: <? echo $nombre; ?> </span></p>
                <center>
                  <p align="center" class="Estilo77">
                    CORRESPONDENCIA RECIBIDA <br>
                  </p>
                </center>
                  <center><form name="mod_recibido" method="post" action="modificar_reg.php">
                    <table width="616" border="0" cellpadding="0" cellspacing="0">
                        <tr>
                          <td width="29" height="21" background="../img/encabezado_tabla_01.gif">&nbsp;</td>
                          <td width="558" background="../img/encabezado_tabla_02.gif"><div align="center" class="Estilo59">MODIFICAR DATOS GENERALES DEL TRAMITE</div></td>
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
                                <td width="110" height="15" class="Estilo78"><div align="right">Recibido por: </div></td>
                                <td width="244" height="15" bgcolor="#EDF7FF" class="Estilo65">&nbsp;
                                    <?php  echo $responsable=$linea["responsable"];?></td>
                                <td width="244" class="Estilo64">&nbsp;</td>
                              </tr>
                              <tr>
                                <td height="15" bgcolor="#CCDDEE" class="Estilo78"><div align="right">Tipo de Correspondencia:</div></td>
                                <td height="15" bgcolor="#EDF7FF" class="Estilo65">&nbsp;
                                    <?php  echo $tipo=$linea["tipo"];?>                                </td>
                                <td bgcolor="#CCDDEE" class="Estilo59">&nbsp;
                                    <select name="tipo" style="width:230px" class="Estilo64">
                                      <option>Actas Nomb. de Docentes</option>
                                      <option>Actas Nomb. de Auxiliares</option>
                                      <option>Actas Nomb. de Autoridades Academicas</option>
                                      <option>Actas HCU</option>
                                      <option>Cert. de Conclusion de Estudios</option>
                                      <option>Cert. Bachiller Superior</option>
                                      <option>Certificados</option>
                                      <option>Circulares</option>
                                      <option>Citaciones</option>
                                      <option>Informes de Extension de Titulo</option>
                                      <option>Informes de Legalizacion</option>
                                      <option>Invitaciones</option>
                                      <option>Memorandums</option>
                                      <option>Notas Recibidas</option>
                                      <option>Resoluciones Facultativas</option>
                                      <option>Resoluciones HCU</option>
                                      <option>Resoluciones HCF</option>
                                      <option>Solicitud de Compra</option>
                                      <option>Solicitud de Pago de Haberes</option>
                                      <option>Defensa de Tesis</option>
                                      <option>Convalidacion de Materias</option>
                                      <option>Conclusion de Materias</option>
                                      <option>Formularios de Vacacion</option>
                                      <option>Nomb. de Docentes</option>
                                      <option>Nomb. de Autoridades Academicas</option>
                                      <option>Nomb. de Auxiliares</option>
                                      <option selected></option>
                                  </select></td>
                              </tr>
                              <tr>
                                <td height="15"><div align="right"><span class="Estilo78">Procedencia:</span></div></td>
                                <td height="15" bgcolor="#EDF7FF" class="Estilo65">&nbsp; <?php echo $unidad=$linea["unidad"]; ?></td>
                                <td bgcolor="#CCDDEE" class="Estilo64">&nbsp;
                                  <select name="procedencia" style="width:230px" class="Estilo64">
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
                                    <option>Imprenta Universiatria</option>
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
                                    <option>Vicerrectorado</option>
                                    <option selected></option>
                                  </select></td>
                              </tr>
                              <tr>
                                <td bgcolor="#CCDDEE"><div align="right"><span class="Estilo78">Otro:</span></div></td>
                                <td height="15" bgcolor="#EDF7FF" class="Estilo65">&nbsp; </td>
                                <td background="../admin/img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;
                                      <input name="otro" value="" type="text" style="width:230px" class="Estilo64" onKeyPress="return solo_letras(event)" />
                                </span></td>
                              </tr>
                              <tr>
                                <td><div align="right"><span class="Estilo78">N&ordm; Reg. Externo:</span></div></td>
                                <td height="15" bgcolor="#EDF7FF" class="Estilo65">&nbsp; 
								<?php echo $correlativo=$linea["correlativo"];?></td>
                                <td background="../admin/img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;
                                      <input name="correlativo" type="text" style="width:230px" class="Estilo64" onKeyPress="return numeros_letras_especiales(event)" />
                                </span></td>
                              </tr>
                              <tr>
                                <td height="15" bgcolor="#CCDDEE" class="Estilo78"><div align="right">N&ordm; Hoja de Ruta: </div></td>
                                <td bgcolor="#EDF7FF" class="Estilo65">&nbsp; <?php echo $hoja_ruta=$linea["hoja_ruta"];?> </td>
                                <td background="../admin/img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;
                                      <input name="hoja_ruta" value=""type="text" style="width:230px" class="Estilo64" onKeyPress="return numeros_letras_especiales(event)" />
                                </span></td>
                              </tr>
                              <tr>
                                <td height="64" class="Estilo78"><div align="right">Referencias:</div></td>
                                <td height="64" bgcolor="#EDF7FF" class="Estilo65">
                                  <table width="230" height="62" border="0" align="center" cellpadding="0" cellspacing="0">
                                      <tr>
                                        <td bgcolor="#EDF7FF" class="Estilo65"><?php  echo $referencias=$linea["referencias"];?></td>
                                      </tr>
                                </table></td>
                                <td background="../admin/img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;
                                      <textarea style="width:230px; height:60px " name="referencias" class="Estilo7" onKeyPress="return numeros_letras_especiales(event)"></textarea>
                                </span></td>
                              </tr>
                              <tr>
                                <td height="15" bgcolor="#CCDDEE" class="Estilo78"><div align="right">N&ordm; Fojas: </div></td>
                                <td height="15" bgcolor="#EDF7FF" class="Estilo65">&nbsp;
                                    <?php  echo $fojas=$linea["fojas"];?>                                </td>
                                <td bgcolor="#CCDDEE" class="Estilo59">&nbsp;<span class="Estilo64">
                                  <input name="fojas" value=""type="text" style="width:230px" class="Estilo64" onKeyPress="return solo_numeros(event)" />
                                </span></td>
                              </tr>
                              <tr>
                                <td height="15" class="Estilo78"><div align="right">Destino:</div></td>
                                <td height="15" bgcolor="#EDF7FF" class="Estilo65">&nbsp;&nbsp;<?php  echo $destino=$linea["destino"];?>                                </td>
                                <td bgcolor="#CCDDEE" class="Estilo59">
                                  <p>
<? 
if($destino != $unidad1)
{
	$result=mysql_query("select nombre from  user  where id_unidad = '$id_unidad' order by nombre 
	ASC",$link);
	//Llenamos el combo
	echo '&nbsp;&nbsp;';
	if ($row = mysql_fetch_array($result))
	{ 
		echo '<select name= "destino" style="width:230px" class="Estilo64">';
		do { 
			if($row['nombre'] != $nombre)
    		   echo '<option value= "'.$row["nombre"].'">'.$row["nombre"].'</option>';
		} while ($row = mysql_fetch_array($result)); 
		echo '<option selected></option>';
		echo '</select>';
	}
	echo '<br><br>&nbsp;&nbsp;';
	$result=mysql_query("select nombre from  unidad order by nombre ASC",$link);
	//Llenamos el combo
	if ($row = mysql_fetch_array($result))
	{   
		echo '<select name= "destino" style="width:230px" class="Estilo64">';
		do { 
			if($row['nombre'] != $unidad1)
    		   echo '<option value= "'.$row["nombre"].'">'.$row["nombre"].'</option>';
		   } while ($row = mysql_fetch_array($result)); 
	   echo '<option selected></option>';
	   echo '</select>';
	}
}
?>
</p></td>
                              </tr>
                              <tr>
                                <td height="15" colspan="3" bgcolor="#CCDDEE" class="Estilo78"><div align="center">
                                 <input name="id_c" type="hidden" value="<? echo $num;?>" >
								  <input name="enviar" type="submit" class="Estilo59" style="width:90px;background-color:#4791C5;border:0px;margin:1px;padding:0px; font-weight: bold;" value="Aceptar" >
                                  &nbsp;&nbsp;&nbsp;&nbsp;
                                  <input name="cancelar" type="reset" class="Estilo59" style="width:90px;background-color:#4791C5;border:0px;margin:1px;padding:0px; font-weight: bold;" value="Cancelar" >
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
                    </form>
                  </center></td>
              </tr>
            </table></td>
          </tr>
    </table></td>
  </tr>
  
  <tr>
    <td colspan="2"><table width="780" height="20" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="15" height="20"><img src="../img/No_fondo1.gif" width="15" height="20"></td>
          <td width="750" background="../img/No_fondo2.gif">&nbsp;</td>
          <td width="15"><img src="../img/No_fondo3.gif" width="15" height="20"></td>
        </tr>
    </table></td>
  </tr>
</table>
</body>
</html>