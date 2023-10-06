var currentPage = 1;
var recordsPerPage = 10;


function numPages(){
    return Math.ceil(1000/10);
}

function prevPage() {
    if (currentPage > 1){
        currentPage--;
        changePage(currentPage);
    }
}

function nextPage(){
    if (currentPage < numPages()){
        currentPage++;
        changePage(currentPage);
    }
}

function changePage(page){
    var btnNext = document.getElementById("btnNext");
    var btnPrev = document.getElementById("btnPrev");
    var listingTable = document.getElementById("catalogview");
    var pageSpan = document.getElementById("page");
    //XMLHttpRequest
    const formdata = new FormData();

    var row = (page - 1)*10; 
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
                        <img id= ${itemList[i][0]} src="../image/${itemList[i][2]} " alt="${itemList[i][1]}">
                        <p> ${itemList[i][1]} </p>
                        <p>Rp ${itemList[i][4]} </p>
                        <p>Quantity: ${itemList[i][5]} </p>
                        <p> ${itemList[i][6]} </p>
                    </button>`
                }
            
                pageSpan.innerHTML = page;
            
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