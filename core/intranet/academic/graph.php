<?php
// A medium complex example of JpGraph
// Note: You can create a graph in far fewwr lines of code if you are
// willing to go with the defaults. This is an illustrative example of
// some of the capabilities of JpGraph.

include ("jpgraph/src/jpgraph.php");
include ("jpgraph/src/jpgraph_line.php");
include ("jpgraph/src/jpgraph_bar.php");

$no = 60;
$databarx = array("E", "D", "C", "C+", "B", "B+", "A", "A+");
$databary = array();
$datay=array(0, 0, 10, 15, 20, 15, 10, 5);
//$datay=array(0, 4, 3, 10, 20, 17, 4, 2);
for($i=1;$i<61;$i++) array_push($databary, $i);
/*for($j=1;$j<9;$j++)
{	$num = rand(0, $no);
	array_push($datay,$num);
	$no = $no-$num;
}*/

// New graph with a background image and drop shadow
$graph = new Graph(600,400,"auto");
$graph->SetShadow();

// Use text X-scale so we can text labels on the X-axis
$graph->SetScale("textlin");

// Color the two Y-axis to make them easier to associate
// to the corresponding plot (we keep the axis black though)
$graph->yaxis->SetColor("black","red");


// Set title and subtitle
$graph->title->Set("Students .vs. Grades");

// Use built in font (don't need TTF support)
$graph->title->SetFont(FF_FONT1,FS_BOLD);

// Make the margin around the plot a little bit bigger then default
$graph->img->SetMargin(40,160,40,80);    

// Slightly adjust the legend from it's default position in the
// top right corner to middle right side
$graph->legend->Pos(0.03,0.5,"right","center");

// Display every 6:th tickmark
$graph->xaxis->SetTextTickInterval(1);

// Label every 2:nd tick mark
$graph->xaxis->SetTextLabelInterval(1);

// Setup the labels
$graph->xaxis->SetTickLabels($databarx);
$graph->xaxis->SetLabelAngle(0);

// Create a red line plot
$p1 = new LinePlot($datay);
$p1->SetColor("red");
$p1->SetLegend("Number of students");

// The order the plots are added determines who's ontop
$graph->Add($p1);

// Finally output the  image
$graph->Stroke();
?>
