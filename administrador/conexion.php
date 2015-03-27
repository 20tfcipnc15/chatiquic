<?php
function conectar()
{
	mysql_connect("localhost", "root", "777");
	mysql_select_db("facultad");
}

function desconectar()
{
	mysql_close();
}
?>