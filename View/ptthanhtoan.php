<?php

include '../Model/connect.php';

session_start();

$user_id = $_SESSION['user_id'];

if (!isset($user_id)) {
   header('location:login.php');
   exit();
}

if (isset($_POST['order_btn'])) {

   // Lấy thông tin từ form gửi lên
   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $number = $_POST['number'];
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $method = mysqli_real_escape_string($conn, $_POST['method']);
   $loaidc = mysqli_real_escape_string($conn, $_POST['loaidc']);
   $address = mysqli_real_escape_string($conn, $_POST['address']);
   
   // Lấy ngày tháng năm hiện tại từ hệ thống
   $placed_on = date('Y-m-d');  // Sử dụng định dạng năm-tháng-ngày (YYYY-MM-DD)

   // Tính toán tổng giá trị đơn hàng từ giỏ hàng
   $cart_total = 0;
   $cart_products[] = '';

   // Lấy dữ liệu giỏ hàng của người dùng
   $cart_query = mysqli_query($conn, "SELECT * FROM `giohang` WHERE id_nguoidung = '$user_id'") or die('query failed');
   if (mysqli_num_rows($cart_query) > 0) {
      while ($cart_item = mysqli_fetch_assoc($cart_query)) {
         $cart_products[] = $cart_item['ten_sanpham'] . ' - ' . $cart_item['soluong'];
         $sub_total = ($cart_item['gia'] * $cart_item['soluong']);
         $cart_total += $sub_total;
      }
   }

   // Chuẩn bị dữ liệu cho đơn hàng
   $total_products = implode(', ', $cart_products);

   // Kiểm tra xem đơn hàng đã tồn tại chưa
   $order_query = mysqli_query($conn, "SELECT * FROM `donhang` WHERE 
   ten_nguoinhanhang = '$name' AND sdt_nguoinhan = '$number' 
   AND email_nguoinhan = '$email' AND phuongthucthanhtoan = '$method' 
   AND diachi_nhanhang = '$address' AND
   thanhtien = '$total_products' 
   AND diachi_loai = '$loaidc'
   AND tongsoluong = '$cart_total'") or die('query failed');

   if (mysqli_num_rows($order_query) > 0) {
      $message[] = 'Đơn hàng đã được đặt!';
   } else {
      // Thêm đơn hàng vào cơ sở dữ liệu
      mysqli_query($conn, "INSERT INTO `donhang`(`id_nguoidung`, `ten_nguoinhanhang`, `sdt_nguoinhan`, 
      `email_nguoinhan`, `diachi_nhanhang`, `diachi_loai`, `phuongthucthanhtoan`, `thanhtien`, `tongsoluong`, 
      `ngaydathang`) VALUES('$user_id', '$name', '$number', '$email', '$address','$loaidc', '$method', 
      '$total_products', '$cart_total', '$placed_on')") or die('query failed');
      
      // Thông báo đơn hàng đã được đặt thành công
      $message[] = 'Đơn hàng đã được đặt thành công!';
      
      // Xóa các sản phẩm đã đặt trong giỏ hàng
      mysqli_query($conn, "DELETE FROM `giohang` WHERE id_nguoidung = '$user_id'") or die('query failed');
   }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Thanh toán</title>

   <!-- Font Awesome CDN Link -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- Custom CSS File Link -->
   <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="../style.css">

</head>
<style>
   /* General page styling */
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
}

a {
    text-decoration: none;
    color: #333;
}

/* Header styling */
.heading {
    text-align: center;
    background-color: #333;
    color: #fff;
    padding: 20px 0;
}

.heading h3 {
    margin: 0;
    font-size: 2rem;
}

/* Display order section */
.display-order {
    background-color: #fff;
    padding: 20px;
    margin: 20px auto;
    max-width: 800px;
    border-radius: 5px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.display-order p {
    font-size: 1.1rem;
    color: #333;
    margin: 5px 0;
}

.display-order .grand-total {
    font-size: 1.5rem;
    font-weight: bold;
    text-align: right;
    color: #333;
}

/* Checkout section */
.checkout {
    background-color: #fff;
    padding: 30px;
    margin: 20px auto;
    max-width: 800px;
    border-radius: 5px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.checkout h3 {
    text-align: center;
    font-size: 1.5rem;
    color: #333;
    margin-bottom: 20px;
}

.flex {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
}

.inputBox {
    flex: 1;
    min-width: 200px;
}

.inputBox span {
    display: block;
    margin-bottom: 5px;
    font-size: 1rem;
    color: #333;
}

.inputBox input,
.inputBox select {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ddd;
    border-radius: 5px;
    font-size: 1rem;
    color: #333;
}

.inputBox input:focus,
.inputBox select:focus {
    outline: none;
    border-color: #333;
}

/* Button styling */
.btn {
    display: block;
    width: 100%;
    padding: 12px;
    background-color: #333;
    color: white;
    font-size: 1.1rem;
    text-align: center;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.btn:hover {
    background-color: #555;
}

/* Footer styling */
footer {
    text-align: center;
    background-color: #333;
    color: #fff;
    padding: 20px;
}

footer p {
    margin: 0;
    font-size: 1rem;
}

/* Responsive Design */
@media (max-width: 768px) {
    .checkout .flex {
        flex-direction: column;
    }

    .inputBox {
        width: 100%;
    }
}

</style>
<body>

   <?php include 'header.php'; ?>

   <div class="heading">
      <h3>Phương thức thanh toán</h3>
      <p> <a href="home.php">Trang chủ</a> </p>
   </div>

   <section class="display-order">

      <?php
      $grand_total = 0;
      $select_cart = mysqli_query($conn, "SELECT * FROM `giohang` WHERE id_nguoidung = '$user_id'") or die('query failed');
      if (mysqli_num_rows($select_cart) > 0) {
         while ($fetch_cart = mysqli_fetch_assoc($select_cart)) {
            $total_price = ($fetch_cart['gia'] * $fetch_cart['soluong']);
            $grand_total += $total_price;
      ?>
            <p>
               <img src="../image/image_sp/<?php echo $fetch_cart['image']; ?>" alt="<?php echo $fetch_cart['image']; ?>" width="50" height="50" style="margin-right: 10px;">
               <?php echo $fetch_cart['ten_sanpham']; ?> 
               <span>(<?php echo $fetch_cart['gia'] . 'VND' . ' x ' . $fetch_cart['soluong']; ?>)</span>
            </p>
      <?php
         }
      } else {
         
         echo "<script>window.location.href='../View/donhang.php';</script>";
         
      }
      ?>
      <div class="grand-total"> Tổng giá trị: <span><?php echo $grand_total; ?>VND</span> </div>

   </section>

   <section class="checkout">

      <form action="" method="post">
         <h3>Thông tin giao hàng</h3>
         
         <div class="flex">
            <div class="inputBox">
               <span>Tên người nhận:</span>
               <input type="text" name="name" required placeholder="Họ và tên">
            </div>
            <div class="inputBox">
               <span>Số điện thoại:</span>
               <input type="number" name="number" required placeholder="Số điện thoại">
            </div>
            <div class="inputBox">
               <span>Email:</span>
               <input type="email" name="email" required placeholder="Email">
            </div>
            <div class="inputBox">
               <span>Phương thức thanh toán:</span>
               <select name="method" required>
                  <option value="cash on delivery">Tiền mặt khi nhận hàng</option>
                  <option value="credit card">Thẻ tín dụng</option>
                  <option value="paypal">Paypal</option>
                  <option value="paytm">Paytm</option>
               </select>
            </div>

            <div class="inputBox">
               <span>Địa chỉ nhận hàng:</span>
               <input name="address" type="text" required placeholder="Địa chỉ nhận hàng">
            </div>

            <div class="inputBox">
               <span>Loại địa chỉ:</span>
               <select name="loaidc" required>
                  <option value="địa chỉ nhà riêng">Địa chỉ nhà riêng</option>
                  <option value="địa chỉ văn phòng">Địa chỉ văn phòng</option>
               </select>
            </div>

         </div>
         <input type="submit" value="Đặt hàng ngay" class="btn" name="order_btn">
      </form>

   </section>

   <?php include 'footer.php'; ?>

   <!-- Custom JS File Link -->
   <script src="js/script.js"></script>

</body>

</html>
