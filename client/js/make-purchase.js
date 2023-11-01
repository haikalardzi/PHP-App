
incrementQuantity = () => {
    document.getElementById("buy-quantity-input").stepUp(1);
    subTotal();
}
decrementQuantity = () => {
    document.getElementById("buy-quantity-input").stepDown(1);
    subTotal();
}
keyboardInputQuantity = () => {
    if (document.getElementById("buy-quantity-input").value > document.getElementById("buy-quantity-input").getAttribute("max")){
        document.getElementById("buy-quantity-input").value = document.getElementById("buy-quantity-input").getAttribute("max");
    }
    subTotal();
}

subTotal = () => {
    var buyQuantity = document.getElementById("buy-quantity-input").value;
    var buyPrice = parseInt(document.getElementById("product_price").textContent);
    var subTotal = buyQuantity * buyPrice;
    return document.getElementById("subtotal_price").innerHTML = subTotal.toString();
}