<?php include './master.head.php';?>

    <div class="row">
        <div class="col-md-12">
            <div class="breadcrumb__content">
                <div class="breadcrumb__content__left">
                    <div class="breadcrumb__title">
                        <h2>Add Job</h2>
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
            <div class="gallery__area bg-style">
                <div class="gallery__content">
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-one" role="tabpanel" aria-labelledby="nav-one-tab">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-vertical__item bg-style">
                                        <form id="addjob" enctype="multipart/form-data" method="POST" action="">
                                            <div class="input__group mb-25">
                                                <label>Job Title</label>
                                                <input type="text" id="jobtitle"  class="lol" name="jobtitle" maxlength="29" required">
                                                <p style="margin-bottom: 0rem;" id="jobtitle-error" class="error-message"></p>
                                            </div>
                                           

                                            <div class="input__group mb-25">
                                                <label>Description</label>
                                                <textarea name="jobdescription" class="lol" id="jobdescription" maxlength="499" required ></textarea>
                                            </div>
                                          
                                            <div class="input__group mb-25">
                                                <label>Requirements</label>
                                                <select id="s" class="" multiple="multiple" name="s" required>
                                                        <!-- <option selected="selected">orange</option>
                                                        <option>white</option>
                                                        <option selected="selected">purple</option> -->
                                                        </select>
                                                <!-- <textarea name="jobrequirements" class="lol" id="jobrequirements" maxlength="499" required ></textarea> -->
                                            </div>
                                            <div class="input__button">
                                                <button type="submit" class="btn btn-blue">Add</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    
    <?php include './js.php';?>
    <script type="text/javascript">
    
    </script>
     <script type="text/javascript">
        var status=1;
        $(document).ready(function() {
             $("#s").select2({
                tags: true
                });
        


                $('#jobtitle').on('input', function() {
                        var value = '#jobtitle';
                        $.ajax({
                            url: 'ajax.php?action=availcheck',
                            type: 'post',
                            data: {
                                value:$(value).val().trim(),
                                tname:'jobs',
                                cname:'jobtitle'
                            },
                            success: function(response) {
                                // document.write(response);
                                // console.log(response);
                                if (response == 1) {
                                    $('#jobtitle-error').html("Job title already exists!").css('color', 'red').show();
                                    status=2;
                                } else {
                                    $('#jobtitle-error').hide();
                                    status=1;
                                }
                            }
                        });
                    });


        $('#addjob').submit(function(e) {
                e.preventDefault();
                if(status==2){
                    return
                }
                let jobtitle = document.getElementById("jobtitle").value;
                let jobdescription = document.getElementById("jobdescription").value;
                let titleValid = /^[a-zA-Z]+([a-zA-Z ]*)$/.test(jobtitle.trim());
                
                if (!titleValid) {
                    event.preventDefault();
                    Swal.fire({
                        icon: 'error',
                        text: 'Please enter a valid Job Title! [Only Characters Allowed]',
                        
                        showConfirmButton: true,
                        onClose: () => {
                            // focus the name input field when the alert is closed
                            document.getElementById("jobtitle").focus();
                        }
                        });
                        
                    return;
                }

                var abc=$("#s").val();
                    $.ajax({
                        type: "POST",
                        url: 'ajax.php?action=addjob',
                        data: $(this).serialize()+ "&par1="+abc,
                        success: function(response)
                        {
                            // document.write(response);
                            // console.log(response);
                            // alert(response);
                            if(response == 1){
                           
                                Swal.fire({
                                        position: 'center',
                                        icon: 'success',
                                        text: "Job Added Successfully!",
                                        type: "success"
                                }).then((result) => {
                                    location.href='./jobs.php';
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
            }); 
          
            
    });
        </script>
<?php include './master.foot.php';?>
