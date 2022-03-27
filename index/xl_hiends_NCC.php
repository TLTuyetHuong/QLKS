<!DOCTYPE html>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="dsnxb.css">
    <title>Danh Sách nhà cung cấp</title>
	<style>
	#b td{
    border: 1px solid red;
    text-align: center;
  }
  #b a{
      text-decoration: none;
  }
#t {
  width: 60px;
  height: 30px;
}
#s {
  width: 60px;
  height: 30px;
}
#x {
  width: 60px;
  height: 30px;
}


	</style>
</head>
<body>
<?php
//b1 tao noi ket
$conn=new mysqli("localhost","root","","quanlykhosach");
$conn-> set_charset("utf8");
//truy Van
$sql="SELECT NCC_MA,NCC_TEN,NCC_DIACHI,NCC_SDT,NCC_EMAIL FROM nhacungcap ";

$result = $conn->query($sql);
//b4:xu li kq
if($result->num_rows > 0)
{
  echo "<div class='wrap'>";
  echo "<div class='header'>
  <b>DANH SÁCH NHÀ CUNG CẤP</b>
  </div>";

  echo "<div class='content'>";
  echo "<table border=1; align='center'><br>";
  echo "<p>Danh sách thông tin nhà cung cấp:</p><br>";
      echo "<tr>
      <th> STT </th>
      <th> Mã NCC </th>
      <th> Tên NCC </th>
      <th>Địa chỉ NCC</th>
      <th>Số điện thoại NCC</th>
      <th>Email NCC</th>
      </tr>";
  $STT = 0;
  while($row=$result->fetch_assoc()){
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
    </tr>";
  }
  echo "</table>";
echo "</div>";
echo "<div class='footer'>
<button id='dx' type='button'>
  <a href=''>Đăng xuất</a>
</button>
<button id='themsp' type='button'>
  <a href=''>Thêm NXB</a>
</button>
</div>";

echo "</div>";
}
$conn-> close();
?>
</body>
</html>
