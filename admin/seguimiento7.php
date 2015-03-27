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
include ('tiempo_tramite1.php');
$link=conexion();

$valor = $_GET['reg'];
$sub = '**';
$var = strpos($valor,$sub);
$rut1 = substr($valor,0,$var);
$ref = substr($valor,$var+2,strlen($valor));
?>
<html>
<head>
<title>Chasqui Digital</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<LINK href="../javascript/estilos.css" type=text/css rel=stylesheet>
<LINK href="../javascript/estilo_noticias.css" type=text/css rel=stylesheet>
<SCRIPT language=JavaScript src="../javascript/fecha-hora_bc.js"></SCRIPT>
<SCRIPT language=javascript src="../javascript/barra_de_estado.js"></SCRIPT>
<script language=JavaScript src="../javascript/generador_noticias.js"></script>
<SCRIPT language=JavaScript src="../fecha-hora_bc.js"></SCRIPT>
<script type="text/javascript" src="../Sothink DHTML Menu/Resource/js/stmenu.js"></script>
</head>
<body bottommargin="0" leftmargin="0" rightmargin="0" topmargin="0" bgcolor="#EDF7FF" onload=escrolea() oncontextmenu="return false">
<table width="1000" border="0" cellspacing="0">
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
              <td width="133"><table style="position:absolute; top:171px; left:2px; width: 129px; height: 137px;"width="132" height="240" border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td width="132" height="92"><script src="menu_admin.js"></script></td>
                </tr>
              </table></td>
              <td width="717" bgcolor="#EDF7FF"><table width="711" height="246" border="2" align="center" cellpadding="0" cellspacing="0" bordercolor="#8fb1d2">
                <tr>
                  <td width="705" background="../img/fondo_cuerpo.gif"><p><span class="Estilo77">&nbsp;&nbsp;&nbsp;&nbsp;Unidad: <?php echo $unidad;?><br>
  &nbsp;&nbsp;&nbsp;&nbsp;Usuario: <? echo $nombre; ?></span><br>
                    </p>
                    <center>
                      <table width="700" border="0" cellpadding="0" cellspacing="0">
                        <tr>
                          <td width="29" height="21" background="../img/encabezado_tabla_01.gif">&nbsp;</td>
                            <td width="642" background="../img/encabezado_tabla_02.gif"><div align="center" class="Estilo59">DATOS GENERALES DEL TR&Aacute;MITE </div></td>
                            <td width="29" background="../img/encabezado_tabla_04.gif">&nbsp;</td>
                          </tr>
                        <tr>
                          <td height="2" colspan="3"></td>
                          </tr>
                        </table>
                        <table width="700" border="0" cellpadding="0" cellspacing="2" bgcolor="#74ABD3">
                          <tr>
                            <td></td>
                          </tr>
                          <tr>
                            <td bgcolor="#B1CBE4"><table width="698" border="0" align="center" cellpadding="0" cellspacing="2" bordercolor="#EDF7FF">
                              <tr>
                                <td width="35" height="15" bgcolor="#4791C5" class="Estilo2"><div align="center">R.U.T.</div></td>
                                <td width="68" height="15" bgcolor="#4791C5" class="Estilo2"><div align="center">Fecha</div></td>
                                <td width="77" bgcolor="#4791C5"><div align="center" class="Estilo2">Procedencia</div></td>
                                <td width="81" bgcolor="#4791C5"><div align="center" class="Estilo2">Tipo de Tr&aacute;mite </div></td>
                                <td width="74" bgcolor="#4791C5" class="Estilo2"><div align="center">Reg. Ext. </div></td>
								<td width="75" bgcolor="#4791C5" class="Estilo2"><div align="center">Hoja Ruta </div></td>
                                <td width="150" bgcolor="#4791C5"><div align="center" class="Estilo2">Referencias</div></td>
                                <td width="46" bgcolor="#4791C5"><div align="center" class="Estilo2">Fojas</div></td>
                                <td width="72" bgcolor="#4791C5"><div align="center" class="Estilo2">Destino</div></td>
                                </tr>
<?

$sw = 0;

