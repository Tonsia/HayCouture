<?php 
include './master.head.php';
include './db_connect.php';
?>
    <div id="table-url" data-url="{{ route('admin.customer_list') }}"></div>
    <div class="row">
        <div class="col-md-12">
            <div class="breadcrumb__content">
                <div class="breadcrumb__content__left">
                    <div class="breadcrumb__title">
                        <h2>Reviews List</h2>
                    </div>
                </div>
                <div class="breadcrumb__content__right">
                    <nav aria-label="breadcrumb">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="http://localhost/proadmin/dashboard.php">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Review List</li>
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
                            
                            <!-- <div id="ProductSizeTable_filter" class="dataTables_filter">
                                <label>Search:
                                    <input id="custsearch" name="custsearch" type="search" class="" placeholder="" aria-controls="ProductSizeTable">
                                </label>
                            </div> -->
                    <table id="ReviewTable" class="row-border data-table-filter table-style">
                        <thead>
                        <tr>
                            <th>Sl No.</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Review Title</th>
                            <th>Review Description</th>
                            <th>Rating(On 5)</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody id="reviewtab">
                    
                        </tbody>
                    </table>
                </div>
                </div>
            </div>
        </div>
    </div>
 <?php include './js.php';?>
    <script type="text/javascript">
        // to list all reviews
        $(document).ready(function() {
                    $.ajax({
                    type: "POST",
                    url: 'ajax.php?action=tablereviews',
                    data: $(this).serialize(),
                    success: function(response)
                    {
                        // document.write(response);
                        //console.log(response);
                        $('#reviewtab').html(response);
                        $("#ReviewTable").dataTable();
                    }
                    });

                    $("#custsearch").on("keyup",function(){
                        var form_data = new FormData();
                        form_data.append('searchstr',$("#custsearch").val());  
                        $.ajax({
                        type: "POST",
                        url: 'ajax.php?action=tablecustomersearch',
                        dataType: 'text',
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: form_data,
                        success: function(response)
                        {
                            // document.write(response);
                            //console.log(response);
                            $('#reviewtab').html(response);
                        }
                        });
                    });
                });
        
        // for click on toggle button
        function fn2(e){
            $.ajax({
                    type: "POST",
                    url: 'ajax.php?action=reviewstatus',
                    data: {
                        reviewid:e
                    },
                    success: function(response)
                    {
                        // document.write(response);
                        // console.log(response);
                        $.ajax({
                            type: "POST",
                            url: 'ajax.php?action=tablereviews',
                            data: $(this).serialize(),
                            success: function(response)
                            {
                                // document.write(response);
                                // console.log(response);
                                $('#reviewtab').html(response);
                                location.reload();
                            }
                            });

                    }
                    });
            
        }
    
    </script>
<?php include './master.foot.php';?>

