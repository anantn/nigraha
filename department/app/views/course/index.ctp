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
	<h1>Courses</h1>
	<hr />
    <?php
        foreach ($values as $course => $faculty) {
            echo "<h3>$course</h3><p>";
            foreach ($faculty as $f) {
                echo $html->link($f.' ', '/faculty/'.$f);
            }
        }
    ?>
</div>