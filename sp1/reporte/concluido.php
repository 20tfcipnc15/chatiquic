<?
$sqla = "SELECT distinct(rut) FROM correspondencia WHERE comentario like '%concluido%' order by id_c ASC";
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
										$fecha = $vec["fecha"];
										$unidad = $vec["responsable"];
										$rreferencias = $vec["referencias"];
									}
								}
							}
						}
						//Trabajamos con la segunda Base de Datos
						$sql = "SELECT *,COUNT(rut) 
								FROM correspondencia 
								GROUP BY rut HAVING COUNT(rut) > 0
								ORDER BY fecha ASC";
?>