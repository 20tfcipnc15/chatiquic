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
$cargo=$_SESSION['cargo']; 
$id_user=$_SESSION['id_user'];
$nombre=$_SESSION['nombre_ini']; 
$unidad=$_SESSION['unidad_ini']; 
$id_unidad=$_SESSION['id_unidad']; 

include("../funciones1.php");
include ("../php/fecha_hora.php");
include ('tiempo_tramite.php');
$link=conexion();

$gestion = $_POST['gestion'];
if ($gestion == '')
    $gestion = '2010';
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
 c=0;
 for (var i = 0, total = f[cual].length; i < total; i++)
 {
   if (f[cual][i].checked) 
   {   
   	    todos[todos.length] = f[cual][i].value;
	    var arv = todos.toString();
	    c++;
   }
 }
window.top.location.href = "asignar_admin.php?cad="+arv;
alert('Usted ha seleccionado '+c+' Registros');
}
</script>
</head>
<body bottommargin="0" leftmargin="0" rightmargin="0" topmargin="0" bgcolor="#EDF7FF" onload=escrolea() oncontextmenu="return false">
<!--style="position:absolute;" -->
<table width="780" border="0" cellspacing="0">
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
          <div align="center"><img src="../img/umsa_escudo1.gif" width="54" height="106"></div></td>
        <td width="25"><img src="../img/encabezado_03.gif" width="25" height="110"></td>
        <td width="665" background="../img/encabezado_04.gif"><div align="center">
            <p><img src="../img/chasqui_digital_azul2 copia.jpg" width="445" height="60"></p>
        </div></td>
        <td width="28"><img src="../img/encabezado_06.gif" width="28" height="110"></td>
        <td width="150" background="../img/encabezado_01.gif"><div align="center"><img src="../imagenes/logotipo_chasqui.jpg" width="100" height="106"></div></td>
      </tr>
      <tr>
        <td width="132" height="21" background="../img/fondo_izq1.gif">&nbsp;</td>
        <td  width="498" colspan="3"><table width="670" height="21" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td background="../img/fondo_cuerpo.gif" bgcolor="#8fb1d2"><table width="420" border="0" align="center" cellpadding="0" cellspacing="0" heigth="21">
                  <tr>
                    <td width="191"><span class="Estilo10 Estilo20">&nbsp;<span class="Estilo21">Monoblok Central, Avenida Villazon N&deg; 1995</span></span></td>
                    <td width="32"><div align="center"><img src="../img/correo.gif" width="21" height="21"></div></td>
                    <td width="197"><span class="Estilo21"> <a href="mailto: dec_fcpn@yahoo.es" class="Estilo10">E-mail: dec_fcpn@yahoo.es</a></span></td>
                  </tr>
              </table></td>
            </tr>
        </table></td>
        <td width="150" height="21" background="../img/fondo_der1.gif">&nbsp;</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="248" colspan="2"><table width="1000" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td width="132" height="246" bgcolor="#8fb1d2"><table style="position:absolute;top:171px;left:1px;"width="132" height="240" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td height="92"><script src="menu_admin.js"></script></td>
              </tr>
              <tr>
                <td></td>
              </tr>
            </table></td>             
            <td rowspan="3"><div align="center">
              <table width="870" height="246" border="2" cellpadding="0" cellspacing="0" bordercolor="#8fb1d2" align="center">
                <tr>
                  <td background="../img/fondo_cuerpo.gif"><center>
                      <table width="856" height="24">
                        <tr>
                          <td>
                            <p align="left" class="Estilo77">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo 'Unidad: '; echo $unidad .' <br>&nbsp;&nbsp;&nbsp; Usuario: '. $nombre;?></p></td>
                        </tr>
						
                      </table>
                      <br>
		      <p align="center" class="estilo77">TRAMITES EN SU SESION A SER DESPACHADOS</p>
                      <table width="841" border="0" cellpadding="0" cellspacing="0">
                        <tr>
                          <td width="29" height="21" background="../img/encabezado_tabla_01.gif">&nbsp;</td>
                         <td width="783" background="../img/encabezado_tabla_02.gif"><div align="center" class="Estilo59">DATOS GENERALES DE LOS TR&Aacute;MITES </div></td>
                          <td width="29" background="../img/encabezado_tabla_04.gif">&nbsp;</td>
                        </tr>
                        <tr>
                          <td height="2" colspan="3"></td>
                        </tr>
                      </table>
                      <table width="841" border="0" cellpadding="0" cellspacing="2" bgcolor="#74ABD3">
                        <tr>
                          <td></td>
                        </tr>
                        <form name="f1">
                          <tr>
                            <td bgcolor="#B1CBE4"><table width="837" border="0" align="center" cellpadding="0" cellspacing="2" bordercolor="#EDF7FF">
                                <tr>
								  <td width="59" height="15" bgcolor="#4791C5" class="Estilo2"><div align="center">Nro. de Control</div></td>
                                  <td width="59" height="15" bgcolor="#4791C5" class="Estilo2"><div align="center">R.U.T.</div></td>
                                  <td width="87" height="15" bgcolor="#4791C5" class="Estilo2"><div align="center">Fecha Ingreso </div></td>
                                  <td width="95" bgcolor="#4791C5"><div align="center" class="Estilo2">Procedencia</div></td>
                                  <td width="105" bgcolor="#4791C5"><div align="center" class="Estilo2">correlativo </div></td>
                                  <td width="80" bgcolor="#4791C5"><div align="center" class="Estilo2">Destino</div></td>
								  <td width="104" bgcolor="#4791C5"><div align="center" class="Estilo2">Referencias</div></td>
			                      <td width="91" bgcolor="#4791C5"><div align="center" class="Estilo2">Eliminar</div></td>
                                 
                                </tr>
