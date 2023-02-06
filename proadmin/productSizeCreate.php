<?php include './master.head.php';?>
	<div class="row">
		<div class="col-md-12">
			<div class="breadcrumb__content">
				<div class="breadcrumb__content__left">
					<div class="breadcrumb__title">
						<h2>Add Product Size</h2> </div>
				</div>
				<div class="breadcrumb__content__right">
					<nav aria-label="breadcrumb">
						<ul class="breadcrumb">
							<li class="breadcrumb-item"><a href="http://localhost/proadmin/dashboard.php">Home</a></li>
							<li class="breadcrumb-item active" aria-current="page">Product Size</li>
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
										<form id="productcreate" enctype="multipart/form-data" method="POST" action="">
											<!-- <input type="hidden" name="pdtsizeid" value=""> -->
											<div class="input__group mb-25">
												<label for="exampleInputEmail1">Size</label>
												<input type="text" id="size" name="size" maxlength="5" required pattern="[a-zA-Z ]*$"> </div>
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
		bootstrapValidate('#size', 'alpha:Format should be only letters and spaces are allowed in Standard Form S,M,L');
		</script>
		<script type="text/javascript">
			var status='';
		$(document).ready(function() {

			$('#size').on('input', function(){
				var value = '#size';
					$.ajax({
						url: 'ajax.php?action=availcheck',
						type: 'post',
						data: {
                            value:$(value).val().trim(),
                            tname:'product_size',
                            cname:'size'
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




			$('#productcreate').submit(function(e) {
				e.preventDefault();
				if(status==='avail'){
				// bootstrapValidate("#size","alpha:You can only input alphabetic characters",  function(a){status=a?"valid":"not"});
				// if(status==='valid'){
				$.ajax({
					type: "POST",
					url: 'ajax.php?action=addpdtsize',
					data: $(this).serialize(),
					success: function(response) {
						// document.write(response);
						// console.log(response);
						if(response == 1) {


							Swal.fire({
                                        position: 'center',
                                        icon: 'success',
                                        title: "Product Added Successfully!",
                                        // text: "Message!",
                                        // showConfirmButton: false,
                                        type: "success"
                                        
                                    }).then(function() {
                                        window.location = "productSize.php";
                                    });

						} else {
							Swal.fire({
                                        icon: 'error',
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