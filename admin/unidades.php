<?
session_start();
	//Codigo tiempo de sesion 
	$fechaGuardada = $_SESSION['ultimoAcceso'];
	$ahora = date("Y-n-j H:i:s");
	$tiempo_transcurrido = (strtotime($ahora) - strtotime($fechaGuardada));

	if($tiempo_transcurrido >= 600){
		//si pasaronn 5 min o mas
		session_name("sesiondirh"); 
		session_unset(); 
		session_destroy(); 
		header ("Location: index.php"); 
	}
	else{
		$_SESSION['ultimoAcceso'] = $ahora;
	}

	if (!isset($_SESSION['paso_por_donde_yo_quiero']))
	{ 
		header ("Location: index.php"); 
		exit; 
	}
$id_user=$_SESSION['id_user'];
$nombre=$_SESSION['nombre_ini']; 
$unidad=$_SESSION['unidad_ini']; 
$id_unidad=$_SESSION['id_unidad'];  
?>
<html>
<head>
<title>Chasqui Digital</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<LINK href="../javascript/estilos.css" type=text/css rel=stylesheet>
<LINK href="../javascript/estilo_noticias.css" type=text/css rel=stylesheet>
<SCRIPT language=JavaScript src="../javascript/fecha-hora_bc.js"></SCRIPT>
<SCRIPT language=javascript src="../javascript/barra_de_estado.js"></SCRIPT>
<SCRIPT language=JavaScript src="../javascript/funciones.js"></SCRIPT>
<script type="text/javascript">
function valores(f, cual) 
{
 todos = new Array();
 for (var i = 0, total = f[cual].length; i < total; i++)
 {
   if (f[cual][i].checked) 
   {   
   	    todos[todos.length] = f[cual][i].value;
	    var arv = todos.toString();
   }
 }
 var formulario_destino = 'reg_despacho'
 var campo_destino = 'copias'
 eval ("opener.document." + formulario_destino + "." + campo_destino + ".value='" + arv + "'")
 window.close()
}
</script>
<SCRIPT language=JavaScript src="javascript/funciones.js"></SCRIPT>
</head>
<body bottommargin="0" leftmargin="0" rightmargin="0" topmargin="0" bgcolor="#EDF7FF" onload=escrolea()>
<form>
<br>
<div align="center">
<button class="Estilo59" style="width:90px;background-color:#4791C5;border:0px;margin:1px;padding:0px; font-weight: bold;" onClick="valores(this.form, 't[]')">Aceptar</button>
</div>
<p>
<table width="400" border="0" cellpadding="0" cellspacing="2" bgcolor="#B1CBE4">
<? 
include("../funciones1.php");
$link=conexion();
$cont=0;
$sql="SELECT nombre FROM unidad WHERE id_unidad < 65 ORDER by nombre ASC"; 
$res=mysql_query($sql); 
while ($row=mysql_fetch_array($res))
{
	$cont++;
	echo '<td bgcolor="#CCDDEE" width="200" height ="4" class="Estilo64">';
	echo '<input type="checkbox" name="t[]" value="'.$row["nombre"].'"> '.$row["nombre"]; 
	echo '</td>';
	if($cont % 2==0)
	{	echo '</tr><tr>';
	}
}
?> 
</table>
<div align="center">
<button class="Estilo59" style="width:90px;background-color:#4791C5;border:0px;margin:1px;padding:0px; font-weight: bold;" onClick="valores(this.form, 't[]')">Aceptar</button>
</div>
</p>
</body>
</html>