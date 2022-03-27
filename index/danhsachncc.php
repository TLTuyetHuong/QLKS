<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>DANH SÁCH NHÀ CUNG CẤP</title>
		<link rel="stylesheet" type="text/css" href="ncc.css">
</head>
<body>
<?php
$conn=new mysqli("localhost","root","","quanlykhosach");
$conn-> set_charset("utf8");
	//Lam viec voi CSDL

  $sql = "SELECT * FROM nhacungcap ";

	$result = $conn->query($sql);

	if($result->num_rows > 0)
	{
    echo "<div class='wrap'>";
		echo "<div class='header'>
		<b>DANH SÁCH NHÀ CUNG CẤP</b>
		</div>";

		echo "<div class='content'>";
    echo "<table border=1; align='center'><br>";
    echo "<p>Danh sách nhà cung cấp là:</p><br>";
		echo "<tr>
				<th> STT </th>
				<th> Mã NCC </th>
				<th> Tên NCC </th>
				<th>Địa chỉ NCC</th>
				<th>Số điện thoại NCC</th>
				<th>Email NCC</th>

        <th colspan='2'> Lựa chọn </th>
        </tr>";
    $STT = 0;
    while($row = $result->fetch_assoc())
    {
			$ma = $row['NCC_MA'];
			$ten = $row['NCC_TEN'];
			$dc = $row['NCC_DIACHI'];
			$sdt =  $row['NCC_SDT'];
			$email = $row['NCC_EMAIL'];

			$STT++;

			echo "<tr>
			<td> $STT </td>
			<td> $ma </td>
			<td> $ten </td>
			<td> $dc</td>
			<td> $sdt </td>
			<td>$email </td>
            <td><a href='sua.php?NCC_MA=$ma&NCC_TEN= $ten&NCC_DIACHI=$dc&NCC_SDT=$sdt&NCC_EMAIL=$email'>
            <button type='button' style='width:70px;height:30px;'>Sửa</button> </a></td>
            <td ><a href='delete.php?NCC_MA=$ma'>
            <button type='button' style='width:70px;height:30px;'>Xóa</button></a></td>
        </tr>";
        }
        echo "</table>";
				echo "</div>";
    	echo "<div class='footer'>
			<button id='dx' type='button'>
				<a href='/khosach/test.html'>Trở lại</a>
			</button>
			<button id='themsp' type='button'>
				<a href='NCC.html'>Thêm NCC</a>
			</button>
		</div>";

	echo "</div>";
	}

	$conn -> close();
?>
</body>
</html>
