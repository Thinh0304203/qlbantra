<?php
$severname = "localhost";
$username = "root";
$password = "";
$dbname = "qlbantra";
$conn = new mysqli($severname, $username, $password, $dbname);
?>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Admin Dashboard</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&amp;display=swap" rel="stylesheet" />
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            background: url('../image/body-bg.jpg') no-repeat center center fixed;
            background-size: cover;
        }

        .sidebar {
            width: 250px;
            height: 100vh;
            color: #1b5e20;
            position: fixed;
            top: 0;
            left: 0;
            display: flex;
            flex-direction: column;
            padding-top: 20px;
            background: rgba(255, 255, 255, 0.5);
            backdrop-filter: blur(10px);
        }

        .sidebar .logo {
            font-size: 24px;
            font-weight: 700;
            text-align: center;
            margin-bottom: 30px;
        }

        .sidebar .sidebar-item {
            padding: 0 20px;
        }

        .sidebar .menu-title {
            cursor: pointer;
            padding: 10px 0;
            font-size: 18px;
            font-weight: 500;
            border: 2px solid #1b5e20;
            border-radius: 8px;
            margin-bottom: 10px;
            text-align: center;
            transition: background-color 0.3s, color 0.3s;
        }

        .sidebar .menu-title:hover {
            background-color: #1b5e20;
            color: #ffffff;
        }

        .sidebar .submenu {
            display: none;
            padding-left: 20px;
        }

        .sidebar .submenu a {
            color: #1b5e20;
            text-decoration: none;
            padding: 5px 0;
            display: block;
            border: 2px solid #1b5e20;
            border-radius: 8px;
            margin-bottom: 5px;
            text-align: center;
            transition: background-color 0.3s, color 0.3s;
        }

        .sidebar .submenu a:hover {
            background-color: #1b5e20;
            color: #ffffff;
        }

        .sidebar .submenu.active {
            display: block;
        }

        .main-content {
            margin-left: 250px;
            padding: 20px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: rgba(255, 255, 255, 0.9);
            padding: 10px 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .header .title {
            font-size: 24px;
            font-weight: 700;
        }

        .header .header-right {
            display: flex;
            align-items: center;
        }

        .header .search-bar {
            padding: 8px;
            border: 1px solid #c8e6c9;
            border-radius: 4px;
            margin-right: 20px;
        }

        .header .profile {
            display: flex;
            align-items: center;
        }

        .header .profile img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 10px;
        }

        .marquee {
            margin: 20px 0;
            background-color: rgba(255, 255, 255, 0.9);
            padding: 10px;
            border-radius: 4px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .dashboard-grid {
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
        }

        .dashboard-item {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            flex: 1;
            min-width: 200px;
            display: flex;
            align-items: center;
        }

        .dashboard-item i {
            font-size: 24px;
            margin-right: 20px;
        }

        .dashboard-item .count {
            font-size: 24px;
            font-weight: 700;
        }

        .dashboard-item .label {
            font-size: 14px;
            color: #1b5e20;
        }

        .dashboard-item.green {
            border-left: 5px solid #4caf50;
        }

        .dashboard-item.purple {
            border-left: 5px solid #9c27b0;
        }

        .dashboard-item.blue {
            border-left: 5px solid #2196f3;
        }

        .dashboard-item.red {
            border-left: 5px solid #f44336;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <div class="logo">
            Admin
        </div>
        <div class="sidebar-item">
            <h3 class="menu-title" onmouseover="toggleSubmenu('submenu1')" onmouseout="toggleSubmenu('submenu1')">
                Quản lý thành viên
            </h3>
            <div class="submenu" id="submenu1">
                <a href="../Admin/list_user.php">
                    Danh sách thành viên
                </a>
            </div>
            <h3 class="menu-title" onmouseover="toggleSubmenu('submenu2')" onmouseout="toggleSubmenu('submenu2')">
                Quản lý sản phẩm
            </h3>
            <div class="submenu" id="submenu2">
                <a href="../Admin/list_sp.php">
                    Danh sách sản phẩm
                </a>
            </div>
            <h3 class="menu-title" onmouseover="toggleSubmenu('submenu3')" onmouseout="toggleSubmenu('submenu3')">
                Quản lý danh mục
            </h3>
            <div class="submenu" id="submenu3">
                <a href="../Admin/list_dm.php">
                    Danh sách danh mục
                </a>
            </div>
            <h3 class="menu-title" onmouseover="toggleSubmenu('submenu4')" onmouseout="toggleSubmenu('submenu4')">
                Quản lý bình luận
            </h3>
            <div class="submenu" id="submenu4">
                <a href="#">
                    Danh sách bình luận
                </a>
            </div>
        </div>
    </div>
    <div class="main-content">
        <div class="header">
            <div class="title">
                TRANG QUẢN TRỊ
            </div>
            <div class="header-right">
                <input class="search-bar" placeholder="Search..." type="text" />
                <div class="profile">
                    <img alt="User Profile Picture of Steave" height="40" src="https://storage.googleapis.com/a1aa/image/UcWFwSabnKZtExQQyflv1Ptws6teAcr17YwCSCJGU9XcxdxTA.jpg" width="40" />
                    <span>
                        Steave
                    </span>
                </div>
            </div>
        </div>
        <div class="marquee">
            <marquee>
                Welcome to the Dashboard! Stay updated with the latest information.
            </marquee>
        </div>
        <div class="dashboard-grid">
            <div class="dashboard-item green">
                <i class="fas fa-shopping-cart"></i>
                <div>
                    <div class="count">
                        1200
                    </div>
                    <div class="label">
                        Đơn hàng
                    </div>
                </div>
            </div>
            <div class="dashboard-item purple">
                <i class="fas fa-comments"></i>
                <div>
                    <div class="count">
                        52
                    </div>
                    <div class="label">
                        Bình luận
                    </div>
                </div>
            </div>
            <div class="dashboard-item blue">
                <i class="fas fa-users"></i>
                <div>
                    <div class="count">
                        2400
                    </div>
                    <div class="label">
                        Thành viên
                    </div>
                </div>
            </div>
            <div class="dashboard-item red">
                <i class="fas fa-eye"></i>
                <div>
                    <div class="count">
                        1000.2k
                    </div>
                    <div class="label">
                        Người xem
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function toggleSubmenu(id) {
            var submenu = document.getElementById(id);
            submenu.classList.toggle('active');
        }
    </script>
</body>
</html>