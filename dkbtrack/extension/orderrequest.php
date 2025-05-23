<?php

session_start();
include("../actions/con.php");


if (!isset($_SESSION["username"])) {
    header("Location: index.html");
    exit();
}else{
  $username = $_SESSION["username"];
}

error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include PHPMailer classes
require_once '../assets/mailer/PHPMailer.php';
require_once '../assets/mailer/SMTP.php';
require_once '../assets/mailer/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$order_request_from = $_GET['from'] ;
$po_name = $_GET['po_name'];
$order_manager = $_GET['order_manager'];
$material_name = $_GET['material_name'];
$material_link = $_GET['material_link'];
$description = $_GET['description'];
$quantity = $_GET['quantity'];

$reason = $_GET['reason'];

if($_GET['requested_option'] == 'ASAP'){
    $requested_date = 'ASAP';
}else{
    $date = new DateTime($_GET['requested_date']);
    $formattedDate = $date->format("m-d-Y");
    $requested_date = $formattedDate;
}

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
    echo 'Email not sent an error was encountered: ' . $mail->ErrorInfo;
} else {
    if (isset($_SESSION['username'])) {
    
        $query = "INSERT INTO order_request (`order_po`,`order_name`,`order_link`, `order_quantity`, `order_requested_date`, `order_request_created_date`, `order_description`, `order_reason`, `order_request_from`, `order_assigned_to` ,`order_status`) 
        VALUES ('$po_name','$material_name','$material_link','$quantity','$requested_date', DATE_FORMAT(NOW(), '%m-%d-%Y'), '$description', '$reason', '$username', '$order_manager', 'OPEN')";
    
        $res = mysqli_query($conn,$query);
    
        if ($res){
            
            header("Location:../pages/dashboard.php?success=1") ;
            exit;
            
        }else{
            $error_message = mysqli_error($conn);
            header("Location: ../pages/dashboard.php?success=0&error=$error_message");
            exit;
        }
    }
}

$mail->smtpClose();
?>