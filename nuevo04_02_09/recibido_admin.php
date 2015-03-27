<?php
session_start();
if (!isset($_SESSION['paso_por_donde_yo_quiero']))
{ 
	header ("Location: index.php"); 
	exit; 
} 
$cargo=$_SESSION['cargo']; 
$id_user=$_SESSION['id_user'];
$nombre=$_SESSION['nombre_ini']; 
$unidad=$_SESSION['unidad_ini']; 
$id_unidad=$_SESSION['id_unidad']; 

include("../funciones1.php");
include ("../php/fecha_hora.php");
include ('tiempo_tramite.php');
$link=conexion();
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
window.top.location.href = "archivo.php?cad="+arv;
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
<!--style="position:absolute;" -->
<table width="780" border="0" align="center" cellspacing="0">
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
    <td height="248" colspan="2"><table width="780" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td width="132" height="246" bgcolor="#8fb1d2">&nbsp;</td>             
            <td rowspan="3"><div align="center">
              <table width="646" height="246" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td width="5">&nbsp;</td>
                  <td bgcolor="#336699"><div align="center">
                    <table width="644" height="246" border="2" align="center" cellpadding="0" cellspacing="0" bordercolor="#8fb1d2">
                      <tr>
                        <td background="../img/fondo_cuerpo.gif"><center>
                            <p align="left" class="Estilo77">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo 'Unidad: '; echo $unidad .' <br>&nbsp;&nbsp;&nbsp; Usuario: '. $nombre;?><br>
                              &nbsp;&nbsp;&nbsp;&nbsp;</p><p align="center" class="Estilo77">Se han encontrado <?php echo $numResultados;?> coincidencias.</p>
                            <table width="632" border="0" cellpadding="0" cellspacing="0">
                              <tr>
                                <td width="29" height="21" background="../img/encabezado_tabla_01.gif">&nbsp;</td>
                                <td width="574" background="../img/encabezado_tabla_02.gif"><div align="center" class="Estilo59">DATOS GENERALES DEL TR&Aacute;MITE </div></td>
                                <td width="29" background="../img/encabezado_tabla_04.gif">&nbsp;</td>
                              </tr>
                              <tr>
                                <td height="2" colspan="3"></td>
                              </tr>
                            </table>
                          <table width="632" border="0" cellpadding="0" cellspacing="2" bgcolor="#74ABD3">
                              <tr>
                                <td></td>
                              </tr>
                              <tr>
                                <td bgcolor="#B1CBE4"><table width="628" border="0" align="center" cellpadding="0" cellspacing="2" bordercolor="#EDF7FF">
                                    <tr>
                                      <td width="46" bgcolor="#4791C5"><div align="center" class="Estilo2">
                                        <p>Archivar</p>
                                        <p><button class="Estilo2" style="width:46px;background-color:#4791C5;border:0px;margin:1px;padding:0px; font-weight: bold;" onClick="valores(this.form, 't[]')">Archivar</button></p>
                                      </div></td>
									  <td width="38" bgcolor="#4791C5"><div align="center" class="Estilo2">
									    <p>Recibir</p>
									    <p><button class="Estilo2" style="width:38px;background-color:#4791C5;border:0px;margin:1px;padding:0px; font-weight: bold;" onClick="valoresr(this.form, 'r[]')">Recibir</button></p>
									  </div></td>
                                      <td width="43" bgcolor="#4791C5"><div align="center" class="Estilo2">
                                        <p>Asignar</p>
                                        <p><button class="Estilo2" style="width:43px;background-color:#4791C5;border:0px;margin:1px;padding:0px; font-weight: bold;" onClick="valoresa(this.form, 'a[]')">Asignar</button></p>
                                      </div></td>
                                      <td width="50" height="15" bgcolor="#4791C5" class="Estilo2"><div align="center">R.U.T.</div></td>
                                      <td width="67" height="15" bgcolor="#4791C5" class="Estilo2"><div align="center">Fecha Ingreso </div></td>
                                      <td width="73" bgcolor="#4791C5"><div align="center" class="Estilo2">Procedencia</div></td>
                                      <td width="81" bgcolor="#4791C5"><div align="center" class="Estilo2">
                                        Correlativo                                        </div></td>
                                      <td width="80" bgcolor="#4791C5"><div align="center" class="Estilo2">Referencias</div></td>
                                      <td width="70" bgcolor="#4791C5"><div align="center" class="Estilo2">Seguimiento</div></td>                                 

                                      <td width="58" bgcolor="#4791C5"><div align="center" class="Estilo2">Despachar</div></td>
                                    </tr>
