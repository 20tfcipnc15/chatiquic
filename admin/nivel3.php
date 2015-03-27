<?php
include("../funciones1.php");
include("../php/funciones.php");
$link=conexion();
//para compras desde reg_despacho_x.php
$tram=$_POST['trameaje'];
$radio=$_POST['balu'];
if($radio=="Bienes")
{
?>
		<table align="right">
		<tr>
		<td height="15"><div align="right"><span class="Estilo78">Beneficiario:</span></div></td>
          <td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;
		 <input name="benebien" value="" type="text" style="width:248px" class="Estilo64" onKeyPress="return numeros_letras_especiales(event)"/></td>
		</tr>
		
		<tr>
		<td height="15"><div align="right"><span class="Estilo78">Descripcion Bien:</span></div></td>
          <td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;
		 <input name="descbien" value="" type="text" style="width:248px" class="Estilo64" onKeyPress="return numeros_letras(event)"/></td>
		</tr>
		
		<tr>
		<td height="15"><div align="right"><span class="Estilo78">Destino del Bien:</span></div></td>
          <td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;
		 <input name="desbien" value="" type="text" style="width:248px" class="Estilo64" onKeyPress="return numeros_letras(event)"/></td>
		</tr>
		
		<tr>
		<td height="15"><div align="right"><span class="Estilo78">Monto del Bien:</span></div></td>
          <td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;
		 <input name="monbien" value="" type="text" style="width:248px" class="Estilo64" onKeyPress="return solo_numeros(event)"/></td>
		</tr>
	</table>
<?
}
else
{
if($radio=="Servicios")
{
?>
		<table align="right">
		<tr>
		<td height="15"><div align="right"><span class="Estilo78">Proveedor:</span></div></td>
          <td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;
		 <input name="beneser" value="" type="text" style="width:248px" class="Estilo64" onKeyPress="return numeros_letras_especiales(event)"/></td>
		</tr>
		
		<tr>
		<td height="15"><div align="right"><span class="Estilo78">Descripcion del Servicio:</span></div></td>
          <td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;
		 <input name="descser" value="" type="text" style="width:248px" class="Estilo64" onKeyPress="return numeros_letras(event)"/></td>
		</tr>
		
		<tr>
		<td height="15"><div align="right"><span class="Estilo78">Destino del Servicio:</span></div></td>
          <td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;
		 <input name="deser" value="" type="text" style="width:248px" class="Estilo64" onKeyPress="return numeros_letras(event)"/></td>
		</tr>
		
		<tr>
		<td height="15"><div align="right"><span class="Estilo78">Monto del Servicio:</span></div></td>
          <td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;
		 <input name="montoser" value="" type="text" style="width:248px" class="Estilo64" onKeyPress="return solo_numeros(event)"/></td>
		</tr>
	</table>
<?
}
}
//HASTA AQUI PARA COMPRAS
													//PARA SOLICITUD DE PAGO
$subtramites = $_POST['pagoza'];
if($subtramites=="Beca Trabajo" || $subtramites=="Beca Investigacion" || $subtramites=="Consultor por Producto" || $subtramites=="Consultor en linea" || $subtramites=="Servicios Manuales" || $subtramites=="Servicios no Personales" || $subtramites=="Pago Grupal")
{
		if($subtramites=="Beca Trabajo" )
		{
?>
		<table align="right">
		<tr>
		<td height="15"><div align="right"><span class="Estilo78">Nombre Beca:</span></div></td>
          <td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;
		 <input name="nombrebeca" value="" type="text" style="width:248px" class="Estilo64" onKeyPress="return numeros_letras(event)"/></td>
		</tr>
<?
		}
		if($subtramites=="Beca Investigacion" )
		{
?>
		<table align="right">
		<tr>
		<td height="15"><div align="right"><span class="Estilo78">Nombre Beca Inv.:</span></div></td>
          <td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;
		 <input name="nombrebecainv" value="" type="text" style="width:248px" class="Estilo64" onKeyPress="return numeros_letras(event)"/></td>
		</tr>
<?
		}
		if($subtramites=="Consultor por Producto" )
		{
?>
		<table align="right">
		<tr>
		<td height="15"><div align="right"><span class="Estilo78">Nombre Consultor Producto:</span></div></td>
          <td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;
		 <input name="nombreconprod" value="" type="text" style="width:248px" class="Estilo64" onKeyPress="return numeros_letras(event)"/></td>
		</tr>
<?
		}
		if($subtramites=="Consultor en linea" )
		{
?>
		<table align="right">
		<tr>
		<td height="15"><div align="right"><span class="Estilo78">Nombre Consultor Linea:</span></div></td>
          <td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;
		 <input name="nombreconlin" value="" type="text" style="width:248px" class="Estilo64" onKeyPress="return numeros_letras(event)"/></td>
		</tr>
<?
		}
		if($subtramites=="Servicios Manuales" )
		{
?>
		<table align="right">
		<tr>
		<td height="15"><div align="right"><span class="Estilo78">Nombre Persona:</span></div></td>
          <td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;
		 <input name="nombremanual" value="" type="text" style="width:248px" class="Estilo64" onKeyPress="return numeros_letras(event)"/></td>
		</tr>
<?
		}
		if($subtramites=="Servicios no Personales" )
		{
?>
		<table align="right">
		<tr>
		<td height="15"><div align="right"><span class="Estilo78">Nombre Empresa/Persona:</span></div></td>
          <td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;
		 <input name="nombrepersonal" value="" type="text" style="width:248px" class="Estilo64" onKeyPress="return numeros_letras(event)"/></td>
		</tr>
<?
		}
		if($subtramites=="Pago Grupal" )
		{
?>
		<table align="right">
		<tr>
		<td height="15"><div align="right"><span class="Estilo78">Nombre de las Personas(Grupo):</span></div></td>
          <td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;
		 <input name="nombrepersonales" value="" type="text" style="width:248px" class="Estilo64" onKeyPress="return numeros_letras_especiales(event)"/></td>
		</tr>
<?
		}
?>
		<tr>
		<td height="15"><div align="right"><span class="Estilo78">Mes o Periodo:</span></div></td>
          <td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;
		 <input name="mesperiodo" value="" type="text" style="width:248px" class="Estilo64" onKeyPress="return numeros_letras(event)"/></td>
		</tr>
		
		<tr>
		<td height="15"><div align="right"><span class="Estilo78">Monto Total a Pagar:</span></div></td>
          <td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;
		 <input name="montopago" value="" type="text" style="width:248px" class="Estilo64" onKeyPress="return solo_numeros(event)"/></td>
		</tr>
		
		<tr>
		<td height="15"><div align="right"><span class="Estilo78">Unidad Solicitante:</span></div></td>
          <td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;
		 <input name="unidsoli" value="" type="text" style="width:248px" class="Estilo64" onKeyPress="return numeros_letras(event)"/></td>
		</tr>
	</table>
<?
}
															//FONDO ROTATORIO APERTURA
