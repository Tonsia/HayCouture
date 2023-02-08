<?php include 'header.php';
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
                        <!-- <li class="menu-item"><a class="menu-link" href="shop-grid.html">Shop</a></li> -->
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
                                        <input class="qty-input cart-plus-minus-box" type="text" name="qtybutton" value="1" readonly="">
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

        <!-- breadcrumb area start here  -->
        <div class="breadcrumb-area">
            <div class="container">
                <div class="breadcrumb-wrap text-center">
                    <h2 class="page-title">My Orders</h2>
                    <ul class="breadcrumb-pages">
                        <li class="page-item"><a class="page-item-link" href="index.html">Home</a></li>
                        <li class="page-item">My Orders</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- breadcrumb area end here  -->

        <!-- wish-list area start here  -->
        <div class="wish-list-area section">
            <div class="container">
                <div class="row">
                    
                <div class="col-12 wish-list-table">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                              <tr>
                              <th scope="col">No</th>
                                <th scope="col">Image</th>
                                <th scope="col">Product Information</th>
                                <th scope="col">Price</th>
                                <th scope="col">Cancel</th>
                              </tr>
                            </thead>
                            <tbody>
                                <?php
                                    include 'db_connect.php';
                                    $userid = $_SESSION['regid'];
                                    // custom order
                                    $qryc = $conn->query("SELECT * FROM customorder WHERE userid = '$userid' and paymentid != 'Pending' ORDER BY created desc");
                                    if ($qryc->num_rows > 0) 
                                    {
                                        $i=1;
                                        while($rowc = $qryc->fetch_assoc()) 
                                        {
                                            $stat='';
                                            $stat2='';
                                            $status = $rowc['status'];
                                            
                                            if($status==3){
                                                $stat = '<button class="btn btn-secondary btn-lg m-5" title="Processing" disabled>Processing</button>';
                                            }else if($status==5){
                                                $stat = '<button class="btn btn-success btn-lg m-2" title="Delivered">Delivered</button>';

                                            }
                                            else if($status==1){
                                                $stat = '<button class="btn btn-warning btn-lg m-5" title="Delete Item" disabled>Order Placed</button>';
                                            }
                                            else if($status==2){
                                                $stat = '<button class="btn btn-warning btn-lg m-5" title="Delete Item" disabled>Pending</button>';
                                            }
                                            else if($status==4){
                                                $stat = '<button class="btn btn-info btn-lg m-5" title="Delete Item" disabled>Shipped</button>';
                                            }
                                            else if($status==9){
                                                $stat = '<button class="btn btn-danger btn-lg m-5" title="Delete Item" disabled>Returned</button>';
                                            }
                                            else if($status==6){
                                                $stat = '<button class="btn btn-danger btn-lg m-5" title="Delete Item" disabled>Rejected</button>';
                                            }

                                            
                                            echo '<tr>
                                                <td>
                                                    <div class="action-area">
                                                        '.$i++.'
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="product-image">
                                                        <a><img class="product-thumbnal" src="http://localhost/lol_frontend/assets/custom-order.jpg" alt="product"></a>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="product-info text-center">
                                                        <h4 class="product-catagory">Product ID : '.$rowc['uniqueid'].'</h4>
                                                        <h3 class="product-name"><a class="product-link"">Custom Product</a></h3>
                                                        <h4 class="">Neckline : '.$rowc["neckline"].'</h4>
                                                        <h4 class="">Sleeve : '.$rowc["sleeve"].'</h4>
                                                        <h4 class="">Bottom : '.$rowc["bottom"].'</h4>
                                                        <h4 class="">Size : '.$rowc["size"].'</h4>
                                                        <h4 class="">Payment ID : '.$rowc["paymentid"].'</h4>
                                                        <h4 class="">Order Date : '.$rowc["created"].'</h4>
                                                        
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="product-price text-center">
                                                        <h3 class="price">₹'.$rowc["amount"].'</h3>
                                                    </div>
                                                </td>
                                                <td>
                                                    '.$stat.'
                                                    <br>
                                                    '.$stat2.'
                                                </td>
                                               
                                            </tr>';
                                        }
                                    }

                                    // regular order
                                    $qry0 = $conn->query("SELECT * FROM orders WHERE userid = '$userid' AND status = '1' ORDER BY createdtime desc");
                                    if ($qry0->num_rows > 0) 
                                    {
                                        //$i=1;
                                        while($row0 = $qry0->fetch_assoc()) 
                                        {
                                            $cartid = $row0["cartid"];
                                            $qry1 = $conn->query("SELECT * FROM cart WHERE id = '$cartid'");$row1 = $qry1->fetch_assoc();
                                            $status = $row1['status'];
                                            $productid = $row1["productid"];
                                            $size_id = $row1["size_id"];
                                            $color_id = $row1["color_id"];
                                            $quantity = $row1["quantity"];
                                            $qry2=$conn->query("SELECT * FROM product_color where color_id ='$color_id'"); $row2=$qry2->fetch_array();
                                            $qry3=$conn->query("SELECT * FROM product_size where size_id ='$size_id'"); $row3=$qry3->fetch_array();
                                            $qry4=$conn->query("SELECT * FROM products where product_id  ='$productid'"); $row4=$qry4->fetch_array();
                                            $qry5=$conn->query("SELECT * FROM color_details where product_id='$productid' AND color_id='$color_id'"); $row5=$qry5->fetch_array();

                                            if($status==3){
                                                $stat = '<button class="btn btn-secondary btn-lg m-5" title="Processing" disabled>Processing</button>';
                                                $stat2 = '<button class="delet-btn" title="Delete Item"><img src="assets/images/close.svg" alt="close"></button>';
                                            }else if($status==5){
                                                $stat = '<button class="btn btn-success btn-lg m-2" title="Delivered">Delivered</button>';
                                                $stat2 = '<button onclick="reviewfn('."'".$productid."'".')" class="btn btn-outline-secondary btn-lg m-2" title="Delivered">Write A Review</button><br>
                                                 <button id="b7" onclick="returnorder('."'".$productid."'".')" class=" return btn btn-outline-danger btn-lg m-2" title="Delivered">Return Order</button>';
                                                // <button id="b7" onclick="returnorder('."'".$productid."'".')" class=" return btn btn-outline-danger btn-lg m-2" title="Delivered">Return Order</button>';

                                            }
                                            else if($status==2){
                                                $stat = '<button class="btn btn-warning btn-lg m-5" title="Delete Item" disabled>Pending</button>';
                                                $stat2 = '<button class="delet-btn" title="Delete Item"><img src="assets/images/close.svg" alt="close"></button>';
                                            }
                                            else if($status==4){
                                                $stat = '<button class="btn btn-info btn-lg m-5" title="Delete Item" disabled>Shipped</button>';
                                                $stat2 = '<button class="delet-btn" title="Delete Item"><img src="assets/images/close.svg" alt="close"></button>';
                                            }
                                            else if($status==9){
                                                $stat = '<button class="btn btn-danger btn-lg m-5" title="Delete Item" disabled>Returned</button>';
                                                $stat2 = '';
                                            }
                                            else if($status==6){
                                                $stat = '<button class="btn btn-danger btn-lg m-5" title="Delete Item" disabled>Rejected</button>';
                                                $stat2 = '';
                                            }

                                            echo '<tr>
                                                <td>
                                                    <div class="action-area">
                                                        '.$i++.'
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="product-image">
                                                        <a href="./productpage?productid='.$productid.'"><img class="product-thumbnal" src="http://localhost/proadmin/'.$row5["img1"].'" alt="product"></a>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="product-info text-center">
                                                        <h4 class="product-catagory">Product ID : '.$productid.'</h4>
                                                        <h3 class="product-name"><a class="product-link" href="./productpage?productid='.$productid.'">'.$row4["p_name"].'</a></h3>
                                                        <h4 class="">Color : '.$row2["color"].'</h4>
                                                        <h4 class="">Size : '.$row3["size"].'</h4>
                                                        <h4 class="">Quantity : '.$quantity.'</h4>
                                                        <h4 class="">Order ID : '.$row0["paymentid"].'</h4>
                                                        <h4 class="">Order Date : '.$row0["createdtime"].'</h4>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="product-price text-center">
                                                        <h3 class="price">₹'.$row4["product_total"]*$quantity.'</h3>
                                                    </div>
                                                </td>
                                                
                                                <td>
                                                    '.$stat.'
                                                    <br>
                                                    '.$stat2.'
                                                </td>
                                            </tr>';
                                           
                                        }
                                    }
                                ?>
                                

                            </tbody>
                        </table>
                    </div>
                </div>
                </div>
            </div>
        </div>
        <!-- wish-list area end here  -->
