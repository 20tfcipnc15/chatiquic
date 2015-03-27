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
$ip=$_SERVER['REMOTE_ADDR']; 


$a = $_POST['a'];
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



$ca = $_POST['ca'];
$cb = $_POST['cb'];
$cc = $_POST['cc'];
$cd = $_POST['cd'];
$ce = $_POST['ce'];
$cf = $_POST['cf'];
$cg = $_POST['cg'];
$ch = $_POST['ch'];
$ci = $_POST['ci'];
$cj = $_POST['cj'];
$ck = $_POST['ck'];


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
	$ck = 'Cines Comercio';


$directores = $ca.'-'.$cb.'-'.$cc.'-'.$cd.'-'.$ce.'-'.$cf.'-'.$cg.'-'.$ca.'-'.$ca.'-'.


//////////////////////////////////////////
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


$vector[1] = $_POST['a'];
$vector[2] = $_POST['b'];
$vector[3] = $_POST['c'];
$vector[4] = $_POST['d'];
$vector[5] = $_POST['e'];
$vector[6] = $_POST['f'];
$vector[7] = $_POST['g'];
$vector[8] = $_POST['h'];
$vector[9] = $_POST['i'];
$vector[10] = $_POST['j'];
$vector[11] = $_POST['k'];
$vector[12] = $_POST['l'];
$vector[13] = $_POST['m'];
$vector[14] = $_POST['n'];
$vector[15] = $_POST['o'];
$vector[16] = $_POST['p'];
$vector[17] = $_POST['q'];
$vector[18] = $_POST['r'];
$vector[19] = $_POST['s'];
$vector[20] = $_POST['t'];
$vector[21] = $_POST['u'];
$vector[22] = $_POST['v'];
$vector[23] = $_POST['w'];
$vector[24] = $_POST['x'];
$vector[25] = $_POST['y'];
$vector[26] = $_POST['z'];
$vector[27] = $_POST['aa'];
$vector[28] = $_POST['ab'];
$vector[29] = $_POST['ac'];
$vector[30] = $_POST['ad'];
$vector[31] = $_POST['ae'];
$vector[32] = $_POST['af'];
$vector[33] = $_POST['ag'];
$vector[34] = $_POST['ah'];
$vector[35] = $_POST['ai'];
$vector[36] = $_POST['aj'];
$vector[37] = $_POST['ak'];
$vector[38] = $_POST['al'];
$vector[39] = $_POST['am'];
$vector[40] = $_POST['an'];
$vector[41] = $_POST['ao'];
$vector[42] = $_POST['ap'];
$vector[43] = $_POST['aq'];
$vector[44] = $_POST['ar'];
$vector[45] = $_POST['as'];
$vector[46] = $_POST['at'];
$vector[47] = $_POST['au'];
$vector[48] = $_POST['av'];
$vector[49] = $_POST['aw'];
$vector[50] = $_POST['ax'];
$vector[51] = $_POST['ay'];
$vector[52] = $_POST['az'];
$vector[53] = $_POST['ba'];
$vector[54] = $_POST['bb'];
$vector[55] = $_POST['bc'];
$vector[56] = $_POST['bd'];
$vector[57] = $_POST['be'];
$vector[58] = $_POST['bf'];
$vector[59] = $_POST['bg'];
$vector[60] = $_POST['bh'];
$vector[61] = $_POST['bi'];
$vector[62] = $_POST['bj'];
$vector[63] = $_POST['bk'];
$vector[64] = $_POST['bl'];
$vector[65] = $_POST['bm'];
$vector[66] = $_POST['bn'];
$vector[67] = $_POST['bo'];
$vector[68] = $_POST['bp'];
$vector[69] = $_POST['bq'];
$vector[70] = $_POST['br'];
$vector[71] = $_POST['bs'];
$vector[72] = $_POST['bt'];
$vector[73] = $_POST['bu'];
$vector[74] = $_POST['bv'];
$vector[75] = $_POST['bw'];
$vector[76] = $_POST['bx'];
$vector[77] = $_POST['by'];
$vector[78] = $_POST['bz'];
$vector[79] = $_POST['ca'];
$vector[80] = $_POST['cb'];

$peliculas = '';
$i = 0;

