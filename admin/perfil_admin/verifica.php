<?
session_start();
if (!isset($_SESSION['paso_por_donde_yo_quiero']))
{ 
	header ("Location: ../index.php"); 
	exit; 
};
    include("../../funciones.php");
    $link=conexion();
    $user=$_SESSION['id_user'];
    $cod=$_SESSION['password']; 

	$sql = "SELECT nombre FROM user WHERE usuario like '%$user%' and contrasenia like '%$cod%'"; 
	$resp=mysql_query($sql);
	$num = mysql_num_rows($resp);
	if($num>0)
	{
		$linea=mysql_fetch_array($resp);
		$nom=$linea["nombre"]; 
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
        <td width="130" bgcolor="#8fb1d2"><table style="position:absolute; top:3px; left:0px; height: 170px;" width="132" height="465" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td></td>
            </tr>
            <tr>
              <td><form name="form1" method="post" action="autenticacion.php">
                  <table width="127" height="80" border="0" align="left" cellpadding="0" cellspacing="2" bgcolor="#74ABD3">
                    <tr>
                      <td height="15"><div align="center"><span class="Estilo2">Usuario </span></div></td>
                    </tr>
                    <tr>
                      <td bgcolor="#B1CBE4"><table width="123" border="0" align="center" cellpadding="0" cellspacing="2">
                          <tr>
                            <td height="5" class="Estilo21"><div align="center" class="Estilo37"></div></td>
                          </tr>
                          <tr>
                            <td height="30"><div align="center">
                                <input name="usuario" type="usuario" class="Estilo21" id="ci"size="15">
                              </div>
                                <div align="center"></div></td>
                          </tr>
                      </table></td>
                    </tr>
                    <tr>
                      <td height="7"><p align="center"><span class="Estilo2">Contrase&ntilde;a</span></p></td>
                    </tr>
                    <tr>
                      <td><table width="123" border="0" align="center" cellpadding="0" cellspacing="2" bgcolor="#CCDDEE">
                          <tr>
                            <td height="5" class="Estilo21"><div align="center" class="Estilo37"></div></td>
                          </tr>
                          <tr>
                            <td height="30"><div align="center">
                                <input name="password" type="text" class="Estilo21" id="codigo2"size="15">
                              </div>
                                <div align="center"></div></td>
                          </tr>
                          <tr>
                            <td height="30" bgcolor="#CCDDEE"><div align="center"><span class="Estilo3">
                                <input name="buscar2" type="submit" class="Estilo2" id="buscar2" style="background-color:#4791C5;border:0px;margin:1px;padding:0px" value=" Ingresar ">
                            </span></div></td>
                          </tr>
                      </table></td>
                    </tr>
                    <tr>
                      <td height="1"></td>
                    </tr>
                  </table>
              </form></td>
            </tr>
          </table></td>
        <td width="4"></td>
        <td width="479" background="../../img/fondo_cuerpo.gif"><center>
		  &nbsp;
		  <form action="modificar_perfil.php" method="post" name="registro_recibida" id="registro_recibida">&nbsp;
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            &nbsp;
           </form>
		  </center></td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html>