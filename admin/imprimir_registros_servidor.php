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
$unidad_ini=$_SESSION['unidad_ini']; 
$id_unidad=$_SESSION['id_unidad']; 
include("../funciones1.php");
include("../php/funciones.php");
include ("../php/fecha_hora.php");
include ('tiempo_tramite.php');
$fecha_sol = fecha(); 
//$fecha_sol = '20 MAR 2009';
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
 todos = new Array();
 for (var i = 0, total = f[cual].length; i < total; i++)
 {
   if (f[cual][i].checked) 
   {   
   	    todos[todos.length] = f[cual][i].value;
	    var arv = todos.toString();
   }
 }
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
</script>
<head>
<title>Chasqui Digital</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
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
			<table style="position:absolute;top:172px;left:2px;" width="132" height="265" border="0" align="center" cellpadding="0" cellspacing="0">
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
                              <td width="412" background="../img/encabezado_tabla_02.gif"><div align="center" class="Estilo59">CORRESPONDENCIA RECIBIDA </div></td>
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
                                <td width="51" height="15" bgcolor="#4791C5" class="Estilo2"><div align="center">
                                  <button class="Estilo59" style="width:48px;background-color:#4791C5;border:0px;margin:1px;padding:0px; font-weight: bold;" onClick="valores_r(this.form, 'r[]')">Imprimir</button>
                                </div></td>
                                <td width="54" height="15" bgcolor="#4791C5" class="Estilo2"><div align="center">R.U.T.</div></td>
                                <td width="86" height="15" bgcolor="#4791C5" class="Estilo2"><div align="center">Fecha Ingreso </div></td>
                                <td width="70" bgcolor="#4791C5"><div align="center" class="Estilo2">Correlativo</div></td>
                                <td width="85" bgcolor="#4791C5"><div align="center" class="Estilo2">Procedencia</div></td>
                                <td width="106" bgcolor="#4791C5"><div align="center" class="Estilo2">Referencias</div></td>
                              </tr>
                              <?
