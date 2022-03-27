<?php
if(isset($_COOKIE['tendangnhap'])){
  $tendangnhap = $_COOKIE['tendangnhap'];
  session_start();
}
if(isset($_COOKIE['PN_SO'])){
	$PN_SO = $_COOKIE['PN_SO'];
}


$ten=$_POST['name'];
$sl = $_POST['sl'];


//b1 tao noi ket
$conn=new mysqli("localhost","root","","quanlykhosach");
$conn-> set_charset("utf8");
//truy Van
$sql="INSERT INTO ct_phieunhap (PN_SO,S_MASACH,SOLUONGHD) VALUES ('$PN_SO','$ten','$sl') ";
$conn-> query($sql);
//produres câp nhat lai kho khi them phiếu nhập;
$sql="CALL Updatekhonhap('$ten','$sl') ";
$conn-> query($sql);
$conn-> close();
header('Location:HTPN.php');
?>
