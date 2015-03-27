<?
session_start();
if (!isset($_SESSION['paso_por_donde_yo_quiero']))
{ 
	header ("Location: ../index.php"); 
	exit; 
};
include("../../funciones1.php");
$link=conexion();
$user=$_SESSION['id_user'];
$cod=$_SESSION['password']; 
$sql = "SELECT usuario FROM user WHERE usuario like '%$user%' and contrasenia like '%$cod%'"; 
$resp=mysql_query($sql);
$num = mysql_num_rows($resp);
if($num>0)
{
	$linea=mysql_fetch_array($resp);
	$usuario=$linea['usuario'];
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
          <form name="form1" method="post" action="mod_pass.php">

          <p>&nbsp;</p>
          <table width="374" height="21" border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td width="29" height="21" background="../../img/encabezado_tabla_01.gif"></td>
                  <td width="316" background="../../img/encabezado_tabla_02.gif"><div align="center" class="Estilo59">MODIFICAR MI CONTRASE&Ntilde;A </div></td>
                  <td width="29" background="../../img/encabezado_tabla_04.gif"></td>
                </tr>
                <tr>
                  <td height="2" colspan="3"></td>
                </tr>
              </table>
            <table width="374" border="0" align="center" cellpadding="0" cellspacing="2" bgcolor="#74ABD3">
                <tr>
                  <td></td>
                </tr>
                <tr>
                  <td bgcolor="#B1CBE4"><table width="370" border="0" align="center" cellpadding="0" cellspacing="2">
                      <tr>
                        <td width="180" height="15" bordercolor="#74ABD3" bgcolor="#CCDDEE"><div align="right"><span class="Estilo78">Contrase&ntilde;a Nueva </span></div></td>
                        <td width="184" bgcolor="#CCDDEE" class="Estilo65">&nbsp;&nbsp;
                        <input type="password" name="password" value=""></td>
                      </tr>
                      <tr>
                        <td height="15" bordercolor="#74ABD3"><div align="right"><span class="Estilo78">Confirmar Contrase&ntilde;a Nueva:</span></div></td>
                        <td width="168" bgcolor="#CCDDEE" class="Estilo65">&nbsp;&nbsp;
                        <input type="password" name="password2" value="">
                        </td>
                      </tr>
                      <tr>
                        <td height="15" bgcolor="#CCDDEE"><div align="right" class="Estilo78">Palabra o Frase para Recordar su Contrase&ntilde;a :</div></td>
                        <td height="15" bgcolor="#CCDDEE" class="Estilo65">&nbsp;&nbsp;
                        <input type="text" name="clave" value="" onKeyPress="return solo_letras(event)" ></td>
                      </tr>
                      <tr>
                        <td height="10" colspan="2" class="Estilo59"></td>
                      </tr>
                      <tr>
                        <td height="17" colspan="2" bgcolor="#CCDDEE" class="Estilo59"><div align="center">
                          <input name="cambiar_pass" type="submit" class="Estilo59" id="cambiar_pass" style="width:90px;background-color:#4791C5;border:0px;margin:1px;padding:0px; font-weight: bold;" value="Modificar">
                          &nbsp;&nbsp;&nbsp;&nbsp;
                          <input name="cancelar" type="reset" class="Estilo59" style="width:90px;background-color:#4791C5;border:0px;margin:1px;padding:0px; font-weight: bold;" value="Cancelar">
                        </div></td>
                      </tr>
                    </table>
                   </td>
                </tr>
                <tr>
                  <td height="1" bgcolor="#74ABD3"></td>
                </tr>
              </table>
            &nbsp;
            <p>&nbsp;</p>
          </form>
            <p>&nbsp;</p>
        </center></td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html>