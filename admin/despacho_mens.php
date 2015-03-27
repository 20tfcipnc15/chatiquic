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
$unidad=$_SESSION['unidad_ini']; 
$id_unidad=$_SESSION['id_unidad']; 
$id_c = $_GET['id'];

include("../funciones1.php");
$link=conexion();

////////////////
//$cargo1 = $_GET['cargo'];
//Obtenemos El cargo del Usuario logueado
$con = "SELECT cargo FROM user where id_user = $id_user";
$res = mysql_query($con) or die ("Error de busqueda en la BD: ". mysql_Error());
$linea = mysql_fetch_array($res);
$cargo = $linea["cargo"]; 
////////////////

//Obtenemos el registro interno actual de la uidad para mostrarlo
$sql ="SELECT reg_int FROM recibido where id_c = '$id_c' and id_unidad = '$id_unidad'";
$res =mysql_query($sql) or die ("Error de busqueda en la BD: ". mysql_Error());
$linea=mysql_fetch_array($res);
$reg_int=$linea["reg_int"]; 

//Obtenemos todos los datos del registro solicitado
$consulta ="SELECT * FROM correspondencia where id_c = '$id_c'";
$resultado=mysql_query($consulta) or die ("Error de busqueda en la BD: ". mysql_Error());
$numResultados = mysql_num_rows($resultado);
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
<script language=JavaScript src="../javascript/generador_noticias.js"></script>
<SCRIPT language=JavaScript src="../fecha-hora_bc.js"></SCRIPT>
<script type="text/javascript" src="../Sothink DHTML Menu/Resource/js/stmenu.js"></script>
<SCRIPT language=JavaScript>
function verifica()
{  
/*    if((document.despacho_mens.unidad.value.length<2) && (document.despacho_mens.otro.value.length<2) && (document.despacho_mens.admin.value.length<2))
	{   //si el largo de nombre es menor a 2 caracteres 
        document.despacho_mens.unidad.focus(); //el puntero del mouse queda en nombre 
		finalizarIns();
		var mensaje='Debe especificar el Destino del trï¿½mite';
		div=document.getElementById('mensaje');
		div.innerHTML=div.innerHTML + mensaje;
        return 0; //devolvemos un cero para dejar de validar 
    }*/
	if((document.despacho_mens.admin.value.length < 2) && (document.despacho_mens.unidad.value.length < 2) && (document.despacho_mens.otro.value.length < 2))
	{   //si el largo de nombre es menor a 2 caracteres 
        document.despacho_mens.admin.focus(); //el puntero del mouse queda en nombre 
		finalizarIns();
		var mensaje='Debe especificar la Asignacion Interna, Externo u Otro del trámite';
		div=document.getElementById('mensaje');
		div.innerHTML=div.innerHTML + mensaje;
        return 0; //devolvemos un cero para dejar de validar 
    } 
  if(document.despacho_mens.estado_des.value.length < 1)
	{   //si el largo de nombre es menor a 2 caracteres 
        document.despacho_mens.estado_des.focus(); //el puntero del mouse queda en nombre 
		finalizarIns();
		var mensaje='Debe seleccionar el Estado del Trï¿½mite';
		div=document.getElementById('mensaje');
		div.innerHTML=div.innerHTML + mensaje;
        return 0; //devolvemos un cero para dejar de validar 
    } 
	//effffffff
	else
	{ //sino enviamos el formulario 
	var docu0 = document.despacho_mens.fTheFileField4.value;
	
	if(!docu0)
	{
	document.despacho_mens.submit(); //enviamos formulario
	return 0;
	} 
	else
	{
    var docu = document.despacho_mens.fTheFileField4.value;
	var partido = docu.split(".");
	for(var i = 0; i < partido.length; i++)
	{
	var extension = partido[i].toLowerCase();  
	}
	
	if(extension != "pdf" && extension != "doc" && extension != "docx" && extension != "xls" && extension != "xlsx")
	{
	document.despacho_mens.fTheFileField4.focus();
	finalizarIns();
	var mensaje='Debe Cargar el Documento Adjunto debe ser de tipo Word, Excel o Pdf';
	div=document.getElementById('mensaje');
	div.innerHTML=div.innerHTML + mensaje;
	return 0;
	}
	/*
	var dodo = document.despacho_mens.fTheFileField4.value;
	var tam=0;
	tam = dodo.length
	
	if(tam > 44)
	{
	document.despacho_mens.fTheFileField4.focus();
	finalizarIns();
	var mensaje='El nombre del Archivo debe contener maximo 40 caracteres en su nombre';
	div=document.getElementById('mensaje');
	div.innerHTML=div.innerHTML + mensaje;
	return 0;
	}
	*/
	document.despacho_mens.submit(); //enviamos formulario
	}
	
  }  
}
</SCRIPT>
</head>
<body bottommargin="0" leftmargin="0" rightmargin="0" topmargin="0" bgcolor="#EDF7FF" onload=escrolea() oncontextmenu="return false">
<table style="position:absolute;" width="780" border="0" align="center" cellspacing="0">
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
          <p><span class="Estilo77"><img src="../img/chasqui_digital_azul2 copia.jpg" width="445" height="60"></span></p>
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
            <td width="132" height="246" bgcolor="#8fb1d2">&nbsp;</td>             
            <td width="497" rowspan="3"><div align="center">
              <table width="493" height="246" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td width="480" bgcolor="#336699"><div align="center">
                    <table width="493" height="246" border="2" align="center" cellpadding="0" cellspacing="0" bordercolor="#8fb1d2">
                      <tr>
                        <td background="../img/fondo_cuerpo.gif"><center>
                            <p align="left" class="Estilo77">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo 'Unidad: '; echo $unidad .' <br>&nbsp;&nbsp;&nbsp; Usuario: '. $nombre;?></p>
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
	$estado=$linea["estado"];    			
	$i++;
