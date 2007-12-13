<div class="left_column">
	<div class="navigation">
	<ul class="markermenu">
        <li class="markermenu"><?php echo $html->link('Home', '/faculty'); ?></li>
        <li class="markermenu"><?php echo $html->link('Faculty', '/faculty/list'); ?></li>
        <li class="markermenu"><?php echo $html->link('Courses', '/course'); ?></li>
        <li class="markermenu"><?php echo $html->link('Research', '/research'); ?></li>
		<br />
		<li class="markermenu"><?php echo $html->link('Login', '/faculty/edit'); ?></li>
	</ul>
	</div>
</div>
<div class="right_column">
	<h1>Faculty ID List</h1>
	<h3>Department of Computer Engineering</h3>
	<ul>
	<?php
		foreach ($list as $id => $name) {
			echo "<li>".$html->link($name, '/faculty/'.$id)."</li>";
		}
	?>
	</ul>
</div>

