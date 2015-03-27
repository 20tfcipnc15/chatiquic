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
$id_unidad=$_SESSION['id_unidad'];

include("../funciones1.php");
$link=conexion();

$nombre = $_POST['nombre'];
$usuario = $_POST['usuario'];
$clave = $_POST['calve'];
$unidad = $_POST['unidad'];
$tipo = $_POST['tipo'];

$consulta = "SELECT id_unidad FROM unidad WHERE nombre like '$unidad'";
$resultado= mysql_query($consulta) or die ("Error de b�squeda en la BD: ". mysql_Error());
$numResultados = mysql_num_rows($resultado);
$linea=mysql_fetch_array($resultado);
$id_unidad = $linea["id_unidad"];

$vector[0]= $nombre;
$vector[1]= $usuario;
$vector[2]= $clave;
$vector[3]= $tipo;

$campo[0]= 'nombre';
$campo[1]= 'usuario';
$campo[2]= 'clave';
$campo[3]= 'tipo';

$sw=1;

for ($i=0;$i<=3;$i++)
{
	$dato=$vector[$i];
	if($dato != null)
		$sw=0;
}

$j=0;

$cadena='';
for ($i=0;$i<=3;$i++)
{
	$valor = $vector[$i];
	if($valor != null)
	{
		$atributo = $campo[$i];
		$cadena = $cadena.' '.$atributo." like '%".$valor."%' and ";
		$vectorA[$j] = $valor;
		$j++;
	}
}
/*if($unidad != null)
    $cadena = $cadena.' id_unidad = '.$id_unidad.' and ';*/
$long = strlen($cadena);
$cadena = substr($cadena,0,$long-5);
//echo 'cadena '.$cadena.'<br>';
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
                      <table width="694" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                          <td width="29" height="21" background="../img/encabezado_tabla_01.gif">&nbsp;</td>
                          <td width="636" background="../img/encabezado_tabla_02.gif"><div align="center" class="Estilo59">DATOS GENERALES DEL TR&Aacute;MITE </div></td>
                          <td width="29" background="../img/encabezado_tabla_04.gif">&nbsp;</td>
                        </tr>
                        <tr>
                          <td height="2" colspan="3"></td>
                        </tr>
                      </table>
                      <table width="694" border="0" align="center" cellpadding="0" cellspacing="2" bgcolor="#74ABD3">
                        <tr>
                          <td></td>
                        </tr>
                        <tr>
                          <td bgcolor="#B1CBE4"><table width="690" border="0" align="center" cellpadding="0" cellspacing="2" bordercolor="#EDF7FF">
                              <tr>
                                <td width="175" bgcolor="#4791C5" class="Estilo2"><div align="center">Nombre</div></td>
                                <td width="123" bgcolor="#4791C5"><div align="center" class="Estilo2">Cargo</div></td>
                                <td width="48" bgcolor="#4791C5" class="Estilo2"><div align="center">Tipo</div></td>
                                <td width="107" height="15" bgcolor="#4791C5" class="Estilo2"><div align="center">Usuario</div></td>
                                <td width="137" bgcolor="#4791C5"><div align="center" class="Estilo2">Contrasenia</div></td>
                                <td width="86" bgcolor="#4791C5"><div align="center" class="Estilo2">Modificar</div></td>
                              </tr>
