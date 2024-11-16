<?php
    include('../Model/control_dm.php');
    $get_data = new data_dm();
    if (isset($_POST['txtthem'])) {
        $in_dm = $get_data->insert_dm(
            $_POST['txtten']
        );

        if ($in_dm) {
            echo " <script> alert('Thêm thành công');</script>";
            echo "<script> window.location = '../View/Admin/list_dm.php'</script>";
        } else echo "<script> alert ('Không thực thi được')</script>";
    }
    //up là update khách hàng
    if (isset($_POST['txtup'])) {
        $up_dm = $get_data->update_dm(

            $_POST['txtten'],
            
            $_GET['up']
        );
        if ($up_dm) {
            echo "<script>alert('Sua thanh cong');</script>";
            echo "<script> window.location = '../View/Admin/list_dm.php'</script>";
            // header("Location: ../Views/list_dm.php");
        } else echo "<script>alert('Lỗi khi cập nhật khách hàng');</script>";;
    }
    

    ?>
    