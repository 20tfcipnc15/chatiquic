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


$nom_enc = strtoupper($nom_enc);

$sql = "INSERT INTO cuestionario3 (id_c3,nombres,productoras,clientela,grado,valor,oferta,competidores,directa,distribucion,sistema,feed,atraer,tienen,ingresos,sostenible,empresa,diversifican,recursos,nuevos,cuanto,subcontrata,parte,puntualidad,cadena,proveedores,independencia,costo,causa,considera,mayor,explicar,diez,crecido,cinco,ultimos,ventas,cambio,estancamiento,evalua,gestion,calidad,exito) VALUES (NULL,'$nombres','$productoras','$clientela','$grado','$valor','$oferta','$competidores','$directa','$distribucion','$sistema','$feed','$atraer','$tienen','$ingresos','$sostenible','$empresa','$diversifican','$recursos','$nuevos','$cuanto','$subcontrata','$parte','$puntualidad','$cadena','$proveedores','$independencia','$costo','$causa','$considera','$mayor','$explicar','$diez','$crecido','$cinco','$ultimos','$ventas','$cambio','$estancamiento','$evalua','$gestion','$calidad','$exito')";
$result = mysql_query($sql,$link);

$consulta = "SELECT * FROM cuestionario3 order by id_c3 DESC limit 1";
$resultado= mysql_query($consulta) or die ("Error de busqueda en la BD: ". mysql_error());
$numResultados = mysql_num_rows($resultado);
if($numResultados>0)
{
	while($linea=mysql_fetch_array($resultado))
	{

//$nombres = $linea['nombres'];
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
	}
}
?>

