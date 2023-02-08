

    <?php include './master.head.php';?>

    <div class="row">
        <div class="col-md-12">
            <div class="breadcrumb__content">
                <div class="breadcrumb__content__left">
                    <div class="breadcrumb__title">
                        <h2>Edit Category</h2>
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
                                        <form id="catupdate" enctype="multipart/form-data" method="POST" action="">
                                            <input type="hidden" name="id" value="">
                                            <div class="input__group mb-25">
                                                <label>Category Name</label>
                                                <input type="text" id="catname" name="catname" value="" required  maxlength="29" pattern="[a-zA-Z ]*$">
                                            </div>
                                            <div class="input__group mb-25">
                                                <label>Description</label>
                                                <textarea name="catdesc" id="catdesc" maxlength="499" required></textarea>
                                            </div>
                                            <input type="hidden" id="catid" name="catid" value="<?php echo $_GET['id'] ?> ">
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
    <?php include './js.php';?>
    <script type="text/javascript">
        var status='';
        bootstrapValidate('#catname', 'alpha:Format should be only letters and spaces are allowed');
    $(document).ready(function() {

        $('#catname').on('input', function(){
				var value = '#catname';
					$.ajax({
						url: 'ajax.php?action=availcheck',
						type: 'post',
						data: {
                            value:$(value).val().trim(),
                            tname:'category',
                            cname:'cat_name'
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

        $('#catupdate').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: 'ajax.php?action=catupdate',
                data: $(this).serialize(),
                success: function(response)
                        {
                            // document.write(response);
                            // console.log(response);
                            if(response == 1){
                             
                                Swal.fire({
                                        position: 'center',
                                        icon: 'success',
                                        text: "Category Updated Successfully!",
                                        // text: "Message!",
                                        // showConfirmButton: false,
                                        type: "success"
                                        
                                    }).then(function() {
                                        window.location = "categoryIndex.php";
                                    });

                            }
                            else{
                                Swal.fire({
                                        icon: 'warning',
                                        text: 'Invalid!',
                                        }) 
                                }
                        }
                    });
                }); 
            });
        </script>
    <script>
         $(document).ready(function() {
                $.ajax({
                type: "POST",
                url: 'ajax.php?action=catedit',
                data: {
                    id:<?php echo $_GET['id'] ?>
                },
                success: function(response)
                {
                    var data=response.split("#");
                    // document.write(data);
                    // console.log(data);
                    document.getElementById("catname").value=data[0].trim();
                    document.getElementById("catdesc").value=data[1].trim();

                   }
                });
            }); 
    </script>

    
    <?php include './master.foot.php';?>
