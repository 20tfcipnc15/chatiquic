<?php	
include("funciones.php");
	$link=conexion();
	$not=$_GET['not'];
	$consulta=mysql_query("select * from noticia where cod=$not", $link);
	$fila = mysql_fetch_array($consulta);
?>
<html>
<head>
<title>Hemeroteca Virtual-Digital UMSA</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<LINK href="estilos.css" type=text/css rel=stylesheet>
</head>
<body bgcolor="#336699">
<center>
		<table width="480" height="25" cellpadding="0" cellspacing="0" border="0">
			<tr>
				<td width="20" height="25" background="../imagenes/fondo_medio1.GIF">
				</td>
				<td width="440" height="25" background="../imagenes/fondo_medio3.GIF" class="Estilo1" align="center" valign="bottom">
					Noticias del Ambito Universitario				
				</td>
				<td width="20" height="25" background="../imagenes/fondo_medio2.GIF">
				</td>
			</tr>
		</table>
		<table width="480" height="300" cellpadding="0" cellspacing="0" border="0">
			<tr>
				<td width="1" height="300" bgcolor="#000000">
				</td>			
				<td width="478" background="../imagenes/fondo_cuerpo.gif" align="center">
<!--Parte central del medio, aqui inicia el medio-->
					<table width="478" height="300" cellpadding="4" cellspacing="0" border="0">
						<tr>
							<td valign="top" class="Estilo6" align="center">

								<table width="470" cellspacing="0" cellpadding="0" bgcolor="#74ABD3">
									<tr>
										<td width="470" valign="top" class="Estilo2" align="center">
											<?php echo $fila[1];?>
										</td>
									</tr>
									<tr>
										<td width="470" valign="top" align="center" bgcolor="#B1CBE4">
											<table width="470" cellspacing="2" cellpadding="0" bgcolor="#B1CBE4">
												<tr>
													<td width="476" valign="top" align="center" class="Estilo13" bgcolor="#CCDDEE">
														<?php if($fila[2] != "no"){?><img src="../imagenes/<?php echo $fila[2];?>"><br><?php } ?>
														<?php echo $fila[3];?><br>
														<?php echo $fila[4];?><br>
													</td>
												</tr>
											</table>
										</td>
									</tr>
								</table>
							</td>				
						</tr>
					</table>
<!--Parte central del medio, aqui termina el medio-->							
				</td>
				<td width="1" bgcolor="#000000">
				</td>				
			</tr>
			<tr>
				<td height="1" colspan="3" bgcolor="#000000">
				</td>
			</tr>
		</table>
</center>
</body>
</html>
