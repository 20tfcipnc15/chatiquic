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
</script>
<script type="text/javascript">
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
window.open("imprimir_save.php?cad="+arv,"",'width=900,height=680,left=1, top=0,toolbar=0,scrollbars=0,statusbar=0,menubar =0,resizable=1');
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
//window.open("asignar.php?cad="+arv,"",'width=420,height=420,left=1, top=0,toolbar=0,scrollbars=0,statusbar=0,menubar =0,resizable=0');
/*window.top.location.href = "recibido_mens.php";
window.top.location.href = "recibido_mens.php";*/
}
</script>
<style type="text/css">
<!--
.Estilo82 {
	color: #0000FF;
	font-size: 11px;
}
-->
</style>
</head>
<body bottommargin="0" leftmargin="0" rightmargin="0" topmargin="0" bgcolor="#EDF7FF" onload=escrolea() oncontextmenu="return false">
<table style="position:absolute; left:110px; height: 419px;" width="1000" border="0" align="center" cellspacing="0">
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
              <td width="133"><table style="position:absolute; top:171px; left:4px; width: 129px; height: 137px;"width="132" height="240" border="0" cellpadding="0" cellspacing="0">
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
                                    <div align="center" class="Estilo13">
                                      <p class="Estilo37 Estilo82">&iquest;Desea Recuperar registros?</a></p>
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
                      <tr>
                        <td bgcolor="#B1CBE4"><table width="696" border="0" align="center" cellpadding="0" cellspacing="2" bordercolor="#EDF7FF">
                            <tr>
                              <td width="48" height="15" bgcolor="#4791C5" class="Estilo2"><div align="center">Imprimir</div></td>
                              <td width="47" height="15" bgcolor="#4791C5" class="Estilo2"><div align="center">Recibido</div></td>
                              <td width="43" height="15" bgcolor="#4791C5" class="Estilo2"><div align="center">Asignar</div></td>
                              <td width="42" height="15" bgcolor="#4791C5" class="Estilo2"><div align="center">R.U.T.</div></td>
                              <td width="70" height="15" bgcolor="#4791C5" class="Estilo2"><div align="center">Fecha Ingreso </div></td>
                              <td width="61" bgcolor="#4791C5"><div align="center" class="Estilo2">Correlativo</div></td>
							  <td width="101" bgcolor="#4791C5"><div align="center" class="Estilo2">Procedencia</div></td>
                              <td width="134" bgcolor="#4791C5"><div align="center" class="Estilo2">Referencias</div></td>
                              <td width="70" bgcolor="#4791C5"><div align="center" class="Estilo2">Seguimiento</div></td>
                              <td width="58" bgcolor="#4791C5"><div align="center" class="Estilo2">Despachar</div></td>
                            </tr>
