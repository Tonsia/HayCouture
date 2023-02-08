<?php include './master.head.php';?>

    <div class="row">
        <div class="col-md-12">
            <div class="breadcrumb__content">
                <div class="breadcrumb__content__left">
                    <div class="breadcrumb__title">
                        <h2>Add Category</h2>
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
                                        <form id="addcategory" enctype="multipart/form-data" method="POST" action="">
                                            <div class="input__group mb-25">
                                                <label>Category Name</label>
                                                <input type="text" id="categoryname"  oninput="checkCat(this)" class="lol" name="categoryname" maxlength="29" required pattern="[a-zA-Z ]*$">
                                            </div>
                                            
                                            <div class="input__group mb-25">
                                                <label>Description</label>
                                                <textarea name="categorydescription" class="lol" id="categorydescription" maxlength="499" required ></textarea>
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
    <script type="text/javascript">
       var status = 'not';//valid
       bootstrapValidate('#categoryname', 'alpha:Format should be only letters and spaces are allowed');
      // bootstrapValidate('#categorydescription', 'regex:^[a-zA-Z ]*$:Should only contain alphabetic characters');
       // bootstrapValidate('#productname', 'regex:^[a-zA-Z ]*$:Should only contain alphabetic characters')
    // bootstrapValidate('#description', 'regex:^[a-zA-Z0-9.,-: ]*$:Description should only contain alphanumeric characters and special characters like')
    // // bootstrapValidate('#description', 'regex:^[a-zA-Z ]*$:Should only contain alphabetic characters');
    // bootstrapValidate('#image_1', 'endsWith:webp:File extension should be webp') 
    // bootstrapValidate('#image_2', 'endsWith:webp:File extension should be webp')
    // bootstrapValidate('#image_3', 'endsWith:webp:File extension should be webp') 
    
    </script>
     <script type="text/javascript">
        var status='';
        $(document).ready(function() {
            $('#categoryname').on('input', function(){
				var value = '#categoryname';
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

            $('#addcategory').submit(function(e) {
                e.preventDefault();
                
                // bootstrapValidate("#categoryname","regex:^[a-zA-Z ]*$:Should only contain alphabetic characters",  function(a){status=a?"valid":"not"});
                // bootstrapValidate("#categorydescription","regex:^[a-zA-Z ]*$:Should only contain alphabetic characters",   function(a){status=a?"valid":"not"});
                 if(status==='avail'){
                    $.ajax({
                        type: "POST",
                        url: 'ajax.php?action=addcategory',
                        data: $(this).serialize(),
                        success: function(response)
                        {
                            // document.write(response);
                            // console.log(response);
                            if(response == 1){
                                // alert("success");
                                // Toastify({ 
                                //     text: "Added Category Successfully!",
                                //     style: { background: "linear-gradient(to right, #00b09b, #96c93d)", },
                                //     duration: 3000 }).showToast();
                                // location.href ='categoryIndex.php';


                                Swal.fire({
                                        position: 'center',
                                        icon: 'success',
                                        text: "Category Added Successfully!",
                                        // text: "Message!",
                                        // showConfirmButton: false,
                                        type: "success"
                                })
                            }
                            else{
                                Swal.fire({
                                        icon: 'warning',
                                        text: 'Invalid!',
                                        })
                                }
                        }
                    }); 
                }
        }); 
    });
        </script>
<?php include './master.foot.php';?>
