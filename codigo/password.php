<?php
include("../funciones.php");
$link=conexion();
  
$query="SELECT id_remitente FROM remitente";
$resultado=mysql_query($query) or die ("Error de búsqueda en la BD: ". mysql_Error());
$numResultados = mysql_num_rows($resultado);
if($numResultados>0)
{
	while($linea=mysql_fetch_array($resultado,MYSQL_BOTH))
	{
    	$id=$linea["id_remitente"];
		echo '<br>ident   '.$id;
		$query1="UPDATE remitente SET cod_rem= '$cod' WHERE id_remitente = '$id'";
		$res=mysql_query($query1) or die ("Error de búsqueda en la BD: ". mysql_Error());
	}
}
/*$codificado = base64_encode("DAF");
echo 'cod......'.$codificado;

$sub_cadena1 = substr($codificado, 0,1); 
$sub_cadena2 = substr($codificado, 1,2); 
echo '<br><br>numerito....'.$sub_cadena1;
echo '<br><br>numerito 22222....'.$sub_cadena2;

mt_srand (time());
$numero_aleatorio1 = mt_rand(0,90); 
$numero_aleatorio2 = mt_rand(0,90); 
echo '<br><br>numerito....'.$numero_aleatorio1;
echo '<br><br>numerito....'.$numero_aleatorio2;
$codigo=$sub_cadena1.$numero_aleatorio1.$sub_cadena2.$numero_aleatorio2;
echo '<br><br>codigruitoito 7-1....'.$codigo;
$j2ho = mt_rand(0,10000000);
echo '<br><br>prueba d 7-1..../'.$j2ho;*/
?>
