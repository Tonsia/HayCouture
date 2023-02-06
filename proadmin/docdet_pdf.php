<?php

require_once 'FPDF/fpdf.php';
require_once 'db_connect.php';

// $query="SELECT tbl_doctor.d_id,tbl_doctor.d_name,tbl_doctor.d_fees,tbl_login.email, 
//                             tbl_doctor.spec
// 							 FROM tbl_login
// 							 JOIN tbl_doctor
// 							 ON tbl_doctor.l_id = tbl_login.l_id";

$query="SELECT uniqueid,tcolor,bcolor,neckline,sleeve,bottom,size,amount,paymentid,created
							 FROM customorder;
$data = mysqli_query($conn,$query);
   if(isset($_POST['btn_pdf']))
   {
    $pdf =new FPDF('p','mm','a4');
    $pdf->SetFont('arial','b','14');
    $pdf->AddPage();

   
    $pdf->cell('10','10','id','1','0','C');
    $pdf->cell('30','10','Name','1','0','C');
    $pdf->cell('15','10','Fees','1','0','C');
    $pdf->cell('60','10','Email','1','0','C');
    $pdf->cell('60','10','Specilaization','1','1','C');
    
    $pdf->SetFont('arial','','12');
    while($row = mysqli_fetch_assoc($data))   
    {
        $pdf->cell('10','10',$row['d_id'],'1','0','C');
        $pdf->cell('30','10',$row['d_name'],'1','0','C');
        $pdf->cell('15','10',$row['d_fees'],'1','0','C');
        $pdf->cell('60','10',$row['email'],'1','0','C');
        $pdf->cell('60','10',$row['spec'],'1','1','C');
    } 
    $pdf->Output();

}
	?>