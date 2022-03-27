<?php
	include("connect.php");
	
	if( isset($_GET['NXB_MA'])){
        $NXB_MA = $_GET['NXB_MA'];
    }
    
     if( isset($_POST['ten'])){
        $NXB_TEN = $_POST['ten'];
    }
    if( isset($_POST['dc'])){
        $NXB_DIACHI = $_POST['dc'];
    }
    if( isset($_POST['sdt'])){
        $NXB_SDT = $_POST['sdt'];
    }
    if( isset($_POST['email'])){
        $NXB_EMAIL = $_POST['email'];
    }

	
	
	if ($con->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}


	$sql = "update nhaxuatban set NXB_TEN = '".$NXB_TEN."', NXB_DIACHI = '".$NXB_DIACHI."', NXB_SDT= '".$NXB_SDT."', NXB_EMAIL= '".$NXB_EMAIL."'
			WHERE NXB_MA='".$NXB_MA."'";

	$con->query($sql);

	header("Location:danhsachnxb.php");
	$con->close();
	
?>
