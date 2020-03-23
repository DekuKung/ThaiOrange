<?php 
include '../../condb.php';
$id = $_POST["boid"];
$cname = $_POST["cname"];
$add = $_POST["cadd"];
$tel = $_POST["ctel"];
$getdate = $_POST["getdate"];

// echo $id;
// echo $cname;
// echo $add;
// echo $tel;
// echo $getdate;

$sql = "UPDATE `booking_detail` SET `Bo_cus`='".$cname."', `Bo_cadd`='".$add."', `Bo_ctel`='".$tel."', `Bo_cdate`='".$getdate."' WHERE Bo_id = '".$id."' ";
// echo $sql;
$query = $condb->query($sql);
if($sql){
    echo "<script>";
    echo "alert('แก้ไขข้อมูลลูกค้าเสร็จสิ้น');";
    echo "window.location='../../Member/bill/Main.php';";
    echo "</script>";  
}else{
    echo "<script>";
    echo "alert('ไม่สามารถแก้ไขได้');";
    echo "window.location='../../Member/bill/Main.php';";
    echo "</script>";  
}
?>