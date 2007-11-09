<?php

if ($isForm) {
	echo '<div class="right_column">';
	if (isset($error) and ($error === true))
		echo "<h3>Your credentials were invalid. Try again!</h3>";
	echo $form->create('Faculty', array('action' => 'edit'));
	echo '<table border="0"><tr><td>User ID:</td><td>';
	echo $form->input('uid', array('label' => ''));
	echo '</td></tr><tr><td> Password:</td><td>';
	echo $form->input('pas', array('label' => '', 'type' => 'password'));
	echo '</td></tr><tr><td colspan="2">';
	echo $form->end('Login');
	echo '</td></tr></table>';
	echo '</div>';
} 

if (isset($logged) and ($logged === true) and ($f != false)) {
	
?>

	<div class="left_column">
	<img src="<?php echo $this->webroot.$f['imag']; ?>" alt="Faculty Photo" width="160" height="200" /><br /><br />
	<hr />
	<p>Click on an item to edit it. Each line corresponds to a single bullet in view mode.</p>
	<hr />
	<div class="navigation">
		<ul class="markermenu">
		<li class="markermenu"><?php echo $html->link('Logout', '/faculty/logout'); ?></li>
		</ul>
	</div>
	
	</div>
	<div class="right_column">
		<h1 id="fName"><?php echo $f['name']; ?></h1>
		<h3 id="fPost"><?php echo $f['post']; ?></h3>
		<h4><?php echo $f['dept']; ?></h4>
		<p id="fEduc"><?php echo $f['educ']; ?></p>
		<h2>Research Interests</h2>
		<p id="fRese"><?php echo $f['rese']; ?></p>	
		<h2>Current Courses</h2>
		<p id="fCour"><?php echo $f['cour']; ?></p>
		<h2>Publications</h2>
		<p id="fPubl"><?php echo $f['publ']; ?></p>
		<h2>Projects</h2>
		<p id="fProj"><?php echo $f['proj']; ?></p>
		<hr />
		<h3>Uploads</h3>
		<h4>Picture</h4>
		<div id="imagDone">
		<form enctype="multipart/form-data" action="edit/imag" method="POST">
			<input type="hidden" name="MAX_FILE_SIZE" value="2097152" />
			<input type="file" name="imag" />
			<input type="submit" value="Upload" />
			<p>For best results, upload a PNG, JPG or GIF image with dimensions 160x200</p>
		</form>
		</div>
		<h4>Résumé</h4>
		<div id="resuDone">
		<form enctype="multipart/form-data" action="edit/resu" method="POST">
			<input type="hidden" name="MAX_FILE_SIZE" value="2097152" />
			<input type="file" name="resu" />
			<input type="submit" value="Upload" />
			<p>For best results, upload a PDF document. You may also upload an HTML document if it does not include external styling or images.</p>
		</form>
		</div>
		<p>(Maximum Size: 2MB)</p>
	</div>

<?php }?>

<script type="text/javascript">
	new Ajax.InPlaceEditor('fName', 'edit/name');
	new Ajax.InPlaceEditor('fEduc', 'edit/educ', {rows: 10, cols: 40});
	new Ajax.InPlaceEditor('fRese', 'edit/rese', {rows: 10, cols: 40});
	new Ajax.InPlaceEditor('fCour', 'edit/cour', {rows: 10, cols: 40});
	new Ajax.InPlaceEditor('fPubl', 'edit/publ', {rows: 10, cols: 40});
	new Ajax.InPlaceEditor('fProj', 'edit/proj', {rows: 10, cols: 40});

	function setupCategoryEditor() {
		var editor = new Ajax.InPlaceEditor('fPost', '<?php echo $html->url('/faculty/edit/post', true);?>');
		Object.extend(editor, {
			createEditField: function() {
            	var text = this.getText();
	            var field = document.createElement("select");
    	        field.name = "value";
        	    this.editField = field;
            	this.form.appendChild(this.editField);

				var va = ['Professor', 'Reader', 'Lecturer'];
				for (var i = 0; i < va.length; i++) {
					var op = document.createElement("option");
	                op.value = va[i];
    	            op.text = va[i]
                    if (window.ActiveXObject) {
                    	field.options.add(op);
                    } else {
                        field.appendChild(op);
                    }
                   	
					if(op.text == text) {
                    	field.selectedIndex = i;
                    }
				}
			}
		});
	};
	setupCategoryEditor();

</script>
