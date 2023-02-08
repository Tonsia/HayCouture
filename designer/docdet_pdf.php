<?php

require_once 'FPDF/fpdf.php';
require_once 'db_connect.php';

// $query="SELECT tbl_doctor.d_id,tbl_doctor.d_name,tbl_doctor.d_fees,tbl_login.email, 
//                             tbl_doctor.spec
// 							 FROM tbl_login
// 							 JOIN tbl_doctor
// 							 ON tbl_doctor.l_id = tbl_login.l_id";
$unid = $_GET['uid'];
$query="SELECT uniqueid,tcolor,bcolor,neckline,sleeve,bottom,size,amount,paymentid,created
							 FROM customorder where uniqueid='$unid'";
$data = mysqli_query($conn,$query);
//    if(isset($_POST['btn_pdf']))
//    {
    $pdf =new FPDF('p','mm','a4');
    $pdf->SetFont('arial','b','10');
    $pdf->AddPage();
    
    $pdf->Cell(71 ,10,'',0,0);
    $pdf->SetFont('arial','b','30');
    $pdf->Cell(59 ,5,'Invoice',0,0);
    $pdf->Cell(59 ,15,'',0,1);

    $pdf->Cell(69 ,10,'',0,0);
    $pdf->SetFont('arial','b','20');
    $pdf->Cell(59 ,5,'HayCouture',0,0);
    $pdf->Cell(59 ,12,'',0,1);
   


    $pdf->SetFont('Arial','B',15);
    $pdf->Cell(71 ,5,'Location',0,0);
    $pdf->Cell(59 ,5,'',0,0);
    $pdf->Cell(59 ,5,'Details',0,1);

    $pdf->SetFont('Arial','',10);

    $pdf->Cell(130 ,5,'Near DAV',0,1);
    $pdf->Cell(130 ,5,'685 Market Street Erode-638000',0,0);
    // $pdf->Cell(25 ,5,'Customer Name:',0,0);
    // $pdf->Cell(34 ,5,'',0,1);
    $pdf->Cell(25 ,5,'Customer ID:',0,0);
    $pdf->Cell(34 ,5,'0012',0,1);
   


    $pdf->SetFont('arial','b','10');
    $pdf->cell('25','10','Order_ID','1','0','C');
    // $pdf->cell('18','10','Top Color','1','1','C');
    // $pdf->cell('25','10','Bottom Color','1','1','C');
    $pdf->cell('22','10','Neckline','1','0','C');
    $pdf->cell('22','10','Sleeve','1','0','C');
    $pdf->cell('22','10','Bottom','1','0','C');
    $pdf->cell('12','10','Size','1','0','C');
    $pdf->cell('15','10','Amount','1','0','C');
    $pdf->cell('47','10','Payment ID','1','1','C');
    // $pdf->cell('25','10','Order Created At ID','1','1','C');
    
    $pdf->SetFont('arial','','12');
    while($row = mysqli_fetch_assoc($data))   
    {
        $pdf->cell('25','10',$row['uniqueid'],'1','0','C');
        // $pdf->cell('30','10',$row['tcolor'],'1','0','C');
        // $pdf->cell('15','10',$row['bcolor'],'1','0','C');
        $pdf->cell('22','10',$row['neckline'],'1','0','C');
        $pdf->cell('22','10',$row['sleeve'],'1','0','C');
        $pdf->cell('22','10',$row['bottom'],'1','0','C');
        $pdf->cell('12','10',$row['size'],'1','0','C');
        $pdf->cell('15','10',$row['amount'],'1','0','C');
        $pdf->cell('47','10',$row['paymentid'],'1','0','C');
        // $pdf->cell('25','10',$row['created'],'1','0','C');
    } 
    $pdf->Output();

// }
	?>