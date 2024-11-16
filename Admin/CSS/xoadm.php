<?php
include('../../Model/control_dm.php');
// include('control_dm.php');
$get_data = new data_dm();
$delete = $get_data->delete_dm($_GET['del']);
if ($delete) {
    echo "<script>alert('xoa thanh cong');</script>";
    echo "<script> window.location='../Admin/list_dm.php'</script>";
} else echo "error";
