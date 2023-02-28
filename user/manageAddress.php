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
                    <h2 class="page-title">Manage Address</h2>
                    <ul class="breadcrumb-pages">
                        <li class="page-item"><a class="page-item-link" href="index.html">Home</a></li>
                        <li class="page-item">Manage Address</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- breadcrumb area end here  -->
        <!-- wish-list area start here  -->
        <div class="wish-list-area  section">
            <div class="container">
                <div class="row">
                    <div class="col-12 wish-list-table">
                        
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="text-align:center" class="w-25" scope="col">No</th>
                                        <th class="w-50" scope="col">Address</th>
                                        <th scope="col">Edit</th>
                                      
                                    </tr>
                                </thead>

                                <tbody id="tbody">
                                    <?php

                                    include 'db_connect.php';
                                    $userid = $_SESSION['regid'];
                                    $qry0 = $conn->query("SELECT * FROM useraddress WHERE regid = '$userid'");
                                    echo $conn->error;
                                    $data="";
                                    $i=1;
                                    if ($qry0->num_rows > 0) 
                                    {
                                        while($row0 = $qry0->fetch_assoc()) 
                                        {
                                            
                                            $cityid = $row0['cityid'];
                                            $districtid = $row0['disctrictid'];
                                            $stateid = $row0['stateid'];

                                            $qry1=$conn->query("SELECT * FROM city where city_id='$cityid'"); $row1=$qry1->fetch_array();
                                            $qry2=$conn->query("SELECT * FROM district where district_id='$districtid'"); $row2=$qry2->fetch_array();
                                            $qry3=$conn->query("SELECT * FROM states where state_id='$stateid'"); $row3=$qry3->fetch_array();

                                            $data .= '<tr class="cart-page-item">
                                                        <td>
                                                        '.$i++.'
                                                        </td>
                                                        <td>
                                                            <div class="single-grid-product m-0">

                                                                <div class="product-info text-center">

                                                                    <h3>'.$row0['name'].'</h3>
                                                                    <h3>'.$row0['hname'].'</h3>
                                                                    <h3>'.$row1['city_name'].','.$row2['district_name'].','.$row3['state_name'].'</h3>
                                                                    <h3>Pin Code : '.$row0['pin'].'</h3>
                                                                    <h3>Mobile : '.$row0['mobile'].'</h3>
                                                                
                                                                </div>
                                                            </div>
                                                        </td>

                                                        <td>
                                                            <button data-bs-toggle="modal" data-bs-target="#createModal1" onclick="edit('.$row0['id'].','.$row0['regid'].')" class="btn btn-success btn-lg"><i class="fas fa-edit"></i> Edit</button>
                                                            <button onclick="remove('.$row0['id'].','.$row0['regid'].')" class="btn btn-danger btn-lg"> <i class="fas fa-trash-alt"></i> Remove </button>
                                                        </td>
                                                        </tr>';
                                        }}
                                        echo $data;
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- wish-list area end here  -->
        <!-- Modal -->
        
        <div class="modal fade" id="createModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New Address</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body col-lg-12">
                <form id="updateaddr">
                    <div class='row'>
                        <div class="col-lg-12">
                            <label for="recipient-name" class="col-form-label">Name</label>
                            <input type="text" class="form-control form-control-lg" id="name" name="name">
                        </div>
                        <div class="col-lg-12">
                            <label for="recipient-name" class="col-form-label">Mobile Number</label>
                            <input type="text" class="form-control form-control-lg" id="mob" name="mob">
                        </div>
                        <div class="col-lg-12">
                            <label for="message-text" class="col-form-label">House Name</label>
                            <input type="text" class="form-control form-control-lg" id="hname" name="hname"></input>
                        </div>
                        <div class="col-lg-6">
                            <label for="message-text" class="col-form-label">State</label>
                            <select class="form-control form-control-lg" id="state" name="state" placeholder="State">
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
                        <input type="hidden" value='0' name="ids" id="ids">
                       
                        <div class="col-lg-6 form-group">
                            <label for="message-text" class="col-form-label">District</label>
                            <select class="form-control form-control-lg" id="district" name="district" placeholder="District">
                            
                            </select>
                        </div>
                        <div class="col-lg-6">
                            <label for="message-text" class="col-form-label">City</label>
                            <select class="form-control form-control-lg" id="city" name="city" placeholder="City">
                       
                            </select>
                        </div>
                        <div class="col-lg-6">
                            <label for="message-text" class="col-form-label">Pin Code</label>
                            <input type="text" class="form-control form-control-lg" id="pcode" name="pcode"></input>
                        </div>
                    </div>
                    
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-lg" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary btn-lg">Submit</button>
            </div>
            </form>
            </div>
        </div>
        </div>
 
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            

            $("#state").hover(function(){
                //alert($("#state").val())
                $.ajax({
                    url: 'ajax.php?action=districtsid',
                    type: 'post',
                    data: {
                        stateid : $("#state").val()
                    },
                    success: function(response){
                        //console.log(response);
                        //document.write(response);
                        $('#district').html(response);
                        

                    }               
                });
            });

            $("#district").hover(function(){
                //alert($("#state").val())
                $.ajax({
                    url: 'ajax.php?action=citysid',
                    type: 'post',
                    data: {
                        district_id : $("#district").val()
                    },
                    success: function(response){
                        //console.log(response);
                        //document.write(response);
                        $('#city').html(response);
                        

                    }               
                });
            });

            function edit(e,s){
                $.ajax({
                    url: 'ajax.php?action=getuseraddr',
                    type: 'post',
                    data: {
                        addrid : e,
                        regid : s
                    },
                    success: function(respons){
                        
                        var response = $.parseJSON(respons);
                        console.log(response[0]);
                        //document.write(response);
                        $('#name').val(response[0]['name']);
                        $('#mob').val(response[0]['mobile']);
                        $('#hname').val(response[0]['hname']);
                        $('#pcode').val(response[0]['pin']);
                        $('#ids').val(response[0]['id']);
                     

                    }               
                });
               
            }

            function remove(e,s){
                
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, Remove it!'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: 'ajax.php?action=removeaddr',
                            type: 'post',
                            data: {
                                addrid : e,
                                regid : s
                            },
                            success: function(response){

                                location.reload();
                                

                            }               
                        });
                        
                    }
                    })
 
            }

            $(document).ready(function() {
            $("#updateaddr").submit(function(e) {
                e.preventDefault();
                //alert('hi')
               
                $.ajax({
                type: "POST",
                url: "ajax.php?action=updateaddr",
                data: $(this).serialize(),
                success: function(data) {
                    location.reload();
                }
                });
            });
            });
        </script>
        <?php include './footer.php' ?>