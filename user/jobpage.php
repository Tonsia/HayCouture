<?php
include "header.php";
?>

        <!-- about us area start here  -->
        <div class="about-us-area section">
            <div class="container">
                <div class="row align-items-lg">
                    <div class="col-lg-5 offset-lg-1 col-md-6">
                        <div class="about-us-image">
                            <img src="assets/images/aboutus-image.png" alt="about us image">
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-6">
                        <div class="about-us-content">
                            <div class="section-header-area">
                                <h2 style="padding-bottom: 20px; color:red;" >Join Our Team As A</h2>
                                <?php    
                                    include 'db_connect.php';
                                    if(isset($_GET["jobid"]))
                                    {
                                        $jid = $_GET["jobid"];
                            

                                                $result1=$conn->query("SELECT * FROM jobs where jobid='$jid'");
                                                if ($result1->num_rows > 0) 
                                                {
                                                    while($row1 = $result1->fetch_assoc()) 
                                                    {
                                                    $i1=$row1['jobtitle'];
                                                    echo '<h2 class="section-title">'.$i1.'</h2>';
                                                     }
                                                   
                                                }   
                                            }
                                    ?>

                            </div>
                            <?php    
                                    include 'db_connect.php';
                                    if(isset($_GET["jobid"]))
                                    {
                                    $result1=$conn->query("SELECT * FROM jobs where jobid='$jid'");
                                                if ($result1->num_rows > 0) 
                                                {
                                                    while($row1 = $result1->fetch_assoc()) 
                                                    {
                                                    $i1=$row1['jobdesc'];
                                                
                                                    echo '<p style="font-size:19px;" class="about-us-text">'.$i1.'</p>';
                                                     }
                                                   
                                                } }  
                                    ?>

                        </div>
                        <h2 style="padding-top: 30px; color:red;" >Requirements & Expertise in</h2>
                        <?php  
                        $jreq="";  
                                    include 'db_connect.php';
                                    if(isset($_GET["jobid"]))
                                    {

                                    $userid = $_SESSION['regid'];
                                    $result1=$conn->query("SELECT * FROM jobs where jobid='$jid'");
                                                if ($result1->num_rows > 0) 
                                                {
                                                    while($row1 = $result1->fetch_assoc()) 
                                                    {
                                                        $jreq = $row1['jobreq'];
                                                    $i1=$row1['jobreq'];
                                                    $items = explode(',', $i1);
                                                    echo '<ul style="list-style: disc; padding-left: 20px;">';
                                                    foreach ($items as $item) 
                                                    {
                                                        echo '<li style="padding-bottom: 15px;">' . trim($item) . '</li>';
                                                    // echo '<p style="font-size:19px;" class="about-us-text">'.$i1.'</p>';
                                                    }
                                                     echo '</ul>';
                                                }   
                                            }}
                                            
                                         
                                    ?>
                                    <?php
                                    $jobId = isset($_GET['jobid']) ? $_GET['jobid'] : '';
                                    $regId = isset($_SESSION['regid']) ? $_SESSION['regid'] : '';

                                    $sql = "SELECT * FROM cv WHERE jobid = '$jobId' AND userid = '$regId'";
                                    $result = $conn->query($sql);

                                    if ($result->num_rows > 0) {
                                        // Display a message saying that the user has already applied
                                        echo '<button class="primary-btn" style="margin-top: 20px;" >Already Applied!</button>';

                                        // echo "<p>You have already applied for this job.</p>";
                                    } else {
                                        // Display the file input and submit button
                                    ?>
                                        <form id="applyForm" enctype="multipart/form-data">
                                            <input type="file" class="form-control" name="cvres" id="cvres" accept="application/pdf" style="color: red; padding: 10px; border: 2px solid #ccc; border-radius: 4px; font-size: 16px;">
                                            <input type="hidden" id="jobId" name="jobId" value="<?php echo $jobId; ?>">
                                            <input type="hidden" id="regId" name="regId" value="<?php echo $regId; ?>">
                                            <button class="primary-btn" style="margin-top: 20px;" type="submit">Apply Now</button>
                                        </form>
                                    <?php
                                    }

                                    ?>

        

                                <!-- <form id="applyForm" enctype="multipart/form-data">
                                <input type="file" class="form-control" name="cvres" id="cvres" accept="application/pdf" style="color: red; padding: 10px; border: 2px solid #ccc; border-radius: 4px; font-size: 16px;">
                                <input type="hidden" id="jobId" name="jobId" value="<?php echo  isset($_GET['jobid']) ? $_GET['jobid'] : ''; ?>">
                                <input type="hidden" id="regId" name="regId" value="<?php echo  isset($_SESSION['regid']) ? $_SESSION['regid'] : ''; ?>">
                                <button class="primary-btn" style="margin-top: 20px;" type="submit">Apply Now</button>
                                </form> -->


                            </div>
                </div>
            </div>
        </div>
        <!-- about us area end here  -->

        <!-- service area start here  -->
        <div class="service-area section-bg">
            <div class="container-fluid p-0">
                <div class="row align-items-center g-0">
                    <div class="col-lg-6">
                        <div class="service-left"></div>
                    </div>
                    <div class="col-lg-6">
                        <div class="service-lsit">
                            <div class="row">
                                <div class="col-md-6 col-sm-6">
                                    <div class="single-service">
                                        <div class="service-icon">
                                            <img src="assets/images/service-icon-1.png" alt="service-icon">
                                        </div>
                                        <div class="service-info">
                                            <h3 class="service-title">All Day Comfort</h3>
                                            <p class="service-content">There’s no escaping fashion. It’s everywhere!</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <div class="single-service">
                                        <div class="service-icon">
                                            <img src="assets/images/service-icon-2.png" alt="service-icon">
                                        </div>
                                        <div class="service-info">
                                            <h3 class="service-title">Always dressed to kill</h3>
                                            <p class="service-content">Dress up your mind and you’ll be able to make all sorts of fashion statements</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <div class="single-service">
                                        <div class="service-icon">
                                            <img src="assets/images/service-icon-3.png" alt="service-icon">
                                        </div>
                                        <div class="service-info">
                                            <h3 class="service-title">Wear it and own it!</h3>
                                            <p class="service-content">Make it simple, but significant</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <div class="single-service">
                                        <div class="service-icon">
                                            <img src="assets/images/service-icon-4.png" alt="service-icon">
                                        </div>
                                        <div class="service-info">
                                            <h3 class="service-title">Ready to wear, ready to go</h3>
                                            <p class="service-content">We are all but canvases to the art called fashion</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <script>
        let sts=1;
  const applyButton = document.querySelector('.primary-btn');
  const fileInput = document.querySelector('input[type="file"]');

 applyButton.addEventListener('click', (event) => {
    if (!fileInput.files[0]) {
        event.preventDefault();
        Swal.fire({
            icon: 'warning',
            text: 'Please select a file to upload!',
        });
    } 
    else 
    {
         
            event.preventDefault(); // prevent default form submission behavior

            var formData = new FormData();
            formData.append('file', $('#cvres')[0].files[0]); // append file data to FormData object
            formData.append('jobId', $('input[name="jobId"]').val()); // append other data to FormData object
            formData.append('regId', $('input[name="regId"]').val());

            $.ajax({
                url: 'pdfcheck.php',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) 
                {
                    // alert(response);
                    if(response=="true"){
                        
                        $.ajax({
                            url: 'ajax.php?action=addcv',
                            type: 'POST',
                            data: formData,
                            processData: false,
                            contentType: false,
                            success: function(response) 
                            {
                                console.log(response);
                                const myArray = response.split("#");
                                if(myArray[0].trim()==1){
                                    var arr = 
                                        {
                                            'req': <?php echo "'".trim($jreq)."'"; ?>,
                                            'cv': myArray[1].trim()
                                        };
                                        $.ajax({
                                            url: 'http://127.0.0.1:8000/cv_prediction/',
                                            type: 'POST',
                                            data: JSON.stringify(arr),
                                            contentType: 'application/json; charset=utf-8',
                                            dataType: 'json',
                                            async: false,
                                            success: function(msg) {
                                                //console.log(msg);
                                                $.ajax({
                                                    url: 'ajax.php?action=updaterank',
                                                    type: 'POST',
                                                    data: {
                                                        fname : myArray[1].trim(),
                                                        rank : msg
                                                    },
                                                    success: function(response) 
                                                    {
                                                        //console.log(response);   
                                                        if(response == 1){   
                                                            Swal.fire({
                                                                    position: 'center',
                                                                    icon: 'success',
                                                                    text: "Job Applied Successfully!",
                                                                    type: "success"
                                                                }).then((result) => {
                                                                location.href='./appliedjobs.php?jobid=' + $('input[name="jobId"]').val();
                                                                })
                                                        }
                                                        else{
                                                            Swal.fire({
                                                                icon: 'warning',
                                                                text: 'Invalid!',
                                                                })
                                                        }
                                                    }
                                                });
                                            }
                                        });
                                }else{
                                    Swal.fire({
                                        icon: 'warning',
                                        text: 'Error Occured!',
                                        })
                                }
                            }
                        });

                    }else{
                        Swal.fire({
                            icon: 'warning',
                            text: 'Uplaod A valid CV..!',
                        })
                    }
                }
            });
 
 }
});


</script>




<?php 
include './footer.php'
?>