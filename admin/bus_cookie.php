<?php
setcookie("cadena","",0);
$rut = $_POST['rut'];
$tipo = $_POST['tipo'];
$otro = $_POST['otro'];
$fecha = $_POST['fecha'];
$unidad = $_POST['unidad'];
$hoja_ruta = $_POST['hoja_ruta'];
$comentario = $_POST['comentario'];
$referencias = $_POST['referencias'];
$fecha_final = $_POST['fecha_final'];
$responsable = $_POST['responsable'];
$correlativo = $_POST['correlativo'];

if($unidad==null)
	$unidad=$otro;

$vector[0]= $correlativo;
$vector[1]= $unidad;
$vector[2]= $hoja_ruta;
$vector[3]= $referencias;
$vector[4]= $tipo;
$vector[5]= $fecha;
$vector[6]= $rut;
$vector[7]= $responsable;
$vector[8]= $comentario;

$campo[0]= 'correlativo';
$campo[1]= 'unidad';
$campo[2]= 'hoja_ruta';
$campo[3]= 'referencias';
$campo[4]= 'tipo';
$campo[5]= 'fecha';
$campo[6]= 'rut';
$campo[7]= 'destino';
$campo[8]= 'comentario';
$sw=1;

for ($i=0;$i<=8;$i++)
{
	$dato=$vector[$i];
	if($dato != null)
		$sw=0;
}
$j=0;
$cadena='';
    for ($i=0;$i<=8;$i++)
    {
	$valor = $vector[$i];
	if($valor != null)
	{
		$atributo = $campo[$i];
		$cadena = $cadena.' '.$atributo." like *%".$valor."%* and ";
		$vectorA[$j] = $valor;
		$j++;
	}
    }
$long = strlen($cadena);
$cadena = substr($cadena,0,$long-5);

setcookie("cadena", $cadena,time()+10800);
header ("location: buscar_pag.php");
?>