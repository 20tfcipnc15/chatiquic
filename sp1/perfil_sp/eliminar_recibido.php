<?php
   include("../../funciones.php");
   $link=conexion();
   $usuario = $_POST['usuario'];
   $contrasenia= $_POST['password'];
   $consulta ="SELECT * FROM user WHERE usuario LIKE '%$usuario%' and contrasenia like '%$contrasenia%'";
   $resultado=mysql_query($consulta) or die ("Error de búsqueda en la BD: ". mysql_Error());
   $numResultados = mysql_num_rows($resultado);
   if($numResultados>0)
   { 
	$linea=mysql_fetch_array($resultado);
	$usuario=$linea['usuario'];
	$contrasenia=$linea['contrasenia'];
	$nombre=$linea['nombre'];
	$cargo=$linea['cargo'];
	$ci=$linea['ci'];
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
            <table width="115" height="115" border="1" cellpadding="0" cellspacing="0" bordercolor="#74ABD3" bgcolor="#B1CBE4">
              <tr>
                <td><div align="center"><img src="img/user.jpg" width="111" height="111" /></div></td>
              </tr>
            </table>
          <table width="153" border="0" cellpadding="4" cellspacing="4">
              <tr>
                <td width="54" class="Estilo77">Usuario:</td>
                <td width="112"><div align="center" class="Estilo37"><? echo $usuario;?></div></td>
              </tr>
            </table>
          <form action="modificar_perfil.php" method="post" name="registro_recibida" id="registro_recibida">
              <table width="324" height="21" border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td width="29" height="21" background="../../img/encabezado_tabla_01.gif"></td>
                  <td width="266" background="../../img/encabezado_tabla_02.gif"><div align="center" class="Estilo59">PERFIL DE ADMINISTRATIVO </div></td>
                  <td width="29" background="../../img/encabezado_tabla_04.gif"></td>
                </tr>
                <tr>
                  <td height="2" colspan="3"></td>
                </tr>
              </table>
            <table width="324" border="0" align="center" cellpadding="0" cellspacing="2" bgcolor="#74ABD3">
                <tr>
                  <td></td>
                </tr>
                <tr>
                  <td bgcolor="#B1CBE4"><table width="320" border="0" align="center" cellpadding="0" cellspacing="2">
                      <tr>
                        <td width="130" height="15" bordercolor="#74ABD3" bgcolor="#CCDDEE"><div align="right"><span class="Estilo78">Usuario:</span></div></td>
                        <td width="260" bgcolor="#CCDDEE" class="Estilo65">&nbsp;&nbsp;<? echo $usuario;?></td>
                      </tr>
                      <tr>
                        <td width="130" height="15" bordercolor="#74ABD3"><div align="right"><span class="Estilo78">Contrase&ntilde;a:</span></div></td>
                        <td width="260" bgcolor="#CCDDEE" class="Estilo65">&nbsp;&nbsp;<? echo $contrasenia;?></td>
                      </tr>
                      <tr>
                        <td height="15" bgcolor="#CCDDEE"><div align="right" class="Estilo78">CI:</div></td>
                        <td height="15" bgcolor="#CCDDEE" class="Estilo65">&nbsp;&nbsp;<? echo $ci;?></td>
                      </tr>
                      <tr>
                        <td height="15"><div align="right" class="Estilo78">Nombre:</div></td>
                        <td height="15" bgcolor="#CCDDEE" class="Estilo65">&nbsp;&nbsp;<? echo $nombre;?></td>
                      </tr>
                      <tr>
                        <td height="15" bgcolor="#CCDDEE"><div align="right"><span class="Estilo78">Cargo:</span></div></td>
                        <td background="../img/fondo_cuadrado.jpg" bgcolor="#CCDDEE" class="Estilo65">&nbsp;&nbsp;<? echo $cargo;}?></td>
                      </tr>
                      <tr>
                        <td height="10" colspan="2" class="Estilo59"></td>
                      </tr>
                      <tr>
                        <td height="17" colspan="2" bgcolor="#CCDDEE" class="Estilo59"><div align="center">
                            <input name="enviar2" type="submit" class="Estilo59" style="width:90px;background-color:#4791C5;border:0px;margin:1px;padding:0px; font-weight: bold;" value="Aceptar">
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
          </form>
        </center></td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html>