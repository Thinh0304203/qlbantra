<?php
    include('../Model/control_nd.php');
    // include('control.php');
    $get_data = new data_nd();
    if (isset($_POST['txtthem'])) {
        $in_user = $get_data->insert_user(
            $_POST['txtten'],
            $_POST['txtemail'],
            
            $_POST['txtpassword'],
           
        );

        if ($in_user) {
            echo " <script> alert('Thành công');</script>";
            echo "<script> window.location = '../View/Admin/list_user.php'</script>";
        } else echo "<script> alert ('Không thực thi được')</script>";
    }
    //up là update khách hàng
    if (isset($_POST['txtup'])) {
        $up_user = $get_data->update_user(

            $_POST['txtten'],
            $_POST['txtemail'],
            $_POST['txtpassword'],
            
            $_GET['up']
        );
        if ($up_user) {
            echo "<script>alert('Sửa thành công');</script>";
            echo "<script> window.location = '../View/Admin/list_user.php'</script>";
            // header("Location: ../Views/list_user.php");
        } else echo "<script>alert('Lỗi khi cập nhật khách hàng');</script>";;
    }
    

    ?>
    