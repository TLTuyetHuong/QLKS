<?php
if(isset($_COOKIE['tendangnhap'])){
  $tendangnhap = $_COOKIE['tendangnhap'];
  session_start();
}

$mkm=$_POST['password'];
$mk = md5($mkm);

$conn = new mysqli("localhost", "root", "","quanlykhosach");
$conn->set_charset("utf8");

//b2 viet cau sql
$sql = "update taikhoan set  matkhau = '$mk' WHERE tendangnhap='$tendangnhap'";
 $conn->query($sql);
$conn->close();
header('Location:/khosach/index1.html');
?>
