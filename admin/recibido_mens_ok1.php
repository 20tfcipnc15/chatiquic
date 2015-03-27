<?php
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
$id_user=$_SESSION['id_user'];
$nombre=$_SESSION['nombre_ini']; 
$unidad=$_SESSION['unidad_ini']; 
$id_unidad=$_SESSION['id_unidad']; 
include("../funciones1.php");
include("../php/funciones.php");
include ("../php/fecha_hora.php");
include ('tiempo_tramite.php');
$link=conexion();
$rut = $_GET['reg'];
$gestion = $_POST['gestion'];
if ($gestion == '')
    $gestion = '2010';
?>
<html>
<head>
<title>Chasqui Digital</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<LINK href="../javascript/estilos.css" type=text/css rel=stylesheet>
<LINK href="../javascript/estilo_noticias.css" type=text/css rel=stylesheet>
<SCRIPT language=JavaScript src="../javascript/fecha-hora_bc.js"></SCRIPT>
<SCRIPT language=javascript src="../javascript/barra_de_estado.js"></SCRIPT>
<SCRIPT language=javascript src="../javascript/funciones.js"></SCRIPT>
<script language=JavaScript src="../javascript/generador_noticias.js"></script>
<SCRIPT language=JavaScript src="../fecha-hora_bc.js"></SCRIPT>
<script type="text/javascript" src="../Sothink DHTML Menu/Resource/js/stmenu.js"></script>
<script language="javascript">
function seleccionar_todo(){ 
   for (i=0;i<document.f1.elements.length;i++) 
      if(document.f1.elements[i].type == "checkbox") 
         document.f1.elements[i].checked=1 
} 
function deseleccionar_todo(){ 
   for (i=0;i<document.f1.elements.length;i++) 
      if(document.f1.elements[i].type == "checkbox") 
         document.f1.elements[i].checked=0 
} 
function valores(f, cual) 
{
 todos = new Array();
 for (var i = 0, total = f[cual].length; i < total; i++)
 {
   if (f[cual][i].checked) 
   {   
   	    todos[todos.length] = f[cual][i].value;
	    var arv = todos.toString();
   }
 }
window.open("imprimir_save.php?cad="+arv,"",'width=900,height=680,left=1, top=0,toolbar=0,scrollbars=0,statusbar=0,menubar=0,resizable=1');
window.top.location.href = "recibido_mens.php";
}
function valoresr(f, cual) 
{
 todos = new Array();
 for (var i = 0, total = f[cual].length; i < total; i++)
 {
   if (f[cual][i].checked) 
   {   
   	    todos[todos.length] = f[cual][i].value;
	    var arv = todos.toString();
   }
 }
window.top.location.href = "recibido.php?cad="+arv;
}

