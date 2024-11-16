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
            <?php include('menu.php')?>
            
        </div>

        <div class="main-content">
            <div class="title">
                <?php
                // lay dlieu tu database
                // include('control_dm.php');
                include('../../Model/control_dm.php');
                $get_data = new data_dm();
                $select_dm_id = $get_data->select_dm_id($_GET['up']);
                //$_GET['up'] la gia tri truyen tu trang select sang
                foreach ($select_dm_id as $se_dm)
                    // //duyet phan tu tra ve tu database
                    // 
                ?>
                <h2>Sửa thông tin khách hàng</h2>
                
                <form method="POST" action="../../Controller/action_dm.php?up=<?php echo $se_dm['id_dm']; ?> ">
                    <table>
                        <tr>
                            <td>Tên doanh mục</td>
                            <td><input type="text" name="txtten" value="<?php echo $se_dm['ten_dm'] ?>"></td>
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