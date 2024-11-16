<?php
include('../Model/connect.php');
session_start(); 

if (!isset($_SESSION['user_id'])) {
    // Nếu chưa đăng nhập, chuyển hướng đến trang login
    header('Location: login.php');
    exit();
}

// Nếu đã đăng nhập, lấy user_id từ session
$user_id = $_SESSION['user_id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Your Orders</title>

   <!-- font awesome cdn link -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <link rel="stylesheet" href="../style.css">
</head>
<style>
/* Reset CSS */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Helvetica', sans-serif;
    background-color: #f9f9f9;
    color: #333;
    padding: 20px;
}




/* Heading Section */
.heading {
    text-align: center;
    margin: 50px 0;
}

.heading h3 {
    font-size: 36px;
    font-weight: 700;
    color: #333;
}

.heading p {
    font-size: 18px;
    color: #666;
}

.heading a {
    color: #007bff;
    text-decoration: underline;
}

.title {
    text-align: center;
    font-size: 30px;
    font-weight: bold;
    margin-bottom: 30px;
    color: #333;
}

/* Main Content Section */
.placed-orders {
    max-width: 1200px;
    margin: 0 auto;
}

.box-container {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
    gap: 30px;
    margin-bottom: 50px;
}

.box {
    background-color: white;
    padding: 20px;
    border-radius: 12px;
    box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.box:hover {
    transform: translateY(-10px);
    box-shadow: 0 4px 25px rgba(0, 0, 0, 0.2);
}

.box p {
    font-size: 16px;
    margin-bottom: 12px;
    color: #444;
}

.box span {
    font-weight: bold;
    color: #333;
}

.box .status {
    font-weight: bold;
    padding: 5px 10px;
    border-radius: 5px;
    text-transform: uppercase;
}

.box .status.pending {
    background-color: #ffcc00;
    color: #fff;
}

.box .status.completed {
    background-color: #28a745;
    color: #fff;
}

.empty {
    text-align: center;
    font-size: 20px;
    font-weight: bold;
    color: #f44336;
}

/* Footer */
footer {
    text-align: center;
    background-color: #333;
    color: #fff;
    padding: 20px;
    margin-top: 50px;
    border-radius: 10px;
}

/* Responsive Design */
@media screen and (max-width: 768px) {
    .box-container {
        grid-template-columns: 1fr;
        gap: 20px;
    }
    .heading h3 {
        font-size: 28px;
    }
    .title {
        font-size: 24px;
    }
}

</style>
<body>
   
<?php include 'header.php'; ?>

<div class="heading">
   <h3>Danh sách sản phẩm đặt hàng</h3>
</div>

<section class="placed-orders">
   <div class="box-container">

      <?php
         // Truy vấn để lấy tất cả đơn hàng của người dùng
         $order_query = mysqli_query($conn, "SELECT * FROM `donhang` WHERE id_nguoidung = '$user_id'");

         if (mysqli_num_rows($order_query) > 0) {
            while ($fetch_orders = mysqli_fetch_assoc($order_query)) {
      ?>
      <div class="box">
         <p> Tên người nhận : <span><?php echo $fetch_orders['ten_nguoinhanhang']; ?></span> </p>
         <p> Số điện thoại : <span><?php echo $fetch_orders['sdt_nguoinhan']; ?></span> </p>
         <p> Email : <span><?php echo $fetch_orders['email_nguoinhan']; ?></span> </p>
         <p> Địa chỉ nhận hàng : <span><?php echo $fetch_orders['diachi_nhanhang']; ?></span> </p>
         <p> Phương thức thanh toán : <span><?php echo $fetch_orders['phuongthucthanhtoan']; ?></span> </p>
         <p> Tổng số tiền : <span><?php echo $fetch_orders['tongsoluong']; ?></span> </p>
         <p> Ngày đặt hàng : <span><?php echo $fetch_orders['ngaydathang']; ?></span> </p>
         
         <p> Trang thái đơn hàng : <span style="color:<?php if($fetch_orders['trangthaidonhang'] == 'chờ xử lý'){ echo 'red'; }else{ echo 'green'; } ?>;"><?php echo $fetch_orders['trangthaidonhang']; ?></span> </p>

      </div>
      <?php
            }
         } else {
            echo '<p class="empty">Chưa có đơn hàng nào.</p>';
         }
      ?>
   </div>

</section>

<?php include 'footer.php'; ?>

<!-- custom js file link -->
<script src="js/script.js"></script>

</body>
</html>