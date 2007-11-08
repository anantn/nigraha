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
	<img src="<?php echo $this->webroot.$f['imag']; ?>" alt="Faculty Photo" /><br /><br />
	<p>Click on an item to edit it</p>
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
	</div>

<?php }?>

<script type="text/javascript">
	new Ajax.InPlaceEditor('fName', 'http://cse.mnit.ac.in/faculty/edit/name');
	new Ajax.InPlaceEditor('fEduc', 'http://cse.mnit.ac.in/faculty/edit/educ', {rows: 10, cols: 40});
	new Ajax.InPlaceEditor('fRese', 'http://cse.mnit.ac.in/faculty/edit/rese', {rows: 10, cols: 40});
	new Ajax.InPlaceEditor('fCour', 'http://cse.mnit.ac.in/faculty/edit/cour', {rows: 10, cols: 40});
	new Ajax.InPlaceEditor('fPubl', 'http://cse.mnit.ac.in/faculty/edit/publ', {rows: 10, cols: 40});
	new Ajax.InPlaceEditor('fProj', 'http://cse.mnit.ac.in/faculty/edit/proj', {rows: 10, cols: 40});

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
