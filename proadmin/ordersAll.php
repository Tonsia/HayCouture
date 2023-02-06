<?php include './master.head.php';?>
    <div id="table-url"></div>
    <div class="row">
        <div class="col-md-12">
            <div class="breadcrumb__content">
                <div class="breadcrumb__content__left">
                    <div class="breadcrumb__title">
                        <h2>Orders</h2>
                    </div>
                </div>
                <div class="breadcrumb__content__right">
                    <nav aria-label="breadcrumb">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Orders</li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="customers__area bg-style mb-30">
                <div class="customers__table">
                    <table id="orderdata" class="row-border data-table-filter table-style">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>User</th>
                            <th>Product Name</th>
                            <th>Product Image</th>
                            <th>Size</th>
                            <th>Color</th>
                            <th>Quantity</th>
                            <th>Total Amount</th>
                            <th>Payment ID</th>
                            <th>Created At</th>
                            <th>Payment Method</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php
                                    include 'db_connect.php';
                                   
                                    $qry0 = $conn->query("SELECT * FROM orders");
                                    if ($qry0->num_rows > 0) 
                                    {
                                        $i=1;
                                        while($row0 = $qry0->fetch_assoc()) 
                                        {
                                            $cartid = $row0["cartid"];
                                            $userid = $row0["userid"];
                                            $qry1 = $conn->query("SELECT * FROM cart WHERE id = '$cartid'");$row1 = $qry1->fetch_assoc();
                                            $productid = $row1["productid"];
                                            $size_id = $row1["size_id"];
                                            $color_id = $row1["color_id"];
                                            $quantity = $row1["quantity"];
                                            $status = $row1["status"];
                                            $qry2=$conn->query("SELECT * FROM product_color where color_id ='$color_id'"); $row2=$qry2->fetch_array();
                                            $qry3=$conn->query("SELECT * FROM product_size where size_id ='$size_id'"); $row3=$qry3->fetch_array();
                                            $qry4=$conn->query("SELECT * FROM products where product_id  ='$productid'"); $row4=$qry4->fetch_array();
                                            $qry5=$conn->query("SELECT * FROM color_details where product_id='$productid' AND color_id='$color_id'"); $row5=$qry5->fetch_array();
                                            $qry6=$conn->query("SELECT * FROM registration where reg_id ='$userid'"); $row6=$qry6->fetch_array();

                                            $statusstr = '';
                                            if($status==2){
                                                $statusstr = "Pending";
                                            }else if($status==3){
                                                $statusstr = "Processing";
                                            }else if($status==4){
                                                $statusstr = "Shipped";
                                            }else if($status==5){
                                                $statusstr = "Delivered";
                                            }else if($status==6){
                                                $statusstr = "Refunded";
                                            }else if($status==9){
                                                $statusstr = "Returned";
                                            }

                                            echo '
                                            <tr role="row" class="odd">
                                                <td class="sorting_1">'.$i++.'</td>
                                                <td>'.$row6['reg_name'].'</td>
                                                <td>'.$row4['p_name'].'</td>
                                                <td>
                                                    <img src="http://localhost/proadmin/'.$row5["img1"].'" border="0" height="50" class="img-rounded mr-1" align="center">
                                                </td>
                                                <td>'.$row3["size"].'</td>
                                                <td>'.$row2["color"].'</td>
                                                <td>'.$quantity.'</td>
                                                <td>₹'.$row4["product_total"]*$quantity.'</td>
                                                <td>'.$row0["paymentid"].'</td>
                                                <td>'.$row0["createdtime"].'</td>
                                                <td>UPI</td>
                                                
                                                <td>
                                                    <span class="status bg-primary-light-varient">'.$statusstr.'</span>
                                                </td>
                                                <td>
                                                    <div class="action__buttons">
                                                        <!-- <a href="javascript:void(0)" class="btn-action" onclick="orderDetails(10)" title="Invoice">
                                                            <i class="fas fa-file-invoice"></i>
                                                        </a>-->
                                                        <a  class="btn-action" onclick="changestatus('.$status.','.$cartid.')" title="Change Status">
                                                            <i class="fas fa-bars"></i>
                                                        </a>
                                                    </div>
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
    
<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
      
        <div class="modal-header">
          
          <h4 class="modal-title">Select Order Status</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <div class="modal-body">
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="2" checked>
              <label class="form-check-label" for="inlineRadio1">Pending</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="3">
              <label class="form-check-label" for="inlineRadio2">Processing</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="4" >
              <label class="form-check-label" for="inlineRadio3">Shipped</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="5">
              <label class="form-check-label" for="inlineRadio2">Delivered</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="6" >
              <label class="form-check-label" for="inlineRadio3">Refunded</label>
            </div>
        </div>
        
        <div class="modal-footer">
            <button id="updatebtn" type="button" class="btn btn-success" data-dismiss="modal">Update</button>
        </div>

        <button id="btnpop" type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal" hidden>Open Modal</button>
      </div>
      
    </div>
  </div>
  
    <!-- Page level custom scripts -->

    <script>
        function changestatus(status,e){
            console.log(status);
            $("input[name=inlineRadioOptions][value=" + status + "]").prop('checked', true);
            $("#btnpop").click();
            $("#updatebtn").attr("onclick","func("+e+")");
        }

        function func(e){
            console.log(e);
            console.log(document.querySelector('input[name="inlineRadioOptions"]:checked').value); 
            $.ajax({
                type: "POST",
                url: 'ajax.php?action=orderchangestatus',
                data: {
                    id : e , 
                    value : document.querySelector('input[name="inlineRadioOptions"]:checked').value
                },
                success: function(response)
                {
                    //document.write(response);
                    // console.log(response);
                    location.reload();
                    
                }
            });
        }

       $(document).ready(function() {
            $("#orderdata").dataTable();
       });
    </script>

<?php include './master.foot.php';?>