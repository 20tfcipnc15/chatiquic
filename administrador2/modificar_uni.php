<?php
session_start();
if (!isset($_SESSION['administrador']))
{ 
	header ("Location: index.php"); 
	exit; 
} 
$id_user=$_SESSION['id_user'];
$nombre=$_SESSION['nombre_ini']; 
$unidad1=$_SESSION['unidad_ini']; 
$id_unidad1=$_SESSION['id_unidad'];

include("../funciones1.php");
$link=conexion();

$id_unidad = $_GET['id'];
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
<SCRIPT language=JavaScript src="../fecha-hora_bc.js"></SCRIPT>
<script type="text/javascript" src="../Sothink DHTML Menu/Resource/js/stmenu.js"></script>
</head>
<body bottommargin="0" leftmargin="0" rightmargin="0" topmargin="0" bgcolor="#EDF7FF" onload=escrolea() oncontextmenu="return false">
<table width="1000" border="0" cellspacing="0">
  <tr>
    <td width="270" height="28" bordercolor="0" background="../img/umsa_banner1.GIF"><div align="left"></div></td>
    <td width="730" height="28" bordercolor="0" background="../img/fondo_banner_rojo1.gif"><div align="right" class="Estilo13">
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
              <td width="133"><table style="position:absolute; top:171px; left:2px; width: 129px; height: 137px;"width="132" height="240" border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td width="132" height="92"><script src="menu_sp.js"></script></td>
                </tr>
              </table></td>
              <td width="717" bgcolor="#EDF7FF"><table width="711" height="246" border="2" align="center" cellpadding="0" cellspacing="0" bordercolor="#8fb1d2">
                <tr>
                  <td width="705" background="../img/fondo_cuerpo.gif"><br><p><span class="Estilo77">&nbsp;&nbsp;&nbsp;&nbsp;Unidad: <?php echo $unidad1;?><br>
  &nbsp;&nbsp;&nbsp;&nbsp;Usuario: <? echo $nombre; ?></span></p>
                    <p align="center" class="Estilo77">Se han encontrado <?php echo $numResultados;?> coincidencias.</p>
                    <div align="left">
                      <form name="mod_user" method="post" action="save_mod_uni.php">
                      <table width="550" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                          <td width="29" height="21" background="../img/encabezado_tabla_01.gif">&nbsp;</td>
                          <td width="492" background="../img/encabezado_tabla_02.gif"><div align="center" class="Estilo59">MODIFICAR DATOS DE LA UNIDAD</div></td>
                          <td width="29" background="../img/encabezado_tabla_04.gif">&nbsp;</td>
                        </tr>
                        <tr>
                          <td height="2" colspan="3"></td>
                        </tr>
                      </table>
                      <table width="550" border="0" align="center" cellpadding="0" cellspacing="2" bgcolor="#74ABD3">
                        <tr>
                          <td></td>
                        </tr>
                        <tr>
                          <td bgcolor="#B1CBE4"><table width="546" border="0" align="center" cellpadding="0" cellspacing="2" bordercolor="#EDF7FF">
