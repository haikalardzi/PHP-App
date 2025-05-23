var activePage;

//Promise is to syncronize asyncronous process
try{
    const input = document.getElementById("Searchinput");
    var myPromises = new Promise(function(resolve, reject){
        const formdata = new FormData();
        formdata.append('search', document.getElementById("Searchinput").value);
        const xhr = new XMLHttpRequest();
        xhr.open('GET', '../../server/controllers/catalog.php', true);
        xhr.send(formdata);
        xhr.onreadystatechange = function(){
            if (xhr.readyState === 4 && xhr.status === 200){
                var responseData = JSON.parse(xhr.responseText);
                if (responseData.success){
                    //if expected process occur during promise get the expected value
                    resolve(Math.ceil(responseData.total[0]/10));
                } else {
                    alert("error: " + responseData.message);
                    //unexpected process occur during promise
                    reject("error");
                }
            } else if (xhr.status === 404){
                var response = JSON.parse(xhr.responseText);
                console.log(response.message);
                reject("error");
            }
        }
    });
} catch (error){
    
}

var numPages;
//get the value of promise
myPromises.then(
    function(value) {numPages = value;},
    function(error) {numPages = error;}
    );
    
    
prevPage = () => {
    activePage = document.getElementsByClassName("active").item(0).innerHTML;
    if (activePage > 1){
        activePage--;
        changePage(activePage);
    }
}
    
nextPage = () => {
    activePage = document.getElementsByClassName("active").item(0).innerHTML;
    if (activePage < numPages){
        activePage++;
        changePage(activePage);
    }
}

function changePage(page){
    var btnNext = document.getElementById("btnNext");
    var btnPrev = document.getElementById("btnPrev");
    var listingTable = document.getElementById("catalogview");
    var pages = [document.getElementById("secondToRight"),
    document.getElementById("firstToRight"),
    document.getElementById("middle"),
    document.getElementById("firstToLeft"),
    document.getElementById("secondToLeft")];
    
    //XMLHttpRequest
    const formdata = new FormData();
    
    var row = (page-1)*10; 
    formdata.append('rows', row);
    
    // taking search keyword from search bar
    try {
        formdata.append('search', document.getElementById("Searchinput").value);
    } catch (error) {
        
    }
    // console.log(document.getElementById("Searchinput").value);

    const xhr = new XMLHttpRequest();
    xhr.open('POST', '../../server/controllers/catalog.php', true);
    //sending
    xhr.send(formdata);
    //get response from server
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200){
            try{
                var responseData = JSON.parse(xhr.responseText);
                if (responseData.success){
                    
                    var itemList = responseData.data;
                    if (page < 1){
                        page = 1;
                    }
                    if (page > numPages){
                        page = numPages;
                    }
                    listingTable.innerHTML ="";
                    
                    for (var i = 0; i < 10 && itemList.length ; i++){
                        // listingTable.innerHTML += `<button class="showItem" onclick = "redirectToPurchase('${itemList[i][0]}')">
                        listingTable.innerHTML += `
                        <form action="../pages/make-purchase.php" method="GET" id="item_field">
                            <button class="showItem" type="submit">
                                <input type="hidden" name="id" value="${itemList[i][0]}">
                                <img id="${itemList[i][0]}" src="../image/${itemList[i][2]}" alt="${itemList[i][1]}">
                                <p>${itemList[i][1]}</p>
                                <p>Rp${itemList[i][4]}</p>
                                <p>Quantity:${itemList[i][5]}</p>
                                <p>${itemList[i][6]}</p>
                            </button>
                        </form>
                        `
                    }
                
                    var endpage = numPages-5;
                    
                    for (var i = 0; i < pages.length; i++){
                        
                        pages[i].classList.remove("active");
                        
                        if (page-1 < 2){
                            pages[i].innerHTML = i+1;
                            pages[i].setAttribute("href", `javascript:changePage(${i+1})`);
                        } else if (page > numPages-2){
                            pages[i].innerHTML = endpage + i;
                            pages[i].setAttribute("href", `javascript:changePage(${endpage + i})`);
                        } else {
                            pages[i].innerHTML = (page-2)+i;
                            pages[i].setAttribute("href", `javascript:changePage(${(page-2)+i})`);
                        }
                    }
                    
                    if (page == 1){
                        pages[0].classList.add("active");
                    } else if (page == 2){
                        pages[1].classList.add("active");
                    } else if (page == numPages-1){
                        pages[3].classList.add("active");
                    } else if (page == numPages){
                        pages[4].classList.add("active");
                    } else {
                        pages[2].classList.add("active");
                    }
                    if (page == 1){
                        btnPrev.style.visibility = "hidden";
                    } else {
                        btnPrev.style.visibility = "visible";
                    }
                    
                    if (page == numPages){
                        btnNext.style.visibility = "hidden";
                    } else {
                        btnNext.style.visibility = "visible";
                    }
                    
                } else {
                    alert("error: " + responseData.message);
                }
            } catch (error){

            }
        } else if (xhr.status === 404){
            var response = JSON.parse(xhr.responseText);
            console.log(response.message);
        }
    }
    
    
    
}