$sql ="SELECT referencias FROM correspondencia WHERE rut like '$rut1' and id_c ='$ref' ORDER BY id_c ASC";
$res = mysql_query($sql) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
$filas = mysql_num_rows($res);
$vec = mysql_fetch_array($res);
		
$referencias1 = $vec["referencias"];

$i=0;

$sql ="SELECT * FROM correspondencia WHERE rut like '$rut1' and referencias like '$referencias1' ORDER BY id_c ASC";
$res = mysql_query($sql) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
$filas = mysql_num_rows($res);
$vec = mysql_fetch_array($res);

$unidad = $vec["unidad"];
$destino = $vec["destino"];
$id_c1=$vec["id_c"];
$rut=$vec["rut"]; 
$hoja_ruta=$vec["hoja_ruta"];
$correlativo=$vec["correlativo"];
$responsable=$vec["responsable"];
$fecha1=$vec["fecha"];
$tipo=$vec["tipo"];
$referencias=$vec["referencias"];
$fojas=$vec["fojas"];

//almacenamos la fecha inicial
$fecha_inicial = $fecha1;

$y=0;
/*if ($destino == 'CARRERAS')
    $sw = 1;*/
?>
                              <tr>
                                <td width="35" height="15" bgcolor="#E1F1FF" class="Estilo78"><div align="center"><? echo $rut;?></div></td>
                                <td width="68" height="15" bgcolor="#E1F1FF" class="Estilo78"><div align="center"><? echo $fecha1;?></div></td>
                                <td width="77" bgcolor="#E1F1FF"><div align="center"><span class="Estilo78"><? echo $unidad;?></span></div></td>
                                <td width="81" bgcolor="#E1F1FF"><div align="center"><span class="Estilo78"><? echo $tipo;?></span></div></td>
                                <td width="74" bgcolor="#E1F1FF"><div align="center"><span class="Estilo78"><? echo $correlativo;?></span></div></td>
				<td width="75" bgcolor="#E1F1FF"><div align="center"><span class="Estilo78"><? echo $hoja_ruta;?></span></div></td>
				<td width="150" height="50" bgcolor="#E1F1FF"><center>
									<table width="150" height="50"><tr><td>
									<div align="left" class="Estilo78">
									<? echo $referencias; ?>
									</div></td></tr>
									</table></center></td>
				<td width="46" bgcolor="#E1F1FF"><div align="center"><span class="Estilo78"><? echo $fojas; $i++;
								?></span></div></td>
				<td width="72" bgcolor="#E1F1FF"><div align="center"><span class="Estilo78"><? echo $destino; ?></span></div></td>
                                </tr>
                              <tr>
                                <td height="7" colspan="9" bgcolor="#CCDDEE" class="Estilo78"></td>
                              </tr>
                              <tr>
                                <td height="15" colspan="9" class="Estilo78"></td>
                              </tr>
                            </table></td>
                          </tr>
                          <tr>
                            <td height="1" bgcolor="#74ABD3"></td>
                          </tr>
                          </table>
                  </center></td></tr>
              </table></td>
              <td width="150" bgcolor="#8fb1d2" class="Estilo77"><? // include('online.php')?></td>
            </tr>
        </table></td>
        </tr>
    </table>
    </td>
  </tr>
  <tr>
    <td height="22" colspan="2"><table width="1000" height="60" border="0" cellpadding="0" cellspacing="0">
	  <tr>
        <td height="20"><table width="1000" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td width="29" height="21" background="../img/encabezado_tabla_01.gif">&nbsp;</td>
            <td width="942" background="../img/encabezado_tabla_02.gif"><div align="center" class="Estilo59">SEGUIMIENTO DEL TR&Aacute;MITE </div></td>
            <td width="29" background="../img/encabezado_tabla_04.gif">&nbsp;</td>
          </tr>
          <tr>
            <td height="2" colspan="3"></td>
          </tr>
        </table>
          <table width="1000" border="0" cellpadding="0" cellspacing="2" bgcolor="#74ABD3">
          <tr>
            <td></td>
          </tr>
          <tr>
            <td bgcolor="#B1CBE4"><table width="996" border="0" align="center" cellpadding="0" cellspacing="2" bordercolor="#EDF7FF">
                <tr>
                  <td width="36" height="15" bgcolor="#4791C5" class="Estilo2"><div align="center">R.U.T.</div></td>
                  <td width="117" height="15" bgcolor="#4791C5" class="Estilo2"><div align="center">Fecha Ingreso </div></td>
                  <td width="106" bgcolor="#4791C5"><div align="center" class="Estilo2">Unidad</div></td>
                  <td width="111" bgcolor="#4791C5"><div align="center" class="Estilo2">Responsable</div>                    </td>
				  <td width="101" bgcolor="#4791C5"><div align="center" class="Estilo2">Reg. Externo</div></td>
				  <td width="65" bgcolor="#4791C5"><div align="center" class="Estilo2">Hoja Ruta</div></td>
                  <td width="133" bgcolor="#4791C5"><div align="center" class="Estilo2">Fecha de Salida </div></td>
                  <td width="144" bgcolor="#4791C5"><div align="center" class="Estilo2">Destino</div></td>
                  <td width="44" bgcolor="#4791C5"><div align="center" class="Estilo2">Instruc.</div></td>
                  <td width="117" bgcolor="#4791C5"><div align="center" class="Estilo2">Proveido</div></td>
                  </tr>
                <tr>
                  <td height="2" colspan="8" bgcolor="#8fb1d2" class="Estilo78"></td>
                  </tr>
