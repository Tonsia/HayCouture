<?php 
session_start();
if (!isset($_SESSION['user']))
{
    header('location:signin.php');
}

//print_r($_SESSION);
?>

Login Success!
<p><?php echo "hello ".$_SESSION['username']; ?> </p>
<button onclick="location.href='signin.php'" value="">logout</button>

<?php
// include "footer.php";
// include "js.php";
?>