let signupBtn = document.getElementById("signupBtn");
let signinBtn = document.getElementById("signinBtn");
let nameField = document.getElementById("nameField");
let title = document.getElementById("title");

signinBtn.onclick = function(){
    signinBtn.style.background = "#3c00a0";
    signupBtn.style.background = "#eaeaea";
    signupBtn.style.color = "#555";
    signinBtn.style.color = "#fff";
    nameField.style.maxHeight = "0";
    title.innerHTML = "Sign In";
    signupBtn.classList.add("disable");
    signupBtn.classList.remove("disable");
}

signupBtn.onclick = function(){
    signupBtn.style.background = "#3c00a0";
    signinBtn.style.background = "#eaeaea";
    signupBtn.style.color = "#fff";
    signinBtn.style.color = "#555";
    nameField.style.maxHeight = "60px";
    title.innerHTML = "Sign Up";
    signupBtn.classList.remove("disable");
    signinBtn.classList.add("disable");
}