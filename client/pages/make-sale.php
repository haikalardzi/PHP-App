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
                            <img src="#" id="image-preview" alt="">
                            <input accept=".jpg, .jpeg"  type="file" id="product_image" placeholder="Product Image" title="Product Image" onchange="openFile(event)" required>
                        </div>
                        <div class="input-text-fields">
                            <div class="input-field">
                                <input type="text" id="product_name" placeholder="Product Name" required>
                            </div>
                            <div class="input-field" id="product_description-field">
                                <textarea type="text" id="product_description" placeholder="Product Description" required></textarea>
                            </div>
                            <div class="input-field" id="product_price-field">
                                <input type="text" id="product_price" placeholder="Price" oninput="checkNumericPrice()" required>
                            </div>
                            <p id="price-criteria"> </p>
                            <div class="input-field" id="product_quantity-field">
                                <input type="text" id="product_quantity" placeholder="Quantity" oninput="checkNumericQuantity()" required>
                            </div>
                            <p id="quantity-criteria"> </p>
                        </div>
                        
                    </div>
                    <div class="button-field">
                        <button type="button" id="salesubmit" onclick="submitSale()">Done</button>
                    </div>
                </form>
            </div>
            <div class="sidebar" id="sidebar">
                <script>
                    addsidebar();
                </script>
            </div>
        </div>
    </body>
</html>