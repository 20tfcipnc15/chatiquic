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
include("../php/funciones.php");
include ('tiempo_tramite1.php');
include("../php/fe_ra.php");

$link=conexion();

$valor = $_GET['reg'];
$sub = '**';
$var = strpos($valor,$sub);
$rut1 = substr($valor,0,$var);
$ref = substr($valor,$var+2,strlen($valor));
//efffffff
$estado_env='En Camino';
//efffffff
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
    <td width="710" height="28" bordercolor="0" background="../img/fondo_banner_rojo1.gif"><div align="right" class="Estilo13">
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
                  <td width="132" height="92"><script src="menu_admin.js"></script></td>
                </tr>
              </table></td>
              <td width="717" bgcolor="#EDF7FF"><table width="711" height="246" border="2" align="center" cellpadding="0" cellspacing="0" bordercolor="#8fb1d2">
                <tr>
                  <td width="705" background="../img/fondo_cuerpo.gif"><p><span class="Estilo77">&nbsp;&nbsp;&nbsp;&nbsp;Unidad: <?php echo $unidad;?><br>
  &nbsp;&nbsp;&nbsp;&nbsp;Usuario: <? echo $nombre; ?></span><br>
                    </p>
                    <center>
                      <table width="700" border="0" cellpadding="0" cellspacing="0">
                        <tr>
                          <td width="29" height="21" background="../img/encabezado_tabla_01.gif">&nbsp;</td>
                            <td width="642" background="../img/encabezado_tabla_02.gif"><div align="center" class="Estilo59">DATOS GENERALES DEL TR&Aacute;MITE </div></td>
                            <td width="29" background="../img/encabezado_tabla_04.gif">&nbsp;</td>
                          </tr>
                        <tr>
                          <td height="2" colspan="3"></td>
                          </tr>
                        </table>
                        <table width="700" border="0" cellpadding="0" cellspacing="2" bgcolor="#74ABD3">
                          <tr>
                            <td></td>
                          </tr>
                          <tr>
                            <td bgcolor="#B1CBE4"><table width="698" border="0" align="center" cellpadding="0" cellspacing="2" bordercolor="#EDF7FF">
                              <tr>
                                <td width="35" height="15" bgcolor="#4791C5" class="Estilo2"><div align="center">R.U.T.</div></td>
                                <td width="68" height="15" bgcolor="#4791C5" class="Estilo2"><div align="center">Fecha</div></td>
                                <td width="77" bgcolor="#4791C5"><div align="center" class="Estilo2">Procedencia</div></td>
                                <td width="81" bgcolor="#4791C5"><div align="center" class="Estilo2">Tipo de Tr&aacute;mite </div></td>
                                <td width="74" bgcolor="#4791C5" class="Estilo2"><div align="center">Reg. Ext. </div></td>
								<td width="75" bgcolor="#4791C5" class="Estilo2"><div align="center">Hoja Ruta </div></td>
                                <td width="150" bgcolor="#4791C5"><div align="center" class="Estilo2">Referencias</div></td>
                                <td width="46" bgcolor="#4791C5"><div align="center" class="Estilo2">Fojas</div></td>
                                <td width="72" bgcolor="#4791C5"><div align="center" class="Estilo2">Destino</div></td>
								<td width="72" bgcolor="#4791C5"><div align="center" class="Estilo2">Documento Adjunto</div></td>
                                <td width="100" bgcolor="#4791C5"><div align="center" class="Estilo2">Estado Tramite</div></td>
								</tr>
<?

$sw = 0;

$sql ="SELECT referencias FROM correspondencia WHERE rut like '$rut1' and id_c ='$ref' ORDER BY id_c ASC";
$res = mysql_query($sql) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
$filas = mysql_num_rows($res);
$vec = mysql_fetch_array($res);
		
$referencias1 = $vec["referencias"];

$i=0;

$sql ="SELECT * FROM correspondencia WHERE rut like '$rut1' and referencias like '$referencias1' ORDER BY id_c ASC";
$res = mysql_query($sql) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
$filas = mysql_num_rows($res);
$vec = mysql_fetch_array($res);

$unidad = $vec["unidad"];
$destino = $vec["destino"];
$id_c1=$vec["id_c"];
$rut=$vec["rut"]; 
$hoja_ruta=$vec["hoja_ruta"];
$correlativo=$vec["correlativo"];
$responsable=$vec["responsable"];
$fecha1=$vec["fecha"];
$tipo=$vec["tipo"];
$referencias=$vec["referencias"];
$fojas=$vec["fojas"];
//effffff digitalizacion
$doc=$vec["documento"];
$vacio="Sin Documento Digitalizado";
//eff recibido

