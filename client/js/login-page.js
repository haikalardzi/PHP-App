let signupBtn = document.getElementById("signupBtn");
let signinBtn = document.getElementById("signinBtn");
let nameField = document.getElementById("EmailBox");
let title = document.getElementById("title");

signinBtn.onclick = function(){
    // sign in button is sign in "mode"
    if (!signinBtn.classList.contains("disable")){
        //get texts in form
        var username    = document.getElementById("Username-value").value;
        var password = document.getElementById("Password").value;
        //console log of sign in result
        console.log(
            "This form has a Username of " + username +
            " and password of " + password
        ); 

        //xmlhttprequest instantiate
        const formdata = new FormData();
        formdata.append('username', username);
        formdata.append('password', password);
        const xhr = new XMLHttpRequest();
        //method to be sent by xhr to php script and seting request header
        xhr.open('POST', '../../server/controllers/signin.php', true);
        // sending xmlhttprequest
        xhr.send(formdata);
        // callback function for handling response
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                // Process the response data here
                var responseData = JSON.parse(xhr.responseText);
                if (responseData.success) {
                    username = "";
                    password = "";
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
        var email    = document.getElementById("Email").value;
        var username = document.getElementById("Username-value").value;
        var password = document.getElementById("Password").value;
        formdata = new FormData();
        //prepare the data for sending
        formdata.append('email', email);
        formdata.append('username', username);
        formdata.append('password', password);

        //create XMLHttpRequest
        const xhr = new XMLHttpRequest();
        //open XMLHttpRequest
        xhr.open('POST', '../../server/controllers/signup.php', true);
        //sending
        xhr.send(formdata);
        //get backend response
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                var responseData = JSON.parse(xhr.responseText);
                console.log(responseData.message);
                if (responseData.success){
                    console.log(
                        "This form has a email of " + email + 
                        ", username of " + username + 
                        " and password of " + password
                    );
                    email    = "";
                    username = "";
                    password = "";
                    alert("Sign up success: " + responseData.message);
                } else {
                    console.log("Caught exception");
                    console.log("error: " + responseData.message);
                    alert(responseData.message);
                }
            } else if (xhr.status === 404){
                var responseData = JSON.parse(xhr.responseText);
                console.log(responseData.message);
            }
        }
        // var isUsernameUsed = Boolean(false);
        // //create a formdata to be sent through request
        // var formdata = new FormData();
        // formdata.append("signal", "sign up ready");
        // //create frontend request
        // const xhr = new XMLHttpRequest();
        // //open request with type request = POST
        // xhr.open('GET', '../../server/controllers/signup.php', true);
        // //sending request
        // xhr.send(formdata);
        // //get backend response
        // xhr.onreadystatechange = function () {
        //     if (xhr.readyState === 4 && xhr.status === 200) {
        //         // Process the response data here
        //         var responseData = JSON.parse(xhr.responseText);
        //         console.log(responseData.message);
        //         if (responseData.success) {
        //             /**responseData column: [0] = email
        //             *                       [1] = username
        //             *                       [2] = password  
        //             */                    
        //             var usernameList = responseData.data;
        //             for (let i = 0; i < usernameList.length; i++){
        //                 //check for availability of the username
        //                 if (username === usernameList[i][1]){
        //                     alert("Username already used!");
        //                     isUsernameUsed = true;
        //                     console.log(usernameList[i][1]);
        //                     username = "";
        //                     break;
        //                 }
        //             }
        //             if (!isUsernameUsed){
                        
        //             }
        //         } else {
        //             console.log("Caught exception");
        //             console.log("error: " + responseData.message);
        //         }
        //         // Update the DOM or perform other actions with the data
        //     } else if (xhr.status === 404) {
        //         var responseData = JSON.parse(xhr.responseText);
        //         console.log(responseData.message);
        //     }
        // }
        // console.log(isUsernameUsed);
        // // // if username available
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