$subtramites = $_POST['rotato'];
if($subtramites=="Fondo Rotatorio Apertura Caja Chica" || $subtramites=="Fondo Rotatorio Apertura Fondo Mantenimiento" || $subtramites=="Otro Fondo Rotatorio")
{
if($subtramites=="Otro Fondo Rotatorio")
{
?>
		<table align="right">
		<tr>
		<td height="15"><div align="right"><span class="Estilo78">Describa el Fondo Rotatorio:</span></div></td>
          <td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;
		 <input name="nomfonrota" value="" type="text" style="width:248px" class="Estilo64" onKeyPress="return numeros_letras(event)"/></td>
		</tr>
<?
}			
?>		
		<table align="right">
		<tr>
		<td height="15"><div align="right"><span class="Estilo78">Responsable del Fondo:</span></div></td>
          <td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;
		 <input name="respfonrota" value="" type="text" style="width:248px" class="Estilo64" onKeyPress="return numeros_letras(event)"/></td>
		</tr>

		<table align="right">
		<tr>
		<td height="15"><div align="right"><span class="Estilo78">Objetivo Fondo:</span></div></td>
          <td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;
		 <input name="objfonrota" value="" type="text" style="width:248px" class="Estilo64" onKeyPress="return numeros_letras(event)"/></td>
		</tr>

		<table align="right">
		<tr>
		<td height="15"><div align="right"><span class="Estilo78">Monto Fondo:</span></div></td>
          <td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;
		 <input name="montofonrota" value="" type="text" style="width:248px" class="Estilo64" onKeyPress="return solo_numeros(event)"/></td>
		</tr>
<?
}//HASTA AQUI FONDOS ROTATORIOS			
?>
<?
															//DESDE AQUI DESCARGOS
