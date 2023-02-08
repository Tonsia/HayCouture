<?php
// include "head.php";
include "header.php";
?>

        <div class="sign-in-page section">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-12 col-lg-5">
                        <div class="login-wrap">
                            <div class="icon d-flex align-items-center justify-content-center">
                                <span class="far fa-user"></span>
                            </div>
                            <h1 class="text-center mb-4">Change Password</h1>

                            <!-- <form id="forgot" class="login-form" action="" method="post" hidden>
                                <div class="form-group">
                                    <input type="email" class="form-control rounded-left" id="email" name="email" placeholder="Email ID" required>
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="form-control btn btn-primary rounded submit px-3 primary-btn" value="Send OTP"></input>
                                </div>
                                <div class="already-have-account">
                                    Don't have an account?<a href="signup.php" class="forget-password-link">Sign Up</a>
                                </div>
                            </form> -->

                            <!-- for otp -->
                            <!-- <form id="otpform" class="login-form" action="" method="post" hidden>
                                <div class="form-group">
                                    <input type="text" class="form-control rounded-left" id="otp" name="otp" placeholder="Enter OTP recieved in the registered Email" required>
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="form-control btn btn-primary rounded submit px-3 primary-btn" value="Verify OTP"></input>
                                </div>
                                <div class="already-have-account">
                                    Don't have an account?<a href="signup.php" class="forget-password-link">Sign Up</a>
                                </div>
                            </form> -->

                            <!-- get new passwrd -->
                            <form id="newpass" class="login-form" action="" method="post">
                            <div class="form-group">
                                    <input type="password" class="form-control rounded-left" id="pass0" name="pass0" placeholder="Enter current password" required>

                                </div>
                                <div class="form-group">
                                    <input type="password" oninput="validate(this)" class="form-control rounded-left" id="pass" name="pass" placeholder="Enter new password" required>
                                    <small class="text-danger" id="err1"></small>
                                </div>
                                <div class="form-group">
                                    <input type="password" oninput="validate(this)" class="form-control rounded-left" id="pass1" name="pass1" placeholder="Confirm new password" required>
                                    <small class="text-danger" id="err2"></small>
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


<script type="text/javascript">
    var valid='';
    function validate(e){
        if(e.id==='pass'){
            console.log(e.value);
            const re = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})");
            if(re.test(e.value)===false){ 
                $("#err1").html("Password must has at least 8 characters that include at least 1 lowercase character, 1 uppercase characters, 1 number, and 1 special character in (!@#$%^&*)")
            }else{
                $("#err1").html("")
            }
        }
        
        if(e.id==='pass1'){
;
            var pass = $("#pass").val();
            console.log(pass);
            if(e.value!==pass){
                $("#err2").html("Password doesn't match!");
                valid='';
            }
            else{
                $("#err2").html("");
                valid='valid';
            }
        }
    }
    // bootstrapValidate('#email', 'email:Enter a valid E-Mail!');
    // bootstrapValidate('#otp', 'numeric:Please enter correct numeric OTP!');
    // bootstrapValidate('#pass', 'regex:^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,}):Password must has at least 8 characters that include at least 1 lowercase character, 1 uppercase characters, 1 number, and 1 special character in (!@#$%^&*)');
    // bootstrapValidate('#pass1', 'regex:^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,}):Password must has at least 8 characters that include at least 1 lowercase character, 1 uppercase characters, 1 number, and 1 special character in (!@#$%^&*)');
    // bootstrapValidate('#pass1', 'matches:#pass:Your passwords should match')
    
    $(document).ready(function() {
        $.ajax({
                        url: "ajax.php?action=listcategory", 
                        type: "POST",
                        data: {                        
                        },
                        //cache: false,
                        success: function(result){
                             console.log(result);
                            var datas = result.split(",");
                            var list1=datas[0].split("|");
                            var list2=datas[1].split("|");

                            var text = "";
                            for (let i = 0; i < list1.length-1; i++) {
                                text +='<option value="'+ list2[i]+'">'+ list1[i]+'</option>';
                            }

                            var text1 = "";
                            for (let i = 0; i < list1.length-1; i++) {
                                text1 +='<li class="mega-menu-items"><a class="mega-menu-link" href="shopgrid?category='+ list2[i]+'">'+ list1[i]+'</a></li>';
                            }
                            // console.log(text);
                            $("#catonsearch").html(text); 
                            $("#catinshop").html(text1); 
                        }
                });
           
            $('#newpass').submit(function(e) {
                    e.preventDefault();
                    if(valid==='valid'){
                    $.ajax({
                        type: "POST",
                        url: 'ajax.php?action=changepass',
                        data: $(this).serialize(),
                        success: function(response)
                        {
                            //document.write(response);
                            if(response == 1){
                                alert("Password Changed Successfully");
                                location.href='http://localhost/pro/signin.php';
                            }
                            // else if(response == 4)
                            // {
                            //     alert("Password does not match!");
                            // }
                            else if(response == 3)
                            {
                                alert("Some error occured! Please try later");
                            }
                            else if(response == 2)
                            {
                                alert("Incorrect Current Password");
                            }
                            
                        }
                    });
                }
             });
     });
</script>
<?php include "footer.php";?>
