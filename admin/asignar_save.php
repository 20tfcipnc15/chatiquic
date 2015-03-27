<?
session_start();
if (!isset($_SESSION['paso_por_donde_yo_quiero']))
{ 
	header ("Location: index.php"); 
	exit; 
} 
$nombre=$_SESSION['nombre_ini']; 
$unidad_ini=$_SESSION['unidad_ini']; 
$id_unidad=$_SESSION['id_unidad']; 
$cargo=$_SESSION['cargo']; 

include("../funciones1.php");
include("../php/fecha_hora.php");
$link=conexion();
$fecha1=fecha_hora();

$ip = $_SERVER['REMOTE_ADDR']; 
$cad = $_POST['cad'];
$vector = explode(",",$cad);
$long = count($vector);

$comentario = $_POST['comentario'];
$admin = $_POST['admin'];
$unidad = $_POST['unidad'];
$correlativo_des = $_POST['correlativo'];
$otro = $_POST['otro'];
$estado = $_POST['estado'];
$unificar = $_POST["unificar"];

$archivar = $_POST['archivar'];
$pendiente = $_POST['pendiente'];

if($archivar != null)
{
    $comentario = 'Concluido: '.$comentario.' Tramite Archivado';
}

if($pendiente != null)
{
    $comentario = 'PENDIENTE: '.$comentario;
}

if($admin != null)
	$destino = $admin;
elseif ($unidad != null)
		$destino = $unidad;
	elseif ($otro != null)
			$destino = $otro;

 if ($unificar != null)
    {
          $rut2 = substr($vector[0],0,strlen($vector[0])-2);
          $sw = 0;
          $comentario2 = $comentario;
          $comentario = 'Concluido: '.$comentario.' Tramite Archivado';
          $destino2 = $destino;
          $reg_uni = '';
    }

for ($i=0; $i<$long; $i++)
{
	$rut=$vector[$i];
	
	//buscamos la refencia correspondiente
	$sql = "SELECT id_c,referencias,correlativo,tipo,fojas,estado FROM correspondencia WHERE rut like '$rut' order by id_c DESC limit 1";
	$res = mysql_query($sql) or die ("Error de b�squeda en la BD: ". mysql_Error());
	$num = mysql_num_rows($res);

	$linea=mysql_fetch_array($res);
	$referencias = $linea["referencias"];	
	$correlativo_1 = $linea["correlativo"];	
	$hoja_ruta = $linea["hoja_ruta"];	
	$tipo = $linea["tipo"];	
	$fojas = $linea["fojas"];	
	$id_c1 = $linea["id_c"];	
	
	if ($correlativo_des == null)
		$correlativo = $correlativo_1;
	else
		$correlativo = $correlativo_des;

    if ($unificar != null)
    {
        $rut3 = substr($rut,0,strlen($rut)-2);
        if ($rut2 != $rut3)
            $sw = 1;
        $reg_uni = $reg_uni.','.$rut;
        $destino = 'Archivo';
    }

	//Insertamos el nuevo registro en la tabla correspondencia
	$sql="INSERT INTO correspondencia
	(id_c,rut,unidad,fecha,correlativo,hoja_ruta,tipo,referencias,fojas,responsable,destino,comentario,ip,estado,sw) VALUES 
    (NULL,'$rut','$unidad_ini','$fecha1','$correlativo','$hoja_ruta','$tipo','$referencias','$fojas','$nombre','$destino','$comentario','$ip','$estado','1')";
	$result = mysql_query($sql,$link);	
	//para el recibido.....
	$sqlq = "INSERT INTO recibido(id_re,id_unidad,reg_int,id_c,recibido_por,ip,fecha) VALUES 
	(NULL,'$id_unidad','$id_c1','$id_c1','$nombre','$ip','$fecha1')";
	$result = mysql_query($sqlq,$link);
	
	$consulta ="UPDATE correspondencia SET sw = 0 WHERE id_c = '$id_c1'";
	$resultado=mysql_query($consulta) or die ("Error de búsqueda en la BD: ". mysql_Error());

}
if($unificar != null)
{
    if($sw == 1)
    {
        //Obtenemos el RUT correspondiente a la unidad.
        $consulta ="SELECT rut FROM rut WHERE id_unidad = '$id_unidad' order by id_rut DESC limit 1";
        $resultado=mysql_query($consulta) or die ("Error de b�squeda en la BD: ". mysql_Error());
        $numResultados = mysql_num_rows($resultado);
        if ($numResultados>0)
        {
        	$linea=mysql_fetch_array($resultado);
        	$rut = $linea["rut"];

                //Obtenemos la parte num�rica, para incrementar su valor como nuevo Tr�mite
                $B = '-';
                $pos= strrpos($rut,$B);

                $num= substr($rut,0, $pos);
                $num++;
        }
        else
                $num=1;

        //Obtenemos la sigla de la unidad correspondiente
        $sql ="SELECT sigla FROM unidad WHERE id_unidad = '$id_unidad'";
        $res=mysql_query($sql) or die ("Error de b�squeda en la BD: ". mysql_Error());
        $vec=mysql_fetch_array($res);
        $sigla = $vec["sigla"];

        //Concatenamos, para generar el RUT
        $rut = $num.'-'.$sigla;

        //Insertamos en la BD el RUT generado
        $sql="INSERT INTO rut(id_rut,rut,id_unidad) VALUES (NULL,'$rut','$id_unidad')";
        $res = mysql_query($sql);
        $rut2 = $rut;
    }
    $comentario2 = $comentario2.' Contiene los RUT: '.$reg_uni.'.';
    //Insertamos el nuevo registro en la tabla correspondencia
    $sql="INSERT INTO correspondencia
    (id_c,rut,unidad,fecha,correlativo,hoja_ruta,tipo,referencias,fojas,responsable,destino,comentario,ip,estado,sw) VALUES
    (NULL,'$rut2','$unidad_ini','$fecha1','$correlativo','$hoja_ruta','$tipo','$referencias','$fojas','$nombre','$destino2','$comentario2','$ip','$estado','1')";
    $result = mysql_query($sql,$link);   
}

if($cargo=='Mensajero' || $cargo=='Mensajera')
	header ("location: recibido_mens.php");
else
	header ("location: recibido_admin.php");
?>