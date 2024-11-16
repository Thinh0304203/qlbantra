<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                include('../../Model/control_dm.php');
                
                $get_data = new data_dm();
                $select_dm_id = $get_data->select_dm_id($_GET['them']);
                //$_GET['up'] la gia tri truyen tu trang select sang
                foreach ($select_dm_id as $se_dm)
                    // //duyet phan tu tra ve tu database
                    // 
                ?>
                <h2>Thông tin doanh mục sản phẩm</h2>
                <form method="POST" action="../../Controller/action_dm.php?them=<?php echo $se_dm['id_dm'] ?> ">
                    <table>
                        <tr>
                            <td>Tên doanh mục sản phẩm: </td>
                            <td><input type="text" name="txtten" required></td>
                        </tr>
                        
                        
                        <tr>
                            <td colspan="2" style="text-align: center;">
                                <input type="submit" name="txtthem" value="Thêm">
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