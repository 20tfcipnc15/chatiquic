<?php
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
$unidad1=$_SESSION['unidad_ini']; 
$id_unidad=$_SESSION['id_unidad']; 

//nos conectamos con la Base de Datos
include("../funciones1.php");
$link=conexion();

//Capturamos los valores para realizar la búsqueda respectiva
$correlativo= $_POST['correlativo'];
$unidad = $_POST['unidad'];
$hoja_ruta= $_POST['hoja_ruta'];   
$referencias= $_POST['referencias'];
$tipo= $_POST['tipo'];
$otro= $_POST['otro'];
$fecha= $_POST['fecha'];
$rut= $_POST['rut'];
$responsable= $_POST['responsable'];

//Si los campos de texto estan vacios cambiamos los valores, para que no tengan ninguna coincidencia
if($unidad==null)
	$unidad=$otro;
if($fecha==null)
	$fecha='nada';
if($correlativo==null)
	$correlativo='nada';
if($unidad==null)
	$unidad='nada';
if($hoja_ruta==null)
	$hoja_ruta='nada';
if($referencias==null)
	$referencias='nada';
if($tipo==null)
	$tipo='nada';
if($rut==null)
	$rut='nada';
if($responsable==null)
	$responsable='nada';

/*$consulta ="SELECT cargo FROM user WHERE id_user = $id_user";
$resultado=mysql_query($consulta) or die ("Error de búsqueda en la BD: ". mysql_Error());
$numResultados = mysql_num_rows($resultado);   					
$linea=mysql_fetch_array($resultado);
$cargo=$linea['cargo'];*/
/*if ($cargo == 'Mensajero')
{*/
$consulta ="SELECT * FROM correspondencia WHERE (rut like '%$rut%' or tipo like '%$tipo%' or unidad like '%$unidad%' or referencias like '%$referencias%' or correlativo like '%$correlativo%' or hoja_ruta like '%$hoja_ruta%' or fecha like '%$fecha%') and responsable like '%$nombre%' order by id_c ASC";
//$consulta ="SELECT * FROM correspondencia WHERE (rut like '$rut' or tipo like '%$tipo%' or unidad like '$unidad' or referencias like '%$referencias%' or correlativo like '%$correlativo%' or hoja_ruta like '%$hoja_ruta%' or fecha like '%$fecha%') and responsable like '%$nombre%' order by id_c ASC";
$resultado=mysql_query($consulta) or die ("Error de búsqueda en la BD: ". mysql_Error());
$numResultados = mysql_num_rows($resultado); 
/*}
else
{
$consulta ="SELECT * FROM correspondencia WHERE (rut like '%$rut%' or tipo like '%$tipo%' or unidad like '%$unidad%' or referencias like '%$referencias%' or correlativo like '%$correlativo%' or hoja_ruta like '%$hoja_ruta%' or fecha like '%$fecha%') and responsable like '%$nombre%' order by id_c ASC";
$resultado=mysql_query($consulta) or die ("Error de búsqueda en la BD: ". mysql_Error());
$numResultados = mysql_num_rows($resultado);   					
}*/
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
        <td  width="498" colspan="3"><table width="492" border="0" align="right" cellpadding="0" cellspacing="0">
          <tr>
            <td width="482" height="21" background="../img/fondo_inf.gif"><table width="420" border="0" align="center" cellpadding="0" cellspacing="0" heigth="21">
                <tr>
                  <td width="207" height="21" class="Estilo40">&nbsp;Monoblok Central, Avenida Villazon N&deg; 1995</td>
                  <td width="36"><div align="center"><img src="../img/correo.gif" width="21" height="21"></div></td>

                  <td width="177"><span class="Estilo34"><a href="mailto: dec_fcpn@yahoo.com" class="Estilo40">E-mail: dec_fcpn@yahoo.es</a></span></td>
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
                <td background="../img/fondo_cuerpo.gif"><center>

                      <p align="left" class="Estilo51"><span class="Estilo77">&nbsp;&nbsp;&nbsp;&nbsp;Unidad: <?php echo $unidad1;?><br>
