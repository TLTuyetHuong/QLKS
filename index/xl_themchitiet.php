<?php
if(isset($_COOKIE['tendangnhap'])){
  $tendangnhap = $_COOKIE['tendangnhap'];
  session_start();
}
if(isset($_COOKIE['HD_SO'])){
	$HD_SO = $_COOKIE['HD_SO'];
}


$ten=$_POST['name'];
$sl = $_POST['sl'];


//b1 tao noi ket
$conn=new mysqli("localhost","root","","quanlykhosach");
$conn-> set_charset("utf8");

$sql="SELECT S_MASACH FROM ct_hoadon WHERE S_MASACH='$ten'";
$result = $conn-> query($sql);
if($result->num_rows > 0)
  {
    $sql="CALL Update_hd_Insert('$ten','$sl') ";

    $conn-> query($sql);
  }else {
    //truy Van
    $sql="INSERT INTO ct_hoadon (HD_SO,S_MASACH,SOLUONGHD) VALUES ('$HD_SO','$ten','$sl') ";
    $conn-> query($sql);

  }
  $sql="CALL Updatekho('$ten','$sl') ";
  $conn-> query($sql);

$conn-> close();
header('Location:hienthihd.php');
?>
