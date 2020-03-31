<?php
session_start();
include '../../condb.php';
$pass = $_POST['pass'];
$username  = $_POST['user'];
$password = md5($pass);
$fname = $_POST["Fname"];
$lname = $_POST["Lname"];
$add = $_POST["Add"];
$tel = $_POST["Phone"];
$idcard = $_POST["idcard"];

// echo $fname;
// echo $lname;
// echo $add;
// echo $tel;
// echo $username;
// echo $password;
// echo $idcard;

$check = "SELECT * FROM member";
$qcheck = $condb->query($check);
while( $result = mysqli_fetch_array($qcheck,MYSQLI_ASSOC)){
        // echo $result["M_User"];
        // echo $username;
        // echo $result["ID_card"];
        // echo $idcard;
        if($_POST["user"] == $result["M_User"]){
                echo "<script>";
                echo "alert('ชื่อผู้ใช้มรอยู่ในระบบแล้ว กรุณาใช้ชื่ออื่น');";
                echo "window.location='../../ManageMember/Main.php';";
                echo "</script>";
                exit();  
        }
        else if($_POST["idcard"] == $result["ID_card"]){
                echo "<script>";
                echo "alert('รหัส ปปช. นี้มีในระบบแล้ว');";
                echo "window.location='../../ManageMember/Main.php';";
                echo "</script>";
                exit();
        }
}
$sql = "INSERT INTO `member`(`id`, `M_Fname`, `M_Lname`, `ID_card`, `M_User`, `M_Pass`, `M_Add`, `M_Tel`, `M_Status`)
                        VALUES(null,'".$fname."','".$lname."','".$idcard."','".$username."','".$password."','".$add."','".$tel."',2)";
                // echo $sql;
                $query = $condb->query($sql);
                if($query){
                        echo "<script>";
                        echo "alert('เพิ่มผู้ใช้งานเรียบร้อยแล้ว');";
                        echo "window.location='../../ManageMember/Main.php';";
                        echo "</script>";
                }else{
                        echo "<script";
                        echo "alert('ไม่สามารถเพิ่มข้อมูลได้');";
                        echo "window.location='../../ManageMember/Main.php';";
                        echo "</script>";
                }

?>