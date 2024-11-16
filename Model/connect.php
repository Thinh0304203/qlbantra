<?php 
$severname = "localhost";
$username = "root";
$password = "";
$dbname = "qlbantra";
$conn = new mysqli($severname, $username , $password,$dbname);
mysqli_query($conn,'set names "utf8"');
// if($conn){
//     echo "ket noi thanh cong";
// }
// function unique_id(){
//     $chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
//     $dodaichars =strlen($chars);
//     $randomchar = '';
//     for($i=0; $i<20 ;$i++){
//         $randomchar .= $chars[rand(0, $dodaichars - 1)];
//     }
//     return $randomchar;
// }

?>