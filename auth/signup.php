<?php
include "head.php";
include "header.php";
?>
        
    <!-- about us area start here  section-->
        <div class="sign-in-page sign-up-page section">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-12 col-lg-5">
                        <div class="login-wrap">
                            <div class="icon d-flex align-items-center justify-content-center">
                                <span class="far fa-user"></span>
                            </div>
                            <h1 class="text-center mb-4">Sign Up</h1>
                            <form id="signup" class="login-form" action="" >
                                <div class="form-group">
                                    <input type="text" class="form-control rounded-left" id="name" name="name" placeholder="Full Name" required="">
                                    <small></small>
                                </div>
                                <!-- <div class="form-group mb-25 flex-fill">
                                    <input type="email" class="form-control rounded-left" id="email" name="email" placeholder="Email" required="">
                                    <small></small>
                                </div> -->


                                <div class="input-group d-flex"> 
                                    <div class="form-group mb-25 flex-fill" >
                                        <input type="email" class="form-control rounded-left" id="email" name="email" placeholder="Email" required>
                                        <small id="emailstatus"></small>
                                    </div>
                                    <div id="sendotpdiv" class="form-group ms-4 flex-fill"> 
                                        <button id="send_otp" type="button" onclick="sendotp()" class="form-control btn btn-primary rounded submit px-3 primary-btn" >Send OTP</button>
                                    </div> 
                                </div>

                                <div class="input-group d-flex" > 
                                    <div  id="otpdiv1" class="form-group mb-25 flex-fill" hidden>
                                        <input type="text" class="form-control rounded-left" id="otp" name="otp" placeholder="Enter OTP">
                                        <small></small>
                                    </div> 
                                    <div  id="otpdiv2" class="form-group ms-4 flex-fill" hidden> 
                                        <button id="verify_otp" type="button" onclick="verifyotp()" class="form-control btn btn-primary rounded submit px-3 primary-btn" >Verify OTP</button>
                                    </div> 
                                </div>

                                <div class="form-group">
                                    <input type="password" class="form-control rounded-left" id="password" name="password" placeholder="Password" required="">
                                    <small></small>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control rounded-left" id="password1" name="password1" placeholder="Re-enter your password" required="">
                                    <small></small>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control rounded-left" id="mob" name="mob" placeholder="Mobile Number" required="">
                                    <small></small>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control rounded-left" id="addr" name="addr" placeholder="House Name / Flat No." required="">
                                    <small></small>
                                </div>
                                <!-- here -->
                                <!-- <div class="d-flex">  -->
                                <div class="form-group">
                                <!-- <input type="text" class="form-control rounded-left" id="state" name="state" placeholder="State" required="">
                                        <small></small> --> 
                                        <!-- old -->
                                    <!-- <select class="form-control form-control-lg rounded-left" id="state-dropdown" name="state" placeholder="Address" >
                                    </select>  -->

                                    <input type="text" list="state-dropdown" class="form-control rounded-left" id ="state" name="state" placeholder="State" required="">
                                    <datalist id="state-dropdown">
                                    </datalist>
                                    <small></small>
                                </div>
                                <div class="form-group">
                                    <input type="text" list="district-dropdown" class="form-control rounded-left" id ="district" name="district" placeholder="District" required="">
                                    <datalist id="district-dropdown">
                                        
                                    </datalist>
                                    <small></small>
                                </div>

                                <div class="form-group">
                                    <input type="text" list="city-dropdown" class="form-control rounded-left" id="city" name="city" placeholder="City" required="">
                                    <datalist id="city-dropdown">
                                    </datalist>
                                    <small></small>
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control rounded-left" id="pin" name="pin" placeholder="PIN" required="">
                                    <small></small>
                                </div>
                                
                                <div class="form-group">
                                    <input type="submit" class="form-control btn btn-primary rounded submit px-3 primary-btn"></input>
                                </div>
                                
                                <div class="already-have-account">
                                    Already have an account?<a href="signin.php" class="forget-password-link">Sign In</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php
// include "footer.php";
include "js.php";
include "footer.php";
?>
<script src="assets/js/validation.js"></script>
<script type="text/javascript">

