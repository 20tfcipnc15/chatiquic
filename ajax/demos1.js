function get_respuesta(){
	var req=null;
	req=AjaxHttp1();
	req.open('GET','demo1.php',true);
	req.onreadystatechange=
	function(){''
	if(req.readyState==4){
		var res =req.responseText;
			document.getElementById('resultado').innerHTML=res;
			alert(res);
	}
	};
	req.send(null);
}