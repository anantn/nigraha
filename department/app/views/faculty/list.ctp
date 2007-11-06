<div class="left_column">
</div>
<div class="right_column">
	<h1>Faculty ID List</h1>
	<h3>Department of Computer Engineering</h3>
	<ul>
	<?php
		foreach ($list as $id) {
			echo "<li>".$html->link($id, '/faculty/'.$id)."</li>";
		}
	?>
	</ul>
</div>