<?

$a=0;
$consulta = "SELECT * FROM correspondencia WHERE (sw = 1 and destino like '$nombre' and destino != 'Archivo') or (sw = 1 and destino like '$unidad' and destino != 'Archivo') GROUP BY rut ORDER BY rut ASC";
$resultado = mysql_query($consulta) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
$numResultados = mysql_num_rows($resultado);
if ($numResultados > 0)
{
	$i=0;
	$aa = 0;
	$bb = 0;
	$cc = 0;
	$to = 0;
	$dd = 0;
	while($vec = mysql_fetch_array($resultado))
	{	
		$rec=0;
		$i++;
			$id_c=$vec["id_c"];
			$rut=$vec["rut"]; 
			
			$consulta1 = "SELECT * FROM correspondencia WHERE rut = '$rut'";
			$resultado1 = mysql_query($consulta1) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
			$numResultados1 = mysql_num_rows($resultado1);
			if ($numResultados1 > 0)
			{
				while($vec1 = mysql_fetch_array($resultado1))
					{
						$id_c_ultimo=$vec1["id_c"];
					}
			}
			
			if($id_c_ultimo != $id_c)
			{
			//$rut=$vec["rut"]; 
			$tipo=$vec["tipo"];
			$fecha=$vec["fecha"];
			$destino=$vec["destino"];
			$responsable=$vec["responsable"];
			$referencias=$vec["referencias"];
			$comentario=$vec["comentario"];
			$correlativo=$vec["correlativo"];
			
			$valor1 = $rut.'**'.$id_c;
			//CALCULAMOS EL TIEMPO DE PERMANENCIA DEL TRAMITE
            $fecha_fin=fecha_hora();
            $fecha_ini=$fecha;
			$total = tiempo_tramite($fecha_ini,$fecha_fin);
			$vector = explode(",",$total);
			if($vector [0]!=0)
				$alert=1;
			elseif($vector [1]!=0)
				$alert = 1;
				elseif($vector[2] >= 30)
					$alert =1;
					elseif($vector[2] >= 15)
						$alert =2;
						else
						$alert=0;
//************************************
$var=strpos($comentario,":");
$estado=substr($comentario,0,$var);
if($estado == 'PENDIENTE')
    $alert=3;
//************************************
			echo '<tr>';
			//Buscamos en la tabla recibido si el id_c existe (el usuario ha recibido la correspondencia)
			$sql7 = "SELECT id_c FROM recibido WHERE id_c = '$id_c' and recibido_por like '%$nombre%'";
			$res7 = mysql_query($sql7) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
			$num7 = mysql_num_rows($res7);
			
			echo '<td height="50" bgcolor="#E1F1FF" class="Estilo78"><center>'; 
			echo $id_c;
			echo '</center></td>';
			
			echo '<input type="hidden" name="a[]" value="'.$id_c.'" >';
            if($alert==3)
            {
            echo '<td height="50" bgcolor="#FF8000" class="Estilo82"><center>';
			echo $rut;
			echo '</center></td>';
			$dd++;
            }
			elseif ($alert == 0)
			{
               echo '<td height="50" bgcolor="#E1F1FF" class="Estilo78"><center>'; 
				echo $rut;
				$aa++;
				echo '</center></td>';
			}
			elseif ($alert == 1)
			{
                echo '<td height="50" bgcolor="#b81d0c" class="Estilo82"><center>'; 
				echo $rut;
				$bb++;
				echo '</center></td>';
			}
			elseif ($alert == 2)
			{
                echo '<td height="50" bgcolor="#FFFF6A" class="Estilo84"><center>'; 
				echo $rut;
				$cc++;
				echo '</center></td>';
			}
            echo '<td height="50" bgcolor="#E1F1FF" class="Estilo78"><center>'; 
			echo $fecha; 
			echo '</center></td>
            <td height="50" bgcolor="#E1F1FF" class="Estilo78"><center>';
			echo $responsable;
			echo '</center></td>
            <td height="50" bgcolor="#E1F1FF" class="Estilo78"><center>';
			echo $correlativo;
			echo '</center></td>
			 <td height="50" bgcolor="#E1F1FF" class="Estilo78"><center>';
			echo $destino;
			echo '</center></td>
            <td height="50" bgcolor="#E1F1FF" class="Estilo78"><center>
			<table width="141" border="0">
               	<tr>
                    <td align="char" class="Estilo78">'; echo $referencias;echo '</td>
                </tr>
            </table>';
			echo'</center></td>
			<td height="50" bgcolor="#E1F1FF" class="Estilo78"><center>';
			echo '<a href="despachacha.php?reg='.$valor1.'">Eliminar de Sesión</a>';
			echo'</center></td>';
			echo'</tr>';
			}
			/*else
			{
			$valor1 = $rut.'**'.$id_c;
			}*/
			
		}
}
?>
                                <tr>
                                  <td height="7" colspan="17" bgcolor="#CCDDEE" class="Estilo78"></td>
                                </tr>
                            </table></td>
                          </tr>
                          <tr>
                            <td height="1" bgcolor="#74ABD3"></td>
                          </tr>
                        </form>
                      </table>
                    </center>
             
              </td>
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
    <td height="22" colspan="2"><table width="1000" height="20" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="15" height="20"><img src="../img/No_fondo1.gif" width="15" height="20"></td>
        <td width="970" background="../img/No_fondo2.gif">&nbsp;</td>
        <td width="15"><img src="../img/No_fondo3.gif" width="15" height="20"></td>
      </tr>
    </table></td>
  </tr>
</table>
<table style="position:absolute;top:171px;left:1px;"width="132" height="240" border="0" cellpadding="0" cellspacing="0">
</table>
</body>
</html>