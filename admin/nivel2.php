<?php
include("../funciones1.php");
include("../php/funciones.php");
$link=conexion();
//ESTA ES LA VARIABLE PRINCIPAL
$tram=$_POST['trameaje'];
////////////////////////////////////////////////////////////////////////DESDE AQUI FINANCIEROS/////////////////////////////////////
//Para Solicitud de Compras desde reg_despacho_x.php
if($tram==36)
{
?>
		<table align="center">
		<tr align="center">
					<td height="15" class="Estilo78"><input type="radio" name="sexi" id="sex1" onclick="toggleLayer4(this.value)"; value="Bienes">Compra de Bien</td>
					<td height="15" class="Estilo78"><input type="radio" name="sexi" id="sex2" onclick="toggleLayer4(this.value)"; value="Servicios" title="Pago de Servicios de: Comunicaciones, Telefono, Internet, Seguros, Alquileres, Mantenimiento, Dominio, Impreta, Servicios Manuales, Capacitacion de Personal, Gastos Judiciales, etc..">Compra de Servicio</td>
		</tr> 
		</table>
<?
}
//Para Pagos
if($tram==65)
{
?>
		<table align="right">
		<tr align="right">
					<td height="15" class="Estilo78"><div align="right"><span class="Estilo78">Pago Especifico:</span><span class="Estilo74"></span></div></td>
					<td bgcolor="#CCDDEE" class="Estilo64">&nbsp;<span class="Estilo59">
<?
$result=mysql_query("select * from division where id_tramite='$tram' order by subtramites ASC",$link);
if ($row = mysql_fetch_array($result))
{ 
echo '<select  name="pago" id="pago" style="width:248px" class="Estilo64" onchange="obs1(this.value)">';
echo '<option selected></option>';
	do { 
	
		$long=strlen($row["subtramites"]);
   	    echo '<option value= "'.$row["subtramites"].'">'.$row["subtramites"].'</option>';
		}
		while ($row = mysql_fetch_array($result));
		
	echo '</select>';
}
}
?>
                     </span></td>
        </tr> 
		</table>
<?//hasta aqui pagos
//PARA FONDOS DE AVANCE APERTURA
if($tram==90)
{
?>
		<table align="right">
		<tr>
		<td height="15"><div align="right"><span class="Estilo78">Responsable Fondo:</span></div></td>
          <td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;
		 <input name="respfon" value="" type="text" style="width:248px" class="Estilo64" onKeyPress="return numeros_letras(event)"/></td>
		</tr>
		
		<tr>
		<td height="15"><div align="right"><span class="Estilo78">Objetivo del Fondo:</span></div></td>
          <td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;
		 <input name="objfon" value="" type="text" style="width:248px" class="Estilo64" onKeyPress="return numeros_letras(event)"/></td>
		</tr>
		
		<tr>
		<td height="15"><div align="right"><span class="Estilo78">Unidad Solicitante:</span></div></td>
          <td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;
		 <input name="unitsolfon" value="" type="text" style="width:248px" class="Estilo64" onKeyPress="return numeros_letras(event)"/></td>
		</tr>
		
		<tr>
		<td height="15"><div align="right"><span class="Estilo78">Monto del Fondo:</span></div></td>
          <td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;
		 <input name="montofon" value="" type="text" style="width:248px" class="Estilo64" onKeyPress="return solo_numeros(event)"/></td>
		</tr>
		
		</table>
<?
}
?>
<?//hasta aqui FONDOS AVANCE APERTURA
//FONDOS ROTATORIOS APERTURA
if($tram==91)
{
?>
		<table align="right">
		<tr align="right">
					<td height="15" class="Estilo78"><div align="right"><span class="Estilo78">Fondo Rotatorio:</span><span class="Estilo74"></span></div></td>
					<td bgcolor="#CCDDEE" class="Estilo64">&nbsp;<span class="Estilo59">
<?
$result=mysql_query("select * from division where id_tramite='$tram' order by subtramites ASC",$link);
if ($row = mysql_fetch_array($result))
{ 
echo '<select  name="rotatorio" id="rotatorio" style="width:248px" class="Estilo64" onchange="obs2(this.value)">';
echo '<option selected></option>';
	do { 
	
		$long=strlen($row["subtramites"]);
   	    echo '<option value= "'.$row["subtramites"].'">'.$row["subtramites"].'</option>';
		}
		while ($row = mysql_fetch_array($result));
		
	echo '</select>';
}
}
?>
                     </span></td>
        </tr> 
		</table>
