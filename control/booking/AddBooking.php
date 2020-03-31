<?php
session_start();
include '../../condb.php';
$total_price = 0;
$total_buy = 0;
$total_amount = 0;
if(isset($_SESSION["Booking_cart"])) {
        foreach($_SESSION["Booking_cart"] as $item) {
                $item_price = $item["quantity"] * $item["price"];
                $total_buy += $item["price"];
                $id = $item["id"];
$pname = $item["name"];
$quantity = $item["quantity"];
$price = $item["price"];
$total_amount += $item["quantity"];
$total_price += ($item["price"] * $item["quantity"]);
$cname = $_POST["cusname"];
$cadd = $_POST["caddress"];
$ctel = $_POST["ctel"];
$cdate = $_POST["getdate"];
$ctype = $_POST["gettype"];
$seller = $_SESSION["id"];

$check = "SELECT * FROM stock_product WHERE P_id = '".$id."'";
$qcheck = $condb->query($check);
$result  = mysqli_fetch_array($qcheck,MYSQLI_ASSOC);
$unit = $result["P_unit"];

// echo $cname;
// echo $cadd;
// echo $ctel;
// echo $cdate;
// echo $ctype;
// echo " id :".$id;
// echo " quantity :".$quantity;
// echo "price :".$price;
// echo "GatDate : ".$cdate;
// echo " total :".$item_price;
// echo "P_unit :".$unit;

if($quantity > $unit){
        $alert =  "ไม่สามารถทำรายการได้เนื่องจาก"." ".$result["P_name"];
        unset($_SESSION["Booking_cart"]);
        echo "<script>";
        echo "alert('$alert');";
        echo "window.location='../../Member/booking/Main_booking.php';";
        echo "</script>";
}
else{
$sql = "INSERT INTO `booking`(`Bo_id`, `M_id`, `P_id`) VALUES (null ,'".$seller."','".$id."')";
$sql2 = "INSERT INTO `booking_detail`(`Bo_id`, `Bo_amount`, `Bo_total`, `Bo_date`, `Bo_cus`, `Bo_cadd`, `Bo_ctel`, `Bo_cdate`, `Bo_status`, `Get_type`) VALUES (null, '".$quantity."', '".$item_price."', CURDATE(), '".$cname."', '".$cadd."', '".$ctel."', '".$cdate."', 1, '".$ctype."')";
$update = "UPDATE `stock_product` SET `P_unit` = (`P_unit` - '".$quantity."')  WHERE `stock_product`.`P_id` = '".$id."' ";
$query = $condb->query($sql);
$query2 = $condb->query($sql2);
$sql3 = "SELECT * FROM material_stock AS A WHERE A.mstock_id = 3";
$query3 = $condb->query($sql3);
$result3 = mysqli_fetch_array($query3,MYSQLI_ASSOC);
$quantityMet = $result3["mstock_amount"];
if($quantity > $quantityMet){
        $mat = "UPDATE `material_stock` SET `mstock_amount`= 0 WHERE mstock_id = 3";
}
else if($quantity >= 50){
        $mat = "UPDATE `material_stock` SET `mstock_amount`= (`mstock_amount`- 4) WHERE mstock_id = 3";    
    }
    else {
        $mat = "UPDATE `material_stock` SET `mstock_amount`= (`mstock_amount`- 2) WHERE mstock_id = 3"; 
    }
if($query){      
        if($query2){
                $querystock = $condb->query($update);
                $updateM = $condb->query($mat);                       
                if($querystock){       
                        unset($_SESSION["Booking_cart"]);
                        echo "<script>";
                        echo "alert('ทำการจองเสร็จสิ้น');";
                        echo "window.location='../../Member/booking/Main_booking.php';";
                        echo "</script>";   
                }else {
                        unset($_SESSION["Booking_cart"]);
                        echo "<script>";
                        echo "alert('ไม่สามารถจองสินค้าได้');";
                        echo "window.location='../../Member/booking/Main_booking.php';";
                        echo "</script>";   
                }
        }else {
                unset($_SESSION["Booking_cart"]);
                echo "<script>";
                echo "alert('ไม่สามารถจองสินค้าได้');";
                echo "window.location='../../Member/booking/Main_booking.php';";
                echo "</script>";   
        }
}else  {
        unset($_SESSION["Booking_cart"]);
        echo "<script>";
        echo "alert('ไม่สามารถจองสินค้าได้');";
        echo "window.location='../../Member/booking/Main_booking.php';";
        echo "</script>";   
               }       
        }
}
}
?>