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
$nombres = $_POST['nombres'];
$productoras = $_POST['productoras'];
$clientela = $_POST['clientela'];
$grado = $_POST['grado'];
$valor = $_POST['valor'];
$oferta = $_POST['oferta'];
$competidores = $_POST['competidores'];
$directa = $_POST['directa'];
$distribucion = $_POST['distribucion'];
$sistema = $_POST['sistema'];
$feed = $_POST['feed'];
$atraer = $_POST['atraer'];
$tienen = $_POST['tienen'];
$ingresos = $_POST['ingresos'];
$sostenible = $_POST['sostenible'];
$empresa = $_POST['empresa'];
$diversifican = $_POST['diversifican'];
$recursos = $_POST['recursos'];
$nuevos = $_POST['nuevos'];
$cuanto = $_POST['cuanto'];
$subcontrata = $_POST['subcontrata'];
$parte = $_POST['parte'];
$puntualidad = $_POST['puntualidad'];
$cadena = $_POST['cadena'];
$proveedores = $_POST['proveedores'];
$independencia = $_POST['independencia'];
$costo = $_POST['costo'];
$causa = $_POST['causa'];
$considera = $_POST['considera'];
$mayor = $_POST['mayor'];
$explicar = $_POST['explicar'];
$diez = $_POST['diez'];
$crecido = $_POST['crecido'];
$cinco = $_POST['cinco'];
$ultimos = $_POST['ultimos'];
$ventas = $_POST['ventas'];
$cambio = $_POST['cambio'];
$estancamiento = $_POST['estancamiento'];
$evalua = $_POST['evalua'];
$gestion = $_POST['gestion'];
$calidad = $_POST['calidad'];
$exito = $_POST['exito'];
$ip=$_SERVER['REMOTE_ADDR']; 


//////////////////////////////////////////

$peliculas = '';
$i = 0;

for($i=0;$i<=50;$i++)
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
		}
		$peliculas = $peliculas.$valor.'-';
	}
}

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
			case 8 : $valor = 'Cines Comercio';break;
		}
		$producciones = $producciones.$valor.'-';
	}
}

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
		$nombres = $linea["nombres"]; 
		$productoras = $linea["productoras"]; 
		$clientela = $linea["clientela"]; 
		$grado = $linea["grado"]; 
		$valor = $linea["valor"]; 
		$oferta = $linea["oferta"];
		$competidores = $linea["competidores"]; 
		$directa = $linea["directa"]; 
		$distribucion = $linea["distribucion"];  
		$sistema = $linea["sistema"]; 
		$feed = $linea["feed"]; 
		$atraer = $linea["atraer"]; 
		$tienen = $linea["tienen"]; 
		$ingresos = $linea["ingresos"]; 
		$sostenible = $linea["sostenible"];
		$empresa = $linea["empresa"]; 
		$diversifican = $linea["diversifican"]; 
		$recursos = $linea["recursos"];
		$nuevos = $linea["nuevos"]; 
		$cuanto = $linea["cuanto"]; 
		$subcontrata = $linea["subcontrata"]; 
		$parte = $linea["parte"]; 
		$puntualidad = $linea["puntualidad"]; 
		$cadena = $linea["cadena"];
		$proveedores = $linea["proveedores"]; 
		$independencia = $linea["independencia"]; 
		$costo = $linea["costo"];
		$causa = $linea["causa"]; 
		$considera = $linea["considera"]; 
		$mayor = $linea["mayor"]; 
		$explicar = $linea["explicar"]; 
		$diez = $linea["diez"]; 
		$crecido = $linea["crecido"];
		$cinco = $linea["cinco"]; 
		$ultimos = $linea["ultimos"]; 
		$ventas = $linea["ventas"];
		$cambio = $linea["cambio"]; 
		$estancamiento = $linea["estancamiento"]; 
		$evalua = $linea["evalua"]; 
		$gestion = $linea["gestion"]; 
		$calidad = $linea["calidad"]; 
		$exito = $linea["exito"];
		
			
		////////////////////////////
/*$vector1 = explode("-",$peliculas);
if($peliculas == '')
	$long = 0;
else
	$long = count($vector1);
	
	echo '
	<table width="800" border="1" align="center" cellpadding="0" cellspacing="0">';
for($i=0; $i<=$long; $i++)
{
	echo'<tr>';
    $pe = $vector1[$i];
	echo '<td>'.$pe.'</td>';
	echo '</tr>';
}
    echo '
    </table>';*/
		////////////////////////////
	
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
              <div align="center"><span class="Estilo8">'.$pro.'</span></div></label></td>';
	echo '</tr>';
}
    echo '
    </table>';

?></td>
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