for($i=0;$i<=80;$i++)
{
	$valor = $vector[$i];
	if($valor != '')
	{
		switch($i)
		{
			case 1 : $valor = '¿De qué Color es el Cielo? (2009)';		break;
			case 2 : $valor = 'El Refugio (2001)';	break;
			case 3 : $valor = 'Los Abandonados (2007)';break;
			case 4 : $valor = 'Airampo (2008)';break;
			case 5 : $valor = 'El regalo de la Pachamama (2009)';break;
			case 6 : $valor = 'Los Andes no creen en dios (2007)';break;
			case 7 : $valor = 'Alas de papel (2005)';break;
			case 8 : $valor = 'El Regreso (2009)';break;
			case 9 : $valor = 'Los Condenados (2009)';break;
			case 10 : $valor = 'Alma y el viaje al mar (2003)';break;
			case 11 : $valor = 'El Triangulo del Lago (2000)';break;
			case 12 : $valor = 'Los Hermanos Cartagena (1984)';break;
			case 13 : $valor = 'Amargo Mar (1984)';break;
			case 14 : $valor = 'El Ultimo Caudillo (2009)';break;
			case 15 : $valor = 'Los Hijos del sol (2003)';break;
			case 16 : $valor = 'América Tiene Alma (2009)';break;
			case 17 : $valor = 'Escrito en el agua (2000)';break;
			case 18 : $valor = 'Los Hijos del último jardín (2004)';break;
			case 19 : $valor = 'American visa (2005)';break;
			case 20 : $valor = 'Esito seria (2004)';break;
			case 21 : $valor = 'Los Hombres del lago (2008)';break;                          
			case 22 : $valor = 'Amores de Lumbre (2009)';break;
			case 23 : $valor = 'Espíritus independientes (2004)';break;
			case 24 : $valor = 'Los Yuquises (2006)';break;
			case 25 : $valor = 'Armas de casa (2007) ';break;
			case 26 : $valor = 'Estado de las cosas (2007)';break;
			case 27 : $valor = 'Margaritas negras (2004)';break;
			case 28 : $valor = 'Autonomía (2002)';break;
			case 29 : $valor = 'Evo pueblo (2007)';break;
			case 30 : $valor = 'Mi Socio (1982)';break;
			case 31 : $valor = 'Campo de Batalla (2009)';break;
			case 32 : $valor = 'Faustino Mayta (2003)';break;
			case 33 : $valor = 'No Veo España (2009)';break;
			case 34 : $valor = 'Cementerio de los Elefantes (2009)';break;
			case 35 : $valor = 'Fuego de Libertad (2009)';break;
			case 36 : $valor = 'Nocturnia (2008)';break;
			case 37 : $valor = 'Cocalero (2007)';break;
			case 38 : $valor = 'Hartos Evo aquí hay (2006)';break;
			case 39 : $valor = 'Nostalgias del rock (2005)';break;
			case 40 : $valor = 'Corazón de Jesús (2004)';break;
			case 41 : $valor = 'Historia de Vino, Singani y Alcoba (2009)';break;
			case 42 : $valor = 'Psico urbano (2006)';break;
			case 43 : $valor = 'Cuestión de fe (1995) ';break;
			case 44 : $valor = 'Hospital Obrero  (2009)';break;
			case 45 : $valor = 'Quien mato a la llamita blanca (2006)';break;
			case 46 : $valor = 'Dependencia sexual (2003)';break;
			case 47 : $valor = 'Huanuni de pie a pesar de todo (2007)';break;
			case 48 : $valor = 'Reconstrucción (2008)';break;
			case 49 : $valor = 'Desde el fondo (2008)';break;
			case 50 : $valor = 'I am Bolivia (2006)';break;
			case 51 : $valor = 'Ring ring (2008)';break;
			case 52 : $valor = 'Di buen día a papa (2005)';break;
			case 53 : $valor = 'Jonás y la ballena rosada (1995) ';break;
			case 54 : $valor = 'Rojo, Amarillo y Verde (2009)';break;
			case 55 : $valor = 'Día de boda (2008)';break;
			case 56 : $valor = 'La Chirola (2009)';break;
			case 57 : $valor = 'San Ernesto nació en la higuera (2007)';break; 
			case 58 : $valor = 'Eco Man (2009)';break;
			case 59 : $valor = 'La Ley de la noche (2005)';break;
			case 60 : $valor = 'Santos Markatula (2009)';break;
			case 61 : $valor = 'El Ascensor  (2009)';break;
			case 62 : $valor = 'La Maldición de Rocha (2009)';break;
			case 63 : $valor = 'Sena/quina (2005)';break;
			case 64 : $valor = 'El Atraco (2004)';break;
			case 65 : $valor = 'La Nación clandestina (1989)';break;
			case 66 : $valor = 'Trono (2001)';break;
			case 67 : $valor = 'El Clan (2006)';break;
			case 68 : $valor = 'La Noche con Orgalia (2000)';break;
			case 69 : $valor = 'Un día más (2009)';break;
			case 70 : $valor = 'El Comienzo fue en Warizata (2009)';break;
			case 71 : $valor = 'La Promo (2008)';break;
			case 72 : $valor = 'Verse Mirar (2009)';break;
			case 73 : $valor = 'El Día que murió el silencio (1998)';break;
			case 74 : $valor = 'Licorcito de coca (2007)';break;
			case 75 : $valor = 'Vientos Negros (2006)';break;
			case 76 : $valor = 'El Grito de la selva (2008)';break;
			case 77 : $valor = 'Lo más bonito y mis mejores años (2006)';break;
			case 78 : $valor = 'Zona Sur (2009)';break;
			case 79 : $valor = 'El minero del diablo (2005)';break;
			case 80 : $valor = 'OTROS';break;		
		}
		$peliculas = $peliculas.$valor.'-';
	}
}

