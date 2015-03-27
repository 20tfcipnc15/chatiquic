<?
session_start();
if (!isset($_SESSION['paso_por_donde_yo_quiero']))
{ 
	header ("Location: index.php"); 
	exit; 
} 
	include("../../funciones1.php");
	$link=conexion();
    $user=$_SESSION['id_user'];
    $cod=$_SESSION['password']; 
	$password=$_POST['password'];
	$password2=$_POST['password2'];
	$clave=$_POST['clave'];	
	if($password==$password2)
	{	
		$password = md5($password);
		$sql = "SELECT id_user FROM user WHERE id_user like '%$user%' and contrasenia like '%$cod%'"; 
		$resp=mysql_query($sql);
		$num = mysql_num_rows($resp);
		if($num>0)
		{
			$linea=mysql_fetch_array($resp);
			$id_user=$linea["id_user"]; 
    
			$consulta ="UPDATE user SET contrasenia = '$password', clave = '$clave' WHERE id_user = '$id_user'";
			$resultado=mysql_query($consulta) or die ("Error de búsqueda en la BD: ". mysql_Error());
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
                  <td width="286" background="../../img/encabezado_tabla_02.gif"><div align="center" class="Estilo59">NUEVA CONTRSE&Ntilde;A</div></td>
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
                        <td height="15" bordercolor="#74ABD3" bgcolor="#CCDDEE"><div align="center" class="Estilo21">
                          <p>&nbsp;</p>
                          <p>Su Contrase&ntilde;a ha sido modificada correctamente...! </p>
                          <p>&nbsp;</p>
                        </div>                          </td>
                      </tr>
                      <tr>
                        <td class="Estilo59"></td>
                      </tr>
                      
                    </table>
                   </td>
                </tr>
                <tr>
                  <td height="1" bgcolor="#74ABD3"></td>
                </tr>
              </table>
            <p>&nbsp;</p>
			<p>&nbsp;</p>
            </center></td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html>
<?
	}
	else
	{ 
		echo 'Lo sentimos... Los datos no coinciden';
	}
?>