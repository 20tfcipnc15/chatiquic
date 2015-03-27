<?
include("../funciones1.php");
$link1 = conexion();

include("../php/fecha_hora.php");
$fecha_actual = fecha_hora();

/*$sql1 = "SELECT co.rut,co.responsable,co.unidad,co.referencias,co.fecha,co.fojas,co.correlativo
FROM correspondencia co INNER JOIN unidad un INNER JOIN user us INNER JOIN  correspondencia cor
ON co.unidad = un.nombre and un.id_unidad = us.id_unidad and us.nombre = cor.destino";*/
$sql1 = "SELECT DISTINCT unidad
		 FROM correspondencia
		 ORDER BY unidad ASC ";
$res1 = mysql_query($sql1) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
$num1 = mysql_num_rows($res1);
if ($num1 > 0)
{		
	while ($linea1 = mysql_fetch_array($res1))
	{	
		$unidad = $linea1["unidad"];
		$sql7 = "SELECT id_unidad
				 FROM unidad 
				 WHERE nombre like '$unidad' and id_unidad <= 65
				 ORDER BY nombre ASC ";
		$res7 = mysql_query($sql7) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
		$num7 = mysql_num_rows($res7);
		if ($num7 > 0)
		{		
			while ($linea7 = mysql_fetch_array($res7))
			{	
				$id_unidad = $linea7["id_unidad"];			
				$sql2 = "SELECT nombre 
						 FROM user 
						 WHERE id_unidad = $id_unidad 
						 ORDER BY nombre ASC";
				$res2 = mysql_query($sql2);
				$num2 = mysql_num_rows($res2);
				if($num2!=0)
				{ 	
			    	while($linea2 = mysql_fetch_array($res2))
					{  	
						$nombre = $linea2['nombre'];
						echo '<h1>'.$nombre.'</h1>';
						$sql3 = "SELECT *
								 FROM correspondencia
								 WHERE destino like '$nombre'
								 ORDER BY id_c DESC ";
						$res3 = mysql_query($sql3) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
						$num3 = mysql_num_rows($res3);
						if ($num3 > 0)
						{	
							$i = 0;
							while ($linea3 = mysql_fetch_array($res3))
							{	
								$responsable = $linea3["responsable"];
								$correlativo = $linea3["correlativo"];
								$referencias = $linea3["referencias"];
								$unidad = $linea3["unidad"];
								$fecha = $linea3["fecha"];
								$fojas = $linea3["fojas"];
								$rut = $linea3["rut"];
								$destino = $linea3["destino"];
			echo $responsable.'   '.$correlativo.'   '.$referencias.'   '.$unidad.'    '.$fecha.'   '.$fojas.'    '.$rut.'<br>';
			//echo $destino.'   '.$rut.'<br><br>';
								$i++;
							}
							echo '<h1>TOTAL '.$i.'</h1>';
						}
					}
				}
			}
		}
	}
}
?>