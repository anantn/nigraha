<?php
        require_once('../../protected/conn_dept.php');
        mysql_select_db("CP",$depart);
        $do = mysql_query("SELECT * FROM info_".$_REQUEST['table']." WHERE sectionid =".$_REQUEST['secid']." AND paraid ='".$_REQUEST['pid']."' AND paratype = 'data'") or die(mysql_query());
        $store = mysql_fetch_assoc($do);
        echo "<link href=\"../../css/style.css\" rel=\"stylesheet\" type=\"text/css\">";
        echo "<title>".$store['sectionname']."</title>";
        echo $store['data'];
?>