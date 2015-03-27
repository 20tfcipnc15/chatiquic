<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
<p><a class="thumbnail" href="#thumb"><span>exto si se dese</span></a></p>
<form name="cuestionario" action="resp.php" method="post">
  <table width="802" height="316" border="0" align="center" cellpadding="1" cellspacing="0" bgcolor="#800040">
  <tr>
    <td width="486" height="80" bgcolor="#000033"><table width="480" border="0" cellpadding="1" cellspacing="1"><tr><td bgcolor="#000066" class="Estilo6"><table width="480" border="0" cellpadding="1" cellspacing="1">
      <tr>
        <td bgcolor="#000066" class="Estilo7"><span class="Estilo8"><em><strong><u><strong>UNIVERSIDAD MAYOR DE SAN ANDRES</strong></u><strong><br />
                    <u>FACULTAD DE CIENCIAS ECONOMICAS Y FINANCIERAS CARRERA DE ADMINISTRACI&Oacute;N DE EMPRESAS</u></strong></strong></em></span></td>
      </tr>
    </table>      <span class="Estilo8"><em><strong><strong></strong></strong></em></span></td>
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
    </table></td>
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
        </marquee>        </td>
      </tr>
    </table>

    <div align="right" class="Estilo6"></div>    </td>
  </tr>
  <tr bgcolor="#FF6600">
    <td height="45" colspan="3"><p class="Estilo6"><strong><u>Cuestionario N&ordm;1 Dirigido al P&uacute;blico en General </u></strong></p>
    <p class="Estilo6"><em><strong>El presente cuestionario  tiene el objetivo de conocer aquellos factores de crecimiento empresarial en el  sector; le agradezco de antemano su atenci&oacute;n y tiempo.</strong></em></p></td>
  </tr>
  <tr bgcolor="#FF6600">
    <td colspan="2"><table width="480" height="30" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td width="153" class="Estilo6">NOMBRE (Opcional) </td>
          <td width="310" bgcolor="#000000" class="Estilo8"><span class="Estilo64">&nbsp;
            <input type="text" style="width:300px; height:20px " name="nom_enc" class="Estilo6" maxlength="200">
            </span></td>
          </tr>
    </table>
      <p>&nbsp;</p></td>
    <td><table width="270" height="30" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="149" class="Estilo7">N&uacute;mero de encuesta </td>
        <td width="75" bgcolor="#000000" class="Estilo8" align="center">&nbsp; <font color="#ffffff" style="color:#ffffff" size="18" face="Arial, Helvetica, sans-serif">
          <?
		include("conect.php");
		$link = conexion();
 
		//obtenemos el registro interno correspondiente a la unidad.
		$consulta = "SELECT id_u FROM usuario order by id_u DESC limit 1";
		$resultado= mysql_query($consulta) or die ("Error de busqueda en la BD: ". mysql_Error());
		$numResultados = mysql_num_rows($resultado);
		$linea=mysql_fetch_array($resultado);
		$id_u = $linea["id_u"];
		$id_u = $id_u + 100;
		echo $id_u; 
		?>
        </font> </span></td>
      </tr>
    </table>
      <p>&nbsp;</p></td>
  </tr>
  
  <tr bgcolor="#FF6600">
    <td colspan="3"><table width="429" border="0" cellpadding="1" cellspacing="1">
        <tr>
          <td width="64" class="Estilo6">EDAD: </td>
          <td width="98" bgcolor="#000000" class="Estilo8">
            <input type="radio" value="15" name="edad" />
15 - 25</td>
          <td width="117" bgcolor="#000000" class="Estilo8">
            <input type="radio" value="26" name="edad" />
26 - 34 </td>
          <td width="122" bgcolor="#000000" class="Estilo8">
            <input type="radio" value="35" name="edad" />
35 en adelante </td>
        </tr>
        <tr>
          <td class="Estilo6">SEXO: </td>
          <td bgcolor="#000000" class="Estilo8">
          <input type="radio" value="f" name="sexo" />
Femenino </td>
          <td bgcolor="#000000" class="Estilo8">
          <input type="radio" value="m" name="sexo" />
