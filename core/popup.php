<?php
	require_once("protected/envi.php");
    $queryform = ("SELECT data FROM info_".$_REQUEST['table']."
                   WHERE paraid ='".$_REQUEST['pid']."d'
                   AND sectionid = '".$_REQUEST['secid']."'");
    $do = mysql_query($queryform);
	$store = mysql_fetch_array($do);
	echo "<link href=\"css/style.css\" rel=\"stylesheet\" type=\"text/css\">";
	echo "<title>".$store[0]."</title>";
	echo $store['data'];
    echo "<p><br /><a href=\"\" onClick=\"window.close()\">Close Window</a></p>";
?>	
