<?php
session_start();
include '../../condb.php';
$id = $_POST['pid'];
$Amount  = $_POST['amount'];
$price  = $_POST['price'];
if($id == 1){
$quatityM = $Amount*2;
$mat = "UPDATE `material_stock` SET `mstock_amount`= '".$quatityM."' WHERE mstock_id = 1";
$updateM = $condb->query($quatityM);   
}
$mat = "UPDATE `material_stock` SET `mstock_amount`= '".$Amount."' WHERE mstock_id = 2"; 
// echo $id;
// echo $Amount;
// echo $price;
// echo $_SESSION["status"];
$sql = "UPDATE `stock_product` SET `P_unit`= `P_unit`+'".$Amount."',`P_price`='".$price."',`P_add_history_date`= CURDATE() WHERE P_id = '".$id."' ";
$query = $condb->query($sql);
if($query){
    $updateP = $condb->query($updateP);
    echo "<script>";
    echo "alert('นำเข้าสินค้าเสร็จสิ้น');";
    echo "window.location='../../ManageStock/Main.php';";
    echo "</script>";
}
else{
    echo "<script>";
    echo "alert('เกิดข้อผิดพลาด');";
    echo "window.location='../../ManageStock/Main.php';";
    echo "</script>";
}
?>