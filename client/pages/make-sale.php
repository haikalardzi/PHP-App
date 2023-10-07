<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial scale=1.0">
        <title>Make Sale</title>
        <link rel="stylesheet" href="../css/navbar.css">
        <link rel="stylesheet" href="../css/make-sale.css">
        <script src="../js/navbar.js"></script>
        <script src="https://kit.fontawesome.com/8505941c5b.js" crossorigin="anonymous"></script>
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
                        <div class="input-field">
                            <input type="text" id="product_name" placeholder="Product Name">
                        </div>
                        <div class="input-field">
                            <input type="text" id="product_description" placeholder="Product Description">
                        </div>
                        <div class="input-field">
                            <input type="text" id="product_price" placeholder="Price">
                        </div>
                        <div class="input-field">
                            <input type="text" id="product_qty" placeholder="Quantity">
                        </div>
                        <div class="input-field">
                            <input type="image" id="product_image" placeholder="Product Image" title="Product Image">
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