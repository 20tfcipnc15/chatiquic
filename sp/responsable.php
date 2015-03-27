<?
session_start();
if (!isset($_SESSION['super usuario']))
{ 
	header ("Location: index.php"); 
	exit; 
} 
$id_unidad = $_SESSION['id_unidad']; 
$nombre = $_SESSION['nombre_ini']; 
$unidad = $_SESSION['unidad_ini']; 
$id_user = $_SESSION['id_user'];

$sql = "SELECT nombre FROM user WHERE id_unidad = '$id_unidad_ini'";
$resp = mysql_query($sql);
$filas = mysql_num_rows($resp);
if($filas!=0)
{ 	
	$a=0;
    while($linea1=mysql_fetch_array($resp))
	{  	
		$nombre = $linea1['nombre'];
		$vec[$a]=$nombre;
		$a++;
	}
}
$cad='';
for ($b=0; $b < $a; $b++)
{	
	$nom = $vec[$b];
	$cad = $cad." and destino != '".$nom."'";
}

$sql = "SELECT distinct(rut) FROM correspondencia order by id_c DESC";
$res = mysql_query($sql) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
$num = mysql_num_rows($res); 
if ($num > 0) 					
{	
	while($fila = mysql_fetch_array($res))
	{
		$rut = $fila['rut'];
			
		//OBTENEMOS TODOS LOS CAMPOS DEL REGISTRO PARA DESPLEGARLOS POR PANATALLA
		$consulta ="SELECT * FROM correspondencia WHERE rut like '%$rut%' order by id_c DESC limit 1";
		$resultado=mysql_query($consulta) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
		while($linea=mysql_fetch_array($resultado))
		{ 
			$fecha=$linea["fecha"];
			$correlativo=$linea["correlativo"];
			$unidad=$linea["unidad"];
			$referencias=$linea["referencias"];
			$hoja_ruta=$linea["hoja_ruta"];  
			$tipo=$linea["tipo"];
			$rut=$linea["rut"];
			$fojas=$linea["fojas"];
			$destino=$linea["destino"];
			
			if($destino == $responsable)
			{
				$tt++;
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
				echo '</center></td>';
    	        echo '<td height="50" bgcolor="#E1F1FF" class="Estilo78"><center>';
				echo '<table width="140" height="50" border="0" cellpadding="0" cellspacing="2" bgcolor="#E1F1FF" class="Estilo78">
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
				<td height="50" bgcolor="#E1F1FF" class="Estilo78"><center>';
				echo $fec_actual; 
				echo '</center></td>
    	        </tr>';
			}
		}
	}
}
?>