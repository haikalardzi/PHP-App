
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

addToCart = () => {
    const formData = new FormData();
    formData.append("item_id", item_id);
    formData.append("item_quantity", document.getElementById("buy-quantity-input").value)

    const xhr = new XMLHttpRequest();
    xhr.open('POST', "../../server/controllers/add_cart.php", true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            // Process the response data here
            var responseData = JSON.parse(xhr.responseText);
            if (responseData.success) {
                alert(responseData.message);
            } else {
                alert("error: " + responseData.message)
            }
            // Update the DOM or perform other actions with the data
        } else if (xhr.status === 404) {
            var responseData = JSON.parse(xhr.responseText);
            console.log(responseData.message);
        }
    }
    xhr.send(formData);
}

subTotal = () => {
    var buyQuantity = document.getElementById("buy-quantity-input").value;
    var buyPrice = parseInt(document.getElementById("product_price").textContent);
    var subTotal = buyQuantity * buyPrice;
    return document.getElementById("subtotal_price").innerHTML = subTotal.toString();
}