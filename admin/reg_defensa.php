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
include("../funciones1.php");
$link=conexion();
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
<script language=JavaScript src="../javascript/generador_noticias.js"></script>
<SCRIPT language=javascript src="../javascript/funciones.js"></SCRIPT>
<SCRIPT language=JavaScript src="../fecha-hora_bc.js"></SCRIPT>
<script type="text/javascript" src="../Sothink DHTML Menu/Resource/js/stmenu.js"></script>
<SCRIPT language=JavaScript>
function verifica()
{
	if(document.reg_defensa.tipo.value.length < 2)
	{   //si el largo de nombre es menor a 2 caracteres 
        document.reg_defensa.tipo.focus(); //el puntero del mouse queda en nombre 
		finalizarIns();
		var mensaje='Debe especificar el Tipo de Tr�mite';
		div=document.getElementById('mensaje');
		div.innerHTML=div.innerHTML + mensaje;
        return 0; //devolvemos un cero para dejar de validar 
    } 
    if(document.reg_defensa.procedencia.value.length < 1)
	{ //si el largo de precio es igual o menor a 0 caracteres 
        document.reg_defensa.procedencia.focus(); //el puntero del mouse queda en precio 
		finalizarIns();
		var mensaje='Debe especificar la Procedencia del Tr�mite';
		div=document.getElementById('mensaje');
		div.innerHTML=div.innerHTML + mensaje;
        return 0; //devolvemos un cero para dejar de validar 
    }
    if(document.reg_defensa.universitario.value.length < 2)
	{ //si el largo de precio es igual o menor a 0 caracteres 
        document.reg_defensa.universitario.focus(); //el puntero del mouse queda en precio 
		finalizarIns();
		var mensaje='Debe ingresar el nombre del Universitario(a)';
		div=document.getElementById('mensaje');
		div.innerHTML=div.innerHTML + mensaje;
        return 0; //devolvemos un cero para dejar de validar 
    }
    if(document.reg_defensa.fojas.value.length < 1)
	{ //si el largo de precio es igual o menor a 0 caracteres 
        document.reg_defensa.fojas.focus(); //el puntero del mouse queda en precio 
		finalizarIns();
		var mensaje='Debe ingresar el N�mero de Fojas';
		div=document.getElementById('mensaje');
		div.innerHTML=div.innerHTML + mensaje;
        return 0; //devolvemos un cero para dejar de validar 
    }
    if((document.reg_defensa.destino.value.length<2) && (document.reg_defensa.otro.value.length<2))
	{   //si el largo de nombre es menor a 2 caracteres 
        document.reg_defensa.destino.focus(); //el puntero del mouse queda en nombre 
		finalizarIns();
		var mensaje='Debe especificar el Destino del tr�mite';
		div=document.getElementById('mensaje');
		div.innerHTML=div.innerHTML + mensaje;
        return 0; //devolvemos un cero para dejar de validar 
    } 
    if(document.reg_defensa.estado.value.length < 1)
	{ //si el largo de precio es igual o menor a 0 caracteres 
        document.reg_defensa.estado.focus(); //el puntero del mouse queda en precio 
		finalizarIns();
		var mensaje='Debe seleccionar el Estado del Tr�mite';
		div=document.getElementById('mensaje');
		div.innerHTML=div.innerHTML + mensaje;
        return 0; //devolvemos un cero para dejar de validar 
    }
	
	//effffffff
	//Modificacion 25/03/2015	
	var docu = document.reg_defensa.fTheFileField3.value;
	var partido = docu.split(".");
	for(var i = 0; i < partido.length; i++)
	{
	var extension = partido[i]; 
	}
	
	if( extension != "pdf" && extension != "doc" && extension != "docx" && extension != "xls" && extension != "xlsx" && extension != "")
	{
	document.reg_defensa.fTheFileField3.focus();
	finalizarIns();
	var mensaje='La extension del archivo debe ser "pdf, doc, xls, docx o xlsx"';
	div=document.getElementById('mensaje');
	div.innerHTML=div.innerHTML + mensaje;
	return 0;
	}
	/*
	var dodo = document.reg_defensa.fTheFileField3.value;
	var tam=0;
	tam = dodo.length
	
	if(tam > 40)
	{
	document.reg_defensa.fTheFileField3.focus();
	finalizarIns();
	var mensaje='El nombre del Archivo debe contener maximo 36 caracteres en su nombre';
	div=document.getElementById('mensaje');
	div.innerHTML=div.innerHTML + mensaje;
	return 0;}
	//efff
	*/
	else
	{ //sino enviamos el formulario 
        document.reg_defensa.submit(); //enviamos formulario     
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
                            <p align="left" class="Estilo77">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo 'Unidad: '; echo $unidad .' <br>&nbsp;&nbsp;&nbsp; Usuario: '. $nombre;?><br>
                            </p>
                            <form name="reg_defensa" action="defensa_save.php" enctype="multipart/form-data" method="post" >
                              <p><span class="Estilo77">&nbsp;&nbsp;Por favor ingrese los siguientes datos:</span></p>
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
<option value="Certificado de Alumno Regular">Certificado de Alumno Regular</option><o
ption value="Conclusion de Estudios">Conclusi�n de Estudios</option>
<option value="Defensa de Tesis">Defensa de Tesis</option>
<option value="Defensa de Tesis de Maestria">Defensa de Tesis de Maestria</option>
<option value="Diploma Academico">Diploma Academico</option>
<option value="Graduacion Directa">Graduacion Directa</option>
<option value="Historial Academico">Historial Academico</option>
<option value="Legalizacion de Documentos">Legalizacion de Documentos</option>
<option value="Titulo Academico">Revalida de Titulo</option>
<option selected value="Titulo Academico">T�tulo Acad�mico</option>
<option value="Titulo en Provision Nacional">T�tulo en Provisi�n Nacional</option>
<option value="Pr�cticas Profesionales">Pr�cticas Profesionales</option>
</select></td>
                                      </tr>
                                      <tr>
                                        <td height="15" bgcolor="#CCDDEE"><div align="right"><span class="Estilo78">Procedencia: </span><span class="Estilo74"></span></div></td>
                                        <td bgcolor="#CCDDEE" class="Estilo64">&nbsp;<span class="Estilo59">
                                          <select name="procedencia" style="width:248px" class="Estilo64">
					    <option></option>
					    <option value="Gestiones">Gestiones</option>
					    <option value="Asesoria Juridica">Asesoria Juridica</option>
                                            <option selected value="Titulos y Diplomas">Titulos y Diplomas</option>
                                          </select>
                                        </span></td>
                                      </tr>
                                      <tr>
                                        <td height="15"><div align="right"><span class="Estilo78">Otro:</span></div></td>
                                        <td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;
                                              <input name="otro" value="" type="text" style="width:248px" class="Estilo64" onKeyPress="return solo_letras(event)"/>
                                        </span></td>
                                      </tr>
                                      <tr>
                                        <td height="15" bgcolor="#CCDDEE"><div align="right"><span class="Estilo78">Reg. Externo: </span></div></td>
                                        <td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;
                                              <input name="reg_externo" value="" type="text" style="width:248px" class="Estilo64" onKeyPress="return numeros_letras_especiales(event)"/>
                                        </span></td>
                                      </tr>
                                      <tr>
                                        <td height="15" class="Estilo78"><div align="right" class="Estilo78">Universitario(a):</div></td>
                                        <td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;
                                          <input name="universitario" value="" type="text" style="width:248px" class="Estilo64" onKeyPress="return solo_letras(event)"/>
                                        </span></td>
                                      </tr>
                                      <tr>
                                        <td height="15" bgcolor="#CCDDEE"><div align="right"><span class="Estilo78">N&ordm; Fojas:</span></div></td>
                                        <td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;
                                              <input value="Expediente"  name="fojas" type="text" class="Estilo64" id="fojas" style="width:248px" onKeyPress="return numeros_letras(event)"/>
                                        </span></td>
                                      </tr>
                                      <tr>
                                        <td height="15"><div align="right"><span class="Estilo78">Destino:</span><span class="Estilo74"></span></div></td>
                                        <td bgcolor="#CCDDEE" class="Estilo64">&nbsp;<span class="Estilo59">
                                          <select name="destino" style="width:248px" class="Estilo64">
                                            <option selected></option>
                                            <option value="Carrera de Biologia">Carrera de Biologia</option>
                                            <option value="Carrera de Estadistica">Carrera de Estadistica</option>
                                            <option value="Carrera de Fisica">Carrera de Fisica</option>
                                            <option value="Carrera de Informatica">Carrera de Informatica</option>
                                            <option value="Carrera de Matematicas">Carrera de Matematicas</option>
                                            <option value="Carrera de Quimica">Carrera de Quimica</option>
                                            <option value="Postgrado en Informatica">Postgrado de Informatica</option>
                                            <option value="Postgrado de Ecologia">Postgrado de Ecologia</option>
                                            <option value="Postgrado de Fisica">Postgrado de Fisica</option>
                                            <option value="Postgrado de Quimica">Postgrado de Quimica</option>
                                            <option value="Postgrado de Biologia">Postgrado de Biologia</option>
					    <option value="Postgrado de Estadistica">Postgrado de Estadistica</option>
                                            <option value="Decanato">Decanato</option>
					    <option value="Vicedecanato">Vicedecanato</option>
                                          </select>
                                        </span></td>
                                      </tr>
                                      <tr>
                                        <td height="15" bgcolor="#CCDDEE"><div align="right"><span class="Estilo78">Recibido por: </span><span class="Estilo74"></span></div></td>
                                        <td bgcolor="#CCDDEE" class="Estilo65">&nbsp;&nbsp;&nbsp;<? echo $nombre;?></td>
                                      </tr>
                                      <tr>
                                        <td height="15" class="Estilo78"><div align="right"><span class="Estilo78">Estado:</span></div></td>
                                        <td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE">&nbsp;
                                            <select name="estado" style="width:248px;" class="Estilo64">
                                              <option selected value="C">C: Conocimiento</option>
                                              <option value="F">F: Finalizado</option>
                                              <option value="R">R: Respuesta</option>
                                              <option value="U">U: Urgente</option>
                                            </select>
                                        </td>
                                      </tr>
									  <tr>
													   	<td height="40"><div align="right"><span class="Estilo78">Adjuntar Documentos:</span></div></td>
														<td width="500px" background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo74">
                                              			<span class="Estilo74"><input name="fTheFileField3" id="fTheFileField3" type="file" size="24"></span>
											  		</span></td>
													</tr>
                                    </table>
									<table width="403" border="0" align="center" cellpadding="0" cellspacing="2">
                                      <tr>
                                        <td width="397" bordercolor="#74ABD3" bgcolor="#CCDDEE" class="Estilo37"><p align="center">
                                            <input name="enviar3" type="button" class="Estilo59" style="width:90px;background-color:#4791C5;border:0px;margin:1px;padding:0px; font-weight: bold;" value="Enviar Datos" onClick="verifica()">
                                          &nbsp;&nbsp;&nbsp;&nbsp;
                                          <input name="cancelar22" type="reset" class="Estilo59" style="width:90px;background-color:#4791C5;border:0px;margin:1px;padding:0px; font-weight: bold;" value="Cancelar" >
                                        </p></td>
                                      </tr>
								  </table>
									<br></td>
                                </tr>
                                <tr>
                                  <td height="1" bgcolor="#74ABD3"></td>
                                </tr>
                              </table>
                              </form>
							  <br>
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
<table style="position:absolute;top:171px;left:3px;"width="132" height="240" border="0" cellpadding="0" cellspacing="0">
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