<?php
$total = 0;
$sql = "select * from unidad where id_unidad = '$id_unidad'";
$res = mysql_query($sql) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
$num = mysql_num_rows($res);
if ($num > 0)
{
	while($fila = mysql_fetch_array($res))
	{
            $nombre = $fila['nombre'];
            $responsable = $fila['responsable'];
            $sigla = $fila['sigla'];
            $telefono = $fila['telefono'];
            $direccion = $fila['direccion'];
            $e_mail = $fila['e_mail'];
            $cod_uni = $fila['cod_uni'];
?>
                                            <tr>
                                              <td height="15" width="120" bgcolor="#CCDDEE"><div align="right"><span class="Estilo78">ID</span></div></td>
                                            <td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;
                                                  <input name="nombre" type="text" style="width:200px" class="Estilo64" onKeyPress="return numeros_letras_especiales(event)" value ="<? echo $id_unidad;?>"/>
                                            </span></td>
                                            <td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE">&nbsp;</td>
                                          </tr>
                                            <tr>
                                              <td height="15" width="120" bgcolor="#CCDDEE"><div align="right"><span class="Estilo78">Unidad:</span></div></td>
                                            <td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;
                                                  <input name="nombre" type="text" style="width:200px" class="Estilo64" onKeyPress="return numeros_letras_especiales(event)" value ="<? echo $nombre;?>"/>
                                            </span></td>
                                            <td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">
                                                  <input name="nombre" type="text" style="width:200px" class="Estilo64" onKeyPress="return numeros_letras_especiales(event)" />
                                            </span></td>
                                          </tr>
                                          <tr>
                                            <td height="15"><div align="right"><span class="Estilo78">Sigla:</span></div></td>
                                            <td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;
                                                  <input name="usuario" type="text" style="width:200px" class="Estilo64" onKeyPress="return numeros_letras_especiales(event)" value ="<? echo $sigla;?>"/>
                                            </span></td>
                                            <td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">
                                              <input name="sigla" type="text" style="width:200px" class="Estilo64" onKeyPress="return numeros_letras_especiales(event)" />
                                            </span></td>
                                    </tr>
                                          <tr>
                                            <td height="15" bgcolor="#CCDDEE"><div align="right"><span class="Estilo78">Responsable:</span></div></td>
                                            <td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;
                                                  <input name="contrasenia" type="text" style="width:200px" class="Estilo64" onKeyPress="javascript:buscar(this)" value ="<? echo $responsable;?>"/>
                                            </span>                                            </td>
                                            <td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">
                                                  <input name="responsable" type="text" style="width:200px" class="Estilo64" onKeyPress="javascript:buscar(this)" />
                                            </span>                                            </td>
                                          </tr>
                                          <tr>
                                            <td height="15" class="Estilo78"><div align="right" class="Estilo78">Codigo:</div></td>
                                            <td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;
                                                  <input style="width:200px" class="Estilo64" name="clave" onKeyPress="return numeros_letras_especiales(event)" value ="<? echo $cod_uni;?>"/>
                                            </span>                                            </td>
                                            <td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">
                                                  <input name="cod_uni" style="width:200px" class="Estilo64" onKeyPress="return numeros_letras_especiales(event)" />
                                            </span>                                            </td>
                                          </tr>
                                          <tr>
                                            <td height="15" bgcolor="#CCDDEE" class="Estilo78"><div align="right" class="Estilo78">Direccion:</div></td>
                                            <td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;
                                                  <input style="width:200px" class="Estilo64" name="clave" onKeyPress="return numeros_letras_especiales(event)" value ="<? echo $direccion;?>"/>
                                            </span></td>
                                            <td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">
                                              <input style="width:200px" class="Estilo64" name="direccion" onKeyPress="return numeros_letras_especiales(event)" />
                                            </span></td>
                                          </tr>
                                          <tr>
                                            <td height="15" class="Estilo78"><div align="right" class="Estilo78">Telefono:</div></td>
                                            <td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;
                                                  <input style="width:200px" class="Estilo64" name="cargo" onKeyPress="return numeros_letras_especiales(event)" value ="<? echo $telefono;?>"/>
                                            </span></td>
                                            <td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">
                                                  <input style="width:200px" class="Estilo64" name="telefono" onKeyPress="return numeros_letras_especiales(event)" />
                                            </span></td>
                                          </tr>
                                          <tr>
                                            <td height="15" bgcolor="#CCDDEE" class="Estilo78"><div align="right" class="Estilo78">E-mail:</div></td>
                                            <td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;
                                                  <input name="ci" type="text" style="width:200px" class="Estilo64" onKeyPress="return solo_numeros(event)" value ="<? echo $e_mail;?>"/>
                                            </span></td>
                                            <td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">
                                              <input style="width:200px" class="Estilo64" name="e_mail" onKeyPress="return numeros_letras_especiales(event)" />
                                            </span></td>
                                          </tr>
                              <tr>
                                <td height="10" colspan="10" bgcolor="#CCDDEE" class="Estilo78"> <input name="id_unidad" type="hidden" value ="<? echo $id_unidad;?>"/></td>
                              </tr>
                                          <tr>
                                            <td height="17" colspan="2" bgcolor="#CCDDEE" class="Estilo59"><div align="center">
                                              <input name="enviar2" type="submit" class="Estilo59" style="cursor:pointer;width:90px;background-color:#4791C5;border:0px;margin:1px;padding:0px; font-weight: bold;" value="Modificar" >
                                            </div>                                            </td>
                                            <td bgcolor="#CCDDEE"> <div align="left"> <input name="cancelar" type="reset" class="Estilo59" style="cursor:pointer;width:90px;background-color:#4791C5;border:0px;margin:1px;padding:0px; font-weight: bold;" value="Cancelar" >
                                            </div></td>
                                          </tr>
<?
	}
}
?>

                              <tr>
                                <td height="15" colspan="10" class="Estilo78">&nbsp;</td>
                              </tr>
                          </table>
                            <span class="Estilo64">
                            </span></td>
                        </tr>
                        <tr>
                          <td height="1" bgcolor="#74ABD3"></td>
                        </tr>
                      </table>
                      </form>
                      </div>
                    </td></tr>
              </table></td>
              <td width="150" bgcolor="#8fb1d2" class="Estilo77"><? //include('online.php')?></td>
            </tr>
        </table></td>
        </tr>
    </table>
    </td>
  </tr>
  <tr>
    <td height="22" colspan="2"><table width="1000" height="20" border="0" cellpadding="0" cellspacing="0">
    
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
{
	$msm = 'Usted no ha ingresado ningun dato';
//	header ('Location: buscar.php?cad='.$msm);
}
?>