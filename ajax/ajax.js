/*
 * AJAX Native Implementation
 * XMLHTTPRequest object, and Navigator Type Detect 
 * @author: John Castillo V.
 * 
*/
var navegador;
function msieversion() {
    var ua = window.navigator.userAgent
    var msie = ua.indexOf( "MSIE " )
    
    if ( msie > 0 )      // If Internet Explorer, return version number
        return parseInt(ua.substring(msie+5, ua.indexOf(".", msie )))
    else                 // If another browser, return 0
        return 0
        
}

function AjaxHttp() {
	xmlHttp = null;
	try{
		xmlHttp = new ActiveXObject("Msxml2.XMLHTTP");
	} catch (e) {
		 try{
			 xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
		 }catch(e){
			 xmlHttp = new XMLHttpRequest();
		 }
	}
	return xmlHttp;
}

function AjaxHttp1() {
    navegador = msieversion();
    var xmlhttp;
    if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();		
    }
    else if(window.ActiveXObject) {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    return xmlhttp;    
}



