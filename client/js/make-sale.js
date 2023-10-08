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
    
    var saleData = new FormData();
    // saleData.append('item_id', )
}