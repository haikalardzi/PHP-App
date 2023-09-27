let signupBtn = document.getElementById("signupBtn");
let signinBtn = document.getElementById("signinBtn");
let nameField = document.getElementById("Username");
let title = document.getElementById("title");

signinBtn.onclick = function(){
    signinBtn.style.background = "#3c00a0";
    signupBtn.style.background = "#ffffffab"
    signupBtn.style.color = "#555";
    signinBtn.style.color = "#fff";
    nameField.style.maxHeight = "0";
    title.innerHTML = "Sign In";
    signupBtn.classList.add("disable");
    signinBtn.classList.remove("disable");
    if (signupBtn.classList.contains("disable")){
        getForm();
    }
}



signupBtn.onclick = function(){
    signupBtn.style.background = "#3c00a0";
    signinBtn.style.background = "#ffffffab"
    signupBtn.style.color = "#fff";
    signinBtn.style.color = "#555";
    nameField.style.maxHeight = "60px";
    title.innerHTML = "Sign Up";
    signupBtn.classList.remove("disable");
    signinBtn.classList.add("disable");
    if (signinBtn.classList.contains("disable")){
        getForm();
    }
}

function load(){
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function(){
        document.getElementById("").innerHTML = this.responseText;
    }
    xhttp.open("GET", null);
    xhttp.send();
}

function getForm(){
    var data = new FormData(document.getElementById("registration"));

    fetch("SERVER-SCRIPT", { method: "get", body: data })
        .then(res=>res.text())
        .then(txt=>console.log(txt))
        .catch(err=>console.log(err))

    return false;
}