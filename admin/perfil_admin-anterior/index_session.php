<?php 
session_start();
if (!isset($_SESSION['paso_por_donde_yo_quiero']))
{ 
	header ("Location: ../index.php"); 
	exit; 
};
session_destroy();
header ("Location:../index.php");
?> 
