<?php
 
include("../funciones1.php");
include("../php/funciones.php");
include ('tiempo_tramite1.php');
include("../php/fe_ra.php");

$link=conexion();
?>
<html>
<head>
<title>Chasqui Digital</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<LINK href="../javascript/estilos.css" type=text/css rel=stylesheet>
<LINK href="../javascript/estilo_noticias.css" type=text/css rel=stylesheet>
<SCRIPT language=JavaScript src="../javascript/fecha-hora_bc.js"></SCRIPT>
<SCRIPT language=javascript src="../javascript/barra_de_estado.js"></SCRIPT>
<script language=JavaScript src="../javascript/generador_noticias.js"></script>
<SCRIPT language=JavaScript src="../fecha-hora_bc.js"></SCRIPT>
<script type="text/javascript" src="../Sothink DHTML Menu/Resource/js/stmenu.js"></script>
</head>
<body bottommargin="0" leftmargin="0" rightmargin="0" topmargin="0" bgcolor="#EDF7FF" onload=escrolea() oncontextmenu="return false">
<?

$sw = 0;

$sql ="SELECT rut FROM correspondencia WHERE unidad = 'decanato' and  ='$ref' ORDER BY id_c ASC";
$res = mysql_query($sql) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
$filas = mysql_num_rows($res);
$vec = mysql_fetch_array($res);
		


$i=0;

$sql ="SELECT * FROM correspondencia WHERE rut like '$rut1' and referencias like '$referencias1' ORDER BY id_c ASC";
$res = mysql_query($sql) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
$filas = mysql_num_rows($res);
$vec = mysql_fetch_array($res);

$unidad = $vec["unidad"];
$destino = $vec["destino"];
$id_c1=$vec["id_c"];
$rut=$vec["rut"]; 
$hoja_ruta=$vec["hoja_ruta"];
$correlativo=$vec["correlativo"];
$responsable=$vec["responsable"];
$fecha1=$vec["fecha"];
$tipo=$vec["tipo"];
$referencias=$vec["referencias"];
$fojas=$vec["fojas"];

//almacenamos la fecha inicial
$fecha_inicial = $fecha1;
//para el procesado, fecha del tramite pasado a datetime de string el fecha_ho(), convierte elmes de ago o sep o eso a numero pero en string para despues para pasar de string a integer mas facil

$mess=substr($fecha1, 3, 3);
//$dia=(int)(substr($fecha1, 0, 2));
$mes=(int)(fecha_ho($mess));
$gest=(int)(substr($fecha1, 7, 4));

//un string cualquiera a datetime pa comparar,fecha desde la cual se aplico el camino
$mela="19 AGO 2014 - 09:26:25";
//$dia1=(int)(substr($mela, 0, 2));
$mes1=8;
$gest1=(int)(substr($mela, 7, 4));
////////////
?>

</body>
</html>