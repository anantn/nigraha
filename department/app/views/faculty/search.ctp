<div class="left_column">
	<div class="navigation">
	<ul class="markermenu">
		<li class="markermenu"><?php echo $html->link('Login', '/faculty/edit'); ?></li>
	</ul>
	</div>
</div>
<div class="right_column">
	<h1>Welcome!</h1>
	<p>
		If you know the userid of the faculty you are looking for,
		you can visit his/her site by appending it to the URL directly.
	</p>
	<p>
		Alternatively, you may want to view a
		<?php echo $html->link('list', '/faculty/list'); ?>
		of faculty members belonging to the deparment.
	</p>
</div>
