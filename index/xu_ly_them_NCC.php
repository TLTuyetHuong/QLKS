<?php
if(isset($_COOKIE['tendangnhap'])){
  $tendangnhap = $_COOKIE['tendangnhap'];
  session_start();
}

$ma=$_POST['firstname'];
$ten=$_POST['name'];
$diachi = $_POST['massager'];
$sdt=$_POST['sdt'];
$email=$_POST['email'];

//b1 tao noi ket
$conn=new mysqli("localhost","root","","quanlykhosach");
$conn-> set_charset("utf8");


//truy Van insert nhà cung cấp bằng produres 
$sql="call themncc('$ma','$ten','$diachi','$sdt','$email')";

$conn-> query($sql);
$conn-> close();
header("location:danhsachncc.php");
?>