<?
//************************************************
if ($destino == 'CARRERAS')
{
    $sql5 ="SELECT * FROM correspondencia WHERE rut like '%$rut1%' and referencias like '$referencias1' ORDER BY rut,id_c ASC";
    $res5 = mysql_query($sql5) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
    $filas5 = mysql_num_rows($res5);
    //$vec5 = mysql_fetch_array($res5);

    while ($vec5 = mysql_fetch_array($res5))
    {
	$id_c=$vec5["id_c"];
        if(ereg($id_c,$vector))
            $aaa = 0;
        else
            $aaa = 1;
        if($aaa == 1)
		
		
        {
	$rut=$vec5["rut"];
	$tipo=$vec5["tipo"];
	$fecha=$vec5["fecha"];
	$unidad=$vec5["unidad"];
	$destino=$vec5["destino"];
	$hoja_ruta=$vec5["hoja_ruta"];
	$comentario=$vec5["comentario"];
	$correlativo=$vec5['correlativo'];
	$referencias=$vec5["referencias"];
	$responsable=$vec5["responsable"];
	$estado=$vec5["estado"];

	$aaa = $id_c;
	$sql2 = "SELECT fecha FROM recibido WHERE id_c = '$bbb' order by id_re desc limit 1";
        $res2 = mysql_query($sql2) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
	$vec2 = mysql_fetch_array($res2);
	$fecha_ingreso = $vec2["fecha"];
	if ($fecha_ingreso == 0)
		$fecha_ingreso = $fecha;
	echo '
        <tr>
           <td height="25" bgcolor="#E1F1FF" class="Estilo78"><center>';
           echo $rut;
           echo '</center></td>
           <td height="25" bgcolor="#E1F1FF" class="Estilo78"><center>';
           echo $fecha_ingreso;
           echo '</center></td>
           <td height="25" bgcolor="#E1F1FF" class="Estilo78"><center>';
           echo $unidad;
           echo '</center></td>
           <td height="25" bgcolor="#E1F1FF" class="Estilo78"><center>';
  	   echo $responsable;
	   echo '
	   <td height="25" bgcolor="#E1F1FF" class="Estilo78"><center>';
	   echo $correlativo;
	   echo '
	   <td height="25" bgcolor="#E1F1FF" class="Estilo78"><center>';
	   echo $hoja_ruta;
	   echo '</center></td>';
	   echo '
	   <td height="25" bgcolor="#E1F1FF" class="Estilo78"><center>';
	   echo $fecha;
	   echo '</center></td>
	   <td height="25" bgcolor="#E1F1FF" class="Estilo78"><center>';
	   echo $destino;
	   echo '</center></td>
	   <td height="25" bgcolor="#E1F1FF" class="Estilo78"><center>';
	   echo $estado;
	   echo '</center></td>
	   <td height="25" bgcolor="#E1F1FF" class="Estilo78" align="left">
	   <table width="142" height="25" border="0" align="left" class="Estilo78">
              <tr><td>'.$comentario.'</td></tr>
           </table>
        </td>
      </tr>';
        }
   }
}
//************************************************

