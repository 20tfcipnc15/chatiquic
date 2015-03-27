<?


//include ("php/fecha_hora.php");
//$fecha = fecha_hora();

include("conect.php");
$link = conexion();
$nombre = $_POST['nombre'];
$productora = $_POST['productora'];
$digital = $_POST['digital'];
$genera = $_POST['genera'];
$preserva = $_POST['preserva'];
$recupera = $_POST['recupera'];
$reemplaza = $_POST['reemplaza'];
$operaciones = $_POST['operaciones'];
$simboliza = $_POST['simboliza'];
$capital = $_POST['capital'];
$uso = $_POST['uso'];
$modelo = $_POST['modelo'];
$tecnologia = $_POST['tecnologia'];
$notoria = $_POST['notoria'];
$afectado = $_POST['afectado'];
$principal = $_POST['principal'];
$propuesta = $_POST['propuesta'];
$canales = $_POST['canales'];
$tendencias = $_POST['tendencias'];
$flujo = $_POST['flujo'];
$clave = $_POST['clave'];
$actividades = $_POST['actividades'];
$red = $_POST['red'];
$bajar = $_POST['bajar'];
$costos = $_POST['costos'];
$redes = $_POST['redes'];
$propias = $_POST['propias'];
$informacion = $_POST['informacion'];
$tiempo = $_POST['tiempo'];
$cintas = $_POST['cintas'];
$estructura = $_POST['estructura'];
$organizacional = $_POST['organizacional'];
$compromiso = $_POST['compromiso'];
$gobierno = $_POST['gobierno'];
$apoyo = $_POST['apoyo'];
$exportado = $_POST['exportado'];
$peliculas = $_POST['peliculas'];
$mejora = $_POST['mejora'];
$vision = $_POST['vision'];
$regiones = $_POST['regiones'];
$nuevatecnologia = $_POST['nuevatecnologia'];
$basa = $_POST['basa'];
$capacidades = $_POST['capacidades'];
$habilidades = $_POST['habilidades'];
$fomento = $_POST['fomento'];
$fondo = $_POST['fondo'];
$invierte = $_POST['invierte'];
$aspecto = $_POST['aspecto'];
$crecimiento = $_POST['crecimiento'];
$ip=$_SERVER['REMOTE_ADDR']; 


$nom_enc = strtoupper($nom_enc);

$sql = "INSERT INTO cuestionario2 (id_c2,nombre,productora,digital,genera,preserva,recupera,reemplaza,operaciones,simboliza,capital,uso,modelo,tecnologia,notoria,afectado,principal,propuesta,canales,tendencias,flujo,clave,actividades,red,bajar,costos,redes,propias,informacion,tiempo,cintas,estructura,organizacional,compromiso,gobierno,apoyo,exportado,peliculas,mejora,vision,regiones,nuevatecnologia,basa,capacidades,habilidades,fomento,fondo,invierte,aspecto,crecimiento) VALUES (NULL,'$nombre','$productora','$digital','$genera','$preserva','$recupera','$reemplaza','$operaciones','$simboliza','$capital','$uso','$modelo','$tecnologia','$notoria','$afectado','$principal','$propuesta','$canales','$tendencias','$flujo','$clave','$actividades','$red','$bajar','$costos','$redes','$propias','$informacion','$tiempo','$cintas','$estructura','$organizacional','$compromiso','$gobierno','$apoyo','$exportado','$peliculas','$mejora','$vision','$regiones','$nuevatecnologia','$basa','$capacidades','$habilidades','$fomento','$fondo','$invierte','$aspecto','$crecimiento')";
$result = mysql_query($sql,$link);

