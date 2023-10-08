<?php session_start();
    require_once "../../server/controllers/loggedout_catch.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial scale=1.0">
        <title>Make Sale</title>
        <link rel="stylesheet" href="../css/navbar.css">
        <link rel="stylesheet" href="../css/make-sale.css">
        <script src="../js/navbar.js"></script>
        <script src="https://kit.fontawesome.com/8505941c5b.js" crossorigin="anonymous"></script>
        <script src="../js/make-sale.js"></script>
    </head>
    
    <body>
        <div class="container">
            <div class="tabgroup" id="tabgroup">
                <script>addnavbar();</script>
            </div>
            <div class="saleform-group">
                <h1 id="title">Make A Sale</h1>
                <form id="saleform">
                    <div class="input-group">
                        <div class="input-image-field">
                            <input type="image" id="product_image" placeholder="Product Image" title="Product Image">
                        </div>
                        <div class="input-text-fields">
                            <div class="input-field">
                                <input type="text" id="product_name" placeholder="Product Name">
                            </div>
                            <div class="input-field" id="product_description-field">
                                <textarea type="text" id="product_description" placeholder="Product Description"></textarea>
                            </div>
                            <div class="input-field" id="product_price-field">
                                <input type="text" id="product_price" placeholder="Price" oninput="checkNumericPrice()">
                            </div>
                            <p id="price-criteria"> </p>
                            <div class="input-field" id="product_quantity-field">
                                <input type="text" id="product_quantity" placeholder="Quantity" oninput="checkNumericQuantity()">
                            </div>
                            <p id="quantity-criteria"> </p>
                        </div>
                        
                    </div>
                    <div class="button-field">
                        <button type="button" id="salesubmit">Done</button>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>