<div id="review_modal" class="modal h-full" tabindex="-1" role="dialog" style="height: 100%;">
  	<div class="modal-dialog" role="document">
    	<div class="modal-content">
	      	<div class="modal-header">
	        	<h2 class="modal-title">Submit Review</h2>
	        	<!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          		<span aria-hidden="true">&times;</span>
	        	</button> -->
                <button onclick="closefn()" class="btn" title="Delete Item"><img src="assets/images/close.svg" alt="close"></button>
	      	</div>
	      	<div class="modal-body">
	      		<h1 class="text-center mt-2 mb-4">
	        		<i class="fas fa-star star-light submit_star mr-1" id="submit_star_1" data-rating="1"></i>
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_2" data-rating="2"></i>
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_3" data-rating="3"></i>
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_4" data-rating="4"></i>
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_5" data-rating="5"></i>
	        	</h1>
	        	<input type="hidden" name="pid" id="pid" value="">
                <div class="form-group mt-4">
	        		<input type='text' name="title" id="title" class="form-control" placeholder="Review Title"></textarea>
	        	</div>
	        	<div class="form-group mt-4">
	        		<textarea style="height:200px;" name="user_review" id="user_review" class="form-control" placeholder="Type Review Here"></textarea>
	        	</div>
	        	<div class="form-group text-center mt-4">
	        		<button type="button" class="btn btn-primary btn-lg" id="save_review">Submit</button>
	        	</div>
	      	</div>
    	</div>
  	</div>
