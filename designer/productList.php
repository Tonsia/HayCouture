<?php include './master.head.php';?>
    <div id="table-url" data-url="{{ route('admin.product') }}"></div>

    <div class="row">
        <div class="col-md-12">
            <div class="breadcrumb__content">
                <div class="breadcrumb__content__left">
                    <div class="breadcrumb__title">
                        <h2> Product </h2>
                    </div>
                </div>
                <div class="breadcrumb__content__right">
                    <nav aria-label="breadcrumb">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="http://localhost/designer/dashboard.php"> Home </a></li>
                            <li class="breadcrumb-item active" aria-current="page"> Product </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="customers__area bg-style mb-30">
                <div class="customers__table">
                    <div id="ProductSizeTable_wrapper" class="dataTables_wrapper no-footer">    
                        <div class="dataTables_length" id="ProductSizeTable_length">
                            <div class="col-xs-6">
                            <a href="productCreate.php" class="btn btn-md btn-info">Add Product</a>
                            </div>
                        </div>
                        <!-- <div id="ProductSizeTable_filter" class="dataTables_filter">
                            <label>Search:
                                <input id="pdtsearch" name="pdtsearch" type="search" class="" placeholder="" aria-controls="ProductSizeTable">
                            </label>
                        </div>     -->
                        <table id="ProductTable" class="row-border data-table-filter table-style">
                            <thead>
                            <tr role="row">
                                    <th class="sorting_asc" tabindex="0" aria-controls="CategoryTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Category Name: activate to sort column descending" style="width: 10%;">Sl No.</th>
                                    <th class="sorting_asc" tabindex="0" aria-controls="CategoryTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Category Name: activate to sort column descending" style="width: 30%;">Image</th>
                                    <th class="sorting_asc" tabindex="0" aria-controls="CategoryTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Category Name: activate to sort column descending" style="width: 30%;">Product Name</th>
                                    <th class="sorting_asc" tabindex="0" aria-controls="CategoryTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Category Name: activate to sort column descending" style="width: 30%;">Category</th>
                                    <th class="sorting" tabindex="0" aria-controls="CategoryTable" rowspan="1" colspan="1" aria-label="Description: activate to sort column ascending" style="width: 10%;">Price</th>
                                    <th class="sorting" tabindex="0" aria-controls="CategoryTable" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 30%;">Status</th>
                                    <th class="sorting_disabled" rowspan="1" colspan="1" aria-label="Action" style="width:30%;">Action</th>
                                </tr>
                            </thead>

                            <tbody id="pdttab">
                                    
                            </tbody>
                            <!-- <tbody>
                            <tr role="row" class="odd">
                                <td class="sorting_1">
                                <img src="https://zairito.zainikthemes.com/uploaded_files/product_image/product-image-1.png" border="0" width="50" class="img-rounded" align="center">
                                </td>
                                <td>Best T-Shirt for Male</td>
                                <td>Men Fashion</td>
                                <td>Circle</td>
                                <td>
                                <span class="badge admin-new-price text-success">450.00</span>
                                <span class="badge admin-old-price text-danger">500.00</span>
                                </td>
                                <td>Affiliate</td>
                                <td>
                                <span class="status active">Active</span>
                                </td>
                                <td>
                                <div class="action__buttons">
                                    <a href="productEdit.php" class="btn-action">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                    <a href="https://zairito.zainikthemes.com/admin/product/inactive/9" class="btn-action">
                                    <i class="fas fa-toggle-on"></i>
                                    </a>
                                    <a href="https://zairito.zainikthemes.com/admin/product/delete/9" class="btn-action delete">
                                    <i class="fas fa-trash-alt"></i>
                                    </a>
                                </div>
                                </td>
                            </tr>
                            </tbody> -->
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include './master.foot.php';?>
    <script type="text/javascript">
        // to list all categories
        $(document).ready(function() {
                    $.ajax({
                    type: "POST",
                    url: 'ajax.php?action=tableproducts',
                    data: $(this).serialize(),
                    success: function(response)
                    {
                        // document.write(response);
                        //console.log(response);
                        $('#pdttab').html(response);
                        $("#ProductTable").dataTable();
                    }
                    });

                    $("#pdtsearch").on("keyup",function(){
                        var form_data = new FormData();
                        form_data.append('searchstr',$("#pdtsearch").val());  
                        $.ajax({
                        type: "POST",
                        url: 'ajax.php?action=tableproductssearch',
                        dataType: 'text',
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: form_data,
                        success: function(response)
                        {
                            // document.write(response);
                            //console.log(response);
                            $('#pdttab').html(response);
                        }
                        });
                    });
                }); 

                

// for click on edit button
          function fn1(e){
             location.href = "productEdit.php?id=" + e;
          }

        // for click on toggle button
        function fn2(e){
            $.ajax({
                    type: "POST",
                    url: 'ajax.php?action=pdtstatus',
                    data: {
                        pdtid:e
                    },
                    success: function(response)
                    {
                        
                        // document.write(response);
                        //console.log(response);
                        // $('#cattab').html(response);
                            $.ajax({
                                    type: "POST",
                                    url: 'ajax.php?action=tableproducts',
                                    data: $(this).serialize(),
                                    success: function(response)
                                    {
                                        // document.write(response);
                                        //console.log(response);
                                        $('#pdttab').html(response);
                                        location.reload();
                                    }
                                });
                    }
                    });
            
        }
        
            
  </script>