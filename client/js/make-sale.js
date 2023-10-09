function checkValid(field, criteria, p_affected, response_if_invalid){
    if (criteria){
        //valid
        resetFieldStyle(field, p_affected);
    } else {
        //invalid
        invalidStyle(field, response_if_invalid, p_affected);
    }
}

function checkNumeric(field, field_input, p_affected) {
    checkValid(field, (/^\d+$/.test(field_input) || field_input==""), p_affected, "please input numerical value");
}

function checkNumericPrice() {
    checkNumeric(
        document.getElementById("product_price-field"),
        document.getElementById("product_price").value,
        document.getElementById("price-criteria")
    )
}
function checkNumericQuantity() {
    checkNumeric(
        document.getElementById("product_quantity-field"),
        document.getElementById("product_quantity").value,
        document.getElementById("quantity-criteria")
    )
}

function invalidStyle(param_field, reason, criteria_p) {
    param_field.style.borderColor = "red";
    criteria_p.textContent = reason;
}

function resetFieldStyle(param_field, criteria_p) {
    param_field.style.borderColor = "black";
    criteria_p.textContent = ' ';
}

var openFile = function(file) {
    var input = file.target;
    var reader = new FileReader();
    reader.onload = function(){
      var dataURL = reader.result;
      var output = document.getElementById('image-preview');
      output.src = dataURL;
    };
    reader.readAsDataURL(input.files[0]);
};

function submitSale() {
    // instansiasi FormData dan menambahkan hasil dari form
    var saleData = new FormData();
    // saleData.append('item_id', <tidak>) // karena item id sesuai penomoran dari 1, jadi diproses sendiri di server
    saleData.append('name', document.getElementById("product_name").value);
    saleData.append('picture_path', document.getElementById("product_image").files.length == 0 ? "no_picture.jpeg" : document.getElementById("product_image").files[0].name);
    saleData.append('description', document.getElementById("product_description").value);
    saleData.append('price',document.getElementById("product_price").value);
    saleData.append('quantity', document.getElementById("product_quantity").value);
    // saleData.append('Seller_username', sessionStorage.getItem("username"));

    for (const iterator of saleData.values()) {
        console.log(iterator);    
    }
    //xmlhttprequest
    const xhr = new XMLHttpRequest();
    xhr.open('POST', '../../server/controllers/sell_item.php', true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            // Process the response data here
            var responseData = JSON.parse(xhr.responseText);
            if (responseData.success) {
                alert(responseData.message);
                var file = document.getElementById("product_image").files[0];
                var imageData = new FormData();
                imageData.append('image', file);
                const xhr_uploadimage = new XMLHttpRequest();
                xhr_uploadimage.open('POST', '../../server/controllers/upload_jpg.php', true);
                xhr_uploadimage.onreadystatechange = function () {
                    if (xhr_uploadimage.readyState === 4 && xhr_uploadimage.status === 200) {
                        // Process the response data here
                        var responseData_uploadimage = JSON.parse(xhr_uploadimage.responseText);
                        if (responseData_uploadimage.success) {
                            alert(responseData_uploadimage.message);
                            location.href = "../pages/catalog.php";
                        } else {
                            alert("error: " + responseData_uploadimage.message)
                        }
                        // Update the DOM or perform other actions with the data
                    } else if (xhr_uploadimage.status === 404) {
                        var responseData_uploadimage = JSON.parse(xhr_uploadimage.responseText);
                        console.log(responseData_uploadimage.message);
                    }
                };
                xhr_uploadimage.send(imageData);
            } else {
                alert("error: " + responseData.message)
            }
            // Update the DOM or perform other actions with the data
        } else if (xhr.status === 404) {
            var responseData = JSON.parse(xhr.responseText);
            alert(responseData.message);
        }
    };
    xhr.send(saleData);
}