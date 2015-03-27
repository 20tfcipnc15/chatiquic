<?
$contrasena='aleida';
$contrasena = md5($contrasena);
echo 'encriptado   '.$contrasena;
$codificado = base64_encode("Hola, soy una cadena encriptada");
$decodificado = base64_decode($codificado);
?>