//almacenamos la fecha inicial
$fecha_inicial = $fecha1;
/*
//para el procesado, fecha del tramite pasado a datetime de string el fecha_ho(), convierte elmes de ago o sep o eso a numero pero en string para despues para pasar de string a integer mas facil

$mess=substr($fecha1, 3, 3);
//$dia=(int)(substr($fecha1, 0, 2));
$mes=(int)(fecha_ho($mess));
$gest=(int)(substr($fecha1, 7, 4));

//un string cualquiera a datetime pa comparar,fecha desde la cual se aplico el camino
$mela="19 AGO 2014 - 09:26:25";
//$dia1=(int)(substr($mela, 0, 2));
$mes1=8;
$gest1=(int)(substr($mela, 7, 4));
////////////
if($gest >= $gest1)  
{
	if($mes >= $mes1)
	{*/
			////destino externo......"Tramite Despachado Unidad Externa"
			if($destino=='TIC Facultativo' || $destino=='Postgrado en Fisica' || $destino=='Postgrado en Informatica' || $destino=='Planetario' || $destino=='Instituto de Matematica' || $destino=='Instituto de Inv. de Informatica' || $destino=='Instituto de Estadistica y Teo Aplicacion' || $destino=='Instituto de Fisica' || $destino=='Instituto de Ecologia' || $destino=='Honorable Consejo Facultativo' || $destino=='CE Estadistica' || $destino=='CE Fisica' || $destino=='CE Quimica' || $destino=='CE Biologia' || $destino=='CE Matematicas' || $destino=='CE Informatica' || $destino=='Centro de Estudiantes Facultativo' || $destino=='Carrera de Matematicas' || $destino=='Carrera de Estadistica' || $destino=='Carrera de Quimica' || $destino=='Carrera de Fisica' || $destino=='Carrera de Biologia' || $destino=='Asociacion de Docentes' || $destino=='Area Desconcentrada' || $destino=='Carrera de Informatica' || $destino=='Prefacultativo' || $destino=='Vicedecanato' || $destino=='Laboratorio Superior de Informatica' || $destino=='Decanato' || $destino=='Instituto de Investigaciones Quimicas' || $destino=='Instituto de Biologia Molecular' || $destino=='Laboratorio de Calidad Ambiental' || $destino=='Proyecto Caminar' || $destino=='Jardin Botanico' || $destino=='Centro de Postgrado en Ecologia y Conservacion')
			{
					/////efff recibido
					//effff para el recibido en seguimiento
					$sql3 ="SELECT * FROM recibido WHERE id_c='$id_c1' and recibido_por!='0' and ip!='0' and fecha!='0' and reg_int!='0' ORDER BY id_c ASC";
					$res3 = mysql_query($sql3) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
					$filas3 = mysql_num_rows($res3);
					$vec8 = mysql_fetch_array($res3);

					if($filas3>0)
					{
					$estado_env='Recibido';
					$nono=$vec8["recibido_por"];
					$moral=$vec8["fecha"];
					$y=0;
					?>
                                <tr>
                                <td width="35" height="15" bgcolor="#E1F1FF" class="Estilo78"><div align="center"><? echo $rut;?></div></td>
                                <td width="68" height="15" bgcolor="#E1F1FF" class="Estilo78"><div align="center"><? echo $fecha1;?></div></td>
                                <td width="77" bgcolor="#E1F1FF"><div align="center"><span class="Estilo78"><? echo $unidad;?></span></div></td>
                                <td width="81" bgcolor="#E1F1FF"><div align="center"><span class="Estilo78"><? echo $tipo;?></span></div></td>
                                <td width="74" bgcolor="#E1F1FF"><div align="center"><span class="Estilo78"><? echo $correlativo;?></span></div></td>
								<td width="75" bgcolor="#E1F1FF"><div align="center"><span class="Estilo78"><? echo $hoja_ruta;?></span></div></td>
								<td width="150" height="50" bgcolor="#E1F1FF"><center>
									<table width="150" height="50"><tr><td>
									<div align="left" class="Estilo78">
									<? echo $referencias; ?>
									</div></td></tr>
									</table></center></td>
								<td width="46" bgcolor="#E1F1FF"><div align="center"><span class="Estilo78"><? echo $fojas; $i++;?></span></div></td>
								<td width="72" bgcolor="#E1F1FF"><div align="center"><span class="Estilo78"><? echo $destino; ?></span></div></td>
								<td width="72" bgcolor="#E1F1FF"><div align="center"><span class="Estilo78"><?
								if($doc != "")
								{ 	//echo '<a href="/chasqui/admin/'.$doc.'">Ver</a>';
									$ext = explode('.',$doc);
									//verifica la extension del archivo digitalizado
									if($ext[1] == "xlsx" || $ext[1] == "xls" || $ext[1] == "docx" || $ext[1] == "doc"){
										echo '<a href="/chasqui/admin/'.$doc.'">Ver archivo</a>';
									}
									else{
										echo '<a href="#"  onclick=window.open("/chasqui/admin/'.$doc.'","ventana","width=640,height=480,scrollbars=NO,menubar=NO,resizable=NO,titlebar=NO,status=NO");>Ver archivo</a>';
									}								  							  
								}
								else
								{echo $vacio; };
								?></span></div></td>
								<td width="72" bgcolor="#E1F1FF"><div align="center"><span class="Estilo78"><? echo $estado_env.' por '.$nono.'-'.$moral; ?></span></div></td>
					<?
					//efffffffffffffff
					}
				else
				{?>
				<tr>
                                <td width="35" height="15" bgcolor="#E1F1FF" class="Estilo78"><div align="center"><? echo $rut;?></div></td>
                                <td width="68" height="15" bgcolor="#E1F1FF" class="Estilo78"><div align="center"><? echo $fecha1;?></div></td>
                                <td width="77" bgcolor="#E1F1FF"><div align="center"><span class="Estilo78"><? echo $unidad;?></span></div></td>
                                <td width="81" bgcolor="#E1F1FF"><div align="center"><span class="Estilo78"><? echo $tipo;?></span></div></td>
                                <td width="74" bgcolor="#E1F1FF"><div align="center"><span class="Estilo78"><? echo $correlativo;?></span></div></td>
				<td width="75" bgcolor="#E1F1FF"><div align="center"><span class="Estilo78"><? echo $hoja_ruta;?></span></div></td>
				<td width="150" height="50" bgcolor="#E1F1FF"><center>
									<table width="150" height="50"><tr><td>
									<div align="left" class="Estilo78">
									<? echo $referencias; ?>
									</div></td></tr>
									</table></center></td>
				<td width="46" bgcolor="#E1F1FF"><div align="center"><span class="Estilo78"><? echo $fojas; $i++;
								?></span></div></td>
				<td width="72" bgcolor="#E1F1FF"><div align="center"><span class="Estilo78"><? echo $destino; ?></span></div></td>
				<td width="72" bgcolor="#E1F1FF"><div align="center"><span class="Estilo78"><?
				if($doc != "")
				{ 	//echo '<a href="/chasqui/admin/'.$doc.'">Ver</a>';
					$ext = explode('.',$doc);
					
					//verifica la extension del archivo digitalizado
					if($ext[1] == "xlsx" || $ext[1] == "xls" || $ext[1] == "docx" || $ext[1] == "doc"){
						echo '<a href="/chasqui/admin/'.$doc.'">Ver archivo</a>';
					}
					else{
						echo '<a href="#"  onclick=window.open("/chasqui/admin/'.$doc.'","ventana","width=640,height=480,scrollbars=NO,menubar=NO,resizable=NO,titlebar=NO,status=NO");>Ver archivo</a>';
					}	
				}
				else
				{echo $vacio; };
			    ?></span></div></td>
				<td width="72" bgcolor="#E1F1FF"><div align="center"><span class="Estilo78"><? echo $estado_env; ?></span></div></td>
				<?
				//effffff la cabecera del seguirmiento termina aqui.................................
				}
			}
			else
				{			
				$estado_env='Despachado Unidad Externa a la FCPN';
				?>
				<tr>
                                <td width="35" height="15" bgcolor="#E1F1FF" class="Estilo78"><div align="center"><? echo $rut;?></div></td>
                                <td width="68" height="15" bgcolor="#E1F1FF" class="Estilo78"><div align="center"><? echo $fecha1;?></div></td>
                                <td width="77" bgcolor="#E1F1FF"><div align="center"><span class="Estilo78"><? echo $unidad;?></span></div></td>
                                <td width="81" bgcolor="#E1F1FF"><div align="center"><span class="Estilo78"><? echo $tipo;?></span></div></td>
                                <td width="74" bgcolor="#E1F1FF"><div align="center"><span class="Estilo78"><? echo $correlativo;?></span></div></td>
				<td width="75" bgcolor="#E1F1FF"><div align="center"><span class="Estilo78"><? echo $hoja_ruta;?></span></div></td>
				<td width="150" height="50" bgcolor="#E1F1FF"><center>
									<table width="150" height="50"><tr><td>
									<div align="left" class="Estilo78">
									<? echo $referencias; ?>
									</div></td></tr>
									</table></center></td>
				<td width="46" bgcolor="#E1F1FF"><div align="center"><span class="Estilo78"><? echo $fojas; $i++;
								?></span></div></td>
				<td width="72" bgcolor="#E1F1FF"><div align="center"><span class="Estilo78"><? echo $destino; ?></span></div></td>
				<td width="72" bgcolor="#E1F1FF"><div align="center"><span class="Estilo78"><?
				if($doc != "")
				{ 	//echo '<a href="/chasqui/admin/'.$doc.'">Ver</a>';
					$ext = explode('.',$doc);
					
					//verifica la extension del archivo digitalizado
					if($ext[1] == "xlsx" || $ext[1] == "xls" || $ext[1] == "docx" || $ext[1] == "doc"){
						echo '<a href="/chasqui/admin/'.$doc.'">Ver archivo</a>';
					}
					else{
						echo '<a href="#"  onclick=window.open("/chasqui/admin/'.$doc.'","ventana","width=640,height=480,scrollbars=NO,menubar=NO,resizable=NO,titlebar=NO,status=NO");>Ver archivo</a>';
					}	
				}
				else
				{echo $vacio; };
			    ?></span></div></td>
				<td width="72" bgcolor="#E1F1FF"><div align="center"><span class="Estilo78"><? echo $estado_env; ?></span></div></td>
				<?
				}
			//}fin mes
		/*else
		{
				$estado_env='Procesado';
				?>
				<tr>
                                <td width="35" height="15" bgcolor="#E1F1FF" class="Estilo78"><div align="center"><? echo $rut;?></div></td>
                                <td width="68" height="15" bgcolor="#E1F1FF" class="Estilo78"><div align="center"><? echo $fecha1;?></div></td>
                                <td width="77" bgcolor="#E1F1FF"><div align="center"><span class="Estilo78"><? echo $unidad;?></span></div></td>
                                <td width="81" bgcolor="#E1F1FF"><div align="center"><span class="Estilo78"><? echo $tipo;?></span></div></td>
                                <td width="74" bgcolor="#E1F1FF"><div align="center"><span class="Estilo78"><? echo $correlativo;?></span></div></td>
				<td width="75" bgcolor="#E1F1FF"><div align="center"><span class="Estilo78"><? echo $hoja_ruta;?></span></div></td>
				<td width="150" height="50" bgcolor="#E1F1FF"><center>
									<table width="150" height="50"><tr><td>
									<div align="left" class="Estilo78">
									<? echo $referencias;?>
									</div></td></tr>
									</table></center></td>
				<td width="46" bgcolor="#E1F1FF"><div align="center"><span class="Estilo78"><? echo $fojas; $i++;
								?></span></div></td>
				<td width="72" bgcolor="#E1F1FF"><div align="center"><span class="Estilo78"><? echo $destino; ?></span></div></td>
				<td width="72" bgcolor="#E1F1FF"><div align="center"><span class="Estilo78"><? echo $estado_env; ?></span></div></td>
				<?
		}
	}
	else
	{
				$estado_env='Procesado';
				?>
				<tr>
                                <td width="35" height="15" bgcolor="#E1F1FF" class="Estilo78"><div align="center"><? echo $rut;?></div></td>
                                <td width="68" height="15" bgcolor="#E1F1FF" class="Estilo78"><div align="center"><? echo $fecha1;?></div></td>
                                <td width="77" bgcolor="#E1F1FF"><div align="center"><span class="Estilo78"><? echo $unidad;?></span></div></td>
                                <td width="81" bgcolor="#E1F1FF"><div align="center"><span class="Estilo78"><? echo $tipo;?></span></div></td>
                                <td width="74" bgcolor="#E1F1FF"><div align="center"><span class="Estilo78"><? echo $correlativo;?></span></div></td>
				<td width="75" bgcolor="#E1F1FF"><div align="center"><span class="Estilo78"><? echo $hoja_ruta;?></span></div></td>
				<td width="150" height="50" bgcolor="#E1F1FF"><center>
									<table width="150" height="50"><tr><td>
									<div align="left" class="Estilo78">
									<? echo $referencias;?>
									</div></td></tr>
									</table></center></td>
				<td width="46" bgcolor="#E1F1FF"><div align="center"><span class="Estilo78"><? echo $fojas; $i++;
								?></span></div></td>
				<td width="72" bgcolor="#E1F1FF"><div align="center"><span class="Estilo78"><? echo $destino; ?></span></div></td>
				<td width="72" bgcolor="#E1F1FF"><div align="center"><span class="Estilo78"><? echo $estado_env; ?></span></div></td>
				<?
	}*/
				?>			
                                </tr>
                              <tr>
                                <td height="7" colspan="9" bgcolor="#CCDDEE" class="Estilo78"></td>
                              </tr>
                              <tr>
                                <td height="15" colspan="9" class="Estilo78"></td>
                              </tr>
                            </table></td>
                          </tr>
                          <tr>
                            <td height="1" bgcolor="#74ABD3"></td>
                          </tr>
                          </table>
                  </center></td></tr>
              </table></td>
              <td width="150" bgcolor="#8fb1d2" class="Estilo77"><? // include('online.php')?></td>
            </tr>
        </table></td>
        </tr>
    </table>
    </td>
  </tr>
  <tr>
    <td height="22" colspan="2"><table width="1000" height="60" border="0" cellpadding="0" cellspacing="0">
	  <tr>
        <td height="20"><table width="1000" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td width="29" height="21" background="../img/encabezado_tabla_01.gif">&nbsp;</td>
            <td width="942" background="../img/encabezado_tabla_02.gif"><div align="center" class="Estilo59">SEGUIMIENTO DEL TR&Aacute;MITE </div></td>
            <td width="29" background="../img/encabezado_tabla_04.gif">&nbsp;</td>
          </tr>
          <tr>
            <td height="2" colspan="3"></td>
          </tr>
        </table>
          <table width="1000" border="0" cellpadding="0" cellspacing="2" bgcolor="#74ABD3">
          <tr>
            <td></td>
          </tr>
          <tr>
            <td bgcolor="#B1CBE4"><table width="996" border="0" align="center" cellpadding="0" cellspacing="2" bordercolor="#EDF7FF">
                <tr>
                  <td width="40" height="15" bgcolor="#4791C5" class="Estilo2"><div align="center">R.U.T.</div></td>
                  <td width="121" height="15" bgcolor="#4791C5" class="Estilo2"><div align="center">Fecha Ingreso </div></td>
                  <td width="110" bgcolor="#4791C5"><div align="center" class="Estilo2">Unidad</div></td>
                  <td width="115" bgcolor="#4791C5"><div align="center" class="Estilo2">Responsable</div>                    </td>
				  <td width="105" bgcolor="#4791C5"><div align="center" class="Estilo2">Reg. Externo</div></td>
				  <td width="69" bgcolor="#4791C5"><div align="center" class="Estilo2">Hoja Ruta</div></td>
                  <td width="137" bgcolor="#4791C5"><div align="center" class="Estilo2">Fecha de Salida </div></td>
                  <td width="148" bgcolor="#4791C5"><div align="center" class="Estilo2">Destino</div></td>
				  <td width="90" bgcolor="#4791C5"><div align="center" class="Estilo2">Documento Adjunto</div></td>
                  <td width="280" bgcolor="#4791C5"><div align="center" class="Estilo2">Estado</div></td>
                  <td width="131" bgcolor="#4791C5"><div align="center" class="Estilo2">Proveido</div></td>
				  </tr>
                <tr>
                  <td height="2" colspan="8" bgcolor="#8fb1d2" class="Estilo78"></td>
                  </tr>
