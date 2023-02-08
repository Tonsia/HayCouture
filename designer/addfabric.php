<?php 
include './master.head.php';?>

    <div class="row">
        <div class="col-md-12">
            <div class="breadcrumb__content">
                <div class="breadcrumb__content__left">
                    <div class="breadcrumb__title">
                        <h2>Add Fabric</h2>
                    </div>
                </div>
                <div class="breadcrumb__content__right">
                    <nav aria-label="breadcrumb">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="http://localhost/designer/dashboard.php">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Fabric</li>
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
                            <form id="addfabric" enctype="multipart/form-data" method="POST" action="upload.php" onsubmit="return validateForm()">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-vertical__item bg-style">
                                            <div class="item-top mb-30">
                                                <h2>Add Fabric Details</h2>
                                            </div>
                                            <input type="hidden" name="product_type" value="">
                                            <div class="input__group mb-25">
                                                <label for="en-product-name">Fabric Name</label>
                                                <input type="text" class="form-control" id="productname" name="productname" maxlength="60" required >
                                            </div>
                                            <div class="input__group w-20 mb-25 ms-1"> 
                                                <label for="exampleInputEmail1">Fabric Image</label>
                                                <input type="file" name="fileToUpload" id="fileToUpload" class="form-control putImage1 im1"  required accept="image/*"> 
                                                <img src="" id="target1"/>
                                            </div>
                                            <div class="input__group w-20 mb-25 ms-1"> 
                                                <input type="submit" value="Upload Image" name="submit">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
    bootstrapValidate('#productname', 'alpha:Format should be only letters and spaces are allowed');

    

    </script>
    <script type="text/javascript">
    tinymce.init({
        selector:'#description',
        menubar: false,
        statusbar: false,
        plugins: 'autoresize anchor autolink charmap code codesample directionality fullpage help hr image imagetools insertdatetime link lists media nonbreaking pagebreak preview print searchreplace table template textpattern toc visualblocks visualchars',
        toolbar: 'h1 h2 bold italic strikethrough  bullist numlist | removeformat fullscreen ',
        skin: 'bootstrap',
        toolbar_drawer: 'floating',
        min_height: 200,           
        autoresize_bottom_margin: 16,
        setup: (editor) => {
            editor.on('init', () => {
                editor.getContainer().style.transition="border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out"
            });
            editor.on('focus', () => {
                editor.getContainer().style.boxShadow="0 0 0 .2rem rgba(0, 123, 255, .25)",
                editor.getContainer().style.borderColor="#80bdff"
            });
            editor.on('blur', () => {
                editor.getContainer().style.boxShadow="",
                editor.getContainer().style.borderColor=""
            });
        }
    });
    var status='';
    $(document).ready(function() {
       
        $('#productname').on('input', function(){
				var value = '#productname';
					$.ajax({
						url: 'ajax.php?action=availcheck',
						type: 'post',
						data: {
                            value:$(value).val().trim(),
                            tname:'fabric',
                            cname:'fabric_name'
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
                            // alert(status);
						}
					});
			});

          
        });

        function validateForm(){
                let faname = $("#productname").val();
                var letterNumber = /^[0-9a-zA-Z]+$/;

                if(status==="taken"){
                    Swal.fire( 'Already Existing!', 'Fabric name already taken !!!!', 'question' );
                    return false;
                }
                else if(!faname.match(letterNumber)){
                    Swal.fire( 'Only Alpha Numeric..!!!!', 'Fabric name should only contains alphabets and numbers', 'question' );
                    return false;
                }
                else{
                    return true;
                } 
         }

        </script>

<?php include './master.foot.php';?>
