<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>DANH SÁCH SẢN PHẨM</title>
	<link rel="stylesheet" type="text/css" href="dsnxb.css">
</head>
<body>
<?php
	include("connect.php");

	//Lam viec voi CSDL

    $sql = "SELECT * FROM nhaxuatban ";

	$result = $con->query($sql);

	if($result->num_rows > 0)
	{
    echo "<div class='wrap'>";
	echo "<div class='header'>
		<b>DANH SÁCH XUẤT BẢN</b>
		</div>";

	echo "<div class='content'>";
    echo "<table border=1; align='center'><br>";
    echo "<p>Danh sách nhà xuất bản là:</p><br>";
    echo "<tr>
            <th> STT </th>
            <th> Mã NXB </th>
            <th> Tên NXB </th>
			<th> Địa chỉ NXB </th>
			<th> SĐT NXB </th>
			<th> Email NXB </th>
            <th colspan='2'> Lựa chọn </th>
        </tr>";
    $STT = 0;
    while($row = $result->fetch_assoc())
    {
		$STT++;
        $NXB_MA = $row['NXB_MA'];
        $ten = $row['NXB_TEN'];
        $dc = $row['NXB_DIACHI'];
        $sdt =  $row['NXB_SDT'];
        $email = $row['NXB_EMAIL'];



        echo "<tr>
			<td> $STT </td>
            <td> $NXB_MA </td>
            <td> $ten </td>
            <td> $dc </td>
			<td> $sdt </td>
			<td> $email </td>

            <td><a href='suanxb.php?NXB_MA=$NXB_MA&NXB_TEN= $ten&NXB_DIACHI=$dc&NXB_SDT=$sdt&NXB_EMAIL=$email'>
            <button type='button' style='width:70px;height:30px;'>Sửa</button></a></td>
            <td ><a href='xoanxb.php?NXB_MA=$NXB_MA'>
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
				<a href='themNXB.html'>Thêm NXB</a>
			</button>
		</div>";

	echo "</div>";
	}

	$con -> close();
?>
</body>
</html>