<?
//************************************************
if ($destino == 'CARRERAS')
{
    $sql5 ="SELECT * FROM correspondencia WHERE rut like '%$rut1%' and referencias like '$referencias1' ORDER BY rut,id_c ASC";
    $res5 = mysql_query($sql5) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
    $filas5 = mysql_num_rows($res5);
    $vec5 = mysql_fetch_array($res5);

    while ($vec5 = mysql_fetch_array($res5))
    {
	$id_c=$vec5["id_c"];
        if(ereg($id_c,$vector))
            $aaa = 0;
        else
            $aaa = 1;
        if($aaa == 1)
        {
	$rut=$vec5["rut"];
	$tipo=$vec5["tipo"];
	$fecha=$vec5["fecha"];
	$unidad=$vec5["unidad"];
	$destino=$vec5["destino"];
	$hoja_ruta=$vec5["hoja_ruta"];
	$comentario=$vec5["comentario"];
	$correlativo=$vec5['correlativo'];
	$referencias=$vec5["referencias"];
	$responsable=$vec5["responsable"];

	$aaa = $id_c;
	$sql2 = "SELECT fecha FROM recibido WHERE id_c = '$bbb' order by id_re desc limit 1";
        $res2 = mysql_query($sql2) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
	$vec2 = mysql_fetch_array($res2);
	$fecha_ingreso = $vec2["fecha"];
	if ($fecha_ingreso == 0)
		$fecha_ingreso = $fecha;
	echo '
        <tr>
           <td height="25" bgcolor="#E1F1FF" class="Estilo78"><center>';
           echo $rut;
           echo '</center></td>
           <td height="25" bgcolor="#E1F1FF" class="Estilo78"><center>';
           echo $fecha_ingreso;
           echo '</center></td>
           <td height="25" bgcolor="#E1F1FF" class="Estilo78"><center>';
           echo $unidad;
           echo '</center></td>
           <td height="25" bgcolor="#E1F1FF" class="Estilo78"><center>';
  	   echo $responsable;
	   echo '
	   <td height="25" bgcolor="#E1F1FF" class="Estilo78"><center>';
	   echo $correlativo;
	   echo '
	   <td height="25" bgcolor="#E1F1FF" class="Estilo78"><center>';
	   echo $hoja_ruta;
	   echo '</center></td>';
	   echo '
	   <td height="25" bgcolor="#E1F1FF" class="Estilo78"><center>';
	   echo $fecha;
	   echo '</center></td>
	   <td height="25" bgcolor="#E1F1FF" class="Estilo78"><center>';
	   echo $destino;
	   echo '</center></td>
	   <td height="25" bgcolor="#E1F1FF" class="Estilo78" align="left">
	   <table width="142" height="25" border="0" align="left" class="Estilo78">
              <tr><td>'.$comentario.'</td></tr>
           </table>
        </td>
      </tr>';
        }
   }
}
//************************************************
//efffffffff   ta medio jodichis...primero modificamos para la digitalizacion ahora para el recibido tb