<form name="f1">
<?
$consulta ="SELECT distinct(rut) FROM correspondencia WHERE destino like '%$unidad%' order by id_c DESC";
$resultado=mysql_query($consulta) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
$numResultados = mysql_num_rows($resultado);
//echo 'numero de res '.$numResultados.'<br>';
if ($numResultados > 0)
{
	$j=0;
	$i=0;
	while($linea=mysql_fetch_array($resultado))
	{	$var = 0;	
		$rut = $linea["rut"]; 
		$i++;
		$sql = "SELECT * FROM correspondencia WHERE rut like '%$rut%' and unidad like '%$unidad%' 	
		and id_c > 696 order by id_c DESC limit 1";
		$res = mysql_query($sql) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
		$num = mysql_num_rows($res);
		if($num > 0)
		{	
			$vec = mysql_fetch_array($res);
			$destino = $vec["destino"];
			if($destino == $nombre)
			{	
				$id_c=$vec["id_c"];
				$rut=$vec["rut"]; 
				$procedencia=$vec["unidad"];
				$fecha=$vec["fecha"];
				$tipo=$vec["tipo"];
				$referencias=$vec["referencias"];
				$destino=$vec["destino"];
				$correlativo=$vec["correlativo"];
				$j++;
//				echo "; ?>
                <tr onMouseOver='this.style.backgroundColor='#FF9900';this.style.cursor='hand';' onMouseOut='this.style.backgroundColor='#CC6666''o'];'>
<?				
				//VERIFICAMOS SI EL REGISTRO HA SIDO IMPRESO
				$sqlr = "SELECT rut FROM reportes WHERE rut like '%$rut%' and responsable like '$nombre' and id_uni = 	
				'$id_unidad'";
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
					echo '</center></td>';
				}
				
				//Buscamos en la tabla recibido si el id_c existe (el usuario ha recibido la correspondencia)
				$sql7 = "SELECT id_c FROM recibido WHERE id_c = '$id_c' and recibido_por like '%$nombre%'";
				$res7 = mysql_query($sql7) or die ("Error de búsqueda en la BD: ". mysql_Error());
				$num7 = mysql_num_rows($res7);
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
					echo '</center></td>';
				}
					echo '<td height="50" bgcolor="#E1F1FF" class="Estilo78"><center>'; 
					echo '<input type="checkbox" name="a[]" value="'.$rut.'">';
					echo '</center></td>';

				//CALCULAMOS EL TIEMPO DE PERMANENCIA DEL TRAMITE
                $fecha_fin=fecha_hora();
                $fecha_ini=$fecha;
				$total = tiempo_tramite($fecha_ini,$fecha_fin);
				$vector = explode(",",$total);
//				$long = count ($vector);
					if ($vector [0]!=0)
						$alert=1;
					elseif ($vector [1]!=0)
						$alert = 1;
						elseif ($vector[2] >= 30)
							$alert =1;
							elseif ($vector[2] >= 15)
								$alert =2;
								else
								$alert=0;
							
				//Buscamos en la tabla recibido si el id_c existe (el usuario ha recibido la correspondencia)
				$sql7 = "SELECT id_c FROM recibido WHERE id_c = '$id_c' and recibido_por like '%$nombre%'";
				$res7 = mysql_query($sql7) or die ("Error de búsqueda en la BD: ". mysql_Error());
				$num7 = mysql_num_rows($res7);
				if($num7 > 0)
					$rec=1;
//					echo 'aklert '.$alert;
				if ($alert == 0)
				{
                echo '<td height="50" bgcolor="#E1F1FF" class="Estilo78"><center>'; 
				echo $rut;
				echo '</center></td>';
				}
				elseif ($alert == 1)
				{
                echo '<td height="50" bgcolor="#b81d0c" class="Estilo83"><center><strong>'; 
				echo $rut;
				echo '</strong></center></td>';
				}
				elseif ($alert == 2)
				{
                echo '<td height="50" bgcolor="#FFFF6A" class="Estilo78"><center><strong>'; 
				echo $rut;
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
                        <td align="justify" class="Estilo78">'; echo $referencias;echo '</td>
                      </tr>
                </table>';
				echo'</center></td>
				<td height="50" bgcolor="#E1F1FF" class="Estilo78"><center>';
				echo '<a href="seguimiento.php?reg='.$rut.'">Seguimiento</a>';
				echo'</center></td>
				<td height="50" bgcolor="#E1F1FF" class="Estilo78"><center>';
				echo '<a href="despacho_mens.php?id='.$id_c.'">Despachar</a>';
				echo'</center></td>
                </tr>';
			}//fin destino=nombre
			else
				$sw=1;
		 }
		else
			$sw=1;
		if($sw==1)
		{	
			$sql = "SELECT * FROM correspondencia WHERE rut like '%$rut%' and id_c > 696 order by id_c DESC limit 1";
			$res = mysql_query($sql) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
			$num = mysql_num_rows($res);
			if($num > 0)
			{	
				$vec = mysql_fetch_array($res);
				$destino = $vec["destino"];
				if($destino == $unidad)
				{	
					$id_c=$vec["id_c"];
					$rut=$vec["rut"]; 
					$procedencia=$vec["unidad"];
					$fecha=$vec["fecha"];
					$tipo=$vec["tipo"];
					$referencias=$vec["referencias"];
					$destino=$vec["destino"];
					$correlativo=$vec["correlativo"];
					$j++;
					echo "
	                <tr onMouseOver='this.style.backgroundColor='#FF9900';this.style.cursor='hand';' onMouseOut='this.style.backgroundColor='#CC6666''o'];'>";

					//VERIFICAMOS SI EL REGISTRO HA SIDO IMPRESO
//					$sqlr = "SELECT id_c FROM reportes WHERE id_c like '%$id_c%'";
					$sqlr = "SELECT rut FROM reportes WHERE rut like '%$rut%' and responsable like '$nombre' and id_uni = '$id_unidad'";
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
					echo '</center></td>';
					}

					//Buscamos en la tabla recibido si el id_c existe (el usuario ha recibido la correspondencia)
					$sql7 = "SELECT id_c FROM recibido WHERE id_c = '$id_c' and recibido_por like '%$nombre%'";
					$res7 = mysql_query($sql7) or die ("Error de búsqueda en la BD: ". mysql_Error());
					$num7 = mysql_num_rows($res7);
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
						echo '</center></td>';
					}

					echo '<td height="50" bgcolor="#E1F1FF" class="Estilo78"><center>';					echo '<input type="checkbox" name="a[]" value="'.$rut.'">';
					echo '</center></td>';
				//CALCULAMOS EL TIEMPO DE PERMANENCIA DEL TRAMITE
                $fecha_fin=fecha_hora();
                $fecha_ini=$fecha;
				$total = tiempo_tramite($fecha_ini,$fecha_fin);
				$vector = explode(",",$total);
//				$long = count ($vector);
					if ($vector [0]!=0)
						$alert=1;
					elseif ($vector [1]!=0)
						$alert = 1;
						elseif ($vector[2] >= 30)
							$alert =1;
							elseif ($vector[2] >= 15)
								$alert =2;
								else
								$alert=0;
							
				//Buscamos en la tabla recibido si el id_c existe (el usuario ha recibido la correspondencia)
				$sql7 = "SELECT id_c FROM recibido WHERE id_c = '$id_c' and recibido_por like '%$nombre%'";
				$res7 = mysql_query($sql7) or die ("Error de búsqueda en la BD: ". mysql_Error());
				$num7 = mysql_num_rows($res7);
				if($num7 > 0)
					$rec=1;
//					echo 'aklert '.$alert;
				if ($alert == 0)
				{
                echo '<td height="50" bgcolor="#E1F1FF" class="Estilo78"><center>'; 
				echo $rut;
				echo '</center></td>';
				}
				elseif ($alert == 1)
				{
                echo '<td height="50" bgcolor="#b81d0c" class="Estilo83"><center>'; 
				echo $rut;
				echo '</center></td>';
				}
				elseif ($alert == 2)
				{
                echo '<td height="50" bgcolor="#FFFF6A" class="Estilo78"><center><strong>'; 
				echo $rut;
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
                          <td align="justify" class="Estilo78">'; echo $referencias;echo '</td>
                      </tr>
                	  </table>';
//					echo $referencias;
					echo'</center></td>
					<td height="50" bgcolor="#E1F1FF" class="Estilo78"><center>';
					echo '<a href="seguimiento.php?reg='.$rut.'">Seguimiento</a>';
					echo'</center></td>
					<td height="50" bgcolor="#E1F1FF" class="Estilo78"><center>';
					echo '<a href="despacho_mens.php?id='.$id_c.'">Despachar</a>';
					echo'</center></td>
            	    </tr>';
				}
				else
					$var = 1;
			}
			else
				$var = 1;
		}
	if($var == 1)
	{	
		$sql1 = "SELECT * FROM correspondencia WHERE rut like '%$rut%' and id_c > 696 order by id_c 
		DESC limit 1";
		$res1 = mysql_query($sql1) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
		$num1 = mysql_num_rows($res1);
	
		$vec1 = mysql_fetch_array($res1);
		$fecha_1 = $vec1["fecha"];		
		$unidad_1 = $vec1["unidad"];
		$destino_1 = $vec1["destino"];
		$rut_1 = $vec1["rut"];
		$id_c_1 = $vec1["id_c"];
		$cont = 1;
		$control = 0;
		while($control == 0)
		{			
			$sql = "SELECT * FROM correspondencia WHERE rut like '%$rut%' and id_c > 696 order by id_c 
			ASC limit ".$cont;
			$res = mysql_query($sql) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
			$num = mysql_num_rows($res);
			if($num > 0)
			{	$s=1;
				while($s <= $cont)
				{
					$vec = mysql_fetch_array($res);
					$s++;
				}
				$fecha_2 = $vec["fecha"];		
				$unidad_2 = $vec["unidad"];
				$destino_2 = $vec["destino"];
				$rut_2 = $vec["rut"];
				$id_c_2 = $vec["id_c"];		
				if($unidad_2 == $unidad_1 and $fecha_2 == $fecha_1 and $rut_1 == $rut_2)
				{
					if($unidad == $destino_2)
					{	
						$control = 1;
						$referencias = $vec["referencias"];		
						$procedencia = $vec["unidad"];		
						$correlativo = $vec["correlativo"];		
						$j++;
						echo "
    		            <tr onMouseOver='this.style.backgroundColor='#FF9900';this.style.cursor='hand';' onMouseOut='this.style.backgroundColor='#CC6666''o'];'>";

						//VERIFICAMOS SI EL REGISTRO HA SIDO IMPRESO
						$sqlr = "SELECT rut FROM reportes WHERE rut like '%$rut_2%' and responsable like '$nombre' and id_uni = '$id_unidad'";
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
					echo '</center></td>';
					}

				//Buscamos en la tabla recibido si el id_c existe (el usuario ha recibido la correspondencia)
					$sql7 = "SELECT id_c FROM recibido WHERE id_c = '$id_c' and recibido_por like '%$nombre%'";
					$res7 = mysql_query($sql7) or die ("Error de búsqueda en la BD: ". mysql_Error());
					$num7 = mysql_num_rows($res7);
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
						echo '</center></td>';
					}
					echo '<td height="50" bgcolor="#E1F1FF" class="Estilo78"><center>';				
					echo '<input type="checkbox" name="a[]" value="'.$rut.'">';
					echo '</center></td>';

  			    //CALCULAMOS EL TIEMPO DE PERMANENCIA DEL TRAMITE
                $fecha_fin=fecha_hora();
                $fecha_ini=$fecha;
				$total = tiempo_tramite($fecha_ini,$fecha_fin);
				$vector = explode(",",$total);
//				$long = count ($vector);
					if ($vector [0]!=0)
						$alert=1;
					elseif ($vector [1]!=0)
						$alert = 1;
						elseif ($vector[2] >= 30)
							$alert =1;
							elseif ($vector[2] >= 15)
								$alert =2;
								else
								$alert=0;						
				if ($alert == 0)
				{
                echo '<td height="50" bgcolor="#E1F1FF" class="Estilo78"><center>'; 
				echo $rut;
				echo '</center></td>';
				}
				elseif ($alert == 1)
				{
                echo '<td height="50" bgcolor="#b81d0c" class="Estilo83"><center>'; 
				echo $rut;
				echo '</center></td>';
				}
				elseif ($alert == 2)
				{
                echo '<td height="50" bgcolor="#FFFF6A" class="Estilo78"><center><strong>'; 
				echo $rut;
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
                          <td align="char" class="Estilo78">'; echo $referencias;echo '</td>
                      </tr>
                	  </table>';
					echo '</center></td>
					<td height="50" bgcolor="#E1F1FF" class="Estilo78"><center>';
					echo '<a href="seguimiento.php?reg='.$rut.'">Seguimiento</a>';
					echo '</center></td>
					<td height="50" bgcolor="#E1F1FF" class="Estilo78"><center>';
					echo '<a href="despacho_mens.php?id='.$id_c_2.'">Despachar</a>';
					echo '</center></td>
            	    </tr>';
					}
					else
						$cont = $cont+1;
				}
				else
					$control = 1;
			}
			else
				$control = 1;
		}
	  }// FIN else
	}//fin num
}// fin numresultadoslo
?>

                            <tr>
                              <td align="" height="7" colspan="14" bgcolor="#CCDDEE" class="Estilo78"></td>
                            </tr>
                            <tr>
                              <td height="15" colspan="14" class="Estilo78"><button class="Estilo59" style="width:50px;background-color:#4791C5;border:0px;margin:1px;padding:0px; font-weight: bold;" onClick="valores(this.form, 't[]')">Imprimir</button>
							  <button class="Estilo59" style="width:50px;background-color:#4791C5;border:0px;margin:1px;padding:0px; font-weight: bold;" onClick="valoresr(this.form, 'r[]')">Recibir</button>
							  <button class="Estilo59" style="width:50px;background-color:#4791C5;border:0px;margin:1px;padding:0px; font-weight: bold;" onClick="valoresa(this.form, 'a[]')">Asignar</button>
							  <a href="javascript:seleccionar_todo()">Marcar todos</a> | 
<a href="javascript:deseleccionar_todo()">Marcar ninguno</a></td>
                            </tr>
                        </table></td>
                      </tr>
                      <tr>
                        <td height="1" bgcolor="#74ABD3"></td>
                      </tr>
                    </table>
                  </td>
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