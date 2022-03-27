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

	$sql="SELECT nhanvien.NV_MANV , HD_SO FROM hoadon join nhanvien on hoadon.NV_MANV= nhanvien.NV_MANV WHERE NV_TENNV='$tendangnhap'";
	$result= $con->query($sql);

	if($result->num_rows > 0){
		echo "<div class='wraps'>";
		echo "<div class='headers'>
		<b>HÓA ĐƠN</b>
		</div>";
		echo "<div class='contents'>";
		echo "<table border=1; align='center'><br>";
		while($rows= $result->fetch_assoc()){
			$HD_SO=$rows['HD_SO'];
			echo "<p>Số HD: ".$HD_SO."</p>";
			setcookie("HD_SO","$HD_SO",time() + 3600,"/");
			echo "<p>Mã NV: ".$rows['NV_MANV']."</p>";
		}
	}
		$today = date("d/m/Y");
		echo "<p>Ngày lập HD:  $today </p>";


    $sql = "SELECT * FROM  ct_hoadon  join sach on ct_hoadon.S_MASACH=sach.S_MASACH WHERE HD_SO='$HD_SO'";

	$result = $con->query($sql);
	echo "<tr>
			<th> STT </th>
			<th> Tên sách </th>
			<th> Số lượng </th>
			<th> Đơn giá </th>
			<th> Thành tiền </th>
		</tr>";
	if($result->num_rows > 0)
    {
			$STT = 0;
			$tong=0;
    while($row = $result->fetch_assoc())
    {
        $tensach = $row['S_TENSACH'];
        $sl = $row['SOLUONGHD'];
        $dg = $row['DONGIA'];
				//sử dụng function Thanh_tien
        $sql="SELECT Thanh_Tien('$sl','$dg') AS thanhtien";
				$result2= $con->query($sql);
				$row2=$result2->fetch_assoc();
				$thanhtien=$row2['thanhtien'];

        $STT++;

        echo "<tr>
            <td> $STT </td>
            <td >$tensach</td>
						<td >$sl</td>
            <td> $dg (VND)</td>
						<td >$thanhtien</td>
        </tr>";
				$tong=$tong+$thanhtien;

        }
				echo "<tr>
					<th colspan='4'>Tổng tiền:</th>
					<td>$tong</td></tr>";
        echo "</table>";

}
echo "</div>";
echo "<tr></tr>";
    echo "<div class='contents'>
			<button id='dx' type='button'>
				<a href='themchitiethd.html'>Thêm sách</a>
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
