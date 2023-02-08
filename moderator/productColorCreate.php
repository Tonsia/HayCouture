<?php include './master.head.php';?>
    <div class="row">
        <div class="col-md-12">
            <div class="breadcrumb__content">
                <div class="breadcrumb__content__left">
                    <div class="breadcrumb__title">
                        <h2>Add Color</h2>
                    </div>
                </div>
                <div class="breadcrumb__content__right">
                    <nav aria-label="breadcrumb">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="http://localhost/proadmin/dashboard.php">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Color</li>
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
                                        <form id="addcolor" enctype="multipart/form-data" method="POST" action="">
                                            
                                            <div class="input__group mb-25">
                                                <label for="exampleInputEmail1">Color Name</label>
                                                <input type="text" id="color_name" name="colorname" maxlength="20" required pattern="[a-zA-Z ]*$">
                                            </div>
                                            
                                            <div class="input__group mb-25">
                                                <label for="exampleColorInput" class="form-label">Color picker</label>
                                                <input type="color" style="width: 10%;" class="form-control form-control-color" id="color_name" name="colorcode" title="Choose your color" required>
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
        var status='';
       bootstrapValidate('#color_name', 'alpha:Format should be only letters and spaces are allowed');
        $(document).ready(function() {
            
            $('#color_name').on('input', function(){
				var value = '#color_name';
					$.ajax({
						url: 'ajax.php?action=availcheck',
						type: 'post',
						data: {
                            value:$(value).val().trim(),
                            tname:'product_color',
                            cname:'color'
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



            $('#addcolor').submit(function(e) {
                e.preventDefault();
                // bootstrapValidate("#color_name","alpha:Should only contain alphabetic characters",  function(a){status=a?"valid":"not"});
                if(status=='avail'){
                $.ajax({
                    type: "POST",
                    url: 'ajax.php?action=addcolor',
                    data: $(this).serialize(),
                    success: function(response)
                    {
                        // document.write(response);
                        // console.log(response);
                        if(response == 1){
                            Swal.fire({
                                        position: 'center',
                                        icon: 'success',
                                        title: "Color Added Successfully!",
                                        // text: "Message!",
                                        // showConfirmButton: false,
                                        type: "success"
                                        
                                    }).then(function() {
                                        window.location = "productColor.php";
                                    });


                            // alert("success");
                            // location.href ='productColor.php';
                        }
                        }
                   });
                }
                // }else{
                //     alert(status);
                // }
            }); 
        });
        </script>
<?php include './master.foot.php';?>