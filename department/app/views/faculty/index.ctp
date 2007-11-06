<?php

function untangle($string)
{
	echo "<ul>";
	$values = explode("\n", $string);
	foreach ($values as $value) {
		echo "<li>$value</li>";
	}
	echo "</ul>";
}

?>

<div class="left_column">
	<img src="<?php echo $this->webroot.$f['imag']; ?>" alt="Faculty Photo" /><br /><br />
	<div class="navigation">
	<ul class="markermenu">
		<li class="markermenu"><?php echo $html->link('Login', '/faculty/edit'); ?></li>
	</ul>
	</div>
</div>
<div class="right_column">
	<h1><?php echo $f['name']; ?></h1>
	<h3><?php echo $f['post']; ?></h3>
	<h4><?php echo $f['dept']; ?></h4>
	<?php untangle($f['educ']); ?>
	<h2>Research Interests</h2>
	<?php untangle($f['rese']); ?>	
	<h2>Current Courses</h2>
	<?php untangle($f['cour']); ?>
</div>
