<?php
include('../../Model/connect.php');
$sql = "SELECT * FROM doanhmuc";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm sản phẩm mới</title>
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
</head>

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
                

            </div>
            <h1>Thêm sản phẩm mới</h1>
            <form action="../../Controller/action_sp.php" enctype="multipart/form-data" method="post">
                <div class="input-filed">
                    <label for="txtten">Tên sản phẩm</label>
                    <input type="text" name="txtten" id="txtten" maxlength="50" required placeholder="Thêm sản phẩm">
                </div>
                <div class="input-filed">
                    <label for="txtgia">Giá sản phẩm</label>
                    <input type="number" name="txtgia" id="txtgia" maxlength="50" required placeholder="Thêm sản phẩm">
                </div>
                <div class="input-filed">
                    <label for="txtchitiet">Chi tiết sản phẩm</label>
                    <textarea name="txtchitiet" id="txtchitiet" required maxlength="1000" placeholder="Nhập chi tiết sản phẩm"></textarea>
                </div>
                <!-- <div class="input-filed">
                    <label for="txtimage">Ảnh</label>
                    <input type="file" name="txtimage"  required>
                </div> -->
                <div class="input-filed">
                    <label for="txtimage">Ảnh</label>
                    <input 
                        type="file" 
                        name="txtimage" 
                        id="txtimage"
                        accept="image/jpeg,image/png,image/gif"
                        required>
                </div>
                <!-- <div class="input-filed">
                    <label for="">Tinh trang</label>
                    <select name="txttinhtrang">
                        <option value="">Còn hàng</option>
                        <option value="">Hết hàng</option>
                    </select>

                </div> -->
                <div class="input-filed">
                    <label for="txttinhtrang">Tình trạng</label>
                    <select name="txttinhtrang" id="txttinhtrang">
                        <option value="Còn hàng" <?php if (isset($status) && $status == 'con_hang') echo 'selected'; ?>>Còn hàng</option>
                        <option value="Hết hàng" <?php if (isset($status) && $status == 'het_hang') echo 'selected'; ?>>Hết hàng</option>
                    </select>
                </div>
                <div class="input-filed">
                    <label for="danh_muc">Chọn danh mục:</label>
                    <select name="txtdanh_muc" id="danh_muc">
                        <?php
                        if ($result->num_rows > 0) {
                            // Output dữ liệu của mỗi hàng
                            while ($row = $result->fetch_assoc()) {
                                echo "<option value='" . $row["id_dm"] . "'>" . $row["ten_dm"] . "</option>";
                            }
                        } else {
                            echo "<option value=''>Không có dữ liệu</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="flex-btn">
                    <button type="submit" name="txtthem" class="btn">Thêm sản phẩm</button>
                    <button type="submit" name="draff" class="btn" onclick="history.back()">Quay lại</button>
                </div>
            </form>
        </div>
    </div>
</body>