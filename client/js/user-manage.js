
function sendItem(username){
    localStorage.setItem("username", username);
    location.href =  "#";
}

function usertable(){
    var tablecontainer = document.getElementById("table-container");
    const formdata = new FormData();
    formdata.append("signal", "sending");
    
    const xhr = new XMLHttpRequest();
    xhr.open('GET', '../../server/controllers/user-manage.php', true);
    //sending
    xhr.send(formdata);
    //get response from server
    xhr.onreadystatechange = function(){
        if (xhr.readyState === 4 && xhr.status === 200){
            try{
                var responseData = JSON.parse(xhr.responseText);
                if (responseData.success){
                    var itemList = "";
                    itemList = responseData.data;
                    tablecontainer.innerHTML = `
                        <tr class="table-header">
                            <th class="colUser"><i class="fa-solid fa-user"></i> Username <i class="fa-solid fa-caret-down"></i></th>
                            <th class="colEmail"><i class="fa-solid fa-envelope"></i> Email <i class="fa-solid fa-caret-down"></i></th>
                            <th class="colPass"><i class="fa-solid fa-lock"></i> Password <i class="fa-solid fa-caret-down"></i></th>
                        </tr>`;
                    for (var i = 0; i < itemList.length; i++){
                        tablecontainer.innerHTML += `
                        <tr class="contenttable" href="#" onclick="sendItem('${itemList[i][1]}')">
                            <td>${itemList[i][1]}</td>
                            <td>${itemList[i][0]}</td>
                            <td>${itemList[i][2]}</td>
                        </tr>`;
                    }
                } else {    
                    alert("error: " + responseData.message);
                }
            } catch (err){}
        } else if (xhr.status === 404){
            var response = JSON.parse(xhr.responseText);
            console.log(response.message);
        }
    }
}