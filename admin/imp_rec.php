<?php
session_start();
if (!isset($_SESSION['paso_por_donde_yo_quiero']))
{ 
	header ("Location: index.php"); 
	exit; 
} 
$id_user=$_SESSION['id_user'];
$nombre=$_SESSION['nombre_ini']; 
$unidad_ini=$_SESSION['unidad_ini']; 
$id_unidad=$_SESSION['id_unidad']; 
include("../funciones1.php");
include("../php/funciones.php");
include ("../php/fecha_hora.php");
include ('tiempo_tramite.php');
$fecha_sol = fecha();
$link=conexion();
$rut = $_GET['reg'];
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
<script language="javascript">
function seleccionar_todo(){ 
   for (i=0;i<document.f1.elements.length;i++) 
      if(document.f1.elements[i].type == "checkbox") 
         document.f1.elements[i].checked=1 
} 
function deseleccionar_todo(){ 
   for (i=0;i<document.f1.elements.length;i++) 
      if(document.f1.elements[i].type == "checkbox") 
         document.f1.elements[i].checked=0 
} 
function valores(f, cual) 
{
// todos = new Array();
/* for (var i = 0, total = f[cual].length; i < total; i++)
 {
   if (f[cual][i].checked) 
   {   
   	    todos[todos.length] = f[cual][i].value;
	    var arv = todos.toString();
   }
 }*/
 var arv = cual;
window.open("imprimir_save_d.php?cad="+arv,"",'width=900,height=680,left=1, top=0,toolbar=0,scrollbars=0,statusbar=0,menubar =0,resizable=1');
window.top.location.href = "imprimir_registros.php";
}
function valores_r(f, cual) 
{
 todos = new Array();
 for (var i = 0, total = f[cual].length; i < total; i++)
 {
   if (f[cual][i].checked) 
   {   
   	    todos[todos.length] = f[cual][i].value;
	    var arv = todos.toString();
   }
 }
window.open("imprimir_save_r.php?cad="+arv,"",'width=900,height=680,left=1, top=0,toolbar=0,scrollbars=0,statusbar=0,menubar =0,resizable=1');
window.top.location.href = "imprimir_registros.php";
}
///////
function valoresdt(f, cual)
{
 todos = new Array();
 for (var i = 0, total = f[cual].length; i < total; i++)
 {
   if (f[cual][i].checked) 
   {   
   	    todos[todos.length] = f[cual][i].value;
	    var arv = todos.toString();
   }
 }
window.open("imprimir_save_dt.php?cad="+arv,"",'width=900,height=680,left=1, top=0,toolbar=0,scrollbars=0,statusbar=0,menubar =0,resizable=1');
window.top.location.href = "imprimir_registros.php";
}
</script>
<script language="javascript">
function ventanaNueva(documento)
{
   window.open(documento,'nuevaVentana','width=900', 'height=680');
}
</script>
<style type="text/css">
<!--
.Estilo2 {font-family: Arial, Helvetica, sans-serif; font-size: 14px; color: #FFFFFF;}
.Estilo3 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	color: #FFFFFF;
	font-weight: bold;
}
-->
</style>
<head>
<title>Chasqui Digital</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<body bottommargin="0" leftmargin="0" rightmargin="0" topmargin="0" bgcolor="#EDF7FF" onload=escrolea()>
<table width="780" border="0" cellspacing="0">
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
			<table style="position:absolute;top:172px;left:1px;" width="132" height="265" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td height="92"><script src="menu_admin.js"></script></td>
              </tr>
              <tr>
                <td><p>&nbsp;</p>
                  <p>&nbsp;</p>
                  <p>&nbsp;</p></td>
              </tr>
            </table></td>
            <td width="648" height="200"><table width="646" height="246" border="0" align="right" cellpadding="0" cellspacing="0">
              <tr>
                <td width="490" background="../img/fondo_cuerpo.gif"><center>
                  <table width="494" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#8fb1d2">
                    <tr>
                      <td><p align="left" class="Estilo51"><span class="Estilo77"><br>&nbsp;&nbsp;&nbsp;&nbsp;Unidad: <?php echo $unidad_ini;?><br>
                        &nbsp;&nbsp;&nbsp;&nbsp;Usuario: <? echo $nombre; ?> </span></p>
                          <p align="center" class="Estilo77">&nbsp;&nbsp;&nbsp;&nbsp;Se han encontrado <?php echo $numResultados;?> coincidencias. </p>
                        <table width="470" border="0" align="center" cellpadding="0" cellspacing="0">
                            <tr>
                              <td width="29" height="21" background="../img/encabezado_tabla_01.gif">&nbsp;</td>
                              <td width="412" background="../img/encabezado_tabla_02.gif"><div align="center" class="Estilo59">IMPRIMIR REGISTROS DE CORRESPONDENCIA</div></td>
                              <td width="29" background="../img/encabezado_tabla_04.gif">&nbsp;</td>
                            </tr>
                            <tr>
                              <td height="2" colspan="3"></td>
                            </tr>
                          </table>
                        <table width="470" border="0" align="center" cellpadding="0" cellspacing="2" bgcolor="#74ABD3">
                            <tr>
                              <td></td>
                            </tr>
                          <form name="f1">
                          
                          <tr>
                            <td bgcolor="#B1CBE4"><table width="466" border="0" align="center" cellpadding="0" cellspacing="2" bordercolor="#EDF7FF">
                              <tr>
                                <td width="30" height="15" bgcolor="#4791C5" class="Estilo2"><div align="center">No</div></td>
                                <td width="120" height="15" bgcolor="#4791C5" class="Estilo2"><div align="center">Fecha</div></td>
                                <td width="230" height="15" bgcolor="#4791C5" class="Estilo2"><div align="center">R.U.T.</div></td>
                                <td width="70" height="15" bgcolor="#4791C5" class="Estilo2"><div align="center">Imprimir</div></td>
                              </tr>
