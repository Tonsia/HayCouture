<?php include './master.head.php';?>

    <div class="row">
        <div class="col-md-12">
            <div class="breadcrumb__content">
                <div class="breadcrumb__content__left">
                    <div class="breadcrumb__title">
                        <h2>Edit Coupon</h2>
                    </div>
                </div>
                <div class="breadcrumb__content__right">
                    <nav aria-label="breadcrumb">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Coupon</li>
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
                                        <form id="editcoupon" enctype="multipart/form-data" method="POST" action="">
                                            <?php
                                                include 'db_connect.php';
                                                $id = $_GET['id'];
                                                $qry = $conn->query("SELECT * FROM coupon where id='$id'");
                                                $row = mysqli_fetch_array($qry);
                                            ?>
                                            <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
                                            <div class="input__group mb-25">
                                                <label for="exampleInputEmail1">Coupon code</label>
                                                <input type="text" class="form-control" id="coupon_code" name="coupon_code"  value="<?php echo $row['couponcode'] ?>">
                                            </div>
                                            <div class="input__group mb-25">
                                                <label for="exampleInputEmail1">Amount</label>
                                                <input type="number" min="1" step="0.01" class="form-control" id="amount" name="amount" value="<?php echo $row['amount'] ?>">
                                            </div>
                                            <div class="input__group mb-25">
                                                <label for="exampleInputEmail1">Minimum Expense</label>
                                                <input type="number" min="0" step="0.01" class="form-control" id="min_expenses" name="min_expenses" value="<?php echo $row['minexpense'] ?>">
                                            </div>
                                            <div class="input__group mb-25">
                                                <label for="exampleInputEmail1">Expire Date</label>
                                                <input type="date" class="form-control" id="expire_date" name="expire_date"  value="<?php echo $row['expiredate'] ?>">
                                            </div>
                                            <div class="input__button">
                                                <button type="submit" class="btn btn-blue">Update</button>
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
    <script>
       $(document).ready(function() {
        var today = new Date().toISOString().split('T')[0];
          $("#expire_date").attr('min', today);
            $('#editcoupon').submit(function(e) {
                e.preventDefault();
                $.ajax({
                        type: "POST",
                        url: 'ajax.php?action=editcoupon',
                        data: $(this).serialize(),
                        success: function(response)
                        {
                             //document.write(response);
                            // console.log(response);
                            if(response==1){
                              .fire({
                                        position: 'center',
                                        icon: 'success',
                                        title: "Coupon Added Successfully!",
                                        // text: "Message!",
                                        // showConfirmButton: false,
                                        type: "success"
                                        
                                    }).then(function() {
                                        Swalwindow.location = "couponsList.php";
                                    });
                            }
                            else if(response==3)
                            {
                                Swal.fire({
                                        icon: 'error',
                                        text: 'Amount should be lesser than minimum expense!',
                                        })
                            }
                            else{
                                Swal.fire({
                                        icon: 'warning',
                                        text: 'Please Fill All Details!',
                                        })
                            }
                        }
                    }); 
            });
       });
    </script>
    <?php include './master.foot.php';?>


