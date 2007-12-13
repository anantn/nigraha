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
	<img src="<?php echo $this->webroot.$f['imag']; ?>" alt="Faculty Photo" width="160" height="200" /><br /><br />
	<div class="navigation">
	<ul class="markermenu">
		<?php if ($f['resu']) { ?>
		<li class="markermenu"><a href="<?php echo $this->webroot.$f['resu']; ?>">View/Download Resume</a></li>
		<?php } ?>
		<br />
        <li class="markermenu"><?php echo $html->link('Home', '/faculty'); ?></li>
        <li class="markermenu"><?php echo $html->link('Faculty', '/faculty/list'); ?></li>
        <li class="markermenu"><?php echo $html->link('Courses', '/course'); ?></li>
        <li class="markermenu"><?php echo $html->link('Research', '/research'); ?></li>
		<br />
		<li class="markermenu"><?php echo $html->link('Login', '/faculty/edit'); ?></li>
	</ul>
	</div>

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
	<h2>Publications</h2>
	<?php untangle($f['publ']); ?>
	<h2>Projects</h2>
	<?php untangle($f['proj']); ?>
</div>
