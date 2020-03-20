<?php 
session_start();
include '../../condb.php';
$name = $_POST["pname"];
$quantity = $_POST["amount"];
$price = $_POST["price"];
$img = $_POST["img"];

$sql = "INSERT INTO `stock_product`(`P_id`, `P_name`, `P_unit`, `P_price`, `P_add_history_date`, `P_Image`) VALUES (null, '".$name."', '".$quantity."', '".$price."', CURDATE(), '".$img."')";
$query = $condb->query($sql);
if($query){

}else{
    
}

?>