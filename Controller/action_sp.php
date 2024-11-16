<?php
include('../Model/control_sp.php');
$get_data = new data_sp();

// Kiểm tra và gán giá trị từ form để tránh lỗi
$name = $_POST['txtten'] ?? null;
$price = $_POST['txtgia'] ?? null;
$product_detail = $_POST['txtchitiet'] ?? null;
$status = $_POST['txttinhtrang'] ?? null;
$id_dm = $_POST['txtdanh_muc'] ?? null;
$id = $_POST['product_id'] ?? null; 

// Kiểm tra và lấy thông tin file ảnh từ form
$imageName = $_FILES['txtimage']['name'] ?? null;
$temp = $_FILES['txtimage']['tmp_name'] ?? null;
$fileError = $_FILES['txtimage']['error'] ?? null;

// Đường dẫn thư mục đích
$targetDirectory = '../image/'; // Thay đổi đường dẫn đến thư mục 'image' nếu cần
$targetFilePath = $targetDirectory . basename($imageName);

// Di chuyển tệp vào thư mục 'image' chỉ khi không có lỗi
if ($fileError === UPLOAD_ERR_OK) {
    if (move_uploaded_file($temp, $targetFilePath)) {
        // Chỉ lưu tên file ảnh
        $new_image = $imageName;
    } else {
        echo "<script>alert('Có lỗi xảy ra khi tải ảnh lên.');</script>";
        // $new_image = null; // Nếu không tải lên được, gán giá trị null
    }
} else {
    echo "<script>alert('Có lỗi xảy ra khi tải ảnh lên: " . $fileError . "');</script>";
    // $new_image = null; // Nếu có lỗi, gán giá trị null
}


// Phân nhánh thực hiện hành động thêm hoặc cập nhật sản phẩm
if (isset($_POST['txtthem'])) {
    // Chèn sản phẩm mới vào cơ sở dữ liệu
    $in_product = $get_data->insert_product(
        $name,
        $price,
        $new_image,  // Chỉ lưu tên file ảnh
        $product_detail,
        $status,
        $id_dm
    );

    if ($in_product) {
        echo "<script>alert('Thêm sản phẩm thành công');</script>";
        echo "<script>window.location = '../View/Admin/list_sp.php'</script>";
    } else {
        echo "<script>alert('Lỗi khi thêm sản phẩm');</script>";
    }
}

if (isset($_POST['txtup'])) {
    // Kiểm tra xem ID có hợp lệ không
    if ($id && is_numeric($id)) {
        // Cập nhật thông tin sản phẩm
        $up_product = $get_data->update_product(
            $id,
            $name,
            $price,
            $new_image,  // Sử dụng ảnh mới nếu có, nếu không thì dùng ảnh cũ
            $product_detail,
            $status,
            $id_dm
        );

        if ($up_product) {
            echo "<script>alert('Cập nhật sản phẩm thành công');</script>";
            echo "<script>window.location = '../View/Admin/list_sp.php'</script>";
        } else {
            echo "<script>alert('Lỗi khi cập nhật sản phẩm');</script>";
        }
    } else {
        echo "<script>alert('ID sản phẩm không hợp lệ.');</script>";
    }
}
?>
