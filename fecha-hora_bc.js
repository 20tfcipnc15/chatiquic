// JavaScript Muestra la fecha y la hora actual
function today()
{
 var today = new Date();
 var hrs = today.getHours();
 dayStr = today.toLocaleString();
 document.write("La Paz - Bolivia ")
 document.write(dayStr);
}