<?php

echo '<h3>Cadena original sin filtrar:</h3>';
//cadena origen con los enlaces sin detectar
$cadena_origen= 'https://www.anerbarrena.com https://www.facebook.com www.google.es @anerbarrena #anerbarrena';

echo $cadena_origen;

//filtro los enlaces normales
$cadena_resultante= preg_replace("/((http|https|www)[^\s]+)/", '<a href="$1">$0</a>', $cadena_origen);
//miro si hay enlaces con solamente www, si es as� le a�ado el https://
$cadena_resultante= preg_replace("/href=\"www/", 'href="https://www', $cadena_resultante);
echo '<h3>Cadena filtrada con enlaces normales:</h3>'.$cadena_resultante;

//saco los enlaces de twitter
$cadena_resultante = preg_replace("/(@[^\s]+)/", '<a target=\"_blank\"  href="http://twitter.com/intent/user?screen_name=$1">$0</a>', $cadena_resultante);
$cadena_resultante = preg_replace("/(#[^\s]+)/", '<a target=\"_blank\"  href="http://twitter.com/search?q=$1">$0</a>', $cadena_resultante);
echo '<h3>Cadena filtrada con enlaces de Twitter:</h3>'.$cadena_resultante;



?>