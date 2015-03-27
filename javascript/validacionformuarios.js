// JavaScript Document
function verifica()
{  //VALIDADCION DE CAMPOS COMUNES
	//effffffff
	/*if(document.reg_despacho.fTheFileField1.value.length < 1)
	{
	document.reg_despacho.fTheFileField1.focus();
	finalizarIns();
	var mensaje='Debe Cargar el Documento Adjunto con extension Word, Excel o Pdf';
	div=document.getElementById('mensaje');
	div.innerHTML=div.innerHTML + mensaje;
    return 0;
	} 
	*/
	var docu = document.reg_despacho.fTheFileField1.value;
	var partido = docu.split(".");
	for(var i = 0; i < partido.length; i++)
	{
	var extension = partido[i].toLowerCase(); 
	}
	
	if( extension != "pdf" && extension != "doc" && extension != "docx" && extension != "xls" && extension != "xlsx" && extension != "")
	{
		document.reg_despacho.fTheFileField1.focus();
		finalizarIns();
		var mensaje='EL archivo tiene que ser Word, Excel o PDF';
		div=document.getElementById('mensaje');
		div.innerHTML=div.innerHTML + mensaje;
		return 0;
	}
	///////efffff
	//PARA reg_despacho_x.php
	if(document.reg_despacho.correlativo.value=="")
	{ //si el largo de marca es menor a 2 caracteres 
        document.reg_despacho.correlativo.focus(); //el puntero del mouse queda en marca 
		finalizarIns();
		var mensaje='Debe ingresar el Número Correlativo';
		div=document.getElementById('mensaje');
		div.innerHTML=div.innerHTML + mensaje;
        return 0; //devolvemos un cero para dejar de validar 
    }
	if((document.reg_despacho.destino.value=="") && (document.reg_despacho.otro.value==""))
	{   //si el largo de nombre es menor a 2 caracteres 
        document.reg_despacho.destino.focus(); //el puntero del mouse queda en nombre 
		finalizarIns();
		var mensaje='Debe especificar el Destino del trámite';
		div=document.getElementById('mensaje');
		div.innerHTML=div.innerHTML + mensaje;
        return 0; //devolvemos un cero para dejar de validar 
    }
	if(document.reg_despacho.fojas.value=="")
	{ //si el largo de precio es igual o menor a 0 caracteres 
        document.reg_despacho.fojas.focus(); //el puntero del mouse queda en precio 
		finalizarIns();
		var mensaje='Debe ingresar el Número de Fojas';
		div=document.getElementById('mensaje');
		div.innerHTML=div.innerHTML + mensaje;
        return 0; //devolvemos un cero para dejar de validar 
    }
	if(document.reg_despacho.estado.value=="")
	{ //si el largo de precio es igual o menor a 0 caracteres 
        document.reg_despacho.estado.focus(); //el puntero del mouse queda en precio 
		finalizarIns();
		var mensaje='Debe seleccionar el Estado del Trámite';
		div=document.getElementById('mensaje');
		div.innerHTML=div.innerHTML + mensaje;
        return 0; //devolvemos un cero para dejar de validar 
    }
    if(document.reg_despacho.marco.value=="")
	{   //si el largo de nombre es menor a 2 caracteres 
        document.reg_despacho.marco.focus(); //el puntero del mouse queda en nombre 
		finalizarIns();
		var mensaje='Debe especificar el Tipo de Trámite';
		div=document.getElementById('mensaje');
		div.innerHTML=div.innerHTML + mensaje;
        return 0; //devolvemos un cero para dejar de validar 
    }
	//DESDE AQUI VALIDAMOS LOS CAMPOS LLAMADOS CON AJAX SOLICITUD DE COMPRA
													if(document.reg_despacho.tramix.value=="")
													{   //si el largo de nombre es menor a 2 caracteres 
														document.reg_despacho.tramix.focus(); //el puntero del mouse queda en nombre 
														finalizarIns();
														var mensaje='Debe seleccionar un Tramite Especifico';
														div=document.getElementById('mensaje');
														div.innerHTML=div.innerHTML + mensaje;
														return 0; //devolvemos un cero para dejar de validar 
													}
													else
													{	
														//valor del combo seleccionado......esta en index que es el id de la tabla tramites
														var index=document.reg_despacho.tramix.value;
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
																		if(document.reg_despacho.beneser.value=="")
																		{
																		document.reg_despacho.beneser.focus(); //el puntero del mouse queda en nombre 
																		finalizarIns();
																		var mensaje='Debe llenar el Nombre del Proveedor';
																		div=document.getElementById('mensaje');
																		div.innerHTML=div.innerHTML + mensaje;
																		return 0; //devolvemos un cero para dejar de validar 
																		}
																		if(document.reg_despacho.descser.value=="")
																		{
																		document.reg_despacho.descser.focus(); //el puntero del mouse queda en nombre 
																		finalizarIns();
																		var mensaje='Debe llenar la Descripcion del Servicio';
																		div=document.getElementById('mensaje');
																		div.innerHTML=div.innerHTML + mensaje;
																		return 0; //devolvemos un cero para dejar de validar 
																		}
																		if(document.reg_despacho.deser.value=="")
																		{
																		document.reg_despacho.deser.focus(); //el puntero del mouse queda en nombre 
																		finalizarIns();
																		var mensaje='Debe especificar el Destino del Servicio';
																		div=document.getElementById('mensaje');
																		div.innerHTML=div.innerHTML + mensaje;
																		return 0; //devolvemos un cero para dejar de validar 
																		}
																		if(document.reg_despacho.montoser.value=="")
																		{
																		document.reg_despacho.montoser.focus(); //el puntero del mouse queda en nombre 
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
																		if(document.reg_despacho.benebien.value=="")
																		{
																		document.reg_despacho.benebien.focus(); //el puntero del mouse queda en nombre 
																		finalizarIns();
																		var mensaje='Debe llenar el Nombre del Descriptivo del Bien';
																		div=document.getElementById('mensaje');
																		div.innerHTML=div.innerHTML + mensaje;
																		return 0; //devolvemos un cero para dejar de validar 
																		}
																		if(document.reg_despacho.descbien.value=="")
																		{
																		document.reg_despacho.descbien.focus(); //el puntero del mouse queda en nombre 
																		finalizarIns();
																		var mensaje='Debe llenar la Descripcion del Bien';
																		div=document.getElementById('mensaje');
																		div.innerHTML=div.innerHTML + mensaje;
																		return 0; //devolvemos un cero para dejar de validar 
																		}
																		if(document.reg_despacho.desbien.value=="")
																		{
																		document.reg_despacho.desbien.focus(); //el puntero del mouse queda en nombre 
																		finalizarIns();
																		var mensaje='Debe especificar el Destino del Bien';
																		div=document.getElementById('mensaje');
																		div.innerHTML=div.innerHTML + mensaje;
																		return 0; //devolvemos un cero para dejar de validar 
																		}
																		if(document.reg_despacho.monbien.value=="")
																		{
																		document.reg_despacho.monbien.focus(); //el puntero del mouse queda en nombre 
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
																if(document.reg_despacho.pago.value=="")
																	{   //si el largo de nombre es menor a 2 caracteres 
																		document.reg_despacho.pago.focus();  
																		finalizarIns();
																		var mensaje='Debe Seleccionar un Pago Especifico';
																		div=document.getElementById('mensaje');
																		div.innerHTML=div.innerHTML + mensaje;
																		return 0; //devolvemos un cero para dejar de validar 
																	}
																
																var pag = document.reg_despacho.pago.value;
																document.getElementById("pagosol").value=pag;
																
																if(pag=="Beca Trabajo")
																{
																	if(document.reg_despacho.nombrebeca.value=="")
																	{
																		document.reg_despacho.nombrebeca.focus(); //el puntero del mouse queda en nombre 
																		finalizarIns();
																		var mensaje='Debe especificar el Nombre del Becario';
																		div=document.getElementById('mensaje');
																		div.innerHTML=div.innerHTML + mensaje;
																		return 0; //devolvemos un cero para dejar de validar 
																	}
																}
																if(pag=="Beca Investigacion")
																{
																	if(document.reg_despacho.nombrebecainv.value=="")
																	{
																		document.reg_despacho.nombrebecainv.focus(); //el puntero del mouse queda en nombre 
																		finalizarIns();
																		var mensaje='Debe especificar el nombre del Becario de Investigacion';
																		div=document.getElementById('mensaje');
																		div.innerHTML=div.innerHTML + mensaje;
																		return 0; //devolvemos un cero para dejar de validar 
																	}
																}
																if(pag=="Consultor por Producto")
																{
																	if(document.reg_despacho.nombreconprod.value=="")
																	{
																		document.reg_despacho.nombreconprod.focus(); //el puntero del mouse queda en nombre 
																		finalizarIns();
																		var mensaje='Debe especificar el nombre del Consultor por Producto';
																		div=document.getElementById('mensaje');
																		div.innerHTML=div.innerHTML + mensaje;
																		return 0; //devolvemos un cero para dejar de validar 
																	}
																}
																if(pag=="Consultor en linea")
																{
																	if(document.reg_despacho.nombreconlin.value=="")
																	{
																		document.reg_despacho.nombreconlin.focus(); //el puntero del mouse queda en nombre 
																		finalizarIns();
																		var mensaje='Debe especificar el nombre del Consultor en Linea';
																		div=document.getElementById('mensaje');
																		div.innerHTML=div.innerHTML + mensaje;
																		return 0; //devolvemos un cero para dejar de validar 
																	}
																}
																if(pag=="Servicios Manuales")
																{
																	if(document.reg_despacho.nombremanual.value=="")
																	{
																		document.reg_despacho.nombremanual.focus(); //el puntero del mouse queda en nombre 
																		finalizarIns();
																		var mensaje='Debe especificar el nombre de la Persona Natural que presta el Servicio';
																		div=document.getElementById('mensaje');
																		div.innerHTML=div.innerHTML + mensaje;
																		return 0; //devolvemos un cero para dejar de validar 
																	}
																}
																if(pag=="Servicios no Personales")
																{
																	if(document.reg_despacho.nombrepersonal.value=="")
																	{
																		document.reg_despacho.nombrepersonal.focus(); //el puntero del mouse queda en nombre 
																		finalizarIns();
																		var mensaje='Debe especificar el nombre de la Persona Natural que presta el Servicio';
																		div=document.getElementById('mensaje');
																		div.innerHTML=div.innerHTML + mensaje;
																		return 0; //devolvemos un cero para dejar de validar 
																	}
																}
																if(pag=="Pago Grupal")
																{
																	if(document.reg_despacho.nombrepersonales.value=="")
																	{
																		document.reg_despacho.nombrepersonales.focus(); //el puntero del mouse queda en nombre 
																		finalizarIns();
																		var mensaje='Debe especificar el nombre de todas las Personas';
																		div=document.getElementById('mensaje');
																		div.innerHTML=div.innerHTML + mensaje;
																		return 0; //devolvemos un cero para dejar de validar 
																	}
																}
																if(document.reg_despacho.mesperiodo.value=="")
																{
																		document.reg_despacho.mesperiodo.focus(); //el puntero del mouse queda en nombre 
																		finalizarIns();
																		var mensaje='Debe especificar el mes o Periodo a Pagarse';
																		div=document.getElementById('mensaje');
																		div.innerHTML=div.innerHTML + mensaje;
																		return 0; //devolvemos un cero para dejar de validar 
																}
																if(document.reg_despacho.montopago.value=="")
																{
																		document.reg_despacho.montopago.focus(); //el puntero del mouse queda en nombre 
																		finalizarIns();
																		var mensaje='Debe especificar el monto que se va Pagar';
																		div=document.getElementById('mensaje');
																		div.innerHTML=div.innerHTML + mensaje;
																		return 0; //devolvemos un cero para dejar de validar 
																}
																if(document.reg_despacho.unidsoli.value=="")
																{
																		document.reg_despacho.unidsoli.focus(); //el puntero del mouse queda en nombre 
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
																if(document.reg_despacho.respfon.value=="")
																{
																		document.reg_despacho.respfon.focus(); //el puntero del mouse queda en nombre 
																		finalizarIns();
																		var mensaje='Debe especificar el Nombre del Responsable del fondo en Avance';
																		div=document.getElementById('mensaje');
																		div.innerHTML=div.innerHTML + mensaje;
																		return 0; //devolvemos un cero para dejar de validar 
																}
																if(document.reg_despacho.objfon.value=="")
																{
																		document.reg_despacho.objfon.focus(); //el puntero del mouse queda en nombre 
																		finalizarIns();
																		var mensaje='Debe especificar el Objetivo de la Apertura del Fondo en Avance';
																		div=document.getElementById('mensaje');
																		div.innerHTML=div.innerHTML + mensaje;
																		return 0; //devolvemos un cero para dejar de validar 
																}
																if(document.reg_despacho.unitsolfon.value=="")
																{
																		document.reg_despacho.unitsolfon.focus(); //el puntero del mouse queda en nombre 
																		finalizarIns();
																		var mensaje='Debe especificar la Unidad Solicitante del Fondo en Avance';
																		div=document.getElementById('mensaje');
																		div.innerHTML=div.innerHTML + mensaje;
																		return 0; //devolvemos un cero para dejar de validar 
																}
																if(document.reg_despacho.montofon.value=="")
																{
																		document.reg_despacho.montofon.focus(); //el puntero del mouse queda en nombre 
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
																var pag = document.reg_despacho.rotatorio.value;
																document.getElementById("fondorota").value=pag;
																
																if(pag=="Fondo Rotatorio Apertura Fondo Mantenimiento" || pag=="Fondo Rotatorio Apertura Caja Chica")
																{
																	if(document.reg_despacho.respfonrota.value=="")
																	{
																		document.reg_despacho.respfonrota.focus(); //el puntero del mouse queda en nombre 
																		finalizarIns();
																		var mensaje='Debe especificar el Nombre del Responsable del Fondo';
																		div=document.getElementById('mensaje');
																		div.innerHTML=div.innerHTML + mensaje;
																		return 0; //devolvemos un cero para dejar de validar 
																	}
																	if(document.reg_despacho.objfonrota.value=="")
																	{
																		document.reg_despacho.objfonrota.focus(); //el puntero del mouse queda en nombre 
																		finalizarIns();
																		var mensaje='Debe especificar el Objetivo Fondo Rotatorio';
																		div=document.getElementById('mensaje');
																		div.innerHTML=div.innerHTML + mensaje;
																		return 0; //devolvemos un cero para dejar de validar 
																	}
																	if(document.reg_despacho.montofonrota.value=="")
																	{
																		document.reg_despacho.montofonrota.focus(); //el puntero del mouse queda en nombre 
																		finalizarIns();
																		var mensaje='Debe especificar el Monto del Fondo Rotatorio';
																		div=document.getElementById('mensaje');
																		div.innerHTML=div.innerHTML + mensaje;
																		return 0; //devolvemos un cero para dejar de validar 
																	}
																}
																else
																{
																	if(document.reg_despacho.nomfonrota.value=="")
																	{
																		document.reg_despacho.nomfonrota.focus(); //el puntero del mouse queda en nombre 
																		finalizarIns();
																		var mensaje='Debe especificar el Nombre del Fondo Rotatorio';
																		div=document.getElementById('mensaje');
																		div.innerHTML=div.innerHTML + mensaje;
																		return 0; //devolvemos un cero para dejar de validar 
																	}
																	if(document.reg_despacho.respfonrota.value=="")
																	{
																		document.reg_despacho.respfonrota.focus(); //el puntero del mouse queda en nombre 
																		finalizarIns();
																		var mensaje='Debe especificar el Nombre del Responsable del Fondo';
																		div=document.getElementById('mensaje');
																		div.innerHTML=div.innerHTML + mensaje;
																		return 0; //devolvemos un cero para dejar de validar 
																	}
																	if(document.reg_despacho.objfonrota.value=="")
																	{
																		document.reg_despacho.objfonrota.focus(); //el puntero del mouse queda en nombre 
																		finalizarIns();
																		var mensaje='Debe especificar el Objetivo Fondo Rotatorio';
																		div=document.getElementById('mensaje');
																		div.innerHTML=div.innerHTML + mensaje;
																		return 0; //devolvemos un cero para dejar de validar 
																	}
																	if(document.reg_despacho.montofonrota.value=="")
																	{
																		document.reg_despacho.montofonrota.focus(); //el puntero del mouse queda en nombre 
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
																if(document.reg_despacho.descargo.value=="")
																	{   //si el largo de nombre es menor a 2 caracteres 
																		document.reg_despacho.descargo.focus();  
																		finalizarIns();
																		var mensaje='Debe Seleccionar un Descargo Especifico del Tramite';
																		div=document.getElementById('mensaje');
																		div.innerHTML=div.innerHTML + mensaje;
																		return 0; //devolvemos un cero para dejar de validar 
																	}
																
																var pag = document.reg_despacho.descargo.value;
																document.getElementById("descargo1").value=pag;
																
																if(pag=="Descargo de Fondo en Avance")
																{
																	if(document.reg_despacho.desresponfon.value=="")
																	{
																		document.reg_despacho.desresponfon.focus();
																		finalizarIns();
																		var mensaje='Debe especificar el Nombre del Responsable del Fondo';
																		div=document.getElementById('mensaje');
																		div.innerHTML=div.innerHTML + mensaje;
																		return 0; //devolvemos un cero para dejar de validar 
																	}
																	if(document.reg_despacho.descaractiviti.value=="")
																	{
																		document.reg_despacho.descaractiviti.focus();
																		finalizarIns();
																		var mensaje='Debe especificar la Actividad Correspondiente al Descargo';
																		div=document.getElementById('mensaje');
																		div.innerHTML=div.innerHTML + mensaje;
																		return 0; //devolvemos un cero para dejar de validar 
																	}
																	if(document.reg_despacho.desunisol.value=="")
																	{
																		document.reg_despacho.desunisol.focus();
																		finalizarIns();
																		var mensaje='Debe especificar la Unidad Solicitante';
																		div=document.getElementById('mensaje');
																		div.innerHTML=div.innerHTML + mensaje;
																		return 0; //devolvemos un cero para dejar de validar 
																	}
																	if(document.reg_despacho.desmontofon.value=="")
																	{
																		document.reg_despacho.desmontofon.focus();
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
																																																										if(document.reg_despacho.desnrobole.value=="")
																				{
																					document.reg_despacho.desnrobole.focus(); //el puntero del mouse queda en nombre 
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
																	if(document.reg_despacho.descargorota.value=="")
																	{   //si el largo de nombre es menor a 2 caracteres 
																		document.reg_despacho.descargorota.focus();  
																		finalizarIns();
																		var mensaje='Debe Seleccionar un Descargo Rotatorio Especifico';
																		div=document.getElementById('mensaje');
																		div.innerHTML=div.innerHTML + mensaje;
																		return 0; //devolvemos un cero para dejar de validar 
																	}
																	//sacar el valor del combo descargo fondo rotatorio
																	var varita = document.reg_despacho.descargorota.value;
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
																																																												if(document.reg_despacho.desrotacajades.value=="")
																					{
																						document.reg_despacho.desrotacajades.focus(); //el puntero del mouse queda en nombre 
																						finalizarIns();
																						var mensaje='Debe especificar el Nombre del Responsable del Fondo';
																						div=document.getElementById('mensaje');
																						div.innerHTML=div.innerHTML + mensaje;
																						return 0; //devolvemos un cero para dejar de validar 
																					}
																					if(document.reg_despacho.desrotacajauni.value=="")
																					{
																						document.reg_despacho.desrotacajauni.focus(); //el puntero del mouse queda en nombre 
																						finalizarIns();
																						var mensaje='Debe especificar la Unidad Solicitante';
																						div=document.getElementById('mensaje');
																						div.innerHTML=div.innerHTML + mensaje;
																						return 0; //devolvemos un cero para dejar de validar 
																					}
																					if(document.reg_despacho.desrotacajamonto.value=="")
																					{
																						document.reg_despacho.desrotacajamonto.focus(); //el puntero del mouse queda en nombre 
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
																																																															if(document.reg_despacho.desnrobole1.value=="")
																									{
																										document.reg_despacho.desnrobole1.focus(); //el puntero del mouse queda en nombre 
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
																				
																				if(document.reg_despacho.desrotacajades1.value=="")
																					{
																						document.reg_despacho.desrotacajades1.focus(); //el puntero del mouse queda en nombre 
																						finalizarIns();
																						var mensaje='Debe especificar el Nombre del Responsable del Fondo';
																						div=document.getElementById('mensaje');
																						div.innerHTML=div.innerHTML + mensaje;
																						return 0; //devolvemos un cero para dejar de validar 
																					}
																					if(document.reg_despacho.desrotacajauni1.value=="")
																					{
																						document.reg_despacho.desrotacajauni1.focus(); //el puntero del mouse queda en nombre 
																						finalizarIns();
																						var mensaje='Debe especificar la Unidad Solicitante';
																						div=document.getElementById('mensaje');
																						div.innerHTML=div.innerHTML + mensaje;
																						return 0; //devolvemos un cero para dejar de validar 
																					}
																					if(document.reg_despacho.desrotacajamonto1.value=="")
																					{
																						document.reg_despacho.desrotacajamonto1.focus(); //el puntero del mouse queda en nombre 
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
																																																															if(document.reg_despacho.desnrobole1.value=="")
																									{
																										document.reg_despacho.desnrobole1.focus(); //el puntero del mouse queda en nombre 
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
																																																												if(document.reg_despacho.desrotacajades.value=="")
																					{
																						document.reg_despacho.desrotacajades.focus(); //el puntero del mouse queda en nombre 
																						finalizarIns();
																						var mensaje='Debe especificar el Nombre del Responsable del Fondo';
																						div=document.getElementById('mensaje');
																						div.innerHTML=div.innerHTML + mensaje;
																						return 0; //devolvemos un cero para dejar de validar 
																					}
																					if(document.reg_despacho.desrotacajauni.value=="")
																					{
																						document.reg_despacho.desrotacajauni.focus(); //el puntero del mouse queda en nombre 
																						finalizarIns();
																						var mensaje='Debe especificar la Unidad Solicitante';
																						div=document.getElementById('mensaje');
																						div.innerHTML=div.innerHTML + mensaje;
																						return 0; //devolvemos un cero para dejar de validar 
																					}
																					if(document.reg_despacho.desrotacajamonto.value=="")
																					{
																						document.reg_despacho.desrotacajamonto.focus(); //el puntero del mouse queda en nombre 
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
																																																															if(document.reg_despacho.desnrobole1.value=="")
																									{
																										document.reg_despacho.desnrobole1.focus(); //el puntero del mouse queda en nombre 
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
																				
																				if(document.reg_despacho.desrotacajades1.value=="")
																					{
																						document.reg_despacho.desrotacajades1.focus(); //el puntero del mouse queda en nombre 
																						finalizarIns();
																						var mensaje='Debe especificar el Nombre del Responsable del Fondo';
																						div=document.getElementById('mensaje');
																						div.innerHTML=div.innerHTML + mensaje;
																						return 0; //devolvemos un cero para dejar de validar 
																					}
																					if(document.reg_despacho.desrotacajauni1.value=="")
																					{
																						document.reg_despacho.desrotacajauni1.focus(); //el puntero del mouse queda en nombre 
																						finalizarIns();
																						var mensaje='Debe especificar la Unidad Solicitante';
																						div=document.getElementById('mensaje');
																						div.innerHTML=div.innerHTML + mensaje;
																						return 0; //devolvemos un cero para dejar de validar 
																					}
																					if(document.reg_despacho.desrotacajamonto1.value=="")
																					{
																						document.reg_despacho.desrotacajamonto1.focus(); //el puntero del mouse queda en nombre 
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
																																																															if(document.reg_despacho.desnrobole1.value=="")
																									{
																										document.reg_despacho.desnrobole1.focus(); //el puntero del mouse queda en nombre 
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
																		if(document.reg_despacho.nomotrodescar.value=="")
																		{
																		document.reg_despacho.nomotrodescar.focus(); //el puntero del mouse queda en nombre 
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
																																																												if(document.reg_despacho.desrotacajades.value=="")
																					{
																						document.reg_despacho.desrotacajades.focus(); //el puntero del mouse queda en nombre 
																						finalizarIns();
																						var mensaje='Debe especificar el Nombre del Responsable del Fondo';
																						div=document.getElementById('mensaje');
																						div.innerHTML=div.innerHTML + mensaje;
																						return 0; //devolvemos un cero para dejar de validar 
																					}
																					if(document.reg_despacho.desrotacajauni.value=="")
																					{
																						document.reg_despacho.desrotacajauni.focus(); //el puntero del mouse queda en nombre 
																						finalizarIns();
																						var mensaje='Debe especificar la Unidad Solicitante';
																						div=document.getElementById('mensaje');
																						div.innerHTML=div.innerHTML + mensaje;
																						return 0; //devolvemos un cero para dejar de validar 
																					}
																					if(document.reg_despacho.desrotacajamonto.value=="")
																					{
																						document.reg_despacho.desrotacajamonto.focus(); //el puntero del mouse queda en nombre 
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
																																																															if(document.reg_despacho.desnrobole1.value=="")
																									{
																										document.reg_despacho.desnrobole1.focus(); //el puntero del mouse queda en nombre 
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
																				
																				if(document.reg_despacho.desrotacajades1.value=="")
																					{
																						document.reg_despacho.desrotacajades1.focus(); //el puntero del mouse queda en nombre 
																						finalizarIns();
																						var mensaje='Debe especificar el Nombre del Responsable del Fondo';
																						div=document.getElementById('mensaje');
																						div.innerHTML=div.innerHTML + mensaje;
																						return 0; //devolvemos un cero para dejar de validar 
																					}
																					if(document.reg_despacho.desrotacajauni1.value=="")
																					{
																						document.reg_despacho.desrotacajauni1.focus(); //el puntero del mouse queda en nombre 
																						finalizarIns();
																						var mensaje='Debe especificar la Unidad Solicitante';
																						div=document.getElementById('mensaje');
																						div.innerHTML=div.innerHTML + mensaje;
																						return 0; //devolvemos un cero para dejar de validar 
																					}
																					if(document.reg_despacho.desrotacajamonto1.value=="")
																					{
																						document.reg_despacho.desrotacajamonto1.focus(); //el puntero del mouse queda en nombre 
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
																																																															if(document.reg_despacho.desnrobole1.value=="")
																									{
																										document.reg_despacho.desnrobole1.focus(); //el puntero del mouse queda en nombre 
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
																	if(document.reg_despacho.desresponfon2.value=="")
																	{
																		document.reg_despacho.desresponfon2.focus();
																		finalizarIns();
																		var mensaje='Debe especificar el Nombre del Responsable del Fondo';
																		div=document.getElementById('mensaje');
																		div.innerHTML=div.innerHTML + mensaje;
																		return 0; //devolvemos un cero para dejar de validar 
																	}
																	if(document.reg_despacho.desviaactiviti2.value=="")
																	{
																		document.reg_despacho.desviaactiviti2.focus();
																		finalizarIns();
																		var mensaje='Debe especificar la Actividad Correspondiente al Descargo';
																		div=document.getElementById('mensaje');
																		div.innerHTML=div.innerHTML + mensaje;
																		return 0; //devolvemos un cero para dejar de validar 
																	}
																	if(document.reg_despacho.desunisol2.value=="")
																	{
																		document.reg_despacho.desunisol2.focus();
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
																																																										if(document.reg_despacho.desnrobole.value=="")
																				{
																					document.reg_despacho.desnrobole.focus(); //el puntero del mouse queda en nombre 
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
																	if(document.reg_despacho.nomdesotro2.value=="")
																	{
																		document.reg_despacho.nomdesotro2.focus();
																		finalizarIns();
																		var mensaje='Debe especificar el Nombre del Descargo';
																		div=document.getElementById('mensaje');
																		div.innerHTML=div.innerHTML + mensaje;
																		return 0; //devolvemos un cero para dejar de validar 
																	}
																	if(document.reg_despacho.desresponfon23.value=="")
																	{
																		document.reg_despacho.desresponfon23.focus();
																		finalizarIns();
																		var mensaje='Debe especificar el Nombre del Responsable del Fondo';
																		div=document.getElementById('mensaje');
																		div.innerHTML=div.innerHTML + mensaje;
																		return 0; //devolvemos un cero para dejar de validar 
																	}
																	if(document.reg_despacho.desviaactiviti3.value=="")
																	{
																		document.reg_despacho.desviaactiviti3.focus();
																		finalizarIns();
																		var mensaje='Debe especificar la Actividad Correspondiente al Descargo';
																		div=document.getElementById('mensaje');
																		div.innerHTML=div.innerHTML + mensaje;
																		return 0; //devolvemos un cero para dejar de validar 
																	}
																	if(document.reg_despacho.desunisol23.value=="")
																	{
																		document.reg_despacho.desunisol23.focus();
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
																																																										if(document.reg_despacho.desnrobole.value=="")
																				{
																					document.reg_despacho.desnrobole.focus(); //el puntero del mouse queda en nombre 
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
																if(document.reg_despacho.viapasaj.value=="")
																{   //si el largo de nombre es menor a 2 caracteres 
																		document.reg_despacho.viapasaj.focus();  
																		finalizarIns();
																		var mensaje='Debe Seleccionar una Solicitud Especifica';
																		div=document.getElementById('mensaje');
																		div.innerHTML=div.innerHTML + mensaje;
																		return 0; //devolvemos un cero para dejar de validar 
																}															
																
																var viatipas = document.reg_despacho.viapasaj.value;
																document.getElementById("descargo1").value=viatipas;
																
																if(viatipas=="Viaticos")
																{
																	if(document.reg_despacho.nombreviapasaj.value=="")
																	{
																		document.reg_despacho.nombreviapasaj.focus();
																		finalizarIns();
																		var mensaje='Debe especificar el Nombre(s) de él o los Beneficiarios';
																		div=document.getElementById('mensaje');
																		div.innerHTML=div.innerHTML + mensaje;
																		return 0; //devolvemos un cero para dejar de validar 
																	}
																	if(document.reg_despacho.lugarviapasaj.value=="")
																	{
																		document.reg_despacho.lugarviapasaj.focus();
																		finalizarIns();
																		var mensaje='Debe especificar el Lugar del Viaje';
																		div=document.getElementById('mensaje');
																		div.innerHTML=div.innerHTML + mensaje;
																		return 0; //devolvemos un cero para dejar de validar 
																	}
																	if(document.reg_despacho.duraviapasaj.value=="")
																	{
																		document.reg_despacho.duraviapasaj.focus();
																		finalizarIns();
																		var mensaje='Debe especificar la Duracion del Viaje';
																		div=document.getElementById('mensaje');
																		div.innerHTML=div.innerHTML + mensaje;
																		return 0; //devolvemos un cero para dejar de validar 
																	}
																	if(document.reg_despacho.objviapasaj.value=="")
																	{
																		document.reg_despacho.objviapasaj.focus();
																		finalizarIns();
																		var mensaje='Debe especificar el Motivo del Viaje';
																		div=document.getElementById('mensaje');
																		div.innerHTML=div.innerHTML + mensaje;
																		return 0; //devolvemos un cero para dejar de validar 
																	}
																	if(document.reg_despacho.unisolviapasaj.value=="")
																	{
																		document.reg_despacho.unisolviapasaj.focus();
																		finalizarIns();
																		var mensaje='Debe especificar la Unidad Solicitante';
																		div=document.getElementById('mensaje');
																		div.innerHTML=div.innerHTML + mensaje;
																		return 0; //devolvemos un cero para dejar de validar 
																	}
																}
																if(viatipas=="Pasajes")
																{
																	if(document.reg_despacho.pasajnomemp.value=="")
																	{
																		document.reg_despacho.pasajnomemp.focus();
																		finalizarIns();
																		var mensaje='Debe especificar el Nombre(s) de él o los Beneficiarios';
																		div=document.getElementById('mensaje');
																		div.innerHTML=div.innerHTML + mensaje;
																		return 0; //devolvemos un cero para dejar de validar 
																	}
																	if(document.reg_despacho.monpasaj.value=="")
																	{
																		document.reg_despacho.monpasaj.focus();
																		finalizarIns();
																		var mensaje='Debe especificar el Monto del Pasaje';
																		div=document.getElementById('mensaje');
																		div.innerHTML=div.innerHTML + mensaje;
																		return 0; //devolvemos un cero para dejar de validar 
																	}
																	if(document.reg_despacho.unisolviapasaj.value=="")
																	{
																		document.reg_despacho.unisolviapasaj.focus();
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
																																																										if(document.reg_despacho.nomfonavaadj.value=="")
																				{
																					document.reg_despacho.nomfonavaadj.focus(); //el puntero del mouse queda en nombre 
																					finalizarIns();
																					var mensaje='Debe especificar el Nombre del Fondo en Avance Adjunto';
																					div=document.getElementById('mensaje');
																					div.innerHTML=div.innerHTML + mensaje;
																					return 0; //devolvemos un cero para dejar de validar 
																				}	
																			if(document.reg_despacho.montodonfoavanadj.value=="")
																				{
																					document.reg_despacho.montodonfoavanadj.focus(); //el puntero del mouse queda en nombre 
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
																	if(document.reg_despacho.nombreviapasaj.value=="")
																	{
																		document.reg_despacho.nombreviapasaj.focus();
																		finalizarIns();
																		var mensaje='Debe especificar el Nombre(s) de él o los Beneficiarios';
																		div=document.getElementById('mensaje');
																		div.innerHTML=div.innerHTML + mensaje;
																		return 0; //devolvemos un cero para dejar de validar 
																	}
																	if(document.reg_despacho.lugarviapasaj.value=="")
																	{
																		document.reg_despacho.lugarviapasaj.focus();
																		finalizarIns();
																		var mensaje='Debe especificar el Lugar del Viaje';
																		div=document.getElementById('mensaje');
																		div.innerHTML=div.innerHTML + mensaje;
																		return 0; //devolvemos un cero para dejar de validar 
																	}
																	if(document.reg_despacho.duraviapasaj.value=="")
																	{
																		document.reg_despacho.duraviapasaj.focus();
																		finalizarIns();
																		var mensaje='Debe especificar la Duracion del Viaje';
																		div=document.getElementById('mensaje');
																		div.innerHTML=div.innerHTML + mensaje;
																		return 0; //devolvemos un cero para dejar de validar 
																	}
																	if(document.reg_despacho.objviapasaj.value=="")
																	{
																		document.reg_despacho.objviapasaj.focus();
																		finalizarIns();
																		var mensaje='Debe especificar el Motivo del Viaje';
																		div=document.getElementById('mensaje');
																		div.innerHTML=div.innerHTML + mensaje;
																		return 0; //devolvemos un cero para dejar de validar 
																	}
																	if(document.reg_despacho.pasajnomemp.value=="")
																	{
																		document.reg_despacho.pasajnomemp.focus();
																		finalizarIns();
																		var mensaje='Debe especificar el Nombre(s) de él o los Beneficiarios';
																		div=document.getElementById('mensaje');
																		div.innerHTML=div.innerHTML + mensaje;
																		return 0; //devolvemos un cero para dejar de validar 
																	}
																	if(document.reg_despacho.monpasaj.value=="")
																	{
																		document.reg_despacho.monpasaj.focus();
																		finalizarIns();
																		var mensaje='Debe especificar el Monto del Pasaje';
																		div=document.getElementById('mensaje');
																		div.innerHTML=div.innerHTML + mensaje;
																		return 0; //devolvemos un cero para dejar de validar 
																	}
																	if(document.reg_despacho.unisolviapasaj.value=="")
																	{
																		document.reg_despacho.unisolviapasaj.focus();
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
																																																										if(document.reg_despacho.nomfonavaadj.value=="")
																				{
																					document.reg_despacho.nomfonavaadj.focus(); //el puntero del mouse queda en nombre 
																					finalizarIns();
																					var mensaje='Debe especificar el Nombre del Fondo en Avance Adjunto';
																					div=document.getElementById('mensaje');
																					div.innerHTML=div.innerHTML + mensaje;
																					return 0; //devolvemos un cero para dejar de validar 
																				}	
																			if(document.reg_despacho.montodonfoavanadj.value=="")
																				{
																					document.reg_despacho.montodonfoavanadj.focus(); //el puntero del mouse queda en nombre 
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
																	if(document.reg_despacho.proyecactiviti.value=="")
																	{
																		document.reg_despacho.proyecactiviti.focus();
																		finalizarIns();
																		var mensaje='Debe especificar el Proyecto o la Actividad';
																		div=document.getElementById('mensaje');
																		div.innerHTML=div.innerHTML + mensaje;
																		return 0; //devolvemos un cero para dejar de validar 
																	}
																	if(document.reg_despacho.montopoa.value=="")
																	{
																		document.reg_despacho.montopoa.focus();
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
																	if(document.reg_despacho.modifipresu.value=="")
																	{   //si el largo de nombre es menor a 2 caracteres 
																			document.reg_despacho.modifipresu.focus();  
																			finalizarIns();
																			var mensaje='Debe Seleccionar una Solicitud Especifica';
																			div=document.getElementById('mensaje');
																			div.innerHTML=div.innerHTML + mensaje;
																			return 0; //devolvemos un cero para dejar de validar 
																	}															
																
																	var modif = document.reg_despacho.modifipresu.value;
																	document.getElementById("descargo1").value=modif;
																
																	if(modif=="Incremento Presupuestario")
																	{
																		if(document.reg_despacho.proyecactivitiinctras.value=="")
																		{
																			document.reg_despacho.proyecactivitiinctras.focus();
																			finalizarIns();
																			var mensaje='Debe especificar el Proyecto o la Actividad';
																			div=document.getElementById('mensaje');
																			div.innerHTML=div.innerHTML + mensaje;
																			return 0; //devolvemos un cero para dejar de validar 
																		}
																		if(document.reg_despacho.montoinctras.value=="")
																		{
																			document.reg_despacho.montoinctras.focus();
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
																			if(document.reg_despacho.proyecactivitiinctras.value=="")
																			{
																				document.reg_despacho.proyecactivitiinctras.focus();
																				finalizarIns();
																				var mensaje='Debe especificar el Proyecto o la Actividad';
																				div=document.getElementById('mensaje');
																				div.innerHTML=div.innerHTML + mensaje;
																				return 0; //devolvemos un cero para dejar de validar 
																			}
																			if(document.reg_despacho.montoinctras.value=="")
																			{
																				document.reg_despacho.montoinctras.focus();
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
																	if(document.reg_despacho.proyactdel.value=="")
																	{
																		document.reg_despacho.proyactdel.focus();
																		finalizarIns();
																		var mensaje='Debe especificar el Proyecto o la Actividad origen';
																		div=document.getElementById('mensaje');
																		div.innerHTML=div.innerHTML + mensaje;
																		return 0; //devolvemos un cero para dejar de validar 
																	}
																	if(document.reg_despacho.proyacthac.value=="")
																	{
																		document.reg_despacho.proyacthac.focus();
																		finalizarIns();
																		var mensaje='Debe especificar el Proyecto o la Actividad Destino';
																		div=document.getElementById('mensaje');
																		div.innerHTML=div.innerHTML + mensaje;
																		return 0; //devolvemos un cero para dejar de validar 
																	}
																	if(document.reg_despacho.montointra.value=="")
																	{
																		document.reg_despacho.montointra.focus();
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
																	if(document.reg_despacho.nombinterenodeu.value=="")
																	{
																		document.reg_despacho.nombinterenodeu.focus();
																		finalizarIns();
																		var mensaje='Debe especificar Nombre del Interesado';
																		div=document.getElementById('mensaje');
																		div.innerHTML=div.innerHTML + mensaje;
																		return 0; //devolvemos un cero para dejar de validar 
																	}
																	if(document.reg_despacho.numcinodeu.value=="")
																	{
																		document.reg_despacho.numcinodeu.focus();
																		finalizarIns();
																		var mensaje='Debe especificar el Numero de Carnet y la Expedicion';
																		div=document.getElementById('mensaje');
																		div.innerHTML=div.innerHTML + mensaje;
																		return 0; //devolvemos un cero para dejar de validar 
																	}
																	if(document.reg_despacho.objetivonodeu.value=="")
																	{
																		document.reg_despacho.objetivonodeu.focus();
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
																	if(document.reg_despacho.instuniinv.value=="")
																	{
																		document.reg_despacho.instuniinv.focus();
																		finalizarIns();
																		var mensaje='Debe especificar el Nombre de la Institucion que emite la Invitacion';
																		div=document.getElementById('mensaje');
																		div.innerHTML=div.innerHTML + mensaje;
																		return 0; //devolvemos un cero para dejar de validar 
																	}
																	if(document.reg_despacho.tenorinv.value=="")
																	{
																		document.reg_despacho.tenorinv.focus();
																		finalizarIns();
																		var mensaje='Debe especificar el Tenor de la Invitacion';
																		div=document.getElementById('mensaje');
																		div.innerHTML=div.innerHTML + mensaje;
																		return 0; //devolvemos un cero para dejar de validar 
																	}
																	if(document.reg_despacho.luginv.value=="")
																	{
																		document.reg_despacho.luginv.focus();
																		finalizarIns();
																		var mensaje='Debe especificar el Lugar donde se llevara a cabo el Evento';
																		div=document.getElementById('mensaje');
																		div.innerHTML=div.innerHTML + mensaje;
																		return 0; //devolvemos un cero para dejar de validar 
																	}
																	if(document.reg_despacho.calendario.value=="")
																	{
																		document.reg_despacho.calendario.focus();
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
																if(document.reg_despacho.contrato.value=="")
																{   //si el largo de nombre es menor a 2 caracteres 
																		document.reg_despacho.contrato.focus();  
																		finalizarIns();
																		var mensaje='Debe Seleccionar un Contrato Especifico';
																		div=document.getElementById('mensaje');
																		div.innerHTML=div.innerHTML + mensaje;
																		return 0; //devolvemos un cero para dejar de validar 
																}
																																
																var contra = document.reg_despacho.contrato.value;
																document.getElementById("descargo1").value=contra;
																
																	if(contra=="Otros Contratos Personales")
																	{
																		if(document.reg_despacho.otrocont.value=="")
																		{
																			document.reg_despacho.otrocont.focus();
																			finalizarIns();
																			var mensaje='Debe especificar el Nombre del Tipo de Contrato';
																			div=document.getElementById('mensaje');
																			div.innerHTML=div.innerHTML + mensaje;
																			return 0; //devolvemos un cero para dejar de validar 
																		}
																			if(document.reg_despacho.nombrepersonales.value=="")
																			{
																				document.reg_despacho.nombrepersonales.focus();
																				finalizarIns();
																				var mensaje='Debe especificar el Nombre del Beneficiario';
																				div=document.getElementById('mensaje');
																				div.innerHTML=div.innerHTML + mensaje;
																				return 0; //devolvemos un cero para dejar de validar 
																			}
																			if(document.reg_despacho.calendario2.value=="")
																			{
																				document.reg_despacho.calendario2.focus();
																				finalizarIns();
																				var mensaje='Debe especificar la Fecha de Inicio del Contrato';
																				div=document.getElementById('mensaje');
																				div.innerHTML=div.innerHTML + mensaje;
																				return 0; //devolvemos un cero para dejar de validar 
																			}
																			if(document.reg_despacho.calendario1.value=="")
																			{
																				document.reg_despacho.calendario1.focus();
																				finalizarIns();
																				var mensaje='Debe especificar la Fecha de Conclusion del Contrato';
																				div=document.getElementById('mensaje');
																				div.innerHTML=div.innerHTML + mensaje;
																				return 0; //devolvemos un cero para dejar de validar 
																			}
																			if(document.reg_despacho.montocon.value=="")
																			{
																				document.reg_despacho.montocon.focus();
																				finalizarIns();
																				var mensaje='Debe especificar el monto de contratacion en Bs.';
																				div=document.getElementById('mensaje');
																				div.innerHTML=div.innerHTML + mensaje;
																				return 0; //devolvemos un cero para dejar de validar 
																			}
																			if(document.reg_despacho.refcontra.value=="")
																			{
																				document.reg_despacho.refcontra.focus();
																				finalizarIns();
																				var mensaje='Debe especificar el Objeto de la Contratacion';
																				div=document.getElementById('mensaje');
																				div.innerHTML=div.innerHTML + mensaje;
																				return 0; //devolvemos un cero para dejar de validar 
																			}
																	}
																	else
																	{
																			if(document.reg_despacho.nombrepersonales.value=="")
																			{
																				document.reg_despacho.nombrepersonales.focus();
																				finalizarIns();
																				var mensaje='Debe especificar el Nombre del Beneficiario';
																				div=document.getElementById('mensaje');
																				div.innerHTML=div.innerHTML + mensaje;
																				return 0; //devolvemos un cero para dejar de validar 
																			}
																			if(document.reg_despacho.calendario2.value=="")
																			{
																				document.reg_despacho.calendario2.focus();
																				finalizarIns();
																				var mensaje='Debe especificar la Fecha de Inicio del Contrato';
																				div=document.getElementById('mensaje');
																				div.innerHTML=div.innerHTML + mensaje;
																				return 0; //devolvemos un cero para dejar de validar 
																			}
																			if(document.reg_despacho.calendario1.value=="")
																			{
																				document.reg_despacho.calendario1.focus();
																				finalizarIns();
																				var mensaje='Debe especificar la Fecha de Conclusion del Contrato';
																				div=document.getElementById('mensaje');
																				div.innerHTML=div.innerHTML + mensaje;
																				return 0; //devolvemos un cero para dejar de validar 
																			}
																			if(document.reg_despacho.montocon.value=="")
																			{
																				document.reg_despacho.montocon.focus();
																				finalizarIns();
																				var mensaje='Debe especificar el monto del Contrato en Bs.';
																				div=document.getElementById('mensaje');
																				div.innerHTML=div.innerHTML + mensaje;
																				return 0; //devolvemos un cero para dejar de validar 
																			}
																			if(document.reg_despacho.refcontra.value=="")
																			{
																				document.reg_despacho.refcontra.focus();
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
															if(document.reg_despacho.circul.value=="")
															{
															document.reg_despacho.circul.focus(); //el puntero del mouse queda en nombre 
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
																		var cirwi = document.reg_despacho.circul.value;
																		if(cirwi=="Otras Resoluciones")
																		{
																			if(document.reg_despacho.nomresolu.value=="")
																			{
																				document.reg_despacho.nomresolu.focus(); //el puntero del mouse queda en nombre 
																				finalizarIns();
																				var mensaje='Debe especificar el Nombre de la Resolucion';
																				div=document.getElementById('mensaje');
																				div.innerHTML=div.innerHTML + mensaje;
																				return 0; //devolvemos un cero para dejar de validar 
																			}
																		}
																		
																		if(document.reg_despacho.refcircu.value=="")
																		{
																		document.reg_despacho.refcircu.focus(); //el puntero del mouse queda en nombre 
																		finalizarIns();
																		var mensaje='Debe especificar la Descripcion de la Referencia';
																		div=document.getElementById('mensaje');
																		div.innerHTML=div.innerHTML + mensaje;
																		return 0; //devolvemos un cero para dejar de validar 
																		}
																		if(document.reg_despacho.calendario3.value=="")
																		{
																		document.reg_despacho.calendario3.focus(); //el puntero del mouse queda en nombre 
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
																			var cirwi = document.reg_despacho.circul.value;
																			if(cirwi=="Otras Resoluciones")
																			{
																				if(document.reg_despacho.nomresolu.value=="")
																				{
																					document.reg_despacho.nomresolu.focus(); //el puntero del mouse queda en nombre 
																					finalizarIns();
																					var mensaje='Debe especificar el Nombre de la Resolucion';
																					div=document.getElementById('mensaje');
																					div.innerHTML=div.innerHTML + mensaje;
																					return 0; //devolvemos un cero para dejar de validar 
																				}
																			}
																		
																		if(document.reg_despacho.refcircu.value=="")
																		{
																		document.reg_despacho.refcircu.focus(); //el puntero del mouse queda en nombre 
																		finalizarIns();
																		var mensaje='Debe especificar la Descripcion de la Referencia';
																		div=document.getElementById('mensaje');
																		div.innerHTML=div.innerHTML + mensaje;
																		return 0; //devolvemos un cero para dejar de validar 
																		}
																		if(document.reg_despacho.calendario3.value=="")
																		{
																		document.reg_despacho.calendario3.focus(); //el puntero del mouse queda en nombre 
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
																if(document.reg_despacho.designa.value=="")
																{   //si el largo de nombre es menor a 2 caracteres 
																	document.reg_despacho.designa.focus();  
																	finalizarIns();
																	var mensaje='Debe Seleccionar una Designacion Especifica';
																	div=document.getElementById('mensaje');
																	div.innerHTML=div.innerHTML + mensaje;
																	return 0; //devolvemos un cero para dejar de validar 
																}
																
																var desig = document.reg_despacho.designa.value;
																//document.getElementById("descargo1").value=desig;
																if(desig=="Designacion Auxiliar de Docencia")
																{
																		if(document.reg_despacho.nomaux.value=="")
																		{
																		document.reg_despacho.nomaux.focus(); //el puntero del mouse queda en nombre 
																		finalizarIns();
																		var mensaje='Debe especificar el Nombre del Auxiliar de Docencia';
																		div=document.getElementById('mensaje');
																		div.innerHTML=div.innerHTML + mensaje;
																		return 0; //devolvemos un cero para dejar de validar 
																		}
																		if(document.reg_despacho.auxcarr.value=="")
																		{
																		document.reg_despacho.auxcarr.focus(); //el puntero del mouse queda en nombre 
																		finalizarIns();
																		var mensaje='Debe Especificar la Carrera del Auxiliar de Docencia';
																		div=document.getElementById('mensaje');
																		div.innerHTML=div.innerHTML + mensaje;
																		return 0; //devolvemos un cero para dejar de validar 
																		}
																		if(document.reg_despacho.calendario4.value=="")
																		{
																		document.reg_despacho.calendario4.focus(); //el puntero del mouse queda en nombre 
																		finalizarIns();
																		var mensaje='Debe especificar la fecha de Inicio';
																		div=document.getElementById('mensaje');
																		div.innerHTML=div.innerHTML + mensaje;
																		return 0; //devolvemos un cero para dejar de validar 
																		}
																		if(document.reg_despacho.calendario5.value=="")
																		{
																		document.reg_despacho.calendario5.focus(); //el puntero del mouse queda en nombre 
																		finalizarIns();
																		var mensaje='Debe especificar la fecha de Conclusion';
																		div=document.getElementById('mensaje');
																		div.innerHTML=div.innerHTML + mensaje;
																		return 0; //devolvemos un cero para dejar de validar 
																		}
																}
																if(desig=="Designacion de Tribunal")
																{
																		if(document.reg_despacho.desigtri.value=="")
																		{   //si el largo de nombre es menor a 2 caracteres 
																			document.reg_despacho.desigtri.focus();  
																			finalizarIns();
																			var mensaje='Debe elegir un Tipo de Designacion de Tribunal';
																			div=document.getElementById('mensaje');
																			div.innerHTML=div.innerHTML + mensaje;
																			return 0; //devolvemos un cero para dejar de validar 
																		}
																		
																		var desigtribu = document.reg_despacho.desigtri.value;
																		//document.getElementById("descargo2").value=desigtribu;
																		if(desigtribu=="Designacion Tribunal Docente")
																		{
																			if(document.reg_despacho.nomdocentribu.value=="")
																			{
																			document.reg_despacho.nomdocentribu.focus(); //el puntero del mouse queda en nombre 
																			finalizarIns();
																			var mensaje='Debe especificar el Nombre del Tribunal Docente';
																			div=document.getElementById('mensaje');
																			div.innerHTML=div.innerHTML + mensaje;
																			return 0; //devolvemos un cero para dejar de validar 
																			}
																			if(document.reg_despacho.nroresotrib.value=="")
																			{
																			document.reg_despacho.nroresotrib.focus(); //el puntero del mouse queda en nombre 
																			finalizarIns();
																			var mensaje='Debe especificar el Nro. de Resolucion del Tribunal Docente';
																			div=document.getElementById('mensaje');
																			div.innerHTML=div.innerHTML + mensaje;
																			return 0; //devolvemos un cero para dejar de validar 
																			}
																		}
																		if(desigtribu=="Designacion Tribunal Estudiantil")
																		{
																			if(document.reg_despacho.nomestutribu.value=="")
																			{
																			document.reg_despacho.nomestutribu.focus(); //el puntero del mouse queda en nombre 
																			finalizarIns();
																			var mensaje='Debe especificar el Nombre del Tribunal Estudiantil';
																			div=document.getElementById('mensaje');
																			div.innerHTML=div.innerHTML + mensaje;
																			return 0; //devolvemos un cero para dejar de validar 
																			}
																			if(document.reg_despacho.nroresotrib.value=="")
																			{
																			document.reg_despacho.nroresotrib.focus(); //el puntero del mouse queda en nombre 
																			finalizarIns();
																			var mensaje='Debe especificar el Nro. de Resolucion del Tribunal Estudiantil';
																			div=document.getElementById('mensaje');
																			div.innerHTML=div.innerHTML + mensaje;
																			return 0; //devolvemos un cero para dejar de validar 
																			}
																		}
																		if(desigtribu=="Designacion Tribunal Estudiantil-Docente")
																		{
																			if(document.reg_despacho.ambosnombres.value=="")
																			{
																			document.reg_despacho.ambosnombres.focus(); //el puntero del mouse queda en nombre 
																			finalizarIns();
																			var mensaje='Debe especificar el Nombre de los Estudiantes y/o Docentes';
																			div=document.getElementById('mensaje');
																			div.innerHTML=div.innerHTML + mensaje;
																			return 0; //devolvemos un cero para dejar de validar 
																			}
																			if(document.reg_despacho.nroresotrib.value=="")
																			{
																			document.reg_despacho.nroresotrib.focus(); //el puntero del mouse queda en nombre 
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
																		if(document.reg_despacho.desigdoc.value=="")
																		{   //si el largo de nombre es menor a 2 caracteres 
																			document.reg_despacho.desigdoc.focus();  
																			finalizarIns();
																			var mensaje='Debe elegir un Tipo de Designacion de Docente';
																			div=document.getElementById('mensaje');
																			div.innerHTML=div.innerHTML + mensaje;
																			return 0; //devolvemos un cero para dejar de validar 
																		}
																		var desigdocent = document.reg_despacho.desigdoc.value;
																		//document.getElementById("descargo2").value=desigdocent;
																		if(desigdocent=="Docente Contratado")
																		{
																			if(document.reg_despacho.nomdoccontra.value=="")
																			{
																			document.reg_despacho.nomdoccontra.focus(); //el puntero del mouse queda en nombre 
																			finalizarIns();
																			var mensaje='Debe especificar el Nombre del Docente Contratado';
																			div=document.getElementById('mensaje');
																			div.innerHTML=div.innerHTML + mensaje;
																			return 0; //devolvemos un cero para dejar de validar 
																			}
																			if(document.reg_despacho.periododesig.value=="")
																			{
																			document.reg_despacho.periododesig.focus(); //el puntero del mouse queda en nombre 
																			finalizarIns();
																			var mensaje='Debe especificar el Periodo de Designacion del Docente Contratado';
																			div=document.getElementById('mensaje');
																			div.innerHTML=div.innerHTML + mensaje;
																			return 0; //devolvemos un cero para dejar de validar 
																			}
																		}
																		if(desigdocent=="Docente Interino")
																		{
																			if(document.reg_despacho.nomdocinteri.value=="")
																			{
																			document.reg_despacho.nomdocinteri.focus(); //el puntero del mouse queda en nombre 
																			finalizarIns();
																			var mensaje='Debe especificar el Nombre del Docente Interino';
																			div=document.getElementById('mensaje');
																			div.innerHTML=div.innerHTML + mensaje;
																			return 0; //devolvemos un cero para dejar de validar 
																			}
																			if(document.reg_despacho.periododesig.value=="")
																			{
																			document.reg_despacho.periododesig.focus(); //el puntero del mouse queda en nombre 
																			finalizarIns();
																			var mensaje='Debe especificar el Periodo de Designacion del Docente Interino';
																			div=document.getElementById('mensaje');
																			div.innerHTML=div.innerHTML + mensaje;
																			return 0; //devolvemos un cero para dejar de validar 
																			}
																		}
																		if(desigdocent=="Docente Invitado")
																		{
																			if(document.reg_despacho.nomdocinvi.value=="")
																			{
																			document.reg_despacho.nomdocinvi.focus(); //el puntero del mouse queda en nombre 
																			finalizarIns();
																			var mensaje='Debe especificar el Nombre del Docente Invitado';
																			div=document.getElementById('mensaje');
																			div.innerHTML=div.innerHTML + mensaje;
																			return 0; //devolvemos un cero para dejar de validar 
																			}
																			if(document.reg_despacho.periododesig.value=="")
																			{
																			document.reg_despacho.periododesig.focus(); //el puntero del mouse queda en nombre 
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
															if(document.reg_despacho.citacion.value=="")
															{
															document.reg_despacho.citacion.focus(); //el puntero del mouse queda en nombre 
															finalizarIns();
															var mensaje='Debe seleccionar una Citacion Especifica';
															div=document.getElementById('mensaje');
															div.innerHTML=div.innerHTML + mensaje;
															return 0; //devolvemos un cero para dejar de validar 
															}
															
															var citao = document.reg_despacho.citacion.value;
															//document.getElementById("descargo1").value=citao;
																
															if(citao=="Otras Citaciones")
															{
																if(document.reg_despacho.otroconcitacion.value=="")
																{
																document.reg_despacho.otroconcitacion.focus();
																finalizarIns();
																var mensaje='Debe especificar el Nombre del Tipo de Citacion';
																div=document.getElementById('mensaje');
																div.innerHTML=div.innerHTML + mensaje;
																return 0; //devolvemos un cero para dejar de validar 
																}
																
															}
																if(document.reg_despacho.refcitasao.value=="")
																{
																document.reg_despacho.refcitasao.focus(); //el puntero del mouse queda en nombre 
																finalizarIns();
																var mensaje='Debe especificar la Referencia de la Citacion';
																div=document.getElementById('mensaje');
																div.innerHTML=div.innerHTML + mensaje;
																return 0; //devolvemos un cero para dejar de validar 
																}
																if(document.reg_despacho.calendario6.value=="")
																{
																document.reg_despacho.calendario6.focus(); //el puntero del mouse queda en nombre 
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
															if(document.reg_despacho.informeju.value=="")
															{
															document.reg_despacho.informeju.focus(); //el puntero del mouse queda en nombre 
															finalizarIns();
															var mensaje='Debe seleccionar un Informe Especifico';
															div=document.getElementById('mensaje');
															div.innerHTML=div.innerHTML + mensaje;
															return 0; //devolvemos un cero para dejar de validar 
															}
															
															var infjuri = document.reg_despacho.informeju.value;
															//document.getElementById("descargo1").value=citao;
																
															if(infjuri=="Otros Informes Juridicos")
															{
																if(document.reg_despacho.otronomju.value=="")
																{
																document.reg_despacho.otronomju.focus();
																finalizarIns();
																var mensaje='Debe especificar el Nombre del Informe Juridico';
																div=document.getElementById('mensaje');
																div.innerHTML=div.innerHTML + mensaje;
																return 0; //devolvemos un cero para dejar de validar 
																}
																
															}
																if(document.reg_despacho.refinfoju.value=="")
																{
																document.reg_despacho.refinfoju.focus(); //el puntero del mouse queda en nombre 
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
															if(document.reg_despacho.resoluciones.value=="")
															{
															document.reg_despacho.resoluciones.focus(); //el puntero del mouse queda en nombre 
															finalizarIns();
															var mensaje='Debe seleccionar una Resolucion Especifica';
															div=document.getElementById('mensaje');
															div.innerHTML=div.innerHTML + mensaje;
															return 0; //devolvemos un cero para dejar de validar 
															}
															
															var resolasa = document.reg_despacho.resoluciones.value;
															//document.getElementById("descargo1").value=citao;
																
															if(resolasa=="Otras Resoluciones")
															{
																if(document.reg_despacho.nomresol.value=="")
																{
																document.reg_despacho.nomresol.focus();
																finalizarIns();
																var mensaje='Debe especificar el Nombre de la Resolucion';
																div=document.getElementById('mensaje');
																div.innerHTML=div.innerHTML + mensaje;
																return 0; //devolvemos un cero para dejar de validar 
																}
																
															}
																if(document.reg_despacho.refresol.value=="")
																{
																document.reg_despacho.refresol.focus(); //el puntero del mouse queda en nombre 
																finalizarIns();
																var mensaje='Debe especificar la Referencia dela Resolucion';
																div=document.getElementById('mensaje');
																div.innerHTML=div.innerHTML + mensaje;
																return 0; //devolvemos un cero para dejar de validar 
																}
																if(document.reg_despacho.calendario7.value=="")
																{
																document.reg_despacho.calendario7.focus();
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
															if(document.reg_despacho.benerevache.value=="")
															{
															document.reg_despacho.benerevache.focus(); //el puntero del mouse queda en nombre 
															finalizarIns();
															var mensaje='Debe especificar el Beneficiario del cheque a Revalidar';
															div=document.getElementById('mensaje');
															div.innerHTML=div.innerHTML + mensaje;
															return 0; //devolvemos un cero para dejar de validar 
															}
															if(document.reg_despacho.montorevcheque.value=="")
															{
															document.reg_despacho.montorevcheque.focus(); //el puntero del mouse queda en nombre 
															finalizarIns();
															var mensaje='Debe especificar el monto del cheque a Revalidar';
															div=document.getElementById('mensaje');
															div.innerHTML=div.innerHTML + mensaje;
															return 0; //devolvemos un cero para dejar de validar 
															}
															if(document.reg_despacho.calendario8.value=="")
															{
															document.reg_despacho.calendario8.focus();
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
															if(document.reg_despacho.acreditasao.value=="")
															{
															document.reg_despacho.acreditasao.focus(); //el puntero del mouse queda en nombre 
															finalizarIns();
															var mensaje='Debe seleccionar una Acreditacion Especifica';
															div=document.getElementById('mensaje');
															div.innerHTML=div.innerHTML + mensaje;
															return 0; //devolvemos un cero para dejar de validar 
															}
															
															var acredi = document.reg_despacho.acreditasao.value;
																															
															if(acredi=="Otras Acreditaciones")
															{
																if(document.reg_despacho.otronomacredi.value=="")
																{
																document.reg_despacho.otronomacredi.focus();
																finalizarIns();
																var mensaje='Debe especificar el Nombre de la Acreditacion';
																div=document.getElementById('mensaje');
																div.innerHTML=div.innerHTML + mensaje;
																return 0; //devolvemos un cero para dejar de validar 
																}
																
															}
																if(document.reg_despacho.nomfrenacre.value=="")
																{
																document.reg_despacho.nomfrenacre.focus(); //el puntero del mouse queda en nombre 
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
															if(document.reg_despacho.causareincorpo.value=="")
															{
															document.reg_despacho.causareincorpo.focus(); //el puntero del mouse queda en nombre 
															finalizarIns();
															var mensaje='Debe especificar la Causa de la Reincorporacion';
															div=document.getElementById('mensaje');
															div.innerHTML=div.innerHTML + mensaje;
															return 0; //devolvemos un cero para dejar de validar 
															}
															if(document.reg_despacho.nombredocrein.value=="")
															{
															document.reg_despacho.nombredocrein.focus(); //el puntero del mouse queda en nombre 
															finalizarIns();
															var mensaje='Debe especificar el Nombre del Docente';
															div=document.getElementById('mensaje');
															div.innerHTML=div.innerHTML + mensaje;
															return 0; //devolvemos un cero para dejar de validar 
															}
															if(document.reg_despacho.calendario9.value=="")
															{
															document.reg_despacho.calendario9.focus();
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
															if(document.reg_despacho.licenciaadm.value=="")
															{
															document.reg_despacho.licenciaadm.focus(); //el puntero del mouse queda en nombre 
															finalizarIns();
															var mensaje='Debe seleccionar una Licencia Especifica';
															div=document.getElementById('mensaje');
															div.innerHTML=div.innerHTML + mensaje;
															return 0; //devolvemos un cero para dejar de validar 
															}
															
															var licencen = document.reg_despacho.licenciaadm.value;
																															
															if(licencen=="Otras Licencias")
															{
																if(document.reg_despacho.nomlicencia.value=="")
																{
																document.reg_despacho.nomlicencia.focus();
																finalizarIns();
																var mensaje='Debe especificar el Nombre de la Licencia';
																div=document.getElementById('mensaje');
																div.innerHTML=div.innerHTML + mensaje;
																return 0; //devolvemos un cero para dejar de validar 
																}
																
															}
																if(document.reg_despacho.motivlicen.value=="")
																{
																document.reg_despacho.motivlicen.focus(); //el puntero del mouse queda en nombre 
																finalizarIns();
																var mensaje='Debe especificar el motivo de la Licencia';
																div=document.getElementById('mensaje');
																div.innerHTML=div.innerHTML + mensaje;
																return 0; //devolvemos un cero para dejar de validar 
																}
																if(document.reg_despacho.nomdocadm.value=="")
																{
																document.reg_despacho.nomdocadm.focus(); //el puntero del mouse queda en nombre 
																finalizarIns();
																var mensaje='Debe especificar Nombre del Docente o Administrativo';
																div=document.getElementById('mensaje');
																div.innerHTML=div.innerHTML + mensaje;
																return 0; //devolvemos un cero para dejar de validar 
																}
																if(document.reg_despacho.calendario3.value=="")
																{
																document.reg_despacho.calendario3.focus(); //el puntero del mouse queda en nombre 
																finalizarIns();
																var mensaje='Debe especificar la Fecha de Inicio de la Licencia Solicitada';
																div=document.getElementById('mensaje');
																div.innerHTML=div.innerHTML + mensaje;
																return 0; //devolvemos un cero para dejar de validar 
																}
																if(document.reg_despacho.calendario4.value=="")
																{
																document.reg_despacho.calendario4.focus(); //el puntero del mouse queda en nombre 
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
															if(document.reg_despacho.nombramiento.value=="")
															{
															document.reg_despacho.nombramiento.focus(); //el puntero del mouse queda en nombre 
															finalizarIns();
															var mensaje='Debe seleccionar un Nombramiento Especifico';
															div=document.getElementById('mensaje');
															div.innerHTML=div.innerHTML + mensaje;
															return 0; //devolvemos un cero para dejar de validar 
															}
															
															var nombra = document.reg_despacho.nombramiento.value;
																															
															if(nombra=="Nombramiento Director de Instituto")
															{
																if(document.reg_despacho.nominstitute.value=="")
																{
																document.reg_despacho.nominstitute.focus();
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
																																				
																		if(document.reg_despacho.nomdocdesig.value=="")
																		{
																		document.reg_despacho.nomdocdesig.focus(); //el puntero del mouse queda en nombre 
																		finalizarIns();
																		var mensaje='Debe especificar el Nombre de la Autoridad Nombrada';
																		div=document.getElementById('mensaje');
																		div.innerHTML=div.innerHTML + mensaje;
																		return 0; //devolvemos un cero para dejar de validar 
																		}
																		if(document.reg_despacho.calendario1.value=="")
																		{
																		document.reg_despacho.calendario1.focus(); //el puntero del mouse queda en nombre 
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
																			
																		if(document.reg_despacho.nomdocdesig.value=="")
																		{
																		document.reg_despacho.nomdocdesig.focus(); //el puntero del mouse queda en nombre 
																		finalizarIns();
																		var mensaje='Debe especificar el Nombre de la Autoridad Nombrada';
																		div=document.getElementById('mensaje');
																		div.innerHTML=div.innerHTML + mensaje;
																		return 0; //devolvemos un cero para dejar de validar 
																		}
																		if(document.reg_despacho.calendario1.value=="")
																		{
																		document.reg_despacho.calendario1.focus(); //el puntero del mouse queda en nombre 
																		finalizarIns();
																		var mensaje='Debe especificar la Fecha de inicio de la Autoridad';
																		div=document.getElementById('mensaje');
																		div.innerHTML=div.innerHTML + mensaje;
																		return 0; //devolvemos un cero para dejar de validar 
																		}
																		if(document.reg_despacho.durcargonom.value=="")
																		{
																		document.reg_despacho.durcargonom.focus(); //el puntero del mouse queda en nombre 
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
															if(document.reg_despacho.nombresabatico.value=="")
															{
															document.reg_despacho.nombresabatico.focus(); //el puntero del mouse queda en nombre 
															finalizarIns();
															var mensaje='Debe especificar el Nombre del Docente Beneficiario';
															div=document.getElementById('mensaje');
															div.innerHTML=div.innerHTML + mensaje;
															return 0; //devolvemos un cero para dejar de validar 
															}
															if(document.reg_despacho.calendario10.value=="")
															{
															document.reg_despacho.calendario10.focus(); //el puntero del mouse queda en nombre 
															finalizarIns();
															var mensaje='Debe especificar la Fecha de Inicio de la Solicitud';
															div=document.getElementById('mensaje');
															div.innerHTML=div.innerHTML + mensaje;
															return 0; //devolvemos un cero para dejar de validar 
															}
															if(document.reg_despacho.calendario11.value=="")
															{
															document.reg_despacho.calendario11.focus();
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
															if(document.reg_despacho.refcomunicado.value=="")
															{
															document.reg_despacho.refcomunicado.focus(); //el puntero del mouse queda en nombre 
															finalizarIns();
															var mensaje='Debe especificar la Referencia o Tenor del Comunicado';
															div=document.getElementById('mensaje');
															div.innerHTML=div.innerHTML + mensaje;
															return 0; //devolvemos un cero para dejar de validar 
															}
															if(document.reg_despacho.calendario12.value=="")
															{
															document.reg_despacho.calendario12.focus(); //el puntero del mouse queda en nombre 
															finalizarIns();
															var mensaje='Debe especificar la Fecha a llevarse a cabo el Evento';
															div=document.getElementById('mensaje');
															div.innerHTML=div.innerHTML + mensaje;
															return 0; //devolvemos un cero para dejar de validar 
															}
															if(document.reg_despacho.numinscomuni.value=="")
															{
															document.reg_despacho.numinscomuni.focus(); //el puntero del mouse queda en nombre 
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
															if(document.reg_despacho.nomestcon.value=="")
															{
															document.reg_despacho.nomestcon.focus(); //el puntero del mouse queda en nombre 
															finalizarIns();
															var mensaje='Debe especificar el Nombre de Estudiante';
															div=document.getElementById('mensaje');
															div.innerHTML=div.innerHTML + mensaje;
															return 0; //devolvemos un cero para dejar de validar 
															}
															if(document.reg_despacho.numinfkar.value=="")
															{
															document.reg_despacho.numinfkar.focus(); //el puntero del mouse queda en nombre 
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
															if(document.reg_despacho.memoran.value=="")
															{
															document.reg_despacho.memoran.focus(); //el puntero del mouse queda en nombre 
															finalizarIns();
															var mensaje='Debe seleccionar un Memorandum Especifico';
															div=document.getElementById('mensaje');
															div.innerHTML=div.innerHTML + mensaje;
															return 0; //devolvemos un cero para dejar de validar 
															}
															
															var memorandum = document.reg_despacho.memoran.value;
																															
															if(memorandum=="Otros Memorandums")
															{
																if(document.reg_despacho.nommemoran.value=="")
																{
																document.reg_despacho.nommemoran.focus();
																finalizarIns();
																var mensaje='Debe especificar el Denominativo del Memorandum';
																div=document.getElementById('mensaje');
																div.innerHTML=div.innerHTML + mensaje;
																return 0; //devolvemos un cero para dejar de validar 
																}
																
															}
																if(document.reg_despacho.motimemo.value=="")
																{
																document.reg_despacho.motimemo.focus(); //el puntero del mouse queda en nombre 
																finalizarIns();
																var mensaje='Debe especificar el Motivo del Memorandum';
																div=document.getElementById('mensaje');
																div.innerHTML=div.innerHTML + mensaje;
																return 0; //devolvemos un cero para dejar de validar 
																}
																if(document.reg_despacho.nompersonmemo.value=="")
																{
																document.reg_despacho.nompersonmemo.focus(); //el puntero del mouse queda en nombre 
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
															if(document.reg_despacho.nomconvenio.value=="")
															{
															document.reg_despacho.nomconvenio.focus(); //el puntero del mouse queda en nombre 
															finalizarIns();
															var mensaje='Debe especificar el Titulo del Convenio';
															div=document.getElementById('mensaje');
															div.innerHTML=div.innerHTML + mensaje;
															return 0; //devolvemos un cero para dejar de validar 
															}
															if(document.reg_despacho.calendario13.value=="")
															{
															document.reg_despacho.calendario13.focus(); //el puntero del mouse queda en nombre 
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
																	if(document.reg_despacho.nomtraminuevo.value=="")
																	{
																	document.reg_despacho.nomtraminuevo.focus(); //el puntero del mouse queda en nombre 
																	finalizarIns();
																	var mensaje='Debe especificar el Nombre del Nuevo Tramite';
																	div=document.getElementById('mensaje');
																	div.innerHTML=div.innerHTML + mensaje;
																	return 0; //devolvemos un cero para dejar de validar 
																	}
																	if(document.reg_despacho.refabierto.value=="")
																	{
																	document.reg_despacho.refabierto.focus(); //el puntero del mouse queda en nombre 
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
															
																if(document.reg_despacho.refabierto.value=="")
																	{
																	document.reg_despacho.refabierto.focus(); //el puntero del mouse queda en nombre 
																	finalizarIns();
																	var mensaje='Debe especificar la Referencia del Tramite';
																	div=document.getElementById('mensaje');
																	div.innerHTML=div.innerHTML + mensaje;
																	return 0; //devolvemos un cero para dejar de validar 
																	}
															
														}//FIN TRAMITES QUE NO TIENES PREREQUISITOS
												}//cierre del else grande
	//SI QUIEREN AUMENTAR TRAMITES ANTES DEL IF CON index==106 || index==107 || index==108												
   document.reg_despacho.submit(); //enviamos formulario  
}//cierre function javascript