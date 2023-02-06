<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>app_title</title>

    <!-- Favicon included -->
    <link rel="shortcut icon" href="./assets(IMG_FAVICON_PATH.'favicon.png" type="image/x-icon">

    <!-- Apple touch icon included -->
    <link rel="apple-touch-icon" href="./assets(IMG_FAVICON_PATH.'favicon.png">

    <!-- All CSS files included here -->
    <link rel="stylesheet" href="./assets/admin/css/all.min.css">
    <link rel="stylesheet" href="./assets/admin/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/admin/styles/main.css">

</head>

<body>
<!-- Login Content -->
<div class="main-content__area bg-img">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-8 col-md-10">
                <div class="authentication__item">
                    <div class="authentication__item__logo">
                        <a href="./route/front">
                            <img src="./assets/uploaded_files/logo/logo.png" alt="icon">
                        </a>
                    </div>
                    <div class="authentication__item__title mb-30">
                        <h2>Sign In</h2>
                    </div>
                    <div class="authentication__item__content">
                        <form action="./ route/login.post') }}" method="post">
                            <div class="input__group mb-25">
                                <label>Email Address</label>
                                <div class="input-overlay">
                                    <input type="text" name="email" id="email" value="./ app()->environment/local') ? 'admin@gmail.com' : old/email') }}" placeholder="Enter email address">
                                    <div class="overlay">
                                        <img src="./assets/admin/images/icons/mail.svg" alt="icon">
                                    </div>
                                </div>
                            </div>
                            <div class="input__group mb-20">
                                <label>Password</label>
                                <div class="input-overlay">
                                    <input type="password" name="password" id="pass" value="./ app()->environment/local') ? '123456' : '' }}" placeholder="Enter password">
                                    <div class="overlay">
                                        <img src="./assets/admin/images/icons/lock.svg" alt="icon">
                                    </div>
                                    <div class="password-visibility">
                                        <img src="./assets/admin/images/icons/eye.svg" alt="icon">
                                    </div>
                                </div>
                            </div>
                            <div class="input__group mb-27">
                                <button type="submit" class="btn btn-blue">Sign In</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Login Content -->
<script src="./assets/admin/js/jquery-3.6.0.min.js"></script>
<script src="./assets/admin/js/popper.min.js"></script>
<script src="./assets/admin/js/bootstrap.min.js"></script>
<script src="./assets/admin/js/custom/password-show.js"></script>
</body>
</html>
