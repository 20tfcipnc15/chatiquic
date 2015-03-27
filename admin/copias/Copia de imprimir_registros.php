<?php
session_start();
if (!isset($_SESSION['paso_por_donde_yo_quiero']))
{ 
	header ("Location: index.php"); 
	exit; 
} 
include ("../php/fecha_hora.php");
//$fecha_solicitud = fecha_hora(); 
$id_user=$_SESSION['id_user'];
$nombre=$_SESSION['nombre_ini']; 
$unidad=$_SESSION['unidad_ini']; 
$id_unidad=$_SESSION['id_unidad']; 
include("../funciones1.php");
include("../php/funciones.php");
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
</script>
<script type="text/javascript">
function valores(f, cual) 
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
window.top.location.href = "imprimir_save.php?cad="+arv;
}
</script>
</head>
<form name="f1">
<body bottommargin="0" leftmargin="0" rightmargin="0" topmargin="0" bgcolor="#EDF7FF" onload=escrolea() oncontextmenu="return false">
<table style="position:absolute; left:110px; height: 419px;" width="1000" border="0" align="center" cellspacing="0">
  <tr>
    <td width="270" height="28" bordercolor="0" background="../img/umsa_banner1.GIF"><div align="left"></div></td>
    <td width="710" height="28" bordercolor="0" background="../img/fondo_banner_rojo1.gif"><div align="right" class="Estilo13">
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
              <td width="133"><table style="position:absolute; top:171px; left:4px; width: 129px; height: 137px;"width="132" height="240" border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td width="132" height="92"><script src="menu_admin.js"></script></td>
                </tr>
              </table></td>
              <td width="717" bgcolor="#EDF7FF"><table width="711" height="246" border="2" align="center" cellpadding="0" cellspacing="0" bordercolor="#8fb1d2">
                <tr>
                  <td width="705" background="../img/fondo_cuerpo.gif"><p align="left" class="Estilo77">&nbsp;&nbsp;Unidad: <?php echo $unidad;?><br>
  &nbsp;&nbsp;&nbsp;&nbsp;Usuario: <? echo $nombre; ?></p>
                    <p align="center" class="Estilo77"> 
                      &nbsp;&nbsp;&nbsp;&nbsp;Se han encontrado <?php echo $numResultados;?> coincidencias.                    </p>
                     <table width="700" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td width="29" height="21" background="../img/encabezado_tabla_01.gif">&nbsp;</td>
                        <td width="642" background="../img/encabezado_tabla_02.gif"><div align="center" class="Estilo59">CORRESPONDENCIA RECIBIDA </div></td>
                        <td width="29" background="../img/encabezado_tabla_04.gif">&nbsp;</td>
                      </tr>
                      <tr>
                        <td height="2" colspan="3"></td>
                      </tr>
                    </table>
                    <table width="700" border="0" align="center" cellpadding="0" cellspacing="2" bgcolor="#74ABD3">
                   
                      <tr>
                        <td bgcolor="#B1CBE4"><table width="696" border="0" align="center" cellpadding="0" cellspacing="2" bordercolor="#EDF7FF">
					  <tr>
                        <td width="59" height="15" bgcolor="#4791C5" class="Estilo2"><div align="center">Imprimir</div></td>
                        <td width="60" height="15" bgcolor="#4791C5" class="Estilo2"><div align="center">R.U.T.</div></td>
                        <td width="116" height="15" bgcolor="#4791C5" class="Estilo2"><div align="center">Fecha Ingreso </div></td>
                        <td width="93" bgcolor="#4791C5"><div align="center" class="Estilo2">Correlativo</div></td>
						<td width="140" bgcolor="#4791C5"><div align="center" class="Estilo2">Procedencia</div></td>
                        <td width="214" bgcolor="#4791C5"><div align="center" class="Estilo2">Referencias</div></td>
                      </tr>
