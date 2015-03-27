<?
session_start();
if (!isset($_SESSION['super usuario']))
{ 
	header ("Location: index.php"); 
	exit; 
}  
$user=$_SESSION['id_user'];
$cod=$_SESSION['password']; 
$id_user=$_SESSION['id_user'];
$nombre=$_SESSION['nombre_ini']; 
$unidad=$_SESSION['unidad_ini']; 
$id_unidad=$_SESSION['id_unidad']; 

$nombre1=$_POST['nombre'];
include("../../funciones1.php");
$link=conexion();

		$consulta ="UPDATE user SET nombre = '$nombre1' WHERE id_user = '$id_user'";
		$resultado=mysql_query($consulta) or die ("Error de búsqueda en la BD: ". mysql_Error());
		
		$sql = "SELECT nombre FROM user WHERE id_user = '$id_user'"; 
		$resp = mysql_query($sql);
		$num = mysql_num_rows($resp);
		if($num>0)
		{
			$linea=mysql_fetch_array($resp);
			$nombre=$linea["nombre"];
		}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
<LINK href="../../javascript/estilos.css" type=text/css rel=stylesheet>
<LINK href="../../javascript/estilo_noticias.css" type=text/css rel=stylesheet>
<SCRIPT language=JavaScript src="../../javascript/fecha-hora_bc.js"></SCRIPT>
<SCRIPT language=JavaScript src="../../fecha-hora_bc.js"></SCRIPT>
<SCRIPT language=JavaScript src="../../javascript/funciones.js"></SCRIPT>
<script type="text/javascript" src="../../Sothink DHTML Menu/Resource/js/stmenu.js"></script>
</head>
<body bottommargin="0" leftmargin="0" rightmargin="0" topmargin="0" bgcolor="#EDF7FF" onload=escrolea()>
<table width="612" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="612"><table width="612" border="0" cellpadding="0" cellspacing="0" bordercolor="#8fb1d2" style="position:left;" heigth="500">
      <tr>
        <td width="130" bgcolor="#8fb1d2"><table style="position:absolute; left: 1px; top:1px;" width="132" height="92" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td height="92"><script src="menu_perfil.js"></script></td>
            </tr>
        </table></td>
        <td width="4"></td>
        <td width="479" background="../../img/fondo_cuerpo.gif"><center>
		  &nbsp;
		  <p>&nbsp;</p>
		  <table width="344" height="21" border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td width="29" height="21" background="../../img/encabezado_tabla_01.gif"></td>
                  <td width="286" background="../../img/encabezado_tabla_02.gif"><div align="center" class="Estilo59">AHORA SU NOMBRE  ES: </div></td>
                  <td width="29" background="../../img/encabezado_tabla_04.gif"></td>
                </tr>
                <tr>
                  <td height="2" colspan="3"></td>
                </tr>
              </table>
            <table width="344" border="0" align="center" cellpadding="0" cellspacing="2" bgcolor="#74ABD3">
                <tr>
                  <td></td>
                </tr>
                <tr>
                  <td bgcolor="#B1CBE4"><table width="340" border="0" align="center" cellpadding="0" cellspacing="2">
                      <tr>
                        <td width="130" height="15" bordercolor="#74ABD3" bgcolor="#CCDDEE"><div align="right"><span class="Estilo78">Nombre:</span></div></td>
                        <td width="260" bgcolor="#CCDDEE" class="Estilo65">&nbsp;&nbsp;
						<? echo $nombre;?></td>
                      </tr>
                      <tr>
                        <td height="10" colspan="2" class="Estilo59"></td>
                      </tr>
                      <tr>
                        <td height="17" colspan="2" bgcolor="#CCDDEE" class="Estilo59"><div align="center">&nbsp;&nbsp;
                          <input onClick="window.close();" class="Estilo59" name="submit" type="submit" style="background-color:#4791C5;border:0px;margin:1px;padding:0px; font-weight: bold;" value="   Salir   " />
                          &nbsp;&nbsp;</div></td>
                      </tr>
                    </table>
                     </td>
                </tr>
                <tr>
                  <td height="1" bgcolor="#74ABD3"></td>
                </tr>
              </table>
            <p>&nbsp;</p>
            <p>&nbsp;            </p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            </center></td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html>