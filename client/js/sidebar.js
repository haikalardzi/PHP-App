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

// function adminPrivilege() {
//     document.getElementById("adduser").style.display = 'block';
//     document.getElementById("manageuser").style.display = 'block';
//      // else display none for each
// }

// function userPrivilege() {
//     document.getElementById("manageitem").style.display = 'block';
//     document.getElementById("makesale").style.display = 'block';
//     document.getElementById("logout").style.display = 'block';
//      // else display none for each
// }
addsidebar = () => {
    /* FIXME: How to make sidebar take session data, so it can control access for admin, user, and guests
    <script>
    var username_js = '<?php echo $_SESSION['username'];?>'
    var admin_status_js = '<?php echo $_SESSION['admin_status'];?>'
    </script> */
    return document.getElementById("sidebar").innerHTML = `

    <li><a href='../pages/account-page.php' id="manageaccount">
        <i class="fa-solid fa-user"></i>Account
    </a></li>
    <li><a href='../pages/user-manage.php' id="manageuser">
        <i class="fa-solid fa-people-roof"></i>Manage User 
    </a></li>
    <li><a href='#' id="manageitem"> 
        <i class="fa-solid fa-layer-group"></i>Manage Item 
    </a></li>
    <li><a href='#' id="adduser"> 
        <i class="fa-solid fa-user-plus"></i>Add User 
    </a></li>
    <li><a href='../pages/make-sale.php' id="makesale"> 
        <i class="fa-solid fa-cart-plus"></i>Make Sale
    </a></li>  
    <li><a href='../../server/controllers/signout.php' id="logout"> 
        <i class="fa-solid fa-right-from-bracket"></i>Log Out 
    </a></li>
    `
}