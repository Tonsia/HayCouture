

<?php include './master.head.php';?>

<div class="row">
    <div class="col-md-12">
        <div class="breadcrumb__content">
            <div class="breadcrumb__content__left">
                <div class="breadcrumb__title">
                    <h2>Edit Category</h2>
                </div>
            </div>
            <div class="breadcrumb__content__right">
                <nav aria-label="breadcrumb">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="./dashboard.php">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Category</li>
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
                                    <form id="jobupdate" enctype="multipart/form-data" method="POST" action="">
                                     <input type="hidden" name="id" value="">
                                        
                                     <div class="input__group mb-25">
                                                <label>Job Title</label>
                                                <input type="text" id="jobtitle"  class="lol" name="jobtitle" maxlength="29" required">
                                            </div>
                                            
                                            <div class="input__group mb-25">
                                                <label>Description</label>
                                                <textarea name="jobdescription" class="lol" id="jobdescription" maxlength="499" required ></textarea>
                                            </div>
                                          
                                            <div class="input__group mb-25">
                                                <label>Requirements</label>
                                                <select id="s" class="hello" multiple="multiple" name="s" required>
                                                        
                                                </select>
                                                <!-- <textarea name="jobrequirements" class="lol" id="jobrequirements" maxlength="499" required ></textarea> -->
                                            </div>
                                            <div class="input__group mb-25">
                                                <label for="exampleInputEmail1">Deadline of Submissions</label>
                                                <input type="date" id="expire_date" name="expire_date" required>
                                            </div>
                                     
                                     <input type="hidden" id="jobid" name="jobid" value="<?php echo $_GET['id'] ?> ">

                                        <div class="input__button">
                                            <button type="submit" class="btn btn-blue">Update</button>
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

$(document).ready(function() {
                
    $("#s").select2({
                tags: true
        });

    

    $('#jobupdate').submit(function(e) {
        e.preventDefault();
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
            url: 'ajax.php?action=jobupdate',
            data: $(this).serialize()+ "&par1="+abc,
            success: function(response)
                    {
                        // document.write(response);
                        // console.log(response);
                        if(response == 1){
                         
                            Swal.fire({
                                    position: 'center',
                                    icon: 'success',
                                    text: "Job Updated Successfully!",
                                    // text: "Message!",
                                    // showConfirmButton: false,
                                    type: "success"
                                    
                                }).then(function() {
                                    window.location = "jobs.php";
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
        });
    </script>
<script>
     $(document).ready(function() {


            $.ajax({
            type: "POST",
            url: 'ajax.php?action=jobedit',
            data: {
                id:<?php echo $_GET['id'] ?>
            },
            success: function(response)
            {
                // document.write(response);
                var data=response.split("#");
                var data2=data[2].split("-");
                // document.write(data[3]);
                // console.log(data);
                document.getElementById("jobtitle").value=data[0].trim();
                document.getElementById("jobdescription").value=data[1].trim();
                document.getElementById("expire_date").value=data[3].trim();
                let today = new Date();
                let dd = String(today.getDate()).padStart(2, '0');
                let mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
                let yyyy = today.getFullYear();

                today = yyyy + '-' + mm + '-' + dd;

                document.getElementById("expire_date").setAttribute("min", today);
                console.log(data2);
                for (let i = 0; i < data2.length; i++) {
                const newOption = document.createElement("option");
                newOption.value = data2[i];
                newOption.textContent = data2[i];
                
                // Set the selected attribute of the new option element to true
                newOption.selected = true;
                
                // Append the new option element to the select element
                const selectElement = document.querySelector('select[name="s"]');
                selectElement.appendChild(newOption);
                }
               }
            });
        }); 
</script>


<?php include './master.foot.php';?>
