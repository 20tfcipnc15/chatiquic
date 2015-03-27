<?php
include("../funciones1.php");
include("../php/funciones.php");
$link=conexion();
$valedor = $_POST['dice'];
if($valedor=="si")
{
?>
		<table align="right">
		<tr>
		<td height="15"><div align="right"><span class="Estilo78">Nro. de Boleta:</span></div></td>
          <td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;
		 <input name="desnrobole1" value="" type="text" style="width:248px" class="Estilo64" onKeyPress="return numeros_letras(event)"/></td>
		</tr>
<?
}
elseif($valedor=="no")
{
}
?>