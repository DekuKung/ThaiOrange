<?php
session_start();
include '../../condb.php';
$id = $_POST['pid'];
$Amount  = $_POST['amount'];
$price  = $_POST['price'];
$sql2 = "SELECT * FROM material_stock AS A WHERE A.mstock_id = 1";
$query2 = $condb->query($sql2);
$result2 = mysqli_fetch_array($query2,MYSQLI_ASSOC);
$checkM = $result2["mstock_amount"];
if($id == 1){
$quatityM = $Amount*2;
if($quatityM >= $checkM){
    $mat = "UPDATE `material_stock` SET `mstock_amount`= 0 WHERE mstock_id = 1";
}
else{
    $mat = "UPDATE `material_stock` SET `mstock_amount`= (`mstock_amount` - '".$quatityM."') WHERE mstock_id = 1";
}
$updateM = $condb->query($quatityM);   
}
$sql3 = "SELECT * FROM material_stock AS A WHERE A.mstock_id = 2";
$query3 = $condb->query($sql3);
$result3 = mysqli_fetch_array($query3,MYSQLI_ASSOC);
$checkM2 = $result3["mstock_amount"];

if($Amount > $checkM2){
    $mat2 = "UPDATE `material_stock` SET `mstock_amount`= 0 WHERE mstock_id = 2"; 
}
else {
    $mat2 = "UPDATE `material_stock` SET `mstock_amount`= (`mstock_amount` - '".$Amount."') WHERE mstock_id = 2"; 
}

// echo $id;
// echo $Amount;
// echo $price;
// echo $_SESSION["status"];
$sql = "UPDATE `stock_product` SET `P_unit`= `P_unit`+'".$Amount."',`P_price`='".$price."',`P_add_history_date`= CURDATE() WHERE P_id = '".$id."' ";
$query = $condb->query($sql);
if($query){
    $updateP = $condb->query($mat);
    $updateP2 = $condb->query($mat2);
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