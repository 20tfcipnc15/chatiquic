<?PHP
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
$cid_user=$_SESSION['id_user'];
$cnombre=$_SESSION['nombre_ini']; 
$cunidad=$_SESSION['unidad_ini']; 
$cid_unidad=$_SESSION['id_unidad']; 

include("../funciones1.php");
$link=conexion();
$consulta ="SELECT reg_int FROM recibido order by id_re DESC limit 1";
$resultado=mysql_query($consulta) or die ("Error de b�squeda en la BD: ". mysql_Error());
$linea=mysql_fetch_array($resultado);
$reg_int = $linea["reg_int"];
?>
<html>
<head>
<title>Chasqui Digital</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<LINK href="../javascript/estilos.css" type=text/css rel=stylesheet>
<LINK href="../javascript/estilo_noticias.css" type=text/css rel=stylesheet>
<LINK href="mensajes/dhtmlwindow.css" type=text/css rel=stylesheet>
<LINK href="mensajes/modal.css" type=text/css rel=stylesheet>
<SCRIPT language=JavaScript src="mensajes/dhtmlwindow.js"></SCRIPT>
<SCRIPT language=JavaScript src="mensajes/modal.js"></SCRIPT>
<SCRIPT language=JavaScript src="../javascript/mensajes.js"></SCRIPT>
<SCRIPT language=JavaScript src="../javascript/fecha-hora_bc.js"></SCRIPT>
<SCRIPT language=javascript src="../javascript/barra_de_estado.js"></SCRIPT>
<SCRIPT language=javascript src="../javascript/funciones.js"></SCRIPT>
<script type="text/javascript" src="../Sothink DHTML Menu/Resource/js/stmenu.js"></script>
<SCRIPT language=javascript src="../javascript/validacionformuarios1.js"></SCRIPT>
<!--Calendario-->
<SCRIPT language=javascript src="../javascript/scw.js" type="text/javascript"></script>

<SCRIPT language=JavaScript src="../fecha-hora_bc.js"></SCRIPT>
<script type="text/javascript" src="../Sothink DHTML Menu/Resource/js/stmenu.js"></script>
<!--no utilizare jquery aqui pero por si las moscas....porq se tira con prototypey los spammers bueno la cosa s q esta de adorno por si se me ocurre hacer algo...... 
<link type="text/css" href="../javascript/jquery-ui-1.11.2.custom/jquery-ui.css" rel="Stylesheet" /> 
<script language=JavaScript src="../javascript/jquery-1.9.1.js"></script>
<script language=JavaScript src="../javascript/jquery-ui-1.11.2.custom/jquery-ui.min.js"></script>
<!--hasta aqui jquery libraries-->
<SCRIPT language=javascript src="../javascript/prototype.js"></SCRIPT>
<SCRIPT language=JavaScript>
function ismaxlength(obj)
{
	var mlength=obj.getAttribute? parseInt(obj.getAttribute("maxlength")) : ""
	if (obj.getAttribute && obj.value.length>mlength)
	obj.value=obj.value.substring(0,mlength)
}

																//EL PRIMER AJAX ES GENERICO
//para un combo1 el primero por ajax...el cargado del tipo aacademico,administrativo.financiero,etc para mostrar esta en html nomas aqui abajo
function veras(marco){
					//limpiar el div mostrar1 cuando seleccione un elemento
					document.getElementById("mostrar").innerHTML = "";	
					document.getElementById("mostrar1").innerHTML = "";
					document.getElementById("mostrar2").innerHTML = "";
					document.getElementById("mostrar3").innerHTML = "";
					document.getElementById("mostrar4").innerHTML = "";
					var params = 'mac=' + marco;
                    //alert(marco);
					var url = 'nivel1.php';  //es el php conbinado con html  para que aparesca segun lo que quieras en el DIV
                    new Ajax.Updater({success:'trami'}, url, {method: 'post', parameters: params, onFailure: reportError});
                    //else{ $('resultado').innerHTML="";}
                    return false;
					}
					function reportError(request){$('fixme') = "Error";}
//para mostrar el radiobutton de compra	
											//SOLICITUD DE COMPRA
