<?php
if (isset($email)):
# la direcci�n electr�nica a la que enviar el email
$target="raquel_ale2003@hotmail.com";
mail($target,$subject,"Nombre: ".$nombre."\nT�tulo: ".$subject."\n\n".$text);
endif;
?> 
