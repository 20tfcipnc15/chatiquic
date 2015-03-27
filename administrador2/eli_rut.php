<?php
session_start();
if (!isset($_SESSION['administrador']))
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

include ("../php/fecha_hora.php");

$msm = $_GET['cad'];
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
<SCRIPT language=JavaScript src="../fecha-hora_bc.js"></SCRIPT>
<SCRIPT language=JavaScript src="../javascript/ajax.js"></SCRIPT>

<SCRIPT language=JavaScript src="../javascript/prototype.js"></SCRIPT>

<script type="text/javascript" src="../Sothink DHTML Menu/Resource/js/stmenu.js"></script>
<script language=JavaScript>
    function buscar(e)
{
	//var codtar='<c:out value="${codtar}"/>';
        if(e.value.length > 2)
	{
	        var params = 'lik='+e.value;

                alert("aqui    -    -:"+params);
	        var url = 'hola.php';

	        new Ajax.Updater({success:'resultado'},url,
                {method: 'post', parameters: params, onFailure: reportError});
         }
         //else
	// {
	//	$('resultado').innerHTML="";
	// }
         return false;
}
function reportError(request)
{
	$('fixme') = "Error";
}
</script>

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
                            <p align="left" class="Estilo77"><br>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo 'Unidad: '; echo $unidad .' <br>&nbsp;&nbsp;&nbsp; Usuario: '. $nombre;?><br>
                              &nbsp;</p> 
                            <span class="google-ro"> <? echo $msm;?> </span>
                          <form name="registro_recibida" method="post" action="eli_rut_res.php">
                              <div align="left">
                                  <? echo $msm;?>
                                <p align="center" class="Estilo77">Introduzca uno o varios Par&aacute;metros<br><br>Para Realizar la B&uacute;squda</p>
                                <center>
                                  <table width="254" height="21" border="0" cellpadding="0" cellspacing="0">
                                    <tr>
                                      <td width="29" height="21" background="../img/encabezado_tabla_01.gif">&nbsp;</td>
                                      <td width="194" background="../img/encabezado_tabla_02.gif"><div align="center" class="Estilo59">RUT  A ELIMINAR</div></td>
                                      <td width="29" background="../img/encabezado_tabla_04.gif">&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td height="2" colspan="3"></td>
                                    </tr>
                                  </table>
                                  <table width="254" border="0" align="center" cellpadding="0" cellspacing="2" bgcolor="#74ABD3">
                                    <tr>
                                      <td></td>
                                    </tr>
                                    <tr>
                                      <td bgcolor="#B1CBE4"><table width="250" border="0" align="center" cellpadding="0" cellspacing="2">
                                          <tr>
                                            <td height="15" width="85" bgcolor="#CCDDEE"><div align="right"><span class="Estilo78">RUT:</span></div></td>
                                            <td width="159" background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;
                                                  <input name="rut" type="text" style="width:150px" class="Estilo64" onKeyPress="return numeros_letras_especiales(event)"/>
                                            </span></td>
                                          </tr>
                                          <tr>
                                            <td height="10" colspan="2" class="Estilo59"></td>
                                          </tr>
                                          <tr>
                                            <td height="17" colspan="2" bgcolor="#CCDDEE" class="Estilo59"><div align="center">
                                                <input name="enviar" type="submit" class="Estilo59" style="cursor:pointer; width:90px;background-color:#4791C5;border:0px;margin:1px;padding:0px; font-weight: bold;" value="Aceptar" >
                                              &nbsp;&nbsp;&nbsp;&nbsp;
                                              <input name="cancelar2" type="reset" class="Estilo59" style="cursor:pointer; width:90px;background-color:#4791C5;border:0px;margin:1px;padding:0px; font-weight: bold;" value="Cancelar" >
                                            </div></td>
                                          </tr>
                                      </table></td>
                                    </tr>
                                    <tr>
                                      <td height="1" bgcolor="#74ABD3"></td>
                                    </tr>
                                  </table>
                                  <p>&nbsp;</p>
                                </center>
                                </div>
                              </form>
                            </center></td>
                        </tr>
                    </table>
     <div id="resultado">
                 <!-- resultados -->
              </div>
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



<table style="position:absolute;top:171px;left:112px;"width="132" height="240" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td height="92"><script src="menu_sp.js"></script></td>
  </tr>
  <tr>
    <td></td>
  </tr>
</table>
</body>
</html>