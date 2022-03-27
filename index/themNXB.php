<?php
	session_start();
?>
<html><body>
<?php
	
	//Lay du lieu ve
	$ma= $_POST['ma'];
	$ten= $_POST['ten'];
	$diachi= $_POST['diachi'];
	$sdt= $_POST['sdt'];
	$email= $_POST['email'];
	
	//Lam viec voi CSDL
	
	include("connect.php");
	
	/*$sql="SELECT id FROM taikhoan WHERE tendangnhap= '$tendangnhap'";
	$result= $con->query($sql);
	if($result->num_rows > 0){
		while($rows= $result->fetch_assoc()){
			$id= $rows['id'];
			unset($_SESSION['id']);
		}
	}*/
	
	$sql="INSERT INTO nhaxuatban(NXB_MA,NXB_TEN,NXB_DIACHI,NXB_SDT,NXB_EMAIL) 
			VALUES('$ma','$ten','$diachi','$sdt','$email')";
	
	
	$con->query($sql);
	
	$_SESSION['tennxb']=$_POST['ten'];
	header("location:danhsachnxb.php");
	$con->close();
?>
</body></html>