<?//hasta aqui fondo en avance apertura rotatorio
//DESDE AQUI DESCARGOS
if($tram==95)
{
?>
		<table align="right">
		<tr align="right">
					<td height="15" class="Estilo78"><div align="right"><span class="Estilo78">Descargo Especifico:</span><span class="Estilo74"></span></div></td>
					<td bgcolor="#CCDDEE" class="Estilo64">&nbsp;<span class="Estilo59">
<?
$result=mysql_query("select * from tramites where id_macro=100 order by tipo ASC",$link);
if ($row = mysql_fetch_array($result))
{ 
echo '<select  name="descargo" id="descargo" style="width:248px" class="Estilo64" onchange="obs3(this.value)">';
echo '<option selected></option>';
	do { 
	
		$long=strlen($row["tipo"]);
   	    echo '<option value= "'.$row["tipo"].'">'.$row["tipo"].'</option>';
		}
		while ($row = mysql_fetch_array($result));
		
	echo '</select>';
}
}
?>
                     </span></td>
        </tr> 
		</table>
<? //HASTA AQUI LOS DESCARGOS
//SOLICITUD DE VIATICOS Y PASAJES
if($tram==99)
{
?>
		<table align="right">
		<tr align="right">
					<td height="15" class="Estilo78"><div align="right"><span class="Estilo78">Solicitud Especifica:</span><span class="Estilo74"></span></div></td>
					<td bgcolor="#CCDDEE" class="Estilo64">&nbsp;<span class="Estilo59">
<?

		$result=mysql_query("select * from division where id_tramite='$tram' order by subtramites ASC",$link);
		if ($row = mysql_fetch_array($result))
		{ 
		echo '<select  name="viapasaj" id="viapasaj" style="width:248px" class="Estilo64" onchange="obs1(this.value)">';
		echo '<option selected></option>';
			do { 
			
				$long=strlen($row["subtramites"]);
				echo '<option value= "'.$row["subtramites"].'">'.$row["subtramites"].'</option>';
				}
				while ($row = mysql_fetch_array($result));
				
			echo '</select>';
		}	

}
//HASTA AQUI VIATICOS Y PASAJES
//de aqui PRESUPUESTOS POA
if($tram==38)
{
?>
		<table align="right">
				
		<tr>
		<td height="15"><div align="right"><span class="Estilo78">Proyecto/Actividad:</span></div></td>
          <td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;
		 <input name="proyecactiviti" value="" type="text" style="width:248px" class="Estilo64" onKeyPress="return numeros_letras(event)"/></td>
		</tr>
		
		<tr>
		<td height="15"><div align="right"><span class="Estilo78">Monto:</span></div></td>
          <td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;
		 <input name="montopoa" value="" type="text" style="width:248px" class="Estilo64" onKeyPress="return solo_numeros(event)"/></td>
		</tr>
		
		<tr>
		<td height="15"><div align="right"><span class="Estilo78">Orden:</span></div></td>
          <td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;
		 <input name="ordenpoa" value="" type="text" style="width:248px" class="Estilo64" onKeyPress="return numeros_letras(event)"/></td>
		</tr>
		</table>
<?
}//FIN PRESUPUESTOS POA
//MODIFICACION PRESUPUESTARIA
if($tram==48)
{
?>
		<table align="right">
		<tr align="right">
					<td height="15" class="Estilo78"><div align="right"><span class="Estilo78">Solicitud Especifica:</span><span class="Estilo74"></span></div></td>
					<td bgcolor="#CCDDEE" class="Estilo64">&nbsp;<span class="Estilo59">
<?

		$result=mysql_query("select * from division where id_tramite='$tram' order by subtramites ASC",$link);
		if ($row = mysql_fetch_array($result))
		{ 
		echo '<select  name="modifipresu" id="modifipresu" style="width:248px" class="Estilo64" onchange="obs1(this.value)">';
		echo '<option selected></option>';
			do { 
			
				$long=strlen($row["subtramites"]);
				echo '<option value= "'.$row["subtramites"].'">'.$row["subtramites"].'</option>';
				}
				while ($row = mysql_fetch_array($result));
				
			echo '</select>';
		}	

}//CIERRE MODIFICACION PRESUPUESTARIA
//TRASPASO INTRAACTIVIDAD
if($tram==89)
{
?>
		<table align="right">
				
		<tr>
		<td height="15"><div align="right"><span class="Estilo78">Del Proyecto/Actividad:</span></div></td>
          <td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;
		 <input name="proyactdel" value="" type="text" style="width:248px" class="Estilo64" onKeyPress="return numeros_letras(event)"/></td>
		</tr>
		
		<tr>
		<td height="15"><div align="right"><span class="Estilo78">Hacia el Proyecto/Actividad:</span></div></td>
          <td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;
		 <input name="proyacthac" value="" type="text" style="width:248px" class="Estilo64" onKeyPress="return numeros_letras(event)"/></td>
		</tr>
		
		<tr>
		<td height="15"><div align="right"><span class="Estilo78">Monto:</span></div></td>
          <td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;
		 <input name="montointra" value="" type="text" style="width:248px" class="Estilo64" onKeyPress="return solo_numeros(event)"/></td>
		</tr>
		
		</table>
<?
}//CIERRE TRASPASO INTRAACTIVIDAD
////////////////////////////////////////////////////////////////////////DESDE AQUI ADMINISTRATIVOS/////////////////////////////////////
//SOLICITUD NO DEUDAS PENDIENTES
if($tram==88)
{
?>
		<table align="right">
				
		<tr>
		<td height="15"><div align="right"><span class="Estilo78">Nombre del Interesado:</span></div></td>
          <td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;
		 <input name="nombinterenodeu" value="" type="text" style="width:248px" class="Estilo64" onKeyPress="return numeros_letras(event)"/></td>
		</tr>
		
		<tr>
		<td height="15"><div align="right"><span class="Estilo78">Numero C.I.:</span></div></td>
          <td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;
		 <input name="numcinodeu" value="" type="text" style="width:248px" class="Estilo64" onKeyPress="return numeros_letras(event)"/></td>
		</tr>
		
		<tr>
		<td height="15"><div align="right"><span class="Estilo78">Con el fin de:</span></div></td>
          <td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;
		 <input name="objetivonodeu" value="" type="text" style="width:248px" class="Estilo64" onKeyPress="return numeros_letras(event)"/></td>
		</tr>
		
		</table>
<?
}//CIERRE NO DEUDAS PENDIENTES
//INVITACIONES
if($tram==19)
{
?>
		<table align="right">
				
		<tr>
		<td height="15"><div align="right"><span class="Estilo78">Institucion / Unidad:</span></div></td>
          <td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;
		 <input name="instuniinv" value="" type="text" style="width:248px" class="Estilo64" onKeyPress="return numeros_letras(event)"/></td>
		</tr>
		
		<tr>
		<td height="15"><div align="right"><span class="Estilo78">Tenor de la Invitacion:</span></div></td>
          <td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;
		 <input name="tenorinv" value="" type="text" style="width:248px" class="Estilo64" onKeyPress="return numeros_letras_especiales(event)"/></td>
		</tr>
		
		<tr>
		<td height="15"><div align="right"><span class="Estilo78">Lugar del Evento:</span></div></td>
          <td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;
		 <input name="luginv" value="" type="text" style="width:248px" class="Estilo64" onKeyPress="return numeros_letras_especiales(event)"/></td>
		</tr>
		
		<tr>
		<td height="15"><div align="right"><span class="Estilo78">Fecha del Evento:</span></div></td>
         <td width="260" bgcolor="#CCDDEE"><span class="Estilo64"> &nbsp;
		 <input name="calendario" value="" type="text" id="calendario" title="DD/MM/YYYY" onclick="scwShow(this,this);" />
		 <input name="B3" type="button" class="cal" onclick="scwShow(scwID('calendario'),this);" value="Calendario" />
		 </td>
		 </tr>
		</table>
<?
}//CIERRE INVITACIONES
//CONTRATOS
if($tram==42)
{
?>
		<table align="right">
		<tr align="right">
					<td height="15" class="Estilo78"><div align="right"><span class="Estilo78">Contrato Especifico:</span><span class="Estilo74"></span></div></td>
					<td bgcolor="#CCDDEE" class="Estilo64">&nbsp;<span class="Estilo59">
<?

		$result=mysql_query("select * from division where id_tramite='$tram' order by subtramites ASC",$link);
		if ($row = mysql_fetch_array($result))
		{ 
		echo '<select  name="contrato" id="contrato" style="width:248px" class="Estilo64" onchange="obs1(this.value)">';
		echo '<option selected></option>';
			do { 
			
				$long=strlen($row["subtramites"]);
				echo '<option value= "'.$row["subtramites"].'">'.$row["subtramites"].'</option>';
				}
				while ($row = mysql_fetch_array($result));
				
			echo '</select>';
		}	

}//CIERRE CONTRATOS
//CIRCULAR
if($tram==8)
{
?>
		<table align="center">
		<tr align="center">
					<td height="15" class="Estilo78"><input type="radio" name="circular" id="cir1" onclick="toggleLayer5(this.value)"; value="Instructivo">Instructivo</td>
					<td height="15" class="Estilo78"><input type="radio" name="circular" id="cir2" onclick="toggleLayer5(this.value)"; value="Conocimiento">Conocimiento</td>
		</tr> 
		</table>
<?
}
//DESDE AQUI DESIGNACIONES
if($tram==103)
{
?>
		<table align="right">
		<tr align="right">
					<td height="15" class="Estilo78"><div align="right"><span class="Estilo78">Designacion Especifica:</span><span class="Estilo74"></span></div></td>
					<td bgcolor="#CCDDEE" class="Estilo64">&nbsp;<span class="Estilo59">
<?
$result=mysql_query("select * from tramites where id_macro=200 order by tipo ASC",$link);
if ($row = mysql_fetch_array($result))
{ 
echo '<select  name="designa" id="designa" style="width:248px" class="Estilo64" onchange="obs3(this.value)">';
echo '<option selected></option>';
	do { 
	
		$long=strlen($row["tipo"]);
   	    echo '<option value= "'.$row["tipo"].'">'.$row["tipo"].'</option>';
		}
		while ($row = mysql_fetch_array($result));
		
	echo '</select>';
}
}
?>
                     </span></td>
        </tr> 
		</table>
