<?php 
include './master.head.php';?>

    <div class="row">
        <div class="col-md-12">
            <div class="breadcrumb__content">
                <div class="breadcrumb__content__left">
                    <div class="breadcrumb__title">
                        <h2>Add Product</h2>
                    </div>
                </div>
                <div class="breadcrumb__content__right">
                    <nav aria-label="breadcrumb">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="./dashboard.php">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Product</li>
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
                            <form id="pdtsub" enctype="multipart/form-data" method="POST" action="">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-vertical__item bg-style">
                                            <div class="item-top mb-30">
                                                <h2>Add Product Details</h2>
                                            </div>
                                            <input type="hidden" name="product_type" value="">
                                            <div class="input__group mb-25">
                                                <label for="en-product-name">Product Name</label>
                                                <input type="text" class="form-control" id="productname" name="productname" maxlength="60" >
                                            </div>
                                            <!-- <div class="input__group mb-25">
                                                <label for="en-product-slug">Product ID</label>
                                                <input type="text" class="form-control" id="productid" name="productid" >
                                            </div> -->
                                            <div class="input__group mb-25">
                                                <label for="exampleInputEmail1">Category Name</label>
                                                <select class="form-control" id="categoryname" name="categoryname" >
                                                      
                                                </select>
                                            </div>
                                            <div class="input__group mb-25">
                                                <label for="productColor">Product Color</label>
                                                <button type="button" onclick="nextColor()" class="btn btn-outline-primary">Add a color</button>
                                            </div>
                                            <div class="colo">
                                                
                                            </div> 
                                            <div class="input__group mb-25">
                                                <label for="exampleInputEmail1">Size Details</label>
                                                <button type="button" onclick="nextSize()" class="btn btn-outline-primary">Add a size</button>
                                            </div>

                                            <div class="cont">
                                                
                                            </div>  
                                            <input type="hidden" name="sizelen" id="sizelen">
                                            <input type="hidden" name="colorlen" id="colorlen">
                                                <!--  -->
                                            <div class="input__group mb-25">
                                                <label for="exampleInputEmail1">Price</label>
                                                <input type="number" class="form-control" oninput="disc()" id="price" name="price" min="1"  >
                                            </div>
                                            <div class="input__group mb-25">
                                                <label for="exampleInputEmail1">Discount %</label>
                                                <input type="number" class="form-control" oninput="disc()" id="discount" name="discount" min="0" max="100" placeholder="" >
                                            </div>
                                            <div class="input__group mb-25">
                                                <label for="exampleInputEmail1">Total Price</label>
                                                <input type="number" class="form-control" id="discount_price" name="discount_price" min="0" value ="0" readonly>
                                            </div>
                                            
                                            <div class="input__group mb-25">
                                                <label for="exampleInputEmail1">Description</label>
                                                <textarea name="description" id="description" class="form-control" maxlength="500"  ></textarea>
                                            </div>
