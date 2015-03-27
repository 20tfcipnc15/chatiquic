// JavaScript Document
function enlace() 
{  location="index.html"
}
function abrir(URL)
{
	window.open(URL,"",'width=300,height=300,left=70, top70,toolbar=0,scrollbars=0,statusbar=0,menubar =0,resizable=0');
} 
function abrir2(URL)
{
	window.open(URL,"",'width=330,height=320,left=70, top70,toolbar=0,scrollbars=1,statusbar=0,menubar =0,resizable=0');
} 
function abrir3(URL)
{
	window.open(URL,"",'width=420,height=320,left=120, top70,toolbar=0,scrollbars=1,statusbar=0,menubar =0,resizable=0');
} 
function abrir4(URL)
{
	window.open(URL,"",'width=400,height=534,left=398, top=1,toolbar=0,scrollbars=1,statusbar=0,menubar =0,resizable=0');
} 
function valida_envio()
{   
    alert("Su registro ha sido ALMACENADO satisfactoriamente...!!!"); 
    document.fvalida.submit(); 
} 
function alerta_remitente()
{   
    alert("El Remitente NO se encuentra registrado...");
} 
function eliminar_res(parametro)
{
  var respuesta=confirm("¿Esta seguro que desea ELIMINAR el registro?");
  if (respuesta==true)
//    document.write()
	abrir("eliminar_recibido.php?cod="+ parametro);
}
function modificar_res(valor)
{
  //var respuesta=confirm("¿Esta seguro que desea MODIFICAR el registro?");
  //if (respuesta==true)
	//  document.write()
  window.top.location.href = "mod_registro.php?reg="+ valor;
}
function modif_uni(valor)
{
  window.top.location.href = "modificar_uni.php?id="+ valor;
}
function eliminar_des(parametro)
{
  var respuesta=confirm("¿Esta seguro que desea ELIMINAR el registro?");
  if (respuesta==true)
  //document.write()
	abrir("eliminar_despachado.php?cod="+ parametro);
}
function elim_uni(parametro)
{
  var respuesta=confirm("¿Esta seguro que desea ELIMINAR la Unidad seleccionada?");
  if(respuesta==true)
  window.top.location.href = "eliminar_uni.php?id="+ parametro;
}
function modificar_des(valor)
{
  //var respuesta=confirm("¿Esta seguro que desea MODIFICAR el registro?");
  //if (respuesta==true)
  //document.write()
  window.top.location.href = "mod_despachado.php?reg="+ valor;
}
function contactos()
{
	abrir("contactos.php");
}
function recupera_mail(mail)
{
	var formulario_destino = 'send_mail'
	var campo_destino = 'para'
	var e_mail = mail
	var fecha = ''

	eval ("opener.document." + formulario_destino + "." + campo_destino + ".value='" + fecha + "'")
}
function solo_letras(evt)
{  
   var nav4 = window.Event ? true : false;
   // NOTA: ESPACIO= 8, Enter = 13, '0' = 48, '9' = 57
   var key = nav4 ? evt.which : evt.keyCode;
   // alert(key)
   return (key <= 13 || (key >= 97 && key <= 122)|| (key >= 65 && key <= 90) || key == 241 || key == 209 || key == 32);
}
function solo_numeros(evt)
{  
   var nav4 = window.Event ? true : false;
   var key = nav4 ? evt.which : evt.keyCode;
   return (key <= 13 || (key >= 48 && key <= 57)|| (key == 32)|| (key == 46));
}
function numeros_letras(evt)
{  
   var nav4 = window.Event ? true : false;
   var key = nav4 ? evt.which : evt.keyCode;
   return (key <= 13 || (key >= 97 && key <= 122)|| (key >= 65 && key <= 90) || key == 241 || key == 209 || key == 32 || (key >= 48 && key <= 57));
}
function numeros_letras_especiales(evt)
{  
   var nav4 = window.Event ? true : false;
   var key = nav4 ? evt.which : evt.keyCode;
   return (key <= 13 || (key >= 97 && key <= 122)|| (key >= 65 && key <= 90) || key == 241 || key == 209 || key == 32 || (key >= 44 && key <= 57) || key == 40 || key == 95 || key == 41 || key == 58 || key == 59 || key == 186 || key == 36 || key == 64);
}
function modificar(valor)
{
  window.top.location.href = "mod_registro.php?reg="+ valor;
}
/*function enviar()
{
  var respuesta=confirm("¿Esta seguro que desea ENVIAR los datos?");
  if (respuesta==true)
	  document.write()
  window.top.location.href = "registro_save1.php";
}*/