</div>

        <script>
                // document.getElementById('b7').onclick = function(){
                // swal({
                //     title: "Are you sure?",
                //     text: "You will not be able to recover this imaginary file!",
                //     type: "warning",
                //     showCancelButton: true,
                //     confirmButtonColor: '#DD6B55',
                //     confirmButtonText: 'Yes, delete it!',
                //     closeOnConfirm: false,
                //     //closeOnCancel: false
                // },
                // function(){
                //     swal("Deleted!", "Your imaginary file has been deleted!", "success");
                // },
                // function(){
                // onclick="returnorder('."'".$productid."'".')"
                // }
                // );
                // };
                function reviewfn(a){
                    //alert(a);
                    $('#pid').val(a);
                    $('#review_modal').modal('show');
                }

                function closefn(){
                    $('#review_modal').modal('hide');
                }

                function returnorder(pid){
                    $.ajax({
                            url:"ajax.php?action=returnorder",
                            method:"POST",
                            data:{
                                user_id:<?php echo "'".$_SESSION['regid']."'" ?>, 
                                productid :pid
                            },
                            success:function(data)
                            {
                                location.reload();
                            }
                        })
                }

                            
                $(document).on('mouseenter', '.submit_star', function(){

                    var rating = $(this).data('rating');
                    reset_background();
                    for(var count = 1; count <= rating; count++)
                    {
                        $('#submit_star_'+count).addClass('text-warning');
                    }

                });

                function reset_background()
                {
                    for(var count = 1; count <= 5; count++)
                    {
                        $('#submit_star_'+count).addClass('star-light');
                        $('#submit_star_'+count).removeClass('text-warning');
                    }
                }

                $(document).on('mouseleave', '.submit_star', function(){
                    reset_background();
                    for(var count = 1; count <= rating_data; count++)
                    {
                        $('#submit_star_'+count).removeClass('star-light');
                        $('#submit_star_'+count).addClass('text-warning');
                    }
                });

                var rating_data = 0;
                $(document).on('click', '.submit_star', function(){
                    rating_data = $(this).data('rating');
                });

                $('#save_review').click(function(){


                    // var rating = rating_data;
                    var user_name = 1;
                    var pid = $("#pid").val();
                    var user_review = $('#user_review').val();
                    var reviewtitle = $('#title').val();

                    if(reviewtitle == '' || user_name == '' || user_review == '' || rating_data == 0)
                    {
                        alert("Please fill all Fields");
                        return false;
                    }
                    else
                    {
                        $.ajax({
                            url:"ajax.php?action=addrating",
                            method:"POST",
                            data:{
                                rating_data : rating_data,
                                reviewtitle : reviewtitle,
                                user_id:<?php echo "'".$_SESSION['regid']."'" ?>, 
                                productid :pid,
                                user_review:user_review
                            },
                            success:function(data)
                            {
                                $('#review_modal').modal('hide');
                                
                                if(data===1){
                                    alert("Review Submitted Successfully");
                                }
                            }
                        })
                    }

                });

        </script>
<?php include './footer.php' ?>