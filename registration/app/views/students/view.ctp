<?php

require('pdf/fpdf.php');
class PDF extends FPDF
{
	function Header()
	{
		$this->SetFont('Arial', 'B', 16);
		$this->Cell(45);
		$this->Cell(100, 10, 'MNIT Student Lists 2007-08', 1, 0, 'C');
		$this->Ln(20);
		$this->SetFont('Arial', '', 10);
		
	}

	function Footer()
	{
		$this->SetY(-15);
		$this->SetFont('Arial', 'I', 8);
		$this->Cell(0, 10, 'Page '.$this->PageNo().' of {nb} | © 2007, Nigraha', 0, 0, 'C');
	}
	
	function FancyTable($header, $data)
	{
		$count = count($header);

    	//Colors, line width and bold font
	    $this->SetFillColor(199, 0, 0);
    	$this->SetTextColor(255);
	    $this->SetDrawColor(128, 0, 0);
    	$this->SetLineWidth(.3);
	    $this->SetFont('','B');
    
		//Header
		if ($count == 3)
			$w = array(25, 55, 110);
		else
		    $w = array(50, 140);

    	for($i=0; $i<count($header); $i++)
        	$this->Cell($w[$i], 7, $header[$i], 1, 0, 'C', 1);
	    $this->Ln();
    
		//Color and font restoration
	    $this->SetFillColor(224,235,255);
    	$this->SetTextColor(0);
	    $this->SetFont('');
    	
		//Data
	    $fill=0;
	    foreach($data as $row) {
	        $this->Cell($w[0],6,$row[0],'LR',0,'C',$fill);
        	$this->Cell($w[1],6,$row[1],'LR',0,'C',$fill);
			if ($count == 3)
				$this->Cell($w[2],6,$row[2],'LR',0,'R',$fill);
        	$this->Ln();
    	    $fill=!$fill;
	    }
    	$this->Cell(array_sum($w),0,'','T');
	}
}

if ($ListGenerated) {

	if ($output == 'pdf') {
		if (count($list[0]) == 3)
			$header = array('Student ID', 'Name', 'Courses');
		else
			$header = array('Student ID', 'Name');

		$pdf = new PDF();
		$pdf->AliasNbPages();
		$pdf->AddPage();

		$pdf->SetFont('Arial','',12);
		$pdf->SetFillColor(200,220,255);
		if (isset($semester))
			$pdf->Cell(0, 6, "Semester: $semester", 0, 1, 'L', 1);
		if (isset($department))
			$pdf->Cell(0, 6, "Department: $department", 0, 1, 'L', 1);
		if (isset($course))
			$pdf->Cell(0, 6, "$course[0]: ".$course[1][0], 0, 1, 'L', 1);
		$pdf->Ln(4);

		$pdf->FancyTable($header, $list);
		$pdf->Output('list.pdf', 'I');
	} else {
		header("Content-Type: text/csv");
		header("Content-Disposition: attachment; filename=list.csv");
		foreach($list as $id => $name) {
			echo "$id, $name\n";
		}
	}
	
} else {

	echo "<h1>Students Registered: $nReg</h1>";
	echo "<h1>Students Paid: $nFee</h1>";

	echo "<h2>Student Lists</h2>";
	echo $form->create('Student', array('action' => 'view'));
	echo '<fieldset>';
	echo $form->input('deptid', array('label' => 'Department', 'options' => $deptList, 'type' => 'select', 'selected' => 'NULL'));
	echo $form->input('semester', array('label' => 'Semester', 'options' => $semester, 'type' => 'select', 'selected' => 'NULL'));

	if (isset($invalidCourse) and $invalidCourse)
		echo '<span class="notice">An invalid course ID was entered</span>';

	$outOptions = array('pdf' => 'PDF', 'csv' => 'Excel (CSV)');
	echo $form->input('course_id', array('label' => 'Course ID'));
	echo $form->input('type', array('label' => 'Output Type', 'type' => 'select', 'options' => $outOptions));
	echo '</fieldset>';
	echo $form->end('Submit');	

}

?>