Masculino </td>
          <td bgcolor="#000000" class="Estilo6"><span class="Estilo8">
            <label></label>
          </span></td>
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
        <td width="10" height="34" bgcolor="#000000"><label>
            <div align="center">
              <input type="checkbox" name="a" value="a" />
            </div>
          </label></td>
        <td width="250" height="34" bgcolor="#000000">
        <table width="250" height="34">
            <tr>
			  <td width="32" height="40"><a class="thumbnail" href="#"><img src="fotos de las peliculas/1.jpg" width="30px" height="30px" border="0" /><span><img src="fotos de las peliculas/1.jpg" width="200" height="250"/><br />
			  </span></a></td>
              <td width="206"><span class="Estilo8">¿De qué Color es el  Cielo? (2009)</span></td>
            </tr>
          </table>
            <a class="thumbnail" href="#"><span><img src="fotos de las peliculas/1.jpg"/></span></a></td>
        <td width="10" height="34" bgcolor="#000000"><label>
            <div align="center">
              <input type="checkbox" name="b" value="b" />
            </div>
          </label></td>
        <td width="250" height="34" bgcolor="#000000"><table width="250" height="34">
            <tr>
              <td width="32" height="40"><a class="thumbnail" href="#"><img src="fotos de las peliculas/28.jpg" width="30px" height="30px" border="0" /><span><img src="fotos de las peliculas/28.jpg" width="320" height="220"/><br />
              </span></a></td>
              <td width="206"><span class="Estilo8">El Refugio (2001)</span></td>
            </tr>
          </table>
          <a class="thumbnail" href="#"><span><img src="fotos de las peliculas/1.jpg"/></span></a></td>
        <td width="10" height="34" bgcolor="#000000"><label>
            <div align="center">
              <input type="checkbox" name="checkbox342" value="c" />
            </div>
          </label></td>
        <td width="250" height="34" bgcolor="#000000"><table width="250" height="34">
            <tr>
              <td width="32" height="40"><a class="thumbnail" href="#"><img src="fotos de las peliculas/54.jpg" width="30px" height="30px" border="0" /><span><img src="fotos de las peliculas/54.jpg" width="280" height="220"/><br />
              </span></a></td>
              <td width="206"><span class="Estilo8">Los Abandonados (2007)</span></td>
            </tr>
          </table>
          <a class="thumbnail" href="#"><span><img src="fotos de las peliculas/1.jpg"/></span></a></td>
      </tr>
      <tr>
        <td height="34" bgcolor="#000000"><label>
            <div align="center">
              <input type="checkbox" name="checkbox342" value="d" />
            </div>
          </label></td>
        <td height="34" bgcolor="#000000"><table width="250" height="34">
            <tr>
              <td width="32" height="40"><a class="thumbnail" href="#"><img src="fotos de las peliculas/2.jpg" width="30px" height="30px" border="0" /><span><img src="fotos de las peliculas/2.jpg" width="300" height="300"/><br />
              </span></a></td>
              <td width="206"><span class="Estilo8">Airampo (2008)</span></td>
            </tr>
          </table>
          <a class="thumbnail" href="#"><span><img src="fotos de las peliculas/1.jpg"/></span></a></td>
        <td height="34" bgcolor="#000000"><label>
            <div align="center">
              <input type="checkbox" name="checkbox342" value="e" />
            </div>
          </label></td>
        <td height="34" bgcolor="#000000"><table width="250" height="34">
            <tr>
              <td width="32" height="40"><a class="thumbnail" href="#"><img src="fotos de las peliculas/29.jpg" width="30px" height="30px" border="0" /><span><img src="fotos de las peliculas/29.jpg" width="200" height="250"/><br />
              </span></a></td>
              <td width="206"><span class="Estilo8">El regalo de la  Pachamama (2009)</span></td>
            </tr>
          </table>
          <a class="thumbnail" href="#"><span><img src="fotos de las peliculas/1.jpg"/></span></a></td>
        <td height="34" bgcolor="#000000"><label>
            <div align="center">
              <input type="checkbox" name="checkbox342" value="f" />
            </div>
          </label></td>
        <td height="34" bgcolor="#000000"><table width="250" height="34">
            <tr>
              <td width="32" height="40"><a class="thumbnail" href="#"><img src="fotos de las peliculas/55.jpg" width="30px" height="30px" border="0" /><span><img src="fotos de las peliculas/55.jpg" /><br />
              </span></a></td>
              <td width="206"><span class="Estilo8">Los Andes no creen en  dios (2007)</span></td>
            </tr>
          </table>
          <a class="thumbnail" href="#"><span><img src="fotos de las peliculas/1.jpg"/></span></a></td>
      </tr>
      <tr>
        <td height="34" bgcolor="#000000"><label>
            <div align="center">
              <input type="checkbox" name="checkbox342" value="g" />
            </div>
          </label></td>
        <td height="34" bgcolor="#000000"><table width="250" height="34">
            <tr>
              <td width="32" height="40"><a class="thumbnail" href="#"><img src="fotos de las peliculas/3.jpg" width="30px" height="30px" border="0" /><span><img src="fotos de las peliculas/3.jpg" width="320" height="220"/><br />
              </span></a></td>
              <td width="206"><span class="Estilo8">Alas de papel (2005)</span></td>
            </tr>
          </table>
          <a class="thumbnail" href="#"><span><img src="fotos de las peliculas/1.jpg"/></span></a></td>
        <td height="34" bgcolor="#000000"><label>
            <div align="center">
              <input type="checkbox" name="checkbox342" value="h" />
            </div>
          </label></td>
        <td height="34" bgcolor="#000000"><table width="250" height="34">
            <tr>
              <td width="32" height="40"><a class="thumbnail" href="#"><img src="fotos de las peliculas/30.jpg" width="30px" height="30px" border="0" /><span><img src="fotos de las peliculas/30.jpg" /><br />
              </span></a></td>
              <td width="206"><span class="Estilo8">El Regreso (2009)</span></td>
            </tr>
          </table>
          <a class="thumbnail" href="#"><span><img src="fotos de las peliculas/1.jpg"/></span></a></td>
        <td height="34" bgcolor="#000000"><label>
            <div align="center">
              <input type="checkbox" name="checkbox342" value="i" />
            </div>
          </label></td>
        <td height="34" bgcolor="#000000"><table width="250" height="34">
            <tr>
              <td width="32" height="40"><a class="thumbnail" href="#"><img src="fotos de las peliculas/56.jpg" width="30px" height="30px" border="0" /><span><img src="fotos de las peliculas/56.jpg" width="200" height="250"/><br />
              </span></a></td>
              <td width="206"><span class="Estilo8">Los Condenados (2009)</span></td>
            </tr>
          </table>
          <a class="thumbnail" href="#"><span><img src="fotos de las peliculas/1.jpg"/></span></a></td>
      </tr>
      <tr>
        <td height="34" bgcolor="#000000"><label>
            <div align="center">
              <input type="checkbox" name="checkbox342" value="j" />
            </div>
          </label></td>
        <td height="34" bgcolor="#000000"><table width="250" height="34">
            <tr>
              <td width="32" height="40"><a class="thumbnail" href="#"><img src="fotos de las peliculas/4.jpg" width="30px" height="30px" border="0" /><span><img src="fotos de las peliculas/4.jpg" width="220" height="280"/><br />
              </span></a></td>
              <td width="206"><span class="Estilo8">Alma y el viaje al mar  (2003)</span></td>
            </tr>
          </table>
          <a class="thumbnail" href="#"><span><img src="fotos de las peliculas/1.jpg"/></span></a></td>
        <td height="34" bgcolor="#000000"><label>
            <div align="center">
              <input type="checkbox" name="checkbox342" value="k" />
            </div>
          </label></td>
        <td height="34" bgcolor="#000000"><table width="250" height="34">
            <tr>
              <td width="32" height="40"><a class="thumbnail" href="#"><img src="fotos de las peliculas/31.jpg" width="30px" height="30px" border="0" /><span><img src="fotos de las peliculas/31.jpg" width="220" height="270"/><br />
              </span></a></td>
              <td width="206"><span class="Estilo8">El Triangulo del Lago (2000)</span></td>
            </tr>
          </table>
          <a class="thumbnail" href="#"><span><img src="fotos de las peliculas/1.jpg"/></span></a></td>
        <td height="34" bgcolor="#000000"><label>
            <div align="center">
              <input type="checkbox" name="checkbox342" value="l" />
            </div>
          </label></td>
        <td height="34" bgcolor="#000000"><table width="250" height="34">
            <tr>
              <td width="32" height="40"><a class="thumbnail" href="#"><img src="fotos de las peliculas/57.jpg" width="30px" height="30px" border="0" /><span><img src="fotos de las peliculas/57.jpg" width="250" height="340"/><br />
              </span></a></td>
              <td width="206"><span class="Estilo8">Los Hermanos Cartagena  (1984)</span></td>
            </tr>
          </table>
          <a class="thumbnail" href="#"><span><img src="fotos de las peliculas/1.jpg"/></span></a></td>
      </tr>
      <tr>
        <td height="34" bgcolor="#000000"><label>
            <div align="center">
              <input type="checkbox" name="checkbox342" value="m" />
            </div>
          </label></td>
        <td height="34" bgcolor="#000000"><table width="250" height="34">
            <tr>
              <td width="32" height="40"><a class="thumbnail" href="#"><img src="fotos de las peliculas/5.jpg" width="30px" height="30px" border="0" /><span><img src="fotos de las peliculas/5.jpg" width="200" height="250"/><br />
              </span></a></td>
              <td width="206"><span class="Estilo8">Amargo Mar (1984)</span></td>
            </tr>
          </table>
          <a class="thumbnail" href="#"><span><img src="fotos de las peliculas/1.jpg"/></span></a></td>
        <td height="34" bgcolor="#000000"><label>
            <div align="center">
              <input type="checkbox" name="checkbox342" value="n" />
            </div>
          </label></td>
        <td height="34" bgcolor="#000000"><table width="250" height="34">
            <tr>
              <td width="32" height="40"><a class="thumbnail" href="#"><img src="fotos de las peliculas/32.jpg" width="30px" height="30px" border="0" /><span><img src="fotos de las peliculas/32.jpg" width="200" height="250"/><br />
              </span></a></td>
              <td width="206"><span class="Estilo8">El Ultimo Caudillo (2009)</span></td>
            </tr>
          </table>
          <a class="thumbnail" href="#"><span><img src="fotos de las peliculas/1.jpg"/></span></a></td>
        <td height="34" bgcolor="#000000"><label>
            <div align="center">
              <input type="checkbox" name="checkbox342" value="o" />
            </div>
          </label></td>
        <td height="34" bgcolor="#000000"><table width="250" height="34">
            <tr>
              <td width="32" height="40"><a class="thumbnail" href="#"><img src="fotos de las peliculas/58.jpg" width="30px" height="30px" border="0" /><span><img src="fotos de las peliculas/58.jpg" width="250" height="250"/><br />
              </span></a></td>
              <td width="206"><span class="Estilo8">Los Hijos del sol (2003)</span></td>
            </tr>
          </table>
          <a class="thumbnail" href="#"><span><img src="fotos de las peliculas/1.jpg"/></span></a></td>
      </tr>
      <tr>
        <td height="34" bgcolor="#000000"><label>
            <div align="center">
              <input type="checkbox" name="checkbox342" value="p" />
            </div>
          </label></td>
        <td height="34" bgcolor="#000000"><table width="250" height="34">
            <tr>
              <td width="32" height="40"><a class="thumbnail" href="#"><img src="fotos de las peliculas/6.jpg" width="30px" height="30px" border="0" /><span><img src="fotos de las peliculas/6.jpg" /><br />
              </span></a></td>
              <td width="206"><span class="Estilo8">América Tiene Alma (2009)</span></td>
            </tr>
          </table>
          <a class="thumbnail" href="#"><span><img src="fotos de las peliculas/1.jpg"/></span></a></td>
        <td height="34" bgcolor="#000000"><label>
            <div align="center">
              <input type="checkbox" name="checkbox342" value="q" />
            </div>
          </label></td>
        <td height="34" bgcolor="#000000"><table width="250" height="34">
            <tr>
              <td width="32" height="40"><a class="thumbnail" href="#"><img src="fotos de las peliculas/33.jpg" width="30px" height="30px" border="0" /><span><img src="fotos de las peliculas/33.jpg" width="210" height="270"/><br />
              </span></a></td>
              <td width="206"><span class="Estilo8">Escrito en el agua (2000)</span></td>
            </tr>
          </table>
          <a class="thumbnail" href="#"><span><img src="fotos de las peliculas/1.jpg"/></span></a></td>
        <td height="34" bgcolor="#000000"><label>
            <div align="center">
              <input type="checkbox" name="checkbox342" value="r" />
            </div>
          </label></td>
        <td height="34" bgcolor="#000000"><table width="250" height="34">
            <tr>
              <td width="32" height="40"><a class="thumbnail" href="#"><img src="fotos de las peliculas/59.jpg" width="30px" height="30px" border="0" /><span><img src="fotos de las peliculas/59.jpg" width="200" height="250"/><br />
              </span></a></td>
              <td width="206"><span class="Estilo8">Los Hijos del último  jardín (2004)</span></td>
            </tr>
          </table>
          <a class="thumbnail" href="#"><span><img src="fotos de las peliculas/1.jpg"/></span></a></td>
      </tr>
      <tr>
        <td height="34" bgcolor="#000000"><label>
            <div align="center">
              <input type="checkbox" name="checkbox3422" value="s" />
            </div>
          </label></td>
        <td height="34" bgcolor="#000000"><table width="250" height="34">
            <tr>
              <td width="32" height="40"><a class="thumbnail" href="#"><img src="fotos de las peliculas/7.jpg" width="30px" height="30px" border="0" /><span><img src="fotos de las peliculas/7.jpg" width="300" height="250"/><br />
              </span></a></td>
              <td width="206"><span class="Estilo8">American visa (2005)</span></td>
            </tr>
          </table>
          <a class="thumbnail" href="#"><span><img src="fotos de las peliculas/1.jpg"/></span></a></td>
        <td height="34" bgcolor="#000000"><label>
            <div align="center">
              <input type="checkbox" name="checkbox342" value="t" />
            </div>
          </label></td>
        <td height="34" bgcolor="#000000"><table width="250" height="34">
            <tr>
              <td width="32" height="40"><a class="thumbnail" href="#"><img src="fotos de las peliculas/34.jpg" width="30px" height="30px" border="0" /><span><img src="fotos de las peliculas/34.jpg" width="200" height="250"/><br />
              </span></a></td>
              <td width="206"><span class="Estilo8">Esito seria (2004)</span></td>
            </tr>
          </table>
          <a class="thumbnail" href="#"><span><img src="fotos de las peliculas/1.jpg"/></span></a></td>
        <td height="34" bgcolor="#000000"><label>
            <div align="center">
              <input type="checkbox" name="checkbox342" value="u" />
            </div>
          </label></td>
        <td height="34" bgcolor="#000000"><table width="250" height="34">
            <tr>
              <td width="32" height="40"><a class="thumbnail" href="#"><img src="fotos de las peliculas/60.jpg" width="30px" height="30px" border="0" /><span><img src="fotos de las peliculas/60.jpg" width="200" height="250"/><br />
              </span></a></td>
              <td width="206"><span class="Estilo8">Los Hombres del lago  (2008)</span></td>
            </tr>
          </table>
          <a class="thumbnail" href="#"><span><img src="fotos de las peliculas/1.jpg"/></span></a></td>
      </tr>
      <tr>
        <td height="34" bgcolor="#000000"><label>
            <div align="center">
              <input type="checkbox" name="checkbox3423" value="v" />
            </div>
          </label></td>
        <td height="34" bgcolor="#000000"><table width="250" height="34">
            <tr>
              <td width="32" height="40"><a class="thumbnail" href="#"><img src="fotos de las peliculas/8.jpg" width="30px" height="30px" border="0" /><span><img src="fotos de las peliculas/8.jpg" width="200" height="250"/><br />
              </span></a></td>
              <td width="206"><span class="Estilo8">Amores de Lumbre (2009)</span></td>
            </tr>
          </table>
          <a class="thumbnail" href="#"><span><img src="fotos de las peliculas/1.jpg"/></span></a></td>
        <td height="34" bgcolor="#000000"><label>
            <div align="center">
              <input type="checkbox" name="checkbox342" value="w" />
            </div>
          </label></td>
        <td height="34" bgcolor="#000000"><table width="250" height="34">
            <tr>
              <td width="32" height="40"><a class="thumbnail" href="#"><img src="fotos de las peliculas/35.jpg" width="30px" height="30px" border="0" /><span><img src="fotos de las peliculas/35.jpg" width="200" height="250"/><br />
              </span></a></td>
              <td width="206"><span class="Estilo8">Espíritus independientes  (2004)</span></td>
            </tr>
          </table>
          <a class="thumbnail" href="#"><span><img src="fotos de las peliculas/1.jpg"/></span></a></td>
        <td height="34" bgcolor="#000000"><label>
            <div align="center">
              <input type="checkbox" name="checkbox342" value="x" />
            </div>
          </label></td>
        <td height="34" bgcolor="#000000"><table width="250" height="34">
            <tr>
              <td width="32" height="40"><a class="thumbnail" href="#"><img src="fotos de las peliculas/61.bmp" width="30px" height="30px" border="0" /><span><img src="fotos de las peliculas/61.bmp" width="320" height="220"/><br />
              </span></a></td>
              <td width="206"><span class="Estilo8">Los Yuquises (2006)</span></td>
            </tr>
          </table>
          <a class="thumbnail" href="#"><span><img src="fotos de las peliculas/1.jpg"/></span></a></td>
      </tr>
      <tr>
        <td height="34" bgcolor="#000000"><label>
            <div align="center">
              <input type="checkbox" name="checkbox342" value="y" />
            </div>
          </label></td>
        <td height="34" bgcolor="#000000"><table width="250" height="34">
            <tr>
              <td width="32" height="40"><a class="thumbnail" href="#"><img src="fotos de las peliculas/9.gif" width="30px" height="30px" border="0" /><span><img src="fotos de las peliculas/9.gif" width="200" height="270"/><br />
              </span></a></td>
              <td width="206"><span class="Estilo8">Armas de casa (2007)</span></td>
            </tr>
          </table>
          <a class="thumbnail" href="#"><span><img src="fotos de las peliculas/1.jpg"/></span></a></td>
        <td height="34" bgcolor="#000000"><label>
            <div align="center">
              <input type="checkbox" name="checkbox342" value="z" />
            </div>
          </label></td>
        <td height="34" bgcolor="#000000"><table width="250" height="34">
            <tr>
              <td width="32" height="40"><a class="thumbnail" href="#"><img src="fotos de las peliculas/36.jpg" width="30px" height="30px" border="0" /><span><img src="fotos de las peliculas/36.jpg" width="230" height="290"/><br />
              </span></a></td>
              <td width="206"><span class="Estilo8">Estado de las cosas  (2007)</span></td>
            </tr>
          </table>
          <a class="thumbnail" href="#"><span><img src="fotos de las peliculas/1.jpg"/></span></a></td>
        <td height="34" bgcolor="#000000"><label>
            <div align="center">
              <input type="checkbox" name="checkbox342" value="aa" />
            </div>
          </label></td>
        <td height="34" bgcolor="#000000"><table width="250" height="34">
            <tr>
              <td width="32" height="40"><a class="thumbnail" href="#"><img src="fotos de las peliculas/62.jpg" width="30px" height="30px" border="0" /><span><img src="fotos de las peliculas/62.jpg" width="320" height="220"/><br />
              </span></a></td>
              <td width="206"><span class="Estilo8">Margaritas negras (2004)</span></td>
            </tr>
          </table>
          <a class="thumbnail" href="#"><span><img src="fotos de las peliculas/1.jpg"/></span></a></td>
      </tr>
      <tr>
        <td height="34" bgcolor="#000000"><label>
            <div align="center">
              <input type="checkbox" name="checkbox342" value="ab" />
            </div>
          </label></td>
        <td height="34" bgcolor="#000000"><table width="250" height="34">
            <tr>
              <td width="32" height="40"><a class="thumbnail" href="#"><img src="fotos de las peliculas/10.jpg" width="30px" height="30px" border="0" /><span><img src="fotos de las peliculas/10.jpg" width="300" height="220"/><br />
              </span></a></td>
              <td width="206"><span class="Estilo8">Autonomía (2002)</span></td>
            </tr>
          </table>
          <a class="thumbnail" href="#"><span><img src="fotos de las peliculas/1.jpg"/></span></a></td>
        <td height="34" bgcolor="#000000"><label>
            <div align="center">
              <input type="checkbox" name="checkbox342" value="ac" />
            </div>
          </label></td>
        <td height="34" bgcolor="#000000"><table width="250" height="34">
            <tr>
              <td width="32" height="40"><a class="thumbnail" href="#"><img src="fotos de las peliculas/37.bmp" width="30px" height="30px" border="0" /><span><img src="fotos de las peliculas/37.bmp" width="320" height="220"/><br />
              </span></a></td>
              <td width="206"><span class="Estilo8">Evo pueblo (2007)</span></td>
            </tr>
          </table>
          <a class="thumbnail" href="#"><span><img src="fotos de las peliculas/1.jpg"/></span></a></td>
        <td height="34" bgcolor="#000000"><label>
            <div align="center">
              <input type="checkbox" name="checkbox342" value="ad" />
            </div>
          </label></td>
        <td height="34" bgcolor="#000000"><table width="250" height="34">
            <tr>
              <td width="32" height="40"><a class="thumbnail" href="#"><img src="fotos de las peliculas/63.jpg" width="30px" height="30px" border="0" /><span><img src="fotos de las peliculas/63.jpg" /><br />
              </span></a></td>
              <td width="206"><span class="Estilo8">Mi Socio (1982)</span></td>
            </tr>
          </table>
          <a class="thumbnail" href="#"><span><img src="fotos de las peliculas/1.jpg"/></span></a></td>
      </tr>
      <tr>
        <td height="34" bgcolor="#000000"><label>
            <div align="center">
              <input type="checkbox" name="checkbox342" value="ae" />
            </div>
          </label></td>
        <td height="34" bgcolor="#000000"><table width="250" height="34">
            <tr>
              <td width="32" height="40"><a class="thumbnail" href="#"><img src="fotos de las peliculas/11.jpg" width="30px" height="30px" border="0" /><span><img src="fotos de las peliculas/11.jpg" width="200" height="250"/><br />
              </span></a></td>
              <td width="206"><span class="Estilo8">Campo de Batalla (2009)</span></td>
            </tr>
          </table>
          <a class="thumbnail" href="#"><span><img src="fotos de las peliculas/1.jpg"/></span></a></td>
        <td height="34" bgcolor="#000000"><label>
            <div align="center">
              <input type="checkbox" name="checkbox342" value="af" />
            </div>
          </label></td>
        <td height="34" bgcolor="#000000"><table width="250" height="34">
            <tr>
              <td width="32" height="40"><a class="thumbnail" href="#"><img src="fotos de las peliculas/38.jpg" width="30px" height="30px" border="0" /><span><img src="fotos de las peliculas/38.jpg" width="320" height="220"/><br />
              </span></a></td>
              <td width="206"><span class="Estilo8">Faustino Mayta (2003)</span></td>
            </tr>
          </table>
          <a class="thumbnail" href="#"><span><img src="fotos de las peliculas/1.jpg"/></span></a></td>
        <td height="34" bgcolor="#000000"><label>
            <div align="center">
              <input type="checkbox" name="checkbox342" value="ag" />
            </div>
          </label></td>
        <td height="34" bgcolor="#000000"><table width="250" height="34">
            <tr>
              <td width="32" height="40"><a class="thumbnail" href="#"><img src="fotos de las peliculas/64.jpg" width="30px" height="30px" border="0" /><span><img src="fotos de las peliculas/64.jpg" width="320" height="220"/><br />
              </span></a></td>
              <td width="206"><span class="Estilo8">No Veo España (2009)</span></td>
            </tr>
          </table>
          <a class="thumbnail" href="#"><span><img src="fotos de las peliculas/1.jpg"/></span></a></td>
      </tr>
      <tr>
        <td height="34" bgcolor="#000000"><label>
            <div align="center">
              <input type="checkbox" name="checkbox342" value="ah" />
            </div>
          </label></td>
        <td height="34" bgcolor="#000000"><table width="250" height="34">
            <tr>
              <td width="32" height="40"><a class="thumbnail" href="#"><img src="fotos de las peliculas/12.jpg" width="30px" height="30px" border="0" /><span><img src="fotos de las peliculas/12.jpg" width="300" height="300"/><br />
              </span></a></td>
              <td width="206"><span class="Estilo8">Cementerio de los  Elefantes (2009)</span></td>
            </tr>
          </table>
          <a class="thumbnail" href="#"><span><img src="fotos de las peliculas/1.jpg"/></span></a></td>
        <td height="34" bgcolor="#000000"><label>
            <div align="center">
              <input type="checkbox" name="checkbox342" value="ai" />
            </div>
          </label></td>
        <td height="34" bgcolor="#000000"><table width="250" height="34">
            <tr>
              <td width="32" height="40"><a class="thumbnail" href="#"><img src="fotos de las peliculas/39.jpg" width="30px" height="30px" border="0" /><span><img src="fotos de las peliculas/39.jpg" width="200" height="250"/><br />
              </span></a></td>
              <td width="206"><span class="Estilo8">Fuego de Libertad (2009)</span></td>
            </tr>
          </table>
          <a class="thumbnail" href="#"><span><img src="fotos de las peliculas/1.jpg"/></span></a></td>
        <td height="34" bgcolor="#000000"><label>
            <div align="center">
              <input type="checkbox" name="checkbox342" value="aj" />
            </div>
          </label></td>
        <td height="34" bgcolor="#000000"><table width="250" height="34">
            <tr>
              <td width="32" height="40"><a class="thumbnail" href="#"><img src="fotos de las peliculas/65.jpg" width="30px" height="30px" border="0" /><span><img src="fotos de las peliculas/65.jpg" width="200" height="250"/><br />
              </span></a></td>
              <td width="206"><span class="Estilo8">Nocturnia (2008)</span></td>
            </tr>
          </table>
          <a class="thumbnail" href="#"><span><img src="fotos de las peliculas/1.jpg"/></span></a></td>
      </tr>
      <tr>
        <td height="34" bgcolor="#000000"><label>
            <div align="center">
              <input type="checkbox" name="checkbox342" value="ak" />
            </div>
          </label></td>
        <td height="34" bgcolor="#000000"><table width="250" height="34">
            <tr>
              <td width="32" height="40"><a class="thumbnail" href="#"><img src="fotos de las peliculas/13.jpg" width="30px" height="30px" border="0" /><span><img src="fotos de las peliculas/13.jpg" width="320" height="220"/><br />
              </span></a></td>
              <td width="206"><span class="Estilo8">Cocalero (2007)</span></td>
            </tr>
          </table>
          <a class="thumbnail" href="#"><span><img src="fotos de las peliculas/1.jpg"/></span></a></td>
        <td height="34" bgcolor="#000000"><label>
            <div align="center">
              <input type="checkbox" name="checkbox342" value="al" />
            </div>
          </label></td>
        <td height="34" bgcolor="#000000"><table width="250" height="34">
            <tr>
              <td width="32" height="40"><a class="thumbnail" href="#"><img src="fotos de las peliculas/40.jpg" width="30px" height="30px" border="0" /><span><img src="fotos de las peliculas/40.jpg" width="300" height="200"/><br />
              </span></a></td>
              <td width="206"><span class="Estilo8">Hartos Evo aquí hay  (2006)</span></td>
            </tr>
          </table>
          <a class="thumbnail" href="#"><span><img src="fotos de las peliculas/1.jpg"/></span></a></td>
        <td height="34" bgcolor="#000000"><label>
            <div align="center">
              <input type="checkbox" name="checkbox342" value="am" />
            </div>
          </label></td>
        <td height="34" bgcolor="#000000"><table width="250" height="34">
            <tr>
              <td width="32" height="40"><a class="thumbnail" href="#"><img src="fotos de las peliculas/66.jpg" width="30px" height="30px" border="0" /><span><img src="fotos de las peliculas/66.jpg" width="320" height="220"/><br />
              </span></a></td>
              <td width="206"><span class="Estilo8">Nostalgias del rock  (2005)</span></td>
            </tr>
          </table>
          <a class="thumbnail" href="#"><span><img src="fotos de las peliculas/1.jpg"/></span></a></td>
      </tr>
      <tr>
        <td height="34" bgcolor="#000000"><label>
            <div align="center">
              <input type="checkbox" name="checkbox342" value="an" />
            </div>
          </label></td>
        <td height="34" bgcolor="#000000"><table width="250" height="34">
            <tr>
              <td width="32" height="40"><a class="thumbnail" href="#"><img src="fotos de las peliculas/14.jpg" width="30px" height="30px" border="0" /><span><img src="fotos de las peliculas/14.jpg" width="220" height="270"/><br />
              </span></a></td>
              <td width="206"><span class="Estilo8">Corazón de Jesús (2004)</span></td>
            </tr>
          </table>
          <a class="thumbnail" href="#"><span><img src="fotos de las peliculas/1.jpg"/></span></a></td>
        <td height="34" bgcolor="#000000"><label>
            <div align="center">
              <input type="checkbox" name="checkbox342" value="ao" />
            </div>
          </label></td>
        <td height="34" bgcolor="#000000"><table width="250" height="34">
            <tr>
              <td width="32" height="40"><a class="thumbnail" href="#"><img src="fotos de las peliculas/41.jpg" width="30px" height="30px" border="0" /><span><img src="fotos de las peliculas/41.jpg" width="200" height="250"/><br />
              </span></a></td>
              <td width="206"><span class="Estilo8">Historia de Vino,  Singani y Alcoba (2009)</span></td>
            </tr>
          </table>
          <a class="thumbnail" href="#"><span><img src="fotos de las peliculas/1.jpg"/></span></a></td>
        <td height="34" bgcolor="#000000"><label>
            <div align="center">
              <input type="checkbox" name="checkbox342" value="ap" />
            </div>
          </label></td>
        <td height="34" bgcolor="#000000"><table width="250" height="34">
            <tr>
              <td width="32" height="40"><a class="thumbnail" href="#"><img src="fotos de las peliculas/67.jpg" width="30px" height="30px" border="0" /><span><img src="fotos de las peliculas/67.jpg" width="320" height="220"/><br />
              </span></a></td>
              <td width="206"><span class="Estilo8">Psico urbano (2006)</span></td>
            </tr>
          </table>
          <a class="thumbnail" href="#"><span><img src="fotos de las peliculas/1.jpg"/></span></a></td>
      </tr>
      <tr>
        <td height="34" bgcolor="#000000"><label>
            <div align="center">
              <input type="checkbox" name="checkbox342" value="aq" />
            </div>
          </label></td>
        <td height="34" bgcolor="#000000"><table width="250" height="34">
            <tr>
              <td width="32" height="40"><a class="thumbnail" href="#"><img src="fotos de las peliculas/15.jpg" width="30px" height="30px" border="0" /><span><img src="fotos de las peliculas/15.jpg" /><br />
              </span></a></td>
              <td width="206"><span class="Estilo8">Cuestión de fe (1995)</span></td>
            </tr>
          </table>
          <a class="thumbnail" href="#"><span><img src="fotos de las peliculas/1.jpg"/></span></a></td>
        <td height="34" bgcolor="#000000"><label>
            <div align="center">
              <input type="checkbox" name="checkbox342" value="ar" />
            </div>
          </label></td>
        <td height="34" bgcolor="#000000"><table width="250" height="34">
            <tr>
              <td width="32" height="40"><a class="thumbnail" href="#"><img src="fotos de las peliculas/42.jpg" width="30px" height="30px" border="0" /><span><img src="fotos de las peliculas/42.jpg" width="320" height="220"/><br />
              </span></a></td>
              <td width="206"><span class="Estilo8">Hospital Obrero  (2009)</span></td>
            </tr>
          </table>
          <a class="thumbnail" href="#"><span><img src="fotos de las peliculas/1.jpg"/></span></a></td>
        <td height="34" bgcolor="#000000"><label>
            <div align="center">
              <input type="checkbox" name="checkbox342" value="as" />
            </div>
          </label></td>
        <td height="34" bgcolor="#000000"><table width="250" height="34">
            <tr>
              <td width="32" height="40"><a class="thumbnail" href="#"><img src="fotos de las peliculas/68.jpg" width="30px" height="30px" border="0" /><span><img src="fotos de las peliculas/68.jpg" width="340" height="240"/><br />
              </span></a></td>
              <td width="206"><span class="Estilo8">Quien mato a la llamita blanca  (2006)</span></td>
            </tr>
          </table>
          <a class="thumbnail" href="#"><span><img src="fotos de las peliculas/1.jpg"/></span></a></td>
      </tr>
      <tr>
        <td height="34" bgcolor="#000000"><label>
            <div align="center">
              <input type="checkbox" name="checkbox342" value="at" />
            </div>
          </label></td>
        <td height="34" bgcolor="#000000"><table width="250" height="34">
            <tr>
              <td width="32" height="40"><a class="thumbnail" href="#"><img src="fotos de las peliculas/16.jpg" width="30px" height="30px" border="0" /><span><img src="fotos de las peliculas/16.jpg" width="220" height="270"/><br />
              </span></a></td>
              <td width="206"><span class="Estilo8">Dependencia sexual (2003)</span></td>
            </tr>
          </table>
          <a class="thumbnail" href="#"><span><img src="fotos de las peliculas/1.jpg"/></span></a></td>
        <td height="34" bgcolor="#000000"><label>
            <div align="center">
              <input type="checkbox" name="checkbox342" value="au" />
            </div>
          </label></td>
        <td height="34" bgcolor="#000000"><table width="250" height="34">
            <tr>
              <td width="32" height="40"><a class="thumbnail" href="#"><img src="fotos de las peliculas/43.png" width="30px" height="30px" border="0" /><span><img src="fotos de las peliculas/43.png" width="320" height="220"/><br />
              </span></a></td>
              <td width="206"><span class="Estilo8">Huanuni de pie a pesar  de todo (2007)</span></td>
            </tr>
          </table>
          <a class="thumbnail" href="#"><span><img src="fotos de las peliculas/1.jpg"/></span></a></td>
        <td height="34" bgcolor="#000000"><label>
            <div align="center">
              <input type="checkbox" name="checkbox342" value="av" />
            </div>
          </label></td>
        <td height="34" bgcolor="#000000"><table width="250" height="34">
            <tr>
              <td width="32" height="40"><a class="thumbnail" href="#"><img src="fotos de las peliculas/69.jpg" width="30px" height="30px" border="0" /><span><img src="fotos de las peliculas/69.jpg" width="200" height="250"/><br />
              </span></a></td>
              <td width="206"><span class="Estilo8">Reconstrucción (2008)</span></td>
            </tr>
          </table>
          <a class="thumbnail" href="#"><span><img src="fotos de las peliculas/1.jpg"/></span></a></td>
      </tr>
      <tr>
        <td height="34" bgcolor="#000000"><label>
            <div align="center">
              <input type="checkbox" name="checkbox342" value="aw" />
            </div>
          </label></td>
        <td height="34" bgcolor="#000000"><table width="250" height="34">
            <tr>
              <td width="32" height="40"><a class="thumbnail" href="#"><img src="fotos de las peliculas/17.jpg" width="30px" height="30px" border="0" /><span><img src="fotos de las peliculas/17.jpg" width="200" height="250"/><br />
              </span></a></td>
              <td width="206"><span class="Estilo8">Desde el fondo (2008)</span></td>
            </tr>
          </table>
          <a class="thumbnail" href="#"><span><img src="fotos de las peliculas/1.jpg"/></span></a></td>
        <td height="34" bgcolor="#000000"><label>
            <div align="center">
              <input type="checkbox" name="checkbox342" value="ax" />
            </div>
          </label></td>
        <td height="34" bgcolor="#000000"><table width="250" height="34">
            <tr>
              <td width="32" height="40"><a class="thumbnail" href="#"><img src="fotos de las peliculas/44.jpg" width="30px" height="30px" border="0" /><span><img src="fotos de las peliculas/44.jpg" width="200" height="250"/><br />
              </span></a></td>
              <td width="206"><span class="Estilo8">I am Bolivia (2006)</span></td>
            </tr>
          </table>
          <a class="thumbnail" href="#"><span><img src="fotos de las peliculas/1.jpg"/></span></a></td>
        <td height="34" bgcolor="#000000"><label>
            <div align="center">
              <input type="checkbox" name="checkbox342" value="ay" />
            </div>
          </label></td>
        <td height="34" bgcolor="#000000"><table width="250" height="34">
            <tr>
              <td width="32" height="40"><a class="thumbnail" href="#"><img src="fotos de las peliculas/70.jpg" width="30px" height="30px" border="0" /><span><img src="fotos de las peliculas/70.jpg" width="320" height="220"/><br />
              </span></a></td>
              <td width="206"><span class="Estilo8">Ring ring (2008)</span></td>
            </tr>
          </table>
          <a class="thumbnail" href="#"><span><img src="fotos de las peliculas/1.jpg"/></span></a></td>
      </tr>
      <tr>
        <td height="34" bgcolor="#000000"><label>
            <div align="center">
              <input type="checkbox" name="checkbox342" value="az" />
            </div>
          </label></td>
        <td height="34" bgcolor="#000000"><table width="250" height="34">
            <tr>
              <td width="32" height="40"><a class="thumbnail" href="#"><img src="fotos de las peliculas/18.jpg" width="30px" height="30px" border="0" /><span><img src="fotos de las peliculas/18.jpg" width="200" height="250"/><br />
              </span></a></td>
              <td width="206"><span class="Estilo8">Di buen día a papa (2005)</span></td>
            </tr>
          </table>
          <a class="thumbnail" href="#"><span><img src="fotos de las peliculas/1.jpg"/></span></a></td>
        <td height="34" bgcolor="#000000"><label>
            <div align="center">
              <input type="checkbox" name="checkbox342" value="ba" />
            </div>
          </label></td>
        <td height="34" bgcolor="#000000"><table width="250" height="34">
            <tr>
              <td width="32" height="40"><a class="thumbnail" href="#"><img src="fotos de las peliculas/45.jpg" width="30px" height="30px" border="0" /><span><img src="fotos de las peliculas/45.jpg" /><br />
              </span></a></td>
              <td width="206"><span class="Estilo8">Jonás y la ballena  rosada (1995)</span></td>
            </tr>
          </table>
          <a class="thumbnail" href="#"><span><img src="fotos de las peliculas/1.jpg"/></span></a></td>
        <td height="34" bgcolor="#000000"><label>
            <div align="center">
              <input type="checkbox" name="checkbox342" value="bb" />
            </div>
          </label></td>
        <td height="34" bgcolor="#000000"><table width="250" height="34">
            <tr>
              <td width="32" height="40"><a class="thumbnail" href="#"><img src="fotos de las peliculas/71.jpg" width="30px" height="30px" border="0" /><span><img src="fotos de las peliculas/71.jpg" width="200" height="250"/><br />
              </span></a></td>
              <td width="206"><span class="Estilo8">Rojo, Amarillo y Verde  (2009)</span></td>
            </tr>
          </table>
          <a class="thumbnail" href="#"><span><img src="fotos de las peliculas/1.jpg"/></span></a></td>
      </tr>
      <tr>
        <td height="34" bgcolor="#000000"><label>
            <div align="center">
              <input type="checkbox" name="checkbox342" value="bc" />
            </div>
          </label></td>
        <td height="34" bgcolor="#000000"><table width="250" height="34">
            <tr>
              <td width="32" height="40"><a class="thumbnail" href="#"><img src="fotos de las peliculas/19.jpg" width="30px" height="30px" border="0" /><span><img src="fotos de las peliculas/19.jpg" width="200" height="250"/><br />
              </span></a></td>
              <td width="206"><span class="Estilo8">Día de boda (2008)</span></td>
            </tr>
          </table>
          <a class="thumbnail" href="#"><span><img src="fotos de las peliculas/1.jpg"/></span></a></td>
        <td height="34" bgcolor="#000000"><label>
            <div align="center">
              <input type="checkbox" name="checkbox342" value="bd" />
            </div>
          </label></td>
        <td height="34" bgcolor="#000000"><table width="250" height="34">
            <tr>
              <td width="32" height="40"><a class="thumbnail" href="#"><img src="fotos de las peliculas/46.jpg" width="30px" height="30px" border="0" /><span><img src="fotos de las peliculas/46.jpg" width="320" height="220"/><br />
              </span></a></td>
              <td width="206"><span class="Estilo8">La Chirola (2009)</span></td>
            </tr>
          </table>
          <a class="thumbnail" href="#"><span><img src="fotos de las peliculas/1.jpg"/></span></a></td>
        <td height="34" bgcolor="#000000"><label>
            <div align="center">
              <input type="checkbox" name="checkbox342" value="be" />
            </div>
          </label></td>
        <td height="34" bgcolor="#000000"><table width="250" height="34">
            <tr>
              <td width="32" height="40"><a class="thumbnail" href="#"><img src="fotos de las peliculas/72.jpg" width="30px" height="30px" border="0" /><span><img src="fotos de las peliculas/72.jpg" width="200" height="250"/><br />
              </span></a></td>
              <td width="206"><span class="Estilo8">San Ernesto nació en la  higuera (2007)</span></td>
            </tr>
          </table>
          <a class="thumbnail" href="#"><span><img src="fotos de las peliculas/1.jpg"/></span></a></td>
      </tr>
      <tr>
        <td height="34" bgcolor="#000000"><label>
            <div align="center">
              <input type="checkbox" name="checkbox3424" value="bf" />
            </div>
          </label></td>
        <td height="34" bgcolor="#000000"><table width="250" height="34">
            <tr>
              <td width="32" height="40"><a class="thumbnail" href="#"><img src="fotos de las peliculas/20.jpg" width="30px" height="30px" border="0" /><span><img src="fotos de las peliculas/20.jpg" width="320" height="220"/><br />
              </span></a></td>
              <td width="206"><span class="Estilo8">Eco Man (2009)</span></td>
            </tr>
          </table>
          <a class="thumbnail" href="#"><span><img src="fotos de las peliculas/1.jpg"/></span></a></td>
        <td height="34" bgcolor="#000000"><label>
            <div align="center">
              <input type="checkbox" name="checkbox342" value="bg" />
            </div>
          </label></td>
        <td height="34" bgcolor="#000000"><table width="250" height="34">
            <tr>
              <td width="32" height="40"><a class="thumbnail" href="#"><img src="fotos de las peliculas/47.jpg" width="30px" height="30px" border="0" /><span><img src="fotos de las peliculas/47.jpg" width="320" height="220"/><br />
              </span></a></td>
              <td width="206"><span class="Estilo8">La Ley de la noche (2005)</span></td>
            </tr>
          </table>
          <a class="thumbnail" href="#"><span><img src="fotos de las peliculas/1.jpg"/></span></a></td>
        <td height="34" bgcolor="#000000"><label>
            <div align="center">
              <input type="checkbox" name="checkbox342" value="bh" />
            </div>
          </label></td>
        <td height="34" bgcolor="#000000"><table width="250" height="34">
            <tr>
              <td width="32" height="40"><a class="thumbnail" href="#"><img src="fotos de las peliculas/73.jpg" width="30px" height="30px" border="0" /><span><img src="fotos de las peliculas/73.jpg" width="200" height="250"/><br />
              </span></a></td>
              <td width="206"><span class="Estilo8">Santos Markatula (2009)</span></td>
            </tr>
          </table>
          <a class="thumbnail" href="#"><span><img src="fotos de las peliculas/1.jpg"/></span></a></td>
      </tr>
      <tr>
        <td height="34" bgcolor="#000000"><label>
            <div align="center">
              <input type="checkbox" name="checkbox342" value="bi" />
            </div>
          </label></td>
        <td height="34" bgcolor="#000000"><table width="250" height="34">
            <tr>
              <td width="32" height="40"><a class="thumbnail" href="#"><img src="fotos de las peliculas/21.jpg" width="30px" height="30px" border="0" /><span><img src="fotos de las peliculas/21.jpg" width="200" height="250"/><br />
              </span></a></td>
              <td width="206"><span class="Estilo8">El Ascensor  (2009)</span></td>
            </tr>
          </table>
          <a class="thumbnail" href="#"><span><img src="fotos de las peliculas/1.jpg"/></span></a></td>
        <td height="34" bgcolor="#000000"><label>
            <div align="center">
              <input type="checkbox" name="checkbox342" value="bj" />
            </div>
          </label></td>
        <td height="34" bgcolor="#000000"><table width="250" height="34">
            <tr>
              <td width="32" height="40"><a class="thumbnail" href="#"><img src="fotos de las peliculas/48.jpg" width="30px" height="30px" border="0" /><span><img src="fotos de las peliculas/48.jpg" width="200" height="250"/><br />
              </span></a></td>
              <td width="206"><span class="Estilo8">La Maldición de Rocha  (2009)</span></td>
            </tr>
          </table>
          <a class="thumbnail" href="#"><span><img src="fotos de las peliculas/1.jpg"/></span></a></td>
        <td height="34" bgcolor="#000000"><label>
            <div align="center">
              <input type="checkbox" name="checkbox342" value="bk" />
            </div>
          </label></td>
        <td height="34" bgcolor="#000000"><table width="250" height="34">
            <tr>
              <td width="32" height="40"><a class="thumbnail" href="#"><img src="fotos de las peliculas/74.jpg" width="30px" height="30px" border="0" /><span><img src="fotos de las peliculas/74.jpg" width="220" height="270"/><br />
              </span></a></td>
              <td width="206"><span class="Estilo8">Sena/quina (2005)</span></td>
            </tr>
          </table>
          <a class="thumbnail" href="#"><span><img src="fotos de las peliculas/1.jpg"/></span></a></td>
      </tr>
      <tr>
        <td height="34" bgcolor="#000000"><label>
            <div align="center">
              <input type="checkbox" name="checkbox342" value="bl" />
            </div>
          </label></td>
        <td height="34" bgcolor="#000000"><table width="250" height="34">
            <tr>
              <td width="32" height="40"><a class="thumbnail" href="#"><img src="fotos de las peliculas/22.jpg" width="30px" height="30px" border="0" /><span><img src="fotos de las peliculas/22.jpg" width="200" height="250"/><br />
              </span></a></td>
              <td width="206"><span class="Estilo8">El Atraco (2004)</span></td>
            </tr>
          </table>
          <a class="thumbnail" href="#"><span><img src="fotos de las peliculas/1.jpg"/></span></a></td>
        <td height="34" bgcolor="#000000"><label>
            <div align="center">
              <input type="checkbox" name="checkbox342" value="bm" />
            </div>
          </label></td>
        <td height="34" bgcolor="#000000"><table width="250" height="34">
            <tr>
              <td width="32" height="40"><a class="thumbnail" href="#"><img src="fotos de las peliculas/49.jpg" width="30px" height="30px" border="0" /><span><img src="fotos de las peliculas/49.jpg" width="200" height="250"/><br />
              </span></a></td>
              <td width="206"><span class="Estilo8">La Nación clandestina  (1989)</span></td>
            </tr>
          </table>
          <a class="thumbnail" href="#"><span><img src="fotos de las peliculas/1.jpg"/></span></a></td>
        <td height="34" bgcolor="#000000"><label>
            <div align="center">
              <input type="checkbox" name="checkbox342" value="bn" />
            </div>
          </label></td>
        <td height="34" bgcolor="#000000"><table width="250" height="34">
            <tr>
              <td width="32" height="40"><a class="thumbnail" href="#"><img src="fotos de las peliculas/75.jpg" width="30px" height="30px" border="0" /><span><img src="fotos de las peliculas/75.jpg" width="200" height="250"/><br />
              </span></a></td>
              <td width="206"><span class="Estilo8">Trono (2001)</span></td>
            </tr>
          </table>
          <a class="thumbnail" href="#"><span><img src="fotos de las peliculas/1.jpg"/></span></a></td>
      </tr>
      <tr>
        <td height="34" bgcolor="#000000"><label>
            <div align="center">
              <input type="checkbox" name="checkbox342" value="bo" />
            </div>
          </label></td>
        <td height="34" bgcolor="#000000"><table width="250" height="34">
            <tr>
              <td width="32" height="40"><a class="thumbnail" href="#"><img src="fotos de las peliculas/23.bmp" width="30px" height="30px" border="0" /><span><img src="fotos de las peliculas/23.bmp" width="230" height="250"/><br />
              </span></a></td>
              <td width="206"><span class="Estilo8">El Clan (2006)</span></td>
            </tr>
          </table>
          <a class="thumbnail" href="#"><span><img src="fotos de las peliculas/1.jpg"/></span></a></td>
        <td height="34" bgcolor="#000000"><label>
            <div align="center">
              <input type="checkbox" name="checkbox342" value="bp" />
            </div>
          </label></td>
        <td height="34" bgcolor="#000000"><table width="250" height="34">
            <tr>
              <td width="32" height="40"><a class="thumbnail" href="#"><img src="fotos de las peliculas/50.gif" width="30px" height="30px" border="0" /><span><img src="fotos de las peliculas/50.gif" width="200" height="250"/><br />
              </span></a></td>
              <td width="206"><span class="Estilo8">La Noche con Orgalia  (2000)</span></td>
            </tr>
          </table>
          <a class="thumbnail" href="#"><span><img src="fotos de las peliculas/1.jpg"/></span></a></td>
        <td height="34" bgcolor="#000000"><label>
            <div align="center">
              <input type="checkbox" name="checkbox342" value="bq" />
            </div>
          </label></td>
        <td height="34" bgcolor="#000000"><table width="250" height="34">
            <tr>
              <td width="32" height="40"><a class="thumbnail" href="#"><img src="fotos de las peliculas/76.bmp" width="30px" height="30px" border="0" /><span><img src="fotos de las peliculas/76.bmp" width="220" height="270"/><br />
              </span></a></td>
              <td width="206"><span class="Estilo8">Un día más (2009)</span></td>
            </tr>
          </table>
          <a class="thumbnail" href="#"><span><img src="fotos de las peliculas/1.jpg"/></span></a></td>
      </tr>
      <tr>
        <td height="34" bgcolor="#000000"><label>
            <div align="center">
              <input type="checkbox" name="checkbox342" value="br" />
            </div>
          </label></td>
        <td height="34" bgcolor="#000000"><table width="250" height="34">
            <tr>
              <td width="32" height="40"><a class="thumbnail" href="#"><img src="fotos de las peliculas/24.JPG" width="30px" height="30px" border="0" /><span><img src="fotos de las peliculas/24.JPG" width="200" height="250"/><br />
              </span></a></td>
              <td width="206"><span class="Estilo8">El Comienzo fue en  Warizata (2009)</span></td>
            </tr>
          </table>
          <a class="thumbnail" href="#"><span><img src="fotos de las peliculas/1.jpg"/></span></a></td>
        <td height="34" bgcolor="#000000"><label>
            <div align="center">
              <input type="checkbox" name="checkbox342" value="bs" />
            </div>
          </label></td>
        <td height="34" bgcolor="#000000"><table width="250" height="34">
            <tr>
              <td width="32" height="40"><a class="thumbnail" href="#"><img src="fotos de las peliculas/51.jpg" width="30px" height="30px" border="0" /><span><img src="fotos de las peliculas/51.jpg" width="200" height="250"/><br />
              </span></a></td>
              <td width="206"><span class="Estilo8">La Promo (2008)</span></td>
            </tr>
          </table>
          <a class="thumbnail" href="#"><span><img src="fotos de las peliculas/1.jpg"/></span></a></td>
        <td height="34" bgcolor="#000000"><label>
            <div align="center">
              <input type="checkbox" name="checkbox342" value="bt" />
            </div>
          </label></td>
        <td height="34" bgcolor="#000000"><table width="250" height="34">
            <tr>
              <td width="32" height="40"><a class="thumbnail" href="#"><img src="fotos de las peliculas/77.jpg" width="30px" height="30px" border="0" /><span><img src="fotos de las peliculas/77.jpg" width="320" height="220"/><br />
              </span></a></td>
              <td width="206"><span class="Estilo8">Verse Mirar (2009)</span></td>
            </tr>
          </table>
          <a class="thumbnail" href="#"><span><img src="fotos de las peliculas/1.jpg"/></span></a></td>
      </tr>
      <tr>
        <td height="34" bgcolor="#000000"><label>
            <div align="center">
              <input type="checkbox" name="checkbox342" value="bu" />
            </div>
          </label></td>
        <td height="34" bgcolor="#000000"><table width="250" height="34">
            <tr>
              <td width="32" height="40"><a class="thumbnail" href="#"><img src="fotos de las peliculas/25.jpg" width="30px" height="30px" border="0" /><span><img src="fotos de las peliculas/25.jpg" width="320" height="320"/><br />
              </span></a></td>
              <td width="206"><span class="Estilo8">El Día que murió el  silencio (1998)</span></td>
            </tr>
          </table>
          <a class="thumbnail" href="#"><span><img src="fotos de las peliculas/1.jpg"/></span></a></td>
        <td height="34" bgcolor="#000000"><label>
            <div align="center">
              <input type="checkbox" name="checkbox342" value="bv" />
            </div>
          </label></td>
        <td height="34" bgcolor="#000000"><table width="250" height="34">
            <tr>
              <td width="32" height="40"><a class="thumbnail" href="#"><img src="fotos de las peliculas/52.jpg" width="30px" height="30px" border="0" /><span><img src="fotos de las peliculas/52.jpg" width="320" height="220"/><br />
              </span></a></td>
              <td width="206"><span class="Estilo8">Licorcito de coca (2007)</span></td>
            </tr>
          </table>
          <a class="thumbnail" href="#"><span><img src="fotos de las peliculas/1.jpg"/></span></a></td>
        <td height="34" bgcolor="#000000"><label>
            <div align="center">
              <input type="checkbox" name="checkbox342" value="bw" />
            </div>
          </label></td>
        <td height="34" bgcolor="#000000"><table width="250" height="34">
            <tr>
              <td width="32" height="40"><a class="thumbnail" href="#"><img src="fotos de las peliculas/78.jpg" width="30px" height="30px" border="0" /><span><img src="fotos de las peliculas/78.jpg" width="200" height="250"/><br />
              </span></a></td>
              <td width="206"><span class="Estilo8">Vientos Negros (2006)</span></td>
            </tr>
          </table>
          <a class="thumbnail" href="#"><span><img src="fotos de las peliculas/1.jpg"/></span></a></td>
      </tr>
      <tr>
        <td height="34" bgcolor="#000000"><label>
            <div align="center">
              <input type="checkbox" name="checkbox342" value="bx" />
            </div>
          </label></td>
        <td height="34" bgcolor="#000000"><table width="250" height="34">
            <tr>
              <td width="32" height="40"><a class="thumbnail" href="#"><img src="fotos de las peliculas/26.jpg" width="30px" height="30px" border="0" /><span><img src="fotos de las peliculas/26.jpg" width="200" height="250"/><br />
              </span></a></td>
              <td width="206"><span class="Estilo8">El Grito de la selva  (2008)</span></td>
            </tr>
          </table>
          <a class="thumbnail" href="#"><span><img src="fotos de las peliculas/1.jpg"/></span></a></td>
        <td height="34" bgcolor="#000000"><label>
            <div align="center">
              <input type="checkbox" name="checkbox342" value="by" />
            </div>
          </label></td>
        <td height="34" bgcolor="#000000"><table width="250" height="34">
            <tr>
              <td width="32" height="40"><a class="thumbnail" href="#"><img src="fotos de las peliculas/53.jpg" width="30px" height="30px" border="0" /><span><img src="fotos de las peliculas/53.jpg" width="200" height="250"/><br />
              </span></a></td>
              <td width="206"><span class="Estilo8">Lo más bonito y mis  mejores años (2006)</span></td>
            </tr>
          </table>
          <a class="thumbnail" href="#"><span><img src="fotos de las peliculas/1.jpg"/></span></a></td>
        <td height="34" bgcolor="#000000"><label>
            <div align="center">
              <input type="checkbox" name="checkbox342" value="bz" />
            </div>
          </label></td>
        <td height="34" bgcolor="#000000"><table width="250" height="34">
            <tr>
              <td width="32" height="40"><a class="thumbnail" href="#"><img src="fotos de las peliculas/79.jpg" width="30px" height="30px" border="0" /><span><img src="fotos de las peliculas/79.jpg" width="330" height="230"/><br />
              </span></a></td>
              <td width="206"><span class="Estilo8">Zona Sur (2009)</span></td>
            </tr>
          </table>
          <a class="thumbnail" href="#"><span><img src="fotos de las peliculas/1.jpg"/></span></a></td>
      </tr>
      <tr>
        <td height="34" bgcolor="#000000"><label>
            <div align="center">
              <input type="checkbox" name="checkbox342" value="ca" />
            </div>
          </label></td>
        <td height="34" bgcolor="#000000"><table width="250" height="34">
            <tr>
              <td width="32" height="40"><a class="thumbnail" href="#"><img src="fotos de las peliculas/27.png" width="30px" height="30px" border="0" /><span><img src="fotos de las peliculas/27.png" /><br />
              </span></a></td>
              <td width="206"><span class="Estilo8">El minero del diablo  (2005)</span></td>
            </tr>
          </table>
          <a class="thumbnail" href="#"><span><img src="fotos de las peliculas/1.jpg"/></span></a></td>
        <td height="40" bgcolor="#000000"><a class="thumbnail" href="#"><span><img src="fotos de las peliculas/1.jpg"/><br />
          </span></a>
            <input type="checkbox" name="checkbox3222" value="cb" /></td>
        <td height="40" colspan="3" bgcolor="#000000"><table width="521">
            <tr>
              <td height="40"><span class="Estilo8">Otros</span><a class="thumbnail" href="#"><span><img src="fotos de las peliculas/54.jpg"/><br />
              </span></a> <span class="Estilo64">
              <textarea style="width:450px; height:30px " name="otros" class="Estilo7" maxlength="200" ></textarea>
              </span></td>
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
      <p class="Estilo64">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <textarea style="width:650px; height:40px " name="factores" class="Estilo7" maxlength="200"></textarea>
      </p>
      <p class="Estilo64">&nbsp;       </p>
    </div></td>
    </tr>
  <tr bgcolor="#FF6600">
    <td colspan="3"><span class="Estilo6"></span></td>
  </tr>
  <tr bgcolor="#FF6600">
    <td colspan="3"><table width="518" border="0" cellpadding="1" cellspacing="1">
      <tr>
        <td width="230" class="Estilo6">3.- Usted prefiere más las películas:</td>
        <td width="150" bgcolor="#000000" class="Estilo8">
          <input type="radio" value="ext" name="pelicula" />
          Extranjeras</td>
        <td width="116" bgcolor="#000000" class="Estilo8">
          <input type="radio" value="nac" name="pelicula" />
          Nacionales </td>
      </tr>
    </table></td>
  </tr>
  <tr bgcolor="#FF6600">
    <td colspan="3"><span class="Estilo6">¿Porqu&eacute; las prefiere? </span>      <div align="left" class="Estilo6">
      <p class="Estilo64">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <textarea style="width:650px; height:25px " name="prefiere" class="Estilo7" maxlength="200" onkeyup="return ismaxlength(this)"></textarea>
