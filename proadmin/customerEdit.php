

    <?php include './master.head.php';?>

<div class="row">
    <div class="col-md-12">
        <div class="breadcrumb__content">
            <div class="breadcrumb__content__left">
                <div class="breadcrumb__title">
                    <h2>View Customer</h2>
                </div>
            </div>
            <div class="breadcrumb__content__right">
                <nav aria-label="breadcrumb">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="http://localhost/proadmin/dashboard.php">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Category</li>
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
                                    <form id="customerview" enctype="multipart/form-data" method="POST" action="">
                                        <input type="hidden" name="id" value="">
                                        <div class="input__group mb-25">
                                            <label>Name</label>
                                            <input type="text" id="name" name="name" value="" readonly maxlength="59">
                                        </div>
                                        <div class="input__group mb-25">
                                            <label>email</label>
                                            <input type="email" id="email" name="email" maxlength="59" value="" readonly>
                                        </div>
                                        <div class="input__group mb-25">
                                            <label>mob</label>
                                            <input type="text" id="mob" name="mob" value="" readonly maxlength="10">
                                        </div>
                                        <div class="input__group mb-25">
                                            <label>Address</label>
                                            <input type="text" id="addr" name="addr" value="" readonly maxlength="59">
                                        </div>
                                        <div class="input__group mb-25">
                                            <label>state</label>
                                            <input type="text" id="state" name="state" value="" readonly maxlength="20">
                                        </div>
                                        <div class="input__group mb-25">
                                            <label>district</label>
                                            <input type="text" id="district" name="district" value="" readonly maxlength="20">
                                        </div>

                                        <div class="input__group mb-25">
                                            <label>city</label>
                                            <input type="text" id="city" name="city" value="" readonly maxlength="20">
                                        </div>
                                        <div class="input__group mb-25">
                                            <label>pin</label>
                                            <input type="number" id="pin" name="pin" value="" readonly maxlength="6">
                                        </div>

                                        <input type="hidden" id="catid" name="catid" value="<?php echo $_GET['id'] ?> ">
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
<script type="text/javascript">
$(document).ready(function() {
    $.ajax({
            type: "POST",
            url: 'ajax.php?action=custview',
            data: {
                id:<?php echo $_GET['id'] ?>
            },
            success: function(response)
            {
                var data=response.split("#");
                // document.write(data);
                // console.log(data);
                document.getElementById("name").value=data[0].trim();
                document.getElementById("email").value=data[1].trim();
                document.getElementById("mob").value=data[2].trim();
                document.getElementById("addr").value=data[3].trim();
                document.getElementById("state").value=data[4].trim();
                document.getElementById("district").value=data[5].trim();
                document.getElementById("city").value=data[6].trim();
                document.getElementById("pin").value=data[7].trim();

               }
            });
        });
    </script>


<?php include './master.foot.php';?>
