let editBtn = document.getElementById('edit-profile-button');
let cancelBtn = document.getElementById('cancel-edit-button');
let submitBtn = document.getElementById('submit-edit-button');
let confirmPasswordEditField = document.getElementById('confirm-password-field');
let detailValue = document.getElementsByClassName('detail-value');
let emailValue = document.getElementById('email-value');
let usernameValue = document.getElementById('username-value');
let passwordValue = document.getElementById('password-value');
let confirmPasswordValue = document.getElementById('confirm-password-value')

let emailCurrent = emailValue.value;
let usernameCurrent = usernameValue.value;
let passwordCurrent = passwordValue.value;

function startEdit() {
    //turning off editBtn, and turning on cancelBtn/submitBtn
    editBtn.style.display = 'none';
    cancelBtn.style.display = 'block';
    submitBtn.style.display = 'block';
    for (const i of detailValue) {
        i.disabled = false;
    }
}

function cancelEdit() {
    editBtn.style.display = 'block';
    for (const i of detailValue) {
        i.disabled = true;
    }
    emailValue.value = emailCurrent;
    usernameValue.value = usernameCurrent;
    passwordValue.value = passwordCurrent;
    confirmPasswordValue.value = "";
    cancelBtn.style.display = 'none';
    submitBtn.style.display = 'none';
    confirmPasswordEditField.style.display = 'none';
}

function resetPasswordFieldStyle() {
    for (const iterator of document.getElementsByClassName("password")) {
        iterator.style.borderColor = "black";
        iterator.classList.remove("invalid");
    }
    for (const iterator of document.getElementsByClassName("password-criteria")) {
        iterator.textContent = ' ';
    }
}

function invalidPasswordAlert(reason){
    for (const itr of document.getElementsByClassName("password")) {
        itr.style.borderColor = "red";
        itr.classList.add("invalid");
    }
    for (const i of document.getElementsByClassName("password-criteria")) {
        i.textContent = reason;
    }
}

function confirmPassword() {
    confirmPasswordEditField.style.display = 'block';
}

function cancelConfirmPassword() {
    if (passwordValue.value == "") {
        confirmPasswordEditField.style.display = 'none';
        resetPasswordFieldStyle();
    }
}

function confirmCorrectRetype() {
    if (confirmPasswordValue.value != passwordValue.value) {
        invalidPasswordAlert("Password is different")
    } else {
        resetPasswordFieldStyle();
    }
}

function submitEdit() {
    editedData = new FormData();
    if (emailValue.value != "" || emailValue.value != emailCurrent) {
        editedData.append('email', emailValue.value);
    } else {
        editedData.append('email', '%');
    }
    if (usernameValue.value != "" || usernameValue.value != usernameCurrent) {
        editedData.append('username', usernameValue.value);
    } else {
        editedData.append('username', '%');
    }
    let passwordInvalidity = document.getElementsByClassName("invalid").length;
    if (passwordValue.value != "" && passwordInvalidity == 0) {
        editedData.append('password', passwordValue.value);
    } else if (passwordInvalidity > 0) {
        alert("Password is invalid, please input valid password")
    } else {
        editedData.append('password', '%');
    }
    isAllEmpty = true;
    for (const iterator of editedData.values()) {
        if (iterator != '%'){
            isAllEmpty = false;
            break;
        }
    }
    if (!isAllEmpty) {
        const xhr = new XMLHttpRequest();
        xhr.open('POST', '../../server/controllers/update_profile.php', true);
        console.log("submitting")
        xhr.send(editedData);
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
        };
        location.reload();
    } else {
        console.log("all form is empty, cancelling");
    }
    
}