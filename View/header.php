<?php
include('../Model/connect.php');

// Kiểm tra xem người dùng đã đăng nhập chưa
$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;
$_SESSION['search'] = $_GET['timkiem'];

include('../Model/control_dm.php');
$data_dm = new data_dm();
$dm_list = $data_dm->select_dm(); // Lấy tất cả danh mục
?>

<header class="header">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/nutxo.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&amp;display=swap" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
        
    <div class="flex">
        <a href="/View/home.php" class="logo"><img src="../image/logo.jpg"></a>
        <nav class="navbar">
            <a href="home.php">Trang Chủ</a>
            <div class="dropdown">
                <a href="../View/sanpham.php">Sản Phẩm <i class="fas fa-caret-down"></i> </a>
                <div class="dropdown-content">
                    <?php
                    // Hiển thị danh mục từ cơ sở dữ liệu
                    if ($dm_list) {
                        while ($row = mysqli_fetch_assoc($dm_list)) {
                            echo '<a href="danhmuc.php?category_id=' . $row['id_dm'] . '">' . htmlspecialchars($row['ten_dm']) . '</a>';
                        }
                    } else {
                        echo '<a href="#">Không có danh mục</a>';
                    }
                    ?>
                </div>
            </div>
            <a href="donhang.php">Đơn Hàng</a>
            <a href="gioithieu.php">Giới Thiệu</a>
            <a href="lienhe.php">Liên Hệ</a>
        </nav>

        <div class="search-container">
                <input name ="timkiem" placeholder="Tìm kiếm..." size="30px" type="text"/>
                <button type="submittk">
                    <i class="fas fa-search" style="color: black;"></i>
                </button>
            </div>

        <?php
        // Kiểm tra giỏ hàng của người dùng
        if ($user_id) {
            // Nếu đã đăng nhập, lấy số lượng giỏ hàng của người dùng
            $select_cart_number = mysqli_query($conn, "SELECT * FROM `giohang` WHERE id_nguoidung = '$user_id'") or die('query failed');
            $cart_rows_number = mysqli_num_rows($select_cart_number);
        } else {
            // Nếu chưa đăng nhập, giỏ hàng sẽ có số lượng là 0
            $cart_rows_number = 0;
        }
        ?>

        <div class="icons">
            <i class="fas fa-user" id="user-btn"></i>
            <a href="danhsachyeuthich.php" class="giohang-btn"><i class="fas fa-heart"></i></a>

            <!-- Kiểm tra người dùng đã đăng nhập hay chưa -->
            <?php if (!$user_id): ?>
                <!-- Nếu chưa đăng nhập, chỉ hiển thị giỏ hàng nhưng không có số lượng -->
                <a href="login.php" class="giohang-btn">
                    <i class="fas fa-shopping-cart"></i><sub>0</sub>
                </a>
            <?php else: ?>
                <!-- Nếu đã đăng nhập, hiển thị giỏ hàng của người dùng -->
                <a href="giohang.php" class="giohang-btn">
                    <i class="fas fa-shopping-cart"></i><sub><?php echo $cart_rows_number; ?></sub>
                </a>
            <?php endif; ?>

            <i class="bx bx-danhsach-plus" id="menu-btn" style="font-size: 2rem;"></i>
        </div>

        <div class="user-box">
            <?php if ($user_id): ?>
                <p>Username: <span><?php echo $_SESSION['user_name']; ?></span></p>
                <p>Email: <span><?php echo $_SESSION['user_email']; ?></span></p>
                <form method="post">
                    <button type="submit" name="logout" class="logout-btn">Đăng Xuất</button>
                </form>
            <?php else: ?>
                <a href="login.php" class="btn">Đăng Nhập</a>
                <a href="dangky.php" class="btn">Đăng Ký</a>
            <?php endif; ?>
        </div>
    </div>
</header>
