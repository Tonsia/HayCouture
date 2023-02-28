<?php
Class Action 
{
	private $db;

	public function __construct() {
		ob_start();
        include 'db_connect.php';
        $this->db = $conn;
	}
    
	function __destruct() {
	    $this->db->close();
	    ob_end_flush();
	}

	function viewprofile()
	{
		extract($_POST);
		$userid = $_SESSION['regid'];
		$qry = $this->db->query("SELECT reg_name, reg_email, reg_mob, reg_addr, reg_state,reg_city, reg_district, reg_pin FROM registration WHERE reg_id='$userid'");
		$str = '';

		while($row = mysqli_fetch_array($qry)) {
			$str = $row["reg_name"].'|'.$row["reg_email"].'|'.$row["reg_mob"].'|'.$row["reg_addr"].'|'.$row["reg_state"].'|'.$row["reg_district"].'|'.$row["reg_city"].'|'.$row["reg_pin"];
			}
		return $str;
	}

    function editprofile(){
		// $name=$_POST['name'];
		// $email=$_POST['email'];
        // $password=$_POST['password'];
		// $encyp_pwd=md5($password);
        // $mob=$_POST['mob'];
        // $addr=$_POST['addr'];
        // $city=$_POST['city'];
		// $state=$_POST['state'];
        // $pin=$_POST['pin'];
        // $district=$_POST['district'];
		//$newstr = filter_var($newstr, FILTER_SANITIZE_STRING);
		$userid = $_SESSION['regid'];
        $name=filter_var($_POST['name'], FILTER_SANITIZE_STRING);
		$email=filter_var($_POST['email'], FILTER_SANITIZE_STRING);
		$mob=$_POST['mob'];
		//$valid_number = filter_var($phone, FILTER_SANITIZE_NUMBER_INT);
		$addr=filter_var($_POST['addr'], FILTER_SANITIZE_STRING);
		$city=filter_var($_POST['city'], FILTER_SANITIZE_STRING);
		$district=filter_var($_POST['district'], FILTER_SANITIZE_STRING);
		$state=filter_var($_POST['state'], FILTER_SANITIZE_STRING);
		$pin=$_POST['pin'];
		// UPDATE registration SET reg_name='$name',reg_email='$email',reg_mob='$mob',reg_addr='$addr',reg_city='$city',reg_state='$state',reg_pin='$pin',reg_district='$district' WHERE 1
        $qry = $this->db->query("UPDATE registration SET reg_name='$name',reg_email='$email',reg_mob='$mob',reg_addr='$addr',reg_city='$city',reg_state='$state',reg_pin='$pin',reg_district='$district' WHERE reg_id = '$userid'");
		//$qry = $this->db->query("SELECT reg_id FROM registration WHERE $name=reg_name");
		//$qry2 = $this->db->query("INSERT INTO tbl_login( reg_id) VALUES (reg_id));

		return $qry;
	} 

    function states()
	{
		
		$qry = $this->db->query("SELECT * FROM states");
		$str = '';
		while($row = mysqli_fetch_array($qry)) {
			$str .= $row["state_name"].'|';
			}
		return $str;
	}

	function districts()
	{
		$state_name = $_POST["state_name"];
		$qry2 = $this->db->query("SELECT state_id FROM states where state_name = '$state_name'");
		$table = mysqli_fetch_all($qry2,MYSQLI_ASSOC);
		$state_id = $table[0]["state_id"];
		
		$qry = $this->db->query("SELECT * FROM district where state_id = '$state_id'");
		$str = '';
		while($row = mysqli_fetch_array($qry)) {
			//$str .= '<option value="'.$row["district_name"].'">';
			$str .= $row["district_name"].'|';
		}
		return $str;
	}

    function districtsid()
	{
		
		$state_id = $_POST["stateid"];
		
		$qry = $this->db->query("SELECT * FROM district where state_id = '$state_id'");
        
		$str = '';
        if ($qry->num_rows > 0) 
		{
			
			while($row = $qry->fetch_assoc()) 
			{
                $str .= '<option value='.$row['district_id'].'>'.$row['district_name'].'</option>';

            }
        }
        else{
            $str .= '<option> None</option>';
        }
		
		return $str;
	}
    
	function citys(){
		$district_name = $_POST["district_id"];
		$qry2 = $this->db->query("SELECT district_id FROM district where district_name = '$district_name'");
		$table = mysqli_fetch_all($qry2,MYSQLI_ASSOC);
		$district_id = $table[0]['district_id'];
		$qry = $this->db->query("SELECT * FROM city where district_id = '$district_id'");
		$str = '';
		while($row = mysqli_fetch_array($qry)) {
			//$str .= '<option value="'.$row["city_name"].'">';
			$str .= $row["city_name"].'|';
			}
		return $str;
	}

    function citysid(){
	
		$district_id = $_POST["district_id"];
		$qry = $this->db->query("SELECT * FROM city where district_id = '$district_id'");
		$str = '';
    
        if ($qry->num_rows > 0) 
		{
			
			while($row = $qry->fetch_assoc()) 
			{
                $str .= '<option value='.$row['city_id'].'>'.$row['city_name'].'</option>';

            }
        }
        else{
            $str .= '<option> None</option>';
        }
		
		return $str;
	}

	function productlists(){
		extract($_POST);
		$qry = $this->db->query("SELECT * FROM products WHERE cat_id = '$category' and product_status='1'");
		$data="";
		if ($qry->num_rows > 0) 
		{
			
			while($row = $qry->fetch_assoc()) 
			{
				$productid=$row['product_id'];
				$result1=$this->db->query("SELECT * FROM color_details where product_id='$productid'");
				$row1=$result1->fetch_array();
				$img=$row1["img1"];
				

					$data .='<div class="col-xl-4 col-lg-6 col-md-4 col-sm-6">
                                <div class="single-grid-product">
                                    <div class="product-top">
									
                                        <a href="productpage?productid='.$productid.'"><img class="product-thumbnal" src="../admin/'.$img.'" height="315" width="420" alt="product"></a>
                                        
                                        <ul class="prdouct-btn-wrapper">
                                            <li class="single-product-btn">
                                                <a class="addCompare product-btn" data-pid="'.$productid.'" onclick="addwishlist(this)" title="Add to wishlist"><i class="icon flaticon-like"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="product-info text-center">
                                        <h4 class="product-catagory">HAY - Couture</h4>
                                        <h3 class="product-name"><a class="product-link" href="productpage?productid='.$productid.' ">'.$row["p_name"].'</a></h3>
                                       <!-- <ul class="product-review">
                                            <li class="review-item active"><i class="flaticon-star"></i></li>
                                            <li class="review-item active"><i class="flaticon-star"></i></li>
                                            <li class="review-item active"><i class="flaticon-star"></i></li>
                                            <li class="review-item"><i class="flaticon-star"></i></li>
                                            <li class="review-item"><i class="flaticon-star"></i></li>
                                        </ul> -->
                                        <div class="product-price">
                                         <!--   <span class="regular-price">'.$row["product_price"].'</span> -->
                                                <span class="price">Rs. '.$row["product_total"].'</span>
                                        </div>
                                        <!-- <div class="variable-single-item color-switch">
                                            <div class="product-variable-color">
                                                <label>
                                                    <input name="modal-product-color" class="color-select" type="radio" checked="">
                                                    <span class="product-color-black"></span>
                                                </label>
                                                <label>
                                                    <input name="modal-product-color" class="color-select" type="radio">
                                                    <span class="product-color-tomato"></span>
                                                </label>
            
                                                <label>
                                                    <input name="modal-product-color" class="color-select" type="radio">
                                                    <span class="product-color-gray"></span>
                                                </label>
                                            </div>
                                        </div> -->
                                        <ul class="size-switch">';
										$data2='';
										$result2=$this->db->query("SELECT * FROM size_details where product_id='$productid'");
										
										while($row2 = $result2->fetch_assoc()){
											$sid = $row2["size_id"];
											$result3=$this->db->query("SELECT size FROM product_size where size_id='$sid'");$row3=$result3->fetch_array();
											$data2 .= '<li class="single-size">'.$row3["size"].'</li>';
										} 
                                        //return $this->db->error;
                                        $proid = "'productpage?productid=".$productid."'";
										$data3 = '</ul>
                                        <button onclick="window.location.href='.$proid.'" title="Buy Product" class="add-cart">Buy <i class="icon fas fa-plus-circle"></i></button>
                                    </div>
                                </div>
                            </div>';
							$data .= $data2.$data3;
			}
		}
		return $data;
	}

    function changepass()
	{
	extract($_POST);
	if(isset($pass1)){
		if($pass==$pass1)
		{
			$userid = $_SESSION['regid'];
			$e_pass = md5($pass1);
			$qry = $this->db->query("SELECT reg_pwd FROM registration WHERE reg_id='$userid'");
			$cpass = '';

			while($row = mysqli_fetch_array($qry)) {
				$cpass = $row["reg_pwd"];
			}
			if(md5($pass0)==$cpass){

				$qry = $this->db->query("UPDATE registration SET reg_pwd='$e_pass'  WHERE reg_id='$userid'");
				return 1;
			}else{
				return 2;
			}

		}
		else  
		{
			return 4;
		}
	}
	else{ 
		return 3;
	}
   }



	function listcategory()
	{
		
		$qry = $this->db->query("SELECT * FROM category where cat_status='1'");
		$str = '';
		$ids = '';
		while($row = mysqli_fetch_array($qry)) {
			// $str .= '<option value="'.$row["state_name"].'">';
			$str .= $row["cat_name"].'|';
			$ids .= $row["cat_id"].'|'; 
			}
		return $str.",".$ids;
	}

    function featured(){
		extract($_POST);
		$qry = $this->db->query("SELECT * FROM products WHERE product_feat='1' AND product_status='1' LIMIT 3");
		$data="";
		if ($qry->num_rows > 0) 
		{
			
			while($row = $qry->fetch_assoc()) 
			{
				$productid=$row['product_id'];
				$result1=$this->db->query("SELECT * FROM color_details where product_id='$productid'");
				$row1=$result1->fetch_array();
				$img=$row1["img1"];
				

					$data .='<div class="col-xl-4 col-lg-6 col-md-4 col-sm-6">
                                <div class="single-grid-product">
                                    <div class="product-top">
									
                                        <a href="./productpage?productid='.$productid.'"><img class="product-thumbnal" src="../admin/'.$img.'" alt="product"></a>
                                        
                                        <ul class="prdouct-btn-wrapper">
                                            <!-- <li class="single-product-btn">
                                                <a class="addToWishlist product-btn" href="compare.html" title="Add to compare"><i class="icon flaticon-bar-chart"></i></a>
                                            </li> -->
                                            <li class="single-product-btn">
                                                <a class="addCompare product-btn" data-pid="'.$productid.'" onclick="addwishlist(this)" title="Add to wishlist"><i class="icon flaticon-like"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="product-info text-center">
                                        <h4 class="product-catagory">Hay - Couture</h4>
                                        <h3 class="product-name"><a class="product-link" href="./productpage?productid='.$productid.'">'.$row["p_name"].'</a></h3>
                                       <!-- <ul class="product-review">
                                            <li class="review-item active"><i class="flaticon-star"></i></li>
                                            <li class="review-item active"><i class="flaticon-star"></i></li>
                                            <li class="review-item active"><i class="flaticon-star"></i></li>
                                            <li class="review-item"><i class="flaticon-star"></i></li>
                                            <li class="review-item"><i class="flaticon-star"></i></li>
                                        </ul> -->
                                        <div class="product-price">
                                            
                                            <span class="price">'.$row["product_total"].'</span>
                                        </div>
                                        
                                        <ul class="size-switch">';
										$data2='';
										$result2=$this->db->query("SELECT * FROM size_details where product_id='$productid'");
										
										while($row2 = $result2->fetch_assoc()){
											$sid = $row2["size_id"];
											$result3=$this->db->query("SELECT size FROM product_size where size_id='$sid'");$row3=$result3->fetch_array();
											$data2 .= '<li class="single-size">'.$row3["size"].'</li>';
										} 
                                        //return $this->db->error;
                                        $proid = "'productpage?productid=".$productid."'";
										$data3 = '</ul>
                                        <button onclick="window.location.href='.$proid.'" title="Buy Product" class="add-cart">Buy <i class="icon fas fa-plus-circle"></i></button>
                                    </div>
                                </div>
                            </div>';
							$data .= $data2.$data3;
			}
		}
		return $data;
	}

    function onsale()
    {
		extract($_POST);
		$qry = $this->db->query("SELECT * FROM products WHERE product_sale='1' AND product_status='1' LIMIT 3");
		$data="";
		if ($qry->num_rows > 0) 
		{
			
			while($row = $qry->fetch_assoc()) 
			{
				$productid=$row['product_id'];
				$result1=$this->db->query("SELECT * FROM color_details where product_id='$productid'");
				$row1=$result1->fetch_array(); 
				$img=$row1["img1"];
			
					$data .='<div class="col-xl-4 col-lg-6 col-md-4 col-sm-6">
                                <div class="single-grid-product">
                                    <div class="product-top">
									
                                        <a href="./productpage?productid='.$productid.'"><img class="product-thumbnal" src="../admin/'.$img.'" alt="product"></a>
                                        
                                        <ul class="prdouct-btn-wrapper">
                                            <!-- <li class="single-product-btn">
                                                <a class="addToWishlist product-btn" href="compare.html" title="Add to compare"><i class="icon flaticon-bar-chart"></i></a>
                                            </li> -->
                                            <li class="single-product-btn">
                                                <a class="addCompare product-btn" data-pid="'.$productid.'" onclick="addwishlist(this)" title="Add to wishlist"><i class="icon flaticon-like"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="product-info text-center">
                                        <h4 class="product-catagory">Hay - Couture</h4>
                                        <h3 class="product-name"><a class="product-link" href="./productpage?productid='.$productid.'">'.$row["p_name"].'</a></h3>
                                       <!-- <ul class="product-review">
                                            <li class="review-item active"><i class="flaticon-star"></i></li>
                                            <li class="review-item active"><i class="flaticon-star"></i></li>
                                            <li class="review-item active"><i class="flaticon-star"></i></li>
                                            <li class="review-item"><i class="flaticon-star"></i></li>
                                            <li class="review-item"><i class="flaticon-star"></i></li>
                                        </ul> -->
                                        <div class="product-price">
                                            
                                            <span class="price">'.$row["product_total"].'</span>
                                        </div>
                                        
                                        <ul class="size-switch">';
										$data2='';
										$result2=$this->db->query("SELECT * FROM size_details where product_id='$productid'");
										
										while($row2 = $result2->fetch_assoc()){
											$sid = $row2["size_id"];
											$result3=$this->db->query("SELECT size FROM product_size where size_id='$sid'");$row3=$result3->fetch_array();
											$data2 .= '<li class="single-size">'.$row3["size"].'</li>';
										} 
                                        //return $this->db->error;
                                        $proid = "'productpage?productid=".$productid."'";
										$data3 = '</ul>
                                        <button onclick="window.location.href='.$proid.'" title="Buy Product" class="add-cart">Buy <i class="icon fas fa-plus-circle"></i></button>
                                    </div>
                                </div>
                            </div>';
							$data .= $data2.$data3;
			}
		}
		return $data;
	}

    function newarrivals()
    {
		extract($_POST);
		$qry = $this->db->query("SELECT * FROM products WHERE product_arrival='1' AND product_status='1' LIMIT 3");
		$data="";
		if ($qry->num_rows > 0) 
		{
			
			while($row = $qry->fetch_assoc()) 
			{
				$productid=$row['product_id'];
				$result1=$this->db->query("SELECT * FROM color_details where product_id='$productid'");
				$row1=$result1->fetch_array(); 
				$img=$row1["img1"];
			
					$data .='<div class="col-xl-4 col-lg-6 col-md-4 col-sm-6">
                                <div class="single-grid-product">
                                    <div class="product-top">
									
                                        <a href="./productpage?productid='.$productid.'"><img class="product-thumbnal" src="../admin/'.$img.'" alt="product"></a>
                                        
                                        <ul class="prdouct-btn-wrapper">
                                            <!-- <li class="single-product-btn">
                                                <a class="addToWishlist product-btn" href="compare.html" title="Add to compare"><i class="icon flaticon-bar-chart"></i></a>
                                            </li> -->
                                            <li class="single-product-btn">
                                                <a class="addCompare product-btn" data-pid="'.$productid.'" onclick="addwishlist(this)" title="Add to wishlist"><i class="icon flaticon-like"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="product-info text-center">
                                        <h4 class="product-catagory">Hay - Couture</h4>
                                        <h3 class="product-name"><a class="product-link" href="./productpage?productid='.$productid.'">'.$row["p_name"].'</a></h3>
                                       <!-- <ul class="product-review">
                                            <li class="review-item active"><i class="flaticon-star"></i></li>
                                            <li class="review-item active"><i class="flaticon-star"></i></li>
                                            <li class="review-item active"><i class="flaticon-star"></i></li>
                                            <li class="review-item"><i class="flaticon-star"></i></li>
                                            <li class="review-item"><i class="flaticon-star"></i></li>
                                        </ul> -->
                                        <div class="product-price">
                                            
                                            <span class="price">'.$row["product_total"].'</span>
                                        </div>
                                        
                                        <ul class="size-switch">';
										$data2='';
										$result2=$this->db->query("SELECT * FROM size_details where product_id='$productid'");
										
										while($row2 = $result2->fetch_assoc()){
											$sid = $row2["size_id"];
											$result3=$this->db->query("SELECT size FROM product_size where size_id='$sid'");$row3=$result3->fetch_array();
											$data2 .= '<li class="single-size">'.$row3["size"].'</li>';
										} 
                                        //return $this->db->error;
                                        $proid = "'productpage?productid=".$productid."'";
										$data3 = '</ul>
                                        <button onclick="window.location.href='.$proid.'" title="Buy Product" class="add-cart">Buy <i class="icon fas fa-plus-circle"></i></button>
                                    </div>
                                </div>
                            </div>';
							$data .= $data2.$data3;
			}
		}
		return $data;
	}


function seealllist(){
    extract($_POST);
    if($seeall=='3')
    {
        $qry = $this->db->query("SELECT * FROM products WHERE product_feat = '1' AND product_status='1'");
    }
    else if($seeall=='2')
    {
        $qry = $this->db->query("SELECT * FROM products WHERE product_arrival= '1' AND product_status='1'");
    }
    else if($seeall=='1')
    {
        $qry = $this->db->query("SELECT * FROM products WHERE product_sale = '1' AND product_status='1'");
    }
    else
    {
        return 2;
    }
 
    $data="";
    if ($qry->num_rows > 0) 
    {
        
        while($row = $qry->fetch_assoc()) 
        {
            $productid=$row['product_id'];
            $result1=$this->db->query("SELECT * FROM color_details where product_id='$productid'");
            $row1=$result1->fetch_array();
            $img=$row1["img1"];
            

                $data .='<div class="col-xl-4 col-lg-6 col-md-4 col-sm-6">
                            <div class="single-grid-product">
                                <div class="product-top">
                                
                                    <a href="productpage?productid='. $productid .'"><img class="product-thumbnal" src="../admin/'.$img.'" alt="product"></a>
                                    
                                    <ul class="prdouct-btn-wrapper">
                                        <li class="single-product-btn">
                                            <a class="addCompare product-btn" data-pid="'.$productid.'" onclick="addwishlist(this)" title="Add to wishlist"><i class="icon flaticon-like"></i></a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="product-info text-center">
                                    <h4 class="product-catagory">HAY - Couture</h4>
                                    <h3 class="product-name"><a class="product-link" href="productpage?productid='. $productid .'">'.$row["p_name"].'</a></h3>
                                   <!-- <ul class="product-review">
                                        <li class="review-item active"><i class="flaticon-star"></i></li>
                                        <li class="review-item active"><i class="flaticon-star"></i></li>
                                        <li class="review-item active"><i class="flaticon-star"></i></li>
                                        <li class="review-item"><i class="flaticon-star"></i></li>
                                        <li class="review-item"><i class="flaticon-star"></i></li>
                                    </ul> -->
                                    <div class="product-price">
                                     <!--   <span class="regular-price">'.$row["product_price"].'</span> -->
                                            <span class="price">Rs. '.$row["product_total"].'</span>
                                    </div>
                                    <!-- <div class="variable-single-item color-switch">
                                        <div class="product-variable-color">
                                            <label>
                                                <input name="modal-product-color" class="color-select" type="radio" checked="">
                                                <span class="product-color-black"></span>
                                            </label>
                                            <label>
                                                <input name="modal-product-color" class="color-select" type="radio">
                                                <span class="product-color-tomato"></span>
                                            </label>
        
                                            <label>
                                                <input name="modal-product-color" class="color-select" type="radio">
                                                <span class="product-color-gray"></span>
                                            </label>
                                        </div>
                                    </div> -->
                                    <ul class="size-switch">';
                                    $data2='';
                                    $result2=$this->db->query("SELECT * FROM size_details where product_id='$productid'");
                                    
                                    while($row2 = $result2->fetch_assoc()){
                                        $sid = $row2["size_id"];
                                        $result3=$this->db->query("SELECT size FROM product_size where size_id='$sid'");$row3=$result3->fetch_array();
                                        $data2 .= '<li class="single-size">'.$row3["size"].'</li>';
                                    } 
                                    //return $this->db->error;
                                    $proid = "'productpage?productid=".$productid."'";
                                    $data3 = '</ul>
                                    <button onclick="window.location.href='.$proid.'" title="Buy Product" class="add-cart">Buy <i class="icon fas fa-plus-circle"></i></button>
                                </div>
                            </div>
                        </div>';
                        $data .= $data2.$data3;
        }
    }
    return $data;
}


function searchname()
{
   
    extract($_POST);
    ///return $searchname;
    
    $str = '%'.$searchname.'%';
  
    $data='';
    if($seeall=='3')
    {
        if(!isset($searchname))
        {
            $qry = $this->db->query("SELECT * FROM products WHERE product_feat = '1' AND product_status='1''");
        }
        else
        {
            $qry = $this->db->query("SELECT * FROM products WHERE product_feat = '1' AND product_status='1' AND p_name LIKE '$str'");

        }

}
    else if($seeall=='2')
    {
        
        if(!isset($searchname))
        {
            $qry = $this->db->query("SELECT * FROM products WHERE product_arrival = '1' AND product_status='1''");
        }
        else
        {
            $qry = $this->db->query("SELECT * FROM products WHERE product_arrival = '1' AND product_status='1' AND p_name LIKE '$str'");

        }
    }
    else if($seeall=='1')
    {
        
        if(!isset($searchname))
        {
            $qry = $this->db->query("SELECT * FROM products WHERE product_sale = '1' AND product_status='1''");
        }
        else
        {
            $qry = $this->db->query("SELECT * FROM products WHERE product_sale = '1' AND product_status='1' AND p_name LIKE '$str'");

        }
    }
    else
    {
        return 2;
    }
    if ($qry->num_rows > 0) 
    {
        
        while($row = $qry->fetch_assoc()) 
        {
            $productid=$row['product_id'];
            $result1=$this->db->query("SELECT * FROM color_details where product_id like '$productid'");
            $row1=$result1->fetch_array();
            $img=$row1["img1"];
            

                $data .='<div class="col-xl-4 col-lg-6 col-md-4 col-sm-6">
                            <div class="single-grid-product">
                                <div class="product-top">
                                
                                    <a href=""><img class="product-thumbnal" src="../admin/'.$img.'" alt="product"></a>
                                    
                                    <ul class="prdouct-btn-wrapper">
                                        <li class="single-product-btn">
                                            <a class="addCompare product-btn" data-pid="'.$productid.'" onclick="addwishlist(this)" title="Add to wishlist"><i class="icon flaticon-like"></i></a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="product-info text-center">
                                    <h4 class="product-catagory">HAY - Couture</h4>
                                    <h3 class="product-name"><a class="product-link" href="">'.$row["p_name"].'</a></h3>
                                   <!-- <ul class="product-review">
                                        <li class="review-item active"><i class="flaticon-star"></i></li>
                                        <li class="review-item active"><i class="flaticon-star"></i></li>
                                        <li class="review-item active"><i class="flaticon-star"></i></li>
                                        <li class="review-item"><i class="flaticon-star"></i></li>
                                        <li class="review-item"><i class="flaticon-star"></i></li>
                                    </ul> -->
                                    <div class="product-price">
                                     <!--   <span class="regular-price">'.$row["product_price"].'</span> -->
                                            <span class="price">Rs. '.$row["product_total"].'</span>
                                    </div>
                                    <!-- <div class="variable-single-item color-switch">
                                        <div class="product-variable-color">
                                            <label>
                                                <input name="modal-product-color" class="color-select" type="radio" checked="">
                                                <span class="product-color-black"></span>
                                            </label>
                                            <label>
                                                <input name="modal-product-color" class="color-select" type="radio">
                                                <span class="product-color-tomato"></span>
                                            </label>
        
                                            <label>
                                                <input name="modal-product-color" class="color-select" type="radio">
                                                <span class="product-color-gray"></span>
                                            </label>
                                        </div>
                                    </div> -->
                                    <ul class="size-switch">';
                                    $data2='';
                                    $result2=$this->db->query("SELECT * FROM size_details where product_id='$productid'");
                                    
                                    while($row2 = $result2->fetch_assoc()){
                                        $sid = $row2["size_id"];
                                        $result3=$this->db->query("SELECT size FROM product_size where size_id='$sid'");$row3=$result3->fetch_array();
                                        $data2 .= '<li class="single-size">'.$row3["size"].'</li>';
                                    } 
                                    //return $this->db->error;
                                    $proid = "'productpage?productid=".$productid."'";
                                    $data3 = '</ul>
                                    <button onclick="window.location.href='.$proid.'" title="Buy Product" class="add-cart">Buy <i class="icon fas fa-plus-circle"></i></button>
                                </div>
                            </div>
                        </div>';
                        $data .= $data2.$data3;
        }
    }
    return $data;
}


function searchshopgrid()
{
   
    extract($_POST);
    // return $searchname.$category;
    
    $str = '%'.$searchname.'%';
  
    $data='';
    
        if(!isset($searchname))
        {
            $qry = $this->db->query("SELECT * FROM products WHERE cat_id = '$category' AND product_status='1'");
        }
        else
        {
            $qry = $this->db->query("SELECT * FROM products WHERE cat_id = '$category' AND product_status='1' AND p_name LIKE '$str'");


        }
        // return $this->db->error;
    
 
    if ($qry->num_rows > 0) 
    {
        
        while($row = $qry->fetch_assoc()) 
        {
            $productid=$row['product_id'];
            $result1=$this->db->query("SELECT * FROM color_details where product_id like '$productid'");
            $row1=$result1->fetch_array();
            $img=$row1["img1"];
            

                $data .='<div class="col-xl-4 col-lg-6 col-md-4 col-sm-6">
                            <div class="single-grid-product">
                                <div class="product-top">
                                
                                    <a href=""><img class="product-thumbnal" src="../admin/'.$img.'" alt="product"></a>
                                    
                                    <ul class="prdouct-btn-wrapper">
                                        <li class="single-product-btn">
                                            <a class="addCompare product-btn" data-pid="'.$productid.'" onclick="addwishlist(this)" title="Add to wishlist"><i class="icon flaticon-like"></i></a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="product-info text-center">
                                    <h4 class="product-catagory">HAY - Couture</h4>
                                    <h3 class="product-name"><a class="product-link" href="">'.$row["p_name"].'</a></h3>
                                   <!-- <ul class="product-review">
                                        <li class="review-item active"><i class="flaticon-star"></i></li>
                                        <li class="review-item active"><i class="flaticon-star"></i></li>
                                        <li class="review-item active"><i class="flaticon-star"></i></li>
                                        <li class="review-item"><i class="flaticon-star"></i></li>
                                        <li class="review-item"><i class="flaticon-star"></i></li>
                                    </ul> -->
                                    <div class="product-price">
                                     <!--   <span class="regular-price">'.$row["product_price"].'</span> -->
                                            <span class="price">Rs. '.$row["product_total"].'</span>
                                    </div>
                                    <!-- <div class="variable-single-item color-switch">
                                        <div class="product-variable-color">
                                            <label>
                                                <input name="modal-product-color" class="color-select" type="radio" checked="">
                                                <span class="product-color-black"></span>
                                            </label>
                                            <label>
                                                <input name="modal-product-color" class="color-select" type="radio">
                                                <span class="product-color-tomato"></span>
                                            </label>
        
                                            <label>
                                                <input name="modal-product-color" class="color-select" type="radio">
                                                <span class="product-color-gray"></span>
                                            </label>
                                        </div>
                                    </div> -->
                                    <ul class="size-switch">';
                                    $data2='';
                                    $result2=$this->db->query("SELECT * FROM size_details where product_id='$productid'");
                                    
                                    while($row2 = $result2->fetch_assoc()){
                                        $sid = $row2["size_id"];
                                        $result3=$this->db->query("SELECT size FROM product_size where size_id='$sid'");$row3=$result3->fetch_array();
                                        $data2 .= '<li class="single-size">'.$row3["size"].'</li>';
                                    } 
                                    //return $this->db->error;
                                    $proid = "'productpage?productid=".$productid."'";
                                    $data3 = '</ul>
                                    <button onclick="window.location.href='.$proid.'" title="Buy Product" class="add-cart">Buy <i class="icon fas fa-plus-circle"></i></button>
                                </div>
                            </div>
                        </div>';
                        $data .= $data2.$data3;
        }
    }
    return $data;
}


function searchprice()
{
   
    extract($_POST);
    ///return $searchname;
    
    
  
    $data='';
    if($seeall=='3')
    {
       if(isset($min) && $max=='')
       {
  
        $qry = $this->db->query("SELECT * FROM products WHERE product_feat = '1' AND product_status='1' AND product_total >= '$min'");
       }
       else if(isset($max) && $min==''){

        $qry = $this->db->query("SELECT * FROM products WHERE product_feat = '1' AND product_status='1' AND product_total <= '$max'");

       }else{

        $qry = $this->db->query("SELECT * FROM products WHERE product_feat = '1' AND product_status='1' AND product_total BETWEEN '$min' AND '$max'");

       }
        


    }
    else if($seeall=='2')
    {
        
        if(isset($min) && $max=='')
        {
   
         $qry = $this->db->query("SELECT * FROM products WHERE product_arrival = '1' AND product_status='1' AND product_total >= '$min'");
        }
        else if(isset($max) && $min==''){
 
         $qry = $this->db->query("SELECT * FROM products WHERE product_arrival = '1' AND product_status='1' AND product_total <= '$max'");
 
        }else{
 
         $qry = $this->db->query("SELECT * FROM products WHERE product_arrival = '1' AND product_status='1' AND product_total BETWEEN '$min' AND '$max'");
 
        }
    }
    else if($seeall=='1')
    {
        
        
        if(isset($min) && $max=='')
        {
   
         $qry = $this->db->query("SELECT * FROM products WHERE product_sale = '1' AND product_status='1' AND product_total >= '$min'");
        }
        else if(isset($max) && $min==''){
 
         $qry = $this->db->query("SELECT * FROM products WHERE product_sale = '1' AND product_status='1' AND product_total <= '$max'");
 
        }else{
 
         $qry = $this->db->query("SELECT * FROM products WHERE product_sale = '1' AND product_status='1' AND product_total BETWEEN '$min' AND '$max'");
 
        }
    }
    else
    {
        return 2;
    }
    if ($qry->num_rows > 0) 
    {
        
        while($row = $qry->fetch_assoc()) 
        {
            $productid=$row['product_id'];
            $result1=$this->db->query("SELECT * FROM color_details where product_id like '$productid'");
            $row1=$result1->fetch_array();
            $img=$row1["img1"];
            

                $data .='<div class="col-xl-4 col-lg-6 col-md-4 col-sm-6">
                            <div class="single-grid-product">
                                <div class="product-top">
                                
                                    <a href=""><img class="product-thumbnal" src="../admin/'.$img.'" alt="product"></a>
                                    
                                    <ul class="prdouct-btn-wrapper">
                                        <li class="single-product-btn">
                                            <a class="addCompare product-btn" data-pid="'.$productid.'" onclick="addwishlist(this)" title="Add to wishlist"><i class="icon flaticon-like"></i></a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="product-info text-center">
                                    <h4 class="product-catagory">HAY - Couture</h4>
                                    <h3 class="product-name"><a class="product-link" href="">'.$row["p_name"].'</a></h3>
                                   <!-- <ul class="product-review">
                                        <li class="review-item active"><i class="flaticon-star"></i></li>
                                        <li class="review-item active"><i class="flaticon-star"></i></li>
                                        <li class="review-item active"><i class="flaticon-star"></i></li>
                                        <li class="review-item"><i class="flaticon-star"></i></li>
                                        <li class="review-item"><i class="flaticon-star"></i></li>
                                    </ul> -->
                                    <div class="product-price">
                                     <!--   <span class="regular-price">'.$row["product_price"].'</span> -->
                                            <span class="price">Rs. '.$row["product_total"].'</span>
                                    </div>
                                    <!-- <div class="variable-single-item color-switch">
                                        <div class="product-variable-color">
                                            <label>
                                                <input name="modal-product-color" class="color-select" type="radio" checked="">
                                                <span class="product-color-black"></span>
                                            </label>
                                            <label>
                                                <input name="modal-product-color" class="color-select" type="radio">
                                                <span class="product-color-tomato"></span>
                                            </label>
        
                                            <label>
                                                <input name="modal-product-color" class="color-select" type="radio">
                                                <span class="product-color-gray"></span>
                                            </label>
                                        </div>
                                    </div> -->
                                    <ul class="size-switch">';
                                    $data2='';
                                    $result2=$this->db->query("SELECT * FROM size_details where product_id='$productid'");
                                    
                                    while($row2 = $result2->fetch_assoc()){
                                        $sid = $row2["size_id"];
                                        $result3=$this->db->query("SELECT size FROM product_size where size_id='$sid'");$row3=$result3->fetch_array();
                                        $data2 .= '<li class="single-size">'.$row3["size"].'</li>';
                                    } 
                                    //return $this->db->error;
                                    $data3 = '</ul>
                                    <a href="cart.html" title="Add to cart" class="add-cart">Add To Cart <i class="icon fas fa-plus-circle"></i></a>
                                </div>
                            </div>
                        </div>';
                        $data .= $data2.$data3;
        }
    }
    return $data;
}



function listsize()
{


		
		$qry = $this->db->query("SELECT * FROM product_size where size_status='1'");
		$str = '';

		while($row = mysqli_fetch_array($qry)) {
            $str .= 
            '<div class="single-size">
                <input onchange="toggleCheckbox(this)" class="form-check-input chk" value="'.$row["size_id"].'" name="checkbox" type="checkbox" id="'.$row["size"].'">
                <label class="form-check-label" for="'.$row["size"].'">'.$row["size"].'</label>
            </div>';

			}
		return $str;



}

function sizeshow()
{

        
    extract($_POST);
    //$size 
    $data="";
    $qry1 = $this->db->query("SELECT product_id FROM size_details where size_id='$size'");
    if ($qry1->num_rows > 0) {
        while($row1 = $qry1->fetch_assoc()) {
            $ss = $row1['product_id'];
            //$qry = $this->db->query("SELECT * FROM products WHERE product_id='$ss' AND product_status='1'");
            if($seeall=='3')
            {
                $qry = $this->db->query("SELECT * FROM products WHERE product_feat = '1' AND product_id='$ss' AND product_status='1'");
            }
            else if($seeall=='2')
            {
                $qry = $this->db->query("SELECT * FROM products WHERE product_arrival= '1' AND product_id='$ss' AND product_status='1'");
            }
            else if($seeall=='1')
            {
                $qry = $this->db->query("SELECT * FROM products WHERE product_sale = '1' AND product_id='$ss' AND product_status='1'");
            }
            else
            {
                return 2;
            }
            // return $this->db->error;
            if ($qry->num_rows > 0) 
            {
                
                while($row = $qry->fetch_assoc()) 
                {
                    $productid=$row['product_id'];
                    $result1=$this->db->query("SELECT * FROM color_details where product_id='$productid'");
                    $row1=$result1->fetch_array(); 
                    $img=$row1["img1"];
                
                        $data .='<div class="col-xl-4 col-lg-6 col-md-4 col-sm-6">
                                    <div class="single-grid-product">
                                        <div class="product-top">
                                        
                                            <a href=""><img class="product-thumbnal" src="../admin/'.$img.'" alt="product"></a>
                                            
                                            <ul class="prdouct-btn-wrapper">
                                                <!-- <li class="single-product-btn">
                                                    <a class="addToWishlist product-btn" href="compare.html" title="Add to compare"><i class="icon flaticon-bar-chart"></i></a>
                                                </li> -->
                                                <li class="single-product-btn">
                                                    <a class="addCompare product-btn" data-pid="'.$productid.'" onclick="addwishlist(this)" title="Add to wishlist"><i class="icon flaticon-like"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="product-info text-center">
                                            <h4 class="product-catagory">Hay - Couture</h4>
                                            <h3 class="product-name"><a class="product-link" href="">'.$row["p_name"].'</a></h3>
                                           <!-- <ul class="product-review">
                                                <li class="review-item active"><i class="flaticon-star"></i></li>
                                                <li class="review-item active"><i class="flaticon-star"></i></li>
                                                <li class="review-item active"><i class="flaticon-star"></i></li>
                                                <li class="review-item"><i class="flaticon-star"></i></li>
                                                <li class="review-item"><i class="flaticon-star"></i></li>
                                            </ul> -->
                                            <div class="product-price">
                                                
                                                <span class="price">'.$row["product_total"].'</span>
                                            </div>
                                            
                                            <ul class="size-switch">';
                                            $data2='';
                                            $result2=$this->db->query("SELECT * FROM size_details where product_id='$productid'");
                                            
                                            while($row2 = $result2->fetch_assoc()){
                                                $sid = $row2["size_id"];
                                                $result3=$this->db->query("SELECT size FROM product_size where size_id='$sid'");$row3=$result3->fetch_array();
                                                $data2 .= '<li class="single-size">'.$row3["size"].'</li>';
                                            } 
                                            //return $this->db->error;
                                            $proid = "'productpage?productid=".$productid."'";
										$data3 = '</ul>
                                        <button onclick="window.location.href='.$proid.'" title="Buy Product" class="add-cart">Buy <i class="icon fas fa-plus-circle"></i></button>
                                        </div>
                                    </div>
                                </div>';
                                $data .= $data2.$data3;
                }
            }
           
           
        }
    }
    //
    //
    return $data;



}


function sizeshow2()
{

        
    extract($_POST);
    //$size 
    $data="";
    $qry1 = $this->db->query("SELECT product_id FROM size_details where size_id='$size'");
    if ($qry1->num_rows > 0) {
        while($row1 = $qry1->fetch_assoc()) {
            $ss = $row1['product_id'];
            $qry = $this->db->query("SELECT * FROM products WHERE product_id='$ss' AND cat_id='$category' AND product_status='1'");
            // return $this->db->error;
            if ($qry->num_rows > 0) 
            {
                
                while($row = $qry->fetch_assoc()) 
                {
                    $productid=$row['product_id'];
                    $result1=$this->db->query("SELECT * FROM color_details where product_id='$productid'");
                    $row1=$result1->fetch_array(); 
                    $img=$row1["img1"];
                
                        $data .='<div class="col-xl-4 col-lg-6 col-md-4 col-sm-6">
                                    <div class="single-grid-product">
                                        <div class="product-top">
                                        
                                            <a href=""><img class="product-thumbnal" src="../admin/'.$img.'" alt="product"></a>
                                            
                                            <ul class="prdouct-btn-wrapper">
                                                <!-- <li class="single-product-btn">
                                                    <a class="addToWishlist product-btn" href="compare.html" title="Add to compare"><i class="icon flaticon-bar-chart"></i></a>
                                                </li> -->
                                                <li class="single-product-btn">
                                                    <a class="addCompare product-btn" data-pid="'.$productid.'" onclick="addwishlist(this)" title="Add to wishlist"><i class="icon flaticon-like"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="product-info text-center">
                                            <h4 class="product-catagory">Hay - Couture</h4>
                                            <h3 class="product-name"><a class="product-link" href="">'.$row["p_name"].'</a></h3>
                                           <!-- <ul class="product-review">
                                                <li class="review-item active"><i class="flaticon-star"></i></li>
                                                <li class="review-item active"><i class="flaticon-star"></i></li>
                                                <li class="review-item active"><i class="flaticon-star"></i></li>
                                                <li class="review-item"><i class="flaticon-star"></i></li>
                                                <li class="review-item"><i class="flaticon-star"></i></li>
                                            </ul> -->
                                            <div class="product-price">
                                                
                                                <span class="price">'.$row["product_total"].'</span>
                                            </div>
                                            
                                            <ul class="size-switch">';
                                            $data2='';
                                            $result2=$this->db->query("SELECT * FROM size_details where product_id='$productid'");
                                            
                                            while($row2 = $result2->fetch_assoc()){
                                                $sid = $row2["size_id"];
                                                $result3=$this->db->query("SELECT size FROM product_size where size_id='$sid'");$row3=$result3->fetch_array();
                                                $data2 .= '<li class="single-size">'.$row3["size"].'</li>';
                                            } 
                                            //return $this->db->error;
                                            $proid = "'productpage?productid=".$productid."'";
										$data3 = '</ul>
                                        <button onclick="window.location.href='.$proid.'" title="Buy Product" class="add-cart">Buy <i class="icon fas fa-plus-circle"></i></button>
                                        </div>
                                    </div>
                                </div>';
                                $data .= $data2.$data3;
                }
            }
           
           
        }
    }
    //
    //
    return $data;



}


function searchpriceshopgrid()
{

    extract($_POST);
    ///return $searchname;
    $data='';
    

        if(isset($min) && $max=='')
        {
   
         $qry = $this->db->query("SELECT * FROM products WHERE cat_id = '$category' AND product_status='1' AND product_total >= '$min'");
        }
        else if(isset($max) && $min==''){
 
         $qry = $this->db->query("SELECT * FROM products  WHERE cat_id = '$category' AND product_status='1' AND product_total <= '$max'");
 
        }else{
 
         $qry = $this->db->query("SELECT * FROM products WHERE cat_id = '$category' AND product_status='1' AND product_total BETWEEN '$min' AND '$max'");

        }
    if ($qry->num_rows > 0) 
    {
        
        while($row = $qry->fetch_assoc()) 
        {
            $productid=$row['product_id'];
            $result1=$this->db->query("SELECT * FROM color_details where product_id like '$productid'");
            $row1=$result1->fetch_array();
            $img=$row1["img1"];
            

                $data .='<div class="col-xl-4 col-lg-6 col-md-4 col-sm-6">
                            <div class="single-grid-product">
                                <div class="product-top">
                                
                                    <a href=""><img class="product-thumbnal" src="../admin/'.$img.'" alt="product"></a>
                                    
                                    <ul class="prdouct-btn-wrapper">
                                        <li class="single-product-btn">
                                            <a class="addCompare product-btn" data-pid="'.$productid.'" onclick="addwishlist(this)" title="Add to wishlist"><i class="icon flaticon-like"></i></a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="product-info text-center">
                                    <h4 class="product-catagory">HAY - Couture</h4>
                                    <h3 class="product-name"><a class="product-link" href="">'.$row["p_name"].'</a></h3>
                                   <!-- <ul class="product-review">
                                        <li class="review-item active"><i class="flaticon-star"></i></li>
                                        <li class="review-item active"><i class="flaticon-star"></i></li>
                                        <li class="review-item active"><i class="flaticon-star"></i></li>
                                        <li class="review-item"><i class="flaticon-star"></i></li>
                                        <li class="review-item"><i class="flaticon-star"></i></li>
                                    </ul> -->
                                    <div class="product-price">
                                     <!--   <span class="regular-price">'.$row["product_price"].'</span> -->
                                            <span class="price">Rs. '.$row["product_total"].'</span>
                                    </div>
                                    <!-- <div class="variable-single-item color-switch">
                                        <div class="product-variable-color">
                                            <label>
                                                <input name="modal-product-color" class="color-select" type="radio" checked="">
                                                <span class="product-color-black"></span>
                                            </label>
                                            <label>
                                                <input name="modal-product-color" class="color-select" type="radio">
                                                <span class="product-color-tomato"></span>
                                            </label>
        
                                            <label>
                                                <input name="modal-product-color" class="color-select" type="radio">
                                                <span class="product-color-gray"></span>
                                            </label>
                                        </div>
                                    </div> -->
                                    <ul class="size-switch">';
                                    $data2='';
                                    $result2=$this->db->query("SELECT * FROM size_details where product_id='$productid'");
                                    
                                    while($row2 = $result2->fetch_assoc()){
                                        $sid = $row2["size_id"];
                                        $result3=$this->db->query("SELECT size FROM product_size where size_id='$sid'");$row3=$result3->fetch_array();
                                        $data2 .= '<li class="single-size">'.$row3["size"].'</li>';
                                    } 
                                    //return $this->db->error;
                                    $proid = "'productpage?productid=".$productid."'";
                                    $data3 = '</ul>
                                    <button onclick="window.location.href='.$proid.'" title="Buy Product" class="add-cart">Buy <i class="icon fas fa-plus-circle"></i></button>
                                </div>
                            </div>
                        </div>';
                        $data .= $data2.$data3;
        }
    }
    return $data;

}

// function categorylist()
// {

//     extract($_POST);
    
//         $qry = $this->db->query("SELECT * FROM products WHERE product_sale = '1' AND product_status='1'");
 
//     $data="";
//     if ($qry->num_rows > 0) 
//     {
        
//         while($row = $qry->fetch_assoc()) 
//         {
//             $productid=$row['product_id'];
//             $result1=$this->db->query("SELECT * FROM color_details where product_id='$productid'");
//             $row1=$result1->fetch_array();
//             $img=$row1["img1"];
            

//                 $data .='<div class="col-xl-4 col-lg-6 col-md-4 col-sm-6">
//                             <div class="single-grid-product">
//                                 <div class="product-top">
                                
//                                     <a href="single-product.html"><img class="product-thumbnal" src="../admin/'.$img.'" alt="product"></a>
                                    
//                                     <ul class="prdouct-btn-wrapper">
//                                         <li class="single-product-btn">
//                                             <a class="addCompare product-btn" href="wish-list.html" title="Add to wishlist"><i class="icon flaticon-like"></i></a>
//                                         </li>
//                                     </ul>
//                                 </div>
//                                 <div class="product-info text-center">
//                                     <h4 class="product-catagory">HAY - Couture</h4>
//                                     <h3 class="product-name"><a class="product-link" href="single-product.html">'.$row["p_name"].'</a></h3>
//                                    <!-- <ul class="product-review">
//                                         <li class="review-item active"><i class="flaticon-star"></i></li>
//                                         <li class="review-item active"><i class="flaticon-star"></i></li>
//                                         <li class="review-item active"><i class="flaticon-star"></i></li>
//                                         <li class="review-item"><i class="flaticon-star"></i></li>
//                                         <li class="review-item"><i class="flaticon-star"></i></li>
//                                     </ul> -->
//                                     <div class="product-price">
//                                      <!--   <span class="regular-price">'.$row["product_price"].'</span> -->
//                                             <span class="price">Rs. '.$row["product_total"].'</span>
//                                     </div>
//                                     <!-- <div class="variable-single-item color-switch">
//                                         <div class="product-variable-color">
//                                             <label>
//                                                 <input name="modal-product-color" class="color-select" type="radio" checked="">
//                                                 <span class="product-color-black"></span>
//                                             </label>
//                                             <label>
//                                                 <input name="modal-product-color" class="color-select" type="radio">
//                                                 <span class="product-color-tomato"></span>
//                                             </label>
        
//                                             <label>
//                                                 <input name="modal-product-color" class="color-select" type="radio">
//                                                 <span class="product-color-gray"></span>
//                                             </label>
//                                         </div>
//                                     </div> -->
//                                     <ul class="size-switch">';
//                                     $data2='';
//                                     $result2=$this->db->query("SELECT * FROM size_details where product_id='$productid'");
                                    
//                                     while($row2 = $result2->fetch_assoc()){
//                                         $sid = $row2["size_id"];
//                                         $result3=$this->db->query("SELECT size FROM product_size where size_id='$sid'");$row3=$result3->fetch_array();
//                                         $data2 .= '<li class="single-size">'.$row3["size"].'</li>';
//                                     } 
//                                     //return $this->db->error;
//                                     $data3 = '</ul>
//                                     <a href="cart.html" title="Add to cart" class="add-cart">Add To Cart <i class="icon fas fa-plus-circle"></i></a>
//                                 </div>
//                             </div>
//                         </div>';
//                         $data .= $data2.$data3;
//         }
//     }
//     return $data;

// }


function shopgridmin(){
    extract($_POST);
    $qry = $this->db->query("SELECT * FROM products WHERE cat_id = '$category' and product_status='1' product_total >= '$min'");
    $data="";
    if ($qry->num_rows > 0) 
    {
        
        while($row = $qry->fetch_assoc()) 
        {
            $productid=$row['product_id'];
            $result1=$this->db->query("SELECT * FROM color_details where product_id='$productid'");
            $row1=$result1->fetch_array();
            $img=$row1["img1"];
            

                $data .='<div class="col-xl-4 col-lg-6 col-md-4 col-sm-6">
                            <div class="single-grid-product">
                                <div class="product-top">
                                
                                    <a href=""><img class="product-thumbnal" src="../admin/'.$img.'" alt="product"></a>
                                    
                                    <ul class="prdouct-btn-wrapper">
                                        <li class="single-product-btn">
                                            <a class="addCompare product-btn" data-pid="'.$productid.'" onclick="addwishlist(this)" title="Add to wishlist"><i class="icon flaticon-like"></i></a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="product-info text-center">
                                    <h4 class="product-catagory">HAY - Couture</h4>
                                    <h3 class="product-name"><a class="product-link" href="">'.$row["p_name"].'</a></h3>
                                   <!-- <ul class="product-review">
                                        <li class="review-item active"><i class="flaticon-star"></i></li>
                                        <li class="review-item active"><i class="flaticon-star"></i></li>
                                        <li class="review-item active"><i class="flaticon-star"></i></li>
                                        <li class="review-item"><i class="flaticon-star"></i></li>
                                        <li class="review-item"><i class="flaticon-star"></i></li>
                                    </ul> -->
                                    <div class="product-price">
                                     <!--   <span class="regular-price">'.$row["product_price"].'</span> -->
                                            <span class="price">Rs. '.$row["product_total"].'</span>
                                    </div>
                                    <!-- <div class="variable-single-item color-switch">
                                        <div class="product-variable-color">
                                            <label>
                                                <input name="modal-product-color" class="color-select" type="radio" checked="">
                                                <span class="product-color-black"></span>
                                            </label>
                                            <label>
                                                <input name="modal-product-color" class="color-select" type="radio">
                                                <span class="product-color-tomato"></span>
                                            </label>
        
                                            <label>
                                                <input name="modal-product-color" class="color-select" type="radio">
                                                <span class="product-color-gray"></span>
                                            </label>
                                        </div>
                                    </div> -->
                                    <ul class="size-switch">';
                                    $data2='';
                                    $result2=$this->db->query("SELECT * FROM size_details where product_id='$productid'");
                                    
                                    while($row2 = $result2->fetch_assoc()){
                                        $sid = $row2["size_id"];
                                        $result3=$this->db->query("SELECT size FROM product_size where size_id='$sid'");$row3=$result3->fetch_array();
                                        $data2 .= '<li class="single-size">'.$row3["size"].'</li>';
                                    } 
                                    //return $this->db->error;
                                    $proid = "'productpage?productid=".$productid."'";
                                    $data3 = '</ul>
                                    <button onclick="window.location.href='.$proid.'" title="Buy Product" class="add-cart">Buy <i class="icon fas fa-plus-circle"></i></button>
                                </div>
                            </div>
                        </div>';
                        $data .= $data2.$data3;
        }
    }
    return $data;
}



function singleproduct()
{

    extract($_POST);
    //return $productid;
		//$qry = $this->db->query("SELECT * FROM products WHERE product_id = '$productid' and product_status='1'");
		$data="";
        $color1='';
        $color2='';
       
        $result1=$this->db->query("SELECT * FROM color_details where product_id='$productid'");
				if ($result1->num_rows > 0) 
		        {
                    while($row1 = $result1->fetch_assoc()) 
                    {
                       $i1=$row1['img1'];
                       $i2=$row1['img2'];
                       
                       $color1.='<li class="single-item"><img class="single-item-image" src="../admin/'.$i1.'" alt="product"></li>';
                       $color1.='<li class="single-item"><img class="single-item-image" src="../admin/'.$i2.'" alt="product"></li>';

                       $color2.='<div class="single-slide">
                            <img class="slide-image" src="../admin/'.$i1.'" alt="product">
                        </div>';

                        $color2.='<div class="single-slide">
                            <img class="slide-image" src="../admin/'.$i2.'" alt="product">
                        </div>';
                    }
                }

				return $color1."*".$color2;
        // if ($qry->num_rows > 0) 
		// {
    
            
		// 	while($row = $qry->fetch_assoc()) 
		// 	{
			
				
        //     }
        // }
    }

                // $img=$row1["img1"];
				

		// 			$data .='<div class="col-xl-4 col-lg-6 col-md-4 col-sm-6">
        //                         <div class="single-grid-product">
        //                             <div class="product-top">
									
        //                                 <a href="single-product.html"><img class="product-thumbnal" src="../admin/'.$img.'" alt="product"></a>
                                        
        //                                 <ul class="prdouct-btn-wrapper">
        //                                     <li class="single-product-btn">
        //                                         <a class="addCompare product-btn" href="wish-list.html" title="Add to wishlist"><i class="icon flaticon-like"></i></a>
        //                                     </li>
        //                                 </ul>
        //                             </div>
        //                             <div class="product-info text-center">
        //                                 <h4 class="product-catagory">HAY - Couture</h4>
        //                                 <h3 class="product-name"><a class="product-link" href="single-product.html">'.$row["p_name"].'</a></h3>
        //                                <!-- <ul class="product-review">
        //                                     <li class="review-item active"><i class="flaticon-star"></i></li>
        //                                     <li class="review-item active"><i class="flaticon-star"></i></li>
        //                                     <li class="review-item active"><i class="flaticon-star"></i></li>
        //                                     <li class="review-item"><i class="flaticon-star"></i></li>
        //                                     <li class="review-item"><i class="flaticon-star"></i></li>
        //                                 </ul> -->
        //                                 <div class="product-price">
        //                                  <!--   <span class="regular-price">'.$row["product_price"].'</span> -->
        //                                         <span class="price">Rs. '.$row["product_total"].'</span>
        //                                 </div>
        //                                 <!-- <div class="variable-single-item color-switch">
        //                                     <div class="product-variable-color">
        //                                         <label>
        //                                             <input name="modal-product-color" class="color-select" type="radio" checked="">
        //                                             <span class="product-color-black"></span>
        //                                         </label>
        //                                         <label>
        //                                             <input name="modal-product-color" class="color-select" type="radio">
        //                                             <span class="product-color-tomato"></span>
        //                                         </label>
            
        //                                         <label>
        //                                             <input name="modal-product-color" class="color-select" type="radio">
        //                                             <span class="product-color-gray"></span>
        //                                         </label>
        //                                     </div>
        //                                 </div> -->
        //                                 <ul class="size-switch">';
		// 								$data2='';
		// 								$result2=$this->db->query("SELECT * FROM size_details where product_id='$productid'");
										
		// 								while($row2 = $result2->fetch_assoc()){
		// 									$sid = $row2["size_id"];
		// 									$result3=$this->db->query("SELECT size FROM product_size where size_id='$sid'");$row3=$result3->fetch_array();
		// 									$data2 .= '<li class="single-size">'.$row3["size"].'</li>';
		// 								} 
        //                                 //return $this->db->error;
		// 								$data3 = '</ul>
        //                                 <a href="cart.html" title="Add to cart" class="add-cart">Add To Cart <i class="icon fas fa-plus-circle"></i></a>
        //                             </div>
        //                         </div>
        //                     </div>';
		// 					$data .= $data2.$data3;
		// 	}
		// }
		// return $data;

        function addtocart(){
            if(!isset($_SESSION['regid'])){
                return 5;
            }else{
                extract($_POST);
                $userid = $_SESSION["regid"];

                $status = 1;
                $qry = $this->db->query("INSERT INTO cart(userid, productid, size_id, color_id, quantity, status) VALUES ('$userid','$productid','$size','$color','$quantity','$status')");
                return $qry;
            }
           
        }

        
function listcart(){
    extract($_POST);
    $data="";
    $qry0 = $this->db->query("SELECT * FROM cart WHERE userid = '$userid' AND status = '1'");
    if ($qry0->num_rows > 0) 
    {
        while($row0 = $qry0->fetch_assoc()) 
        {
            $productid=$row0['productid'];
            //return $productid;
            $qry = $this->db->query("SELECT * FROM products WHERE product_id = '$productid' and product_status='1'");
            if ($qry->num_rows > 0) 
            {   
                while($row = $qry->fetch_assoc()) 
                {
                    
                    $qry1=$this->db->query("SELECT * FROM color_details where product_id='$productid'"); $row1=$qry1->fetch_array();
                    $img=$row1["img1"];

                    $data .= '<tr class="cart-page-item">
                        <td>
                            <div class="single-grid-product m-0">
                                
                                <div class="product-top">
                                    <a href=""><img class="product-thumbnal" src="../admin/'.$img.'" alt="cart"></a>
                                    
                                </div>

                                <div class="product-info text-center">
                                    <h4 class="product-catagory">ELLA - HALOTHEMES</h4>
                                    <h3 class="product-name"><a class="product-link" href="">'.$row["p_name"].'</a></h3>
                                    <ul class="size-switch">';
                                       
                                        $pid = $productid;
                                        $sizeid = $row0["size_id"];
                                        $qry2=$this->db->query("SELECT product_size.size, product_size.size_id FROM product_size INNER JOIN size_details ON product_size.size_id = size_details.size_id WHERE size_details.product_id='$pid' AND product_size.size_id = '$sizeid' ");
                                        if ($qry2->num_rows > 0) 
                                        {
                                            while($row2 = $qry2->fetch_assoc()) 
                                            {
                                                $data .= '<li data-sizeid="'.$row2['size_id'].'" class="single-size">'.$row2['size'].'</li>';
                                            }
                                        }
                                       
                                    $data .= '</ul>
                                    <div class="variable-single-item color-switch">
                                        <div class="product-variable-color">';

                                        $pid = $productid;
                                        $colorid = $row0["color_id"];
                                        $qry3=$this->db->query("SELECT product_color.color,product_color.color_code,color_details.color_id FROM product_color INNER JOIN color_details ON product_color.color_id = color_details.color_id WHERE color_details.product_id='$pid' AND product_color.color_id = '$colorid'");
                                        if ($qry3->num_rows > 0) 
                                        {
                                            while($row3 = $qry3->fetch_assoc()) 
                                            {
                                                $data .= '<label>
                                                            <input id="colorradio" data-id="'.$row3["color_id"].'" name="modal-product-color" data-color="'.$row3["color"].'" class="color-select" type="radio" onclick="fnfn(this)">
                                                            <span class="" style="background: '.$row3["color_code"].'"></span>
                                                        </label>';
                                            }
                                        }

                                           
                                        $data .='</div>
                                    </div>
                                </div>
                            </div>
                        </td>

                        <td>
                            <div class="product-price text-center">
                                <h3 class="price">₹'.$row["product_total"].'</h3>
                            </div>
                        </td>

                        <td>
                            <div class="cart-quantity input-group">
                                <div class="increase-btn dec qtybutton btn">-</div>
                                <input class="qty-input cart-plus-minus-box" type="text" name="qtybutton" value="1" readonly="">
                                <div class="increase-btn inc qtybutton btn">+</div>
                            </div>
                        </td>

                        <td>
                            <h1 class="cart-table-item-total">₹'.$row["product_total"] * $row0["quantity"].'</h1>
                        </td>

                        <td><button class="delet-btn" title="Delete Item"><img src="assets/images/close.svg" alt="close"></button></td>
                        </tr>';
                }
            }

        }
    }
    return $data;

}

function similar(){
    
    extract($_POST);
    $qry = $this->db->query("SELECT * FROM products WHERE product_status='1' AND cat_id = (SELECT cat_id from products where product_id = '$productid') LIMIT 3");
    $data="";
    if ($qry->num_rows > 0) 
    {
        
        while($row = $qry->fetch_assoc()) 
        {
            $productid=$row['product_id'];
            $result1=$this->db->query("SELECT * FROM color_details where product_id='$productid'");
            $row1=$result1->fetch_array();
            $img=$row1["img1"];
            

                $data .='<div class="col-xl-4 col-lg-6 col-md-4 col-sm-6">
                            <div class="single-grid-product">
                                <div class="product-top">
                                
                                    <a href=""><img class="product-thumbnal" src="../admin/'.$img.'" alt="product"></a>
                                    
                                    <ul class="prdouct-btn-wrapper">
                                        <!-- <li class="single-product-btn">
                                            <a class="addToWishlist product-btn" href="compare.html" title="Add to compare"><i class="icon flaticon-bar-chart"></i></a>
                                        </li> -->
                                        <li class="single-product-btn">
                                            <a class="addCompare product-btn" data-pid="'.$productid.'" onclick="addwishlist(this)" title="Add to wishlist"><i class="icon flaticon-like"></i></a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="product-info text-center">
                                    <h4 class="product-catagory">Hay - Couture</h4>
                                    <h3 class="product-name"><a class="product-link" href="">'.$row["p_name"].'</a></h3>
                                   <!-- <ul class="product-review">
                                        <li class="review-item active"><i class="flaticon-star"></i></li>
                                        <li class="review-item active"><i class="flaticon-star"></i></li>
                                        <li class="review-item active"><i class="flaticon-star"></i></li>
                                        <li class="review-item"><i class="flaticon-star"></i></li>
                                        <li class="review-item"><i class="flaticon-star"></i></li>
                                    </ul> -->
                                    <div class="product-price">
                                        
                                        <span class="price">'.$row["product_total"].'</span>
                                    </div>
                                    
                                    <ul class="size-switch">';
                                    $data2='';
                                    $result2=$this->db->query("SELECT * FROM size_details where product_id='$productid'");
                                    
                                    while($row2 = $result2->fetch_assoc()){
                                        $sid = $row2["size_id"];
                                        $result3=$this->db->query("SELECT size FROM product_size where size_id='$sid'");$row3=$result3->fetch_array();
                                        $data2 .= '<li class="single-size">'.$row3["size"].'</li>';
                                    } 
                                    //return $this->db->error;
                                    $proid = "'productpage?productid=".$productid."'";
										$data3 = '</ul>
                                        <button onclick="window.location.href='.$proid.'" title="Buy Product" class="add-cart">Buy <i class="icon fas fa-plus-circle"></i></button>
                                </div>
                            </div>
                        </div>';
                        $data .= $data2.$data3;
        }
    }
    return $data;
}


    function removequantity(){
        extract($_POST);
        $result3=$this->db->query("SELECT quantity FROM cart where id = '$cartid'");$row3=$result3->fetch_array();
        if($row3['quantity']>1){
            $qry = $this->db->query("UPDATE cart SET quantity = quantity - 1 WHERE id = '$cartid'");
        }else{
            $qry = $this->db->query("DELETE FROM cart WHERE id = '$cartid'");
        }
        
        return $qry;
    }

    function addquantity(){
        extract($_POST);
        $qry = $this->db->query("UPDATE cart SET quantity = quantity + 1 WHERE id = '$cartid' ");
        return $qry;
    }

    function deletecartitem(){
        extract($_POST);
        $qry = $this->db->query("UPDATE cart SET status = 2 WHERE id = '$cartid'");
        return $qry;
    }

    function districtslist()
	{
		extract($_POST);
		$qry = $this->db->query("SELECT * FROM district where state_id = '$state_id'");
		$str = '<option>Disctrict</option>';
		while($row = mysqli_fetch_array($qry)) {
			$str .= '<option value="'.$row["district_id"].'">'.$row["district_name"].'</option>';
		}
		return $str;
	}

    function citylist()
	{
		extract($_POST);
		$qry = $this->db->query("SELECT * FROM city where district_id = '$district_id'");
		$str = '<option>City</option>';
		while($row = mysqli_fetch_array($qry)) {
			$str .= '<option value="'.$row["city_id"].'">'.$row["city_name"].'</option>';
		}
		return $str;
	}

    function addaddress(){
        extract($_POST);
        //return $name.$mobile.$streetaddress.$state.$district.$city.$zipcode;
        $regid = $_SESSION['regid'];
		$qry = $this->db->query("INSERT INTO useraddress(regid, name, mobile, hname, cityid, disctrictid, stateid, pin, status) VALUES ('$regid','$name','$mobile','$streetaddress','$state','$district','$city','$zipcode','1')");
		
		return $this->db->error;
    }   

    function couponcheck(){
        extract($_POST);
        $qry = $this->db->query("SELECT * FROM coupon where couponcode = '$couponcode'");
        if ($qry->num_rows > 0) 
        {
            $row=$qry->fetch_array();
            $date_now = date("Y-m-d"); // this format is string comparable
            if ($date_now < $row["expiredate"]) {
                if($total >$row["minexpense"]){
                   
                    return $row["amount"];
                }
                else{
                    
                    return 5;
                }
                
            }else{
                
                return 5;
            }
        }else{
           
            return 5;
        }

    }

    function addwishlist(){
   

        if(!isset($_SESSION['regid'])){
            return 5;
        }else{
            extract($_POST);
            $userid = $_SESSION["regid"];
            $qry0 = $this->db->query("SELECT * FROM wishlist where userid = '$userid' and productid = '$productid'");
            if ($qry0->num_rows > 0) 
            {
                $row=$qry0->fetch_array();
                echo $row['status'];
                if($row['status']==2){
                    $qry = $this->db->query("UPDATE wishlist SET status='1' WHERE userid = '$userid' and productid = '$productid'");
                    return $qry;
                }else{
                    return 1;
                }
            }else{
                $qry = $this->db->query("INSERT INTO wishlist(userid, productid, status) VALUES ('$userid','$productid','1')");
                return $qry;
            }
            
        }

    }
    function remwishlist(){
   

      
            extract($_POST);
         
            $qry = $this->db->query("UPDATE wishlist set status = '2' where id = '$id'");
            return $qry;
    

    }

    function showcoupon(){

        $qry = $this->db->query("SELECT * FROM coupon where status = '1'");
        
		$str = '<h1>Available Coupons</h1></h2><ul>';
		while($row = mysqli_fetch_array($qry)) {
			$str .= "<li>".$row['couponcode']." - Avails discount of ₹ ".$row['amount']."</li>";
		}
        $str.="</ul>";
		return $str;
    }


    function addrating(){
        extract($_POST);
        $qry = $this->db->query("INSERT INTO review(productid, userid, ratingscore,title, ratingdesc) VALUES ('$productid','$user_id','$rating_data','$reviewtitle','$user_review')");
        return $qry;
    }

    function returnorder(){
        extract($_POST);
        $qry = $this->db->query("UPDATE cart SET status=9 WHERE userid='$user_id' and productid = '$productid' ");
        return $qry;
    }
    


    function productmatch(){
		extract($_POST);

        $data="";
        $a=array();
        $b = array();
        ///////////////////////////////////////////
        if(isset($p1)){
        // $imgname = "assets/uploaded_files/product_images/".$p1;
        // $resultx=$this->db->query("SELECT product_id FROM color_details where img1='$imgname' or img2='$imgname'");$rowx=$resultx->fetch_array();
		// $pidd = $rowx["product_id"];
        $pidd = $p1;
        $qry = $this->db->query("SELECT * FROM products WHERE product_id = '$pidd' ");
		
		if ($qry->num_rows > 0) 
		{
			
			while($row = $qry->fetch_assoc()) 
			{
				$productid=$row['product_id'];
				$result1=$this->db->query("SELECT * FROM color_details where product_id='$productid'");
				$row1=$result1->fetch_array();
				$img=$row1["img1"];
				

					$data .='<div class="col-xl-4 col-lg-6 col-md-4 col-sm-6">
                                <div class="single-grid-product">
                                    <div class="product-top">
									
                                        <a href="productpage?productid='.$productid.'"><img class="product-thumbnal" src="../admin/'.$img.'" height="315" width="420" alt="product"></a>
                                        
                                        <ul class="prdouct-btn-wrapper">
                                            <li class="single-product-btn">
                                                <a class="addCompare product-btn" data-pid="'.$productid.'" onclick="addwishlist(this)" title="Add to wishlist"><i class="icon flaticon-like"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="product-info text-center">
                                        <h4 class="product-catagory">HAY - Couture</h4>
                                        <h3 class="product-name"><a class="product-link" href="productpage?productid='.$productid.' ">'.$row["p_name"].'</a></h3>
                                       <!-- <ul class="product-review">
                                            <li class="review-item active"><i class="flaticon-star"></i></li>
                                            <li class="review-item active"><i class="flaticon-star"></i></li>
                                            <li class="review-item active"><i class="flaticon-star"></i></li>
                                            <li class="review-item"><i class="flaticon-star"></i></li>
                                            <li class="review-item"><i class="flaticon-star"></i></li>
                                        </ul> -->
                                        <div class="product-price">
                                         <!--   <span class="regular-price">'.$row["product_price"].'</span> -->
                                                <span class="price">Rs. '.$row["product_total"].'</span>
                                        </div>
                                        <!-- <div class="variable-single-item color-switch">
                                            <div class="product-variable-color">
                                                <label>
                                                    <input name="modal-product-color" class="color-select" type="radio" checked="">
                                                    <span class="product-color-black"></span>
                                                </label>
                                                <label>
                                                    <input name="modal-product-color" class="color-select" type="radio">
                                                    <span class="product-color-tomato"></span>
                                                </label>
            
                                                <label>
                                                    <input name="modal-product-color" class="color-select" type="radio">
                                                    <span class="product-color-gray"></span>
                                                </label>
                                            </div>
                                        </div> -->
                                        <ul class="size-switch">';
										$data2='';
										$result2=$this->db->query("SELECT * FROM size_details where product_id='$productid'");
										
										while($row2 = $result2->fetch_assoc()){
											$sid = $row2["size_id"];
											$result3=$this->db->query("SELECT size FROM product_size where size_id='$sid'");$row3=$result3->fetch_array();
											$data2 .= '<li class="single-size">'.$row3["size"].'</li>';
										} 
                                        //return $this->db->error;
                                        $proid = "'productpage?productid=".$productid."'";
										$data3 = '</ul>
                                        <button onclick="window.location.href='.$proid.'" title="Buy Product" class="add-cart">Buy <i class="icon fas fa-plus-circle"></i></button>
                                    </div>
                                </div>
                            </div>';
							$data .= $data2.$data3;
			}
		}
    }
        //////////////////////////////////////////////////////

        ///////////////////////////////////////////
        if(isset($p2)){
        // $imgname = "assets/uploaded_files/product_images/".$p2;
        // $resultx=$this->db->query("SELECT product_id FROM color_details where img1='$imgname' or img2='$imgname'");$rowx=$resultx->fetch_array();
		// $pidd = $rowx["product_id"];
        $pidd = $p2;
        $qry = $this->db->query("SELECT * FROM products WHERE product_id = '$pidd' ");
		
		if ($qry->num_rows > 0) 
		{
			
			while($row = $qry->fetch_assoc()) 
			{
				$productid=$row['product_id'];
				$result1=$this->db->query("SELECT * FROM color_details where product_id='$productid'");
				$row1=$result1->fetch_array();
				$img=$row1["img1"];
				

					$data .='<div class="col-xl-4 col-lg-6 col-md-4 col-sm-6">
                                <div class="single-grid-product">
                                    <div class="product-top">
									
                                        <a href="productpage?productid='.$productid.'"><img class="product-thumbnal" src="../admin/'.$img.'" height="315" width="420" alt="product"></a>
                                        
                                        <ul class="prdouct-btn-wrapper">
                                            <li class="single-product-btn">
                                                <a class="addCompare product-btn" data-pid="'.$productid.'" onclick="addwishlist(this)" title="Add to wishlist"><i class="icon flaticon-like"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="product-info text-center">
                                        <h4 class="product-catagory">HAY - Couture</h4>
                                        <h3 class="product-name"><a class="product-link" href="productpage?productid='.$productid.' ">'.$row["p_name"].'</a></h3>
                                       <!-- <ul class="product-review">
                                            <li class="review-item active"><i class="flaticon-star"></i></li>
                                            <li class="review-item active"><i class="flaticon-star"></i></li>
                                            <li class="review-item active"><i class="flaticon-star"></i></li>
                                            <li class="review-item"><i class="flaticon-star"></i></li>
                                            <li class="review-item"><i class="flaticon-star"></i></li>
                                        </ul> -->
                                        <div class="product-price">
                                         <!--   <span class="regular-price">'.$row["product_price"].'</span> -->
                                                <span class="price">Rs. '.$row["product_total"].'</span>
                                        </div>
                                        <!-- <div class="variable-single-item color-switch">
                                            <div class="product-variable-color">
                                                <label>
                                                    <input name="modal-product-color" class="color-select" type="radio" checked="">
                                                    <span class="product-color-black"></span>
                                                </label>
                                                <label>
                                                    <input name="modal-product-color" class="color-select" type="radio">
                                                    <span class="product-color-tomato"></span>
                                                </label>
            
                                                <label>
                                                    <input name="modal-product-color" class="color-select" type="radio">
                                                    <span class="product-color-gray"></span>
                                                </label>
                                            </div>
                                        </div> -->
                                        <ul class="size-switch">';
										$data2='';
										$result2=$this->db->query("SELECT * FROM size_details where product_id='$productid'");
										
										while($row2 = $result2->fetch_assoc()){
											$sid = $row2["size_id"];
											$result3=$this->db->query("SELECT size FROM product_size where size_id='$sid'");$row3=$result3->fetch_array();
											$data2 .= '<li class="single-size">'.$row3["size"].'</li>';
										} 
                                        //return $this->db->error;
                                        $proid = "'productpage?productid=".$productid."'";
										$data3 = '</ul>
                                        <button onclick="window.location.href='.$proid.'" title="Buy Product" class="add-cart">Buy <i class="icon fas fa-plus-circle"></i></button>
                                    </div>
                                </div>
                            </div>';
							$data .= $data2.$data3;
			}
		}
    }
        //////////////////////////////////////////////////////

        ///////////////////////////////////////////
        if(isset($p3)){
        // $imgname = "assets/uploaded_files/product_images/".$p3;
        // $resultx=$this->db->query("SELECT product_id FROM color_details where img1='$imgname' or img2='$imgname'");$rowx=$resultx->fetch_array();
		// $pidd = $rowx["product_id"];
        $pidd = $p3;
        $qry = $this->db->query("SELECT * FROM products WHERE product_id = '$pidd' ");
		
		if ($qry->num_rows > 0) 
		{
			
			while($row = $qry->fetch_assoc()) 
			{
				$productid=$row['product_id'];
				$result1=$this->db->query("SELECT * FROM color_details where product_id='$productid'");
				$row1=$result1->fetch_array();
				$img=$row1["img1"];
				

					$data .='<div class="col-xl-4 col-lg-6 col-md-4 col-sm-6">
                                <div class="single-grid-product">
                                    <div class="product-top">
									
                                        <a href="productpage?productid='.$productid.'"><img class="product-thumbnal" src="../admin/'.$img.'" height="315" width="420" alt="product"></a>
                                        
                                        <ul class="prdouct-btn-wrapper">
                                            <li class="single-product-btn">
                                                <a class="addCompare product-btn" data-pid="'.$productid.'" onclick="addwishlist(this)" title="Add to wishlist"><i class="icon flaticon-like"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="product-info text-center">
                                        <h4 class="product-catagory">HAY - Couture</h4>
                                        <h3 class="product-name"><a class="product-link" href="productpage?productid='.$productid.' ">'.$row["p_name"].'</a></h3>
                                       <!-- <ul class="product-review">
                                            <li class="review-item active"><i class="flaticon-star"></i></li>
                                            <li class="review-item active"><i class="flaticon-star"></i></li>
                                            <li class="review-item active"><i class="flaticon-star"></i></li>
                                            <li class="review-item"><i class="flaticon-star"></i></li>
                                            <li class="review-item"><i class="flaticon-star"></i></li>
                                        </ul> -->
                                        <div class="product-price">
                                         <!--   <span class="regular-price">'.$row["product_price"].'</span> -->
                                                <span class="price">Rs. '.$row["product_total"].'</span>
                                        </div>
                                        <!-- <div class="variable-single-item color-switch">
                                            <div class="product-variable-color">
                                                <label>
                                                    <input name="modal-product-color" class="color-select" type="radio" checked="">
                                                    <span class="product-color-black"></span>
                                                </label>
                                                <label>
                                                    <input name="modal-product-color" class="color-select" type="radio">
                                                    <span class="product-color-tomato"></span>
                                                </label>
            
                                                <label>
                                                    <input name="modal-product-color" class="color-select" type="radio">
                                                    <span class="product-color-gray"></span>
                                                </label>
                                            </div>
                                        </div> -->
                                        <ul class="size-switch">';
										$data2='';
										$result2=$this->db->query("SELECT * FROM size_details where product_id='$productid'");
										
										while($row2 = $result2->fetch_assoc()){
											$sid = $row2["size_id"];
											$result3=$this->db->query("SELECT size FROM product_size where size_id='$sid'");$row3=$result3->fetch_array();
											$data2 .= '<li class="single-size">'.$row3["size"].'</li>';
										} 
                                        //return $this->db->error;
                                        $proid = "'productpage?productid=".$productid."'";
										$data3 = '</ul>
                                        <button onclick="window.location.href='.$proid.'" title="Buy Product" class="add-cart">Buy <i class="icon fas fa-plus-circle"></i></button>
                                    </div>
                                </div>
                            </div>';
							$data .= $data2.$data3;
			}
		}
    }
        //////////////////////////////////////////////////////

		return $data;
	}




    // update cart
    function updatecart(){
        
        if(!isset($_SESSION['regid'])){
            return 5;
        }else{
            extract($_POST);
            $userid = $_SESSION["regid"];

            $status = 1;
            $qry = $this->db->query("UPDATE cart SET userid='$userid',productid='$productid',size_id='$size',color_id='$color',quantity='$quantity' WHERE id='$cartid'");
       
            return $qry;

        }
       
    }

    function stockcheck(){
        extract($_POST);
     
        $result1=$this->db->query("SELECT quantity FROM size_details where product_id ='$productid' and size_id = $sizeid");
        $row1 = $result1->fetch_array();
		$cstock = $row1['quantity'];

        if($cstock>=$qty){
            return 1;
        }
        else{
            return 2;
        }

      
    }

    function stockcheckbasedoncartid(){
        extract($_POST);
        
        $result1=$this->db->query("SELECT * FROM cart where id ='$cartid'");
        $row1 = $result1->fetch_array();
		$productid = $row1['productid'];
        $sizeid = $row1['size_id'];
        $result1=$this->db->query("SELECT quantity FROM size_details where product_id ='$productid' and size_id = $sizeid");
        $row1 = $result1->fetch_array();
		$cstock = $row1['quantity'];

        return $cstock;

    }

    function getstatetax(){
        extract($_POST);
        $result1=$this->db->query("SELECT * FROM sgst where state_id ='$id'");
        //return $this->db->error;
        $row1 = $result1->fetch_array();
		$tax = $row1['taxpercent'];
        return $tax;

    }

    function removeaddr(){
        extract($_POST);
        $result1=$this->db->query("DELETE FROM useraddress WHERE id='$addrid'");
        return $result1;
    }

    function getuseraddr(){
        extract($_POST);
        $qry=$this->db->query("SELECT * FROM useraddress WHERE id='$addrid' and regid = '$regid'");


        $outp = array();
        $outp = $qry->fetch_all(MYSQLI_ASSOC);

        return json_encode($outp);

    }
    function updateaddr(){
        extract($_POST);
        $qry=$this->db->query("UPDATE useraddress SET name='$name',mobile='$mob',hname='$hname',cityid='$city',disctrictid='$district',stateid='$state',pin='$pcode' WHERE id = '$ids'");
     
        

        return $qry;


    }
    
    function outofstock(){
        extract($_POST);
        $qry=$this->db->query("SELECT quantity FROM size_details WHERE product_id='$productid' and size_id = '$sizeid'");
        if ($qry->num_rows > 0) 
		{
			
			while($row = $qry->fetch_assoc()) 
			{
                if($row['quantity']<1){
                    return 2;
                }

            }
        }
    }
    
    
    
}
