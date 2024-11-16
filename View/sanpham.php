<?php
include('../Model/connect.php');
session_start();
$user_id = $_SESSION['user_id'];

// Kiểm tra nếu chưa đăng nhập
// if (!isset($user_id)) {
//     header('location:login.php');
//     exit();
// }

// Xử lý thêm sản phẩm vào giỏ hàng
if (isset($_POST['add_to_cart'])) {
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_image = $_POST['product_image'];
    $product_quantity = intval($_POST['product_quantity']); // Chuyển số lượng thành số nguyên

    // Kiểm tra số lượng hợp lệ
    if ($product_quantity < 1) {
        $product_quantity = 1;
    }

    // Kiểm tra xem sản phẩm đã có trong giỏ hàng chưa
    $check_product = mysqli_query($conn, "SELECT * FROM `giohang` WHERE id_nguoidung = '$user_id' AND ten_sanpham = '$product_name'") or die('Query failed');
    
    if (mysqli_num_rows($check_product) > 0) {
        // Nếu sản phẩm đã có trong giỏ hàng, cập nhật số lượng
        $product_data = mysqli_fetch_assoc($check_product);
        $new_quantity = $product_data['soluong'] + $product_quantity; // Cộng thêm số lượng
        mysqli_query($conn, "UPDATE `giohang` SET soluong = '$new_quantity' WHERE id_giohang = '{$product_data['id_giohang']}'") or die('Query failed');
    } else {
        // Nếu sản phẩm chưa có trong giỏ hàng, thêm mới
        mysqli_query(
            $conn,
            "INSERT INTO `giohang`(id_nguoidung, ten_sanpham, gia, soluong, image) 
            VALUES('$user_id', '$product_name', '$product_price', '$product_quantity', '$product_image')"
        ) or die('Query failed');
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Green Tea Shop</title>
    <link rel="stylesheet" href="../style.css">
    <style>
        /* Style cho trang chính */
        body {
            font-family: Arial, sans-serif;
            background-color: #f3f6f4;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .main {
            padding: 20px;
            margin-top: 100px;
        }

        .box-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
        }

        .box {
            background-color: #fff;
            width: 250px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: center;
            position: relative;
            transition: transform 0.3s ease;
        }

        .box:hover {
            transform: scale(1.05);
        }

        .box img {
            width: 100%;
            height: auto;
            border-radius: 8px;
            margin-bottom: 10px;
        }

        .name {
            font-size: 1.1em;
            font-weight: bold;
            color: #333;
            margin-bottom: 5px;
        }

        .price {
            font-size: 1.1em;
            color: #388e3c;
            margin-bottom: 10px;
        }

        .qty {
            width: 50px;
            text-align: center;
            padding: 5px;
            margin-top: 5px;
            margin-bottom: 10px;
        }

        .btn-group {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-top: 10px;
        }

        .btn-group .btn {
            padding: 10px;
            background-color: #e3f2fd;
            border-radius: 50%;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn-group .btn:hover {
            background-color: #c8e6c9;
        }

        .btn-group i {
            font-size: 1.2em;
            color: #333;
        }
    </style>
</head>

<body>
    <?php include 'header.php'; ?>
    <div class="main">
        <div class="box-container">
            <?php
            include('../Model/control_sp.php');
            $get_data = new data_sp();
            $select = $get_data->select_product();

            if (mysqli_num_rows($select) > 0) {
                while ($fetch_products = mysqli_fetch_assoc($select)) {
            ?>
                    <form action="" method="post" class="box">
                        <img class="image" src="../image/image_sp/<?php echo $fetch_products['image']; ?>" alt="" width="200px" height="200px">
                        <div class="name"><?php echo $fetch_products['ten_sanpham']; ?></div>
                        <div class="price"><?php echo number_format($fetch_products['gia'], 0, ',', '.'); ?> VND</div>
                        <input type="number" min="1" name="product_quantity" value="1" class="qty" width="200px">
                        <input type="hidden" name="product_name" value="<?php echo $fetch_products['ten_sanpham']; ?>">
                        <input type="hidden" name="product_price" value="<?php echo $fetch_products['gia']; ?>">
                        <input type="hidden" name="product_image" value="<?php echo $fetch_products['image']; ?>">

                        <div class="btn-group">
                            <button type="submit" name="add_to_cart" class="btn"><i class="fas fa-shopping-cart"></i></button>
                            <button type="button" class="btn"><i class="fas fa-heart"></i></button>
                            <!-- Cập nhật nút "mắt" để chuyển hướng đến trang chi tiết sản phẩm -->
                            <a href="chitietsp.php?id=<?php echo $fetch_products['id_sanpham']; ?>" class="btn"><i class="fas fa-eye"></i></a>
                        </div>
                    </form>
            <?php
                }
            } else {
                echo '<p class="empty">Không có sản phẩm nào</p>';
            }
            ?>
        </div>
    </div>
    <?php include 'footer.php'; ?>

    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</body>

</html>