?>
                            </p>
                           <form name="despacho_mens" action="des_interno1.php" enctype="multipart/form-data" method="post">
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
                                          <input type="hidden" name="correlativo" value="<? echo $correlativo;?>" onKeyPress="return numeros_letras_especiales(event)">
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
                                        <td height="15" bgcolor="#CCDDEE"><div align="right" class="Estilo78">Estado:</div></td>
                                        <td background="../admin_bueno/img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo65"> &nbsp;&nbsp;&nbsp;<? echo $estado; ?><span class="Estilo77">
                                          <input type="hidden" name="estado" value="<? echo $estado;?>">
                                        </span></span></td>
                                      </tr>
                                      <tr>
                                        <td height="10" colspan="2" class="Estilo59"><table width="390" border="0" align="center" cellpadding="0" cellspacing="2">
                                          <tr>
                                            <td width="128" height="10"></td>
                                          </tr>
                                          <tr>
                                            <td height="15" bgcolor="#CCDDEE" class="Estilo37"><div align="right">Archivar:</div></td>
                                            <td width="62" background="../admin_bueno/img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo65">
                                                  <label>
                                                  <div align="center"><input type="radio" name="radio" id="checkbox" value="archivar">
                                                    <input name="recibido" type="hidden" id="recibido" value="true" checked>
                                                  </div>
                                                  </label>
                                                </span></td>
                                            <td width="128" bgcolor="#CCDDEE" class="Estilo37"><div align="right">Pendiente:</div></td>
                                            <td width="62" background="../admin_bueno/img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo65">
                                              <label>
                                              <div align="center">
                                                <input type="radio" name="radio" id="checkbox2" value="pendiente">
                                                <input name="recibido2" type="hidden" id="recibido2" value="true" checked>
                                              </div>
                                              </label>
                                              </span></td>
                                          </tr>
                                        </table></td>
                                      </tr>
                                  </table></td>
                                </tr>
                                <tr>
                                  <td height="1" bgcolor="#74ABD3"></td>
                                </tr>
                              </table>
                              <br>
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
                                        <td class="Estilo78"><div align="right">Proveido:</div></td>
                                        <td bgcolor="#CCDDEE"><p><span class="Estilo7"> &nbsp;&nbsp;
                                                  <textarea style="width:248px; height:60px " name="comentario" class="Estilo64" onKeyPress="return numeros_letras_especiales(event)"></textarea>
                                        </span> </p></td>
                                      </tr>
                                      <tr>
                                        <td bgcolor="#CCDDEE" class="Estilo78"><div align="right">Asignaci&oacute;n:</div></td>
                                        <td width="257" bgcolor="#CCDDEE">&nbsp;&nbsp;<? $result=mysql_query("select nombre from  user  where id_unidad = '$id_unidad' order by nombre ASC",$link);
//Llenamos el combo
if ($row = mysql_fetch_array($result))
{ 
	echo '<select name= "admin" style="width:248px" class="Estilo64">';
	echo '<option selected></option>';
	echo "<option value ='Archivo'>Archivo</option>";
	do {   
	//	 if($nombre != $row["nombre"])
    	   echo '<option value= "'.$row["nombre"].'">'.$row["nombre"].'</option>';
	   } while ($row = mysql_fetch_array($result)); 
	echo '</select>';
}
?></td>
                                      </tr>
                                      <tr>
                                        <td height="17" class="Estilo78"><div align="right" class="Estilo78">Despacho Externo: </div></td>
                                        <td height="17" bgcolor="#CCDDEE" class="Estilo65">&nbsp;&nbsp;<?
