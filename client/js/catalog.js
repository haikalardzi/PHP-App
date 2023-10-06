var recordsPerPage = 10;
var activePage;

function numPages(){
    return Math.ceil(1000/10)-1;
}

function prevPage() {
    activePage = document.getElementsByClassName("active").item(0).innerHTML;
    if (activePage > 1){
        activePage--;
        changePage(activePage);
    }
}

function nextPage(){
    activePage = document.getElementsByClassName("active").item(0).innerHTML;
    if (activePage < numPages()){
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

    var row = (page)*10; 
    formdata.append('rows', row);
    const xhr = new XMLHttpRequest();
    xhr.open('POST', '../../server/controllers/catalog.php', true);
    //sending
    xhr.send(formdata);
    //get response from server
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200){
            var responseData = JSON.parse(xhr.responseText);
            if (responseData.success){

                var itemList = responseData.data;
                if (page < 1){
                    page = 1;
                }
                if (page > numPages()){
                    page = numPages();
                }
                listingTable.innerHTML ="";
            
                for (var i = 0; i < 10 && itemList.length ; i++){
                    listingTable.innerHTML += `<button class="showItem">
                        <img id="${itemList[i][0]}" src="../image/${itemList[i][2]}" alt="${itemList[i][1]}">
                        <p>${itemList[i][1]}</p>
                        <p>Rp${itemList[i][4]}</p>
                        <p>Quantity:${itemList[i][5]}</p>
                        <p>${itemList[i][6]}</p>
                    </button>`
                }
            
                var endpage = numPages()-4;
                
                for (var i = 0; i < pages.length; i++){
                    
                    pages[i].classList.remove("active");
                    
                    if (page-1 < 2){
                        pages[i].innerHTML = i+1;
                        pages[i].setAttribute("href", `javascript:changePage(${i})`);
                    } else if (page > numPages()-2){
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
                } else if (page == numPages()-1){
                    pages[3].classList.add("active");
                } else if (page == numPages()){
                    pages[4].classList.add("active");
                } else {
                    pages[2].classList.add("active");
                }
                if (page == 1){
                    btnPrev.style.visibility = "hidden";
                } else {
                    btnPrev.style.visibility = "visible";
                }
            
                if (page == numPages()){
                    btnNext.style.visibility = "hidden";
                } else {
                    btnNext.style.visibility = "visible";
                }

            } else {
                alert("error: " + responseData.message);
            }
        } else if (xhr.status === 404){
            var response = JSON.parse(xhr.responseText);
            console.log(response.message);
        }
    }



}