<?php include 'header.php';
    if(!isset($_SESSION['regid'])){
        echo '<script type="text/javascript"> window.location.href="../auth/signin.php"; </script>';
    }
?>

    <style>
        /* Style for the table */
table {
  width: 100%;
  border-collapse: collapse;
  margin-bottom: 30px;
  width: 100%;
  border-spacing: 0;
  border: 1px solid #ddd;
}

th, td {
  text-align: left;
  padding: 8px;
  border: 1px solid #ddd;
}

th {
    background-color: #f2f2f2;
  font-weight: bold;
  border: 1px solid #ddd;
  padding: 10px;
  text-align: left;
}

td.truncate {
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
  max-width: 200px; /* Limits the width of the content to 200 pixels */
  max-width: 200px;
    cursor: pointer;
}
td.expand {
    white-space: normal; /* Allows the text to wrap */
    max-width: none; /* Removes the maximum width limit */
  }

td {
  white-space: nowrap; /* Prevents the text from wrapping */
  overflow: hidden; /* Hides the overflow text */
  text-overflow: ellipsis; /* Displays an ellipsis (...) when the text overflows */
}

.buy-btn:hover {
  background-color: #333;
}



/* Style for the table row on hover */
tr:hover {
  background-color: #e6ffe6;
}



    </style>
        <!-- breadcrumb area start here  -->
        <div class="breadcrumb-area">
            <div class="container">
                <div class="breadcrumb-wrap text-center">
                    <h2 class="page-title">Jobs Applied</h2>
                    <ul class="breadcrumb-pages">
                        <li class="page-item"><a class="page-item-link" href="index.php">Home</a></li>
                        <li class="page-item">Careers</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- breadcrumb area end here  -->

        <!-- wish-list area start here  -->
        <div class="wish-list-area section">
            <div class="container">
                <div class="row">
                    
                <div class="col-12 wish-list-table">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th scope="col">Sl No.</th>
                                <th scope="col">Job Title</th>
                                <th scope="col">Job ID</th>
                                <th scope="col">CV</th>
                                <th scope="col">Status</th>
                              </tr>
                            </thead>
                            <tbody>

                            <?php
                            include 'db_connect.php';  
                            //$jid = $_GET["jobid"];      
                            $userid = $_SESSION['regid'];  
                             
                            $qry0 = $conn->query("SELECT * FROM cv where userid='$userid'");

                            

                            if ($qry0->num_rows > 0) 
                            {
                                $i=1;
                                while($row0 = $qry0->fetch_assoc()) 
                                {
                                    $jobid = $row0["jobid"];
                                    $qry1 = $conn->query("SELECT * FROM jobs where jobid='$jobid'");$row1 = $qry1->fetch_assoc();
                                    $jobtitle = $row1["jobtitle"];
                                    
                                    $cv = $row0["cv"];
                                    $strss='';
                                    if($row0['status']=='3'){
                                      $strss = '
                                          <a style="color: blue; text-decoration: underline; font-weight: bold; background-color: lightgray; padding: 5px 10px; border-radius: 5px;" href="updatejobpage.php?jobid='.$jobid.'" target="_blank">Edit</a>
                                          <a style="color: blue; text-decoration: underline; font-weight: bold; background-color: lightgray; padding: 5px 10px; border-radius: 5px;" onclick="dltfn(\''.$row0['id'].'\')" target="_blank">
                                              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                              </svg>
                                          </a>
                                      ';
                                    }
                                    $btntxt='';
                                    if($row0['status']==3){
                                       
                                      $btntxt = '<a  style="font-size:16px;"  class="btn btn-primary mt-15">Pending</a>';
                                    }else if($row0['status']==1){
                                      $btntxt = '<a style="font-size:16px;" class="btn btn-success mt-15">Job Offered</a>';
                                    }else{
                                      $btntxt = '<a style="font-size:16px;" class="btn btn-danger mt-15">Rejected</a>';
                                     
                                    }

                                    echo '
                                    <tr role="row" class="odd">
                                        <td class="sorting_1">'.$i++.'</td>
                                        <td><b>'.$jobtitle.'</b></td>
                                        <td>'.$jobid.'</td>
                                        <td>
                                          <a style="color: blue; text-decoration: underline; font-weight: bold; background-color: lightgray; padding: 5px 10px; border-radius: 5px;" href="assets/uploaded_files/resume/'.$cv.'" target="_blank">View</a>
                                          
                                        '.$strss.'
                                        </td>
                                        <td>
                                              <div class="action-area">
                                                  '.$btntxt.'
                                              </div>
                                        </td>
                                    </tr>';
                                
                                }
                            }
                            else{
                                // echo("<script>location.href = './nojobs.php';</script>");
                            }
                            
                            ?>
                                

                            </tbody>
                        </table>
                    </div>
                </div>
                </div>
            </div>
        </div>
        <!-- wish-list area end here  -->
        <script>
              function toggleExpand(td) {
                td.classList.toggle('expand');
            }

            function dltfn(e){
              //alert(e);
              Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
              }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: 'ajax.php?action=deletecv',
                        type: 'post',
                        data: {
                            id : e
                        },
                        success: function(response){
                            console.log(response);
                            //alert(response);
                            location.reload();
                        }                               
                    });
                }
              })

            }
        </script>

        <?php include './footer.php' ?>
