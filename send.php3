<?php
if (isset($email)):
# la dirección electrónica a la que enviar el email
$target="raquel_ale2003@hotmail.com";
mail($target,$subject,"Nombre: ".$nombre."\nTítulo: ".$subject."\n\n".$text);
endif;
?> 
