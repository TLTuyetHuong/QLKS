<?php
session_start();
$tendangnhap = $pass = "";
if($_POST['firstname']){
    $tendangnhap=$_POST['firstname'];
	}
if($_POST['password']){
        $pass = $_POST['password'];
    }
   $mk = md5($pass);

	// b1:tao ket noi
  include('connect1.php');
	// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// b2: viet cau truy van:
$sql="SELECT tendangnhap,matkhau FROM taikhoan
WHERE tendangnhap = '".$tendangnhap."' AND matkhau = '".$mk."'";

$result = $conn->query($sql);
// xu ly kq:
if( $result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        $tendangnhap = $row['tendangnhap'];
        setcookie("tendangnhap","$tendangnhap",time() + 3600,"/");
        header("Location:test.html");
    }
}
else{
    header("Location: dangnhap.html");
}

//b5 kthuc
//$_SESSION['tendangnhap']= $tendangnhaP;
$conn->close();

?>
