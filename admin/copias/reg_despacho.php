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
//$rut=$_GET['rut'];
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
<SCRIPT language=javascript src="../javascript/funciones.js"></SCRIPT>
<SCRIPT language=JavaScript src="../fecha-hora_bc.js"></SCRIPT>
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
    <td height="7" colspan="2" background="../img/fondo_delgado.gif"><img src="img/fondo_delgado.gif" width="2" height="4"></td>
  </tr>
  <tr>
    <td height="133" colspan="2"><table width="780" height="131" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="132" height="110" background="../img/encabezado_01.gif">
		<div align="center"><img src="../img/umsa_escudo1.gif" width="54" height="106"></div>		</td>
        <td width="25"><img src="../img/encabezado_03.gif" width="25" height="110"></td>
        <td width="445" background="../img/encabezado_04.gif"><div align="center">
		<img src="../img/chasqui_digital_azul2 copia.jpg" width="445" height="60"></div></td>
        <td width="28"><img src="../img/encabezado_06.gif" width="28" height="110"></td>
        <td width="150" background="../img/encabezado_01.gif"><div align="center"><img src="../imagenes/logotipo_chasqui.jpg" width="100" height="107"></div></td>
      </tr>
      <tr>
        <td width="132" height="21" background="../img/fondo_izq1.gif">&nbsp;</td>
        <td  width="498" colspan="3"><table width="492" border="0" align="right" cellpadding="0" cellspacing="0">
          <tr>
            <td width="482" height="21" background="../img/fondo_inf.gif"><table width="420" border="0" align="center" cellpadding="0" cellspacing="0" heigth="21">
                <tr>
                  <td width="207" height="21" class="Estilo40">&nbsp;Monoblok Central, Avenida Villazon N&deg; 1995</td>
                  <td width="36"><div align="center"><img src="../img/correo.gif" width="21" height="21"></div></td>
                  <td width="177"> <span class="Estilo34"><a href="mailto: hemeroteca@correo.umsa.bo" class="Estilo40">E-mail: dec_fcpn@yahoo.es</a></span></td>
                </tr>
              </table></td>
            <td width="8">&nbsp;</td>
          </tr>
        </table></td>
        <td width="150" background="../img/fondo_der1.gif">&nbsp;</td>
      </tr>      
	    </table>    </td>
  </tr>
  <tr>
    <td height="248" colspan="2"><table width="780" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td width="130" height="246" bgcolor="#8fb1d2">
			<table style="position:absolute;top:172px;left:3px;" width="132" height="100" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td height="66"><script src="menu_admin.js"></script></td>
              </tr>
              <tr>
                <td><p>&nbsp;</p>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
                <p>&nbsp;</p>                <p>&nbsp;</p></td>
              </tr>
              
            </table></td>
            <td width="498"><div align="center">
              <table width="498" height="246" border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td width="2">&nbsp;</td>
                  <td width="494" bgcolor="#336699"><div align="center">
                    <table width="490" height="246" border="2" align="center" cellpadding="0" cellspacing="0" bordercolor="#8fb1d2">
                        <tr>
                                           <td background="../img/fondo_cuerpo.gif"><center>
                                             <form name="registro_recibida" method="post" action="despacho_save.php">
                                               <p class="Estilo51" align="left"><span class="Estilo77">&nbsp;&nbsp;Unidad: <? echo $unidad; ?> <br>
&nbsp;&nbsp;Usuario: <? echo $nombre; ?> </span></p>
                                               <p class="Estilo77">Por favor ingrese los siguientes datos:</p>
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
                       <select name="tipo" style="width:248px" class="Estilo64">
                                                                <option>Certificados</option>
                                                                <option>Circulares</option>
                                                                <option>Citaciones</option>
																<option>Descargo Caja Chica</option>
																<option>Descargo Fondo en Avance</option>
                                                                <option>Informes de Extension de Titulo</option>
                                                                <option>Informes de Legalizacion</option>
                                                                <option>Invitaciones</option>
                                                                <option>Memorandums</option>
                                                                <option selected>Notas Despachadas</option>
                                                                <option>Resoluciones HCU</option>
															    <option>Resoluciones Rectorales</option>	
                                                                <option>Resoluciones HCF</option>
                                                                <option>Defensa de Tesis</option>
                                                                <option>Convalidacion de Materias</option>
                                                                <option>Conclusion de Materias</option>
                                                                <option>Formularios de Vacacion</option>
                                                                <option>Nomb. de Docentes</option>
                                                                <option>Nomb. de Autoridades Academicas</option>
                                                                <option>Nomb. de Auxiliares</option>
																<option>Solicitud de Compra</option>
																<option>Solicitud de Fondo en Avance</option>
																<option>Traspaso Presupuestario</option>
                                                            </select></td>
                                                       </tr>
                                                       <tr>
                                                         <td height="15" bgcolor="#CCDDEE"><div align="right"><span class="Estilo78">Dirigido:</span><span class="Estilo74"></span></div></td>
                                                         <td bgcolor="#CCDDEE" class="Estilo64">&nbsp;										 
                                                             <select name="destino" style="width:248px" class="Estilo64">
                                                               <option selected></option>
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
                                                               <option>Vicerrectorado</option>
                                                           </select></td>
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
                                                           <input name="hoja_ruta" value=""type="text" style="width:248px" class="Estilo64" onKeyPress="return solo_numeros(event)" />
                                                         </span></td>
                                                     </tr>


                                                       <tr>
                                                         <td height="60" bgcolor="#CCDDEE" class="Estilo78"><div align="right" class="Estilo78">Referencias:</div></td>
                                                         <td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;
                                                               <textarea style="width:248px; height:60px " name="referencias" class="Estilo7" onKeyPress="return numeros_letras_especiales(event)"></textarea>
                                                         </span></td>
                                                       </tr>
                                                       <tr>
                                                         <td height="15" bgcolor="#CCDDEE"><div align="right"><span class="Estilo78">N&ordm; Fojas:</span></div></td>
                                                         <td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;
                                                               <input name="fojas" type="text" class="Estilo64" id="fojas" style="width:248px" onKeyPress="return numeros_letras(event)"/>
                                                         </span></td>
                                                       </tr>
                                                       <tr>
                                                         <td height="15"><div align="right"><span class="Estilo78">Enviado por: </span><span class="Estilo74"></span></div></td>
                                                         <td bgcolor="#CCDDEE" class="Estilo65">&nbsp;&nbsp;&nbsp;<? echo $nombre;?></td>
                                                       </tr>												  
                                                       <tr>
                                                         <td height="10" colspan="2" class="Estilo59"></td>
                                                       </tr>
                                                       <tr>
                                                         <td height="17" colspan="2" bgcolor="#CCDDEE" class="Estilo59"><div align="center">
                                                             <input name="enviar3" type="submit" class="Estilo59" style="width:90px;background-color:#4791C5;border:0px;margin:1px;padding:0px; font-weight: bold;" value="Enviar Datos" >
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
                                               <p>&nbsp;</p>
                                               <p>&nbsp;</p>
                                             </form>
                          </center></td>
                        </tr>
                      </table>
                                       </div></td>
                  <td width="2">&nbsp;</td>
                </tr>
              </table>
            </div></td>
            <td width="150" height="200" bgcolor="#8fb1d2">&nbsp;</td>
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