function obs(tramix){
					//limpiar el div mostrar1 cuando seleccione un elemento
					document.getElementById("mostrar1").innerHTML = "";
					document.getElementById("mostrar2").innerHTML = "";
					document.getElementById("mostrar3").innerHTML = "";
					var params = 'trameaje=' + tramix;
                  //alert(tramix);
					var url = 'nivel2.php';  //es el php conbinado con html  para que aparesca segun lo que quieras en el DIV inmoral
                    new Ajax.Updater({success:'mostrar'}, url, {method: 'post', parameters: params, onFailure: reportError});
                    //else{ $('resultado').innerHTML="";}
					return false;
					}
					function reportError(request){$('fixme') = "Error";}
//elegir bienes o servicios
function toggleLayer4(val) 
{ if(val == 'Bienes') 
		{ 
					var params = 'balu=' + val;
                    //alert(tramix);
					var url = 'nivel3.php';  //es el php conbinado con html  para que aparesca segun lo que quieras en el DIV inmoral
                    new Ajax.Updater({success:'mostrar1'}, url, {method: 'post', parameters: params, onFailure: reportError});
                    //else{ $('resultado').innerHTML="";}
                    return false;
		} 
		else if(val == 'Servicios') 
		{ 
				alert("Pago de Servicios de: Comunicaciones, Telefono, Internet, Seguros, Alquileres, Mantenimiento, Dominio, Impreta, Servicios Manuales, Capacitacion de Personal, Gastos Judiciales, etc..");
				var params = 'balu=' + val;
                  //alert(tramix);
			    var url = 'nivel3.php';  //es el php conbinado con html  para que aparesca segun lo que quieras en el DIV inmoral
                new Ajax.Updater({success:'mostrar1'}, url, {method: 'post', parameters: params, onFailure: reportError});
                  //else{ $('resultado').innerHTML="";}
                return false;
		}
}
														//HASTA AQUI SOLICITUD DE COMPRA
															//AHORA PARA PAGOS
function obs1(pago){
					document.getElementById("mostrar2").innerHTML = "";
					document.getElementById("mostrar3").innerHTML = "";
					document.getElementById("mostrar4").innerHTML = "";
					var params = 'pagoza=' + pago;
					
					var url = 'nivel3.php';  //es el php conbinado con html  para que aparesca segun lo que quieras en el DIV inmoral
                    new Ajax.Updater({success:'mostrar1'}, url, {method: 'post', parameters: params, onFailure: reportError});
                    //else{ $('resultado').innerHTML="";}
					return false;
					}
					function reportError(request){$('fixme') = "Error";}
																//HASTA AQUI PAGOS
																//DESDE AQUI DESCARGOS
																//DESDE AQUI FONDOS AVANCE ROTATORIOS
function obs2(rotatorio){
					var params = 'rotato=' + rotatorio;
                  //alert(tramix);
					var url = 'nivel3.php';  //es el php conbinado con html  para que aparesca segun lo que quieras en el DIV inmoral
                    new Ajax.Updater({success:'mostrar1'}, url, {method: 'post', parameters: params, onFailure: reportError});
                    //else{ $('resultado').innerHTML="";}
					return false;
					}
					function reportError(request){$('fixme') = "Error";}
																//HASTA AQUI FONDOS ROTATORIOS
function obs3(descargo){

					document.getElementById("mostrar2").innerHTML = "";
					document.getElementById("mostrar3").innerHTML = "";
					document.getElementById("mostrar4").innerHTML = "";
					
					var params = 'descar=' + descargo;
                  //alert(tramix);
					var url = 'nivel3.php';  //es el php conbinado con html  para que aparesca segun lo que quieras en el DIV inmoral
                    new Ajax.Updater({success:'mostrar1'}, url, {method: 'post', parameters: params, onFailure: reportError});
                    //else{ $('resultado').innerHTML="";}
					return false;
					}
					function reportError(request){$('fixme') = "Error";}
