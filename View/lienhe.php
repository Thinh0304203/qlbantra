<?php
include('../Model/connect.php');
session_start();
$user_id = $_SESSION['user_id'] ;

if(!isset($user_id)) {
    header('Location: ../login.php');
}
if (isset($_POST['send'])) {

    $ten_nguoidung = mysqli_real_escape_string($conn, $_POST['txtten']);
    $email_nguoidung = mysqli_real_escape_string($conn, $_POST['txtemail']);
    $sodienthoai = $_POST['txtdt'];
    $chude_tinnhan = mysqli_real_escape_string($conn, $_POST['txtcd']);
    $noidung_tinnhan = mysqli_real_escape_string($conn, $_POST['txtnd']);
    $select_message = mysqli_query($conn, "SELECT * FROM `tinnhan` WHERE ten_nguoidung = '$ten_nguoidung' AND email_nguoidung = '$email_nguoidung' AND sodienthoai = '$sodienthoai' AND chude_tinnhan = '$chude_tinnhan' AND noidung_tinnhan = '$noidung_tinnhan'") or die('query failed');

    if (mysqli_num_rows($select_message) > 0) {
        $message[] = 'Tin nhắn đã sẵn sàng';
    } else {
        mysqli_query($conn, "INSERT INTO `tinnhan`(id_nguoidung, ten_nguoidung, email_nguoidung, sodienthoai, chude_tinnhan,noidung_tinnhan) VALUES('$user_id', '$ten_nguoidung', '$email_nguoidung', '$sodienthoai', '$chude_tinnhan', '$noidung_tinnhan')") or die('query failed');
        echo '<script type="text/javascript"> alert("Đăng nhập thành công! Bạn sẽ được chuyển hướng đến trang chủ."); window.location.href = "home.php"; </script>';
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Document</title>
</head>

<body>
    <?php include 'header.php'; ?>
    <div class="main">
        <div class="banner">
            <h1>Liên Hệ </h1>
        </div>
        <div class="title2">
            <a href="home.php">Trang Chủ <Span> Liên Hệ </Span></a>
        </div>
        <!-- -------------------- Section ------------------>
        <section class="services">
            <div class="box-container">
                <div class="box">
                    <img src="../image/icon2.png">
                    <div class="detail">
                        <h3>Tiết Kiệm được khoản tiền lớn </h3>
                        <p>tiết kiệm khoản tiền lớn cho mỗi đơn hàng</p>
                    </div>
                </div>
                <div class="box">
                    <img src="../image/icon1.png">
                    <div class="detail">
                        <h3>24*7 support</h3>
                        <p>Hỗ trợ khách hàng </p>
                    </div>
                </div>
                <div class="box">
                    <img src="../image/icon0.png">
                    <div class="detail">
                        <h3>Phiếu Giảm Giá </h3>
                        <p>Phiếu Giảm Giá cho mọi ngày Sale ,Lễ lớn </p>
                    </div>
                </div>
                <div class="box">
                    <img src="../image/icon.png">
                    <div class="detail">
                        <h3>Tiết Kiệm được khoản tiền lớn </h3>
                        <p>tiết kiệm khoản tiền lớn cho mỗi đơn hàng</p>
                    </div>
                </div>
            </div>
        </section>
        <div class="form-container">
            <form method="post">
                <div class="title">
                    <img src="../image/download.png" class="logo">
                    <h1>Để lại tin nhắn </h1>
                </div>
                <div class="input-field">
                    <p>Tên của bạn <sup>*</sup></p>
                    <input type="text" name="txtten">
                </div>
                <div class="input-field">
                    <p>Email <sup>*</sup></p>
                    <input type="text" name="txtemail">
                </div>
                <div class="input-field">
                    <p>Số Điện Thoại <sup>*</sup></p>
                    <input type="text" name="txtdt">
                </div>
                <div class="input-field">
                    <p>Chủ đề Tin Nhắn<sup>*</sup></p>
                    <input type="text" name="txtcd">
                </div>
                <div class="input-field">
                    <p> Nội Dung Tin Nhắn <sup>*</sup></p>
                    <textarea name="txtnd"></textarea>
                </div>
                <button type="submit" name="submit-btn" class="btn">Gửi Tin Nhắn</button>
            </form>
            <div class="diachi">
                <div class="title">
                    <img src="../image/download.png " class="logo">
                    <h1>Chi Tiết Liên Hệ </h1>
                </div>
                <div class="box-container">
                    <div class="box">
                        <i class="bx bxs-map-pin"></i>
                        <div>
                            <h4>Địa Chỉ</h4>
                            <p>107 Vĩnh Hưng , Hoàng Mai , Hà Nội</p>
                        </div>
                    </div>
                    <div class="box">
                        <i class="bx bxs-phone-call"></i>
                        <div>
                            <h4>Số Điện Thoại</h4>
                            <p>0987654323</p>
                        </div>
                    </div>
                    <div class="box">
                        <i class="bx bxs-map-pin"></i>
                        <div>
                            <h4>Email</h4>
                            <p>green@Gmail.com</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        </form>
    </div>
    <?php include 'footer.php'; ?>

</body>

</html>