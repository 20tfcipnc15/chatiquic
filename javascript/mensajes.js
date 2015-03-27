function openDialogWindow(form,title,w,h)
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
    confirmwin = openDialogWindow('finalizarInscripcion','Chasqui Digital','200','120');
}