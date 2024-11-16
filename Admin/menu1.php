<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Admin Dashboard</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&amp;display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="styles.css" />
</head>
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Roboto', sans-serif;
        background-color: #f4f4f4;
    }

    .container {
        display: flex;
    }

    .sidebar {
        width: 250px;
        background-color: #fff;
        height: 100vh;
        box-shadow: 4px 0 6px rgba(0, 0, 0, 0.1);
        padding: 20px;
    }

    .sidebar-header {
        margin-bottom: 20px;
    }

    .sidebar-header h2 {
        font-size: 24px;
        color: #333;
    }

    .sidebar-item {
        margin-bottom: 10px;
    }

    .submenu-title {
        font-size: 18px;
        font-weight: bold;
        color: #333;
        cursor: pointer;
    }

    .submenu {
        display: none;
        margin-top: 5px;
    }

    .submenu a {
        display: block;
        color: #555;
        padding: 5px 0;
        text-decoration: none;
    }

    .submenu a:hover {
        color: #000;
    }

    .main-content {
        flex-grow: 1;
        padding: 20px;
    }

    .header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 20px;
        background-color: #fff;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
    }

    .header-left h2 {
        font-size: 24px;
        color: #333;
    }

    .header-right {
        display: flex;
        align-items: center;
    }

    .search-input {
        padding: 8px 12px;
        margin-right: 20px;
        border-radius: 4px;
        border: 1px solid #ccc;
    }

    .user-profile {
        display: flex;
        align-items: center;
    }

    .user-profile img {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        margin-right: 10px;
    }

    .user-profile span {
        font-size: 16px;
        color: #333;
    }

    .marquee {
        background-color: #e0e0e0;
        padding: 10px;
    }

    .marquee-text {
        font-size: 16px;
        color: #333;
    }

    .content-area {
        margin-top: 20px;
    }
</style>
<body>
    <div class="container">
        <!-- Sidebar -->
        <div class="sidebar">
            <div class="sidebar-header">
                <h2>Admin</h2>
            </div>
            <div class="sidebar-item">
                <h3 class="submenu-title" onclick="toggleSubmenu('submenu1')">Quản lý thành viên</h3>
                <div class="submenu" id="submenu1">
                    <a href="../Admin/list_user.php">Danh sách thành viên</a>
                </div>
            </div>
            <div class="sidebar-item">
                <h3 class="submenu-title" onclick="toggleSubmenu('submenu2')">Quản lý sản phẩm</h3>
                <div class="submenu" id="submenu2">
                    <a href="../Admin/list_sp.php">Danh sách sản phẩm</a>
                </div>
            </div>
            <div class="sidebar-item">
                <h3 class="submenu-title" onclick="toggleSubmenu('submenu3')">Quản lý doanh mục</h3>
                <div class="submenu" id="submenu3">
                    <a href="../Admin/list_dm.php">Danh sách doanh mục</a>
                </div>
            </div>
            <div class="sidebar-item">
                <h3 class="submenu-title" onclick="toggleSubmenu('submenu4')">Quản lý bình luận</h3>
                <div class="submenu" id="submenu4">
                    <a href="#" onclick="showComments()">Danh sách bình luận</a>
                </div>
            </div>
            <div class="sidebar-item">
                <h3 class="submenu-title" onclick="toggleSubmenu('submenu5')">Quản lý tin nhắn</h3>
                <div class="submenu" id="submenu5">
                    <a href="#">Thông tin tin nhắn</a>
                </div>
            </div>
            <div class="sidebar-item">
                <h3 class="submenu-title" onclick="toggleSubmenu('submenu6')">Quản lý chữ</h3>
                <div class="submenu" id="submenu6">
                    <a href="#" onclick="showContent('content-marquee')">Bảng tin nhắn chạy</a>
                </div>
            </div>
            <div class="sidebar-item">
                <h3 class="submenu-title" onclick="toggleSubmenu('submenu7')">Quản lý đơn hàng</h3>
                <div class="submenu" id="submenu7">
                    <a href="#">Danh sách đơn hàng đặt</a>
                </div>
            </div>
            <div class="sidebar-item">
                <h3 class="submenu-title" onclick="toggleSubmenu('submenu8')">Quản lý quảng cáo</h3>
                <div class="submenu" id="submenu8">
                    <a href="#">Danh sách quảng cáo</a>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <!-- Header -->
            <div class="header">
                <div class="header-left">
                    <h2>TRANG QUẢN TRỊ</h2>
                </div>
                <div class="header-right">
                    <input class="search-input" placeholder="Search..." type="text" />
                    <div class="user-profile">
                        <img src="https://storage.googleapis.com/a1aa/image/E5UMPLZW5nJAA1LDMXiDnWfdXUuxC8IM4bfsaexl4EUOf1EPB.jpg" alt="User Profile" />
                        <span>Admin</span>
                    </div>
                </div>
            </div>

            <!-- Marquee -->
            <div class="marquee">
                <marquee class="marquee-text">Trang admin</marquee>
            </div>

        </div>
    </div>

    <script src="scripts.js">
    </script>
</body>

</html>
