<?php
// Đường dẫn thư mục chứa ảnh
$dir = "../image/image_bg/";

// Duyệt thư mục để lấy tất cả các file ảnh (jpg, png, jpeg, gif)
$images = glob($dir . "*.{jpg,png,jpeg,gif}", GLOB_BRACE);
// Kiểm tra nếu thư mục có ảnh hay không
if (count($images) == 0) {
    $images = ["../image/default.jpg"]; // Đặt ảnh mặc định nếu không có ảnh
}
// Trả về danh sách ảnh dưới dạng JSON để JavaScript có thể sử dụng
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="../CSS/media_home.css">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <title>Green Coffee - Trang Chủ</title>
</head>

<body>
    <?php include 'header.php'; ?>

    <div class="main">
        <section class="home-section">
            <div class="slider-container">
                <div class="slider-item">
                    <img src="" alt="Slide image" id="slider-image">
                </div>
            </div>
            <div class="left-arrow"><i class="bx bx-left-arrow"></i></div>
            <div class="right-arrow"><i class="bx bx-right-arrow"></i></div>
        </section>

        <!-- Các phần khác trên trang -->
        <?php
        include '../Model/connect.php';

        $sql = "SELECT id_sanpham, ten_sanpham, image, gia, thongtinchitiet_sanpham FROM sanpham ORDER BY id_sanpham DESC LIMIT 5";
        $result = $conn->query($sql);

        $products = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $products[] = $row;  // Lưu trữ các sản phẩm vào mảng
            }
        } else {
            echo "Không có sản phẩm nào.";
        }
        ?>
        <section class="thumb">
            <div class="box-container">
                <?php
                // Lặp qua từng sản phẩm và hiển thị thông tin
                foreach ($products as $product) {
                ?>
                    <div class="box">
                        <a href="chitietsp.php?id=<?php echo $product['id_sanpham']; ?>"> <!-- Link đến trang chi tiết sản phẩm -->
                            <img src="../image/image_sp/<?php echo $product['image']; ?>" alt="<?php echo $product['ten_sanpham']; ?>">
                            <h3><?php echo $product['ten_sanpham']; ?></h3>
                            <p><?php echo $product['thongtinchitiet_sanpham']; ?></p> <!-- Nếu có mô tả chi tiết -->
                            <div class="price"><?php echo number_format($product['gia'], 0, ',', '.'); ?> VND</div>
                        </a>
                    </div>
                <?php
                }
                ?>
            </div>
        </section>
        <section class = "box11">

        </section>
        

        <!-- ------------- Shop ----------------- -->
        <section class="shop">
            <div class="title">
                <img src="../image/download.png">
                <h1>Sản Phẩm Thịnh Hành</h1>
            </div>
            <div class="row">
                <img src="../image/about.jpg">
                <div class="row-detail">
                    <img src="../image/basil.jpg">
                    <div class="top-footer">
                        <h1>Ở đâu có trà, ở đó có hạnh phúc</h1>
                    </div>
                </div>
            </div>
            <div class="box-container">
                <div class="box">
                    <img src="../image/card.jpg">
                    <a href="sanpham.php" class="btn">Shop now</a>
                </div>
                <div class="box">
                    <img src="../image/card0.jpg">
                    <a href="sanpham.php" class="btn">Shop now</a>
                </div>
                <div class="box">
                    <img src="../image/card1.jpg">
                    <a href="sanpham.php" class="btn">Shop now</a>
                </div>
                <div class="box">
                    <img src="../image/card2.jpg">
                    <a href="sanpham.php" class="btn">Shop now</a>
                </div>
                <div class="box">
                    <img src="../image/10.jpg">
                    <a href="sanpham.php" class="btn">Shop now</a>
                </div>
                <div class="box">
                    <img src="../image/6.webp">
                    <a href="sanpham.php" class="btn">Shop now</a>
                </div>
            </div>
        </section>

        <section class="shop-category">
            <div class="box-container">
                <div class="box">
                    <img src="../image/6.jpg">
                    <div class="detail">
                        <span>Sale Lớn</span>
                        <h1>Giảm đến 15% sản phẩm</h1>
                        <a href="sanpham.php" class="btn">Shop now</a>
                    </div>
                </div>
                <div class="box">
                    <img src="../image/7.jpg">
                    <div class="detail">
                        <span>Hương Vị Mới</span>
                        <h1>Trà Hương</h1>
                        <a href="sanpham.php" class="btn">Shop now</a>
                    </div>
                </div>
            </div>
        </section>

        <!-- -------------------------------------------- -->
        <section class="services">
            <div class="box-container">
                <div class="box">
                    <img src="../image/icon2.png">
                    <div class="detail">
                        <h3>Tiết Kiệm được khoản tiền lớn </h3>
                        <p>tiết kiệm khoản tiền lớn cho mỗi đơn hàng</p>
                    </div>
                </div>
                <div class="box">
                    <img src="../image/icon1.png">
                    <div class="detail">
                        <h3>24*7 support</h3>
                        <p>Hỗ trợ khách hàng </p>
                    </div>
                </div>
                <div class="box">
                    <img src="../image/icon0.png">
                    <div class="detail">
                        <h3>Phiếu Giảm Giá </h3>
                        <p>Phiếu Giảm Giá cho mọi ngày Sale ,Lễ lớn </p>
                    </div>
                </div>
                <div class="box">
                    <img src="../image/icon.png">
                    <div class="detail">
                        <h3>Tiết Kiệm được khoản tiền lớn </h3>
                        <p>tiết kiệm khoản tiền lớn cho mỗi đơn hàng</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- --------- Brand Section ----------------- -->
        <section class="brand">
            <div class="box-container">
                <div class="box">
                    <img src="../image/brand (1).jpg">
                </div>
                <div class="box">
                    <img src="../image/brand (2).jpg">
                </div>
                <div class="box">
                    <img src="../image/brand (3).jpg">
                </div>
                <div class="box">
                    <img src="../image/brand (4).jpg">
                </div>
                <div class="box">
                    <img src="../image/brand (5).jpg">
                </div>
            </div>
        </section>
    </div>

    <?php include 'footer.php'; ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="script.js"></script>

    <script>
        // Danh sách các ảnh từ PHP được đưa vào biến images trong JavaScript
        const images = <?php echo json_encode($images); ?>;

        $(document).ready(function() {
            // Các biến để điều khiển slide
            let currentIndex = 0;
            const totalSlides = images.length;
            const sliderImage = $("#slider-image"); // Ảnh hiện tại trong slider

            // Hiển thị ảnh đầu tiên
            sliderImage.attr("src", images[currentIndex]);

            // Hàm chuyển đến ảnh tiếp theo
            function showNextSlide() {
                currentIndex = (currentIndex + 1) % totalSlides;
                sliderImage.attr("src", images[currentIndex]);
            }

            // Hàm chuyển đến ảnh trước
            function showPrevSlide() {
                currentIndex = (currentIndex - 1 + totalSlides) % totalSlides;
                sliderImage.attr("src", images[currentIndex]);
            }

            // Sự kiện khi nhấn vào mũi tên trái
            $(".left-arrow").click(function() {
                showPrevSlide();
            });

            // Sự kiện khi nhấn vào mũi tên phải
            $(".right-arrow").click(function() {
                showNextSlide();
            });

            // Chạy slider tự động mỗi 5 giây
            setInterval(showNextSlide, 5000);
        });
    </script>
</body>

</html>