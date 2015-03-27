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
include("../php/fe_ra.php");

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
<script language=JavaScript src="../javascript/cronjs.js"></script>
<SCRIPT language=JavaScript src="../fecha-hora_bc.js"></SCRIPT>
<script type="text/javascript" src="../Sothink DHTML Menu/Resource/js/stmenu.js"></script>

<link type="text/css" href="../javascript/jquery-ui-1.11.2.custom/jquery-ui.css" rel="Stylesheet" /> 
<script language=JavaScript src="../javascript/jquery-1.9.1.js"></script>
<script language=JavaScript src="../javascript/jquery-ui-1.11.2.custom/jquery-ui.min.js"></script>
<script language="javascript">
//para mandar las alertas de la cantidad de tramites a una hora especifica, hecho con solo javascript llama a cronjs.js y definimos las horas
jsCron.set("20 09 * * * alertas()");
jsCron.set("50 11 * * * alertas()");
jsCron.set("30 15 * * * alertas()");
jsCron.set("45 18 * * * alertas()");
function seleccionar_todo(){ 
   for (i=0;i<document.f1.elements.length;i++) 
      if(document.f1.elements[i].type == "checkbox") 
         document.f1.elements[i].checked=1;
} 
function deseleccionar_todo(){ 
   for (i=0;i<document.f1.elements.length;i++) 
      if(document.f1.elements[i].type == "checkbox") 
         document.f1.elements[i].checked=0; 
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
window.open("recibido.php?cad="+arv,"",'width=900,height=680,left=1, top=0,toolbar=0,scrollbars=0,statusbar=0,menubar=0,resizable=1');
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
window.open("asignar.php?cad="+arv,"",'width=700,height=580,left=1, top=0,toolbar=0,scrollbars=1,statusbar=0,menubar=0,resizable=1');
//window.top.location.href = "recibido_mens.php";
}
/*
function llama()
{
window.open("refresh.php",'width=900,height=680,left=1, top=0,toolbar=0,scrollbars=0,statusbar=0,menubar=0,resizable=1');
}
*/
//para que se actualize despues del recibido.php o el asignar.php o el asignar_admin.php
function actualizar()
{
location.reload();
}
</script>
<style type="text/css">
<!--
.Estilo88 {color: #274F76}
-->
</style>
</head>
<body bottommargin="0" leftmargin="0" rightmargin="0" topmargin="0" bgcolor="#EDF7FF" onload=escrolea()>
<!--style="position:absolute; left:110px; height: 419px;" -->
<table  width="1200" border="0" cellspacing="0">
  <tr>
    <td width="200" height="28" bordercolor="0" background="../img/umsa_banner1.GIF"><div align="left"></div></td>
    <td width="710" height="28" bordercolor="0" background="../img/fondo_banner_rojo1.gif"><div align="right" class="Estilo13">
	<strong><font color="#ffffff">
    <SCRIPT>today();</SCRIPT></font>    </strong></div></td>
  </tr>
  <tr>
    <td height="4" colspan="2" background="../img/fondo_delgado.gif"><img src="../img/fondo_delgado.gif" width="2" height="4"></td>
  </tr>
  <tr>
    <td height="133" colspan="2"><table width="1200" height="131" border="0" cellpadding="0" cellspacing="0">
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
        <td width="100" height="21" background="../img/fondo_izq1.gif">&nbsp;</td>
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
		<table width="1200" height="246" border="0" cellpadding="0" cellspacing="0" align="center">
            <tr height="117">
              <td width="133"><table style="position:absolute; top:171px; left:3px; width: 129px; height: 137px;"width="132" height="240" border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td width="132" height="92"><script src="menu_admin.js"></script></td>
                </tr>
              </table>
			  
			    <form name="form1" method="post" action="recupera.php">
               <table style="position:absolute; top:140px; left:1010px; width: 210px; height: 120px;"width="140" height="190" border="0" cellpadding="0" cellspacing="0">
                  <tr>
                    <td width="142" height="62"><table width="154" height="75" border="0" align="center" cellpadding="0" cellspacing="2" bgcolor="#74ABD3">
                        <tr>
                          <td height="6"><p align="center" class="Estilo2">R.U.T.</p></td>
                        </tr>
                        <tr>
                          <td><table width="142" border="0" align="center" cellpadding="0" cellspacing="2" bgcolor="#CCDDEE">
                              <tr>
                                <td height="4" class="Estilo21"><div align="center" class="Estilo37"></div></td>
                              </tr>
                              <tr>
                                <td height="24"><div align="center">
                                    <p>
                                      <input name="rut" type="text" class="Estilo21" id="codigo2" size="18" onKeyPress="return numeros_letras_especiales(event)">
                                    </p>
                                </div>
                                    <div align="center"></div></td>
                              </tr>
                              <tr>
								  <td bgcolor="#CCDDEE" class="Estilo23">
								  
								<select id="ges" name="ges">
									<option value="2015">2015</option>
								</select>
								 
								   <div align="right" class="Estilo3">
									<input name="buscar2" type="submit" class="Estilo2" id="buscar2" style="background-color:#4791C5;border:0px;margin:1px;padding:0px" value=" Aceptar ">
									</div>
									<div align="center">
                                      <p class="Estilo37 Estilo86">&iquest;Desea Recuperar registros?</a></p>
                                      </div>
									</td>
								 </tr>
                          </table></td>
                        </tr>
                      </table></td>
                  </tr>
                </table>
				</form></td>
              
			  <td width="905" bgcolor="#EDF7FF"><table width="711" height="246" border="2" align="center" cellpadding="0" cellspacing="0" bordercolor="#8fb1d2">
                <tr>
                  <td width="905" background="../img/fondo_cuerpo.gif"><p align="left" class="Estilo77">&nbsp;&nbsp;Unidad: <?php echo $unidad;?><br>
  &nbsp;&nbsp;Usuario: <? echo $nombre; ?></p>
                      <p align="center" class="Estilo77">
                      &nbsp;&nbsp;&nbsp;&nbsp;Se han encontrado <?php echo $numResultados;?> coincidencias.                    </p>
					  
					  
					  <!-- <div id="menu" style="width:905"> 
						<span class="despliega">Bandeja de Entrada</span>
						<ul class="acordeon"> -->
						<div id="menu">
						  <ul>
							<li><a href="#tabs-1">Bandeja de Entrada</a></li>
							<li><a href="#tabs-2">Bandeja de Salida</a></li>
						 </ul>
					<div id="tabs-1">
                    <table width="760" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td width="29" height="21" background="../img/encabezado_tabla_01.gif">&nbsp;</td>
                        <td width="702" background="../img/encabezado_tabla_02.gif"><div align="center" class="Estilo59">BANDEJA DE ENTRADA</div></td>
                        <td width="29" background="../img/encabezado_tabla_04.gif">&nbsp;</td>
                      </tr>
                      <tr>
                        <td height="2" colspan="3"></td>
                      </tr>
                    </table>
                    <table width="760" border="0" align="center" cellpadding="0" cellspacing="2" bgcolor="#74ABD3">
                      <tr>
                        <td></td>
                      </tr>
<form name="f1" accept-charset="UTF-8">
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
                              <td bgcolor="#4791C5" ><div align="center" class="Estilo2">Correlativo</div></td>
                              <td bgcolor="#4791C5" ><div align="center" class="Estilo2">Procedencia</div></td>
                              <td bgcolor="#4791C5"><div align="center" class="Estilo2">Referencias</div></td>
                              <td width="70" bgcolor="#4791C5"><div align="center" class="Estilo2">Seguimiento</div></td>
                              <td width="58" bgcolor="#4791C5"><div align="center" class="Estilo2">Despachar</div></td>
                            </tr>
<?
//estamos eliminando el order by rut porque queremos que aparezca ruts iguales de diferentes gestiones
//query: "SELECT * FROM correspondencia WHERE sw = 1 and (destino like '$unidad' or destino like '$nombre') GROUP BY rut order by id_c DESC";
$sql = "SELECT * FROM correspondencia WHERE sw = 1 and (destino like '$unidad' or destino like '$nombre') GROUP BY rut, referencias order by id_c DESC";
$res = mysql_query($sql) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
$num = mysql_num_rows($res);

if($num > 0)
{	
	$i = 0;
	$aa = 0;
	$bb = 0;
	$cc = 0;
	$to = 0;
	$gg = 0;
			
	while ($vec = mysql_fetch_array($res))
	{	
		$imprimir = 1;
			
		$rut = $vec["rut"];
		$destino = $vec["destino"];
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
		
			//Buscamos en la tabla recibido si el id_c existe (el usuario ha recibido la correspondencia)
			$sql7 = "SELECT id_c FROM recibido WHERE id_c = '$id_c' and recibido_por like '%$nombre%'";
			$res7 = mysql_query($sql7) or die ("Error de b?squeda en la BD: ". mysql_Error());
			$num7 = mysql_num_rows($res7);

			// AQUI VERIFICAMOS SI EL TRAMITE HA SIDO SELECCIONADO COMO PENDIENTE
			$var = strpos($comentario,":");
			$estado = substr($comentario,0,$var);
			//$aaaa = $estado;

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
						else
							$alert = 0;	
									
		if($imprimir == 1)
		{
			//$str=str_replace(',','??',$referencias);
			
			echo "
	    	<tr onMouseOver='this.style.backgroundColor='#FF9900';this.style.cursor='hand';' onMouseOut='this.style.backgroundColor='#CC6666''o'];'>";
			
			//VERIFICAMOS SI EL REGISTRO HA SIDO IMPRESO 
			$sqlr = "SELECT rut FROM reportes WHERE  fecha_sol like '%2015%' and rut like '%,$rut,%' and responsable like '$nombre'";
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

			// AQUI VERIFICAMOS SI EL TRAMITE HA SIDO SELECCIONADO COMO PENDIENTE
			$estado=substr($comentario,0,$var);

			if($estado == 'PENDIENTE')
			    $alert=3;

            if($alert == 3)
            {
            echo '<td height="50" bgcolor="#FF8000" class="Estilo82"><center>';
			echo $rut.'<br>';
			$dd++;
?>
<input name="unidad" type="button" class="Estilo78" style="height:10px;width:28px;background-color:#FF8000;border:0px;margin:1px;padding:0px; cursor:pointer;" value="" 
onClick="abrir4('reporte/reporte_rut_rec.php?rut='+'<? echo $unidad;?>'+','+'<? echo $rut;?>'+','+'<? echo $tipo;?>'+','+'<? echo $fecha;?>'+','+'<? echo $nombre;?>'+','+'<? echo $fojas;?>'+','+'<? echo $estado1;?>'+','+'<? echo $id_c;?>'+','+'<? echo $id_unidad;?>'+','+'<? echo $ip;?>');location.reload();">
<?
			echo '</center></td>';
            }			
			elseif ($alert == 0)
			{
                echo '<td height="50" bgcolor="#E1F1FF" class="Estilo78"><center>'; 
				echo $rut;
				$aa++;
?>				
<input name="unidad" type="button" class="Estilo78" style="height:10px;width:28px;background-color:#E1F1FF;border:0px;margin:1px;padding:0px; cursor:pointer;" value="" 
onClick="abrir4('reporte/reporte_rut_rec.php?rut='+'<? echo $unidad;?>'+','+'<? echo $rut;?>'+','+'<? echo $tipo;?>'+','+'<? echo $fecha;?>'+','+'<? echo $nombre;?>'+','+'<? echo $fojas;?>'+','+'<? echo $estado1;?>'+','+'<? echo $id_c;?>'+','+'<? echo $id_unidad;?>'+','+'<? echo $ip;?>');location.reload();">
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
onClick="abrir4('reporte/reporte_rut_rec.php?rut='+'<? echo $unidad;?>'+','+'<? echo $rut;?>'+','+'<? echo $tipo;?>'+','+'<? echo $fecha;?>'+','+'<? echo $nombre;?>'+','+'<? echo $fojas;?>'+','+'<? echo $estado1;?>'+','+'<? echo $id_c;?>'+','+'<? echo $id_unidad;?>'+','+'<? echo $ip;?>');location.reload();">
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
onClick="abrir4('reporte/reporte_rut_rec.php?rut='+'<? echo $unidad;?>'+','+'<? echo $rut;?>'+','+'<? echo $tipo;?>'+','+'<? echo $fecha;?>'+','+'<? echo $nombre;?>'+','+'<? echo $fojas;?>'+','+'<? echo $estado1;?>'+','+'<? echo $id_c;?>'+','+'<? echo $id_unidad;?>'+','+'<? echo $ip;?>');location.reload();">
<?
				echo '</strong></center></td>';
			}
			elseif ($alert == 5)
			{
                echo '<td height="50" bgcolor="#BCFFB9" class="Estilo78"><center>'; 
				echo $rut;
				$gg++;
?>				
<input name="unidad" type="button" class="Estilo78" style="height:10px;width:28px;background-color:#BCFFB9;border:0px;margin:1px;padding:0px; cursor:pointer;" value="" 
onClick="abrir4('reporte/reporte_rut_rec.php?rut='+'<? echo $unidad;?>'+','+'<? echo $rut;?>'+','+'<? echo $tipo;?>'+','+'<? echo $fecha;?>'+','+'<? echo $nombre;?>'+','+'<? echo $fojas;?>'+','+'<? echo $estado1;?>'+','+'<? echo $id_c;?>'+','+'<? echo $id_unidad;?>'+','+'<? echo $ip;?>');location.reload();">
<?
				echo '</center></td>';
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
			echo '     
               	    </tr>
               	</table>';
			echo '</center></td>
			<td height="50" bgcolor="#E1F1FF" class="Estilo78"><center>';
			echo '<a href="seguimiento.php?reg='.$valor1.'">Seguimiento</a>';
			echo'</center></td>';
			echo '<td height="50" bgcolor="#E1F1FF" class="Estilo78"><center>';		
			echo '<a href="despacho_mens.php?id='.$id_c.'">Despachar</a>';
			echo'</center></td>
       	</tr>';
		}//End IF ($imprimir1)
	}
}
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
                    				
				<?  $to = $aa + $bb + $cc + $gg;
					if($to > 2)
				{	echo "<table>
					<tr height='2'><td></td></tr>
					<tr class='Estilo38'>
					<td>SIN ALERTA </td><td>".$aa."</td></tr>";
					echo "<tr class='Estilo38'>
					<td>A. AMARILLA </td><td>".$cc."</td></tr>";
					echo "<tr class='Estilo38'>
					<td>A. ROJA</td><td>".$bb."</td></tr>";
					echo "<tr class='Estilo38'>
					<td>A. VERDE</td><td>".$gg."</td></tr>";
					echo "<tr class='Reporte'>
					<td>TOTAL </td><td>".$to."</td></tr></table>";
					?>
					
					<?					
				}
				?>
				</div>
				<div id="tabs-2">
				
				<table width="700" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td width="29" height="21" background="../img/encabezado_tabla_01.gif">&nbsp;</td>
                        <td width="642" background="../img/encabezado_tabla_02.gif"><div align="center" class="Estilo59">TRAMITES ENVIADOS ESPERANDO RECEPCION DEL DESTINO</div></td>
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
					<form name="f1" accept-charset="UTF-8">
                      <tr>
                        <td bgcolor="#B1CBE4"><table width="696" border="0" align="center" cellpadding="0" cellspacing="2" bordercolor="#EDF7FF">
                            <tr>
                              <td height="15" bgcolor="#4791C5" class="Estilo2"><div align="center">R.U.T.</div></td>
                              <td height="15" bgcolor="#4791C5" class="Estilo2"><div align="center">Fecha Egreso </div></td>
                              <td bgcolor="#4791C5" ><div align="center" class="Estilo2">Correlativo</div></td>
                              <td bgcolor="#4791C5" ><div align="center" class="Estilo2">Procedencia</div></td>
                              <td bgcolor="#4791C5"><div align="center" class="Estilo2">Referencias</div></td>
                              <td width="70" bgcolor="#4791C5"><div align="center" class="Estilo2">Destino</div></td>
                       </tr>
<?
//estamos eliminando el order by rut porque queremos que aparezca ruts iguales de diferentes gestiones
//query:"SELECT * FROM correspondencia WHERE sw = 1 and responsable LIKE '$nombre' and destino NOT LIKE '$nombre' and destino NOT LIKE 'Archivo' GROUP BY rut order by id_c DESC";
$sql = "SELECT * FROM correspondencia WHERE sw = 1 and responsable LIKE '$nombre' and destino NOT LIKE '$nombre' and destino NOT LIKE 'Archivo' GROUP BY rut, referencias order by id_c DESC";

$res = mysql_query($sql) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
$num = mysql_num_rows($res);

if($num > 0)
{		
	$id = 0;
	$aad = 0;
	$bbd = 0;
	$ccd = 0;
	$tod = 0;
	$ggd = 0;
			
	while ($vec = mysql_fetch_array($res))
	{	
		$imprimir = 1;
			
		$rut = $vec["rut"];
		$destino = $vec["destino"];
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
		/*
		///////////////////////////////////////////////////////////////////////////solo a partir desde la implementacion del recibido en adelante.........../////////////////////
		$messq=substr($fecha, 3, 3);
								//$diaq=(int)(substr($fechaq, 0, 2));
								switch($messq)
										{
											case 'ENE': $mesqq = '01';		break; 
											case 'FEB': $mesqq = '02';		break; 
											case 'MAR': $mesqq = '03';		break; 
											case 'ABR': $mesqq = '04';		break; 
											case 'MAY': $mesqq = '05';		break; 
											case 'JUN': $mesqq = '06';		break; 
											case 'JUL': $mesqq = '07';		break; 
											case 'AGO': $mesqq = '08';		break; 
											case 'SEP': $mesqq = '09';		break; 
											case 'OCT': $mesqq = '10';		break; 
											case 'NOV': $mesqq = '11';		break; 
											case 'DIC': $mesqq = '12';		break; 
											case 'ene' : $mesqq = '01';		break; 
											case 'feb' : $mesqq = '02';		break; 
											case 'mar' : $mesqq= '03';		break; 
											case 'abr' : $mesqq = '04';		break; 
											case 'may' : $mesqq = '05';		break; 
											case 'jun' : $mesqq = '06';		break; 
											case 'jul' : $mesqq = '07';		break; 
											case 'ago': $mesqq = '08';		break; 
											case 'sep': $mesqq = '09';		break; 
											case 'oct': $mesqq = '10';		break; 
											case 'nov': $mesqq= '11';		break; 
											case 'dic': $mesqq = '12';		break; 

										}
								$mesq=(int)($mesqq);
								$gestq=(int)(substr($fecha, 7, 4));
								//un string cualquiera a datetime pa comparar,fecha desde la cual se aplico el camino
								
								$melay="19 AGO 2014 - 09:26:25";
								//$dia1y=(int)(substr($melay, 0, 2));
								$mes1y=8;
								$gest1y=(int)(substr($melay, 7, 4));
								
																						
	if($gestq >= $gest1y)  
	{
		if($mesq >= $mes1y)
		{*/
			
			/////destino externo......"Tramite Despachado Unidad Externa"
		
		//////////////////////////////////////////////////////////////////////////hasta aqui para la fecha .........jijijijijij//////////////////////mieldla////////////
	
		
			$sql9 = "SELECT * FROM correspondencia WHERE id_c = '$id_c' order by id_c limit 1";
			$res9 = mysql_query($sql9) or die ("Error de b?squeda en la BD: ". mysql_Error());
			$num9 = mysql_num_rows($res9);
			if($num9 > 0)
		{
			
			/////efff recibido
			//effff para el recibido en seguimiento
			$sql3 ="SELECT * FROM recibido WHERE id_c='$id_c' and recibido_por!='0' and ip!='0' and fecha!='0' and reg_int!='0' ORDER BY id_c ASC";
			$res3 = mysql_query($sql3) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
			$filas3 = mysql_num_rows($res3);
			if($filas3 > 0)
			{//jijij
			}
			else
			{
			// AQUI VERIFICAMOS SI EL TRAMITE HA SIDO SELECCIONADO COMO PENDIENTE
			$var = strpos($comentario,":");
			$estado = substr($comentario,0,$var);
			//$aaaa = $estado;

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
						else
							$alert = 0;	
									
		if($imprimir == 1)
		{
			//$str=str_replace(',','??',$referencias);
			
			echo "
	    	<tr onMouseOver='this.style.backgroundColor='#FF9900';this.style.cursor='hand';' onMouseOut='this.style.backgroundColor='#CC6666''o'];'>";
			
			//VERIFICAMOS SI EL REGISTRO HA SIDO IMPRESO 
				
			// AQUI VERIFICAMOS SI EL TRAMITE HA SIDO SELECCIONADO COMO PENDIENTE
			$estado=substr($comentario,0,$var);

			if($estado == 'PENDIENTE')
			    $alert=3;

            if($alert == 3)
            {
            echo '<td height="50" bgcolor="#FF8000" class="Estilo82"><center>';
			echo $rut.'<br>';
			$ddd++;

			echo '</center></td>';
            }			
			elseif ($alert == 0)
			{
                echo '<td height="50" bgcolor="#E1F1FF" class="Estilo78"><center>'; 
				echo $rut;
				$aad++;

				echo '</center></td>';
			}
			elseif ($alert == 1)
			{
                echo '<td height="50" bgcolor="#b81d0c" class="Estilo83"><center>'; 
				echo $rut;
				$bbd++;

				echo '</center></td>';
			}
			elseif ($alert == 2)
			{
                echo '<td height="50" bgcolor="#FFFF6A" class="Estilo78"><center><strong>'; 
				echo $rut;
				$ccd++;

				echo '</strong></center></td>';
			}
			elseif ($alert == 5)
			{
                echo '<td height="50" bgcolor="#BCFFB9" class="Estilo78"><center>'; 
				echo $rut;
				$ggd++;

				echo '</center></td>';
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
			echo '     
               	    </tr>
               	</table>';
			echo '</center></td>
			<td height="50" bgcolor="#E1F1FF" class="Estilo78"><center>';
			echo $destino;
			echo '</center></td>';
		
				}//End IF ($imprimir1)
			}
			}
/*		}//fin mes
	}//fin año				*/
	}
}
?>
                        <tr>
                              <td align="" height="7" colspan="12" bgcolor="#CCDDEE" class="Estilo78"></td>
                            </tr>
                         </table></td>
                      </tr>
                      <tr>
                        <td height="1" bgcolor="#74ABD3"></td>
                      </tr>
                    </table>
					<?  $tod = $aad + $bbd + $ccd + $ggd;
					if($tod > 2)
					{	
					echo "<table>
					<tr height='2'><td></td></tr>
					<tr class='Estilo38'>
					<td>SIN ALERTA </td><td>".$aad."</td></tr>";
					echo "<tr class='Estilo38'>
					<td>A. AMARILLA </td><td>".$ccd."</td></tr>";
					echo "<tr class='Estilo38'>
					<td>A. ROJA</td><td>".$bbd."</td></tr>";
					echo "<tr class='Estilo38'>
					<td>A. VERDE</td><td>".$ggd."</td></tr>";
					echo "<tr class='Reporte'>
					<td>TOTAL </td><td>".$tod."</td></tr></table>";
					?>
					<?}
					?>
			     </td>
				 
                </tr>
              </table>
			  </div>
			  </div>
			  <script language='JavaScript'>
										function alertas() 
										{
											$(document).ready(function(){
											$("#automatico").dialog({
													autoOpen: true,
													modal: true,
													width: 550,
													height: 380,
													show: "fold",
													hide: "scale",
													open: function(event, ui) { 
																					//hide close button.
																					$(this).parent().children().children('.ui-dialog-titlebar-close').hide();
																				},
													show: {
															effect: "blind",
															duration: 3000
														  },
														  hide: {
															effect: "explode",
															duration: 1000
														  },
													buttons: {
													"Aceptar": function() {
													$( this ).dialog( "close" );
												    }
													}
												})
											});
										}
										///para las pestañas del recibido y despachado
												$(function() {
												$( "#menu" ).tabs();
											  });
						</script>				
				<!-- PARA LA BANDEJA ENVIADOS ESPERANDO RECEPCION--> 
				<?php
				if($to>=1 || $tod>=1)
				{
				?>
				<div id="automatico" title="TRAMITES EN SU SESION" style="display:none;" width="705">
				<p align="center"><font size=4 color=#0174DF>Bandeja de Entrada</font></p>
					  <table width="505">
					  <tr>
						<td>Tramites Rojos</td>
						<td align="right"><?echo $bb;?></td>
					  </tr>
					  <tr>
					    <td>Total Tramites</td>
						<td align="right"><?echo $to;?></td>
					  </tr>
					  </table>
				<p align="center"><font size=4 color=#0174DF>Bandeja de Salida</font></p>
					  <table width="505">
					  <tr>
						<td>Tramites Rojos</td>
						<td align="right"><?echo $bbd;?></td>
					  </tr>
					  <tr>
					    <td>Total Tramites</td>
						<td align="right"><?echo $tod;?></td>
					  </tr>
					  </table>
				<h3 id="respuesta" style="display:none;">Responder</h3>
				</div>
				<?php 
				}
				else
				{}
				?>
			  </td>
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
    <td height="20" colspan="2"><table width="1200" height="20" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td height="2" colspan="3"></td>
      </tr>
	  <tr>
        <td width="15" height="20"><img src="../img/No_fondo1.gif" width="15" height="20"></td>
        <td width="1200" height="20" background="../img/No_fondo2.gif"></td>
        <td width="15"><img src="../img/No_fondo3.gif" width="15" height="20"></td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html>
