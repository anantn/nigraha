<?php
$basedir="http://172.16.1.14/";
$arr=array('home', 'acad', 'admin', 'gov', 'research', 'stud', 'insti', 'intra');
foreach($arr as $val)
{	if($_REQUEST['id']==$val)	${$val}='active';
	else ${$val}='';
}
echo"<div id=\"menu\">
				<a href=\"".$basedir."index.php\" class=\"".$home."\">home</a>
				<a href=\"".$basedir."academics/index.php\" class=\"".$acad."\">academics</a>
				<a href=\"".$basedir."administration/index.php\" class=\"".$admin."\">administration</a>
				<a href=\"".$basedir."governance/index.php\" class=\"".$gov."\">governance</a>
				<a href=\"".$basedir."research/index.php\" class=\"".$research."\">research</a>
				<a href=\"".$basedir."students/index.php\" class=\"".$stud."\">students</a>
				<a href=\"".$basedir."institute/index.php\" class=\"".$insti."\">institute</a>
				<a href=\"".$basedir."intranet/index.php\" class=\"".$intra."\">intranet</a>
</div>";
?>
