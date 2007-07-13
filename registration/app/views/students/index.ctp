<?php

echo $form->create('Student', array('action' => 'update'));
echo "<fieldset>";
echo $form->input('Student.collegeid', array('label' => $instructions));
echo $form->submit();
echo '</fieldset><div class="submit">';
echo $form->end();
echo "</div></form>";

?>
