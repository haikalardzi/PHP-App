<?php session_start();
    require_once "../../server/controllers/loggedout_catch.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial scale=1.0">
        <title>Cart</title>
        <link rel="stylesheet" href="../css/cart.css">
        <link rel="stylesheet" href="../css/navbar.css">
        <link rel="stylesheet" href="../css/sidebar.css">
        <script src="https://kit.fontawesome.com/8505941c5b.js" crossorigin="anonymous"></script>
        <script src="../js/navbar.js"></script>
        <script src="../js/sidebar.js"></script>
        <script src="../js/cart.js"></script>
    </head>
    <body>
        <div class="container">
            <div class="tabgroup" id="tabgroup">
                <script>
                    addnavbar();
                </script>
            </div>
            <div class="page-group">
                <h1>
                    Cart
                </h1>
                <div id="cart-group">
                    <div id="cart-list">
                        <script>
                            cartList();
                        </script>
                    </div>
                    <div id="checkout-options-field">
                        <p>Total price:</p>
                        <p>TOTAL PRICE</p>
                        <div class="button-field">
                            <button id="checkout-button" onclick="submitCheckout()">
                                <i class="fa-solid fa-money-bill-wave"></i> Checkout
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="sidebar" id="sidebar">
                <script>
                    addsidebar();
                </script>
            </div>
        </div>
    </body>
</html>