<? //HASTA AQUI DESIGNACIONES
//CITACIONES
if($tram==9)
{
?>
		<table align="right">
		<tr align="right">
					<td height="15" class="Estilo78"><div align="right"><span class="Estilo78">Citacion Especifica:</span><span class="Estilo74"></span></div></td>
					<td bgcolor="#CCDDEE" class="Estilo64">&nbsp;<span class="Estilo59">
<?
		$result=mysql_query("select * from division where id_tramite='$tram' order by subtramites ASC",$link);
		if ($row = mysql_fetch_array($result))
		{ 
		echo '<select  name="citacion" id="citacion" style="width:248px" class="Estilo64" onchange="obs1(this.value)">';
		echo '<option selected></option>';
			do { 
			
				$long=strlen($row["subtramites"]);
				echo '<option value= "'.$row["subtramites"].'">'.$row["subtramites"].'</option>';
				}
				while ($row = mysql_fetch_array($result));
				
			echo '</select>';
		}	
}
?>
                     </span></td>
        </tr> 
		</table>
<?//HASTA CITACIONES
//INFORME JURIDICO
if($tram==17)
{
?>
		<table align="right">
		<tr align="right">
					<td height="15" class="Estilo78"><div align="right"><span class="Estilo78">Informe Especifico:</span><span class="Estilo74"></span></div></td>
					<td bgcolor="#CCDDEE" class="Estilo64">&nbsp;<span class="Estilo59">
<?
		$result=mysql_query("select * from division where id_tramite='$tram' order by subtramites ASC",$link);
		if ($row = mysql_fetch_array($result))
		{ 
		echo '<select  name="informeju" id="informeju" style="width:248px" class="Estilo64" onchange="obs1(this.value)">';
		echo '<option selected></option>';
			do { 
			
				$long=strlen($row["subtramites"]);
				echo '<option value= "'.$row["subtramites"].'">'.$row["subtramites"].'</option>';
				}
				while ($row = mysql_fetch_array($result));
				
			echo '</select>';
		}	
}
?>
                     </span></td>
        </tr> 
		</table>
