//Inhabilita printscreen.
function inhabilitar(){ 
alert ("Funcion deshabilitada!") 
return false 
}
function tecla(){ 
alert ("Esta funci�n est� deshabilitada ;)")
return false 
}
function ventana(){

document.oncontextmenu=inhabilitar 
document.onkeypress=tecla
document.onkeydown=tecla
document.onkeyup=tecla
// Protege im�gnes.
function timer() 
{ 
   window.clipboardData.clearData(); 
   timeID = setTimeout("timer()", 100); 
} 

Luego en el BODY ponemos lo siguiente: 

//<BODY onload="timer()" oncontextmenu="return false" > 
//</BODY> 
