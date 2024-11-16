<?php
include('connect.php');

class data_dm
{
    // Hàm thêm danh mục
    public function insert_dm($ten_dm)
    {
        global $conn;
        $sql = "INSERT INTO doanhmuc (ten_dm)
                VALUES ('$ten_dm')";
        $run = mysqli_query($conn, $sql);
        
        return $run;
    }

    // Hàm lấy tất cả danh mục
    function select_dm()
    {
        global $conn;
        $sql = "SELECT * FROM doanhmuc";
        $run = mysqli_query($conn, $sql);
        return $run;
    }

    // Hàm lấy danh mục theo ID
    function select_dm_id($id_dm)
    {
        global $conn;
        $sql = "SELECT * FROM doanhmuc WHERE id_dm = '$id_dm'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }

    // Hàm cập nhật danh mục
    function update_dm($ten_dm, $id_dm)
    {
        global $conn;
        $sql = "UPDATE doanhmuc SET ten_dm='$ten_dm' WHERE id_dm='$id_dm'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }

    // Hàm xóa danh mục
    function delete_dm($id_dm)
    {
        global $conn;
        $sql = "DELETE FROM doanhmuc WHERE id_dm='$id_dm'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    
    
        // Hàm lấy dữ liệu danh mục với phân trang
        public function select_dm_pagination($start, $limit) {
            // Kết nối cơ sở dữ liệu và lấy dữ liệu với LIMIT và OFFSET
            $sql = "SELECT * FROM doanhmuc LIMIT $start, $limit";
            // Thực hiện truy vấn và trả về kết quả
        }
    
    
}
?>
