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
include("../php/fecha_hora.php");
include("../funciones1.php");
$link=conexion();

$consulta ="SELECT distinct(rut),referencias FROM correspondencia WHERE comentario like '%Concluido%' order by id_c ASC limit 50";
$resultado=mysql_query($consulta) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
$numResultados = mysql_num_rows($resultado);

$co =0;
$not=0;
$rep=0;
$ru =0;
$reci =0;

if ($numResultados > 0)
{
	while($fila = mysql_fetch_array($resultado))
	{		
		$rut = $fila["rut"]; 
		$referencias1 = $fila["referencias"]; 
		$sql = "SELECT * FROM correspondencia WHERE rut like '$rut' and referencias like 	
		'$referencias1' order by id_c ASC";
		$res = mysql_query($sql) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
		$num = mysql_num_rows($res);
		if ($num > 0)
		{
			while($linea = mysql_fetch_array($res))
			{	
				$id_c=$linea["id_c"];
				$rut=$linea["rut"];
				$unidad=$linea["unidad"];
				$fecha=$linea["fecha"];
				$correlativo=$linea["correlativo"];
				$hoja_ruta=$linea["hoja_ruta"];
				$tipo=$linea["tipo"];
				$referencias=$linea["referencias"];
				$fojas=$linea["fojas"];
				$responsable=$linea["responsable"];
				$destino=$linea["destino"];
				$comentario=$linea["comentario"];
				$ip=$linea["ip"];

				$matriz[$co][0]=$rut;	
				$matriz[$co][1]=$unidad;	
				$matriz[$co][2]=$fecha;	
				$matriz[$co][3]=$correlativo;	
				$matriz[$co][4]=$hoja_ruta;		
				$matriz[$co][5]=$tipo;			
				$matriz[$co][6]=$referencias;	
				$matriz[$co][7]=$fojas;			
				$matriz[$co][8]=$responsable;	
				$matriz[$co][9]=$destino;
				$matriz[$co][10]=$comentario;		
				$matriz[$co][11]=$ip;	

				$sql7 = "SELECT * FROM recibido WHERE id_c = '$id_c' ORDER BY id_re DESC limit 1";
				$res7 = mysql_query($sql7) or die ("Error de b&uacute;squeda en la BD: ". 	
				mysql_Error());
				$num7 = mysql_num_rows($res7);
				if($num7 > 0)
				{	$linea7 = mysql_fetch_array($res7);
					$cid_re = $linea7["id_re"];
					$cid_unidad = $linea7["id_unidad"];
					$creg_int = $linea7["reg_int"];
					$cid_c = $linea7["id_c"];
					$crecibido_por = $linea7["recibido_por"];
					$cip = $linea7["ip"];
					$cfecha = $linea7["fecha"];

					$mat_rec[$co][0]=$cid_re;
					$mat_rec[$co][1]=$cid_unidad;
					$mat_rec[$co][2]=$creg_int;
					$mat_rec[$co][3]=$cid_c;
					$mat_rec[$co][4]=$crecibido_por;
					$mat_rec[$co][5]=$cip;
					$mat_rec[$co][6]=$cfecha;
					
					$sql_rec = "DELETE FROM recibido WHERE id_c = '$id_c'";
					$res_rec = mysql_query($sql_rec) or die ("Error de b&uacute;squeda en la BD: ".	
					mysql_Error());	
	
				}
				$co++;

				$anio = año($fecha);
				$sql7 = "SELECT * FROM reportes WHERE rut like '%,$rut,%' and responsable like 	
				'$responsable' and fecha_sol like '%$anio%' order by id_r ASC";
				$res7 = mysql_query($sql7) or die ("Error de b&uacute;squeda en la BD: ". 	
				mysql_Error());
				$num7 = mysql_num_rows($res7);
				if($num7 > 0)
				{	$linea7 = mysql_fetch_array($res7);
					$reid_r = $linea7["id_r"];
					$r_rut = $linea7["rut"];
					$rerut = ','.$rut.',';
					$refecha_sol = $linea7["fecha_sol"];
					$reresponsable = $linea7["responsable"];
					$reip = $linea7["ip"];
					$reid_uni = $linea7["id_uni"];
					
					$mat_re[$rep][0]=$reid_r;
					$mat_re[$rep][1]=$rerut;
					$mat_re[$rep][2]=$refecha_sol;
					$mat_re[$rep][3]=$reresponsable;
					$mat_re[$rep][4]=$reip;
					$mat_re[$rep][5]=$reid_uni;
		
					$texto = $r_rut;
					$vieja = $rerut;
					$nueva = ",";
					$texto_2 = str_replace($vieja , $nueva , $texto);

					$sql_rep = "UPDATE reportes SET rut = '$texto_2' WHERE rut like '$r_rut' and 	
					responsable like '$responsable' and fecha_sol like '%$anio%'";
					$res_rep = mysql_query($sql_rep) or die ("Error de b&uacute;squeda en la BD: ".	
					mysql_Error());
				
					$rep++;
				}	

				$sql7 = "SELECT * FROM notificacion WHERE id_c = '$id_c'";
				$res7 = mysql_query($sql7) or die ("Error de b&uacute;squeda en la BD: ".	
				mysql_Error());
				$num7 = mysql_num_rows($res7);
				if($num7 > 0)
				{	$linea7 = mysql_fetch_array($res7);
					$nid_not = $linea7["id_not"];
					$nid_c = $linea7["id_c"];
					$nfecha = $linea7["fecha"];
					$nremitente = $linea7["remitente"];
					$ntipo = $linea7["tipo"];
					$nasunto = $linea7["asunto"];
					$nmensaje = $linea7["mensaje"];
					$mat_not[$not][0]=$nid_not;
					$mat_not[$not][1]=$nid_c;
					$mat_not[$not][2]=$nfecha;
					$mat_not[$not][3]=$nremitente;
					$mat_not[$not][4]=$ntipo;
					$mat_not[$not][5]=$nasunto;
					$mat_not[$not][6]=$nmensaje;
					
					$sql_not = "DELETE FROM notificación WHERE id_c = '$id_c'";
					$res_not = mysql_query($sql_not) or die ("Error de b&uacute;squeda en la 	
					BD: ". mysql_Error	());

					$not ++;
				}
			}		
			
			$sql7 = "SELECT * FROM rut WHERE rut like '$rut'";
			$res7 = mysql_query($sql7) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error	
			());
			$num7 = mysql_num_rows($res7);
			if($num7 > 0)
			{	$linea7 = mysql_fetch_array($res7);
				$rid_rut = $linea7["id_rut"];
				$rrut = $linea7["rut"];
				$rid_unidad = $linea7["id_unidad"];
				$mat_r[$ru][0]=$rid_rut;
				$mat_r[$ru][1]=$rrut;
				$mat_r[$ru][2]=$rid_unidad;
							
				$ru++;
			}
			
			$sql_rut = "DELETE FROM rut WHERE rut like '$rut'";
			$res_rut = mysql_query($sql_rut) or die ("Error de b&uacute;squeda en la BD: ". 	
			mysql_Error());
		}
//**********************************************
$sql = "DELETE FROM correspondencia WHERE rut like '$rut' and referencias like '$referencias1'";
$res = mysql_query($sql) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
//**********************************************
	}
}
//COPIAMOS LOS DATOS ANTERIORMENTE ALMACENADOS EN LA MATRIZ
include("../funciones2.php");
$link2=conexion2();

