<?php
ob_start();
date_default_timezone_set("Asia/Manila");

$action = $_GET['action'];
include 'admin_class.php';
$crud = new Action();

if($action == 'addcategory'){
	$addcategory = $crud->addcategory(); 
	if($addcategory)
		echo $addcategory;
}
if($action == 'tablecategory'){
	$tablecategory = $crud->tablecategory(); 
	if($tablecategory)
		echo $tablecategory;
}
if($action == 'catedit'){
	$catedit = $crud->catedit(); 
	if($catedit)
		echo $catedit;
}
if($action == 'catupdate'){
	$catupdate = $crud->catupdate(); 
	if($catupdate)
		echo $catupdate;
}
if($action == 'catstatus'){
	$catstatus = $crud->catstatus(); 
	if($catstatus)
		echo $catstatus;
}
if($action == 'productsize'){
	$productsize = $crud->productsize(); 
	if($productsize)
		echo $productsize;
}
if($action == 'pdtsizeupdate'){
	$pdtsizeupdate = $crud->pdtsizeupdate(); 
	if($pdtsizeupdate)
		echo $pdtsizeupdate;
}
if($action == 'getsize'){
	$getsize = $crud->getsize(); 
	if($getsize)
		echo $getsize;
}
if($action == 'sizestatus'){
	$sizestatus = $crud->sizestatus(); 
	if($sizestatus)
		echo $sizestatus;
}
if($action == 'addpdtsize'){
	$addpdtsize = $crud->addpdtsize(); 
	if($addpdtsize)
		echo $addpdtsize;
}
if($action == 'productcolor'){
	$productcolor = $crud->productcolor(); 
	if($productcolor)
		echo $productcolor;
}
if($action == 'pdtcolorupdate'){
	$pdtcolorupdate = $crud->pdtcolorupdate(); 
	if($pdtcolorupdate)
		echo $pdtcolorupdate;
}
if($action == 'getcolor'){
	$getcolor = $crud->getcolor(); 
	if($getcolor)
		echo $getcolor;
}
if($action == 'colorstatus'){
	$colorstatus = $crud->colorstatus(); 
	if($colorstatus)
		echo $colorstatus;
}
if($action == 'addcolor'){
	$addcolor = $crud->addcolor(); 
	if($addcolor)
		echo $addcolor;
}
if($action == 'productcreate'){
	$productcreate = $crud->productcreate(); 
	if($productcreate)
		echo $productcreate;
}
if($action == 'listcategory'){
	$listcategory = $crud->listcategory(); 
	if($listcategory)
		echo $listcategory;
}
if($action == 'listcolor'){
	$listcolor = $crud->listcolor(); 
	if($listcolor)
		echo $listcolor;
}

if($action == 'listsize'){
	$listsize = $crud->listsize(); 
	if($listsize)
		echo $listsize;
}

if($action == 'createproduct'){
	$createproduct = $crud->createproduct(); 
	if($createproduct)
		echo $createproduct;
}


if($action == 'tableproducts'){
	$tableproducts = $crud->tableproducts(); 
	if($tableproducts)
		echo $tableproducts;
}

if($action == 'pdtstatus'){
	$pdtstatus = $crud->pdtstatus(); 
	if($pdtstatus)
		echo $pdtstatus;
}

if($action == 'pdtupdate'){
	$pdtupdate = $crud->pdtupdate(); 
	if($pdtupdate)
		echo $pdtupdate;
}


if($action == 'pdtedit'){
	$pdtedit = $crud->pdtedit(); 
	if($pdtedit)
		echo $pdtedit;
}


if($action == 'updatecolor'){
	$updatecolor = $crud->updatecolor(); 
	if($updatecolor)
		echo $updatecolor;
}


if($action == 'listsize1'){
	$listsize1 = $crud->listsize1(); 
	if($listsize1)
		echo $listsize1;
}

if($action == 'listcolor1'){
	$listcolor1 = $crud->listcolor1(); 
	if($listcolor1)
		echo $listcolor1;
}

if($action == 'tableproductssearch'){
	$tableproductssearch = $crud->tableproductssearch(); 
	if($tableproductssearch)
		echo $tableproductssearch;
}

if($action == 'tablecategorysearch'){
	$tablecategorysearch = $crud->tablecategorysearch(); 
	if($tablecategorysearch)
		echo $tablecategorysearch;
}

if($action == 'updatecolorpdt'){
	$updatecolorpdt = $crud->updatecolorpdt(); 
	if($updatecolorpdt)
		echo $updatecolorpdt;
}


if($action == 'tablecustomers'){
	$tablecustomers = $crud->tablecustomers(); 
	if($tablecustomers)
		echo $tablecustomers;
}


if($action == 'tablecolorsearch'){
	$tablecolorsearch = $crud->tablecolorsearch(); 
	if($tablecolorsearch)
		echo $tablecolorsearch;
}



if($action == 'tablesizesearch'){
	$tablesizesearch = $crud->tablesizesearch(); 
	if($tablesizesearch)
		echo $tablesizesearch;
}



if($action == 'custview'){
	$custview = $crud->custview(); 
	if($custview)
		echo $custview;
}

if($action == 'custstatus'){
	$custstatus = $crud->custstatus(); 
	if($custstatus)
		echo $custstatus;
}

if($action == 'tablecustomersearch'){
	$tablecustomersearch = $crud->tablecustomersearch(); 
	if($tablecustomersearch)
		echo $tablecustomersearch;
}


if($action == 'tablecustomersearch'){
	$tablecustomersearch = $crud->tablecustomersearch(); 
	if($tablecustomersearch)
		echo $tablecustomersearch;
}



if($action == 'availcheck'){
	$availcheck = $crud->availcheck(); 
	if($availcheck)
		echo $availcheck;
}

if($action == 'addcoupon'){
	$addcoupon = $crud->addcoupon(); 
	if($addcoupon)
		echo $addcoupon;
}

if($action == 'couponlist'){
	$couponlist = $crud->couponlist(); 
	if($couponlist)
		echo $couponlist;
}
if($action == 'editcoupon'){
	$editcoupon = $crud->editcoupon(); 
	if($editcoupon)
		echo $editcoupon;
}

if($action == 'orderchangestatus'){
	$orderchangestatus = $crud->orderchangestatus(); 
	if($orderchangestatus)
		echo $orderchangestatus;
}

if($action == 'tablereviews'){
	$tablereviews = $crud->tablereviews(); 
	if($tablereviews)
		echo $tablereviews;
}


if($action == 'reviewstatus'){
	$reviewstatus = $crud->reviewstatus(); 
	if($reviewstatus)
		echo $reviewstatus;
}

if($action == 'availcouponcheck'){
	$availcouponcheck = $crud->availcouponcheck(); 
	if($availcouponcheck)
		echo $availcouponcheck;
}






?>

