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
	<h1>Not Found!</h1>
	<p>
		The home page for the faculty member you are looking for cannot be found.
		You may want to check the userid of the faculty member or redo a search.
	</p>
	<p>
		Alternatively, you may want to view a
		<?php echo $html->link('list', '/faculty/list'); ?>
		of faculty members belonging to the deparment.
	</p>
</div>

