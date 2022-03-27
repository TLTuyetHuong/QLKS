<?php
if(isset($_COOKIE['tendangnhap'])){
	$tendangnhap = $_COOKIE['tendangnhap'];
	session_start();
}
?>

<?php
	include("connect.php");
	//Lam viec voi CSDL
	$sql="SELECT * FROM nhanvien WHERE NV_TENNV='$tendangnhap'";
	$result= $con->query($sql);
echo "<table border=1; align='center'; style='font-size:30px' ><br>";

	if($result->num_rows > 0)
    {

	    echo "<tr>
	            <th> Mã nhân viên </th>
	            <th> ID </th>
	            <th> Tên nhân viên </th>
	            <th> Giới tính </th>
							<th>Địa chỉ</th>
							<th>Số điện thoại</th>
							<th>Email</th>
	        </tr>";
    while($row = $result->fetch_assoc())
    {
        $ma= $row['NV_MANV'];
        $ID = $row['ID'];
        $ten = $row['NV_TENNV'];
				$gt=$row['NV_GIOITINH'];
				$dc=$row['NV_DIACHINV'];
				$sdt=$row['NV_SDT'];
				$mail=$row['NV_EMAILNV'];
        echo "<tr>
            <td> $ma </td>
            <td >$ID</td>
						<td >$ten</td>
            <td> $gt</td>
						<td>$dc</td>
						<td>$sdt</td>
						<td>$mail</td>
        </tr>";

        }
        echo "</table>";
}
	$con -> close();
?>
