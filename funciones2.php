<?php
  function conexion2()
  { 
     $link=mysql_connect("localhost","root","") or die("Error: ".mysql_error());
	 mysql_select_db("registros2011",$link) or die("Error: ".mysql_error());
	 return($link);
  }
?>
