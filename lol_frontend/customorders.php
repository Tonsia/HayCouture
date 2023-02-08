<?php include 'header.php';
    if(!isset($_SESSION['regid'])){
        echo '<script type="text/javascript"> window.location.href="../pro/signin.php"; </script>';
    }
?>

 
        <!-- breadcrumb area start here  -->
        <div class="breadcrumb-area">
            <div class="container">
                <div class="breadcrumb-wrap text-center">
                    <h2 class="page-title">My Custom Orders</h2>
                    <ul class="breadcrumb-pages">
                        <li class="page-item"><a class="page-item-link" href="index.html">Home</a></li>
                        <li class="page-item">My Custom Orders</li>
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
                                    $qryc = $conn->query("SELECT * FROM customorder WHERE userid = '$userid' AND status = '1' and paymentid != 'Pending'");
                                    if ($qryc->num_rows > 0) 
                                    {
                                        $i=1;
                                        while($rowc = $qryc->fetch_assoc()) 
                                        {
                                            
                                            echo '<tr>
                                                <td>
                                                    <div class="action-area">
                                                        '.$i++.'
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="product-image">
                                                        <a href="./productpage?productid='.$rowc['uniqueid'].'"><img class="product-thumbnal" src="http://localhost/lol_frontend/assets/custom-order.jpg" alt="product"></a>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="product-info text-center">
                                                        <h4 class="product-catagory">Product ID : '.$rowc['uniqueid'].'</h4>
                                                        <h3 class="product-name"><a class="product-link" href="./productpage?productid='.$rowc['uniqueid'].'">Custom Product</a></h3>
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
                                                     <button class="btn btn-secondary btn-lg m-5" title="Processing" disabled>Order Placed</button>
                                                </td>
                                               
                                            </tr>';
                                        }
                                    }
                                    
                                    $qry0 = $conn->query("SELECT * FROM orders WHERE userid = '$userid' AND status = '1' ORDER BY createdtime");
                                    if ($qry0->num_rows > 0) 
                                    {
                                        $i=1;
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
                                                        <a href="./productpage?productid='.$productid.'"><img class="product-thumbnal" src="http://localhost/proadmin/assets/uploaded_files/product_images/HCP2531_1.webp" alt="product"></a>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="product-info text-center">
                                                        <h4 class="product-catagory">Product ID : '.$productid.'</h4>
                                                        <h3 class="product-name"><a class="product-link" href="./productpage?productid='.$productid.'">Custom Product</a></h3>
                                                        <h4 class="">Top Color : '.$row2["color"].'</h4>
                                                        <h4 class="">Bottom Color : '.$row2["color"].'</h4>
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