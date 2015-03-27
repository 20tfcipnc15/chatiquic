<?
include("../funciones1.php");
$link2 = conexion();
$uno=1;
$dos=2;

$sql = "SELECT distinct(unidad),COUNT(unidad) as total
FROM correspondencia
WHERE destino like 'Decanato'
GROUP BY unidad
HAVING COUNT(unidad)>0
ORDER BY unidad ASC ";
$res = mysql_query($sql) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
$num = mysql_num_rows($res);
if($num > 0)
{	
	while ($vec = mysql_fetch_array($res))
	{	
		echo $unidad = $vec["unidad"];
		echo '<br>';
		echo $uni = $vec["total"];
		echo '<br>';
	}
}

//href="seguimiento.php?reg='.$rut.'"
//header ("location: reporte/rep.php?var=".$uno);
/*$cad = '123456789 123456789 123456789'; 
$var = strlen($cad);
echo 'aaaaaaa '.$cad = substr($cad,5,$var);*/

/*$sqla = "SELECT *,distinct(rut) 
FROM correspondencia WHERE comentario like '%concluido%' order by id_c ASC";
$resa = mysql_query($sqla) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
$numa = mysql_num_rows($resa);
if ($numa > 0)
{		
	while ($linea = mysql_fetch_array($resa))
	{	
								$rut = $linea["rut"];	
								$sql = "SELECT * FROM correspondencia WHERE rut like '$rut' 
								ORDER BY id_c DESC limit 1";
								$res = mysql_query($sql) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
								$num = mysql_num_rows($res);
								if($num > 0)
								{	
									$vec = mysql_fetch_array($res);
									echo $comentario = $vec["comentario"];
									$sub = ':';
									$var = strpos($comentario,$sub);
									$estado = substr($comentario,0,$var);
									if($estado == 'Concluido')
									{	$rut = $vec["rut"];
										echo '<br>'.$rut;
									}
								}
							}
						}*/
?>