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
                            $jid = $_GET["jobid"];      
                            $userid = $_SESSION['regid'];  
                             
                            $qry0 = $conn->query("SELECT * FROM cv where jobid='$jid' and userid='$userid'");

                            $qry1 = $conn->query("SELECT * FROM jobs where jobid='$jid'");
                            $row1 = $qry1->fetch_assoc();

                            if ($qry0->num_rows > 0) 
                            {
                                $i=1;
                                while($row0 = $qry0->fetch_assoc()) 
                                {
                                    
                                    $jobtitle = $row1["jobtitle"];
                                    $jobid = $row0["jobid"];
                                    $cv = $row0["cv"];
                                   
                                

                                    echo '
                                    <tr role="row" class="odd">
                                        <td class="sorting_1">'.$i++.'</td>
                                        <td><b>'.$jobtitle.'</b></td>
                                        <td>'.$jobid.'</td>
                                        <td><a style="color: blue; text-decoration: underline; font-weight: bold; background-color: lightgray; padding: 5px 10px; border-radius: 5px;" href="assets/uploaded_files/resume/'.$cv.'" target="_blank">View Uploaded CV</a></td>

                                        
                                      
                                        <td>
                                                            <div class="action-area">
                                                                <a class="buy-btn action-btn mt-15" href="./jobpage?jobid='.$jobid.'">Apply Now</a>
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
        </script>

        <?php include './footer.php' ?>
