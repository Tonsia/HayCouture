<?php
    session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hay Couture</title>
    <meta name="description" content="Zairito - eCommerce HTML Template">
    <meta name="keywords" content="business,eCommerce, Ecommerce, ecommerce, shop, shopify, shopify ecommerce, creative, woocommerce, design, gallery, minimal, modern, html, html5, responsive">
    <meta name="author" content="Zairito">

    <!-- fonts file -->
    <link href="../css2.css?family=Jost:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="../css2-1.css?family=Allison&display=swap" rel="stylesheet">
    <link href="../css2-2.css?family=Marcellus&display=swap" rel="stylesheet">
    <link href="../css2-3.css?family=Lato:wght@300;400;700&display=swap" rel="stylesheet">
    <link href="../css2-4.css?family=Fira+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- css file  -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/plugins.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <link rel="stylesheet" href="assets/hyst/hystmodal.min.css">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script>
    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.png" type="image/x-icon">
    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="assets/js/custom.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="assets/hyst/hystmodal.min.js"></script>

    
</head>

<body>
    <!-- Preloader Area Start -->
    <!-- <div id="preloader">
        <div id="status">
            <img src="assets/images/preloader.svg" alt="img">
        </div>
    </div> -->
    <!-- Preloader Area End -->

    <!-- header area start here  -->
    <header class="header-area d-none d-lg-block">
        <!-- <div class="header-top">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4">
                        <div class="header-top-left">
                            <p class="contact-info"><i class="icon flaticon-phone"></i> Call Us: +777 2345 7885 (FREE)</p>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="header-top-right">
                            <div class="top-bar-menu">
                                <ul class="menu-list">
                                    <li class="menu-item"><a class="menu-link" href="refund-policy.html"></a></li>
                                    <li class="menu-item"><a class="menu-link" href="about-us.html">About Us</a></li>
                                    <li class="menu-item"><a class="menu-link" href="blog.html">Blog</a></li>
                                    <li class="menu-item"><a class="menu-link" href="faq.html">How To Buy</a></li>
                                </ul>
                            </div>
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
            </div>
        </div> -->
        <div class="header-middle">
            <div class="container">
                <div class="header-middle-wrap">
                    <div class="brand-area">
                        <a class="brand-logo" href="./"><img class="brand-image" src="assets/images/logohay.jpg" alt="zairito"></a>
                    </div>
                    <!-- <div class="search-area">
                        <form>
                            <div class="search-wrap">
                                <select id='catonsearch' class="form-select">
                                <?php    
                                    include 'db_connect.php';
                                    $result1=$conn->query("SELECT * FROM category where cat_status='1'");
                                    if ($result1->num_rows > 0) 
                                    {
                                        while($row1 = $result1->fetch_assoc()) 
                                        {
                                            echo '<option value="'.$row1["cat_id"].'">'.$row1["cat_name"].'</option>';
                                        }
                                    }
                                   
                                ?>
                                </select>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="search" name="search" placeholder="Search Here">
                                    <button type="button" class="search-btn"><i class="flaticon-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div> -->
                    <div class="header-right">
                        <!-- <div class="wishlist single-btn">
                            <a href="wish-list.html" class="wishlist-btn header-btn">
                                <div class="btn-left">
                                    <i class="btn-icon flaticon-like"></i>
                                   
                                </div>
                                <div class="btn-right">
                                    <span class="btn-text">Wishlist</span>
                                    <span class="item-count">0 items</span>
                                </div>
                            </a>
                        </div> -->
                        <!-- <div class="compare single-btn">
                            <a href="compare.html" class="compare-btn header-btn">
                                <div class="btn-left">
                                    <i class="btn-icon flaticon-bar-chart"></i>
                                    <span class="count">5</span>
                                </div>
                                <div class="btn-right">
                                    <span class="btn-text">Compare</span>
                                    <span class="item-count">5 items</span>
                                </div>
                            </a>
                        </div> -->

                        <?php 
                            include "db_connect.php";
                            if(isset($_SESSION["regid"])){$varr = $_SESSION["regid"];}else{$varr=1;};
                            $qry = $conn->query("SELECT * from cart where status = '1' and userid = '$varr'");
                            $pricecart = 0;
                            if ($qry->num_rows > 0) 
                            {
 
                                while($row = $qry->fetch_assoc()) 
                                {
                                    $pid = $row['productid'];
                                    $qry1 = $conn->query("SELECT * from products where product_status = '1' and product_id = '$pid'");$row1 = $qry1->fetch_assoc();
                                    $pricecart += $row1["product_total"]*$row["quantity"];
                                }
                            }
                        ?>
                        <div class="cart single-btn">
                            <a href="cart.php" role="button"  class="cart-btn header-btn">
                                <div class="btn-left">
                                    <i class="btn-icon flaticon-shopping-bag"></i>
                                    <span class="count"><?php echo $qry->num_rows;?></span>
                                </div>
                                <div class="btn-right">
                                    <span class="btn-text">Your Cart</span>
                                    <span class="price">Rs.<?php echo $pricecart;?></span>
                                </div>
                            </a>
                        </div>
                        <?php
                        if (!isset($_SESSION['username'])){
                            echo '
                            <div class="wishlist single-btn">
                            <a href="wishlist.php" class="wishlist-btn header-btn">
                                <div class="btn-left">
                                    <i class="btn-icon flaticon-like"></i>
                                   
                                </div>
                                <div class="btn-right">
                                    <span class="btn-text">Wishlist</span>
                                    <span class="item-count">0 items</span>
                                </div>
                            </a>
                        </div> 
                            
                            <div class="profile single-btn">
                                <a href="../auth/signin.php" role="button"  class="cart-btn header-btn" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <div class="btn-left menu-item menu-item-has-children">
                                        <i class="btn-icon flaticon-user"></i>
                                        
                                    </div>
                                    <div class="btn-right">
                                        <span class="btn-text">Welcome</span>
                                        <span class="price">   
                                        Guest
                                        </span>
                                    </div>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                                
                            </div>';
    
                            }
                        if (isset($_SESSION['username'])){
                        echo '<div class="profile single-btn">
                            <a href="./account.php" role="button"  class="cart-btn header-btn" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <div class="btn-left menu-item menu-item-has-children">
                                    <i class="btn-icon flaticon-user"></i>
                                    
                                </div>
                                <div class="btn-right">
                                    <span class="btn-text">Welcome</span>
                                    <span class="price">   
                                    '. $_SESSION['username'].'
                                    </span>
                                </div>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                            
                        </div>';

                        }
                        if (isset($_SESSION['username'])){
                            echo '<div class="profile single-btn">
                            <a href="../auth/signin.php" role="button"  class="cart-btn header-btn" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <div class="btn-left menu-item menu-item-has-children">
                                <i class="btn-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-box-arrow-in-left" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M10 3.5a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 1 1 0v2A1.5 1.5 0 0 1 9.5 14h-8A1.5 1.5 0 0 1 0 12.5v-9A1.5 1.5 0 0 1 1.5 2h8A1.5 1.5 0 0 1 11 3.5v2a.5.5 0 0 1-1 0v-2z"/>
                                    <path fill-rule="evenodd" d="M4.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H14.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z"/>
                                    </svg>
                                </i>
                                    
                                </div>
                                <div class="btn-right">
                                    <span class="btn-text">Logout</span>
                                    <span class="price">
                                           
                                 '.$_SESSION["username"].'
                                    
                                    </span>
                                </div>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                            
                        </div>';
                    }
                    ?>

                      

                        
                
                    </div>
                </div>
            </div>
        </div>
        <div class="header-bottom">
            <nav class="menu-area">
                <ul class="main-menu">
                    <li class="menu-item menu-item-has-children active">
                        <a class="menu-link" href="index.php">Home <i class="arrow-icon fas fa-angle-down"></i></a>
                        <!-- <ul class="sub-menu">
                            <li class="sub-menu-item"><a class="sub-menu-link" href="index.html">Home One</a></li>
                            <li class="sub-menu-item"><a class="sub-menu-link" href="index2.html">Home Two</a></li>
                            <li class="sub-menu-item"><a class="sub-menu-link" href="index3.html">Home Three</a></li>
                        </ul> -->
                    </li>
                    <li class="menu-item mega-menu-parent">
                        <a class="menu-link" href="aboutus.php">About Us <i class=""></i></a>
                        <!-- <div class="mega-menu-area ">
                            <div class="container">
                                <ul class="mega-menu"> -->
                                    
                                   <!-- <li class="mega-menu-item">
                                          <a class="mega-menu-title" href="#">Shop Layout</a>
                                        <ul class="menu-items">
                                            <li class="mega-menu-items"><a class="mega-menu-link" href="shop-grid-left-sidebar.html">Shop Grid Leftsidebar <span class="menu-item-badge new">New</span></a></li>
                                            <li class="mega-menu-items"><a class="mega-menu-link" href="shop-grid-right-sidebar.html">Shop Grid Rightsidebar </a></li>
                                            <li class="mega-menu-items"><a class="mega-menu-link" href="shop-grid.html">Shop Grid No Sidebar <span class="menu-item-badge trending">Trending</span></a></li>
                                            <li class="mega-menu-items"><a class="mega-menu-link" href="shop-list-left-sidebar.html">Shop List Leftsidebar</a></li>
                                            <li class="mega-menu-items"><a class="mega-menu-link" href="shop-list-right-sidebar.html">Shop List Rightsidebar</a></li>
                                            <li class="mega-menu-items"><a class="mega-menu-link" href="shop-list.html">Shop List No Sidebar</a></li>
                                        </ul>
                                    </li>  -->
                                    <!-- <li class="mega-menu-item">
                                        <a class="mega-menu-title" href="#">Categories</a>
                                        <ul id='catinshop' class="menu-items"> -->

                                        
                                            <!-- <li class="mega-menu-items"><a class="mega-menu-link" href="single-product.html">Product Single 1</a></li>
                                            <li class="mega-menu-items"><a class="mega-menu-link" href="single-product-v2.html">Product Single 2</a></li>
                                            <li class="mega-menu-items"><a class="mega-menu-link" href="single-product-v3.html">Product Single 3</a></li>
                                            <li class="mega-menu-items"><a class="mega-menu-link" href="cart.html">Cart Page</a></li>
                                            <li class="mega-menu-items"><a class="mega-menu-link" href="checkout.html">Checkout Page</a></li>
                                            <li class="mega-menu-items"><a class="mega-menu-link" href="compare.html">Compare</a></li>
                                            <li class="mega-menu-items"><a class="mega-menu-link" href="wish-list.html">Wishlist</a></li>
                                            <li class="mega-menu-items"><a class="mega-menu-link" href="empty-wish-list.html">Empty Wishlist</a></li> -->
                                        <!-- </ul>
                                    </li> -->
                                    <!-- <li class="mega-menu-item">
                                        <a class="mega-menu-banner" href="shop-grid.html">
                                                <img class="menu-banner-image" src="assets/images/service-image.png" alt="mega-menu-banner">
                                            </a>
                                    </li> -->
                                <!-- </ul>
                            </div>
                        </div> -->
                    </li>

                    <li class="menu-item menu-item-has-children">
                        <a class="menu-link" href="#"> Shop By Category <i class="arrow-icon fas fa-angle-down"></i></a>
                        <ul class="sub-menu">
                        <div class="mega-menu-area ">
                            <div class="container">
                                <ul class="mega-menu">
                                    <ul class="sub-menu" id='catinshop'>
                                    <?php    
                          
                                    $result1=$conn->query("SELECT * FROM category where cat_status='1'");
                                    if ($result1->num_rows > 0) 
                                    {
                                        while($row1 = $result1->fetch_assoc()) 
                                        {   
                                            echo '<li class="sub-menu-item"><a class="sub-menu-link" href="shopgrid?category='.$row1["cat_id"].'">'.$row1["cat_name"].'</a></li>';
                                        }
                                    }
                                   
                                    ?>
                                    </ul>
                                </ul>  
                            </div>
                        </div>
                    </ul>
                </li>


                <?php
                    if(isset($_SESSION['username'])){

                    echo '<li class="menu-item mega-menu-parent">
                                <a class="menu-link" target="_blank" href="../custom/index.php">Customize Dress<i class=""></i></a>
                            </li>';
                    echo '<li class="menu-item mega-menu-parent">
                                <a class="menu-link" target="_blank" href="./productsim.php">Image Search<i class=""></i></a>
                            </li>';
                    }
                    ?>
                          <!--   <li class="sub-menu-item"><a class="sub-menu-link" href="term-conditions.html">Term & Conditions</a></li>
                            <li class="sub-menu-item"><a class="sub-menu-link" href="privacy-policy.html">Privacy Policy</a></li>
                            <li class="sub-menu-item"><a class="sub-menu-link" href="shipping-return.html">Shipping & Return</a></li>
                            <li class="sub-menu-item"><a class="sub-menu-link" href="faq.html">Frequently Asked Questions</a></li>
                            <li class="sub-menu-item"><a class="sub-menu-link" href="refund-policy.html">Refund policy</a></li>
                            <li class="sub-menu-item"><a class="sub-menu-link" href="error.html">Error Page</a></li>
                            <li class="sub-menu-item"><a class="sub-menu-link" href="sign-in.html">Sign In</a></li>
                            <li class="sub-menu-item"><a class="sub-menu-link" href="sign-up.html">Sign Up</a></li>
                        </ul>
                    </li>

                    <li class="menu-item"><a class="menu-link" href="">about us</a></li>
                    <?php
                    if(isset($_SESSION['username'])){
                    echo '<li class="menu-item menu-item-has-children">
                        <a class="menu-link" href="#">Profile <i class="arrow-icon fas fa-angle-down"></i></a>
                        <ul class="sub-menu">
                        <li class="sub-menu-item"><a class="sub-menu-link" href="./editProfile.php">Edit Profile</a></li>
                            <li class="sub-menu-item"><a class="sub-menu-link" href="./editPassword.php">Change Password</a></li>
                            <li class="sub-menu-item"><a class="sub-menu-link" href="../auth/signin.php">Logout</a></li>
                        </ul>
                    </li>';
                    }
                    ?>
                    <!-- <li class="menu-item"><a class="menu-link" href="contact.html">Contact</a></li> -->

                </ul>
            </nav>
        </div>
    </header>
    <!-- header area end here  -->

    <!-- mobile-header-area area start here  -->
    <!-- <div class="mobile-header-area d-block d-lg-none">
        <div class="container">
            <div class="menu-wrap">
                <div class="header-left">
                    <a class="brand-logo" href="index.html"><img class="brand-image" src="assets/images/zairito.png" alt="zairito"></a>
                </div>
                <div class="header-right">
                    <a href="wish-list.html" class="wishlist-btn header-btn">
                        <div class="btn-left">
                            <i class="btn-icon flaticon-like"></i>
                            <span class="count">12</span>
                        </div>
                    </a>
                    <a href="compare.html" class="compare-btn header-btn">
                        <div class="btn-left">
                            <i class="btn-icon flaticon-bar-chart"></i>
                            <span class="count">5</span>
                        </div>
                    </a>
                    <a data-bs-toggle="offcanvas" href="#cartOffcanvasSidebar" role="button" aria-controls="cartOffcanvasSidebar" class="cart-btn header-btn">
                        <div class="btn-left">
                            <i class="btn-icon flaticon-shopping-bag"></i>
                            <span class="count">10</span>
                        </div>
                    </a>
                    <button class="menu-bar" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasMobileMenu" aria-controls="offcanvasMobileMenu"><i class="fas fa-bars"></i></button>
                </div>
            </div>
        </div>
    </div> -->
    <!-- mobile-header-area area end here  -->