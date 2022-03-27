<?php
	session_start();
?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>DANH SÁCH SÁCH</title>
	<link rel="stylesheet" type="text/css" href="theloaisach.css">
</head>
<body>
<?php
	include('connect.php');

	$sql="CALL `HIENTHI`()";
	$result= $con->query($sql);

	if($result->num_rows > 0)
    {
    echo "<div class='wraps'>";
	echo "<div class='headers'>
		<b>DANH SÁCH - SÁCH</b>
		</div>";

	echo "<div class='contents'>";
    echo "<table border=1; align='center'><br>";

    echo "<tr>
            <th> STT </th>
            <th> Mã sách </th>
            <th>Mã NXB </th>
						<th>Tên tác giả</th>
            <th>Tên thể loại</th>
						<th>Mã kho</th>
						<th>Tên sách</th>
						<th>Đơn giá</th>
        </tr>";
    $STT = 0;
    while($row = $result->fetch_assoc())
    {
        $masach = $row['S_MASACH'];
				$manxb = $row['NXB_MA'];
				$tentg = $row['TG_TEN'];
				$tentl = $row['TL_TENTHELOAI'];
				$makho = $row['K_MA'];
        $tensach = $row['S_TENSACH'];
        $gia = $row['DONGIA'];

        $STT++;

        echo "<tr>
            <td> $STT </td>
						<td> $masach </td>
						<td>$manxb</td>
						<td>$tentg</td>
						<td>$tentl</td>
						<td>$makho</td>
						<td> $tensach </td>
            <td> $gia (VND)</td>

        </tr>";
        }
        echo "</table>";
	echo "</div>";
    echo "<div class='contents'>
			<button id='dx' type='button'>
				<a href='/khosach/test.html'>Trở lại</a>
			</button>
		</div>";

	echo "</div>";
	}
    echo "<br>";
	echo "<div id='TB' ></div>";
	$con->close();

?>
</body>
</html>
