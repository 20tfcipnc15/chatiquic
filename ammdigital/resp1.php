<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Encuesta Digital</title>
<SCRIPT language=javascript src="../javascript/barra_de_estado.js"></SCRIPT>
<style type="text/css"> 
.thumbnail{ position: relative; z-index: 0; } .thumbnail:hover{ background-color: transparent; z-index: 50; } .thumbnail span{ /*Estilos del borde y texto*/ position: absolute; background-color: white; padding: 5px; left: -100px; border: 1px dashed gray; visibility: hidden; color: #FFFF00; text-decoration: none; } .thumbnail span img{ /*CSS for enlarged image*/ border-width: 0; padding: 2px; } .thumbnail:hover span{ /*CSS for enlarged image on hover*/ visibility: visible; top: 0; left: 10px; /*position where enlarged image should offset horizontally */ } 
 
 
 
.Estilo6 {color: #000000}
.Estilo7 {color: #000000}
body {
	background-color: #993300;
}
.Estilo8 {color: #FFFFFF; }
.Estilo12 {color: #FFFFFF; font-weight: bold; font-style: italic; }
</style>
<SCRIPT language=javascript src="../javascript/funciones.js"></SCRIPT>
</head>
 
<body>
<p><a class="thumbnail" href="#thumb"><span>exto si se dese</span></a>
  <?

//include ("php/fecha_hora.php");
//$fecha = fecha_hora();

include("conect.php");
$link = conexion();

$nom_enc = $_POST['nom_enc'];
$edad = $_POST['edad'];
$sexo = $_POST['sexo'];
$pelicula = $_POST['pelicula'];
$otros = $_POST['otros'];
$factores= $_POST['factores'];
$ext = $_POST['ext'];
$nac = $_POST['nac'];
$prefiere = $_POST['prefiere'];
$directores = $_POST['directores'];
$porque = $_POST['porque'];
$ip = $_SERVER['REMOTE_ADDR']; 

/*
$vec[1] = $_POST['a'];
$b = $_POST['b'];
$c = $_POST['c'];
$d = $_POST['d'];
$e = $_POST['e'];
$f = $_POST['f'];
$g = $_POST['g'];
$h = $_POST['h'];
$i = $_POST['i'];
$j = $_POST['j'];
$k = $_POST['k'];
$l = $_POST['l'];
$m = $_POST['m'];
$n = $_POST['n'];
$o = $_POST['o'];
$p = $_POST['p'];
$r = $_POST['r'];
$s = $_POST['s'];
$t = $_POST['t'];
$u = $_POST['u'];
$v = $_POST['v'];
$w = $_POST['w'];
$x = $_POST['x'];
$y = $_POST['y'];
$z = $_POST['z'];
$aa = $_POST['aa'];
$ab = $_POST['ab'];
$ac = $_POST['ac'];
$ad = $_POST['ad'];
$ae = $_POST['ae'];
$af = $_POST['af'];
$ag = $_POST['ag'];
$ah = $_POST['ah'];
$ai = $_POST['ai'];
$aj = $_POST['aj'];
$ak = $_POST['ak'];
$al = $_POST['al'];
$am = $_POST['am'];
$an = $_POST['an'];
$ao = $_POST['ao'];
$ap = $_POST['ap'];
$ar = $_POST['ar'];
$as = $_POST['as'];
$at = $_POST['at'];
$au = $_POST['au'];
$av = $_POST['av'];
$aw = $_POST['aw'];
$ax = $_POST['ax'];
$ay = $_POST['ay'];
$az = $_POST['az'];
$ba = $_POST['ba'];
$bb = $_POST['bb'];
$bc = $_POST['bc'];
$bd = $_POST['bd'];
$be = $_POST['be'];
$bf = $_POST['bf'];
$bg = $_POST['bg'];
$bh = $_POST['bh'];
$bi = $_POST['bi'];
$bj = $_POST['bj'];
$bk = $_POST['bk'];
$bl = $_POST['bl'];
$bm = $_POST['bm'];
$bn = $_POST['bn'];
$bo = $_POST['bo'];
$bp = $_POST['bp'];
$br = $_POST['br'];
$bs = $_POST['bs'];
$bt = $_POST['bt'];
$bu = $_POST['bu'];
$bv = $_POST['bv'];
$bw = $_POST['bw'];
$bx = $_POST['bx'];
$by = $_POST['by'];
$bz = $_POST['bz'];
$ca = $_POST['ca'];
$cb = $_POST['cb'];


$vec[1] = $_POST['a'];
$vec[2] = $_POST['b'];
$vec[3] = $_POST['c'];
$vec[4] = $_POST['d'];
$vec[5] = $_POST['e'];
$vec[6] = $_POST['f'];
$vec[7] = $_POST['g'];
$vec[8] = $_POST['h'];
$vec[9] = $_POST['i'];
$vec[10] = $_POST['j'];
$vec[11] = $_POST['k'];
$vec[12] = $_POST['l'];
$vec[13] = $_POST['m'];
$vec[14] = $_POST['n'];
$vec[15] = $_POST['o'];
$vec[16] = $_POST['p'];
$r = $_POST['r'];
$s = $_POST['s'];
$t = $_POST['t'];
$u = $_POST['u'];
$v = $_POST['v'];
$w = $_POST['w'];
$x = $_POST['x'];
$y = $_POST['y'];
$z = $_POST['z'];
$aa = $_POST['aa'];
$ab = $_POST['ab'];
$ac = $_POST['ac'];
$ad = $_POST['ad'];
$ae = $_POST['ae'];
$af = $_POST['af'];
$ag = $_POST['ag'];
$ah = $_POST['ah'];
$ai = $_POST['ai'];
$aj = $_POST['aj'];
$ak = $_POST['ak'];
$al = $_POST['al'];
$am = $_POST['am'];
$an = $_POST['an'];
$ao = $_POST['ao'];
$ap = $_POST['ap'];
$ar = $_POST['ar'];
$as = $_POST['as'];
$at = $_POST['at'];
$au = $_POST['au'];
$av = $_POST['av'];
$aw = $_POST['aw'];
$ax = $_POST['ax'];
$ay = $_POST['ay'];
$az = $_POST['az'];
$ba = $_POST['ba'];
$bb = $_POST['bb'];
$bc = $_POST['bc'];
$bd = $_POST['bd'];
$be = $_POST['be'];
$bf = $_POST['bf'];
$bg = $_POST['bg'];
$bh = $_POST['bh'];
$bi = $_POST['bi'];
$bj = $_POST['bj'];
$bk = $_POST['bk'];
$bl = $_POST['bl'];
$bm = $_POST['bm'];
$bn = $_POST['bn'];
$bo = $_POST['bo'];
$bp = $_POST['bp'];
$br = $_POST['br'];
$bs = $_POST['bs'];
$bt = $_POST['bt'];
$bu = $_POST['bu'];
$bv = $_POST['bv'];
$bw = $_POST['bw'];
$bx = $_POST['bx'];
$by = $_POST['by'];
$bz = $_POST['bz'];
$ca = $_POST['ca'];
$cb = $_POST['cb'];

$peliculas = '';
$i = 0;
for($i=0;$i<=10;$i++)
{
	$valor = $vec[$i];
	if($valor != null)
	{
		$peliculas = $peliculas.'-'.$valor.'-';
	}
}

echo "ALEIDA ".$peliculas;

$vec[1] = $_POST['cd'];
$vec[2] = $_POST['ce'];
$vec[3] = $_POST['cf'];
$vec[4] = $_POST['cg'];
$vec[5] = $_POST['ch'];
$vec[6] = $_POST['ci'];
$vec[7] = $_POST['cj'];
$vec[8] = $_POST['ck'];

/*
if($cc != null)
	$cc = 'Cine Monje Campero';
if($cd != null)
	$cd = 'Cine Teatro 16 de Julio';
if($ce != null)
	$ce = 'Megacenter';
if($cf != null)
	$cf = 'Multicine';
if($cg != null)
	$cg = 'Cinemateca Boliviana';
if($ch != null)
	$ch = 'Cine Municipal 6 de Agosto';
if($ci != null)
	$ci = 'Cines Hollywood';
if($cj != null)
	$cj = 'Cine Plaza';
if($ck != null)
	$ck = 'Cines Comercio';*/
/*
$producciones = '';
$i = 0;

for($i=0;$i<=10;$i++)
{
	$valor = $vec[$i];
	if($valor != null)
	{
		switch($i)
		{
			case $i = 1 : $valor = 'Cine Monje Campero';
			case $i = 2 : $valor = 'Cine Teatro 16 de Julio';
			case $i = 3 : $valor = 'Megacenter';
			case $i = 4 : $valor = 'Multicine';
			case $i = 5 : $valor = 'Cinemateca Boliviana';
			case $i = 6 : $valor = 'Cine Municipal 6 de Agosto';
			case $i = 7 : $valor = 'Cines Hollywood';
			case $i = 8 : $valor = 'Cines Comercio';
		}
		$producciones = $producciones.'-'.$valor.'-';
	}
}

echo "ALEIDA ".$producciones;*/

//INSERTAMOS CON UN FOR LOS REGISTROS CON LAS COPIAS CORRESPONDIENTES PARA TODAS LAS UNIDADES DESTINO
//$sql = "INSERT INTO usuario (id_c,edad,sexo,prod,otros,factores,pelicula,prefiere,directores,id_u) VALUES (NULL,'$edad','$sexo','$pelicula','$otros','$factores','$ext','$nac','$prefiere','$directores','')";
//$result = mysql_query($sql,$link);

$nom_enc = strtoupper($nom_enc);

$sql = "INSERT INTO usuario (id_u,nom_enc,ip) VALUES (NULL,'$nom_enc','$ip')";
$result = mysql_query($sql,$link);


$consulta = "SELECT * FROM usuario order by id_u DESC limit 1";
$resultado= mysql_query($consulta) or die ("Error de busqueda en la BD: ". mysql_error());
$numResultados = mysql_num_rows($resultado);
while($linea=mysql_fetch_array($resultado))
{
	$id_u = $linea["id_u"]; 
	$nom_enc = $linea["nom_enc"]; 
}

$sql = "INSERT INTO cuestionario (id_c,edad,sexo,prod,otros,factores,pelicula,prefiere,directores,id_u,porque,producciones) VALUES (NULL,'$edad','$sexo','$pelicula','$otros','$factores','$pelicula','$prefiere','$directores','$id_u','$porque','')";
$result = mysql_query($sql,$link);


//obtenemos el registro interno correspondiente a la unidad.
$consulta = "SELECT * FROM cuestionario order by id_c DESC limit 1";
$resultado= mysql_query($consulta) or die ("Error de busqueda en la BD: ". mysql_Error());
$numResultados = mysql_num_rows($resultado);
if($numResultados>0)
{
	while($linea=mysql_fetch_array($resultado))
	{
		$id_c = $linea["id_c"]; 

		$edad = $linea["edad"];
		if($edad==15) 
			$edad = '15 - 25';
		elseif($edad==26) 
			$edad = '26 - 34';
		if($edad==35) 
			$edad = '35 en adelante';

		$sexo = $linea["sexo"]; 
		if($sexo=='f') 
			$sexo = 'FEMENINO';
		elseif($sexo=='m') 
			$sexo = 'MASCULINO';
		$prod = $linea["prod"]; 
		$otros = $linea["otros"]; 
		$factores = $linea["factores"]; 
		$pelicula = $linea["pelicula"]; 
		if($pelicula=='ext') 
			$pelicula = 'EXTRANJERAS';
		elseif($pelicula=='nac') 
			$pelicula = 'NACIONALES';
		$prefiere = $linea["prefiere"]; 
		$directores = $linea["directores"]; 
		$porque = $linea["porque"]; 
	}
}
?>
  <a href="index.php"></a></p>

<table width="802" height="316" border="0" align="center" cellpadding="1" cellspacing="0" bgcolor="#800040">
  <tr>
    <td width="486" height="80" bgcolor="#000033"><table width="480" border="0" cellpadding="1" cellspacing="1">
      <tr>
        <td bgcolor="#000066" class="Estilo7"><table width="480" border="0" cellpadding="1" cellspacing="1">
            <tr>
              <td bgcolor="#000066" class="Estilo7"><span class="Estilo8"><em><strong><u><strong>UNIVERSIDAD MAYOR DE SAN ANDRES</strong></u><strong><br />
                          <u>FACULTAD DE CIENCIAS ECONOMICAS Y FINANCIERAS CARRERA DE ADMINISTRACI&Oacute;N DE EMPRESAS</u></strong></strong></em></span></td>
            </tr>
          </table>
            <span class="Estilo8"><em><strong><strong></strong></strong></em></span></td>
      </tr>
    </table>
    <table width="480" border="0" cellpadding="1" cellspacing="1">
        <tr>
          <td width="72" bgcolor="#000066"><span class="Estilo12">TESISTA:</span></td>
          <td width="350" bgcolor="#000066"><span class="Estilo12">ARIEL MAMANI MANTILLA </span></td>
        </tr>
      </table></td>
    <td bgcolor="#000033"><span class="Estilo6"></span></td>
    <td width="284" bgcolor="#000033"><table width="154" height="60" border="1" align="right" cellpadding="0" cellspacing="0">
      <tr>
        <td class="Estilo6"><img src="fotos de las peliculas/80.bmp" width="160" height="90" /></td>
        <td class="Estilo6"><img src="fotos de las peliculas/81.jpg"  width="240" height="110" border="0" /></td>
      </tr>
    </table>
</td>
  </tr>
  <tr bgcolor="#FF6600">
    <td height="150" colspan="3" bgcolor="#FF6600">
	<table width="1006" height="150" border="0" cellpadding="0" cellspacing="0" background="fotos de las peliculas/91.jpg">
      <tr>
        <td bgcolor="#000000" height="158" background="fotos de las peliculas/91.jpg"><marquee>
        <table width="1066" height="150" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#000000" bgcolor="#000000">
          <tr>
            <td width="101" height="150" class="Estilo7"><img src="fotos de las peliculas/25.jpg" alt="aleida" width="150" height="150" border="0" /></td>
            <td width="101" height="150" class="Estilo7"><img src="fotos de las peliculas/55.jpg" width="150" height="150" /></td>
            <td width="101" height="150" class="Estilo7"><img src="fotos de las peliculas/16.jpg" width="150" height="150" /></td>
            <td width="101" height="150" class="Estilo7"><img src="fotos de las peliculas/7.jpg" width="150" height="150" /></td>
            <td width="101" height="150" class="Estilo7"><img src="fotos de las peliculas/49.jpg" width="150" height="150" /></td>
            <td width="101" height="150" class="Estilo7"><img src="fotos de las peliculas/15.jpg" width="150" height="150" /></td>
            <td width="101" height="150" class="Estilo7"><img src="fotos de las peliculas/12.jpg" width="150" height="150" /></td>
          </tr>
        </table>
        </marquee>
        </td>
      </tr>
    </table>

    <div align="right" class="Estilo6"></div>    </td>
  </tr>
  <tr bgcolor="#FF6600">
    <td height="45" colspan="3"><p class="Estilo6">&nbsp;</p>
      <table width="999" height="20" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td width="706"><strong><u>Cuestionario N&ordm;1 Dirigido al P&uacute;blico en General</u></strong></td>
          <td width="293"><div align="right"><em><strong><a href="index.php">Volver a la encuesta</a></strong></em></div></td>
        </tr>
      </table>
      <p class="Estilo6">&nbsp;</p>
      <p class="Estilo6"><em><strong>El presente cuestionario  tiene el objetivo de conocer aquellos factores de crecimiento empresarial en el  sector; le agradezco de antemano su atenci&oacute;n y tiempo.</strong></em></p></td>
  </tr>
  <tr bgcolor="#FF6600">
    <td colspan="2"><table width="480" height="30" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td width="153" class="Estilo6">NOMBRE (Opcional) </td>
          <td width="310" class="Estilo8" bgcolor="#000000"><span class="Estilo64">&nbsp;<? echo $nom_enc;?></span></td>
          </tr>
    </table>
    </td>
    <td><table width="270" height="30" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="149" class="Estilo7">N&uacute;mero de encuesta </td>
        <td width="75" bgcolor="#000000" class="Estilo8" align="center"><span class="Estilo8"><font color="#ffffff" style="color:#ffffff" size="18" face="Arial, Helvetica, sans-serif"> <? echo $id_u+100;?>&nbsp; 
        </font> </span></td>
      </tr>
    </table>
    </td>
  </tr>
  
  <tr bgcolor="#FF6600">
    <td colspan="3"><table width="429" border="0" cellpadding="1" cellspacing="1">
        <tr>
          <td width="154" class="Estilo6">EDAD: </td>
          <td width="268" bgcolor="#000000" class="Estilo8"><span class="Estilo64"><? echo $edad;?></span></td>
        </tr>
        <tr>
          <td class="Estilo6">SEXO: </td>
          <td bgcolor="#000000" class="Estilo8"><span class="Estilo64"><? echo $sexo;?></span></td>
        </tr>
      </table>
    <p align="justify" class="Estilo6">1.-  De las siguientes producciones &ldquo;Nacionales&rdquo; podr&iacute;a indicar, seg&uacute;n su criterio,  cu&aacute;les fueron las m&aacute;s exitosas: (MARQUE EN LAS CASILLAS)</p></td>
  </tr>
  <tr bgcolor="#FF6600">
    <td colspan="3"><p>
	<HEAD>
	<SCRIPT LANGUAGE="JavaScript"> 
function ver_ejemplo(user,ValueShow) {
var mousex = window.event.x;   
var mousey = window.event.y;  
user.style.visibility = ValueShow; 
user.style.left = mousex + 5;  
user.style.top = mousey; 
}
</script>
 
	
	<table width="800" border="1" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td height="34" bgcolor="#000000">&nbsp;</td>
        <td height="34" bgcolor="#000000">&nbsp;</td>
        <td height="34" bgcolor="#000000">&nbsp;</td>
        <td height="34" bgcolor="#000000">&nbsp;</td>
        <td height="34" bgcolor="#000000"></td>
        <td height="34" bgcolor="#000000">&nbsp;</td>
      </tr>
      <tr>
        <td height="34" bgcolor="#000000">&nbsp;</td>
        <td height="34" bgcolor="#000000">&nbsp;</td>
        <td height="34" bgcolor="#000000">&nbsp;</td>
        <td height="34" bgcolor="#000000">&nbsp;</td>
        <td height="34" bgcolor="#000000">&nbsp;</td>
        <td height="34" bgcolor="#000000">&nbsp;</td>
      </tr>
      <tr>
        <td height="34" bgcolor="#000000">&nbsp;</td>
        <td height="34" bgcolor="#000000">&nbsp;</td>
        <td height="34" bgcolor="#000000">&nbsp;</td>
        <td height="34" bgcolor="#000000">&nbsp;</td>
        <td height="34" bgcolor="#000000">&nbsp;</td>
        <td height="34" bgcolor="#000000">&nbsp;</td>
      </tr>
      <tr>
        <td height="34" bgcolor="#000000">&nbsp;</td>
        <td height="34" bgcolor="#000000">&nbsp;</td>
        <td height="34" bgcolor="#000000">&nbsp;</td>
        <td height="34" bgcolor="#000000">&nbsp;</td>
        <td height="34" bgcolor="#000000">&nbsp;</td>
        <td height="34" bgcolor="#000000">&nbsp;</td>
      </tr>
      <tr>
        <td height="34" bgcolor="#000000">&nbsp;</td>
        <td height="34" bgcolor="#000000">&nbsp;</td>
        <td height="34" bgcolor="#000000">&nbsp;</td>
        <td height="34" bgcolor="#000000">&nbsp;</td>
        <td height="34" bgcolor="#000000">&nbsp;</td>
        <td height="34" bgcolor="#000000">&nbsp;</td>
      </tr>
      <tr>
        <td height="34" bgcolor="#000000">&nbsp;</td>
        <td height="34" bgcolor="#000000">&nbsp;</td>
        <td height="34" bgcolor="#000000">&nbsp;</td>
        <td height="34" bgcolor="#000000">&nbsp;</td>
        <td height="34" bgcolor="#000000">&nbsp;</td>
        <td height="34" bgcolor="#000000">&nbsp;</td>
      </tr>
      <tr>
        <td height="34" bgcolor="#000000">&nbsp;</td>
        <td height="34" bgcolor="#000000">&nbsp;</td>
        <td height="34" bgcolor="#000000">&nbsp;</td>
        <td height="34" bgcolor="#000000">&nbsp;</td>
        <td height="34" bgcolor="#000000">&nbsp;</td>
        <td height="34" bgcolor="#000000">&nbsp;</td>
      </tr>
      <tr>
        <td height="34" bgcolor="#000000">&nbsp;</td>
        <td height="34" bgcolor="#000000">&nbsp;</td>
        <td height="34" bgcolor="#000000">&nbsp;</td>
        <td height="34" bgcolor="#000000">&nbsp;</td>
        <td height="34" bgcolor="#000000">&nbsp;</td>
        <td height="34" bgcolor="#000000">&nbsp;</td>
      </tr>
      <tr>
        <td height="34" bgcolor="#000000">&nbsp;</td>
        <td height="34" bgcolor="#000000">&nbsp;</td>
        <td height="40" bgcolor="#000000"><a class="thumbnail" href="#"><span><img src="fotos de las peliculas/1.jpg"/><br />
          </span></a></td>
        <td height="40" colspan="3" bgcolor="#000000"><table width="521">
            <tr>
              <td width="53" height="40"><span class="Estilo8">Otros:</span></td>
              <td width="456"><span class="Estilo8"><? echo $otros;?></span></td>
            </tr>
          </table>
            <a class="thumbnail" href="#thumb"><span><img src="fotos de las peliculas/28.jpg"/><br />
          </span></a><a class="thumbnail" href="#thumb"><span><img src="aquí-la-url-de-la-imagen"/><br />
            Texto si se desea poner</span></a><a class="thumbnail" href="#thumb"><span><img src="fotos de las peliculas/56.jpg"/><br />
        </span></a></td>
        </tr>
    </table>
	<p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#FF6600">
    <td colspan="3"><span class="Estilo6">2.- ¿Porque cree que fueron exitosas estas peliculas, que factores incidieron en ellas? </span>      <div align="left" class="Estilo6">
      <table width="480" height="30" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td width="26" class="Estilo7">&nbsp;</td>
          <td width="454" class="Estilo8" bgcolor="#000000"><span class="Estilo8">&nbsp;<? echo $factores;?></span></td>
        </tr>
      </table>
    </div></td>
  </tr>
  <tr bgcolor="#FF6600">
    <td colspan="3"><span class="Estilo6"></span></td>
  </tr>
  <tr bgcolor="#FF6600">
    <td colspan="3"><table width="481" border="0" cellpadding="1" cellspacing="1">
      <tr>
        <td width="232" class="Estilo6">3.- Usted prefiere más las películas:</td>
        <td width="279" bgcolor="#000000" class="Estilo8"><span class="Estilo64"><? echo $pelicula;?></span></td>
      </tr>
    </table></td>
  </tr>
  <tr bgcolor="#FF6600">
    <td colspan="3"><span class="Estilo6">¿Porqu&eacute; las prefiere? </span>      <div align="left" class="Estilo6">
      <table width="480" height="30" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td width="26" class="Estilo7">&nbsp;</td>
          <td width="454" class="Estilo8" bgcolor="#000000"><span class="Estilo64">&nbsp;<? echo $prefiere;?></span></td>
        </tr>
      </table>
    </div></td>
  </tr>
  <tr bgcolor="#FF6600">
    <td colspan="3"><span class="Estilo6">4.- &iquest;Que salas de cine frecuenta y<strong> porque</strong>? </span></td>
  </tr>
  <tr bgcolor="#FF6600">
    <td colspan="3"><table width="360" border="1" align="center" bordercolor="#FF3300">
      <tr>
        <td width="22" bordercolor="#000000" bgcolor="#000000" class="Estilo7">&nbsp;</td>
        <td width="322" colspan="3" bordercolor="#000000" bgcolor="#000000" class="Estilo7">&nbsp;</td>
      </tr>
      <tr>
        <td bordercolor="#000000" bgcolor="#000000" class="Estilo7">&nbsp;</td>
        <td colspan="3" bordercolor="#000000" bgcolor="#000000" class="Estilo8">&nbsp;</td>
      </tr>
      <tr>
        <td bordercolor="#000000" bgcolor="#000000" class="Estilo7">&nbsp;</td>
        <td colspan="3" bordercolor="#000000" bgcolor="#000000" class="Estilo8">&nbsp;</td>
      </tr>
      <tr>
        <td width="22" bordercolor="#000000" bgcolor="#000000" class="Estilo7">&nbsp;</td>
        <td colspan="3" bordercolor="#000000" bgcolor="#000000" class="Estilo8">&nbsp;</td>
      </tr>
      <tr>
        <td bordercolor="#000000" bgcolor="#000000" class="Estilo7">&nbsp;</td>
        <td colspan="3" bordercolor="#000000" bgcolor="#000000" class="Estilo8">&nbsp;</td>
      </tr>
      <tr>
        <td width="22" bordercolor="#000000" bgcolor="#000000" class="Estilo7">&nbsp;</td>
        <td colspan="3" bordercolor="#000000" bgcolor="#000000" class="Estilo8">&nbsp;</td>
      </tr>
      <tr>
        <td bordercolor="#000000" bgcolor="#000000" class="Estilo7">&nbsp;</td>
        <td colspan="3" bordercolor="#000000" bgcolor="#000000" class="Estilo8">&nbsp;</td>
      </tr>
      <tr>
        <td width="22" bordercolor="#000000" bgcolor="#000000" class="Estilo7">&nbsp;</td>
        <td colspan="3" bordercolor="#000000" bgcolor="#000000" class="Estilo8">&nbsp;</td>
      </tr>
      <tr>
        <td bordercolor="#000000" bgcolor="#000000" class="Estilo7">&nbsp;</td>
        <td colspan="3" bordercolor="#000000" bgcolor="#000000" class="Estilo8">&nbsp;</td>
      </tr>
      <tr>
        <td height="74" colspan="4" bordercolor="#000000" bgcolor="#000000" class="Estilo7"><div align="center" class="Estilo7">
          <table width="324" height="22" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td width="90"><span class="Estilo8">¿Porque?</span></td>
              <td width="157"><span class="Estilo8"><? echo $porque;?></span></td>
            </tr>
          </table>
        </div></td>
      </tr>
    </table>
    
    </td>
  </tr>
  <tr>
    <td colspan="3" bgcolor="#FF6600">
</td>
  </tr>
  <tr bgcolor="#FF6600">
    <td colspan="3"><div align="right" class="Estilo6">
      <p><em><strong>te agradesco mucho tu ayuda y tu tiempo, espero te haya gustado, gracias..</strong></em></p>
      <p><em><strong><a href="index.php">Volver a la encuesta</a>. </strong></em></p>
    </div></td>
  </tr>
</table>
</body>
</html>