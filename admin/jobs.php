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
                        <h2>Jobs</h2>
                    </div>
                </div>
                <div class="breadcrumb__content__right">
                    <nav aria-label="breadcrumb">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="./dashboard.php">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Jobs</li>
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
                                <a href="jobCreate.php" class="btn btn-md btn-info">Add Jobs</a>
                                </div>
                            </div>
                            <!-- <div id="ProductSizeTable_filter" class="dataTables_filter">
                                <label>Search:
                                    <input id="catsearch" name="catsearch" type="search" class="" placeholder="" aria-controls="ProductSizeTable">
                                </label>
                            </div>  -->

                    <table id="jobTable" class="row-border data-table-filter table-style">
                        <thead>
                            <tr role="row">
                            <th style="width: 10%;">Sl No.</th>
                                <th class="sorting_asc" tabindex="0" aria-controls="jobTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="job Name: activate to sort column descending" style="width: 20%;">Job Title</th>
                                <th class="sorting_asc" tabindex="0" aria-controls="jobTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="job Name: activate to sort column descending" style="width: 20%;">Job ID</th>

                                <th class="sorting" tabindex="0" aria-controls="jobTable" rowspan="1" colspan="1" aria-label="Description: activate to sort column ascending" style="width: 50%; ">Job Description</th>
                                <th class="sorting" tabindex="0" aria-controls="jobTable" rowspan="1" colspan="1" aria-label="Description: activate to sort column ascending" style="width: 50%;">Requirements</th>
                                <th class="sorting" tabindex="0" aria-controls="jobTable" rowspan="1" colspan="1" aria-label="Description: activate to sort column ascending" style="width: 50%;">Valid Until</th>

                                <th class="sorting" tabindex="0" aria-controls="jobTable" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 10%;">Status</th>
                                <th class="sorting_disabled" rowspan="1" colspan="1" aria-label="Action" style="width:10%;">Action</th>
                            </tr>
                        </thead>
                        <tbody id="jobtab">
                                
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
        function toggleExpand(td) {
                td.classList.toggle('expand');
            }
        $(document).ready(function() {
                    $.ajax({
                    type: "POST",
                    url: 'ajax.php?action=tablejob',
                    data: $(this).serialize(),
                    success: function(response)
                    {
                        // document.write(response);
                        //console.log(response);
                        $('#jobtab').html(response);
                        $("#jobTable").dataTable();
                    }
                    });
                    
        }); 

        // for click on edit button
        function fn1(e){
             location.href = "jobEdit.php?id=" + e;
        }

        // for click on toggle button
        function fn2(e){
            $.ajax({
                    type: "POST",
                    url: 'ajax.php?action=jobstatus',
                    data: {
                        jobid:e
                    },
                    success: function(response)
                    {
                
                        // document.write(response);
                        //console.log(response);
                        // $('#cattab').html(response);
                            $.ajax({
                                    type: "POST",
                                    url: 'ajax.php?action=tablejob',
                                    data: $(this).serialize(),
                                    success: function(response)
                                    {
                                       $('#jobtab').html(response);     
                                        location.reload();
                                       
                                    }
                                });

                    }
            });
            
        }
        
            
        
            
        </script>
        <!-- <script src="./assets/backend/js/admin/datatables/job.js"></script> -->
<?php include './master.foot.php';?>

