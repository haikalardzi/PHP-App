<?php session_start()?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial scale=1.0">
        <title>Account Page</title>
        <link rel="stylesheet" href="../css/account-page.css">
        <link rel="stylesheet" href="../css/navbar.css">
        <script src="https://kit.fontawesome.com/8505941c5b.js" crossorigin="anonymous"></script>
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
                    <span class="detail-value">
                        <?php echo $_SESSION['email']?>
                        <!-- email-value -->
                    </span>
                    <!-- <button type="button" class="email-edit">
                        <i class="fa-solid fa-pencil"></i>
                    </button> -->
                </div>
                <div class="text-field">
                    <label class="detail-label">Username</label>
                    <span class="detail-value">
                        <?php echo $_SESSION['username']?>
                        <!-- username-value -->
                    </span>
                    <!-- <button type="button" class="username-edit">
                        <i class="fa-solid fa-pencil"></i>
                    </button> -->
                </div>
                <div class="text-field">
                    <label class="detail-label">Password</label>
                    <span class="detail-value">
                        --------
                    </span>
                    <!-- <button type="button" class="password-edit">
                        <i class="fa-solid fa-pencil"></i>
                    </button> -->
                </div>
                <div class="button-field">
                    <button type="button">Edit profile</button>
                </div>
            </div>
        </div>
    </body>
</html>