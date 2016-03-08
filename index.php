<h1>Web crawler. Primera version</h1>

<?php

//Libreria
require_once("simple_html_dom.php");

echo "mensaje 1";


$link = "http://190.27.249.245/obs";


//Obtiene el contenido de una et
function get_content($url,$tag)
{
    $html = file_get_html($url);
    global $metars;
    echo '<br><br>';
    
    foreach(($html->find('#content #primary_content '.$tag)) as $i=>$metar)
     {
         echo $metar;
         $metars[] = $metar;
     }
}

function printArray($array)
{
    //$i=0;
    foreach ($array as $value) 
    {
        //$i++;
        //echo " [".$i."]: ".$value;
        echo $value;
        echo "<br>";
    }
}

function divideString($array)
{
    global $estacion, $mensaje;
    foreach($array as $row)
    {
        $long = strlen ( $row );
        $estacion[] = substr($row,11,4);
        $mensaje[] = substr($row,16,$long-43);
    }
}


echo "Impresion de todo el contenido...<br>";
get_content($link, 'div',$metars);

echo "<br>";

echo "Numero de elementos del array metars ".count($metars);
echo "<p>el array es: </p>";
printArray($metars);

echo "<br>";
//echo pasarAjson($metars);
divideString($metars);

echo "Impresion de las estaciones...<br>";
printArray($estacion);

echo "<br>";
echo "Impresion de los mensajes..<br>";
printArray($mensaje);

?>

