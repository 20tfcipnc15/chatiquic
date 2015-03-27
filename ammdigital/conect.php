<?php
  function conexion()
  { 
     $link=mysql_connect("localhost","fcpn","pnfc910") or die("Error: ".mysql_error());
	 mysql_select_db("encuesta",$link) or die("Error: ".mysql_error());
	 return($link);
  }
?>
