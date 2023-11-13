<?php
include "navbar.php" ;
include "connect.php" ;
$proid =$_GET['pro_id'];
$sql = "DELETE FROM product WHERE pro_id = '$proid'";
$result = $con->query($sql);

if (!$result) {
    echo "<script>alert('ไม่สามารถแก้ไขข้อมูลได้');history.back();</script>";
} else {
    header('location:product.php');
}