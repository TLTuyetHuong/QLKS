<?php
	session_start();
	if(isset($_GET['q'])){
		$q = $_GET['q'];
		include('connect1.php');
		// Kiểm tra kết nối
		if (mysqli_connect_errno()){
		  echo "Lỗi kết nối: " . mysqli_connect_error();
		}

		$sql = "SELECT * FROM sach WHERE S_TENSACH LIKE '$q%'";
		$result = $conn->query($sql);
		while($row = $result->fetch_assoc()){
			$S_TENSACH= $row['S_TENSACH'];
			echo "<a style='text-decoration :none;' href='hienthisach.php?S_TENSACH=$S_TENSACH'>$S_TENSACH</a></br>";
		}



		//Đóng kết nối
		$conn->close();

    }
?>
