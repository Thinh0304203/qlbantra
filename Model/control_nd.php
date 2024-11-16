<?php
include('connect.php');

class data_nd
{
    public function insert_user($name, $email, $password)
    {
        global $conn;
        $sql = "INSERT INTO nguoidung (tennguoidung, email, matkhau)
                VALUES ('$name', '$email', '$password')";
        $run = mysqli_query($conn, $sql);
        
        return $run;
    }

    function select_user()
    {
        global $conn;
        $sql = "SELECT * FROM nguoidung";
        $run = mysqli_query($conn, $sql);
        return $run;
    }

    function select_user_id($id_user)
    {
        global $conn;
        $sql = "SELECT * FROM nguoidung WHERE id_nguoidung = '$id_user'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }

    function update_user( $name, $email, $password,$id_user)
    {
        global $conn;
        $sql = "UPDATE nguoidung SET tennguoidung='$name', email='$email', matkhau ='$password' WHERE id_nguoidung='$id_user'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }

    function delete_user($id_user)
    {
        global $conn;
        $sql = "DELETE FROM nguoidung WHERE id_nguoidung='$id_user'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
}
