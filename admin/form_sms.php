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
include("../funciones1.php");
$link=conexion();
/*$sql = "SELECT nombre FROM user WHERE usuario like '%$user%' and contrasenia like '%$cod%'"; 
$resp=mysql_query($sql);
$num = mysql_num_rows($resp);
	if($num>0)
	{
		$linea=mysql_fetch_array($resp);
		$nom=$linea["nombre"]; 
	}*/
?>
<html>
<head>
<title>Chasqui Digital</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<LINK href="../javascript/estilos.css" type=text/css rel=stylesheet>
<LINK href="../javascript/estilo_noticias.css" type=text/css rel=stylesheet>
<SCRIPT language=JavaScript src="../javascript/funciones.js"></SCRIPT>
<SCRIPT language=JavaScript src="../javascript/fecha-hora_bc.js"></SCRIPT>
<SCRIPT language=javascript src="../javascript/barra_de_estado.js"></SCRIPT>
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
                  <td width="177"><span class="Estilo34"><a href="mailto: hemeroteca@correo.umsa.bo" class="Estilo40">E-mail: dec_fcpn@yahoo.es</a></span></td>
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
			<table style="position:absolute; top:172px; left:3px;" width="132" height="246" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td height="92"><script src="menu_admin.js"></script></td>
              </tr>
              <tr>
                <td><p>&nbsp;</p>
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
                                             <form name="registro_recibida" method="post" action="../admin/enviar_sms.php">
                                               <p class="Estilo51">&nbsp;</p>
                                               <p class="Estilo51">Por favor ingrese los  siguientes datos:</p>
                                               <table width="270" height="21" border="0" cellpadding="0" cellspacing="0">
                                                 <tr>
                                                   <td width="29" height="21" background="../img/encabezado_tabla_01.gif">&nbsp;</td>
                                                   <td width="212" background="../img/encabezado_tabla_02.gif"><div align="center" class="Estilo59">ENVIO DE NOTIFICACION SMS </div></td>
                                                   <td width="29" background="../img/encabezado_tabla_04.gif">&nbsp;</td>
                                                 </tr>
                                                 <tr>
                                                   <td height="2" colspan="3"></td>
                                                 </tr>
                                               </table>
                                               <table width="270" border="0" align="center" cellpadding="0" cellspacing="2" bgcolor="#74ABD3">
                                                 <tr>
                                                   <td width="362"></td>
                                                 </tr>
                                                 <tr>
                                                   <td height="10" bgcolor="#B1CBE4"><table width="266" border="0" align="center" cellpadding="0" cellspacing="2">
                                                       <tr>
                                                         <td height="10" colspan="3" bordercolor="#74ABD3" bgcolor="#CCDDEE"></td>
                                                       </tr>
                                                       <tr>
                                                         <td width="67" height="15"><div align="right"><span class="Estilo78">Movil:</span></div></td>
                                                         <td width="65" background="../admin/img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;
                                                           <select name="num" id="num" style="width:50px">
                                                             <option>796</option>
															 <option>706</option>
															 <option>705</option>
															 <option>704</option>
															 <option>703</option>
															 <option>702</option>
                                                             <option>701</option>
                                                             <option>76</option>
                                                             <option>77</option>
                                                           </select>
                                                         </span></td>
                                                         <td width="126" background="../admin/img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><div align="left"><span class="Estilo64">&nbsp;&nbsp;
                                                         <input name="para" type="text" class="Estilo64" id="para" style="width:100px" />
                                                         </span></div></td>
                                                       </tr>
													   <tr>
                                                         <td height="70" class="Estilo78"><div align="right" class="Estilo78">Mensaje:</div></td>
                                                         <td colspan="2" background="../admin/img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;
                                                           <textarea name="mensaje" class="Estilo7" id="mensaje" style="width:170px; height:70px "></textarea>
                                                         </span></td>
                                                       </tr>                                                       
                                                       <tr>
                                                         <td height="10" bgcolor="#CCDDEE"></td>
                                                         <td height="15" colspan="2" bgcolor="#CCDDEE" class="Estilo59"></td>
                                                       </tr>
                                                       <tr>
                                                         <td height="10" colspan="3" class="Estilo59"></td>
                                                       </tr>
                                                       <tr>
                                                         <td height="17" colspan="3" bgcolor="#CCDDEE" class="Estilo59"><div align="center">
                                                             <input name="enviar" type="submit" class="Estilo59" style="width:90px;background-color:#4791C5;border:0px;margin:1px;padding:0px; font-weight: bold;" value="Enviar SMS" >&nbsp;&nbsp;&nbsp;&nbsp;
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
                                               &nbsp;
                                               <p><span class="Estilo64">
                                                 <?php include ("../php/fecha_hora.php"); 
																 $fecha=fecha_hora(); 
											  	 ?>
                                                 <INPUT TYPE="HIDDEN" NAME="fecha" VALUE="<? echo $fecha;?>">
                                                 <span class="Estilo65">
                                                 <input name="de" type="hidden" style="width:248px" class="Estilo64" value ="<? echo $nombre;?>"/>
                                               </span></p>
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
 <?php 
//include("recibido_guardar.php");
?>