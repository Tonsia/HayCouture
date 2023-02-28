<?php
//============================================================+
// File name   : example_011.php
// Begin       : 2008-03-04
// Last Update : 2013-05-14
//
// Description : Example 011 for TCPDF class
//               Colored Table (very simple table)
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: Colored Table
 * @author Nicola Asuni
 * @since 2008-03-04
 * @group table
 * @group color
 * @group pdf
 */

// Include the main TCPDF library (search for installation path).
require_once('TCPDF/tcpdf.php');

// extend TCPF with custom functions
class MYPDF extends TCPDF {

	// Load table data from file
	public function LoadData($file) {
		// Read file lines
		$lines = file($file);
		$data = array();
		foreach($lines as $line) {
			$data[] = explode(';', chop($line));
		}
		return $data;
	}

	// Colored table
	public function ColoredTable($header,$data) {
		// Colors, line width and bold font
		$this->setFillColor(255, 0, 0);
		$this->setTextColor(255);
		$this->setDrawColor(128, 0, 0);
		$this->setLineWidth(0.3);
		$this->setFont('', 'B');
		// Header
		$w = array(10, 45, 35, 35,35);
		$num_headers = count($header);
		for($i = 0; $i < $num_headers; ++$i) {
			$this->Cell($w[$i], 7, $header[$i], 1, 0, 'C', 1);
		}
		$this->Ln();
		// Color and font restoration
		$this->setFillColor(224, 235, 255);
		$this->setTextColor(0);
		$this->setFont('');
		// Data
		$fill = 0;
		foreach($data as $row) {
			$this->Cell($w[0], 6, $row[0], 'LR', 0, 'C', $fill);
			$this->Cell($w[1], 6, $row[1], 'LR', 0, 'C', $fill);
			$this->Cell($w[2], 6, $row[2], 'LR', 0, 'C', $fill);
			$this->Cell($w[3], 6, $row[3], 'LR', 0, 'C', $fill);
			$this->Cell($w[4], 6, $row[4], 'LR', 0, 'C', $fill);
			$this->Ln();
			$fill=!$fill;
		}
		$this->Cell(array_sum($w), 0, '', 'T');
	}
}

// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->setCreator(PDF_CREATOR);
$pdf->setAuthor('Codeground');
$pdf->setTitle('Challenge Report');
$pdf->setSubject('Coding Challenge');
$pdf->setKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->setHeaderData('cg_logo.png', PDF_HEADER_LOGO_WIDTH, 'Coding Challenge', 'Challenge Report');

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->setDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->setMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->setHeaderMargin(PDF_MARGIN_HEADER);
$pdf->setFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->setAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->setFont('helvetica', 'B', 12);

// add a page
$pdf->AddPage();

// column titles
$header = array('No','Submission Time', 'Student ID', 'Student Name', 'Status');

////////////////////////////////////////////////////////
$server = "localhost";
$username = "root";
$password = "";
$dbname = "codeground";
$conn = new mysqli($server, $username, $password, $dbname);

$cid = $_GET['challengeid'];
$sql = "SELECT * FROM submissionstatus WHERE challenge_id = '$cid' and status = 'Accepted' order by timestamp";
$result = $conn->query($sql);

$student_data = array();
$students = array();

if ($result->num_rows > 0) {
	$i=1;
    while($row = $result->fetch_assoc()) {
        $student_data[] = $row;

		$stid = $row['userid'];
		$result1 = $conn->query("SELECT name FROM users WHERE userid = '$stid' ");$row1 = $result1->fetch_array();
		$result2 = $conn->query("SELECT studentcode FROM student WHERE user_id = '$stid' ");$row2 = $result2->fetch_array();

		//echo $row1['name'];
		
		$student = array('0' => $i, '1' => $row['timestamp'], '2' => $row2['studentcode'], '3' => $row1['name'], '4' => $row['status']);
		$students[] = $student;
		$i++;
    }
} 
/////////////////////////////////////////////////

$result3 = $conn->query("SELECT * FROM challenges WHERE id = '$cid' ");$row3 = $result3->fetch_array();
$ccode = $row3['code'];
$cname = $row3['name'];

$deptid = $row3['dept_id'];
$result4 = $conn->query("SELECT * FROM department WHERE dept_id = '$deptid' ");$row4 = $result4->fetch_array();
$dept = $row4['dept_code'];

$batchid = $row3['batch_id'];
$result4 = $conn->query("SELECT * FROM batches WHERE id = '$batchid' ");$row4 = $result4->fetch_array();
$batch = $row4['batchcode'];

$courseid = $row3['course_id'];
$result4 = $conn->query("SELECT * FROM course WHERE course_id = '$courseid' ");$row4 = $result4->fetch_array();
$course = $row4['course_code'];
$cname = $row4['course_name'];
// data loading
// $data = $pdf->LoadData('demo.txt');

//print_r($students);
//print_r($data);
//print_r($student_data);

// print colored table


// print a block of text using Write()
$pdf->Write(0, "Challenge Name : ".$cname, '', 0, 'L', true, 0, false, false, 0);
$pdf->Write(1, "Challenge Code : ".$ccode, '', 0, 'L', true, 0, false, false, 0);
$pdf->Write(0, "Course Name : ".$course, '', 0, 'L', true, 0, false, false, 0);
$pdf->Write(0, "Course Code : ".$cname, '', 0, 'L', true, 0, false, false, 0);
$pdf->Write(1, "Batch Code : ".$batch, '', 0, 'L', true, 0, false, false, 0);
$pdf->Write(0, "Department : ".$dept, '', 0, 'L', true, 0, false, false, 0);

$pdf->Write(2, '', '', 0, 'C', true, 0, false, false, 0);

$pdf->ColoredTable($header, $students);

// ---------------------------------------------------------

// close and output PDF document
$pdf->Output('example_011.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
