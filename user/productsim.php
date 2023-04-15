<?php
include "header.php";
?>

<?php

$from = "C:/wamp64/www/haycouture/admin/assets/uploaded_files/product_images/";
$to   = "C:/wamp64/www/haycouture/user/imgsimiliar/dataset/";

$files = glob(''.$to.'*'); // get all file names
foreach($files as $file){ // iterate files
  if(is_file($file)) {
    unlink($file); // delete file
  }
}

chdir($from); // in this way glob() can give us just the file names
foreach(glob('*_1.*') as $name) {
    copy($from.$name, $to.$name);
}

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

                        
                        <div class="single-widget price-widget">
                            <h3 class="widget-title">Search</h3>
                            <form method="post" id="fileinfo" name="fileinfo" onsubmit="return submitForm();">
                                <div class="price-wrap">
                                    <div class="price-wrap-left">
                                        <div class="single-price" style="background-color:white;">
                                            <input  type="file" name="file" class="form-control " >
                                        </div>
                                    
                                    </div>
                                    <button type="submit" class="price-submit">
                                    <i class="fas fa-search"></i></button>
                                </div>
                            </form>
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

                        
                    </div>

                    <div id='spinner-div' style="position: absolute; display: none; width: 100%; height: 100%; top: 0; left: 0; text-align: center; background-color: rgba(255, 255, 255, 0.8); z-index: 2;">

                        <div style="margin-top:25%">
                            <div class="spinner-grow text-primary" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                            <div class="spinner-grow text-secondary" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                            <div class="spinner-grow text-success" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                            <div class="spinner-grow text-danger" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                            <div class="spinner-grow text-warning" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                            <div class="spinner-grow text-info" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                            <div class="spinner-grow text-dark" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </div>
                    

                    </div>




                </div>
            </div>
        </div>
    </div>

<script type="text/javascript">

            function onlyUnique(value, index, self) {
            return self.indexOf(value) === index;
            }
            //form Submit
            function submitForm() {
                $('#spinner-div').show();
                console.log("submit event");
                var fd = new FormData(document.getElementById("fileinfo"));
                $.ajax({
                url: "./img/upload.php",
                type: "POST",
                data: fd,
                processData: false,  // tell jQuery not to process the data
                contentType: false   // tell jQuery not to set contentType
                }).done(function( fname ) {
                        //
                        var arr = 
                        {
                            'Reqskills' : fname
                        };
                        $.ajax({
                            url: 'http://127.0.0.1:8000/imagesimiliar_prediction/',
                            type: 'POST',
                            data: JSON.stringify(arr),
                            contentType: 'application/json; charset=utf-8', //specifies that the request data is JSON data
                            dataType: 'json', //specifies that the response data should be parsed as JSON
                            async: false,
                            success: function(msg) {
                                data = JSON.parse(msg)
                                console.log(JSON.parse(msg));
                                const HCPS = [];
                                for (let i = 0; i < data.length; i++) {
                                    if(data[i].startsWith("HCP")){
                                        //console.log(data[i]);
                                        HCPS.push(data[i].slice(0, 5));
                                    }
                                }
                                const hcpsunique = HCPS.filter(onlyUnique)
                                console.log(hcpsunique);
                                $.ajax({
                                    url: "ajax.php?action=productmatch",  
                                    type: 'post',
                                    data: {
                                        p1: hcpsunique[0],
                                        p2: hcpsunique[1],
                                        p3: hcpsunique[2]
                                    },
                                    success: function(response)
                                    {
                                        console.log(response);
                                        $("#listproduct").html(response);  
                                    },
                                    complete: function () {
                                        $('#spinner-div').hide();//Request is complete so hide spinner
                                    }
                                });


                                
                            }
                        });
                        //
                });
                    return false;
                }




        //     function ABC(){
        //         var arr = 
        //     {
        //         'Reqskills' : <?php //echo "hi" ?>
        //     };
        //     $.ajax({
        //         url: 'http://127.0.0.1:8000/diabetes_prediction/',
        //         type: 'POST',
        //         data: JSON.stringify(arr),
        //         contentType: 'application/json; charset=utf-8',
        //         dataType: 'json',
        //         async: false,
        //         success: function(msg) {
        //             data = JSON.parse(msg)
        //             console.log(JSON.parse(msg));
                    
        //             text = "";
        //             dir = "./imgsimiliar/dataset/";
        //             for (let i = 0; i < data.length; i++) {
        //                 text += '<img src="'+dir+data[i]+'">';
        //             }

        //             document.getElementById("divs").innerHTML = text;
        //             console.log(text);
        //         }
        //     });
        // }
        
    </script>

    <?php include "footer.php"; ?>
