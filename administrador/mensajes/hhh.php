<LINK href="dhtmlwindow.css" type=text/css rel=stylesheet>
<SCRIPT language=JavaScript src="dhtmlwindow.js"></SCRIPT>
<LINK href="modal.css" type=text/css rel=stylesheet>
<SCRIPT language=JavaScript src="modal.js"></SCRIPT>
<script language="javascript">  
//onclick="finalizarIns()"
//var mensaje;
function openDialogWindow(form,title,w,h,www)
{
   var addFormwin=dhtmlmodal.open('win'+form, 'div', form, title,'width='+w+'px,height='+h+'px,left=100px,top=100px,resize=0,scrolling=0');
   addFormwin.moveTo('middle', 'middle');
   return addFormwin;
}
function cancelIns() 
{
     confirmwin.hide();
}

function confirmIns() 
{
     document.MiForm.submit()
}
function finalizarIns() 
{	
    confirmwin = openDialogWindow('finalizarInscripcion','Aleida','200','120');
}
function verifica()
{  
    if(document.form.nombre.value.length < 2){ //si el largo de nombre es menor a 2 caracteres 

        document.form.nombre.focus(); //el puntero del mouse queda en nombre 
		finalizarIns();
		var mensaje='noemi está aqui';
		div=document.getElementById('mensaje');
		div.innerHTML=div.innerHTML + mensaje;
        return 0; //devolvemos un cero para dejar de validar 
    } 
    if(document.form.marca.value.length < 2){ //si el largo de marca es menor a 2 caracteres 
        alert("Debe ingresar una marca"); //mensaje a la pantalla 
        document.form.marca.focus(); //el puntero del mouse queda en marca 
        return 0; //devolvemos un cero para dejar de validar 
    } 
    if(document.form.precio.value.length <= 0){ //si el largo de precio es igual o menor a 0 caracteres 
        alert("Debe ingresar un precio"); //mensaje a la pantalla 
        document.form.precio.focus(); //el puntero del mouse queda en precio 
        return 0; //devolvemos un cero para dejar de validar 
    }else{ //sino enviamos el formulario 
        document.form.submit(); //enviamos formulario     
    } 
}  
</script>  
</head>  
<body>  
    <form action="" method="post" name="form" id="form"> 
        Nombre: <input name="nombre" type="text"><br> 
        Marca: <input name="marca" type="text"><br> 
        Precio: <input name="precio" type="text"><br> 

		
   <div id="finalizarInscripcion" style="display:none">
                        <div class="formPanel">
						<div>
                            <p><span id="mensaje"> </span></p>
                            <div class="PwdMeterBase" style="width:100%">
                                <table align="center">
                                    <td>
<input name="enviar2" type="button" class="Estilo59" style="width:90px;background-color:#4791C5;border:0px;margin:1px;padding:0px; font-weight: bold;" value="Aceptar" onClick="cancelIns()">
                                    </td>
                                </table>
                            </div>
                        </div>
                    </div>
	  </div>

        <input name="Guardar" value="Guardar" type="button" onClick="verifica()"><br> 
        <input name="Salir" value="Salir" type="button"><br> 
    </form> 
    <img src="../../img/fondo_v.gif" width="2" height="21">
</body>  