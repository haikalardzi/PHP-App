<?php session_start();
    require_once "../../server/controllers/item_query.php";
    $query_response = item_query($_GET['id']);
    $response_data = $query_response[0];
    $item_details = array(
        "id" => $response_data['item_id'],
        "name" => $response_data['name'],
        "picture_path" => $response_data['picture_path'],
        "description" => $response_data['description'],
        "price" => $response_data['price'],
        "quantity" => $response_data['quantity'],
        "seller_username" => $response_data['Seller_username']
    );
?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial scale=1.0">
        <title>Make Purchase</title>
        <link rel="stylesheet" href="../css/make-purchase.css">
        <link rel="stylesheet" href="../css/navbar.css">
        <link rel="stylesheet" href="../css/sidebar.css">
        <script src="../js/navbar.js"></script>
        <script src="../js/sidebar.js"></script>
        <script src="https://kit.fontawesome.com/8505941c5b.js" crossorigin="anonymous"></script>
        <script src="../js/make-purchase.js"></script>
    </head>
    <body>
        <div class="container">
            <div class="tabgroup" id="tabgroup">
                <script>
                    addnavbar();
                </script>
            </div>
            <div class="purchaseform-group">
                <h1 id="title">Make A Purchase</h1>
                <div id="purchaseform">
                    <div id="image-seller-field">
                        <img src="../image/no_picture.jpeg">
                        <div class="input-field" id="seller-field">
                            <p type="text" id="seller_username"><?php echo $item_details["seller_username"]?></p>
                        </div>
                    </div>
                    <div id="input-text-fields">
                        <div class="input-field" id="name-field">
                            <h2 type="text" id="product_name" disabled><?php echo $item_details["name"]?></h2>
                        </div>
                        <div class="input-field" id="product_price-field">
                            <h1 style="display: inline;">Rp</h1>
                            <h1 type="text" id="product_price" disabled style="display: inline;"><?php echo $item_details["price"]?></h1>
                        </div>
                        <div class="input-field" id="product_quantity-field">
                            <p  style="display: inline;">Stock: </p>
                            <p type="text" id="product_quantity" disabled style="display: inline;"><?php echo $item_details["quantity"]?></p>
                        </div>
                        <br>
                        <div class="input-field" id="product_description-field">
                            <p type="text" id="product_description"  disabled><?php echo $item_details["description"]?> </p>
                        </div>
                    </div>
                    <div id= "buy-details">
                        <div id="buy-quantity-field"> 
                            <div>
                                <button id="min-quantity" onclick="decrementQuantity()">
                                    <i class="fa-solid fa-minus"></i>
                                </button>
                            </div>
                            <div id="buy-quantity">
                                <input 
                                    id="buy-quantity-input" 
                                    type="number" 
                                    value="1" 
                                    min="1" 
                                    oninput="keyboardInputQuantity()"/></input>
                                <!-- <input id="buy-quantity-input" type="text"></input> -->
                            </div>
                            <div>
                                <button id="plus-quantity" onclick="incrementQuantity()">
                                    <i class="fa-solid fa-plus"></i>
                                </button>
                            </div>
                        </div>
                        <div id="buy-price-field">
                            <p style="display: inline;">Rp
                            </p>
                            <p style="display: inline;" id="subtotal_price">
                                <script>
                                    subTotal();
                                </script>
                            </p>
                        </div>
                        <div id="add2cart-button-field">
                            <button>
                                <i class="fa-solid fa-cart-shopping">
                                </i>
                                Add To Cart
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
    <script id="quantity-editor-max-setter"> 
        document.getElementById("buy-quantity-input").setAttribute("max", document.getElementById('product_quantity').textContent);
    </script>
</html>