function valoresa(f, cual)
{   
 todos = new Array();
 for (var i = 0, total = f[cual].length; i < total; i++)
 {
   if (f[cual][i].checked) 
   {   
   	    todos[todos.length] = f[cual][i].value;
	    var arv = todos.toString();
   }
 }

window.top.location.href = "asignar.php?cad="+arv;
alert("Usted ha seleccionado registros");
}
</script>
</head>
<body bottommargin="0" leftmargin="0" rightmargin="0" topmargin="0" bgcolor="#EDF7FF" onload=escrolea() oncontextmenu="return false">
<!--style="position:absolute; left:110px; height: 419px;" -->
<table  width="1000" border="0" cellspacing="0">
  <tr>
    <td width="270" height="28" bordercolor="0" background="../img/umsa_banner1.GIF"><div align="left"></div></td>
    <td width="710" height="28" bordercolor="0" background="../img/fondo_banner_rojo1.gif"><div align="right" class="Estilo13">
	<strong><font color="#ffffff">
    <SCRIPT>today();</SCRIPT></font>    </strong></div></td>
  </tr>
  <tr>
    <td height="4" colspan="2" background="../img/fondo_delgado.gif"><img src="../img/fondo_delgado.gif" width="2" height="4"></td>
  </tr>
  <tr>
    <td height="133" colspan="2"><table width="1000" height="131" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="132" height="110" background="../img/encabezado_01.gif">
		<div align="center"><img src="../img/umsa_escudo1.gif" width="54" height="106"></div>		</td>
        <td width="25"><img src="../img/encabezado_03.gif" width="25" height="110"></td>
        <td width="665" background="../img/encabezado_04.gif"><div align="center">
          <p><img src="../img/chasqui_digital_azul2 copia.jpg" width="445" height="60"></p>
          </div></td>
        <td width="28"><img src="../img/encabezado_06.gif" width="28" height="110"></td>
        <td width="150" background="../img/encabezado_01.gif"><div align="center"><img src="../imagenes/logotipo_chasqui.jpg" width="100" height="107"></div></td>
      </tr>
      <tr>
        <td width="132" height="21" background="../img/fondo_izq1.gif">&nbsp;</td>
        <td  width="498" colspan="3"><table width="487" height="21" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td background="../img/fondo_cuerpo.gif" bgcolor="#8fb1d2"><table width="420" border="0" align="center" cellpadding="0" cellspacing="0" heigth="21">
                <tr>
                  <td width="191"><span class="Estilo10 Estilo20">&nbsp;<span class="Estilo21">Monoblok Central, Avenida Villazon N&deg; 1995</span></span></td>
                  <td width="32"><div align="center"><img src="../img/correo.gif" width="21" height="21"></div></td>
                  <td width="197"><span class="Estilo21"> <a href="mailto: hemeroteca@correo.umsa.bo" class="Estilo10"><span class="Estilo21">E-mail: dec_fcpn@yahoo.es</span></a></span></td>
                </tr>
              </table></td>
            </tr>
        </table></td>
        <td width="150" height="21" background="../img/fondo_der1.gif">&nbsp;</td>
      </tr>      
	    </table>    </td>
  </tr>
  <tr>
    <td height="248" colspan="2"><table width="133" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="133" height="246" bgcolor="#8fb1d2">
		<table width="1000" height="246" border="0" cellpadding="0" cellspacing="0" align="center">
            <tr height="117">
              <td width="133"><table style="position:absolute; top:171px; left:3px; width: 129px; height: 137px;"width="132" height="240" border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td width="132" height="92"><script src="menu_admin.js"></script></td>
                </tr>
              </table>
			  <form name="form1" method="post" action="recupera.php">
               <table style="position:absolute; top:168px; left:853px; width: 149px; height: 137px;"width="132" height="240" border="0" cellpadding="0" cellspacing="0">
                  <tr>
                    <td width="132" height="92"><table width="144" height="80" border="0" align="center" cellpadding="0" cellspacing="2" bgcolor="#74ABD3">
                        <tr>
                          <td height="7"><p align="center" class="Estilo2">R.U.T.</p></td>
                        </tr>
                        <tr>
                          <td><table width="142" border="0" align="center" cellpadding="0" cellspacing="2" bgcolor="#CCDDEE">
                              <tr>
                                <td height="5" class="Estilo21"><div align="center" class="Estilo37"></div></td>
                              </tr>
                              <tr>
                                <td height="30"><div align="center">
                                    <p>
                                      <input name="rut" type="text" class="Estilo21" id="codigo2"size="18" onKeyPress="return numeros_letras_especiales(event)">
                                    </p>
                                </div>
                                    <div align="center"></div></td>
                              </tr>
                              <tr>
                                <td bgcolor="#CCDDEE" class="Estilo23"><div align="center" class="Estilo3">
        <input name="buscar2" type="submit" class="Estilo2" id="buscar2" style="background-color:#4791C5;border:0px;margin:1px;padding:0px" value=" Aceptar ">
                                  </div>
                                    <div align="center">
                                      <p class="Estilo37 Estilo86">&iquest;Desea Recuperar registros?</a></p>
                                      </div></td>
                              </tr>
                          </table></td>
                        </tr>
                      </table></td>
                  </tr>
                </table>
				</form></td>
              <td width="717" bgcolor="#EDF7FF"><table width="711" height="246" border="2" align="center" cellpadding="0" cellspacing="0" bordercolor="#8fb1d2">
                <tr>
                  <td width="705" background="../img/fondo_cuerpo.gif"><p align="left" class="Estilo77">&nbsp;&nbsp;Unidad: <?php echo $unidad;?><br>
  &nbsp;&nbsp;Usuario: <? echo $nombre; ?></p>
                      <form action="recibido_mens_ok1.php" method="POST" name="gestion">
                    <p align="rigth" class="Estilo77">
                      &nbsp;&nbsp;&nbsp;&nbsp;Gesti&oacute;n
                      <select name= "gestion" style="width:65px" class="Estilo64">
                        <option value="2008">2008</option>
                        <option value="2009">2009</option>
                        <option value="2010">2010</option>
                       <? echo "<option selected value='$gestion'>"; echo $gestion."</option>";?>
                      </select>
                      <? //$anio='123456';
                     //echo "<a href='recibido_mens.php?ges=name'>OK</a>";
                        ?>
                    <button class="Estilo59" style="width:50px;background-color:#4791C5;border:0px;margin:1px;padding:0px; font-weight: bold;" type="submit">Ver</button>
                    </p>
                    </form>
                      <p align="center" class="Estilo77">
                      &nbsp;&nbsp;&nbsp;&nbsp;Se han encontrado <?php echo $numResultados;?> coincidencias.
                    </p>
                    <table width="700" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td width="29" height="21" background="../img/encabezado_tabla_01.gif">&nbsp;</td>
                        <td width="642" background="../img/encabezado_tabla_02.gif"><div align="center" class="Estilo59">DATOS GENERALES DEL TR&Aacute;MITE </div></td>
                        <td width="29" background="../img/encabezado_tabla_04.gif">&nbsp;</td>
                      </tr>
                      <tr>
                        <td height="2" colspan="3"></td>
                      </tr>
                    </table>
                    <table width="700" border="0" align="center" cellpadding="0" cellspacing="2" bgcolor="#74ABD3">
                      <tr>
                        <td></td>
                      </tr>
