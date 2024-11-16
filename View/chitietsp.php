<?php
include('../Model/connect.php');
session_start();

if (!isset($_SESSION['user_id'])) {
    header('location:login.php');
    exit();
}

$user_id = $_SESSION['user_id'];

// Lấy ID sản phẩm từ URL
if (isset($_GET['id'])) {
    $product_id = intval($_GET['id']);

    // Lấy thông tin sản phẩm từ cơ sở dữ liệu
    $product_query = mysqli_query($conn, "SELECT * FROM `sanpham` WHERE id_sanpham = '$product_id'") or die('Query failed');
    $product = mysqli_fetch_assoc($product_query);

    if (!$product) {
        echo "Sản phẩm không tồn tại!";
        exit();
    }
} else {
    echo "Không có sản phẩm được chọn!";
    exit();
}

// Xử lý thêm sản phẩm vào giỏ hàng
if (isset($_POST['add_to_cart'])) {
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_image = $_POST['product_image'];
    $product_quantity = intval($_POST['product_quantity']);

    if ($product_quantity < 1) {
        $product_quantity = 1;
    }

    $check_product = mysqli_query($conn, "SELECT * FROM `giohang` WHERE id_nguoidung = '$user_id' AND ten_sanpham = '$product_name'") or die('Query failed');

    if (mysqli_num_rows($check_product) > 0) {
        $product_data = mysqli_fetch_assoc($check_product);
        $new_quantity = $product_data['soluong'] + $product_quantity;
        mysqli_query($conn, "UPDATE `giohang` SET soluong = '$new_quantity' WHERE id_giohang = '{$product_data['id_giohang']}'") or die('Query failed');
    } else {
        mysqli_query($conn, "INSERT INTO `giohang`(id_nguoidung, ten_sanpham, gia, soluong, image) VALUES('$user_id', '$product_name', '$product_price', '$product_quantity', '$product_image')") or die('Query failed');
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết sản phẩm</title>
    <link rel="stylesheet" href="../style.css">
</head>
<style>
    /* Basic reset */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    color: #333;
    line-height: 1.6;
}

a {
    text-decoration: none;
    color: inherit;
}

h2 {
    font-size: 28px;
    font-weight: bold;
    color: #333;
}

p {
    font-size: 16px;
    color: #666;
}

/* Header Styles */
header {
    background-color: #333;
    color: #fff;
    padding: 20px 0;
    text-align: center;
}

header h1 {
    font-size: 30px;
}

/* Footer Styles */
footer {
    background-color: #333;
    color: #fff;
    padding: 20px;
    text-align: center;
}

/* Product Detail Page Styles */
.product-details {
    display: flex;
    justify-content: center;
    margin-top: 20px;
    padding: 0 10px;
}

.product-image {
    width: 350px;
    height: 350px;
    object-fit: cover;
    border-radius: 8px;
    margin-right: 30px;
}

.product-info {
    max-width: 600px;
    flex: 1;
}

.product-info h2 {
    font-size: 32px;
    margin-bottom: 10px;
}

.product-info .price {
    font-size: 24px;
    font-weight: bold;
    color: #e74c3c;
    margin-bottom: 15px;
}

.product-info .description {
    font-size: 16px;
    margin-bottom: 20px;
    line-height: 1.6;
}

form {
    display: flex;
    align-items: center;
    gap: 10px;
}

form input[type="number"] {
    width: 80px;
    padding: 8px;
    font-size: 16px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

form button {
    background-color: #e74c3c;
    color: #fff;
    font-size: 18px;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

form button:hover {
    background-color: #c0392b;
}

/* Responsive Design */
@media (max-width: 768px) {
    .product-details {
        flex-direction: column;
        align-items: center;
    }

    .product-image {
        width: 100%;
        max-width: 400px;
        margin-bottom: 20px;
    }

    .product-info {
        text-align: center;
    }

    .product-info h2 {
        font-size: 26px;
    }

    .product-info .price {
        font-size: 20px;
    }
}

</style>
<body>
    <?php include 'header.php'; ?>

    <div class="product-details">
        <img src="../image/image_sp/<?php echo $product['image']; ?>" alt="Product Image" class="product-image">
        <div class="product-info">
            <h2><?php echo $product['ten_sanpham']; ?></h2>
            <p class="price"><?php echo number_format($product['gia'], 0, ',', '.'); ?> VND</p>
            <p class="description"><?php echo $product['thongtinchitiet_sanpham']; ?></p>
            <form action="" method="post">
                <input type="hidden" name="product_name" value="<?php echo $product['ten_sanpham']; ?>">
                <input type="hidden" name="product_price" value="<?php echo $product['gia']; ?>">
                <input type="hidden" name="product_image" value="<?php echo $product['image']; ?>">
                <label for="product_quantity">Số lượng:</label>
                <input type="number" name="product_quantity" min="1" value="1">
                <button type="submit" name="add_to_cart" class="add-to-cart-btn">Thêm vào giỏ hàng</button>
            </form>
        </div>
    </div>

    <?php include 'footer.php'; ?>
</body>
</html>
