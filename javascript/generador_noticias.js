// JavaScript Document
// Generador de Noticias
var ancho = 142 //anchura del cuadro
var alto = 180 //altura del cuadro
var marco = 0 //0 para que notenga marco (borde)
//var pausilla = 8000 //tiempo de la pausa en milisegundos (2000 = 2 segundos)
var destino = "_blank" //target en donde se quiera que se carguen los enlaces, en caso de usarlos.
var cursor = "default;"  //cursor que se quiera sobre el cuadro
var colTitular = '#EDF7FF' //color del texto del titularFONT-FAMILY: Arial, Helvetica, sans-serif
var colTitular2 = '#EDF7FF' // ----> color del texto del primer titulo de noticias
var colTexto = 'black' // color del texto de la noticia
var colTexto2 = 'black'
var colFecha = '#CCDDEE' //color del texto de la fecha
var colFecha2 = '#333399'
var colEnlace = '#FFFFFF' //color del texto del enlace
var fuente = "Arial, Helvetica, sans-serif" //fuente para los textos 
var tamTitular = '10' //tamaño de la fuente del titular
var tamTexto = '10' //tamaño de la fuente del texto de la noticia
var tamFecha = '10' // tamaño de la fuente de la fecha
var tamEnlace = '10' // tamaño de la fuente del enlace 
var masInfo = true //Determina si se usa o no el enlace. true para usarlo. false para omitirlo
var poneFecha = true //true para poner fecha. false para omitirla. Si no se quiere fecha, dejar las comillas vacías ""

function noticia(titular,texto,fecha,enlace,destino)
	{
	this.titular = titular
	this.texto = texto
	this.fecha= fecha
	this.enlace = enlace
	this.destino = destino
	}