<form name="f1">
                      <tr>
                        <td bgcolor="#B1CBE4"><table width="696" border="0" align="center" cellpadding="0" cellspacing="2" bordercolor="#EDF7FF">
                            <tr>
                              <td width="48" height="15" bgcolor="#4791C5" class="Estilo2">
                                <p><button class="Estilo59" style="width:50px;background-color:#4791C5;border:0px;margin:1px;padding:0px; font-weight: bold; cursor:pointer" onClick="valores(this.form, 't[]')">Imprimir</button></p></td>
                              <td width="48" height="15" bgcolor="#4791C5" class="Estilo2"><div align="center">
                                <p>		  <button class="Estilo59" style="width:50px;background-color:#4791C5;border:0px;margin:1px;padding:0px; font-weight: bold; cursor:pointer;" onClick="valoresr(this.form, 'r[]')">Recibir</button></p>
                              </div></td>
                              <td height="15" bgcolor="#4791C5" class="Estilo2"><div align="center">
                                <p>  <button class="Estilo59" style="width:50px;background-color:#4791C5;border:0px;margin:1px;padding:0px; font-weight: bold; cursor:pointer;" onClick="valoresa(this.form, 'a[]')">Asignar</button></p>
                              </div></td>
                              <td height="15" bgcolor="#4791C5" class="Estilo2"><div align="center">R.U.T.</div></td>
                              <td height="15" bgcolor="#4791C5" class="Estilo2"><div align="center">Fecha Ingreso </div></td>
                              <td bgcolor="#4791C5"><div align="center" class="Estilo2">Correlativo</div></td>
                              <td bgcolor="#4791C5"><div align="center" class="Estilo2">Procedencia</div></td>
                              <td bgcolor="#4791C5"><div align="center" class="Estilo2">Referencias</div></td>
                              <td width="70" bgcolor="#4791C5"><div align="center" class="Estilo2">Seguimiento</div></td>
                              <td width="58" bgcolor="#4791C5"><div align="center" class="Estilo2">Despachar</div></td>
                            </tr>