<?php
$total = 0;
$sql = "select * from user where ".$cadena." ORDER BY id_user ASC";
$res = mysql_query($sql) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
$num = mysql_num_rows($res);
if ($num > 0)
{
	while($fila = mysql_fetch_array($res))
	{
            $id_user=$fila['id_user'];
            $usuario = $fila['usuario'];
            $contrasenia = $fila['contrasenia'];
            $nombre = $fila['nombre'];
            $cargo = $fila['cargo'];
            $clave = $fila['clave'];
            $ci = $fila['ci'];
            $cargo = $fila['cargo'];
            $tipo = $fila['tipo'];
            echo '
            <tr>
            <td height="50" bgcolor="#E1F1FF" class="Estilo78"><center>';
            echo $nombre;
            echo '</center></td>';
            echo '<td height="50" bgcolor="#E1F1FF" class="Estilo78"><center>';
            echo $cargo;
	    echo'</center></td>
	    <td height="50" bgcolor="#E1F1FF" class="Estilo78"><center>';
	    echo $tipo;
	    echo '</center></td>
            <td height="50" bgcolor="#E1F1FF" class="Estilo78"><center>';
	    echo $usuario;
	    echo '</center></td>
	    <td height="50" bgcolor="#E1F1FF" class="Estilo78"><center>';
	    echo $contrasenia;
	    echo '</center></td>
            <td height="50" bgcolor="#E1F1FF" class="Estilo78"><center>';
	    echo '<a href="modificar_user.php?id='.$id_user.'">Modificar</a>';
	    echo '</center></td>
            </tr>';
        }
	}
?>
                              <tr>
                                <td height="15" colspan="10" bgcolor="#CCDDEE" class="Estilo78">&nbsp;</td>
                              </tr>
                              <tr>
                                <td height="15" colspan="10" class="Estilo78">&nbsp;</td>
                              </tr>
                          </table></td>
                        </tr>
                        <tr>
                          <td height="1" bgcolor="#74ABD3"></td>
                        </tr>
                      </table>
                      <table width="200" border="0" cellpadding="0" cellspacing="0">
                        <tr>
                          <td>&nbsp;</td>
                          <td>&nbsp;</p>
                      <table width="292" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                          <td width="29" height="21" background="../img/encabezado_tabla_01.gif">&nbsp;</td>
                          <td width="240" background="../img/encabezado_tabla_02.gif"><div align="center" class="Estilo59">TIPOS DE USUARIO</div></td>
                          <td width="29" background="../img/encabezado_tabla_04.gif">&nbsp;</td>
                        </tr>
                        <tr>
                          <td height="2" colspan="3"></td>
                        </tr>
                      </table>
                      <table width="292" border="0" align="center" cellpadding="0" cellspacing="2" bgcolor="#74ABD3">
                        <tr>
                          <td></td>
                        </tr>
                        <tr>
                          <td bgcolor="#B1CBE4"><table width="288" border="0" align="center" cellpadding="0" cellspacing="2" bordercolor="#EDF7FF">
                              <tr>
                                <td width="35" bgcolor="#4791C5" class="Estilo2"><div align="center">No</div></td>
                                <td width="125" bgcolor="#4791C5"><div align="center" class="Estilo2">TIPO</div></td>
                                <td width="120" height="15" bgcolor="#4791C5" class="Estilo2"><div align="center">Usuario</div>                                  </td>
                                </tr>
                              <tr>
                                <td width="35" bgcolor="#E1F1FF" class="Estilo78"><div align="center">1</div></td>
                                <td width="125" bgcolor="#E1F1FF" class="Estilo78"><div align="center">Usuario Recepcionista</div></td>
                                <td width="120" height="15" bgcolor="#E1F1FF" class="Estilo78"><div align="center">
                                  <p>Todos (Excepto Jefes de Unidad)</p>
                                  </div>                                  </td>
                                </tr>
                              <tr>
                                <td width="35" bgcolor="#E1F1FF" class="Estilo78"><div align="center">2</div></td>
                                <td width="125" bgcolor="#E1F1FF" class="Estilo78"><div align="center">Super Usuario</div></td>
                                <td width="120" height="15" bgcolor="#E1F1FF" class="Estilo78"><div align="center">Jefes de Unidad</div>                                  </td>
                                </tr>
                              <tr>
                                <td height="8" colspan="7" bgcolor="#CCDDEE" class="Estilo78"></td>
                              </tr>
                              <tr>
                                <td height="8" colspan="7" class="Estilo78"></td>
                              </tr>
                          </table></td>
                        </tr>
                        <tr>
                          <td height="1" bgcolor="#74ABD3"></td>
                        </tr>
                      </table>
                   </td>
                        </tr>
                      </table>
                      <p>&nbsp;</p></td></tr>
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