<? //HASTA AQUI INFORME JURIDICO
//RESOLUCIONES
if($tram==105)
{
?>
		<table align="right">
		<tr align="right">
					<td height="15" class="Estilo78"><div align="right"><span class="Estilo78">Resolucion Especifica:</span><span class="Estilo74"></span></div></td>
					<td bgcolor="#CCDDEE" class="Estilo64">&nbsp;<span class="Estilo59">
<?
		$result=mysql_query("select * from division where id_tramite='$tram' order by subtramites ASC",$link);
		if ($row = mysql_fetch_array($result))
		{ 
		echo '<select  name="resoluciones" id="resoluciones" style="width:248px" class="Estilo64" onchange="obs1(this.value)">';
		echo '<option selected></option>';
			do { 
			
				$long=strlen($row["subtramites"]);
				echo '<option value= "'.$row["subtramites"].'">'.$row["subtramites"].'</option>';
				}
				while ($row = mysql_fetch_array($result));
				
			echo '</select>';
		}	
}
?>
                     </span></td>
        </tr> 
		</table>
<? //HASTA AQUI RESOLUCIONES
//REVALIDACION DE CHEQUES
if($tram==33)
{
?>
		<table align="right">
				
		<tr>
		<td height="15"><div align="right"><span class="Estilo78">Beneficiario:</span></div></td>
          <td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;
		 <input name="benerevache" value="" type="text" style="width:248px" class="Estilo64" onKeyPress="return numeros_letras_especiales(event)"/></td>
		</tr>
		
		<tr>
		<td height="15"><div align="right"><span class="Estilo78">Monto del Cheque:</span></div></td>
          <td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;
		 <input name="montorevcheque" value="" type="text" style="width:248px" class="Estilo64" onKeyPress="return solo_numeros(event)"/></td>
		</tr>
		
		<tr>
		<td height="15"><div align="right"><span class="Estilo78">Fecha de Emision del Cheque:</span></div></td>
         <td width="260" bgcolor="#CCDDEE"><span class="Estilo64"> &nbsp;
		 <input name="calendario8" value="" type="text" id="calendario8" title="DD/MM/YYYY" onclick="scwShow(this,this);" />
		 <input name="B3" type="button" class="cal" onclick="scwShow(scwID('calendario8'),this);" value="Calendario" />
		 </td>
		 </tr>
		 
		<tr>
		<td height="15"><div align="right"><span class="Estilo78">Observaciones:</span></div></td>
          <td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;
		 <input name="obsrevacheque" value="" type="text" style="width:248px" class="Estilo64" onKeyPress="return numeros_letras_especiales(event)"/></td>
		</tr>
		
		</table>
<?
}//HASTA AQUI REVALIDACION DE CHEQUES
//ACREDITACIONES
if($tram==35)
{
?>
		<table align="right">
		<tr align="right">
					<td height="15" class="Estilo78"><div align="right"><span class="Estilo78">Acreditacion Especifica:</span><span class="Estilo74"></span></div></td>
					<td bgcolor="#CCDDEE" class="Estilo64">&nbsp;<span class="Estilo59">
<?
		$result=mysql_query("select * from division where id_tramite='$tram' order by subtramites ASC",$link);
		if ($row = mysql_fetch_array($result))
		{ 
		echo '<select  name="acreditasao" id="acreditasao" style="width:248px" class="Estilo64" onchange="obs1(this.value)">';
		echo '<option selected></option>';
			do { 
			
				$long=strlen($row["subtramites"]);
				echo '<option value= "'.$row["subtramites"].'">'.$row["subtramites"].'</option>';
				}
				while ($row = mysql_fetch_array($result));
				
			echo '</select>';
		}	
}
?>
                     </span></td>
        </tr> 
		</table>
