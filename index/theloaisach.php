<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>DANH SÁCH - SÁCH</title>
	<link rel="stylesheet" type="text/css" href="theloaisach.css">
</head>
<body>
<?php

	include("connect.php");

	if(isset($_POST['theloai'])){
		$theloai = $_POST['theloai'];
	}
	//Lam viec voi CSDL
	$sql="SELECT TL_MA FROM theloai WHERE TL_TENTHELOAI= '$theloai'";
	$result= $con->query($sql);
	if($result->num_rows > 0){
		while($rows= $result->fetch_assoc()){
			$theloai= $rows['TL_MA'];
			unset($_SESSION['TL_MA']);
		}
	}

	$sql="SELECT * FROM nhaxuatban join sach
		on sach.NXB_MA=nhaxuatban.NXB_MA
		join tacgia on tacgia.TG_MA=sach.TG_MA
		WHERE sach.TL_MA= '$theloai'";
	$result= $con->query($sql);


	if($result->num_rows > 0)
    {

    echo "<div class='wraps'>";
	echo "<div class='headers'>
		<b>DANH SÁCH - SÁCH </b>
		</div>";

	echo "<div class='contents'>";
    echo "<table border=1; align='center'><br>";

    echo "<tr>
            <th> STT </th>
            <th> Mã sách</th>
            <th> Tên sách</th>
            <th> Tên nhà xuất bản</th>
			<th> Tên tác giả</th>
        </tr>";

    $STT = 0;
    while($row = $result->fetch_assoc())
    {
        $masach = $row['S_MASACH'];
        $tensach = $row['S_TENSACH'];
        $tennxb = $row['NXB_TEN'];
        $tentg = $row['TG_TEN'];

        $STT++;

        echo "<tr>
            <td> $STT </td>
            <td >$masach</td>
            <td> $tensach</td>
            <td> $tennxb</td>
			<td> $tentg</td>
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
	$con -> close();
?>

</body>
</html>
