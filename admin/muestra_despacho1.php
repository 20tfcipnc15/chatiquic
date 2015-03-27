<?php
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
include("../funciones1.php");
$link=conexion();
$id_c = $_GET['id'];
$consulta ="SELECT * FROM correspondencia WHERE id_c = $id_c";
$resultado=mysql_query($consulta) or die ("Error de búsqueda en la BD: ". mysql_Error());
$linea=mysql_fetch_array($resultado);
		
$rut=$linea["rut"]; 
$unidad=$linea["unidad"];
$fecha=$linea["fecha"];
$correlativo=$linea["correlativo"];
$hoja_ruta=$linea["hoja_ruta"];
$tipo=$linea["tipo"];
$referencias=$linea["referncias"];
$fojas=$linea["fojas"];    
$responsable=$linea["responsable"];

?>
<html>
<head>
<title>Chasqui Digital</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<LINK href="../javascript/estilos.css" type=text/css rel=stylesheet>
<LINK href="../javascript/estilo_noticias.css" type=text/css rel=stylesheet>
<SCRIPT language=JavaScript src="../javascript/fecha-hora_bc.js"></SCRIPT>
<SCRIPT language=javascript src="../javascript/barra_de_estado.js"></SCRIPT>
<script type="text/javascript" src="../Sothink DHTML Menu/Resource/js/stmenu.js"></script>
</head>
<body>
<table width="466" height="246" border="2" align="center" cellpadding="0" cellspacing="0" bordercolor="#8fb1d2">
  <tr>
    <td background="../img/fondo_cuerpo.gif"><center>
      <p class="Estilo51"><br>
        Los datos de la correspondencia<br>
        <br>
        han sido despachados satisfactoriamente...! </p>
      <table width="400" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td width="29" height="21" background="../img/encabezado_tabla_01.gif">&nbsp;</td>
          <td width="342" background="../img/encabezado_tabla_02.gif"><div align="center" class="Estilo59">CORRESPONDENCIA RECIBIDA </div></td>
          <td width="29" background="../img/encabezado_tabla_04.gif">&nbsp;</td>
        </tr>
        <tr>
          <td height="2" colspan="3"></td>
        </tr>
      </table>
      <table width="400" border="0" cellpadding="0" cellspacing="2" bgcolor="#74ABD3">
        <tr>
          <td></td>
        </tr>
        <tr>
          <td bgcolor="#B1CBE4"><table width="396" border="0" align="center" cellpadding="0" cellspacing="2" bordercolor="#EDF7FF">
            <tr>
              <td width="130" height="15" bordercolor="#74ABD3" class="Estilo78"><div align="right">Fecha de Ingreso:</div></td>
              <td width="260" height="15" bgcolor="#E1F1FF" class="Estilo65">&nbsp;
                      <?php  echo $pa_fecha_hora;?>
              </td>
            </tr>
            <tr>
              <td height="15" bgcolor="#CCDDEE" class="Estilo78"><div align="right">Tipo de Correspondencia:</div></td>
              <td height="15" bgcolor="#E1F1FF" class="Estilo65">&nbsp;
                      <?php  echo $pa_tipo;?>
              </td>
            </tr>
            <tr>
              <td height="15" class="Estilo78"><div align="right">Recibido por: </div></td>
              <td height="15" bgcolor="#E1F1FF" class="Estilo65">&nbsp;
                      <?php  echo $pa_recibido_por;?></td>
            </tr>
            <tr>
              <td height="15" bgcolor="#CCDDEE"><div align="right"><span class="Estilo78">N&ordm; Reg. Interno:</span></div></td>
              <td height="15" bgcolor="#E1F1FF" class="Estilo64">&nbsp; <?php echo $pa_reg_interno; ?></td>
            </tr>
            <tr>
              <td><div align="right"><span class="Estilo78">Procedencia:</span></div></td>
              <td height="15" bgcolor="#E1F1FF" class="Estilo65">&nbsp; <?php echo $pa_procedencia;?></td>
            </tr>
            <tr>
              <td bgcolor="#CCDDEE"><div align="right"><span class="Estilo78">N&ordm; Reg. Externo:</span></div></td>
              <td height="15" bgcolor="#E1F1FF" class="Estilo65">&nbsp; <?php echo $pa_reg_externo;?></td>
            </tr>
            <tr>
              <td height="15" class="Estilo78"><div align="right">N&ordm; Hoja de Ruta </div></td>
              <td bgcolor="#E1F1FF" class="Estilo65">&nbsp; <?php echo $pa_hoja_ruta;?> </td>
            </tr>
            <tr>
              <td height="60" bgcolor="#CCDDEE" class="Estilo78"><div align="right">Referencias:</div></td>
              <td height="60" bgcolor="#E1F1FF" class="Estilo65">&nbsp;
                      <?php  echo $pa_referencias;?>
              </td>
            </tr>
            <tr>
              <td height="15" bgcolor="#CCDDEE" class="Estilo78"><div align="right">Fojas:</div></td>
              <td height="15" bgcolor="#E1F1FF" class="Estilo65">&nbsp;
                      <?php  echo $fojas;?>
              </td>
            </tr>
            <tr>
              <td height="15" colspan="2" bgcolor="#CCDDEE" class="Estilo78"><div align="center">
                <form name="form1" method="post" action="reporte/reporte.php">
                  <input class="Estilo59" name="submit" type="submit" style="background-color:#4791C5;border:0px;margin:1px;padding:0px; font-weight: bold;" value="  Reporte ">
                </form>
              </div></td>
            </tr>
            <tr>
              <td height="15" colspan="2" class="Estilo78">&nbsp;</td>
            </tr>
          </table></td>
        </tr>
        <tr>
          <td height="1" bgcolor="#74ABD3"></td>
        </tr>
      </table>
      <p>&nbsp;</p>
    </center></td>
  </tr>
</table>
<?  
	}
	else
	{
	?>
	<script>
	  var valor='<?echo $pa_procedencia?>'	
	  window.top.location.href = "reg_remitente.php?rem="+ valor;
	</script>
	<?
	}
}
else
	echo '<h1>No existen coincidencias...!</h1>';
?>
</body>
</html>