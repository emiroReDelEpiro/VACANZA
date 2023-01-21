<?php

session_start();
if($_SESSION['valid'] == false) {
    header("Location: loginPage.php");
}

$json_file = file_get_contents('test.json');
$localita = json_decode($json_file, true);

require_once ('lib/jpgraph/src/jpgraph.php');
require_once ('lib/jpgraph/src/jpgraph_bar.php');

$keys = array_keys($localita);


$c_mare = 0;
$c_montagna = 0;

foreach ($keys as $key):
    if($localita[$key]["localita"] == "Mare"){
        $c_mare++;
    }
    endforeach;

foreach ($keys as $key):
    if($localita[$key]["localita"] == "Montagna"){
        $c_montagna++;
    }
    endforeach;

$data1y=array($c_mare,$c_montagna);


// Create the graph. These two calls are always required
$graph = new Graph(700,500,'auto');
$graph->SetScale('textlin',0,20);

$theme_class=new UniversalTheme;
$graph->SetTheme($theme_class);

$graph->yaxis->SetTickPositions(array(0,10,20), array(5,15));
$graph->SetBox(false);

$graph->ygrid->SetFill(false);
$graph->xaxis->SetTickLabels(array('Mare','Montagna','Tutto','TUtto'));
$graph->yaxis->HideLine(false);
$graph->yaxis->HideTicks(false,false);

// Create the bar plots
$b1plot = new BarPlot($data1y);

// Create the grouped bar plot
$gbplot = new GroupBarPlot(array($b1plot));
// ...and add it to the graPH
$graph->Add($gbplot);


$b1plot->SetColor("white");
$b1plot->SetFillColor("#cc1111");



$graph->title->Set("Localita");

// Display the graph
$graph->Stroke();
?>