var noticias = new Array()
noticias[0]= new noticia("M.Sc. Franz Cuevas Quiroz","Decano de la Facultad de Ciencias Puras y Naturales","'","noticia_1.php?not=1","_blank")
noticias[1]= new noticia("Dra. Maria Eugenia Garcia Moreno","Vicedecana de la Facultad de Ciencias Puras y Naturales",".","noticia_1.php?not=2","_blank")
/*noticias[2]= new noticia("Lic. Marcelo Aruquipa Chambi","Supervisor y Coordinador TIC Facultativo.",".","noticia_1.php?not=2","_blank")
noticias[3]= new noticia("Srta. Aleida Raquel  Ibañez Apaza"," Ing. en Sistemas. Desarrolladora del Sistema.        UMSA-Informática","La Paz Julio de 2008","noticia_1.php?not=4","_blank")
noticias[4]= new noticia("Colaboradores","Lic.Enrique Figueroa             Sra.Silvia Urquidi Sra.Patricia Alvarez            Sr. Christhian Rojas","Personal de Decanato","noticia_1.php?not=3","_blank")
noticias[5]= new noticia("Señor Muricio Ingali Vargas","Especial agradecimiento,      por su predisposición y colaboración, en la implementación del Sistema.","Personal de Decanato","noticia_1.php?not=3","_blank")*/
var det = false
function escribe()
{
document.write ('<div id="mami" style="width:' + ancho + '; height:' + alto + 'px; position:relative;  overflow:hidden ">')
document.write('<table width="' + ancho + '" height="100%"><tr><td valign="top">')
document.write ('<div id="uno" class="Bloque" style="top:' + alto +'; width:' + ancho + ' height:' + alto + 'px;  ">')
document.write ('<div class="Cabecera" align="center">')
document.write (noticias[0].titular)
document.write ('</div>')
document.write ('<div class="Contenido" align="center">')
document.write (noticias[0].texto)
document.write ('</div>')
document.write ('<div class="fecha" align="left">')
document.write (noticias[0].fecha)
document.write ('</div>')
if(masInfo == true){
	document.write ('<a class="enlace" href="noticia_1.php"')
	document.write (noticias[0].enlace)
	document.write ('" target="' + destino + '"><font color=blue></font></a>')
	}
document.write ('</div>')
document.write ('<div id="dos" class="Bloque" style="top:' + (alto*2) +'; width:' + ancho + ' height:' + alto + 'px; ">')
document.write ('<div class="Cabecera" align="center">')
document.write (noticias[1].titular)
document.write ('</div>')
document.write ('<div class="Contenido" align="center">')
document.write (noticias[1].texto)
document.write ('</div>')
document.write ('<div class="fecha" align="left">')
document.write (noticias[1].fecha)
document.write ('</div>')
if(masInfo == true){
	document.write ('<a class="enlace" href="')
	document.write (noticias[1].enlace)
	document.write ('" target = "' + destino + '"><font color=blue></font></a>')
	}
document.write ('</div>')
document.write('</td></tr></table>')
document.write ('</div>')
if(navigator.appName == "Netscape")
{altoUno = document.getElementById('uno').offsetHeight}
else
{altoUno = document.getElementById('uno').clientHeight}
document.getElementById('uno').onmouseover =function(){
	det = true
	clearTimeout(tiempo)
	}
document.getElementById('uno').onmouseout =function(){
	det = false;
	clearTimeout(tiempo)
	escrolea()
	}
document.getElementById('dos').onmouseover =function(){
	det = true
	clearTimeout(tiempo)
	}
document.getElementById('dos').onmouseout =function(){
	det = false;
	clearTimeout(tiempo)
	 escrolea()
	}
}
desp = 1
var cont = 1
var pos,pos2
function escrolea(){
pos = document.getElementById('uno').style.top
pos = pos.replace(/px/,"");
pos = pos.replace(/pt/,"");
pos = new Number(pos);
pos2 = document.getElementById('dos').style.top
pos2 = pos2.replace(/px/,"");
pos2 = pos2.replace(/pt/,"");
pos2 = new Number(pos2);
pos -= desp
pos2 -= desp
if (pos == desp){
	var contenidos = ""
	document.getElementById('dos').style.top = alto
	document.getElementById('dos').childNodes[0].firstChild.nodeValue  = noticias[cont].titular
	document.getElementById('dos').childNodes[1].firstChild.nodeValue  = noticias[cont].texto
	if(poneFecha == true){
	document.getElementById('dos').childNodes[2].firstChild.nodeValue  = noticias[cont].fecha
	}
	if(masInfo == true){
		document.getElementById('dos').childNodes[3].href = noticias[cont].enlace 
	}
	document.getElementById('uno').style.top = 0
	if(cont == noticias.length-1)
		{cont=0}
	else{
		cont++
		}
	pausa()
	return false
	}
else{
	if (pos2 == desp){
		var contenidos = ""
		document.getElementById('uno').style.top = alto
		document.getElementById('uno').childNodes[0].firstChild.nodeValue  = noticias[cont].titular
		document.getElementById('uno').childNodes[1].firstChild.nodeValue  = noticias[cont].texto
		if(poneFecha == true){
		document.getElementById('uno').childNodes[2].firstChild.nodeValue  = noticias[cont].fecha
		}
		if(masInfo == true){
		document.getElementById('uno').childNodes[3].href  = noticias[cont].enlace
		}
		document.getElementById('dos').style.top = 0
		if(cont == noticias.length-1)
		{cont=0}
	else{
		cont++
		}
		pausa()
		return false
	}
	else{
		document.getElementById('uno').style.top = pos
		document.getElementById('dos').style.top = pos2
		}
	}
tiempo = window.setTimeout('escrolea()',3)
}
var tiempo
function pausa()
{
clearTimeout(tiempo)
if (det == false){
	tiempo = setTimeout ('continuar()',2000)
	}
}
function continuar()
{
if(det == false)
	{escrolea()}
}
document.write('<style type="text/css">')
document.write ('#uno {')
document.write ('color: #006699;')
if(cursor == "pointer" || cursor == "hand"){
cursor = (navigator.appName == "Netscape")?'pointer;':'hand;';
}
document.write ('cursor:' + cursor + ";")
document.write ('position:absolute;}')
document.write ('#dos {')
document.write ('color: #006699;')
document.write ('cursor:' + cursor + ";")
document.write ('position:absolute;}')
document.write ('.titular{')
document.write ('color:' + colTitular2 +';')
document.write ('font-family:' + fuente + ';')
document.write ('font-size :' + tamTitular + ';text-decoration:underline;}')
document.write ('.texto{')
document.write ('color:' + colTexto2 + ';')
document.write ('font-family:' + fuente + ';')
document.write ('font-size:' + tamTexto + ';}')
if(poneFecha == true){
document.write ('.fecha{')
document.write ('color:' + colFecha2 +';')
document.write ('font-family:' + fuente + ';')
document.write ('font-size :' + tamFecha + ';font-weight:bold}')
}
else{
document.write ('.fecha{display: none;}')
}
document.write ('.enlace{')
document.write ('color:' + colEnlace + ';')
document.write ('font-family:' + fuente + ';')
document.write ('font-size:' + tamEnlace + ';}')
document.write ('</style>') 
