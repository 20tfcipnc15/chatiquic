<HEAD>
<SCRIPT LANGUAGE="JavaScript">
function mi_alerta () {
alert ("Este seria el mensaje de alerta desde boton!");
}
function enviar()
{
  var respuesta=confirm("¿Esta seguro que desea ENVIAR los datos?");
  if (respuesta==true)
	  document.write()
  window.top.location.href = "2.php";
}
</SCRIPT>
</HEAD>
<BODY>
<FORM action="2.php">

  <p>
    <input type="text" name="texto" />
</p>
  <p>
    <input type=button value="Prueba la alerta" onClick="mi_alerta()">
  </p>
  <p>
    <input type=button value="Prueba la alerta" onClick="enviar()">
    </p>
</FORM>
</BODY>