<?
$fecha_solicitud = '27 OCT 2008';
$sql = "SELECT * FROM correspondencia WHERE fecha like '%$fecha_solicitud%' and destino like '$unidad' ORDER BY id_c ASC";
$resp = mysql_query($sql);
$num = mysql_num_rows($resp); 
if ($num > 0) 					
{	
	while($linea=mysql_fetch_array($resp))
	{
		$i++;
	    $fecha=$linea["fecha"];
		$rut=$linea["rut"];
	 	$procedencia=$linea["unidad"];
		$referencias=$linea["referencias"];
		$hoja_ruta=$linea["hoja_ruta"];  
   		$correlativo=$linea["correlativo"];
		$comentario=$linea["comentario"];

		$sqlr = "SELECT rut FROM reportes WHERE rut like '%$rut%' and responsable like '$nombre' and id_uni = '$id_unidad'";
		$resr = mysql_query($sqlr) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
		$numr = mysql_num_rows($resr);
		if($numr <= 0)
		{
			echo '
		    <tr>';
			echo '<td height="35" width="59" bgcolor="#E1F1FF" class="Estilo78"><center>'; 
			echo '<input type="checkbox" name="t[]" value="'.$rut.'">';
			echo '</center></td>';
            echo '<td height="35" width="60" bgcolor="#E1F1FF" class="Estilo78"><center>'; 
			echo $rut;
			echo '</center></td>
            <td height="35" width="116" bgcolor="#E1F1FF" class="Estilo78"><center>'; 
			echo $fecha; 
			echo '</center></td>
            <td height="35" width="93" bgcolor="#E1F1FF" class="Estilo78"><center>';			
			echo $correlativo;
			echo '</center></td>
            <td height="35" width="140" bgcolor="#E1F1FF" class="Estilo78"><center>';
			echo $procedencia;
			echo '</center></td>
            <td height="35" width="214" bgcolor="#E1F1FF" class="Estilo78"><center>		
			<table width="210" border="0">
                 <tr>
                     <td align="justify" class="Estilo78">'; echo $referencias; echo '</td>
                 </tr>
            </table>';
			echo'</center></td>
            </tr>';
		}
   }
}
?>
                            <tr>
                              <td align="" height="7" colspan="6" bgcolor="#CCDDEE" class="Estilo78"></td>
                            </tr>
                            <tr>
                              <td height="10
							  " colspan="13" class="Estilo78"><button class="Estilo59" style="width:70px;background-color:#4791C5;border:0px;margin:1px;padding:0px; font-weight: bold;" onClick="valores(this.form, 't[]')">Imprimir</button>							  </td>
                            </tr>
                        </table></td>
                      </tr>
                      <tr>
                        <td height="1" bgcolor="#74ABD3"></td>
                      </tr>
                    </table>
					<br>
                     <a href="javascript:seleccionar_todo()">&nbsp;&nbsp;Marcar todos</a> | <a href="javascript:deseleccionar_todo()">Marcar ninguno</a>
					<br><br>                    
                    <table width="700" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td width="29" height="21" background="../img/encabezado_tabla_01.gif">&nbsp;</td>
                        <td width="642" background="../img/encabezado_tabla_02.gif"><div align="center" class="Estilo59">CORRESPONDENCIA DESPACHADA </div></td>
                        <td width="29" background="../img/encabezado_tabla_04.gif">&nbsp;</td>
                      </tr>
                      <tr>
                        <td height="2" colspan="3"></td>
                      </tr>
                    </table>
                    <table width="700" border="0" align="center" cellpadding="0" cellspacing="2" bgcolor="#74ABD3">
                      <tr>
                        <td bgcolor="#B1CBE4"><table width="696" border="0" align="center" cellpadding="0" cellspacing="2" bordercolor="#EDF7FF">
