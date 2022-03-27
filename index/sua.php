<?php
    if(isset($_COOKIE['tendangnhap'])){
        $tendangnhap = $_COOKIE['tendangnhap'];
        session_start();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>
<body>
<?php

$ma = $_GET['NCC_MA'];
$ten =$_GET['NCC_TEN'];
$dc = $_GET['NCC_DIACHI'];
$sdt = $_GET['NCC_SDT'];
$email =$_GET['NCC_EMAIL'];


  echo "<h2 align='center' style='color:red ;'> Bạn có muốn sửa thông tin sản phẩm</h2>";
    echo "<form action='xuly_sua.php?NCC_MA=$ma' method='POST' enctype='multipart/form-data'>";
  echo "<table align='center'; width='500px' bgcolor='#FFFF99';>";
  	echo "<tr>
  		<td>Ma NCC: </td>
  		<td><input type='text' name='firstname' value=$ma><br></td>
  	</tr>";
  echo"  <tr>
  		<td><label for='name'>Tên NCC: </label></td>
  		<td><input type='text' name='name' value=$ten  id='name'><br></td>
  	</tr>";
echo "<tr>
  			<td><label for='sanpham'>Địa chỉ:</label></td>
  		<td><textarea name='massager' rows ='6' cols = '38' >$dc</textarea><br></td>
  </tr>";
    echo "<tr>
    <td><label for='sdt'>SĐT:</label></td>
    <td><input type='text' name='sdt' id='sdt' value=$sdt><br></td>
  	</tr>";
  	  echo "<tr>
      <td><label for='email'>Email:</label></td>
  		<td><input type='text' name='email' value=$email><br></td>

  	</tr>";
    echo "<tr>
  	<td></td>
  		<td>
  		<input type='submit' value='UPDATE'>


  		</td>
  	</tr>";

  	 echo "</form>";
echo "  </table>";
    ?>
    </body>
    </html>