<?
$sqlr = "SELECT rut,fecha_sol,tipo FROM reportes WHERE responsable like '$nombre' and fecha_sol like '%$fecha_sol%'";
$resr = mysql_query($sqlr) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
$numr = mysql_num_rows($resr);
$j=0;
while($linea=mysql_fetch_array($resr))
{  	
	$j++;
	$rut = $linea["rut"];
	$fecha = $linea["fecha_sol"];
	
			echo "
	    	<tr onMouseOver='this.style.backgroundColor='#FF9900';this.style.cursor='hand';' 
			onMouseOut='this.style.backgroundColor='#CC6666''o'];'>";
	        echo '<td height="50" width = "30" bgcolor="#E1F1FF" class="Estilo78"><div align="center">'; 
			echo $j; 
			echo '</div></td>';
		    echo '<td height="12" width = "120" bgcolor="#E1F1FF" class="Estilo78"><center>'; 
			echo $fecha;
			echo '</center></td>';
	        echo '<td height="50" width = "230" bgcolor="#E1F1FF" class="Estilo78"><div align="left">'; 
			echo $rut; 
			echo '</div></td>';
	        echo '<td height="50" width = "70" bgcolor="#E1F1FF" class="Estilo78"><center>'; 
			?>
			<input type='button' value='Imprimir' onClick="ventanaNueva('imp_bloque.php?cad=<? echo $rut?>')" class='Estilo78' 	 	
			style='width:60px;background-color:#E1F1FF;border:0px;margin:1px;padding:0px; font-weight: bold; cursor:pointer'/>
			<? echo '</center></td>		
	</tr>';
}
?>

                              <tr>
                                <td align="" height="7" colspan="12" bgcolor="#CCDDEE" class="Estilo78"></td>
                              </tr>
                              <tr>
                                <td height="15" colspan="12" class="Estilo78">                   </td>
                              </tr>
                            </table></td>
                          </tr>
                          <tr>
                            <td height="1" bgcolor="#74ABD3"></td>
                          </tr>
                          </table>
                        <br></td>
                    </tr>
                  </table>
                </center></td>
                <td width="2"></td>
                <td width="150" bgcolor="#8fb1d2">&nbsp;</td>
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