
addnavbar = () => {
    return document.getElementById("tabgroup").innerHTML =`
        <a id="tabexpand" class="tabexpand" href="javascript:openSidebar()" onclick="openSidebar()">
            <i class="fa-solid fa-bars"></i>
        </a>
        <img src="../image/logoregis.svg" alt="icon" width="10%" height="5%">
        <div class="searchbar">
            <input id="Searchinput" type="text" placeholder="Search..." value="" onkeypress="">
            <button class="search" onclick="">
                <i class="fa-solid fa-magnifying-glass"></i>
            </button>
        </div>
        <a class="tabright" href="../pages/cart.php">
            <i class="fa-solid fa-cart-shopping"></i>
            Cart
        </a>
        <a class="tabright" href="../pages/catalog.php">
            <i class="fa-solid fa-clipboard-list"></i>
            Catalog
        </a>
    `
}