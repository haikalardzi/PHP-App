<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial scale=1.0">
    <title>Admin: User Manage</title>
    <link rel="stylesheet" href="../css/user-manage.css">
    <link rel="stylesheet" href="../css/navbar.css">
    <link rel="stylesheet" href="../css/sidebar.css">
    <script src="../js/navbar.js"></script>
    <script src="../js/sidebar.js"></script>
    <script src="../js/user-manage.js"></script>
    <script src="https://kit.fontawesome.com/8505941c5b.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <div class="tabgroup" id="tabgroup">
            <script>
                addnavbar();
            </script>
        </div>
        <h1><i class="fa-solid fa-people-roof"></i> Manage User</h1>
        <div class="tablebox">
            <table id="table-container">
                <script>
                    usertable();
                </script>
            </table>
        </div>
        <div class="sidebar" id="sidebar">
            <script>
                addsidebar();
            </script>
        </div>
    </div>
</body>
</html>