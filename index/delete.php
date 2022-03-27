<?php

    $ma = $_GET['NCC_MA'];

$conn=new mysqli("localhost","root","","quanlykhosach");
$conn-> set_charset("utf8");
	//Lam viec voi CSDL

  $sql = "DELETE from nhacungcap WHERE NCC_MA = '".$ma."'";

	$result = $conn->query($sql);
header('location:danhsachncc.php');
  $conn -> close();


?>
