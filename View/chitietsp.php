<?php
include('../Model/connect.php');
session_start();

// Kiểm tra nếu chưa đăng nhập
if (!isset($_SESSION['user_id'])) {
    header('location:login.php');
    exit();
}

// Lấy ID sản phẩm từ URL
if (isset($_GET['id'])) {
    $product_id = $_GET['id'];

    // Lấy thông tin chi tiết sản phẩm từ cơ sở dữ liệu
    $product_query = mysqli_query($conn, "SELECT * FROM `sanpham` WHERE id_sanpham = '$product_id'") or die('query failed');
    $product = mysqli_fetch_assoc($product_query);
    
    if (!$product) {
        echo "Sản phẩm không tồn tại!";
        exit();
    }
} else {
    echo "Không có sản phẩm được chọn!";
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin sản phẩm</title>
    <link rel="stylesheet" href="../style.css">
    <style>
        /* Thêm style cho trang chi tiết sản phẩm */
        body {
            font-family: Arial, sans-serif;
            background-color: #f3f6f4;
            color: #333;
            margin: 0;
            padding: 0;
        }
        .product-details {
            width: 80%;
            margin: 50px auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            display: flex;
            gap: 40px;
        }
        .product-image {
            width: 300px;
            height: 300px;
            object-fit: cover;
            border-radius: 8px;
        }
        .product-info {
            max-width: 600px;
        }
        .product-info h2 {
            font-size: 2rem;
            margin-bottom: 20px;
        }
        .product-info .price {
            font-size: 1.5rem;
            color: #388e3c;
            margin-bottom: 20px;
        }
        .product-info .description {
            margin-bottom: 20px;
        }
        .add-to-cart-btn {
            padding: 10px 20px;
            background-color: #388e3c;
            color: white;
            font-size: 1.1rem;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .add-to-cart-btn:hover {
            background-color: #2c6f2f;
        }
    </style>
</head>
<body>
    <?php include 'header.php'; ?>

    <div class="product-details">
        <div>
            <img src="../image/image_sp/<?php echo $product['image']; ?>" alt="Product Image" class="product-image">
        </div>
        <div class="product-info">
            <h2><?php echo $product['ten_sanpham']; ?></h2>
            <div class="price"><?php echo number_format($product['gia'], 0, ',', '.'); ?> VND</div>
            <div class="description"><?php echo $product['thongtinchitiet_sanpham']; ?></div>

            <form action="" method="post">
                <input type="hidden" name="product_name" value="<?php echo $product['ten_sanpham']; ?>">
                <input type="hidden" name="product_price" value="<?php echo $product['gia']; ?>">
                <input type="hidden" name="product_image" value="<?php echo $product['image']; ?>">
                <!-- <label for="product_quantity">Số lượng:</label>
                <input type="number" min="1" name="product_quantity" value="1" class="qty"> -->
                <!-- <button type="submit" name="add_to_cart" class="btn"><i class="fas fa-shopping-cart"></i></button> -->
            </form>
        </div>
    </div>

    <?php include 'footer.php'; ?>
</body>
</html>
