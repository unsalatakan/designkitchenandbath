<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
include("con.php");

$po_id = $_GET['po_id'];
$folderPath = '../projects/' . $_GET['po_name'];

if (isset($_SESSION['username'])) {
    
    $query = "DELETE FROM purchase_order WHERE `purchase_order`.`po_id` = '$po_id'";

    $res = mysqli_query($conn,$query);

    if ($res){
        if (is_dir($folderPath)) {
            if (!rmdir($folderPath)) {
                echo 'Error: Unable to delete folder.';
                header("Location:../pages/dashboard.php?success=1") ;
                exit;
            } else {
                echo 'Folder deleted successfully.';
                header("Location:../pages/dashboard.php?success=1") ;
                exit;
            }
        } else {
            echo 'Error: The specified path is not a directory.';
            header("Location:../pages/dashboard.php?success=0") ;
            exit;
        }
    }else{
        header("Location:../pages/dashboard.php?success=0") ;
        exit;
    }
}
$conn->close();
?>