<? //HASTA AQUI ACREDITACIONES
//REINCORPORACION DOCENTE
if($tram==43)
{
?>
		<table align="right">
				
		<tr>
		<td height="15"><div align="right"><span class="Estilo78">Causa de la Reincorporacion:</span></div></td>
          <td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;
		 <input name="causareincorpo" value="" type="text" style="width:248px" class="Estilo64" onKeyPress="return numeros_letras_especiales(event)"/></td>
		</tr>
		
		<tr>
		<td height="15"><div align="right"><span class="Estilo78">Nombre Docente:</span></div></td>
          <td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;
		 <input name="nombredocrein" value="" type="text" style="width:248px" class="Estilo64" onKeyPress="return numeros_letras_especiales(event)"/></td>
		</tr>
		
		<tr>
		<td height="15"><div align="right"><span class="Estilo78">Fecha de la Reincorporacion:</span></div></td>
         <td width="260" bgcolor="#CCDDEE"><span class="Estilo64"> &nbsp;
		 <input name="calendario9" value="" type="text" id="calendario9" title="DD/MM/YYYY" onclick="scwShow(this,this);" />
		 <input name="B3" type="button" class="cal" onclick="scwShow(scwID('calendario9'),this);" value="Calendario" />
		 </td>
		 </tr>
		 
		<tr>
		<td height="15"><div align="right"><span class="Estilo78">Observaciones:</span></div></td>
          <td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;
		 <input name="obsreincordoc" value="" type="text" style="width:248px" class="Estilo64" onKeyPress="return numeros_letras_especiales(event)"/></td>
		</tr>
		
		</table>
<?
}//HASTA AQUI REINCORPORACION DOCENTE
//LICENCIAS
if($tram==45)
{
?>
		<table align="right">
		<tr align="right">
					<td height="15" class="Estilo78"><div align="right"><span class="Estilo78">Licencia Especifica:</span><span class="Estilo74"></span></div></td>
					<td bgcolor="#CCDDEE" class="Estilo64">&nbsp;<span class="Estilo59">
<?
		$result=mysql_query("select * from division where id_tramite='$tram' order by subtramites ASC",$link);
		if ($row = mysql_fetch_array($result))
		{ 
		echo '<select  name="licenciaadm" id="licenciaadm" style="width:248px" class="Estilo64" onchange="obs1(this.value)">';
		echo '<option selected></option>';
			do { 
			
				$long=strlen($row["subtramites"]);
				echo '<option value= "'.$row["subtramites"].'">'.$row["subtramites"].'</option>';
				}
				while ($row = mysql_fetch_array($result));
				
			echo '</select>';
		}	
}
?>
                     </span></td>
        </tr> 
		</table>
