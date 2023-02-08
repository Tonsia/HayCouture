<?php 
include './master.head.php';
include './db_connect.php';
?>
    <div id="table-url" data-url="{{ route('admin.category') }}"></div>
    <div class="row">
        <div class="col-md-12">
            <div class="breadcrumb__content">
                <div class="breadcrumb__content__left">
                    <div class="breadcrumb__title">
                        <h2>Category</h2>
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
            <div class="customers__area bg-style mb-30">
                <div class="customers__table">
                    <div id="ProductSizeTable_wrapper" class="dataTables_wrapper no-footer">    
                            <div class="dataTables_length" id="ProductSizeTable_length">
                                <div class="col-xs-6">
                                <a href="categoryCreate.php" class="btn btn-md btn-info">Add Category</a>
                                </div>
                            </div>
                            <!-- <div id="ProductSizeTable_filter" class="dataTables_filter">
                                <label>Search:
                                    <input id="catsearch" name="catsearch" type="search" class="" placeholder="" aria-controls="ProductSizeTable">
                                </label>
                            </div>  -->

                    <table id="CategoryTable" class="row-border data-table-filter table-style">
                        <thead>
                            <tr role="row">
                            <th style="width: 10%;">Sl No.</th>
                                <th class="sorting_asc" tabindex="0" aria-controls="CategoryTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Category Name: activate to sort column descending" style="width: 20%;">Category Name</th>
                                <th class="sorting" tabindex="0" aria-controls="CategoryTable" rowspan="1" colspan="1" aria-label="Description: activate to sort column ascending" style="width: 50%;">Description</th>
                                <th class="sorting" tabindex="0" aria-controls="CategoryTable" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 10%;">Status</th>
                                <th class="sorting_disabled" rowspan="1" colspan="1" aria-label="Action" style="width:10%;">Action</th>
                            </tr>
                        </thead>
                        <tbody id="cattab">
                                
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include './js.php';?>
    <script type="text/javascript">
        // to list all categories
        $(document).ready(function() {
                    $.ajax({
                    type: "POST",
                    url: 'ajax.php?action=tablecategory',
                    data: $(this).serialize(),
                    success: function(response)
                    {
                        // document.write(response);
                        //console.log(response);
                        $('#cattab').html(response);
                        $("#CategoryTable").dataTable();
                    }
                    });
                    
                    // $("#catsearch").on("keyup",function(){
                    //     var form_data = new FormData();
                    //     form_data.append('searchstr',$("#catsearch").val());  
                    //     $.ajax({
                    //     type: "POST",
                    //     url: 'ajax.php?action=tablecategorysearch',
                    //     dataType: 'text',
                    //     cache: false,
                    //     contentType: false,
                    //     processData: false,
                    //     data: form_data,
                    //     success: function(response)
                    //     {
                    //         // document.write(response);
                    //         //console.log(response);
                    //         $('#cattab').html(response);
                    //     }
                    //     });
                    // });

                }); 

        // for click on edit button
        function fn1(e){
             location.href = "categoryEdit.php?id=" + e;
        }

        // for click on toggle button
        function fn2(e){
            $.ajax({
                    type: "POST",
                    url: 'ajax.php?action=catstatus',
                    data: {
                        catid:e
                    },
                    success: function(response)
                    {
                
                        // document.write(response);
                        //console.log(response);
                        // $('#cattab').html(response);
                            $.ajax({
                                    type: "POST",
                                    url: 'ajax.php?action=tablecategory',
                                    data: $(this).serialize(),
                                    success: function(response)
                                    {
                                       $('#cattab').html(response);     
                                        location.reload();
                                       
                                    }
                                });

                    }
                    });
            
        }
        
            
        </script>
        <!-- <script src="./assets/backend/js/admin/datatables/category.js"></script> -->
<?php include './master.foot.php';?>

