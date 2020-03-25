<?php 
session_start();
include '../../condb.php';
$name = $_POST["pname"];
$quantity = $_POST["amount"];
$price = $_POST["price"];
$img = $_POST["img"];

$check = "SELECT * FROM stock_product";
$qcheck = $condb->query($check);
while( $result = mysqli_fetch_array($qcheck,MYSQLI_ASSOC)){
    if($img == $result["P_Image"]){
            echo "<script>";
            echo "alert('ข้อมูลนี้มีอยู่ในระบบแล้ว');";
            echo "window.location='../../ManageStock/Main.php';";
            echo "</script>";
            break;    
    }
    else if($name == $result["P_name"]){
            echo "<script>";
            echo "alert('ข้อมูลนี้มีอยู่ในระบบแล้ว');";
            echo "window.location='../../ManageStock/Main.php';";
            echo "</script>";
            break;
    }
    else {
        $sql = "INSERT INTO `stock_product`(`P_id`, `P_name`, `P_unit`, `P_price`, `P_add_history_date`, `P_Image`) VALUES (null, '".$name."', '".$quantity."', '".$price."', CURDATE(), '".$img."')";
        // echo $sql;
        // echo $_SESSION["status"];
        $query = $condb->query($sql);
        if($query){
            echo "<script>";
            echo "alert('เพิ่มสินค้าเสร็จสิ้น');";
            echo "window.location='../../ManageStock/Main.php';";
            echo "</script>";
            break;
        }else{
            echo "<script>";
            echo "alert('ไม่สามารถเพิ่มสินค้าได้');";
            echo "window.location='../../ManageStock/Main.php';";
            echo "</script>";
            break;
        }
    }
}

?>