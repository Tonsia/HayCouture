<?php
session_start();
ob_start();
date_default_timezone_set("Asia/Manila");

$action = $_GET['action'];
include 'admin_class.php';
$crud = new Action();

if($action == 'login'){
	$login = $crud->login(); 
	if($login)
		echo $login;
}

if($action == 'productlists')
{
	$productlists = $crud->productlists(); 
	if($productlists)
		echo $productlists;
}

if($action == 'viewprofile')
{
	$viewprofile = $crud->viewprofile(); 
	if($viewprofile)
		echo $viewprofile;
}

if($action == 'editprofile')
{
	$editprofile = $crud->editprofile(); 
	if($editprofile)
		echo $editprofile;
}

if($action == 'states')
{
	$states = $crud->states(); 
	if($states)
		echo $states;
}
if($action == 'districts')
{
	$districts = $crud->districts(); 
	if($districts)
		echo $districts;
}
if($action == 'districtsid')
{
	$districtsid = $crud->districtsid(); 
	if($districtsid)
		echo $districtsid;
}
if($action == 'citys')
{
	$citys = $crud->citys(); 
	if($citys)
		echo $citys;
}

if($action == 'citysid')
{
	$citysid = $crud->citysid(); 
	if($citysid)
		echo $citysid;
}

if($action == 'changepass')
{
	$changepass = $crud->changepass(); 
	if($changepass)
		echo $changepass;
}


if($action=='listcategory')
{
	$listcategory = $crud->listcategory(); 
	if($listcategory)
		echo $listcategory;
}

if($action=='featured')
{
	$featured = $crud->featured(); 
	if($featured)
		echo $featured;
}

if($action=='onsale')
{
	$onsale = $crud->onsale(); 
	if($onsale)
		echo $onsale;
}

if($action=='newarrivals')
{
	$newarrivals = $crud->newarrivals(); 
	if($newarrivals)
		echo $newarrivals;
}

if($action=='seealllist')
{
	$seealllist = $crud->seealllist(); 
	if($seealllist)
		echo $seealllist;
}

if($action=='searchname')
{
	$searchname = $crud->searchname(); 
	if($searchname)
		echo $searchname;
}

if($action=='searchshopgrid')
{
	$searchshopgrid = $crud->searchshopgrid(); 
	if($searchshopgrid)
		echo $searchshopgrid;
}

if($action=='searchprice')
{
	$searchprice = $crud->searchprice(); 
	if($searchprice)
		echo $searchprice;
}
if($action=='searchpriceshopgrid')
{
	$searchpriceshopgrid = $crud->searchpriceshopgrid(); 
	if($searchpriceshopgrid)
		echo $searchpriceshopgrid;
}


if($action=='listsize')
{
	$listsize = $crud->listsize(); 
	if($listsize)
		echo $listsize;
}
if($action=='sizeshow')
{
	$sizeshow = $crud->sizeshow(); 
	if($sizeshow)
		echo $sizeshow;
}
if($action=='sizeshow2')
{
	$sizeshow2 = $crud->sizeshow2(); 
	if($sizeshow2)
		echo $sizeshow2;
}
if($action=='categorylist')
{
	$categorylist = $crud->categorylist(); 
	if($categorylist)
		echo $categorylist;
}

if($action=='singleproduct')
{
	$singleproduct = $crud->singleproduct(); 
	if($singleproduct)
		echo $singleproduct;
}

if($action=='addtocart')
{
	$addtocart = $crud->addtocart(); 
	if($addtocart)
		echo $addtocart;
}

if($action=='listcart')
{
	$listcart = $crud->listcart(); 
	if($listcart)
		echo $listcart;
}

if($action=='similar')
{
	$similar = $crud->similar(); 
	if($similar)
		echo $similar;
}

if($action=='addquantity')
{
	$addquantity = $crud->addquantity(); 
	if($addquantity)
		echo $addquantity;
}
if($action=='removequantity')
{
	$removequantity = $crud->removequantity(); 
	if($removequantity)
		echo $removequantity;
}

if($action=='deletecartitem')
{
	$deletecartitem = $crud->deletecartitem(); 
	if($deletecartitem)
		echo $deletecartitem;
}

if($action == 'districtslist')
{
	$districtslist = $crud->districtslist(); 
	if($districtslist)
		echo $districtslist;
}

if($action == 'citylist')
{
	$citylist = $crud->citylist(); 
	if($citylist)
		echo $citylist;
}

if($action == 'addaddress')
{
	$addaddress = $crud->addaddress(); 
	if($addaddress)
		echo $addaddress;
}

if($action == 'couponcheck')
{
	$couponcheck = $crud->couponcheck(); 
	if($couponcheck)
		echo $couponcheck;
}

if($action == 'addwishlist')
{
	$addwishlist = $crud->addwishlist(); 
	if($addwishlist)
		echo $addwishlist;
}

if($action == 'remwishlist')
{
	$remwishlist = $crud->remwishlist(); 
	if($remwishlist)
		echo $remwishlist;
}

if($action == 'showcoupon')
{
	$showcoupon = $crud->showcoupon(); 
	if($showcoupon)
		echo $showcoupon;
}

if($action == 'addrating')
{
	$addrating = $crud->addrating(); 
	if($addrating)
		echo $addrating;
}

if($action == 'returnorder')
{
	$returnorder = $crud->returnorder(); 
	if($returnorder)
		echo $returnorder;
}

if($action == 'productmatch')
{
	$productmatch = $crud->productmatch(); 
	if($productmatch)
		echo $productmatch;
}

if($action == 'updatecart')
{
	$updatecart = $crud->updatecart(); 
	if($updatecart)
		echo $updatecart;
}

if($action == 'stockcheck')
{
	$stockcheck = $crud->stockcheck(); 
	if($stockcheck)
		echo $stockcheck;
}

if($action == 'stockcheckbasedoncartid')
{
	$stockcheckbasedoncartid = $crud->stockcheckbasedoncartid(); 
	if($stockcheckbasedoncartid)
		echo $stockcheckbasedoncartid;
}


if($action == 'getstatetax')
{
	$getstatetax = $crud->getstatetax(); 
	if($getstatetax)
		echo $getstatetax;
}

if($action == 'removeaddr')
{
	$removeaddr = $crud->removeaddr(); 
	if($removeaddr)
		echo $removeaddr;
}

if($action == 'getuseraddr')
{
	$getuseraddr = $crud->getuseraddr(); 
	if($getuseraddr)
		echo $getuseraddr;
}

if($action == 'updateaddr')
{
	$updateaddr = $crud->updateaddr(); 
	if($updateaddr)
		echo $updateaddr;
}

if($action == 'outofstock')
{
	$outofstock = $crud->outofstock(); 
	if($outofstock)
		echo $outofstock;
}

if($action == 'addcv')
{
	$addcv = $crud->addcv(); 
	if($addcv)
		echo $addcv;
}



?>

