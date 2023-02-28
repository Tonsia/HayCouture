<?php
include "head.php";
// include "header.php";

    // $email = $_POST["pwd"];
    // echo $email;

?>
      <!-- Header  
                 breadcrumb area start here  
                <div class="breadcrumb-area">
                    <div class="container">
                        <!-- <div class="breadcrumb-wrap text-center">
                            <h2 class="page-title">Sign In</h2>
                            <ul class="breadcrumb-pages">
                                <li class="page-item"><a class="page-item-link" href="index.html">Home</a></li>
                                <li class="page-item">Sign In</li>
                            </ul>
                        </div> 
                    </div>
                </div>
         breadcrumb area end here  -->
        <!-- login area start here  --> 
        <div class="sign-in-page section">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-12 col-lg-5">
                        <div class="login-wrap">
                            <div class="icon d-flex align-items-center justify-content-center">
                                <span class="far fa-user"></span>
                            </div>
                            <h1 class="text-center mb-4">Forgot Password</h1>

                            <form id="forgot" class="login-form" action="" method="post">
                                <div class="form-group">
                                    <input type="email" class="form-control rounded-left" id="email" name="email" placeholder="Email ID" required>
                                </div>
                                <div id="otpsendbtn" class="form-group">
                                    <input type="submit" class="form-control btn btn-primary rounded submit px-3 primary-btn" value="Send OTP"></input>
                                </div>
                                <!-- <div class="form-group">
                                    <button type="submit" class="form-control btn btn-primary rounded submit px-3 primary-btn">
                                        <span class="spinner-border spinner-border-md hidden" role="status" ></span>
                                        Sending...
                                    </button>
                                </div> -->
                                <div class="already-have-account">
                                    Don't have an account?<a href="signup.php" class="forget-password-link">Sign Up</a>
                                </div>
                            </form>

                            <!-- for otp -->
                            <form id="otpform" class="login-form" action="" method="post" hidden>
                                <div class="form-group">
                                    <input type="text" class="form-control rounded-left" id="otp" name="otp" placeholder="Enter OTP recieved in the registered Email" required>
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="form-control btn btn-primary rounded submit px-3 primary-btn" value="Verify OTP"></input>
                                </div>
                                <div class="already-have-account">
                                    Don't have an account?<a href="signup.php" class="forget-password-link">Sign Up</a>
                                </div>
                            </form>

                            <!-- get new passwrd -->
                            <form id="newpass" class="login-form" action="" method="post" hidden>
                                <div class="form-group">
                                    <input type="password" class="form-control rounded-left" id="pass" name="pass" placeholder="Enter new password" required>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control rounded-left" id="pass1" name="pass1" placeholder="Confirm new password" required>
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="form-control btn btn-primary rounded submit px-3 primary-btn" value="Change Password"></input>
                                </div>
                            
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- about us area end here  -->
<?php
// include "footer.php";
include "js.php";
?>
<script type="text/javascript">
    bootstrapValidate('#email', 'email:Enter a valid E-Mail!');
    bootstrapValidate('#otp', 'numeric:Please enter correct numeric OTP!');
    bootstrapValidate('#pass', 'regex:^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,}):Password must has at least 8 characters that include at least 1 lowercase character, 1 uppercase characters, 1 number, and 1 special character in (!@#$%^&*)');
    //bootstrapValidate('#pass1', 'regex:^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,}):Password must has at least 8 characters that include at least 1 lowercase character, 1 uppercase characters, 1 number, and 1 special character in (!@#$%^&*)');
    bootstrapValidate('#pass1', 'matches:#pass:Your passwords should match')
    $(document).on({
    ajaxStart: function(){
        $('#otpsendbtn').html('<button type="button" class="form-control btn btn-primary rounded submit px-3 primary-btn">Sending...<span class="spinner-border spinner-border-lg hidden" role="status" ></span></button>');
    },
    ajaxStop: function(){ 
        $("body").removeClass("loading"); 
    }    
});
    $(document).ready(function() {
            $('#forgot').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: 'mailchecker.php',
                data: $(this).serialize(),
                success: function(response)
                {
                    
                    $('#forgot').prop('hidden', true);
                    $('#otpform').removeAttr('hidden');
                    
                }
                });
            }); 

            $('#otpform').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: 'ajax.php?action=verifyotp',
                data: $(this).serialize(),
                success: function(response)
                   {
                    // document.write(response);
                    if(response == 1){
                        $('#otpform').prop('hidden', true);
                        $('#newpass').removeAttr('hidden');
                    }
                    else{
                        //alert("Invalid OTP");
                        Swal.fire({
                            position: 'top-end',
                            icon: 'error',
                            title: 'Invalid OTP',
                            showConfirmButton: false,
                            timer: 1500
                            }).then((result) => {
                                location.href='./forgot_password.php';
                            })
                        // Toastify({ text: "Invalid OTP",style: {background: "red" }, duration: 4000 }).showToast(); 
                        //location.href='forgot_password.php';
                    }
                    
                    }
                });
            }); 

           
            $('#newpass').submit(function(e) {
                    e.preventDefault();
                    $.ajax({
                        type: "POST",
                        url: 'ajax.php?action=changepass',
                        data: $(this).serialize(),
                        success: function(response)
                        {
                            //document.write(response);
                            if(response == 1){
                                // Toastify({ text: "Password Changed Successfully",style: {background: "green" }, duration: 4000 }).showToast(); 
                                //alert("Password Changed Successfully");
                                Swal.fire({
                                    position: 'top-end',
                                    icon: 'success',
                                    title: 'Password Changed Successfully',
                                    showConfirmButton: false,
                                    timer: 1500
                                    }).then((result) => {
                                        location.href='./signin.php';
                                    })
                                //location.href='signin.php';
                            }
                            else if(response == 3)
                            {
                                Toastify({ text: "Some error occured! Please try again later",style: {background: "red" }, duration: 4000 }).showToast(); 
                                //alert("Some error occured! Please try later");
                            }
                            
                        }
                    });
             });
     });




</script>
    </body>
</html>