$consulta = "SELECT * FROM cuestionario2 order by id_c2 DESC limit 1";
$resultado= mysql_query($consulta) or die ("Error de busqueda en la BD: ". mysql_error());
$numResultados = mysql_num_rows($resultado);
if($numResultados>0)
{
	while($linea=mysql_fetch_array($resultado))
	{

//$nombres = $linea['nombres'];
		$nombre = $linea["nombre"]; 
		$productora = $linea["productora"]; 
		$digital = $linea["digital"]; 
		$genera = $linea["genera"]; 
		$preserva = $linea["preserva"]; 
		$recupera = $linea["recupera"];
		$reemplaza = $linea["reemplaza"]; 
		$operaciones = $linea["operaciones"]; 
		$simboliza = $linea["simboliza"]; 
		$capital = $linea["capital"]; 
		$uso = $linea["uso"]; 
		$modelo = $linea["modelo"];
		$tecnologia = $linea["tecnologia"];
		$notoria = $linea["notoria"];
		$afectado = $linea["afectado"];
		$principal = $linea["principal"];
		$propuesta = $linea["propuesta"];
		$canales = $linea["canales"];
		$tendencias = $linea["tendencias"];
		$flujo = $linea["flujo"];
		$clave = $linea["clave"];
		$actividades = $linea["actividades"];
		$red = $linea["red"];
		$bajar = $linea["bajar"];
		$costos = $linea["costos"];
		$redes = $linea["redes"];
		$propias = $linea["propias"];
		$informacion = $linea["informacion"];
		$tiempo = $linea["tiempo"];
		$cintas = $linea["cintas"];
		$estructura = $linea["estructura"];
		$organizacional = $linea["organizacional"];
		$compromiso = $linea["compromiso"];
		$gobierno = $linea["gobierno"];
		$apoyo = $linea["apoyo"];
		$exportado = $linea["exportado"];
		$peliculas = $linea["peliculas"];
		$mejora = $linea["mejora"];
		$vision = $linea["vision"];
		$regiones = $linea["regiones"];
		$nuevatecnologia = $linea["nuevatecnologia"];
		$basa = $linea["basa"];
		$capacidades = $linea["capacidades"];
		$habilidades = $linea["habilidades"];
		$fomento = $linea["fomento"];
		$fondo = $linea["fondo"];
		$invierte = $linea["invierte"];
		$aspecto = $linea["aspecto"];
		$crecimiento = $linea["crecimiento"];
	}
}
?>


<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin t&iacute;tulo</title>

