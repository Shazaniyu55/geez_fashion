<?php
session_start();
include '../include/connection.php';
///////////////////////////////////////
//////////////////////////////////////
//////////////////////////////////////
//////////////////////////////////////

if ($_SERVER["REQUEST_METHOD"] == "POST"){
$name = ($_POST['Name']);
$email = ($_POST['Email']);
$phone = ($_POST['Phone']);
$state = ($_POST['State']);
$country = ($_POST['Country']);
}

$code=(rand(10, 10000));
$mydate=getdate(date("U")); 
$date="$mydate[weekday], $mydate[month] $mydate[mday], $mydate[year]";


$paid='paid';
$unpaid='unpaid';
       
       $sql= "SELECT * FROM models WHERE email='$email' AND paid='$paid'";
       $result= $conn->query($sql);
       if ($result->num_rows > 0) {
           $msg="This email ($email) has already been used for a model entry.";
         $_SESSION['email']=$email;
         $_SESSION['name']=$name;
         $_SESSION['msg']=$msg;
         //echo ("already registered and paid");
        header ("Location: ../model"). exit();
      }


     $sql= "SELECT * FROM models WHERE email='$email' AND paid='$unpaid'";
       $result= $conn->query($sql);
       if ($result->num_rows > 0) {
           $msg="This email ($email) has already been used for a model entry.";
         $_SESSION['email']=$email;
         $_SESSION['name']=$name;
         $_SESSION['done']='block';
         //echo ("already registered but unpaid");
       header ("Location: ../model").  exit("");
      }else{
    $sql = "INSERT INTO models (name, email, state, phone, country, paid, date) VALUES ('$name', '$email', '$state', '$phone', '$country', 'unpaid', '$date');";
        if ($conn->multi_query($sql) === TRUE) {
            $_SESSION['email']=$email;
            $_SESSION['done']='block';
            $_SESSION['name']=$name;
             //echo ("just registered");
           header ("Location: ../model");
        } else{
        echo "Error: " . $sql . "<br>" . $conn->error;
    } 
       }

?>