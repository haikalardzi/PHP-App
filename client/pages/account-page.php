<?php session_start();
if (!isset($_SESSION['username']) or !isset($_SESSION['email'])) {
    echo '<script type = "text/javascript">  
    function loggedout_catch() {  
       alert("You are logged in, please logout first if you want to login again");
       location.href = "../pages/login-page.php"
    }  
    loggedout_catch();
   </script>';
}?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial scale=1.0">
        <title>Account Page</title>
        <link rel="stylesheet" href="../css/account-page.css">
        <script src="https://kit.fontawesome.com/8505941c5b.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="../css/navbar.css">
        <script src="../js/navbar.js"></script>
    </head>
    <body>
        <div class="container">
            <div class="tabgroup" id="tabgroup">
                <script>
                    addnavbar();
                </script>
            </div>
            <div class="account-details">
                <h1>
                    Account Details
                </h1>
                <div class="text-field">
                    <label class="detail-label">Email</label>
                    <input class="detail-value" type="text" id="email-value" placeholder=
                    <?php echo isset($_SESSION["email"])?$_SESSION['email']:"<nologin>"?> 
                    disabled>
                </div>
                <div class="text-field">
                    <label class="detail-label">Username</label>
                    <input class="detail-value" type="text" id="username-value" placeholder=
                    <?php echo isset($_SESSION["username"])?$_SESSION['username']:"<nologin>"?>
                    disabled>
                </div>
                <div class="text-field">
                    <label class="detail-label">Password</label>
                    <input class="detail-value password" type="password" id="password-value" placeholder="--------" disabled oninput="confirmPassword()" onchange="cancelConfirmPassword()">
                    <p class="password-criteria"></p>
                </div>
                <div class="text-field" id="confirm-password-field">
                    <label class="detail-label">Confirm Password</label>
                    <input class="detail-value password" type="password" id="confirm-password-value" placeholder="Re-Type Password" oninput="confirmCorrectRetype()">
                    <p class="password-criteria"></p>    
                </div>
                <div class="button-field">
                    <button id="edit-profile-button" onclick="startEdit()">Edit profile</button>
                    <button id="cancel-edit-button" onclick="cancelEdit()">Cancel</button>
                    <button id="submit-edit-button" onclick="submitEdit()">Submit</button>
                </div>
            </div>
        </div>
        <script src="../js/account-page.js"></script>
    </body>
</html>