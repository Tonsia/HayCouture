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
$pdf->setSubject('Order Invoice');
$pdf->setKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->setHeaderData('logohay.jpg', PDF_HEADER_LOGO_WIDTH, 'Hay Couture', 'Order Invoice');

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
$server = "localhost";
$username = "root";
$password = "";
$dbname = "haycouture";
$conn = new mysqli($server, $username, $password, $dbname);
$cid = $_GET['uid'];

$sql = "SELECT * FROM orders WHERE id = '$cid'";$order = $conn->query($sql);
if ($order->num_rows > 0) {
    $orderrow = $order->fetch_array();
    $cartid = $orderrow['cartid'];
    $userid = $orderrow['userid'];
    $addrid = $orderrow['addressid'];
    $tprice = $orderrow['totalamt'];
    $sql = "SELECT * FROM useraddress WHERE id = '$addrid'";$addr = $conn->query($sql);$addrss = $addr->fetch_array();
    $name = $addrss['name'];
    $mobile = $addrss['mobile'];
    $hname = $addrss['hname'];
    $cityid = $addrss['cityid'];
    $disctrictid = $addrss['disctrictid'];
    $stateid = $addrss['stateid'];
    $pin = $addrss['pin'];

    $sql = "SELECT * FROM states WHERE state_id = '$stateid'";$state = $conn->query($sql);$states = $state->fetch_array();
    $statename = $states['state_name'];

    $sql = "SELECT * FROM district WHERE district_id = '$disctrictid'";$district = $conn->query($sql);$districts = $district->fetch_array();
    $districtname = $districts['district_name'];

    $sql = "SELECT * FROM city WHERE city_id = '$cityid'";$city = $conn->query($sql);$citys = $city->fetch_array();
    $cityname = $citys['city_name'];


    $paymentid = $orderrow['paymentid'];
    $sql = "SELECT * FROM cart WHERE id = '$cartid'";$cart = $conn->query($sql);
    if ($cart->num_rows > 0) {
        $cartrow = $cart->fetch_array();
        $productid = $cartrow['productid'];
        $sizeid = $cartrow['size_id'];
        $colorid = $cartrow['color_id'];
        $qty = $cartrow['quantity'];

        $sql = "SELECT * FROM product_size WHERE size_id = '$sizeid'";$size = $conn->query($sql);$sizen = $size->fetch_array();
        $sizename = $sizen['size'];

        $sql = "SELECT * FROM product_color WHERE color_id = '$colorid'";$color = $conn->query($sql);$colorn = $color->fetch_array();
        $colorname = $colorn['color'];

        $sql = "SELECT * FROM products WHERE product_id = '$productid'";$pname = $conn->query($sql);$pn = $pname->fetch_array();
        $pname = $pn['p_name'];
        $price = $pn['product_price'];
    }
}





$pdf->setFont('helvetica', 'B', 22);
$pdf->Write(0, "INVOICE", '', 0, 'C', true, 0, false, false, 0);
$mydate=getdate(date("U"));
$html = '
<style>
table {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

table td, #customers th {
  border: 1px solid #ddd;
  text-align: center;
  padding: 8px;
}

table tr:nth-child(even){background-color: #f2f2f2;}

table tr:hover {background-color: #ddd;}

table th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: center;
  background-color: #04AA6D;
  color: white;
}
</style>
<div id="document">
        <div id="documenthead">

            <table style="text-align: left;  border: none">
                <tr class="metadata-date">
                    <td style="text-align: left;border: none;">
                        <u>Invoice Details</u><br><br>
                        Invoice ID : #HCO'.$cid.'<br>
                        Date : '.$mydate["mday"].' '.$mydate["month"].' '.$mydate["year"].'<br>
                    </td>
                    <td style="text-align: right;border: none;">
                        <u>Delivery Address</u><br><br>
                        '.$name.'<br>
                        '.$hname.'<br>
                        '.$cityname.', '.$districtname.'<br>
                        '.$statename.', '.$pin.'<br>
                        Mob : '.$mobile.'
                    </td>
                </tr>
            </table>
           
           
        </div>

          <div class="content">

                <div>
                <u>Order Details</u><br>
            </div>
              
              <div id="products" class="products">
                  <table style="font-size: 14px;">
                      <thead>
                      <tr>
                          <th class="column-productcode-supplier">No</th>
                          <th class="column-productcode">Product Name</th>
                          <th class="right column-amount">Quantity</th>
                          <th class="right column-price">Price</th>
                          <th class="right column-total-price">Total</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr >
                            <td class="column-productcode-supplier">1</td>
                            <td class="column-productcode">'.$pname.'</td>
                            <td class="right column-amount">'.$qty.'</td>
                            <td class="right column-price">'.$price.'</td>
                            <td class="right column-total-price">'.number_format((float)$qty*$price, 2, '.', '').'</td>
                        </tr>
                        
                    </tbody>
                    <tfoot>
                    <tr>
                        <td style="text-align: right;font-size: 13px;" colspan="4" class="align-right"><strong>GST :</strong></td>
                        <td id="totalprice" class="align-right nowrap column-total-price">'.number_format((float)$tprice-($qty*$price), 2, '.', '').'</td>
                    </tr>
                    <tr>
                        <td style="text-align: right;font-size: 14px;" colspan="4" class="align-right"><strong>Total Amount :</strong></td>
                        <td id="totalprice" class="align-right nowrap column-total-price">'.number_format((float)$tprice, 2, '.', '').'</td>
                    </tr>
                    </tfoot>
                </table>
            </div>
            
            <div style="font-size: 14px;">
                <u>Product Details</u><br>
            </div>
            

            <div id="metadata">
            
            <table style="font-size: 14px;border: 1px solid #fff;text-align:left;">
                
                <tr class="metadata-purchaseorderid">
                    <td >Product ID</td>
                    <td>'.$productid.'</td>
                </tr>
                <tr class="metadata-purchaseorderid">
                    <td >Product Name</td>
                    <td>'.$pname.'</td>
                </tr>
                <tr class="metadata-warehouse">
                    <td>Product Size </td>
                    <td>'.$sizename.'</td>
                </tr>
                
                <tr class="metadata-delivery-date">
                    <td>Product Color</td>
                    <td>'.$colorname.'</td>
                </tr>
                
            </table>
        </div>

            <div style="font-size: 14px;" id="address">
                <u>Payment Details</u><br><br>
                Transaction ID : '.$paymentid.'<br>
                Payment Method : UPI<br>
            </div>

            <br>

            <table style="text-align: left;  border: none;">
                <tr class="metadata-date">
                    
                <td style="text-align: left;border: none;">
                    <img  style="align:right;width:70px;height:65px;" src="../verify.png">
                    </td>

                    <td style="text-align: right;border: none;">
                        <img src="double-tick.png">
                        Thank you for purchasing with us<br>
                        Haycouture<br>
                        
                    </td>
                </tr>
        </table>

          </div>


           
        </div>
    </div>
';

$pdf->setFont('helvetica', 'B', 12);
$pdf->writeHTML($html, true, false, true, false, '');
//$pdf->writeHTML('<img  style="align:right;width:70px;height:65px;" src="../verify.png">', true, false, true, false, '');
//$pdf->Image('../verify.png',$width = 10, $height = 10);
// Output the PDF file
$pdf->Output('example.pdf', 'I');




