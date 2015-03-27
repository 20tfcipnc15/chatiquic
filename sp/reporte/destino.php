<?
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
						$sql = "SELECT * FROM correspondencia 
								WHERE fecha like '%$fecha_solicitud%' and unidad like '$unidad_ini'".$cad." ORDER BY id_c ASC";
					
						$sql = "SELECT distinct(destino),COUNT(destino)
								FROM correspondencia
								WHERE unidad like '$unidad' ".cad."
								GROUP BY destino
								HAVING COUNT(destino)>0
								ORDER BY id_c ASC";
?>