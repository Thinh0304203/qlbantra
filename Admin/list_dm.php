<?php

// Thiết lập số lượng bản ghi trên mỗi trang
$items_per_page = 5;

// Xác định trang hiện tại
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $items_per_page;

// Lấy tổng số danh mục
$total_items = count($select);
$total_pages = ceil($total_items / $items_per_page);

// Lấy dữ liệu cho trang hiện tại
$select1 = $get_data->select_dm_pagination($start, $items_per_page);
?>

                

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang quản lý doanh mục</title>
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
            <?php include('menu.php') ?>

        </div>

        <div class="main-content">
            <div class="title">

            <?php
                include('../../Model/control_dm.php');
                $get_data = new data_dm();
                $select = $get_data->select_dm();
                ?>
                <h2>Danh sách thông tin doanh muc</h2>
                <table border="1">
                    <tr>
                        <th>ID</th>
                        <th>Tên doanh mục</th>


                        <th colspan="3">tùy chọn</th>
                    </tr>
                    <?php
                    foreach ($select as $se_dm) {
                    ?>
                        <tr>
                            <td><?php echo $se_dm['id_dm'] ?></td>
                            <td><?php echo $se_dm['ten_dm'] ?></td>

                            <td><a href="suadm.php?up=<?php echo $se_dm['id_dm'] ?>">Sửa</a></td>

                            <td><a href="xoadm.php?del=<?php echo $se_dm['id_dm'] ?>" onclick="return(confirm('ban co muon xoa'))">Xóa</a></td>
                            <td>
                                <a href="themdm.php?them=<?php echo $se_dm['id_dm'] ?>">Thêm</a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </table>


            </div>
        </div>
    </div>
    <div class="pagination">
        <?php if ($page > 1): ?>
            <a href="?page=<?php echo $page - 1; ?>">Trang Trước</a>
        <?php endif; ?>

        <?php for ($i = 1; $i <= $total_pages; $i++): ?>
            <a href="?page=<?php echo $i; ?>" <?php if ($i == $page) echo 'class="active"'; ?>><?php echo $i; ?></a>
        <?php endfor; ?>

        <?php if ($page < $total_pages): ?>
            <a href="?page=<?php echo $page + 1; ?>">Trang Sau</a>
        <?php endif; ?>
    </div>




</body>

</html>