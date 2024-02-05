<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
include("con.php");

require_once '../assets/mailer/PHPMailer.php';
require_once '../assets/mailer/SMTP.php';
require_once '../assets/mailer/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$request_id = $_GET['request_id'];

if (isset($_SESSION['username'])) {
    
    $query = "DELETE FROM order_request WHERE `order_request`.`order_request_id` = '$request_id'";

    $res = mysqli_query($conn,$query);

    if ($res){

        $sql = "SELECT order_request_id, order_po, order_name, order_quantity, order_request_created_date, order_request_from, order_assigned_to, order_status  FROM order_request WHERE order_requested_from = '$name'";

        $result = $conn->query($sql);

        if ($result->num_rows > 0){
            $row = $result->fetch_assoc();
            $row['order_request_id'];
            $row['order_po'];
            $row['order_name'];
            $row['order_request_id'];
            $row['order_request_id'];
            $row['order_request_id'];
            $row['order_request_id'];
            $row['order_request_id'];
            $row['order_request_id'];
            $row['order_request_id'];

            $from = 'ORDER REQUEST FROM ' . $order_request_from ;

            // SMTP Configuration
            $mail = new PHPMailer();
            $mail->isSMTP();
            $mail->Mailer = "smtp";
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'order@designkitchenandbath.com';
            $mail->Password = 'urtbixnhklobkdkf';
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;

            //sender information
            $mail->setFrom('order@designkitchenandbath.com', $from);

            //receiver address and name
            $mail->addAddress('atakan@designkitchenandbath.com', 'Sales');
            $mail->addCC('atakan@designkitchenandbath.com'); 

            $mail->isHTML(true);

            $mail->Subject = 'PO: ' . strtoupper($po_name);
            $mail->Body    = "<h4> Please proceed this requested order! </h4>
            <b>Order Information</b>
                <p> Job Name: $po_name</p>
                <p> Requested By: $order_request_from</p>
                <p> Material Name: $material_name</p>
                <p> Material Link: <a href='$material_link'>$material_link</a></p>
                <p> Quantity: $quantity</p>
                <p> Additional Notes: $description</p>
                <p> Reason: $reason</p>";

            // Send mail   
            if (!$mail->send()) {
                header("Location:../pages/dashboard.php?success=0") ;
                exit;
            }else{
                echo 'Folder deleted successfully.';
                header("Location:../pages/dashboard.php?success=1") ;
                exit;
            } 
        }
    }else{
        header("Location:../pages/dashboard.php?success=0") ;
        exit;
    }
}
$conn->close();
?>