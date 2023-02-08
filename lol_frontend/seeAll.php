<?php
include "header.php";
?>

    <!-- Product Area Start -->
    <div class="product-area section">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-4">
                    <div class="sidebar-widget-area mobile-sidebar">
                        <div class="sidebar-widget-header d-block d-lg-none">
                            <div class="widget-header-wrap">
                                <h5 class="offcanvas-title">Filter</h5>
                                <button type="button" class="btn-close text-reset sidebar-close"></button>
                            </div>
                        </div>

                        <div class="single-widget search-widget">
                            <h3 class="widget-title">Search Here</h3>
                            <form>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="searchwidget" name="searchwidget" placeholder="Product Store">
                                    <button type="button" class="search-btn"><i class="flaticon-search"></i></button>
                                </div>
                            </form>
                        </div>



                        <div class="single-widget price-widget">
                            <h3 class="widget-title">Price</h3>
                            <form>
                                <div class="price-wrap">
                                    <div class="price-wrap-left">
                                        <div class="single-price">
                                            <input type="number" class="form-control" id="minprice" min=0 name="minprice" placeholder="₹ Min">
                                        </div>
                                        <div class="single-price">
                                            <input type="number" class="form-control" id="maxprice" min=0 name="maxprice" placeholder="₹ Max">
                                        </div>
                                    </div>
                                    <button type="button" class="price-submit" onclick="pricelist()"><i class="fas fa-play"></i></button>
                                </div>
                            </form>
                        </div>

                        <!-- <div class="single-widget colors-widget">
                            <h3 class="widget-title">Colors</h3>
                            <div class="colors-list">
                                <div class="single-colors">
                                    <div class="colors-left">
                                        <input class="form-check-input green" type="checkbox" id="Jungle">
                                        <label class="form-check-label" for="Jungle">Jungle Green</label>
                                    </div>
                                    <span class="colors-count">15</span>
                                </div>
                                <div class="single-colors">
                                    <div class="colors-left">
                                        <input class="form-check-input cerise" type="checkbox" id="Cerise">
                                        <label class="form-check-label" for="Cerise">Cerise</label>
                                    </div>
                                    <span class="colors-count">18</span>
                                </div>
                                <div class="single-colors">
                                    <div class="colors-left">
                                        <input class="form-check-input magi-mint" type="checkbox" id="MagicMint">
                                        <label class="form-check-label" for="MagicMint">Magic Mint</label>
                                    </div>
                                    <span class="colors-count">9</span>
                                </div>
                                <div class="single-colors">
                                    <div class="colors-left">
                                        <input class="form-check-input pink-sherbet" type="checkbox" id="PinkSherbet">
                                        <label class="form-check-label" for="PinkSherbet">Pink Sherbet</label>
                                    </div>
                                    <span class="colors-count">26</span>
                                </div>
                                <div class="single-colors">
                                    <div class="colors-left">
                                        <input class="form-check-input vivid-tangerine" type="checkbox" id="VividTangerine">
                                        <label class="form-check-label" for="VividTangerine">Vivid Tangerine</label>
                                    </div>
                                    <span class="colors-count">6</span>
                                </div>
                                <div class="single-colors">
                                    <div class="colors-left">
                                        <input class="form-check-input hot-magenta" type="checkbox" id="HotMagenta">
                                        <label class="form-check-label" for="HotMagenta">Hot Magenta</label>
                                    </div>
                                    <span class="colors-count">11</span>
                                </div>
                            </div>
                        </div> -->

                        <div class="single-widget size-widget">
                            <h3 class="widget-title">Size</h3>
                            <div id="size" class="size-list">
                                <div class="single-size">
                                    <input class="form-check-input" type="checkbox" id="SMALL">
                                    <label class="form-check-label" for="SMALL">SMALL</label>
                                </div>
                               
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-xl-9 col-lg-8">
                    <div class="product-section-top">
                        <div class="row align-items-center">
                            <div class="col-md-3">
                                <div class="product-section-top-left">
                                    <button class="sidebar-filter d-block d-lg-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
                                        Filter <img src="assets/images/angle-down.svg" alt="angle-down">
                                    </button>
                                    
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="product-filter">
                                    <!-- <p class="shoing-result">Showing 1 - 9 of 9 result</p> -->
                                    <!-- <form>
                                        <select class="form-select">
                                            <option selected="">Default Sorting</option>
                                            <option value="1">Featured Products</option>
                                            <option value="2">Best Selling</option>
                                            <option value="3">On Sale</option>
                                        </select>
                                    </form> -->
                                </div>
                            </div>
                        </div>
                    </div>



                    <div class="product-list">

                        <div id="listproduct" class="row">
                        
                        </div>

                        <div class="pagination-area mt-30">
                            <ul class="paginations text-center">
                                <li class="pagination-page"><a href="#" class="pagination-link"><i class="fas fa-angle-double-left"></i></a></li>
                                <li class="pagination-page active"><a href="#" class="pagination-link">1</a></li>
                                <li class="pagination-page"><a href="#" class="pagination-link">2</a></li>
                                <li class="pagination-page"><a href="#" class="pagination-link">3</a></li>
                                <li class="pagination-page"><a href="#" class="pagination-link"><i class="fas fa-angle-double-right"></i></a></li>
                            </ul>
                        </div>
                    </div>



                </div>
            </div>
        </div>
    </div>

