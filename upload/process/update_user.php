<?php
session_start();
include '../include/connection.php';
///////////////////////////////////////
//////////////////////////////////////
//////////////////////////////////////
//////////////////////////////////////

if ( isset( $_GET['transactionhash'] ) ) 
$hash= ($_GET['transactionhash']);




$paid="paid";

       $sql = "UPDATE users SET paid='$paid', hash='$hash' WHERE email='$email'";
        if ($conn->multi_query($sql) === TRUE) {
        header ("location: ../model");
        $_SESSION['entry']="block";
        header ("Location: ../login");
        //echo "Error: " . $sql . "<br>" . $conn->error;
      }else {
            header ("Location: ../login");
       }
    //unset($_SESSION['refaddress']);
   // unset($_SESSION['refreferral']);
?>
