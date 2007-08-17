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
    	//Colors, line width and bold font
	    $this->SetFillColor(199, 0, 0);
    	$this->SetTextColor(255);
	    $this->SetDrawColor(128, 0, 0);
    	$this->SetLineWidth(.3);
	    $this->SetFont('','B');
    
		//Header
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
        	$this->Ln();
    	    $fill=!$fill;
	    }
    	$this->Cell(array_sum($w),0,'','T');
	}
}

if ($ListGenerated) {

	if ($output == 'pdf') {
		$header = array('Student ID', 'Name');

		$pdf = new PDF();
		$pdf->AliasNbPages();
		$pdf->AddPage();

		$pdf->SetFont('Arial','',12);
		$pdf->SetFillColor(200,220,255);

		foreach ($list as $course => $values) {
			$pdf->Cell(0, 6, "$course :".$values[0], 0, 1, 'L', 1);
			$pdf->Cell(0, 6, "Semester:".$values[1], 0, 1, 'L', 1);
			$pdf->Cell(0, 6, "Department:".$values[2], 0, 1, 'L', 1);
			$pdf->Ln(4);
		}
		

		$pdf->FancyTable($header, $list);
		$pdf->Output('list.pdf', 'I');
	} else {
		header("Content-Type: text/csv");
		header("Content-Disposition: attachment; filename=list.csv");
		foreach($list as $details) {
			echo $details[0].", ".$details[1];
			if (isset($details[2]))
				echo ", ".$details[2];
			echo "\n";
		}
	}
	
} else {

	echo "<h2>Course List</h2>";
	echo $form->create('Course', array('action' => 'view'));
	echo '<fieldset>';

	$outOptions = array('pdf' => 'PDF', 'csv' => 'Excel (CSV)');
	echo $form->input('type', array('label' => 'Output Type', 'type' => 'select', 'options' => $outOptions));

	echo '</fieldset>';
	echo $form->end('Submit');	

}

?>
