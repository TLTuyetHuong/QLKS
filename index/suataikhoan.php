<?php
if(isset($_COOKIE['tendangnhap'])){
	$tendangnhap = $_COOKIE['tendangnhap'];
	session_start();
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Tài Khoản</title>
	<link rel="stylesheet" type="text/css" href="ncc.css">
</head>
<body>
<?php

$conn=new mysqli("localhost","root","","quanlykhosach");
$conn-> set_charset("utf8");
	//Lam viec voi CSDL
	$sql="SELECT id FROM taikhoan
	WHERE '".$_COOKIE['tendangnhap']."' = tendangnhap";
	$result = $conn->query($sql);
	if( $result->num_rows > 0){
	    while($row = $result->fetch_assoc()){
		$id= $row['id'];
		setcookie("id","$id",time() + 3600,"/");
	}}


    $sql = "SELECT tendangnhap, matkhau FROM taikhoan WHERE ID = '".$id."'";

	$result = $conn->query($sql);

	if($result->num_rows > 0)
	{
    echo "<div class='wrap'>";
	echo "<div class='header'>
		<b>TÀI KHOẢN CỦA BẠN</b>
		</div>";

	echo "<div class='content'>";
    echo "<table border=1; align='center'><br>";
    
		echo "<tr>
				<th> Tên</th>
				<th>Mật khẩu</th>
        </tr>";
				while($row = $result->fetch_assoc())
		    {
			$ten = $row['tendangnhap'];
			$matkhau = $row['matkhau'];

			echo "<tr>
			<td> $ten </td>
			<td> $matkhau </td>
        </tr>";
			}
        echo "</table>";
	echo "</div>";
    echo "<div class='footer'>
			<button id='dx' type='button'>
				<a href='test.html'>Trở lại</a>
			</button>
			<button id='themsp' type='button'>
				<a href='NCC.html'>Thêm NCC</a>
			</button>
		</div>";

	echo "</div>";}


	$conn -> close();
?>
</body>
</html>
