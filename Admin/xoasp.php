<?php
include('../../Model/control_sp.php');
// include('control_product.php');
$get_data = new data_sp();
$delete = $get_data->delete_product($_GET['del']);
if ($delete) {
    echo "<script>alert('xoa thanh cong');</script>";
    echo "<script> window.location='../Admin/list_sp.php'</script>";
} else echo "error";