<? //HASTA AQUI LICENCIAS
//NOMBRAMIENTO AUTORIDADES
if($tram==67)
{
?>
		<table align="right">
		<tr align="right">
					<td height="15" class="Estilo78"><div align="right"><span class="Estilo78">Nombramiento Especifico:</span><span class="Estilo74"></span></div></td>
					<td bgcolor="#CCDDEE" class="Estilo64">&nbsp;<span class="Estilo59">
<?
		$result=mysql_query("select * from division where id_tramite='$tram' order by subtramites ASC",$link);
		if ($row = mysql_fetch_array($result))
		{ 
		echo '<select  name="nombramiento" id="nombramiento" style="width:248px" class="Estilo64" onchange="obs1(this.value)">';
		echo '<option selected></option>';
			do { 
			
				$long=strlen($row["subtramites"]);
				echo '<option value= "'.$row["subtramites"].'">'.$row["subtramites"].'</option>';
				}
				while ($row = mysql_fetch_array($result));
				
			echo '</select>';
		}	
}
?>
                     </span></td>
        </tr> 
		</table>
<? //HASTA AQUI NOMBRAMIENTO AUTORIDADES
//AÑO SABATICO
if($tram==56)
{
?>
		<table align="right">
				
		<tr>
		<td height="15"><div align="right"><span class="Estilo78">Nombre Docente Beneficiario:</span></div></td>
          <td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;
		 <input name="nombresabatico" value="" type="text" style="width:248px" class="Estilo64" onKeyPress="return numeros_letras_especiales(event)"/></td>
		</tr>
		
		<tr>
		<td height="15"><div align="right"><span class="Estilo78">Fecha de Inicio:</span></div></td>
         <td width="260" bgcolor="#CCDDEE"><span class="Estilo64"> &nbsp;
		 <input name="calendario10" value="" type="text" id="calendario10" title="DD/MM/YYYY" onclick="scwShow(this,this);" />
		 <input name="B3" type="button" class="cal" onclick="scwShow(scwID('calendario10'),this);" value="Calendario" />
		 </td>
		 </tr>
		 
		 <tr>
		<td height="15"><div align="right"><span class="Estilo78">Fecha de Conclusion:</span></div></td>
         <td width="260" bgcolor="#CCDDEE"><span class="Estilo64"> &nbsp;
		 <input name="calendario11" value="" type="text" id="calendario11" title="DD/MM/YYYY" onclick="scwShow(this,this);" />
		 <input name="B3" type="button" class="cal" onclick="scwShow(scwID('calendario11'),this);" value="Calendario" />
		 </td>
		 </tr>
		 
		<tr>
		<td height="15"><div align="right"><span class="Estilo78">Observaciones:</span></div></td>
          <td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;
		 <input name="obssabatico" value="" type="text" style="width:248px" class="Estilo64" onKeyPress="return numeros_letras_especiales(event)"/></td>
		</tr>
		
		</table>
<?
}//HASTA AQUI AÑO SABATICO
//COMUNICADO
if($tram==72)
{
?>
		<table align="right">
				
		<tr>
		<td height="15"><div align="right"><span class="Estilo78">Referencia:</span></div></td>
          <td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;
		 <input name="refcomunicado" value="" type="text" style="width:248px" class="Estilo64" onKeyPress="return numeros_letras_especiales(event)"/></td>
		</tr>
		
		<tr>
		<td height="15"><div align="right"><span class="Estilo78">Fecha a Efectuarse el Evento:</span></div></td>
         <td width="260" bgcolor="#CCDDEE"><span class="Estilo64"> &nbsp;
		 <input name="calendario12" value="" type="text" id="calendario12" title="DD/MM/YYYY" onclick="scwShow(this,this);" />
		 <input name="B3" type="button" class="cal" onclick="scwShow(scwID('calendario12'),this);" value="Calendario" />
		 </td>
		 </tr>
		 
		 <tr>
		<td height="15"><div align="right"><span class="Estilo78">Numero de Instructivo:</span></div></td>
          <td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;
		 <input name="numinscomuni" value="" type="text" style="width:248px" class="Estilo64" onKeyPress="return numeros_letras_especiales(event)"/></td>
		</tr>
		
		<tr>
		<td height="15"><div align="right"><span class="Estilo78">Observaciones:</span></div></td>
          <td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;
		 <input name="obscomunicado" value="" type="text" style="width:248px" class="Estilo64" onKeyPress="return numeros_letras_especiales(event)"/></td>
		</tr>
		
		</table>
<?
}//HASTA AQUI COMUNICADO
//CONCLUSION DE ESTUDIOS
if($tram==2)
{
?>
		<table align="right">
				
		<tr>
		<td height="15"><div align="right"><span class="Estilo78">Nombre del Estudiante:</span></div></td>
          <td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;
		 <input name="nomestcon" value="" type="text" style="width:248px" class="Estilo64" onKeyPress="return numeros_letras_especiales(event)"/></td>
		</tr>
		
		<tr>
		<td height="15"><div align="right"><span class="Estilo78">Numero de Informe de Kardex:</span></div></td>
          <td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;
		 <input name="numinfkar" value="" type="text" style="width:248px" class="Estilo64" onKeyPress="return numeros_letras_especiales(event)"/></td>
		</tr>
		
		<tr>
		<td height="15"><div align="right"><span class="Estilo78">Observaciones:</span></div></td>
         <td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;
		 <input name="obsconclu" value="" type="text" style="width:248px" class="Estilo64" onKeyPress="return numeros_letras_especiales(event)"/></td>
		</tr>
		
		</table>
<?
}//HASTA AQUI CONCLUSION DE ESTUDIOS
//MEMORANDUM
if($tram==20)
{
?>
		<table align="right">
		<tr align="right">
					<td height="15" class="Estilo78"><div align="right"><span class="Estilo78">Memorandum Especifico:</span><span class="Estilo74"></span></div></td>
					<td bgcolor="#CCDDEE" class="Estilo64">&nbsp;<span class="Estilo59">
<?
		$result=mysql_query("select * from division where id_tramite='$tram' order by subtramites ASC",$link);
		if ($row = mysql_fetch_array($result))
		{ 
		echo '<select  name="memoran" id="memoran" style="width:248px" class="Estilo64" onchange="obs1(this.value)">';
		echo '<option selected></option>';
			do { 
			
				$long=strlen($row["subtramites"]);
				echo '<option value= "'.$row["subtramites"].'">'.$row["subtramites"].'</option>';
				}
				while ($row = mysql_fetch_array($result));
				
			echo '</select>';
		}	
}
?>
                     </span></td>
        </tr> 
		</table>
