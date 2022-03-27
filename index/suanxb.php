
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>Thông tin chi tiết sản phẩm</title>
	<link rel="stylesheet" type="text/css" href="sua.css">
</head>
<body>
<?php
    if( isset($_GET['NXB_MA'])){
        $NXB_MA = $_GET['NXB_MA'];
    }
    
     if( isset($_GET['NXB_TEN'])){
        $NXB_TEN = $_GET['NXB_TEN'];
    }
    if( isset($_GET['NXB_DIACHI'])){
        $NXB_DIACHI = $_GET['NXB_DIACHI'];
    }
    if( isset($_GET['NXB_SDT'])){
        $NXB_SDT = $_GET['NXB_SDT'];
    }
    if( isset($_GET['NXB_EMAIL'])){
        $NXB_EMAIL = $_GET['NXB_EMAIL'];
    }
	
	echo "<div class='wrap'>
			<div class='header'>
				<h1>Sửa thông tin cho sản phẩm</h1>
		</div>";
	echo "<div class='content'>
		<form action='xuly_suaspnxb.php?NXB_MA=$NXB_MA' method='POST' enctype='multipart/form-data'>
			<table>
				<tr>
					<td id='t'>Mã NXB</td> 
					<td><input type='text' name='ma' value=$NXB_MA></td>
				</tr>
				<tr>
					<td id='t'>Tên NXB</td> 
					<td><input type='text' name='ten' value=$NXB_TEN></td>
				</tr>
				<tr>
					<td id='t'>Địa chỉ NXB</td> 
					<td><input type='text' name='dc' value=$NXB_DIACHI></td>
				</tr>
				<tr>
					<td id='t'>SĐT NXB</td> 
					<td><input type='text' name='sdt' value=$NXB_SDT></td>
				</tr>
				<tr>
					<td id='t'>Email NXB</td> 
					<td><input type='text' name='email' value=$NXB_EMAIL></td>
				</tr>
				
				<tr>
					<td></td>
					<td>					
					<input type='submit' value='Lưu thông tin'>
					</td>
				</tr>
			</table>
		</form>
		</div>	
	</div>";
?>
</body>
</html>
