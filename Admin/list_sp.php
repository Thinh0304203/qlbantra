<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách sản phẩm</title>
    <link rel="stylesheet" href="../Admin/CSS/admin.css">
    <style>
        /* General styling */
        body {
            font-family: Arial, sans-serif;
            background-color: #f3f6f4;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background-color: #388e3c;
            color: white;
            padding: 15px;
        }

        .header img {
            width: 50px;
            height: auto;
        }

        .header a {
            color: white;
            text-decoration: none;
            margin-left: auto;
            font-weight: bold;
        }

        .container {
            display: flex;
            padding: 20px;
            gap: 20px;
        }

        .main-content {
            flex-grow: 1;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        h1 {
            text-align: center;
            color: #388e3c;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        /* Styling for product images */
        .product-image img {
            width: 80px; /* Adjust width as needed */
            height: auto;
            object-fit: cover;
        }
    </style>
</head>

<body>
    <div class="header">
        <img src="image/logo.jpg" alt="Logo">
        <a href="../View/logout.php">Đăng xuất</a>
    </div>

    <div class="container">
        <!-- Sidebar -->
        <div class="sidebar">
            <?php include('menu.php') ?>
        </div>

        <div class="main-content">
            <div class="title">
                <?php
                include('../../Model/control_sp.php');
                $get_data = new data_sp();
                $select = $get_data->select_product();
                ?>
                <h2>Danh sách thông tin sản phẩm</h2>
                <table border="1">
                    <tr>
                        <th>ID</th>
                        <th>Họ tên</th>
                        <th>Giá</th>
                        <th>Hình ảnh</th>
                        <th>Chi tiết sản phẩm</th>
                        <th>Tình trạng</th>
                        <th>Doanh mục sản phẩm</th>
                        <th colspan="3">Tùy chọn</th>
                    </tr>
                    <?php
                    foreach ($select as $se_product) {
                    ?>
                        <tr>
                            <td><?php echo $se_product['id_sanpham'] ?></td>
                            <td><?php echo $se_product['ten_sanpham'] ?></td>
                            <td><?php echo $se_product['gia'] ?></td>

                            <td><img src="../../image/image_sp/<?php echo $se_product['image'] ?> "width="100px" height="100px" ></td>
                            <td><?php echo $se_product['thongtinchitiet_sanpham'] ?></td>
                            <td><?php echo $se_product['trangthai_sanpham'] ?></td>
                            <td><?php echo $se_product['doanhmuc'] ?></td>
                            <td><a href="suasp.php?up=<?php echo $se_product['id_sanpham'] ?>">Sửa</a></td>
                            <td><a href="xoasp.php?del=<?php echo $se_product['id_sanpham'] ?>" onclick="return confirm('Bạn có muốn xóa?')">Xóa</a></td>
                            <td><a href="themsp.php?them=<?php echo $se_product['id_sanpham'] ?>">Thêm</a></td>
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
