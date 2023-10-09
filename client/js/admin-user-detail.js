function showPass(){
    document.getElementById("Password").setAttribute("type", "text");
    document.getElementById("showpass").setAttribute("onclick", "dontShowPass()");
}

function dontShowPass(){
    document.getElementById("Password").setAttribute("type", "password");
    document.getElementById("showpass").setAttribute("onclick", "showPass()");
}

function userDetail(){
    var useredit = document.getElementById("detail-container");
    const formdata = new FormData();
    var username = localStorage.getItem("username");
    formdata.append("signal", "userdetail");
    formdata.append("Username", username);
    const xhr = new XMLHttpRequest();
    xhr.open('POST', '../../server/controllers/admin-user-detail.php', true);
    xhr.send(formdata);
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200){
            try{
                var responseData = JSON.parse(xhr.responseText);
                if (responseData.success){
                    var itemList = responseData.data;
                    useredit.innerHTML = `
                        <h2 class="Username"><i class="fa-solid fa-user"></i> ${itemList[0][1]}</h2>
                        <h2><i class="fa-solid fa-envelope"></i> Email</h2>
                        <div class="input-field">
                            <input id="Email" type="text" placeholder="Email" value="${itemList[0][0]}">
                        </div>
                        <h2><i class="fa-solid fa-lock"></i> Password</h2>
                        <div class="input-field">
                            <input id="Password" type="password" placeholder="Password" value="${itemList[0][2]}">
                            <button id="showpass" onclick="showPass()"><i class="fa-solid fa-eye"></i></button>
                        </div>
                        <div class="btn-field">
                            <button class="confirm" onclick="confirmEdit()">Confirm</button>
                            <button class="delete-user" onclick="deleteUser()">Delete User</button>
                        </div>
                        `;
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

function confirmEdit(){
    var username = localStorage.getItem("username");
    var email = document.getElementById("Email").value;
    var password = document.getElementById("Password").value;
    const formdata = new FormData();
    formdata.append("signal", "useredit");
    formdata.append("username", username);
    formdata.append("email", email);
    formdata.append("password", password);
    const xhr = new XMLHttpRequest();
    xhr.open('POST', '../../server/controllers/admin-user-detail.php', true);
    xhr.send(formdata);
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200){
            try{
                var responseData = JSON.parse(xhr.responseText);
                if (responseData.success){
                    alert(responseData.message);
                } else {
                    alert("error: " + responseData.message);
                }
            } catch (err){}
        }  else if (xhr.status === 404){
            var response = JSON.parse(xhr.responseText);
            console.log(response.message);
        }
    }
    console.log("sip con");
}

function deleteUser(){
    var username = localStorage.getItem("username");
    const formdata = new FormData();
    formdata.append("signal", "userdelete");
    formdata.append("username", username);
    const xhr = new XMLHttpRequest();
    xhr.open('POST', '../../server/controllers/admin-user-detail.php', true);
    xhr.send(formdata);
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200){
            try{
                var responseData = JSON.parse(xhr.responseText);
                if (responseData.success){
                    alert(responseData.message);
                } else {
                    alert("error: " + responseData.message);
                }
            } catch (err){}
        }  else if (xhr.status === 404){
            var response = JSON.parse(xhr.responseText);
            console.log(response.message);
        }
    }
    localStorage.removeItem("username");
    console.log("sip del");
    location.href = "../pages/user-manage.php";
}