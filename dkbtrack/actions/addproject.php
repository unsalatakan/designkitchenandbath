<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include("con.php");

$po_name = $_POST['po_name'];
$po_start_date_mm = $_POST['po_start_date_mm'];
$po_start_date_dd = $_POST['po_start_date_dd'];
$po_start_date_yy = $_POST['po_start_date_yy'];
$po_type = $_POST['po_type'];
$po_created_by = $_SESSION['username'];
$po_pm_one = $_POST['po_pm_one'];
$po_start_date = $po_start_date_mm . "/" . $po_start_date_dd . "/" . $po_start_date_yy;

if (isset($_SESSION['username'])) {
    
    $query = "INSERT INTO purchase_order (`po_name`,`po_start_date`,`po_type`, `po_created_by`, `po_pm_one`) VALUES ('$po_name','$po_start_date','$po_type','$po_created_by','$po_pm_one')";

    $res = mysqli_query($conn,$query);

    if ($res){
        $structure = '../projects/' . $po_name;

        if (!mkdir($structure, 0777, true)) {
            header("Location:../pages/dashboard.php?success=0") ;
            exit;
        }else{
            header("Location:../pages/dashboard.php?success=1") ;
            exit;
        }
    }else{
        header("Location:../pages/dashboard.php?success=0") ;
        exit;
    }
}
$conn->close();
?>