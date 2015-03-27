<?php
session_start();
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
$link=conexion();
$rut = $_GET['reg'];
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
<table style="position:absolute; left:110px; height: 419px;" width="1000" border="0" align="center" cellspacing="0">
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
              <td width="133"><table style="position:absolute; top:171px; left:4px; width: 129px; height: 137px;"width="132" height="240" border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td width="132" height="92"><script src="menu_admin.js"></script></td>
                </tr>
              </table></td>
              <td width="717" bgcolor="#EDF7FF"><table width="711" height="246" border="2" align="center" cellpadding="0" cellspacing="0" bordercolor="#8fb1d2">
                <tr>
                  <td width="705" background="../img/fondo_cuerpo.gif"><p align="left" class="Estilo77">&nbsp;&nbsp;Unidad: <?php echo $unidad;?><br>
  &nbsp;&nbsp;&nbsp;&nbsp;Usuario: <? echo $nombre; ?></p>
                    <p align="center" class="Estilo77"> &nbsp;&nbsp;&nbsp;&nbsp;Se han encontrado <?php echo $numResultados;?> coincidencias.</p>
                    <table width="700" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td width="29" height="21" background="../img/encabezado_tabla_01.gif">&nbsp;</td>
                        <td width="642" background="../img/encabezado_tabla_02.gif"><div align="center" class="Estilo59">DATOS GENERALES DEL TR&Aacute;MITE </div></td>
                        <td width="29" background="../img/encabezado_tabla_04.gif">&nbsp;</td>
                      </tr>
                      <tr>
                        <td height="2" colspan="3"></td>
                      </tr>
                    </table>
                    <table width="700" border="0" align="center" cellpadding="0" cellspacing="2" bgcolor="#74ABD3">
                      <tr>
                        <td></td>
                      </tr>
                      <tr>
                        <td bgcolor="#B1CBE4"><table width="696" border="0" align="center" cellpadding="0" cellspacing="2" bordercolor="#EDF7FF">
                            <tr>
                              <td width="38" height="15" bgcolor="#4791C5" class="Estilo2"><div align="center">R.U.T.</div></td>
                              <td width="73" height="15" bgcolor="#4791C5" class="Estilo2"><div align="center">Fecha Ingreso </div></td>
                              <td width="79" bgcolor="#4791C5"><div align="center" class="Estilo2">Correlativo</div></td>
							  <td width="79" bgcolor="#4791C5"><div align="center" class="Estilo2">Procedencia</div></td>
                              <td width="94" bgcolor="#4791C5"><div align="center" class="Estilo2">Tipo de Tr&aacute;mite </div></td>
                              <td width="141" bgcolor="#4791C5"><div align="center" class="Estilo2">Referencias</div></td>
                              <td width="70" bgcolor="#4791C5"><div align="center" class="Estilo2">Seguimiento</div></td>
                              <td width="61" bgcolor="#4791C5"><div align="center" class="Estilo2">Despachar</div></td>
                            </tr>
                            <?
$sw=0;

