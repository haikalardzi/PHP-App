let signupBtn = document.getElementById("signupBtn");
let signinBtn = document.getElementById("signinBtn");
let nameField = document.getElementById("Username");
let title = document.getElementById("title");

signinBtn.onclick = function(){
    // sign in button is sign in "mode"
    if (!signinBtn.classList.contains("disable")){
        //xmlhttprequest instantiate
        var xhr = new XMLHttpRequest();
        //get texts in form
        var email    = document.getElementById("Email");
        var password = document.getElementById("Password");
        //method to be sent by xhr as http
        xhr.open('POST', '../server/controllers/signin.php', true);
        //console log of sign in result
        console.log(
            "This form has a email of " + email.value +
            " and password of " + password.value
        ); 
        // callback function for handling response
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                // Process the response data here
                var responseData = JSON.parse(xhr.responseText);
                // Update the DOM or perform other actions with the data
            }
        };
        xhr.send();
        email.value    = "";
        password.value = "";
    }
    // sign in button is not in sign in mode,
    // so it changes sign in button appearance
    // and changes mode to sign in
    signinBtn.style.background = "#3c00a0";
    signupBtn.style.background = "#ffffffab"
    signupBtn.style.color = "#555";
    signinBtn.style.color = "#fff";
    nameField.style.maxHeight = "0";
    title.innerHTML = "SIGN IN";
    signupBtn.classList.add("disable");
    signinBtn.classList.remove("disable");
}



signupBtn.onclick = function(){
    // sign up button is sign up "mode"
    if (!signupBtn.classList.contains("disable")){
        var username = document.getElementById("Username-value");
        var email    = document.getElementById("Email");
        var password = document.getElementById("Password");
        console.log(
            "This form has a username of " + username.value + 
            ", email of " + email.value + 
            " and password of " + password.value
        );
        username.value = "";
        email.value    = "";
        password.value = "";
    }
    // sign in button is not in sign in mode,
    // so it changes sign in button appearance
    // and changes mode to sign in
    signupBtn.style.background = "#3c00a0";
    signinBtn.style.background = "#ffffffab"
    signupBtn.style.color = "#fff";
    signinBtn.style.color = "#555";
    nameField.style.maxHeight = "60px";
    title.innerHTML = "SIGN UP";``
    signupBtn.classList.remove("disable");
    signinBtn.classList.add("disable");
           
        
}

function load(){
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function(){
        document.getElementById("").innerHTML = this.responseText;
    }
    xhttp.open("GET", null);
    xhttp.send();
}