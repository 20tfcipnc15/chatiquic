<?php
  function conexion()
  { 
     $link=mysql_connect("localhost","root","777") or die("Error: ".mysql_error());
	 mysql_select_db("chasqui_digital",$link) or die("Error: ".mysql_error());
	 return($link);
  }
?>