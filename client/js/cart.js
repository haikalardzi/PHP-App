cartList = () => {
    var cartListItems = document.getElementById("cart-list");
    const xhr = new XMLHttpRequest();
    xhr.open('POST', "../../server/controllers/cartdetail_query.php", true);
    xhr.send();
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            try {
                // Process the response data here
                var responseData = JSON.parse(xhr.responseText);
                if (responseData.success) {
                    cartListItems.innerHTML = "";
                    cartDataArray = responseData.data;
                    cartDataArray.forEach(row => {
                        cartListItems.innerHTML += `
                        <div class="item">
                            <div class="item-picture-group">
                                <image src="../image/${row['picture_path']}" class="item-picture"></image>
                            </div>
                            <div class="item-text-fields">
                                <textarea class="cart-item-detail" id="item-name" disabled>${row['name']}</textarea>
                                <h2 class="cart-item-detail" id="item-price">${row['price']*row['item_quantity']}</h2>
                                <p class="cart-item-detail" id="item-quantity">${row['item_quantity']}</p>
                            </div>
                        </div>
                        `
                    });
                } else {
                    alert("error: " + responseData.message)
                }
            } catch (error) {
                
            }
            // Update the DOM or perform other actions with the data
        } else if (xhr.status === 404) {
            var responseData = JSON.parse(xhr.responseText);
            console.log(responseData.message);
        }
    };
}