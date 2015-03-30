<?php
  function conexion()
  { 
     $link=mysql_connect("localhost","root","") or die("Error: ".mysql_error());
	 mysql_select_db("facultad2v2",$link) or die("Error: ".mysql_error());
	 return($link);
  }
  
  function primerRegistro($rut, $referencias){
  		$sw=0;
		$rescom=mysql_query("select fecha from correspondencia where rut='$rut' and referencias='$referencias'");
		$ncom=mysql_num_rows($rescom);
		if($ncom==1)
			$sw=1;
		elseif($ncom==2){
			$regcom=mysql_fetch_array($rescom);
			$fecha1=$regcom['fecha'];
			$regcom=mysql_fetch_array($rescom);
			$fecha2=$regcom['fecha'];
			if($fecha1==$fecha2)
				$sw=1;
		}
		return $sw;
  }
  
  function rutCarreras($cadRUT){
  	$ruts = explode(",",$cadRUT);
	$carreras=array('INF','MAT','BIO','EST','QUIM','FIS');
	foreach($ruts as $rut){
		$sigla=substr($rut, strpos($rut,'-')+1);
		if(!in_array($sigla, $carreras))
			return false;
	}
	return true;
  }
?>