$result=mysql_query("select * from unidad WHERE id_unidad < 80 order by nombre ASC",$link);
//Llenamos el combo
if ($row = mysql_fetch_array($result))
{ 
	echo '<select name= "unidad" style="width:248px" class="Estilo64">';
	echo '<option selected></option>';
	do { 
//		if ($row["id_unidad"] < 72)
	   	   echo '<option value= "'.$row["nombre"].'">'.$row["nombre"].'</option>';
	} while ($row = mysql_fetch_array($result)); 
	echo '</select>';
}
?>                                        </td>
                                      </tr>
                                      <tr>
                                        <td bgcolor="#CCDDEE" class="Estilo78"><div align="right">Otro:</div></td>
                                        <td bgcolor="#CCDDEE">&nbsp;
                                            <input style="width:248px" type="text" name="otro" class="Estilo64" onKeyPress="return solo_letras(event)"></td>
                                      </tr>
                                      <tr>
                                        <td class="Estilo78"><div align="right">Correlativo:</div></td>
                                        <td bgcolor="#CCDDEE">&nbsp;
                                            <input style="width:248px" type="text" name="correlativo_des" class="Estilo64" onKeyPress="return numeros_letras_especiales(event)"></td>
                                      </tr>
                                      <tr>
                                        <td bgcolor="#CCDDEE" class="Estilo78"><div align="right">Hoja de ruta:</div></td>
                                        <td bgcolor="#CCDDEE">&nbsp;
                                            <input style="width:248px" type="text" name="hoja_ruta_des" class="Estilo64" onKeyPress="return numeros_letras(event)"></td>
                                      </tr>
                                      <tr>
                                        <td height="15" class="Estilo78"><div align="right">Fojas:</div></td>
                                        <td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;
                                              <input name="fojas_des" type="text" class="Estilo64" id="fojas" style="width:248px" onKeyPress="return numeros_letras(event)"/>
                                        </span></td>
                                      </tr>
                                      <tr>
                                        <td height="15" bgcolor="#CCDDEE" class="Estilo78"><div align="right">Instrucci&oacute;n:</div></td>
                                        <td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;
                                              <select name="estado_des" style="width:248px;" class="Estilo64">
                                                <? if($estado == 'C')
														   		echo '<option selected value="C">C: Conocimiento</option>';
															  elseif ($estado == 'F')
														   		echo '<option selected value="F">F: Finalizado</option>';
															  elseif ($estado == 'PF')
														   		echo '<option selected value="PF">PF: Para Firma</option>';
															  elseif ($estado == 'R')
														   		echo '<option selected value="R">R: Respuesta</option>';
															  elseif ($estado == 'T')
														   		echo '<option selected value="T">T: En Transito</option>';
															  elseif ($estado == 'U')
														   		echo '<option selected value="U">U: Urgente</option>';
															  else
														   		echo '<option selected></option>';	?>
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
                                        <td height="15" bgcolor="#CCDDEE"><div align="right"><span class="Estilo78">Con Copia a:</span></div></td>
                                        <td bgcolor="#CCDDEE" class="Estilo65"><table width="257" height="24" border="0" cellpadding="0" cellspacing="0">
                                            <tr>
                                              <td width="257"><div align="right">
                                                  <input name="unidades" type="button" class="Estilo59" style="width:80px;background-color:#4791C5;border:0px;margin:1px;padding:0px; font-weight: bold;" value="Unidades" onClick="abrir3('unidades1.php');">
                                              </div></td>
                                            </tr>
                                          </table>
                                           
                                          <textarea style="width:248px; height:60px " name="copias" class="Estilo7" onKeyPress="return numeros_letras_especiales(event)"></textarea>                                        </td>
                                      </tr>
									  <tr>
                                        <td height="15" class="Estilo78"><div align="right">Adjuntar Documento:</div></td>
                                        <td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;
                                              <span class="Estilo74"><input name="fTheFileField4" id="fTheFileField4" type="file" size="24"></span>
                                        </span></td>
                                      </tr>
                                      <tr>
                                        <td colspan="6"></td>
                                      </tr>
                                      <tr>
                                        <td colspan="2"><div align="center">
                                          <input name="enviar1" type="button" class="Estilo59" style="cursor:pointer;width:90px;background-color:#4791C5;border:0px;margin:1px;padding:0px; font-weight: bold;" value="Enviar" onClick="javascript:verifica()">
                                          &nbsp;&nbsp;&nbsp;&nbsp;
                                          <input name="cancelar22" type="reset" class="Estilo59" style="cursor:pointer;width:90px;background-color:#4791C5;border:0px;margin:1px;padding:0px; font-weight: bold;" value="Cancelar" >
                                        </div></td>
                                      </tr>
                                  </table></td>
                                </tr>
                                <tr>
                                  <td height="1" bgcolor="#74ABD3"></td>
                                </tr>
                              </table>
                              <p>
                                <input name="cargo" type="hidden" value="<? echo $cargo; }?>">
                              </p>
                            </form>
                            <p align="left" class="Estilo77">&nbsp;</p>
                        </center></td>
                        </tr>
                    </table>
                  </div></td>
                </tr>
              </table>
            </div>              </td>
            <td width="153" rowspan="3" bgcolor="#8fb1d2">&nbsp;</td>
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
<table style="position:absolute;top:171px;left:1px;"width="132" height="240" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td height="92"><script src="menu_admin.js"></script></td>
  </tr>
  <tr>
    <td></td>
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