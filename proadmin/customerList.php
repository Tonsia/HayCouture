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
                        <h2>Customer List</h2>
                    </div>
                </div>
                <div class="breadcrumb__content__right">
                    <nav aria-label="breadcrumb">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="http://localhost/proadmin/dashboard.php">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Customer List</li>
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
                    <table id="CustTable" class="row-border data-table-filter table-style">
                        <thead>
                        <tr>
                            <th>Sl No.</th>
                            <th>Name</th>
                            <th>Email</th>
                            <!-- <th>Orders</th> -->
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody id="custtab">
                      
                           
                        </tbody>
                    </table>
                </div>
                </div>
            </div>
        </div>
    </div>
 <?php include './js.php';?>
    <script type="text/javascript">
        // to list all customers
        $(document).ready(function() {
                    $.ajax({
                    type: "POST",
                    url: 'ajax.php?action=tablecustomers',
                    data: $(this).serialize(),
                    success: function(response)
                    {
                        // document.write(response);
                        //console.log(response);
                        $('#custtab').html(response);
                        $("#CustTable").dataTable();
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
                            $('#custtab').html(response);
                        }
                        });
                    });
                });
        // for click on view button
        function fn1(e){
             location.href = "customerEdit.php?id=" + e;
        }
        // for click on toggle button
        function fn2(e){
            $.ajax({
                    type: "POST",
                    url: 'ajax.php?action=custstatus',
                    data: {
                        custid:e
                    },
                    success: function(response)
                    {
                        
                        // document.write(response);
                        //console.log(response);
                        // $('#cattab').html(response);
                        $.ajax({
                            type: "POST",
                            url: 'ajax.php?action=tablecustomers',
                            data: $(this).serialize(),
                            success: function(response)
                            {
                                // document.write(response);
                                //console.log(response);
                                $('#custtab').html(response);
                                location.reload();
                            }
                            });

                    }
                    });
            
        }
    
    </script>
<?php include './master.foot.php';?>

