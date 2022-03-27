<?php
    $pass = $_POST['password'];
$mk = md5($pass);
$con = new mysqli("localhost","root","","quanlykhosach");
$con -> set_charset("utf8");
$sql="SELECT matkhau FROM taikhoan
WHERE  matkhau = '".$mk."'";
$result = $con->query($sql);
header("Location: mkmoi.html");

$con->close();
?>
