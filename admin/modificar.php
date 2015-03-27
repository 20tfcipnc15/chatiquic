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
$unidad1=$_SESSION['unidad_ini']; 
$id_unidad=$_SESSION['id_unidad']; 
include("../funciones1.php");
$link=conexion();

$correlativo = $_POST['correlativo'];
$unidad = $_POST['unidad'];
$hoja_ruta = $_POST['hoja_ruta'];   
$referencias = $_POST['referencias'];
$tipo = $_POST['tipo'];
$otro = $_POST['otro'];
$fecha = $_POST['fecha'];
$fecha_final = $_POST['fecha_final'];
$rut = $_POST['rut'];
$responsable = $_POST['responsable'];

//////////////////////////
if($unidad==null)
	$unidad=$otro;

$vector[0]= $correlativo;
$vector[1]= $unidad;
$vector[2]= $hoja_ruta;
$vector[3]= $referencias;
$vector[4]= $tipo;
$vector[5]= $fecha;
$vector[6]= $rut;
$vector[7]= $responsable;

$campo[0]= 'correlativo';
$campo[1]= 'unidad';
$campo[2]= 'hoja_ruta';
$campo[3]= 'referencias';
$campo[4]= 'tipo';
$campo[5]= 'fecha';
$campo[6]= 'rut';
$campo[7]= 'responsable';
$sw=1;
for ($i=0;$i<=7;$i++)
{
	$dato=$vector[$i];
	
	if($dato != null)
		$sw=0;
}
if ($sw == 0)
{	

$j=0;

$cadena='';
for ($i=0;$i<=7;$i++)
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

$long = strlen($cadena);
$cadena=substr($cadena,0,$long-5);
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
<script language=JavaScript src="../javascript/funciones.js"></script>
<SCRIPT language=JavaScript src="../fecha-hora_bc.js"></SCRIPT>
<script type="text/javascript" src="../Sothink DHTML Menu/Resource/js/stmenu.js"></script>
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
                            <p align="left" class="Estilo77"><br>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo 'Unidad: '; echo $unidad1.' <br>&nbsp;&nbsp;&nbsp; Usuario: '. $nombre;?><br><br>
                            </p>
                            <p align="center" class="Estilo77">Se han encontrado <?php echo $numResultados;?> coincidencias.</p>
                            <div align="left">
                              <table width="640" border="0" align="center" cellpadding="0" cellspacing="0">
                                <tr>
                                  <td width="29" height="21" background="../img/encabezado_tabla_01.gif">&nbsp;</td>
                                  <td width="582" background="../img/encabezado_tabla_02.gif"><div align="center" class="Estilo59">DATOS GENERALES DEL TR&Aacute;MITE </div></td>
                                  <td width="29" background="../img/encabezado_tabla_04.gif">&nbsp;</td>
                                </tr>
                                <tr>
                                  <td height="2" colspan="3"></td>
                                </tr>
                              </table>
                              <table width="640" border="0" align="center" cellpadding="0" cellspacing="2" bgcolor="#74ABD3">
                                <tr>
                                  <td></td>
                                </tr>
                                <tr>
                                  <td bgcolor="#B1CBE4"><table width="636" border="0" align="center" cellpadding="0" cellspacing="2" bordercolor="#EDF7FF">
                                      <tr>
                                        <td width="36" bgcolor="#4791C5"><div align="center" class="Estilo2">R.U.T.</div></td>
                                        <td width="88" height="15" bgcolor="#4791C5" class="Estilo2"><div align="center">Fecha Ingreso </div></td>
                                        <td width="52" bgcolor="#4791C5"><div align="center" class="Estilo2">Unidad</div></td>
                                        <td width="38" bgcolor="#4791C5" class="Estilo2"><div align="center">Tipo</div></td>
                                        <td width="72" bgcolor="#4791C5"><div align="center" class="Estilo2">Correlativo</div></td>
                                        <td width="104" bgcolor="#4791C5"><div align="center" class="Estilo2">Referencias</div></td>
                                        <td width="50" bgcolor="#4791C5" class="Estilo2"><div align="center">No Fojas </div></td>
                                        <td width="72" bgcolor="#4791C5"><div align="center" class="Estilo2">Recibido por</div></td>
										<td width="51" bgcolor="#4791C5"><div align="center" class="Estilo2">Modificar</div></td>
									<!--	<td width="51" bgcolor="#4791C5"><div align="center" class="Estilo2">Eliminar</div></td>-->
                                      </tr>
<?php 
//$sql="select distinct(rut),id_c from correspondencia where ".$cadena." GROUP BY rut ORDER BY rut ASC";
$sql="select distinct rut, referencias from correspondencia where ".$cadena." and comentario <> 'COPIA ' and responsable like '%$nombre%' ORDER BY rut DESC";
$res=mysql_query($sql) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
$num = mysql_num_rows($res); 
if ($num > 0) 					
{	
	while($fila=mysql_fetch_array($res))
	{
		//$id_c = $fila['id_c'];
		$rutb = $fila['rut'];
		$refb = $fila['referencias'];
		//OBTENEMOS TODOS LOS CAMPOS DEL REGISTRO PARA DESPLEGARLOS POR PANATALLA				  
							$consulta ="SELECT * FROM correspondencia 
							WHERE rut = '$rutb' and referencias = '$refb' and responsable like '%$nombre%'
							ORDER BY id_c DESC
							LIMIT 0, 1";
							$resultado=mysql_query($consulta) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
							$numResultados = mysql_num_rows($resultado);   					
													if($numResultados>0)
													{
													   while($linea=mysql_fetch_array($resultado))
														{
															$id_c = $linea['id_c'];
															$fecha=$linea["fecha"];
															$correlativo=$linea["correlativo"];
															$unidad=$linea["unidad"];
															$referencias=$linea["referencias"];
															$responsable=$linea["responsable"];    
															$tipo=$linea["tipo"];
															$rut=$linea["rut"];
															$fojas=$linea["fojas"];
													    echo '
                                                         <tr>
                                                         <td height="50" bgcolor="#E1F1FF" class="Estilo78"><center>'; 
														 echo $rut; 
														 echo '</center></td>
                                                         <td height="50" bgcolor="#E1F1FF" class="Estilo78"><center>'; 
														 echo $fecha; 
														 echo '</center></td>
														 <td height="50" bgcolor="#E1F1FF" class="Estilo78"><center>'; 
														 echo $unidad; 
														 echo '</center></td>
                                                         <td height="50" bgcolor="#E1F1FF" class="Estilo78"><center>'; 
														 echo $tipo; 
														 echo '</center></td>
                                                         <td height="50" bgcolor="#E1F1FF" class="Estilo78"><center>';
														 echo $correlativo;
														 echo '</center></td>
                                                         <td height="50" bgcolor="#E1F1FF"		
														 class="Estilo78"><center>';
														 echo '<table bgcolor="#E1F1FF"		
														 class="Estilo78" border="0" cellpadding="0" cellspacing="2">
														  <tr>
														    <td>'.$referencias.'</td>
														  </tr>
														 </table>';
														 echo'</center></td>
                                                         <td height="50" bgcolor="#E1F1FF" class="Estilo78"><center>';
														 echo $fojas;
														 echo'</center></td>
					                                     <td height="50" bgcolor="#E1F1FF" class="Estilo78"><center>';
														 echo $responsable;
														 echo'</center></td>
														 <td height="50" bgcolor="#E1F1FF" class="Estilo78"><center>
														 <input src="../img/editar.gif" width="30" height="27" type="image" value="modificar" border="0" hspace="1" onClick="modificar_res('?>
                                      <?php echo $id_c; ?> <?php echo');"><br>
														 <a href="mod_registro.php?reg='.$id_c.'">Modificar</a>
														 </center></td>';											
/*														 <td height="50" bgcolor="#E1F1FF" class="Estilo78"><center>
														 <input src="../img/eliminar.gif" width="26" height="27" type="image"  value="eliminar" border="0" hspace="1"><br>
														  <a href="#">Eliminar</a>												
														 </center></td> */
                                                       echo '</tr>';
													   }
													  }
													 }
													}
													 ?>
                                      <tr>
                                        <td height="10" colspan="14" bgcolor="#CCDDEE" class="Estilo78"></td>
                                      </tr>
                                      <tr>
                                        <td height="15" colspan="14" class="Estilo78">&nbsp;</td>
                                      </tr>
                                  </table></td>
                                </tr>
                                <tr>
                                  <td height="1" bgcolor="#74ABD3"></td>
                                </tr>
                              </table>
                               </div>
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
<?
}
else
	echo '<h1>Usted no ha ingresado ningún dato.</h1>';
?>