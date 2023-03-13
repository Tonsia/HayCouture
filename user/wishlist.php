<?php include 'header.php';
    if(!isset($_SESSION['regid'])){
        echo '<script type="text/javascript"> window.location.href="../auth/signin.php"; </script>';
    }
?>
        


        <!-- breadcrumb area start here  -->
        <div class="breadcrumb-area">
            <div class="container">
                <div class="breadcrumb-wrap text-center">
                    <h2 class="page-title">Wish List</h2>
                    <ul class="breadcrumb-pages">
                        <li class="page-item"><a class="page-item-link" href="index.php">Home</a></li>
                        <li class="page-item">Wish List</li>
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
                                <th scope="col">Image</th>
                                <th scope="col">Product Name</th>
                                <th scope="col">Price</th>
                                <th scope="col">Action</th>
                                <th scope="col">Remove</th>
                              </tr>
                            </thead>
                            <tbody>
                            <?php

                            include 'db_connect.php';
                            $userid = $_SESSION['regid'];
                            $qry0 = $conn->query("SELECT * FROM wishlist WHERE userid = '$userid' AND status = '1'");
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
                                            $qry1=$conn->query("SELECT * FROM color_details where product_id='$productid'"); $row1=$qry1->fetch_array();
                                            $img=$row1["img1"];

                                            $data .= '<tr>
                                                        <td>
                                                            <div class="product-image">
                                                                <a href="./productpage?productid='.$productid.'"><img class="product-thumbnal" src="../admin/'.$img.'" alt="product"></a>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="product-info text-center">
                                                                <h4 class="product-catagory">ELLA - HALOTHEMES</h4>
                                                                <h3 class="product-name"><a class="product-link" href="./productpage?productid='.$productid.'">'.$row["p_name"].'</a></h3>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="product-price text-center">
                                                                <h3 class="price">₹'.$row["product_total"].'</h3>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="action-area">
                                                                <a class="buy-btn action-btn mt-15" href="./productpage?productid='.$productid.'">Buy Now</a>
                                                            </div>
                                                        </td>
                                                        <td><button onclick="remwishlist('.$row0['id'].')" class="delet-btn" title="Delete Item"><img src="assets/images/close.svg" alt="close"></button></td>
                                                    </tr>';



                                        }
                                    }
                                    
                                }    
                            }else{
                                echo("<script>location.href = './emptywishlist.php';</script>");
                            }
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
        <script>
            function remwishlist(e){
                $.ajax({
                    url: "ajax.php?action=remwishlist", 
                    type: "POST",
                    data: {
                       id : e,
                    },
                    success: function(result){   
                        location.reload();  
                    }
                });
            }
        </script>
        <?php include './footer.php' ?>
