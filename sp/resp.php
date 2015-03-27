<?php
session_start();
if (!isset($_SESSION['super usuario']))
{ 
	header ("Location: index.php"); 
	exit; 
} 
$id_user=$_SESSION['id_user'];
$nombre=$_SESSION['nombre_ini']; 
$unidad1=$_SESSION['unidad_ini']; 
$id_unidad=$_SESSION['id_unidad']; 
include ("../php/fecha_hora.php");
include("../funciones1.php");
$link=conexion();
$fec_actual = fecha_hora(); 

$correlativo = $_POST['correlativo'];
$unidad = $_POST['unidad'];
$hoja_ruta = $_POST['hoja_ruta'];   
$referencias = $_POST['referencias'];
$tipo = $_POST['tipo'];
$otro = $_POST['otro'];
$fecha = $_POST['fecha'];
$fecha_final = $_POST['fecha_final'];
$rut = $_POST['rut'];
$responsable = $_POST['responsable'];
if($responsable != null)
{
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
function valoresr(f, cual) 
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
window.top.location.href = "recibido.php?cad="+arv;
}

function valoresa(f, cual) 
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
window.top.location.href = "asignar.php?cad="+arv;
}
</script>
</head>
<body bottommargin="0" leftmargin="0" rightmargin="0" topmargin="0" bgcolor="#EDF7FF" onload=escrolea() oncontextmenu="return false">
<table style="position:absolute; height: 419px;" width="1000" border="0" align="center" cellspacing="0">
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
              <td width="133"><table style="position:absolute; top:145px; left:3px; width: 129px; height: 137px;"width="132" height="240" border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td width="132" height="92"><script src="menu_sp.js"></script></td>
                </tr>
              </table>
			  <form name="form1" method="post" action="../admin/recupera.php">
              </form></td>
              <td width="717" bgcolor="#EDF7FF"><table width="711" height="246" border="2" align="center" cellpadding="0" cellspacing="0" bordercolor="#8fb1d2">
                <tr>
                  <td width="705" background="../img/fondo_cuerpo.gif"><p align="left" class="Estilo77">&nbsp;&nbsp;Unidad: <?php echo $unidad1;?><br>
  &nbsp;&nbsp;Usuario: <? echo $nombre; ?></p>
                    <p align="center" class="Estilo77"> 
                      &nbsp;&nbsp;&nbsp;&nbsp;Se han encontrado <?php echo $numResultados;?> coincidencias.
                    </p>
                    <p align="center" class="Estilo77"></p>
                    <div align="left">
                      <table width="700" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                          <td width="29" height="21" background="../img/encabezado_tabla_01.gif">&nbsp;</td>
                          <td width="642" background="../img/encabezado_tabla_02.gif"><div align="center" class="Estilo59">DATOS GENERALES DEL TR&Aacute;MITE </div></td>
                          <td width="29" background="../img/encabezado_tabla_04.gif">&nbsp;</td>
                        </tr>
                        <tr>
                          <td height="2" colspan="3"></td>
                        </tr>
                      </table>
                      <table width="700" border="0" align="center" cellpadding="0" cellspacing="2" bgcolor="#74ABD3">
                        <tr>
                          <td></td>
                        </tr>
                        <tr>
                          <td bgcolor="#B1CBE4"><table width="696" border="0" align="center" cellpadding="0" cellspacing="2" bordercolor="#EDF7FF">
                              <tr>
                                <td width="41" bgcolor="#4791C5"><div align="center" class="Estilo2">R.U.T.</div></td>
                                <td width="80" height="15" bgcolor="#4791C5" class="Estilo2"><div align="center">Fecha Ingreso </div></td>
                                <td width="87" bgcolor="#4791C5"><div align="center" class="Estilo2">Unidad</div></td>
                                <td width="72" bgcolor="#4791C5" class="Estilo2"><div align="center">Tipo</div></td>
                                <td width="61" bgcolor="#4791C5"><div align="center" class="Estilo2">Correlativo</div></td>
                                <td width="130" bgcolor="#4791C5"><div align="center" class="Estilo2">Referencias</div></td>
                                <td width="32" bgcolor="#4791C5" class="Estilo2"><div align="center">No Fojas </div></td>
                                <td width="93" bgcolor="#4791C5"><div align="center" class="Estilo2">Responsable:</div></td>
                                <td width="80" bgcolor="#4791C5" class="Estilo2"><div align="center">Fecha Actual</div></td>
                              </tr>
<?php   
$tt=0;

$sql = "SELECT distinct(rut) FROM correspondencia order by id_c DESC";
$res = mysql_query($sql) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
$num = mysql_num_rows($res); 
if ($num > 0) 					
{	
	while($fila = mysql_fetch_array($res))
	{
		$rut = $fila['rut'];
			
		//OBTENEMOS TODOS LOS CAMPOS DEL REGISTRO PARA DESPLEGARLOS POR PANATALLA
		$consulta ="SELECT * FROM correspondencia WHERE rut like '%$rut%' order by id_c DESC limit 1";
		$resultado=mysql_query($consulta) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
		while($linea=mysql_fetch_array($resultado))
		{ 
			$fecha=$linea["fecha"];
			$correlativo=$linea["correlativo"];
			$unidad=$linea["unidad"];
			$referencias=$linea["referencias"];
			$hoja_ruta=$linea["hoja_ruta"];  
			$tipo=$linea["tipo"];
			$rut=$linea["rut"];
			$fojas=$linea["fojas"];
			$destino=$linea["destino"];
			
			if($destino == $responsable)
			{
				$tt++;
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
				echo $tipo; 
				echo '</center></td>
        	    <td height="50" bgcolor="#E1F1FF" class="Estilo78"><center>';
				echo $correlativo;
				echo '</center></td>';
    	        echo '<td height="50" bgcolor="#E1F1FF" class="Estilo78"><center>';
				echo '<table width="140" height="50" border="0" cellpadding="0" cellspacing="2" bgcolor="#E1F1FF" class="Estilo78">
				<tr>
					<td>'.$referencias.'</td>
				</tr>
				</table>';
				echo'</center></td>
            	<td height="50" bgcolor="#E1F1FF" class="Estilo78"><center>';
				echo $fojas;
				echo'</center></td>
				<td height="50" bgcolor="#E1F1FF" class="Estilo78"><center>';
				echo $responsable;
				echo'</center></td>
				<td height="50" bgcolor="#E1F1FF" class="Estilo78"><center>';
				echo $fec_actual; 
				echo '</center></td>
    	        </tr>';
			}
		}
	}
}
?>
                              <tr>
                                <td height="15" colspan="12" bgcolor="#CCDDEE" class="Estilo78">&nbsp;</td>
                              </tr>
                              <tr>
                                <td height="15" colspan="12" class="Estilo78">&nbsp;</td>
                              </tr>
                          </table></td>
                        </tr>
                        <tr>
                          <td height="1" bgcolor="#74ABD3"></td>
                        </tr>
                      </table>
                    </div>
                    <p>&nbsp;</p></td>
                </tr>
              </table></td>
              <td width="150" bgcolor="#8fb1d2" class="Estilo77"><p>&nbsp;</p>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
                </td>
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
<?
}
else
	echo '<h1>Usted no ha ingresado ningún dato.</h1>';
?>