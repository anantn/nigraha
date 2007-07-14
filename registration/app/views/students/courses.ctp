<?php

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
	echo "
<tr>
	<td>
		<div class=\"input\"><input name=\"data[Courses][$i][cid]\" type=\"text\" value=\"\" id=\"CoursesCid$i\" /></div>
	</td>
	<td>
		<div class=\"input\"><input name=\"data[Courses][$i][cname]\" type=\"text\" disabled=\"disabled\" value=\"\" id=\"CoursesCname$i\" /></div>
	</td>
	<td>
		<div class=\"input\"><input name=\"data[Courses][$i][credits]\" type=\"text\" disabled=\"disabled\" value=\"\" id=\"CoursesCredits$i\" /></div>
	</td>
</tr>";
}
echo '</table>';

echo $form->end('Submit');

?>
