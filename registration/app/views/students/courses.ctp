<script type="text/javascript">

function updateFields(code, field)
{
	new Ajax.Request(
		'/rest/courses/info/'+code, {
		method: 'get',
		onSuccess: function updateField(transport) {
			if (!transport.responseText.match("")) {
				var data = transport.responseText.evalJSON();
				
			
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
echo '</td><td>';
echo $form->input('Student.fName', array('label' => false, 'disabled' => true));
echo '</td></tr></table>';

echo '<table border="0">';
echo '<tr><td><b>Course ID</b></td><td>Title</td><td>Credits</td>';

for ($i = 0; $i <= 10; $i++) {
	$values = getValue($i, $courseInfo);
	echo "
<tr>
	<td>
		<div class=\"input\"><input name=\"data[Courses][$i][course_id]\" type=\"text\" value=\"".$values[0]."\" id=\"CoursesCid$i\" size=\"6\" onChange=\"updateFields(this.value, this.name)\" /></div>
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
