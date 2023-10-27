<?php
if (!isset($_SESSION['username']) or !isset($_SESSION['email'])) {
    echo '<script type = "text/javascript">  
    function loggedout_catch() {  
       alert("You are logged out, please login first");
       location.href = "../pages/login-page.php"
    }  
    loggedout_catch();
   </script>';
} else if (isset($_COOKIE['username'])) {
   // continue
}
?>