<html>
<head>
<title>Cuestionario Dirigido a Directres de Cine</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<LINK href="../javascript/estilo_noticias.css" type=text/css rel=stylesheet>
<SCRIPT language=JavaScript src="../javascript/fecha-hora_bc.js"></SCRIPT>
<SCRIPT language=javascript src="../javascript/barra_de_estado.js"></SCRIPT>
<script language=JavaScript src="../javascript/generador_noticias.js"></script>
<SCRIPT language=JavaScript src="../fecha-hora_bc.js"></SCRIPT>
<script type="text/javascript" src="../Sothink DHTML Menu/Resource/js/stmenu.js"></script>
<style type="text/css">
<!--
body {
	background-color: #993300;
}
.Estilo93 {font-size: 13px}
.Estilo101 {font-size: 16px}
.Estilo104 {color: #000000}
.Estilo105 {color: #FFFFFF; font-weight: bold; font-style: italic; }
.Estilo108 {font-family: Arial, Helvetica, sans-serif; color: #000000; font-weight: bold; font-size: 16px;}
.Estilo110 {font-family: Arial, Helvetica, sans-serif; color: #000000; font-weight: bold; font-size: 13px; }
.Estilo113 {
	font-style: italic;
	font-family: Arial, Helvetica, sans-serif;
	color: #000000;
	font-size: 14;
}
.Estilo117 {color: #FFFFFF}
.Estilo123 {font-style: italic; font-family: Arial, Helvetica, sans-serif; color: #000000; font-size: 16px; }
.Estilo124 {font-family: Arial, Helvetica, sans-serif; color: #FFFFFF; font-weight: bold; font-size: 13px; }
-->
</style></head>
<body>
<form name="cuestionario" action="resp3.php" method="post">
<table width="802" height="316" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#800040">
  <tr>
    <td width="469" height="80" bgcolor="#000033"><table width="480" border="0" cellpadding="1" cellspacing="1">
      <tr>
        <td bgcolor="#000066" class="Estilo104"><span class="Estilo22 Estilo117"><em><strong><u><strong>UNIVERSIDAD MAYOR DE SAN ANDRES</strong></u><strong><br />
                    <u>FACULTAD DE CIENCIAS ECONOMICAS Y FINANCIERAS CARRERA DE ADMINISTRACI&Oacute;N DE EMPRESAS</u></strong></strong></em></span></td>
      </tr>
    </table>
      <table width="480" border="0" cellpadding="1" cellspacing="1">
        <tr>
          <td width="72" bgcolor="#000066"><span class="Estilo105">TESISTA:</span></td>
          <td width="350" bgcolor="#000066"><span class="Estilo105">ARIEL MAMANI MANTILLA </span></td>
        </tr>
      </table></td>
  <td width="4" bgcolor="#000033">&nbsp;</td>
  <td width="453" bgcolor="#000033"><table width="154" height="60" border="1" align="right" cellpadding="0" cellspacing="0">
      <tr>
        <td><img src="fotos de las peliculas/80.bmp" width="160" height="90" /></td>
        <td><img src="fotos de las peliculas/81.jpg" width="260" height="110" /></td>
      </tr>
    </table>
    <div align="center"></div></td>
  </tr>
  <tr>
    <td height="109" colspan="3" bgcolor="#FF6600"><marquee>
      <table width="707" height="86" border="1" cellpadding="0" cellspacing="0" align="center">
        <tr>
          <td width="210" height="105"><img src="fotos de las peliculas/25.jpg" width="130" height="130" /></td>
          <td width="5" height="105"><img src="fotos de las peliculas/55.jpg" width="130" height="130" /></td>
          <td width="5" height="105"><img src="fotos de las peliculas/16.jpg" width="130" height="130" /></td>
          <td width="240" height="105"><img src="fotos de las peliculas/7.jpg" width="130" height="130" /></td>
          <td width="8" height="105"><img src="fotos de las peliculas/49.jpg" width="130" height="130" /></td>
          <td width="8" height="105"><img src="fotos de las peliculas/15.jpg" width="130" height="130" /></td>
          <td width="221" height="105"><img src="fotos de las peliculas/12.jpg" width="130" height="130" /></td>
        </tr>
      </table>
      </marquee>
        <div align="right"></div></td>
  </tr>
  <tr>
    <td height="92" colspan="3" bgcolor="#FF6600" class="Estilo110"><p class="Estilo4">&nbsp;</p>
      <p class="Estilo123"><u>Cuestionario N&ordm; 3 dirigido a las empresas del sector cinematogr&aacute;fico </u></p>
      <p class="Estilo113">        El presente cuestionario  tiene el objetivo de conocer aquellos factores de crecimiento empresarial en el  sector; le aclaramos que en esta encuesta empleamos el t&eacute;rmino &ldquo;empresa&rdquo; para  referirnos a la productora; le agradezco de antemano su atenci&oacute;n y tiempo.</p>
      <p class="Estilo113"><a href="Resumen Tesis.html" class="Estilo117">Ver Resumen del Trabajo de Tesis</a></p>
      <p class="Estilo113">De acuerdo a la pregunta  marque en las casillas o responda a la pregunta:</p></td>
  </tr>
  <tr>
    <td colspan="3" bgcolor="#FF6600" class="Estilo108"><p align="justify" class="Estilo4 Estilo101">&nbsp;</p>    </td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#FF6600" class="Estilo108"><table width="480" height="30" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td width="153" class="Estilo93 Estilo42"><strong class="Estilo110">NOMBRE COMPLETO </strong></td>
          <td width="310" bgcolor="#993300" class="Estilo93 Estilo8"><strong><span class="Estilo64"><? echo $nombres;?></span></strong></td>
        </tr>
    </table></td>
    <td bgcolor="#FF6600" class="Estilo108"><table width="353" height="30" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td width="131" class="Estilo93 Estilo42"><strong>PRODUCTORA</strong></td>
          <td width="222" bgcolor="#993300" class="Estilo93 Estilo8"><strong><span class="Estilo64">&nbsp;
                <? echo $productoras;?>
                    </span></strong></td>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#FF6600" class="Estilo110">&nbsp;</td>
    <td bgcolor="#FF6600" class="Estilo110">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" bgcolor="#FF6600" class="Estilo110">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" bgcolor="#FF6600" class="Estilo108"><span class="Estilo4 Estilo101"><strong><u>VARIABLE DEPENDIENTE (Modelo de Negocio) </u></strong></span></td>
  </tr>
  <tr>
    <td colspan="3" bgcolor="#FF6600" class="Estilo110">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" bgcolor="#FF6600" class="Estilo110">SEGMENTO DE CLIENTES </td>
  </tr>
  <tr>
    <td colspan="3" bgcolor="#FF6600" class="Estilo110">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" bgcolor="#FF6600" class="Estilo110"><p><span class="Estilo14">1.- &iquest;Quienes conforman la clientela de su empresa?</span></p>
      <p><? echo $clientela;?>      </p>
      <div align="left"></div></td>
  </tr>
  <tr>
    <td colspan="3" bgcolor="#FF6600" class="Estilo110">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" bgcolor="#FF6600" class="Estilo110"><p>2.- El grado de consideraci&oacute;n de las expectativas del cliente respecto al producto/servicio es: </p>
      <p><? echo $grado;?>        </p>
      <p></p></td>
  </tr>
  <tr>
    <td colspan="3" bgcolor="#FF6600" class="Estilo110">PROPUESTA DE VALOR </td>
  </tr>
  <tr>
    <td colspan="3" bgcolor="#FF6600" class="Estilo110">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" bgcolor="#FF6600" class="Estilo110"><p><span class="Estilo14">3.- &iquest;Cu&aacute;l es el valor que le ofrecen a sus clientes?</span></p>
      <p><? echo $valor;?>        </p>
      <div align="left">
        <p class="Estilo64">&nbsp;</p>
    </div></td>
  </tr>
  <tr>
    <td colspan="3" bgcolor="#FF6600" class="Estilo110"><p class="Estilo14">4.- &iquest;Pueden los competidores mejorar su oferta en t&eacute;rminos de precios y/o cantidad?</p>
      <p class="Estilo14"><? echo $oferta;?></p>
      <p class="Estilo14">&nbsp;</p></td>
  </tr>
  <tr>
    <td colspan="3" bgcolor="#FF6600" class="Estilo110"><p><span class="Estilo14">&iquest;Puede explicar su respuesta?</span><? echo $competidores;?>
        </p>
      <div align="left">
        <p class="Estilo64">&nbsp;</p>
      </div></td>
  </tr>
  <tr>
    <td colspan="3" bgcolor="#FF6600" class="Estilo110">CANALES DE DISTRIBUCI&Oacute;N </td>
  </tr>
  <tr>
    <td colspan="3" bgcolor="#FF6600" class="Estilo110">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" bgcolor="#FF6600" class="Estilo110"><p class="Estilo14">5.- &iquest;Llegan a sus clientes m&aacute;s importantes de una forma directa ?</p>
      <p class="Estilo14"><? echo $directa;?></p>
      <p class="Estilo14">&nbsp;</p></td>
  </tr>
  <tr>
    <td colspan="3" bgcolor="#FF6600" class="Estilo110"><p><span class="Estilo14">&iquest;Puede explicar su respuesta?</span><? echo $distribucion;?>
        </p>
      <div align="left">
        <p class="Estilo64">&nbsp; </p>
      </div></td>
  </tr>
  <tr>
    <td colspan="3" bgcolor="#FF6600" class="Estilo110"><p class="Estilo4"><span class="Estilo4">6.- El sistema que utilizan para distribuir y/o presentar su producto/servicio en los ultimos diez a&ntilde;os ha sido: </span></p>
      <? echo $sistema;?></td>
  </tr>
  <tr>
    <td colspan="3" bgcolor="#FF6600" class="Estilo110">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" bgcolor="#FF6600" class="Estilo110">RELACI&Oacute;N CON LOS CLIENTES</td>
  </tr>
  <tr>
    <td colspan="3" bgcolor="#FF6600" class="Estilo110">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" bgcolor="#FF6600" class="Estilo110"><p>7<span class="Estilo14">.- &iquest;Existe alguna forma de Feedback (retroalimentaci&oacute;n) con los clientes?</span></p>
      <p><? echo $feed;?></p>      </td>
  </tr>
  <tr>
    <td colspan="3" bgcolor="#FF6600" class="Estilo110">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" bgcolor="#FF6600" class="Estilo110"><p>8<span class="Estilo14">.- &iquest;Tienen estrategias para atraer m&aacute;s clientes?</span></p>
      <p><? echo $atraer;?></p>
      <p>&nbsp;</p></td>
  </tr>
  <tr>
    <td colspan="3" bgcolor="#FF6600" class="Estilo110"><span class="Estilo14">&iquest;Puede explicar su respuesta?</span><? echo $tienen;?>
      <div align="left">
        <p class="Estilo64">&nbsp; </p>
      </div></td>
  </tr>
  <tr>
    <td colspan="3" bgcolor="#FF6600" class="Estilo110">FLUJO DE INGRESOS </td>
  </tr>
  <tr>
    <td colspan="3" bgcolor="#FF6600" class="Estilo110">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" bgcolor="#FF6600" class="Estilo110"><p class="Estilo14">9.- &iquest;El flujo actual de ingresos es sostenible?</p>
      <p><? echo $ingresos;?></p>
      <p>&nbsp;</p></td>
  </tr>
  <tr>
    <td colspan="3" bgcolor="#FF6600" class="Estilo110"><span class="Estilo14">&iquest;Puede explicar su respuesta?</span><? echo $sostenible;?>
      <div align="left">
        <p class="Estilo64">&nbsp; </p>
      </div></td>
  </tr>
  <tr>
    <td colspan="3" bgcolor="#FF6600" class="Estilo110"><p>10<span class="Estilo14">.- &iquest;Existen otras actividades que diversifican el flujo de ingresos de su empresa?</span></p>
      <p><? echo $empresa;?></p>
      <p>&nbsp;</p></td>
  </tr>
  <tr>
    <td colspan="3" bgcolor="#FF6600" class="Estilo110"><span class="Estilo14">&iquest;Puede explicar su respuesta?</span><? echo $diversifican;?>
      <div align="left">
        <p class="Estilo64">&nbsp; </p>
      </div></td>
  </tr>
  <tr>
    <td colspan="3" bgcolor="#FF6600" class="Estilo110">RECURSOS CLAVE </td>
  </tr>
  <tr>
    <td colspan="3" bgcolor="#FF6600" class="Estilo110">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" bgcolor="#FF6600" class="Estilo110"><p>1<span class="Estilo14">1.- &iquest;La empresa posee los recursos necesarios, para realizar sus  actividades de manera m&aacute;s eficiente que sus competidores?</span></p>
      <p><? echo $recursos;?>        </p>
      <p></p></td>
  </tr>
  <tr>
    <td colspan="3" bgcolor="#FF6600" class="Estilo110"><p>12<span class="Estilo4">.- &iquest;En lo posible, cada cuanto tiempo la empresa invierte en nuevos recursos para crecer en el mercado?</span></p>
      <p><? echo $nuevos;?></p>      </td>
  </tr>
  <tr>
    <td colspan="3" bgcolor="#FF6600" class="Estilo110"><? echo $cuanto;?>
      <p class="Estilo4">&nbsp;</p></td></tr>
  <tr>
    <td colspan="3" bgcolor="#FF6600" class="Estilo110">ACTIVIDADES CLAVE </td>
  </tr>
  <tr>
    <td colspan="3" bgcolor="#FF6600" class="Estilo110">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" bgcolor="#FF6600" class="Estilo110"><p class="Estilo14">13.- &iquest;La empresa subcontrata parte de sus actividades?</p>
      <p class="Estilo14"><? echo $subcontrata;?></p>      </td>
  </tr>
  <tr>
    <td colspan="3" bgcolor="#FF6600" class="Estilo110"><span class="Estilo14">Si es as&iacute;, que parte de las actividades son:</span><? echo $parte;?>
      <div align="left">
        <p class="Estilo64">&nbsp; </p>
      </div></td>
  </tr>
  <tr>
    <td colspan="3" bgcolor="#FF6600" class="Estilo110"><p class="Estilo4">14.- En cuanto a la puntualidad, el tiempo entre la filmaci&oacute;n y entrega  de la producci&oacute;n al cliente es:</p>
      <p class="Estilo4"><? echo $puntualidad;?></p>      </td>
  </tr>
  <tr>
    <td colspan="3" bgcolor="#FF6600" class="Estilo110">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" bgcolor="#FF6600" class="Estilo110">RED DE PROVEEDORES </td>
  </tr>
  <tr>
    <td colspan="3" bgcolor="#FF6600" class="Estilo110">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" bgcolor="#FF6600" class="Estilo110"><p class="Estilo14">15.- La interdependencia que existe para crear valor econ&oacute;mico entre los  diferentes agentes que componen la cadena de valor (distribuidoras, salas de  exhibici&oacute;n, etc.), es:</p>
      <p class="Estilo14"><? echo $cadena;?></p>      </td>
  </tr>
  <tr>
    <td colspan="3" bgcolor="#FF6600" class="Estilo110"><p><span class="Estilo14">&iquest;Podr&iacute;a explicar de qu&eacute; forma?</span><? echo $proveedores;?>
    </p>
      <p>&nbsp;</p>
      <div align="left"></div></td>
  </tr>
  <tr>
    <td colspan="3" bgcolor="#FF6600" class="Estilo110"><p class="Estilo14">16.- &iquest;El grado de independencia que tienen en torno a sus proveedores es?</p>
      <p class="Estilo14"><? echo $independencia;?></p>      </td>
  </tr>
  <tr>
    <td colspan="3" bgcolor="#FF6600" class="Estilo110">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" bgcolor="#FF6600" class="Estilo110">COSTO DE LA ESTRUCTURA </td>
  </tr>
  <tr>
    <td colspan="3" bgcolor="#FF6600" class="Estilo110">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" bgcolor="#FF6600" class="Estilo110"><p class="Estilo4">17.- Seg&uacute;n la gerencia, el producto/servicio que ofrecen es:</p>
      <p class="Estilo4"><? echo $costo;?></p></td>
  </tr>
  <tr>
    <td colspan="3" bgcolor="#FF6600" class="Estilo110"><p class="Estilo4">Si su respuesta a la anterior pregunta fue &ldquo;Costoso&rdquo;,  &iquest;Cu&aacute;l considera que fue la causa?</p>
      <p class="Estilo4"><? echo $causa;?></p>      </td>
  </tr>
  <tr>
    <td colspan="3" bgcolor="#FF6600" class="Estilo110"><? echo $considera;?>
      <p class="Estilo4">&nbsp;</p></td></tr>
  <tr>
    <td colspan="3" bgcolor="#FF6600" class="Estilo110">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" bgcolor="#FF6600" class="Estilo110"><p class="Estilo14">18.- &iquest;En cuanto a los costos y  gastos podr&iacute;a explicar cual de los siguientes le significan un mayor coste?</p>
      <p class="Estilo14"><? echo $mayor;?></p>      </td>
  </tr>
  <tr>
    <td colspan="3" bgcolor="#FF6600" class="Estilo110"><span class="Estilo14">&iquest;Podria explicar cu&aacute;l es?</span><? echo $explicar;?>
      <div align="left"></div></td>
  </tr>
  <tr>
    <td colspan="3" bgcolor="#FF6600" class="Estilo110">&nbsp;</td>
  </tr>
  
  <tr>
    <td colspan="3" bgcolor="#FF6600" class="Estilo110">PERCEPCI&Oacute;N DE CRECIMIENTO </td>
  </tr>
  <tr>
    <td colspan="3" bgcolor="#FF6600" class="Estilo110">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" bgcolor="#FF6600" class="Estilo110"><p>19<span class="Estilo4">.- &iquest;En su criterio, la  empresa ha crecido en los &uacute;ltimos diez a&ntilde;os?</span></p>
      <p><? echo $diez;?></p>      </td>
  </tr>
  <tr>
    <td colspan="3" bgcolor="#FF6600" class="Estilo110"><span class="Estilo35">En que basa su respuesta: 
      <? echo $crecido;?></span></td>
  </tr>
  <tr>
    <td colspan="3" bgcolor="#FF6600" class="Estilo108"><p class="Estilo4">&nbsp;</p>    </td>
  </tr>
  <tr>
    <td colspan="3" bgcolor="#FF6600" class="Estilo110"><p class="Estilo4"><span class="Estilo4">20.- &iquest;La empresa ha incrementado, mantenido o disminuido su capital  durante los &uacute;ltimos cinco a&ntilde;os?</span></p>
      <p class="Estilo4"><? echo $cinco;?></p>      </td>
  </tr>
  <tr>
    <td colspan="3" bgcolor="#FF6600" class="Estilo110"><span class="Estilo35 ">Explique en quebasa su afirmaci&oacute;n: <? echo $ultimos;?></span></td>
  </tr>
  <tr>
    <td colspan="3" bgcolor="#FF6600" class="Estilo110">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" bgcolor="#FF6600" class="Estilo110"><p><span class="Estilo4">21.- En relaci&oacute;n a la actual situaci&oacute;n econ&oacute;mica del pa&iacute;s, sus ventas se  han incrementado, disminuido o mantenido en los &uacute;ltimos cinco a&ntilde;os:</span></p>
      <p><? echo $ventas;?>        </p>
      <p>&nbsp;</p></td>
  </tr>
  <tr>
    <td colspan="3" bgcolor="#FF6600" class="Estilo110"><p>22<span class="Estilo4">.- Desde su punto de  vista, usted considera que el sector atraviesa una situaci&oacute;n de:</span></p>
      <p><? echo $cambio;?>        </p>
      <p>&nbsp;</p></td>
  </tr>
  <tr>
    <td colspan="3" bgcolor="#FF6600" class="Estilo110"><p><span class="Estilo4">23.- Usted considera que  su empresa atraviesa una situaci&oacute;n de:</span></p>
      <p><? echo $estancamiento;?>        </p>
      <p>&nbsp;</p></td>
  </tr>
  <tr>
    <td colspan="3" bgcolor="#FF6600" class="Estilo110">CONTROL DE GESTI&Oacute;N </td>
  </tr>
  <tr>
    <td colspan="3" bgcolor="#FF6600" class="Estilo110">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" bgcolor="#FF6600" class="Estilo110"><p>24<span class="Estilo4">.- &iquest;Cada cuanto tiempo se eval&uacute;a la gesti&oacute;n de la empresa?</span></p>
      <? echo $evalua;?></td>
  </tr>
  <tr>
    <td colspan="3" bgcolor="#FF6600" class="Estilo110"><? echo $gestion;?>
      <p class="Estilo4">&nbsp;</p>      </td></tr>
  
  <tr>
    <td colspan="3" bgcolor="#FF6600" class="Estilo110"><p class="Estilo4">25.- El control y la calidad de las producciones, generalmente es  realizado por:</p>
      <p class="Estilo4"><? echo $calidad;?></p>      </td>
  </tr>
  <tr>
    <td colspan="3" bgcolor="#FF6600" class="Estilo110">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" bgcolor="#FF6600" class="Estilo110"><p>26.- Que factor seg&uacute;n usted es relevante para el exito de su gesti&oacute;n </p>
      <p><? echo $exito;?></p>
      </td>
  </tr>
  <tr>
    <td colspan="3" bgcolor="#FF6600" class="Estilo110">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" bgcolor="#FF6600">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" bgcolor="#FF6600"><a href="Resumen Tesis.html" class="Estilo117">Ver Resumen del Trabajo de Tesis</a></td>
  </tr>
  <tr>
    <td colspan="3" bgcolor="#FF6600"><div align="right"><span class="Estilo4"><em><strong>te agradesco mucho tu ayuda y tu tiempo, espero te haya gustado, gracias</strong></em></span></div></td>
  </tr>
  <tr>
    <td colspan="3" bgcolor="#FF6600"><div align="right"><span class="Estilo4"><em><strong>... </strong></em></span></div></td>
  </tr>
</table>
</form>
</body>
</html>