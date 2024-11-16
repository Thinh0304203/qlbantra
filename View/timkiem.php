<?php
include('../Model/connect.php');
session_start();

// Kiểm tra nếu người dùng đã đăng nhập
if (!isset($_SESSION['user_id'])) {
    header('location:login.php');
    exit();
}
$user_id = $_SESSION['user_id'];  // Lấy user_id từ session

// Kết nối với lớp xử lý sản phẩm
include('../Model/control_sp.php');
$get_data = new data_sp();

// Lấy từ khóa tìm kiếm từ URL (nếu có)
$product_name = $_SESSION['timkiem'];

// Truy vấn sản phẩm theo tên nếu có
if ($product_name != '') {
    // Tìm kiếm sản phẩm theo tên
    $select = $get_data->select_product_by_name($product_name);
} else {
    // Nếu không có tìm kiếm, lấy tất cả sản phẩm
    $select = $get_data->select_product();
}

// Xử lý thêm sản phẩm vào giỏ hàng
if (isset($_POST['add_to_cart'])) {
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_image = $_POST['product_image'];
    $product_quantity = intval($_POST['product_quantity']);  // Chuyển số lượng thành số nguyên

    // Kiểm tra số lượng hợp lệ
    if ($product_quantity < 1) {
        $product_quantity = 1;  // Nếu số lượng < 1, gán thành 1
    }

    // Kiểm tra xem sản phẩm đã có trong giỏ hàng chưa
    $check_product = mysqli_query($conn, "SELECT * FROM `giohang` WHERE id_nguoidung = '$user_id' AND ten_sanpham = '$product_name'") or die('Query failed');
    
    if (mysqli_num_rows($check_product) > 0) {
        // Nếu sản phẩm đã có, cập nhật số lượng
        $product_data = mysqli_fetch_assoc($check_product);
        $new_quantity = $product_data['soluong'] + $product_quantity;
        mysqli_query($conn, "UPDATE `giohang` SET soluong = '$new_quantity' WHERE id_giohang = '{$product_data['id_giohang']}'") or die('Query failed');
    } else {
        // Nếu chưa có trong giỏ hàng, thêm mới
        mysqli_query($conn, "INSERT INTO `giohang`(id_nguoidung, ten_sanpham, gia, soluong, image) VALUES('$user_id', '$product_name', '$product_price', '$product_quantity', '$product_image')") or die('Query failed');
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tìm kiếm sản phẩm</title>
    <link rel="stylesheet" href="../style.css">
    <style>
        /* Các style cho trang tìm kiếm */
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

        .search-form {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }

        .search-form input {
            padding: 10px;
            font-size: 16px;
            width: 300px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        .search-form button {
            padding: 10px 20px;
            background-color: #388e3c;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-left: 10px;
        }

        .search-form button:hover {
            background-color: #2c6e2c;
        }
    </style>
</head>

<body>
    <?php include 'header.php'; ?>

    <!-- Form Tìm Kiếm -->
    <!-- <form action="search.php" method="get" class="search-form">
        <input type="text" name="product_name" placeholder="Tìm kiếm sản phẩm..." value="<?php echo htmlspecialchars($product_name); ?>" required>
        <button type="submit">Tìm kiếm</button>
    </form> -->

    <div class="main">
        <div class="box-container">
            <?php
            // Kiểm tra và hiển thị sản phẩm
            if (is_array($select) && count($select) > 0) {
                // Nếu có sản phẩm, hiển thị chúng
                foreach ($select as $fetch_products) {
            ?>
                    <form action="" method="post" class="box">
                        <img class="image" src="../image/image_sp/<?php echo $fetch_products['image']; ?>" alt="" width="200px" height="200px">
                        <div class="name"><?php echo $fetch_products['ten_sanpham']; ?></div>
                        <div class="price"><?php echo number_format($fetch_products['gia'], 0, ',', '.'); ?> VND</div>
                        <input type="number" min="1" name="product_quantity" value="1" class="qty">
                        <input type="hidden" name="product_name" value="<?php echo $fetch_products['ten_sanpham']; ?>">
                        <input type="hidden" name="product_price" value="<?php echo $fetch_products['gia']; ?>">
                        <input type="hidden" name="product_image" value="<?php echo $fetch_products['image']; ?>">
            
                        <div class="btn-group">
                            <button type="submit" name="add_to_cart" class="btn"><i class="fas fa-shopping-cart"></i></button>
                            <button type="button" class="btn"><i class="fas fa-heart"></i></button>
                            <a href="chitietsp.php?id=<?php echo $fetch_products['id_sanpham']; ?>" class="btn"><i class="fas fa-eye"></i></a>
                        </div>
                    </form>
            <?php
                }
            } else {
                echo '<p class="empty">Không có sản phẩm nào tìm thấy</p>';
            }
            ?>
        </div>
    </div>

    <?php include 'footer.php'; ?>

    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</body>
</html>