function toggleLayer(val) 
{ 
					//pal cierre reposicion u otra cosa se puede reutilizar
					document.getElementById("mostrar3").innerHTML = "";
					document.getElementById("mostrar4").innerHTML = "";
					var params = 'confirm=' + val;
                    //alert(tramix);
					var url = 'nivel4.php';  //es el php conbinado con html  para que aparesca segun lo que quieras en el DIV inmoral
                    new Ajax.Updater({success:'mostrar2'}, url, {method: 'post', parameters: params, onFailure: reportError});
                    //else{ $('resultado').innerHTML="";}
                    return false;
		
}
function obs4(descargorota){
					
					document.getElementById("mostrar3").innerHTML = "";
					document.getElementById("mostrar4").innerHTML = "";
					var params = 'descaresp=' + descargorota;
                  //alert(tramix);
					var url = 'nivel4.php';  //es el php conbinado con html  para que aparesca segun lo que quieras en el DIV inmoral
                    new Ajax.Updater({success:'mostrar2'}, url, {method: 'post', parameters: params, onFailure: reportError});
                    //else{ $('resultado').innerHTML="";}
					return false;
					}
					function reportError(request){$('fixme') = "Error";}
function toggleLayer2(val) 
{ 
		if(val == 'reposicion') 
		{ 			document.getElementById("mostrar4").innerHTML = "";
					var params = 'varchi=' + val;
                    var url = 'nivel4.php';  //es el php conbinado con html  para que aparesca segun lo que quieras en el DIV inmoral
                    new Ajax.Updater({success:'mostrar3'}, url, {method: 'post', parameters: params, onFailure: reportError});
                    //else{ $('resultado').innerHTML="";}
                    return false;
		}
		else
		{			document.getElementById("mostrar4").innerHTML = "";
					var params = 'varchi=' + val;
                    //alert(tramix);
					var url = 'nivel4.php';  //es el php conbinado con html  para que aparesca segun lo que quieras en el DIV inmoral
                    new Ajax.Updater({success:'mostrar3'}, url, {method: 'post', parameters: params, onFailure: reportError});
                    //else{ $('resultado').innerHTML="";}
                    return false;
		}
}
function toggleLayer3(val) 
{ 
					var params = 'dice=' + val;
                    //alert(tramix);
					var url = 'nivel5.php';  //es el php conbinado con html  para que aparesca segun lo que quieras en el DIV inmoral
                    new Ajax.Updater({success:'mostrar4'}, url, {method: 'post', parameters: params, onFailure: reportError});
                    //else{ $('resultado').innerHTML="";}
                    return false;
		
}
function toggleLayer5(val) 
{ 
					/*pal cierre reposicion u otra cosa se puede reutilizar
					document.getElementById("mostrar3").innerHTML = "";
					document.getElementById("mostrar4").innerHTML = "";*/
					var params = 'circu=' + val;
                    //alert(tramix);
					var url = 'nivel3.php';  //es el php conbinado con html  para que aparesca segun lo que quieras en el DIV inmoral
                    new Ajax.Updater({success:'mostrar2'}, url, {method: 'post', parameters: params, onFailure: reportError});
                    //else{ $('resultado').innerHTML="";}
                    return false;
		
}
function obs5(descargorota){
					
					document.getElementById("mostrar4").innerHTML = "";
					var params = 'descaresp=' + descargorota;
                  //alert(tramix);
					var url = 'nivel4.php';  //es el php conbinado con html  para que aparesca segun lo que quieras en el DIV inmoral
                    new Ajax.Updater({success:'mostrar3'}, url, {method: 'post', parameters: params, onFailure: reportError});
                    //else{ $('resultado').innerHTML="";}
					return false;
					}
					function reportError(request){$('fixme') = "Error";}
</SCRIPT>
</head>
<body bottommargin="0" leftmargin="0" rightmargin="0" topmargin="0" bgcolor="#EDF7FF" onload=escrolea()>
<table  width="780" border="0" cellspacing="0">
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
			<table style="position:absolute;top:172px;left:0px;" width="132" height="246" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td height="92"><script src="menu_admin.js"></script></td>
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
                                           <td background="../img/fondo_cuerpo.gif"><p><br>
                                             <span class="Estilo77">&nbsp;&nbsp;Unidad: <? echo 
											 $cunidad; ?> <br>
                                                     &nbsp;&nbsp;Usuario: <? echo $cnombre; ?> </span></p>                                    <p class="Estilo77">&nbsp;&nbsp;R.U.T. Actual:
