<?php include './master.head.php';?>

    <div class="row">
        <div class="col-md-12">
            <div class="breadcrumb__content">
                <div class="breadcrumb__content__left">
                    <div class="breadcrumb__title">
                        <h2>Add Delivery Person</h2>
                    </div>
                </div>
                <div class="breadcrumb__content__right">
                    <nav aria-label="breadcrumb">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="./dashboard.php">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Add Delivery Person</li>
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
                                        <form id="delivsub" enctype="multipart/form-data" method="POST" >
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
                                            <div class="input__button">
                                                <button type="submit" class="btn btn-blue" >Add</button>
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

            $('#delivsub').submit(function(e) {
                e.preventDefault();
                
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
                        url: 'ajax.php?action=addDeliv',
                        data: $(this).serialize(),
                        success: function(response)
                        {
                            // document.write(response);
                            console.log(response);
                            // alert(response);
                            if(response == 1)
                            {
                                Swal.fire({
                                        position: 'center',
                                        icon: 'success',
                                        text: "Person Added Successfully!",
                                        type: "success"
                                }).then((result) => {
                                    location.href='./deliv.php';
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
