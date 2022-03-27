
<?php
if(isset($_COOKIE['tendangnhap'])){
  $tendangnhap = $_COOKIE['tendangnhap'];
  session_start();
}

if( isset($_GET['NCC_MA'])){
		$ma = $_GET['NCC_MA'];
}
//$ma=$_POST['firstname'];
$ten=$_POST['name'];
$diachi = $_POST['massager'];
$sdt=$_POST['sdt'];
$email=$_POST['email'];

//b1 Create connection
$conn = new mysqli("localhost", "root", "","quanlykhosach");
$conn->set_charset("utf8");
	// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

//b2 viet cau sql
/*$sql = "update nhacungcap set  NCC_TEN = '$ten',  NCC_DIACHI='$diachi', NCC_SDT='$sdt',NCC_EMAIL='$email'
 WHERE NCC_MA = '".$ma."'";*/
$sql="CALL UPDATETG('$ma','$tendangnhap','$ten','$diachi','$sdt','$email')";
//b3 truy van
 $conn->query($sql);
//b4 xu ly kq

//b5 kthuc
$conn->close();
header("Location:danhsachncc.php");
?>