<? 
$consulta7 ="SELECT rut FROM rut WHERE id_unidad = '$cid_unidad' order by id_rut DESC limit 1";
$resultado7=mysql_query($consulta7) or die ("Error de b�squeda en la BD: ". mysql_Error());
$num7 = mysql_num_rows($resultado7);
if($num7 > 0)
{
	$linea7=mysql_fetch_array($resultado7);
	echo '<span class="Estilo81">'.$rut = $linea7["rut"].'</span>';
}
else
	echo '0';	
?></p>
                                             <center>
                                             <form name="registrar" action="registro_save1.php" enctype="multipart/form-data" method="post">
                                               <p class="Estilo77">Por favor ingrese los siguientes datos:</p>
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
                                                         <td width="130" height="15" bordercolor="#74ABD3"><div align="right"><span class="Estilo78">Fecha y Hora de Ingreso:</span></div></td>
                                                         <td width="260" bgcolor="#CCDDEE">
                                                           <?php include ("../php/fecha_hora.php");
													   $fecha=fecha_hora(); 
													   ?>
  &nbsp;<span class="Estilo64">&nbsp;&nbsp;<? echo $fecha;?><span class="Estilo65">
  <input name="fecha" type="hidden" style="width:248px" class="Estilo64" value ="<? echo $fecha;?>"/>
  </span></span></td>
                                                       </tr>
													   <tr>
															<td height="40"><div align="right"><span class="Estilo78">Adjuntar Documentos:</span></div></td>
															<td width="500px" background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo74">
													  
															<span class="Estilo74"><input name="fTheFileField2" id="fTheFileField2" type="file" size="24"></span>
																																  
															</span></td>
														</tr>
													    <tr>
                                                         <td height="23"><div align="right"><span class="Estilo78">N&ordm; Reg. Externo:</span></div></td>
                                                         <td background="../admin/img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;
                                                           <input name="reg_ext" type="text" style="width:248px" class="Estilo64" onKeyPress="return numeros_letras_especiales(event)"/>
                                                         </span></td>
                                                       </tr>
													   <tr>
                                                         <td height="15" bgcolor="#CCDDEE" class="Estilo78"><div align="right" class="Estilo78">N&ordm; Hoja de Ruta:</div></td>
                                                         <td background="../admin/img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;
                                                           <input name="hoja_ruta" value=""type="text" style="width:248px" class="Estilo64" onKeyPress="return numeros_letras(event)" />
                                                         </span></td>
                                                       </tr>
													    <tr>
                                                         <td height="15"><div align="right"><span class="Estilo78">Procedencia:</span></div></td>
                                                         <td bgcolor="#CCDDEE" class="Estilo64">&nbsp;<span class="Estilo59">
