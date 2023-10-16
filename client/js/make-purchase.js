
function itemDetail(){
    var idItem = localStorage.getItem("purchase");
    var purchase = document.getElementById("purchaseform");
    const formdata = new FormData();
    formdata.append("signal", "make-purchase");
    formdata.append("item_id", idItem);
    const xhr = new XMLHttpRequest();
    xhr.open('POST', '../../server/controllers/itemdetail_query.php', true);
    xhr.send(formdata);
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200){
            try{
                var responseData = JSON.parse(xhr.responseText);
                if (responseData.success){
                    var itemList = responseData.data;
                    purchase.innerHTML = `
                    <div class="input-group">
                        <div class="input-image-field">
                            <img src="../image/no_picture.jpeg" id="image-preview" alt="">
                        </div>
                        <div class="input-text-fields">
                            <div class="input-field">
                                <input type="text" id="product_name" placeholder="${itemList[i][1]}" disabled>
                            </div>
                            <div class="input-field" id="product_description-field">
                                <textarea type="text" id="product_description" placeholder="${itemList[i][3]}" disabled></textarea>
                            </div>
                            <div class="input-field" id="product_price-field">
                                <input type="text" id="product_price" placeholder="${itemList[i][4]}" oninput="checkNumericPrice()" disabled>
                            </div>
                            <p id="price-criteria"> </p>
                            <div class="input-field" id="product_quantity-field">
                                <input type="text" id="product_quantity" placeholder="${itemList[i][5]}" oninput="checkNumericQuantity()" required>
                            </div>
                            <p id="quantity-criteria"> </p>
                        </div>
                        
                    </div>
                    <div class="button-field">
                        <button type="button" id="purchasesubmit" onclick="submitPurchase()">Done</button>
                    </div>`;
                } else {
                    alert("error: " + responseData.message);
                }
            } catch (err){}
        }  else if (xhr.status === 404){
            var response = JSON.parse(xhr.responseText);
            console.log(response.message);
        }
    }

}