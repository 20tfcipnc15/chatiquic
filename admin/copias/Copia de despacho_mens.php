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
$id_c = $_GET['id'];
include("../funciones1.php");
$link=conexion();

//Obtenemos el registro interno actual de la uidad para mostrarlo
$sql ="SELECT reg_int FROM recibido where id_c = '$id_c' and id_unidad = '$id_unidad'";
$res =mysql_query($sql) or die ("Error de búsqueda en la BD: ". mysql_Error());
$linea=mysql_fetch_array($res);
$reg_int=$linea["reg_int"]; 

//Obtenemos todos los datos del registro solicitado
$consulta ="SELECT * FROM correspondencia where id_c = '$id_c'";
$resultado=mysql_query($consulta) or die ("Error de búsqueda en la BD: ". mysql_Error());
$numResultados = mysql_num_rows($resultado);
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
<table style="position:absolute;left:110px;" width="780" border="0" align="center" cellspacing="0">
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
    <td height="248" colspan="2"><table width="780" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td width="132" height="246" bgcolor="#8fb1d2">
			<table width="132" height="246" border="0" cellpadding="0" cellspacing="0" align="center">
              <tr height="123">
                <td></td>
              </tr>
              <tr height="117">
                <td><table style="position:absolute;top:169px;left:3px;"width="132" height="240" border="0" cellpadding="0" cellspacing="0">
                  <tr>
                    <td height="92"><script src="menu_admin.js"></script></td>
                  </tr>
                  <tr>
                    <td><p>&nbsp;</p>
                        <p>&nbsp;</p>
                      <p>&nbsp;</p></td>
                  </tr>
                </table></td>
              </tr>
            </table></td>             
            <td width="498" rowspan="3"><div align="center">
              <table width="498" height="246" border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td width="2">&nbsp;</td>
                  <td width="494" bgcolor="#336699"><div align="center">
                    <table width="490" height="246" border="2" align="center" cellpadding="0" cellspacing="0" bordercolor="#8fb1d2">
                        <tr>
                                           <td background="../img/fondo_cuerpo.gif"><center>
                                             <p align="left" class="Estilo77">&nbsp;&nbsp;Unidad: <? echo $unidad; ?> <br>
&nbsp;&nbsp;Usuario: <? echo $nombre; ?> <br>
                                             </p>
                                             <p align="center" class="Estilo77">
                                               <?
