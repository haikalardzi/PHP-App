<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial scale=1.0">
    <title>Admin: User Detail</title>
    <link rel="stylesheet" href="../css/admin-user-detail.css">
    <link rel="stylesheet" href="../css/navbar.css">
    <link rel="stylesheet" href="../css/sidebar.css">
    <script src="../js/navbar.js"></script>
    <script src="../js/sidebar.js"></script>
    <script src="../js/admin-user-detail.js"></script>
    <script src="https://kit.fontawesome.com/8505941c5b.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <div class="tabgroup" id="tabgroup">
            <script>
                addnavbar();
            </script>
        </div>
        <div class="layer">
            <h1>Edit User</h1>
        </div>
        <div class="user-stat-container">
            <div class="stat-box">
                statistik pembelian
            </div>
            <div class="stat-box">
                statistik penjualan
            </div>
            <div class="stat-box">
                statistik pengeluaran
            </div>
            <div class="stat-box">
                statistik pemasukan
            </div>
        </div>
        <div class="detail-container" id="detail-container">
            <script>
                userDetail();
            </script>
        </div>
        <div class="sidebar" id="sidebar">
            <script>
                addsidebar();
            </script>
        </div>
    </div>
</body>
</html>