<?php include './master.head.php';?>
    <div class="row">
        <div class="col-md-12">
            <div class="breadcrumb__content">
                <div class="breadcrumb__content__left">
                    <div class="breadcrumb__title">
                        <h2>Add Stock</h2>
                    </div>
                </div>
                <div class="breadcrumb__content__right">
                    <nav aria-label="breadcrumb">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Stock</li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="gallery__area bg-style">
                <div class="gallery__content">
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-one" role="tabpanel" aria-labelledby="nav-one-tab">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-vertical__item bg-style">

                                        <form id="addstock" enctype="multipart/form-data" method="POST" action="">
                                            <div class="input__group mb-25">
                                                <label for="exampleInputEmail1">Product Details</label>
                                                <select class="form-control" id="pdt" name="pdt"> 
                                                <?php
                                                include "db_connect.php";
                                                
                                                $query = "SELECT * FROM products";
                                                
                                                $result = $conn->query($query);
                                                while ($row = $result->fetch_assoc()) {
                                                    echo "<option value='".$row['product_id']."'>".$row['p_name']." - ".$row['product_id']."</option>";
                                                }
                                                ?>
                                                 
                                                </select>
                                            </div>

                                            <div class="input__group mb-25">
                                                <label for="exampleInputEmail1">Size</label>
                                                <select class="form-control" id="size" name="size"> 
                                                <?php
                                                include "db_connect.php";
                                                
                                                $query = "SELECT * FROM product_size";
                                                
                                                $result = $conn->query($query);
                                                while ($row = $result->fetch_assoc()) {
                                                    echo "<option value='".$row['size_id']."'>".$row['size']."</option>";
                                                }
                                                ?>
                                                 
                                                </select>
                                            </div>

                                            <div class="input__group mb-25">
                                                <label for="exampleInputEmail1">Stock Remaining</label>
                                                <input type="number" id="remstock" name="remstock" value="0" readonly>
                                            </div>

                                            <div class="input__group mb-25">
                                                <label for="exampleInputEmail1">Enter Stock to be Added</label>
                                                <input type="number" min="0" id="stockamt" name="stockamt">
                                            </div>

                                            <div class="input__button">
                                                <button type="submit" class="btn btn-blue">Add</button>
                                            </div>
                                        
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <?php include './js.php';?>
    <script>
         var status = 'not';//valid
       bootstrapValidate('#coupon_code', 'alpha:Already Taken');
</script>
<script>
    var status='';
       $(document).ready(function() {

        $("#pdt").change(function() {
            var pdt = $("#pdt").val();
           
                $.ajax({
                        type: "POST",
                        url: 'ajax.php?action=getsizefromid',
                        data: {
                            pdt: pdt
                        },
                        success: function(response)
                        {
                            //document.write(response);
                            //$("#size").val(response)
                            $('#size').html(response);
                        }

             });
        });

        $("#size").click(function() {
                $.ajax({
                        type: "POST",
                        url: 'ajax.php?action=getstock',
                        data: {
                            size: $("#size").val(),
                            pdtid: $("#pdt").val()
                        },
                        success: function(response)
                        {
                            //alert(response);
                            console.log(response.trim())
                            $("#remstock").val(response.trim())
                        }

             });
        });

        $('#addstock').submit(function(e) {
            e.preventDefault();

            if(!$("#stockamt").val()>0){
                return;
            }

            Swal.fire({
                title: 'Save the changes?',
                showCancelButton: true,
                confirmButtonText: 'Save',
            }).then((result) => {

                if (result.isConfirmed) {
                    $.ajax({
                        type: "POST",
                        url: 'ajax.php?action=addstock',
                        data: {
                            size: $("#size").val(),
                            pdtid: $("#pdt").val(),
                            stockamt: $("#stockamt").val()

                        },
                        success: function(response)
                        {   
                            //document.write(response);   
                            if(response==1){
                                Swal.fire({
                                    position: 'center',
                                    icon: 'success',
                                    title: 'Stock Added',
                                    showConfirmButton: false,
                                    timer: 1500
                                }).then(function() {
                                        window.location = "dashboard.php";
                                });
                            
                            }
                        }
                    }); 
                }


                    


            });
        });
});
</script>
    <?php include './master.foot.php';?>


