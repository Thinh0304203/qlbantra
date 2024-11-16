<?php
// Kết nối cơ sở dữ liệu
include '../Model/connect.php';
session_start();

// Lấy ID người dùng từ session
$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;
if (!$user_id) {
    die("Bạn cần đăng nhập để xem giỏ hàng.");
}

$grand_total = 0;

// Xóa tất cả sản phẩm khỏi giỏ hàng
if (isset($_GET['delete_all'])) {
    mysqli_query($conn, "DELETE FROM `giohang` WHERE id_nguoidung = '$user_id'") or die('Query failed');
    header('location:giohang.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Giỏ hàng</title>
    <link rel="stylesheet" href="../style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 80%;
            margin: auto;
            overflow: hidden;
        }

        h1 {
            color: #333;
            text-align: center;
            margin: 20px 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 15px;
            border: 1px solid #ddd;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .summary {
            text-align: right;
            margin-top: 20px;
            padding: 15px;
            background: #fffae6;
            border: 1px solid #ffcc00;
            border-radius: 10px;
            font-size: 1.2em;
        }

        .summary .total {
            font-size: 1.6em;
            font-weight: bold;
            color: #e63946;
        }

        .actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 30px;
        }

        .actions a {
            background-color: #ff4d4d;
            color: white;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 5px;
            transition: background-color 0.3s;
            font-size: 1.1em;
        }

        .actions a:hover {
            background-color: #e60000;
        }

        .quantity-input {
            width: 60px;
            text-align: center;
            padding: 5px;
        }

        .checkout-button {
            background-color: #28a745;
            color: white;
            text-decoration: none;
            padding: 15px 30px;
            font-size: 1.2em;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .checkout-button:hover {
            background-color: #218838;
        }

        .action-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <?php include 'header.php'; ?>
    <div class="container">
        <h1>Giỏ hàng</h1>
        <table>
            <thead>
                <tr>
                    <th>Hình ảnh</th>
                    <th>Tên sản phẩm</th>
                    <th>Giá</th>
                    <th>Số lượng</th>
                    <th>Tổng</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $select_cart = mysqli_query($conn, "SELECT * FROM `giohang` WHERE id_nguoidung = '$user_id'") or die('Query failed');
                if (mysqli_num_rows($select_cart) > 0) {
                    while ($fetch_cart = mysqli_fetch_assoc($select_cart)) {
                        $sub_total = $fetch_cart['soluong'] * $fetch_cart['gia'];
                        $grand_total += $sub_total;
                ?>
                        <tr>
                            <td><img src="../image/image_sp/<?php echo $fetch_cart['image']; ?>" alt="<?php echo $fetch_cart['ten_sanpham']; ?>" width="100"></td>
                            <td><?php echo $fetch_cart['ten_sanpham']; ?></td>
                            <td><?php echo number_format($fetch_cart['gia']); ?> VND</td>
                            <td>
                                <input 
                                    type="number" 
                                    name="cart_quantity" 
                                    min="1" 
                                    value="<?php echo $fetch_cart['soluong']; ?>" 
                                    class="quantity-input" 
                                    data-cart-id="<?php echo $fetch_cart['id_giohang']; ?>" 
                                    data-product-price="<?php echo $fetch_cart['gia']; ?>"
                                />
                            </td>
                            <td class="sub-total"><?php echo number_format($sub_total); ?> VND</td>
                            <td>
                                <a href="../chucnang/giohang.php?delete=<?php echo $fetch_cart['id_giohang']; ?>" onclick="return confirm('Bạn có chắc muốn xóa sản phẩm này?');">Xóa</a>
                            </td>
                        </tr>
                <?php
                    }
                } else {
                    echo '<tr><td colspan="6">Giỏ hàng của bạn trống</td></tr>';
                }
                ?>
            </tbody>
        </table>

        <div class="summary">
            Tổng giá trị giỏ hàng: <span class="total"><?php echo number_format($grand_total); ?> VND</span>
        </div>

        <div class="action-container">
            <a href="giohang.php?delete_all" onclick="return confirm('Bạn có chắc muốn xóa tất cả sản phẩm trong giỏ?');">Xóa tất cả</a>
            <a href="ptthanhtoan.php" class="checkout-button">Thanh toán</a>
        </div>
    </div>
    <?php include 'footer.php'; ?>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const quantityInputs = document.querySelectorAll('.quantity-input');

            quantityInputs.forEach(input => {
                input.addEventListener('input', async (event) => {
                    const cartId = event.target.dataset.cartId;
                    const productPrice = parseFloat(event.target.dataset.productPrice);
                    const quantity = parseInt(event.target.value);

                    if (quantity > 0) {
                        const subTotalCell = event.target.closest('tr').querySelector('.sub-total');
                        const subTotal = productPrice * quantity;
                        subTotalCell.textContent = new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(subTotal);

                        try {
                            await fetch('update_cart.php', {
                                method: 'POST',
                                headers: { 'Content-Type': 'application/json' },
                                body: JSON.stringify({ cart_id: cartId, cart_quantity: quantity }),
                            });
                            updateGrandTotal();
                        } catch (error) {
                            console.error('Lỗi khi cập nhật giỏ hàng:', error);
                        }
                    }
                });
            });

            const updateGrandTotal = () => {
                let grandTotal = 0;
                document.querySelectorAll('.sub-total').forEach(cell => {
                    const subTotal = parseFloat(cell.textContent.replace(/[^\d]/g, ''));
                    grandTotal += subTotal;
                });
                document.querySelector('.summary .total').textContent = new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(grandTotal);
            };
        });
    </script>
</body>

</html>
