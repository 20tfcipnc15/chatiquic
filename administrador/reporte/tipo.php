<?
	$sql = "SELECT DISTINCT (tipo), COUNT( tipo ) 
								FROM correspondencia
								WHERE unidad LIKE 'Decanato' AND tipo != ''
								GROUP BY tipo
								HAVING COUNT( tipo ) >0
								ORDER BY tipo ASC";
?>