$vec[1] = $_POST['cc'];
$vec[2] = $_POST['cd'];
$vec[3] = $_POST['ce'];
$vec[4] = $_POST['cf'];
$vec[5] = $_POST['cg'];
$vec[6] = $_POST['ch'];
$vec[7] = $_POST['ci'];
$vec[8] = $_POST['cj'];
$vec[9] = $_POST['ck'];

$producciones = '';
$i = 0;

for($i=0;$i<=10;$i++)
{
	$valor = $vec[$i];
	if($valor != '')
	{
		switch($i)
		{
			case 1 : $valor = 'Cine Monje Campero';		break;
			case 2 : $valor = 'Cine Teatro 16 de Julio';	break;
			case 3 : $valor = 'Megacenter';break;
			case 4 : $valor = 'Multicine';break;
			case 5 : $valor = 'Cinemateca Boliviana';break;
			case 6 : $valor = 'Cine Municipal 6 de Agosto';break;
			case 7 : $valor = 'Cines Hollywood';break;
			case 8 : $valor = 'Cines Plaza';break;
			case 9 : $valor = 'Cines Comercio';break;
		}
		$producciones = $producciones.$valor.'-';
	}
}


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

$sql = "INSERT INTO cuestionario (id_c,edad,sexo,prod,otros,factores,peliculas,prefiere,directores,id_u,porque,producciones) VALUES (NULL,'$edad','$sexo','$pelicula','$otros','$factores','$peliculas','$prefiere','$directores','$id_u','$porque','$producciones')";
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
		$porque = $linea["porque"]; 
		$factores = $linea["factores"]; 
		$peliculas = $linea["peliculas"]; 

		if($pelicula=='ext') 
			$pelicula = 'EXTRANJERAS';
		elseif($pelicula=='nac') 
			$pelicula = 'NACIONALES';
		$prefiere = $linea["prefiere"]; 
		$directores = $linea["directores"]; 
		$porque = $linea["porque"];
		$producciones = $linea["producciones"]; 
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
        <td width="75" bgcolor="#000000" class="Estilo8" align="center"><span class="Estilo64"><? echo $id_u+100;?></span>&nbsp; <font color="#ffffff" style="color:#ffffff" size="18" face="Arial, Helvetica, sans-serif">
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

<?

$vector1 = explode("-",$peliculas);
if($peliculas == '')
	$long = 0;
else
	$long = count($vector1);
	
	echo '
	<table width="400" border="1" align="center" cellpadding="0" cellspacing="0">';
for($i=0; $i<$long-1; $i++)
{
	echo'<tr>';
    $pe = $vector1[$i];
	$cont = $i+1;
	echo '<td width="40" height="34" bgcolor="#000000"><label>
              <div align="center"><span class="Estilo8">'.$cont.'</span></div></label></td>';
	echo '<td width="360" height="34" bgcolor="#000000"><label>
              <div align="center"><span class="Estilo8">'.$pe.'</span></div></label></td>';
	echo '</tr>';
}
    echo '
    </table>';

?>
 
	
	  <table width="480" height="30" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td width="26" class="Estilo7">Otros:</td>
          <td width="454" class="Estilo8" bgcolor="#000000">&nbsp;<? echo $otros;?></td>
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
    <td colspan="3">
    
      <p>
        <?

$vector1 = explode("-",$producciones);
if($producciones == '')
	$long = 0;
else
	$long = count($vector1);
	
	echo '
	<table width="400" border="1" align="center" cellpadding="0" cellspacing="0">';
for($i=0; $i<$long-1; $i++)
{
	echo'<tr>';
    $pe = $vector1[$i];
	$cont = $i+1;
	echo '<td width="40" height="34" bgcolor="#000000"><label>
              <div align="center"><span class="Estilo8">'.$cont.'</span></div></label></td>';
	echo '<td width="360" height="34" bgcolor="#000000"><label>
              <div align="center"><span class="Estilo8">'.$pe.'</span></div></label></td>';
	echo '</tr>';
}
    echo '
    </table>';

?>
      </p>
      <table width="480" height="30" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td width="26" class="Estilo7">Porque:</td>
          <td width="454" class="Estilo8" bgcolor="#000000"><span class="Estilo64">&nbsp;<? echo $porque;?></span></td>
        </tr>
      </table>      <p>&nbsp; </p></td>
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