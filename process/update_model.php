<?php
session_start();
include '../include/connection.php';
///////////////////////////////////////
//////////////////////////////////////
//////////////////////////////////////
//////////////////////////////////////

if ( isset( $_SESSION['email'] ) ) 
$email= ($_SESSION['email']);

if ( isset( $_GET['transactionhash'] ) ) 
$hash= ($_GET['transactionhash']);




$paid="paid";

       $sql = "UPDATE models SET paid='$paid', hash='$hash' WHERE email='$email'";
        if ($conn->multi_query($sql) === TRUE) {
        header ("location: ../model");
        $_SESSION['final']="block";
        //header ("Location: ../emails/welcome-mail?email=$email");
        //echo "Error: " . $sql . "<br>" . $conn->error;
      }else {
            header ("Location: ../model");
       }

    //unset($_SESSION['refaddress']);
   // unset($_SESSION['refreferral']);

?>