var status = 'not'; //for otp successs
var valid = ''; //for email valid otp send

    function sendotp(){

        var emailElement = document.querySelector('#email');
        const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

        if(re.test(emailElement.value)){ 
            //loading Spinner
            $('#send_otp').html('Sending...<span class="spinner-border spinner-border-lg hidden" role="status" ></span>');
            $.ajax({
                type: "POST",
                url: 'mailchecker.php',
                data: {email : $("#email").val()},
                success: function(response)
                {
                    $('#send_otp').html('Send OTP'); // <-- loading spinner off
                    $("#otpdiv1").removeAttr("hidden");
                    $("#otpdiv2").removeAttr("hidden");
                    $("#otp").focus();// <-- focusing on Enter otp Text box
                   
                }
            }); 
        }else{
            $("#email").focus();   
            Toastify({ text: "Enter a valid email !! ",style: {background: "red" }, duration: 4000 }).showToast();
        }
    }   

    function verifyotp(){
            $.ajax({
                type: "POST",
                url: 'ajax.php?action=verifyotp',
                data:  {otp : $("#otp").val()},
                success: function(response)
                {
                    // document.write(response);
                    if(response == 1){
                        status = 'valid';
                        $("#otpdiv1").attr("hidden");
                        $("#otpdiv2").attr("hidden");
                        //console.log("success");
                        Toastify({ text: "OTP Verified Successfully.. ",style: {background: "green" }, duration: 2000 }).showToast();

                    } 
                    else{
                        Toastify({ text: "Invalid OTP",style: {background: "red" }, duration: 2000 }).showToast();
                        $("#otp").focus();
                    }
                    
                }
            });
    }

    var unameavail;
    $(document).ready(function() {    
        $('#email').on('input', function(e){
                    $.ajax({
                        type: "POST",
                        url: 'ajax.php?action=unamecheck',
                        data: $(this).serialize(),
                        success: function(response)
                        {
                            if(response==1){
                                unameavail = false;
                                $("#send_otp").prop('disabled', true);//buttton disable for already exisiting email
                            }
                            else{
                                unameavail = true
                                valid = 'valid';
                                $("#send_otp").removeAttr("disabled");
                            }       
                        }
                    });
                });

        $('#signup').submit(function(e) {
            e.preventDefault();
            var status1='';
            if($("#password").val()===$("#password1").val())
            {
                status1='valid';
            }
            if(status==='valid' && status1==='valid'){
                    $.ajax({
                        type: "POST",
                        url: 'ajax.php?action=signup',
                        data: $(this).serialize(),
                        success: function(response)
                        {
                            // document.write(response);
                            // console.log(response);
                            if(response == 1){
                                Toastify({ text: "Registration Success !!! ",style: {background: "green" }, duration: 4000 }).showToast(); 
                                location.href ='signin.php';
                            }
                            else{ 
                                Toastify({ text: "Please Try Again !!! ",style: {background: "red" }, duration: 4000 }).showToast(); 
                                }
                        }
                    });
            }else
            {
                if(status1==='')
                {
                    Toastify({ text: "Password should match!!! ",style: {background: "red" }, duration: 4000 }).showToast();
                $("#email").focus();
                }
                if(status!='valid')
                {
                Toastify({ text: "Email Not Verified !!! ",style: {background: "red" }, duration: 4000 }).showToast();
                $("#email").focus();
                }
            }
        }); 
    });
</script>


<script type="text/javascript">
    //for state dropdwn
    $(document).ready(function() {
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


        //for state dropdown
        $.ajax({
                url: "ajax.php?action=states", 
                type: "POST",
                data: {                        
                },
        //cache: false,
        success: function(result){
            console.log(result.slice(0,-1));
            results = result.slice(0,-1);
            
            $('#state').attr('pattern', results);
            var list = result.split("|");
            var text = "";
            for (let i = 0; i < list.length-1; i++) {
                text +='<option value="'+ list[i]+'">';
            }

            $("#state-dropdown").html(text); 
        }
        });


    }); 

    //for dist dropdwn
        $('#state').on('change', function() {
            var state_name = this.value;
                $.ajax({
                        url: "ajax.php?action=districts", 
                        type: "POST",
                        data: {
                            state_name: state_name
                        },
                //cache: false,
                success: function(result){
                    console.log(result.slice(0,-1));
                    results = result.slice(0,-1);
                    
                    $('#district').attr('pattern', results);
                    
                    var list = result.split("|");
                    var text = "";
                    for (let i = 0; i < list.length-1; i++) {
                        text +='<option value="'+ list[i]+'">';
                    }
                    $("#district-dropdown").html(text); 
                }
                });
            }); 

     
            //for city dropdwn
        $('#district').on('change', function() {
                var district_id = this.value;
                $.ajax({
                url: "ajax.php?action=citys",
                type: "POST",
                data: {
                district_id:district_id
                },
                //cache: false, 
                success: function(result){
                    console.log(result.slice(0,-1));
                    results = result.slice(0,-1);
                    
                    $('#city').attr('pattern', results);
                    
                    var list = result.split("|");
                    var text = "";
                    for (let i = 0; i < list.length-1; i++) {
                        text +='<option value="'+ list[i]+'">';
                    }
                    $("#city-dropdown").html(text); 
                }
                });
            }); 

</script>

    </body>
</html>

