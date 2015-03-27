<?
//efffff
require_once 'jUploadPHP.php';
include "./pclzip.lib.php";
//efffff
session_start();
if (!isset($_SESSION['paso_por_donde_yo_quiero']))
{ 
	header ("Location: index.php"); 
	exit; 
} 
$cid_user=$_SESSION['id_user'];
$cnombre=$_SESSION['nombre_ini']; 
$cunidad=$_SESSION['unidad_ini']; 
$cid_unidad=$_SESSION['id_unidad']; 
$ip=$_SERVER['REMOTE_ADDR']; 
include("../funciones1.php");
$link=conexion();

//Obtenemos el RUT correspondiente a la unidad.
$consulta ="SELECT rut FROM rut WHERE id_unidad = '$cid_unidad' order by id_rut DESC limit 1";
$resultado=mysql_query($consulta) or die ("Error de búsqueda en la BD: ". mysql_Error());
$numResultados = mysql_num_rows($resultado);
if ($numResultados>0)
{
	$linea=mysql_fetch_array($resultado);
	$rut = $linea["rut"];	

	//Obtenemos la parte numérica, para incrementar su valor como nuevo Trámite
	$B = '-';
	$BB= strpos($rut,$B);
	$num= substr($rut,0,$BB);
	$num++;
}
else
	$num=1;
	
//Obtenemos la sigla de la unidad correspondiente
$sql ="SELECT sigla FROM unidad WHERE id_unidad = $cid_unidad";
$res=mysql_query($sql) or die ("Error de búsqueda en la BD: ". mysql_Error());
$vec=mysql_fetch_array($res);
$sigla = $vec["sigla"];	

//Concatenamos, para generar el RUT + gestion effff
date_default_timezone_set('UTC');
$rut = $num.'-'.$sigla.'_'.date("Y");

//Insertamos en la BD el RUT generado
$sql="INSERT INTO rut(id_rut,rut,id_unidad) VALUES (NULL,'$rut','$cid_unidad')";
$res = mysql_query($sql);

//Capturamos todos los valores enviados desde el script Registrar
$fecha= $_POST['fecha'];
$tipo = $_POST['tipo'];
$procedencia = $_POST['procedencia'];
$otro = $_POST['otro'];
$reg_ext = $_POST['reg_ext'];
$hoja_ruta = $_POST['hoja_ruta'];
//$referencias = $_POST['referencias'];
$fojas = $_POST['fojas'];
$nombre = $_POST['recibido_por'];
$destino = $_POST['destino'];
$estado = $_POST['estado'];
//efffffrain
//RESCATAMOS LAS VARIABLES SEGUN TRAMITE y MACROENTIDAD VARIABLES GENERALES
$id_macro = $_POST['marco'];
$id_tramite = $_POST['tramix'];
//para manejar menos niveles de los descargos
$id_tram = $_POST['descargo'];
//RESCATAMOS LA VARIABLE TRAMITE PARA LA TABLA CORRESPONDENCIA PORQUE LA NECESITA SI O SI
$sql1 = "SELECT tipo FROM tramites WHERE id_t = '$id_tramite'";
$result1 = mysql_query($sql1,$link);
$linea = mysql_fetch_array($result1);
$tipo = $linea["tipo"]; 

//VARIBLE PARA EL INSERT A TRAMITESECUENCIAL

