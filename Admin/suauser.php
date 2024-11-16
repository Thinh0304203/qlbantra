<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="style.css">
      -->
    <link rel="stylesheet" href="../Admin/CSS/admin.css">

    <title>Document</title>
</head>

<body>
    <div class="header">
        <img src="../Image/logo.jpg" alt="Logo">
        <a href="../Views/logout.php">Đăng xuất</a>
    </div>

    <<div class="container">
        <!-- Sidebar -->
        <div class="sidebar">
            <?php include('menu.php') ?>

        </div>

        <div class="main-content">
            <div class="title">
                <?php
                // lay dlieu tu database
                // include('control_user.php');
                include('../../Model/control_nd.php');
                $get_data = new data_nd();
                $select_user_id = $get_data->select_user_id($_GET['up']);
                //$_GET['up'] la gia tri truyen tu trang select sang
                foreach ($select_user_id as $se_user)
                    // //duyet phan tu tra ve tu database
                    // 
                ?>
                <h2>Sửa thông tin khách hàng</h2>

                <form method="POST" action="../../Controller/action_nd.php?up=<?php echo $se_user['id_nguoidung']; ?> ">
                    <table>
                        <tr>
                            <td>Tên khách hàng</td>
                            <td><input type="text" name="txtten" value="<?php echo $se_user['tennguoidung'] ?>"></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td><input type="email" name="txtemail" value="<?php echo $se_user['email'] ?>"></td>
                        </tr>
                        <tr>
                            <td>Password</td>
                            <td><input type="password" name="txtpassword" value="<?php echo $se_user['matkhau'] ?>"></td>
                        </tr>
                        
                        <tr>
                            <td>Phân quyền</td>
                            <td>
                                <select name="txtphanquyen">
                                    <option value="Admin" <?php if ($se_user['phanquyen'] == '1') echo 'selected'; ?>>admin</option>
                                    <option value="User" <?php if ($se_user['phanquyen'] == '0') echo 'selected'; ?>>user</option>
                                </select>
                            </td>
                        </tr>

                        </tr>

                        <tr>
                            <td colspan="2" style="text-align: center;">
                                <!-- <button name="txtup">Cập nhật</button> -->
                                <input type="submit" name="txtup" value="Cập nhật">
                                <input type="button" value="Quay lại" onclick="history.back()">
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
        </div>
</body>

</html>
<?php


?>