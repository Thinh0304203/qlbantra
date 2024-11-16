<?php
include('../../Model/control_nd.php');
// include('control_user.php');
$get_data = new data_nd();
$delete = $get_data->delete_user($_GET['del']);
if ($delete) {
    echo "<script>alert('Xóa thành công');</script>";
    echo "<script> window.location='../Admin/list_user.php'</script>";
} else echo "Lỗi không xóa được";
