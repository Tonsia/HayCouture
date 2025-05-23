<?php include 'header.php' ?>

    <!-- mobile-menu-area area start here  -->
    <!-- <div class="offcanvas offcanvas-start menu-offcanvas" tabindex="-1" id="offcanvasMobileMenu">
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
    </div> -->
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
                <!-- <div class="product-item cart-product-item">
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
                </div> -->
                <!-- Product item end -->

                <!-- Product item start -->
                <!-- <div class="product-item cart-product-item">
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
                </div> -->
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

    <!-- hero-section area start here  -->
    <div class="hero-section">
        <div class="hero-slider">
            <div class="signle-slide" style="background-image: url('assets/images/hero-banner-bg.png');">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6 col-6">
                            <div class="hero-slider-content text-center">
                                <h2 class="slider-sub-title">Summer Sale</h2>
                                <h1 class="slider-title">The Summer!!</h1>
                                <p class="slider-text">You can gain anything you want in life, if you dress for it</p>
                                <div class="slider-btn">
                                    <a href="" class="primary-btn">Shop Now!</a>
                                    <a href="./seeall.php?seeall=1" class="secondary-btn">See Collections <i class="iocn flaticon-right-arrow"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5 offset-lg-1 col-6">
                            <div class="hero-slider-image text-center">
                                <img class="hero-image img-fluid" src="assets/images/hero-banner-image-1.png" alt="hero-banner-image">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="signle-slide" style="background-image: url('assets/images/hero-banner-bg-2.png');">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6 col-6">
                            <div class="hero-slider-content text-center">
                                <h2 class="slider-sub-title">New Collection</h2>
                                <h1 class="slider-title">The Winter!!</h1>
                                <p class="slider-text">Fashion is fickle. Style, on the other hand, endures time</p>
                                <div class="slider-btn">
                                    <a href="./seeall.php?seeall=2" class="secondary-btn">See Collections <i class="iocn flaticon-right-arrow"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5 offset-lg-1 col-6">
                            <div class="hero-slider-image text-center">
                                <img class="hero-image img-fluid" src="assets/images/hero-banner-image-2.png" alt="hero-banner-image">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="signle-slide" style="background-image: url('assets/images/hero-banner-bg-3.png');">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6 col-6">
                            <div class="hero-slider-content text-center">
                                <h2 class="slider-sub-title">New Collection</h2>
                                <h1 class="slider-title">The New autmn</h1>
                                <p class="slider-text">When it comes to style, always trust your instincts.</p>
                                <div class="slider-btn">
                                    <a href="./seeall.php?seeall=3" class="secondary-btn">See Collections <i class="iocn flaticon-right-arrow"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5 offset-lg-1 col-6">
                            <div class="hero-slider-image text-center">
                                <img class="hero-image img-fluid" src="assets/images/hero-banner-image-3.png" alt="hero-banner-image">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- hero-section area end here  -->

    <!-- brads area start here  -->
    <!-- <div class="brads-area">
        <div class="container">
            <div class="brads-slide">
                <div class="sigle-brad">
                    <img src="assets/images/treva.png" alt="brad image">
                </div>
                <div class="sigle-brad">
                    <img src="assets/images/zoo-tv.png" alt="brad image">
                </div>
                <div class="sigle-brad">
                    <img src="assets/images/circle.png" alt="brad image">
                </div>
                <div class="sigle-brad">
                    <img src="assets/images/code-lab.png" alt="brad image">
                </div>
                <div class="sigle-brad">
                    <img src="assets/images/hex-lab.png" alt="brad image">
                </div>
                <div class="sigle-brad">
                    <img src="assets/images/kanba.png" alt="brad image">
                </div>
                <div class="sigle-brad">
                    <img src="assets/images/circle.png" alt="brad image">
                </div>
                <div class="sigle-brad">
                    <img src="assets/images/zoo-tv.png" alt="brad image">
                </div>
                <div class="sigle-brad">
                    <img src="assets/images/circle.png" alt="brad image">
                </div>
            </div>
        </div>
    </div> -->
    <!-- brads area start here  -->

    <!-- Popular Categories area start here  -->
    <!-- <div class="popular-categories-area section-bg section-top pb-100">
        <div class="container">
            <div class="section-header-area">
                <div class="row">
                    <div class="col-md-6">
                        <h3 class="sub-title">Many Goods</h3>
                        <h2 class="section-title">Popular Categories</h2>
                    </div>
                    <div class="col-md-6 align-self-end text-md-end">
                        <a href="shop-grid-left-sidebar.html" class="primary-btn">View All Categories </a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <a class="single-categorie" href="shop-grid-left-sidebar.html">
                        <div class="categorie-wrap">
                            <div class="categorie-icon">
                                <i class="icon flaticon-pants"></i>
                            </div>
                            <div class="categorie-info">
                                <h3 class="categorie-name">Jeans Collections</h3>
                                <h4 class="categorie-subtitle">Dress For Man And Women</h4>
                            </div>
                        </div>
                        <i class="arrow flaticon-right-arrow"></i>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6">
                    <a class="single-categorie" href="shop-grid-right-sidebar.html">
                        <div class="categorie-wrap">
                            <div class="categorie-icon">
                                <i class="icon flaticon-blazer"></i>
                            </div>
                            <div class="categorie-info">
                                <h3 class="categorie-name">Blazers Collection</h3>
                                <h4 class="categorie-subtitle">Dress For Man And Women</h4>
                            </div>
                        </div>
                        <i class="arrow flaticon-right-arrow"></i>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6">
                    <a class="single-categorie" href="shop-grid.html">
                        <div class="categorie-wrap">
                            <div class="categorie-icon">
                                <i class="icon flaticon-hoodie"></i>
                            </div>
                            <div class="categorie-info">
                                <h3 class="categorie-name">Hoodie Colection</h3>
                                <h4 class="categorie-subtitle">Dress For Man And Women</h4>
                            </div>
                        </div>
                        <i class="arrow flaticon-right-arrow"></i>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6">
                    <a class="single-categorie" href="shop-list.html">
                        <div class="categorie-wrap">
                            <div class="categorie-icon">
                                <i class="icon flaticon-long-sleeve"></i>
                            </div>
                            <div class="categorie-info">
                                <h3 class="categorie-name">Long Sleve Wear</h3>
                                <h4 class="categorie-subtitle">Dress For Man And Women</h4>
                            </div>
                        </div>
                        <i class="arrow flaticon-right-arrow"></i>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6">
                    <a class="single-categorie" href="shop-list-left-sidebar.html">
                        <div class="categorie-wrap">
                            <div class="categorie-icon">
                                <i class="icon flaticon-waistcoat"></i>
                            </div>
                            <div class="categorie-info">
                                <h3 class="categorie-name">Waistcoart Collection</h3>
                                <h4 class="categorie-subtitle">Dress For Man And Women</h4>
                            </div>
                        </div>
                        <i class="arrow flaticon-right-arrow"></i>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6">
                    <a class="single-categorie" href="shop-list-right-sidebar.html">
                        <div class="categorie-wrap">
                            <div class="categorie-icon">
                                <i class="icon flaticon-mini-skirt"></i>
                            </div>
                            <div class="categorie-info">
                                <h3 class="categorie-name">Mini Skart Collection</h3>
                                <h4 class="categorie-subtitle">Dress For Man And Women</h4>
                            </div>
                        </div>
                        <i class="arrow flaticon-right-arrow"></i>
                    </a>
                </div>
            </div>
        </div>
    </div> -->
    <!-- Popular Categories area end here  -->



        <!-- On Sale Products area start here  -->
        <div class="featured-productss-area section-top pb-30">
        <div class="container">
            <div class="section-header-area">
                <div class="row">
                    <div class="col-md-6">
                        <h3 class="sub-title">Products</h3>
                        <h2 class="section-title">On Sale Products</h2>
                    </div>
                    <div class="col-md-6 align-self-end text-md-end">
                        <a href="seeall.php?seeall=1" class="see-btn">See All</a>
                    </div>
                </div>
            </div>
            <div id='onsale' class="row">
               
            </div>
        </div>
    </div>
    <!-- On Sale Products area end here  -->

        <!-- New Arrivals Products area start here  -->
        <div class="featured-productss-area section-top pb-30">
        <div class="container">
            <div class="section-header-area">
                <div class="row">
                    <div class="col-md-6">
                        <h3 class="sub-title">Products</h3>
                        <h2 class="section-title">New Arrivals</h2>
                    </div>
                    <div class="col-md-6 align-self-end text-md-end">
                        <a href="seeall.php?seeall=2" class="see-btn">See All</a>
                    </div>
                </div>
            </div>
            <div id='newarrivals' class="row">
               
            </div>
        </div>
    </div>
    <!-- New Arrivals area end here  -->

    <!-- Featured Products area start here  -->
    <div class="featured-productss-area section-top pb-30">
        <div class="container">
            <div class="section-header-area">
                <div class="row">
                    <div class="col-md-6">
                        <h3 class="sub-title">Products</h3>
                        <h2 class="section-title">Featured Products</h2>
                    </div>
                    <div class="col-md-6 align-self-end text-md-end">
                        <a href="seeall.php?seeall=3" class="see-btn">See All</a>
                    </div>
                </div>
            </div>
            <div id='featured' class="row">
               
            </div>
        </div>
    </div>
    <!-- Featured Products area end here  -->


    


    <!-- About Area start here  -->
    <!-- <div class="about-area section">
        <div class="container">
            <div class="section-header-area">
                <div class="row">
                    <div class="col-md-6">
                        <h3 class="sub-title">About Us</h3>
                        <h2 class="section-title">The Story Of Borning <br> Company Zairito</h2>
                    </div>
                    <div class="col-md-6 align-self-end text-md-end">
                        <a href="about-us.html" class="primary-btn">Know More Abou Us</a>
                    </div>
                </div>
            </div>
            <div class="story-box-slide">
                <div class="single-story-box">
                    <h3 class="story-title">Story Of <span class="story-year">2016</span></h3>
                    <p class="story-content">Quisque velit nisi, pretium ut lacinia in, elementum id elementum id enim. Nulla porttitor accumssan tincidunt. Donec rutrum congue leo eget malew susada. Cras ultricies ligula sed magna dictum </p>
                </div>
                <div class="single-story-box">
                    <h3 class="story-title">Story Of <span class="story-year">2017</span></h3>
                    <p class="story-content">Quisque velit nisi, pretium ut lacinia in, elementum id elementum id enim. Nulla porttitor accumssan tincidunt. Donec rutrum congue leo eget malew susada. Cras ultricies ligula sed magna dictum </p>
                </div>
                <div class="single-story-box">
                    <h3 class="story-title">Story Of <span class="story-year">2018</span></h3>
                    <p class="story-content">Quisque velit nisi, pretium ut lacinia in, elementum id elementum id enim. Nulla porttitor accumssan tincidunt. Donec rutrum congue leo eget malew susada. Cras ultricies ligula sed magna dictum </p>
                </div>
                <div class="single-story-box">
                    <h3 class="story-title">Story Of <span class="story-year">2019</span></h3>
                    <p class="story-content">Quisque velit nisi, pretium ut lacinia in, elementum id elementum id enim. Nulla porttitor accumssan tincidunt. Donec rutrum congue leo eget malew susada. Cras ultricies ligula sed magna dictum </p>
                </div>
                <div class="single-story-box">
                    <h3 class="story-title">Story Of <span class="story-year">2020</span></h3>
                    <p class="story-content">Quisque velit nisi, pretium ut lacinia in, elementum id elementum id enim. Nulla porttitor accumssan tincidunt. Donec rutrum congue leo eget malew susada. Cras ultricies ligula sed magna dictum </p>
                </div>
                <div class="single-story-box">
                    <h3 class="story-title">Story Of <span class="story-year">2021</span></h3>
                    <p class="story-content">Quisque velit nisi, pretium ut lacinia in, elementum id elementum id enim. Nulla porttitor accumssan tincidunt. Donec rutrum congue leo eget malew susada. Cras ultricies ligula sed magna dictum </p>
                </div>
            </div>
        </div>
    </div> -->
    <!-- About Area  end here  -->

    <!-- Trending Products area start here  -->
    <!-- <div class="trending-products-area section-top pb-100">
        <div class="container">
            <div class="section-header-area">
                <div class="row">
                    <div class="col-lg-6">
                        <h3 class="sub-title">Popular Products</h3>
                        <h2 class="section-title">Trending Products</h2>
                    </div>
                    <div class="col-lg-6 align-self-end text-lg-end">
                        <div class="primary-tabs">
                            <ul class="nav nav-tabs" id="TrendingProducts" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="new-arrival-tab" data-bs-toggle="tab" data-bs-target="#new-arrival" type="button" role="tab" aria-controls="new-arrival" aria-selected="true">NEW ARRIVAL</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="best-selling-tab" data-bs-toggle="tab" data-bs-target="#best-selling" type="button" role="tab" aria-controls="best-selling" aria-selected="false">BEST SELLING</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="on-sell-tab" data-bs-toggle="tab" data-bs-target="#on-sell" type="button" role="tab" aria-controls="on-sell" aria-selected="false">ON SALE</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="featured-items-tab" data-bs-toggle="tab" data-bs-target="#featured-items" type="button" role="tab" aria-controls="featured-items" aria-selected="false">FEATURED ITEMS</button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-content" id="TrendingProductsContent">
                <div class="tab-pane fade show active" id="new-arrival" role="tabpanel" aria-labelledby="new-arrival-tab">
                    <div class="row">
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="single-grid-product">
                                <div class="product-top">
                                    <a href="single-product.html"><img class="product-thumbnal" src="assets/images/product-image-5.png" alt="product"></a>
                                    <ul class="prdouct-btn-wrapper">
                                        <li class="single-product-btn">
                                            <a class="addToWishlist product-btn" href="compare.html" title="Add to compare"><i class="icon flaticon-bar-chart"></i></a>
                                        </li>
                                        <li class="single-product-btn">
                                            <a class="addCompare product-btn" href="wish-list.html" title="Add to wishlist"><i class="icon flaticon-like"></i></a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="product-info text-center">
                                    <h4 class="product-catagory">ELLA - HALOTHEMES</h4>
                                    <h3 class="product-name"><a class="product-link" href="single-product.html">Rosmo Namino Milancelos</a></h3>
                                    <ul class="product-review">
                                        <li class="review-item active"><i class="flaticon-star"></i></li>
                                        <li class="review-item active"><i class="flaticon-star"></i></li>
                                        <li class="review-item active"><i class="flaticon-star"></i></li>
                                        <li class="review-item"><i class="flaticon-star"></i></li>
                                        <li class="review-item"><i class="flaticon-star"></i></li>
                                    </ul>
                                    <div class="product-price">
                                        <span class="regular-price">$770.18</span>
                                        <span class="price">$700.08</span>
                                    </div>
                                    <div class="variable-single-item color-switch">
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
                                    </div>
                                    <ul class="size-switch">
                                        <li class="single-size active">XL</li>
                                        <li class="single-size">LARGE</li>
                                        <li class="single-size">SMALL</li>
                                    </ul>
                                    <a href="cart.html" title="Add to cart" class="add-cart">Add To Cart <i class="icon fas fa-plus-circle"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="single-grid-product">
                                <div class="product-top">
                                    <a href="single-product.html"><img class="product-thumbnal" src="assets/images/product-image-6.png" alt="product"></a>
                                    <div class="product-flags">
                                        <span class="product-flag sale">SALE</span>
                                        <span class="product-flag discount">-15%</span>
                                    </div>
                                    <ul class="prdouct-btn-wrapper">
                                        <li class="single-product-btn">
                                            <a class="addToWishlist product-btn" href="compare.html" title="Add to compare"><i class="icon flaticon-bar-chart"></i></a>
                                        </li>
                                        <li class="single-product-btn">
                                            <a class="addCompare product-btn" href="wish-list.html" title="Add to wishlist"><i class="icon flaticon-like"></i></a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="product-info text-center">
                                    <h4 class="product-catagory">HOT - Collection</h4>
                                    <h3 class="product-name"><a class="product-link" href="single-product.html">Black T-Shirt For Woman</a></h3>
                                    <ul class="product-review">
                                        <li class="review-item active"><i class="flaticon-star"></i></li>
                                        <li class="review-item active"><i class="flaticon-star"></i></li>
                                        <li class="review-item active"><i class="flaticon-star"></i></li>
                                        <li class="review-item"><i class="flaticon-star"></i></li>
                                        <li class="review-item"><i class="flaticon-star"></i></li>
                                    </ul>
                                    <div class="product-price">
                                        <span class="regular-price">$220.08</span>
                                        <span class="price">$200.08</span>
                                    </div>
                                    <div class="variable-single-item color-switch">
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
                                    </div>
                                    <ul class="size-switch">
                                        <li class="single-size">XL</li>
                                        <li class="single-size">LARGE</li>
                                        <li class="single-size">SMALL</li>
                                    </ul>
                                    <a href="cart.html" title="Add to cart" class="add-cart">Add To Cart <i class="icon fas fa-plus-circle"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="single-grid-product">
                                <div class="product-top">
                                    <a href="single-product.html"><img class="product-thumbnal" src="assets/images/product-image-7.png" alt="product"></a>
                                    <div class="product-flags">
                                        <span class="product-flag discount">-15%</span>
                                    </div>
                                    <ul class="prdouct-btn-wrapper">
                                        <li class="single-product-btn">
                                            <a class="addToWishlist product-btn" href="compare.html" title="Add to compare"><i class="icon flaticon-bar-chart"></i></a>
                                        </li>
                                        <li class="single-product-btn">
                                            <a class="addCompare product-btn" href="wish-list.html" title="Add to wishlist"><i class="icon flaticon-like"></i></a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="product-info text-center">
                                    <h4 class="product-catagory">New - Collection</h4>
                                    <h3 class="product-name"><a class="product-link" href="single-product.html">Fit-Flare Dress</a></h3>
                                    <ul class="product-review">
                                        <li class="review-item active"><i class="flaticon-star"></i></li>
                                        <li class="review-item active"><i class="flaticon-star"></i></li>
                                        <li class="review-item active"><i class="flaticon-star"></i></li>
                                        <li class="review-item"><i class="flaticon-star"></i></li>
                                        <li class="review-item"><i class="flaticon-star"></i></li>
                                    </ul>
                                    <div class="product-price">
                                        <span class="regular-price">$748.08</span>
                                        <span class="price">$730.08</span>
                                    </div>
                                    <div class="variable-single-item color-switch">
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
                                    </div>
                                    <ul class="size-switch">
                                        <li class="single-size">XL</li>
                                        <li class="single-size">LARGE</li>
                                        <li class="single-size">SMALL</li>
                                    </ul>
                                    <a href="cart.html" title="Add to cart" class="add-cart">Add To Cart <i class="icon fas fa-plus-circle"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="single-grid-product">
                                <div class="product-top">
                                    <a href="single-product.html"><img class="product-thumbnal" src="assets/images/product-image-8.png" alt="product"></a>
                                    <div class="product-flags">
                                        <span class="product-flag sale">SALE</span>
                                    </div>
                                    <ul class="prdouct-btn-wrapper">
                                        <li class="single-product-btn">
                                            <a class="addToWishlist product-btn" href="compare.html" title="Add to compare"><i class="icon flaticon-bar-chart"></i></a>
                                        </li>
                                        <li class="single-product-btn">
                                            <a class="addCompare product-btn" href="wish-list.html" title="Add to wishlist"><i class="icon flaticon-like"></i></a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="product-info text-center">
                                    <h4 class="product-catagory">ELLA - HALOTHEMES</h4>
                                    <h3 class="product-name"><a class="product-link" href="single-product.html">Midi Dress</a></h3>
                                    <ul class="product-review">
                                        <li class="review-item active"><i class="flaticon-star"></i></li>
                                        <li class="review-item active"><i class="flaticon-star"></i></li>
                                        <li class="review-item active"><i class="flaticon-star"></i></li>
                                        <li class="review-item"><i class="flaticon-star"></i></li>
                                        <li class="review-item"><i class="flaticon-star"></i></li>
                                    </ul>
                                    <div class="product-price">
                                        <span class="regular-price">$709.08</span>
                                        <span class="price">$600.08</span>
                                    </div>
                                    <div class="variable-single-item color-switch">
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
                                    </div>
                                    <ul class="size-switch">
                                        <li class="single-size">XL</li>
                                        <li class="single-size">LARGE</li>
                                        <li class="single-size">SMALL</li>
                                    </ul>
                                    <a href="cart.html" title="Add to cart" class="add-cart">Add To Cart <i class="icon fas fa-plus-circle"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="best-selling" role="tabpanel" aria-labelledby="best-selling-tab">
                    <div class="row">
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="single-grid-product">
                                <div class="product-top">
                                    <a href="single-product.html"><img class="product-thumbnal" src="assets/images/product-image-1.png" alt="product"></a>
                                    <ul class="prdouct-btn-wrapper">
                                        <li class="single-product-btn">
                                            <a class="addToWishlist product-btn" href="compare.html" title="Add to compare"><i class="icon flaticon-bar-chart"></i></a>
                                        </li>
                                        <li class="single-product-btn">
                                            <a class="addCompare product-btn" href="wish-list.html" title="Add to wishlist"><i class="icon flaticon-like"></i></a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="product-info text-center">
                                    <h4 class="product-catagory">ELLA - HALOTHEMES</h4>
                                    <h3 class="product-name"><a class="product-link" href="single-product.html">Midi Dress</a></h3>
                                    <ul class="product-review">
                                        <li class="review-item active"><i class="flaticon-star"></i></li>
                                        <li class="review-item active"><i class="flaticon-star"></i></li>
                                        <li class="review-item active"><i class="flaticon-star"></i></li>
                                        <li class="review-item"><i class="flaticon-star"></i></li>
                                        <li class="review-item"><i class="flaticon-star"></i></li>
                                    </ul>
                                    <div class="product-price">
                                        <span class="regular-price">$770.18</span>
                                        <span class="price">$700.08</span>
                                    </div>
                                    <div class="variable-single-item color-switch">
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
                                    </div>
                                    <ul class="size-switch">
                                        <li class="single-size active">XL</li>
                                        <li class="single-size">LARGE</li>
                                        <li class="single-size">SMALL</li>
                                    </ul>
                                    <a href="cart.html" title="Add to cart" class="add-cart">Add To Cart <i class="icon fas fa-plus-circle"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="single-grid-product">
                                <div class="product-top">
                                    <a href="single-product.html"><img class="product-thumbnal" src="assets/images/product-image-2.png" alt="product"></a>
                                    <div class="product-flags">
                                        <span class="product-flag sale">SALE</span>
                                        <span class="product-flag discount">-15%</span>
                                    </div>
                                    <ul class="prdouct-btn-wrapper">
                                        <li class="single-product-btn">
                                            <a class="addToWishlist product-btn" href="compare.html" title="Add to compare"><i class="icon flaticon-bar-chart"></i></a>
                                        </li>
                                        <li class="single-product-btn">
                                            <a class="addCompare product-btn" href="wish-list.html" title="Add to wishlist"><i class="icon flaticon-like"></i></a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="product-info text-center">
                                    <h4 class="product-catagory">Hot - Collection</h4>
                                    <h3 class="product-name"><a class="product-link" href="single-product.html">Black T-Shirt For Woman</a></h3>
                                    <ul class="product-review">
                                        <li class="review-item active"><i class="flaticon-star"></i></li>
                                        <li class="review-item active"><i class="flaticon-star"></i></li>
                                        <li class="review-item active"><i class="flaticon-star"></i></li>
                                        <li class="review-item"><i class="flaticon-star"></i></li>
                                        <li class="review-item"><i class="flaticon-star"></i></li>
                                    </ul>
                                    <div class="product-price">
                                        <span class="regular-price">$220.08</span>
                                        <span class="price">$200.08</span>
                                    </div>
                                    <div class="variable-single-item color-switch">
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
                                    </div>
                                    <ul class="size-switch">
                                        <li class="single-size">XL</li>
                                        <li class="single-size">LARGE</li>
                                        <li class="single-size">SMALL</li>
                                    </ul>
                                    <a href="cart.html" title="Add to cart" class="add-cart">Add To Cart <i class="icon fas fa-plus-circle"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="single-grid-product">
                                <div class="product-top">
                                    <a href="single-product.html"><img class="product-thumbnal" src="assets/images/product-image-3.png" alt="product"></a>
                                    <div class="product-flags">
                                        <span class="product-flag discount">-15%</span>
                                    </div>
                                    <ul class="prdouct-btn-wrapper">
                                        <li class="single-product-btn">
                                            <a class="addToWishlist product-btn" href="compare.html" title="Add to compare"><i class="icon flaticon-bar-chart"></i></a>
                                        </li>
                                        <li class="single-product-btn">
                                            <a class="addCompare product-btn" href="wish-list.html" title="Add to wishlist"><i class="icon flaticon-like"></i></a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="product-info text-center">
                                    <h4 class="product-catagory">New - Collection</h4>
                                    <h3 class="product-name"><a class="product-link" href="single-product.html">Fit-Flare Dress</a></h3>
                                    <ul class="product-review">
                                        <li class="review-item active"><i class="flaticon-star"></i></li>
                                        <li class="review-item active"><i class="flaticon-star"></i></li>
                                        <li class="review-item active"><i class="flaticon-star"></i></li>
                                        <li class="review-item"><i class="flaticon-star"></i></li>
                                        <li class="review-item"><i class="flaticon-star"></i></li>
                                    </ul>
                                    <div class="product-price">
                                        <span class="regular-price">$748.08</span>
                                        <span class="price">$730.08</span>
                                    </div>
                                    <div class="variable-single-item color-switch">
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
                                    </div>
                                    <ul class="size-switch">
                                        <li class="single-size">XL</li>
                                        <li class="single-size">LARGE</li>
                                        <li class="single-size">SMALL</li>
                                    </ul>
                                    <a href="cart.html" title="Add to cart" class="add-cart">Add To Cart <i class="icon fas fa-plus-circle"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="single-grid-product">
                                <div class="product-top">
                                    <a href="single-product.html"><img class="product-thumbnal" src="assets/images/product-image-4.png" alt="product"></a>
                                    <div class="product-flags">
                                        <span class="product-flag sale">SALE</span>
                                    </div>
                                    <ul class="prdouct-btn-wrapper">
                                        <li class="single-product-btn">
                                            <a class="addToWishlist product-btn" href="compare.html" title="Add to compare"><i class="icon flaticon-bar-chart"></i></a>
                                        </li>
                                        <li class="single-product-btn">
                                            <a class="addCompare product-btn" href="wish-list.html" title="Add to wishlist"><i class="icon flaticon-like"></i></a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="product-info text-center">
                                    <h4 class="product-catagory">ELLA - HALOTHEMES</h4>
                                    <h3 class="product-name"><a class="product-link" href="single-product.html">Rosmo Namino Milancelos</a></h3>
                                    <ul class="product-review">
                                        <li class="review-item active"><i class="flaticon-star"></i></li>
                                        <li class="review-item active"><i class="flaticon-star"></i></li>
                                        <li class="review-item active"><i class="flaticon-star"></i></li>
                                        <li class="review-item"><i class="flaticon-star"></i></li>
                                        <li class="review-item"><i class="flaticon-star"></i></li>
                                    </ul>
                                    <div class="product-price">
                                        <span class="regular-price">$709.08</span>
                                        <span class="price">$600.08</span>
                                    </div>
                                    <div class="variable-single-item color-switch">
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
                                    </div>
                                    <ul class="size-switch">
                                        <li class="single-size">XL</li>
                                        <li class="single-size">LARGE</li>
                                        <li class="single-size">SMALL</li>
                                    </ul>
                                    <a href="cart.html" title="Add to cart" class="add-cart">Add To Cart <i class="icon fas fa-plus-circle"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="on-sell" role="tabpanel" aria-labelledby="on-sell-tab">
                    <div class="row">
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="single-grid-product">
                                <div class="product-top">
                                    <a href="single-product.html"><img class="product-thumbnal" src="assets/images/product-image-5.png" alt="product"></a>
                                    <ul class="prdouct-btn-wrapper">
                                        <li class="single-product-btn">
                                            <a class="addToWishlist product-btn" href="compare.html" title="Add to compare"><i class="icon flaticon-bar-chart"></i></a>
                                        </li>
                                        <li class="single-product-btn">
                                            <a class="addCompare product-btn" href="wish-list.html" title="Add to wishlist"><i class="icon flaticon-like"></i></a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="product-info text-center">
                                    <h4 class="product-catagory">Hot - Collection</h4>
                                    <h3 class="product-name"><a class="product-link" href="single-product.html">Midi Dress</a></h3>
                                    <ul class="product-review">
                                        <li class="review-item active"><i class="flaticon-star"></i></li>
                                        <li class="review-item active"><i class="flaticon-star"></i></li>
                                        <li class="review-item active"><i class="flaticon-star"></i></li>
                                        <li class="review-item"><i class="flaticon-star"></i></li>
                                        <li class="review-item"><i class="flaticon-star"></i></li>
                                    </ul>
                                    <div class="product-price">
                                        <span class="regular-price">$770.18</span>
                                        <span class="price">$700.08</span>
                                    </div>
                                    <div class="variable-single-item color-switch">
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
                                    </div>
                                    <ul class="size-switch">
                                        <li class="single-size active">XL</li>
                                        <li class="single-size">LARGE</li>
                                        <li class="single-size">SMALL</li>
                                    </ul>
                                    <a href="cart.html" title="Add to cart" class="add-cart">Add To Cart <i class="icon fas fa-plus-circle"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="single-grid-product">
                                <div class="product-top">
                                    <a href="single-product.html"><img class="product-thumbnal" src="assets/images/product-image-6.png" alt="product"></a>
                                    <div class="product-flags">
                                        <span class="product-flag sale">SALE</span>
                                        <span class="product-flag discount">-15%</span>
                                    </div>
                                    <ul class="prdouct-btn-wrapper">
                                        <li class="single-product-btn">
                                            <a class="addToWishlist product-btn" href="compare.html" title="Add to compare"><i class="icon flaticon-bar-chart"></i></a>
                                        </li>
                                        <li class="single-product-btn">
                                            <a class="addCompare product-btn" href="wish-list.html" title="Add to wishlist"><i class="icon flaticon-like"></i></a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="product-info text-center">
                                    <h4 class="product-catagory">ELLA - HALOTHEMES</h4>
                                    <h3 class="product-name"><a class="product-link" href="single-product.html">Tailored Fit Mesh-Panel Polo</a></h3>
                                    <ul class="product-review">
                                        <li class="review-item active"><i class="flaticon-star"></i></li>
                                        <li class="review-item active"><i class="flaticon-star"></i></li>
                                        <li class="review-item active"><i class="flaticon-star"></i></li>
                                        <li class="review-item"><i class="flaticon-star"></i></li>
                                        <li class="review-item"><i class="flaticon-star"></i></li>
                                    </ul>
                                    <div class="product-price">
                                        <span class="regular-price">$220.08</span>
                                        <span class="price">$200.08</span>
                                    </div>
                                    <div class="variable-single-item color-switch">
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
                                    </div>
                                    <ul class="size-switch">
                                        <li class="single-size">XL</li>
                                        <li class="single-size">LARGE</li>
                                        <li class="single-size">SMALL</li>
                                    </ul>
                                    <a href="cart.html" title="Add to cart" class="add-cart">Add To Cart <i class="icon fas fa-plus-circle"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="single-grid-product">
                                <div class="product-top">
                                    <a href="single-product.html"><img class="product-thumbnal" src="assets/images/product-image-7.png" alt="product"></a>
                                    <div class="product-flags">
                                        <span class="product-flag discount">-15%</span>
                                    </div>
                                    <ul class="prdouct-btn-wrapper">
                                        <li class="single-product-btn">
                                            <a class="addToWishlist product-btn" href="compare.html" title="Add to compare"><i class="icon flaticon-bar-chart"></i></a>
                                        </li>
                                        <li class="single-product-btn">
                                            <a class="addCompare product-btn" href="wish-list.html" title="Add to wishlist"><i class="icon flaticon-like"></i></a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="product-info text-center">
                                    <h4 class="product-catagory">Bag - Collection</h4>
                                    <h3 class="product-name"><a class="product-link" href="single-product.html">Black T-Shirt For Woman</a></h3>
                                    <ul class="product-review">
                                        <li class="review-item active"><i class="flaticon-star"></i></li>
                                        <li class="review-item active"><i class="flaticon-star"></i></li>
                                        <li class="review-item active"><i class="flaticon-star"></i></li>
                                        <li class="review-item"><i class="flaticon-star"></i></li>
                                        <li class="review-item"><i class="flaticon-star"></i></li>
                                    </ul>
                                    <div class="product-price">
                                        <span class="regular-price">$748.08</span>
                                        <span class="price">$730.08</span>
                                    </div>
                                    <div class="variable-single-item color-switch">
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
                                    </div>
                                    <ul class="size-switch">
                                        <li class="single-size">XL</li>
                                        <li class="single-size">LARGE</li>
                                        <li class="single-size">SMALL</li>
                                    </ul>
                                    <a href="cart.html" title="Add to cart" class="add-cart">Add To Cart <i class="icon fas fa-plus-circle"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="single-grid-product">
                                <div class="product-top">
                                    <a href="single-product.html"><img class="product-thumbnal" src="assets/images/product-image-8.png" alt="product"></a>
                                    <div class="product-flags">
                                        <span class="product-flag sale">SALE</span>
                                    </div>
                                    <ul class="prdouct-btn-wrapper">
                                        <li class="single-product-btn">
                                            <a class="addToWishlist product-btn" href="compare.html" title="Add to compare"><i class="icon flaticon-bar-chart"></i></a>
                                        </li>
                                        <li class="single-product-btn">
                                            <a class="addCompare product-btn" href="wish-list.html" title="Add to wishlist"><i class="icon flaticon-like"></i></a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="product-info text-center">
                                    <h4 class="product-catagory">ELLA - HALOTHEMES</h4>
                                    <h3 class="product-name"><a class="product-link" href="single-product.html">Rosmo Namino Milancelos</a></h3>
                                    <ul class="product-review">
                                        <li class="review-item active"><i class="flaticon-star"></i></li>
                                        <li class="review-item active"><i class="flaticon-star"></i></li>
                                        <li class="review-item active"><i class="flaticon-star"></i></li>
                                        <li class="review-item"><i class="flaticon-star"></i></li>
                                        <li class="review-item"><i class="flaticon-star"></i></li>
                                    </ul>
                                    <div class="product-price">
                                        <span class="regular-price">$709.08</span>
                                        <span class="price">$600.08</span>
                                    </div>
                                    <div class="variable-single-item color-switch">
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
                                    </div>
                                    <ul class="size-switch">
                                        <li class="single-size">XL</li>
                                        <li class="single-size">LARGE</li>
                                        <li class="single-size">SMALL</li>
                                    </ul>
                                    <a href="cart.html" title="Add to cart" class="add-cart">Add To Cart <i class="icon fas fa-plus-circle"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="featured-items" role="tabpanel" aria-labelledby="featured-items-tab">
                    <div class="row">
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="single-grid-product">
                                <div class="product-top">
                                    <a href="single-product.html"><img class="product-thumbnal" src="assets/images/product-image-1.png" alt="product"></a>
                                    <ul class="prdouct-btn-wrapper">
                                        <li class="single-product-btn">
                                            <a class="addToWishlist product-btn" href="compare.html" title="Add to compare"><i class="icon flaticon-bar-chart"></i></a>
                                        </li>
                                        <li class="single-product-btn">
                                            <a class="addCompare product-btn" href="wish-list.html" title="Add to wishlist"><i class="icon flaticon-like"></i></a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="product-info text-center">
                                    <h4 class="product-catagory">ELLA - HALOTHEMES</h4>
                                    <h3 class="product-name"><a class="product-link" href="single-product.html">Rosmo Namino Milancelos</a></h3>
                                    <ul class="product-review">
                                        <li class="review-item active"><i class="flaticon-star"></i></li>
                                        <li class="review-item active"><i class="flaticon-star"></i></li>
                                        <li class="review-item active"><i class="flaticon-star"></i></li>
                                        <li class="review-item"><i class="flaticon-star"></i></li>
                                        <li class="review-item"><i class="flaticon-star"></i></li>
                                    </ul>
                                    <div class="product-price">
                                        <span class="regular-price">$770.18</span>
                                        <span class="price">$700.08</span>
                                    </div>
                                    <div class="variable-single-item color-switch">
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
                                    </div>
                                    <ul class="size-switch">
                                        <li class="single-size active">XL</li>
                                        <li class="single-size">LARGE</li>
                                        <li class="single-size">SMALL</li>
                                    </ul>
                                    <a href="cart.html" title="Add to cart" class="add-cart">Add To Cart <i class="icon fas fa-plus-circle"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="single-grid-product">
                                <div class="product-top">
                                    <a href="single-product.html"><img class="product-thumbnal" src="assets/images/product-image-2.png" alt="product"></a>
                                    <div class="product-flags">
                                        <span class="product-flag sale">SALE</span>
                                        <span class="product-flag discount">-15%</span>
                                    </div>
                                    <ul class="prdouct-btn-wrapper">
                                        <li class="single-product-btn">
                                            <a class="addToWishlist product-btn" href="compare.html" title="Add to compare"><i class="icon flaticon-bar-chart"></i></a>
                                        </li>
                                        <li class="single-product-btn">
                                            <a class="addCompare product-btn" href="wish-list.html" title="Add to wishlist"><i class="icon flaticon-like"></i></a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="product-info text-center">
                                    <h4 class="product-catagory">Home - Collection</h4>
                                    <h3 class="product-name"><a class="product-link" href="single-product.html">Tailored Fit Mesh-Panel Polo</a></h3>
                                    <ul class="product-review">
                                        <li class="review-item active"><i class="flaticon-star"></i></li>
                                        <li class="review-item active"><i class="flaticon-star"></i></li>
                                        <li class="review-item active"><i class="flaticon-star"></i></li>
                                        <li class="review-item"><i class="flaticon-star"></i></li>
                                        <li class="review-item"><i class="flaticon-star"></i></li>
                                    </ul>
                                    <div class="product-price">
                                        <span class="regular-price">$220.08</span>
                                        <span class="price">$200.08</span>
                                    </div>
                                    <div class="variable-single-item color-switch">
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
                                    </div>
                                    <ul class="size-switch">
                                        <li class="single-size">XL</li>
                                        <li class="single-size">LARGE</li>
                                        <li class="single-size">SMALL</li>
                                    </ul>
                                    <a href="cart.html" title="Add to cart" class="add-cart">Add To Cart <i class="icon fas fa-plus-circle"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="single-grid-product">
                                <div class="product-top">
                                    <a href="single-product.html"><img class="product-thumbnal" src="assets/images/product-image-3.png" alt="product"></a>
                                    <div class="product-flags">
                                        <span class="product-flag discount">-15%</span>
                                    </div>
                                    <ul class="prdouct-btn-wrapper">
                                        <li class="single-product-btn">
                                            <a class="addToWishlist product-btn" href="compare.html" title="Add to compare"><i class="icon flaticon-bar-chart"></i></a>
                                        </li>
                                        <li class="single-product-btn">
                                            <a class="addCompare product-btn" href="wish-list.html" title="Add to wishlist"><i class="icon flaticon-like"></i></a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="product-info text-center">
                                    <h4 class="product-catagory">Hot - Collection</h4>
                                    <h3 class="product-name"><a class="product-link" href="single-product.html">Fit-Flare Dress</a></h3>
                                    <ul class="product-review">
                                        <li class="review-item active"><i class="flaticon-star"></i></li>
                                        <li class="review-item active"><i class="flaticon-star"></i></li>
                                        <li class="review-item active"><i class="flaticon-star"></i></li>
                                        <li class="review-item"><i class="flaticon-star"></i></li>
                                        <li class="review-item"><i class="flaticon-star"></i></li>
                                    </ul>
                                    <div class="product-price">
                                        <span class="regular-price">$748.08</span>
                                        <span class="price">$730.08</span>
                                    </div>
                                    <div class="variable-single-item color-switch">
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
                                    </div>
                                    <ul class="size-switch">
                                        <li class="single-size">XL</li>
                                        <li class="single-size">LARGE</li>
                                        <li class="single-size">SMALL</li>
                                    </ul>
                                    <a href="cart.html" title="Add to cart" class="add-cart">Add To Cart <i class="icon fas fa-plus-circle"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="single-grid-product">
                                <div class="product-top">
                                    <a href="single-product.html"><img class="product-thumbnal" src="assets/images/product-image-4.png" alt="product"></a>
                                    <div class="product-flags">
                                        <span class="product-flag sale">SALE</span>
                                    </div>
                                    <ul class="prdouct-btn-wrapper">
                                        <li class="single-product-btn">
                                            <a class="addToWishlist product-btn" href="compare.html" title="Add to compare"><i class="icon flaticon-bar-chart"></i></a>
                                        </li>
                                        <li class="single-product-btn">
                                            <a class="addCompare product-btn" href="wish-list.html" title="Add to wishlist"><i class="icon flaticon-like"></i></a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="product-info text-center">
                                    <h4 class="product-catagory">ELLA - HALOTHEMES</h4>
                                    <h3 class="product-name"><a class="product-link" href="single-product.html">Midi Dress</a></h3>
                                    <ul class="product-review">
                                        <li class="review-item active"><i class="flaticon-star"></i></li>
                                        <li class="review-item active"><i class="flaticon-star"></i></li>
                                        <li class="review-item active"><i class="flaticon-star"></i></li>
                                        <li class="review-item"><i class="flaticon-star"></i></li>
                                        <li class="review-item"><i class="flaticon-star"></i></li>
                                    </ul>
                                    <div class="product-price">
                                        <span class="regular-price">$709.08</span>
                                        <span class="price">$600.08</span>
                                    </div>
                                    <div class="variable-single-item color-switch">
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
                                    </div>
                                    <ul class="size-switch">
                                        <li class="single-size">XL</li>
                                        <li class="single-size">LARGE</li>
                                        <li class="single-size">SMALL</li>
                                    </ul>
                                    <a href="cart.html" title="Add to cart" class="add-cart">Add To Cart <i class="icon fas fa-plus-circle"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- Trending Products area end here  -->

    <!-- product banenr area start here  -->
    <!-- <div class="product-banner pb-100">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <a href="shop-list.html" class="single-banner"><img class="banner-image" src="assets/images/product-banner-1.jpg" alt="product-banner"></a>
                </div>
                <div class="col-md-7">
                    <a href="shop-list-left-sidebar.html" class="single-banner"><img class="banner-image" src="assets/images/product-banner-2.jpg" alt="product-banner"></a>
                </div>
            </div>
        </div>
    </div> -->
    <!-- product banenr area end here  -->

    <!-- Blog area start here  -->
    <!-- <div class="blog-area section-top section-bg pb-100">
        <div class="container">
            <div class="section-header-area">
                <div class="row">
                    <div class="col-md-6">
                        <h3 class="sub-title">Blogspot</h3>
                        <h2 class="section-title">News From Our Blog</h2>
                    </div>
                    <div class="col-md-6 align-self-end text-md-end">
                        <a href="blog.html" class="see-btn">See All</a>
                    </div>
                </div>
            </div>

            <div class="blog-slide">

                <!-- Blog Item Start -->
                <!-- <div class="single-grid-blog">
                    <div class="blog-thumbnail">
                        <a href="single-blog.html"><img class="thumbnail-image" src="assets/images/blog-1.jpg" alt="blog"></a>
                    </div>
                    <div class="blog-info">
                        <ul class="blog-category">
                            <li class="single-category"><a class="category-text" href="single-blog.html">fashion</a></li>
                            <li class="single-category"><a class="category-text" href="single-blog.html">LAUNCH</a></li>
                        </ul>
                        <h3 class="blog-title"><a class="blog-link" href="single-blog.html">Swimwear is your bestfriend</a></h3>
                        <p class="blog-content">Over the last several months we have been working with leather, wood and metal artisans develop something special. Today we are excited to debut our </p>
                        <a class="blog-btn" href="single-blog.html">See Details</a>
                    </div>
                </div> -->
                <!-- Blog Item End -->

                <!-- Blog Item Start -->
                <!-- <div class="single-grid-blog">
                    <div class="blog-thumbnail">
                        <a href="single-blog.html"><img class="thumbnail-image" src="assets/images/blog-2.jpg" alt="blog"></a>
                    </div>
                    <div class="blog-info">
                        <ul class="blog-category">
                            <li class="single-category"><a class="category-text" href="single-blog.html">PRODUCT</a></li>
                            <li class="single-category"><a class="category-text" href="single-blog.html">Hot Collection</a></li>
                        </ul>
                        <h3 class="blog-title"><a class="blog-link" href="single-blog.html">New line of office products</a></h3>
                        <p class="blog-content">Over the last several months we have been working with leather, wood and metal artisans develop something special. Today we are excited to debut our </p>
                        <a class="blog-btn" href="single-blog.html">See Details</a>
                    </div>
                </div> -->
                <!-- Blog Item End -->

                <!-- Blog Item Start -->
                <!-- <div class="single-grid-blog">
                    <div class="blog-thumbnail">
                        <a href="single-blog.html"><img class="thumbnail-image" src="assets/images/blog-3.jpg" alt="blog"></a>
                    </div>
                    <div class="blog-info">
                        <ul class="blog-category">
                            <li class="single-category"><a class="category-text" href="single-blog.html">Cloths</a></li>
                            <li class="single-category"><a class="category-text" href="single-blog.html">INTERVIEW</a></li>
                        </ul>
                        <h3 class="blog-title"><a class="blog-link" href="single-blog.html">Fashion Week desk office</a></h3>
                        <p class="blog-content">Over the last several months we have been working with leather, wood and metal artisans develop something special. Today we are excited to debut our </p>
                        <a class="blog-btn" href="single-blog.html">See Details</a>
                    </div>
                </div> -->
                <!-- Blog Item End -->

                <!-- Blog Item Start -->
                <!-- <div class="single-grid-blog">
                    <div class="blog-thumbnail">
                        <a href="single-blog.html"><img class="thumbnail-image" src="assets/images/blog-4.jpg" alt="blog"></a>
                    </div>
                    <div class="blog-info">
                        <ul class="blog-category">
                            <li class="single-category"><a class="category-text" href="single-blog.html">Bags</a></li>
                            <li class="single-category"><a class="category-text" href="single-blog.html">New Collectio</a></li>
                        </ul>
                        <h3 class="blog-title"><a class="blog-link" href="single-blog.html">Your best winter collection</a></h3>
                        <p class="blog-content">Over the last several months we have been working with leather, wood and metal artisans develop something special. Today we are excited to debut our </p>
                        <a class="blog-btn" href="single-blog.html">See Details</a>
                    </div>
                </div> -->
                <!-- Blog Item End -->
            <!-- </div>
        </div> -->
    <!-- </div> -->
    <!-- Blog area end here  -->

    <!-- Image Gallery area start here  -->
    <!-- <div class="image-gallery-area section-top pb-110">
        <div class="container">
            <div class="row">

                <div class="col-lg-4 col-md-4">
                    <div class="section-header-area">
                        <h3 class="sub-title">Image Gallery</h3>
                        <h2 class="section-title">Image Gallery To Zairito For Making Better Online Shopping Experience</h2>
                    </div>

                    <div class="single-gallery">
                        <img class="gallery-image" src="assets/images/gallery-1.jpg" alt="gallery">
                        <div class="popuo-overlay">
                            <a class="popup-image" href="assets/images/gallery-1.jpg"><i class="view-icon flaticon-view"></i></a>
                        </div>
                    </div>
                    <div class="single-gallery big-height">
                        <img class="gallery-image" src="assets/images/gallery-2.jpg" alt="gallery">
                        <div class="popuo-overlay">
                            <a class="popup-image" href="assets/images/gallery-2.jpg"><i class="view-icon flaticon-view"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4">
                    <div class="single-gallery">
                        <img class="gallery-image" src="assets/images/gallery-3.jpg" alt="gallery">
                        <div class="popuo-overlay">
                            <a class="popup-image" href="assets/images/gallery-3.jpg"><i class="view-icon flaticon-view"></i></a>
                        </div>
                    </div>
                    <div class="single-gallery">
                        <img class="gallery-image" src="assets/images/gallery-4.jpg" alt="gallery">
                        <div class="popuo-overlay">
                            <a class="popup-image" href="assets/images/gallery-4.jpg"><i class="view-icon flaticon-view"></i></a>
                        </div>
                    </div>
                    <div class="single-gallery">
                        <img class="gallery-image" src="assets/images/gallery-5.jpg" alt="gallery">
                        <div class="popuo-overlay">
                            <a class="popup-image" href="assets/images/gallery-5.jpg"><i class="view-icon flaticon-view"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4">
                    <div class="single-gallery">
                        <img class="gallery-image" src="assets/images/gallery-6.jpg" alt="gallery">
                        <div class="popuo-overlay">
                            <a class="popup-image" href="assets/images/gallery-6.jpg"><i class="view-icon flaticon-view"></i></a>
                        </div>
                    </div>
                    <div class="single-gallery">
                        <img class="gallery-image" src="assets/images/gallery-7.jpg" alt="gallery">
                        <div class="popuo-overlay">
                            <a class="popup-image" href="assets/images/gallery-7.jpg"><i class="view-icon flaticon-view"></i></a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div> -->
    <!-- Image Gallery area end here  -->

    <!-- Testimonial ara start here  -->
    <!-- <div class="testimonial-area section section-bg">
        <div class="container">
            <div class="section-header-area text-center">
                <h3 class="sub-title">Testimonial</h3>
                <h2 class="section-title">What People Are <br>Saying About Oursalve</h2>
                <p>Praesent sapien massa, convallis a pellentesque nec, egestas Vivamus magna justo, lacinia eget consectetur sed</p>
            </div>

            <div class="testimonial-slide-top">

                 Testimonial authors Float Images Start -->
                <!-- <img src="assets/images/testimonial-images/l-1.png" alt="img" class="testimonial-float-img testimonial-left-1 position-absolute">
                <img src="assets/images/testimonial-images/l-2.png" alt="img" class="testimonial-float-img testimonial-left-2 position-absolute">
                <img src="assets/images/testimonial-images/l-3.png" alt="img" class="testimonial-float-img testimonial-left-3 position-absolute">
                <img src="assets/images/testimonial-images/l-4.png" alt="img" class="testimonial-float-img testimonial-left-4 position-absolute">
                <img src="assets/images/testimonial-images/r-1.png" alt="img" class="testimonial-float-img testimonial-right-1 position-absolute">
                <img src="assets/images/testimonial-images/r-2.png" alt="img" class="testimonial-float-img testimonial-right-2 position-absolute">
                <img src="assets/images/testimonial-images/r-3.png" alt="img" class="testimonial-float-img testimonial-right-3 position-absolute">
                <img src="assets/images/testimonial-images/r-4.png" alt="img" class="testimonial-float-img testimonial-right-4 position-absolute">
                Testimonial authors Float Images End -->

                <!-- <img class="shape-image" src="assets/images/shape.png" alt="shape">
                <div class="testimonial-image-slide">
                    <div class="signle-testimonial-image"><img class="testimonial-image" src="assets/images/testimonal-image-1.png" alt="testimonal-image"></div>
                    <div class="signle-testimonial-image"><img class="testimonial-image" src="assets/images/testimonal-image-2.png" alt="testimonal-image"></div>
                    <div class="signle-testimonial-image"><img class="testimonial-image" src="assets/images/testimonal-image-3.png" alt="testimonal-image"></div>
                </div> -->
            <!-- </div>

            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="testimonail-slide">
                        <div class="single-testimonial">
                            <p class="testimonial-text">Nulla porttitor accumsan tincidunt. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Sed porttitor lectus nibh. Proin eget tortor risus. Proin eget tortor risus. Curabitur arcu</p>
                            <h3 class="testimonial-title">Andrew Franklin Saimond</h3>
                            <ul class="review-area">
                                <li><i class="flaticon-star"></i></li>
                                <li><i class="flaticon-star"></i></li>
                                <li><i class="flaticon-star"></i></li>
                                <li><i class="flaticon-star"></i></li>
                                <li><i class="flaticon-star"></i></li>
                            </ul>
                        </div>
                        <div class="single-testimonial">
                            <p class="testimonial-text">Nulla porttitor accumsan tincidunt. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Sed porttitor lectus nibh. Proin eget tortor risus. Proin eget tortor risus. Curabitur arcu</p>
                            <h3 class="testimonial-title">Bndrew Aranklin</h3>
                            <ul class="review-area">
                                <li><i class="flaticon-star"></i></li>
                                <li><i class="flaticon-star"></i></li>
                                <li><i class="flaticon-star"></i></li>
                                <li><i class="flaticon-star"></i></li>
                                <li><i class="flaticon-star"></i></li>
                            </ul>
                        </div>
                        <div class="single-testimonial">
                            <p class="testimonial-text">Nulla porttitor accumsan tincidunt. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Sed porttitor lectus nibh. Proin eget tortor risus. Proin eget tortor risus. Curabitur arcu</p>
                            <h3 class="testimonial-title">Dndrew Jaimond</h3>
                            <ul class="review-area">
                                <li><i class="flaticon-star"></i></li>
                                <li><i class="flaticon-star"></i></li>
                                <li><i class="flaticon-star"></i></li>
                                <li><i class="flaticon-star"></i></li>
                                <li><i class="flaticon-star"></i></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div> -->