$consulta ="SELECT distinct(rut) FROM correspondencia WHERE destino like '%$unidad%'ORDER BY id_c ASC";
$resultado=mysql_query($consulta) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
$numResultados = mysql_num_rows($resultado);
if ($numResultados > 0)
{	
	$i=0;
	while($linea=mysql_fetch_array($resultado))
	{	
		$rut=$linea["rut"]; 
		$i++;
		$sql = "SELECT * FROM correspondencia WHERE rut like '%$rut%' and unidad like '%$unidad%'  and id_c > 696 
		order by id_c DESC limit 1";
		$res = mysql_query($sql) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
		$num = mysql_num_rows($res);
		if($num > 0)
		{	
			$vec = mysql_fetch_array($res);
			$destino = $vec["destino"];
			if($destino == $nombre)
			{	
				$id_c=$vec["id_c"];
				$rut=$vec["rut"]; 
				$responsable=$vec["responsable"];
				$procedencia=$vec["unidad"];
				$fecha=$vec["fecha"];
				$tipo=$vec["tipo"];
				$referencias=$vec["referencias"];
				$destino=$vec["destino"];
				$correlativo =$vec["correlativo"];
				echo '
                <tr>
                <td height="50" bgcolor="#E1F1FF" class="Estilo78"><center>'; 
				echo $rut;
				echo '</center></td>
                <td height="50" bgcolor="#E1F1FF" class="Estilo78"><center>'; 
				echo $fecha; 
				echo '</center></td>
				<td height="50" bgcolor="#E1F1FF" class="Estilo78"><center>'; 
				echo $correlativo; 
				echo '</center></td>
                <td height="50" bgcolor="#E1F1FF" class="Estilo78"><center>';
//				echo $responsable;
				echo $procedencia;
				echo '</center></td>
                <td height="50" bgcolor="#E1F1FF" class="Estilo78"><center>';
				echo $tipo;
				echo '</center></td>
                <td height="50" bgcolor="#E1F1FF" class="Estilo78"><center>';
				echo $referencias;
				echo'</center></td>
				<td height="50" bgcolor="#E1F1FF" class="Estilo78"><center>';
				echo '<a href="seguimiento.php?reg='.$rut.'">Seguimiento</a>';
				echo'</center></td>
				<td height="50" bgcolor="#E1F1FF" class="Estilo78"><center>';
				echo '<a href="despacho_mens.php?id='.$id_c.'">Despachar</a>';
				echo'</center></td>
                </tr>';
			}//fin destino=nombre
			else
				$sw=1;
		 }
		else
			$sw=1;
			
		if($sw==1)
		{	
		 $sql = "SELECT * FROM correspondencia WHERE rut like '%$rut%'  and id_c > 696 order by id_c DESC limit 1";
			$res = mysql_query($sql) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
			$num = mysql_num_rows($res);
			if($num > 0)
			{	
				$vec = mysql_fetch_array($res);
				$destino = $vec["destino"];
				if($destino == $unidad)
				{	
					$id_c=$vec["id_c"];
					$rut=$vec["rut"]; 
					$responsable=$vec["responsable"];
					$fecha=$vec["fecha"];
					$correlativo = $vec["correlativo"];
					$tipo=$vec["tipo"];
					$referencias=$vec["referencias"];
					$destino=$vec["destino"];
					$procedencia=$vec["unidad"];
					echo '
    	            <tr>
        	        <td height="50" bgcolor="#E1F1FF" class="Estilo78"><center>'; 
					echo $rut;
					echo '</center></td>
	                <td height="50" bgcolor="#E1F1FF" class="Estilo78"><center>'; 
					echo $fecha; 
					echo '</center></td>
					<td height="50" bgcolor="#E1F1FF" class="Estilo78"><center>'; 
					echo $correlativo; 
					echo '</center></td>
            	    <td height="50" bgcolor="#E1F1FF" class="Estilo78"><center>';
//					echo $responsable;
					echo $procedencia;
					echo '</center></td>
    	            <td height="50" bgcolor="#E1F1FF" class="Estilo78"><center>';
					echo $tipo;
					echo '</center></td>
                	<td height="50" bgcolor="#E1F1FF" class="Estilo78"><center>';
					?> 
					<table width="200" border="0">
 					 <tr>
					    <td class="Estilo78"><? echo $referencias;?></td>
					  </tr>
					</table>
					<? echo'</center></td>
					<td height="50" bgcolor="#E1F1FF" class="Estilo78"><center>';
					echo '<a href="seguimiento.php?reg='.$rut.'">Seguimiento</a>';
					echo'</center></td>
					<td height="50" bgcolor="#E1F1FF" class="Estilo78"><center>';
					echo '<a href="despacho_mens.php?id='.$id_c.'">Despachar</a>';
					echo'</center></td>
            	    </tr>';
				}//FIN $destino == $unidad
			}// FIN num > 0
		 }// FIN else
	  }//fin num > 0
}// fin numresultados
?>
                            <tr>
                              <td height="7" colspan="15" bgcolor="#CCDDEE" class="Estilo78"></td>
                            </tr>
                            <tr>
                              <td height="15" colspan="15" class="Estilo78">&nbsp;</td>
                            </tr>
                        </table></td>
                      </tr>
                      <tr>
                        <td height="1" bgcolor="#74ABD3"></td>
                      </tr>
                    </table>
                    </td>
                </tr>
              </table></td>
              <td width="150" bgcolor="#8fb1d2" class="Estilo77">&nbsp;</td>
            </tr>
        </table></td>
        </tr>
    </table>
    </td>
  </tr>
  <tr>
    <td height="20" colspan="2"><table width="1000" height="20" border="0" cellpadding="0" cellspacing="0">
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