<!-- 
                                            <div class="input__group mb-25">
                                                <label for="exampleInputEmail1">Image 1</label>
                                                <input type="file" class="form-control putImage1"  name="image_1" id="image_1" >
                                                <img   src="" id="target1"/>
                                            </div>
                                            <div class="input__group mb-25">
                                                <label for="exampleInputEmail1">Image 2</label>
                                                <input type="file" class="form-control putImage2"  name="image_2" id="image_2" >
                                                <img   src="" id="target2"/>
                                            </div>
                                            <div class="input__group mb-25">
                                                <label for="exampleInputEmail1">Image 3</label>
                                                <input type="file" class="form-control putImage3"  name="image_3" id="image_3" >
                                                <img   src="" id="target3"/>
                                            </div> -->
                                            
                                            <div class="input__group mb-25">
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" value="1" name="featured" class="custom-control-input" id="featured" >
                                                    <label class="custom-control-label" for="customSwitch2">Featured Product</label>
                                                </div>
                                            </div>
                                            <div class="input__group mb-25">
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" value="1" name="best_sale" class="custom-control-input" id="best_sale">
                                                    <label class="custom-control-label" for="customSwitch3">Best Selling</label>
                                                </div>
                                            </div>
                                            <div class="input__group mb-25">
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" value="1" name="on_sale" class="custom-control-input" id="on_sale">
                                                    <label class="custom-control-label" for="customSwitch4">On Sale</label>
                                                </div>
                                            </div>
                                            <div class="input__group mb-25">
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" value="1" name="new_arrival" class="custom-control-input" id="new_arrival">
                                                    <label class="custom-control-label" for="customSwitch5">New Arrival</label>
                                                </div>
                                            </div>
                                            <div class="input__button">
                                                <input type="submit" class="btn btn-blue"></input>
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
    // bootstrapValidate('#productname', 'regex:^[a-zA-Z ]*$:Should only contain alphabetic characters')
    // bootstrapValidate('#description', 'regex:^[a-zA-Z0-9.,-: ]*$:Description should only contain alphanumeric characters and special characters like')
    // // bootstrapValidate('#description', 'regex:^[a-zA-Z ]*$:Should only contain alphabetic characters');
    // bootstrapValidate('#image_1', 'endsWith:webp:File extension should be webp') 
    // bootstrapValidate('#image_2', 'endsWith:webp:File extension should be webp')
    // bootstrapValidate('#image_3', 'endsWith:webp:File extension should be webp') 

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
                            tname:'products',
                            cname:'p_name'
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

            $('#pdtsub').submit(function(e) {
                e.preventDefault();
                if(status=='avail')
                {
                var form_data = new FormData();
                var collen = document.querySelectorAll(".pc1").length;
                for(var i=0;i<collen;i++){
                    form_data.append('a'+i,$('#a'+i).prop('files')[0]);
                    form_data.append('b'+i,$('#b'+i).prop('files')[0]);
                    form_data.append('c'+i,$("#productColor"+i).val());      
                }

                var sizelen = document.querySelectorAll(".pdts").length;
                for(var i=0;i<sizelen;i++){
                    form_data.append('size'+i,$("#productSize"+i).val()); 
                    form_data.append('qty'+i,$("#qty"+i).val());
                }

                form_data.append('productname',$("#productname").val());  
                form_data.append('categoryname',$("#categoryname").val()); 
                form_data.append('sizelen',sizelen);         
                form_data.append('colorlen',collen); 
                form_data.append('price',$("#price").val()); 
                form_data.append('discount',$("#discount").val()); 
                form_data.append('discount_price',$("#discount_price").val()); 
                form_data.append('description',$("#description").val());

                if($('#featured').prop("checked") == true){
                    form_data.append('featured', '1');}
                else{
                    form_data.append('featured', '2');}
                    
                if($('#best_sale').prop("checked") == true){
                    form_data.append('best_sale', '1');}
                else{
                    form_data.append('best_sale', '2');}

                if($('#on_sale').prop("checked") == true){
                    form_data.append('on_sale', '1');}
                else{
                    form_data.append('on_sale', '2');}

                if($('#new_arrival').prop("checked") == true){
                    form_data.append('new_arrival', '1');}
                else{
                    form_data.append('new_arrival', '2');}

                // alert(form_data); 
                 
                $.ajax({
                    type: "POST",
                    url: 'ajax.php?action=createproduct',
                    dataType: 'text',
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: form_data,                         
                    success: function(response){
                        // document.write(response);
                        Swal.fire({
                                        position: 'center',
                                        icon: 'success',
                                        title: "Product Added Successfully!",
                                        // text: "Message!",
                                        // showConfirmButton: false,
                                        type: "success"
                                        
                                    }).then(function() {
                                        window.location = "productList.php";
                                    });
                        
                        
                        
                        // console.log(response);
                        // window.location.href = "productList.php";
                    }
                });  
                
                
            }
            });
        });


    var colordrop = "";
    var sizedrop = "";
    $(document).ready(function() {
                //for category dropdwn
                $.ajax({
                        url: "ajax.php?action=listcategory", 
                        type: "POST",
                        data: {                        
                        },
                //cache: false,
                success: function(result){
                    // console.log(result);
                    var datas = result.split(",");
                    var list1=datas[0].split("|");
                    var list2=datas[1].split("|");

                    var text = "";
                    for (let i = 0; i < list1.length-1; i++) {
                        text +='<option value="'+ list2[i]+'">'+ list1[i]+'</option>';
                    }
                    // console.log(text);
                     $("#categoryname").html(text); 
                }
                });
                
                //for color dropdwn
                $.ajax({
                        url: "ajax.php?action=listcolor", 
                        type: "POST",
                        data: {                        
                        },
                        //cache: false,
                        success: function(result){
                            // console.log(result);
                            var datas = result.split(",");
                            var list1=datas[0].split("|");
                            var list2=datas[1].split("|");
                            for (let i = 0; i < list1.length-1; i++) {
                                colordrop +='<option value="'+ list2[i]+'">'+ list1[i]+'</option>';
                            }
                            // console.log(text);
                            // $("#colorSelect").html(text); 
                        }
                });

                //for size dropdwn
                $.ajax({
                        url: "ajax.php?action=listsize", 
                        type: "POST",
                        data: {                        
                        },
                        //cache: false,
                        success: function(result){
                            // console.log(result);
                            var datas = result.split(",");
                            var list1=datas[0].split("|");
                            var list2=datas[1].split("|");

                            
                            for (let i = 0; i < list1.length-1; i++) {
                                sizedrop +='<option value="'+ list2[i]+'">'+ list1[i]+'</option>';
                            }
                            // console.log(text);
                            // $("#colorSelect").html(text); 
                        }
                });

        }); 

            
            //$size select
            function nextSize()
            {       
                var i = document.querySelectorAll(".pdts").length;
                let div = '<div class="input-group"> \n\
                                <div class="input__group mb-25 ms-3 w-25" > \n\
                                    <label for="select2Multiple">Product Size</label> \n\
                                    <select class="form-control pdts" id="productSize'+i+'" name="size'+i+'"> \n\
                                        '+sizedrop+'\n\
                                    </select> \n\
                                </div> \n\
                                <div class="input__group mb-25 ms-3 w-25" > \n\
                                    <label for="exampleInputEmail1">Quantity</label> \n\
                                    <input type="number" class="form-control pdtqty" id="qty'+i+'" name="qty'+i+'" min="0"> \n\
                                </div>\n\
                                <div id="btn_close" class="input__button"> \n\
                                    <button type="button" id="clsbtn" onclick="remSize(this)" class="btn-close btn-danger" aria-label="Close"></button>\n\
                                </div> \n\
                            </div>';

                $('.cont').append(div);
            }
           
            //this.parentNode.parentNode.remove();
            function remSize(e){
                e.parentNode.parentNode.remove();
                var len = document.querySelectorAll(".pdts").length;
                for (let i = 0; i < len; i++) {
                    document.querySelectorAll(".pdts")[i].name = "size" + i;
                    document.querySelectorAll(".pdtqty")[i].name = "qty" + i;
                    document.querySelectorAll(".pdts")[i].id = "productSize"+ i;
                    document.querySelectorAll(".pdtqty")[i].id = "qty" + i;
                }
            }

            //color select
            var j;
            function nextColor()
            { 
                j =  document.querySelectorAll(".pc1").length;
                let div = '<div class="input-group"> \n\
                                <div class="input__group mb-25 ms-3" > \n\
                                    <label for="select2Multiple">Product Color</label> \n\
                                    <select class="form-control pc1" id="productColor'+j+'" name="color'+j+'"> \n\
                                        '+colordrop+'\n\
                                    </select> \n\
                                </div> \n\
                                <div class="input__group w-20 mb-25 ms-1"> \n\
                                    <label for="exampleInputEmail1">Image 1</label> \n\
                                    <input type="file" class="form-control putImage1 im1"  name="a'+j+'" id="a'+j+'" accept="image/*"> \n\
                                    <img   src="" id="target1"/> \n\
                                </div> \n\
                                <div class="input__group w-20 mb-25 ms-1"> \n\
                                    <label for="exampleInputEmail1">Image 2</label> \n\
                                    <input type="file" class="form-control putImage1 im2"  name="b'+j+'" id="b'+j+'" accept="image/*"> \n\
                                    <img   src="" id="target2"/> \n\
                                </div> \n\
                                <div id="btn_close" class="input__button m-0"> \n\
                                    <button type="button" id="clsbtn" onclick="remColor(this)" class="btn-close btn-danger" aria-label="Close"></button>\n\
                                </div> \n\
                            </div>';

                $('.colo').append(div);
            }
           
            //this.parentNode.parentNode.remove();
            function remColor(e){
                e.parentNode.parentNode.remove();
                var len = document.querySelectorAll(".pc1").length ;
                for (let i = 0; i < len; i++) {
                    document.querySelectorAll(".pc1")[i].name = "color" + i;
                    document.querySelectorAll(".im1")[i].name = "a" + i;
                    document.querySelectorAll(".im2")[i].name = "b" + i;
                    document.querySelectorAll(".pc1")[i].id = "productColor" + i;
                    document.querySelectorAll(".im1")[i].id = "a" + i;
                    document.querySelectorAll(".im2")[i].id = "b" + i;
                }
            }


            //discount price calculation
            function disc()
            {
                
                var discperc=document.getElementById("discount").value;
                var price=parseInt(document.getElementById("price").value);
                // console.log(discperc);
                // console.log(price);
                if (discperc === '' || discperc === '0' )
                {
                    document.getElementById("discount_price").value=price;
                }
                else if (discperc > 0 && price > 0)
                {
                    var totprice=(discperc*price)/100;
                    document.getElementById("discount_price").value=price-totprice;
                }
                else
                {
                    document.getElementById("discount_price").value=0;
                }
            
            }
        </script>

<?php include './master.foot.php';?>
