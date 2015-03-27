<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">

<html>
<head>
	<title>Calendario PHP</title>
	<link rel="STYLESHEET" type="text/css" href="estilo.css">
	<script>
		function devuelveFecha(dia,mes,anio)
		{
		var formulario_destino = 'registro_recibida'
		var campo_destino = 'fec_final'
//			document.write ('hola goalkf lskdfmlsdkf sldfl')
		eval ("opener.document." + formulario_destino + "." + campo_destino + ".value='" + dia + "/" + mes + "/" + anio + "'")
		window.close()
		}
	</script>
</head>

<body>
</body>
</html>