&nbsp;&nbsp;&nbsp;&nbsp;Usuario: <? echo $nombre; ?> </span></p>
                      <p class="Estilo51">Se han encontrado <?php echo $numResultados;?> coincidencias.</p>
                      <table width="630" border="0" cellpadding="0" cellspacing="0">
                        <tr>
                          <td width="29" height="21" background="../img/encabezado_tabla_01.gif">&nbsp;</td>
                          <td width="572" background="../img/encabezado_tabla_02.gif"><div align="center" class="Estilo59">DATOS GENERALES DEL TR&Aacute;MITE </div></td>
                          <td width="29" background="../img/encabezado_tabla_04.gif">&nbsp;</td>
                        </tr>
                        <tr>
                          <td height="2" colspan="3"></td>
                        </tr>
                      </table>
                      <table width="630" border="0" cellpadding="0" cellspacing="2" bgcolor="#74ABD3">
                        <tr>
                          <td></td>
                        </tr>
                        <tr>
                          <td bgcolor="#B1CBE4"><table width="626" border="0" align="center" cellpadding="0" cellspacing="2" bordercolor="#EDF7FF">
                              <tr>
                                <td width="38" height="15" bgcolor="#4791C5" class="Estilo2"><div align="center">R.U.T.</div></td>           
								<td width="102" height="15" bgcolor="#4791C5" class="Estilo2"><div align="center">Fecha Ingreso</div></td>
                                <td width="77" bgcolor="#4791C5"><div align="center" class="Estilo2">Procedencia</div></td>
                                <td width="69" bgcolor="#4791C5"><div align="center" class="Estilo2">Correlativo</div></td>
                                <td width="93" bgcolor="#4791C5"><div align="center" class="Estilo2">Referencias</div></td>
                                <td width="81" bgcolor="#4791C5"><div align="center" class="Estilo2">Recibido por</div></td>
                                <td width="72" bgcolor="#4791C5"><div align="center" class="Estilo2">Modificar</div></td>
<!--                                <td width="76" bgcolor="#4791C5"><div align="center" class="Estilo2">Eliminar</div></td>-->
                              </tr>
                              <?php 
													if($numResultados>0)
													{
													   while($linea=mysql_fetch_array($resultado))
														{
															$fecha=$linea["fecha"];
															$correlativo=$linea["correlativo"];
															$unidad=$linea["unidad"];
															$referencias=$linea["referencias"];
															$responsable=$linea["responsable"];    
															$hoja_ruta=$linea["hoja_ruta"];  
															$tipo=$linea["tipo"];
															$rut=$linea["rut"];
															$fojas=$linea["fojas"];
															$id_c=$linea["id_c"];
													    echo '
                                                         <tr>
                                                         <td height="50" bgcolor="#E1F1FF" class="Estilo78"><center>'; 
														 echo $rut; 
														 echo '</center></td>
                                                         <td height="50" bgcolor="#E1F1FF" class="Estilo78"><center>'; 
														 echo $fecha; 
														 echo '</center></td>
														 <td height="50" bgcolor="#E1F1FF" class="Estilo78"><center>'; 
														 echo $unidad; 
														 echo '</center></td>
                                                         <td height="50" bgcolor="#E1F1FF" class="Estilo78"><center>'; 
														 echo $correlativo; 
														 echo '</center></td>
                                                         <td height="50" bgcolor="#E1F1FF" class="Estilo78"><center>';
														 echo $referencias;
														 echo'</center></td>
                                                         <td height="50" bgcolor="#E1F1FF" class="Estilo78"><center>';
														 echo $responsable;
														 echo'</center></td>
														 <td height="50" bgcolor="#E1F1FF" class="Estilo78"><center>
														 <input src="../img/editar.gif" width="30" height="27" type="image" value="modificar" border="0" hspace="1" 
														 onClick="modificar('?><?php echo $id_c; ?> <?php echo');"><br>'; ?>
														 <? 
														 echo '<a href="mod_registro.php?reg='.$id_c.'">Modificar</a>';
														 ?>
														 <? echo'
														 </center></td>
														 <!--<td height="50" bgcolor="#E1F1FF" class="Estilo78"><center>
														 <input src="../img/eliminar.gif" width="26" height="27" type="image"  value="eliminar" border="0" hspace="1">
														 <br>
														 <a href="#">Eliminar</a>												
														 </center></td> -->
                                                       </tr>';
													}
												}
												?>
                              <tr>
                                <td height="15" colspan="10" bgcolor="#CCDDEE" class="Estilo78"><div align="center">
                                    <input onClick="window.close();" class="Estilo59" name="submit" type="submit" style="background-color:#4791C5;border:0px;margin:1px;padding:0px; font-weight: bold;" value="   Salir   ">
                                </div></td>
                              </tr>
                              <tr>
                                <td height="15" colspan="10" class="Estilo78">&nbsp;</td>
                              </tr>
                          </table></td>
                        </tr>
                        <tr>
                          <td height="1" bgcolor="#74ABD3"></td>
                        </tr>
                      </table>

	                  &nbsp;
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

<map name="Map">
<area shape="rect" coords="-1,0,28,29" href="../admin/eliminar_reg.php">
</map>
<map name="Map2">
<area shape="rect" coords="1,0,32,27" href="../admin/modifica_regr.php">
</map></body>
</html>
<?
/* <td height="50" bgcolor="#E1F1FF" class="Estilo78"><center>
														 <input src="../img/eliminar.gif" width="26" height="27" type="image"  value="eliminar" border="0" hspace="1" onClick="eliminar_res('?><?php echo $pa_reg_interno; ?> <?php echo ');"><br>
														  <a href="eliminar_recibido.php">Eliminar</a>												
														 </center></td> */
?>