<?//MEMORANDUM
//CONVENIO
if($tram==70)
{
?>
		<table align="right">
				
		<tr>
		<td height="15"><div align="right"><span class="Estilo78">Titulo del Convenio:</span></div></td>
          <td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;
		 <input name="nomconvenio" value="" type="text" style="width:248px" class="Estilo64" onKeyPress="return numeros_letras_especiales(event)"/></td>
		</tr>
		
		<tr>
		<td height="15"><div align="right"><span class="Estilo78">Fecha de Inicio del Convenio:</span></div></td>
         <td width="260" bgcolor="#CCDDEE"><span class="Estilo64"> &nbsp;
		 <input name="calendario13" value="" type="text" id="calendario13" title="DD/MM/YYYY" onclick="scwShow(this,this);" />
		 <input name="B3" type="button" class="cal" onclick="scwShow(scwID('calendario13'),this);" value="Calendario" />
		 </td>
		 </tr>
		
		<tr>
		<td height="15"><div align="right"><span class="Estilo78">Observaciones:</span></div></td>
         <td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;
		 <input name="obsconvenio" value="" type="text" style="width:248px" class="Estilo64" onKeyPress="return numeros_letras_especiales(event)"/></td>
		</tr>
		
		</table>
<?
}//HASTA AQUI CONVENIO
//TRAMITES QUE NO TIENES REQUISITOS ------ ABIERTO
//INCLUSO LOS TRAMITES OOOOOTROOOOS QUE SON EL 106 107 108
if($tram==71 || $tram==31 || $tram==30 || $tram==46 || $tram==15 || $tram==84 || $tram==39 || $tram==40 || $tram==85 || $tram==32 || $tram==80 || $tram==73 || $tram==87 || $tram==78 || $tram==68 || $tram==83 || $tram==5 || $tram==106 || $tram==107 || $tram==108 || $tram==16 || $tram == 86)
{
if($tram==106 || $tram==107 || $tram==108)
{
?>
	<table align="right">
		<tr>
		<td height="15"><div align="right"><span class="Estilo78">Nombre del Tramite:</span></div></td>
         <td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;
		 <input name="nomtraminuevo" value="" type="text" style="width:248px" class="Estilo64" onKeyPress="return numeros_letras_especiales(event)"/></td>
		</tr>
	
		<tr>
         <td height="15"><div align="right"><span class="Estilo78">Referencias:</span></div></td>
         <td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;
         <textarea style="width:248px; height:60px " name="refabierto" class="Estilo7" onKeyPress="return numeros_letras_especiales(event)" maxlength="200" onkeyup="return ismaxlength(this)"></textarea>
         </span></td>
	</table>
<?
}
else
{	
?>
	<table align="right">
		<tr>
         <td height="15"><div align="right"><span class="Estilo78">Referencias:</span></div></td>
         <td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;
         <textarea style="width:248px; height:60px " name="refabierto" class="Estilo7" onKeyPress="return numeros_letras_especiales(event)" maxlength="200" onkeyup="return ismaxlength(this)"></textarea>
         </span></td>
	</table>
<?
}
}//FIN ABIERTO


