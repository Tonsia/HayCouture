<?php include './master.head.php';?>
    <div class="row">
        <div class="col-md-12">
            <div class="breadcrumb__content">
                <div class="breadcrumb__content__left">
                    <div class="breadcrumb__title">
                        <h2>Add Coupon</h2>
                    </div>
                </div>
                <div class="breadcrumb__content__right">
                    <nav aria-label="breadcrumb">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
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

                                        <form id="addcoupon" enctype="multipart/form-data" method="POST" action="">
                                            <div class="input__group mb-25">
                                                <label for="exampleInputEmail1">Coupon code</label>
                                                <input type="text" id="coupon_code" name="coupon_code">
                                            </div>
                                            <div class="input__group mb-25">
                                                <label for="exampleInputEmail1">Amount</label>
                                                <input type="number" min="1" step="0.01" id="amount" name="amount" value="1">
                                            </div>
                                            <div class="input__group mb-25">
                                                <label for="exampleInputEmail1">Minimum Expense</label>
                                                <input type="number" min="0" step="0.01" id="min_expenses" name="min_expenses">
                                            </div>
                                            <div class="input__group mb-25">
                                                <label for="exampleInputEmail1">Expire Date</label>
                                                <input type="date" id="expire_date" name="expire_date">
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
        var today = new Date().toISOString().split('T')[0];
          $("#expire_date").attr('min', today);
          $('#coupon_code').on('input', function(){
				var value = '#coupon_code';
					$.ajax({
						url: 'ajax.php?action=availcouponcheck',
						type: 'post',
						data: {
                            value:$(value).val().trim(),
                            tname:'coupon',
                            cname:'couponcode'
                        },
						success: function(response){
                            if(response==1){
                                status = 'taken';
                                const valEl = document.querySelector(value);
                                valEl.insertAdjacentHTML("afterend",'<div class="invalid-feedback has-error-alpha notavail" style="display: inline-block;">Already taken</div>') 
                            }
                            else{
                                status = 'avail';
                                if ($(".notavail").parent().length){
                                    $(".notavail").remove();
                                }  
                            }
                            //alert(status);
						}
					});
			});

            $('#addcoupon').submit(function(e) {
                e.preventDefault();
                if(status==='avail'){
                $.ajax({
                        type: "POST",
                        url: 'ajax.php?action=addcoupon',
                        data: $(this).serialize(),
                        success: function(response)
                        {
                             //document.write(response);
                            // console.log(response);
                            if(response==1){
                                //alert("Coupon Added Successfully");
                                // Swal.fire({
                                //     position: 'top-end',
                                //     icon: 'success',
                                //     title: 'Coupon Added Successfully',
                                //     showConfirmButton: false,
                                //     timer: 1500
                                //     window.location.href = "couponsList.php";
                                //     })

                                Swal.fire({
                                        position: 'center',
                                        icon: 'success',
                                        title: "Coupon Added Successfully!",
                                        // text: "Message!",
                                        // showConfirmButton: false,
                                        type: "success"
                                        
                                    }).then(function() {
                                        window.location = "couponsList.php";
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
                }
            });
       });
    </script>
    <?php include './master.foot.php';?>


