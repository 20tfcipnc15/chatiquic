<?php  
session_start();
if (!isset($_SESSION['paso_por_donde_yo_quiero']))
{ 
	header ("Location: index.php"); 
	exit; 
} 
$r_not = $_POST['r_not'];

if ($r_not == 'r_sms')
	include ("form_sms.php");
else
	include ("form_mail.php");
?>