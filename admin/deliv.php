<?php 
include './master.head.php';
include './db_connect.php';
?>
    <div id="table-url" data-url="{{ route('admin.job') }}"></div>
    <div class="row">
        <div class="col-md-12">
            <div class="breadcrumb__content">
                <div class="breadcrumb__content__left">
                    <div class="breadcrumb__title">
                        <h2>Manage Delivery Person</h2>
                    </div>
                </div>
                <div class="breadcrumb__content__right">
                    <nav aria-label="breadcrumb">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="./dashboard.php">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Manage Delivery Person</li>
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
                                <a href="delivCreate.php" class="btn btn-md btn-info">Add Delivery Person</a>
                                </div>
                            </div>
                            <!-- <div id="ProductSizeTable_filter" class="dataTables_filter">
                                <label>Search:
                                    <input id="catsearch" name="catsearch" type="search" class="" placeholder="" aria-controls="ProductSizeTable">
                                </label>
                            </div>  -->

                    <table id="delivTable" class="row-border data-table-filter table-style">
                        <thead>
                            <tr role="row">
                            <th style="width: 10%;">Sl No.</th>
                                <th class="sorting_asc" tabindex="0" aria-controls="delivTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="job Name: activate to sort column descending" style="width: 15%;">Name</th>
                                <th class="sorting_asc" tabindex="0" aria-controls="delivTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="job Name: activate to sort column descending" style="width: 30%;">ID</th>

                                <th class="sorting" tabindex="0" aria-controls="delivTable" rowspan="1" colspan="1" aria-label="Description: activate to sort column ascending" style="width: 50%;">Email ID</th>
                                <th class="sorting" tabindex="0" aria-controls="delivTable" rowspan="1" colspan="1" aria-label="Description: activate to sort column ascending" style="width: 50%;">Mobile Number</th>
                                <th class="sorting" tabindex="0" aria-controls="delivTable" rowspan="1" colspan="1" aria-label="Description: activate to sort column ascending" style="width: 50%;">Address</th>
                                <th class="sorting" tabindex="0" aria-controls="delivTable" rowspan="1" colspan="1" aria-label="Description: activate to sort column ascending" style="width: 50%;">License Number</th>
                                <th class="sorting" tabindex="0" aria-controls="delivTable" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 10%;">Status</th>
                                <th class="sorting_disabled" rowspan="1" colspan="1" aria-label="Action" style="width:10%;">Action</th>
                            </tr>
                        </thead>
                        <tbody id="delivtab">
                                
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
                    url: 'ajax.php?action=tabledeliv',
                    data: $(this).serialize(),
                    success: function(response)
                    {
                        // document.write(response);
                        //console.log(response);
                        $('#delivtab').html(response);
                        $("#delivTable").dataTable();
                    }
                    });
            }); 

        // for click on edit button
        function fn1(e){
             location.href = "delivEdit.php?id=" + e;
        }

        // for click on toggle button
        function fn2(e){
            $.ajax({
                    type: "POST",
                    url: 'ajax.php?action=delivstatus',
                    data: {
                        delivid:e
                    },
                    success: function(response)
                    {
                
                        // document.write(response);
                        // console.log(response);
                        $('#delivtab').html(response);
                            $.ajax({
                                    type: "POST",
                                    url: 'ajax.php?action=tabledeliv',
                                    data: $(this).serialize(),
                                    success: function(response)
                                    {
                                       $('#delivtab').html(response);     
                                        location.reload();
                                       
                                    }
                                });

                    }
            });
            
        }
        
            
        </script>
        <!-- <script src="./assets/backend/js/admin/datatables/job.js"></script> -->
<?php include './master.foot.php';?>