<form name="f1">
<?
$a=0;
$consulta = "SELECT distinct(rut) FROM correspondencia WHERE destino like '$unidad' or destino like '$nombre' order by id_c DESC";
$resultado=mysql_query($consulta) or die ("Error de búsqueda en la BD: ". mysql_Error());
$numResultados = mysql_num_rows($resultado);
if ($numResultados > 0)
{
	$i=0;
	while($linea=mysql_fetch_array($resultado))
	{	
		$rec=0;
		$rut=$linea["rut"]; 
		$i++;
		$sql = "SELECT * FROM correspondencia WHERE rut like '$rut' order by id_c DESC limit 1";
		$res = mysql_query($sql) or die ("Error de búsqueda en la BD: ". mysql_Error());
		$num = mysql_num_rows($res);
		if($num > 0)
		{	
			$vec = mysql_fetch_array($res);
			$destino = $vec["destino"];
			if($destino == $nombre)
			{	$id_c=$vec["id_c"];
				$rut=$vec["rut"]; 
				$responsable=$vec["responsable"];
				$fecha=$vec["fecha"];
				$tipo=$vec["tipo"];
				$referencias=$vec["referencias"];
				$destino=$vec["destino"];
				
				//CALCULAMOS EL TIEMPO DE PERMANENCIA DEL TRAMITE
                $fecha_fin=fecha_hora();
                $fecha_ini=$fecha;
				$total = tiempo_tramite($fecha_ini,$fecha_fin);
				$vector = explode(",",$total);
					if ($vector [0]!=0)
						$alert=1;
					elseif ($vector [1]!=0)
						$alert = 1;
						elseif ($vector[2] >= 30)
							$alert =1;
							elseif ($vector[2] >= 15)
								$alert =2;
								else
								$alert=0;
				echo '
                <tr>';
				echo '<td height="50" bgcolor="#E1F1FF" class="Estilo78"><center>'; 
				echo '<input type="checkbox" name="t[]" value="'.$rut.'">';
				echo '<input type="hidden" name="t[]" value="'.$rut.'">';
				echo '</center></td>';
				
//Buscamos en la tabla recibido si el id_c existe (el usuario ha recibido la correspondencia)
			$sql7 = "SELECT id_c FROM recibido WHERE id_c = '$id_c' and recibido_por like '%$nombre%'";
			$res7 = mysql_query($sql7) or die ("Error de búsqueda en la BD: ". mysql_Error());
			$num7 = mysql_num_rows($res7);
			if($num7 > 0)
			{	
				echo '<td height="50" bgcolor="#E1F1FF" class="Estilo78"><center>'; 
				echo 'Recibido';
				echo '</center></td>';
			}
			else
			{	
				echo '<td height="50" bgcolor="#E1F1FF" class="Estilo78"><center>'; 
				echo '<input type="checkbox" name="r[]" value="'.$id_c.'">';
				echo '<input type="hidden" name="r[]" value="'.$id_c.'" >';
				echo '</center></td>';
			}
				echo '<td height="50" bgcolor="#E1F1FF" class="Estilo78"><center>'; 
				echo '<input type="checkbox" name="a[]" value="'.$rut.'">';
				echo '</center></td>';
				echo '<input type="hidden" name="a[]" value="'.$id_c.'" >';
				if ($alert == 0)
				{
                echo '<td height="50" bgcolor="#E1F1FF" class="Estilo78"><center>'; 
				echo $rut;
				echo '</center></td>';
				}
				elseif ($alert == 1)
				{
                echo '<td height="50" bgcolor="#b81d0c" class="Estilo82"><center>'; 
				echo $rut;
				echo '</center></td>';
				}
				elseif ($alert == 2)
				{
                echo '<td height="50" bgcolor="#FFFF6A" class="Estilo84"><center>'; 
				echo $rut;
				echo '</center></td>';
				}
                echo '<td height="50" bgcolor="#E1F1FF" class="Estilo78"><center>'; 
				echo $fecha; 
				echo '</center></td>
                <td height="50" bgcolor="#E1F1FF" class="Estilo78"><center>';
				echo $responsable;
				echo '</center></td>
                <td height="50" bgcolor="#E1F1FF" class="Estilo78"><center>';
				echo $tipo;
				echo '</center></td>
                <td height="50" bgcolor="#E1F1FF" class="Estilo78"><center>
				<table width="141" border="0">
                      	<tr>
                          <td align="char" class="Estilo78">'; echo $referencias;echo '</td>
                      </tr>
                </table>';
				echo'</center></td>
				<td height="50" bgcolor="#E1F1FF" class="Estilo78"><center>';
				echo '<a href="seguimiento.php?reg='.$rut.'">Seguimiento</a>';
				echo'</center></td>';
/*				if($rec==1)
				{
					echo'
					<td height="50" bgcolor="#EDF7FF" class="Estilo77"><center>';
					echo 'Recibido';
					echo'</center></td>';
				}
				else
				{
					echo'
					<td height="50" bgcolor="#E1F1FF" class="Estilo78"><center>';
					echo '<a href="recibir.php?reg='.$id_c.'">Ver</a>';
					echo'</center></td>';
				}*/
				echo'
				<td height="50" bgcolor="#E1F1FF" class="Estilo78"><center>';
				echo '<a href="despacho.php?id='.$id_c.'">Despachar</a>';
				echo'</center></td>
                </tr>';
				$a++;
			}
		}
	}
}
echo 'TOTAL '.$a;
?>
                                    <tr>
                                      <td height="7" colspan="17" bgcolor="#CCDDEE" class="Estilo78"></td>
                                    </tr>
                                    <tr>
                                      <td height="15" colspan="17" class="Estilo78"><button class="Estilo2" style="width:46px;background-color:#4791C5;border:0px;margin:1px;padding:0px; font-weight: bold;" onClick="valores(this.form, 't[]')">Archivar</button>
                                        <button class="Estilo2" style="width:38px;background-color:#4791C5;border:0px;margin:1px;padding:0px; font-weight: bold;" onClick="valoresr(this.form, 'r[]')">Recibir</button>
                                        <button class="Estilo2" style="width:43px;background-color:#4791C5;border:0px;margin:1px;padding:0px; font-weight: bold;" onClick="valoresa(this.form, 'a[]')">Asignar</button>
                                        <a href="javascript:seleccionar_todo()">Marcar todos</a> | <a href="javascript:deseleccionar_todo()">Marcar ningun</a></td>
                                    </tr>
                                </table></td>
                              </tr>
                              <tr>
                                <td height="1" bgcolor="#74ABD3"></td>
                              </tr>
                            </table>
                        </center></td>
                      </tr>
                    </table>
                  </div></td>
                </tr>
              </table>
            </div>              </td>
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
</body>
</html>