<SCRIPT language=JavaScript src="../javascript/funciones.js"></SCRIPT>
<?php

$consulta ="SELECT id_remitente FROM remitente where nombre='$pa_procedencia'";
$resultado=mysql_query($consulta) or die ("Error de búsqueda en la BD: ". mysql_Error());
$numResultados = mysql_num_rows($resultado);
if($numResultados>0)
{
	$linea=mysql_fetch_array($resultado,MYSQL_BOTH)
	$pa_id_remitente=$linea["id_remitente"]; 
}
else
{
?>

<?php 

}
?>