</p>
      <p class="Estilo64">&nbsp;      </p>
    </div></td>
    </tr>
  <tr bgcolor="#FF6600">
    <td colspan="3"><span class="Estilo6">4.- &iquest;Que salas de cine frecuenta y<strong> porque</strong>? </span></td>
    </tr>
  <tr bgcolor="#FF6600">
    <td colspan="3"><table width="360" border="1" align="center" bordercolor="#FF3300">
      <tr>
        <td width="22" bordercolor="#000000" bgcolor="#000000" class="Estilo7"><div align="center" class="Estilo7">
            <input name="checkbox2" type="checkbox" value="cc" />
        </div></td>
        <td width="322" colspan="3" bordercolor="#000000" bgcolor="#000000" class="Estilo7"><span class="Estilo8"> </span>
            <table width="250" height="34">
              <tr>
                <td width="32" height="40"><a class="thumbnail" href="#"><img src="fotos de las peliculas/82.jpg" width="30px" height="30px" border="0" /><span><img src="fotos de las peliculas/82.jpg" width="300" height="200"/><br />
                </span></a></td>
                <td width="206"><span class="Estilo8">Cine Monje Campero</span></td>
              </tr>
          </table></td>
      </tr>
      <tr>
        <td bordercolor="#000000" bgcolor="#000000" class="Estilo7"><div align="center" class="Estilo7">
            <input name="checkbox22" type="checkbox" value="cd" />
        </div></td>
        <td colspan="3" bordercolor="#000000" bgcolor="#000000" class="Estilo8"><table width="250" height="34">
            <tr>
              <td width="32" height="40"><a class="thumbnail" href="#"><img src="fotos de las peliculas/83.jpg" width="30px" height="30px" border="0" /><span><img src="fotos de las peliculas/83.jpg" width="350" height="200"/><br />
              </span></a></td>
              <td width="206">Cine Teatro 16 de Julio</td>
            </tr>
        </table></td>
      </tr>
      <tr>
        <td bordercolor="#000000" bgcolor="#000000" class="Estilo7"><div align="center" class="Estilo7">
            <input name="checkbox22" type="checkbox" value="ce" />
        </div></td>
        <td colspan="3" bordercolor="#000000" bgcolor="#000000" class="Estilo8"><table width="250" height="34">
            <tr>
              <td width="32" height="40"><a class="thumbnail" href="#"><img src="fotos de las peliculas/84.jpg" width="30px" height="30px" border="0" /><span><img src="fotos de las peliculas/84.jpg" width="300" height="200"/><br />
              </span></a></td>
              <td width="206">Megacenter</td>
            </tr>
        </table></td>
      </tr>
      <tr>
        <td width="22" bordercolor="#000000" bgcolor="#000000" class="Estilo7"><div align="center" class="Estilo7">
            <input name="checkbox2" type="checkbox" value="cf" />
        </div></td>
        <td colspan="3" bordercolor="#000000" bgcolor="#000000" class="Estilo8"><table width="250" height="34">
            <tr>
              <td width="32" height="40"><a class="thumbnail" href="#"><img src="fotos de las peliculas/85.jpg" width="30px" height="30px" border="0" /><span><img src="fotos de las peliculas/85.jpg" width="300" height="200"/><br />
              </span></a></td>
              <td width="206">Multicine</td>
            </tr>
        </table></td>
      </tr>
      <tr>
        <td bordercolor="#000000" bgcolor="#000000" class="Estilo7"><div align="center" class="Estilo7">
            <input name="checkbox22" type="checkbox" value="cg" />
        </div></td>
        <td colspan="3" bordercolor="#000000" bgcolor="#000000" class="Estilo8"><table width="250" height="34">
            <tr>
              <td width="32" height="40"><a class="thumbnail" href="#"><img src="fotos de las peliculas/86.jpg" width="30px" height="30px" border="0" /><span><img src="fotos de las peliculas/86.jpg" width="300" height="200"/><br />
              </span></a></td>
              <td width="206">Cinemateca Boliviana</td>
            </tr>
        </table></td>
      </tr>
      <tr>
        <td width="22" bordercolor="#000000" bgcolor="#000000" class="Estilo7"><div align="center" class="Estilo7">
            <input name="checkbox2" type="checkbox" value="ch" />
        </div></td>
        <td colspan="3" bordercolor="#000000" bgcolor="#000000" class="Estilo8"><table width="250" height="34">
            <tr>
              <td width="32" height="40"><a class="thumbnail" href="#"><img src="fotos de las peliculas/87.jpg" width="30px" height="30px" border="0" /><span><img src="fotos de las peliculas/87.jpg" width="300" height="200"/><br />
              </span></a></td>
              <td width="206">Cine Municipal 6 de Agosto</td>
            </tr>
        </table></td>
      </tr>
      <tr>
        <td bordercolor="#000000" bgcolor="#000000" class="Estilo7"><div align="center" class="Estilo7">
            <input name="checkbox22" type="checkbox" value="ci" />
        </div></td>
        <td colspan="3" bordercolor="#000000" bgcolor="#000000" class="Estilo8"><table width="250" height="34">
            <tr>
              <td width="32" height="40"><a class="thumbnail" href="#"><img src="fotos de las peliculas/90.jpg" width="30px" height="30px" border="0" /><span><img src="fotos de las peliculas/90.jpg" width="250" height="150"/><br />
              </span></a></td>
              <td width="206">Cines Hollywood</td>
            </tr>
        </table></td>
      </tr>
      <tr>
        <td width="22" bordercolor="#000000" bgcolor="#000000" class="Estilo7"><div align="center" class="Estilo7">
            <input name="checkbox2" type="checkbox" value="cj" />
        </div></td>
        <td colspan="3" bordercolor="#000000" bgcolor="#000000" class="Estilo8"><table width="250" height="34">
            <tr>
              <td width="32" height="40"><a class="thumbnail" href="#"><img src="fotos de las peliculas/90.jpg" width="30px" height="30px" border="0" /><span><img src="fotos de las peliculas/90.jpg" width="250" height="150"/><br />
              </span></a></td>
              <td width="206"> Cine Plaza</td>
            </tr>
        </table></td>
      </tr>
      <tr>
        <td bordercolor="#000000" bgcolor="#000000" class="Estilo7"><div align="center" class="Estilo7">
            <input name="checkbox22" type="checkbox" value="ck" />
        </div></td>
        <td colspan="3" bordercolor="#000000" bgcolor="#000000" class="Estilo8"><table width="250" height="34">
            <tr>
              <td width="32" height="40"><a class="thumbnail" href="#"><img src="fotos de las peliculas/90.jpg" width="30px" height="30px" border="0" /><span><img src="fotos de las peliculas/90.jpg" width="250" height="150"/><br />
              </span></a></td>
              <td width="206">Cines Comercio</td>
            </tr>
        </table></td>
      </tr>
      <tr>
        <td height="74" colspan="4" bordercolor="#000000" bgcolor="#000000" class="Estilo7"><div align="center" class="Estilo7"><span class="Estilo8">¿Porque?</span><span class="Estilo64">
            <textarea name="porque" class="Estilo7" style="width:260px; height:60px " onkeyup="return ismaxlength(this)" maxlength="200"></textarea>
        </span></div></td>
      </tr>
    </table>
      <p>&nbsp;</p></td>
  </tr>
  <tr>
    <td colspan="3" bgcolor="#FF6600">
	<table width="295" border="0" align="center" cellpadding="0" cellspacing="0">
       <tr>
        <td><td class="Estilo6"><label>
          <input type="submit" name="enviar" id="enviar" value="Enviar Cuestionario" />
		  </td>
        <td class="Estilo6"><label>
          <input type="reset" name="cancelar" id="" value="Cancelar Envio" />
		  </td>
      </tr>
    </table></td>
  </tr>
  <tr bgcolor="#FF6600">
    <td colspan="3"><div align="right" class="Estilo6">
      <p><em><strong>te agradesco mucho tu ayuda y tu tiempo, espero te haya gustado, gracias..</strong></em></p>
      <p><em><strong>. </strong></em></p>
    </div></td>
  </tr>
</table>
</form>
 
</body>
</html>