if($numResultados>0)
{
	$i=0;
	$linea=mysql_fetch_array($resultado);
	$id_c=$linea["id_c"]; 
	$rut=$linea["rut"]; 
	$unidad=$linea["unidad"];
	$fecha=$linea["fecha"];
	$correlativo=$linea["correlativo"];
	$hoja_ruta=$linea["hoja_ruta"];
	$tipo=$linea["tipo"];
	$referencias=$linea["referencias"];
	$fojas=$linea["fojas"];    	
	$responsable=$linea["responsable"];  
	$destino=$linea["destino"];    			
	$i++;
?></p>
                                             <form name="form1" method="post" action="des_interno.php">
                                             <table width="400" height="21" border="0" cellpadding="0" cellspacing="0">
                                                 <tr>
                                                   <td width="29" height="21" background="../img/encabezado_tabla_01.gif">&nbsp;</td>
                                                   <td width="342" background="../img/encabezado_tabla_02.gif"><div align="center" class="Estilo59">CORRESPONDENCIA RECIBIDA </div></td>
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
                                                         <td height="15" bordercolor="#74ABD3"><div align="right"><span class="Estilo77">R.U.T.:</span></div></td>
                                                         <td><span class="Estilo77">&nbsp;&nbsp;&nbsp;<? echo $rut;?>
                                                               <input type="hidden" name="rut" value="<? echo $rut;?>">
                                                               <input type="hidden" name="id_c" value="<? echo $id_c;?>">
                                                         </span></td>
                                                       </tr>
                                                       <tr>
                                                         <td width="130" height="15" bordercolor="#74ABD3" bgcolor="#CCDDEE"><div align="right"><span class="Estilo78">Fecha y Hora de Ingreso:</span></div></td>
                                                         <td width="260" bgcolor="#CCDDEE">&nbsp;<span class="Estilo65">&nbsp;&nbsp;<? echo $fecha;?></span></td>
                                                       </tr>
                                                       <tr>
                                                         <td height="15"><div align="right"><span class="Estilo78">Procedencia:</span></div></td>
                                                         <td bgcolor="#CCDDEE" class="Estilo65">&nbsp;&nbsp;&nbsp;<? echo $unidad;?></td>
                                                       </tr>
                                                       <tr>
                                                         <td height="15" bgcolor="#CCDDEE"><div align="right" class="Estilo64">Tipo de Tr&aacute;mite: </div></td>
                                                         <td height="15" bgcolor="#CCDDEE" class="Estilo65">&nbsp;&nbsp;&nbsp;<? echo $tipo;?><span class="Estilo77">
                                                           <input type="hidden" name="tipo" value="<? echo $tipo;?>">
                                                         </span></td>
                                                       </tr>
                                                       <tr>
                                                         <td height="15"><div align="right"><span class="Estilo78">N&ordm; Reg. Externo:</span></div></td>
                                                         <td background="../admin_bueno/img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo65">&nbsp;&nbsp;&nbsp;<? echo $correlativo;?> <span class="Estilo77">
                                                           <input type="hidden" name="correlativo" value="<? echo $correlativo;?>">
                                                         </span></span></td>
                                                       </tr>
                                                       <tr>
                                                         <td height="15" bgcolor="#CCDDEE" class="Estilo78"><div align="right" class="Estilo78">N&ordm; Hoja de Ruta:</div></td>
                                                         <td background="../admin_bueno/img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo65">&nbsp;&nbsp;&nbsp;<? echo $hoja_ruta;?><span class="Estilo77">
                                                           <input type="hidden" name="hoja_ruta" value="<? echo $hoja_ruta;?>">
                                                         </span></span></td>
                                                       </tr>
                                                       <tr>
                                                         <td height="60" class="Estilo78"><div align="right" class="Estilo78">Referencias:</div></td>
                                                         <td background="../admin_bueno/img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><table width="250" height="60" border="0" align="right" cellpadding="0" cellspacing="0">
                                                             <tr>
                                                               <td><span class="Estilo65"><? echo $referencias;?><span class="Estilo77">
                                                                 <input type="hidden" name="referencias" value="<? echo $referencias;?>">
                                                               </span></span></td>
                                                             </tr>
                                                         </table></td>
                                                       </tr>
                                                       <tr bgcolor="#CCDDEE">
                                                         <td height="15" bgcolor="#CCDDEE"><div align="right"><span class="Estilo78">N&ordm; Fojas:</span></div></td>
                                                         <td background="../admin_bueno/img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo65">&nbsp;&nbsp;&nbsp;<? echo $fojas;?><span class="Estilo77">
                                                           <input type="hidden" name="fojas" value="<? echo $fojas;?>">
                                                         </span></span></td>
                                                       </tr>
                                                       <tr>
                                                         <td height="15"><div align="right" class="Estilo78">Enviado por:</div></td>
                                                         <td background="../admin_bueno/img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo65"> &nbsp;&nbsp;&nbsp;<? echo $responsable; ?></span></td>
                                                       </tr>
                                                       <tr>
                                                         <td height="15" bgcolor="#CCDDEE"><div align="right" class="Estilo78">Destino:</div></td>
                                                         <td background="../admin_bueno/img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo65"> &nbsp;&nbsp;&nbsp;<? echo $destino; ?></span></td>
                                                       </tr>
                                                       <tr>
                                                         <td height="15"><div align="right" class="Estilo78">Recibido  por:</div></td>
                                                         <td background="../admin_bueno/img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo65"> &nbsp;&nbsp;&nbsp;<? echo $nombre; ?></span></td>
                                                       </tr>
                                                       <tr>
                                                         <td height="10" colspan="2" class="Estilo59"><table width="390" border="0" cellpadding="0" cellspacing="2">
                                                             <tr>
                                                               <td width="130" height="10"></td>
                                                             </tr>
                                                             <tr>
                                                               <td height="15" bgcolor="#CCDDEE" class="Estilo37"><div align="right">Recibido:</div></td>
                                                               <td width="257" background="../admin_bueno/img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo65"> &nbsp;&nbsp;
                                                                     <input name="recibido" type="checkbox" id="recibido" value="true" checked>
                                                               </span></td>
                                                             </tr>
                                                             <? 
														   	$sql1="SELECT cargo FROM user WHERE id_user like '%$id_user%'";
															$result1 = mysql_query($sql1,$link);
															$linea=mysql_fetch_array($result1);
															$cargo=$linea["cargo"]; 
														    if($cargo == 'Mensajero')
															{
														   ?>
                                                             <? }?>
                                                         </table></td>
                                                       </tr>
                                                   </table></td>
                                                 </tr>
                                                 <tr>
                                                   <td height="1" bgcolor="#74ABD3"></td>
                                                 </tr>
                                               </table>
                                               <p><span class="Estilo65">Estado del tr&aacute;mite: </span>
                                                 <select name="estado" tyle="width:248px" class="Estilo64">
												 	<option>Iniciado</option>
													<option selected>En Proceso</option>
													<option>Concluido</option>
                                                 </select>
                                               </p>
                                               <table width="400" height="21" border="0" cellpadding="0" cellspacing="0">
                                                 <tr>
                                                   <td width="29" height="21" background="../img/encabezado_tabla_01.gif">&nbsp;</td>
                                                   <td width="342" background="../img/encabezado_tabla_02.gif"><div align="center" class="Estilo59">DESPACHAR LA CORRESPONDENCIA</div></td>
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
                                                   <td bgcolor="#B1CBE4"><table width="396" border="0" cellpadding="0" cellspacing="2">
                                                       <tr>
                                                         <td width="130"></td>
                                                       </tr>
                                                       <tr>
                                                         <td class="Estilo37"><div align="right">Comentario:</div></td>
                                                         <td bgcolor="#CCDDEE"><p><span class="Estilo7">
                                                             &nbsp;&nbsp;
															 <textarea style="width:248px; height:60px " name="comentario" class="Estilo64" onKeyPress="return numeros_letras_especiales(event)"></textarea>
                                                         </span> </p></td>
                                                       </tr>

                                                       <tr>
                                                         <td bgcolor="#CCDDEE" class="Estilo37"><div align="right">Asignaci&oacute;n:</div></td>
                                                         <td width="257" bgcolor="#CCDDEE">&nbsp;&nbsp;<? $result=mysql_query("select nombre from  user  where id_unidad = '$id_unidad' order by nombre ASC",$link);
//Llenamos el combo
if ($row = mysql_fetch_array($result))
{ 
	echo '<select name= "admin" style="width:248px" class="Estilo64">';
	echo '<option selected></option>';
	do {   
		 if($nombre != $row["nombre"])
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
														    if($cargo == 'Mensajero')
															{
														   ?>
														       <tr>
                                                         <td height="17" class="Estilo37"><div align="right" class="Estilo37">Despacho Externo: </div></td>
                                                         <td height="17" bgcolor="#CCDDEE" class="Estilo65">
														 &nbsp;&nbsp;<?
$result=mysql_query("select * from unidad order by nombre ASC",$link);
//Llenamos el combo
if ($row = mysql_fetch_array($result))
{ 
	echo '<select name= "unidad" style="width:248px" class="Estilo64">';
	echo '<option selected></option>';
	do { 
    	   echo '<option value= "'.$row["nombre"].'">'.$row["nombre"].'</option>';
	} while ($row = mysql_fetch_array($result)); 
	echo '</select>';
}
?>                                                         </td>
                                                       </tr>
														       <tr>
                                                                 <td bgcolor="#CCDDEE" class="Estilo37"><div align="right">Otro:</div></td>
														         <td bgcolor="#CCDDEE">&nbsp;
                                                                     <input style="width:248px" type="text" name="otro" class="Estilo64"></td>
											         </tr>
                                                       <tr>
                                                         <td bgcolor="#CCDDEE" class="Estilo37"><div align="right">Correlativo:</div></td>
                                                         <td bgcolor="#CCDDEE">&nbsp;
                                                           <input style="width:248px" type="text" name="correlativo_des" class="Estilo64"></td>
                                                       </tr>
                                                       <tr>
                                                         <td class="Estilo37"><div align="right">Hoja de ruta:</div></td>
                                                         <td bgcolor="#CCDDEE">&nbsp;
                                                           <input style="width:248px" type="text" name="hoja_ruta_des" class="Estilo64"></td>
                                                       </tr>
                                                       <? }?>
                                                       <tr>
                                                         <td>&nbsp;</td>
                                                         <td>&nbsp;</td>
                                                       </tr>
                                                       <tr>
                                                         <td colspan="2"><div align="center">
                                                             <input name="enviar22" type="submit" class="Estilo59" style="width:90px;background-color:#4791C5;border:0px;margin:1px;padding:0px; font-weight: bold;" value="Enviar" >
                                                           &nbsp;&nbsp;&nbsp;&nbsp;
                                                           <input name="cancelar22" type="reset" class="Estilo59" style="width:90px;background-color:#4791C5;border:0px;margin:1px;padding:0px; font-weight: bold;" value="Cancelar" >
                                                         </div></td>
                                                       </tr>
                                                   </table></td>
                                                 </tr>
                                                 <tr>
                                                   <td height="1" bgcolor="#74ABD3"></td>
                                                 </tr>
                                               </table>
                                             </form>
                                             <p align="left" class="Estilo77">&nbsp;</p>
                                           </center></td>
                        </tr>
                      </table>
					  
                                       </div></td>
                  <td width="2">&nbsp;</td>
                </tr>
              </table>
            </div></td>
            <td width="150" rowspan="3" bgcolor="#8fb1d2"><p>&nbsp;</p></td>
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
</body>
</html>
<?
}
?>