<?
$consulta = "SELECT distinct(rut) FROM correspondencia WHERE fecha like '%$gestion%' and (destino like '$unidad' or destino like '$nombre') order by id_c DESC";
$resultado=mysql_query($consulta) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
$numResultados = mysql_num_rows($resultado);
$i=0;
$aa = 0;
$bb = 0;
$cc = 0;
$to = 0;
if ($numResultados > 0)
{		
	$var=0;
	while ($linea = mysql_fetch_array($resultado))
	{	
		$rut = $linea["rut"];
		$imprimir = 0;		

		$sql = "SELECT max(id_c) as id_c FROM correspondencia WHERE rut = '$rut'";
		$res = mysql_query($sql) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
		$vec = mysql_fetch_array($res);
		$id_c = $vec["id_c"];
		
		$sql = "SELECT * FROM correspondencia WHERE fecha like '%$gestion%' and id_c = $id_c and (destino = '$unidad' or destino = '$nombre')";
		$res = mysql_query($sql) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
		$num = mysql_num_rows($res);

		if($num > 0)
		{	
			$vec = mysql_fetch_array($res);
			$destino = $vec["destino"];
			$imprimir = 1;
			$referencias = $vec["referencias"];
			$correlativo = $vec["correlativo"];
			$procedencia = $vec["unidad"];
			$fecha = $vec["fecha"];
			$tipo = $vec["tipo"];
			$fojas = $vec["fojas"];
			$id_c = $vec["id_c"];
			$estado1 = $vec["estado"];
			$comentario = $vec["comentario"];
			$valor1 = $rut.'**'.$id_c;
		}//end if		
		
/////////////////////////////////////////////////////////////////////////////
			//Buscamos en la tabla recibido si el id_c existe (el usuario ha recibido la correspondencia)
			$sql7 = "SELECT id_c FROM recibido WHERE id_c = '$id_c' and recibido_por like '%$nombre%'";
			$res7 = mysql_query($sql7) or die ("Error de bï¿½squeda en la BD: ". mysql_Error());
			$num7 = mysql_num_rows($res7);

			// AQUI VERIFICAMOS SI EL TRAMITE HA SIDO SELECCIONADO COMO PENDIENTE
			$var = strpos($comentario,":");
			$estado = substr($comentario,0,$var);
			$aaaa = $estado;

			if($estado == 'PENDIENTE')
			    $alert = 3;

		    //CALCULAMOS EL TIEMPO DE PERMANENCIA DEL TRAMITE
            $fecha_fin = fecha_hora();
            $fecha_ini = $fecha;
	        $total = tiempo_tramite($fecha_ini,$fecha_fin);
			$vector = explode(",",$total);

			if ($vector[0] != 0)
				$alert = 1;
				elseif ($vector[1] != 0)
					$alert = 1;
					elseif ($vector[2] >= 30)
						$alert = 1;
						elseif ($vector[2] >= 15)
							$alert = 2;
							elseif ($vector[2] >= 30 and $nombre != $destino and $estado != 'PENDIENTE' and $num7 <= 0)
								$alert = 4;
								else
									$alert = 0;	
/////////////////////////////////////////////////////////////////////////////		
		if($imprimir == 1 and $alert != 4)
//		if($imprimir == 1)
		{
		
		/////////////////////////////////////////////////////////////////////////
			$aaa = "UPDATE correspondencia SET sw = 1 WHERE id_c = '$id_c'";
			$bbb = mysql_query($aaa) or die ("Error de búsqueda en la BD: ". mysql_Error());
		/////////////////////////////////////////////////////////////////////////
		
			$str=str_replace(',','ï¿½?',$referencias);
			
			echo "
	    	<tr onMouseOver='this.style.backgroundColor='#FF9900';this.style.cursor='hand';' onMouseOut='this.style.backgroundColor='#CC6666''o'];'>";
			
			//VERIFICAMOS SI EL REGISTRO HA SIDO IMPRESO 
			$sqlr = "SELECT rut FROM reportes WHERE fecha_sol like '%2010%' and rut like '%,$rut,%' and responsable like '$nombre'";
			//and id_uni = '$id_unidad' and fecha_sol like '%2008%'
		    $resr = mysql_query($sqlr) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
			$numr = mysql_num_rows($resr);
			if($numr > 0)
			{	
				echo '<td height="50" bgcolor="#EDF7FF" class="Estilo78"><center>'; 
				echo 'Impreso';
				echo '</center></td>';				
			}
			else
			{
				echo '<td height="50" bgcolor="#E1F1FF" class="Estilo78"><center>'; 
				echo '<input type="checkbox" name="t[]" value="'.$rut.'">';
				echo '<input type="hidden" name="t[]" value="'.$rut.'">';
				echo '</center></td>';
			}

/*			//Buscamos en la tabla recibido si el id_c existe (el usuario ha recibido la correspondencia)
			$sql7 = "SELECT id_c FROM recibido WHERE id_c = '$id_c' and recibido_por like '%$nombre%'";
			$res7 = mysql_query($sql7) or die ("Error de bï¿½squeda en la BD: ". mysql_Error());
			$num7 = mysql_num_rows($res7);
			*/
			if($num7 > 0)
			{	
				echo '<td height="50" bgcolor="#E1F1FF" class="Estilo78"><center>'; 
				echo 'Recibido';
				echo '</center></td>';
			}
			else
			{	
				echo '<td height="50" bgcolor="#E1F1FF" class="Estilo78"><center>'; 
				echo '<input type="checkbox" name="r[]" value="'.$id_c.'">';
				echo '<input type="hidden" name="r[]" value="'.$id_c.'">';
				echo '</center></td>';
			}
			echo '<td height="50" bgcolor="#E1F1FF" class="Estilo78"><center>';				
			echo '<input type="checkbox" name="a[]" value="'.$rut.'">';
			echo '<input type="hidden" name="a[]" value="'.$rut.'">';
			echo '</center></td>';
		    //CALCULAMOS EL TIEMPO DE PERMANENCIA DEL TRAMITE
/*            $fecha_fin = fecha_hora();
            $fecha_ini = $fecha;
	        $total = tiempo_tramite($fecha_ini,$fecha_fin);
			$vector = explode(",",$total);

			if ($vector [0]!=0)
					$alert = 1;
				elseif ($vector [1]!=0)
					$alert = 1;
					elseif ($vector[2] >= 30)
						$alert = 1;
						elseif ($vector[2] >= 15)
							$alert = 2;
							elseif ($vector[2] >=3)
								$alert = 4;
								elseif
									$alert = 0;					
								*/
			// AQUI VERIFICAMOS SI EL TRAMITE HA SIDO SELECCIONADO COMO PENDIENTE
//			$var=strpos($comentario,":");
			$estado=substr($comentario,0,$var);

			if($estado == 'PENDIENTE')
			    $alert=3;

            if($alert==3)
            {
            echo '<td height="50" bgcolor="#FF8000" class="Estilo82"><center>';
			echo $rut;
			echo '</center></td>';
			$dd++;
            }			
			elseif ($alert == 0)
			{
                echo '<td height="50" bgcolor="#E1F1FF" class="Estilo78"><center>'; 
				echo $rut;
				$aa++;
?>				
<input name="unidad" type="button" class="Estilo78" style="height:10px;width:28px;background-color:#E1F1FF;border:0px;margin:1px;padding:0px; cursor:pointer;" value="" 
onClick="abrir4('reporte/reporte_rut_rec.php?rut='+'<? echo $unidad;?>'+','+'<? echo $rut;?>'+','+'<? echo $tipo;?>'+','+'<? echo $fecha;?>'+','+'<? echo $nombre;?>'+','+'<? echo $fojas;?>'+','+'<? echo $estado;?>'+','+'<? echo $valor1;?>');">
<?
				echo '</center></td>';
			}
			elseif ($alert == 1)
			{
                echo '<td height="50" bgcolor="#b81d0c" class="Estilo83"><center>'; 
				echo $rut;
				$bb++;
?>				
<input name="unidad" type="button" class="Estilo78" style="height:10px;width:28px;background-color:#B81D0C;border:0px;margin:1px;padding:0px; cursor:pointer;" value="" 
onClick="abrir4('reporte/reporte_rut_rec.php?rut='+'<? echo $unidad;?>'+','+'<? echo $rut;?>'+','+'<? echo $tipo;?>'+','+'<? echo $fecha;?>'+','+'<? echo $nombre;?>'+','+'<? echo $fojas;?>'+','+'<? echo $estado;?>'+','+'<? echo $valor1;?>');">
<?
				echo '</center></td>';
			}
			elseif ($alert == 2)
			{
                echo '<td height="50" bgcolor="#FFFF6A" class="Estilo78"><center><strong>'; 
				echo $rut;
				$cc++;
?>				
<input name="unidad" type="button" class="Estilo78" style="height:10px;width:28px;background-color:#FFFF6A;border:0px;margin:1px;padding:0px; cursor:pointer;" value="" 
onClick="abrir4('reporte/reporte_rut_rec.php?rut='+'<? echo $unidad;?>'+','+'<? echo $rut;?>'+','+'<? echo $tipo;?>'+','+'<? echo $fecha;?>'+','+'<? echo $nombre;?>'+','+'<? echo $fojas;?>'+','+'<? echo $estado;?>'+','+'<? echo $valor1;?>');">
<?
				echo '</strong></center></td>';
			}
	        echo '<td height="50" bgcolor="#E1F1FF" class="Estilo78"><center>'; 
			echo $fecha; 
			echo '</center></td>
       	    <td height="50" bgcolor="#E1F1FF" class="Estilo78"><center>';
			echo $correlativo;
			echo '</center></td>
   	        <td height="50" bgcolor="#E1F1FF" class="Estilo78"><center>';
			echo $procedencia;
			echo '</center></td>
           	<td height="50" bgcolor="#E1F1FF" class="Estilo78"><center>
				<table width="141" border="0">
					<tr>
						<td align="char" class="Estilo78">'; echo $referencias;echo '</td>';
?>
<input name="unidad" type="button" class="Estilo78" style="height:10px;width:130px;background-color:#E1F1FF;border:0px;margin:1px;padding:0px; cursor:pointer;" value="" 
onClick="abrir1('upload/listar.php?id_c=<? echo $rut;?>');">				  
<? echo '     
               	    </tr>
               	</table>';
			echo '</center></td>
			<td height="50" bgcolor="#E1F1FF" class="Estilo78"><center>';
			echo '<a href="seguimiento.php?reg='.$valor1.'">Seguimiento</a>';
			echo'</center></td>
			<td height="50" bgcolor="#E1F1FF" class="Estilo78"><center>';
			echo '<a href="despacho_mens.php?id='.$id_c.'">Despachar</a>';
			echo'</center></td>
       	</tr>';
		}//End IF ($imprimir1)
		elseif($alert == 4 and $imprimir == 1)
		{
////////////////////////////////////////////
			//INSERTAMOS EN LA TABLA CORRESPONDENCIA EL REGISTRO A DEVOLVER A LA UNIDAD REMITENTE
			$ip = $_SERVER['REMOTE_ADDR'];
			$proveido = 'Devuelto por el Sistema, porque no ha sido despachado fisicamente.';
			
			$sql22="INSERT INTO correspondencia 
			(id_c,rut,unidad,fecha,correlativo,hoja_ruta,tipo,referencias,fojas,responsable,destino,comentario,ip,estado) VALUES 						
			(NULL,'$rut','$unidad','$fecha_fin','$correlativo','$hoja_ruta','$tipo','$referencias','$fojas','SISTEMA','$procedencia','$proveido','$ip','$estado1')";
			$result22 = mysql_query($sql22,$link);
////////////////////////////////////////////	
		}	
	}//End WHILE
}//End IF($numResultados)

