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

$id_c = $_GET['rut'];

$sql = "SELECT rut FROM correspondencia WHERE id_c = '$id_c'";
$res = mysql_query($sql) or die ("Error de b&uacute;squeda en la BD: ".mysql_error());
$num = mysql_num_rows($res);
if($num > 0)
{			
	$vec = mysql_fetch_array($res);
	$rut = $vec["rut"];
}
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
<SCRIPT language=JavaScript src="../javascript/funciones.js"></SCRIPT>
<SCRIPT language=JavaScript src="../javascript/mensajes.js"></SCRIPT>
<SCRIPT language=JavaScript src="../fecha-hora_bc.js"></SCRIPT>
<script type="text/javascript" src="../Sothink DHTML Menu/Resource/js/stmenu.js"></script>
<SCRIPT language=JavaScript>
function verifica()
{  
    if(document.sup.value.length < 27)
	{   //si el largo de nombre es menor a 2 caracteres 
        document.impresion.tipo.focus(); //el puntero del mouse queda en nombre 
		finalizarIns();
		var mensaje='Debe especificar el Tipo de Trámite';
		div=document.getElementById('mensaje');
		div.innerHTML=div.innerHTML + mensaje;
        return 0; //devolvemos un cero para dejar de validar 
    } 
    if(document.izq>200)
	{   //si el largo de nombre es menor a 2 caracteres 
        document.impresion.destino.focus(); //el puntero del mouse queda en nombre 
		finalizarIns();
		var mensaje='Debe especificar el Destino del trámite';
		div=document.getElementById('mensaje');
		div.innerHTML=div.innerHTML + mensaje;
        return 0; //devolvemos un cero para dejar de validar 
    } 

	else
	{ //sino enviamos el formulario 
        document.impresion.submit(); //enviamos formulario     
    } 
}
function ismaxlength(obj)
{
	var mlength=obj.getAttribute? parseInt(obj.getAttribute("maxlength")) : ""
	if (obj.getAttribute && obj.value.length>mlength)
	obj.value=obj.value.substring(0,mlength)
}
</SCRIPT>
<style type="text/css">
<!--
body {
	background-image: url(../img/fondo_cuerpo.gif);
}
.Estilo88 {font-size: 14px}
-->
</style></head>
<body bottommargin="0" leftmargin="0" rightmargin="0" topmargin="0" bgcolor="#EDF7FF" onload=escrolea() oncontextmenu="return false">
</td>
</tr>
<tr>
    <td></td>
  </tr>
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

<table width="200" border="0" align="center">
  <tr>
    <td><div align="center">
      <table width="390" height="246" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td width="390" background="../img/fondo_cuerpo.gif"><div align="center">
              <table width="353" height="246" border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#8fb1d2">
                <tr>
                  <td width="347" background="../img/fondo_cuerpo.gif"><center>
                      <p align="center" class="Estilo77">CONFIGURACION PERSONALIZADA</p>
                    <form name="impresion" method="post" action="reporte/reporte_rut_rec_conf.php">
                        <div align="left">
                          <p align="center" class="Estilo77">Introduzca los m&aacute;rgenes para la Impresi&oacute;n</p>
                          <p align="center" class="Estilo77"><strong><? echo 'RUT '.$rut;?></strong></p>
                          <center>
                            <table width="327" height="21" border="0" cellpadding="0" cellspacing="0">
                              <tr>
                                <td width="29" height="21" background="../img/encabezado_tabla_01.gif">&nbsp;</td>
                                <td width="269" background="../img/encabezado_tabla_02.gif"><div align="center" class="Estilo59">MARGENES DE IMPRESION</div></td>
                                <td width="29" background="../img/encabezado_tabla_04.gif">&nbsp;</td>
                              </tr>
                              <tr>
                                <td height="2" colspan="3"></td>
                              </tr>
                            </table>
                            <table width="327" border="0" align="center" cellpadding="0" cellspacing="2" bgcolor="#74ABD3">
                              <tr>
                                <td></td>
                              </tr>
                              <tr>
                                <td bgcolor="#B1CBE4"><table width="316" border="0" align="center" cellpadding="0" cellspacing="2">
                                    <tr>
                                      <td width="153" height="15"><div align="right"><span class="Estilo78"><br>
                                        Margen 
Izquierdo: </span></div></td>
                                      <td width="157" background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64"> <span class="Estilo59">&nbsp;
                                      <input name="izq" type="text" style="width:100px" class="Estilo64" onKeyPress="return solo_numeros(event)" maxlength="3"/>
 </span></span></td>
                                    </tr>
                                    <tr>
                                      <td height="15"><div align="right">
                                          <p class="Estilo78">&nbsp;</p>
                                        <p class="Estilo78">Margen Superior:</p>
                                        </div></td>
                                      <td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;
                                        <input name="sup" type="text" style="width:100px" class="Estilo64" onKeyPress="return solo_numeros(event)" maxlength="3"/>
                                      </span></td>
                                    </tr>
                                    <tr>
                                      <td height="10" colspan="2" class="Estilo59"></td>
                                    </tr>
                                    <tr>
                                      <td height="17" colspan="2" bgcolor="#CCDDEE" class="Estilo59"><div align="center">
                                          <input name="enviar" type="submit" class="Estilo59" style="width:90px;background-color:#4791C5;border:0px;margin:1px;padding:0px; font-weight: bold;" value="Aceptar" >
                                          
                                        &nbsp;&nbsp;&nbsp;&nbsp;
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
                          </center>
                          <span class="Estilo59">
                          <input name="resp" value="<? echo $nombre;?>"type="hidden" style="width:150px" class="Estilo64" onKeyPress="return solo_numeros(event)" id="der3" />
                          <input name="id" value="<? echo $id_c;?>"type="hidden" style="width:150px" class="Estilo64" onKeyPress="return solo_numeros(event)" id="der4" />
                          </span><br> 

                        </div>
                    </form>
                  </center></td>
                </tr>
              </table>
          </div></td>
        </tr>
      </table>
    </div></td>
  </tr>
  <tr>
    <td><table width="327" border="0" align="center" cellpadding="0" cellspacing="2" bgcolor="#74ABD3">
        <tr>
          <td><div align="center"><span class="Estilo59 Estilo79 Estilo88">IMPORTANTE</span></div></td>
        </tr>
        <tr>
          <td bgcolor="#B1CBE4"><table width="318" border="0" align="center" bgcolor="#B1CBE4">
            <tr>
              <td><p class="Estilo78 Estilo79">&nbsp;</p>
                <p class="Estilo78 Estilo79">Las medidas en el <strong>MARGEN IZQUIERDO</strong> (eje X) deben estar en un rango de  2 a 144.</p>
                <p class="Estilo78 Estilo79">Las medidas en el <strong>MARGEN SUPERIOR</strong> (eje Y) deben estar en un rango de  2 a 233.</p>
                <p class="Estilo78 Estilo79">Caso contrario no ser&aacute; posible la impresi&oacute;n, por estar fuera del margen de impresi&oacute;n.</p>
                <p class="Estilo78 Estilo79"><u>NOTA</u>.- La escala es 1:10 (1cm equivale a 10 pixeles)</p>
                <p class="Estilo78">&nbsp;</p></td>
            </tr>
          </table>
          </td>
        </tr>
        <tr>
          <td height="1" bgcolor="#74ABD3">&nbsp;</td>
        </tr>
      </table>
      <p>&nbsp;</p>
    <p>&nbsp;</p></td>
  </tr>
</table>
</body>
</html>