//******************
$vector = '';
$i=0;
$aaa = 2;
//******************
/*$sql ="SELECT c.*, i.instruccion FROM correspondencia c 
left join instruccion i on (c.estado = i.valor) 
WHERE c.rut like '$rut1' and c.referencias like '$referencias1' ORDER BY id_c ASC";
$res = mysql_query($sql) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());*/

$sql ="SELECT * FROM correspondencia WHERE rut like '$rut1' and referencias like '$referencias1' ORDER BY id_c ASC";
$res = mysql_query($sql) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());

$filas = mysql_num_rows($res);
if($filas > 0)
{
		$bbb = $id_c1;
		$ru = 0;
		while($vec = mysql_fetch_array($res))
		{	
			$id_c=$vec["id_c"];
			$rut=$vec["rut"]; 
			$tipo=$vec["tipo"];
			$fecha=$vec["fecha"];
			$unidad=$vec["unidad"];
			$destino=$vec["destino"];
			$hoja_ruta=$vec["hoja_ruta"];
			$comentario=$vec["comentario"];
			$correlativo=$vec['correlativo'];
			$referencias=$vec["referencias"];
			$responsable=$vec["responsable"];
			$estado=$vec["estado"];

                        $vector = $vector.'-'.$id_c;

			$aaa = $id_c;
			
			$sql2 = "SELECT fecha FROM recibido WHERE id_c = '$bbb' order by id_re desc limit 1";
                        $res2 = mysql_query($sql2) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
			$vec2 = mysql_fetch_array($res2);
			$fecha_ingreso = $vec2["fecha"];	
			if ($fecha_ingreso == 0)	
				$fecha_ingreso = $fecha;

			echo '
            <tr>
            <td height="25" bgcolor="#E1F1FF" class="Estilo78"><center>'; 
			echo $rut; 
			echo '</center></td>
            <td height="25" bgcolor="#E1F1FF" class="Estilo78"><center>'; 
			echo $fecha_ingreso; 
			echo '</center></td>
            <td height="25" bgcolor="#E1F1FF" class="Estilo78"><center>';
			echo $unidad;
			echo '</center></td>
            <td height="25" bgcolor="#E1F1FF" class="Estilo78"><center>';
			echo $responsable;
			echo '
			<td height="25" bgcolor="#E1F1FF" class="Estilo78"><center>';
			echo $correlativo;
			echo '	
			<td height="25" bgcolor="#E1F1FF" class="Estilo78"><center>';
			echo $hoja_ruta;
			echo '</center></td>';
			echo '	
			<td height="25" bgcolor="#E1F1FF" class="Estilo78"><center>';
			echo $fecha;
			echo '</center></td>
			<td height="25" bgcolor="#E1F1FF" class="Estilo78"><center>';
			echo $destino;
			echo '</center></td>
			<td height="25" bgcolor="#E1F1FF" class="Estilo78"><center>';
			echo $estado;
			echo '</center></td>
			<td height="25" bgcolor="#E1F1FF" class="Estilo78" align="left">';
?>
			  <table width="142" height="25" border="0" align="left" class="Estilo78">
                <tr>
                  <td><? echo  $comentario;?></td>
                </tr>
              </table>
		<?	echo'</td>
            </tr>';

//********************************************************
if ($destino == 'CARRERAS')
{
    $sql5 ="SELECT * FROM correspondencia WHERE rut like '%$rut1%' and referencias like '$referencias1' ORDER BY rut,id_c ASC";
    $res5 = mysql_query($sql5) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
    $filas5 = mysql_num_rows($res5);
    //$vec5 = mysql_fetch_array($res5);

    while ($vec5 = mysql_fetch_array($res5))
    {
	$id_c=$vec5["id_c"];
        if(ereg($id_c,$vector))
            $aaa = 0;
        else
            $aaa = 1;
        if($aaa == 1)
        {
	$rut=$vec5["rut"];
	$tipo=$vec5["tipo"];
	$fecha=$vec5["fecha"];
	$unidad=$vec5["unidad"];
	$destino=$vec5["destino"];
	$hoja_ruta=$vec5["hoja_ruta"];
	$comentario=$vec5["comentario"];
	$correlativo=$vec5['correlativo'];
	$referencias=$vec5["referencias"];
	$responsable=$vec5["responsable"];
	$estado=$vec5["estado"];

	$aaa = $id_c;
	$sql2 = "SELECT fecha FROM recibido WHERE id_c = '$bbb' order by id_re desc limit 1";
        $res2 = mysql_query($sql2) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
	$vec2 = mysql_fetch_array($res2);
	$fecha_ingreso = $vec2["fecha"];
	if ($fecha_ingreso == 0)
		$fecha_ingreso = $fecha;
	echo '
        <tr>
           <td height="25" bgcolor="#E1F1FF" class="Estilo78"><center>';
           echo $rut;
           echo '</center></td>
           <td height="25" bgcolor="#E1F1FF" class="Estilo78"><center>';
           echo $fecha_ingreso;
           echo '</center></td>
           <td height="25" bgcolor="#E1F1FF" class="Estilo78"><center>';
           echo $unidad;
           echo '</center></td>
           <td height="25" bgcolor="#E1F1FF" class="Estilo78"><center>';
  	   echo $responsable;
	   echo '
	   <td height="25" bgcolor="#E1F1FF" class="Estilo78"><center>';
	   echo $correlativo;
	   echo '
	   <td height="25" bgcolor="#E1F1FF" class="Estilo78"><center>';
	   echo $hoja_ruta;
	   echo '</center></td>';
	   echo '
	   <td height="25" bgcolor="#E1F1FF" class="Estilo78"><center>';
	   echo $fecha;
	   echo '</center></td>
	   <td height="25" bgcolor="#E1F1FF" class="Estilo78"><center>';
	   echo $destino;
	   echo '</center></td>
	   <td height="25" bgcolor="#E1F1FF" class="Estilo78"><center>';
	   echo $estado;
	   echo '</center></td>
	   <td height="25" bgcolor="#E1F1FF" class="Estilo78" align="left">
	   <table width="142" height="25" border="0" align="left" class="Estilo78">
              <tr><td>'.$comentario.'</td></tr>
           </table>
        </td>
      </tr>';
        }
   }
}
//********************************************************
			$bbb = $aaa;
			$i++;
//Reporte por unidades
if ($i >1)
{
	$unidad_ru = $rep_uni[$ru-3];
	if($unidad_ru == $unidad)
	{
		$rep_uni[$ru-1] = $fecha;
	}
	else
	{
		$rep_uni[$ru] = $unidad;
		$rep_uni[$ru+1] = $fecha_ingreso;
		$rep_uni[$ru+2] = $fecha;
		$ru = $ru+3;
	}
}
else
{
		$rep_uni[$ru] = $unidad;
		$rep_uni[$ru+1] = $fecha_ingreso;
		$rep_uni[$ru+2] = $fecha;
		$ru = $ru+3;
}
			}
		?>
                <tr>
                  <td height="7" colspan="10" bgcolor="#CCDDEE" class="Estilo78"></td>
                </tr>
                <tr>
                  <td height="15" colspan="10" class="Estilo78"></td>
                </tr>
            </table>
		<?
		if($filas == $i)
		{	
			$sub = ':';
			$var = strpos($comentario,$sub);
			$estado = substr($comentario,0,$var);
			if($estado == 'Concluido')
			{	
				$fecha_final = $fecha;
	   ?>
              <table width="352" height="70" border="0" cellpadding="2" cellspacing="2" bgcolor="#E1F1FF">
                <tr>
                  <td colspan="2" class="Estilo77"> Fecha inicial del Trï¿½mite: <? echo $fecha_inicial;?> Fecha final del Trï¿½mite: <? echo $fecha_final;?> Tiempo Total de Duraci&oacute;n:
                    <? $total = tiempo_tramite($fecha_inicial,$fecha_final);?></td>
                  </tr>
              </table>  
                <?
 			} 
	   } 
$i=0;
include("../php/fecha_hora.php");
}
?>
              <table width="996" border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td width="360" valign="top"><?
