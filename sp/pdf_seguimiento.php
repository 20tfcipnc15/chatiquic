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
include ('tiempo_tramite1.php');
$link=conexion();

$valor = $_GET['reg'];
$sub = '**';
$var = strpos($valor,$sub);
$rut1 = substr($valor,0,$var);
$ref = substr($valor,$var+2,strlen($valor));
?>
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
                                </tr>
<?
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

//almacenamos la fecha inicial
$fecha_inicial = $fecha1;

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
								<td width="46" bgcolor="#E1F1FF"><div align="center"><span class="Estilo78"><? echo $fojas; $i++;
								?></span></div></td>
								<td width="72" bgcolor="#E1F1FF"><div align="center"><span class="Estilo78"><? echo $destino; ?></span></div></td>
<?
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
			<td height="25" bgcolor="#E1F1FF" class="Estilo78" align="left">'; ?>
			  <table width="142" height="25" border="0" align="left" class="Estilo78">
                <tr>
                  <td><? echo  $comentario;?></td>
                </tr>
              </table>
		<?	echo'</td>
            </tr>'; 
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
                  <td colspan="2" class="Estilo77"> Fecha inicial del Trámite: <? echo $fecha_inicial;?> Fecha final del Trámite: <? echo $fecha_final;?> Tiempo Total de Duraci&oacute;n:
                    <? $total = tiempo_tramite($fecha_inicial,$fecha_final);?></td>
                  </tr>
              </table>  
<?
 			} 
	   } 
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
		echo '<td width="220" class="Estilo78" bgcolor="#E1F1FF" height="25">';$total = tiempo_tramite($rep_uni[$aa-2],$rep_uni[$aa-1]);echo '</td>';	
		echo '</tr><tr>';
	}
}
echo '</tr></table></td></tr></table>';
}
?>