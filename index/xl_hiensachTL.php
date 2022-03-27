<?php

//b1 tao noi ket
$conn=new mysqli("localhost","root","","quanlykhosach");
$conn-> set_charset("utf8");
//truy Van
$sql="SELECT NCC_MA,NCC_TEN,NCC_DIACHI,NCC_SDT,NCC_EMAIL FROM nhacungcap ";

$result = $conn->query($sql);