$i=0;
echo '<table width="352" border="0" cellpadding="0" cellspacing="2" bordercolor="#EDF7FF" bgcolor="#74ABD3" valing="top"><tr bgcolor="#B1CBE4"><td>';
echo '<table width="350" border="0" cellspacing="2" cellspading="0"><tr>';
echo '<td bgcolor="#4791C5" class="Estilo2">No</td><td bgcolor="#4791C5" class="Estilo2"><center>Unidad</center></td>
<td bgcolor="#4791C5" class="Estilo2"><center>Tiempo de Permanencia</center></td></tr><tr>';

for ($aa=0;$aa<=$ru;$aa++)
{
	$valor = $rep_uni[$aa];
	if ($aa % 3 == 0 and $aa != 0)
	{
		echo '<td width="15" class="Estilo78" bgcolor="#E1F1FF" height="25"><center>',$i=$i+1,'<center></td>';	
		echo '<td width="110" class="Estilo78" bgcolor="#E1F1FF" height="25">',$rep_uni[$aa-3],'</td>';

////////
		if($ru==$aa)
		{
			$fecha=fecha_hora();
			$rep_uni[$aa-1] = $fecha;
		}
/////////

		echo '<td width="220" class="Estilo78" bgcolor="#E1F1FF" height="25">';$total = tiempo_tramite($rep_uni[$aa-2],$rep_uni[$aa-1]);echo '</td>';
		echo '</tr><tr>';
	}
}
echo '</tr></table></td></tr></table>';

