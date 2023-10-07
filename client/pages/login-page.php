<?php
    session_start();
    if (isset($_SESSION['username']) or isset($_SESSION['email'])) {
        echo '<script type = "text/javascript">  
        function loggedin_catch() {  
           alert("You are logged in, please logout first if you want to login again");
           history.back();  
        }  
        loggedin_catch();
       </script>';
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial scale=1.0">
    <title>Sign In and Sign Up</title>
    <link rel="stylesheet" href="../css/login-page.css">
    <!-- <link rel="stylesheet" href="../css/navbar.css"> -->
    <script src="https://kit.fontawesome.com/8505941c5b.js" crossorigin="anonymous"></script>
    <!-- <script src="../js/navbar.js"></script> -->

</head>
<body>
<div class="container">
    <!-- <div class="tabgroup" id="tabgroup">
        <script>
            addnavbar();
        </script>
    </div> -->
    <img class="icon" src="../image/logoregis.svg" width="58%" height="26%">
    <div class="form-box">
        <h1 id="title">SIGN UP</h1>
        <form id="registration" action="">
            <div class="input-group">
                <div class="input-field" id="EmailBox">
                    <i class="fa-solid fa-envelope"></i>
                    <input id="Email" type="email" placeholder="Email" value="">
                </div>
                <div class="input-field">
                    <i class="fa-solid fa-user"></i> 
                    <input id="Username-value" type="text" placeholder="Username" value="">
                </div>
                
                
                <div class="input-field">
                    <i class="fa-solid fa-lock"></i>
                    <input id="Password" type="password" placeholder="Password" value="">
                </div>
                <p>Forget Password? <a href="#">Click here!</a></p>
            </div>
            <div class="btn-field">
                <button type="button" id="signupBtn">Sign Up</button>
                <button type="button" id="signinBtn" class="disable">Sign In</button>
            </div>
        </form>
    </div>
</div>
<script src="../js/login-page.js"></script>
</body>
</html>