<?
//$result=mysql_query("select * from unidad order by nombre ASC",$link);
$result=mysql_query("select sigla,nombre from unidad where id_unidad < 80 order by nombre ASC",$link);
//Llenamos el combo
if ($row = mysql_fetch_array($result))
{ 
	echo '<select name= "procedencia" style="width:248px" class="Estilo64">';
	echo '<option selected></option>';
	do { 
		$long=strlen($row["nombre"]);
		if($row["nombre"] != $cunidad and $long > 42)
    	   echo '<option value= "'.$row["sigla"].'">'.$row["sigla"].'</option>';
		else
    	   echo '<option value= "'.$row["nombre"].'">'.$row["nombre"].'</option>';
	} while ($row = mysql_fetch_array($result)); 
	echo '</select>';
}
?>
                                                         </span></td>
                                                       </tr>
													    <tr>
                                                         <td height="15" bgcolor="#CCDDEE"><div align="right"><span class="Estilo78">Otro:</span></div></td>
                                                         <td background="../admin/img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;
                                                           <input name="otro" value="" type="text" style="width:248px" class="Estilo64" onKeyPress="return solo_letras(event)" />
                                                         </span></td>
                                                       </tr>
													    			   
													  <tr bgcolor="#CCDDEE">
                                                         <td height="15" bgcolor="#CCDDEE"><div align="right"><span class="Estilo78">N&ordm; Fojas:</span></div></td>
													     <td background="../admin/img/fondo_cuadrado.jpg"><span class="Estilo64">&nbsp;
                                                           <input name="fojas" type="text" class="Estilo64" id="fojas" style="width:248px" onKeyPress="return numeros_letras(event)" />
                                                         </span></td>
												     </tr>
													   <tr>
                                                         <td height="15"><div align="right"><span class="Estilo78">Recibido por:</span></div></td>
													     <td bgcolor="#CCDDEE" class="Estilo65">&nbsp; <span class="Estilo65"><? echo $cnombre;?>
                                                           <input name="recibido_por" type="hidden" style="width:248px" class="Estilo64" value ="<? echo $cnombre;?>"/>
                                                         </span></td>
												     </tr>
													   <tr>
                                                         <td height="15"><div align="right"><span class="Estilo78">Asignaci&oacute;n:</span></div></td>
													     <td background="../admin/img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;<span class="Estilo59">
                                                           <? 
