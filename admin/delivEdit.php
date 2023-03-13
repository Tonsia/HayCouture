

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
                                    <form id="delivupdate" enctype="multipart/form-data" method="POST" action="">
                                            
                                            <input type="hidden" name="id" value="">

                                            <div class="input__group mb-25">
                                                <label>Name</label>
                                                <input type="text" id="delivname"  class="lol" name="delivname" required  >
                                            </div>
                                            <div class="input__group mb-25">
                                            <label>Email ID</label>
                                                <input type="text" id="delivemail"   class="lol" name="delivemail" required   >
                                            </div>
                                          
                                            <div class="input__group mb-25">
                                                <label>Mobile Number</label>
                                                <input type="text" id="delivmob"  class="lol" name="delivmob" required >
                                            </div>
                                            <div class="input__group mb-25">
                                                <label>Address</label>
                                                <textarea name="delivadr" class="lol" id="delivadr" maxlength="499"  required ></textarea>
                                            </div>
                                            <div class="input__group mb-25">
                                                <label>License Number</label>
                                                <input type="text" id="delivlic"  class="lol"  name="delivlic" required  >
                                            </div>
                                    
                                        <input type="hidden" id="deliveditid" name="deliveditid" value="<?php echo $_GET['id'] ?> ">
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

    $('#delivupdate').submit(function(e) {
            e.preventDefault();
         

    // $('#delivupdate').submit(function(e) {
                // e.preventDefault();
                
                let nameInput = document.getElementById("delivname").value;
                let emailInput = document.getElementById("delivemail").value;
                let mobileInput = document.getElementById("delivmob").value;
                let addressInput = document.getElementById("delivadr").value;
                let licenseInput = document.getElementById("delivlic").value;
                let nameValid = /^[a-zA-Z]+([a-zA-Z ]*)$/.test(nameInput.trim());
                let emailValid = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/.test(emailInput.trim());
                let mobileValid =  /^[6-9]\d{9}$/.test(mobileInput.trim());
                let addressValid = addressInput.trim().length <= 499;
                let licenseValid = /^[A-Z]{2}\d{2}(19|20)\d{2}\d{7}$/.test(licenseInput.trim());

                if (!nameValid) {
                    event.preventDefault();
                    Swal.fire({
                        icon: 'error',
                        text: 'Please enter a valid name!',
                        
                        showConfirmButton: true,
                        onClose: () => {
                            // focus the name input field when the alert is closed
                            document.getElementById("delivname").focus();
                        }
                        });
                        
                    return;
                }

                if (!emailValid) {
                    event.preventDefault();
                    Swal.fire({
                        icon: 'error',
                        text: 'Please enter a valid Email ID!',
                        
                        showConfirmButton: true,
                        onClose: () => {
                            // focus the name input field when the alert is closed
                            document.getElementById("delivemail").focus();
                        }
                        });
                        
                    return;
                }

                if (!mobileValid) {
                    // swal("Oops...", "Please enter a valid 10-digit mobile number.", "error");
                    event.preventDefault();
                    Swal.fire({
                        icon: 'error',
                        text: 'Please enter a valid 10-digit mobile number!',
                        
                        showConfirmButton: true,
                        onClose: () => {
                            // focus the name input field when the alert is closed
                            document.getElementById("delivname").focus();
                        }
                        });
                        
                    return;
                }

                if (!addressValid) {
                    // swal("Oops...", "Please enter a valid address.", "error");
                    event.preventDefault();
                    Swal.fire({
                        icon: 'error',
                        text: 'Please enter a valid address!',
                        
                        showConfirmButton: true,
                        onClose: () => {
                            // focus the name input field when the alert is closed
                            document.getElementById("delivname").focus();
                        }
                        });
                        
                    return;
                }

                if (!licenseValid) {
                    // swal("Oops...", "Please enter a valid license number.", "error");
                    event.preventDefault();
                    Swal.fire({
                        icon: 'error',
                        text: 'Please enter a valid license number',
                        
                        showConfirmButton: true,
                        onClose: () => {
                            // focus the name input field when the alert is closed
                            document.getElementById("delivname").focus();
                        }
                        });
                        
                    return;
                }
                $.ajax({
                type: "POST",
                url: 'ajax.php?action=delivupdate',
                data: $(this).serialize(),
                success: function(response)
                        {
                            // document.write(response);
                            // console.log(response);
                            if(response == 1){
                             
                                Swal.fire({
                                        position: 'center',
                                        icon: 'success',
                                        text: "Details Updated Successfully!",
                                        type: "success"
                                        
                                    }).then(function() {
                                        window.location = "deliv.php";
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
                        url: 'ajax.php?action=editDeliv',
                        data: {id:<?php echo $_GET['id'] ?>},
                        success: function(response)
                        {
                            var data=response.split("#");
                            // document.write(data);
                            // console.log(data);       
                            document.getElementById("delivname").value=data[0].trim();
                            document.getElementById("delivemail").value=data[1].trim();
                            document.getElementById("delivmob").value=data[2].trim();
                            document.getElementById("delivadr").value=data[3].trim();
                            document.getElementById("delivlic").value=data[4].trim();

                        }
                    }); 

                });
    
    </script>
<?php include './master.foot.php';?>