$transaccional='id_tc,rut,id_macro,id_t,id_div,beneficiariobien,descripcionbienser,destinobienser,montobienser,proveedor,nombrebeca,nombrebecainv,nombreconprod,nombreconlin,nombreserman,nombresernoper,nombregrupal,mesperiodopag,montopag,unisolpago,responsablefon,destinofon,unidadsoli,montofon,otronombrefonrota,responfondorotato,objfondorota,montofonrota,responfondo,actividad,unidadsolici,montofondo,boleta,nroboleta,reposicion,cierre,nomdescarespeci,rotatonomdes,beneficiariosviapasj,lugarviapasj,duracionviajpasaj,fechaini,fechafin,tenor,observaciones';
////////////////////////////////////////////////////////////////////////DESDE AQUI FINANCIEROS/////////////////////////////////////
//Solicitud de Compra
if($id_tramite==36)
{		$eleccion = $_POST['bienen'];//devuelve false indica que se eligio servicios
		$elecc = $_POST['servime'];//devuelve false indica que se eligio bienes
		
		if($eleccion=="")
		{
		//si eleccion esta vacio rescatar del bien
		$id_div=1;//sabemos que compra de bien es id_div
		$tipito='Solicitud de Compra, Compra de Bien:';
		$valor1 = $_POST['benebien'];
		$valor2 = $_POST['descbien'];
		$valor3 = $_POST['desbien'];
		$valor4 = $_POST['monbien'];
						//insertamos a transaccional
						$sql = "INSERT INTO tramitecrecencial(".$transaccional.") VALUES (NULL,'$rut','$id_macro','$id_tramite','$id_div','$valor1','$valor2','$valor3','$valor4','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','')";
						$result = mysql_query($sql,$link);
						//obtenemos el id_tc del insertado para utilizarlo despues
						$sql = "SELECT * FROM tramitecrecencial WHERE id_div='$id_div' and id_t='$id_tramite' and rut='$rut' and beneficiariobien='$valor1' and descripcionbienser='$valor2' and destinobienser='$valor3' and montobienser='$valor4'";
						$res = mysql_query($sql) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
						$num = mysql_num_rows($res);
						if($num > 0)
						{								
							while ($vec = mysql_fetch_array($res))
							{	
								$id_tc = $vec["id_tc"];
							}
						}

						$referencias = $tipito.' Beneficiario: '.$valor1.' provee el bien: '.$valor2.', destinado a la Unidad '.$valor3.' por un monto de '.$valor4.' Bs.';
		}
		else
		{
		//se rescata servicios
		$id_div=2;//sabemos que pago de servicio es id_div
		$tipito='Solicitud de Compra, Compra de Servicio:';
		$valor1 = $_POST['beneser'];
		$valor2 = $_POST['descser'];
		$valor3 = $_POST['deser'];
		$valor4 = $_POST['montoser'];
		//insertamos a transaccional
						$sql = "INSERT INTO tramitecrecencial(".$transaccional.") VALUES (NULL,'$rut','$id_macro','$id_tramite','$id_div','','$valor2','$valor3','$valor4','$valor1','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','')";
						$result = mysql_query($sql,$link);
						//obtenemos el id_tc del insertado para utilizarlo despues
						$sql = "SELECT * FROM tramitecrecencial WHERE id_div='$id_div' and id_t='$id_tramite' and rut='$rut' and proveedor='$valor1' and descripcionbienser='$valor2' and destinobienser='$valor3' and montobienser='$valor4'";
						$res = mysql_query($sql) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
						$num = mysql_num_rows($res);
						if($num > 0)
						{								
							while ($vec = mysql_fetch_array($res))
							{	
								$id_tc = $vec["id_tc"];
							}
						}
		$referencias = $tipito.' Proveedor: '.$valor1.' por el Servicio de: '.$valor2.', consumido por la Unidad '.$valor3.' por un monto de '.$valor4.' Bs.';
		}
}
//HASTA AQUI COMPRAS
//PAGOS
if($id_tramite==65)
{			
		$subtramites = $_POST['pagosol'];
		$valor2 = $_POST['mesperiodo'];
		$valor3 = $_POST['montopago'];
		$valor4 = $_POST['unidsoli'];
		if($subtramites=="Beca Trabajo")
		{
		$id_div=3;//sabemos que es beca trabajo es id_div
		$tipito='Solicitud de Pago, Beca Trabajo:';
		$valor1 = $_POST['nombrebeca'];
		
		
						//insertamos a transaccional
						$sql = "INSERT INTO tramitecrecencial(".$transaccional.") VALUES (NULL,'$rut','$id_macro','$id_tramite','$id_div','','','','','','$valor1','','','','','','','$valor2','$valor3','$valor4','','','','','','','','','','','','','','','','','','','','','','','','','')";
						$result = mysql_query($sql,$link);
						//obtenemos el id_tc del insertado para utilizarlo despues
						$sql = "SELECT * FROM tramitecrecencial WHERE id_div='$id_div' and id_t='$id_tramite' and rut='$rut' and nombrebeca='$valor1' and mesperiodopag='$valor2' and montopag='$valor3' and unisolpago='$valor4'";
						$res = mysql_query($sql) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
						$num = mysql_num_rows($res);
						if($num > 0)
						{								
							while ($vec = mysql_fetch_array($res))
							{	
								$id_tc = $vec["id_tc"];
							}
						}
						$referencias = $tipito.' Beneficiario: '.$valor1.' por el mes o periodo '.$valor2.', por un monto de: '.$valor3.' Bs. dentro de la Unidad '.$valor4;
		}
		if($subtramites=="Beca Investigacion")
		{
		$id_div=4;//sabemos que es beca Investigacion es id_div
		$tipito='Solicitud de Pago, Beca Investigacion:';
		$valor1 = $_POST['nombrebecainv'];
				
						//insertamos a transaccional
						$sql = "INSERT INTO tramitecrecencial(".$transaccional.") VALUES (NULL,'$rut','$id_macro','$id_tramite','$id_div','','','','','','','$valor1','','','','','','$valor2','$valor3','$valor4','','','','','','','','','','','','','','','','','','','','','','','','','')";
						$result = mysql_query($sql,$link);
						//obtenemos el id_tc del insertado para utilizarlo despues
						$sql = "SELECT * FROM tramitecrecencial WHERE id_div='$id_div' and id_t='$id_tramite' and rut='$rut' and nombrebecainv='$valor1' and mesperiodopag='$valor2' and montopag='$valor3' and unisolpago='$valor4'";
						$res = mysql_query($sql) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
						$num = mysql_num_rows($res);
						if($num > 0)
						{								
							while ($vec = mysql_fetch_array($res))
							{	
								$id_tc = $vec["id_tc"];
							}
						}
						$referencias = $tipito.' Beneficiario: '.$valor1.' por el mes o periodo '.$valor2.', por un monto de: '.$valor3.' Bs. dentro de la Unidad '.$valor4;
		}
		if($subtramites=="Consultor por Producto")
		{
		$id_div=5;//sabemos que es Producto es id_div
		$tipito='Solicitud de Pago, Consultor por Producto:';
		$valor1 = $_POST['nombreconprod'];
						//insertamos a transaccional
						$sql = "INSERT INTO tramitecrecencial(".$transaccional.") VALUES (NULL,'$rut','$id_macro','$id_tramite','$id_div','','','','','','','','$valor1','','','','','$valor2','$valor3','$valor4','','','','','','','','','','','','','','','','','','','','','','','','','')";
						$result = mysql_query($sql,$link);
						//obtenemos el id_tc del insertado para utilizarlo despues
						$sql = "SELECT * FROM tramitecrecencial WHERE id_div='$id_div' and id_t='$id_tramite' and rut='$rut' and nombreconprod='$valor1' and mesperiodopag='$valor2' and montopag='$valor3' and unisolpago='$valor4'";
						$res = mysql_query($sql) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
						$num = mysql_num_rows($res);
						if($num > 0)
						{								
							while ($vec = mysql_fetch_array($res))
							{	
								$id_tc = $vec["id_tc"];
							}
						}
						$referencias = $tipito.' Beneficiario: '.$valor1.' por el mes o periodo '.$valor2.', por un monto de: '.$valor3.' Bs. dentro de la Unidad '.$valor4;
		}
		if($subtramites=="Consultor en linea")
		{
		$id_div=6;//sabemos que es Linea es id_div
		$tipito='Solicitud de Pago, Consultor en linea:';
		$valor1 = $_POST['nombreconlin'];
						//insertamos a transaccional
						$sql = "INSERT INTO tramitecrecencial(".$transaccional.") VALUES (NULL,'$rut','$id_macro','$id_tramite','$id_div','','','','','','','','','$valor1','','','','$valor2','$valor3','$valor4','','','','','','','','','','','','','','','','','','','','','','','','','')";
						$result = mysql_query($sql,$link);
						//obtenemos el id_tc del insertado para utilizarlo despues
						$sql = "SELECT * FROM tramitecrecencial WHERE id_div='$id_div' and id_t='$id_tramite' and rut='$rut' and nombreconlin='$valor1' and mesperiodopag='$valor2' and montopag='$valor3' and unisolpago='$valor4'";
						$res = mysql_query($sql) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
						$num = mysql_num_rows($res);
						if($num > 0)
						{								
							while ($vec = mysql_fetch_array($res))
							{	
								$id_tc = $vec["id_tc"];
							}
						}
						$referencias = $tipito.' Beneficiario: '.$valor1.' por el mes o periodo '.$valor2.', por un monto de: '.$valor3.' Bs. dentro de la Unidad '.$valor4;
		}
		if($subtramites=="Servicios Manuales")
		{
		$id_div=7;//sabemos que es manual es id_div
		$tipito='Solicitud de Pago, Servicios Manuales:';
		$valor1 = $_POST['nombremanual'];
						//insertamos a transaccional
						$sql = "INSERT INTO tramitecrecencial(".$transaccional.") VALUES (NULL,'$rut','$id_macro','$id_tramite','$id_div','','','','','','','','','','$valor1','','','$valor2','$valor3','$valor4','','','','','','','','','','','','','','','','','','','','','','','','','')";
						$result = mysql_query($sql,$link);
						//obtenemos el id_tc del insertado para utilizarlo despues
						$sql = "SELECT * FROM tramitecrecencial WHERE id_div='$id_div' and id_t='$id_tramite' and rut='$rut' and nombreserman='$valor1' and mesperiodopag='$valor2' and montopag='$valor3' and unisolpago='$valor4'";
						$res = mysql_query($sql) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
						$num = mysql_num_rows($res);
						if($num > 0)
						{								
							while ($vec = mysql_fetch_array($res))
							{	
								$id_tc = $vec["id_tc"];
							}
						}
						$referencias = $tipito.' Beneficiario: '.$valor1.' por el mes o periodo '.$valor2.', por un monto de: '.$valor3.' Bs. dentro de la Unidad '.$valor4;
		}
		if($subtramites=="Servicios no Personales")
		{
		$id_div=8;//sabemos que es Personales es id_div
		$tipito='Solicitud de Pago, Servicios no Personales:';
		$valor1 = $_POST['nombrepersonal'];
		//insertamos a transaccional
						$sql = "INSERT INTO tramitecrecencial(".$transaccional.") VALUES (NULL,'$rut','$id_macro','$id_tramite','$id_div','','','','','','','','','','','$valor1','','$valor2','$valor3','$valor4','','','','','','','','','','','','','','','','','','','','','','','','','')";
						$result = mysql_query($sql,$link);
						//obtenemos el id_tc del insertado para utilizarlo despues
						$sql = "SELECT * FROM tramitecrecencial WHERE id_div='$id_div' and id_t='$id_tramite' and rut='$rut' and nombresernoper='$valor1' and mesperiodopag='$valor2' and montopag='$valor3' and unisolpago='$valor4'";
						$res = mysql_query($sql) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
						$num = mysql_num_rows($res);
						if($num > 0)
						{								
							while ($vec = mysql_fetch_array($res))
							{	
								$id_tc = $vec["id_tc"];
							}
						}
						$referencias = $tipito.' Beneficiario: '.$valor1.' por el mes o periodo '.$valor2.', por un monto de: '.$valor3.' Bs. dentro de la Unidad '.$valor4;
		}
		if($subtramites=="Pago Grupal")
		{
		$id_div=16;//sabemos que es Personales es id_div
		$tipito='Solicitud de Pago, Pago Grupal:';
		$valor1 = $_POST['nombrepersonales'];
		//insertamos a transaccional
						$sql = "INSERT INTO tramitecrecencial(".$transaccional.") VALUES (NULL,'$rut','$id_macro','$id_tramite','$id_div','','','','','','','','','','','','$valor1','$valor2','$valor3','$valor4','','','','','','','','','','','','','','','','','','','','','','','','','')";
						$result = mysql_query($sql,$link);
						//obtenemos el id_tc del insertado para utilizarlo despues
						$sql = "SELECT * FROM tramitecrecencial WHERE id_div='$id_div' and id_t='$id_tramite' and rut='$rut' and nombregrupal='$valor1' and mesperiodopag='$valor2' and montopag='$valor3' and unisolpago='$valor4'";
						$res = mysql_query($sql) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
						$num = mysql_num_rows($res);
						if($num > 0)
						{								
							while ($vec = mysql_fetch_array($res))
							{	
								$id_tc = $vec["id_tc"];
							}
						}
						$referencias = $tipito.' Beneficiarios: '.$valor1.' por el mes o periodo '.$valor2.', por un monto total de: '.$valor3.' Bs. dentro de la Unidad '.$valor4;
		}
}
//HASTA AQUI PAGOS
//FONDO EN AVANCE APERTURA
if($id_tramite==90)
{			
		$valor1 = $_POST['respfon'];
		$valor2 = $_POST['objfon'];
		$valor3 = $_POST['unitsolfon'];
		$valor4 = $_POST['montofon'];
		
		$tipito='Fondo en Avance Apertura:';
		//insertamos a transaccional
						$sql = "INSERT INTO tramitecrecencial(".$transaccional.") VALUES (NULL,'$rut','$id_macro','$id_tramite','','','','','','','','','','','','','','','','','$valor1','$valor2','$valor3','$valor4','','','','','','','','','','','','','','','','','','','','','')";
						$result = mysql_query($sql,$link);
						//obtenemos el id_tc del insertado para utilizarlo despues
						$sql = "SELECT * FROM tramitecrecencial WHERE id_t='$id_tramite' and rut='$rut' and responsablefon='$valor1' and destinofon='$valor2' and unidadsoli='$valor3' and montofon='$valor4'";
						$res = mysql_query($sql) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
						$num = mysql_num_rows($res);
						if($num > 0)
						{								
							while ($vec = mysql_fetch_array($res))
							{	
								$id_tc = $vec["id_tc"];
							}
						}
						$referencias = $tipito.' Responsable: '.$valor1.' con el fin de: '.$valor2.', solicitado por la Unidad '.$valor3.' por un monto de '.$valor4.' Bs.';
}
//HASTA AQUI FONDO AVANCE APERTURA
//FONDO DE AVANCE ROTATORIO APERTURA
if($id_tramite==91)
{		
		
		$subtramite1 = $_POST['fondorota'];
		$tipito='Fondo en Avance Rotatorio Apertura:';
		//insertamos a transaccional
		if($subtramite1 == "Fondo Rotatorio Apertura Caja Chica")
		{				
						$valor2 = $_POST['respfonrota'];
						$valor3 = $_POST['objfonrota'];
						$valor4 = $_POST['montofonrota'];
						$id_div=9;//sabemos que es 11 otros
						$sql = "INSERT INTO tramitecrecencial(".$transaccional.") VALUES (NULL,'$rut','$id_macro','$id_tramite','$id_div','','','','','','','','','','','','','','','','','','','','','$valor2','$valor3','$valor4','','','','','','','','','','','','','','','','','')";
						$result = mysql_query($sql,$link);
						//obtenemos el id_tc del insertado para utilizarlo despues
						$sql = "SELECT * FROM tramitecrecencial WHERE id_div='$id_div' and id_t='$id_tramite' and rut='$rut' and responfondorotato='$valor2' and objfondorota='$valor3' and montofonrota='$valor4'";
						$res = mysql_query($sql) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
						$num = mysql_num_rows($res);
						if($num > 0)
						{								
							while ($vec = mysql_fetch_array($res))
							{	
								$id_tc = $vec["id_tc"];
							}
						}
						$referencias = $subtramite1.' Responsable del Fondo: '.$valor2.', con el fin de '.$valor3.' por un monto de '.$valor4.' Bs.';
		}
		if($subtramite1 == "Fondo Rotatorio Apertura Fondo Mantenimiento")	
		{
						$valor2 = $_POST['respfonrota'];
						$valor3 = $_POST['objfonrota'];
						$valor4 = $_POST['montofonrota'];

						$id_div=10;//sabemos que es 11 otros
						$sql = "INSERT INTO tramitecrecencial(".$transaccional.") VALUES (NULL,'$rut','$id_macro','$id_tramite','$id_div','','','','','','','','','','','','','','','','','','','','','$valor2','$valor3','$valor4','','','','','','','','','','','','','','','','','')";
						$result = mysql_query($sql,$link);
						//obtenemos el id_tc del insertado para utilizarlo despues
						$sql = "SELECT * FROM tramitecrecencial WHERE id_div='$id_div' and id_t='$id_tramite' and rut='$rut' and responfondorotato='$valor2' and objfondorota='$valor3' and montofonrota='$valor4'";
						$res = mysql_query($sql) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
						$num = mysql_num_rows($res);
						if($num > 0)
						{								
							while ($vec = mysql_fetch_array($res))
							{	
								$id_tc = $vec["id_tc"];
							}
						}
						$referencias = $subtramite1.' Responsable del Fondo: '.$valor2.', con el fin de '.$valor3.' por un monto de '.$valor4.' Bs.';
		}
		if($subtramite1 == "Otro Fondo Rotatorio")
		{				$valor1 = $_POST['nomfonrota'];
						$valor2 = $_POST['respfonrota'];
						$valor3 = $_POST['objfonrota'];
						$valor4 = $_POST['montofonrota'];
												
						$id_div=11;//sabemos que es 11 otros
						$sql = "INSERT INTO tramitecrecencial(".$transaccional.") VALUES (NULL,'$rut','$id_macro','$id_tramite','$id_div','','','','','','','','','','','','','','','','','','','','$valor1','$valor2','$valor3','$valor4','','','','','','','','','','','','','','','','','')";//ya ta corregido
					
						$result = mysql_query($sql,$link);
						//obtenemos el id_tc del insertado para utilizarlo despues
						$sql = "SELECT * FROM tramitecrecencial WHERE id_div='$id_div' and id_t='$id_tramite' and rut='$rut' and otronombrefonrota='$valor1' and responfondorotato='$valor2' and objfondorota='$valor3' and montofonrota='$valor4'";
						$res = mysql_query($sql) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
						$num = mysql_num_rows($res);
						if($num > 0)
						{								
							while ($vec = mysql_fetch_array($res))
							{	
								$id_tc = $vec["id_tc"];
							}
						}
						$referencias = $tipito.', '.$subtramite1.' Fondo especifico: '.$valor1.' Responsable del Fondo: '.$valor2.', con el fin de '.$valor3.' por un monto de '.$valor4.' Bs.';
						
		}
}//hasta aqui fondo de avance rotatorio aperturas
//desde AQUI DESCARGOS es el mas largo........
//primero descargo de fondos en avance id_macro 100
if($id_tram=="Descargo de Fondo en Avance")
{
		$valor1 = $_POST['desresponfon'];
		$valor2 = $_POST['descaractiviti'];
		$valor3 = $_POST['desunisol'];
		$valor4 = $_POST['desmontofon'];
		$valor5 = $_POST['desnrobole'];
		$id_trami = 11;
		$id_div=0;//sabemos que estamos sacando el tramite de la tabla tramites y no de division
		$tipito='Descargo Fondo en Avance:';
		//if para saber si valor5 es vacio no tiene boleta
				if($valor5=="")
					{	
						$bol="no";//no tiene boleta
						$sql = "INSERT INTO tramitecrecencial(".$transaccional.") VALUES (NULL,'$rut','$id_macro','$id_trami','$id_div','','','','','','','','','','','','','','','','','','','','','','','','$valor1','$valor2','$valor3','$valor4','$bol','','','','','','','','','','','','')";
						
						$result = mysql_query($sql,$link);
						//obtenemos el id_tc del insertado para utilizarlo despues
						$sql = "SELECT * FROM tramitecrecencial WHERE id_t='$id_trami' and id_div='$id_div' and rut='$rut' and responfondo='$valor1' and actividad='$valor2' and unidadsolici='$valor3' and montofondo='$valor4'";
						$res = mysql_query($sql) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
						$num = mysql_num_rows($res);
						if($num > 0)
						{								
							while ($vec = mysql_fetch_array($res))
							{	
								$id_tc = $vec["id_tc"];
							}
						}
						$referencias = $tipito.' Responsable: '.$valor1.' por la actividad de: '.$valor2.', solicitado por la Unidad '.$valor3.' por un monto de '.$valor4.' Bs. sin boleta ';
					}
					else
					{
						$bol="si";//no tiene boleta
						$sql = "INSERT INTO tramitecrecencial(".$transaccional.") VALUES (NULL,'$rut','$id_macro','$id_trami','$id_div','','','','','','','','','','','','','','','','','','','','','','','','$valor1','$valor2','$valor3','$valor4','$bol','$valor5','','','','','','','','','','','')";
						
						$result = mysql_query($sql,$link);
						//obtenemos el id_tc del insertado para utilizarlo despues
						$sql = "SELECT * FROM tramitecrecencial WHERE id_t='$id_trami' and rut='$rut' and responfondo='$valor1' and actividad='$valor2' and unidadsolici='$valor3' and montofondo='$valor4'";
						$res = mysql_query($sql) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
						$num = mysql_num_rows($res);
						if($num > 0)
						{								
							while ($vec = mysql_fetch_array($res))
							{	
								$id_tc = $vec["id_tc"];
							}
						}
						$referencias = $tipito.' Responsable: '.$valor1.' por la actividad de: '.$valor2.', solicitado por la Unidad '.$valor3.' por un monto de '.$valor4.' Bs. con número de Boleta: '.$valor5.'.';
					}
}
if($id_tram=="Descargo Viajes")
{
		$valor1 = $_POST['desresponfon2'];
		$valor2 = $_POST['desviaactiviti2'];
		$valor3 = $_POST['desunisol2'];
		$valor4 = $_POST['desnrobole'];
		$id_trami = 97;
		$id_div=0;//sabemos que estamos sacando el tramite de la tabla tramites y no de division
		$tipito='Descargo Viajes:';
		//if para saber si valor5 es vacio no tiene boleta
				if($valor4=="")
					{	
						$bol="no";//no tiene boleta
						$sql = "INSERT INTO tramitecrecencial(".$transaccional.") VALUES (NULL,'$rut','$id_macro','$id_trami','$id_div','','','','','','','','','','','','','','','','','','','','','','','','$valor1','$valor2','$valor3','','$bol','','','','','','','','','','','','')";
						
						$result = mysql_query($sql,$link);
						//obtenemos el id_tc del insertado para utilizarlo despues
						$sql = "SELECT * FROM tramitecrecencial WHERE id_t='$id_trami' and id_div='$id_div' and rut='$rut' and responfondo='$valor1' and actividad='$valor2' and unidadsolici='$valor3'";
						$res = mysql_query($sql) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
						$num = mysql_num_rows($res);
						if($num > 0)
						{								
							while ($vec = mysql_fetch_array($res))
							{	
								$id_tc = $vec["id_tc"];
							}
						}
						$referencias = $tipito.' Responsable: '.$valor1.' por la actividad de: '.$valor2.', solicitado por la Unidad '.$valor3.' sin boleta.';
					}
					else
					{
						$bol="si";//no tiene boleta
						$sql = "INSERT INTO tramitecrecencial(".$transaccional.") VALUES (NULL,'$rut','$id_macro','$id_trami','$id_div','','','','','','','','','','','','','','','','','','','','','','','','$valor1','$valor2','$valor3','','$bol','$valor4','','','','','','','','','','','')";
						
						$result = mysql_query($sql,$link);
						//obtenemos el id_tc del insertado para utilizarlo despues
						$sql = "SELECT * FROM tramitecrecencial WHERE id_t='$id_trami' and id_div='$id_div' and rut='$rut' and responfondo='$valor1' and actividad='$valor2' and unidadsolici='$valor3'";
						$res = mysql_query($sql) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
						$num = mysql_num_rows($res);
						if($num > 0)
						{								
							while ($vec = mysql_fetch_array($res))
							{	
								$id_tc = $vec["id_tc"];
							}
						}
						$referencias = $tipito.' Responsable: '.$valor1.' por la actividad de: '.$valor2.', solicitado por la Unidad '.$valor3.' con número de Boleta: '.$valor4.'.';
					}
}
if($id_tram=="Otros Descargos Cierre de Cargos")
{
		$valor0 = $_POST['nomdesotro2'];
		$valor1 = $_POST['desresponfon23'];
		$valor2 = $_POST['desviaactiviti3'];
		$valor3 = $_POST['desunisol23'];
		$valor4 = $_POST['desnrobole'];
		$id_trami = 13;
		$id_div=0;//sabemos que estamos sacando el tramite de la tabla tramites y no de division
		$tipito='Otros Descargos Cierre de Cargos:';
		//if para saber si valor es vacio no tiene boleta
					if($valor4=="")
					{	
						$bol="no";//no tiene boleta
						$sql = "INSERT INTO tramitecrecencial(".$transaccional.") VALUES (NULL,'$rut','$id_macro','$id_trami','$id_div','','','','','','','','','','','','','','','','','','','','','','','','$valor1','$valor2','$valor3','','$bol','','','','$valor0','','','','','','','','')";
						
						$result = mysql_query($sql,$link);
						//obtenemos el id_tc del insertado para utilizarlo despues
						$sql = "SELECT * FROM tramitecrecencial WHERE id_t='$id_trami' and id_div='$id_div' and rut='$rut' and responfondo='$valor1' and actividad='$valor2' and unidadsolici='$valor3'";
						$res = mysql_query($sql) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
						$num = mysql_num_rows($res);
						if($num > 0)
						{								
							while ($vec = mysql_fetch_array($res))
							{	
								$id_tc = $vec["id_tc"];
							}
						}
						$referencias = $tipito.' Nombre del Descargo: '.$valor0.' Responsable: '.$valor1.' por la actividad de: '.$valor2.' solicitado por la Unidad '.$valor3.' sin boleta.';
					}
					else
					{
						$bol="si";//no tiene boleta
						$sql = "INSERT INTO tramitecrecencial(".$transaccional.") VALUES (NULL,'$rut','$id_macro','$id_trami','$id_div','','','','','','','','','','','','','','','','','','','','','','','','$valor1','$valor2','$valor3','','$bol','$valor4','','','$valor0','','','','','','','','')";
						
						$result = mysql_query($sql,$link);
						//obtenemos el id_tc del insertado para utilizarlo despues
						$sql = "SELECT * FROM tramitecrecencial WHERE id_t='$id_trami' and id_div='$id_div' and rut='$rut' and responfondo='$valor1' and actividad='$valor2' and unidadsolici='$valor3'";
						$res = mysql_query($sql) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
						$num = mysql_num_rows($res);
						if($num > 0)
						{								
							while ($vec = mysql_fetch_array($res))
							{	
								$id_tc = $vec["id_tc"];
							}
						}
						$referencias = $tipito.' Nombre del Descargo: '.$valor0.' Responsable: '.$valor1.' por la actividad de: '.$valor2.', solicitado por la Unidad '.$valor3.' con número de Boleta: '.$valor4.'.';
					}
}
if($id_tram=="Descargo Fondos Rotatorios")
{
		$subtramite1 = $_POST['descargorota'];
		$tipito='Descargo Fondos Rotatorios:';
		$id_trami = 96;
		//insertamos a transaccional
		if($subtramite1 == "Descargo Caja Chica")
		{				
						$valor2 = $_POST['descajachica'];
						if($valor2=="reposicion")
						{
							$valor3 = $_POST['desrotacajades'];
							$valor4 = $_POST['desrotacajauni'];
							$valor5 = $_POST['desrotacajamonto'];
							$valor6 = $_POST['desnrobole1'];
							if($valor6=="")
							{
								$bol="no";//no tiene boleta
								$id_div=13;//sabemos que caja chica es 13
								$sql = "INSERT INTO tramitecrecencial(".$transaccional.") VALUES (NULL,'$rut','$id_macro','$id_trami','$id_div','','','','','','','','','','','','','','','','','','','','','','','','$valor3','','$valor4','$valor5','$bol','','$valor2','','','','','','','','','','')";
								$result = mysql_query($sql,$link);
								//obtenemos el id_tc del insertado para utilizarlo despues
								$sql = "SELECT * FROM tramitecrecencial WHERE id_div='$id_div' and rut='$rut' and responfondo='$valor3' and unidadsolici='$valor4' and montofondo='$valor5'";
								$res = mysql_query($sql) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
								$num = mysql_num_rows($res);
								if($num > 0)
								{								
									while ($vec = mysql_fetch_array($res))
									{	
										$id_tc = $vec["id_tc"];
									}
								}
								$referencias = $tipito.' '.$subtramite1.' para Reposicion, Responsable del Fondo: '.$valor3.', solicitado por la Unidad '.$valor4.' por un monto de '.$valor5.' Bs. sin Boleta.';
							}
							else
							{
								$bol="si";//no tiene boleta
								$id_div=13;//sabemos que caja chica es 13
								$sql = "INSERT INTO tramitecrecencial(".$transaccional.") VALUES (NULL,'$rut','$id_macro','$id_trami','$id_div','','','','','','','','','','','','','','','','','','','','','','','','$valor3','','$valor4','$valor5','$bol','$valor6','$valor2','','','','','','','','','','')";
								$result = mysql_query($sql,$link);
								//obtenemos el id_tc del insertado para utilizarlo despues
								$sql = "SELECT * FROM tramitecrecencial WHERE id_div='$id_div' and rut='$rut' and responfondo='$valor3' and unidadsolici='$valor4' and montofondo='$valor5'";
								$res = mysql_query($sql) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
								$num = mysql_num_rows($res);
								if($num > 0)
								{								
									while ($vec = mysql_fetch_array($res))
									{	
										$id_tc = $vec["id_tc"];
									}
								}
								$referencias = $tipito.' '.$subtramite1.' para Reposicion, Responsable del Fondo: '.$valor3.', solicitado por la Unidad '.$valor4.' por un monto de '.$valor5.' Bs. con número de Boleta '.$valor6.'.';
							}
						}
						else
						{
							$valor3 = $_POST['desrotacajades1'];
							$valor4 = $_POST['desrotacajauni1'];
							$valor5 = $_POST['desrotacajamonto1'];
							$valor6 = $_POST['desnrobole1'];
							if($valor6=="")
							{
								$bol="no";//no tiene boleta
								$id_div=13;//sabemos que caja chica es 13
								$sql = "INSERT INTO tramitecrecencial(".$transaccional.") VALUES (NULL,'$rut','$id_macro','$id_trami','$id_div','','','','','','','','','','','','','','','','','','','','','','','','$valor3','','$valor4','$valor5','$bol','','$valor2','','','','','','','','','','')";
								$result = mysql_query($sql,$link);
								//obtenemos el id_tc del insertado para utilizarlo despues
								$sql = "SELECT * FROM tramitecrecencial WHERE id_div='$id_div' and rut='$rut' and responfondo='$valor3' and unidadsolici='$valor4' and montofondo='$valor5'";
								$res = mysql_query($sql) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
								$num = mysql_num_rows($res);
								if($num > 0)
								{								
									while ($vec = mysql_fetch_array($res))
									{	
										$id_tc = $vec["id_tc"];
									}
								}
								$referencias = $tipito.' '.$subtramite1.' para cierre, Responsable del Fondo: '.$valor3.', solicitado por la Unidad '.$valor4.' por un monto de '.$valor5.' Bs. sin Boleta.';
							}
							else
							{
								$bol="si";//no tiene boleta
								$id_div=13;//sabemos que caja chica es 13
								$sql = "INSERT INTO tramitecrecencial(".$transaccional.") VALUES (NULL,'$rut','$id_macro','$id_trami','$id_div','','','','','','','','','','','','','','','','','','','','','','','','$valor3','','$valor4','$valor5','$bol','$valor6','$valor2','','','','','','','','','','')";
								$result = mysql_query($sql,$link);
								//obtenemos el id_tc del insertado para utilizarlo despues
								$sql = "SELECT * FROM tramitecrecencial WHERE id_div='$id_div' and rut='$rut' and responfondo='$valor3' and unidadsolici='$valor4' and montofondo='$valor5'";
								$res = mysql_query($sql) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
								$num = mysql_num_rows($res);
								if($num > 0)
								{								
									while ($vec = mysql_fetch_array($res))
									{	
										$id_tc = $vec["id_tc"];
									}
								}
								$referencias = $tipito.' '.$subtramite1.' para cierre, Responsable del Fondo: '.$valor3.', solicitado por la Unidad '.$valor4.' por un monto de '.$valor5.' Bs. con número de Boleta '.$valor6.'.';
							}
						}
		}
		
		if($subtramite1 == "Descargo Fondo de Mantenimiento")
		{
						$valor2 = $_POST['desfonman1'];
						if($valor2=="reposicion")
						{
							$valor3 = $_POST['desrotacajades'];
							$valor4 = $_POST['desrotacajauni'];
							$valor5 = $_POST['desrotacajamonto'];
							$valor6 = $_POST['desnrobole1'];
							if($valor6=="")
							{
								$bol="no";//no tiene boleta
								$id_div=14;//sabemos que caja chica es 13
								$sql = "INSERT INTO tramitecrecencial(".$transaccional.") VALUES (NULL,'$rut','$id_macro','$id_trami','$id_div','','','','','','','','','','','','','','','','','','','','','','','','$valor3','','$valor4','$valor5','$bol','','$valor2','','','','','','','','','','')";
								$result = mysql_query($sql,$link);
								//obtenemos el id_tc del insertado para utilizarlo despues
								$sql = "SELECT * FROM tramitecrecencial WHERE id_div='$id_div' and rut='$rut' and responfondo='$valor3' and unidadsolici='$valor4' and montofondo='$valor5'";
								$res = mysql_query($sql) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
								$num = mysql_num_rows($res);
								if($num > 0)
								{								
									while ($vec = mysql_fetch_array($res))
									{	
										$id_tc = $vec["id_tc"];
									}
								}
								$referencias = $tipito.' '.$subtramite1.' para Reposicion, Responsable del Fondo: '.$valor3.', solicitado por la Unidad '.$valor4.' por un monto de '.$valor5.' Bs. sin Boleta.';
							}
							else
							{
								$bol="si";//no tiene boleta
								$id_div=14;//sabemos que caja chica es 14
								$sql = "INSERT INTO tramitecrecencial(".$transaccional.") VALUES (NULL,'$rut','$id_macro','$id_trami','$id_div','','','','','','','','','','','','','','','','','','','','','','','','$valor3','','$valor4','$valor5','$bol','$valor6','$valor2','','','','','','','','','','')";
								$result = mysql_query($sql,$link);
								//obtenemos el id_tc del insertado para utilizarlo despues
								$sql = "SELECT * FROM tramitecrecencial WHERE id_div='$id_div' and rut='$rut' and responfondo='$valor3' and unidadsolici='$valor4' and montofondo='$valor5'";
								$res = mysql_query($sql) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
								$num = mysql_num_rows($res);
								if($num > 0)
								{								
									while ($vec = mysql_fetch_array($res))
									{	
										$id_tc = $vec["id_tc"];
									}
								}
								$referencias = $tipito.' '.$subtramite1.' para Reposicion, Responsable del Fondo: '.$valor3.', solicitado por la Unidad '.$valor4.' por un monto de '.$valor5.' Bs. con número de Boleta '.$valor6.'.';
							}
						}
						else
						{
							$valor3 = $_POST['desrotacajades1'];
							$valor4 = $_POST['desrotacajauni1'];
							$valor5 = $_POST['desrotacajamonto1'];
							$valor6 = $_POST['desnrobole1'];
							if($valor6=="")
							{
								$bol="no";//no tiene boleta
								$id_div=14;//sabemos que caja chica es 13
								$sql = "INSERT INTO tramitecrecencial(".$transaccional.") VALUES (NULL,'$rut','$id_macro','$id_trami','$id_div','','','','','','','','','','','','','','','','','','','','','','','','$valor3','','$valor4','$valor5','$bol','','$valor2','','','','','','','','','','')";
								$result = mysql_query($sql,$link);
								//obtenemos el id_tc del insertado para utilizarlo despues
								$sql = "SELECT * FROM tramitecrecencial WHERE id_div='$id_div' and rut='$rut' and responfondo='$valor3' and unidadsolici='$valor4' and montofondo='$valor5'";
								$res = mysql_query($sql) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
								$num = mysql_num_rows($res);
								if($num > 0)
								{								
									while ($vec = mysql_fetch_array($res))
									{	
										$id_tc = $vec["id_tc"];
									}
								}
								$referencias = $tipito.' '.$subtramite1.' para cierre, Responsable del Fondo: '.$valor3.', solicitado por la Unidad '.$valor4.' por un monto de '.$valor5.' Bs. sin Boleta.';
							}
							else
							{
								$bol="si";//no tiene boleta
								$id_div=14;//sabemos que caja chica es 13
								$sql = "INSERT INTO tramitecrecencial(".$transaccional.") VALUES (NULL,'$rut','$id_macro','$id_trami','$id_div','','','','','','','','','','','','','','','','','','','','','','','','$valor3','','$valor4','$valor5','$bol','$valor6','$valor2','','','','','','','','','','')";
								$result = mysql_query($sql,$link);
								//obtenemos el id_tc del insertado para utilizarlo despues
								$sql = "SELECT * FROM tramitecrecencial WHERE id_div='$id_div' and rut='$rut' and responfondo='$valor3' and unidadsolici='$valor4' and montofondo='$valor5'";
								$res = mysql_query($sql) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
								$num = mysql_num_rows($res);
								if($num > 0)
								{								
									while ($vec = mysql_fetch_array($res))
									{	
										$id_tc = $vec["id_tc"];
									}
								}
								$referencias = $tipito.' '.$subtramite1.' para cierre, Responsable del Fondo: '.$valor3.', solicitado por la Unidad '.$valor4.' por un monto de '.$valor5.' Bs. con número de Boleta '.$valor6.'.';
							}
						}
		}
		if($subtramite1 == "Otros Descargos Rotatorios")
		{
						$valor1 = $_POST['nomotrodescar'];
						$valor2 = $_POST['otrodesfonman1'];
						if($valor2=="reposicion")
						{
							$valor3 = $_POST['desrotacajades'];
							$valor4 = $_POST['desrotacajauni'];
							$valor5 = $_POST['desrotacajamonto'];
							$valor6 = $_POST['desnrobole1'];
							if($valor6=="")
							{
								$bol="no";//no tiene boleta
								$id_div=15;//sabemos que caja chica es 13
								$sql = "INSERT INTO tramitecrecencial(".$transaccional.") VALUES (NULL,'$rut','$id_macro','$id_trami','$id_div','','','','','','','','','','','','','','','','','','','','','','','','$valor3','','$valor4','$valor5','$bol','','$valor2','','','$valor1','','','','','','','')";
								$result = mysql_query($sql,$link);
								//obtenemos el id_tc del insertado para utilizarlo despues
								$sql = "SELECT * FROM tramitecrecencial WHERE id_div='$id_div' and rut='$rut' and responfondo='$valor3' and unidadsolici='$valor4' and montofondo='$valor5'";
								$res = mysql_query($sql) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
								$num = mysql_num_rows($res);
								if($num > 0)
								{								
									while ($vec = mysql_fetch_array($res))
									{	
										$id_tc = $vec["id_tc"];
									}
								}
								$referencias = $tipito.' '.$subtramite1.','.$valor1.' para Reposicion, Responsable del Fondo: '.$valor3.', solicitado por la Unidad '.$valor4.' por un monto de '.$valor5.' Bs. sin Boleta.';
							}
							else
							{
								$bol="si";//no tiene boleta
								$id_div=15;//sabemos que caja chica es 13
								$sql = "INSERT INTO tramitecrecencial(".$transaccional.") VALUES (NULL,'$rut','$id_macro','$id_trami','$id_div','','','','','','','','','','','','','','','','','','','','','','','','$valor3','','$valor4','$valor5','$bol','$valor6','$valor2','','','$valor1','','','','','','','')";
								$result = mysql_query($sql,$link);
								//obtenemos el id_tc del insertado para utilizarlo despues
								$sql = "SELECT * FROM tramitecrecencial WHERE id_div='$id_div' and rut='$rut' and responfondo='$valor3' and unidadsolici='$valor4' and montofondo='$valor5'";
								$res = mysql_query($sql) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
								$num = mysql_num_rows($res);
								if($num > 0)
								{								
									while ($vec = mysql_fetch_array($res))
									{	
										$id_tc = $vec["id_tc"];
									}
								}
								$referencias = $tipito.' '.$subtramite1.','.$valor1.' para Reposicion, Responsable del Fondo: '.$valor3.', solicitado por la Unidad '.$valor4.' por un monto de '.$valor5.' Bs. con número de Boleta '.$valor6.'.';
							}
						}
						else
						{
							$valor3 = $_POST['desrotacajades1'];
							$valor4 = $_POST['desrotacajauni1'];
							$valor5 = $_POST['desrotacajamonto1'];
							$valor6 = $_POST['desnrobole1'];
							if($valor6=="")
							{
								$bol="no";//no tiene boleta
								$id_div=15;//sabemos que caja chica es 13
								$sql = "INSERT INTO tramitecrecencial(".$transaccional.") VALUES (NULL,'$rut','$id_macro','$id_trami','$id_div','','','','','','','','','','','','','','','','','','','','','','','','$valor3','','$valor4','$valor5','$bol','','$valor2','','','$valor1','','','','','','','')";
								$result = mysql_query($sql,$link);
								//obtenemos el id_tc del insertado para utilizarlo despues
								$sql = "SELECT * FROM tramitecrecencial WHERE id_div='$id_div' and rut='$rut' and responfondo='$valor3' and unidadsolici='$valor4' and montofondo='$valor5'";
								$res = mysql_query($sql) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
								$num = mysql_num_rows($res);
								if($num > 0)
								{								
									while ($vec = mysql_fetch_array($res))
									{	
										$id_tc = $vec["id_tc"];
									}
								}
								$referencias = $tipito.' '.$subtramite1.','.$valor1.' para cierre, Responsable del Fondo: '.$valor3.', solicitado por la Unidad '.$valor4.' por un monto de '.$valor5.' Bs. sin Boleta.';
							}
							else
							{
								$bol="si";//no tiene boleta
								$id_div=15;//sabemos que caja chica es 13
								$sql = "INSERT INTO tramitecrecencial(".$transaccional.") VALUES (NULL,'$rut','$id_macro','$id_trami','$id_div','','','','','','','','','','','','','','','','','','','','','','','','$valor3','','$valor4','$valor5','$bol','$valor6','$valor2','','','$valor1','','','','','','','')";
								$result = mysql_query($sql,$link);
								//obtenemos el id_tc del insertado para utilizarlo despues
								$sql = "SELECT * FROM tramitecrecencial WHERE id_div='$id_div' and rut='$rut' and responfondo='$valor3' and unidadsolici='$valor4' and montofondo='$valor5'";
								$res = mysql_query($sql) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
								$num = mysql_num_rows($res);
								if($num > 0)
								{								
									while ($vec = mysql_fetch_array($res))
									{	
										$id_tc = $vec["id_tc"];
									}
								}
								$referencias = $tipito.' '.$subtramite1.','.$valor1.' para cierre, Responsable del Fondo: '.$valor3.', solicitado por la Unidad '.$valor4.' por un monto de '.$valor5.' Bs. con número de Boleta '.$valor6.'.';
							}
						}
		}
		
}//FIN DESCARGOS ROTATORIOS
//desde aqui viaticos y pasajes
if($id_tramite==99)
{		
		$subtramite1 = $_POST['viapasaj'];
		if($subtramite1 == "Viaticos")
		{				
						$tipito='Solicitud de Viaticos:';
						
						$valor2 = $_POST['nombreviapasaj'];
						$valor3 = $_POST['lugarviapasaj'];
						$valor4 = $_POST['duraviapasaj'];
						$valor5 = $_POST['objviapasaj'];
						$valor6 = $_POST['unisolviapasaj'];
						
						$id_div=17;//sabemos que es 11 otros
						$sql = "INSERT INTO tramitecrecencial(".$transaccional.") VALUES (NULL,'$rut','$id_macro','$id_tramite','$id_div','','','','','','','','','','','','','','','','','','','','','','','','','$valor5','$valor6','','','','','','','','$valor2','$valor3','$valor4','','','','')";
						$result = mysql_query($sql,$link);
						//obtenemos el id_tc del insertado para utilizarlo despues
						$sql = "SELECT * FROM tramitecrecencial WHERE id_div='$id_div' and id_t='$id_tramite' and rut='$rut' and beneficiariosviapasj='$valor2' and lugarviapasj='$valor3' and duracionviajpasaj='$valor4' and actividad='$valor5'";
						$res = mysql_query($sql) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
						$num = mysql_num_rows($res);
						if($num > 0)
						{								
							while ($vec = mysql_fetch_array($res))
							{	
								$id_tc = $vec["id_tc"];
							}
						}
						$referencias = $tipito.' Beneficiario(s): '.$valor2.', lugar del viaje '.$valor3.' con una duracion de '.$valor4.' con el fin de: '.$valor5;
		}
		if($subtramite1 == "Pasajes")
		{				
						$tipito='Solicitud de Pasajes:';
						
						$valor2 = $_POST['pasajnomemp'];
						$valor3 = $_POST['monpasaj'];
						$valor4 = $_POST['unisolviapasaj'];
						$valor7 = $_POST['confondo'];
						$id_div=18;
						
						if($valor7=="con")
						{
						$valor5 = $_POST['nomfonavaadj'];
						$valor6 = $_POST['montodonfoavanadj'];
						$sql = "INSERT INTO tramitecrecencial(".$transaccional.") VALUES (NULL,'$rut','$id_macro','$id_tramite','$id_div','','','','','','','','','','','','','','$valor3','','','','','$valor6','$valor5','','','','','','$valor4','','','','','','','','$valor2','','','','','','')";
						$result = mysql_query($sql,$link);
						//obtenemos el id_tc del insertado para utilizarlo despues
						$sql = "SELECT * FROM tramitecrecencial WHERE id_div='$id_div' and id_t='$id_tramite' and rut='$rut' and beneficiariosviapasj='$valor2' and montopag='$valor3' and unidadsolici='$valor4' and otronombrefonrota='$valor5' and montofon='$valor6'";
						$res = mysql_query($sql) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
						$num = mysql_num_rows($res);
							if($num > 0)
							{								
								while ($vec = mysql_fetch_array($res))
								{	
									$id_tc = $vec["id_tc"];
								}
							}
						$referencias = $tipito.' Beneficiario(s): '.$valor2.', por un monto total de: '.$valor3.' Bs. Solicitado por la Unidad de '.$valor4.' con Fondo de Avance Adjunto: '.$valor5.' por un monto de fondo de: '.$valor6.' Bs.';
						}
						elseif($valor7=="sin")
						{
						$sql = "INSERT INTO tramitecrecencial(".$transaccional.") VALUES (NULL,'$rut','$id_macro','$id_tramite','$id_div','','','','','','','','','','','','','','$valor3','','','','','','','','','','','','$valor4','','','','','','','','$valor2','','','','','','')";
						$result = mysql_query($sql,$link);
						//obtenemos el id_tc del insertado para utilizarlo despues
						$sql = "SELECT * FROM tramitecrecencial WHERE id_div='$id_div' and id_t='$id_tramite' and rut='$rut' and beneficiariosviapasj='$valor2' and montopag='$valor3' and unidadsolici='$valor4' and otronombrefonrota='$valor5' and montofon='$valor6'";
						$res = mysql_query($sql) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
						$num = mysql_num_rows($res);
							if($num > 0)
							{								
								while ($vec = mysql_fetch_array($res))
								{	
									$id_tc = $vec["id_tc"];
								}
							}
						$referencias = $tipito.' Beneficiario(s): '.$valor2.', por un monto total de: '.$valor3.' Bs. Solicitado por la Unidad de '.$valor4.'.';
						}
		}
		if($subtramite1 == "Viaticos y Pasajes")
		{
						$tipito='Solicitud Viaticos y Pasajes:';
						
						$valor2 = $_POST['nombreviapasaj'];
						$valor3 = $_POST['lugarviapasaj'];
						$valor4 = $_POST['duraviapasaj'];
						
						$valor5 = $_POST['objviapasaj'];
						$valor6 = $_POST['pasajnomemp'];
						$valor7 = $_POST['monpasaj'];
						$valor8 = $_POST['unisolviapasaj'];
						
						$valor11 = $_POST['confondo'];
						$id_div=19;
						if($valor11=="con")
						{
						$valor9 = $_POST['nomfonavaadj'];
						$valor10 = $_POST['montodonfoavanadj'];
						$sql = "INSERT INTO tramitecrecencial(".$transaccional.") VALUES (NULL,'$rut','$id_macro','$id_tramite','$id_div','','','','','$valor6','','','','','','','','','$valor7','','','','','$valor10','$valor9','','','','','$valor5','$valor8','','','','','','','','$valor2','$valor3','$valor4','','','','')";
						$result = mysql_query($sql,$link);
						//obtenemos el id_tc del insertado para utilizarlo despues
						$sql = "SELECT * FROM tramitecrecencial WHERE id_div='$id_div' and id_t='$id_tramite' and rut='$rut' and beneficiariosviapasj='$valor2' and lugarviapasj='$valor3' and duracionviajpasaj='$valor4' and actividad='$valor5' and proveedor='$valor6' and montopag='$valor7' and unidadsolici='$valor8' and otronombrefonrota='$valor9' and montofon='$valor10'";
						$res = mysql_query($sql) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
						$num = mysql_num_rows($res);
							if($num > 0)
							{								
								while ($vec = mysql_fetch_array($res))
								{	
									$id_tc = $vec["id_tc"];
								}
							}
						$referencias = $tipito.' Beneficiario(s): '.$valor2.', lugar del viaje '.$valor3.' con una duracion de '.$valor4.' con el fin de: '.$valor5.',con pasajes provistos por la Persona/Empresa: '.$valor6.' por un monto de pasajes '.$valor7.' Bs. solicitado por la Unidad de '.$valor8.' con Fondo de Avance Adjunto: '.$valor9.' por un monto de fondo de: '.$valor10.' Bs.';
						}
						elseif($valor11=="sin")
						{
						$sql = "INSERT INTO tramitecrecencial(".$transaccional.") VALUES (NULL,'$rut','$id_macro','$id_tramite','$id_div','','','','','$valor6','','','','','','','','','$valor7','','','','','','','','','','','$valor5','$valor8','','','','','','','','$valor2','$valor3','$valor4','','','','')";
						$result = mysql_query($sql,$link);
						//obtenemos el id_tc del insertado para utilizarlo despues
						$sql = "SELECT * FROM tramitecrecencial WHERE id_div='$id_div' and id_t='$id_tramite' and rut='$rut' and beneficiariosviapasj='$valor2' and lugarviapasj='$valor3' and duracionviajpasaj='$valor4' and actividad='$valor5' and proveedor='$valor6' and montopag='$valor7' and unidadsolici='$valor8'";
						$res = mysql_query($sql) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
						$num = mysql_num_rows($res);
							if($num > 0)
							{								
								while ($vec = mysql_fetch_array($res))
								{	
									$id_tc = $vec["id_tc"];
								}
							}
						$referencias = $tipito.' Beneficiario(s): '.$valor2.', lugar del viaje '.$valor3.' con una duracion de '.$valor4.' con el fin de: '.$valor5.',con pasajes provistos por la Persona/Empresa: '.$valor6.' por un monto de pasajes '.$valor7.' Bs. solicitado por la Unidad de '.$valor8.'.';
						}
						
		}
}//CIERRE VIATICOS Y PASAJES
//INICIO POA PRESUPUESTOS
if($id_tramite==38)
{			
		//$valor1 = $_POST['unidadsolicipoa'];
		$valor2 = $_POST['proyecactiviti'];
		$valor3 = $_POST['montopoa'];
		$valor4 = $_POST['ordenpoa'];
		
		$tipito='PRESUPUESTOS POA: ';
		//insertamos a transaccional
						$sql = "INSERT INTO tramitecrecencial(".$transaccional.") VALUES (NULL,'$rut','$id_macro','$id_tramite','','','','','','','','','','','','','','','$valor3','$valor2','','','','','','','','','','$valor4','','','','','','','','','','','','','','','')";
						$result = mysql_query($sql,$link);
						//obtenemos el id_tc del insertado para utilizarlo despues
						$sql = "SELECT * FROM tramitecrecencial WHERE id_t='$id_tramite' and rut='$rut' and unisolpago='$valor2' and montopag='$valor3' and actividad='$valor4'";
						$res = mysql_query($sql) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
						$num = mysql_num_rows($res);
						if($num > 0)
						{								
							while ($vec = mysql_fetch_array($res))
							{	
								$id_tc = $vec["id_tc"];
							}
						}
						if($valor4=="")
						{
						$referencias = $tipito.' Solicitado por la Unidad '.$unidad.', para el Proyecto/Actividad: '.$valor2.', por un monto de '.$valor3.' Bs.';
						}
						else
						{
						$referencias = $tipito.' Solicitado por la Unidad '.$unidad.', para el Proyecto/Actividad: '.$valor2.', por un monto de '.$valor3.' Bs. con orden '.$valor4.'.';
						}
}//CIERRE POA PRESUPUESTOS
//INICIO MODIFICACION PRESUPUESTARIA
if($id_tramite==48)
{		
		$subtramite1 = $_POST['modifipresu'];
		$tipito='Modificacion Presupuestaria, ';
		if($subtramite1 == "Incremento Presupuestario")
		{				
						$valor2 = $_POST['proyecactivitiinctras'];
						$valor3 = $_POST['montoinctras'];
												
						$id_div=20;
						$sql = "INSERT INTO tramitecrecencial(".$transaccional.") VALUES (NULL,'$rut','$id_macro','$id_tramite','$id_div','','','','','','','','','','','','','','$valor3','$valor2','','','','','','','','','','','','','','','','','','','','','','','','','')";
						$result = mysql_query($sql,$link);
						//obtenemos el id_tc del insertado para utilizarlo despues
						$sql = "SELECT * FROM tramitecrecencial WHERE id_div='$id_div' and id_t='$id_tramite' and rut='$rut' and unisolpago='$valor2' and montopag='$valor3'";
						$res = mysql_query($sql) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
						$num = mysql_num_rows($res);
						if($num > 0)
						{								
							while ($vec = mysql_fetch_array($res))
							{	
								$id_tc = $vec["id_tc"];
							}
						}
						$referencias = $tipito.$subtramite1.' Solicitado por la Unidad '.$unidad.', para el Proyecto/Actividad: '.$valor2.', por un monto de '.$valor3.' Bs.';
		}
		elseif($subtramite1 == "Traspaso Presupuestario")
		{
						$valor2 = $_POST['proyecactivitiinctras'];
						$valor3 = $_POST['montoinctras'];
												
						$id_div=21;
						$sql = "INSERT INTO tramitecrecencial(".$transaccional.") VALUES (NULL,'$rut','$id_macro','$id_tramite','$id_div','','','','','','','','','','','','','','$valor3','$valor2','','','','','','','','','','','','','','','','','','','','','','','','','')";
						$result = mysql_query($sql,$link);
						//obtenemos el id_tc del insertado para utilizarlo despues
						$sql = "SELECT * FROM tramitecrecencial WHERE id_div='$id_div' and id_t='$id_tramite' and rut='$rut' and unisolpago='$valor2' and montopag='$valor3'";
						$res = mysql_query($sql) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
						$num = mysql_num_rows($res);
						if($num > 0)
						{								
							while ($vec = mysql_fetch_array($res))
							{	
								$id_tc = $vec["id_tc"];
							}
						}
						$referencias = $tipito.$subtramite1.' Solicitado por la Unidad '.$unidad.', para el Proyecto/Actividad: '.$valor2.', por un monto de '.$valor3.' Bs.';
		}
		
}//CIERRE MODIFICACION PRESUPUESTARIA
//TRASPASO INTRA-ACTIVIDAD
if($id_tramite==89)
{			
		$valor2 = $_POST['proyactdel'];
		$valor3 = $_POST['proyacthac'];
		$valor4 = $_POST['montointra'];
		
		$tipito='Traspaso Presupuestario Intra-actividad: ';
		//insertamos a transaccional
						$sql = "INSERT INTO tramitecrecencial(".$transaccional.") VALUES (NULL,'$rut','$id_macro','$id_tramite','','','','','','','','','','','','','','','$valor4','$valor2','','','$valor3','','','','','','','','','','','','','','','','','','','','','','')";
						$result = mysql_query($sql,$link);
						//obtenemos el id_tc del insertado para utilizarlo despues
						$sql = "SELECT * FROM tramitecrecencial WHERE id_t='$id_tramite' and rut='$rut' and unisolpago='$valor2' and unidadsoli='$valor3' and montopag='$valor4'";
						$res = mysql_query($sql) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
						$num = mysql_num_rows($res);
						if($num > 0)
						{								
							while ($vec = mysql_fetch_array($res))
							{	
								$id_tc = $vec["id_tc"];
							}
						}
						$referencias = $tipito.' Solicitado por la Unidad '.$unidad.', del Proyecto/Actividad: '.$valor2.', para el Proyecto/Actividad: '.$valor3.' por un monto de: '.$valor4.' Bs.';
}//CIERRE INTRA-ACTIVIDAD
////////////////////////////////////////////////////////////////////////DESDE AQUI ADMINISTRATIVOS/////////////////////////////////////////////
//NO DEUDAS PENDIENTES
if($id_tramite==88)
{			
		$valor2 = $_POST['nombinterenodeu'];
		$valor3 = $_POST['numcinodeu'];
		$valor4 = $_POST['objetivonodeu'];
		
		$tipito='Solicitud No Deudas Pendientes con la F.C.P.N.: ';
		//insertamos a transaccional
						$sql = "INSERT INTO tramitecrecencial(".$transaccional.") VALUES (NULL,'$rut','$id_macro','$id_tramite','','','','','','','$valor2','','','','','','','','','','','','','','','','','','','$valor4','','','','$valor3','','','','','','','','','','','')";
						$result = mysql_query($sql,$link);
						//obtenemos el id_tc del insertado para utilizarlo despues
						$sql = "SELECT * FROM tramitecrecencial WHERE id_t='$id_tramite' and rut='$rut' and nombrebeca='$valor2' and nroboleta='$valor3' and actividad='$valor4'";
						$res = mysql_query($sql) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
						$num = mysql_num_rows($res);
						if($num > 0)
						{								
							while ($vec = mysql_fetch_array($res))
							{	
								$id_tc = $vec["id_tc"];
							}
						}
						$referencias = $tipito.' Solicitado por: '.$valor2.', con Numero de Carnet de Identidad: '.$valor3.' con el fin de: '.$valor4;
}//CIERRE NO DEUDAS PENDIENTES
//INVITACIONES
if($id_tramite==19)
{			
		$valor1 = $_POST['instuniinv'];
		$valor2 = $_POST['tenorinv'];
		$valor3 = $_POST['luginv'];
		$valor4 = $_POST['calendario'];
		
		$tipito='Invitacion: ';
		//insertamos a transaccional
						$sql = "INSERT INTO tramitecrecencial(".$transaccional.") VALUES (NULL,'$rut','$id_macro','$id_tramite','','','','','','','','','','','','','','','','$valor1','','','','','','','','','','','','','','','','','','','','$valor3','','$valor4','','$valor2','')";
						$result = mysql_query($sql,$link);
						//obtenemos el id_tc del insertado para utilizarlo despues
						$sql = "SELECT * FROM tramitecrecencial WHERE id_t='$id_tramite' and rut='$rut' and unisolpago='$valor1' and tenor='$valor2' and lugarviapasj='$valor3' and fechaini='$valor4'";
						$res = mysql_query($sql) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
						$num = mysql_num_rows($res);
						if($num > 0)
						{								
							while ($vec = mysql_fetch_array($res))
							{	
								$id_tc = $vec["id_tc"];
							}
						}
						$referencias = $tipito.' Enviado por: '.$valor1.', para el Evento: '.$valor2.' a realizarse en: '.$valor3.' en fecha: '.$valor4;
}//CIERRE INVITACIONES
//CONTRATOS PERSONALES
if($id_tramite==42)
{			
		$subtramite1 = $_POST['contrato'];
		$tipito='Contratos Personales, ';
		$valor1 = $_POST['otrocont'];
							$valor2 = $_POST['nombrepersonales'];
							$valor3 = $_POST['calendario2'];
							$valor4 = $_POST['calendario1'];
							$valor5 = $_POST['montocon'];
							$valor6 = $_POST['refcontra'];
		
		if($subtramite1=="Consultor(a)")
		{	
						$id_div=22;
						$sql = "INSERT INTO tramitecrecencial(".$transaccional.") VALUES (NULL,'$rut','$id_macro','$id_tramite','$id_div','$valor2','','','','','','','','','','','','','','','','','','$valor5','','','','','','$valor6','','','','','','','','','','','','$valor3','$valor4','','')";
						$result = mysql_query($sql,$link);
						//obtenemos el id_tc del insertado para utilizarlo despues
						$sql = "SELECT * FROM tramitecrecencial WHERE id_div='$id_div' and id_t='$id_tramite' and rut='$rut' and beneficiariobien='$valor2' and fechaini='$valor3' and fechafin='$valor4' and montofon='$valor5' and actividad='$valor6'";
						$res = mysql_query($sql) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
						$num = mysql_num_rows($res);
						if($num > 0)
						{								
							while ($vec = mysql_fetch_array($res))
							{	
								$id_tc = $vec["id_tc"];
							}
						}
						$referencias = $tipito.'Contrato '.$subtramite1.' a favor de la Persona(s) '.$valor2.', desde fecha: '.$valor3.', hasta fecha: '.$valor4.' por un monto total de '.$valor5.' Bs. con referencia del contrato: '.$valor6.'.';
		}
		if($subtramite1=="Becas Trabajo")
		{	
						$id_div=23;
						$sql = "INSERT INTO tramitecrecencial(".$transaccional.") VALUES (NULL,'$rut','$id_macro','$id_tramite','$id_div','$valor2','','','','','','','','','','','','','','','','','','$valor5','','','','','','$valor6','','','','','','','','','','','','$valor3','$valor4','','')";
						$result = mysql_query($sql,$link);
						//obtenemos el id_tc del insertado para utilizarlo despues
						$sql = "SELECT * FROM tramitecrecencial WHERE id_div='$id_div' and id_t='$id_tramite' and rut='$rut' and beneficiariobien='$valor2' and fechaini='$valor3' and fechafin='$valor4' and montofon='$valor5' and actividad='$valor6'";
						$res = mysql_query($sql) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
						$num = mysql_num_rows($res);
						if($num > 0)
						{								
							while ($vec = mysql_fetch_array($res))
							{	
								$id_tc = $vec["id_tc"];
							}
						}
						$referencias = $tipito.'Contrato '.$subtramite1.' a favor de la Persona(s) '.$valor2.', desde fecha: '.$valor3.', hasta fecha: '.$valor4.' por un monto total de '.$valor5.' Bs. con referencia del contrato: '.$valor6.'.';
		}
		if($subtramite1=="Eventual")
		{	
						$id_div=24;
						$sql = "INSERT INTO tramitecrecencial(".$transaccional.") VALUES (NULL,'$rut','$id_macro','$id_tramite','$id_div','$valor2','','','','','','','','','','','','','','','','','','$valor5','','','','','','$valor6','','','','','','','','','','','','$valor3','$valor4','','')";
						$result = mysql_query($sql,$link);
						//obtenemos el id_tc del insertado para utilizarlo despues
						$sql = "SELECT * FROM tramitecrecencial WHERE id_div='$id_div' and id_t='$id_tramite' and rut='$rut' and beneficiariobien='$valor2' and fechaini='$valor3' and fechafin='$valor4' and montofon='$valor5' and actividad='$valor6'";
						$res = mysql_query($sql) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
						$num = mysql_num_rows($res);
						if($num > 0)
						{								
							while ($vec = mysql_fetch_array($res))
							{	
								$id_tc = $vec["id_tc"];
							}
						}
						$referencias = $tipito.'Contrato '.$subtramite1.' a favor de la Persona(s) '.$valor2.', desde fecha: '.$valor3.', hasta fecha: '.$valor4.' por un monto total de '.$valor5.' Bs. con referencia del contrato: '.$valor6.'.';
		}
		if($subtramite1=="Docente")
		{	
						$id_div=25;
						$sql = "INSERT INTO tramitecrecencial(".$transaccional.") VALUES (NULL,'$rut','$id_macro','$id_tramite','$id_div','$valor2','','','','','','','','','','','','','','','','','','$valor5','','','','','','$valor6','','','','','','','','','','','','$valor3','$valor4','','')";
						$result = mysql_query($sql,$link);
						//obtenemos el id_tc del insertado para utilizarlo despues
						$sql = "SELECT * FROM tramitecrecencial WHERE id_div='$id_div' and id_t='$id_tramite' and rut='$rut' and beneficiariobien='$valor2' and fechaini='$valor3' and fechafin='$valor4' and montofon='$valor5' and actividad='$valor6'";
						$res = mysql_query($sql) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
						$num = mysql_num_rows($res);
						if($num > 0)
						{								
							while ($vec = mysql_fetch_array($res))
							{	
								$id_tc = $vec["id_tc"];
							}
						}
						$referencias = $tipito.'Contrato '.$subtramite1.' a favor de la Persona(s) '.$valor2.', desde fecha: '.$valor3.', hasta fecha: '.$valor4.' por un monto total de '.$valor5.' Bs. con referencia del contrato: '.$valor6.'.';
		}
		if($subtramite1=="Otros Contratos Personales")
		{	
						$id_div=26;
						$sql = "INSERT INTO tramitecrecencial(".$transaccional.") VALUES (NULL,'$rut','$id_macro','$id_tramite','$id_div','$valor2','','','','','','','','','','','','','','','','','','$valor5','$valor1','','','','','$valor6','','','','','','','','','','','','$valor3','$valor4','','')";
						$result = mysql_query($sql,$link);
						//obtenemos el id_tc del insertado para utilizarlo despues
						$sql = "SELECT * FROM tramitecrecencial WHERE id_div='$id_div' and id_t='$id_tramite' and rut='$rut' and beneficiariobien='$valor2' and fechaini='$valor3' and fechafin='$valor4' and montofon='$valor5' and actividad='$valor6' and otronombrefonrota='$valor1'";
						$res = mysql_query($sql) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
						$num = mysql_num_rows($res);
						if($num > 0)
						{								
							while ($vec = mysql_fetch_array($res))
							{	
								$id_tc = $vec["id_tc"];
							}
						}
						$referencias = $subtramite1.' '.$valor1.' a favor de la Persona(s) '.$valor2.', desde fecha: '.$valor3.', hasta fecha: '.$valor4.' por un monto total de '.$valor5.' Bs. con referencia del contrato: '.$valor6.'.';
		}
}//CIERRE CONTRATOS PERSONALES
//CIRCULARES
if($id_tramite==8)
{			
		$bienev = $_POST['bienen'];//indica que se eligio bienes
		$sevan = $_POST['servime'];//indica que se eligio servicios
		
		$subtramite1 = $_POST['circul'];
		$tipito='Circular, ';
							$valor1 = $_POST['nomresolu'];
							$valor2 = $_POST['refcircu'];
							$valor3 = $_POST['calendario3'];
							$valor4 = $_POST['obscircular'];
								
		if($bienev=="")
		{
			$cct="Conocimiento";
		}
		elseif($sevan=="")
		{
			$cct="Instructivo";
		}
			if($subtramite1=="Resoluciones HCF")
			{	
							$id_div=27;
			}
			if($subtramite1=="Resoluciones HCU")
			{	
							$id_div=28;
			}
			if($subtramite1=="Resoluciones CAF")
			{	
							$id_div=29;
			}
			if($subtramite1=="Resoluciones CAU")
			{	
							$id_div=30;
			}
			if($subtramite1=="Resoluciones CEPIES")
			{	
							$id_div=31;
			}
			if($subtramite1=="Resoluciones BIBLIOTECAS")
			{	
							$id_div=32;
			}
			if($subtramite1=="Resoluciones Decanales")
			{	
							$id_div=33;
			}
			if($subtramite1=="Resoluciones Rectorales")
			{	
							$id_div=34;
			}
			if($subtramite1=="Otras Resoluciones")
			{	
							$id_div=35;
			}
			
							$sql = "INSERT INTO tramitecrecencial(".$transaccional.") VALUES (NULL,'$rut','$id_macro','$id_tramite','$id_div','','','','','','','','','','','','','','','','','','','','$valor1','','$valor2','','','$cct','','','','','','','','','','','','$valor3','','','$valor4')";
							$result = mysql_query($sql,$link);
							//obtenemos el id_tc del insertado para utilizarlo despues
							$sql = "SELECT * FROM tramitecrecencial WHERE id_div='$id_div' and id_t='$id_tramite' and rut='$rut' and actividad='$cct' and otronombrefonrota='$valor1' and objfondorota='$valor2' and fechaini='$valor3' and observaciones='$valor4'";
							$res = mysql_query($sql) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
							$num = mysql_num_rows($res);
							if($num > 0)
							{								
								while ($vec = mysql_fetch_array($res))
								{	
									$id_tc = $vec["id_tc"];
								}
							}
							if($valor4=="")
							{
							$referencias = $tipito.' '.$subtramite1.': '.$valor1.' con caracter de '.$cct.' con referencia: '.$valor2.', emitido en fecha: '.$valor3.', sin ninguna Observacion.';
							}
							else
							{
							$referencias = $tipito.' '.$subtramite1.': '.$valor1.' con caracter de '.$cct.' con referencia: '.$valor2.', emitido en fecha: '.$valor3.', con la siguiente observacion: '.$valor4.'.';
							}
}//CIERRE CIRCULARES
//DESDE AQUI DESIGNACIONES / PARECIDAS A DESCARGOS
$id_desig = $_POST['designa'];
if($id_desig=="Designacion Auxiliar de Docencia")
{
		$valor1 = $_POST['nomaux'];
		$valor2 = $_POST['auxcarr'];//Carrera Origen Distinta de la Sesion
		$valor3 = $_POST['calendario4'];
		$valor4 = $_POST['calendario5'];
		$id_trami = 104;
		$id_div=0;//sabemos que estamos sacando el tramite de la tabla tramites y no de division
		$tipito='Designacion Auxiliar de Docencia,';
		
							$sql = "INSERT INTO tramitecrecencial(".$transaccional.") VALUES (NULL,'$rut','$id_macro','$id_trami','$id_div','$valor1','$valor2','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','$valor3','$valor4','','')";
							$result = mysql_query($sql,$link);
							//obtenemos el id_tc del insertado para utilizarlo despues
							$sql = "SELECT * FROM tramitecrecencial WHERE id_t='$id_trami' and rut='$rut' and beneficiariobien='$valor1' and descripcionbienser='$valor2' and fechaini='$valor3' and fechafin='$valor4'";
							$res = mysql_query($sql) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
							$num = mysql_num_rows($res);
							if($num > 0)
							{								
								while ($vec = mysql_fetch_array($res))
								{	
									$id_tc = $vec["id_tc"];
								}
							}
							$referencias = $tipito.' Nombre del Auxiliar de Docencia '.$valor1.' designado por la Carrera de '.$valor2.', desde fecha: '.$valor3.', hasta fecha de conclusion: '.$valor4.'.';
}
if($id_desig=="Designacion de Tribunal")
{
		$subtramite10 = $_POST['desigtri'];
		$id_trami = 76;
		$valor2 = $_POST['nroresotrib'];
		$valor3 = $_POST['obsdocetribu'];
		$tipito = 'Designaciones,';
		if($subtramite10 == "Designacion Tribunal Docente")
		{				
							$valor1 = $_POST['nomdocentribu'];
							$id_div = 36;
		}
		if($subtramite10 == "Designacion Tribunal Estudiantil")
		{				
							$valor1 = $_POST['nomestutribu'];
							$id_div = 37;
		}
		if($subtramite10 == "Designacion Tribunal Estudiantil-Docente")
		{				
							$valor1 = $_POST['ambosnombres'];
							$id_div = 38;
		}
							
							$sql = "INSERT INTO tramitecrecencial(".$transaccional.") VALUES (NULL,'$rut','$id_macro','$id_trami','$id_div','','','','','','','','','','','','','','','','','','','','','','','','','','','','','$valor2','','','','','$valor1','','','','','','$valor3')";
							$result = mysql_query($sql,$link);
							//obtenemos el id_tc del insertado para utilizarlo despues
							$sql = "SELECT * FROM tramitecrecencial WHERE id_div='$id_div' and id_t='$id_trami' and rut='$rut' and beneficiariosviapasj='$valor1' and nroboleta='$valor2' and observaciones='$valor3'";
							$res = mysql_query($sql) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
							$num = mysql_num_rows($res);
							if($num > 0)
							{								
								while ($vec = mysql_fetch_array($res))
								{	
									$id_tc = $vec["id_tc"];
								}
							}
							if($valor3=="")
							{
							$referencias = $tipito.' '.$subtramite10.', Nombre(s) del Tribunal: '.$valor1.' con Nro(s) de Resolucion: '.$valor2.', sin ninguna Observacion.';
							}
							else
							{
							$referencias = $tipito.' '.$subtramite10.', Nombre(s) del Tribunal: '.$valor1.' con Nro(s) de Resolucion: '.$valor2.', con la siguiente Oservacion: '.$valor3.'.';
							}
}
if($id_desig=="Designacion Docente")
{
		$subtramite10 = $_POST['desigdoc'];
		$id_trami = 81;
		$valor2 = $_POST['periododesig'];
		$tipito = 'Designaciones, Designacion';
		if($subtramite10 == "Docente Contratado")
		{				
							$valor1 = $_POST['nomdoccontra'];
							$id_div = 39;
		}
		if($subtramite10 == "Docente Interino")
		{				
							$valor1 = $_POST['nomdocinteri'];
							$id_div = 40;
		}
		if($subtramite10 == "Docente Invitado")
		{				
							$valor1 = $_POST['nomdocinvi'];
							$id_div = 41;
		}
							
							$sql = "INSERT INTO tramitecrecencial(".$transaccional.") VALUES (NULL,'$rut','$id_macro','$id_trami','$id_div','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','$valor1','','$valor2','','','','')";
							$result = mysql_query($sql,$link);
							//obtenemos el id_tc del insertado para utilizarlo despues
							$sql = "SELECT * FROM tramitecrecencial WHERE id_div='$id_div' and id_t='$id_trami' and rut='$rut' and beneficiariosviapasj='$valor1' and duracionviajpasaj='$valor2'";
							$res = mysql_query($sql) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
							$num = mysql_num_rows($res);
							if($num > 0)
							{								
								while ($vec = mysql_fetch_array($res))
								{	
									$id_tc = $vec["id_tc"];
								}
							}
							
							$referencias = $tipito.' '.$subtramite10.', Nombre(s) de el/los Docente(s) designado(s): '.$valor1.', por el Periodo: '.$valor2.'.';
							
}		
//HASTA AQUI DESIGNACIONES
//CITACIONES
if($id_tramite==9)
{			
		$valor1 = $_POST['otroconcitacion'];
		$valor2 = $_POST['refcitasao'];
		$valor3 = $_POST['calendario6'];
		$valor4 = $_POST['obscitacion'];
		
		$subtramite1 = $_POST['citacion'];
		$tipito='Citacion,';
															
			if($subtramite1=="Citacion HCU")
			{	
							$id_div=42;
			}
			if($subtramite1=="Citacion CAF")
			{	
							$id_div=43;
			}
			if($subtramite1=="Citacion CAU")
			{	
							$id_div=44;
			}
			if($subtramite1=="Citacion Comision Infraestructura")
			{	
							$id_div=45;
			}
			if($subtramite1=="Citacion Plan Director")
			{	
							$id_div=46;
			}
			if($subtramite1=="Citacion Bienestar Social")
			{	
							$id_div=47;
			}
			if($subtramite1=="Citacion Procesos")
			{	
							$id_div=48;
			}
			if($subtramite1=="Otras Citaciones")
			{	
							$id_div=49;
			}
							$sql = "INSERT INTO tramitecrecencial(".$transaccional.") VALUES (NULL,'$rut','$id_macro','$id_tramite','$id_div','','','','','','','','','','','','','','','','','','','','$valor1','','$valor2','','','','','','','','','','','','','','','$valor3','','','$valor4')";
							$result = mysql_query($sql,$link);
							//obtenemos el id_tc del insertado para utilizarlo despues
							$sql = "SELECT * FROM tramitecrecencial WHERE id_div='$id_div' and id_t='$id_tramite' and rut='$rut' and otronombrefonrota='$valor1' and objfondorota='$valor2' and fechaini='$valor3' and observaciones='$valor4'";
							$res = mysql_query($sql) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
							$num = mysql_num_rows($res);
							if($num > 0)
							{								
								while ($vec = mysql_fetch_array($res))
								{	
									$id_tc = $vec["id_tc"];
								}
							}
							if($valor4=="")
							{
							$referencias = $tipito.' '.$subtramite1.': '.$valor1.' con referencia: '.$valor2.', para fecha: '.$valor3.', sin observaciones.';
							}
							else
							{
							$referencias = $tipito.' '.$subtramite1.': '.$valor1.' con referencia: '.$valor2.', para fecha: '.$valor3.', con la siguiente observacion: '.$valor4.'.';
							}
}//CIERRE CITACIONES
//INFORME JURIDICO
if($id_tramite==17)
{			
		$valor1 = $_POST['otronomju'];
		$valor2 = $_POST['refinfoju'];
		$valor3 = $_POST['obsinfoju'];
			
		$subtramite1 = $_POST['informeju'];
		$tipito='Informe Juridico,';
															
			if($subtramite1=="Contratos")
			{	
							$id_div=50;
			}
			if($subtramite1=="Informes Tecnicos")
			{	
							$id_div=51;
			}
			if($subtramite1=="Contratos Modificatorios")
			{	
							$id_div=52;
			}
			if($subtramite1=="Otros Informes Juridicos")
			{	
							$id_div=53;
			}
							$sql = "INSERT INTO tramitecrecencial(".$transaccional.") VALUES (NULL,'$rut','$id_macro','$id_tramite','$id_div','','','','','','','','','','','','','','','','','','','','$valor1','','$valor2','','','','','','','','','','','','','','','','','','$valor3')";
							$result = mysql_query($sql,$link);
							//obtenemos el id_tc del insertado para utilizarlo despues
							$sql = "SELECT * FROM tramitecrecencial WHERE id_div='$id_div' and id_t='$id_tramite' and rut='$rut' and otronombrefonrota='$valor1' and objfondorota='$valor2' and observaciones='$valor3'";
							$res = mysql_query($sql) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
							$num = mysql_num_rows($res);
							if($num > 0)
							{								
								while ($vec = mysql_fetch_array($res))
								{	
									$id_tc = $vec["id_tc"];
								}
							}
							if($valor3=="")
							{
							$referencias = $tipito.' '.$subtramite1.': '.$valor1.' con referencia: '.$valor2.', sin observaciones.';
							}
							else
							{
							$referencias = $tipito.' '.$subtramite1.': '.$valor1.' con referencia: '.$valor2.', con la siguiente observacion: '.$valor3.'.';
							}
}//CIERRE INFORME JURIDICO
//RESOLUCIONES
if($id_tramite==105)
{			
		$valor1 = $_POST['nomresol'];
		$valor2 = $_POST['refresol'];
		$valor3 = $_POST['calendario7'];
		$valor4 = $_POST['obsresol'];
			
		$subtramite1 = $_POST['resoluciones'];
		$tipito='Resoluciones,';
															
			if($subtramite1=="Resolucion HCU")
			{	
							$id_div=54;
			}
			if($subtramite1=="Resolucion HCF")
			{	
							$id_div=55;
			}
			if($subtramite1=="Resolucion HCC")
			{	
							$id_div=56;
			}
			if($subtramite1=="Otras Resoluciones")
			{	
							$id_div=57;
			}
							$sql = "INSERT INTO tramitecrecencial(".$transaccional.") VALUES (NULL,'$rut','$id_macro','$id_tramite','$id_div','','','','','','','','','','','','','','','','','','','','$valor1','','$valor2','','','','','','','','','','','','','','','$valor3','','','$valor4')";
							$result = mysql_query($sql,$link);
							//obtenemos el id_tc del insertado para utilizarlo despues
							$sql = "SELECT * FROM tramitecrecencial WHERE id_div='$id_div' and id_t='$id_tramite' and rut='$rut' and otronombrefonrota='$valor1' and objfondorota='$valor2' and fechaini='$valor3' and observaciones='$valor4'";
							$res = mysql_query($sql) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
							$num = mysql_num_rows($res);
							if($num > 0)
							{								
								while ($vec = mysql_fetch_array($res))
								{	
									$id_tc = $vec["id_tc"];
								}
							}
							if($valor4=="")
							{
							$referencias = $tipito.' '.$subtramite1.': '.$valor1.' con referencia: '.$valor2.', emitido en fecha: '.$valor3.', sin observaciones.';
							}
							else
							{
							$referencias = $tipito.' '.$subtramite1.': '.$valor1.' con referencia: '.$valor2.', emitido en fecha: '.$valor3.', con la siguiente observacion: '.$valor4.'.';
							}
}//CIERRE RESOLUCIONES
//REVALIDACION DE CHEQUES
if($id_tramite==33)
{			
		$valor1 = $_POST['benerevache'];
		$valor2 = $_POST['montorevcheque'];
		$valor3 = $_POST['calendario8'];
		$valor4 = $_POST['obsrevacheque'];
			
		$tipito='Revalidacion de Cheque,';
		$id_div=0;
			
							$sql = "INSERT INTO tramitecrecencial(".$transaccional.") VALUES (NULL,'$rut','$id_macro','$id_tramite','$id_div','$valor1','','','','','','','','','','','','','$valor2','','','','','','','','','','','','','','','','','','','','','','','$valor3','','','$valor4')";
							$result = mysql_query($sql,$link);
							//obtenemos el id_tc del insertado para utilizarlo despues
							$sql = "SELECT * FROM tramitecrecencial WHERE id_div='$id_div' and id_t='$id_tramite' and rut='$rut' and beneficiariobien='$valor1' and montopag='$valor2' and fechaini='$valor3' and observaciones='$valor4'";
							$res = mysql_query($sql) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
							$num = mysql_num_rows($res);
							if($num > 0)
							{								
								while ($vec = mysql_fetch_array($res))
								{	
									$id_tc = $vec["id_tc"];
								}
							}
							if($valor4=="")
							{
							$referencias = $tipito.' a favor de: '.$valor1.' por un monto de cheque de: '.$valor2.' Bs. cheque emitido en fecha: '.$valor3.', sin observaciones.';
							}
							else
							{
							$referencias = $tipito.' a favor de: '.$valor1.' por un monto de cheque de: '.$valor2.' Bs. cheque emitido en fecha: '.$valor3.', con la siguiente observacion: '.$valor4.'.';
							}
}//CIERRE REVALIDACION DE CHEQUES
//ACREDITACIONES
if($id_tramite==35)
{			
		$valor1 = $_POST['otronomacredi'];
		$valor2 = $_POST['nomfrenacre'];
		$valor3 = $_POST['datosadicionales'];
					
		$subtramite1 = $_POST['acreditasao'];
		$tipito='Acreditaciones,';
															
			if($subtramite1=="Acreditacion Asociacion de Docentes Facultativo")
			{	
							$id_div=58;
			}
			if($subtramite1=="Acreditacion Centro de Estudiantes Facultativo")
			{	
							$id_div=59;
			}
			if($subtramite1=="Acreditacion Decano-Vicedecano")
			{	
							$id_div=60;
			}
			if($subtramite1=="Acreditacion Director de Carrera Informatica")
			{	
							$id_div=61;
			}
			if($subtramite1=="Acreditacion Director de Carrera Estadistica")
			{	
							$id_div=62;
			}
			if($subtramite1=="Acreditacion Director de Carrera Matematica")
			{	
							$id_div=63;
			}
			if($subtramite1=="Acreditacion Director de Carrera Ciencias Quimicas")
			{	
							$id_div=64;
			}
			if($subtramite1=="Acreditacion Director de Carrera Fisica")
			{	
							$id_div=65;
			}
			if($subtramite1=="Acreditacion Director de Carrera Biologia")
			{	
							$id_div=66;
			}
			if($subtramite1=="Acreditacion Centro de Estudiantes Informatica")
			{	
							$id_div=67;
			}
			if($subtramite1=="Acreditacion Centro de Estudiantes Estadistica")
			{	
							$id_div=68;
			}
			if($subtramite1=="Acreditacion Centro de Estudiantes Matematica")
			{	
							$id_div=69;
			}
			if($subtramite1=="Acreditacion Centro de Estudiantes Ciencias Quimicas")
			{	
							$id_div=70;
			}
			if($subtramite1=="Acreditacion Centro de Estudiantes Fisica")
			{	
							$id_div=71;
			}
			if($subtramite1=="Acreditacion Centro de Estudiantes Biologia")
			{	
							$id_div=72;
			}
			if($subtramite1=="Acreditacion Asociacion de Docentes Carrera Informatica")
			{	
							$id_div=73;
			}
			if($subtramite1=="Acreditacion Asociacion de Docentes Carrera Estadistica")
			{	
							$id_div=74;
			}
			if($subtramite1=="Acreditacion Asociacion de Docentes Carrera Matematica")
			{	
							$id_div=75;
			}
			if($subtramite1=="Acreditacion Asociacion de Docentes Carrera Ciencias Quimicas")
			{	
							$id_div=76;
			}
			if($subtramite1=="Acreditacion Asociacion de Docentes Carrera Fisica")
			{	
							$id_div=77;
			}
			if($subtramite1=="Acreditacion Asociacion de Docentes Carrera Biologia")
			{	
							$id_div=78;
			}
			if($subtramite1=="Otras Acreditaciones")
			{	
							$id_div=79;
			}
							$sql = "INSERT INTO tramitecrecencial(".$transaccional.") VALUES (NULL,'$rut','$id_macro','$id_tramite','$id_div','','','','','$valor2','','','','','','','','','','','','','','','$valor1','','','','','','','','','','','','','','','','','','','','$valor3')";
							$result = mysql_query($sql,$link);
							//obtenemos el id_tc del insertado para utilizarlo despues
							$sql = "SELECT * FROM tramitecrecencial WHERE id_div='$id_div' and id_t='$id_tramite' and rut='$rut' and otronombrefonrota='$valor1' and proveedor='$valor2' and observaciones='$valor3'";
							$res = mysql_query($sql) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
							$num = mysql_num_rows($res);
							if($num > 0)
							{								
								while ($vec = mysql_fetch_array($res))
								{	
									$id_tc = $vec["id_tc"];
								}
							}
							if($valor3=="")
							{
							$referencias = $tipito.' '.$subtramite1.': '.$valor1.' frente ganador: '.$valor2.', sin datos Adicionales.';
							}
							else
							{
							$referencias = $tipito.' '.$subtramite1.': '.$valor1.' frente ganador: '.$valor2.', con los siguientes datos Adicionales: '.$valor3.'.';
							}
}//CIERRE RESOLUCIONES
//REINCORPORACION DOCENTE
if($id_tramite==43)
{			
		$valor1 = $_POST['causareincorpo'];
		$valor2 = $_POST['nombredocrein'];
		$valor3 = $_POST['calendario9'];
		$valor4 = $_POST['obsreincordoc'];
			
		$tipito='Reincorporacion Docente,';
		$id_div=0;
			
							$sql = "INSERT INTO tramitecrecencial(".$transaccional.") VALUES (NULL,'$rut','$id_macro','$id_tramite','$id_div','','','','','','','','','','','','','','','','$valor2','','','','','','','','','$valor1','','','','','','','','','','','','$valor3','','','$valor4')";
							$result = mysql_query($sql,$link);
							//obtenemos el id_tc del insertado para utilizarlo despues
							$sql = "SELECT * FROM tramitecrecencial WHERE id_div='$id_div' and id_t='$id_tramite' and rut='$rut' and actividad='$valor1' and responsablefon='$valor2' and fechaini='$valor3' and observaciones='$valor4'";
							$res = mysql_query($sql) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
							$num = mysql_num_rows($res);
							if($num > 0)
							{								
								while ($vec = mysql_fetch_array($res))
								{	
									$id_tc = $vec["id_tc"];
								}
							}
							if($valor4=="")
							{
							$referencias = $tipito.' por el motivo: '.$valor1.' a favor del Docente. '.$valor2.' desde fecha: '.$valor3.', sin observaciones.';
							}
							else
							{
							$referencias = $tipito.' por el motivo: '.$valor1.' a favor del Docente. '.$valor2.' desde fecha: '.$valor3.', con la siguiente observacion: '.$valor4.'.';
							}
}//CIERRE REINCORPORACION DOCENTE
//LICENCIAS
if($id_tramite==45)
{			
		$valor1 = $_POST['nomlicencia'];
		$valor2 = $_POST['motivlicen'];
		$valor3 = $_POST['nomdocadm'];
		$valor4 = $_POST['calendario3'];
		$valor5 = $_POST['calendario4'];
		$valor6 = $_POST['obslicencias'];
			
		$subtramite1 = $_POST['licenciaadm'];
		$tipito='Licencias,';
															
			if($subtramite1=="Licencia Docente")
			{	
							$id_div=80;
			}
			if($subtramite1=="Licencia Administrativos")
			{	
							$id_div=81;
			}
			if($subtramite1=="Otras Licencias")
			{	
							$id_div=52;
			}
							$sql = "INSERT INTO tramitecrecencial(".$transaccional.") VALUES (NULL,'$rut','$id_macro','$id_tramite','$id_div','','','','','$valor3','','','','','','','','','','','','','','','$valor1','','','','','','','','','','','','','','','','','$valor4','$valor5','$valor2','$valor6')";
							$result = mysql_query($sql,$link);
							//obtenemos el id_tc del insertado para utilizarlo despues
							$sql = "SELECT * FROM tramitecrecencial WHERE id_div='$id_div' and id_t='$id_tramite' and rut='$rut' and otronombrefonrota='$valor1' and tenor='$valor2' and proveedor='$valor3' and fechaini='$valor4' and fechafin='$valor5' and observaciones='$valor6'";
							$res = mysql_query($sql) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
							$num = mysql_num_rows($res);
							if($num > 0)
							{								
								while ($vec = mysql_fetch_array($res))
								{	
									$id_tc = $vec["id_tc"];
								}
							}
							if($valor6=="")
							{
							$referencias = $tipito.' '.$subtramite1.': '.$valor1.' motivo de la Licencia: '.$valor2.', a favor del Sr. '.$valor3.', desde fecha: '.$valor4.' a fecha '.$valor5.', sin observaciones';
							}
							else
							{
							$referencias = $tipito.' '.$subtramite1.': '.$valor1.' motivo de la Licencia: '.$valor2.', a favor del Sr. '.$valor3.', desde fecha: '.$valor4.' a fecha '.$valor5.', con la siguiente observacion: '.$valor6.'.';
							}
}//CIERRE LICENCIAS
//NOMBRAMIENTOS
if($id_tramite==67)
{			
		$bienev = $_POST['bienen'];//indica que se eligio titular
		$sevan = $_POST['servime'];//indica que se eligio interino
		
		$subtramite1 = $_POST['nombramiento'];
		$tipito='Nombramiento Autoridades, ';
							$valor0 = $_POST['nominstitute'];
							$valor1 = $_POST['nomdocdesig'];
							$valor2 = $_POST['calendario1'];
							$valor3 = $_POST['durcargonom'];
							$valor4 = $_POST['obsnombramiento'];
								
		if($bienev=="")
		{
			$cct="Interino";
		}
		elseif($sevan=="")
		{
			$cct="Titular";
		}
			if($subtramite1=="Nombramiento Director de Instituto")
			{	
							$id_div=83;
			}
			if($subtramite1=="Nombramiento Director de Carrera Informatica")
			{	
							$id_div=84;
			}
			if($subtramite1=="Nombramiento Director de Carrera Estadistica")
			{	
							$id_div=85;
			}
			if($subtramite1=="Nombramiento Director de Carrera Matematica")
			{	
							$id_div=86;
			}
			if($subtramite1=="Nombramiento Director de Carrera Fisica")
			{	
							$id_div=87;
			}
			if($subtramite1=="Nombramiento Director de Carrera Ciencias Quimicas")
			{	
							$id_div=88;
			}
			if($subtramite1=="Nombramiento Director de Carrera Biologia")
			{	
							$id_div=89;
			}
			if($subtramite1=="Nombramiento Director Academico Informatica")
			{	
							$id_div=90;
			}
			if($subtramite1=="Nombramiento Director Academico Estadistica")
			{	
							$id_div=91;
			}
			if($subtramite1=="Nombramiento Director Academico Matematica")
			{	
							$id_div=92;
			}
			if($subtramite1=="Nombramiento Director Academico Fisica")
			{	
							$id_div=93;
			}
			if($subtramite1=="Nombramiento Director Academico Ciencias Quimicas")
			{	
							$id_div=94;
			}
			if($subtramite1=="Nombramiento Director Academico Biologia")
			{	
							$id_div=95;
			}
			if($subtramite1=="Nombramiento Coordinador Posgrado Informatica")
			{	
							$id_div=96;
			}
			if($subtramite1=="Nombramiento Coordinador Posgrado Estadistica")
			{	
							$id_div=97;
			}
			if($subtramite1=="Nombramiento Coordinador Posgrado Matematica")
			{	
							$id_div=98;
			}
			if($subtramite1=="Nombramiento Coordinador Posgrado Fisica")
			{	
							$id_div=99;
			}
			if($subtramite1=="Nombramiento Coordinador Posgrado Ciencias Quimicas")
			{	
							$id_div=100;
			}
			if($subtramite1=="Nombramiento Coordinador Posgrado Biologia")
			{	
							$id_div=101;
			}
			
							$sql = "INSERT INTO tramitecrecencial(".$transaccional.") VALUES (NULL,'$rut','$id_macro','$id_tramite','$id_div','','','','','','','','','','','','','','','','','','','','','$valor1','','','','$cct','','','','','','','$valor0','','','','$valor3','$valor2','','','$valor4')";
							$result = mysql_query($sql,$link);
							//obtenemos el id_tc del insertado para utilizarlo despues
							$sql = "SELECT * FROM tramitecrecencial WHERE id_div='$id_div' and id_t='$id_tramite' and rut='$rut' and nomdescarespeci='$valor0' and actividad='$cct' and responfondorotato='$valor1' and fechaini='$valor2' and duracionviajpasaj='$valor3' and observaciones='$valor4'";
							$res = mysql_query($sql) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
							$num = mysql_num_rows($res);
							if($num > 0)
							{								
								while ($vec = mysql_fetch_array($res))
								{	
									$id_tc = $vec["id_tc"];
								}
							}
							if($subtramite1=="Nombramiento Director de Instituto")
							{	
								if($valor4=="")
								{
									if($cct=="Titular")
									{
									$referencias = $tipito.' '.$subtramite1.', nombre del Instituto: '.$valor0.', nombre de la autoridad designada: '.$valor1.', con caracter de '.$cct.' desde fecha: '.$valor2.', por un periodo de: '.$valor3.', sin ninguna observacion.';
									}
									elseif($cct=="Interino")
									{
									$referencias = $tipito.' '.$subtramite1.', nombre del Instituto: '.$valor0.', nombre de la autoridad designada: '.$valor1.', con caracter de '.$cct.' desde fecha: '.$valor2.', sin ninguna observacion.';
									}
								}
								else
								{
									if($cct=="Titular")
									{
									$referencias = $tipito.' '.$subtramite1.', nombre del Instituto: '.$valor0.', nombre de la autoridad designada: '.$valor1.', con caracter de '.$cct.' desde fecha: '.$valor2.', por un periodo de: '.$valor3.', con la siguiente observacion: '.$valor4.'.';
									}
									elseif($cct=="Interino")
									{
									$referencias = $tipito.' '.$subtramite1.', nombre del Instituto: '.$valor0.', nombre de la autoridad designada: '.$valor1.', con caracter de '.$cct.' desde fecha: '.$valor2.', con la siguiente observacion: '.$valor4.'.';
									}
								}
							}
							else
							{
								if($valor4=="")
								{
									if($cct=="Titular")
									{
									$referencias = $tipito.' '.$subtramite1.', nombre de la autoridad designada: '.$valor1.', con caracter de '.$cct.' desde fecha: '.$valor2.', por un periodo de: '.$valor3.', sin ninguna observacion.';
									}
									elseif($cct=="Interino")
									{
									$referencias = $tipito.' '.$subtramite1.', nombre de la autoridad designada: '.$valor1.', con caracter de '.$cct.' desde fecha: '.$valor2.', sin ninguna observacion.';
									}
								}
								else
								{
									if($cct=="Titular")
									{
									$referencias = $tipito.' '.$subtramite1.', nombre de la autoridad designada: '.$valor1.', con caracter de '.$cct.' desde fecha: '.$valor2.', por un periodo de: '.$valor3.', con la siguiente observacion: '.$valor4.'.';
									}
									elseif($cct=="Interino")
									{
									$referencias = $tipito.' '.$subtramite1.', nombre de la autoridad designada: '.$valor1.', con caracter de '.$cct.' desde fecha: '.$valor2.', con la siguiente observacion: '.$valor4.'.';
									}
								}
							}
}//CIERRE NOMBRAMIENTOS
//AÑO SABATICO
if($id_tramite==56)
{			
		$valor1 = $_POST['nombresabatico'];
		$valor2 = $_POST['calendario10'];
		$valor3 = $_POST['calendario11'];
		$valor4 = $_POST['obssabatico'];
			
		$tipito='Solicitud Año Sabatico,';
		$id_div=0;
			
							$sql = "INSERT INTO tramitecrecencial(".$transaccional.") VALUES (NULL,'$rut','$id_macro','$id_tramite','$id_div','','','','','','','','','','','','','','','','$valor1','','','','','','','','','','','','','','','','','','','','','$valor2','$valor3','','$valor4')";
							$result = mysql_query($sql,$link);
							//obtenemos el id_tc del insertado para utilizarlo despues
							$sql = "SELECT * FROM tramitecrecencial WHERE id_div='$id_div' and id_t='$id_tramite' and rut='$rut' and responsablefon='$valor1' and fechaini='$valor2' and fechafin='$valor3' and observaciones='$valor4'";
							$res = mysql_query($sql) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
							$num = mysql_num_rows($res);
							if($num > 0)
							{								
								while ($vec = mysql_fetch_array($res))
								{	
									$id_tc = $vec["id_tc"];
								}
							}
							if($valor4=="")
							{
							$referencias = $tipito.' a favor del Docente: '.$valor1.', desde fecha: '.$valor2.' hasta fecha: '.$valor3.', sin observaciones.';
							}
							else
							{
							$referencias = $tipito.' a favor del Docente: '.$valor1.', desde fecha: '.$valor2.' hasta fecha: '.$valor3.', con la siguiente observacion: '.$valor4.'.';
							}
}//CIERRE AÑO SABATICO
//COMUNICADO
if($id_tramite==72)
{			
		$valor1 = $_POST['refcomunicado'];
		$valor2 = $_POST['calendario12'];
		$valor3 = $_POST['numinscomuni'];
		$valor4 = $_POST['obscomunicado'];
			
		$tipito='Comunicado,';
		$id_div=0;
			
							$sql = "INSERT INTO tramitecrecencial(".$transaccional.") VALUES (NULL,'$rut','$id_macro','$id_tramite','$id_div','','','','','','','','','','','','','','','','','','','','','','','','','','','','','$valor3','','','','','','','','$valor2','','$valor1','$valor4')";
							$result = mysql_query($sql,$link);
							//obtenemos el id_tc del insertado para utilizarlo despues
							$sql = "SELECT * FROM tramitecrecencial WHERE id_div='$id_div' and id_t='$id_tramite' and rut='$rut' and tenor='$valor1' and fechaini='$valor2' and nroboleta='$valor3' and observaciones='$valor4'";
							$res = mysql_query($sql) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
							$num = mysql_num_rows($res);
							if($num > 0)
							{								
								while ($vec = mysql_fetch_array($res))
								{	
									$id_tc = $vec["id_tc"];
								}
							}
							if($valor4=="")
							{
							$referencias = $tipito.' con referencia: '.$valor1.', evento a llevarse a cabo en fecha: '.$valor2.' con numero de Instructivo: '.$valor3.', sin observaciones.';
							}
							else
							{
							$referencias = $tipito.' con referencia: '.$valor1.', evento a llevarse a cabo en fecha: '.$valor2.' con numero de Instructivo: '.$valor3.', con la siguiente observacion: '.$valor4.'.';
							}
}//CIERRE COMUNICADO
//CONCLUSION DE ESTUDIOS
if($id_tramite==2)
{			
		$valor1 = $_POST['nomestcon'];
		$valor2 = $_POST['numinfkar'];
		$valor3 = $_POST['obsconclu'];
			
		$tipito='Conclusion de Estudios,';
		$id_div=0;
			
							$sql = "INSERT INTO tramitecrecencial(".$transaccional.") VALUES (NULL,'$rut','$id_macro','$id_tramite','$id_div','$valor1','','','','','','','','','','','','','','','','','','','','','','','','','','','','$valor2','','','','','','','','','','','$valor3')";
							$result = mysql_query($sql,$link);
							//obtenemos el id_tc del insertado para utilizarlo despues
							$sql = "SELECT * FROM tramitecrecencial WHERE id_div='$id_div' and id_t='$id_tramite' and rut='$rut' and beneficiariobien='$valor1' and nroboleta='$valor2' and observaciones='$valor3'";
							$res = mysql_query($sql) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
							$num = mysql_num_rows($res);
							if($num > 0)
							{								
								while ($vec = mysql_fetch_array($res))
								{	
									$id_tc = $vec["id_tc"];
								}
							}
							if($valor3=="")
							{
							$referencias = $tipito.' del Universitario(a): '.$valor1.', con numero de Informe de Kardex: '.$valor2.', sin observaciones.';
							}
							else
							{
							$referencias = $tipito.' del Universitario(a): '.$valor1.', con numero de Informe de Kardex: '.$valor2.', con la siguiente observacion: '.$valor3.'.';
							}
}//CIERRE CONCLUSION DE ESTUDIOS
//MEMORANDUMS
if($id_tramite==20)
{			
		$valor1 = $_POST['nommemoran'];
		$valor2 = $_POST['motimemo'];
		$valor3 = $_POST['nompersonmemo'];
		$valor4 = $_POST['obsmemoran'];
					
		$subtramite1 = $_POST['memoran'];
		$tipito='Memorandum,';
															
			if($subtramite1=="Memorandum de Felicidacion")
			{	
							$id_div=102;
			}
			if($subtramite1=="Memorandum de Llamada de Atencion")
			{	
							$id_div=103;
			}
			if($subtramite1=="Otros Memorandums")
			{	
							$id_div=104;
			}
							$sql = "INSERT INTO tramitecrecencial(".$transaccional.") VALUES (NULL,'$rut','$id_macro','$id_tramite','$id_div','','','','','$valor3','','','','','','','','','','','','','','','$valor1','','','','','$valor2','','','','','','','','','','','','','','','$valor4')";
							$result = mysql_query($sql,$link);
							//obtenemos el id_tc del insertado para utilizarlo despues
							$sql = "SELECT * FROM tramitecrecencial WHERE id_div='$id_div' and id_t='$id_tramite' and rut='$rut' and otronombrefonrota='$valor1' and actividad='$valor2' and proveedor='$valor3' and observaciones='$valor4'";
							$res = mysql_query($sql) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
							$num = mysql_num_rows($res);
							if($num > 0)
							{								
								while ($vec = mysql_fetch_array($res))
								{	
									$id_tc = $vec["id_tc"];
								}
							}
							if($valor4=="")
							{
							$referencias = $tipito.' '.$subtramite1.': '.$valor1.' motivo del Memorandum: '.$valor2.', para el Sr(a). '.$valor3.', sin observaciones';
							}
							else
							{
							$referencias = $tipito.' '.$subtramite1.': '.$valor1.' motivo del Memorandum: '.$valor2.', para el Sr(a). '.$valor3.', con la siguiente observacion: '.$valor4.'.';
							}
}//CIERRE MEMORANDUMS
//CONVENIO
if($id_tramite==70)
{			
		$valor1 = $_POST['nomconvenio'];
		$valor2 = $_POST['calendario13'];
		$valor3 = $_POST['obsconvenio'];
			
		$tipito='Convenios,';
		$id_div=0;
			
							$sql = "INSERT INTO tramitecrecencial(".$transaccional.") VALUES (NULL,'$rut','$id_macro','$id_tramite','$id_div','','','','','','','','','','','','','','','','','','','','','','','','','$valor1','','','','','','','','','','','','$valor2','','','$valor3')";
							$result = mysql_query($sql,$link);
							//obtenemos el id_tc del insertado para utilizarlo despues
							$sql = "SELECT * FROM tramitecrecencial WHERE id_div='$id_div' and id_t='$id_tramite' and rut='$rut' and actividad='$valor1' and fechaini='$valor2' and observaciones='$valor3'";
							$res = mysql_query($sql) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
							$num = mysql_num_rows($res);
							if($num > 0)
							{								
								while ($vec = mysql_fetch_array($res))
								{	
									$id_tc = $vec["id_tc"];
								}
							}
							if($valor3=="")
							{
							$referencias = $tipito.' Titulo del Convenio: '.$valor1.', con fecha de inicio: '.$valor2.', sin observaciones.';
							}
							else
							{
							$referencias = $tipito.' Titulo del Convenio: '.$valor1.', con fecha de inicio: '.$valor2.', con la siguiente observacion: '.$valor3.'.';
							}
}//CIERRE CONVENIO
//TRAMITES SINNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNN PREREQUISITOS
//INCLUSO LOS TRMITES OOOOOTROOOOS QUE SON EL 106 107 108
if($id_tramite==71 || $id_tramite==31 || $id_tramite==30 || $id_tramite==46 || $id_tramite==15 || $id_tramite==84 || $id_tramite==39 || $id_tramite==40 || $id_tramite==85 || $id_tramite==32 || $id_tramite==80 || $id_tramite==73 || $id_tramite==87 || $id_tramite==78 || $id_tramite==68 || $id_tramite==83 || $id_tramite==5 || $id_tramite==16 || $id_tramite==106 || $id_tramite==107 || $id_tramite==108)
{
$nombrenuevotram=$_POST['nomtraminuevo'];
$referencias=$_POST['refabierto'];
$id_div=0;
$sql = "INSERT INTO tramitecrecencial(".$transaccional.") VALUES (NULL,'$rut','$id_macro','$id_tramite','$id_div','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','$nombrenuevotram','$referencias')";
$result = mysql_query($sql,$link);
//obtenemos el id_tc del insertado para utilizarlo despues
$sql = "SELECT * FROM tramitecrecencial WHERE id_div='$id_div' and id_t='$id_tramite' and rut='$rut' and tenor='$nombrenuevotram' and observaciones='$referencias'";
$res = mysql_query($sql) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
$num = mysql_num_rows($res);
	if($num > 0)
	{								
		while ($vec = mysql_fetch_array($res))
		{	
			$id_tc = $vec["id_tc"];
		}
	}
}
if($procedencia==null)
{	$procedencia=$otro;
	$sw=1;
}
		//effff----para el Juploadphp guarde uno a uno
		$clsInstanceName=new jUploadPHP($_FILES['fTheFileField2'],true);
		$clsInstanceName->setTempFolder('Escaneados/');
		$clsInstanceName->setMaxFileSizeAllowed(1800000)->setAllowedExtensions
		(
			array(
				'pdf',
				'doc',
				'docx',
				'xls',
				'xlsx'
			)
		);
		if($clsInstanceName->uploadFile())
		{
			
			$gay1 = (string)$clsInstanceName->getFullFileLocation();
			
		}
		//effffffffffffff    hasta aqui el jUploadphp
