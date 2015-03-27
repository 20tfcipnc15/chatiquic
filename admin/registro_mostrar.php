<?
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
/*define("c_nombre", $nombre);
define("c_unidad1", $unidad1);
define("c_id_user", $id_user);*/
//define("id_unidad", $id_unidad);
include("../funciones1.php");
$link=conexion();
$id_c = $_GET['id_c'];

//Obtenemos el número de registo interno actual
$sql ="SELECT reg_int FROM recibido WHERE id_unidad = $cid_unidad order by id_re DESC limit 1";
$res=mysql_query($sql) or die ("Error de búsqueda en la BD: ". mysql_Error());
$vec=mysql_fetch_array($res);
$reg_int = $vec["reg_int"];

//OBTENEMOS LOS DATOS DE CORRESPONDENCIA PARA MOSTRARLOS POR PANTALLA
$consulta ="SELECT * FROM correspondencia WHERE id_c = $id_c";
$resultado=mysql_query($consulta) or die ("Error de búsqueda en la BD: ". mysql_Error());
$numResultados = mysql_num_rows($resultado);
if($numResultados>0)
{
	while($linea=mysql_fetch_array($resultado))
	{
		$rut = $linea["rut"];
		$unidad=$linea["unidad"];
		$fecha=$linea["fecha"];
		$correlativo=$linea["correlativo"];
		$hoja_ruta=$linea["hoja_ruta"];
		$tipo=$linea["tipo"];
		$referencias=$linea["referencias"];
		$responsable=$linea["responsable"];
		$fojas=$linea["fojas"];    
		$destino=$linea["destino"];
?>
<html>
<head>
<title>Chasqui Digital</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<LINK href="../javascript/estilos.css" type=text/css rel=stylesheet>
<LINK href="../javascript/estilo_noticias.css" type=text/css rel=stylesheet>
<SCRIPT language=JavaScript src="../javascript/fecha-hora_bc.js"></SCRIPT>
<SCRIPT language=javascript src="../javascript/barra_de_estado.js"></SCRIPT>
<SCRIPT language=JavaScript src="../fecha-hora_bc.js"></SCRIPT>
<script type="text/javascript" src="../Sothink DHTML Menu/Resource/js/stmenu.js"></script>
</head>
<body bottommargin="0" leftmargin="0" rightmargin="0" topmargin="0" bgcolor="#EDF7FF" onload=escrolea()>
<table style="position:absolute;left:110px;" width="780" border="0" align="center" cellspacing="0">
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
                  <td width="207" height="22" class="Estilo40">&nbsp;Monoblok Central, Avenida Villazon N&deg; 1995</td>
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
			<table style="position:absolute; top:172px; left:3px; height: 337px;" width="132" height="399" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td height="92"><script src="menu_admin.js"></script></td>
              </tr>
              <tr>
                <td><p>&nbsp;</p>
                <p>&nbsp;</p>
                <p>&nbsp;</p>

              </td>
              </tr>
              
            </table></td>
            <td width="498"><div align="center">
              <table width="498" height="246" border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td width="2">&nbsp;</td>
                  <td width="494" bgcolor="#336699"><div align="center">
                    <table width="490" height="246" border="2" align="center" cellpadding="0" cellspacing="0" bordercolor="#8fb1d2">
                        <tr>
                                           <td background="../img/fondo_cuerpo.gif"><center>
                                            
                                             <p align="left" class="Estilo51"><span class="Estilo77">&nbsp;&nbsp;Unidad: <? echo $cunidad; ?> <br>
&nbsp;&nbsp;Usuario: <? echo $cnombre; ?> </span><br></p> <p align="center">
                                               <span class="Estilo77">Los datos de su Correspondencia <br>
                                             han sido enviada correctamente...! </span></p>
                                             <table width="400" border="0" cellpadding="0" cellspacing="0">
                                                 <tr>
                                                   <td width="29" height="21" background="../img/encabezado_tabla_01.gif">&nbsp;</td>
                                                   <td width="342" background="../img/encabezado_tabla_02.gif"><div align="center" class="Estilo59">CORRESPONDENCIA RECIBIDA </div></td>
                                                   <td width="29" background="../img/encabezado_tabla_04.gif">&nbsp;</td>
                                                 </tr>
                                                 <tr>
                                                   <td height="2" colspan="3"></td>
                                                 </tr>
                                             </table>
                                               <table width="400" border="0" cellpadding="0" cellspacing="2" bgcolor="#74ABD3">
                                                 <tr>
                                                   <td></td>
                                                 </tr>
                                                 <tr>
                                                   <td bgcolor="#B1CBE4"><table width="396" border="0" align="center" cellpadding="0" cellspacing="2" bordercolor="#EDF7FF">
                                                     <tr>
                                                       <td height="15" colspan="2" bordercolor="#74ABD3" class="Estilo78">
                                                         <div align="center" class="Estilo77">R.U.T. N&ordm;<? echo ' '.$rut;?></div></td>
                                                     </tr>
                                                     <tr>
<!--                                                       <td height="15" bordercolor="#74ABD3" class="Estilo78"><div align="right">Registro Interno N&ordm;:  </div></td>
                                                       <td height="15" bgcolor="#E1F1FF" class="Estilo65">&nbsp;
                                                           <?php  //echo $reg_int;?></td>-->
                                                     </tr>
                                                     <tr>
                                                       <td width="130" height="15" bordercolor="#74ABD3" bgcolor="#CCDDEE" class="Estilo78">
													   <div align="right">Fecha y hora de Ingreso:</div>													   </td>
                                                       <td width="260" height="15" bgcolor="#E1F1FF" class="Estilo65">
													   &nbsp;
													   <?php  echo $fecha;?></td>
                                                     </tr>
                                                     <tr>
                                                       <td height="15" class="Estilo78"><div align="right">Tipo de Correspondencia:</div></td>
                                                       <td height="15" bgcolor="#E1F1FF" class="Estilo65">&nbsp;
                                                           <?php  echo $tipo;?>                                                       </td>
                                                     </tr>
                                                     <tr>
                                                       <td bgcolor="#CCDDEE"><div align="right"><span class="Estilo78">Procedencia:</span></div></td>
                                                       <td height="15" bgcolor="#E1F1FF" class="Estilo65">&nbsp;<?php echo $unidad;?></td>
                                                     </tr>
													 <tr>
                                                       <td><div align="right"><span class="Estilo78">Registro Externo: </span></div></td>
                                                       <td height="15" bgcolor="#E1F1FF" class="Estilo65">
                                                       &nbsp;
                                                       <?php echo $correlativo;?></td>
                                                     </tr>
                                                     
                                                     <tr>
                                                       <td height="15" bgcolor="#CCDDEE" class="Estilo78"><div align="right">N&ordm; Hoja de Ruta </div></td>
                                                       <td bgcolor="#E1F1FF" class="Estilo65">
													   &nbsp;
													   <?php echo $hoja_ruta;?>                                                       </td>
                                                     </tr>
                                                     <tr>
                                                       <td height="60" class="Estilo78"><div align="right">Referencias:</div></td>
                                                       <td height="60" bgcolor="#E1F1FF" class="Estilo65">
                                                         <table width="254" height="60" border="0" align="right" cellpadding="0" cellspacing="0">
                                                           <tr>
                                                             <td class="Estilo65"><?php  echo $referencias;?></td>
                                                           </tr>
                                                         </table></td>
                                                     </tr>
                                                     <tr>
                                                       <td height="15" bgcolor="#CCDDEE" class="Estilo78"><div align="right">Fojas:</div></td>
                                                       <td height="15" bgcolor="#E1F1FF" class="Estilo65">&nbsp;
                                                           <?php  echo $fojas; 
														  if($id_receptor==0)
															{
															?>
                                                           <!--	<script>
																var valor='<?echo $pa_dirigido?>'	
																window.top.location.href = "reg_receptor.php?rem="+ valor;
															</script>-->
                                                           <?	
															}
															?>                                                       </td>
                                                     </tr>
													 <tr>
                                                       <td height="15" colspan="2" bgcolor="#CCDDEE" class="Estilo78"><table width="300" border="0" align="center" cellpadding="0" cellspacing="0">
                                                         <tr>
                                                           <td height="4">														   </td>
														 </tr>
														 <tr>
                                                           <td>
														   <form name="form3" method="post" action="reporte/reporte.php">
                                                             <div align="center">
                                                           <input class="Estilo59" name="submit" type="submit" style="background-color:#4791C5;border:0px;margin:1px;padding:0px; font-weight: bold;" value="  Reporte ">
                                                             </div>
                                                           </form>                                                           </td>
                                                           <td>
														  <form name="form4" method="post" action="reporte/rut.php">
                                                             <input class="Estilo59" name="submit2" type="submit" style="background-color:#4791C5;border:0px;margin:1px;padding:0px; font-weight: bold;" value="Imprimir RUT ">
                                       </form>                                                           </td>
                                                         </tr>
                                                       </table></td>
												     </tr>
													<!-- <tr>
                                                       <td height="15" class="Estilo78"><div align="right">Asignado a:</div></td>
													   <td height="15" bgcolor="#E1F1FF" class="Estilo65">&nbsp;
                                                           <?php  echo $destino; }}?>                                                       </td>
												     </tr>-->
                                                     
                                                     <tr>
                                                       <td height="7" colspan="2" class="Estilo78"></td>
                                                     </tr>
                                                   </table>                                                   
												  </td>
                                                 </tr>
                                                 <tr>
                                                   <td height="1" bgcolor="#74ABD3"></td>
                                                 </tr>
                                             </table>
                                              
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
</body>
</html>