<div class="left_column">
</div>
<div class="right_column">
	<?php
		if ($which) {
			echo "<h2>Your file was uploaded successfully</h2>";
		} else {
			echo "<h2>There was an error in uploading your file</h2>";
		}
		echo "<p>".$html->link('Go back to edit page', '/faculty/edit')."</p>";
	?>
	</p>
</div>

