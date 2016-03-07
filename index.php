<h1>Web crawler. Primera version</h1>

<?php

//Libreria
require_once("simple_html_dom.php");

echo "mensaje 1";


$link = "http://190.27.249.245/obs";


//por ahora no sirve
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

function getArray($array)
{
    $i=0;
    foreach ($array as $value) 
    {
        $i++;
        echo " [".$i."]: ".$value;
    }
}

get_content($link, 'div',$metars);

echo "<br>";

echo count($metars);
echo "<p>el array es: </p>";

getArray($metars);

//get_content($link, 'table');


?>

