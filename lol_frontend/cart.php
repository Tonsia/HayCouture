<?php include 'header.php' ;
    if(!isset($_SESSION['regid'])){
        echo '<script type="text/javascript"> window.location.href="../pro/signin.php"; </script>';
    }
?>

        <!-- mobile-menu-area area start here  -->
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
                            <ul class="sub-menu">
                                <li class="sub-menu-item"><a class="sub-menu-link" href="index.html">Home One</a></li>
                                <li class="sub-menu-item"><a class="sub-menu-link" href="index2.html">Home Two</a></li>
                                <li class="sub-menu-item"><a class="sub-menu-link" href="index3.html">Home Three</a></li>
                            </ul>
                        </li>
                        <li class="menu-item">
                            <span class="menu-expand"></span>
                            <a class="menu-link" href="#">Shop</a>
                            <ul class="sub-menu">
                                <li class="sub-menu-item"><a class="sub-menu-title" href="#">Shop Layout</a></li>
                                <li class="sub-menu-item"><a class="sub-menu-link" href="shop-grid-left-sidebar.html">Shop Grid Leftsidebar <span class="menu-item-badge new">New</span></a></li>
                                <li class="sub-menu-item"><a class="sub-menu-link" href="shop-grid-right-sidebar.html">Shop Grid Rightsidebar </a></li>
                                <li class="sub-menu-item"><a class="sub-menu-link" href="shop-grid.html">Shop Grid No Sidebar <span class="menu-item-badge trending">Trending</span></a></li>
                                <li class="sub-menu-item"><a class="sub-menu-link" href="shop-list-left-sidebar.html">Shop List Leftsidebar</a></li>
                                <li class="sub-menu-item"><a class="sub-menu-link" href="shop-list-right-sidebar.html">Shop List Rightsidebar</a></li>
                                <li class="sub-menu-item"><a class="sub-menu-link" href="shop-list.html">Shop List No Sidebar</a></li>
                                <li class="sub-menu-item"><a class="sub-menu-title" href="#">List Layout & Others</a></li>
                                <li class="sub-menu-item"><a class="sub-menu-link" href="single-product.html">Product Single 1</a></li>
                                <li class="sub-menu-item"><a class="sub-menu-link" href="single-product-v2.html">Product Single 2</a></li>
                                <li class="sub-menu-item"><a class="sub-menu-link" href="single-product-v3.html">Product Single 3</a></li>
                                <li class="sub-menu-item"><a class="sub-menu-link" href="cart.html">Cart Page</a></li>
                                <li class="sub-menu-item"><a class="sub-menu-link" href="checkout.html">Checkout Page</a></li>
                                <li class="sub-menu-item"><a class="sub-menu-link" href="compare.html">Compare</a></li>
                                <li class="sub-menu-item"><a class="sub-menu-link" href="wish-list.html">Wishlist</a></li>
                                <li class="sub-menu-item"><a class="sub-menu-link" href="empty-wish-list.html">Empty Wishlist</a></li>
                            </ul>
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

        <!-- Cart Offcanvas Sidebar Menu area Start here  -->
        <div class="offcanvas offcanvas-end" tabindex="-1" id="cartOffcanvasSidebar" aria-labelledby="cartOffcanvasSidebarLabel">
            <div class="offcanvas-header">
              <h5 class="offcanvas-title" id="cartOffcanvasSidebarLabel">Shopping Cart</h5>
              <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">

                <div class="cart-product-list">

                    <!-- Product item start -->
                    <div class="product-item cart-product-item">
                        <div class="single-grid-product">
                            <div class="product-top">
                                <a href="single-product.html"><img class="product-thumbnal" src="assets/images/cart-sidebar-img1.png" alt="cart"></a>
                            </div>
                            <div class="product-info">
                                <div class="product-name-part">
                                    <h4 class="product-catagory">ELLA - HALOTHEMES</h4>
                                    <h3 class="product-name"><a class="product-link" href="single-product.html">Premier Cropped Jean</a></h3>

                                    <div class="cart-quantity input-group">
                                        <div class="increase-btn dec qtybutton btn">-</div>
                                        <input class="qty-input cart-plus-minus-box" type="text" name="qtybutton" value="1" readonly="" min="1">
                                        <div class="increase-btn inc qtybutton btn">+</div>
                                    </div>

                                    <button class="cart-remove-btn">Remove</button>
                                </div>
                                <div class="product-price">
                                    <span class="regular-price">$220.08</span>
                                    <span class="price">$150.08</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Product item end -->

                    <!-- Product item start -->
                    <div class="product-item cart-product-item">
                        <div class="single-grid-product">
                            <div class="product-top">
                                <a href="single-product.html"><img class="product-thumbnal" src="assets/images/cart-sidebar-img2.png" alt="cart"></a>
                            </div>
                            <div class="product-info">
                                <div class="product-name-part">
                                    <h4 class="product-catagory">New - Collections</h4>
                                    <h3 class="product-name"><a class="product-link" href="single-product.html">Premier Bag Jean</a></h3>

                                    <div class="cart-quantity input-group">
                                        <div class="increase-btn dec qtybutton btn">-</div>
                                        <input class="qty-input cart-plus-minus-box" type="text" name="qtybutton" value="1" readonly="">
                                        <div class="increase-btn inc qtybutton btn">+</div>
                                    </div>

                                    <button class="cart-remove-btn">Remove</button>
                                </div>
                                <div class="product-price">
                                    <span class="regular-price">$215.08</span>
                                    <span class="price">$150.08</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Product item end -->
                </div>

                <div class="total-bottom-part">
                    <div class="total-count d-flex">
                        <h3>Total</h3>
                        <h4>$567.00</h4>
                    </div>
                    <a href="checkout.html" class="proceed-to-btn d-block text-center">
                        Proceed To Checkout
                    </a>
                    <div class="view-cart-go">
                        <a href="cart.html">View Cart</a>
                    </div>
                </div>

            </div>
          </div>
        <!-- Cart Offcanvas Sidebar Menu area end here  -->

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
                                                                <a href="single-product.html"><img class="product-thumbnal" src="http://localhost/proadmin/'.$img.'" alt="cart"></a>
                                                                
                                                            </div>

                                                            <div class="product-info text-center">
                                                                <h4 class="product-catagory">ELLA - HAYCOUTURE</h4>
                                                                <h3 class="product-name"><a class="product-link" href="cartedit?productid='.$row["product_id"].'&cartid='.$row0["id"].'">'.$row["p_name"].'</a></h3>
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
                                                                    //echo $colorid;
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
                                                        <!--<div class="cart-quantity input-group">
                                                            <div onclick="minus('.$row0["id"].')" class="increase-btn dec qtybutton btn">-</div>
                                                            <input class="qty-input cart-plus-minus-box qua" type="number" name="qtybutton" value="'.$row0["quantity"].'" readonly="" min="1">
                                                            <div onclick="add('.$row0["id"].')" class="increase-btn inc qtybutton btn">+</div>
                                                        </div>-->
                                                    <div class="cart-quantity input-group">
                                                        <div onclick="minus('.$row0["id"].')" class="increase-btn dec qtybutton btn">-</div>
                                                        <input value="'.$row0["quantity"].'" class="qty-input cart-plus-minus-box qua" type="number" name="qtybutton"  readonly="" min="1">
                                                        <div onclick="add('.$row0["id"].',this)" class="increase-btn inc qtybutton btn">+</div>
                                                    </div>


                                                    </td>';
                                                    $total += $row["product_total"] * $row0["quantity"];
                                                    $data.='<td>
                                                        <h1 class="cart-table-item-total">₹'.$row["product_total"] * $row0["quantity"].'</h1>
                                                    </td>

                                                    <td><button onclick="deletecart('.$row0["id"].')" class="delet-btn" title="Delete Item"><img src="assets/images/close.svg" alt="close"></button></td>
                                                    </tr>';



                                            }
                                        }
                                    }    
                                }else{
                                    echo("<script>location.href = './emptycart.php';</script>");
                                }
                                echo $data;
                                ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>






                <!-- Cart Page Bottom box area Start -->
                <div class="row cart-page-bottom-box-wrap d-flex justify-content-end">

                   


                    <!-- Cart page bottom box -->
                    <div class="col-12 col-sm-12 col-md-12 col-lg-4">
                        <div class="cart-page-bottom-box cart-page-sub-total-box">
                            
                            <div class="sub-total-inner-box d-flex justify-content-between align-items-center">
                                <h2 class="bottom-box-title m-0">Subtotal :</h2>
                                <h2 class="bottom-box-title m-0">₹<?php echo sprintf("%.2f", $total);?></h2>
                            </div>

                            <div class="sub-total-inner-box d-flex justify-content-between align-items-center">
                                <div class="cart-inner-shipping-title">
                                    <span>Shipping</span>
                                    <!-- <p class="shipping-state m-0">Shipping to United States</p> -->
                                </div>
                                <h2 class="bottom-box-title m-0">₹0.00</h2>
                            </div>

                            <div class="sub-total-inner-box d-flex justify-content-between align-items-center">
                                <h2 class="bottom-box-title m-0">Total</h2>
                                <h2 class="bottom-box-title cart-page-final-total m-0">₹<?php echo sprintf("%.2f", $total);?></h2>
                            </div>
                                
                            <div class="form-button text-center">
                                <a href="checkout.php" class="form-btn proceed-to-checkout-btn">Proceed To Checkout</a>
                            </div>
                        </div>
                    </div>
                    <!-- Cart page bottom box -->

                </div>
                <!-- Cart Page Bottom box area End -->

            </div>
        </div>
        <!-- wish-list area end here  -->
        
        <script type="text/javascript">



            function add(e,a){


                console.log(a.previousElementSibling.value);
                var limit = 0;
                $.ajax({
                    url: 'ajax.php?action=stockcheckbasedoncartid',
                    type: 'post',
                    data: {
                       cartid:e
                    },
                    success: function(response){
                        if(a.previousElementSibling.value>response){
                            a.previousElementSibling.value = a.previousElementSibling.value - 1;
                            console.log(limit)
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Only '+response+' Products Remaining...',
                                })
                        }else{
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
                            });
                        }
                    }               
                });



            }

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
                });
            }

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
                                        // window.location = "couponsList.php";
                                    });

                    // location.reload(); 
                }
                });
            }

        </script>
<?php include './footer.php' ?>