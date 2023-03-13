<?php include 'header.php' ;
    if(!isset($_SESSION['regid'])){
        echo '<script type="text/javascript"> window.location.href="../auth/signin.php"; </script>';
    }
?>
     

      

        <!-- empty-wish-list area start here  -->
        <div class="empty-wish-list section">
            <div class="container">
                <div class="empty-box-wrap text-center">
                    <img class="empty-box-img" src="assets/images/empty-box.png" alt="empty-box">
                    <h2 class="empty-box-title">Sorry, there are currently no job openings.</h2>
                    <a href="./account.php" class="primary-btn">Return Home</a>
                </div>
            </div>
        </div>
        <!-- empty-wish-list area end here  -->

<?php include './footer.php' ?>
