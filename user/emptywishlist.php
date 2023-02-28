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

      

        <!-- empty-wish-list area start here  -->
        <div class="empty-wish-list section">
            <div class="container">
                <div class="empty-box-wrap text-center">
                    <img class="empty-box-img" src="assets/images/empty-box.png" alt="empty-box">
                    <h2 class="empty-box-title">Your Wishlist is Empty</h2>
                    <a href="./index.php" class="primary-btn">Add Now</a>
                </div>
            </div>
        </div>
        <!-- empty-wish-list area end here  -->

<?php include './footer.php' ?>
