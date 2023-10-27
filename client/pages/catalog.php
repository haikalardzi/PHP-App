<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial scale=1.0">
    <title>Catalog</title>
    <link rel="stylesheet" href="../css/catalog.css">
    <link rel="stylesheet" href="../css/navbar.css">
    <link rel="stylesheet" href="../css/sidebar.css">
    <script src="../js/navbar.js"></script>
    <script src="../js/sidebar.js"></script>
    <script src="../js/catalog.js"></script>
    <script src="../js/util.js"></script>
    <script src="https://kit.fontawesome.com/8505941c5b.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <div class="tabgroup" id="tabgroup">
            <script>
                addnavbar();
                const processChange = debounce(() => changePage(1));
                document.getElementById("Searchinput").setAttribute("onkeypress", "processChange()");
            </script>
        </div>
        <div class="pageview">
            <div class="catalogview" id="catalogview">
                <script>
                    changePage(1);
                </script>
            </div>
        </div>
        <div class="center">
            <div class="pagination">
                <a href="javascript:prevPage()" id="btnPrev">Prev</a>
                <a class="active" href="javascript:changePage(1)" id="secondToRight">1</a>
                <a href="javascript:changePage(2)" id="firstToRight">2</a>
                <a href="javascript:changePage(3)" id="middle">3</a>
                <a href="javascript:changePage(4)" id="firstToLeft">4</a>
                <a href="javascript:changePage(5)" id="secondToLeft">5</a>
                <a href="javascript:nextPage()" id="btnNext">Next</a>
            </div>
        </div>
        <div class="sidebar" id="sidebar">
            <script>
                addsidebar();
            </script>
        </div>
    </div>
</body>
</html>