<?php
include('../Model/connect.php');
session_start();

// Kiểm tra nếu người dùng chưa đăng nhập
if (!isset($_SESSION['user_id'])) {
    header('location:login.php');
    exit();
}

// Lấy user_id từ session
$user_id = $_SESSION['user_id'];

// Lấy category_id từ URL nếu có
$category_id = isset($_GET['category_id']) ? intval($_GET['category_id']) : 0;

// Kết nối với lớp xử lý sản phẩm
include('../Model/control_sp.php');
$get_data = new data_sp();

// Truy vấn sản phẩm theo danh mục hoặc lấy tất cả sản phẩm
if ($category_id > 0) {
    $select = $get_data->select_product_by_category($category_id);
} else {
    $select = $get_data->select_product();
}

// Xử lý thêm sản phẩm vào giỏ hàng
if (isset($_POST['add_to_cart'])) {
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_image = $_POST['product_image'];
    $product_quantity = intval($_POST['product_quantity']);

    // Kiểm tra số lượng hợp lệ
    if ($product_quantity < 1) {
        $product_quantity = 1;
    }

    // Kiểm tra xem sản phẩm đã tồn tại trong giỏ hàng chưa
    $check_product = mysqli_query($conn, "SELECT * FROM `giohang` WHERE id_nguoidung = '$user_id' AND ten_sanpham = '$product_name'") or die('Query failed');
    if (mysqli_num_rows($check_product) > 0) {
        // Cập nhật số lượng sản phẩm trong giỏ hàng
        $product_data = mysqli_fetch_assoc($check_product);
        $new_quantity = $product_data['soluong'] + $product_quantity;
        mysqli_query($conn, "UPDATE `giohang` SET soluong = '$new_quantity' WHERE id_giohang = '{$product_data['id_giohang']}'") or die('Query failed');
    } else {
        // Thêm sản phẩm mới vào giỏ hàng
        mysqli_query($conn, "INSERT INTO `giohang`(id_nguoidung, ten_sanpham, gia, soluong, image) VALUES('$user_id', '$product_name', '$product_price', '$product_quantity', '$product_image')") or die('Query failed');
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh mục sản phẩm</title>
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
    background-color: #f3f6f4;
    color: #333;
    margin: 0;
    padding: 0;
}

/* Main content styles */
.main {
    padding: 20px;
    margin-top: 100px;
}

h2 {
    font-size: 28px;
    margin-bottom: 20px;
    color: #333;
}

/* Container for product boxes */
.box-container {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    justify-content: center;
}

/* Styling for each product box */
.box {
    background-color: #fff;
    width: 250px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    padding: 20px;
    text-align: center;
    position: relative;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.box:hover {
    transform: scale(1.05);
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
}
h2{
    text-align: center;

}

.box img {
    width: 100%;
    height: 200px;
    object-fit: cover;
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

/* Button styles */
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

/* Empty message when no products are available */
.empty {
    font-size: 18px;
    color: #999;
    text-align: center;
    margin-top: 20px;
}

/* Responsive Design */
@media (max-width: 768px) {
    .box-container {
        flex-direction: column;
        align-items: center;
    }

    .box {
        width: 100%;
        max-width: 300px;
        margin-bottom: 20px;
    }
}

</style>

<body>
    <?php include 'header.php'; ?>

    <div class="main">
        <h2>Danh sách sản phẩm</h2>
        <div class="box-container">
            <?php
            if (is_array($select) && count($select) > 0) {
                foreach ($select as $fetch_products) {
            ?>
                    <form action="" method="post" class="box">
                        <img src="../image/image_sp/<?php echo $fetch_products['image']; ?>" alt="Product Image" class="image">
                        <div class="name"><?php echo $fetch_products['ten_sanpham']; ?></div>
                        <div class="price"><?php echo number_format($fetch_products['gia'], 0, ',', '.'); ?> VND</div>
                        <input type="number" min="1" name="product_quantity" value="1" class="qty">
                        <input type="hidden" name="product_name" value="<?php echo $fetch_products['ten_sanpham']; ?>">
                        <input type="hidden" name="product_price" value="<?php echo $fetch_products['gia']; ?>">
                        <input type="hidden" name="product_image" value="<?php echo $fetch_products['image']; ?>">
                        <div class="btn-group">
                            <button type="submit" name="add_to_cart" class="btn"><i class="fas fa-shopping-cart"></i></button>
                            <a href="../view/chitietsp.php?id=<?php echo $fetch_products['id_sanpham']; ?>" class="btn"><i class="fas fa-eye"></i></a>
                        </div>
                    </form>
            <?php
                }
            } else {
                echo '<p class="empty">Không có sản phẩm trong danh mục này.</p>';
            }
            ?>
        </div>
    </div>

    <?php include 'footer.php'; ?>

    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</body>

</html>