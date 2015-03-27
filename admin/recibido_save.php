<?
session_start();
	//Codigo tiempo de sesion 
	$fechaGuardada = $_SESSION['ultimoAcceso'];
	$ahora = date("Y-n-j H:i:s");
	$tiempo_transcurrido = (strtotime($ahora) - strtotime($fechaGuardada));

	if($tiempo_transcurrido >= 600){
		//si pasaronn 5 min o mas
		session_name("sesiondirh"); 
		session_unset(); 
		session_destroy(); 
		header ("Location: index.php"); 
	}
	else{
		$_SESSION['ultimoAcceso'] = $ahora;
	}

	if (!isset($_SESSION['paso_por_donde_yo_quiero']))
	{ 
		header ("Location: index.php"); 
		exit; 
	}
   header("Location: recibido_guardar.php");
   include("../funciones.php");
   include("../php/fecha_hora.php");
   $link=conexion();
   $registro=$_POST['reg'];
   $ip=$_SERVER['REMOTE_ADDR'];  
if(isset($_POST['enviar'])!=0)
{  
   $pa_recibido_por= $_POST['recibido_por'];
   $pa_procedencia = $_POST['procedencia'];
   $pa_otro= $_POST['otro'];
   $pa_reg_externo= $_POST['reg_externo'];   
   $pa_hoja_ruta= $_POST['hoja_ruta'];
   $pa_referencias= $_POST['referencias'];
   $pa_tipo= $_POST['tipo'];
   $fojas= $_POST['fojas'];

   $despacho= $_POST['despacho'];
   $asignacion=$_POST['asignacion'];
	if($pa_procedencia==null)
		$pa_procedencia=$pa_otro;

	$fecha=fecha_hora(); 

	$consulta ="SELECT id_remitente FROM remitente where nombre like '$pa_procedencia'";
	$resultado=mysql_query($consulta) or die ("Error de búsqueda en la BD: ". mysql_Error());
	$numResultados = mysql_num_rows($resultado);
	if($numResultados > 0)
	{
		$linea=mysql_fetch_array($resultado,MYSQL_BOTH);
		$pa_id_remitente=$linea["id_remitente"];
		$pa_nombre=$linea["nombre"];
		$sql="INSERT INTO correspondencia (id_remitente,id_receptor) VALUES ('$pa_id_remitente','100')";
		$result = mysql_query($sql);
	}
	else
		$pa_id_remitente=0;
	if($registro!=null)
		$reg=$registro;
	else
	{		
		$sql ="SELECT reg_interno 
			   FROM recibida
		  	   order by reg_interno DESC limit 1";
		$res=mysql_query($sql) or die ("Error de búsqueda en la BD: ". mysql_Error());
		$num = mysql_num_rows($res);
		if($num > 0)
		{
			$linea=mysql_fetch_array($res);
			$reg=$linea["reg_interno"];
			$reg++;
		}
		else
			$reg=1;
	}
	$sql="INSERT INTO recibida (id_rec,reg_interno,id_seg,id_receptor,id_remitente,fecha_hora,reg_externo,hoja_ruta,procedencia,referencias,recibido_por,tipo,fojas,ip) VALUES (NULL,'$reg',0,'020','$pa_id_remitente','$fecha','$pa_reg_externo','$pa_hoja_ruta','$pa_procedencia','$pa_referencias','$pa_recibido_por','$pa_tipo','$fojas','$ip')";
	$result = mysql_query($sql) or die("fallo".mysql_Error());

if ($pa_tipo == 'Defensa de Tesis' || $pa_tipo == 'Convalidacion de Materias' || $pa_tipo =='Conclusion de Materias')
	{
		$sql="INSERT INTO r_titulacion (reg_interno,tipo) VALUES ('$reg','$pa_tipo')";
		$result = mysql_query($sql,$link);
	}	
if($pa_tipo == 'Nomb. de Docentes' || $pa_tipo == 'Nomb. de Auxiliares' || $pa_tipo == 'Nomb. de Autoridades Academicas')
	{
		$sql="INSERT INTO r_nombramiento (reg_interno,tipo) VALUES ('$reg','$pa_tipo')";
		$result = mysql_query($sql,$link);
	}
if($pa_tipo == 'Formularios de Vacacion')
	{
		$sql="INSERT INTO r_vacacion (reg_interno) VALUES ('$reg_interno')";
		$result = mysql_query($sql,$link);
	}
	include("seguimiento.php");
	$consulta ="SELECT id_receptor FROM receptor WHERE responsable = '$asignacion'";
	$resultado=mysql_query($consulta) or die ("Error de búsqueda en la BD: ". mysql_Error());
	$linea=mysql_fetch_array($resultado);	
	$id_receptor=$linea["id_receptor"];

	$sql="INSERT INTO despachada (id_despachada,id_receptor,id_remitente,fecha_hora,correlativo,hoja_ruta,dirigido,referencias,recibido_por,tipo,id_notificacion,fojas) 	
	VALUES (NULL,'$id_receptor','100','$fecha','','','','','','','','')";
	$result = mysql_query($sql,$link);
	
	$consulta ="SELECT id_despachada FROM despachada order by id_despachada DESC limit 1";
	$resultado=mysql_query($consulta) or die ("Error de búsqueda en la BD: ". mysql_Error());
	$linea=mysql_fetch_array($resultado);	
	$id_despachada=$linea["id_despachada"]; 

	$sql="INSERT INTO seguimiento (id_seguimiento,reg_interno,id_res_des,estado,observaciones,accion) VALUES (NULL,'$reg','$id_despachada','','','Despachado')";
	$result = mysql_query($sql) or die("Error en la inserción de datos".mysql_Error());

	$consulta ="SELECT id_seguimiento FROM seguimiento order by id_seguimiento DESC limit 1";
	$resultado=mysql_query($consulta) or die ("Error de búsqueda en la BD: ". mysql_Error());
	$linea=mysql_fetch_array($resultado);	
	$id_seguimiento=$linea["id_seguimiento"];

	if($despacho!=null)
	{	echo 'todo ok';
		$sql="INSERT INTO despachada 
		(id_despachada,id_receptor,id_remitente,fecha_hora,correlativo,hoja_ruta,dirigido,referencias,recibido_por,tipo,id_notificacion,fojas,ip) VALUES 
		(NULL,'31','100','$fecha','0','0','Gestiones','$pa_referencias','0','$pa_tipo','0','$fojas','$ip')";
		$result = mysql_query($sql,$link);
		
		$consulta ="SELECT id_despachada FROM despachada order by id_despachada DESC limit 1";
		$resultado=mysql_query($consulta) or die ("Error de búsqueda en la BD: ". mysql_Error());
		$linea=mysql_fetch_array($resultado);	
		$id_despachada=$linea["id_despachada"];

		$consulta ="SELECT id_rec FROM recibida order by id_rec DESC limit 1";
		$resultado=mysql_query($consulta) or die ("Error de búsqueda en la BD: ". mysql_Error());
		$linea=mysql_fetch_array($resultado);	
		$id_rec=$linea["id_rec"];

/*		$consulta ="SELECT reg_interno FROM recibida WHERE id_rec = $id_rec";
		$resultado=mysql_query($consulta) or die ("Error de búsqueda en la BD: ". mysql_Error());
		$linea=mysql_fetch_array($resultado);
		$reg=$linea["reg_interno"];*/

		$sql="INSERT INTO seguimiento (id_seguimiento,reg_interno,id_res_des,estado,observaciones,accion) VALUES (NULL,'$reg','$id_despachada','','','Despachado')";
		$result = mysql_query($sql) or die("Error en la inserción de datos".mysql_Error());
		
		$consulta ="SELECT id_seguimiento FROM seguimiento order by id_seguimiento DESC limit 1";
		$resultado=mysql_query($consulta) or die ("Error de búsqueda en la BD: ". mysql_Error());
		$linea=mysql_fetch_array($resultado);	
		$id_seg=$linea["id_seguimiento"];
		
/*		$sql="UPDATE recibida SET id_seg=$id_seg WHERE id_rec='$id_rec'";
		$result = mysql_query($sql) or die("Error en la inserción de datos".mysql_Error());*/
	
//		header ("location: despachado_guardar.php");
	}
	else
		echo 'everything is bad :(';
}
else
	echo '<h1><center>No se ha enviado nada</center></h1>';
?>