$i=0;
$sql = "SELECT * FROM correspondencia WHERE fecha like '%$fecha_sol%' and destino like '$unidad_ini' ORDER BY id_c ASC";
$resp = mysql_query($sql);
$num = mysql_num_rows($resp); 
if ($num > 0) 					
{	
	while($linea=mysql_fetch_array($resp))
	{
//		$linea=mysql_fetch_array($resp);
	    $fecha=$linea["fecha"];
		$rut=$linea["rut"];
	 	$unidad=$linea["unidad"];
//		$destino=$linea["destino"];
		$referencias=$linea["referencias"];
 		$responsable=$linea["responsable"];    
		$hoja_ruta=$linea["hoja_ruta"];  
		$tipo=$linea["tipo"];
  		$correlativo=$linea["correlativo"];
  		$comentario=$linea["comentario"];

		$sqlr = "SELECT rut FROM reportes WHERE rut like ',%$rut%,' and responsable like '$nombre'";
		$resr = mysql_query($sqlr) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
		$numr = mysql_num_rows($resr);
		if($numr <= 0)
		{
			echo "
	    	<tr onMouseOver='this.style.backgroundColor='#FF9900';this.style.cursor='hand';' 
			onMouseOut='this.style.backgroundColor='#CC6666''o'];'>";
			echo '<td height="50" width = "51" bgcolor="#E1F1FF" class="Estilo78"><center>'; 
			echo '<input type="checkbox" name="r[]" value="'.$rut.'">';
			echo '<input type="hidden" name="r[]" value="'.$rut.'">';
			echo '</center></td>';
		    echo '<td height="50" width = "54" bgcolor="#E1F1FF" class="Estilo78"><center>'; 
			echo $rut;$i++;
			echo '</center></td>';
	        echo '<td height="50" width = "86" bgcolor="#E1F1FF" class="Estilo78"><center>'; 
			echo $fecha; 
			echo '</center></td>
        	<td height="50" width = "70" bgcolor="#E1F1FF" class="Estilo78"><align="left">
			<table border="0">
				<tr>
					<td align="char" class="Estilo78">'; echo $correlativo;echo '</td>
                </tr>
	        </table>';
			echo '</align></td>
    	    <td height="50" width = "85" bgcolor="#E1F1FF" class="Estilo78">
			<table border="0">
				<tr>
					<td align="char" class="Estilo78">'; echo $unidad;echo '</td>
                </tr>
	        </table>';
			echo '</td>
	        <td height="50" width = "106" bgcolor="#E1F1FF" class="Estilo78"><center>
			<table border="0">
				<tr>
					<td align="char" class="Estilo78">'; echo $referencias;echo '</td>
                </tr>
	        </table>';
			echo '</center></td>
        	</tr>';
		}
	}
}//end if($numResultados)
//echo 'total ',$i;
?>
                              <tr>
                                <td align="" height="7" colspan="12" bgcolor="#CCDDEE" class="Estilo78"></td>
                              </tr>
                              <tr>
                                <td height="15" colspan="12" class="Estilo78"><button class="Estilo59" style="width:48px;background-color:#4791C5;border:0px;margin:1px;padding:0px; font-weight: bold;" onClick="valores_r(this.form, 'r[]')">Imprimir</button>
                    <a href="javascript:seleccionar_todo()">Marcar todos</a> | <a href="javascript:deseleccionar_todo()">Marcar ninguno</a></td>
                              </tr>
                            </table></td>
                          </tr>
                          <tr>
                            <td height="1" bgcolor="#74ABD3"></td>
                          </tr>
                          </table>
                        <br>
                          <table width="470" border="0" align="center" cellpadding="0" cellspacing="0">
                            <tr>
                              <td width="29" height="21" background="../img/encabezado_tabla_01.gif">&nbsp;</td>
                              <td width="412" background="../img/encabezado_tabla_02.gif"><div align="center" class="Estilo59">CORRESPONDENCIA DESPACHADA </div></td>
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
                            <tr>
                              <td bgcolor="#B1CBE4"><table width="466" border="0" align="center" cellpadding="0" cellspacing="2" bordercolor="#EDF7FF">
                                  <tr>
                                    <td width="51" height="15" bgcolor="#4791C5" class="Estilo2"><div align="center">
                                        <button class="Estilo59" style="width:48px;background-color:#4791C5;border:0px;margin:1px;padding:0px; font-weight: bold;" onClick="valores(this.form, 't[]')">Imprimir</button>
                                    </div></td>
                                    <td width="54" height="15" bgcolor="#4791C5" class="Estilo2"><div align="center">R.U.T.</div></td>
                                    <td width="86" height="15" bgcolor="#4791C5" class="Estilo2"><div align="center">Fecha Ingreso </div></td>
                                    <td width="70" bgcolor="#4791C5"><div align="center" class="Estilo2">Correlativo</div></td>
                                    <td width="85" bgcolor="#4791C5"><div align="center" class="Estilo2">Destino</div></td>
                                    <td width="106" bgcolor="#4791C5"><div align="center" class="Estilo2">Referencias</div></td>
                                  </tr>
                                <form name="f1">
                                
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
    while($linea1 = mysql_fetch_array($resp))
	{  	
		$nombre_a = $linea1['nombre'];
		$vec[$a] = $nombre_a;
		$a++;
	}
}
$cad='';
for ($b=0; $b < $a; $b++)
{	
	$nom = $vec[$b];
	$cad = $cad." and destino != '".$nom."'";
}
$sql = "SELECT * FROM correspondencia WHERE fecha like '%$fecha_sol%' and unidad like '$unidad_ini'".$cad." ORDER BY id_c ASC";
$resp = mysql_query($sql);
$filas = mysql_num_rows($resp);
if($filas > 0)
{ 
    while($linea=mysql_fetch_array($resp))
	{  	
		$j++;
		$rut=$linea["rut"];
	    $fecha=$linea["fecha"];
		$unidad=$linea["unidad"];
		$destino=$linea["destino"];
		$hoja_ruta=$linea["hoja_ruta"];  
		$referencias=$linea["referencias"];
		$responsable=$linea["responsable"];    
		$correlativo=$linea["correlativo"];
		$comentario=$linea["comentario"];
				
		$sqlr = "SELECT rut FROM reportes WHERE rut like ',%$rut%,' and responsable like '$nombre' 	
		and id_uni = '$id_unidad'";
		$resr = mysql_query($sqlr) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
		$numr = mysql_num_rows($resr);
		if($numr <= 0)
		{		
			echo '
        	<tr> ';
			echo '<td height="50" width="51" bgcolor="#E1F1FF" class="Estilo78"><center>'; 
			echo '<input type="checkbox" name="t[]" value="'.$rut.'">';
			echo '<input type="hidden" name="t[]" value="'.$rut.'">';
			echo '</center></td>';
            echo '<td height="50" width="54" bgcolor="#E1F1FF" class="Estilo78"><center>'; 
			echo $rut;
			echo '</center></td>
            <td height="50" width="86" bgcolor="#E1F1FF" class="Estilo78"><center>'; 
			echo $fecha; 
			echo '</center></td>
            <td height="50" width="70" bgcolor="#E1F1FF" class="Estilo78"><align="left">			
			<table border="0">
				<tr>
					<td align="char" class="Estilo78">'; echo $correlativo;echo '</td>
                </tr>
	        </table>';
			echo '</align></td>
            <td height="50" width="85" bgcolor="#E1F1FF" class="Estilo78">
			<table border="0">
				<tr>
					<td align="char" class="Estilo78">'; echo $destino;echo '</td>
                </tr>
	        </table>';
			echo '</td>
            <td height="50" width="106" bgcolor="#E1F1FF" class="Estilo78"><center>		
			<table border="0">
                 <tr>
                     <td align="justify" class="Estilo78">'; echo $referencias;echo '</td>
                 </tr>
            </table>';
			echo'</center></td>
            </tr>';
		}
	}
}
//echo 'total ',$j;
?>
                                <tr>
                                  <td align="" height="7" colspan="12" bgcolor="#CCDDEE" class="Estilo78"></td>
                                </tr>
                                <tr>
                                  <td height="15" colspan="12" class="Estilo78"><button class="Estilo59" style="width:48px;background-color:#4791C5;border:0px;margin:1px;padding:0px; font-weight: bold;" onClick="valores(this.form, 't[]')">Imprimir</button>
                    <a href="javascript:seleccionar_todo()">Marcar todos</a> | <a href="javascript:deseleccionar_todo()">Marcar ninguno</a></td>
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