<?
$n=0;
$j=0;
//Obtenemos los id_user de usuarios, para considerar solo los despachos externos y no as&iacute; los internos
$sql = "SELECT nombre FROM user WHERE id_unidad = '$id_unidad'";
$resp = mysql_query($sql);
$filas = mysql_num_rows($resp);
if($filas!=0)
{ 	
	$a=0;
    while($linea1=mysql_fetch_array($resp))
	{  	
		$nombre_a = $linea1['nombre'];
		$vec[$a]=$nombre_a;
		$a++;
	}
}
$cad='';
for ($b=0; $b < $a; $b++)
{	
	$nom = $vec[$b];
	$cad = $cad." and destino != '".$nom."'";
}
?>
                            <tr>
                              <td width="59" height="15" bgcolor="#4791C5" class="Estilo2"><div align="center">Imprimir</div></td>
                              <td width="60" height="15" bgcolor="#4791C5" class="Estilo2"><div align="center">R.U.T.</div></td>
                              <td width="116" height="15" bgcolor="#4791C5" class="Estilo2"><div align="center">Fecha Ingreso </div></td>
                              <td width="93" bgcolor="#4791C5"><div align="center" class="Estilo2">Correlativo</div></td>
                              <td width="140" bgcolor="#4791C5"><div align="center" class="Estilo2">Destino</div>                              </td>
                              <td width="214" bgcolor="#4791C5"><div align="center" class="Estilo2">Referencias</div></td>
                            </tr>
<?
$fecha_solicitud = '27 OCT 2008';
$sql = "SELECT * FROM correspondencia WHERE fecha like '%$fecha_solicitud%' and unidad like '$unidad'".$cad." ORDER BY id_c ASC";
$resp = mysql_query($sql);
$filas = mysql_num_rows($resp);
if($filas > 0)
{ 
    while($linea=mysql_fetch_array($resp))
	{  	
		$j++;
	    $fecha=$linea["fecha"];
		$rut=$linea["rut"];
		$unidad=$linea["unidad"];
		$destino=$linea["destino"];
		$referencias=$linea["referencias"];
		$responsable=$linea["responsable"];    
		$hoja_ruta=$linea["hoja_ruta"];  
		$correlativo=$linea["correlativo"];
		$comentario=$linea["comentario"];
				
		$sqlr = "SELECT rut FROM reportes WHERE rut like '%$rut%' and responsable like '$nombre' and id_uni = 	
		'$id_unidad'";
		$resr = mysql_query($sqlr) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
		$numr = mysql_num_rows($resr);
		if($numr <= 0)
		{		
			echo '
        	<tr>';
			echo '<td height="35" bgcolor="#E1F1FF" class="Estilo78"><center>'; 
			echo '<input type="checkbox" name="t[]" value="'.$rut.'">';
			echo '</center></td>';
            echo'<td height="35" bgcolor="#E1F1FF" class="Estilo78"><center>'; 
			echo $rut;
			echo '</center></td>
            <td height="35" bgcolor="#E1F1FF" class="Estilo78"><center>'; 
			echo $fecha; 
			echo '</center></td>
            <td height="35" bgcolor="#E1F1FF" class="Estilo78"><center>';			
			echo $correlativo;
			echo '</center></td>
            <td height="35" bgcolor="#E1F1FF" class="Estilo78"><center>';
			echo $destino;
			echo '</center></td>
            <td height="35" bgcolor="#E1F1FF" class="Estilo78"><center>		
			<table width="210" border="0">
                 <tr>
                     <td align="justify" class="Estilo78">'; echo $referencias;echo '</td>
                 </tr>
            </table>';
			echo'</center></td>
            </tr>';
		}
	}
}
?>
                            <tr>
                              <td height="7" colspan="6" bgcolor="#CCDDEE" class="Estilo78"></td>
                            </tr>
                            <tr>
                              <td height="10" colspan="13" class="Estilo78"><button class="Estilo59" style="width:70px;background-color:#4791C5;border:0px;margin:1px;padding:0px; font-weight: bold;" onClick="valores(this.form, 't[]')">Imprimir</button>                                </td>
                            </tr>
                        </table></td>
                      </tr>
                      <tr>
                        <td height="1" bgcolor="#74ABD3"></td>
                      </tr>
                    </table>                    
                    <p> <span class="Estilo65"><a href="javascript:seleccionar_todo()">&nbsp;&nbsp;Marcar todos</a> |
                      <a href="javascript:deseleccionar_todo()">Marcar ninguno</a></span></p>					</td>
                </tr>
              </table></td>
              <td width="150" bgcolor="#8fb1d2" class="Estilo77">&nbsp;</td>
            </tr>
        </table></td>
        </tr>
    </table>
    </td>
  </tr>
  <tr>
    <td height="20" colspan="2"><table width="1000" height="20" border="0" cellpadding="0" cellspacing="0">
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