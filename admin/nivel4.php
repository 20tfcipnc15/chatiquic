<?php
include("../funciones1.php");
include("../php/funciones.php");
$link=conexion();
$vali = $_POST['confirm'];
if($vali=="si")
{
?>
		<table align="right">
		<tr>
		<td height="15"><div align="right"><span class="Estilo78">Nro de Boleta:</span></div></td>
          <td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;
		 <input name="desnrobole" value="" type="text" style="width:248px" class="Estilo64" onKeyPress="return numeros_letras(event)"/></td>
		</tr>
<?
}
elseif($vali=="no")
{
}//FIN VIATICOS Y PASAJES
$cargate = $_POST['descaresp'];
//para descargo de caja chica
if($cargate=="Descargo Caja Chica")
{
?>
        <table align="center">
				<tr align="center">
        			<table align="center">
                    	<tr>
                        	<td height="15" class="Estilo78"><input type="radio" name="descajachica" id="descajachica" onclick="toggleLayer2(this.value)"; value="reposicion">Reposicion</td>
							<td height="15" class="Estilo78"><input type="radio" name="descajachica" id="descajachica" onclick="toggleLayer2(this.value)"; value="cierre">Cierre</td>
                        </tr>
                    </table>                  
				</tr> 
			</table 
<?
}
$cargate1 = $_POST['varchi'];
if($cargate1=="reposicion")
{
?>
		<table align="right">
		<tr>
		<td height="15"><div align="right"><span class="Estilo78">Responsable del Fondo:</span></div></td>
			<td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;
			<input name="desrotacajades" value="" type="text" style="width:248px" class="Estilo64" onKeyPress="return numeros_letras(event)"/></td>
		</tr>

		<table align="right">
		<tr>
		<td height="15"><div align="right"><span class="Estilo78">Unidad Solicitante:</span></div></td>
			<td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;
			<input name="desrotacajauni" value="" type="text" style="width:248px" class="Estilo64" onKeyPress="return numeros_letras(event)"/></td>
		</tr>

		<table align="right">
		<tr>
		<td height="15"><div align="right"><span class="Estilo78">Monto Fondo:</span></div></td>
			<td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;
			<input name="desrotacajamonto" value="" type="text" style="width:248px" class="Estilo64" onKeyPress="return solo_numeros(event)"/></td>
		</tr>
		<!--Para ver boleta o no boleta-->
		
         <table align="center">
				<tr align="center">
        			<table align="center">
                    	<tr>
                        	<td height="15" class="Estilo78"><input type="radio" name="bolrotades" id="bolrotades" onclick="toggleLayer3(this.value)"; value="si">Con Boleta</td>
							<td height="15" class="Estilo78"><input type="radio" name="bolrotades" id="bolrotades" onclick="toggleLayer3(this.value)"; value="no">Sin Boleta</td>
                        </tr>
                    </table>                  
				</tr> 
		</table 
<?
}
elseif($cargate1=="cierre")
{
?>
		<!--para llevar el valor del radiobutton-->
		<input type="hidden" id="repocierre" name="repocierre" value=<?echo $cargate1?>>
		
		<table align="right">
		<tr>
		<td height="15"><div align="right"><span class="Estilo78">Responsable del Fondo:</span></div></td>
			<td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;
			<input name="desrotacajades1" value="" type="text" style="width:248px" class="Estilo64" onKeyPress="return numeros_letras(event)"/></td>
		</tr>

		<table align="right">
		<tr>
		<td height="15"><div align="right"><span class="Estilo78">Unidad Solicitante:</span></div></td>
			<td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;
			<input name="desrotacajauni1" value="" type="text" style="width:248px" class="Estilo64" onKeyPress="return numeros_letras(event)"/></td>
		</tr>

		<table align="right">
		<tr>
		<td height="15"><div align="right"><span class="Estilo78">Monto Fondo:</span></div></td>
			<td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;
			<input name="desrotacajamonto1" value="" type="text" style="width:248px" class="Estilo64" onKeyPress="return solo_numeros(event)"/></td>
		</tr>
		
		<!--Para ver boleta o no boleta-->
		
        <table align="center">
				<tr align="center">
        			<table align="center">
                    	<tr>
                        	<td height="15" class="Estilo78"><input type="radio" name="bolrotades1" id="bolrotades1" onclick="toggleLayer3(this.value)"; value="si">Con Boleta</td>
							<td height="15" class="Estilo78"><input type="radio" name="bolrotades1" id="bolrotades1" onclick="toggleLayer3(this.value)"; value="no">Sin Boleta</td>
                        </tr>
                    </table>                  
				</tr> 
		</table 
<?
}
//para fondo de mantenimiento - DESCARGO
if($cargate=="Descargo Fondo de Mantenimiento")
{
?>
        <table align="center">
				<tr align="center">
        			<table align="center">
                    	<tr>
                        	<td height="15" class="Estilo78"><input type="radio" name="desfonman1" id="desfonman1" onclick="toggleLayer2(this.value)"; value="reposicion">Reposicion</td>
							<td height="15" class="Estilo78"><input type="radio" name="desfonman1" id="desfonman1" onclick="toggleLayer2(this.value)"; value="cierre">Cierre</td>
                        </tr>
                    </table>                  
				</tr> 
		</table 
<?
}
elseif($cargate=="Otros Descargos Rotatorios")
{
?>
		<table align="right">
		<tr>
		<td height="15"><div align="right"><span class="Estilo78">Describa el Descargo Rotatorio:</span></div></td>
			<td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;
			<input name="nomotrodescar" value="" type="text" style="width:248px" class="Estilo64" onKeyPress="return numeros_letras_especiales(event)"/></td>
		</tr>
		
         <table align="center">
				<tr align="center">
        			<table align="center">
                    	<tr>
                        	<td height="15" class="Estilo78"><input type="radio" name="otrodesfonman1" id="otrodesfonman1" onclick="toggleLayer2(this.value)"; value="reposicion">Reposicion</td>
							<td height="15" class="Estilo78"><input type="radio" name="otrodesfonman1" id="otrodesfonman1" onclick="toggleLayer2(this.value)"; value="cierre">Cierre</td>
                        </tr>
                    </table>                  
				</tr> 
		</table
<?
}
//para solicitud de viaticos y pasajes
if($vali=="con")
{
?>
		<table align="right">
		<tr>
		<td height="15"><div align="right"><span class="Estilo78">Nombre Fondo Avance Adjunto:</span></div></td>
          <td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;
		 <input name="nomfonavaadj" value="" type="text" style="width:248px" class="Estilo64" onKeyPress="return numeros_letras_especiales(event)"/></td>
		</tr>
		</table>
		<table align="right">
		<tr>
		<td height="15"><div align="right"><span class="Estilo78">Monto Fondo Avance Adjunto:</span></div></td>
          <td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;
		 <input name="montodonfoavanadj" value="" type="text" style="width:248px" class="Estilo64" onKeyPress="return solo_numeros(event)"/></td>
		</tr>
		</table>
<?
}
elseif($vali=="sin")
{//no se hace ni muestra nada si es sin fondo en avance
}
//CIRCULAR
$circulari = $_POST['descaresp'];
if($circulari=="Resoluciones HCF" || $circulari=="Resoluciones HCU" || $circulari=="Resoluciones CAF" || $circulari=="Resoluciones CAU" || $circulari=="Resoluciones CEPIES" || $circulari=="Resoluciones BIBLIOTECAS" || $circulari=="Resoluciones Decanales" || $circulari=="Resoluciones Rectorales" || $circulari=="Otras Resoluciones")
{
	if($circulari=="Otras Resoluciones")
	{
?>
		<table align="right">
		<tr>
		<td height="15"><div align="right"><span class="Estilo78">Nombre de la Resolucion:</span></div></td>
          <td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;
		 <input name="nomresolu" value="" type="text" style="width:248px" class="Estilo64" onKeyPress="return numeros_letras_especiales(event)"/></td>
		</tr>
		</table>
<?		
	}
	
?>
		<table align="right">
		<tr>
		<td height="15"><div align="right"><span class="Estilo78">Referencia de la Circular:</span></div></td>
          <td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;
		 <input name="refcircu" value="" type="text" style="width:248px" class="Estilo64" onKeyPress="return numeros_letras_especiales(event)"/></td>
		</tr>

		<tr>
		<td height="15"><div align="right"><span class="Estilo78">Fecha Emision de la Resolucion:</span></div></td>
         <td width="260" bgcolor="#CCDDEE"><span class="Estilo64"> &nbsp;
		 <input name="calendario3" type="text" id="calendario3" title="DD/MM/YYYY" onclick="scwShow(this,this);" />
		 <input name="B3" type="button" class="cal" onclick="scwShow(scwID('calendario3'),this);" value="Calendario" />
		 </td>
		 </tr>
		
		<tr>
		<td height="15"><div align="right"><span class="Estilo78">Observaciones:</span></div></td>
          <td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;
		 <input name="obscircular" value="" type="text" style="width:248px" class="Estilo64" onKeyPress="return numeros_letras_especiales(event)"/></td>
		</tr>
		
	</table>
<?
}
//CIERRE CIRCULAR
//DESIGNACIONES TRIBUNAL
$desig = $_POST['descaresp'];
if($desig=="Designacion Tribunal Docente" || $desig=="Designacion Tribunal Estudiantil" || $desig=="Designacion Tribunal Estudiantil-Docente")
{
	if($desig=="Designacion Tribunal Docente")
	{
?>
		<table align="right">
		<tr>
		<td height="15"><div align="right"><span class="Estilo78">Nombre Docente:</span></div></td>
          <td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;
		 <input name="nomdocentribu" value="" type="text" style="width:248px" class="Estilo64" onKeyPress="return solo_letras(event)"/></td>
		</tr>
		</table>
<?	
	}
	if($desig=="Designacion Tribunal Estudiantil")
	{
?>
		<table align="right">
		<tr>
		<td height="15"><div align="right"><span class="Estilo78">Nombre Estudiante:</span></div></td>
          <td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;
		 <input name="nomestutribu" value="" type="text" style="width:248px" class="Estilo64" onKeyPress="return solo_letras(event)"/></td>
		</tr>
		<table>
<?	
	}
	if($desig=="Designacion Tribunal Estudiantil-Docente")
	{
?>
	<table align="right">
		<tr>
		<td height="15"><div align="right"><span class="Estilo78">Nombre de Docentes y/o Estudiantes:</span></div></td>
          <td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;
		 <input name="ambosnombres" value="" type="text" style="width:248px" class="Estilo64" onKeyPress="return numeros_letras_especiales(event)"/></td>
		</tr>
		<table>
<?	
	}
?>
		<table align="right">
		<tr>
		<td height="15"><div align="right"><span class="Estilo78">Nro Resolucion:</span></div></td>
          <td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;
		 <input name="nroresotrib" value="" type="text" style="width:248px" class="Estilo64" onKeyPress="return numeros_letras_especiales(event)"/></td>
		</tr>
		<tr>
		<td height="15"><div align="right"><span class="Estilo78">Observaciones:</span></div></td>
          <td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;
		 <input name="obsdocetribu" value="" type="text" style="width:248px" class="Estilo64" onKeyPress="return numeros_letras_especiales(event)"/></td>
		</tr>
		</table>
<?		
}//DESIGNACION TRIBUNAL
//DESIGNACIONES DOCENTES
if($desig=="Docente Contratado" || $desig=="Docente Interino" || $desig=="Docente Invitado")
{
	if($desig=="Docente Contratado")
	{
?>
		<table align="right">
		<tr>
		<td height="15"><div align="right"><span class="Estilo78">Nombre Docente Contratado:</span></div></td>
          <td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;
		 <input name="nomdoccontra" value="" type="text" style="width:248px" class="Estilo64" onKeyPress="return solo_letras(event)"/></td>
		</tr>
		</table>
<?	
	}
	if($desig=="Docente Interino")
	{
?>
		<table align="right">
		<tr>
		<td height="15"><div align="right"><span class="Estilo78">Nombre Docente Interino:</span></div></td>
          <td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;
		 <input name="nomdocinteri" value="" type="text" style="width:248px" class="Estilo64" onKeyPress="return solo_letras(event)"/></td>
		</tr>
		<table>
<?	
	}
	if($desig=="Docente Invitado")
	{
?>
	<table align="right">
		<tr>
		<td height="15"><div align="right"><span class="Estilo78">Nombre Docente Invitado:</span></div></td>
          <td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;
		 <input name="nomdocinvi" value="" type="text" style="width:248px" class="Estilo64" onKeyPress="return solo_letras(event)"/></td>
		</tr>
		<table>
<?	
	}
?>
		<table align="right">
		<tr>
		<td height="15"><div align="right"><span class="Estilo78">Periodo de Designacion:</span></div></td>
          <td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;
		 <input name="periododesig" value="" type="text" style="width:248px" class="Estilo64" onKeyPress="return numeros_letras_especiales(event)"/></td>
		</tr>
		</table>
<?		
}
//FIN DESIGNACIONES
//NOMBRAMIENTOS
$nombra = $_POST['confirm'];
if($nombra=="Titular")
{
?>
		<table align="right">
		<tr>
		<td height="15"><div align="right"><span class="Estilo78">Nombre Autoridad Designado:</span></div></td>
          <td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;
		 <input name="nomdocdesig" value="" type="text" style="width:248px" class="Estilo64" onKeyPress="return numeros_letras_especiales(event)"/></td>
		</tr>

		<tr>
		<td height="15"><div align="right"><span class="Estilo78">Fecha Inicio de la Autoridad:</span></div></td>
         <td width="260" bgcolor="#CCDDEE"><span class="Estilo64"> &nbsp;
		 <input name="calendario1" type="text" id="calendario1" title="DD/MM/YYYY" onclick="scwShow(this,this);" />
		 <input name="B3" type="button" class="cal" onclick="scwShow(scwID('calendario1'),this);" value="Calendario" />
		 </td>
		 </tr>
		
		<tr>
		<td height="15"><div align="right"><span class="Estilo78">Duracion del Cargo:</span></div></td>
          <td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;
		 <input name="durcargonom" value="" type="text" style="width:248px" class="Estilo64" onKeyPress="return numeros_letras_especiales(event)"/></td>
		</tr>
		
		<tr>
		<td height="15"><div align="right"><span class="Estilo78">Observaciones:</span></div></td>
          <td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;
		 <input name="obsnombramiento" value="" type="text" style="width:248px" class="Estilo64" onKeyPress="return numeros_letras_especiales(event)"/></td>
		</tr>
		
	</table>
<?
}
elseif($nombra=="Interino")
{
?>		<table align="right">
		<tr>
		<td height="15"><div align="right"><span class="Estilo78">Nombre Autoridad Designado:</span></div></td>
          <td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;
		 <input name="nomdocdesig" value="" type="text" style="width:248px" class="Estilo64" onKeyPress="return numeros_letras_especiales(event)"/></td>
		</tr>

		<tr>
		<td height="15"><div align="right"><span class="Estilo78">Fecha Inicio de la Autoridad:</span></div></td>
         <td width="260" bgcolor="#CCDDEE"><span class="Estilo64"> &nbsp;
		 <input name="calendario1" type="text" id="calendario1" title="DD/MM/YYYY" onclick="scwShow(this,this);" />
		 <input name="B3" type="button" class="cal" onclick="scwShow(scwID('calendario1'),this);" value="Calendario" />
		 </td>
		 </tr>
		 
		 <tr>
		<td height="15"><div align="right"><span class="Estilo78">Observaciones:</span></div></td>
          <td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;
		 <input name="obsnombramiento" value="" type="text" style="width:248px" class="Estilo64" onKeyPress="return numeros_letras_especiales(event)"/></td>
		</tr>
		
		</table>
<?
}//FIN NOMBRAMIENTOS
