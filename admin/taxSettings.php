<?php include './master.head.php';?>
    <div id="table-url" data-url=""></div>
    <div class="row">
        <div class="col-md-12">
            <div class="breadcrumb__content">
                <div class="breadcrumb__content__left">
                    <div class="breadcrumb__title">
                        <h2>Tax Settings</h2>
                    </div>
                </div>
                <div class="breadcrumb__content__right">
                    <nav aria-label="breadcrumb">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="./dashboard.php">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Tax Settings</li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="customers__area bg-style mb-30">
                <div class="item-title">
                    <div class="col-xs-6">
                        <button data-bs-toggle="modal" data-bs-target="#createModal1" class="btn btn-md btn-info">Add</button>
                        
                        <!-- Button trigger modal -->


                    </div>
                </div>
                <div class="customers__table">
                    <table id="BlogTable" class="row-border data-table-filter table-style">
                        <thead>
                        <tr>
                            <th>State</th>
                            <th>Tax Rate (%)</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                                <?php
                                    include 'db_connect.php';
                                
                                    $result = $conn->query("SELECT * FROM sgst");
                                    
                                    if ($result->num_rows > 0) {
                                        while($row = $result->fetch_assoc()) {
                                            $id = $row["id"];
                                            if($row["status"]==1)
                                                $sts='<span class="status active">Active</span>';
                                            else
                                                $sts='<span class="status blocked">Disabled</span>';

                                            $stateid = $row['state_id'];
                                            $result1 =$conn->query("SELECT * FROM states where state_id='$stateid'");$row1 = $result1->fetch_array();
                                            echo '
                                            <tr role="row" class="odd">
                                                <td>'.$row1['state_name'].'</td>
                                                <td>'.$row['taxpercent'].'</td>
                                                <td>
                                                    '.$sts.'
                                                </td>
                                                <td>
                                                    <div class="action__buttons">
                                                    
                                                    <button onclick="fn1('.$stateid.')"  type="button" class="fas fa-pen-to-square btnhere" title="Edit"></button>
                                                    
                                                    <a class="btn-action toggle" title="Toggle">
                                                        <button onclick="fn2('.$id.')" type="button"  class="fas fa-toggle-on" title="Toggle"></button>
                                                    </a>
                                                    </div>
                                                </td>
                                            </tr>
                                            ';
                                        }
                                    }
                                ?>
                         
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="createModal1" tabindex="-1" role="dialog" aria-labelledby="createModalTitle1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <h5 class="modal-title text-white" id="editModalLongTitle">Add</h5>
                    <button type="button" class="close text-white" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="taxform" enctype="multipart/form-data" method="POST">
                    <div class="modal-body">
                        
                        <div class="input__group mb-25">
                            <label for="country">State</label>
                            <select name="state" id="state">
                                    <?php
                                        include 'db_connect.php';
                                    
                                        $result = $conn->query("SELECT * FROM states");
                                      
                                        if ($result->num_rows > 0) {
                                            while($row = $result->fetch_assoc()) {
                                                echo "<option value=".$row["state_id"].">".$row["state_name"]."</option>";
                                            }
                                        }
                                    ?>
              
                            </select>
                        </div>
                        <div class="input__group mb-25">
                            <label for="exampleInputEmail1">Tax Rate (In Percentage)</label>
                            <input type="number" min="0" step="1"  max ="100" name="percentage" placeholder="Tax Rate">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger me-2" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="createModalTitle1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <h5 class="modal-title text-white" id="editModalLongTitle">Add</h5>
                    <button type="button" class="close text-white" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="taxformupdate" enctype="multipart/form-data" method="POST">
                    <div class="modal-body">
                        
                        <div class="input__group mb-25">
                            <label for="country">State</label>
                            <select name="state" id="editstate">
                                    <?php
                                        include 'db_connect.php';
                                    
                                        $result = $conn->query("SELECT * FROM states");
                                      
                                        if ($result->num_rows > 0) {
                                            while($row = $result->fetch_assoc()) {
                                                echo "<option value=".$row["state_id"]." disabled>".$row["state_name"]."</option>";
                                            }
                                        }
                                    ?>
              
                            </select>
                        </div>
                        <div class="input__group mb-25">
                            <label for="exampleInputEmail1">Tax Rate (In Percentage)</label>
                            <input type="number" min="0" step="1"  max ="100" id="editpercentage" name="editpercentage" placeholder="Tax Rate">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger me-2" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
   


        <?php include './js.php';?>
        <script type="text/javascript">

// $('select option').each(function() {
//    var thisAttr = $(this).attr('disabled');
//    if(thisAttr = "disabled") {
//       $(this).hide();
//    }
// });
                                        
                $("#editstate").change(function() {
                    $("#editstate option").prop("disabled", false);
                    $("#editstate option:selected").prop("disabled", true);
                });

                $(document).ready(function() {
                    $("#BlogTable").dataTable();
                })

                $('#taxform').submit(function(e) {
                    e.preventDefault(); 
                    $.ajax({
                        type: "POST",
                        url: 'ajax.php?action=statetax' ,
                        data: $(this).serialize(),
                        success: function(response)
                        {
                            if(response == 1){
                                Swal.fire({
                                        position: 'center',
                                        icon: 'success',
                                        text: "Added Successfully!",
                                        type: "success"
                                }).then((value)=>{
                                    location.reload();
                                });
                                
                            }
                            else{
                                Swal.fire({
                                        icon: 'warning',
                                        text: 'Invalid!',
                                })
                            }
                        }
                    }); 
                 });

                 $('#taxformupdate').submit(function(e) {
                    e.preventDefault(); 
                    $.ajax({
                        type: "POST",
                        url: 'ajax.php?action=statetaxupdate' ,
                        data: $(this).serialize(),
                        success: function(response)
                        {
                            //document.write(response);
                            if(response == 1){
                                $("#exampleModal").modal('hide');
                                Swal.fire({
                                        position: 'center',
                                        icon: 'success',
                                        text: "Update Successfully!",
                                        type: "success"
                                }).then((value)=>{
                                    location.reload();
                                });
                                
                            }
                            else{
                                Swal.fire({
                                        icon: 'warning',
                                        text: 'Invalid!',
                                })
                            }
                        }
                    }); 
                 });


                 function fn2(e){
                    $.ajax({
                            type: "POST",
                            url: 'ajax.php?action=taxstatus',
                            data: {
                                id:e
                            },
                            success: function(response)
                            {
                                location.reload();
                            }
                    });
                    
                }

                function fn1(e){
                    $("#editstate option[value='"+ e + "']").attr('disabled', false); 
                    $('#editstate').val(e);
                    $.ajax({
                            type: "POST",
                            url: 'ajax.php?action=gettaxper',
                            data: {
                                id:e
                            },
                            success: function(response)
                            {
                                $('#editpercentage').val(response.trim());
                                $("#exampleModal").modal('show');
                            }
                    });
                    
                }




        </script>
        <?php include './master.foot.php';?>