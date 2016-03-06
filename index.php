<h1>Web crawler. Primera version</h1>

<?php

//Libreria
require_once("simple_html_dom.php");

echo "mensaje 1";


$link = "http://190.27.249.245/obs";


//por ahora no sirve
function get_content($url)
{
    $input = file_get_html($url);
    $metars = $input->find('<table[class="sortable obs-display"]>');
    
    print_r($metars);
    echo count($metars);
    
    
    foreach($metars as $metar)
    {
        $tr = $metar->find('tr',0);
        echo $tr;
    }
}

get_content($link);
?>