?></td>
                  <td width="281">&nbsp;</td>
                  <td width="355">
<?
$sql ="SELECT * FROM instruccion ORDER BY id_i ASC";
$res = mysql_query($sql) or die ("Error de b&uacute;squeda en la BD: ". mysql_Error());
	
$i=0;
echo '<table width="50" border="0" cellpadding="0" cellspacing="2" bordercolor="#EDF7FF" bgcolor="#74ABD3" align="right"><tr bgcolor="#B1CBE4"><td>';
echo '<table width="200" border="0" cellspacing="2" cellspading="0" align="right"><tr>';
echo '<td bgcolor="#4791C5" class="Estilo2" width="30">No</td>
	<td bgcolor="#4791C5" class="Estilo2" width="50"><center>Sigla</center></td>
	<td bgcolor="#4791C5" class="Estilo2" width="80"><center>Instrucción</center></td></tr><tr>';

while($vec = mysql_fetch_array($res))
{
	$valor = $rep_uni[$aa];
	echo '<td width="30" class="Estilo78" bgcolor="#E1F1FF" height="25"><center>',$i=$i+1,'<center></td>';	
	echo '<td width="50" class="Estilo78" bgcolor="#E1F1FF" height="25">',$vec[2],'</td>';

	if($ru==$aa)
	{
		$fecha=fecha_hora();
		$rep_uni[$aa-1] = $fecha;
	}
	echo '<td width="120" class="Estilo78" bgcolor="#E1F1FF" height="25">'.$vec[1].'</td>';
	echo '</tr><tr>';
}
echo '</tr></table></td></tr></table>';

?></td>
                </tr>
              </table>              </td>
          </tr>
          <tr>
            <td height="1" bgcolor="#74ABD3"></td>
          </tr>
        </table></td>
        </tr>
	  <tr>
	    <td height="2"></td>
	    </tr>
	  <tr>
	    <td height="20"><table width="1000" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td width="15"><img src="../img/No_fondo1.gif" alt="" width="15" height="20"></td>
            <td width="945" background="../img/No_fondo2.gif">&nbsp;</td>
            <td width="16"><img src="../img/No_fondo3.gif" alt="" width="15" height="20"></td>
          </tr>
        </table></td>
	    </tr>
    </table></td>
  </tr>
</table>
</body>
</html>