//Obtenemos el ultimo ID de los registros
$sql="SELECT id_c FROM correspondencia order by id_c DESC limit 1";
$res = mysql_query($sql);
$linea = mysql_fetch_array($res);
$num = mysql_num_rows($res);
$id = $linea["id_c"]; 
if($num <= 0)
	$id = 0;
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
<table style="position:absolute;" width="1000" border="0" align="center" cellspacing="0">
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
              <td width="133"><table style="position:absolute; top:170px; left:3px; width: 129px; height: 137px;"width="132" height="240" border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td width="132" height="92"><script src="menu_sp.js"></script></td>
                </tr>
              </table></td>
              <td width="717" bgcolor="#EDF7FF"><table width="711" height="246" border="2" align="center" cellpadding="0" cellspacing="0" bordercolor="#8fb1d2">
                <tr>
                  <td width="705" background="../img/fondo_cuerpo.gif"><br><p><span class="Estilo77">&nbsp;&nbsp;&nbsp;&nbsp;Unidad: <?php echo $unidad;?><br>
  &nbsp;&nbsp;&nbsp;&nbsp;Usuario: <? echo $nombre; ?></span></p>
                    <p align="center" class="Estilo77">Los siguientes registros han sido archivados.</p>
                    <div align="left">
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
                                <td width="43" bgcolor="#4791C5"><div align="center" class="Estilo2">R.U.T.</div></td>
                                <td width="79" height="15" bgcolor="#4791C5" class="Estilo2"><div align="center">Fecha Ingreso </div></td>
                                <td width="86" bgcolor="#4791C5"><div align="center" class="Estilo2">Unidad</div></td>
                                <td width="61" bgcolor="#4791C5" class="Estilo2"><div align="center">Tipo</div></td>
                                <td width="61" bgcolor="#4791C5"><div align="center" class="Estilo2">Correlativo</div></td>
                                <td width="140" bgcolor="#4791C5"><div align="center" class="Estilo2">Referencias</div></td>
                                <td width="40" bgcolor="#4791C5" class="Estilo2"><div align="center">No Fojas </div></td>
                                <td width="90" bgcolor="#4791C5"><div align="center" class="Estilo2">Responsable:</div></td>
                                <td width="70" bgcolor="#4791C5" class="Estilo2"><div align="center"> Ver Seguimiento</div></td>
                              </tr>
