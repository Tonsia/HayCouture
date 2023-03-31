<?php
//echo $_GET['jobid'];

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
require_once('../TCPDF/tcpdf.php');

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
$pdf->setAuthor('Haycouture');
$pdf->setTitle('Invoice Report');
$pdf->setSubject('Resume Parsing');
$pdf->setKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->setHeaderData('logohay.jpg', PDF_HEADER_LOGO_WIDTH, 'Hay Couture', 'Resume Parsing');

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
$pdf->AddPage();

////////////////////////////////////////////////////////
$server = "191.233.27.18";
$username = "admin";
$password = "admin@25";
$dbname = "hccopy";
$conn = new mysqli($server, $username, $password, $dbname);
$cid = $_GET['jobid'];
$jobtitle='';
$sql = "SELECT * FROM jobs WHERE jobid = '$cid'";
$order = $conn->query($sql);
if ($order->num_rows > 0) {
    $orderrow = $order->fetch_array();
    $jobtitle = $orderrow['jobtitle'];
}
//     $userid = $orderrow['userid'];
//     $addrid = $orderrow['addressid'];
//     $tprice = $orderrow['totalamt'];
//     $sql = "SELECT * FROM useraddress WHERE id = '$addrid'";$addr = $conn->query($sql);$addrss = $addr->fetch_array();
//     $name = $addrss['name'];
//     $mobile = $addrss['mobile'];
//     $hname = $addrss['hname'];
//     $cityid = $addrss['cityid'];
//     $disctrictid = $addrss['disctrictid'];
//     $stateid = $addrss['stateid'];
//     $pin = $addrss['pin'];

//     $sql = "SELECT * FROM states WHERE state_id = '$stateid'";$state = $conn->query($sql);$states = $state->fetch_array();
//     $statename = $states['state_name'];

//     $sql = "SELECT * FROM district WHERE district_id = '$disctrictid'";$district = $conn->query($sql);$districts = $district->fetch_array();
//     $districtname = $districts['district_name'];

//     $sql = "SELECT * FROM city WHERE city_id = '$cityid'";$city = $conn->query($sql);$citys = $city->fetch_array();
//     $cityname = $citys['city_name'];


//     $paymentid = $orderrow['paymentid'];
//     $sql = "SELECT * FROM cart WHERE id = '$cartid'";$cart = $conn->query($sql);
//     if ($cart->num_rows > 0) {
//         $cartrow = $cart->fetch_array();
//         $productid = $cartrow['productid'];
//         $sizeid = $cartrow['size_id'];
//         $colorid = $cartrow['color_id'];
//         $qty = $cartrow['quantity'];

//         $sql = "SELECT * FROM product_size WHERE size_id = '$sizeid'";$size = $conn->query($sql);$sizen = $size->fetch_array();
//         $sizename = $sizen['size'];

//         $sql = "SELECT * FROM product_color WHERE color_id = '$colorid'";$color = $conn->query($sql);$colorn = $color->fetch_array();
//         $colorname = $colorn['color'];

//         $sql = "SELECT * FROM products WHERE product_id = '$productid'";$pname = $conn->query($sql);$pn = $pname->fetch_array();
//         $pname = $pn['p_name'];
//         $price = $pn['product_price'];
//     }
// }




$pdf->setFont('helvetica', 'B', 22);
$pdf->Write(0, "Applications Submitted - $jobtitle", '', 0, 'C', true, 0, false, false, 0);
$mydate=getdate(date("U"));
$pdf->Ln(10);
$html = '
<table cellspacing="0" cellpadding="1" border="1" style="border-color:gray;">
    <tr style="background-color:green;color:white;text-align:center;">
        <th>Rank</th>
        <th>Name</th>
        <th>ID</th>
		<th>Similarity %</th>
    </tr>
';

$cid = $_GET['jobid'];
$sql = "SELECT * FROM cv WHERE jobid = '$cid' order by percentage desc";
$order = $conn->query($sql);
if ($order->num_rows > 0) {
	$i=0;
	while($row = $order->fetch_assoc()) {
		$i++;
		$uid = $row['userid'];
	    $sql = "SELECT * FROM registration WHERE reg_id = '$uid'";$addr = $conn->query($sql);$addrss = $addr->fetch_array();
	    $name = $addrss['reg_name'];

		$rnk = '';
		if($row['percentage']==0){
			$rnk = '-';
		}else{
			$rnk = $i;
		}

		$st = '
			<tr style="text-align:center;">
				<td>'.$rnk.'</td>
				<td>'.$name.'</td>
				<td>'.$row['userid'].'</td>
				<td>'.$row['percentage'].'%</td>
			</tr>
		';

		$html .= $st;
	}
}

$html .= '
</table>
';



$pdf->setFont('helvetica', 'B', 12);
$pdf->writeHTML($html, true, false, true, false, '');
// Output the PDF file
$pdf->Output('example.pdf', 'I');





?>