?>
                            <tr>
                              <td align="" height="7" colspan="12" bgcolor="#CCDDEE" class="Estilo78"></td>
                            </tr>
                            <tr>
                              <td height="15" colspan="12" class="Estilo78">
							  <button class="Estilo59" style="width:50px;background-color:#4791C5;border:0px;margin:1px;padding:0px; font-weight: bold; cursor: pointer;" onClick="valores(this.form, 't[]')">Imprimir</button>
							  <button class="Estilo59" style="width:50px;background-color:#4791C5;border:0px;margin:1px;padding:0px; font-weight: bold; cursor: pointer;" onClick="valoresr(this.form, 'r[]')">Recibir</button>
                                <button class="Estilo59" style="width:50px;background-color:#4791C5;border:0px;margin:1px;padding:0px; font-weight: bold; cursor: pointer;" onClick="valoresa(this.form, 'a[]')">Asignar</button>
                                <a href="javascript:seleccionar_todo()">Marcar todos</a> | <a href="javascript:deseleccionar_todo()">Marcar ninguno</a></td>
                            </tr>
                        </table></td>
                      </tr>
                      <tr>
                        <td height="1" bgcolor="#74ABD3"></td>
                      </tr>
                    </table>
                    				
				<?  $to = $aa + $bb + $cc;
					if($to > 2)
{					echo "<table>
					<tr height='2'><td></td></tr>
					<tr class='Estilo38'>
					<td>SIN ALERTA </td><td>".$aa."</td></tr>";
					echo "<tr class='Estilo38'>
					<td>A. AMARILLA </td><td>".$cc."</td></tr>";
					echo "<tr class='Estilo38'>
					<td>A. ROJA</td><td>".$bb."</td></tr>";
					echo "<tr class='Reporte'>
					<td>TOTAL </td><td>".$to."</td></tr></table>";
					}
				?>
				</p></td>
                </tr>
              </table></td>
              <td width="150" bgcolor="#8fb1d2" class="Estilo77"><p>&nbsp;</p>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
                </td>
            </tr>
        </table></td>
        </tr>
    </table>
    </td>
  </tr>
  <tr>
    <td height="20" colspan="2"><table width="1000" height="20" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td height="2" colspan="3"></td>
      </tr>
      <tr>
        <td width="15" height="20"><img src="../img/No_fondo1.gif" width="15" height="20"></td>
        <td width="970" height="20" background="../img/No_fondo2.gif"></td>
        <td width="15"><img src="../img/No_fondo3.gif" width="15" height="20"></td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html>