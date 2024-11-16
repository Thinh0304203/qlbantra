
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang quan lý người dùng</title>
    <link rel="stylesheet" href="../Admin/CSS/admin.css">
</head>

<body>
    <div class="header">
        <img src="../Image/logo.jpg" alt="Logo">
        <a href="../Views/logout.php">Đăng xuất</a>
    </div>

    <div class="container">
        <!-- Sidebar -->
        <div class="sidebar">
            <?php include('menu.php')?>
            
        </div>

        <div class="main-content">
            <div class="title">

                <?php
                include('../../Model/control_nd.php');
                $get_data = new data_nd();
                $select = $get_data->select_user();
                ?>
                <h2>Danh sách thông tin khách hàng</h2>
                <table border="1">
                    <tr>
                        <th>ID</th>
                        <th>Họ tên</th>
                        <th>Email</th>
                        <th>Mật khẩu</th>
                        
                        
                        <th colspan="3">tùy chọn</th>
                    </tr>
                    <?php
                    foreach($select as $se_user) {
                    ?>
                        <tr>
                            <td><?php echo $se_user['id_nguoidung'] ?></td>
                            <td><?php echo $se_user['tennguoidung'] ?></td>
                            <td><?php echo $se_user['email'] ?></td>
                            <td><?php echo $se_user['matkhau'] ?></td>
                            
                            
                            
                            <td><a href="suauser.php?up=<?php echo $se_user['id_nguoidung'] ?>">Sửa</a></td>
                            
                            <td><a href="xoauser.php?del=<?php echo $se_user['id_nguoidung'] ?>" onclick="return(confirm('Bạn có muốn xóa không??'))">Xóa</a></td>
                            <td>
                                <a href="themuser.php?them=<?php echo $se_user['id_nguoidung'] ?>">Thêm</a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </table>

            </div>
        </div>
    </div>





</body>

</html>