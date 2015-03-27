<?
include("../funciones1.php");
$link = conexion();
ini_set('display_startup_errors',1);
ini_set('display_errors',1);
error_reporting(-1);
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
<?

$sql = "SELECT * FROM correspondencia WHERE unidad='TIC Facultativo' and (fecha like '%OCT 2014%' or fecha like '%NOV 2014%' or fecha like '%DIC 2014%') and rut like '%TIC%' group by rut ORDER BY id_c ASC";
$res = mysql_query($sql) or die ("Error de b?squeda en la BD: ". mysql_Error());
$num = mysql_num_rows($res);

							
$i=0;
$diferencia=0;
$diferencia2=0;
if($num > 0)
{								
								while ($vec = mysql_fetch_array($res))
								{	
									$rut = $vec['rut'];
									$referencias0 = $vec['referencias'];
									
									$fecha = $vec['fecha'];
									
									/*$tipo = $vec['tipo'];
									$destino = $vec['destino'];
									$correlativo = $vec['correlativo'];
									$hoja_ruta = $vec['hoja_ruta'];
									$referencias = $vec['referencias'];
									$fojas = $vec['fojas'];
									$responsable = $vec['responsable'];*/
									
									$sql2 = "SELECT * FROM correspondencia WHERE rut = '$rut' and referencias like '%$referencias0%' and comentario like '%Concluido%' and destino='Archivo' and (fecha like '%OCT 2014%' or fecha like '%NOV 2014%' or fecha like '%DIC 2014%') order by id_c desc limit 1";
									$res2 = mysql_query($sql2) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
									$vec2 = mysql_fetch_array($res2);
									
									
									$fecha2 = $vec2['fecha'];
									$tipo = $vec2['tipo'];
									$destino = $vec2['destino'];
									$correlativo = $vec2['correlativo'];
									$hoja_ruta = $vec2['hoja_ruta'];
									$referencias = $vec2['referencias'];
									$fojas = $vec2['fojas'];
									$responsable = $vec2['responsable'];
									$rut1 = $vec2['rut'];
									
									
									
																	
											
								if($fecha!='' and $fecha2!='')
								{
								$mes=substr($fecha, 3, 3);
								switch($mes)
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
								//$mesint=(int)($mes);
								$fecha1=substr($fecha,0,2).'-'.$mesqq.'-'.substr($fecha,7,4).' '.substr($fecha,14,strlen($fecha));
								$val = strtotime($fecha1);
								
								//$fecha_inicio = date("Y-m-d h:i:m", $val);
									
									$mes1=substr($fecha2, 3, 3);
									switch($mes)
										{
											case 'ENE': $mesq = '01';		break; 
											case 'FEB': $mesq = '02';		break; 
											case 'MAR': $mesq = '03';		break; 
											case 'ABR': $mesq = '04';		break; 
											case 'MAY': $mesq = '05';		break; 
											case 'JUN': $mesq = '06';		break; 
											case 'JUL': $mesq = '07';		break; 
											case 'AGO': $mesq = '08';		break; 
											case 'SEP': $mesq = '09';		break; 
											case 'OCT': $mesq = '10';		break; 
											case 'NOV': $mesq = '11';		break; 
											case 'DIC': $mesq = '12';		break; 
											case 'ene' : $mesq = '01';		break; 
											case 'feb' : $mesq = '02';		break; 
											case 'mar' : $mesq = '03';		break; 
											case 'abr' : $mesq = '04';		break; 
											case 'may' : $mesq = '05';		break; 
											case 'jun' : $mesq = '06';		break; 
											case 'jul' : $mesq = '07';		break; 
											case 'ago': $mesq = '08';		break; 
											case 'sep': $mesq = '09';		break; 
											case 'oct': $mesq = '10';		break; 
											case 'nov': $mesq = '11';		break; 
											case 'dic': $mesq = '12';		break; 

										}
								//$mesint=(int)($mes);
								$fecha3=substr($fecha2,0,2).'-'.$mesq.'-'.substr($fecha2,7,4).' '.substr($fecha2,14,strlen($fecha2));
								$val1 = strtotime($fecha3);
								
								//$fecha_inicio = date("Y-m-d h:i:m", $val);
								
								if($i==0)
								{
								$diferencia=$val - $val1;
								$i++;
								}
								else
								{
								$diferencia2=$val - $val1;
								
								if($diferencia<$diferencia2)
								{								
?>
								<table>
								<tr>
                                <td width="35" height="15" bgcolor="#E1F1FF" class="Estilo78"><div align="center"><? echo $rut1;?></div></td>
                                <td width="77" bgcolor="#E1F1FF"><div align="center"><span class="Estilo78"><? echo $diferencia;?></span></div></td>
								
								
								<td width="150" height="50" bgcolor="#E1F1FF"><center>
									<table width="150" height="50"><tr><td>
									<div align="left" class="Estilo78">
									<? echo $referencias; ?>
									</div></td></tr>
									</table></center></td>
								<td width="46" bgcolor="#E1F1FF"><div align="center"><span class="Estilo78"><? echo $fojas;?></span></div></td>
								<td width="72" bgcolor="#E1F1FF"><div align="center"><span class="Estilo78"><? echo $destino; ?></span></div></td>
								</span></div></td>
								</table>
								
<?
								}
								else
								{
								$diferencia=$diferencia2;
?>
								<table>
								<tr>
                                <td width="35" height="15" bgcolor="#E1F1FF" class="Estilo78"><div align="center"><? echo $rut1;?></div></td>
                                <td width="77" bgcolor="#E1F1FF"><div align="center"><span class="Estilo78"><? echo $diferencia2;?></span></div></td>
								
								
								<td width="150" height="50" bgcolor="#E1F1FF"><center>
									<table width="150" height="50"><tr><td>
									<div align="left" class="Estilo78">
									<? echo $referencias; ?>
									</div></td></tr>
									</table></center></td>
								<td width="46" bgcolor="#E1F1FF"><div align="center"><span class="Estilo78"><? echo $fojas;?></span></div></td>
								<td width="72" bgcolor="#E1F1FF"><div align="center"><span class="Estilo78"><? echo $destino; ?></span></div></td>
								</span></div></td>
								</table>
								
<?
								}
								}
							}
										
				}
	}
?>
	
</body>
</html>