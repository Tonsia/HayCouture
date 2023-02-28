<?php
include "head.php";
include "header.php";

    // $email = $_POST["pwd"];
    // echo $email;

?>
      <!-- Header  
                 breadcrumb area start here  
                <div class="breadcrumb-area">
                    <div class="container">
                        <div class="breadcrumb-wrap text-center">
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
                            <h1 class="text-center mb-4">Sign In</h1>
                            <form id="signin" class="login-form" action="" method="post">


                            
                                <!-- <div class="input-overlay">
                                    <input type="text" name="email" id="email" value="./ app()->environment/local') ? 'admin@gmail.com' : old/email') }}" placeholder="Enter email address">
                                    <div class="overlay">
                                        <img src="./assets/admin/images/icons/mail.svg" alt="icon">
                                    </div>
                                </div>
                            </div> -->



                                <div class="form-group">
                               
                                    <input type="email" class="form-control rounded-left" id="email" name="email" placeholder="Email ID" required>
                                </div>
                                
                                <div class="form-group d-flex">
                                    <input type="password" class="form-control rounded-left" id="pwd" name="pwd" placeholder="Password" required>
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="form-control btn btn-primary rounded submit px-3 primary-btn"></input>
                                </div>
                                <div class="remember-box form-group d-md-flex justify-content-between mb-0">
                                    <div>
                                        <label class="checkbox-wrap">Remember Me
                                            <input type="checkbox" checked="checked">
                                            <span class="checkmark"></span>
                                          </label>
                                    </div>
                                    <div class="text-md-end text-lg-end">
                                        <a href="forgot_password.php" class="forget-password-link">Forgot Password?</a>
                                    </div>
                                </div>
                                
                                <div class="already-have-account">
                                    Don't have an account?<a href="signup.php" class="forget-password-link">Sign Up</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- about us area end here  -->
<?php
include "footer.php";
include "js.php";
?>
<script type="text/javascript">
    $(document).ready(function() {
        $('#signin').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: 'ajax.php?action=login',
                data: $(this).serialize(),
                success: function(response)
                   {
                        // document.write(response);
                        // console.log(response);
                        if(response == 1){
                            //alert("success");
                            //normal user
                            location.href ='../user/index.php';
                        }
                        else if(response == 4){
                            
                            //alert("success");
                            location.href ='../admin/dashboard.php';
                        }
                        else if(response == 6){
                            
                            //alert("success");
                            location.href ='../designer/dashboard.php';
                        }
                        else if(response == 7){
                            
                            //alert("success");
                            location.href ='../moderator/dashboard.php';
                        }
                        else
                        {
                            Swal.fire({
                                icon: 'error',
                                title: 'Invalid Credentials..'
                            }) 
                        }
                    }
                });
            }); 

           
        $.ajax({
                url: "../user/ajax.php?action=listcategory", 
                type: "POST",
                data: {                        
                },
                //cache: false,
                success: function(result){
                    // console.log(result);
                    var datas = result.split(",");
                    var list1=datas[0].split("|");
                    var list2=datas[1].split("|");

                    var text = "";
                    for (let i = 0; i < list1.length-1; i++) {
                        text +='<option value="'+ list2[i]+'">'+ list1[i]+'</option>';
                    }

                    var text1 = "";
                    for (let i = 0; i < list1.length-1; i++) {
                        text1 +='<li class="mega-menu-items"><a class="mega-menu-link" href="../user/shopgrid?category='+ list2[i]+'">'+ list1[i]+'</a></li>';
                    }
                    // console.log(text);
                    $("#catonsearch").html(text); 
                    $("#catinshop").html(text1); 
                }
        });
    });
</script>
    </body>
</html>
