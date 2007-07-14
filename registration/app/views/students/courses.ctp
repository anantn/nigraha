<script type="text/javascript">

function checkSubmit()
{
	var isAlright = true;
	var daButton;
	
	for (i = 0; i < $('StudentCoursesForm').length; i++) {
		var tempobj = $('StudentCoursesForm').elements[i];
		if (tempobj.type.toLowerCase() == "submit") {
			daButton = tempobj;
		}
		if (tempobj.id.indexOf("CoursesCredits") == 0) {
			if (tempobj.value == "0")
				isAlright = false;
		}
	}

	if (isAlright)
		daButton.disabled = false;
	else
		daButton.disabled = true;
}

function updateFields(code, num)
{
	new Ajax.Request(
		'/cake/rest/courses/info/'+code, {
		method: 'get',
		onSuccess: function updateField(transport) {
			var data = transport.responseText.evalJSON();
			if (data[0] == "") {
				$('CoursesCname'+num).value = "INVALID!";
				$('CoursesCredits'+num).value = 0;
				new Effect.Highlight($('CoursesCname'+num), {startcolor: "ff0000"});
			} else {
				$('CoursesCname'+num).value = data[0];
				$('CoursesCredits'+num).value = data[1];
				new Effect.Highlight($('CoursesCname'+num), {startcolor: "00ff00"});
			}
			checkSubmit();
		}
	});
}

</script>
<?php

function getValue($i, $var)
{
	if ($i < count($var))
		return $var[$i];
	else
		return array("", "");
}

echo '<h2>Registration: Step 2</h2>';

echo $form->create('Student', array('action' => 'courses'));

echo '<table border="0">';
echo '<tr><td>';
echo $form->input('Student.collegeid', array('label' => false, 'disabled' => true));
echo $form->hidden('Student.collegeid');
echo '</td><td>';
echo $form->input('Student.semester', array('label' => false, 'disabled' => true));
echo $form->hidden('Student.semester');
echo '</td><td>';
echo $form->input('Student.fName', array('label' => false, 'disabled' => true));
echo $form->hidden('Student.fName');
echo '</td></tr></table>';

if ($error) {
	echo '<span class="notice">';
	echo 'There was an error in processing your form, Please contact a sysadmin!';
	echo '</span>';
}

echo '<table border="0">';
echo '<tr><td><b>Course ID</b></td><td>Title</td><td>Credits</td>';

for ($i = 0; $i <= 10; $i++) {
	$values = getValue($i, $courseInfo);
	echo "
<tr>
	<td>
		<div class=\"input\"><input name=\"data[Courses][$i][course_id]\" type=\"text\" value=\"".$values[0]."\" id=\"CoursesCid$i\" size=\"6\" onChange=\"updateFields(this.value, ".$i.")\" /></div>
	</td>
	<td>
		<div class=\"input\"><input name=\"data[Courses][$i][cname]\" type=\"text\" disabled=\"disabled\" value=\"".$values[1][0]."\" id=\"CoursesCname$i\" size=\"30\" /></div>
	</td>
	<td>
		<div class=\"input\"><input name=\"data[Courses][$i][credits]\" type=\"text\" disabled=\"disabled\" value=\"".$values[1][1]."\" id=\"CoursesCredits$i\" size=\"2\" /></div>
	</td>
</tr>";
}
echo '</table>';
echo $form->end('Submit');

?>