//Insertamos el nuevo registro en la tabla correspondencia
$sql="INSERT INTO correspondencia (id_c,rut,unidad,fecha,correlativo,hoja_ruta,tipo,referencias,fojas,responsable,destino,comentario,ip,estado,sw,documento,id_tc) VALUES (NULL,'$rut','$procedencia','$fecha','$reg_ext','$hoja_ruta','$tipo','$referencias','$fojas','$nombre','$cunidad','','$ip','$estado','0','$gay1','$id_tc')";
$result = mysql_query($sql,$link);

//efffffffffffff         ahora para el pclzip
		
		$archive1=$rut.'.'.'zip';
		$direccion1="Compress/";
		$completedirection1=$direccion1.$archive1;
		$archivo1 = new PclZip($completedirection1);
		/* Llamamos el metodo que creara el nuevo fichero añadiendo los ficheros especificados y separados por comas */
		$creacion1 = $archivo1->create($gay1);
		
		//effffffffffffffffff


//Insertamos en la tabla recibida los datos de respaldo y el registro 
//obtenemos el id_unidad de unidad, para insertarlo en recibido
$sql1="SELECT id_c FROM correspondencia order by id_c DESC limit 1";
$result1 = mysql_query($sql1,$link);
$linea=mysql_fetch_array($result1);
$id_c=$linea["id_c"]; 
	
