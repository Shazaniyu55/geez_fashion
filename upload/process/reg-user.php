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
$category = ($_POST['Category']);
$state = ($_POST['State']);
$business = ($_POST['Business']);
$detail = addslashes($_POST['Detail']);
}

$code=(rand(10, 10000));
$mydate=getdate(date("U")); 
$date="$mydate[weekday], $mydate[month] $mydate[mday], $mydate[year]";
$_SESSION['id']=$code;


$verified="verified";
$unverified="unverified";

   if(isset ($_POST['Email'])) 
      
       $email= $_POST['Email'];
       
       $sql= "SELECT * FROM users WHERE email='$email' AND verify='$unverified'";
       $result= $conn->query($sql);
       
       if ($result->num_rows > 0) {
         $email= $_POST['Email'];
         $verify="block";
         header ("Location: ../login?email=$email&verify=$verify"). exit();
      }
      
       $sql= "SELECT * FROM users WHERE email='$email' AND verify='$verified'";
       $result= $conn->query($sql);
       
       if ($result->num_rows > 0) 
        while($row = $result->fetch_assoc()) {
          $row1 = $row["id"];
          $row2 = $row["email"];
          $_SESSION['id']=$row1;
         header ("Location: ../login?entry=block"). exit();
      }else{

    $sql = "INSERT INTO users (name, email, state, phone, category, business_name, business_detail, date, verify, code) VALUES ('$name', '$email', '$state', '$phone', '$category', '$business', '$detail', '$date', 'unverified', '$code');";
        if ($conn->multi_query($sql) === TRUE) {
             $email= $_POST['Email'];
            $verify="block";
            header ("Location: emails/register-mail?email=$email&code=$code");
        } else{
        echo "Error: " . $sql . "<br>" . $conn->error;
    } 
} 

    //unset($_SESSION['refaddress']);
   // unset($_SESSION['refreferral']);


?>