$result=mysql_query("select nombre from  user  where id_unidad = '$cid_unidad' order by nombre ASC",$link);
//Llenamos el combo
if ($row = mysql_fetch_array($result))
{ 
	echo '<select name= "destino" style="width:248px" class="Estilo64">';
	do { 
		if($row['nombre'] != $cnombre and $row['nombre'] != 'Christian Rojas')
    	   echo '<option value= "'.$row["nombre"].'">'.$row["nombre"].'</option>';
	} while ($row = mysql_fetch_array($result)); 
	echo '</select>';
}
?>
                                                         </span></span></td>
												     </tr>
													   <tr>
                                                         <td height="15"><div align="right"><span class="Estilo78">Instrucci&oacute;n:</span></div></td>
													     <td background="../admin/img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;
													       <select name="estado" style="width:248px;" class="Estilo64">
                                                             <option selected></option>
                                                             <option value="C">C: Conocimiento</option>
							     <option value="F">F: Finalizado</option>
							     <option value="PF">PF: Para Firma</option>
							     <option value="PP">PP: Para Pago</option>
							     <option value="R">R: Respuesta</option>
							     <option value="T">T: En Transito</option>
                                                             <option value="U">U: Urgente</option>							    
                                                           </select>
													     </span></td>
												     </tr>
													 <tr>
                                                          <td height="15" bgcolor="#CCDDEE"><div align="right" class="Estilo78">Tipo de Correspondencia: </div></td>
													      <td height="15" bgcolor="#CCDDEE" class="Estilo59">&nbsp;
												          <?
															$result=mysql_query("select * from macroentidades order by nombre ASC",$link);
															//Llenamos el combo
															if ($row = mysql_fetch_array($result))
															{ 
																echo '<select name= "marco" id="marco" style="width:248px" class="Estilo64" onchange="veras(this.value)">';
																echo '<option selected></option>';
																do { 
																	$long=strlen($row["nombre"]);
																	echo '<option value= "'.$row["id_macro"].'">'.$row["nombre"].'</option>';
																} while ($row = mysql_fetch_array($result)); 
																echo '</select>';
															}
															?>
															</td>
											         </tr>
                                                       <tr>
                                                         <td height="10" colspan="2" class="Estilo59">&nbsp;</td>
                                                       </tr>
													    </tr>
									  <!--TODOS LOS HIDENS PARA QUE JALEN DESDE DESPACHO_SAVE_X.PHP -->
									  <!-- Solicitud de Compra un Hidden para el radioButton pal bien servicio destiqueado devuelve true-->
									  <input type="hidden" id="servime" name="servime" value="">
									  <!-- un Hidden para el radioButton pal bien bien destiqueado devuelve true-->
									  <input type="hidden" id="bienen" name="bienen" value="">
									  <!-- Solicitud de COmpra hasta aqui-->
									  <!-- HIDEN PARA PAGOS-->
									  <input type="hidden" id="pagosol" name="pagosol" value="">
									  <!-- Solicitud de PAGO hasta aqui-->
									  <!-- HIDEN FONDOS ROTATORIOS-->
									  <input type="hidden" id="fondorota" name="fondorota" value="">
									  <!-- HASTA ACA FONDOS ROTATORIOS-->
									  <!-- HIDEN DESCARGOS O PARA OTRO TIPO DE TRAMITES-->
									  <!--Para el Combo Tipo de Descargo-->
									  <input type="hidden" id="descargo1" name="descargo1" value="">
									  <!--Para el Checkbox Con boleta-descargo de fondo en avance, viajes y otros descargos-cierre de cargo-->
									  <input type="hidden" id="descargo2" name="descargo2" value="">
									  <!--Para descargo de fondo rotatorio COMBO-->
									  <input type="hidden" id="descargo3" name="descargo3" value="">
									  <!--Para Reposicion o Cierre Caja Chica-->
									  <input type="hidden" id="descargo4" name="descargo4" value="">
									  <!--con boleta o sin descargo fondo rotatorio caja chica-->
									  <input type="hidden" id="descargo5" name="descargo5" value="">
									  <!-- HASTA ACA DESCARGOS-->
									  
									  <tr>
                                        <td height="15" class="Estilo78"><div align="right"><span class="Estilo78">Tramite Especifico:</span></div></td>
										<td bgcolor="#CCDDEE" class="Estilo64">&nbsp;<span class="Estilo59" align="center">
                                        <div id="trami"></div> 
										</span></td>
									  </tr>
									  
									  <table>
									  	  <div id="mostrar"></div>
									  </table>
									  <table>
									   	  <div id="mostrar1"></div>
									  </table>
									  <table>
									   	  <div id="mostrar2"></div>
									  </table>
									   <table>
									   	  <div id="mostrar3"></div>
									  </table>
									  <table>
									   	  <div id="mostrar4"></div>
									  </table>
									  <!--
                                      <tr>
                                        <td height="60" bgcolor="#CCDDEE" class="Estilo78"><div align="right" class="Estilo78">Referencias:</div></td>
                                        <td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;
                                              <textarea style="width:248px; height:60px " name="referencias" class="Estilo7" onKeyPress="return numeros_letras_especiales(event)" maxlength="200" onkeyup="return ismaxlength(this)"></textarea>
                                        </span></td>
                                      </tr>-->
									  		
                                                       <tr>
                                                         <td height="17" colspan="2" bgcolor="#CCDDEE" class="Estilo59"><div align="center">
                                                           <input name="enviar22" type="button" class="Estilo59" style="width:90px;background-color:#4791C5;border:0px;margin:1px;padding:0px; font-weight: bold;" value="Enviar Datos" onClick="javascript:verifica1()">
                                                           &nbsp;&nbsp;&nbsp;&nbsp;
                                              <input name="cancelar" type="reset" class="Estilo59" style="width:90px;background-color:#4791C5;border:0px;margin:1px;padding:0px; font-weight: bold;" value="Cancelar" >
                                                         </div></td>
                                                       </tr>
                                                     </table>
                                                   �</td>
                                                 </tr>
                                                 <tr>
                                                   <td height="1" bgcolor="#74ABD3"></td>
                                                 </tr>
                                               </table>
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
<div id="finalizarInscripcion" style="display:none">
  <div class="formPanel">
	<div>
        <p>
		<br>
		<table>
			<tr>
				<td>
				<img src="../img/888.jpg" width="31" height="32">
				</td>
				<td>
				<span id="mensaje" class="Estilo60"> </span>
				</td>
			</tr>
		</table>
		</p>
        <div class="PwdMeterBase" style="width:100%">
        <table align="center">
            <td>
<input name="enviar2" type="button" class="Estilo59" style="width:90px;background-color:#4791C5;border:0px;margin:1px;padding:0px; font-weight: bold;" value="Cerrar" onClick="cancelIns()">
            </td>
        </table>
       </div>
    </div>
   </div>
</div>
</body>
</html>