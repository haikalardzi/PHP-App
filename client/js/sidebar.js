function openSidebar(){
    document.getElementById("sidebar").style.left = "-20%";
    document.getElementById("tabexpand").setAttribute("href","javascript:closeSidebar()");
    document.getElementById("tabexpand").setAttribute("onclick","");
}

function closeSidebar(){
    document.getElementById("sidebar").style.left = "0%";
    document.getElementById("tabexpand").setAttribute("href","javascript:openSidebar()");
    document.getElementById("tabexpand").setAttribute("onclick","");
}

addsidebar = () => {
    return document.getElementById("sidebar").innerHTML = `
    <li><a href='../pages/account-page.php' id="manageuser">
        <i class="fa-solid fa-user"></i>  Account 
    </a></li>
    <li><a href='#' id="manageuser">
        <i class="fa-solid fa-people-roof"></i> 
          Manage User 
    </a></li>
    <li><a href='#' id="manageitem"> 
        <i class="fa-solid fa-layer-group"></i>
          Manage Item 
    </a></li>
    <li><a href='#' id="adduser"> 
        <i class="fa-solid fa-user-plus"></i>
          Add User 
    </a></li>
    <li><a href='../pages/make-sale.php' id="makesale"> 
        <i class="fa-solid fa-cart-plus"></i>
          Make Sale
    </a></li>    
    <li><a href='../../server/controllers/signout.php' id="logout"> 
        <i class="fa-solid fa-right-from-bracket"></i>
          Log Out 
    </a></li>1`
}