<?
for($i=0;$i<$co;$i++)
{
	$rut = $matriz[$i][0]; 
	$unidad = $matriz[$i][1];	 
	$fecha = $matriz[$i][2];
	$correlativo = $matriz[$i][3];
	$hoja_ruta = $matriz[$i][4];
	$tipo = $matriz[$i][5];
	$referencias = $matriz[$i][6];
	$fojas = $matriz[$i][7];
	$responsable = $matriz[$i][8];
	$destino = $matriz[$i][9];
	$comentario = $matriz[$i][10];
	$ip = $matriz[$i][11];

	$sql="INSERT INTO correspondencia 	
(id_c,rut,unidad,fecha,correlativo,hoja_ruta,tipo,referencias,fojas,responsable,destino,comentario,ip) VALUES (NULL,'$rut','$unidad','$fecha','$correlativo','$hoja_ruta','$tipo','$referencias','$fojas','$responsable','$destino','$comentario','$ip')";
	$res = mysql_query($sql);
	
	//Insertamos en la tabla recibido
	$cid_re = $mat_rec[$i][0];
	$cid_unidad = $mat_rec[$i][1];
	$creg_int = $mat_rec[$i][2];
	$cid_c = $mat_rec[$i][3];
	$cnombre = $mat_rec[$i][4];
	$cip = $mat_rec[$i][5];
	$cfecha = $mat_rec[$i][6];
	
	$id ++;
	
	$sql="INSERT INTO recibido(id_re,id_unidad,reg_int,id_c,recibido_por,ip,fecha) VALUES 	
	(NULL,'$cid_unidad','$creg_int','$id','$cnombre','$cip','$cfecha')";
	$result = mysql_query($sql);

	echo '
    <tr>
    <td height="50" width="44" bgcolor="#E1F1FF" class="Estilo78"><center>'; 
	echo $rut; 
	echo '</center></td>
    <td height="50" width="96" bgcolor="#E1F1FF" class="Estilo78"><center>'; 
	echo $fecha; 
	echo '</center></td>
	<td height="50" width="62" bgcolor="#E1F1FF" class="Estilo78"><center>'; 
	echo $unidad; 
	echo '</center></td>
    <td height="50" width="62" bgcolor="#E1F1FF" class="Estilo78"><center>'; 
	echo $tipo; 
	echo '</center></td>
    <td height="50" width="66" bgcolor="#E1F1FF" class="Estilo78"><center>';
	echo $correlativo;
	echo '</center></td>';
    echo '<td height="50" width="98" bgcolor="#E1F1FF" class="Estilo78"><center>';
	echo '<table width="140" height="50" border="0" cellpadding="0" cellspacing="2" 	
	bgcolor="#E1F1FF" class="Estilo78">
	<tr>
	<td>'.$referencias.'</td>
	</tr>
	</table>';
	echo'</center></td>
    <td height="50" width="32" bgcolor="#E1F1FF" class="Estilo78"><center>';
	echo $fojas;
	echo'</center></td>
	<td height="50" width="84" bgcolor="#E1F1FF" class="Estilo78"><center>';
	echo $responsable;
	echo'</center></td>
	<td height="50" width="82" bgcolor="#E1F1FF" class="Estilo78"><center>';
	echo '<a href="seguimiento.php?reg='.$rut.'">Seguimiento</a>'; 
	echo '</center></td>
    </tr>';
	
//	echo '<h1>No '.$i.'</h1>';
}
//Insertamos los registros en la tabla notificacion
for($i=0;$i<$not;$i++)
{
	$id_not = $mat_not[$i][0]; 
	$id_c = $mat_not[$i][1];	 
	$fecha = $mat_not[$i][2];
	$remitente = $mat_not[$i][3];
	$tipo = $mat_not[$i][4];
	$asunto = $mat_not[$i][5];
	$mensaje = $mat_not[$i][6];

	$sql="INSERT INTO notificacion 	
(id_not,id_c,fecha,remitente,tipo,asunto,mensaje) VALUES (NULL,'$id_c','$fecha','$remitente','$tipo','$asunto','$mensaje')";
	$res = mysql_query($sql);
}

//Insertamos los registros en la tabla rut	
for($i=0;$i<$ru;$i++)
{
	$id_rut = $mat_r[$i][0]; 
	$rut = $mat_r[$i][1];	 
	$id_unidad = $mat_r[$i][2];

	$sql = "INSERT INTO rut (id_rut,rut,id_unidad) VALUES (NULL,'$rut','$id_unidad')";
	$res = mysql_query($sql);
}

//Insertamos los registros en la tabla reportes
for($i=0;$i<$rep;$i++)
{
	$id_r = $mat_re[$i][0]; 
	$rut = $mat_re[$i][1];	 
	$fecha_sol = $mat_re[$i][2];
	$responsable = $mat_re[$i][3];
	$ip = $mat_re[$i][4];
	$id_uni = $mat_re[$i][5];

	$sql="INSERT INTO reportes (id_r,rut,fecha_sol,responsable,ip,id_uni) VALUES (NULL,'$rut','$fecha_sol','$responsable','$ip','$id_uni')";
	$res = mysql_query($sql);
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
                       </div>
                    </td></tr>
              </table></td>
              <td width="150" bgcolor="#8fb1d2" class="Estilo77">&nbsp;</td>
            </tr>
        </table></td>
        </tr>
    </table>
    </td>
  </tr>
  <tr>
    <td height="22" colspan="2"><table width="1000" height="20" border="0" cellpadding="0" cellspacing="0">
      <tr> </tr>
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