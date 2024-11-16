<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa sản phẩm</title>
    <link rel="stylesheet" href="../Admin/CSS/admin.css">
</head>

<style>
    
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

    .input-filed {
        margin-bottom: 15px;
    }

    .input-filed label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
    }

    .input-filed input[type="text"],
    .input-filed input[type="number"],
    .input-filed input[type="file"],
    .input-filed select,
    .input-filed textarea {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        font-size: 1em;
    }

    .input-filed textarea {
        resize: vertical;
    }

    .flex-btn {
        display: flex;
        gap: 10px;
    }

    .flex-btn .btn {
        flex: 1;
        padding: 10px;
        background-color: #81c784;
        border: none;
        border-radius: 4px;
        color: white;
        font-size: 1em;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .flex-btn .btn:hover {
        background-color: #388e3c;
    }
</style>

<body>
    <div class="header">
        <img src="../Image/logo.jpg" alt="Logo">
        <a href="../Views/logout.php">Đăng xuất</a>
    </div>

    <div class="container">
        <div class="sidebar">
            <?php include('menu.php') ?>
        </div>

        <div class="main-content">
            <div class="title">
                <?php
                include('../../Model/control_sp.php');
                $get_data = new data_sp();
                $select_product_id = $get_data->select_product_id($_GET['up']);
                foreach ($select_product_id as $se_product) {
                    // Lấy dữ liệu từ cơ sở dữ liệu
                    $name = $se_product['ten_sanpham'];
                    $price = $se_product['gia'];
                    $product_detail = $se_product['thongtinchitiet_sanpham'];
                    $status = $se_product['trangthai_sanpham'];
                    $image = $se_product['image']; // Hình ảnh hiện tại
                    $id_dm = $se_product['doanhmuc'];
                }
                ?>
            </div>

            <h1>Sửa sản phẩm</h1>
            <form action="../../Controller/action_sp.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="product_id" value="<?php echo $_GET['up']; ?>">

                <div class="input-filed">
                    <label for="name">Tên sản phẩm</label>
                    <input type="text" name="name" id="name" value="<?php echo $name;?>" required>
                </div>

                <div class="input-filed">
                    <label for="price">Giá sản phẩm</label>
                    <input type="number" name="price" id="price" value="<?php echo $price; ?>" required>
                </div>

                <div class="input-filed">
                    <label for="product_detail">Chi tiết sản phẩm</label>
                    <textarea name="product_detail" id="product_detail" required><?php echo $product_detail; ?></textarea>
                </div>

                <div class="input-filed">
                    <label for="image">Ảnh</label>
                    <input 
                        type="file" 
                        name="txtimage" 
                        id="txtimage"
                        accept="image/jpeg,image/png,image/gif">
                    <?php if ($image): ?>
                        <img src="../../image/<?php echo $image; ?>" alt="Product Image" width="100">
                    <?php endif; ?>
                </div>

                <div class="input-filed">
                    <label for="status">Tình trạng</label>
                    <select name="status" id="status">
                        <option value="Còn hàng" <?php echo ($status == 'Còn hàng') ? 'selected' : ''; ?>>Còn hàng</option>
                        <option value="Hết hàng" <?php echo ($status == 'Hết hàng') ? 'selected' : ''; ?>>Hết hàng</option>
                    </select>
                </div>
                <div class="input-filed">
                    <label for="id_dm">Danh mục sản phẩm</label>
                    <select name="id_dm" id="id_dm" required>
                        <?php
                        // Lấy danh mục sản phẩm từ bảng dmsanpham
                        $categories = $get_data->select_categories();

                        // Duyệt danh sách danh mục để tạo các lựa chọn
                        foreach ($categories as $category):
                        ?>
                            <option value="<?php echo $category['id_dm']; ?>" <?php echo ($id_dm == $category['id_dm']) ? 'selected' : ''; ?>>
                                <?php echo $category['ten_dm']; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>


                <div class="flex-btn">
                    <button type="submit" name="txtup" class="btn">Cập nhật</button>
                    <button type="button" class="btn" onclick="history.back()">Quay lại</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>