<script type="text/javascript">
      
        $(document).ready(function() {
                    
            $.ajax({
                        url: "ajax.php?action=listsize", 
                        type: "POST",
                        data: {                        
                        },
                        //cache: false,
                        success: function(result){
                            // console.log(result);
                        
                            $("#size").html(result); 
                        }
                });
                    $.ajax({
						url: 'ajax.php?action=seealllist',
						type: 'post',
						data: {
                            seeall:<?php echo $_GET["seeall"] ?>
                        },
						success: function(response){
                            console.log(response);
                            if(response==2)
                            {
                                location.href='index.php';
                            }
                            else
                            {$("#listproduct").html(response);
                            var  len = document.querySelectorAll(".single-grid-product").length; 
                            $(".shoing-result").html('Showing 1 - '+len+' of '+len+' result');
                        }
                    }

					});

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

                            var text1 = "";
                            for (let i = 0; i < list1.length-1; i++) {
                                text1 +='<li class="mega-menu-items"><a class="mega-menu-link" href="shopgrid?category='+ list2[i]+'">'+ list1[i]+'</a></li>';
                            }
                            // console.log(text);
                            $("#catonsearch").html(text); 
                            $("#catinshop").html(text1); 
                        }
                });

                $('#searchwidget').on('input', function(){
				var searchname = $(this).val().trim();
                   
                        $.ajax({
                            url: "ajax.php?action=searchname",  
                            type: 'post',
                            data: {searchname: searchname,seeall:<?php echo $_GET["seeall"] ?>},
                            success: function(response)
                            {
                                console.log(response);
                                $("#listproduct").html(response);  
                            }
                        });
                  
                });

                $('#minprice').on('input', function(){
				var min = $(this).val().trim();
                //console.log(min);
                   if(min==''){
                        $.ajax({
                            url: 'ajax.php?action=seealllist',
                            type: 'post',
                            data: {
                                seeall:<?php echo $_GET["seeall"] ?>
                            },
                            success: function(response){
                                console.log(response);
                                if(response==2)
                                {
                                    location.href='index.php';
                                }
                                else
                                {$("#listproduct").html(response);
                                var  len = document.querySelectorAll(".single-grid-product").length; 
                                $(".shoing-result").html('Showing 1 - '+len+' of '+len+' result');
                                }
                        }                               
                        });
                   }
                  
                });


                $('#maxprice').on('input', function(){
				var max = $(this).val().trim();
                //console.log(min);
                   if(max==''){
                        $.ajax({
                            url: 'ajax.php?action=seealllist',
                            type: 'post',
                            data: {
                                seeall:<?php echo $_GET["seeall"] ?>
                            },
                            success: function(response){
                                console.log(response);
                                if(response==2)
                                {
                                    location.href='index.php';
                                }
                                else
                                {$("#listproduct").html(response);
                                var  len = document.querySelectorAll(".single-grid-product").length; 
                                $(".shoing-result").html('Showing 1 - '+len+' of '+len+' result');
                                }
                        }                               
                        });
                   }
                  
                });


              
    });

    function toggleCheckbox(e){
       

        //console.log(e.value);
        $("input:checkbox[name=checkbox]:checked").each(function(){
            $(this).prop("checked",false);
        });
        $(e).prop("checked",true);
        $.ajax({
                    url: "ajax.php?action=sizeshow",  
                    type: 'post',
                    data: {
                        size: e.value,
                        seeall:<?php echo $_GET["seeall"] ?>
                    },
                    success: function(response)
                    {
                        console.log(response);
                        $("#listproduct").html(response);  
                    }
                });
       
    }
     
    function pricelist()
    {
        var min = $('#minprice').val().trim();
        var max = $('#maxprice').val().trim();
        
            $.ajax({
                    url: "ajax.php?action=searchprice",  
                    type: 'post',
                    data: {
                        min: min,
                        max: max,
                        seeall:<?php echo $_GET["seeall"] ?>
                    },
                    success: function(response)
                    {
                        console.log(response);
                        $("#listproduct").html(response);  
                    }
                });
                          
    }
    </script>

    <?php include "footer.php"; ?>
