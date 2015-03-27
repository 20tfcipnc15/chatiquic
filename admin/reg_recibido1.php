<?
	// Insertamos en recibida ssi es un despacho externo
	$id_c = $_GET['id_c'];	
	
	//obtenemos el id_unidad de unidad, para insertarlo en recibida
	$sql1="SELECT id_unidad FROM unidad WHERE nombre like '%$destino%'";
	$result1 = mysql_query($sql1,$link);
	$linea=mysql_fetch_array($result1);
	$id_unidad=$linea["id_unidad"]; 
	
	//obtenemos el registro interno correspondiente a la unidad.
	$consulta ="SELECT reg_int FROM recibido WHERE id_unidad = $id_unidad order by id_re DESC limit 1";
	$resultado=mysql_query($consulta) or die ("Error de búsqueda en la BD: ". mysql_Error());
	$numResultados = mysql_num_rows($resultado);
	if ($numResultados>0)
	{
		$linea=mysql_fetch_array($resultado);
		$reg_int = $linea["reg_int"];	
		$reg_int = $reg_int + 1;
	}
	else
		$reg_int = 1;
	
	//Insertamos en la tabla recibido, habienod obtenido los datos necesarios
	$sql="INSERT INTO recibido(id_re,id_unidad,reg_int,id_c,recibido_por,ip,fecha) VALUES 	
		  (NULL,'$id_unidad','$reg_int','$id_c','0','0','0')";
	$result = mysql_query($sql,$link);
?>