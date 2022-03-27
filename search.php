<?php
  $p=$_GET['p'];
    $con = new mysqli("localhost","root","","quanlykhosach");
    $con-> set_charset("utf8");
    $sql = "SELECT S_TENSACH FROM SACH WHERE S_TENSACH LIKE '$p%'";
    $result = $con->query($sql);
    if($result->num_rows > 0){
        echo "<table border=1>";
        while($row = $result->fetch_assoc())
        {
        echo "<tr>
        <td>".$row['S_TENSACH']."</td>
        </tr>";
        }
        echo "</table>";

    }else{
    echo "Không tìm thấy kết quả";
    }
    $con->close();
?>
