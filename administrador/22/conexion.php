<?php
function conectar()
{
	mysql_connect("localhost", "root", "");
	mysql_select_db("facultad");
}

function desconectar()
{
	mysql_close();
}
?>