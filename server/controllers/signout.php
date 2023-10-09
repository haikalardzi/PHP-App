<?php
    session_start();
    if (!isset($_SESSION['username']) or !isset($_SESSION['email'])) {
        echo '<script type = "text/javascript">  
        function loggedout_catch() {  
           alert("You are logged out, please login first");
           location.href = "../../client/pages/login-page.php"
        }  
        loggedout_catch();
       </script>';
    }
    session_destroy();
    echo '<script type = "text/javascript">
    function logout_back() {
        alert("Log out");
        location.href = "../../client/pages/catalog.php";
    }
    logout_back();
</script>'
?>