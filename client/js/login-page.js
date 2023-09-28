let signupBtn = document.getElementById("signupBtn");
let signinBtn = document.getElementById("signinBtn");
let nameField = document.getElementById("Username");
let title = document.getElementById("title");

signinBtn.onclick = function(){
    // sign in button is sign in "mode"
    if (!signinBtn.classList.contains("disable")){
        var xhr = new XMLHttpRequest();
        var email    = document.getElementById("Email");
        var password = document.getElementById("Password");
        // xhr.open('POST', 'server/signin.php', true); // TODO: signin.php
        console.log(
            "This form has a email of " + email.value +
            " and password of " + password.value
        );
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