$subtramites2 = $_POST['descar'];
if($subtramites2=="Descargo de Fondo en Avance")
{
?>
		<table align="right">
			<tr>
				<td height="15"><div align="right"><span class="Estilo78">Responsable del Fondo:</span></div></td>
          		<td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;
		 			<input name="desresponfon" value="" type="text" style="width:248px" class="Estilo64" onKeyPress="return numeros_letras(event)"/></td>
				</tr>
	
		
			<tr>
				<td height="15"><div align="right"><span class="Estilo78">Actividad:</span></div></td>
          		<td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;
		 			<input name="descaractiviti" value="" type="text" style="width:248px" class="Estilo64" onKeyPress="return numeros_letras(event)"/></td>
			</tr>
		
			<tr>
				<td height="15"><div align="right"><span class="Estilo78">Unidad Solicitante:</span></div></td>
          		<td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;
		 			<input name="desunisol" value="" type="text" style="width:248px" class="Estilo64" onKeyPress="return numeros_letras(event)"/></td>
			</tr>
			
			<tr>
				<td height="15"><div align="right"><span class="Estilo78">Monto Fondo:</span></div></td>
          		<td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;
		 			<input name="desmontofon" value="" type="text" style="width:248px" class="Estilo64" onKeyPress="return solo_numeros(event)"/></td>
			</tr>
           
            <table align="center">
				<tr align="center">
        			<table align="center">
                    	<tr>
                        	<td height="15" class="Estilo78"><input type="radio" name="boleta" id="boleta" onclick="toggleLayer(this.value)"; value="si">Con Boleta</td>
							<td height="15" class="Estilo78"><input type="radio" name="boleta" id="boleta" onclick="toggleLayer(this.value)"; value="no">Sin Boleta</td>
                        </tr>
                    </table>                  
				</tr> 
			</table           
        ></table> 
				
<?
}
if($subtramites2=="Descargo Fondos Rotatorios")
{?>
		<table align="right">
		<tr align="right">
					<td height="15" class="Estilo78"><div align="right"><span class="Estilo78">Descargo Rotatorio Especifico:</span><span class="Estilo74"></span></div></td>
					<td bgcolor="#CCDDEE" class="Estilo64">&nbsp;<span class="Estilo59">
<?
$result=mysql_query("select * from division where id_tramite=96 order by subtramites ASC",$link);
if ($row = mysql_fetch_array($result))
{ 
echo '<select  name="descargorota" id="descargorota" style="width:248px" class="Estilo64" onchange="obs4(this.value)">';
echo '<option selected></option>';
	do { 
	
		$long=strlen($row["subtramites"]);
   	    echo '<option value= "'.$row["subtramites"].'">'.$row["subtramites"].'</option>';
		}
		while ($row = mysql_fetch_array($result));
		
	echo '</select>';
}
}
//descargo viajes
if($subtramites2=="Descargo Viajes")
{
?>
		<table align="right">
		<tr>
		<td height="15"><div align="right"><span class="Estilo78">Responsable:</span></div></td>
          <td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;
		 <input name="desresponfon2" value="" type="text" style="width:248px" class="Estilo64" onKeyPress="return numeros_letras_especiales(event)"/></td>
		</tr>

		
		<tr>
		<td height="15"><div align="right"><span class="Estilo78">Actividad:</span></div></td>
          <td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;
		 <input name="desviaactiviti2" value="" type="text" style="width:248px" class="Estilo64" onKeyPress="return numeros_letras(event)"/></td>
		</tr>
	
    	<tr>
		<td height="15"><div align="right"><span class="Estilo78">Unidad Solicitante:</span></div></td>
          <td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;
		 <input name="desunisol2" value="" type="text" style="width:248px" class="Estilo64" onKeyPress="return numeros_letras(event)"/></td>
		</tr>
		</table>
    	<table align="center">
			<tr align="center">
        			<table align="center">
                    	<tr>
                        	<td height="15" class="Estilo78"><input type="radio" name="boleta5" id="boleta5" onclick="toggleLayer(this.value)"; value="si">Con Boleta</td>
							<td height="15" class="Estilo78"><input type="radio" name="boleta5" id="boleta5" onclick="toggleLayer(this.value)"; value="no">Sin Boleta</td>
                        </tr>
                    </table>                  
			</tr> 
		</table>			
<?
}
if($subtramites2=="Otros Descargos Cierre de Cargos")
{
?>
		<table align="right">
			<tr>
				<td height="15"><div align="right"><span class="Estilo78">Describa el Descargo Especifico:</span></div></td>
          		<td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;
		 			<input name="nomdesotro2" value="" type="text" style="width:248px" class="Estilo64" onKeyPress="return numeros_letras(event)"/></td>
			</tr>      
			
			<tr>
				<td height="15"><div align="right"><span class="Estilo78">Responsable del Fondo:</span></div></td>
          		<td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;
		 			<input name="desresponfon23" value="" type="text" style="width:248px" class="Estilo64" onKeyPress="return numeros_letras(event)"/></td>
			</tr>
       
			<tr>
				<td height="15"><div align="right"><span class="Estilo78">Actividad:</span></div></td>
          		<td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;
		 			<input name="desviaactiviti3" value="" type="text" style="width:248px" class="Estilo64" onKeyPress="return numeros_letras(event)"/></td>
			</tr>
				
			<tr>
				<td height="15"><div align="right"><span class="Estilo78">Unidad Solicitante:</span></div></td>
          		<td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;
		 			<input name="desunisol23" value="" type="text" style="width:248px" class="Estilo64" onKeyPress="return numeros_letras(event)"/></td>
			</tr>
        </table> 

		<table align="center">
		<tr align="center">
        			<table align="center">
                    	<tr>
                        	<td height="15" class="Estilo78"><input type="radio" name="boleta56" id="boleta56" onclick="toggleLayer(this.value)"; value="si">Con Boleta</td>
							<td height="15" class="Estilo78"><input type="radio" name="boleta56" id="boleta56" onclick="toggleLayer(this.value)"; value="no">Sin Boleta</td>
                        </tr>
                    </table>                  
		</tr> 
		</table>
				
<?
}
//para viaticos y pasajes
$subtramites3 = $_POST['pagoza'];
if($subtramites3=="Viaticos" || $subtramites3=="Pasajes" || $subtramites3=="Viaticos y Pasajes")
{
		if($subtramites3=="Viaticos")
		{
?>
		<table align="right">
		<tr>
		<td height="15"><div align="right"><span class="Estilo78">Beneficiaro(s):</span></div></td>
          <td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;
		 <input name="nombreviapasaj" value="" type="text" style="width:248px" class="Estilo64" onKeyPress="return numeros_letras_especiales(event)"/></td>
		</tr>
		</table>
		<table align="right">
		<tr>
		<td height="15"><div align="right"><span class="Estilo78">Lugar del Viaje:</span></div></td>
          <td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;
		 <input name="lugarviapasaj" value="" type="text" style="width:248px" class="Estilo64" onKeyPress="return numeros_letras(event)"/></td>
		</tr>
		</table>
		<table align="right">
		<tr>
		<td height="15"><div align="right"><span class="Estilo78">Duracion del Viaje:</span></div></td>
          <td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;
		 <input name="duraviapasaj" value="" type="text" style="width:248px" class="Estilo64" onKeyPress="return numeros_letras_especiales(event)"/></td>
		</tr>
		</table>
		<table align="right">
		<tr>
		<td height="15"><div align="right"><span class="Estilo78">Motivo del Viaje:</span></div></td>
          <td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;
		 <input name="objviapasaj" value="" type="text" style="width:248px" class="Estilo64" onKeyPress="return numeros_letras(event)"/></td>
		</tr>
		</table>
		<table align="right">
		<tr>
		<td height="15"><div align="right"><span class="Estilo78">Unidad Solicitante:</span></div></td>
          <td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;
		 <input name="unisolviapasaj" value="" type="text" style="width:248px" class="Estilo64" onKeyPress="return numeros_letras(event)"/></td>
		</tr>
		</table>
<?
		}//cierre viaticos
		if($subtramites3=="Pasajes")
		{
?>
		<table align="right">
		<tr>
		<td height="15"><div align="right"><span class="Estilo78">Pasaje a favor (Nombre/Empresa):</span></div></td>
          <td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;
		 <input name="pasajnomemp" value="" type="text" style="width:248px" class="Estilo64" onKeyPress="return numeros_letras_especiales(event)"/></td>
		</tr>
		</table>
		<table align="right">
		<tr>
		<td height="15"><div align="right"><span class="Estilo78">Monto del Pasaje:</span></div></td>
          <td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;
		 <input name="monpasaj" value="" type="text" style="width:248px" class="Estilo64" onKeyPress="return solo_numeros(event)"/></td>
		</tr>
		</table>
		<table align="right">
		<tr>
		<td height="15"><div align="right"><span class="Estilo78">Unidad Solicitante:</span></div></td>
          <td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;
		 <input name="unisolviapasaj" value="" type="text" style="width:248px" class="Estilo64" onKeyPress="return numeros_letras(event)"/></td>
		</tr>
        
        <table align="center">
				<tr align="center">
        			<table align="center">
                    	<tr>
                        	<td height="15" class="Estilo78"><input type="radio" name="confondo" id="confondo" onclick="toggleLayer(this.value)"; value="con">Fondo de Avance Adjunto</td>
							<td height="15" class="Estilo78"><input type="radio" name="confondo" id="confondo" onclick="toggleLayer(this.value)"; value="sin">Sin Fondo de Avance</td>
                        </tr>
                    </table>                  
				</tr> 
		</table
		
<?
		}//CIERRE DE PASAJES
		if($subtramites3=="Viaticos y Pasajes")
		{
?>		
		<table align="right">
		<tr>
		<td height="15"><div align="right"><span class="Estilo78">Beneficiaro(s):</span></div></td>
          <td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;
		 <input name="nombreviapasaj" value="" type="text" style="width:248px" class="Estilo64" onKeyPress="return numeros_letras_especiales(event)"/></td>
		</tr>
		
		<tr>
		<td height="15"><div align="right"><span class="Estilo78">Lugar del Viaje:</span></div></td>
          	<td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;
		 	<input name="lugarviapasaj" value="" type="text" style="width:248px" class="Estilo64" onKeyPress="return numeros_letras(event)"/></td>
		</tr>
		
		<tr>
		<td height="15"><div align="right"><span class="Estilo78">Duracion del Viaje:</span></div></td>
          <td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;
		 <input name="duraviapasaj" value="" type="text" style="width:248px" class="Estilo64" onKeyPress="return numeros_letras(event)"/></td>
		</tr>
		
		<tr>
		<td height="15"><div align="right"><span class="Estilo78">Motivo del Viaje:</span></div></td>
          <td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;
		 <input name="objviapasaj" value="" type="text" style="width:248px" class="Estilo64" onKeyPress="return numeros_letras(event)"/></td>
		</tr>
		
		<!--pasajes-->
		
		<tr>
		<td height="15"><div align="right"><span class="Estilo78">Pasaje a favor (Nombre/Empresa):</span></div></td>
          <td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;
		 <input name="pasajnomemp" value="" type="text" style="width:248px" class="Estilo64" onKeyPress="return numeros_letras(event)"/></td>
		</tr>
		
		<tr>
		<td height="15"><div align="right"><span class="Estilo78">Monto del Pasaje:</span></div></td>
          <td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;
		 <input name="monpasaj" value="" type="text" style="width:248px" class="Estilo64" onKeyPress="return solo_numeros(event)"/></td>
		</tr>
		
		<tr>
		<td height="15"><div align="right"><span class="Estilo78">Unidad Solicitante:</span></div></td>
          <td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;
		 <input name="unisolviapasaj" value="" type="text" style="width:248px" class="Estilo64" onKeyPress="return numeros_letras(event)"/></td>
		</tr>
        </table>
		<table align="center">
				<tr align="center">
        			<table align="center">
                    	<tr>
                        	<td height="15" class="Estilo78"><input type="radio" name="confondo" id="confondo" onclick="toggleLayer(this.value)"; value="con">Fondo de Avance Adjunto</td>
							<td height="15" class="Estilo78"><input type="radio" name="confondo" id="confondo" onclick="toggleLayer(this.value)"; value="sin">Sin Fondo de Avance</td>
                        </tr>
                    </table>                  
				</tr> 
		</table>
<?
		}//CIERRE DE VIATICOS Y PASAJES
		//este campo es general pa los 3 tipo
}//CIERRE VIATICOS Y PASAJES TRAMITE
//MODIFICACION PRESUPUESTARIA
$subtramites4 = $_POST['pagoza'];
if($subtramites4=="Incremento Presupuestario" || $subtramites4=="Traspaso Presupuestario")
{
?>
		<table align="right">
			
		<tr>
		<td height="15"><div align="right"><span class="Estilo78">Proyecto/Actividad:</span></div></td>
          <td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;
		 <input name="proyecactivitiinctras" value="" type="text" style="width:248px" class="Estilo64" onKeyPress="return numeros_letras(event)"/></td>
		</tr>
		
		<tr>
		<td height="15"><div align="right"><span class="Estilo78">Monto:</span></div></td>
          <td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;
		 <input name="montoinctras" value="" type="text" style="width:248px" class="Estilo64" onKeyPress="return solo_numeros(event)"/></td>
		</tr>
		</table>
<?
}//CIERRE MODIFICACION PRESUPUESTARIA
//CONTRATOS PERSONAL
$subtramites5 = $_POST['pagoza'];
if($subtramites5=="Consultor(a)" || $subtramites5=="Eventual" || $subtramites5=="Docente" || $subtramites5=="Otros Contratos Personales" || $subtramites5=="Becas Trabajo")
{
	if($subtramites5=="Otros Contratos Personales")
	{
?>
		<table align="right">
		<tr>
		<td height="15"><div align="right"><span class="Estilo78">Denominacion del Contrato:</span></div></td>
          <td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;
		 <input name="otrocont" value="" type="text" style="width:248px" class="Estilo64" onKeyPress="return numeros_letras_especiales(event)"/></td>
		</tr>
		</table>
<?		
	}
	
?>
		<table align="right">
		<tr>
		<td height="15"><div align="right"><span class="Estilo78">Nombre Beneficiario(s):</span></div></td>
          <td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;
		 <input name="nombrepersonales" value="" type="text" style="width:248px" class="Estilo64" onKeyPress="return numeros_letras_especiales(event)"/></td>
		</tr>

		<tr>
		<td height="15"><div align="right"><span class="Estilo78">Fecha Inicio Contrato:</span></div></td>
         <td width="260" bgcolor="#CCDDEE"><span class="Estilo64"> &nbsp;
		 <input name="calendario2" type="text" id="calendario2" title="DD/MM/YYYY" onclick="scwShow(this,this);" />
		 <input name="B3" type="button" class="cal" onclick="scwShow(scwID('calendario2'),this);" value="Calendario" />
		 </td>
		 </tr>
		
		<tr>
		<td height="15"><div align="right"><span class="Estilo78">Fecha Final Contrato:</span></div></td>
         <td width="260" bgcolor="#CCDDEE"><span class="Estilo64"> &nbsp;
		 <input name="calendario1" type="text" id="calendario1" title="DD/MM/YYYY" onclick="scwShow(this,this);" />
		 <input name="B31" type="button" class="cal" onclick="scwShow(scwID('calendario1'),this);" value="Calendario" />
		 </td>
		 </tr>
		
		<tr>
		<td height="15"><div align="right"><span class="Estilo78">Monto:</span></div></td>
          <td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;
		 <input name="montocon" value="" type="text" style="width:248px" class="Estilo64" onKeyPress="return solo_numeros(event)"/></td>
		</tr>
		
		<tr>
		<td height="15"><div align="right"><span class="Estilo78">Referencia del Contrato:</span></div></td>
          <td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;
		 <input name="refcontra" value="" type="text" style="width:248px" class="Estilo64" onKeyPress="return numeros_letras_especiales(event)"/></td>
		</tr>
		
	</table>
<?
}
//circular
$circuval = $_POST['circu'];
if($circuval=="Instructivo")
{
?>
		<table align="right">
		<tr align="right">
					<td height="15" class="Estilo78"><div align="right"><span class="Estilo78">Elija un Tipo de Resolucion:</span><span class="Estilo74"></span></div></td>
					<td bgcolor="#CCDDEE" class="Estilo64">&nbsp;<span class="Estilo59">
<?

		$result=mysql_query("select * from division where id_tramite=8 order by subtramites ASC",$link);
		if ($row = mysql_fetch_array($result))
		{ 
		echo '<select  name="circul" id="circul" style="width:248px" class="Estilo64" onchange="obs5(this.value)">';
		echo '<option selected></option>';
			do { 
			
				$long=strlen($row["subtramites"]);
				echo '<option value= "'.$row["subtramites"].'">'.$row["subtramites"].'</option>';
				}
				while ($row = mysql_fetch_array($result));
				
			echo '</select>';
		}	

}
elseif($circuval=="Conocimiento")
{
?>
		<table align="right">
		<tr align="right">
					<td height="15" class="Estilo78"><div align="right"><span class="Estilo78">Elija un Tipo de Resolucion:</span><span class="Estilo74"></span></div></td>
					<td bgcolor="#CCDDEE" class="Estilo64">&nbsp;<span class="Estilo59">
<?

		$result=mysql_query("select * from division where id_tramite=8 order by subtramites ASC",$link);
		if ($row = mysql_fetch_array($result))
		{ 
		echo '<select  name="circul" id="circul" style="width:248px" class="Estilo64" onchange="obs5(this.value)">';
		echo '<option selected></option>';
			do { 
			
				$long=strlen($row["subtramites"]);
				echo '<option value= "'.$row["subtramites"].'">'.$row["subtramites"].'</option>';
				}
				while ($row = mysql_fetch_array($result));
				
			echo '</select>';
		}	

}
//circular	
//DESDE AQUI DESIGNACIONES
$desig = $_POST['descar'];
if($desig=="Designacion Auxiliar de Docencia" || $desig=="Designacion de Tribunal" || $desig=="Designacion Docente")
{
	if($desig=="Designacion Auxiliar de Docencia")
	{
?>
	<table align="right">
		<tr>
		<td height="15"><div align="right"><span class="Estilo78">Nombre Auxiliar:</span></div></td>
          <td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;
		 <input name="nomaux" value="" type="text" style="width:248px" class="Estilo64" onKeyPress="return numeros_letras_especiales(event)"/></td>
		</tr>

		<tr>
		<td height="15"><div align="right"><span class="Estilo78">Carrera:</span></div></td>
          <td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;
		 <input name="auxcarr" value="" type="text" style="width:248px" class="Estilo64" onKeyPress="return solo_letras(event)"/></td>
		</tr>
		
		<tr>
		<td height="15"><div align="right"><span class="Estilo78">Fecha inicio:</span></div></td>
         <td width="260" bgcolor="#CCDDEE"><span class="Estilo64"> &nbsp;
		 <input name="calendario4" type="text" id="calendario4" title="DD/MM/YYYY" onclick="scwShow(this,this);" />
		 <input name="B31" type="button" class="cal" onclick="scwShow(scwID('calendario4'),this);" value="Calendario" />
		 </td>
		 </tr>
		
		<tr>
		<td height="15"><div align="right"><span class="Estilo78">Fecha Final:</span></div></td>
         <td width="260" bgcolor="#CCDDEE"><span class="Estilo64"> &nbsp;
		 <input name="calendario5" type="text" id="calendario5" title="DD/MM/YYYY" onclick="scwShow(this,this);" />
		 <input name="B31" type="button" class="cal" onclick="scwShow(scwID('calendario5'),this);" value="Calendario" />
		 </td>
		 </tr>
						
	</table>
<?
	}
	if($desig=="Designacion de Tribunal")
	{
?>
		<table align="right">
		<tr align="right">
					<td height="15" class="Estilo78"><div align="right"><span class="Estilo78">Elija tipo de designacion:</span><span class="Estilo74"></span></div></td>
					<td bgcolor="#CCDDEE" class="Estilo64">&nbsp;<span class="Estilo59">
<?

		$result=mysql_query("select * from division where id_tramite=76 order by subtramites ASC",$link);
		if ($row = mysql_fetch_array($result))
		{ 
		echo '<select  name="desigtri" id="desigtri" style="width:248px" class="Estilo64" onchange="obs4(this.value)">';
		echo '<option selected></option>';
			do { 
			
				$long=strlen($row["subtramites"]);
				echo '<option value= "'.$row["subtramites"].'">'.$row["subtramites"].'</option>';
				}
				while ($row = mysql_fetch_array($result));
				
			echo '</select>';
		}	

	}
	if($desig=="Designacion Docente")
	{
?>
		<table align="right">
		<tr align="right">
					<td height="15" class="Estilo78"><div align="right"><span class="Estilo78">Elija tipo de designacion:</span><span class="Estilo74"></span></div></td>
					<td bgcolor="#CCDDEE" class="Estilo64">&nbsp;<span class="Estilo59">
<?

		$result=mysql_query("select * from division where id_tramite=81 order by subtramites ASC",$link);
		if ($row = mysql_fetch_array($result))
		{ 
		echo '<select  name="desigdoc" id="desigdoc" style="width:248px" class="Estilo64" onchange="obs4(this.value)">';
		echo '<option selected></option>';
			do { 
			
				$long=strlen($row["subtramites"]);
				echo '<option value= "'.$row["subtramites"].'">'.$row["subtramites"].'</option>';
				}
				while ($row = mysql_fetch_array($result));
				
			echo '</select>';
		}	

	}

}//HASTA AQUI DESIGNACIONES
//CITACION
$citasao = $_POST['pagoza'];
if($citasao=="Citacion HCU" || $citasao=="Citacion CAF" || $citasao=="Citacion CAU" || $citasao=="Citacion Comision Infraestructura" || $citasao=="Citacion Plan Director" || $citasao=="Citacion Bienestar Social" || $citasao=="Citacion Procesos" || $citasao=="Otras Citaciones")
{
if($citasao=="Otras Citaciones")
	{
?>
		<table align="right">
		<tr>
		<td height="15"><div align="right"><span class="Estilo78">Nombre de la Citacion:</span></div></td>
          <td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;
		 <input name="otroconcitacion" value="" type="text" style="width:248px" class="Estilo64" onKeyPress="return numeros_letras_especiales(event)"/></td>
		</tr>
		</table>
<?		
	}
	
?>	
	<table align="right">
		<tr>
		<td height="15"><div align="right"><span class="Estilo78">Referencia:</span></div></td>
          <td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;
		 <input name="refcitasao" value="" type="text" style="width:248px" class="Estilo64" onKeyPress="return numeros_letras(event)"/></td>
		</tr>
		
		<tr>
		<td height="15"><div align="right"><span class="Estilo78">Fecha Citacion:</span></div></td>
         <td width="260" bgcolor="#CCDDEE"><span class="Estilo64"> &nbsp;
		 <input name="calendario6" type="text" id="calendario6" title="DD/MM/YYYY" onclick="scwShow(this,this);" />
		 <input name="B3" type="button" class="cal" onclick="scwShow(scwID('calendario6'),this);" value="Calendario" />
		 </td>
		 </tr>
		
		<tr>
		<td height="15"><div align="right"><span class="Estilo78">Observaciones:</span></div></td>
          <td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;
		 <input name="obscitacion" value="" type="text" style="width:248px" class="Estilo64" onKeyPress="return numeros_letras_especiales(event)"/></td>
		</tr>
	</table>
<?
}//FIN CITACIONES
//INFORME JURIDICO
$infoju = $_POST['pagoza'];
if($infoju=="Contratos" || $infoju=="Informes Tecnicos" || $infoju=="Contratos Modificatorios" || $infoju=="Otros Informes Juridicos")
{
if($infoju=="Otros Informes Juridicos")
	{
?>
		<table align="right">
		<tr>
		<td height="15"><div align="right"><span class="Estilo78">Nombre del Informe Juridico:</span></div></td>
          <td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;
		 <input name="otronomju" value="" type="text" style="width:248px" class="Estilo64" onKeyPress="return numeros_letras_especiales(event)"/></td>
		</tr>
		</table>
<?		
	}
	
?>	
	<table align="right">
		<tr>
		<td height="15"><div align="right"><span class="Estilo78">Referencia:</span></div></td>
          <td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;
		 <input name="refinfoju" value="" type="text" style="width:248px" class="Estilo64" onKeyPress="return numeros_letras(event)"/></td>
		</tr>
		
		<tr>
		<td height="15"><div align="right"><span class="Estilo78">Observaciones:</span></div></td>
          <td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;
		 <input name="obsinfoju" value="" type="text" style="width:248px" class="Estilo64" onKeyPress="return numeros_letras_especiales(event)"/></td>
		</tr>
	</table>
<?
}//FIN INFORME JURIDICO
//RESOLUCIONES
$resolsol = $_POST['pagoza'];
if($resolsol=="Resolucion HCU" || $resolsol=="Resolucion HCF" || $resolsol=="Resolucion HCC" || $resolsol=="Otras Resoluciones")
{
if($resolsol=="Otras Resoluciones")
	{
?>
		<table align="right">
		<tr>
		<td height="15"><div align="right"><span class="Estilo78">Nombre de la Resolucion</span></div></td>
          <td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;
		 <input name="nomresol" value="" type="text" style="width:248px" class="Estilo64" onKeyPress="return numeros_letras_especiales(event)"/></td>
		</tr>
		</table>
<?		
	}
	
?>	
	<table align="right">
		<tr>
		<td height="15"><div align="right"><span class="Estilo78">Referencia de la Resolucion:</span></div></td>
          <td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;
		 <input name="refresol" value="" type="text" style="width:248px" class="Estilo64" onKeyPress="return numeros_letras(event)"/></td>
		</tr>
		
		<tr>
		<td height="15"><div align="right"><span class="Estilo78">Fecha Emision Resolucion:</span></div></td>
         <td width="260" bgcolor="#CCDDEE"><span class="Estilo64"> &nbsp;
		 <input name="calendario7" type="text" id="calendario7" title="DD/MM/YYYY" onclick="scwShow(this,this);" />
		 <input name="B3" type="button" class="cal" onclick="scwShow(scwID('calendario7'),this);" value="Calendario" />
		 </td>
		 </tr>
		 
		 <tr>
		<td height="15"><div align="right"><span class="Estilo78">Observaciones:</span></div></td>
          <td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;
		 <input name="obsresol" value="" type="text" style="width:248px" class="Estilo64" onKeyPress="return numeros_letras_especiales(event)"/></td>
		</tr>
	</table>
<?
}//FIN RESOLUCIONES
//ACREDITACIONES
$acredita = $_POST['pagoza'];
if($acredita=="Acreditacion Asociacion de Docentes Facultativo" || $acredita=="Acreditacion Centro de Estudiantes Facultativo" || $acredita=="Acreditacion Decano-Vicedecano" || $acredita=="Acreditacion Director de Carrera Informatica" || $acredita=="Acreditacion Director de Carrera Estadistica" || $acredita=="Acreditacion Director de Carrera Matematica" || $acredita=="Acreditacion Director de Carrera Ciencias Quimicas" || $acredita=="Acreditacion Director de Carrera Fisica" || $acredita=="Acreditacion Director de Carrera Biologia" || $acredita=="Acreditacion Centro de Estudiantes Informatica" || $acredita=="Acreditacion Centro de Estudiantes Estadistica" || $acredita=="Acreditacion Centro de Estudiantes Matematica" || $acredita=="Acreditacion Centro de Estudiantes Ciencias Quimicas" || $acredita=="Acreditacion Centro de Estudiantes Fisica" || $acredita=="Acreditacion Centro de Estudiantes Biologia" || $acredita=="Acreditacion Asociacion de Docentes Carrera Informatica" || $acredita=="Acreditacion Asociacion de Docentes Carrera Estadistica" || $acredita=="Acreditacion Asociacion de Docentes Carrera Matematica" || $acredita=="Acreditacion Asociacion de Docentes Carrera Ciencias Quimicas" || $acredita=="Acreditacion Asociacion de Docentes Carrera Fisica" || $acredita=="Acreditacion Asociacion de Docentes Carrera Biologia" || $acredita=="Otras Acreditaciones")
{
if($citasao=="Otras Acreditaciones")
	{
?>
		<table align="right">
		<tr>
		<td height="15"><div align="right"><span class="Estilo78">Nombre de la Acreditacion:</span></div></td>
          <td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;
		 <input name="otronomacredi" value="" type="text" style="width:248px" class="Estilo64" onKeyPress="return numeros_letras_especiales(event)"/></td>
		</tr>
		</table>
<?		
	}
	
?>	
	<table align="right">
		<tr>
		<td height="15"><div align="right"><span class="Estilo78">Nombre del Frente Ganador:</span></div></td>
          <td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;
		 <input name="nomfrenacre" value="" type="text" style="width:248px" class="Estilo64" onKeyPress="return numeros_letras_especiales(event)"/></td>
		</tr>
		
		<tr>
		<td height="15"><div align="right"><span class="Estilo78">Datos Adicionales:</span></div></td>
          <td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;
		 <input name="datosadicionales" value="" type="text" style="width:248px" class="Estilo64" onKeyPress="return numeros_letras_especiales(event)"/></td>
		</tr>
	</table>
<?
}//FIN ACREDITACIONES
//LICENCIAS
$licencias = $_POST['pagoza'];
if($licencias=="Licencia Docente" || $licencias=="Licencia Administrativos" || $licencias=="Otras Licencias")
{
if($licencias=="Otras Licencias")
	{
?>
		<table align="right">
		<tr>
		<td height="15"><div align="right"><span class="Estilo78">Nombre de la Licencia:</span></div></td>
          <td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;
		 <input name="nomlicencia" value="" type="text" style="width:248px" class="Estilo64" onKeyPress="return numeros_letras_especiales(event)"/></td>
		</tr>
		</table>
<?		
	}
	
?>	
	<table align="right">
		<tr>
		<td height="15"><div align="right"><span class="Estilo78">Motivo de la Licencia:</span></div></td>
          <td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;
		 <input name="motivlicen" value="" type="text" style="width:248px" class="Estilo64" onKeyPress="return numeros_letras(event)"/></td>
		</tr>
		
		<tr>
		<td height="15"><div align="right"><span class="Estilo78">Nombre del Docente/Administrativo:</span></div></td>
          <td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;
		 <input name="nomdocadm" value="" type="text" style="width:248px" class="Estilo64" onKeyPress="return numeros_letras_especiales(event)"/></td>
		</tr>
		
		<tr>
		<td height="15"><div align="right"><span class="Estilo78">Fecha Inicio de la Licencia:</span></div></td>
         <td width="260" bgcolor="#CCDDEE"><span class="Estilo64"> &nbsp;
		 <input name="calendario3" type="text" id="calendario3" title="DD/MM/YYYY" onclick="scwShow(this,this);" />
		 <input name="B3" type="button" class="cal" onclick="scwShow(scwID('calendario3'),this);" value="Calendario" />
		 </td>
		 </tr>
		
		<tr>
		<td height="15"><div align="right"><span class="Estilo78">Fecha Conclusion de la Licencia:</span></div></td>
         <td width="260" bgcolor="#CCDDEE"><span class="Estilo64"> &nbsp;
		 <input name="calendario4" type="text" id="calendario4" title="DD/MM/YYYY" onclick="scwShow(this,this);" />
		 <input name="B31" type="button" class="cal" onclick="scwShow(scwID('calendario4'),this);" value="Calendario" />
		 </td>
		 </tr>
		 
		 <tr>
		<td height="15"><div align="right"><span class="Estilo78">Observaciones:</span></div></td>
          <td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;
		 <input name="obslicencias" value="" type="text" style="width:248px" class="Estilo64" onKeyPress="return numeros_letras_especiales(event)"/></td>
		</tr>
		 
	</table>
<?
}//FIN LICENCIAS
//NOMBRAMIENTOS
$nombramien = $_POST['pagoza'];
if($nombramien=="Nombramiento Director de Instituto" || $nombramien=="Nombramiento Director de Carrera Informatica" || $nombramien=="Nombramiento Director de Carrera Estadistica" || $nombramien=="Nombramiento Director de Carrera Matematica" || $nombramien=="Nombramiento Director de Carrera Fisica" || $nombramien=="Nombramiento Director de Carrera Ciencias Quimicas" || $nombramien=="Nombramiento Director de Carrera Biologia" || $nombramien=="Nombramiento Director Academico Informatica" || $nombramien=="Nombramiento Director Academico Estadistica" || $nombramien=="Nombramiento Director Academico Matematica" || $nombramien=="Nombramiento Director Academico Fisica" || $nombramien=="Nombramiento Director Academico Ciencias Quimicas" || $nombramien=="Nombramiento Director Academico Biologia" || $nombramien=="Nombramiento Coordinador Posgrado Informatica" || $nombramien=="Nombramiento Coordinador Posgrado Estadistica" || $nombramien=="Nombramiento Coordinador Posgrado Matematica" || $nombramien=="Nombramiento Coordinador Posgrado Fisica" || $nombramien=="Nombramiento Coordinador Posgrado Ciencias Quimicas" || $nombramien=="Nombramiento Coordinador Posgrado Biologia")
{
if($nombramien=="Nombramiento Director de Instituto")
	{
?>
		<table align="right">
		<tr>
		<td height="15"><div align="right"><span class="Estilo78">Nombre del Instituto:</span></div></td>
          <td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;
		 <input name="nominstitute" value="" type="text" style="width:248px" class="Estilo64" onKeyPress="return numeros_letras_especiales(event)"/></td>
		</tr>
		</table>
<?		
	}
	
?>	
	<table align="center">
		<tr align="center">
        			<table align="center">
                    	<tr>
                        	<td height="15" class="Estilo78"><input type="radio" name="docdesig" id="docdesig" onclick="toggleLayer(this.value)"; value="Titular">Titular</td>
							<td height="15" class="Estilo78"><input type="radio" name="docdesig" id="docdesig" onclick="toggleLayer(this.value)"; value="Interino">Interino</td>
                        </tr>
            		</table> 				
		</tr> 
	</table>
<?
}//FIN NOMBRAMIENTOS
//MEMORANDUM
$memo = $_POST['pagoza'];
if($memo=="Memorandum de Felicidacion" || $memo=="Memorandum de Llamada de Atencion" || $memo=="Otros Memorandums")
{
if($memo=="Otros Memorandums")
	{
?>
		<table align="right">
		<tr>
		<td height="15"><div align="right"><span class="Estilo78">Denominativo del Memorandum:</span></div></td>
          <td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;
		 <input name="nommemoran" value="" type="text" style="width:248px" class="Estilo64" onKeyPress="return numeros_letras_especiales(event)"/></td>
		</tr>
		</table>
<?		
	}
	
?>	
	<table align="right">
		<tr>
		<td height="15"><div align="right"><span class="Estilo78">Motivo del Memorandum:</span></div></td>
          <td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;
		 <input name="motimemo" value="" type="text" style="width:248px" class="Estilo64" onKeyPress="return numeros_letras(event)"/></td>
		</tr>
		
		<tr>
		<td height="15"><div align="right"><span class="Estilo78">Nombre de la Persona:</span></div></td>
          <td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;
		 <input name="nompersonmemo" value="" type="text" style="width:248px" class="Estilo64" onKeyPress="return numeros_letras_especiales(event)"/></td>
		</tr>
		
		<tr>
		<td height="15"><div align="right"><span class="Estilo78">Observaciones:</span></div></td>
          <td background="img/fondo_cuadrado.jpg" bgcolor="#CCDDEE"><span class="Estilo64">&nbsp;
		 <input name="obsmemoran" value="" type="text" style="width:248px" class="Estilo64" onKeyPress="return numeros_letras_especiales(event)"/></td>
		</tr>
		 
	</table>
<?
}//FIN MEMORANDUM