<!-- 
        </div>
    </div>  -->
    <!-- Testimonial ara end here  -->

    <!-- shop map area start here  -->
    <!-- <div class="shop-map-area">
        <div class="shop-info">
            <div class="shop-info-left">
                <h2 class="shop-info-title">Local Pickup Available</h2>
                <p class="shop-info-sub-title">301 Front St Toronto, Canada</p>
                <ul class="shop-opaing-time">
                    <li class="open-time">Mon - Fri, 8:30am - 10:30pm,</li>
                    <li class="open-time">Sunday, 8:30am - 10:30pm</li>
                </ul>
            </div>
            <div class="shop-info-right">
                <span class="label">Shops Image</span>
            </div>
        </div>
        <div id="gmap" class="google-map">
            <iframe src="../maps/embed.html?pb=!1m18!1m12!1m3!1d1839.0179632416985!2d89.5538504127622!3d22.801132631062536!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39ff8f2b1098bf95%3A0xbce09c90b98f8380!2sJust%20Orders%20Khulna!5e0!3m2!1sen!2sbd!4v1636005141952!5m2!1sen!2sbd"
                style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
    </div> -->
   
<script type="text/javascript">
        
        $(document).ready(function() { 
       

        $.ajax({
                url: 'ajax.php?action=featured',
                type: 'post',
                data: {
                   
                },
                success: function(response){
                    // console.log(response);
                    $("#featured").html(response);

                }               
		});

        $.ajax({
                url: 'ajax.php?action=onsale',
                type: 'post',
                data: {
                   
                },
                success: function(response){
                    // console.log(response);
                    $("#onsale").html(response);

                }               
		});
        $.ajax({
                url: 'ajax.php?action=newarrivals',
                type: 'post',
                data: {
                   
                },
                success: function(response){
                    // console.log(response);
                    $("#newarrivals").html(response);

                }               
		});
    });
</script>
<?php 
include './footer.php'
?>