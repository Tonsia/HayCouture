<?php 
include './header.php'
?>
  <!-- about us area start here  -->
  <div class="sign-in-page sign-up-page section">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-12 col-lg-5">
                        <div class="login-wrap">
                            <div class="icon d-flex align-items-center justify-content-center">
                                <span class="far fa-user"></span>
                            </div>
                            <h1 class="text-center mb-4">Edit Profile</h1>
                            <form id="signup" class="login-form" action="" >
                            <fieldset>
                                <div class="form-group">
                                <legend>Name</legend>
                                    <input type="text" class="form-control rounded-left" id="name" name="name" placeholder="Full Name" required="">
                                    <small></small>
                                </div>
                                <!-- <div class="form-group">
                                    <input type="email" class="form-control rounded-left" id="email" name="email" placeholder="Email" required="">
                                    <small></small>
                                </div> -->
                                <!-- <div class="form-group"> -->
                                <div class="input-group d-flex"> 
                                    <div class="form-group mb-25 flex-fill" >
                                    <legend>Email</legend>
                                        <input type="email" class="form-control rounded-left" id="email" name="email" placeholder="Email" required readonly>
                                    </div> 
                                    <!-- <div class="form-group ms-4 flex-fill"> 
                                        <button id="send_otp" type="button" onclick="sendotp()" class="form-control btn btn-primary rounded submit px-3 primary-btn" >Send OTP</button>
                                    </div>  -->
                                </div>
                                
                                <!-- <div  class="input-group d-flex" > 
                                    <div id="otpdiv1" class="form-group mb-25 flex-fill" hidden>
                                        <input type="text" class="form-control rounded-left" id="otp" name="otp" placeholder="otp" required>
                                    </div>
                                    <div id="otpdiv2" class="form-group ms-4 flex-fill" hidden> 
                                        <button id="verifybtn" type="button" onclick="verifyotp()" class="form-control btn btn-primary rounded submit px-3 primary-btn" >Verify</button>
                                    </div> 
                                </div> -->
                                <!-- <div id="otpdiv" class="form-group" hidden>
                                    <input type="text" class="form-control rounded-left" id="otp" name="otp" placeholder="OTP" required>
                                    <small></small>
                                </div> --> 
                                <!-- </div> -->

                                <div class="form-group">
                                <legend>Mobile Number</legend>
                                    <input type="text" class="form-control rounded-left" id="mob" name="mob" placeholder="Mobile Number" required="">
                                    <small></small>
                                </div>
                                <div class="form-group">
                                <legend>House Name / Flat No.</legend>
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
                                    <legend>State</legend>
                                    <input type="text" list="state-dropdown" class="form-control rounded-left" id ="state" name="state" placeholder="State" required="">
                                    <datalist id="state-dropdown">
                                    </datalist>
                                    <small></small>
                                </div>
                                <div class="form-group">
                                <legend>District</legend>
                                    <input type="text" list="district-dropdown" class="form-control rounded-left" id ="district" name="district" placeholder="District" required="">
                                    <datalist id="district-dropdown">
                                        
                                    </datalist>
                                    <small></small>
                                </div>

                                <div class="form-group">
                                <legend>City</legend>
                                    <input type="text" list="city-dropdown" class="form-control rounded-left" id="city" name="city" placeholder="City" required="">
                                    <datalist id="city-dropdown">
                                    </datalist>
                                    <small></small>
                                </div>

                                <div class="form-group">
                                <legend>PIN</legend>
                                    <input type="text" class="form-control rounded-left" id="pin" name="pin" placeholder="PIN" required="">
                                    <small></small>
                                </div>
                                
                                <div class="form-group">
                                    <input type="submit" class="form-control btn btn-primary rounded submit px-3 primary-btn"></input>
                                </div>
</fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

      <!-- Js file  -->
        <script src="assets/js/jquery-3.6.0.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/plugins.js"></script>
        <script src="assets/js/main.js"></script>
        <script src="assets/js/validation.js"></script>
<script type="text/javascript">


    $(document).ready(function() {
        $.ajax({
                type: "POST",
                url: 'ajax.php?action=viewprofile',
                data: $(this).serialize(),
                success: function(response)
                   {
                    // document.write(response);
                    console.log(response);
                    var data = response.split("|");

                    document.getElementById("name").value=data[0].trim();
                    document.getElementById("email").value=data[1].trim();
                    document.getElementById("mob").value=data[2].trim();
                    document.getElementById("addr").value=data[3].trim();
                    document.getElementById("state").value=data[4].trim();
                    document.getElementById("district").value=data[5].trim();
                    document.getElementById("city").value=data[6].trim();
                    document.getElementById("pin").value=data[7].trim();
                   }
                });
        $('#signup').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: 'ajax.php?action=editprofile',
                data: $(this).serialize(),
                success: function(response)
                   {
                    // document.write(response);
                    // console.log(response);
                    if(response == 1){
                        alert("success");
                        location.href ='http://localhost/pro/signin.php';
                    }
                    else{
                        alert("Invalid");  
                        }
                     }
                    });
                }); 
            });
        </script>


<script type="text/javascript">
    //for state dropdwn
    $(document).ready(function() {
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
    }); 

    //for dist dropdwn
        $('#state').on('change', function() {
            console.log('hi');
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
<?php 
include './footer.php'
?>