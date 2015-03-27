<html>
<head>
<title>Chasqui Digital</title>
<LINK href="../javascript/estilos.css" type=text/css rel=stylesheet>
</head>
<body>
<?
$cad=$_COOKIE['cadena'];
$cadena =str_replace("*","'",$cad);

//require('conexion.php');
include("../funciones1.php");
$link = conexion();

$RegistrosAMostrar=3;

//estos valores los recibo por GET
if(isset($_GET['pag']))
{
	$RegistrosAEmpezar=($_GET['pag']-1)*$RegistrosAMostrar;
	$PagAct=$_GET['pag'];
}

else
{
	$RegistrosAEmpezar=0;
	$PagAct=1;

}
?>
     <table width="694" border="0" align="center" cellpadding="0" cellspacing="2" bgcolor="#74ABD3">
      <tr>
         <td></td>
      </tr>
      <tr>
        <td bgcolor="#B1CBE4">
            <table width="690" border="0" align="center" cellpadding="0" cellspacing="2" bordercolor="#EDF7FF">
                              <tr>
                                <td width="43" bgcolor="#4791C5"><div align="center" class="Estilo2">R.U.T.</div></td>
                                <td width="79" height="15" bgcolor="#4791C5" class="Estilo2"><div align="center">Fecha Ingreso </div></td>
                                <td width="86" bgcolor="#4791C5"><div align="center" class="Estilo2">Unidad</div></td>
                                <td width="61" bgcolor="#4791C5" class="Estilo2"><div align="center">Tipo</div></td>
                                <td width="61" bgcolor="#4791C5"><div align="center" class="Estilo2">Correlativo</div></td>
                                <td width="140" bgcolor="#4791C5"><div align="center" class="Estilo2">Referencias</div></td>
                                <td width="40" bgcolor="#4791C5" class="Estilo2"><div align="center">No Fojas </div></td>
                                <td width="90" bgcolor="#4791C5"><div align="center" class="Estilo2">Responsable</div></td>
                                <td width="70" bgcolor="#4791C5" class="Estilo2"><div align="center"> Ver Seguimiento</div></td>
                              </tr>
<?
$res = mysql_query("select distinct(referencias) from correspondencia where ".$cadena." ORDER BY id_c ASC limit $RegistrosAEmpezar, $RegistrosAMostrar");
	while($fila = mysql_fetch_array($res))
	{
            $ref = $fila['referencias'];
		//OBTENEMOS TODOS LOS CAMPOS DEL REGISTRO PARA DESPLEGARLOS POR PANATALLA
		$consulta ="SELECT * FROM correspondencia WHERE referencias like '$ref' order by id_c ASC limit 1";
		$resultado=mysql_query($consulta) or die ("Error de b&uacute;squeda en la BD: ". 	
		mysql_Error());
		$numResultados = mysql_num_rows($resultado);  				
		if($numResultados > 0)
		{
			while($linea=mysql_fetch_array($resultado))
			{ 
				$id_c=$linea["id_c"];
                                $fecha=$linea["fecha"];
				$correlativo=$linea["correlativo"];
				$unidad=$linea["unidad"];
				$referencias=$linea["referencias"];
				$responsable=$linea["responsable"];
				$hoja_ruta=$linea["hoja_ruta"];
				$tipo=$linea["tipo"];
				$rut=$linea["rut"];
				$fojas=$linea["fojas"];
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
				echo '<table width="140" height="50" border="0" cellpadding="0" cellspacing="2" bgcolor="#E1F1FF" class="Estilo78">
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
				$valor1 = $rut.'**'.$id_c;
				echo'</center></td>
				<td height="50" width="82" bgcolor="#E1F1FF" class="Estilo78"><center>';
				echo '<a href="seguimiento.php?reg='.$valor1.'">Seguimiento</a>';
				echo '</center></td>
               </tr>';
			}
		}
	}
$NroA=mysql_num_rows(mysql_query("select distinct(referencias) from correspondencia where ".$cadena));

mysql_close();
include("../funciones2.php");
$link2 = conexion2();

$res = mysql_query("select distinct(referencias) from correspondencia where ".$cadena." ORDER BY id_c ASC limit $RegistrosAEmpezar, $RegistrosAMostrar");
    while($fila=mysql_fetch_array($res))
	{
		$ref = $fila['referencias'];

		//OBTENEMOS TODOS LOS CAMPOS DEL REGISTRO PARA DESPLEGARLOS POR PANATALLA
		$consulta ="SELECT * FROM correspondencia WHERE referencias like '$ref' order by id_c ASC limit 1";
		$resultado=mysql_query($consulta) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
		$numResultados = mysql_num_rows($resultado);
		if($numResultados > 0)
		{
		   while($linea=mysql_fetch_array($resultado))
		   {
				$id_c=$linea["id_c"];
                                $fecha=$linea["fecha"];
				$correlativo=$linea["correlativo"];
				$unidad=$linea["unidad"];
				$referencias=$linea["referencias"];
				$responsable=$linea["responsable"];
				$hoja_ruta=$linea["hoja_ruta"];
				$tipo=$linea["tipo"];
				$rut=$linea["rut"];
				$fojas=$linea["fojas"];
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
				echo '<table width="140" height="50" border="0" cellpadding="0" cellspacing="2" bgcolor="#E1F1FF" class="Estilo78">
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
				$valor1 = $rut.'**'.$id_c;
				echo'</center></td>
				<td height="50" width="82" bgcolor="#E1F1FF" class="Estilo78"><center>';
				echo '<a href="seg_arch.php?reg='.$valor1.'">Seguimiento</a>';
				echo '</center></td>
                </tr>';
			}
		}
}
?>
                        </table></td>
                        </tr>
                              <tr>
                                <td height="15" colspan="10" bgcolor="#CCDDEE" class="Estilo78">&nbsp;</td>
                              </tr>
</table>
<?
$NroRegistros=mysql_num_rows(mysql_query("select distinct(referencias) from correspondencia where ".$cadena));
//$NroRegistros=$NroRegistros+$NroA;

$PagAnt=$PagAct-1;
$PagSig=$PagAct+1;
$PagUlt=$NroRegistros/$RegistrosAMostrar;

//verificamos residuo para ver si llevar� decimales
$Res=$NroRegistros%$RegistrosAMostrar;
// si hay residuo usamos funcion floor para que me
// devuelva la parte entera, SIN REDONDEAR, y le sumamos
// una unidad para obtener la ultima pagina
if($Res>0) $PagUlt=floor($PagUlt)+1;

//desplazamiento
echo "<a class='Estilo78' onclick=\"Pagina('1')\">Primero</a> ";
if($PagAct>1) echo "<a class='Estilo78' onclick=\"Pagina('$PagAnt')\">Anterior</a> ";
echo "<strong class='Estilo77'>Pagina ".$PagAct."/".$PagUlt."</strong>";

//$PagSig = $PagSig.$cadena;

if($PagAct<$PagUlt)  echo " <a class='Estilo78' onclick=\"Pagina('$PagSig')\">Siguiente</a> ";
echo "<a class='Estilo78' onclick=\"Pagina('$PagUlt')\">Ultimo</a>";
//}
?>
</body>
</html>