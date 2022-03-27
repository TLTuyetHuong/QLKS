
<html><body>
<?php
	include("connect.php");

	$ma = $_GET['NXB_MA'];

    $sql = "DELETE FROM nhaxuatban WHERE NXB_MA = '$ma'";

    $result= $con->query($sql);
	
	header("location: danhsachnxb.php");
	
	$con->close();
?>
</body></html>