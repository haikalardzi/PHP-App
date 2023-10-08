<?php session_start();
    require_once "../../server/controllers/loggedout_catch.php";
    loggedout_catch();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial scale=1.0">
        <title>Cart</title>
        <link rel="stylesheet" href="../css/cart.css">
        <link rel="stylesheet" href="../css/navbar.css">
        <script src="https://kit.fontawesome.com/8505941c5b.js" crossorigin="anonymous"></script>
        <script src="../js/navbar.js"></script>
        <script src="../js/cart.js"></script>
    </head>
    <body>
        <div class="container">
            <div id="tabgroup">
                <script>
                    addnavbar();
                </script>
            </div>
            <div class="cart-group">
                <h1>
                    Cart
                </h1>
                <div class="cart-list">
                    <div class="item">
                        <div class="item-picture-group">
                            <image src="#" class="item-picture"></image>
                        </div>
                        <div class="item-text-fields">
                            <label class="item-label">Name</label>
                            <label class="item-label">Quantity</label>
                            <label class="item-label">Price</label>
                        </div>
                    </div>
                    <div class="item">
                        <div class="item-picture-group">
                            <image src="#" class="item-picture"></image>
                        </div>
                        <div class="item-text-fields">
                            <label class="item-label">Name</label>
                            <label class="item-label">Quantity</label>
                            <label class="item-label">Price</label>
                        </div>
                    </div>
                    <div class="item">
                        <div class="item-picture-group">
                            <image src="#" class="item-picture"></image>
                        </div>
                        <div class="item-text-fields">
                            <label class="item-label">Name</label>
                            <label class="item-label">Quantity</label>
                            <label class="item-label">Price</label>
                        </div>
                    </div>
                    <!-- contains item divs according to data -->
                </div>
                <div class="button-field">
                    <button id="checkout-button" onclick="submitCheckout()">
                    Checkout
                    </button>
                </div>
            </div>
        </div>
    </body>
</html>