//obtenemos el registro interno correspondiente a la unidad.
$consulta ="SELECT reg_int FROM recibido WHERE id_unidad = $cid_unidad order by id_re DESC limit 1";
$resultado=mysql_query($consulta) or die ("Error de búsqueda en la BD: ". mysql_Error());
$numResultados = mysql_num_rows($resultado);
if ($numResultados>0)
{
	$linea=mysql_fetch_array($resultado);
	$reg_int = $linea["reg_int"];	
	$reg_int = $reg_int + 1;
}
else
	$reg_int = 1;
	
//Insertamos en la tabla recibido, habienod obtenido los datos necesarios
$sql="INSERT INTO recibido(id_re,id_unidad,reg_int,id_c,recibido_por,ip,fecha) VALUES 	
	  (NULL,'$cid_unidad','$reg_int','$id_c','$cnombre','$ip','$fecha')";
$result = mysql_query($sql,$link);

//Insertamos la primera asignación en la tabla correspondencia
$sql="INSERT INTO correspondencia (id_c,rut,unidad,fecha,correlativo,hoja_ruta,tipo,referencias,fojas,responsable,destino,ip,estado,sw,documento,id_tc) VALUES (NULL,'$rut','$cunidad','$fecha','$reg_ext','$hoja_ruta','$tipo','$referencias','$fojas','$nombre','$destino','$ip','$estado','1','$gay1','$id_tc')";
$result = mysql_query($sql,$link);

/*if ($sw == 1)
	header("Location: reg_remitente.php?nom=".$otro.'&id='.$id_c); 
else*/
	header("Location: registro_mostrar_server.php?id_c=".$id_c); 
?>