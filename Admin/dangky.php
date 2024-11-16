<?php
include('../Model/connect.php');

if(isset($_POST['register'])) { 
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
    $cpass = mysqli_real_escape_string($conn, md5($_POST['cpassword']));

    // Chỉ kiểm tra email
    $select_email = mysqli_query($conn, "SELECT * FROM `admin` WHERE email = '$email'") or die('query failed');

    if(mysqli_num_rows($select_email) > 0) {
        echo "<script>alert('Tài khoản đã tồn tại')</script>";
        ;
    } else {
        if($pass != $cpass) {
            echo "<script>alert('Mật khẩu nhập lại sai')</script>";
        } else {
            mysqli_query($conn, "INSERT INTO `admin`(ten, email, matkhau) VALUES('$name', '$email', '$pass')") or die('query failed');
            header('Location: ../Admin/login_admin.php');
            exit();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style2.css">
    <title>Cửa hàng cà phê - Đăng ký</title>
</head>
<body>
    <div class="main-container">
        <section>
            <div class="form-container" id="admin-login">
                <form action="" method="post" enctype="multipart/form-data">
                    <h3>Tạo tài khoản mới</h3>
                    <div class="input-filed">
                        <label for="">Tài khoản <sup>*</sup></label>
                        <input type="text" name="name" maxlength="20" required placeholder="Tên tài khoản">
                    </div>

                    <div class="input-filed">
                        <label for="">Email <sup>*</sup></label>
                        <input type="email" name="email" maxlength="20" required placeholder="Email">
                    </div>

                    <div class="input-filed">
                        <label for="">Mật khẩu<sup>*</sup></label>
                        <input type="password" name="password" maxlength="20" required placeholder="Mật khẩu">
                    </div>

                    <div class="input-filed">
                        <label for="">Nhập lại mật khẩu<sup>*</sup></label>
                        <input type="password" name="cpassword" maxlength="20" required placeholder="Nhập lại mật khẩu">
                    </div>
                    <button type="submit" name="register" class="btn">Đăng ký</button> 
                    <p>Bạn đã có tài khoản? <a href="../View/login.php">Đăng nhập</a></p>
                </form>
            </div>
        </section>
    </div>
    
</body>
</html>
<!-- ===============================================================================================  -->
 <!-- 