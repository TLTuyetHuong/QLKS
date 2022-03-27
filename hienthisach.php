<?php
	session_start();
?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>PHIẾU NHẬP</title>
	<link rel="stylesheet" type="text/css" href="theloaisach.css">
</head>
<body>
<?php

	if( isset($_GET['S_TENSACH'])){
        $S_TENSACH= $_GET['S_TENSACH'];
    }

	include('connect1.php');

	$sql="SELECT * FROM sach WHERE S_TENSACH= '$S_TENSACH'";
	$result= $conn->query($sql);


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
            <th> Tên sách </th>
            <th> Giá </th>
        </tr>";
    $STT = 0;
    while($row = $result->fetch_assoc())
    {
        $masach = $row['S_MASACH'];
        $tensach = $row['S_TENSACH'];
        $gia = $row['DONGIA'];

        $STT++;

        echo "<tr>
            <td> $STT </td>
			<td> $masach </td>
			<td> $tensach </td>
            <td> $gia (VND)</td>

        </tr>";
        }
        echo "</table>";
	echo "</div>";
    echo "<div class='contents'>
			<button id='dx' type='button'>
				<a href='test.html'>Trở lại</a>
			</button>
		</div>";

	echo "</div>";
	}
    echo "<br>";
	echo "<div id='TB' ></div>";
	$conn->close();

?>
</body>
</html>
