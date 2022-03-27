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
    <title>HÓA ĐƠN</title>
	<link rel="stylesheet" type="text/css" href="theloaisach.css">
</head>
<body>
<?php

	include("connect.php");
	//Lam viec voi CSDL

	$sql="SELECT nhanvien.NV_MANV , PN_SO FROM phieunhap join nhanvien on phieunhap.NV_MANV= nhanvien.NV_MANV WHERE NV_TENNV='$tendangnhap'";
	$result= $con->query($sql);

	if($result->num_rows > 0){
		echo "<div class='wraps'>";
		echo "<div class='headers'>
		<b>PHIẾU NHẬP</b>
		</div>";
		echo "<div class='contents'>";
		echo "<table border=1; align='center'><br>";
		while($rows= $result->fetch_assoc()){
			$PN_SO=$rows['PN_SO'];
			echo "<p>Số PN: ".$PN_SO."</p>";
			setcookie("PN_SO","$PN_SO",time() + 3600,"/");
			echo "<p>Mã NV: ".$rows['NV_MANV']."</p>";
		}
	}
		$today = date("d/m/Y");
		echo "<p>Ngày lập phiếu:  $today </p>";


    $sql = "SELECT NCC_MA, sach.K_MA, PN_TENPHIEU, sach.S_TENSACH, SOLUONGHD FROM phieunhap
																			join ct_phieunhap on phieunhap.PN_SO= ct_phieunhap.PN_SO
																			join sach on ct_phieunhap.S_MASACH=sach.S_MASACH ";

	$result = $con->query($sql);

	echo "<tr>
			<th> STT </th>
			<th> Mã NCC </th>
			<th> Mã KHO </th>
			<th> Tên Phiếu </th>
			<th>Tên sách</th>
			<th>Số lượng</th>

		</tr>";
	if($result->num_rows > 0)
    {

		$STT= 0;
    while($row = $result->fetch_assoc())
    {
        $ncc = $row['NCC_MA'];
        $makho = $row['K_MA'];
        $tenpn = $row['PN_TENPHIEU'];
				$tensach=$row['S_TENSACH'];
				$soluong=$row['SOLUONGHD'];
        $STT++;

        echo "<tr>
            <td> $STT </td>
            <td >$ncc</td>
			<td >$makho</td>
            <td> $tenpn</td>
						<td>$tensach</td>
						<td>$soluong</td>

        </tr>";

        }


    echo "</table>";


echo "</div>";
}

    echo "<div class='contents'>
			<button id='dx' type='button'>
				<a href='themchitietphieunhap.html'>Thêm sách</a>
			</button>
			<button id='dx' type='button'>
				<a href='/khosach/test.html'>In</a>
			</button>
		</div>";

	echo "</div>";

	$con -> close();
?>

</body>
</html>