<SCRIPT language=javascript src="../javascript/barra_de_estado.js"></SCRIPT>
<style type="text/css">
<!--
.Estilo6 {color: #FFFFFF}
body {
	background-color: #993300;
}
.Estilo12 {
	color: #FFFFFF;
	font-family: Arial, Helvetica, sans-serif;
	font-weight: bold;
	font-size: 13px;
}
.Estilo14 {
	color: #000000;
	font-family: Arial, Helvetica, sans-serif;
	font-weight: bold;
	font-size: 13px;
}
.Estilo32 {color: #000000; font-family: Arial, Helvetica, sans-serif; font-weight: bold; font-size: 16px; font-style: italic; }
.Estilo36 {
	font-size: 14px;
	font-weight: bold;
	font-style: italic;
}
.Estilo37 {color: #000000; font-family: Arial, Helvetica, sans-serif;}
.Estilo38 {color: #000000; font-family: Arial, Helvetica, sans-serif; font-weight: bold; font-size: 16px; }
.Estilo39 {font-size: 14px}
.Estilo40 {color: #000000}
.Estilo41 {color: #FFFFFF; font-weight: bold; font-style: italic; }
.Estilo42 {color: #000000; font-family: Arial, Helvetica, sans-serif; font-weight: bold; font-size: 14px; }
-->
</style>
<SCRIPT language=javascript src="../javascript/funciones.js"></SCRIPT>
</head>

<body>
<form name="cuestionario" action="resp2.php" method="post">
<table width="802" height="4248" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#800040">
  <tr>
    <td width="486" height="80" bgcolor="#000033"><table width="480" border="0" cellpadding="1" cellspacing="1">
      <tr>
        <td bgcolor="#000066" class="Estilo40"><span class="Estilo6"><em><strong><u><strong>UNIVERSIDAD MAYOR DE SAN ANDRES</strong></u><strong><br />
                    <u>FACULTAD DE CIENCIAS ECONOMICAS Y FINANCIERAS CARRERA DE ADMINISTRACI&Oacute;N DE EMPRESAS</u></strong></strong></em></span></td>
      </tr>
    </table>
      <table width="480" border="0" cellpadding="1" cellspacing="1">
        <tr>
          <td width="72" bgcolor="#000066"><span class="Estilo41">TESISTA:</span></td>
          <td width="350" bgcolor="#000066"><span class="Estilo41">ARIEL MAMANI MANTILLA </span></td>
        </tr>
      </table></td>
    <td bgcolor="#000033">&nbsp;</td>
    <td width="284" bgcolor="#000033"><table width="154" height="60" border="1" align="right" cellpadding="0" cellspacing="0">
      <tr>
        <td><img src="fotos de las peliculas/80.bmp" width="160" height="90" /></td>
        <td><img src="fotos de las peliculas/81.jpg" width="240" height="110" /></td>
      </tr>
    </table>
    <div align="center"></div></td>
  </tr>
  <tr>
    <td height="109" colspan="3" bgcolor="#FF6600">
	<div align="right">
	<MARQUEE><table width="910" height="86" border="0" cellpadding="0" cellspacing="0" align="center">
      <tr>
        <td width="105" height="105"><img src="fotos de las peliculas/Paolo Agazzi.jpg" width="190" height="120" /></td>
        <td width="105" height="105"><img src="fotos de las peliculas/Rodrigo Bellot.jpg" width="190" height="120" /></td>
        <td width="105" height="105"><img src="fotos de las peliculas/Antonio Eguino.jpg" width="190" height="120" /></td>
        <td width="105" height="105"><img src="fotos de las peliculas/Marcos Loayza.jpg" width="190" height="120" /></td>
        <td width="105" height="105"><img src="fotos de las peliculas/Juan Carlos Valdivia.jpg" width="190" height="120" /></td>
        <td width="105" height="105"><img src="fotos de las peliculas/Tonchy Antezana.jpg" width="190" height="120" /></td>       
      </tr>
    </table>
	</MARQUEE>
    </div>    </td>
  </tr>
  <tr>
    <td height="46" colspan="3" bgcolor="#FF6600"><p class="Estilo32"><u>Cuestionario N&ordm;2 Dirigido al Sector Cinematografico </u></p>
      <span class="Estilo37"><strong>El obje</strong></span><strong><span class="Estilo37">tivo del presente  cuestionario es conocer el impacto de la tecnologia digital en relacion al modelo de negocio en el sector; siendo la información obtenida de absoluta reserva y utilizada con  fines académicos, asimismo, le aclaramos que en esta encuesta empleamos el  término “empresa” para referirnos a la productora; le agradezco de antemano su  atención y tiempo.</span></strong>      
      <p class="Estilo36"><span class="Estilo37"><a href="Resumen Tesis.html" class="Estilo6">Ver Resumen del Trabajo de Tesis</a></span>      
      <p class="Estilo37">De acuerdo a la pregunta  marque en las casillas o responda la pregunta..</td>
  </tr>
  <tr>
    <td height="13" colspan="3" bgcolor="#FF6600">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#FF6600"><table width="480" height="30" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td width="153" class="Estilo42">NOMBRE COMPLETO </td>
          <td width="310" bgcolor="#993300" class="Estilo8"><span class="Estilo64">&nbsp;<? echo $nombre;?></span></td>
        </tr>
      </table>        </td>
    <td bgcolor="#FF6600"><table width="353" height="30" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td width="131" class="Estilo42">PRODUCTORA</td>
          <td width="222" bgcolor="#993300" class="Estilo8"><span class="Estilo64">&nbsp;<? echo $productora;?></span></td>
        </tr>
      </table>        </td>
  </tr>
  <tr>
    <td colspan="3" bgcolor="#FF6600"><p class="Estilo38"></td>
    </tr>
  <tr>
    <td colspan="3" bgcolor="#FF6600"><span class="Estilo38"><u>VARIABLE INDEPENDIENTE (Tecnología Digital) </u></span></td>
  </tr>
  <tr>
    <td colspan="3" bgcolor="#FF6600">&nbsp;</td>
  </tr>
  <tr>
    <td height="42" colspan="3" bgcolor="#FF6600" class="Estilo14"><p class="Estilo4 Estilo40">1.- ¿En qué medida la empresa  se ha adaptado a la tecnología digital?</p>
      <p class="Estilo4 Estilo40"><? echo $digital;?></p></td>
  </tr>
  <tr>
    <td height="19" colspan="3" bgcolor="#FF6600" class="Estilo14">&nbsp;</td>
  </tr>
  <tr>
    <td height="68" colspan="3" bgcolor="#FF6600" class="Estilo14"><p><span class="Estilo14">2.- ¿Que genera, crea o  posibilita la tecnología digital en su empresa y/o el sector?</span></p>
      <p><? echo $genera;?>        </p>
      <div align="left"></div></td>
  </tr>
  <tr>
    <td height="21" colspan="3" bgcolor="#FF6600" class="Estilo14">&nbsp;</td>
  </tr>
  <tr>
    <td height="68" colspan="3" bgcolor="#FF6600" class="Estilo14"><p><span class="Estilo14">3.- ¿Que preserva o aumenta  la tecnología digital en su empresa y/o el sector?</span></p>
      <p><? echo $preserva;?>        </p>
      <div align="left"></div></td>
  </tr>
  <tr>
    <td height="19" colspan="3" bgcolor="#FF6600" class="Estilo14">&nbsp;</td>
  </tr>
  <tr>
    <td height="68" colspan="3" bgcolor="#FF6600" class="Estilo14"><p><span class="Estilo14">4.- ¿Que recupera o  revaloriza la tecnología digital en su empresa y/o el sector?</span></p>
      <p><? echo $recupera;?>        </p>
      <div align="left"></div></td>
  </tr>
  <tr>
    <td height="9" colspan="3" bgcolor="#FF6600" class="Estilo14">&nbsp;</td>
  </tr>
  <tr>
    <td height="68" colspan="3" bgcolor="#FF6600" class="Estilo14"><p class="Estilo14">5.- ¿Que reemplaza o deja  obsoleto la tecnología digital en su empresa y/o el sector?</p>
      <p class="Estilo14"><? echo $reemplaza;?>        </p>
      <div align="left"></div></td>
  </tr>
  <tr>
    <td colspan="3" bgcolor="#FF6600" class="Estilo14">&nbsp;</td>
  </tr>
  
  <tr>
    <td height="75" colspan="3" bgcolor="#FF6600" class="Estilo14"><p class="Estilo4 Estilo40"> 6.- ¿En qué  medida la aplicación de esta tecnología le ha facilitado las operaciones?</p>
      <p class="Estilo4 Estilo40"><? echo $operaciones;?></p>      </td>
  </tr>
  <tr>
    <td height="9" colspan="3" bgcolor="#FF6600" class="Estilo14">&nbsp;</td>
  </tr>
  <tr>
    <td height="68" colspan="3" bgcolor="#FF6600" class="Estilo14"><p><span class="Estilo14">7.- ¿Que simboliza o  representa para su empresa la aplicación de este tipo de tecnologías?</span></p>
      <p><? echo $simboliza;?>        </p>
      <div align="left"></div></td>
  </tr>
  <tr>
    <td height="16" colspan="3" bgcolor="#FF6600" class="Estilo14"><p class="Estilo4 Estilo40">&nbsp;</p>      </td>
  </tr>
  <tr>
    <td height="42" colspan="3" bgcolor="#FF6600" class="Estilo14"><p class="Estilo4 Estilo40">8.- ¿La adquisición de esta  tecnología, le ha significado a la empresa un incremento o una disminución en  el capital existente?</p>
      <? echo $capital;?></td>
  </tr>
  <tr>
    <td height="19" colspan="3" bgcolor="#FF6600" class="Estilo14">&nbsp;</td>
  </tr>
  <tr>
    <td height="37" colspan="3" bgcolor="#FF6600" class="Estilo14"><p class="Estilo4 Estilo40"> 9.- ¿El uso de la tecnología  digital ha afectado de manera positiva o negativa la estructura de su empresa?</p>
      <? echo $uso;?></td>
  </tr>
  <tr>
    <td height="19" colspan="3" bgcolor="#FF6600" class="Estilo14">&nbsp;</td>
  </tr>
  <tr>
    <td height="42" colspan="3" bgcolor="#FF6600" class="Estilo14"><p>10.-
      ¿Usted cree que la  tecnología digital de alguna manera ha reestructurado el modelo de negocio del  sector?</p>
      <p> <? echo $modelo;?></p>
      <? echo $tecnologia;?></td>
  </tr>
  <tr>
    <td height="19" colspan="3" bgcolor="#FF6600" class="Estilo14">&nbsp;</td>
  </tr>
  <tr>
    <td height="35" colspan="3" bgcolor="#FF6600" class="Estilo14"><p class="Estilo4 Estilo40">11.- Según su criterio, que  tan notoria es la incidencia de la tecnología digital en el sector  cinematográfico:</p>
      <p class="Estilo4 Estilo40"><? echo $notoria;?></p>      </td>
  </tr>
  <tr>
    <td height="19" colspan="3" bgcolor="#FF6600" class="Estilo14">&nbsp;</td>
  </tr>
  <tr>
    <td height="21" colspan="3" bgcolor="#FF6600" class="Estilo14"><p class="Estilo4 Estilo40">12.- ¿La aplicación de la  tecnología digital ha afectado de alguna manera su principal segmento de  clientes?</p>
      <? echo $afectado;?></td>
  </tr>
  <tr>
    <td height="67" colspan="3" bgcolor="#FF6600" class="Estilo14"><span class="Estilo14"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ¿Podría explicarlo? <? echo $principal;?></span>
      <div align="left"></div></td>
  </tr>
  <tr>
    <td height="16" colspan="3" bgcolor="#FF6600" class="Estilo14"><p class="Estilo64">&nbsp;</p>      </td>
  </tr>
  <tr>
    <td height="37" colspan="3" bgcolor="#FF6600" class="Estilo14"><p class="Estilo4 Estilo40"> 13.- En cuanto a la propuesta  de valor de su empresa, la tecnología digital según usted, ha tenido un  impacto:</p>
      <? echo $propuesta;?></td>
  </tr>
  <tr>
    <td height="19" colspan="3" bgcolor="#FF6600" class="Estilo14">&nbsp;</td>
  </tr>
  <tr>
    <td height="37" colspan="3" bgcolor="#FF6600" class="Estilo14"><p>14.- ¿Sus canales de  distribución han mejorado o no con la tecnología digital?</p>
      <? echo $canales;?></td>
  </tr>
  <tr>
    <td height="19" colspan="3" bgcolor="#FF6600" class="Estilo14">&nbsp;</td>
  </tr>
  <tr>
    <td height="37" colspan="3" bgcolor="#FF6600" class="Estilo14"><p>15.- ¿Usted cree que las  nuevas tendencias resultantes del desarrollo de la tecnología digital (redes  sociales, internet, etc.) ha mejorado o empeorado la relación con los clientes  de su empresa?</p>
      <p><? echo $tendencias;?></p></td>
  </tr>
  <tr>
    <td height="19" colspan="3" bgcolor="#FF6600" class="Estilo14">&nbsp;</td>
  </tr>
  <tr>
    <td height="37" colspan="3" bgcolor="#FF6600" class="Estilo14"><p>16.- ¿Usted cree que su flujo  de ingresos ha mejorado o empeorado con la tecnología digital?</p>
      <? echo $flujo;?></td>
  </tr>
  <tr>
    <td height="19" colspan="3" bgcolor="#FF6600" class="Estilo14">&nbsp;</td>
  </tr>
  <tr>
    <td height="42" colspan="3" bgcolor="#FF6600" class="Estilo14"><p class="Estilo4 Estilo40">17.- ¿En cuanto a los recursos  clave de su empresa, las nuevas tecnologías han facilitado o complicado la  adquisición de los mismos recursos?</p>
      <? echo $clave;?></td>
  </tr>
  <tr>
    <td height="16" colspan="3" bgcolor="#FF6600" class="Estilo14"><p class="Estilo64">&nbsp;</p></td>
  </tr>
  <tr>
    <td height="37" colspan="3" bgcolor="#FF6600" class="Estilo14"><p class="Estilo4 Estilo40"> 18.- Las actividades clave de  su empresa en torno al proceso de producción y/o servicio, respecto al uso de  las nuevas tecnologías han tenido un impacto:</p>
      <? echo $actividades;?></td>
  </tr>
  <tr>
    <td height="19" colspan="3" bgcolor="#FF6600" class="Estilo14">&nbsp;</td>
  </tr>
  <tr>
    <td height="42" colspan="3" bgcolor="#FF6600" class="Estilo14"><p>19.-
      En cuanto a la red de proveedores,  la incidencia de la actual tecnología, tuvo una influencia: </p>
      <? echo $red;?></td>
  </tr>
  <tr>
    <td height="19" colspan="3" bgcolor="#FF6600" class="Estilo14">&nbsp;</td>
  </tr>
  <tr>
    <td height="42" colspan="3" bgcolor="#FF6600" class="Estilo14"><p>20.-
      ¿De alguna forma, la  aplicación de la tecnología digital en su empresa, ha permitido bajar los  costos (operación, producción, etc.) de su empresa?</p>
      <p><? echo $bajar;?></p>
      <? echo $costos;?></td>
  </tr>
  <tr>
    <td height="19" colspan="3" bgcolor="#FF6600" class="Estilo14">&nbsp;</td>
  </tr>
  <tr>
    <td height="21" colspan="3" bgcolor="#FF6600" class="Estilo14"><p class="Estilo4 Estilo40">21.- ¿Las tendencias, propias  del desarrollo de la tecnología digital (redes sociales, internet, etc.) ayuda  de alguna forma el proceso productivo de su empresa?</p>
      <? echo $redes;?></td>
  </tr>
  <tr>
    <td height="67" colspan="3" bgcolor="#FF6600" class="Estilo14"><span class="Estilo14"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ¿Como lo hace? <? echo $propias;?></span>
      <div align="left"></div></td>
  </tr>
  <tr>
    <td height="19" colspan="3" bgcolor="#FF6600" class="Estilo14">&nbsp;</td>
  </tr>
  <tr>
    <td height="73" colspan="3" bgcolor="#FF6600" class="Estilo14"><p class="Estilo4 Estilo40"> 22.- ¿En cuanto a la  información tecnológica y del sector, cuan actualizados están al respecto, para  el desarrollo pleno de sus actividades?</p>
      <p class="Estilo4 Estilo40"><? echo $informacion;?></p>      </td>
  </tr>
  
  <tr>
    <td height="8" colspan="3" bgcolor="#FF6600" class="Estilo14"><span class="Estilo38"><u>VARIABLE DEPENDIENTE  </u></span></td>
  </tr>
  <tr>
    <td height="84" colspan="3" bgcolor="#FF6600" class="Estilo14"><p class="Estilo4 Estilo40">Cuanto tiene la empresa en el medio:</p>
      <? echo $tiempo;?></td>
  </tr>
  <tr>
    <td height="75" colspan="3" bgcolor="#FF6600" class="Estilo14"><p class="Estilo4 Estilo40">  Cuantas cintas  ha producido y/o coproducido</p>
      <p class="Estilo4 Estilo40"><? echo $cintas;?></p>      </td>
  </tr>
  <tr>
    <td height="38" colspan="3" bgcolor="#FF6600" class="Estilo14"><u><span class="Estilo39">Contexto Interno</span></u><span class="Estilo39"><span class="Estilo14"></span></td>
  </tr>
  <tr>
    <td height="80" colspan="3" bgcolor="#FF6600" class="Estilo14"><p class="Estilo14">1.- ¿La actual  estructura organizacional que poseen ayuda (más que obstaculizar) las  decisiones más críticas para su éxito?</p>
      <p class="Estilo14"><? echo $estructura;?></p>      </td>
  </tr>
  <tr>
    <td height="65" colspan="3" bgcolor="#FF6600" class="Estilo14"><span class="Estilo14"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ¿Puede explicarla?</span><? echo $organizacional;?>
      <div align="left"></div></td>
    </tr>
  <tr>
    <td height="69" colspan="3" bgcolor="#FF6600" class="Estilo14"><p>2<span class="Estilo14">.- El nivel de compromiso de los trabajadores respecto al propósito de  la empresa es:</span></p>
      <p><? echo $compromiso;?></p>      </td>
  </tr>
  <tr>
    <td colspan="3" bgcolor="#FF6600" class="Estilo14"><p class="Estilo39"><u>Contexto Externo</u></p>      </td>
  </tr>
  <tr>
    <td height="60" colspan="3" bgcolor="#FF6600" class="Estilo14"><p class="Estilo14">3.- ¿La Empresa cuenta con el apoyo del gobierno?</p>
      <p class="Estilo14"><? echo $gobierno;?></p>      </td>
  </tr>
  <tr>
    <td height="70" colspan="3" bgcolor="#FF6600" class="Estilo14"><span class="Estilo14"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;¿Si la respuesta es afirmativa podría explicar de qué forma?</span><? echo $apoyo;?>
      <div align="left"></div></td>
    </tr>
  <tr>
    <td height="56" colspan="3" bgcolor="#FF6600" class="Estilo14"><p class="Estilo14">4.- ¿Las películas que realizaron lograron ser exportadas?</p>
      <p class="Estilo14"><? echo $exportado;?></p>      </td>
  </tr>
  <tr>
    <td height="68" colspan="3" bgcolor="#FF6600" class="Estilo14"><span class="Estilo14">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ¿Puede explicar su respuesta?</span><? echo $peliculas;?>
      <div align="left"></div></td>
    </tr>
  <tr>
    <td colspan="3" bgcolor="#FF6600" class="Estilo14"><span class="Estilo14"></span>
      <p class="Estilo39"><u>Concepto de Negocio </u></p>      </td>
  </tr>
  
  <tr>
    <td height="56" colspan="3" bgcolor="#FF6600" class="Estilo14"><p class="Estilo14">5.- La visión de la empresa está orientada hacia una mejora del:</p>
      <p class="Estilo14"><? echo $mejora;?></p>      </td>
  </tr>
  <tr>
    <td height="65" colspan="3" bgcolor="#FF6600" class="Estilo14"><span class="Estilo14">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ¿Podría explicar su respuesta?</span><? echo $vision;?>
      <div align="left"></div></td>
    </tr>
  
  <tr>
    <td height="71" colspan="3" bgcolor="#FF6600" class="Estilo14"><p class="Estilo14">6.- ¿La empresa está presente en otras regiones del país?</p>
      <p class="Estilo14"><? echo $regiones;?></p>      </td>
  </tr>
  <tr>
    <td colspan="3" bgcolor="#FF6600" class="Estilo14"><p class="Estilo39"><u>Recursos y Capacidades</u></p>      </td>
  </tr>
  <tr>
    <td height="63" colspan="3" bgcolor="#FF6600" class="Estilo14"><p class="Estilo14">7.- ¿En la organización se ha incorporado o mantenido la tecnología?</p>
      <p class="Estilo14"><? echo $nuevatecnologia;?></p>      </td>
  </tr>
  <tr>
    <td height="68" colspan="3" bgcolor="#FF6600" class="Estilo14"><span class="Estilo14">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ¿En que se basa su afirmación?</span><? echo $basa;?>
      <div align="left"></div></td>
    </tr>
  <tr>
    <td height="54" colspan="3" bgcolor="#FF6600" class="Estilo14"><p class="Estilo14">8.- En cuanto a la mejora de las habilidades y capacidades del personal  (técnicas, operativas, dirección, etc.) estas se las realiza:</p>
      <p class="Estilo14"><? echo $capacidades;?></p>      </td>
  </tr>
  <tr>
    <td height="57" colspan="3" bgcolor="#FF6600" class="Estilo14"><? echo $habilidades;?></td>
    </tr>
  <tr>
    <td height="48" colspan="3" bgcolor="#FF6600" class="Estilo14"><span class="Estilo14"></span>
      <p class="Estilo39"><u>Decisiones Estratégicas de Inversión</u></p>      </td>
  </tr>
  
  <tr>
    <td height="53" colspan="3" bgcolor="#FF6600" class="Estilo14"><p class="Estilo14">9.- ¿El fondo para las inversiones provienen mayormente de:</p>
      <p class="Estilo14"><? echo $fomento;?></p>      </td>
  </tr>
  <tr>
    <td height="57" colspan="3" bgcolor="#FF6600" class="Estilo14"><? echo $fondo;?></td>
    </tr>
  <tr>
    <td height="55" colspan="3" bgcolor="#FF6600" class="Estilo14"><p class="Estilo14">10.- ¿En qué aspecto invierte más la empresa:</p>
      <p class="Estilo14"><? echo $invierte;?></p>      </td>
  </tr>
  <tr>
    <td height="57" colspan="3" bgcolor="#FF6600" class="Estilo14"><? echo $aspecto;?></td>
  </tr>
  <tr>
    <td height="32" colspan="3" bgcolor="#FF6600" class="Estilo14"><p>Situación Estratégica </p></td>
  </tr>
  <tr>
    <td height="19" colspan="3" bgcolor="#FF6600" class="Estilo14">&nbsp;</td>
  </tr>
  <tr>
    <td height="83" colspan="3" bgcolor="#FF6600" class="Estilo110"><p class="Estilo14"><strong>11.- &iquest;Cual dir&iacute;a que fue la  estrategia de crecimiento que m&aacute;s utilizo frecuentemente?</strong></p>
      <p class="Estilo14"><? echo $crecimiento;?></p>      </td>
  </tr>
  
  
  <tr>
    <td colspan="3" bgcolor="#FF6600">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" bgcolor="#FF6600"><a href="Resumen Tesis.html" class="Estilo6">Ver Resumen del Trabajo de Tesis</a></td>
  </tr>
  <tr>
    <td colspan="3" bgcolor="#FF6600"><div align="right">
      <p class="Estilo14"><em><strong>te agradesco mucho tu ayuda y tu tiempo, espero te haya gustado, gracias...</strong></em></p>
      <p class="Estilo14">&nbsp;</p>
    </div></td>
  </tr>
</table>
</form>
</body>
</html>