$estado_env='En Camino';
//******************
$vector = '';
$i=0;
$aaa = 2;
//******************

$filas = mysql_num_rows($res);
if($filas > 0)
{
		$bbb = $id_c1;
		$ru = 0;
		while($vec = mysql_fetch_array($res))
		{	
			$id_c=$vec["id_c"];
			$rut=$vec["rut"]; 
			$tipo=$vec["tipo"];
			$fecha=$vec["fecha"];
			$unidad=$vec["unidad"];
			$destino=$vec["destino"];
			$hoja_ruta=$vec["hoja_ruta"];
			$comentario=$vec["comentario"];
			$correlativo=$vec['correlativo'];
			$referencias=$vec["referencias"];
			$responsable=$vec["responsable"];
			//effffff
			$docdoc=$vec["documento"];
			$vacio1="Sin Documento Digitalizado";
			//efff
                        $vector = $vector.'-'.$id_c;
						
			//BORRAMOS EL CONTROL DE FECHAS PORQUE ESTAMOS CEREANDO LAS TABLAS PARA LA GESTION 2015
			/*
			//parar el recibido tomando en cuenta las unidades externas ala FCPN
			//primero ver el destino unidades internas, luego
			//query para ver si el destino esta dentro de usuarios son los unicos casos para else a las unidades externas de la facultad
			//para el procesado, fecha del tramite pasado a datetime de string el fecha_ho(), convierte elmes de ago o sep o eso a numero pero en string para despues para pasar de string a integer mas facil
								
								$messq=substr($fecha, 3, 3);
								//$diaq=(int)(substr($fechaq, 0, 2));
								switch($messq)
										{
											case 'ENE': $mesqq = '01';		break; 
											case 'FEB': $mesqq = '02';		break; 
											case 'MAR': $mesqq = '03';		break; 
											case 'ABR': $mesqq = '04';		break; 
											case 'MAY': $mesqq = '05';		break; 
											case 'JUN': $mesqq = '06';		break; 
											case 'JUL': $mesqq = '07';		break; 
											case 'AGO': $mesqq = '08';		break; 
											case 'SEP': $mesqq = '09';		break; 
											case 'OCT': $mesqq = '10';		break; 
											case 'NOV': $mesqq = '11';		break; 
											case 'DIC': $mesqq = '12';		break; 
											case 'ene' : $mesqq = '01';		break; 
											case 'feb' : $mesqq = '02';		break; 
											case 'mar' : $mesqq= '03';		break; 
											case 'abr' : $mesqq = '04';		break; 
											case 'may' : $mesqq = '05';		break; 
											case 'jun' : $mesqq = '06';		break; 
											case 'jul' : $mesqq = '07';		break; 
											case 'ago': $mesqq = '08';		break; 
											case 'sep': $mesqq = '09';		break; 
											case 'oct': $mesqq = '10';		break; 
											case 'nov': $mesqq= '11';		break; 
											case 'dic': $mesqq = '12';		break; 

										}
								$mesq=(int)($mesqq);
								$gestq=(int)(substr($fecha, 7, 4));
								//un string cualquiera a datetime pa comparar,fecha desde la cual se aplico el camino
								
								$melay="19 AGO 2014 - 09:26:25";
								//$dia1y=(int)(substr($melay, 0, 2));
								$mes1y=8;
								$gest1y=(int)(substr($melay, 7, 4));
								//para las fechas
								$prov=0;
																						
	if($gestq >= $gest1y)  
	{
		if($mesq >= $mes1y)
		{
			$prov=1;*/
			
			/////destino externo......"Tramite Despachado Unidad Externa"
		
			$sql4 ="SELECT * FROM user WHERE nombre='$destino'";
			$res4 = mysql_query($sql4) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
			$filas4 = mysql_num_rows($res4);
			
			//effff para el control de del despachado a unidad externa de la facultad......
			if($destino=='TIC Facultativo' || $destino=='Postgrado en Fisica' || $destino=='Postgrado en Informatica' || $destino=='Planetario' || $destino=='Instituto de Matematica' || $destino=='Instituto de Inv. de Informatica' || $destino=='Instituto de Estadistica y Teo Aplicacion' || $destino=='Instituto de Fisica' || $destino=='Instituto de Ecologia' || $destino=='Honorable Consejo Facultativo' || $destino=='CE Estadistica' || $destino=='CE Fisica' || $destino=='CE Quimica' || $destino=='CE Biologia' || $destino=='CE Matematicas' || $destino=='CE Informatica' || $destino=='Centro de Estudiantes Facultativo' || $destino=='Carrera de Matematicas' || $destino=='Carrera de Estadistica' || $destino=='Carrera de Quimica' || $destino=='Carrera de Fisica' || $destino=='Carrera de Biologia' || $destino=='Asociacion de Docentes' || $destino=='Area Desconcentrada' || $destino=='Carrera de Informatica' || $destino=='Prefacultativo' || $destino=='Vicedecanato' || $destino=='Laboratorio Superior de Informatica' || $destino=='Decanato' || $destino=='Instituto de Investigaciones Quimicas' || $destino=='Instituto de Biologia Molecular' || $destino=='Laboratorio de Calidad Ambiental' || $destino=='Proyecto Caminar' || $destino=='Jardin Botanico' || $destino=='Centro de Postgrado en Ecologia y Conservacion' || $filas4 > 0)
			{	
			$aaa = $id_c;
			$sql9 ="SELECT * FROM recibido WHERE id_c='$aaa' and recibido_por!='0' and ip!='0' and fecha!='0' and reg_int!='0' ORDER BY id_c ASC";
			$res9 = mysql_query($sql9) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
			$filas9 = mysql_num_rows($res9);
			$vec9 = mysql_fetch_array($res9);

			if($filas9>0)
			{
				$estado_env='Recibido';
				$perico=$vec9["recibido_por"];
				$chichico=$vec9["fecha"];
			
			$sql2 = "SELECT fecha FROM recibido WHERE id_c = '$bbb' order by id_re desc limit 1";
            $res2 = mysql_query($sql2) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
			$vec2 = mysql_fetch_array($res2);
			$fecha_ingreso = $vec2["fecha"];	
			if ($fecha_ingreso == 0)	
				$fecha_ingreso = $fecha;
			echo '
            <tr>
            <td height="25" bgcolor="#E1F1FF" class="Estilo78"><center>'; 
			echo $rut; 
			echo '</center></td>
            <td height="25" bgcolor="#E1F1FF" class="Estilo78"><center>'; 
			echo $fecha_ingreso; 
			echo '</center></td>
            <td height="25" bgcolor="#E1F1FF" class="Estilo78"><center>';
			echo $unidad;
			echo '</center></td>
            <td height="25" bgcolor="#E1F1FF" class="Estilo78"><center>';
			echo $responsable;
			echo '
			<td height="25" bgcolor="#E1F1FF" class="Estilo78"><center>';
			echo $correlativo;
			echo '	
			<td height="25" bgcolor="#E1F1FF" class="Estilo78"><center>';
			echo $hoja_ruta;
			echo '</center></td>';
			echo '	
			<td height="25" bgcolor="#E1F1FF" class="Estilo78"><center>';
			echo $fecha;
			echo '</center></td>
			<td height="25" bgcolor="#E1F1FF" class="Estilo78"><center>';
			echo $destino;
			echo '</center></td>
			<td height="25" bgcolor="#E1F1FF" class="Estilo78"><center>';
			if($docdoc != "")
			{	//echo '<a href="/chasqui/admin/'.$docdoc.'">Ver</a>';
				$ext = explode('.',$docdoc);
				//verifica la extension del archivo digitalizado
				if($ext[1] == "xlsx" || $ext[1] == "xls" || $ext[1] == "docx" || $ext[1] == "doc"){
					echo '<a href="/chasqui/admin/'.$docdoc.'">Ver archivo</a>';
				}
				else{
					echo '<a href="#"  onclick=window.open("/chasqui/admin/'.$docdoc.'","ventana","width=640,height=480,scrollbars=NO,menubar=NO,resizable=NO,titlebar=NO,status=NO");>Ver archivo</a>';
				}	
			}
			else
			{echo $vacio1;
			}
			echo '</center></td>
			<td height="25" bgcolor="#E1F1FF" class="Estilo78"><center>'; 
			echo $estado_env.' por '.$perico.'-'.$chichico; 
			echo '</center></td>
			<td height="25" bgcolor="#E1F1FF" class="Estilo78" align="left">';
									?>
									  <table width="142" height="25" border="0" align="left" class="Estilo78">
										<tr>
										  <td><? echo  $comentario;?></td>
										</tr>
									  </table>
									<?	echo'</td>
									</tr>';
			}
			$sql2 = "SELECT fecha FROM recibido WHERE id_c = '$bbb' order by id_re desc limit 1";
            $res2 = mysql_query($sql2) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
			$vec2 = mysql_fetch_array($res2);
			$fecha_ingreso = $vec2["fecha"];	
			if ($fecha_ingreso == 0)	
				$fecha_ingreso = $fecha;
			else
			{
						$sql13 ="SELECT * FROM correspondencia WHERE id_c='$aaa' and comentario like '%PENDIENTE:%' ORDER BY id_c ASC";
						$res13 = mysql_query($sql13) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
						$filas13 = mysql_num_rows($res13);
						$vec13 = mysql_fetch_array($res13);
						  if($filas13>0)
						  {
								 if($fecha_ingreso == 0)	
								  {$fecha_ingreso = $fecha;}
									//para el pendiente aparezca en el Seguimiento........
									$sql52 ="SELECT * FROM recibido WHERE id_c='$aaa' and recibido_por!='0' and ip!='0' and fecha!='0' ORDER BY id_c ASC";
									$res52 = mysql_query($sql52) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
									$filas52 = mysql_num_rows($res52);
									$vec52 = mysql_fetch_array($res52);
			
									if($filas52>0)
									{
									$estado_env='Recibido';
									$perico52=$vec52["recibido_por"];
									$chichico52=$vec52["fecha"];
									echo '
									<tr>
									<td height="25" bgcolor="#E1F1FF" class="Estilo78"><center>'; 
									echo $rut; 
									echo '</center></td>
									<td height="25" bgcolor="#E1F1FF" class="Estilo78"><center>'; 
									echo $fecha_ingreso; 
									echo '</center></td>
									<td height="25" bgcolor="#E1F1FF" class="Estilo78"><center>';
									echo $unidad;
									echo '</center></td>
									<td height="25" bgcolor="#E1F1FF" class="Estilo78"><center>';
									echo $responsable;
									echo '
									<td height="25" bgcolor="#E1F1FF" class="Estilo78"><center>';
									echo $correlativo;
									echo '	
									<td height="25" bgcolor="#E1F1FF" class="Estilo78"><center>';
									echo $hoja_ruta;
									echo '</center></td>';
									echo '	
									<td height="25" bgcolor="#E1F1FF" class="Estilo78"><center>';
									echo $fecha;
									echo '</center></td>
									<td height="25" bgcolor="#E1F1FF" class="Estilo78"><center>';
									if($docdoc != "")
									{	//echo '<a href="/chasqui/admin/'.$docdoc.'">Ver</a>';
										$ext = explode('.',$doc);
										//verifica la extension del archivo digitalizado
										if($ext[1] == "xlsx" || $ext[1] == "xls" || $ext[1] == "docx" || $ext[1] == "doc"){
											echo '<a href="/chasqui/admin/'.$docdoc.'">Ver archivo</a>';
										}
										else{
											echo '<a href="#"  onclick=window.open("/chasqui/admin/'.$docdoc.'","ventana","width=640,height=480,scrollbars=NO,menubar=NO,resizable=NO,titlebar=NO,status=NO");>Ver archivo</a>';
										}	
									}
									else
									{echo $vacio1;
									}
									echo '</center></td>
									<td height="25" bgcolor="#E1F1FF" class="Estilo78"><center>';
									echo $destino;
									echo '</center></td>
									<td height="25" bgcolor="#E1F1FF" class="Estilo78"><center>'; 
									echo $estado_env.' por '.$perico52.'-'.$chichico52; 
									echo '</center></td>
									<td height="25" bgcolor="#E1F1FF" class="Estilo78" align="left">';
									?>
									  <table width="142" height="25" border="0" align="left" class="Estilo78">
										<tr>
										  <td><? echo  $comentario;?></td>
										</tr>
									  </table>
									<?	echo'</td>
									</tr>';
									}
							/*
							else
							{
							
							$estado_env='En Camino';
											
							$sql2 = "SELECT fecha FROM recibido WHERE id_c = '$bbb' order by id_re desc limit 1";
							$res2 = mysql_query($sql2) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
							$vec2 = mysql_fetch_array($res2);
							$fecha_ingreso = $vec2["fecha"];	
							if ($fecha_ingreso == 0)	
								$fecha_ingreso = $fecha;

							echo '
							<tr>
							<td height="25" bgcolor="#E1F1FF" class="Estilo78"><center>'; 
							echo $rut; 
							echo '</center></td>
							<td height="25" bgcolor="#E1F1FF" class="Estilo78"><center>'; 
							echo $fecha_ingreso; 
							echo '</center></td>
							<td height="25" bgcolor="#E1F1FF" class="Estilo78"><center>';
							echo $unidad;
							echo '</center></td>
							<td height="25" bgcolor="#E1F1FF" class="Estilo78"><center>';
							echo $responsable;
							echo '
							<td height="25" bgcolor="#E1F1FF" class="Estilo78"><center>';
							echo $correlativo;
							echo '	
							<td height="25" bgcolor="#E1F1FF" class="Estilo78"><center>';
							echo $hoja_ruta;
							echo '</center></td>';
							echo '	
							<td height="25" bgcolor="#E1F1FF" class="Estilo78"><center>';
							echo $fecha;
							echo '</center></td>
							<td height="25" bgcolor="#E1F1FF" class="Estilo78"><center>';
							echo $destino;
							echo '</center></td>
							<td height="25" bgcolor="#E1F1FF" class="Estilo78"><center>'; 
							echo $estado_env; 
							echo '</center></td>
							<td height="25" bgcolor="#E1F1FF" class="Estilo78" align="left">';
							?>
							<table width="142" height="25" border="0" align="left" class="Estilo78">
							<tr>
							<td><? echo  $comentario;?></td>
							</tr>
								</table>
								<?	echo'</td>
							</tr>';
							}
							*/
				}
			}
		}
		else
		{//para cuando se concluye un tramite
			if($destino == 'Archivo')
			{$estado_env='Concluido';}
			else
			{$estado_env='Despachado Unidad Externa a la FCPN';}
		
			$sql2 = "SELECT fecha FROM recibido WHERE id_c = '$bbb' order by id_re desc limit 1";
            $res2 = mysql_query($sql2) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
			$vec2 = mysql_fetch_array($res2);
			$fecha_ingreso = $vec2["fecha"];	
			if ($fecha_ingreso == 0)	
				$fecha_ingreso = $fecha;

			echo '
            <tr>
            <td height="25" bgcolor="#E1F1FF" class="Estilo78"><center>'; 
			echo $rut; 
			echo '</center></td>
            <td height="25" bgcolor="#E1F1FF" class="Estilo78"><center>'; 
			echo $fecha_ingreso; 
			echo '</center></td>
            <td height="25" bgcolor="#E1F1FF" class="Estilo78"><center>';
			echo $unidad;
			echo '</center></td>
            <td height="25" bgcolor="#E1F1FF" class="Estilo78"><center>';
			echo $responsable;
			echo '
			<td height="25" bgcolor="#E1F1FF" class="Estilo78"><center>';
			echo $correlativo;
			echo '	
			<td height="25" bgcolor="#E1F1FF" class="Estilo78"><center>';
			echo $hoja_ruta;
			echo '</center></td>';
			echo '	
			<td height="25" bgcolor="#E1F1FF" class="Estilo78"><center>';
			echo $fecha;
			echo '</center></td>
			<td height="25" bgcolor="#E1F1FF" class="Estilo78"><center>';
			echo $destino;
			echo '</center></td>
			<td height="25" bgcolor="#E1F1FF" class="Estilo78"><center>';
			if($docdoc != "")
			{	//echo '<a href="/chasqui/admin/'.$docdoc.'">Ver</a>';
				$ext = explode('.',$docdoc);
				//verifica la extension del archivo digitalizado
				if($ext[1] == "xlsx" || $ext[1] == "xls" || $ext[1] == "docx" || $ext[1] == "doc"){
					echo '<a href="/chasqui/admin/'.$docdoc.'">Ver archivo</a>';
				}
				else{
					echo '<a href="#"  onclick=window.open("/chasqui/admin/'.$docdoc.'","ventana","width=640,height=480,scrollbars=NO,menubar=NO,resizable=NO,titlebar=NO,status=NO");>Ver archivo</a>';
				}	
			}
			else
			{echo $vacio1;
			}
			echo '</center></td>
			<td height="25" bgcolor="#E1F1FF" class="Estilo78"><center>'; 
			echo $estado_env; 
			echo '</center></td>
			<td height="25" bgcolor="#E1F1FF" class="Estilo78" align="left">';
			?>
			  <table width="142" height="25" border="0" align="left" class="Estilo78">
                <tr>
                  <td><? echo  $comentario;?></td>
                </tr>
              </table>
			<?	echo'</td>
            </tr>';
			}
//********************************************************
if ($destino == 'CARRERAS')
{
    $sql5 ="SELECT * FROM correspondencia WHERE rut like '%$rut1%' and referencias like '$referencias1' ORDER BY rut,id_c ASC";
    $res5 = mysql_query($sql5) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
    $filas5 = mysql_num_rows($res5);
    $vec5 = mysql_fetch_array($res5);

    while ($vec5 = mysql_fetch_array($res5))
    {
	$id_c=$vec5["id_c"];
        if(ereg($id_c,$vector))
            $aaa = 0;
        else
            $aaa = 1;
        if($aaa == 1)
        {
	$rut=$vec5["rut"];
	$tipo=$vec5["tipo"];
	$fecha=$vec5["fecha"];
	$unidad=$vec5["unidad"];
	$destino=$vec5["destino"];
	$hoja_ruta=$vec5["hoja_ruta"];
	$comentario=$vec5["comentario"];
	$correlativo=$vec5['correlativo'];
	$referencias=$vec5["referencias"];
	$responsable=$vec5["responsable"];

	$aaa = $id_c;
	$sql2 = "SELECT fecha FROM recibido WHERE id_c = '$bbb' order by id_re desc limit 1";
        $res2 = mysql_query($sql2) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
	$vec2 = mysql_fetch_array($res2);
	$fecha_ingreso = $vec2["fecha"];
	if ($fecha_ingreso == 0)
		$fecha_ingreso = $fecha;
	echo '
        <tr>
           <td height="25" bgcolor="#E1F1FF" class="Estilo78"><center>';
           echo $rut;
           echo '</center></td>
           <td height="25" bgcolor="#E1F1FF" class="Estilo78"><center>';
           echo $fecha_ingreso;
           echo '</center></td>
           <td height="25" bgcolor="#E1F1FF" class="Estilo78"><center>';
           echo $unidad;
           echo '</center></td>
           <td height="25" bgcolor="#E1F1FF" class="Estilo78"><center>';
  	   echo $responsable;
	   echo '
	   <td height="25" bgcolor="#E1F1FF" class="Estilo78"><center>';
	   echo $correlativo;
	   echo '
	   <td height="25" bgcolor="#E1F1FF" class="Estilo78"><center>';
	   echo $hoja_ruta;
	   echo '</center></td>';
	   echo '
	   <td height="25" bgcolor="#E1F1FF" class="Estilo78"><center>';
	   echo $fecha;
	   echo '</center></td>
	   <td height="25" bgcolor="#E1F1FF" class="Estilo78"><center>';
	   echo $destino;
	   echo '</center></td>
	   <td height="25" bgcolor="#E1F1FF" class="Estilo78" align="left">
	   <table width="142" height="25" border="0" align="left" class="Estilo78">
              <tr><td>'.$comentario.'</td></tr>
           </table>
        </td>
      </tr>';
        }
   }
}
//********************************************************


			$bbb = $aaa;
			$i++;
//Reporte por unidades
if ($i >1)
{
	$unidad_ru = $rep_uni[$ru-3];
	if($unidad_ru == $unidad)
	{
		$rep_uni[$ru-1] = $fecha;
	}
	else
	{
		$rep_uni[$ru] = $unidad;
		$rep_uni[$ru+1] = $fecha_ingreso;
		$rep_uni[$ru+2] = $fecha;
		$ru = $ru+3;
	}
}
else
{
		$rep_uni[$ru] = $unidad;
		$rep_uni[$ru+1] = $fecha_ingreso;
		$rep_uni[$ru+2] = $fecha;
		$ru = $ru+3;
}
			}
		?>
                <tr>
                  <td height="7" colspan="9" bgcolor="#CCDDEE" class="Estilo78"></td>
                </tr>
                <tr>
                  <td height="15" colspan="9" class="Estilo78"></td>
                </tr>
            </table>
		<?
		if($filas == $i)
		{	
			$sub = ':';
			$var = strpos($comentario,$sub);
			$estado = substr($comentario,0,$var);
			if($estado == 'Concluido')
			{	
				$fecha_final = $fecha;
	   ?>
              <table width="352" height="70" border="0" cellpadding="2" cellspacing="2" bgcolor="#E1F1FF">
                <tr>
                  <td colspan="2" class="Estilo77"> Fecha inicial del Tr�mite: <? echo $fecha_inicial;?> Fecha final del Tr�mite: <? echo $fecha_final;?> Tiempo Total de Duraci&oacute;n:
                    <? $total = tiempo_tramite($fecha_inicial,$fecha_final);?></td>
                  </tr>
              </table>  
<?
 			} 
	   }
		//effffffffff concatenamos para formar la direccion del archivo ZIP
	   $valeria=$rut.'.'.'zip';
	   //ahora verificamos si es del formato 1-tic_2014 si es asi mostrara la descarga, si es del formato 1-tic no mostrara nada.....lo controlamos por la linea _
		if(strstr($rut,'_'))
		{
			echo '<table width="352" height="40" border="0" cellpadding="0" cellspacing="2" bordercolor="#EDF7FF" bgcolor="#74ABD3"><tr bgcolor="#B1CBE4">
				<td bgcolor="#CCCCFF" class="Estilo2"><center><a href="/chasqui/admin/Compress/'.$valeria.'">Descargar Archivos Adjuntos</a></center></td></tr>
				</table>';
		}
	//effffffff	   
$i=0;
echo '<table width="352" border="0" cellpadding="0" cellspacing="2" bordercolor="#EDF7FF" bgcolor="#74ABD3"><tr bgcolor="#B1CBE4"><td>';
echo '<table width="350" border="0" cellspacing="2" cellspading="0"><tr>';
echo '<td bgcolor="#4791C5" class="Estilo2">No</td><td bgcolor="#4791C5" class="Estilo2"><center>Unidad</center></td>
<td bgcolor="#4791C5" class="Estilo2"><center>Tiempo de Permanencia</center></td></tr><tr>';

for ($aa=0;$aa<=$ru;$aa++)
{
	$valor = $rep_uni[$aa];
	if ($aa % 3 == 0 and $aa != 0)
	{
		echo '<td width="15" class="Estilo78" bgcolor="#E1F1FF" height="25"><center>',$i=$i+1,'<center></td>';	
		echo '<td width="110" class="Estilo78" bgcolor="#E1F1FF" height="25">',$rep_uni[$aa-3],'</td>';

////////
if($ru==$aa)
{include("../php/fecha_hora.php");
$fecha=fecha_hora();
$rep_uni[$aa-1] = $fecha;

}
/////////

		echo '<td width="220" class="Estilo78" bgcolor="#E1F1FF" height="25">';$total = tiempo_tramite($rep_uni[$aa-2],$rep_uni[$aa-1]);echo '</td>';
		echo '</tr><tr>';
	}
}
echo '</tr></table></td></tr></table>';
}
?>              </td>
          </tr>
          <tr>
            <td height="1" bgcolor="#74ABD3"></td>
          </tr>
        </table></td>
        </tr>
	  <tr>
	    <td height="2"></td>
	    </tr>
	  <tr>
	    <td height="20"><table width="1000" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td width="15"><img src="../img/No_fondo1.gif" alt="" width="15" height="20"></td>
            <td width="945" background="../img/No_fondo2.gif">&nbsp;</td>
            <td width="16"><img src="../img/No_fondo3.gif" alt="" width="15" height="20"></td>
          </tr>
        </table></td>
	    </tr>
    </table></td>
  </tr>
</table>
</body>
</html>
