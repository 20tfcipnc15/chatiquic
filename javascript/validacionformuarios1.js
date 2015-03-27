function verifica1()
{  //VALIDADCION DE CAMPOS COMUNES
	//effffffff
	/*if(document.registrar.fTheFileField2.value.length < 1)
	{
	document.registrar.fTheFileField2.focus();
	finalizarIns();
	var mensaje='Debe Cargar el Documento Adjunto con extension Word, Excel o Pdf';
	div=document.getElementById('mensaje');
	div.innerHTML=div.innerHTML + mensaje;
    return 0;
	} 
	
	var docu = document.registrar.fTheFileField2.value;
	var partido = docu.split(".");
	for(var i = 0; i < partido.length; i++)
	{
	var extension = partido[i].toLowerCase(); 
	}
	
	if( extension != "pdf" && extension != "doc" && extension != "docx" && extension != "xls" && extension != "xlsx")
	{
	document.registrar.fTheFileField2.focus();
	finalizarIns();
	var mensaje='La extension del archivo debe ser "pdf, doc, xls, docx o xlsx"';
	div=document.getElementById('mensaje');
	div.innerHTML=div.innerHTML + mensaje;
	return 0;
	}*/
	
	//modificacion 25/03/2015
	var docu = document.registrar.fTheFileField2.value;
	var partido = docu.split(".");
	
	for(var i = 0; i < partido.length; i++)
	{
		var extension = partido[i].toLowerCase(); 
	}
	//compara la extension si es la indicada o vacia(en caso de mandar datos adjuntos)
	if( extension != "pdf" && extension != "doc" && extension != "docx" && extension != "xls" && extension != "xlsx" && extension != "")
	{
		document.registrar.fTheFileField2.focus();
		finalizarIns();
		var mensaje ='El archivo debe ser del tipo: Word, Excel o PDF';
		div=document.getElementById('mensaje');
		div.innerHTML=div.innerHTML + mensaje;
		return 0;
	}
	
	//PARA registro.php
	if(document.registrar.reg_ext.value.length < 2)
	{ //si el largo de marca es menor a 2 caracteres 
        document.registrar.reg_ext.focus(); //el puntero del mouse queda en marca 
		finalizarIns();
		var mensaje='Debe ingresar el Número de Registro Externo';
		div=document.getElementById('mensaje');
		div.innerHTML=div.innerHTML + mensaje;
        return 0; //devolvemos un cero para dejar de validar 
    } 
	 if((document.registrar.procedencia.value.length<2) && (document.registrar.otro.value.length<2))
	{   //si el largo de nombre es menor a 2 caracteres 
        document.registrar.procedencia.focus(); //el puntero del mouse queda en nombre 
		finalizarIns();
		var mensaje='Debe especificar la Procedencia del trámite';
		div=document.getElementById('mensaje');
		div.innerHTML=div.innerHTML + mensaje;
        return 0; //devolvemos un cero para dejar de validar 
    } 
	if(document.registrar.fojas.value.length < 1)
	{ //si el largo de precio es igual o menor a 0 caracteres 
        document.registrar.fojas.focus(); //el puntero del mouse queda en precio 
		finalizarIns();
		var mensaje='Debe ingresar el Número de Fojas';
		div=document.getElementById('mensaje');
		div.innerHTML=div.innerHTML + mensaje;
        return 0; //devolvemos un cero para dejar de validar 
    }
    if(document.registrar.destino.value.length < 2)
	{ //si el largo de precio es igual o menor a 0 caracteres 
        document.registrar.destino.focus(); //el puntero del mouse queda en precio 
		finalizarIns();
		var mensaje='Debe especificar el Destino';
		div=document.getElementById('mensaje');
		div.innerHTML=div.innerHTML + mensaje;
        return 0; //devolvemos un cero para dejar de validar 
    }
    if(document.registrar.estado.value.length < 1)
	{ //si el largo de precio es igual o menor a 0 caracteres 
        document.registrar.estado.focus(); //el puntero del mouse queda en precio 
		finalizarIns();
		var mensaje='Debe seleccionar el Estado del Trámite';
		div=document.getElementById('mensaje');
		div.innerHTML=div.innerHTML + mensaje;
        return 0; //devolvemos un cero para dejar de validar 
    }
	//DESDE AQUI VALIDAMOS LOS CAMPOS LLAMADOS CON AJAX SOLICITUD DE COMPRA
													if(document.registrar.tramix.value=="")
													{   //si el largo de nombre es menor a 2 caracteres 
														document.registrar.tramix.focus(); //el puntero del mouse queda en nombre 
														finalizarIns();
														var mensaje='Debe seleccionar un Tramite Especifico';
														div=document.getElementById('mensaje');
														div.innerHTML=div.innerHTML + mensaje;
														return 0; //devolvemos un cero para dejar de validar 
													}
													else
													{	
														//valor del combo seleccionado......esta en index que es el id de la tabla tramites
														var index=document.registrar.tramix.value;
														//para cuando sea solicitud de compra........id=36
														//solo if pa los tramites.....crecera jodido.....
														///////////////////////////////////////DESDE AQUI FINANCIEROS/////////////////////////////////////
														//COMPRAS
														if(index==36)
														{	
															if(!document.getElementsByName("sexi")[0].checked && !document.getElementsByName("sexi")[1].checked)
															{	
															finalizarIns();
															var mensaje='Debe especificar si el tramite es Compra de Bien o Pago de Servicio';
															div=document.getElementById('mensaje');
															div.innerHTML=div.innerHTML + mensaje;
															return 0; //devolvemos un cero para dejar de validar }
															}
															else
															{
																	if(!document.getElementsByName("sexi")[0].checked)
																	{	var servicom = !document.getElementsByName("sexi")[1].checked;
																		document.getElementById("bienen").value=servicom;
																		//comenzamos a validad campos para el serivicio
																		if(document.registrar.beneser.value=="")
																		{
																		document.registrar.beneser.focus(); //el puntero del mouse queda en nombre 
																		finalizarIns();
																		var mensaje='Debe llenar el Nombre del Proveedor';
																		div=document.getElementById('mensaje');
																		div.innerHTML=div.innerHTML + mensaje;
																		return 0; //devolvemos un cero para dejar de validar 
																		}
																		if(document.registrar.descser.value=="")
																		{
																		document.registrar.descser.focus(); //el puntero del mouse queda en nombre 
																		finalizarIns();
																		var mensaje='Debe llenar la Descripcion del Servicio';
																		div=document.getElementById('mensaje');
																		div.innerHTML=div.innerHTML + mensaje;
																		return 0; //devolvemos un cero para dejar de validar 
																		}
																		if(document.registrar.deser.value=="")
																		{
																		document.registrar.deser.focus(); //el puntero del mouse queda en nombre 
																		finalizarIns();
																		var mensaje='Debe especificar el Destino del Servicio';
																		div=document.getElementById('mensaje');
																		div.innerHTML=div.innerHTML + mensaje;
																		return 0; //devolvemos un cero para dejar de validar 
																		}
																		if(document.registrar.montoser.value=="")
																		{
																		document.registrar.montoser.focus(); //el puntero del mouse queda en nombre 
																		finalizarIns();
																		var mensaje='Debe especificar el Monto a Cancelar por el Servicio';
																		div=document.getElementById('mensaje');
																		div.innerHTML=div.innerHTML + mensaje;
																		return 0; //devolvemos un cero para dejar de validar 
																		}
																	}
																	else
																	{	
																		var bibien = !document.getElementsByName("sexi")[1].checked;
																		document.getElementById("servime").value=bibien;
																		//para los campos del bien
																		if(document.registrar.benebien.value=="")
																		{
																		document.registrar.benebien.focus(); //el puntero del mouse queda en nombre 
																		finalizarIns();
																		var mensaje='Debe llenar el Nombre del Descriptivo del Bien';
																		div=document.getElementById('mensaje');
																		div.innerHTML=div.innerHTML + mensaje;
																		return 0; //devolvemos un cero para dejar de validar 
																		}
																		if(document.registrar.descbien.value=="")
																		{
																		document.registrar.descbien.focus(); //el puntero del mouse queda en nombre 
																		finalizarIns();
																		var mensaje='Debe llenar la Descripcion del Bien';
																		div=document.getElementById('mensaje');
																		div.innerHTML=div.innerHTML + mensaje;
																		return 0; //devolvemos un cero para dejar de validar 
																		}
																		if(document.registrar.desbien.value=="")
																		{
																		document.registrar.desbien.focus(); //el puntero del mouse queda en nombre 
																		finalizarIns();
																		var mensaje='Debe especificar el Destino del Bien';
																		div=document.getElementById('mensaje');
																		div.innerHTML=div.innerHTML + mensaje;
																		return 0; //devolvemos un cero para dejar de validar 
																		}
																		if(document.registrar.monbien.value=="")
																		{
																		document.registrar.monbien.focus(); //el puntero del mouse queda en nombre 
																		finalizarIns();
																		var mensaje='Debe especificar el Monto a Cancelar por el Bien';
																		div=document.getElementById('mensaje');
																		div.innerHTML=div.innerHTML + mensaje;
																		return 0; //devolvemos un cero para dejar de validar 
																		}
																	}
															}
														}//fin compras...
														//para PAGOS
														if(index==65)
														{
																if(document.registrar.pago.value=="")
																	{   //si el largo de nombre es menor a 2 caracteres 
																		document.registrar.pago.focus();  
																		finalizarIns();
																		var mensaje='Debe Seleccionar un Pago Especifico';
																		div=document.getElementById('mensaje');
																		div.innerHTML=div.innerHTML + mensaje;
																		return 0; //devolvemos un cero para dejar de validar 
																	}
																
																var pag = document.registrar.pago.value;
																document.getElementById("pagosol").value=pag;
																
																if(pag=="Beca Trabajo")
																{
																	if(document.registrar.nombrebeca.value=="")
																	{
																		document.registrar.nombrebeca.focus(); //el puntero del mouse queda en nombre 
																		finalizarIns();
																		var mensaje='Debe especificar el Nombre del Becario';
																		div=document.getElementById('mensaje');
																		div.innerHTML=div.innerHTML + mensaje;
																		return 0; //devolvemos un cero para dejar de validar 
																	}
																}
																if(pag=="Beca Investigacion")
																{
																	if(document.registrar.nombrebecainv.value=="")
																	{
																		document.registrar.nombrebecainv.focus(); //el puntero del mouse queda en nombre 
																		finalizarIns();
																		var mensaje='Debe especificar el nombre del Becario de Investigacion';
																		div=document.getElementById('mensaje');
																		div.innerHTML=div.innerHTML + mensaje;
																		return 0; //devolvemos un cero para dejar de validar 
																	}
																}
																if(pag=="Consultor por Producto")
																{
																	if(document.registrar.nombreconprod.value=="")
																	{
																		document.registrar.nombreconprod.focus(); //el puntero del mouse queda en nombre 
																		finalizarIns();
																		var mensaje='Debe especificar el nombre del Consultor por Producto';
																		div=document.getElementById('mensaje');
																		div.innerHTML=div.innerHTML + mensaje;
																		return 0; //devolvemos un cero para dejar de validar 
																	}
																}
																if(pag=="Consultor en linea")
																{
																	if(document.registrar.nombreconlin.value=="")
																	{
																		document.registrar.nombreconlin.focus(); //el puntero del mouse queda en nombre 
																		finalizarIns();
																		var mensaje='Debe especificar el nombre del Consultor en Linea';
																		div=document.getElementById('mensaje');
																		div.innerHTML=div.innerHTML + mensaje;
																		return 0; //devolvemos un cero para dejar de validar 
																	}
																}
																if(pag=="Servicios Manuales")
																{
																	if(document.registrar.nombremanual.value=="")
																	{
																		document.registrar.nombremanual.focus(); //el puntero del mouse queda en nombre 
																		finalizarIns();
																		var mensaje='Debe especificar el nombre de la Persona Natural que presta el Servicio';
																		div=document.getElementById('mensaje');
																		div.innerHTML=div.innerHTML + mensaje;
																		return 0; //devolvemos un cero para dejar de validar 
																	}
																}
																if(pag=="Servicios no Personales")
																{
																	if(document.registrar.nombrepersonal.value=="")
																	{
																		document.registrar.nombrepersonal.focus(); //el puntero del mouse queda en nombre 
																		finalizarIns();
																		var mensaje='Debe especificar el nombre de la Persona Natural que presta el Servicio';
																		div=document.getElementById('mensaje');
																		div.innerHTML=div.innerHTML + mensaje;
																		return 0; //devolvemos un cero para dejar de validar 
																	}
																}
																if(pag=="Pago Grupal")
																{
																	if(document.registrar.nombrepersonales.value=="")
																	{
																		document.registrar.nombrepersonales.focus(); //el puntero del mouse queda en nombre 
																		finalizarIns();
																		var mensaje='Debe especificar el nombre de todas las Personas';
																		div=document.getElementById('mensaje');
																		div.innerHTML=div.innerHTML + mensaje;
																		return 0; //devolvemos un cero para dejar de validar 
																	}
																}
																if(document.registrar.mesperiodo.value=="")
																{
																		document.registrar.mesperiodo.focus(); //el puntero del mouse queda en nombre 
																		finalizarIns();
																		var mensaje='Debe especificar el mes o Periodo a Pagarse';
																		div=document.getElementById('mensaje');
																		div.innerHTML=div.innerHTML + mensaje;
																		return 0; //devolvemos un cero para dejar de validar 
																}
																if(document.registrar.montopago.value=="")
																{
																		document.registrar.montopago.focus(); //el puntero del mouse queda en nombre 
																		finalizarIns();
																		var mensaje='Debe especificar el monto que se va Pagar';
																		div=document.getElementById('mensaje');
																		div.innerHTML=div.innerHTML + mensaje;
																		return 0; //devolvemos un cero para dejar de validar 
																}
																if(document.registrar.unidsoli.value=="")
																{
																		document.registrar.unidsoli.focus(); //el puntero del mouse queda en nombre 
																		finalizarIns();
																		var mensaje='Debe especificar el Nombre de la Unidad Solicitante';
																		div=document.getElementById('mensaje');
																		div.innerHTML=div.innerHTML + mensaje;
																		return 0; //devolvemos un cero para dejar de validar 
																}
														}
														// PARA FONDOS EN AVANCE APERTURA
														if(index==90)
														{																									
																if(document.registrar.respfon.value=="")
																{
																		document.registrar.respfon.focus(); //el puntero del mouse queda en nombre 
																		finalizarIns();
																		var mensaje='Debe especificar el Nombre del Responsable del fondo en Avance';
																		div=document.getElementById('mensaje');
																		div.innerHTML=div.innerHTML + mensaje;
																		return 0; //devolvemos un cero para dejar de validar 
																}
																if(document.registrar.objfon.value=="")
																{
																		document.registrar.objfon.focus(); //el puntero del mouse queda en nombre 
																		finalizarIns();
																		var mensaje='Debe especificar el Objetivo de la Apertura del Fondo en Avance';
																		div=document.getElementById('mensaje');
																		div.innerHTML=div.innerHTML + mensaje;
																		return 0; //devolvemos un cero para dejar de validar 
																}
																if(document.registrar.unitsolfon.value=="")
																{
																		document.registrar.unitsolfon.focus(); //el puntero del mouse queda en nombre 
																		finalizarIns();
																		var mensaje='Debe especificar la Unidad Solicitante del Fondo en Avance';
																		div=document.getElementById('mensaje');
																		div.innerHTML=div.innerHTML + mensaje;
																		return 0; //devolvemos un cero para dejar de validar 
																}
																if(document.registrar.montofon.value=="")
																{
																		document.registrar.montofon.focus(); //el puntero del mouse queda en nombre 
																		finalizarIns();
																		var mensaje='Debe especificar el Monto que esta solicitando';
																		div=document.getElementById('mensaje');
																		div.innerHTML=div.innerHTML + mensaje;
																		return 0; //devolvemos un cero para dejar de validar 
																}
														}
														//PARA LOS FONDOS ROTATORIOS APERTURA
														if(index==91)
														{
																var pag = document.registrar.rotatorio.value;
																document.getElementById("fondorota").value=pag;
																
																if(pag=="Fondo Rotatorio Apertura Fondo Mantenimiento" || pag=="Fondo Rotatorio Apertura Caja Chica")
																{
																	if(document.registrar.respfonrota.value=="")
																	{
																		document.registrar.respfonrota.focus(); //el puntero del mouse queda en nombre 
																		finalizarIns();
																		var mensaje='Debe especificar el Nombre del Responsable del Fondo';
																		div=document.getElementById('mensaje');
																		div.innerHTML=div.innerHTML + mensaje;
																		return 0; //devolvemos un cero para dejar de validar 
																	}
																	if(document.registrar.objfonrota.value=="")
																	{
																		document.registrar.objfonrota.focus(); //el puntero del mouse queda en nombre 
																		finalizarIns();
																		var mensaje='Debe especificar el Objetivo Fondo Rotatorio';
																		div=document.getElementById('mensaje');
																		div.innerHTML=div.innerHTML + mensaje;
																		return 0; //devolvemos un cero para dejar de validar 
																	}
																	if(document.registrar.montofonrota.value=="")
																	{
																		document.registrar.montofonrota.focus(); //el puntero del mouse queda en nombre 
																		finalizarIns();
																		var mensaje='Debe especificar el Monto del Fondo Rotatorio';
																		div=document.getElementById('mensaje');
																		div.innerHTML=div.innerHTML + mensaje;
																		return 0; //devolvemos un cero para dejar de validar 
																	}
																}
																else
																{
																	if(document.registrar.nomfonrota.value=="")
																	{
																		document.registrar.nomfonrota.focus(); //el puntero del mouse queda en nombre 
																		finalizarIns();
																		var mensaje='Debe especificar el Nombre del Fondo Rotatorio';
																		div=document.getElementById('mensaje');
																		div.innerHTML=div.innerHTML + mensaje;
																		return 0; //devolvemos un cero para dejar de validar 
																	}
																	if(document.registrar.respfonrota.value=="")
																	{
																		document.registrar.respfonrota.focus(); //el puntero del mouse queda en nombre 
																		finalizarIns();
																		var mensaje='Debe especificar el Nombre del Responsable del Fondo';
																		div=document.getElementById('mensaje');
																		div.innerHTML=div.innerHTML + mensaje;
																		return 0; //devolvemos un cero para dejar de validar 
																	}
																	if(document.registrar.objfonrota.value=="")
																	{
																		document.registrar.objfonrota.focus(); //el puntero del mouse queda en nombre 
																		finalizarIns();
																		var mensaje='Debe especificar el Objetivo Fondo Rotatorio';
																		div=document.getElementById('mensaje');
																		div.innerHTML=div.innerHTML + mensaje;
																		return 0; //devolvemos un cero para dejar de validar 
																	}
																	if(document.registrar.montofonrota.value=="")
																	{
																		document.registrar.montofonrota.focus(); //el puntero del mouse queda en nombre 
																		finalizarIns();
																		var mensaje='Debe especificar el Monto del Fondo Rotatorio';
																		div=document.getElementById('mensaje');
																		div.innerHTML=div.innerHTML + mensaje;
																		return 0; //devolvemos un cero para dejar de validar 
																	}
																}
														}//hasta aqui fondo rotatorio apertura
														if(index==95)
														{
																if(document.registrar.descargo.value=="")
																	{   //si el largo de nombre es menor a 2 caracteres 
																		document.registrar.descargo.focus();  
																		finalizarIns();
																		var mensaje='Debe Seleccionar un Descargo Especifico del Tramite';
																		div=document.getElementById('mensaje');
																		div.innerHTML=div.innerHTML + mensaje;
																		return 0; //devolvemos un cero para dejar de validar 
																	}
																
																var pag = document.registrar.descargo.value;
																document.getElementById("descargo1").value=pag;
																
																if(pag=="Descargo de Fondo en Avance")
																{
																	if(document.registrar.desresponfon.value=="")
																	{
																		document.registrar.desresponfon.focus();
																		finalizarIns();
																		var mensaje='Debe especificar el Nombre del Responsable del Fondo';
																		div=document.getElementById('mensaje');
																		div.innerHTML=div.innerHTML + mensaje;
																		return 0; //devolvemos un cero para dejar de validar 
																	}
																	if(document.registrar.descaractiviti.value=="")
																	{
																		document.registrar.descaractiviti.focus();
																		finalizarIns();
																		var mensaje='Debe especificar la Actividad Correspondiente al Descargo';
																		div=document.getElementById('mensaje');
																		div.innerHTML=div.innerHTML + mensaje;
																		return 0; //devolvemos un cero para dejar de validar 
																	}
																	if(document.registrar.desunisol.value=="")
																	{
																		document.registrar.desunisol.focus();
																		finalizarIns();
																		var mensaje='Debe especificar la Unidad Solicitante';
																		div=document.getElementById('mensaje');
																		div.innerHTML=div.innerHTML + mensaje;
																		return 0; //devolvemos un cero para dejar de validar 
																	}
																	if(document.registrar.desmontofon.value=="")
																	{
																		document.registrar.desmontofon.focus();
																		finalizarIns();
																		var mensaje='Debe especificar el Monto del Descargo del Fondo';
																		div=document.getElementById('mensaje');
																		div.innerHTML=div.innerHTML + mensaje;
																		return 0; //devolvemos un cero para dejar de validar 
																	}
													if(!document.getElementsByName("boleta")[0].checked && !document.getElementsByName("boleta")[1].checked)
																	{	
																	finalizarIns();
																	var mensaje='Debe Especificar si el Descargo tiene Boleta';
																	div=document.getElementById('mensaje');
																	div.innerHTML=div.innerHTML + mensaje;
																	return 0; //devolvemos un cero para dejar de validar }
																	}
																	else
																	{
																		if(!document.getElementsByName("boleta")[1].checked)
																		{	//no esta chekeado el 1="no".....kiere decir que Cero esta chekeado,guardamos el dato
																			var descar2 = !document.getElementsByName("boleta")[0].checked;
																			document.getElementById("descargo2").value=descar2;
																																																										if(document.registrar.desnrobole.value=="")
																				{
																					document.registrar.desnrobole.focus(); //el puntero del mouse queda en nombre 
																					finalizarIns();
																					var mensaje='Debe especificar el Numero de la Boleta';
																					div=document.getElementById('mensaje');
																					div.innerHTML=div.innerHTML + mensaje;
																					return 0; //devolvemos un cero para dejar de validar 
																				}				
																		}
																		else
																		{
																			var descar2 = !document.getElementsByName("boleta")[1].checked;
																			document.getElementById("descargo2").value=descar2;
																			
																			
																		}
																	}
																}
																if(pag=="Descargo Fondos Rotatorios")
																{	//para validar al combo
																	if(document.registrar.descargorota.value=="")
																	{   //si el largo de nombre es menor a 2 caracteres 
																		document.registrar.descargorota.focus();  
																		finalizarIns();
																		var mensaje='Debe Seleccionar un Descargo Rotatorio Especifico';
																		div=document.getElementById('mensaje');
																		div.innerHTML=div.innerHTML + mensaje;
																		return 0; //devolvemos un cero para dejar de validar 
																	}
																	//sacar el valor del combo descargo fondo rotatorio
																	var varita = document.registrar.descargorota.value;
																	document.getElementById("descargo3").value=varita;
																	//para todos los tipos de descargos fondos rotatorios
																	if(varita=="Descargo Caja Chica")
																	{
																		if(!document.getElementsByName("descajachica")[0].checked && !document.getElementsByName("descajachica")[1].checked)
																		{	
																		finalizarIns();
																		var mensaje='Debe Especificar si el Descargo es de Cierre o Reposicion';
																		div=document.getElementById('mensaje');
																		div.innerHTML=div.innerHTML + mensaje;
																		return 0; //devolvemos un cero para dejar de validar }
																		}
																		else
																		{
																			if(!document.getElementsByName("descajachica")[1].checked)
																			{//no esta chekeado el 1="cierre".....kiere decir que reposicion esta chekeado,guardamos el dato
																			var cajachicarepo = !document.getElementsByName("descajachica")[0].checked;
																			document.getElementById("descargo4").value=cajachicarepo;
																																																												if(document.registrar.desrotacajades.value=="")
																					{
																						document.registrar.desrotacajades.focus(); //el puntero del mouse queda en nombre 
																						finalizarIns();
																						var mensaje='Debe especificar el Nombre del Responsable del Fondo';
																						div=document.getElementById('mensaje');
																						div.innerHTML=div.innerHTML + mensaje;
																						return 0; //devolvemos un cero para dejar de validar 
																					}
																					if(document.registrar.desrotacajauni.value=="")
																					{
																						document.registrar.desrotacajauni.focus(); //el puntero del mouse queda en nombre 
																						finalizarIns();
																						var mensaje='Debe especificar la Unidad Solicitante';
																						div=document.getElementById('mensaje');
																						div.innerHTML=div.innerHTML + mensaje;
																						return 0; //devolvemos un cero para dejar de validar 
																					}
																					if(document.registrar.desrotacajamonto.value=="")
																					{
																						document.registrar.desrotacajamonto.focus(); //el puntero del mouse queda en nombre 
																						finalizarIns();
																						var mensaje='Debe especificar el Monto del Fondo';
																						div=document.getElementById('mensaje');
																						div.innerHTML=div.innerHTML + mensaje;
																						return 0; //devolvemos un cero para dejar de validar 
																					}
																					
																					if(!document.getElementsByName("bolrotades")[0].checked && !document.getElementsByName("bolrotades")[1].checked)
																					{	
																					finalizarIns();
																					var mensaje='Debe Especificar si el Descargo de Caja Chica tiene Boleta';
																					div=document.getElementById('mensaje');
																					div.innerHTML=div.innerHTML + mensaje;
																					return 0; //devolvemos un cero para dejar de validar }
																					}
																					else
																					{
																					
																					if(!document.getElementsByName("bolrotades")[1].checked)
																						{	//no esta chekeado el 1="no".....kiere decir que Cero esta chekeado,guardamos el dato
																							var descar23 = !document.getElementsByName("bolrotades")[0].checked;
																							document.getElementById("descargo5").value=descar23;
																																																															if(document.registrar.desnrobole1.value=="")
																									{
																										document.registrar.desnrobole1.focus(); //el puntero del mouse queda en nombre 
																										finalizarIns();
																										var mensaje='Debe especificar el Numero de la Boleta';
																										div=document.getElementById('mensaje');
																										div.innerHTML=div.innerHTML + mensaje;
																										return 0; //devolvemos un cero para dejar de validar 
																									}				
																						}
																						else
																						{
																							var descar2 = !document.getElementsByName("bolrotades")[1].checked;
																							document.getElementById("descargo5").value=descar2;
																						}
																					
																					}
																			}
																			else
																			{	//quiere decir que esta marcado cierre
																				var cajachicierre = !document.getElementsByName("descajachica")[1].checked;
																				document.getElementById("descargo4").value=cajachicierre;
																				
																				if(document.registrar.desrotacajades1.value=="")
																					{
																						document.registrar.desrotacajades1.focus(); //el puntero del mouse queda en nombre 
																						finalizarIns();
																						var mensaje='Debe especificar el Nombre del Responsable del Fondo';
																						div=document.getElementById('mensaje');
																						div.innerHTML=div.innerHTML + mensaje;
																						return 0; //devolvemos un cero para dejar de validar 
																					}
																					if(document.registrar.desrotacajauni1.value=="")
																					{
																						document.registrar.desrotacajauni1.focus(); //el puntero del mouse queda en nombre 
																						finalizarIns();
																						var mensaje='Debe especificar la Unidad Solicitante';
																						div=document.getElementById('mensaje');
																						div.innerHTML=div.innerHTML + mensaje;
																						return 0; //devolvemos un cero para dejar de validar 
																					}
																					if(document.registrar.desrotacajamonto1.value=="")
																					{
																						document.registrar.desrotacajamonto1.focus(); //el puntero del mouse queda en nombre 
																						finalizarIns();
																						var mensaje='Debe especificar el Monto del Fondo';
																						div=document.getElementById('mensaje');
																						div.innerHTML=div.innerHTML + mensaje;
																						return 0; //devolvemos un cero para dejar de validar 
																					}
																					
																					if(!document.getElementsByName("bolrotades1")[0].checked && !document.getElementsByName("bolrotades1")[1].checked)
																					{	
																					finalizarIns();
																					var mensaje='Debe Especificar si el Descargo de Caja Chica tiene Boleta';
																					div=document.getElementById('mensaje');
																					div.innerHTML=div.innerHTML + mensaje;
																					return 0; //devolvemos un cero para dejar de validar }
																					}
																					else
																					{
																					
																					if(!document.getElementsByName("bolrotades1")[1].checked)
																						{	//no esta chekeado el 1="no".....kiere decir que Cero esta chekeado,guardamos el dato
																							var descar23 = !document.getElementsByName("bolrotades1")[0].checked;
																							document.getElementById("descargo5").value=descar23;
																																																															if(document.registrar.desnrobole1.value=="")
																									{
																										document.registrar.desnrobole1.focus(); //el puntero del mouse queda en nombre 
																										finalizarIns();
																										var mensaje='Debe especificar el Numero de la Boleta';
																										div=document.getElementById('mensaje');
																										div.innerHTML=div.innerHTML + mensaje;
																										return 0; //devolvemos un cero para dejar de validar 
																									}				
																						}
																						else
																						{
																							var descar2 = !document.getElementsByName("bolrotades1")[1].checked;
																							document.getElementById("descargo5").value=descar2;
																						}
																					
																					}
																				
																			}//cierre else
																		}//cierre else principal
																		
																	}//CIERRE CAJA CHICA
																	if(varita=="Descargo Fondo de Mantenimiento")
																	{
																		if(!document.getElementsByName("desfonman1")[0].checked && !document.getElementsByName("desfonman1")[1].checked)
																		{	
																		finalizarIns();
																		var mensaje='Debe Especificar si el Descargo es de Cierre o Reposicion';
																		div=document.getElementById('mensaje');
																		div.innerHTML=div.innerHTML + mensaje;
																		return 0; //devolvemos un cero para dejar de validar }
																		}
																		else
																		{
																			if(!document.getElementsByName("desfonman1")[1].checked)
																			{//no esta chekeado el 1="cierre".....kiere decir que reposicion esta chekeado,guardamos el dato
																			var manterepo = !document.getElementsByName("desfonman1")[0].checked;
																			document.getElementById("descargo4").value=manterepo;
																																																												if(document.registrar.desrotacajades.value=="")
																					{
																						document.registrar.desrotacajades.focus(); //el puntero del mouse queda en nombre 
																						finalizarIns();
																						var mensaje='Debe especificar el Nombre del Responsable del Fondo';
																						div=document.getElementById('mensaje');
																						div.innerHTML=div.innerHTML + mensaje;
																						return 0; //devolvemos un cero para dejar de validar 
																					}
																					if(document.registrar.desrotacajauni.value=="")
																					{
																						document.registrar.desrotacajauni.focus(); //el puntero del mouse queda en nombre 
																						finalizarIns();
																						var mensaje='Debe especificar la Unidad Solicitante';
																						div=document.getElementById('mensaje');
																						div.innerHTML=div.innerHTML + mensaje;
																						return 0; //devolvemos un cero para dejar de validar 
																					}
																					if(document.registrar.desrotacajamonto.value=="")
																					{
																						document.registrar.desrotacajamonto.focus(); //el puntero del mouse queda en nombre 
																						finalizarIns();
																						var mensaje='Debe especificar el Monto del Fondo';
																						div=document.getElementById('mensaje');
																						div.innerHTML=div.innerHTML + mensaje;
																						return 0; //devolvemos un cero para dejar de validar 
																					}
																					
																					if(!document.getElementsByName("bolrotades")[0].checked && !document.getElementsByName("bolrotades")[1].checked)
																					{	
																					finalizarIns();
																					var mensaje='Debe Especificar si el Descargo de Fondo de Mantenimiento tiene Boleta';
																					div=document.getElementById('mensaje');
																					div.innerHTML=div.innerHTML + mensaje;
																					return 0; //devolvemos un cero para dejar de validar }
																					}
																					else
																					{
																					
																					if(!document.getElementsByName("bolrotades")[1].checked)
																						{	//no esta chekeado el 1="no".....kiere decir que Cero esta chekeado,guardamos el dato
																							var descar237 = !document.getElementsByName("bolrotades")[0].checked;
																							document.getElementById("descargo5").value=descar237;
																																																															if(document.registrar.desnrobole1.value=="")
																									{
																										document.registrar.desnrobole1.focus(); //el puntero del mouse queda en nombre 
																										finalizarIns();
																										var mensaje='Debe especificar el Numero de la Boleta';
																										div=document.getElementById('mensaje');
																										div.innerHTML=div.innerHTML + mensaje;
																										return 0; //devolvemos un cero para dejar de validar 
																									}				
																						}
																						else
																						{
																							var descar2 = !document.getElementsByName("bolrotades")[1].checked;
																							document.getElementById("descargo5").value=descar2;
																						}
																					
																					}
																			}
																			else
																			{	//quiere decir que esta marcado cierre
																				var fondocierre = !document.getElementsByName("desfonman1")[1].checked;
																				document.getElementById("descargo4").value=fondocierre;
																				
																				if(document.registrar.desrotacajades1.value=="")
																					{
																						document.registrar.desrotacajades1.focus(); //el puntero del mouse queda en nombre 
																						finalizarIns();
																						var mensaje='Debe especificar el Nombre del Responsable del Fondo';
																						div=document.getElementById('mensaje');
																						div.innerHTML=div.innerHTML + mensaje;
																						return 0; //devolvemos un cero para dejar de validar 
																					}
																					if(document.registrar.desrotacajauni1.value=="")
																					{
																						document.registrar.desrotacajauni1.focus(); //el puntero del mouse queda en nombre 
																						finalizarIns();
																						var mensaje='Debe especificar la Unidad Solicitante';
																						div=document.getElementById('mensaje');
																						div.innerHTML=div.innerHTML + mensaje;
																						return 0; //devolvemos un cero para dejar de validar 
																					}
																					if(document.registrar.desrotacajamonto1.value=="")
																					{
																						document.registrar.desrotacajamonto1.focus(); //el puntero del mouse queda en nombre 
																						finalizarIns();
																						var mensaje='Debe especificar el Monto del Fondo';
																						div=document.getElementById('mensaje');
																						div.innerHTML=div.innerHTML + mensaje;
																						return 0; //devolvemos un cero para dejar de validar 
																					}
																					
																					if(!document.getElementsByName("bolrotades1")[0].checked && !document.getElementsByName("bolrotades1")[1].checked)
																					{	
																					finalizarIns();
																					var mensaje='Debe Especificar si el Descargo de Fondo de Mantenimiento tiene Boleta';
																					div=document.getElementById('mensaje');
																					div.innerHTML=div.innerHTML + mensaje;
																					return 0; //devolvemos un cero para dejar de validar }
																					}
																					else
																					{
																					
																					if(!document.getElementsByName("bolrotades1")[1].checked)
																						{	//no esta chekeado el 1="no".....kiere decir que Cero esta chekeado,guardamos el dato
																							var descar238 = !document.getElementsByName("bolrotades1")[0].checked;
																							document.getElementById("descargo5").value=descar238;
																																																															if(document.registrar.desnrobole1.value=="")
																									{
																										document.registrar.desnrobole1.focus(); //el puntero del mouse queda en nombre 
																										finalizarIns();
																										var mensaje='Debe especificar el Numero de la Boleta';
																										div=document.getElementById('mensaje');
																										div.innerHTML=div.innerHTML + mensaje;
																										return 0; //devolvemos un cero para dejar de validar 
																									}				
																						}
																						else
																						{
																							var descar24 = !document.getElementsByName("bolrotades1")[1].checked;
																							document.getElementById("descargo5").value=descar24;
																						}
																					
																					}
																				
																			}//cierre else
																		}//cierre else principal

																	}//cierre fondo de Mantenimiento
																	
																	if(varita=="Otros Descargos Rotatorios")
																	{
																		//pal nombre
																		if(document.registrar.nomotrodescar.value=="")
																		{
																		document.registrar.nomotrodescar.focus(); //el puntero del mouse queda en nombre 
																		finalizarIns();
																		var mensaje='Debe especificar el Nombre del Descargo';
																		div=document.getElementById('mensaje');
																		div.innerHTML=div.innerHTML + mensaje;
																		return 0; //devolvemos un cero para dejar de validar 
																		}
																		if(!document.getElementsByName("otrodesfonman1")[0].checked && !document.getElementsByName("otrodesfonman1")[1].checked)
																		{	
																		finalizarIns();
																		var mensaje='Debe Especificar si el Descargo es de Cierre o Reposicion';
																		div=document.getElementById('mensaje');
																		div.innerHTML=div.innerHTML + mensaje;
																		return 0; //devolvemos un cero para dejar de validar }
																		}
																		else
																		{
																			if(!document.getElementsByName("otrodesfonman1")[1].checked)
																			{//no esta chekeado el 1="cierre".....kiere decir que reposicion esta chekeado,guardamos el dato
																			var manterepo = !document.getElementsByName("otrodesfonman1")[0].checked;
																			document.getElementById("descargo4").value=manterepo;
																																																												if(document.registrar.desrotacajades.value=="")
																					{
																						document.registrar.desrotacajades.focus(); //el puntero del mouse queda en nombre 
																						finalizarIns();
																						var mensaje='Debe especificar el Nombre del Responsable del Fondo';
																						div=document.getElementById('mensaje');
																						div.innerHTML=div.innerHTML + mensaje;
																						return 0; //devolvemos un cero para dejar de validar 
																					}
																					if(document.registrar.desrotacajauni.value=="")
																					{
																						document.registrar.desrotacajauni.focus(); //el puntero del mouse queda en nombre 
																						finalizarIns();
																						var mensaje='Debe especificar la Unidad Solicitante';
																						div=document.getElementById('mensaje');
																						div.innerHTML=div.innerHTML + mensaje;
																						return 0; //devolvemos un cero para dejar de validar 
																					}
																					if(document.registrar.desrotacajamonto.value=="")
																					{
																						document.registrar.desrotacajamonto.focus(); //el puntero del mouse queda en nombre 
																						finalizarIns();
																						var mensaje='Debe especificar el Monto del Fondo';
																						div=document.getElementById('mensaje');
																						div.innerHTML=div.innerHTML + mensaje;
																						return 0; //devolvemos un cero para dejar de validar 
																					}
																					
																					if(!document.getElementsByName("bolrotades")[0].checked && !document.getElementsByName("bolrotades")[1].checked)
																					{	
																					finalizarIns();
																					var mensaje='Debe Especificar si el Descargo tiene Boleta';
																					div=document.getElementById('mensaje');
																					div.innerHTML=div.innerHTML + mensaje;
																					return 0; //devolvemos un cero para dejar de validar }
																					}
																					else
																					{
																					
																					if(!document.getElementsByName("bolrotades")[1].checked)
																						{	//no esta chekeado el 1="no".....kiere decir que Cero esta chekeado,guardamos el dato
																							var descar237 = !document.getElementsByName("bolrotades")[0].checked;
																							document.getElementById("descargo5").value=descar237;
																																																															if(document.registrar.desnrobole1.value=="")
																									{
																										document.registrar.desnrobole1.focus(); //el puntero del mouse queda en nombre 
																										finalizarIns();
																										var mensaje='Debe especificar el Numero de la Boleta';
																										div=document.getElementById('mensaje');
																										div.innerHTML=div.innerHTML + mensaje;
																										return 0; //devolvemos un cero para dejar de validar 
																									}				
																						}
																						else
																						{
																							var descar2 = !document.getElementsByName("bolrotades")[1].checked;
																							document.getElementById("descargo5").value=descar2;
																						}
																					
																					}
																			}
																			else
																			{	//quiere decir que esta marcado cierre
																				var fondocierre = !document.getElementsByName("otrodesfonman1")[1].checked;
																				document.getElementById("descargo4").value=fondocierre;
																				
																				if(document.registrar.desrotacajades1.value=="")
																					{
																						document.registrar.desrotacajades1.focus(); //el puntero del mouse queda en nombre 
																						finalizarIns();
																						var mensaje='Debe especificar el Nombre del Responsable del Fondo';
																						div=document.getElementById('mensaje');
																						div.innerHTML=div.innerHTML + mensaje;
																						return 0; //devolvemos un cero para dejar de validar 
																					}
																					if(document.registrar.desrotacajauni1.value=="")
																					{
																						document.registrar.desrotacajauni1.focus(); //el puntero del mouse queda en nombre 
																						finalizarIns();
																						var mensaje='Debe especificar la Unidad Solicitante';
																						div=document.getElementById('mensaje');
																						div.innerHTML=div.innerHTML + mensaje;
																						return 0; //devolvemos un cero para dejar de validar 
																					}
																					if(document.registrar.desrotacajamonto1.value=="")
																					{
																						document.registrar.desrotacajamonto1.focus(); //el puntero del mouse queda en nombre 
																						finalizarIns();
																						var mensaje='Debe especificar el Monto del Fondo';
																						div=document.getElementById('mensaje');
																						div.innerHTML=div.innerHTML + mensaje;
																						return 0; //devolvemos un cero para dejar de validar 
																					}
																					
																					if(!document.getElementsByName("bolrotades1")[0].checked && !document.getElementsByName("bolrotades1")[1].checked)
																					{	
																					finalizarIns();
																					var mensaje='Debe Especificar si el Descargo tiene Boleta';
																					div=document.getElementById('mensaje');
																					div.innerHTML=div.innerHTML + mensaje;
																					return 0; //devolvemos un cero para dejar de validar }
																					}
																					else
																					{
																					
																					if(!document.getElementsByName("bolrotades1")[1].checked)
																						{	//no esta chekeado el 1="no".....kiere decir que Cero esta chekeado,guardamos el dato
																							var descar238 = !document.getElementsByName("bolrotades1")[0].checked;
																							document.getElementById("descargo5").value=descar238;
																																																															if(document.registrar.desnrobole1.value=="")
																									{
																										document.registrar.desnrobole1.focus(); //el puntero del mouse queda en nombre 
																										finalizarIns();
																										var mensaje='Debe especificar el Numero de la Boleta';
																										div=document.getElementById('mensaje');
																										div.innerHTML=div.innerHTML + mensaje;
																										return 0; //devolvemos un cero para dejar de validar 
																									}				
																						}
																						else
																						{
																							var descar24 = !document.getElementsByName("bolrotades1")[1].checked;
																							document.getElementById("descargo5").value=descar24;
																						}
																					
																					}
																				
																			}//cierre else
																		}//cierre else principal

																	}//cierre Otros Descargos Rotatorios
																}//cierre fondos rotatorios
																//DESCARGO VIAJES
																if(pag=="Descargo Viajes")
																{
																	if(document.registrar.desresponfon2.value=="")
																	{
																		document.registrar.desresponfon2.focus();
																		finalizarIns();
																		var mensaje='Debe especificar el Nombre del Responsable del Fondo';
																		div=document.getElementById('mensaje');
																		div.innerHTML=div.innerHTML + mensaje;
																		return 0; //devolvemos un cero para dejar de validar 
																	}
																	if(document.registrar.desviaactiviti2.value=="")
																	{
																		document.registrar.desviaactiviti2.focus();
																		finalizarIns();
																		var mensaje='Debe especificar la Actividad Correspondiente al Descargo';
																		div=document.getElementById('mensaje');
																		div.innerHTML=div.innerHTML + mensaje;
																		return 0; //devolvemos un cero para dejar de validar 
																	}
																	if(document.registrar.desunisol2.value=="")
																	{
																		document.registrar.desunisol2.focus();
																		finalizarIns();
																		var mensaje='Debe especificar la Unidad Solicitante';
																		div=document.getElementById('mensaje');
																		div.innerHTML=div.innerHTML + mensaje;
																		return 0; //devolvemos un cero para dejar de validar 
																	}
																	if(!document.getElementsByName("boleta5")[0].checked && !document.getElementsByName("boleta5")[1].checked)
																	{	
																	finalizarIns();
																	var mensaje='Debe Especificar si el Descargo tiene Boleta';
																	div=document.getElementById('mensaje');
																	div.innerHTML=div.innerHTML + mensaje;
																	return 0; //devolvemos un cero para dejar de validar }
																	}
																	else
																	{
																		if(!document.getElementsByName("boleta5")[1].checked)
																		{	//no esta chekeado el 1="no".....kiere decir que Cero esta chekeado,guardamos el dato
																			var descar2 = !document.getElementsByName("boleta5")[0].checked;
																			document.getElementById("descargo2").value=descar2;
																																																										if(document.registrar.desnrobole.value=="")
																				{
																					document.registrar.desnrobole.focus(); //el puntero del mouse queda en nombre 
																					finalizarIns();
																					var mensaje='Debe especificar el Numero de la Boleta';
																					div=document.getElementById('mensaje');
																					div.innerHTML=div.innerHTML + mensaje;
																					return 0; //devolvemos un cero para dejar de validar 
																				}				
																		}
																		else
																		{
																			var descar2 = !document.getElementsByName("boleta5")[1].checked;
																			document.getElementById("descargo2").value=descar2;
																			
																			
																		}
																	}
																}//CIERRE DESCARGO DE VIAJES
																//Otros Descargos - Cierre de Cargos
																if(pag=="Otros Descargos Cierre de Cargos")
																{
																	if(document.registrar.nomdesotro2.value=="")
																	{
																		document.registrar.nomdesotro2.focus();
																		finalizarIns();
																		var mensaje='Debe especificar el Nombre del Descargo';
																		div=document.getElementById('mensaje');
																		div.innerHTML=div.innerHTML + mensaje;
																		return 0; //devolvemos un cero para dejar de validar 
																	}
																	if(document.registrar.desresponfon23.value=="")
																	{
																		document.registrar.desresponfon23.focus();
																		finalizarIns();
																		var mensaje='Debe especificar el Nombre del Responsable del Fondo';
																		div=document.getElementById('mensaje');
																		div.innerHTML=div.innerHTML + mensaje;
																		return 0; //devolvemos un cero para dejar de validar 
																	}
																	if(document.registrar.desviaactiviti3.value=="")
																	{
																		document.registrar.desviaactiviti3.focus();
																		finalizarIns();
																		var mensaje='Debe especificar la Actividad Correspondiente al Descargo';
																		div=document.getElementById('mensaje');
																		div.innerHTML=div.innerHTML + mensaje;
																		return 0; //devolvemos un cero para dejar de validar 
																	}
																	if(document.registrar.desunisol23.value=="")
																	{
																		document.registrar.desunisol23.focus();
																		finalizarIns();
																		var mensaje='Debe especificar la Unidad Solicitante';
																		div=document.getElementById('mensaje');
																		div.innerHTML=div.innerHTML + mensaje;
																		return 0; //devolvemos un cero para dejar de validar 
																	}
																	if(!document.getElementsByName("boleta56")[0].checked && !document.getElementsByName("boleta56")[1].checked)
																	{	
																	finalizarIns();
																	var mensaje='Debe Especificar si el Descargo tiene Boleta';
																	div=document.getElementById('mensaje');
																	div.innerHTML=div.innerHTML + mensaje;
																	return 0; //devolvemos un cero para dejar de validar }
																	}
																	else
																	{
																		if(!document.getElementsByName("boleta56")[1].checked)
																		{	//no esta chekeado el 1="no".....kiere decir que Cero esta chekeado,guardamos el dato
																			var descar2 = !document.getElementsByName("boleta56")[0].checked;
																			document.getElementById("descargo2").value=descar2;
																																																										if(document.registrar.desnrobole.value=="")
																				{
																					document.registrar.desnrobole.focus(); //el puntero del mouse queda en nombre 
																					finalizarIns();
																					var mensaje='Debe especificar el Numero de la Boleta';
																					div=document.getElementById('mensaje');
																					div.innerHTML=div.innerHTML + mensaje;
																					return 0; //devolvemos un cero para dejar de validar 
																				}				
																		}
																		else
																		{
																			var descar2 = !document.getElementsByName("boleta56")[1].checked;
																			document.getElementById("descargo2").value=descar2;
																			
																			
																		}
																	}
																}//CIERRE Otros Descargos - Cierre de Cargos
																
														}//CIERRE DEL TRAMITE
														//PARA VIATICOS Y PASAJES
														if(index==99)
														{
																if(document.registrar.viapasaj.value=="")
																{   //si el largo de nombre es menor a 2 caracteres 
																		document.registrar.viapasaj.focus();  
																		finalizarIns();
																		var mensaje='Debe Seleccionar una Solicitud Especifica';
																		div=document.getElementById('mensaje');
																		div.innerHTML=div.innerHTML + mensaje;
																		return 0; //devolvemos un cero para dejar de validar 
																}															
																
																var viatipas = document.registrar.viapasaj.value;
																document.getElementById("descargo1").value=viatipas;
																
																if(viatipas=="Viaticos")
																{
																	if(document.registrar.nombreviapasaj.value=="")
																	{
																		document.registrar.nombreviapasaj.focus();
																		finalizarIns();
																		var mensaje='Debe especificar el Nombre(s) de él o los Beneficiarios';
																		div=document.getElementById('mensaje');
																		div.innerHTML=div.innerHTML + mensaje;
																		return 0; //devolvemos un cero para dejar de validar 
																	}
																	if(document.registrar.lugarviapasaj.value=="")
																	{
																		document.registrar.lugarviapasaj.focus();
																		finalizarIns();
																		var mensaje='Debe especificar el Lugar del Viaje';
																		div=document.getElementById('mensaje');
																		div.innerHTML=div.innerHTML + mensaje;
																		return 0; //devolvemos un cero para dejar de validar 
																	}
																	if(document.registrar.duraviapasaj.value=="")
																	{
																		document.registrar.duraviapasaj.focus();
																		finalizarIns();
																		var mensaje='Debe especificar la Duracion del Viaje';
																		div=document.getElementById('mensaje');
																		div.innerHTML=div.innerHTML + mensaje;
																		return 0; //devolvemos un cero para dejar de validar 
																	}
																	if(document.registrar.objviapasaj.value=="")
																	{
																		document.registrar.objviapasaj.focus();
																		finalizarIns();
																		var mensaje='Debe especificar el Motivo del Viaje';
																		div=document.getElementById('mensaje');
																		div.innerHTML=div.innerHTML + mensaje;
																		return 0; //devolvemos un cero para dejar de validar 
																	}
																	if(document.registrar.unisolviapasaj.value=="")
																	{
																		document.registrar.unisolviapasaj.focus();
																		finalizarIns();
																		var mensaje='Debe especificar la Unidad Solicitante';
																		div=document.getElementById('mensaje');
																		div.innerHTML=div.innerHTML + mensaje;
																		return 0; //devolvemos un cero para dejar de validar 
																	}
																}
																if(viatipas=="Pasajes")
																{
																	if(document.registrar.pasajnomemp.value=="")
																	{
																		document.registrar.pasajnomemp.focus();
																		finalizarIns();
																		var mensaje='Debe especificar el Nombre(s) de él o los Beneficiarios';
																		div=document.getElementById('mensaje');
																		div.innerHTML=div.innerHTML + mensaje;
																		return 0; //devolvemos un cero para dejar de validar 
																	}
																	if(document.registrar.monpasaj.value=="")
																	{
																		document.registrar.monpasaj.focus();
																		finalizarIns();
																		var mensaje='Debe especificar el Monto del Pasaje';
																		div=document.getElementById('mensaje');
																		div.innerHTML=div.innerHTML + mensaje;
																		return 0; //devolvemos un cero para dejar de validar 
																	}
																	if(document.registrar.unisolviapasaj.value=="")
																	{
																		document.registrar.unisolviapasaj.focus();
																		finalizarIns();
																		var mensaje='Debe especificar la Unidad Solicitante';
																		div=document.getElementById('mensaje');
																		div.innerHTML=div.innerHTML + mensaje;
																		return 0; //devolvemos un cero para dejar de validar 
																	}
																	if(!document.getElementsByName("confondo")[0].checked && !document.getElementsByName("confondo")[1].checked)
																	{	
																	finalizarIns();
																	var mensaje='Debe Especificar si la Solicitud Adjunta Fondo en Avance o no?';
																	div=document.getElementById('mensaje');
																	div.innerHTML=div.innerHTML + mensaje;
																	return 0; //devolvemos un cero para dejar de validar }
																	}
																	else
																	{
																		if(!document.getElementsByName("confondo")[1].checked)
																		{	//no esta chekeado el 1="no".....kiere decir que Cero esta chekeado,guardamos el dato
																			var descar2 = !document.getElementsByName("confondo")[0].checked;
																			document.getElementById("descargo2").value=descar2;
																																																										if(document.registrar.nomfonavaadj.value=="")
																				{
																					document.registrar.nomfonavaadj.focus(); //el puntero del mouse queda en nombre 
																					finalizarIns();
																					var mensaje='Debe especificar el Nombre del Fondo en Avance Adjunto';
																					div=document.getElementById('mensaje');
																					div.innerHTML=div.innerHTML + mensaje;
																					return 0; //devolvemos un cero para dejar de validar 
																				}	
																			if(document.registrar.montodonfoavanadj.value=="")
																				{
																					document.registrar.montodonfoavanadj.focus(); //el puntero del mouse queda en nombre 
																					finalizarIns();
																					var mensaje='Debe especificar el Monto del Fondo en Avance';
																					div=document.getElementById('mensaje');
																					div.innerHTML=div.innerHTML + mensaje;
																					return 0; //devolvemos un cero para dejar de validar 
																				}	
																		}
																		else
																		{
																			var descar2 = !document.getElementsByName("confondo")[1].checked;
																			document.getElementById("descargo2").value=descar2;
																			
																			
																		}
																	}
																	
																}
																if(viatipas=="Viaticos y Pasajes")
																{
																	if(document.registrar.nombreviapasaj.value=="")
																	{
																		document.registrar.nombreviapasaj.focus();
																		finalizarIns();
																		var mensaje='Debe especificar el Nombre(s) de él o los Beneficiarios';
																		div=document.getElementById('mensaje');
																		div.innerHTML=div.innerHTML + mensaje;
																		return 0; //devolvemos un cero para dejar de validar 
																	}
																	if(document.registrar.lugarviapasaj.value=="")
																	{
																		document.registrar.lugarviapasaj.focus();
																		finalizarIns();
																		var mensaje='Debe especificar el Lugar del Viaje';
																		div=document.getElementById('mensaje');
																		div.innerHTML=div.innerHTML + mensaje;
																		return 0; //devolvemos un cero para dejar de validar 
																	}
																	if(document.registrar.duraviapasaj.value=="")
																	{
																		document.registrar.duraviapasaj.focus();
																		finalizarIns();
																		var mensaje='Debe especificar la Duracion del Viaje';
																		div=document.getElementById('mensaje');
																		div.innerHTML=div.innerHTML + mensaje;
																		return 0; //devolvemos un cero para dejar de validar 
																	}
																	if(document.registrar.objviapasaj.value=="")
																	{
																		document.registrar.objviapasaj.focus();
																		finalizarIns();
																		var mensaje='Debe especificar el Motivo del Viaje';
																		div=document.getElementById('mensaje');
																		div.innerHTML=div.innerHTML + mensaje;
																		return 0; //devolvemos un cero para dejar de validar 
																	}
																	if(document.registrar.pasajnomemp.value=="")
																	{
																		document.registrar.pasajnomemp.focus();
																		finalizarIns();
																		var mensaje='Debe especificar el Nombre(s) de él o los Beneficiarios';
																		div=document.getElementById('mensaje');
																		div.innerHTML=div.innerHTML + mensaje;
																		return 0; //devolvemos un cero para dejar de validar 
																	}
																	if(document.registrar.monpasaj.value=="")
																	{
																		document.registrar.monpasaj.focus();
																		finalizarIns();
																		var mensaje='Debe especificar el Monto del Pasaje';
																		div=document.getElementById('mensaje');
																		div.innerHTML=div.innerHTML + mensaje;
																		return 0; //devolvemos un cero para dejar de validar 
																	}
																	if(document.registrar.unisolviapasaj.value=="")
																	{
																		document.registrar.unisolviapasaj.focus();
																		finalizarIns();
																		var mensaje='Debe especificar la Unidad Solicitante';
																		div=document.getElementById('mensaje');
																		div.innerHTML=div.innerHTML + mensaje;
																		return 0; //devolvemos un cero para dejar de validar 
																	}
																	if(!document.getElementsByName("confondo")[0].checked && !document.getElementsByName("confondo")[1].checked)
																	{	
																	finalizarIns();
																	var mensaje='Debe Especificar si la Solicitud Adjunta Fondo en Avance o no?';
																	div=document.getElementById('mensaje');
																	div.innerHTML=div.innerHTML + mensaje;
																	return 0; //devolvemos un cero para dejar de validar }
																	}
																	else
																	{
																		if(!document.getElementsByName("confondo")[1].checked)
																		{	//no esta chekeado el 1="no".....kiere decir que Cero esta chekeado,guardamos el dato
																			var descar2 = !document.getElementsByName("confondo")[0].checked;
																			document.getElementById("descargo2").value=descar2;
																																																										if(document.registrar.nomfonavaadj.value=="")
																				{
																					document.registrar.nomfonavaadj.focus(); //el puntero del mouse queda en nombre 
																					finalizarIns();
																					var mensaje='Debe especificar el Nombre del Fondo en Avance Adjunto';
																					div=document.getElementById('mensaje');
																					div.innerHTML=div.innerHTML + mensaje;
																					return 0; //devolvemos un cero para dejar de validar 
																				}	
																			if(document.registrar.montodonfoavanadj.value=="")
																				{
																					document.registrar.montodonfoavanadj.focus(); //el puntero del mouse queda en nombre 
																					finalizarIns();
																					var mensaje='Debe especificar el Monto del Fondo en Avance';
																					div=document.getElementById('mensaje');
																					div.innerHTML=div.innerHTML + mensaje;
																					return 0; //devolvemos un cero para dejar de validar 
																				}	
																		}
																		else
																		{
																			var descar2 = !document.getElementsByName("confondo")[1].checked;
																			document.getElementById("descargo2").value=descar2;
																			
																			
																		}
																	}
																	
																}
													
																	
																
														}//CIERRE VIATICOS Y PASAJES
														//INICIO DE POA PRESUPUESTOS
														if(index==38)
														{
																	if(document.registrar.proyecactiviti.value=="")
																	{
																		document.registrar.proyecactiviti.focus();
																		finalizarIns();
																		var mensaje='Debe especificar el Proyecto o la Actividad';
																		div=document.getElementById('mensaje');
																		div.innerHTML=div.innerHTML + mensaje;
																		return 0; //devolvemos un cero para dejar de validar 
																	}
																	if(document.registrar.montopoa.value=="")
																	{
																		document.registrar.montopoa.focus();
																		finalizarIns();
																		var mensaje='Debe especificar el Monto';
																		div=document.getElementById('mensaje');
																		div.innerHTML=div.innerHTML + mensaje;
																		return 0; //devolvemos un cero para dejar de validar 
																	}
														}//CIERRE DE POA PRESUPUESTOS
														//MODIFICACION PRESUPUESTARIA													
														if(index==48)
														{
																	if(document.registrar.modifipresu.value=="")
																	{   //si el largo de nombre es menor a 2 caracteres 
																			document.registrar.modifipresu.focus();  
																			finalizarIns();
																			var mensaje='Debe Seleccionar una Solicitud Especifica';
																			div=document.getElementById('mensaje');
																			div.innerHTML=div.innerHTML + mensaje;
																			return 0; //devolvemos un cero para dejar de validar 
																	}															
																
																	var modif = document.registrar.modifipresu.value;
																	document.getElementById("descargo1").value=modif;
																
																	if(modif=="Incremento Presupuestario")
																	{
																		if(document.registrar.proyecactivitiinctras.value=="")
																		{
																			document.registrar.proyecactivitiinctras.focus();
																			finalizarIns();
																			var mensaje='Debe especificar el Proyecto o la Actividad';
																			div=document.getElementById('mensaje');
																			div.innerHTML=div.innerHTML + mensaje;
																			return 0; //devolvemos un cero para dejar de validar 
																		}
																		if(document.registrar.montoinctras.value=="")
																		{
																			document.registrar.montoinctras.focus();
																			finalizarIns();
																			var mensaje='Debe especificar el Monto';
																			div=document.getElementById('mensaje');
																			div.innerHTML=div.innerHTML + mensaje;
																			return 0; //devolvemos un cero para dejar de validar 
																		}
																	}
																	else
																	{
																		if(modif=="Traspaso Presupuestario")
																		{
																			if(document.registrar.proyecactivitiinctras.value=="")
																			{
																				document.registrar.proyecactivitiinctras.focus();
																				finalizarIns();
																				var mensaje='Debe especificar el Proyecto o la Actividad';
																				div=document.getElementById('mensaje');
																				div.innerHTML=div.innerHTML + mensaje;
																				return 0; //devolvemos un cero para dejar de validar 
																			}
																			if(document.registrar.montoinctras.value=="")
																			{
																				document.registrar.montoinctras.focus();
																				finalizarIns();
																				var mensaje='Debe especificar el Monto';
																				div=document.getElementById('mensaje');
																				div.innerHTML=div.innerHTML + mensaje;
																				return 0; //devolvemos un cero para dejar de validar 
																			}
																		}
																	}
														}//CIERRE MODIFICACION PRESUPUESTARIA
														//INICIO TRANSPASO INTRAACTIVIDAD
														if(index==89)
														{
																	if(document.registrar.proyactdel.value=="")
																	{
																		document.registrar.proyactdel.focus();
																		finalizarIns();
																		var mensaje='Debe especificar el Proyecto o la Actividad origen';
																		div=document.getElementById('mensaje');
																		div.innerHTML=div.innerHTML + mensaje;
																		return 0; //devolvemos un cero para dejar de validar 
																	}
																	if(document.registrar.proyacthac.value=="")
																	{
																		document.registrar.proyacthac.focus();
																		finalizarIns();
																		var mensaje='Debe especificar el Proyecto o la Actividad Destino';
																		div=document.getElementById('mensaje');
																		div.innerHTML=div.innerHTML + mensaje;
																		return 0; //devolvemos un cero para dejar de validar 
																	}
																	if(document.registrar.montointra.value=="")
																	{
																		document.registrar.montointra.focus();
																		finalizarIns();
																		var mensaje='Debe especificar el Monto a traspasar';
																		div=document.getElementById('mensaje');
																		div.innerHTML=div.innerHTML + mensaje;
																		return 0; //devolvemos un cero para dejar de validar 
																	}
														}//CIERRE TRANSPASO INTRAACTIVIDAD
												///////////////////////////////////////DESDE AQUI ADMINISTRATIVOS/////////////////////////////////////
												//SOLICITUD NO DEUDAS PENDIENTES
														if(index==88)
														{
																	if(document.registrar.nombinterenodeu.value=="")
																	{
																		document.registrar.nombinterenodeu.focus();
																		finalizarIns();
																		var mensaje='Debe especificar Nombre del Interesado';
																		div=document.getElementById('mensaje');
																		div.innerHTML=div.innerHTML + mensaje;
																		return 0; //devolvemos un cero para dejar de validar 
																	}
																	if(document.registrar.numcinodeu.value=="")
																	{
																		document.registrar.numcinodeu.focus();
																		finalizarIns();
																		var mensaje='Debe especificar el Numero de Carnet y la Expedicion';
																		div=document.getElementById('mensaje');
																		div.innerHTML=div.innerHTML + mensaje;
																		return 0; //devolvemos un cero para dejar de validar 
																	}
																	if(document.registrar.objetivonodeu.value=="")
																	{
																		document.registrar.objetivonodeu.focus();
																		finalizarIns();
																		var mensaje='Debe especificar para que esta solicitanto el Tramite';
																		div=document.getElementById('mensaje');
																		div.innerHTML=div.innerHTML + mensaje;
																		return 0; //devolvemos un cero para dejar de validar 
																	}
														}//CIERRE NO DEUDAS PENDIENTES
														//INVITACIONES
														if(index==19)
														{
																	if(document.registrar.instuniinv.value=="")
																	{
																		document.registrar.instuniinv.focus();
																		finalizarIns();
																		var mensaje='Debe especificar el Nombre de la Institucion que emite la Invitacion';
																		div=document.getElementById('mensaje');
																		div.innerHTML=div.innerHTML + mensaje;
																		return 0; //devolvemos un cero para dejar de validar 
																	}
																	if(document.registrar.tenorinv.value=="")
																	{
																		document.registrar.tenorinv.focus();
																		finalizarIns();
																		var mensaje='Debe especificar el Tenor de la Invitacion';
																		div=document.getElementById('mensaje');
																		div.innerHTML=div.innerHTML + mensaje;
																		return 0; //devolvemos un cero para dejar de validar 
																	}
																	if(document.registrar.luginv.value=="")
																	{
																		document.registrar.luginv.focus();
																		finalizarIns();
																		var mensaje='Debe especificar el Lugar donde se llevara a cabo el Evento';
																		div=document.getElementById('mensaje');
																		div.innerHTML=div.innerHTML + mensaje;
																		return 0; //devolvemos un cero para dejar de validar 
																	}
																	if(document.registrar.calendario.value=="")
																	{
																		document.registrar.calendario.focus();
																		finalizarIns();
																		var mensaje='Debe especificar la fecha que se llevara a cabo el Evento';
																		div=document.getElementById('mensaje');
																		div.innerHTML=div.innerHTML + mensaje;
																		return 0; //devolvemos un cero para dejar de validar 
																	}
														}//CIERRE INVITACIONES
														//CONTRATOS PERSONALES
														if(index==42)
														{
																if(document.registrar.contrato.value=="")
																{   //si el largo de nombre es menor a 2 caracteres 
																		document.registrar.contrato.focus();  
																		finalizarIns();
																		var mensaje='Debe Seleccionar un Contrato Especifico';
																		div=document.getElementById('mensaje');
																		div.innerHTML=div.innerHTML + mensaje;
																		return 0; //devolvemos un cero para dejar de validar 
																}
																																
																var contra = document.registrar.contrato.value;
																document.getElementById("descargo1").value=contra;
																
																	if(contra=="Otros Contratos Personales")
																	{
																		if(document.registrar.otrocont.value=="")
																		{
																			document.registrar.otrocont.focus();
																			finalizarIns();
																			var mensaje='Debe especificar el Nombre del Tipo de Contrato';
																			div=document.getElementById('mensaje');
																			div.innerHTML=div.innerHTML + mensaje;
																			return 0; //devolvemos un cero para dejar de validar 
																		}
																			if(document.registrar.nombrepersonales.value=="")
																			{
																				document.registrar.nombrepersonales.focus();
																				finalizarIns();
																				var mensaje='Debe especificar el Nombre del Beneficiario';
																				div=document.getElementById('mensaje');
																				div.innerHTML=div.innerHTML + mensaje;
																				return 0; //devolvemos un cero para dejar de validar 
																			}
																			if(document.registrar.calendario2.value=="")
																			{
																				document.registrar.calendario2.focus();
																				finalizarIns();
																				var mensaje='Debe especificar la Fecha de Inicio del Contrato';
																				div=document.getElementById('mensaje');
																				div.innerHTML=div.innerHTML + mensaje;
																				return 0; //devolvemos un cero para dejar de validar 
																			}
																			if(document.registrar.calendario1.value=="")
																			{
																				document.registrar.calendario1.focus();
																				finalizarIns();
																				var mensaje='Debe especificar la Fecha de Conclusion del Contrato';
																				div=document.getElementById('mensaje');
																				div.innerHTML=div.innerHTML + mensaje;
																				return 0; //devolvemos un cero para dejar de validar 
																			}
																			if(document.registrar.montocon.value=="")
																			{
																				document.registrar.montocon.focus();
																				finalizarIns();
																				var mensaje='Debe especificar el monto de contratacion en Bs.';
																				div=document.getElementById('mensaje');
																				div.innerHTML=div.innerHTML + mensaje;
																				return 0; //devolvemos un cero para dejar de validar 
																			}
																			if(document.registrar.refcontra.value=="")
																			{
																				document.registrar.refcontra.focus();
																				finalizarIns();
																				var mensaje='Debe especificar el Objeto de la Contratacion';
																				div=document.getElementById('mensaje');
																				div.innerHTML=div.innerHTML + mensaje;
																				return 0; //devolvemos un cero para dejar de validar 
																			}
																	}
																	else
																	{
																			if(document.registrar.nombrepersonales.value=="")
																			{
																				document.registrar.nombrepersonales.focus();
																				finalizarIns();
																				var mensaje='Debe especificar el Nombre del Beneficiario';
																				div=document.getElementById('mensaje');
																				div.innerHTML=div.innerHTML + mensaje;
																				return 0; //devolvemos un cero para dejar de validar 
																			}
																			if(document.registrar.calendario2.value=="")
																			{
																				document.registrar.calendario2.focus();
																				finalizarIns();
																				var mensaje='Debe especificar la Fecha de Inicio del Contrato';
																				div=document.getElementById('mensaje');
																				div.innerHTML=div.innerHTML + mensaje;
																				return 0; //devolvemos un cero para dejar de validar 
																			}
																			if(document.registrar.calendario1.value=="")
																			{
																				document.registrar.calendario1.focus();
																				finalizarIns();
																				var mensaje='Debe especificar la Fecha de Conclusion del Contrato';
																				div=document.getElementById('mensaje');
																				div.innerHTML=div.innerHTML + mensaje;
																				return 0; //devolvemos un cero para dejar de validar 
																			}
																			if(document.registrar.montocon.value=="")
																			{
																				document.registrar.montocon.focus();
																				finalizarIns();
																				var mensaje='Debe especificar el monto del Contrato en Bs.';
																				div=document.getElementById('mensaje');
																				div.innerHTML=div.innerHTML + mensaje;
																				return 0; //devolvemos un cero para dejar de validar 
																			}
																			if(document.registrar.refcontra.value=="")
																			{
																				document.registrar.refcontra.focus();
																				finalizarIns();
																				var mensaje='Debe especificar el Objeto de la Contratacion';
																				div=document.getElementById('mensaje');
																				div.innerHTML=div.innerHTML + mensaje;
																				return 0; //devolvemos un cero para dejar de validar 
																			}
																		
																	}
																
														}//CIERRE CONTRATOS PERSONALES
														//CIRCULARES
														if(index==8)
														{	
															if(!document.getElementsByName("circular")[0].checked && !document.getElementsByName("circular")[1].checked)
															{	
															finalizarIns();
															var mensaje='Debe seleccionar una de las opciones de la Circular';
															div=document.getElementById('mensaje');
															div.innerHTML=div.innerHTML + mensaje;
															return 0; //devolvemos un cero para dejar de validar }
															}
															if(document.registrar.circul.value=="")
															{
															document.registrar.circul.focus(); //el puntero del mouse queda en nombre 
															finalizarIns();
															var mensaje='Debe seleccionar una Resolucion Especifica';
															div=document.getElementById('mensaje');
															div.innerHTML=div.innerHTML + mensaje;
															return 0; //devolvemos un cero para dejar de validar 
															}
															else
															{
																	if(!document.getElementsByName("circular")[0].checked)
																	{	var servicom = !document.getElementsByName("circular")[1].checked;
																		document.getElementById("servime").value=servicom;
																		//comenzamos a validad circular Conocimiento
																		var cirwi = document.registrar.circul.value;
																		if(cirwi=="Otras Resoluciones")
																		{
																			if(document.registrar.nomresolu.value=="")
																			{
																				document.registrar.nomresolu.focus(); //el puntero del mouse queda en nombre 
																				finalizarIns();
																				var mensaje='Debe especificar el Nombre de la Resolucion';
																				div=document.getElementById('mensaje');
																				div.innerHTML=div.innerHTML + mensaje;
																				return 0; //devolvemos un cero para dejar de validar 
																			}
																		}
																		
																		if(document.registrar.refcircu.value=="")
																		{
																		document.registrar.refcircu.focus(); //el puntero del mouse queda en nombre 
																		finalizarIns();
																		var mensaje='Debe especificar la Descripcion de la Referencia';
																		div=document.getElementById('mensaje');
																		div.innerHTML=div.innerHTML + mensaje;
																		return 0; //devolvemos un cero para dejar de validar 
																		}
																		if(document.registrar.calendario3.value=="")
																		{
																		document.registrar.calendario3.focus(); //el puntero del mouse queda en nombre 
																		finalizarIns();
																		var mensaje='Debe especificar la Fecha de Emision de la Circular';
																		div=document.getElementById('mensaje');
																		div.innerHTML=div.innerHTML + mensaje;
																		return 0; //devolvemos un cero para dejar de validar 
																		}
																	}
																	else
																	{	
																		var bibien = !document.getElementsByName("circular")[1].checked;
																		document.getElementById("bienen").value=bibien;
																		//para los campos del Instructivo
																			var cirwi = document.registrar.circul.value;
																			if(cirwi=="Otras Resoluciones")
																			{
																				if(document.registrar.nomresolu.value=="")
																				{
																					document.registrar.nomresolu.focus(); //el puntero del mouse queda en nombre 
																					finalizarIns();
																					var mensaje='Debe especificar el Nombre de la Resolucion';
																					div=document.getElementById('mensaje');
																					div.innerHTML=div.innerHTML + mensaje;
																					return 0; //devolvemos un cero para dejar de validar 
																				}
																			}
																		
																		if(document.registrar.refcircu.value=="")
																		{
																		document.registrar.refcircu.focus(); //el puntero del mouse queda en nombre 
																		finalizarIns();
																		var mensaje='Debe especificar la Descripcion de la Referencia';
																		div=document.getElementById('mensaje');
																		div.innerHTML=div.innerHTML + mensaje;
																		return 0; //devolvemos un cero para dejar de validar 
																		}
																		if(document.registrar.calendario3.value=="")
																		{
																		document.registrar.calendario3.focus(); //el puntero del mouse queda en nombre 
																		finalizarIns();
																		var mensaje='Debe especificar la Fecha de Emision de la Circular';
																		div=document.getElementById('mensaje');
																		div.innerHTML=div.innerHTML + mensaje;
																		return 0; //devolvemos un cero para dejar de validar 
																		}
																	}
															}
														}//FIN CIRCULAR...
														//DESIGNACIONES
														if(index==103)
														{
																if(document.registrar.designa.value=="")
																{   //si el largo de nombre es menor a 2 caracteres 
																	document.registrar.designa.focus();  
																	finalizarIns();
																	var mensaje='Debe Seleccionar una Designacion Especifica';
																	div=document.getElementById('mensaje');
																	div.innerHTML=div.innerHTML + mensaje;
																	return 0; //devolvemos un cero para dejar de validar 
																}
																
																var desig = document.registrar.designa.value;
																//document.getElementById("descargo1").value=desig;
																if(desig=="Designacion Auxiliar de Docencia")
																{
																		if(document.registrar.nomaux.value=="")
																		{
																		document.registrar.nomaux.focus(); //el puntero del mouse queda en nombre 
																		finalizarIns();
																		var mensaje='Debe especificar el Nombre del Auxiliar de Docencia';
																		div=document.getElementById('mensaje');
																		div.innerHTML=div.innerHTML + mensaje;
																		return 0; //devolvemos un cero para dejar de validar 
																		}
																		if(document.registrar.auxcarr.value=="")
																		{
																		document.registrar.auxcarr.focus(); //el puntero del mouse queda en nombre 
																		finalizarIns();
																		var mensaje='Debe Especificar la Carrera del Auxiliar de Docencia';
																		div=document.getElementById('mensaje');
																		div.innerHTML=div.innerHTML + mensaje;
																		return 0; //devolvemos un cero para dejar de validar 
																		}
																		if(document.registrar.calendario4.value=="")
																		{
																		document.registrar.calendario4.focus(); //el puntero del mouse queda en nombre 
																		finalizarIns();
																		var mensaje='Debe especificar la fecha de Inicio';
																		div=document.getElementById('mensaje');
																		div.innerHTML=div.innerHTML + mensaje;
																		return 0; //devolvemos un cero para dejar de validar 
																		}
																		if(document.registrar.calendario5.value=="")
																		{
																		document.registrar.calendario5.focus(); //el puntero del mouse queda en nombre 
																		finalizarIns();
																		var mensaje='Debe especificar la fecha de Conclusion';
																		div=document.getElementById('mensaje');
																		div.innerHTML=div.innerHTML + mensaje;
																		return 0; //devolvemos un cero para dejar de validar 
																		}
																}
																if(desig=="Designacion de Tribunal")
																{
																		if(document.registrar.desigtri.value=="")
																		{   //si el largo de nombre es menor a 2 caracteres 
																			document.registrar.desigtri.focus();  
																			finalizarIns();
																			var mensaje='Debe elegir un Tipo de Designacion de Tribunal';
																			div=document.getElementById('mensaje');
																			div.innerHTML=div.innerHTML + mensaje;
																			return 0; //devolvemos un cero para dejar de validar 
																		}
																		
																		var desigtribu = document.registrar.desigtri.value;
																		//document.getElementById("descargo2").value=desigtribu;
																		if(desigtribu=="Designacion Tribunal Docente")
																		{
																			if(document.registrar.nomdocentribu.value=="")
																			{
																			document.registrar.nomdocentribu.focus(); //el puntero del mouse queda en nombre 
																			finalizarIns();
																			var mensaje='Debe especificar el Nombre del Tribunal Docente';
																			div=document.getElementById('mensaje');
																			div.innerHTML=div.innerHTML + mensaje;
																			return 0; //devolvemos un cero para dejar de validar 
																			}
																			if(document.registrar.nroresotrib.value=="")
																			{
																			document.registrar.nroresotrib.focus(); //el puntero del mouse queda en nombre 
																			finalizarIns();
																			var mensaje='Debe especificar el Nro. de Resolucion del Tribunal Docente';
																			div=document.getElementById('mensaje');
																			div.innerHTML=div.innerHTML + mensaje;
																			return 0; //devolvemos un cero para dejar de validar 
																			}
																		}
																		if(desigtribu=="Designacion Tribunal Estudiantil")
																		{
																			if(document.registrar.nomestutribu.value=="")
																			{
																			document.registrar.nomestutribu.focus(); //el puntero del mouse queda en nombre 
																			finalizarIns();
																			var mensaje='Debe especificar el Nombre del Tribunal Estudiantil';
																			div=document.getElementById('mensaje');
																			div.innerHTML=div.innerHTML + mensaje;
																			return 0; //devolvemos un cero para dejar de validar 
																			}
																			if(document.registrar.nroresotrib.value=="")
																			{
																			document.registrar.nroresotrib.focus(); //el puntero del mouse queda en nombre 
																			finalizarIns();
																			var mensaje='Debe especificar el Nro. de Resolucion del Tribunal Estudiantil';
																			div=document.getElementById('mensaje');
																			div.innerHTML=div.innerHTML + mensaje;
																			return 0; //devolvemos un cero para dejar de validar 
																			}
																		}
																		if(desigtribu=="Designacion Tribunal Estudiantil-Docente")
																		{
																			if(document.registrar.ambosnombres.value=="")
																			{
																			document.registrar.ambosnombres.focus(); //el puntero del mouse queda en nombre 
																			finalizarIns();
																			var mensaje='Debe especificar el Nombre de los Estudiantes y/o Docentes';
																			div=document.getElementById('mensaje');
																			div.innerHTML=div.innerHTML + mensaje;
																			return 0; //devolvemos un cero para dejar de validar 
																			}
																			if(document.registrar.nroresotrib.value=="")
																			{
																			document.registrar.nroresotrib.focus(); //el puntero del mouse queda en nombre 
																			finalizarIns();
																			var mensaje='Debe especificar Nro(s). de Resolucion(es). del Tribunal Docente/Estudiantil';
																			div=document.getElementById('mensaje');
																			div.innerHTML=div.innerHTML + mensaje;
																			return 0; //devolvemos un cero para dejar de validar 
																			}
																		}
																}
																if(desig=="Designacion Docente")
																{
																		if(document.registrar.desigdoc.value=="")
																		{   //si el largo de nombre es menor a 2 caracteres 
																			document.registrar.desigdoc.focus();  
																			finalizarIns();
																			var mensaje='Debe elegir un Tipo de Designacion de Docente';
																			div=document.getElementById('mensaje');
																			div.innerHTML=div.innerHTML + mensaje;
																			return 0; //devolvemos un cero para dejar de validar 
																		}
																		var desigdocent = document.registrar.desigdoc.value;
																		//document.getElementById("descargo2").value=desigdocent;
																		if(desigdocent=="Docente Contratado")
																		{
																			if(document.registrar.nomdoccontra.value=="")
																			{
																			document.registrar.nomdoccontra.focus(); //el puntero del mouse queda en nombre 
																			finalizarIns();
																			var mensaje='Debe especificar el Nombre del Docente Contratado';
																			div=document.getElementById('mensaje');
																			div.innerHTML=div.innerHTML + mensaje;
																			return 0; //devolvemos un cero para dejar de validar 
																			}
																			if(document.registrar.periododesig.value=="")
																			{
																			document.registrar.periododesig.focus(); //el puntero del mouse queda en nombre 
																			finalizarIns();
																			var mensaje='Debe especificar el Periodo de Designacion del Docente Contratado';
																			div=document.getElementById('mensaje');
																			div.innerHTML=div.innerHTML + mensaje;
																			return 0; //devolvemos un cero para dejar de validar 
																			}
																		}
																		if(desigdocent=="Docente Interino")
																		{
																			if(document.registrar.nomdocinteri.value=="")
																			{
																			document.registrar.nomdocinteri.focus(); //el puntero del mouse queda en nombre 
																			finalizarIns();
																			var mensaje='Debe especificar el Nombre del Docente Interino';
																			div=document.getElementById('mensaje');
																			div.innerHTML=div.innerHTML + mensaje;
																			return 0; //devolvemos un cero para dejar de validar 
																			}
																			if(document.registrar.periododesig.value=="")
																			{
																			document.registrar.periododesig.focus(); //el puntero del mouse queda en nombre 
																			finalizarIns();
																			var mensaje='Debe especificar el Periodo de Designacion del Docente Interino';
																			div=document.getElementById('mensaje');
																			div.innerHTML=div.innerHTML + mensaje;
																			return 0; //devolvemos un cero para dejar de validar 
																			}
																		}
																		if(desigdocent=="Docente Invitado")
																		{
																			if(document.registrar.nomdocinvi.value=="")
																			{
																			document.registrar.nomdocinvi.focus(); //el puntero del mouse queda en nombre 
																			finalizarIns();
																			var mensaje='Debe especificar el Nombre del Docente Invitado';
																			div=document.getElementById('mensaje');
																			div.innerHTML=div.innerHTML + mensaje;
																			return 0; //devolvemos un cero para dejar de validar 
																			}
																			if(document.registrar.periododesig.value=="")
																			{
																			document.registrar.periododesig.focus(); //el puntero del mouse queda en nombre 
																			finalizarIns();
																			var mensaje='Debe especificar el Periodo de Designacion del Docente Invitado';
																			div=document.getElementById('mensaje');
																			div.innerHTML=div.innerHTML + mensaje;
																			return 0; //devolvemos un cero para dejar de validar 
																			}
																		}
																}
														}//CIERRE DESIGNACIONES
														//CITACION
														if(index==9)
														{	
															if(document.registrar.citacion.value=="")
															{
															document.registrar.citacion.focus(); //el puntero del mouse queda en nombre 
															finalizarIns();
															var mensaje='Debe seleccionar una Citacion Especifica';
															div=document.getElementById('mensaje');
															div.innerHTML=div.innerHTML + mensaje;
															return 0; //devolvemos un cero para dejar de validar 
															}
															
															var citao = document.registrar.citacion.value;
															//document.getElementById("descargo1").value=citao;
																
															if(citao=="Otras Citaciones")
															{
																if(document.registrar.otroconcitacion.value=="")
																{
																document.registrar.otroconcitacion.focus();
																finalizarIns();
																var mensaje='Debe especificar el Nombre del Tipo de Citacion';
																div=document.getElementById('mensaje');
																div.innerHTML=div.innerHTML + mensaje;
																return 0; //devolvemos un cero para dejar de validar 
																}
																
															}
																if(document.registrar.refcitasao.value=="")
																{
																document.registrar.refcitasao.focus(); //el puntero del mouse queda en nombre 
																finalizarIns();
																var mensaje='Debe especificar la Referencia de la Citacion';
																div=document.getElementById('mensaje');
																div.innerHTML=div.innerHTML + mensaje;
																return 0; //devolvemos un cero para dejar de validar 
																}
																if(document.registrar.calendario6.value=="")
																{
																document.registrar.calendario6.focus(); //el puntero del mouse queda en nombre 
																finalizarIns();
																var mensaje='Debe especificar la Fecha a llevarse a cabo la Reunion/Citacion';
																div=document.getElementById('mensaje');
																div.innerHTML=div.innerHTML + mensaje;
																return 0; //devolvemos un cero para dejar de validar 
																}
																						
														}//FIN CITACION...
														//INFORME JURIDICO
														if(index==17)
														{	
															if(document.registrar.informeju.value=="")
															{
															document.registrar.informeju.focus(); //el puntero del mouse queda en nombre 
															finalizarIns();
															var mensaje='Debe seleccionar un Informe Especifico';
															div=document.getElementById('mensaje');
															div.innerHTML=div.innerHTML + mensaje;
															return 0; //devolvemos un cero para dejar de validar 
															}
															
															var infjuri = document.registrar.informeju.value;
															//document.getElementById("descargo1").value=citao;
																
															if(infjuri=="Otros Informes Juridicos")
															{
																if(document.registrar.otronomju.value=="")
																{
																document.registrar.otronomju.focus();
																finalizarIns();
																var mensaje='Debe especificar el Nombre del Informe Juridico';
																div=document.getElementById('mensaje');
																div.innerHTML=div.innerHTML + mensaje;
																return 0; //devolvemos un cero para dejar de validar 
																}
																
															}
																if(document.registrar.refinfoju.value=="")
																{
																document.registrar.refinfoju.focus(); //el puntero del mouse queda en nombre 
																finalizarIns();
																var mensaje='Debe especificar la Referencia del Informe Juridico';
																div=document.getElementById('mensaje');
																div.innerHTML=div.innerHTML + mensaje;
																return 0; //devolvemos un cero para dejar de validar 
																}
														}//FIN INFORME JURIDICO...
														//RESOLUCIONES
														if(index==105)
														{	
															if(document.registrar.resoluciones.value=="")
															{
															document.registrar.resoluciones.focus(); //el puntero del mouse queda en nombre 
															finalizarIns();
															var mensaje='Debe seleccionar una Resolucion Especifica';
															div=document.getElementById('mensaje');
															div.innerHTML=div.innerHTML + mensaje;
															return 0; //devolvemos un cero para dejar de validar 
															}
															
															var resolasa = document.registrar.resoluciones.value;
															//document.getElementById("descargo1").value=citao;
																
															if(resolasa=="Otras Resoluciones")
															{
																if(document.registrar.nomresol.value=="")
																{
																document.registrar.nomresol.focus();
																finalizarIns();
																var mensaje='Debe especificar el Nombre de la Resolucion';
																div=document.getElementById('mensaje');
																div.innerHTML=div.innerHTML + mensaje;
																return 0; //devolvemos un cero para dejar de validar 
																}
																
															}
																if(document.registrar.refresol.value=="")
																{
																document.registrar.refresol.focus(); //el puntero del mouse queda en nombre 
																finalizarIns();
																var mensaje='Debe especificar la Referencia dela Resolucion';
																div=document.getElementById('mensaje');
																div.innerHTML=div.innerHTML + mensaje;
																return 0; //devolvemos un cero para dejar de validar 
																}
																if(document.registrar.calendario7.value=="")
																{
																document.registrar.calendario7.focus();
																finalizarIns();
																var mensaje='Debe especificar la fecha de Emision de la Resolucion';
																div=document.getElementById('mensaje');
																div.innerHTML=div.innerHTML + mensaje;
																return 0; //devolvemos un cero para dejar de validar 
																}
														}//FIN RESOLUCIONES
														//REVALIDACION DE CHEQUES
														if(index==33)
														{	
															if(document.registrar.benerevache.value=="")
															{
															document.registrar.benerevache.focus(); //el puntero del mouse queda en nombre 
															finalizarIns();
															var mensaje='Debe especificar el Beneficiario del cheque a Revalidar';
															div=document.getElementById('mensaje');
															div.innerHTML=div.innerHTML + mensaje;
															return 0; //devolvemos un cero para dejar de validar 
															}
															if(document.registrar.montorevcheque.value=="")
															{
															document.registrar.montorevcheque.focus(); //el puntero del mouse queda en nombre 
															finalizarIns();
															var mensaje='Debe especificar el monto del cheque a Revalidar';
															div=document.getElementById('mensaje');
															div.innerHTML=div.innerHTML + mensaje;
															return 0; //devolvemos un cero para dejar de validar 
															}
															if(document.registrar.calendario8.value=="")
															{
															document.registrar.calendario8.focus();
															finalizarIns();
															var mensaje='Debe especificar la fecha de Emision del Cheque';
															div=document.getElementById('mensaje');
															div.innerHTML=div.innerHTML + mensaje;
															return 0; //devolvemos un cero para dejar de validar 
															}
														}//FIN REVALIDACION DE CHEQUES
														//AREDITACION
														if(index==35)
														{	
															if(document.registrar.acreditasao.value=="")
															{
															document.registrar.acreditasao.focus(); //el puntero del mouse queda en nombre 
															finalizarIns();
															var mensaje='Debe seleccionar una Acreditacion Especifica';
															div=document.getElementById('mensaje');
															div.innerHTML=div.innerHTML + mensaje;
															return 0; //devolvemos un cero para dejar de validar 
															}
															
															var acredi = document.registrar.acreditasao.value;
																															
															if(acredi=="Otras Acreditaciones")
															{
																if(document.registrar.otronomacredi.value=="")
																{
																document.registrar.otronomacredi.focus();
																finalizarIns();
																var mensaje='Debe especificar el Nombre de la Acreditacion';
																div=document.getElementById('mensaje');
																div.innerHTML=div.innerHTML + mensaje;
																return 0; //devolvemos un cero para dejar de validar 
																}
																
															}
																if(document.registrar.nomfrenacre.value=="")
																{
																document.registrar.nomfrenacre.focus(); //el puntero del mouse queda en nombre 
																finalizarIns();
																var mensaje='Debe especificar el Nombre del Frente Ganador';
																div=document.getElementById('mensaje');
																div.innerHTML=div.innerHTML + mensaje;
																return 0; //devolvemos un cero para dejar de validar 
																}
														}//FIN ACREDITACIONES
														//REINCORPORACION DOCENTE
														if(index==43)
														{	
															if(document.registrar.causareincorpo.value=="")
															{
															document.registrar.causareincorpo.focus(); //el puntero del mouse queda en nombre 
															finalizarIns();
															var mensaje='Debe especificar la Causa de la Reincorporacion';
															div=document.getElementById('mensaje');
															div.innerHTML=div.innerHTML + mensaje;
															return 0; //devolvemos un cero para dejar de validar 
															}
															if(document.registrar.nombredocrein.value=="")
															{
															document.registrar.nombredocrein.focus(); //el puntero del mouse queda en nombre 
															finalizarIns();
															var mensaje='Debe especificar el Nombre del Docente';
															div=document.getElementById('mensaje');
															div.innerHTML=div.innerHTML + mensaje;
															return 0; //devolvemos un cero para dejar de validar 
															}
															if(document.registrar.calendario9.value=="")
															{
															document.registrar.calendario9.focus();
															finalizarIns();
															var mensaje='Debe especificar la Fecha de Reincorporacion';
															div=document.getElementById('mensaje');
															div.innerHTML=div.innerHTML + mensaje;
															return 0; //devolvemos un cero para dejar de validar 
															}
														}//FIN REINCORPORACION DOCENTE
														//LICENCIAS
														if(index==45)
														{	
															if(document.registrar.licenciaadm.value=="")
															{
															document.registrar.licenciaadm.focus(); //el puntero del mouse queda en nombre 
															finalizarIns();
															var mensaje='Debe seleccionar una Licencia Especifica';
															div=document.getElementById('mensaje');
															div.innerHTML=div.innerHTML + mensaje;
															return 0; //devolvemos un cero para dejar de validar 
															}
															
															var licencen = document.registrar.licenciaadm.value;
																															
															if(licencen=="Otras Licencias")
															{
																if(document.registrar.nomlicencia.value=="")
																{
																document.registrar.nomlicencia.focus();
																finalizarIns();
																var mensaje='Debe especificar el Nombre de la Licencia';
																div=document.getElementById('mensaje');
																div.innerHTML=div.innerHTML + mensaje;
																return 0; //devolvemos un cero para dejar de validar 
																}
																
															}
																if(document.registrar.motivlicen.value=="")
																{
																document.registrar.motivlicen.focus(); //el puntero del mouse queda en nombre 
																finalizarIns();
																var mensaje='Debe especificar el motivo de la Licencia';
																div=document.getElementById('mensaje');
																div.innerHTML=div.innerHTML + mensaje;
																return 0; //devolvemos un cero para dejar de validar 
																}
																if(document.registrar.nomdocadm.value=="")
																{
																document.registrar.nomdocadm.focus(); //el puntero del mouse queda en nombre 
																finalizarIns();
																var mensaje='Debe especificar Nombre del Docente o Administrativo';
																div=document.getElementById('mensaje');
																div.innerHTML=div.innerHTML + mensaje;
																return 0; //devolvemos un cero para dejar de validar 
																}
																if(document.registrar.calendario3.value=="")
																{
																document.registrar.calendario3.focus(); //el puntero del mouse queda en nombre 
																finalizarIns();
																var mensaje='Debe especificar la Fecha de Inicio de la Licencia Solicitada';
																div=document.getElementById('mensaje');
																div.innerHTML=div.innerHTML + mensaje;
																return 0; //devolvemos un cero para dejar de validar 
																}
																if(document.registrar.calendario4.value=="")
																{
																document.registrar.calendario4.focus(); //el puntero del mouse queda en nombre 
																finalizarIns();
																var mensaje='Debe especificar la Fecha de Conclusion de la Licencia Solicitada';
																div=document.getElementById('mensaje');
																div.innerHTML=div.innerHTML + mensaje;
																return 0; //devolvemos un cero para dejar de validar 
																}
														}//FIN LICENCIAS
														//NOMBRAMIENTOS
														if(index==67)
														{	
															if(document.registrar.nombramiento.value=="")
															{
															document.registrar.nombramiento.focus(); //el puntero del mouse queda en nombre 
															finalizarIns();
															var mensaje='Debe seleccionar un Nombramiento Especifico';
															div=document.getElementById('mensaje');
															div.innerHTML=div.innerHTML + mensaje;
															return 0; //devolvemos un cero para dejar de validar 
															}
															
															var nombra = document.registrar.nombramiento.value;
																															
															if(nombra=="Nombramiento Director de Instituto")
															{
																if(document.registrar.nominstitute.value=="")
																{
																document.registrar.nominstitute.focus();
																finalizarIns();
																var mensaje='Debe especificar el Nombre del Instituto';
																div=document.getElementById('mensaje');
																div.innerHTML=div.innerHTML + mensaje;
																return 0; //devolvemos un cero para dejar de validar 
																}
																
															}
															if(!document.getElementsByName("docdesig")[0].checked && !document.getElementsByName("docdesig")[1].checked)
															{	
															finalizarIns();
															var mensaje='Debe seleccionar si la Autoridad es Titular o Interino';
															div=document.getElementById('mensaje');
															div.innerHTML=div.innerHTML + mensaje;
															return 0; //devolvemos un cero para dejar de validar }
															}
															
															else
															{
																	if(!document.getElementsByName("docdesig")[0].checked)
																	{	var servicom = !document.getElementsByName("docdesig")[1].checked;
																		document.getElementById("servime").value=servicom;
																		//entonces es interino
																																				
																		if(document.registrar.nomdocdesig.value=="")
																		{
																		document.registrar.nomdocdesig.focus(); //el puntero del mouse queda en nombre 
																		finalizarIns();
																		var mensaje='Debe especificar el Nombre de la Autoridad Nombrada';
																		div=document.getElementById('mensaje');
																		div.innerHTML=div.innerHTML + mensaje;
																		return 0; //devolvemos un cero para dejar de validar 
																		}
																		if(document.registrar.calendario1.value=="")
																		{
																		document.registrar.calendario1.focus(); //el puntero del mouse queda en nombre 
																		finalizarIns();
																		var mensaje='Debe especificar la Fecha de inicio de la Autoridad';
																		div=document.getElementById('mensaje');
																		div.innerHTML=div.innerHTML + mensaje;
																		return 0; //devolvemos un cero para dejar de validar 
																		}
																	}
																	else
																	{	
																		var bibien = !document.getElementsByName("docdesig")[1].checked;
																		document.getElementById("bienen").value=bibien;
																		//entonces es Titular
																			
																		if(document.registrar.nomdocdesig.value=="")
																		{
																		document.registrar.nomdocdesig.focus(); //el puntero del mouse queda en nombre 
																		finalizarIns();
																		var mensaje='Debe especificar el Nombre de la Autoridad Nombrada';
																		div=document.getElementById('mensaje');
																		div.innerHTML=div.innerHTML + mensaje;
																		return 0; //devolvemos un cero para dejar de validar 
																		}
																		if(document.registrar.calendario1.value=="")
																		{
																		document.registrar.calendario1.focus(); //el puntero del mouse queda en nombre 
																		finalizarIns();
																		var mensaje='Debe especificar la Fecha de inicio de la Autoridad';
																		div=document.getElementById('mensaje');
																		div.innerHTML=div.innerHTML + mensaje;
																		return 0; //devolvemos un cero para dejar de validar 
																		}
																		if(document.registrar.durcargonom.value=="")
																		{
																		document.registrar.durcargonom.focus(); //el puntero del mouse queda en nombre 
																		finalizarIns();
																		var mensaje='Debe especificar la Duracion del Cargo';
																		div=document.getElementById('mensaje');
																		div.innerHTML=div.innerHTML + mensaje;
																		return 0; //devolvemos un cero para dejar de validar 
																		}
																	}
															}
														}//FIN NOMBRAMIENTOS
														//AÑO SABATICO
														if(index==56)
														{	
															if(document.registrar.nombresabatico.value=="")
															{
															document.registrar.nombresabatico.focus(); //el puntero del mouse queda en nombre 
															finalizarIns();
															var mensaje='Debe especificar el Nombre del Docente Beneficiario';
															div=document.getElementById('mensaje');
															div.innerHTML=div.innerHTML + mensaje;
															return 0; //devolvemos un cero para dejar de validar 
															}
															if(document.registrar.calendario10.value=="")
															{
															document.registrar.calendario10.focus(); //el puntero del mouse queda en nombre 
															finalizarIns();
															var mensaje='Debe especificar la Fecha de Inicio de la Solicitud';
															div=document.getElementById('mensaje');
															div.innerHTML=div.innerHTML + mensaje;
															return 0; //devolvemos un cero para dejar de validar 
															}
															if(document.registrar.calendario11.value=="")
															{
															document.registrar.calendario11.focus();
															finalizarIns();
															var mensaje='Debe especificar la Fecha de Conclusion de la Solicitud';
															div=document.getElementById('mensaje');
															div.innerHTML=div.innerHTML + mensaje;
															return 0; //devolvemos un cero para dejar de validar 
															}
														}//FIN AÑO SABATICO
														//COMUNICADO
														if(index==72)
														{	
															if(document.registrar.refcomunicado.value=="")
															{
															document.registrar.refcomunicado.focus(); //el puntero del mouse queda en nombre 
															finalizarIns();
															var mensaje='Debe especificar la Referencia o Tenor del Comunicado';
															div=document.getElementById('mensaje');
															div.innerHTML=div.innerHTML + mensaje;
															return 0; //devolvemos un cero para dejar de validar 
															}
															if(document.registrar.calendario12.value=="")
															{
															document.registrar.calendario12.focus(); //el puntero del mouse queda en nombre 
															finalizarIns();
															var mensaje='Debe especificar la Fecha a llevarse a cabo el Evento';
															div=document.getElementById('mensaje');
															div.innerHTML=div.innerHTML + mensaje;
															return 0; //devolvemos un cero para dejar de validar 
															}
															if(document.registrar.numinscomuni.value=="")
															{
															document.registrar.numinscomuni.focus(); //el puntero del mouse queda en nombre 
															finalizarIns();
															var mensaje='Debe especificar el Numero de Instructivo del Comunicado';
															div=document.getElementById('mensaje');
															div.innerHTML=div.innerHTML + mensaje;
															return 0; //devolvemos un cero para dejar de validar 
															}
														}//FIN COMUNICADO
														//CONCLUSION DE ESTUDIOS
														if(index==2)
														{	
															if(document.registrar.nomestcon.value=="")
															{
															document.registrar.nomestcon.focus(); //el puntero del mouse queda en nombre 
															finalizarIns();
															var mensaje='Debe especificar el Nombre de Estudiante';
															div=document.getElementById('mensaje');
															div.innerHTML=div.innerHTML + mensaje;
															return 0; //devolvemos un cero para dejar de validar 
															}
															if(document.registrar.numinfkar.value=="")
															{
															document.registrar.numinfkar.focus(); //el puntero del mouse queda en nombre 
															finalizarIns();
															var mensaje='Debe especificar el Numero de Informe de Kardex';
															div=document.getElementById('mensaje');
															div.innerHTML=div.innerHTML + mensaje;
															return 0; //devolvemos un cero para dejar de validar 
															}
														}//FIN CONCLLUSION DE ESTUDIOS
														//MEMORANDUM
														if(index==20)
														{	
															if(document.registrar.memoran.value=="")
															{
															document.registrar.memoran.focus(); //el puntero del mouse queda en nombre 
															finalizarIns();
															var mensaje='Debe seleccionar un Memorandum Especifico';
															div=document.getElementById('mensaje');
															div.innerHTML=div.innerHTML + mensaje;
															return 0; //devolvemos un cero para dejar de validar 
															}
															
															var memorandum = document.registrar.memoran.value;
																															
															if(memorandum=="Otros Memorandums")
															{
																if(document.registrar.nommemoran.value=="")
																{
																document.registrar.nommemoran.focus();
																finalizarIns();
																var mensaje='Debe especificar el Denominativo del Memorandum';
																div=document.getElementById('mensaje');
																div.innerHTML=div.innerHTML + mensaje;
																return 0; //devolvemos un cero para dejar de validar 
																}
																
															}
																if(document.registrar.motimemo.value=="")
																{
																document.registrar.motimemo.focus(); //el puntero del mouse queda en nombre 
																finalizarIns();
																var mensaje='Debe especificar el Motivo del Memorandum';
																div=document.getElementById('mensaje');
																div.innerHTML=div.innerHTML + mensaje;
																return 0; //devolvemos un cero para dejar de validar 
																}
																if(document.registrar.nompersonmemo.value=="")
																{
																document.registrar.nompersonmemo.focus(); //el puntero del mouse queda en nombre 
																finalizarIns();
																var mensaje='Debe especificar el Nombre de la Persona';
																div=document.getElementById('mensaje');
																div.innerHTML=div.innerHTML + mensaje;
																return 0; //devolvemos un cero para dejar de validar 
																}
														}//FIN MEMORANDUM
														//CONVENIOS
														if(index==70)
														{	
															if(document.registrar.nomconvenio.value=="")
															{
															document.registrar.nomconvenio.focus(); //el puntero del mouse queda en nombre 
															finalizarIns();
															var mensaje='Debe especificar el Titulo del Convenio';
															div=document.getElementById('mensaje');
															div.innerHTML=div.innerHTML + mensaje;
															return 0; //devolvemos un cero para dejar de validar 
															}
															if(document.registrar.calendario13.value=="")
															{
															document.registrar.calendario13.focus(); //el puntero del mouse queda en nombre 
															finalizarIns();
															var mensaje='Debe especificar la Fecha de Inicio del Convenio';
															div=document.getElementById('mensaje');
															div.innerHTML=div.innerHTML + mensaje;
															return 0; //devolvemos un cero para dejar de validar 
															}
														}//FIN CONCLLUSION DE ESTUDIOS
														
														//INCLUSO LOS TRAMITES OOOOOTROOOOS QUE SON EL 106 107 108
														if(index==106 || index==107 || index==108)
														{
																	if(document.registrar.nomtraminuevo.value=="")
																	{
																	document.registrar.nomtraminuevo.focus(); //el puntero del mouse queda en nombre 
																	finalizarIns();
																	var mensaje='Debe especificar el Nombre del Nuevo Tramite';
																	div=document.getElementById('mensaje');
																	div.innerHTML=div.innerHTML + mensaje;
																	return 0; //devolvemos un cero para dejar de validar 
																	}
																	if(document.registrar.refabierto.value=="")
																	{
																	document.registrar.refabierto.focus(); //el puntero del mouse queda en nombre 
																	finalizarIns();
																	var mensaje='Debe especificar la Referencia del Tramite';
																	div=document.getElementById('mensaje');
																	div.innerHTML=div.innerHTML + mensaje;
																	return 0; //devolvemos un cero para dejar de validar 
																	}
														}//FIN OTROS TRAMITES ACADEMICOS ADMINISTRATIVOS Y FINANCIEROS
														//OTROS SIN REQUISITOS
														if(index==31 || index==30 || index==46 || index==15 || index==84 || index==39 || index==40 || index==85 ||index==32 || index==80 || index==73 || index==87 || index==78 || index==68 || index==83 || index==5 || index==16)
														{
															
																if(document.registrar.refabierto.value=="")
																	{
																	document.registrar.refabierto.focus(); //el puntero del mouse queda en nombre 
																	finalizarIns();
																	var mensaje='Debe especificar la Referencia del Tramite';
																	div=document.getElementById('mensaje');
																	div.innerHTML=div.innerHTML + mensaje;
																	return 0; //devolvemos un cero para dejar de validar 
																	}
															
														}//FIN TRAMITES QUE NO TIENES PREREQUISITOS
												}//cierre del else grande
	//SI QUIEREN AUMENTAR TRAMITES ANTES DEL IF CON index==106 || index==107 || index==108												
   document.registrar.submit(); //enviamos formulario  
}//cierre function javascript
