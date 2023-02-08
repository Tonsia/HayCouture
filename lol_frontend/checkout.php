<?php include 'header.php';
    if(!isset($_SESSION['regid'])){
        echo '<script type="text/javascript"> window.location.href="../pro/signin.php"; </script>';
    }
?>

        <div class="offcanvas offcanvas-start menu-offcanvas" tabindex="-1" id="offcanvasMobileMenu">
            <div class="mobile-menu-area">
                <div class="offcanvas-header">
                    <a class="brand-logo" href="index.html"><img class="brand-image" src="assets/images/zairito.png" alt="zairito"></a>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="menu-search-form">
                    <form>
                        <div class="search-wrap">
                            <select class="form-select">
                                <option selected="">Category</option>
                                <option value="1">Health & Beauty</option>
                                <option value="2">Women's Fashion</option>
                                <option value="3">Men's Fashion</option>
                                <option value="4">Electronic</option>
                                <option value="5">Sports </option>
                            </select>
                            <div class="form-group">
                                <input type="text" class="form-control" id="mobilesearch" name="search" placeholder="Search Here">
                                <button type="button" class="search-btn"><i class="flaticon-search"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
                <nav class="main-menu">
                    <ul class="menu-list">
                        <li class="menu-item">
                            <span class="menu-expand"></span>
                            <a class="menu-link" href="#">Home</a>
                        </li>
                        <li class="menu-item">
                            <span class="menu-expand"></span>
                            <a class="menu-link" href="#">Shop</a>
                        </li>
                        <li class="menu-item">
                            <span class="menu-expand"></span>
                            <a class="menu-link" href="#">Pages</a>
                            <ul class="sub-menu">
                                <li class="sub-menu-item"><a class="sub-menu-link" href="term-conditions.html">Term & Conditions </a></li>
                                <li class="sub-menu-item"><a class="sub-menu-link" href="privacy-policy.html">Privacy Policy</a></li>
                                <li class="sub-menu-item"><a class="sub-menu-link" href="shipping-return.html">Shipping & Return</a></li>
                                <li class="sub-menu-item"><a class="sub-menu-link" href="faq.html">Frequently Asked Questions</a></li>
                                <li class="sub-menu-item"><a class="sub-menu-link" href="refund-policy.html">Refund policy</a></li>
                                <li class="sub-menu-item"><a class="sub-menu-link" href="error.html">Error Page</a></li>
                                <li class="sub-menu-item"><a class="sub-menu-link" href="sign-in.html">Sign In</a></li>
                                <li class="sub-menu-item"><a class="sub-menu-link" href="sign-up.html">Sign Up</a></li>
                            </ul>
                        </li>
                        <li class="menu-item"><a class="menu-link" href="about-us.html">about us</a></li>
                        <li class="menu-item">
                            <span class="menu-expand"></span>
                            <a class="menu-link" href="#">Blog</a>
                            <ul class="sub-menu">
                                <li class="sub-menu-item"><a class="sub-menu-link" href="blog.html">Blog Grid</a></li>
                                <li class="sub-menu-item"><a class="sub-menu-link" href="single-blog.html">Blog Single</a></li>
                            </ul>
                        </li>
                        <li class="menu-item"><a class="menu-link" href="contact.html">Contact</a></li>
                        
                    </ul>
                </nav>
                <div class="menu-bottom">
                    <div class="switcher-lang-currency">
                        <div class="currency-switcher">
                            <span class="flag"><i class="fas fa-dollar-sign"></i></span>
                            <a href="#" class="currency">Usd <i class="fas fa-angle-down"></i></a>
                            <ul class="currency-list">
                                <li class="single-currency"><span class="flag"><i class="fas fa-dollar-sign"></i></span><a class="currency-text" href="#">Usd</a></li>
                                <li class="single-currency"><span class="flag"><i class="fas fa-rupee-sign"></i></span><a class="currency-text" href="#">Rupi</a></li>
                            </ul>
                        </div>
                        <div class="lang-switcher">
                            <span class="flag"><img src="assets/images/united-states.png" alt="united-states"></span>
                            <a href="#" class="lang">Eng <i class="fas fa-angle-down"></i></a>
                            <ul class="lang-list">
                                <li class="single-lang"><span class="flag"><img src="assets/images/united-states.png" alt="united-states"></span><a class="lang-text" href="#">Eng</a></li>
                                <li class="single-lang"><span class="flag"><img src="assets/images/india.png" alt="india"></span><a class="lang-text" href="#">Hin</a></li>
                            </ul>
                        </div>
                    </div>
                    <a class="account-btn" href="sign-in.html"><i class="user-icon flaticon-user"></i> My Account </a>
                </div>
            </div>
        </div>
        <!-- mobile-menu-area area end here  -->

        <!-- breadcrumb area start here  -->
        <div class="breadcrumb-area">
            <div class="container">
                <div class="breadcrumb-wrap text-center">
                    <h2 class="page-title">Checkout</h2>
                    <ul class="breadcrumb-pages">
                        <li class="page-item"><a class="page-item-link" href="index.html">Home</a></li>
                        <li class="page-item">Checkout</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- breadcrumb area end here  -->
                <!-- wish-list area start here  -->
                <div class="wish-list-area cart-page-area section">
            <div class="container">
                <div class="row">
                    <div class="col-12 wish-list-table">
                        
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">Product Name</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Total</th>
                                        <th scope="col">Remove</th>
                                    </tr>
                                </thead>

                                <tbody id="tbody">
                                    <?php

                                    include 'db_connect.php';
                                    $userid = $_SESSION['regid'];
                                    $qry0 = $conn->query("SELECT * FROM cart WHERE userid = '$userid' AND status = '1'");
                                    $data="";
                                    $total=0;
                                    if ($qry0->num_rows > 0) 
                                    {
                                        while($row0 = $qry0->fetch_assoc()) 
                                        {
                                            $productid=$row0['productid'];
                                            $qry = $conn->query("SELECT * FROM products WHERE product_id = '$productid' and product_status='1'");
                                            if ($qry->num_rows > 0) 
                                            {   
                                                while($row = $qry->fetch_assoc()) 
                                                {
                                                    $colid = $row0["color_id"];
                                                    $qry1=$conn->query("SELECT * FROM color_details where product_id='$productid' and color_id='$colid'"); $row1=$qry1->fetch_array();
                                                    $img=$row1["img1"];

                                                    $data .= '<tr class="cart-page-item">
                                                        <td>
                                                            <div class="single-grid-product m-0">
                                                                
                                                                <div class="product-top">
                                                                    <a href="./productpage?productid='.$productid.'"><img class="product-thumbnal" src="http://localhost/proadmin/'.$img.'" alt="cart"></a>
                                                                                                                                        <a href="./productpage?productid='.$productid.'"><img class="product-thumbnal" src="http://localhost/proadmin/'.$img.'" alt="cart"></a>

                                                                </div>

                                                                <div class="product-info text-center">
                                                                    <h4 class="product-catagory">ELLA - HALOTHEMES</h4>
                                                                    <h3 class="product-name"><a class="product-link" href="./cartedit?productid='.$productid.'&cartid='.$row0["id"].'">'.$row["p_name"].'</a></h3>
                                                                    <ul class="size-switch">';
                                                                    
                                                                        $pid = $productid;
                                                                        $sizeid = $row0["size_id"];
                                                                        $qry2=$conn->query("SELECT product_size.size, product_size.size_id FROM product_size INNER JOIN size_details ON product_size.size_id = size_details.size_id WHERE size_details.product_id='$pid' AND product_size.size_id = '$sizeid' ");
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
                                                                        $qry3=$conn->query("SELECT product_color.color,product_color.color_code,color_details.color_id FROM product_color INNER JOIN color_details ON product_color.color_id = color_details.color_id WHERE color_details.product_id='$pid' AND product_color.color_id = '$colorid'");
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
                                                                <!--<div onclick="minus('.$row0["id"].')" class="increase-btn dec qtybutton btn">-</div>-->
                                                                <input class="qty-input cart-plus-minus-box qua" type="text" name="qtybutton" value="'.$row0["quantity"].'" readonly="">
                                                                <!--<div onclick="add('.$row0["id"].')" class="increase-btn inc qtybutton btn">+</div>-->
                                                            </div>
                                                        </td>';
                                                        $total += $row["product_total"] * $row0["quantity"];
                                                        $data.='<td>
                                                            <h1 class="cart-table-item-total">₹'.$row["product_total"] * $row0["quantity"].'</h1>
                                                        </td>

                                                        <td><button onclick="deletecart('.$row0["id"].')" class="delet-btn" title="Delete Item"><img src="assets/images/close.svg" alt="close"></button></td>
                                                        </tr>';
                                                    }}}    
                                    }else{
                                        echo("<script>location.href = './emptycart.php';</script>");
                                    }
                                    echo $data;
                                    ?>
                                </tbody></table>
                        </div></div></div></div></div>
        <!-- wish-list area end here  -->

        <!-- checkout page area start here  -->
        <section class="page-content section">
            <div class="checkout">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="checkout-form">
                                <div class="payment-method">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <h2 class="checkout-title"> Shipping Address  
                                                    <a style="font-size: 12px; color:red;" href="javascript:void(0)" class="edite-btn" onclick="showForm()"> <i class="icon fas fa-edit"></i>Edit</a>
                                                
                                                </h2>
                                            </div>
                                            

                                            <div class="col-lg-12">
                                                <?php
                                                    $qryaddr = $conn->query("SELECT * FROM useraddress WHERE regid = '$userid' AND status = '1'");
                                                    if ($qryaddr->num_rows > 0) 
                                                    {   
                                                        while($rowaddr = $qryaddr->fetch_assoc()) 
                                                        {
                                                            $cityid = $rowaddr['cityid'];
                                                            $districtid = $rowaddr['disctrictid'];
                                                            $stateid = $rowaddr['stateid'];
                                                            $qrycity = $conn->query("SELECT city_name FROM city WHERE city_id = '$cityid'");$rowcity = $qrycity->fetch_assoc();
                                                            $qrydistrict = $conn->query("SELECT district_name FROM district WHERE district_id = '$districtid'");$rowdistrict = $qrydistrict->fetch_assoc();
                                                            $qrystate = $conn->query("SELECT state_name FROM states WHERE state_id = '$stateid'");$rowstate = $qrystate->fetch_assoc();

                                                            $str = $rowaddr['name'].','.$rowaddr['hname'].','.$rowcity['city_name'].','.$rowdistrict['district_name'].','.$rowstate['state_name'].','.$rowaddr['pin'];

                                                            echo '<div style="margin:0px;" class="form-group" data-id='.$rowaddr['id'].'>
                                                                    <div class="form-check card-check">
                                                                        <input class="form-check-input" type="radio" name="card" id="lol" value="'.$str.'" checked>
                                                                        <label class="form-check-label" for="paypal">'.$str.'</label> 
                                                                    </div>
                                                                    
                                                                    <div style="text-align: right;">
                                                                        <a style="font-size: 12px; color:red;" href="javascript:void(0)" class="edite-btn" onclick="editaddr(this)"> <i class="icon fas fa-edit"></i>Edit</a>
                                                                    </div>
                                                            </div>';
                                                            
                                                            echo '';

                                                        }
                                                    }
                                                ?>
                                                

                                                <div class="form-group">
                                                    <div class="form-check card-check">
                                                        <input class="form-check-input" type="radio" name="card" id="creditcard" value="creditcard" >
                                                        
                                                        <label class="form-check-label" for="creditcard"> Add New Address</label>
                                                        <div class="input-icon">
                                                            <img src="assets/images/payment-method.png" alt="payment-method">
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Add address -->
                                                <form action="" id="addaddress" onsubmit="return validateForm()">
                                                    <div class="card-infor-box" style="display: none;">
                                                        <div class="row">
                                                        <div class="col-lg-12">
                                                            <h4 class="checkout-title">Add Address</h4>
                                                        </div>
                                                        
                                                            <div class="col-lg-12">
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-12">
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Mobile Number" required>
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-12">
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control" id="street-address" name="streetaddress" placeholder="Street Address" required>
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="col-lg-6">
                                                                <select class="form-select" id="state" name="state" placeholder="State" required>
                                                                    <!-- <option>State</option>; -->
                                                                    
                                                                    <?php 
                                                                        $state = $conn->query("SELECT * FROM states where status = 1");
                                                                        if ($state->num_rows > 0) 
                                                                        {   
                                                                            while($row5 = $state->fetch_assoc()) 
                                                                            {
                                                                                echo '<option value='.$row5['state_id'].'>'.$row5['state_name'].'</option>';
                                                                            }
                                                                        }

                                                                    ?>
                                                                
                                                                </select>
                                                        
                                                            </div>

                                                            <div class="col-lg-6">
                                                                <select class="form-select" id="district" name="district" placeholder="District" required>
                                                                <!-- <option>District</option>; -->
                                                                    
                                                                                                                              
                                                                    <?php 
                                                                        $state = $conn->query("SELECT * FROM states where status = 1");
                                                                        if ($state->num_rows > 0) 
                                                                        {   
                                                                            while($row5 = $state->fetch_assoc()) 
                                                                            {
                                                                                $s=$row5['state_id'];
                                                                                $district = $conn->query("SELECT * FROM district where status = 1 and state_id=$s");
                                                                                if ($district->num_rows > 0) 
                                                                                {   
                                                                                    while($row6 = $district->fetch_assoc()) 
                                                                                    {
                                                                                        echo '<option value='.$row6['district_id'].'>'.$row6['district_name'].'</option>';
                                                                                    }
                                                                                }
                                                                                // echo '<option value='.$row5['state_id'].'>'.$row5['state_name'].'</option>';
                                                                            }
                                                                        }

                                                                    ?>
                                                                </select>
                                                            </div>

                                                            <div class="col-lg-6 mt-4">
                                                                <select class="form-select" id="city" name="city" placeholder="City" required>
                                                                    <!-- <option>City</option> -->

                                                                    <?php 
                                                                        $district = $conn->query("SELECT * FROM district where status = 1");
                                                                        if ($district->num_rows > 0) 
                                                                        {   
                                                                            while($row5 = $district->fetch_assoc()) 
                                                                            {
                                                                                $s=$row5['district_id'];
                                                                                $city = $conn->query("SELECT * FROM city where status = 1 and district_id=$s");
                                                                                if ($city->num_rows > 0) 
                                                                                {   
                                                                                    while($row6 = $city->fetch_assoc()) 
                                                                                    {
                                                                                        echo '<option value='.$row6['city_id'].'>'.$row6['city_name'].'</option>';
                                                                                    }
                                                                                }
                                                                                // echo '<option value='.$row5['state_id'].'>'.$row5['state_name'].'</option>';
                                                                            }
                                                                        }

                                                                    ?>
                                                                    </select>
                                                            </div>
        
                                                            <div class="col-lg-6  mt-4">
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control" id="zipcode" name="zipcode" placeholder="Zip/Postal Code" required>
                                                                </div>
                                                            </div>
                                                            
                                                            <button type="submit" class="checkout-btn form-btn">Add Address</button>
                                                            </div>
                                                        
                                                    </div>
                                                </form>
                                            </div></div>
                                    </div><!-- Discount -->
                                    <div class="payment-method">
                                        <div class="row">
                                            <form>
                                                <div class="col-lg-12">
                                                    <h2 class="checkout-title">Discount Codes  
                                                        <a style="font-size: 15px;color:#0D7862;" href="javascript:void(0)" class="edite-btn" onclick="showcoupon()">View Coupons</a>
                                                    </h2>   
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <input id="couponcode" type="text" class="form-control" name="coupon_code" placeholder="Enter your coupon code">
                                                    </div>
                                                </div>
                                                <button id="couponapply" onclick="couponadd(this)" type="button" class="checkout-btn form-btn">Apply Coupon</button>
                                                <button id="couponremove" onclick="couponrem(this)" type="button" class="checkout-btn form-btn ">Remove Coupon</button>
                                            </form>
                                        </div>
                                    </div> </div>
                        </div>
                        
                        <div class="col-lg-6 col-md-6">
                            <div style="margin-top: 3.5rem" class="cart-summary">
                                <div class="summary-top d-flex">
                                    <h2>Cart Summary</h2>
                                    <a class="edite-btn" href="cart.php">Edit</a>
                                </div>
                                <ul class="cart-product-list">
                                    
                                    <?php 
                                    $userid = $_SESSION['regid'];
                                    $qry0 = $conn->query("SELECT * FROM cart WHERE userid = '$userid' AND status = '1'");
                                    $data="";
                                    if ($qry0->num_rows > 0) 
                                    {
                                        while($row0 = $qry0->fetch_assoc()) 
                                        {
                                            $productid=$row0['productid'];
                                            $qry = $conn->query("SELECT * FROM products WHERE product_id = '$productid' and product_status='1'");
                                            if ($qry->num_rows > 0) 
                                            {   
                                                while($row = $qry->fetch_assoc()) 
                                                {  $sizeid = $row0["size_id"];
                                                    $qry2=$conn->query("SELECT product_size.size, product_size.size_id FROM product_size INNER JOIN size_details ON product_size.size_id = size_details.size_id WHERE size_details.product_id='$productid' AND product_size.size_id = '$sizeid' ");$row2=$qry2->fetch_array();
                                                    $size = $row2["size"];

                                                    $colorid = $row0["color_id"];
                                                    $qry3=$conn->query("SELECT product_color.color,product_color.color_code,color_details.color_id FROM product_color INNER JOIN color_details ON product_color.color_id = color_details.color_id WHERE color_details.product_id='$productid' AND product_color.color_id = '$colorid'");$row3=$qry3->fetch_array();
                                                    $color = $row3["color"];

                                                    echo '<li class="single-cart-product d-flex justify-content-between">
                                                            <div class="product-info">
                                                                <h3>'.$row0["quantity"].' x '.$row["p_name"].'</h3>
                                                                <p>Size: '.$size.', Color: '.$color.'</p>
                                                                <p>P. Code: '.$productid.'</p>
                                                            </div>
                                                            <div class="price-area">
                                                                <h3 class="price">₹'.sprintf("%.2f",$row0["quantity"]*$row["product_total"]).'</h3>
                                                            </div>
                                                        </li>';
                                                }
                                            }
                                        }
                                    }
                                    ?></ul>
                                <ul class="summary-list">
                                    <li>Subtotal <span>₹<?php echo sprintf("%.2f", $total);?></span></li>
                                    <!-- <li>Shipping Cost <span>₹15.50</span></li> -->
                                    <li>Coupon Discount <span id="coupondisc">₹0.00</span></li>
                                    <!-- <li>VAT/Tax 15% <span>₹20.00</span></li> -->
                                </ul>
                                <div class="total-amount">
                                    <h3>Total Cost <span id="totalamt" class="float-right">₹<?php echo sprintf("%.2f", $total);?></span></h3>
                                </div>
                                </div><div class="payment-method">
                                <form id="checkout-selection" action="./payment-gateway/pay.php" method="POST">
                                    <input type="hidden" name="item_name" value="My Test Product">
                                    <input type="hidden" name="item_description" value="My Test Product Description">
                                    <input type="hidden" name="item_number" value="3456">
                                    <input type="hidden" name="discount" value="0">
                                    <input type="hidden" name="amount" value="<?php echo sprintf("%.2f", $total);?>">
                                    <input type="hidden" name="address" value="ABCD Address">
                                    <input type="hidden" name="currency" value="INR">	
                                    <input type="hidden" name="cust_name" value="<?php echo $_SESSION["username"]?>">								
                                    <input type="hidden" name="email" value="">	
                                    <input type="hidden" name="contact" value="<?php echo $_SESSION['regmob']?>">	
                                    <div class="row">
                                        <input style="margin-left: .4em;" type="submit" class="primary-btn" value="CheckOut">
                                    </div>
                                </form>
                                </div>
                        </div></div>
                </div>
            </div>
        </section>
        <!-- checkout page area end here  -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            function showcoupon(){

                $.ajax({
                    url: "ajax.php?action=showcoupon", 
                    type: "POST",
                    data: {          
                        
                    },
                    //cache: false,
                    success: function(result){
                        Swal.fire({
                            title: result,
                            width: 600

                        })}
                });}
            
        </script>
                                    
        <script type="text/javascript">
        
        function removeaddr(){
            alert("Remove addr");
        }

        function editaddr(e){
            const form = `
            <form action="" id="addaddress" onsubmit="return validateForm()">
                                                    <div class="card-infor-box">
                                                        <div class="row">
                                                        <div class="col-lg-12">
                                                            <h4 class="checkout-title">Add Address</h4>
                                                        </div>
                                                        
                                                            <div class="col-lg-12">
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-12">
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Mobile Number" required>
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-12">
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control" id="street-address" name="streetaddress" placeholder="Street Address" required>
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="col-lg-6">
                                                                <select class="form-select" id="state" name="state" placeholder="State" required>
                                                                    <!-- <option>State</option>; -->
                                                                    
                                                                    <?php 
                                                                        $state = $conn->query("SELECT * FROM states where status = 1");
                                                                        if ($state->num_rows > 0) 
                                                                        {   
                                                                            while($row5 = $state->fetch_assoc()) 
                                                                            {
                                                                                echo '<option value='.$row5['state_id'].'>'.$row5['state_name'].'</option>';
                                                                            }
                                                                        }

                                                                    ?>
                                                                
                                                                </select>
                                                        
                                                            </div>

                                                            <div class="col-lg-6">
                                                                <select class="form-select" id="district" name="district" placeholder="District" required>
                                                                <!-- <option>District</option>; -->
                                                                    
                                                                                                                              
                                                                    <?php 
                                                                        $state = $conn->query("SELECT * FROM states where status = 1");
                                                                        if ($state->num_rows > 0) 
                                                                        {   
                                                                            while($row5 = $state->fetch_assoc()) 
                                                                            {
                                                                                $s=$row5['state_id'];
                                                                                $district = $conn->query("SELECT * FROM district where status = 1 and state_id=$s");
                                                                                if ($district->num_rows > 0) 
                                                                                {   
                                                                                    while($row6 = $district->fetch_assoc()) 
                                                                                    {
                                                                                        echo '<option value='.$row6['district_id'].'>'.$row6['district_name'].'</option>';
                                                                                    }
                                                                                }
                                                                                // echo '<option value='.$row5['state_id'].'>'.$row5['state_name'].'</option>';
                                                                            }
                                                                        }

                                                                    ?>
                                                                </select>
                                                            </div>

                                                            <div class="col-lg-6 mt-4">
                                                                <select class="form-select" id="city" name="city" placeholder="City" required>
                                                                    <!-- <option>City</option> -->

                                                                    <?php 
                                                                        $district = $conn->query("SELECT * FROM district where status = 1");
                                                                        if ($district->num_rows > 0) 
                                                                        {   
                                                                            while($row5 = $district->fetch_assoc()) 
                                                                            {
                                                                                $s=$row5['district_id'];
                                                                                $city = $conn->query("SELECT * FROM city where status = 1 and district_id=$s");
                                                                                if ($city->num_rows > 0) 
                                                                                {   
                                                                                    while($row6 = $city->fetch_assoc()) 
                                                                                    {
                                                                                        echo '<option value='.$row6['city_id'].'>'.$row6['city_name'].'</option>';
                                                                                    }
                                                                                }
                                                                                // echo '<option value='.$row5['state_id'].'>'.$row5['state_name'].'</option>';
                                                                            }
                                                                        }

                                                                    ?>
                                                                    </select>
                                                            </div>
        
                                                            <div class="col-lg-6  mt-4">
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control" id="zipcode" name="zipcode" placeholder="Zip/Postal Code" required>
                                                                </div>
                                                            </div>
                                                            
                                                            </div>
                                                        
                                                    </div>
                                                </form>
                `;

            Swal.fire({
            title: "Enter your details",
            width:600,
            height:900,
            html: form,
            showCancelButton: true,
            confirmButtonText: "Submit",
            preConfirm: () => {
                const name = document.getElementById("name").value;
                const email = document.getElementById("email").value;
                return { name, email };
            },
            }).then((result) => {
            if (result.value) {
                Swal.fire(`Name: ${result.value.name}\nEmail: ${result.value.email}`);
            }
            });

            console.log(e.parentElement.parentElement);
        }

        $(".card-check").on('click', function(a){console.log(a.target.previousElementSibling.click())})

        function validateForm(){
            return false;   
        }

        $("#couponremove").hide();
        document.querySelector('input[name="address"]').value=document.querySelector('input[name="card"]:checked').value;
            function add(e){

                $.ajax({
                    url: "ajax.php?action=addquantity", 
                    type: "POST",
                    data: {          
                        cartid : e 
                    },
                    //cache: false,
                    success: function(result){
                        location.reload();                  
                    }
                });}

            function minus(e){
               
                $.ajax({
                    url: "ajax.php?action=removequantity", 
                    type: "POST",
                    data: {          
                      cartid : e     
                    },
                    //cache: false,
                    success: function(result){
                        location.reload();         
                        
                    }
                });}

            function deletecart(e){
               
               $.ajax({
                   url: "ajax.php?action=deletecartitem", 
                   type: "POST",
                   data: {          
                     cartid : e     
                   },
                   //cache: false,
                   success: function(result){
                    Swal.fire({
                                        position: 'center',
                                        icon: 'success',
                                        title: "Item Deleted!",
                                        // text: "Message!",
                                        // showConfirmButton: false,
                                        type: "success"
                                        
                                    }).then(function() {
                                        location.reload(); 
                                     
                                    });}
               });}
            $('#state').on('change', function() {
                $.ajax({
                        url: "ajax.php?action=districtslist", 
                        type: "POST",
                        data: {
                            state_id: $(this).val()
                        },
                    //cache: false,
                    success: function(result){   
                        $("#district").html(result); 
                    }
                });}); 

            $('#district').on('change', function() {
                $.ajax({
                        url: "ajax.php?action=citylist", 
                        type: "POST",
                        data: {
                            district_id: $(this).val()
                        },
                    //cache: false,
                    success: function(result){   
                        $("#city").html(result); 
                    }
                });
            }); 

            $('#addaddress').submit(function(e) {
                e.preventDefault();

                var nameRegex = /^[a-zA-Z]+$/;
                var adrsname = $("#name").val(); 
                alert(adrsname);
                if(!nameRegex.test(adrsname)){
       
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Name Should be in Alphabetic Letters only..'
                        });

                    return;
                }
                else if(adrsname===''){

                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Name Cannot Be Blank!!'
                        });

                    return;
                }
                

                const phoneNumberPattern = /^\d{10}$/;
                var adrsphn = $("#mobile").val(); 
                if(!phoneNumberPattern.test(adrsphn)){
         

                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Mobile Number Should be Valid.'
                        });

                    return;
                }
                else if(adrsphn===''){
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Mobile Number Cannot Be Blank!!'
                        });

                    return;
                }
                

                $.ajax({
                    type: "POST",
                    url: 'ajax.php?action=addaddress',
                    data: $(this).serialize(),
                    success: function(response)
                    { Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Address Added!',
                            showConfirmButton: false,
                            timer: 1500
                            }).then(function() {
                                        location.reload(); 
                                });   
                        }});
            }); 

           function couponadd(e){

                $.ajax({
                    type: "POST",
                    url: 'ajax.php?action=couponcheck',
                    data: {
                        couponcode:$("#couponcode").val(),
                        total : <?php echo $total ?>
                    },
                    success: function(response)
                    {
                            //document.write(response);
                            console.log(typeof(parseInt(response)));
                            if(response==5){
                                alert("Coupon Not Valid");
                                $("#couponcode").val("");
                                
                                $("#coupondisc").html("₹0.00");
                                
                                $("#totalamt").html("₹"+<?php echo $total ?>+".00");
                              
                                document.querySelector('input[name="discount"]').value = 0
                            }else{
                                
                                $("#couponcode").prop('disabled', true);
                                $(e).hide();
                                $("#couponremove").show();
                                var discount = <?php echo $total?>;
                                console.log(typeof(discount));
                                $("#coupondisc").html("₹"+response.trim()+".00");
                                var discount = discount-parseInt(response.trim());
                                $("#totalamt").html("₹"+discount.toString()+".00")
                                document.querySelector('input[name="discount"]').value = parseInt(response.trim());
                            }
                        
                        }
                    });};

            function couponrem(e){
                    $("#couponcode").val("");
                    $("#couponcode").prop('disabled', false);
                    $(e).hide();
                    $("#couponapply").show();
                    $("#coupondisc").html("₹0.00");
                    $("#totalamt").html("₹"+<?php echo $total ?>+".00");  
                    document.querySelector('input[name="discount"]').value = 0        
            } 
        </script>
        <?php include './footer.php' ?>