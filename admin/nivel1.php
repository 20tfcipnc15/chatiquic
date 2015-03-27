<?php
include("../funciones1.php");
include("../php/funciones.php");
$link=conexion();

$hi=$_POST['mac'];
$result=mysql_query("select * from tramites where id_macro='$hi' order by tipo ASC",$link);

if ($row = mysql_fetch_array($result))
{ 
echo '<select  name="tramix" id="tramix" style="width:248px" class="Estilo64" onchange="obs(this.value)">';
echo '<option selected></option>';
	do { 
	
		$long=strlen($row["tipo"]);
   	    echo '<option value= "'.$row["id_t"].'">'.$row["tipo"].'</option>';
		}
		while ($row = mysql_fetch_array($result));
		
	echo '</select>';
}
?>

	
	