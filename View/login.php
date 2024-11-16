<?php
include('../Model/connect.php');
session_start(); // Đảm bảo khởi động session đầu tiên

if (isset($_POST['login'])) {
    $email = mysqli_real_escape_string($conn, $_POST['txtemail']);
    $pass = mysqli_real_escape_string($conn, md5($_POST['txtpassword']));
    $select_users = mysqli_query($conn, "SELECT * FROM `nguoidung` WHERE email = '$email' AND matkhau = '$pass'") or die('query failed');
    
    if (mysqli_num_rows($select_users) > 0) { // Kiểm tra số lượng hàng > 0
        $row = mysqli_fetch_assoc($select_users);
        
        if ($row) { // Kiểm tra nếu $row không rỗng
            $_SESSION['user_name'] = $row['tennguoidung'];
            $_SESSION['user_email'] = $row['email'];
            $_SESSION['user_id'] = $row['id_nguoidung'];
            header('Location: ../View/home.php');
            exit();
        }
        
    } else {
        echo "<script>alert('Đăng nhập thất bại');</script>";
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style2.css">
    <title>Document</title>
</head>
<body>
<div class="main-container">
    <section>
        <div class="form-container" id="admin-login">
            <form action="" method="post">
                <h3>Đăng nhập</h3>

                <div class="input-filed">
                    <label for="">Email người dùng <sup>*</sup></label>
                    <input type="email" name="txtemail" maxlength="20" required placeholder="Tài khoản email">
                </div>

                <div class="input-filed">
                    <label for="">Mật khẩu <sup>*</sup></label>
                    <input type="password" name="txtpassword" maxlength="20" required placeholder="Mật khẩu">
                </div>
                <button type="submit" name="login" class="btn">Đăng nhập</button>
                <p>Chưa có tài khoản?<a href="../View/dangky.php">Đăng ký</a></p>
            </form>
        </div>
    </section>
</div>

</body>
</html>
