<?php
session_start();
include('../Model/connect.php');

// Kiểm tra người dùng đã đăng nhập chưa
$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;

// Nếu người dùng đã đăng nhập, lấy số lượng sản phẩm trong giỏ hàng
$cart_items_count = 0;
if ($user_id) {
    $select_cart = mysqli_query($conn, "SELECT * FROM giohang WHERE id_nguoidung = '$user_id'") or die('query failed');
    $cart_items_count = mysqli_num_rows($select_cart); // Số lượng sản phẩm trong giỏ hàng
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <link href="/website/css/uicons-solid-rounded.css">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <title>Green Tea - trang Giới Thiệu </title>
</head>

<body>
    <?php include 'header.php'; ?>
    <div class="main">
        <div class="banner">
            <h1>Giới Thiệu </h1>
        </div>
        <div class="title2">
            <a href="home.php">Trang Chủ </a> <span>Giới Thiệu</span>
        </div>
        
        <!-- Hiển thị số lượng giỏ hàng -->
        <?php if ($user_id): ?>
            <div class="giohang-info">
                <!-- <p>Số lượng sản phẩm trong giỏ hàng: <?php echo $cart_items_count; ?> sản phẩm</p> -->
            </div>
        <?php else: ?>
            <div class="giohang-info">
                <p>Vui lòng <a href="login.php">đăng nhập</a> để xem giỏ hàng.</p>
            </div>
        <?php endif; ?>
        
        <div class="gioithieu-loai">
            <div class="box">
                <img src="../image/3.webp">
                <div class="detail">
                    <span>Trà</span>
                    <h1>Trà Xanh </h1>
                    <a href="../View/sanpham.php" class="btn">Shop now</a>
                </div>
            </div>
            <div class="box">
                <img src="../image/about.png">
                <div class="detail">
                    <span>Trà</span>
                    <h1>Trà Tranh </h1>
                    <a href="../View/sanpham.php" class="btn">Shop now</a>
                </div>
            </div>
            <div class="box">
                <img src="../image/2.webp">
                <div class="detail">
                    <span>Trà</span>
                    <h1>Trà Đen </h1>
                    <a href="../View/sanpham.php" class="btn">Shop now</a>
                </div>
            </div>
            <div class="box">
                <img src="../image/1.webp">
                <div class="detail">
                    <span>Trà</span>
                    <h1>Trà Túi Lọc </h1>
                    <a href="../View/sanpham.php" class="btn">Shop now</a>
                </div>
            </div>
        </div>

        <section class="services">
            <div class="title">
                <img src="../image/download.png" class="logo">
                <h1>Tại sao bạn nên chọn chúng tôi</h1>
                <p>Bạn nên chọn chúng tôi vì cam kết chất lượng hàng đầu, đa dạng sản phẩm từ trà truyền thống đến trà thảo mộc, trà hoa, cùng trải nghiệm thưởng trà tuyệt vời ngay tại gian hàng.</p>
            </div>
            <div class="box-container">
                <div class="box">
                    <img src="../image/icon2.png">
                    <div class="detail">
                        <h3>Tiết Kiệm được khoản tiền lớn </h3>
                        <p>Tiết kiệm khoản tiền lớn cho mỗi đơn hàng</p>
                    </div>
                </div>
                <div class="box">
                    <img src="../image/icon1.png">
                    <div class="detail">
                        <h3>24*7 support</h3>
                        <p>Hỗ trợ khách hàng</p>
                    </div>
                </div>
                <div class="box">
                    <img src="../image/icon0.png">
                    <div class="detail">
                        <h3>Phiếu Giảm Giá </h3>
                        <p>Phiếu Giảm Giá cho mọi ngày Sale, Lễ lớn</p>
                    </div>
                </div>
                <div class="box">
                    <img src="../image/icon.png">
                    <div class="detail">
                        <h3>Tiết Kiệm được khoản tiền lớn </h3>
                        <p>Tiết kiệm khoản tiền lớn cho mỗi đơn hàng</p>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <?php include 'footer.php'; ?>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="script.js"></script>
    <?php include 'alert.php'; ?>
</body>

</html>
