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
	if (code == "") {
		$('CoursesCname'+num).value = "";
		$('CoursesCredits'+num).value = "";
		checkSubmit();
	} else {
		new Ajax.Request(
			'/courses/info/'+code, {
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
}

</script>
<?php

function getValues($i, $var)
{
	if ($i < count($var))
		return $var[$i];
	else
		return array("", "");
}

echo '<h2>Registration: Step 3</h2>';
echo '<p><b>Enter only the course codes of the courses you wish to register for this semester. Once you enter a course-code, press the TAB key and the course name and credits will appear automatically. In case they do not, kindly ask for assistance. DO NOT press the ENTER key until you have entered all the course codes for this semester</b></p>';

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
echo $form->hidden('Student.department_id');
echo '</td></tr></table>';

if (isset($error) && $error) {
	echo '<span class="notice">';
	echo 'There was an error in processing your form, Please contact a sysadmin!';
	echo '</span>';
}

echo '<table border="0">';
echo '<tr><td colspan=4><h3>Current Semester Courses</h3></td></tr>';
echo '<tr><td width="20%"><b>Course ID</b></td><td width="60%">Title</td><td width="10%">Credits</td><td width="10%">Former Grade</td></tr>';

for ($i = 0; $i < 7; $i++) {
	$values = getValues($i, $courseInfo);
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
	<td> N.A. <input name=\"data[Courses][$i][bgrade]\" type=\"hidden\" value=\"0\" id=\"CoursesBgrade$i\" size=\"1\" /></td>
</tr>";
}

echo '<tr><td colspan=4><h3>Back Papers</h3></td></tr>';
echo '<tr><td><b>Course ID</b></td><td>Title</td><td>Credits</td><td>Former Grade</td></tr>';

for ($i = 7; $i < 10; $i++) {
	$values = getValues($i, $courseInfo);
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
	<td> <div class=\"input\"><select name=\"data[Courses][$i][bgrade]\"id=\"CoursesBgrade$i\" />
	<option></option><option value=\"E\">E</option><option value=\"F\">F</option></select>
	</div></td>
</tr>";
}

if($sem=="2" or $sem==4) {
	echo '<tr><td colspan=4><h3>Extra Credits</h3></td></tr>';
	echo '<tr><td width="20%">&nbsp;</td><td width="60%">Title</td><td width="10%">Credits</td><td width="10%">&nbsp;</td></tr>';
	
	echo '<tr><td>&nbsp; <input name="data[Courses][$i][course_id]" type="hidden" size="1" /></td><td>Extra Curricular Activity</td><td>2</td>';
	echo '<td><select name="data[Courses][$i][eca]">';
	echo '<option value="ECA-SP">Sports</option>';
	echo '<option value="ECA-MC">Music</option>';
	echo '<option value="ECA-DR">Drama</option>';
	echo '<option value="ECA-PH">Photography</option>';
	echo '<option value="ECA-LT">Literary</option>';
	echo '<option value="ECA-FA">Fine Arts</option>';
	echo '<option value="ECA-EL">Electronica</option>';
	echo '<option value="ECA-IT">ITIKA</option>';
	echo '<option value="ECA-NS">NSS</option>';
	echo '</tr>';
	
	$i = $i+1;
	echo '<tr><td>&nbsp; <input name="data[Courses][$i][course_id]" type="hidden" value="ECA-2" size="1" /></td>
	<td>Discipline</td>
	<td>2 </td>
	<td>N.A <input name="data[Courses][$i][bgrade]" type="hidden" value="0" id="CoursesBgrade$i" size="1" /><input name="data[Courses][$i][category]" type="hidden" value="3" id="CoursesCategory$i" size="1" /></td></tr>';
	$i = $i+1;
}
echo '</table>';
echo $form->end('Submit');
?>

