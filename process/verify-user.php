<?php
session_start();
include '../include/connection.php';
///////////////////////////////////////
//////////////////////////////////////
//////////////////////////////////////
//////////////////////////////////////

if ($_SERVER["REQUEST_METHOD"] == "POST"){
$code = ($_POST['Code']);
$email = ($_POST['Email']);
}

$verified="verified";

       $sql= "SELECT * FROM users WHERE email='$email' AND code='$code'";
       $result= $conn->query($sql);
       
       if ($result->num_rows > 0) 
        while($row = $result->fetch_assoc()) {

           $row1 = $row["id"];
           $row2 = $row["email"];
           $_SESSION['id']=$row1;
        
       $sql = "UPDATE users SET verify='$verified' WHERE email='$row2'";
        if ($conn->multi_query($sql) === TRUE) {
        header ("location: ../login?email=$email&done=block");
        //header ("Location: ../emails/welcome-mail?email=$email");
        //echo "Error: " . $sql . "<br>" . $conn->error;
     }
            
      }else {
            $email= $_POST['Email'];
            $verify="block";
           $msg="Wrong code";
            header ("Location: ../login?msg=$msg&email=$email&verify=$verify");
       }

  

     
    //unset($_SESSION['refaddress']);
   // unset($_SESSION['refreferral']);

?>