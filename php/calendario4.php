<html>
<head>
<title>Calendario</title>
<?
$anioInicial = '2000';
$anioFinal = '2020';
$funcionTratarFecha = 'document.location = "?dia="+dia+"&mes="+mes+"&anio="+anio;';
?>
<script>
	function tratarFecha(dia,mes,anio)
	{
	<?=$funcionTratarFecha?>
	}
</script>
<style>
.m1 {
   font-family:MS Sans Serif;
   font-size:8pt
}
a {
   text-decoration:none;
   color:#000000;
}
</style>
<script language="javascript" type="text/javascript">
window.resizeTo(182,235)
</script>
</head>
<body  bgcolor="#EDF7FF">
<form>
<table border="0" cellpadding="5" cellspacing="0" bgcolor="#8fb1d2">
  <tr>
    <td width="100%">
	<?
	$fecha = getdate(time());
	if(isset($_GET["dia"]))$dia = $_GET["dia"];
	else $dia = $fecha['mday'];
	if(isset($_GET["mes"]))$mes = $_GET["mes"];
	else $mes = $fecha['mon'];
	if(isset($_GET["anio"]))$anio = $_GET["anio"];
	else $anio = $fecha['year'];
	$fecha = mktime(0,0,0,$mes,$dia,$anio);
	$fechaInicioMes = mktime(0,0,0,$mes,1,$anio);
	$fechaInicioMes = date("w",$fechaInicioMes);
	?>
    <select size="1" name="mes" class="m1" onChange="document.location = '?dia=<?=$dia?>&mes=' + document.forms[0].mes.value + '&anio=<?=$anio?>';">
<?
$meses = Array ('enero','febrero','marzo','abril','mayo','junio','julio','agosto','septiembre','octubre','noviembre','diciembre');
for($i = 1; $i <= 12; $i++){
  echo '      <option ';
  if($mes == $i)echo 'selected ';
  echo 'value="'.$i.'">'.$meses[$i-1]."\n";
}
?>
    </select>&nbsp;&nbsp;&nbsp;
	<select size="1" name="anio" class="m1" onChange="document.location = '?dia=<?=$dia?>&mes=<?=$mes?>&anio=' + document.forms[0].anio.value;">
	<?
	for ($i = $anioInicial; $i <= $anioFinal; $i++)
	{
	  echo '      <option ';
	  if($anio == $i)echo 'selected ';
		  echo 'value="'.$i.'">'.$i."\n";
	}
	?>
    </select><br>
    <font size="1">&nbsp;</font>
	<table border="0" cellpadding="2" cellspacing="0" width="100%" class="m1" background="../img/fondo_cuerpo.gif" height="100%">
<?
$diasSem = Array ('L','M','M','J','V','S','D');
$ultimoDia = date('t',$fecha);
$numMes = 0;
for ($fila = 0; $fila < 7; $fila++)
{
  echo "      <tr>\n";
  for ($coln = 0; $coln < 7; $coln++)
  {
    $posicion = Array (1,2,3,4,5,6,0);
    echo '        <td width="14%" height="19"';
    if($fila == 0)echo ' bgcolor="#4791C5"';
    if($dia-1 == $numMes)echo ' bgcolor="#4791C5"';
    echo " align=\"center\">\n";
    echo '        ';
    if($fila == 0)echo '<font color="#ffffff">'.$diasSem[$coln];
    elseif(($numMes && $numMes < $ultimoDia) || (!$numMes && $posicion[$coln] == $fechaInicioMes))
	{
      echo '<a href="#" onclick="tratarFecha('.(++$numMes).','.$mes.','.$anio.')">';
      if($dia == $numMes)echo '<font color="#FFFFFF">';
      echo ($numMes).'</a>';
    }
    echo "</td>\n";
  }
  echo "      </tr>\n";
}
//Damos un formato más comprensible al usuario
  include ("funciones.php"); 
  $fecha=formato($dia,$mes,$anio); 
?>
    </table>
    </td>
  </tr>
</table>
</form>
	<script>
		var formulario_destino = 'reporte'
		var campo_destino = 'fecha'
		var fecha='<?echo $fecha?>'
		eval ("opener.document." + formulario_destino + "." + campo_destino + ".value='" + fecha + "'")
//		window.close()
	</script>
</body>
</html>