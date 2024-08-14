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
}

$mydate=getdate(date("U")); 
$date="$mydate[weekday], $mydate[month] $mydate[mday], $mydate[year]";

   if(isset ($_POST['Email'])) 
      
       $email= $_POST['Email'];
       
       $sql= "SELECT * FROM voters WHERE email='$email'";
       $result= $conn->query($sql);
       
       if ($result->num_rows > 0) 
       while($row = $result->fetch_assoc()){
         $row1 = $row["id"];
         $row2 = $row["email"];
         $_SESSION['Voteid']=$row1;
         $msg="You are logged in to vote";
         header ("Location: ../exhibition?msg=$msg"). exit();
      }else{
    $sql = "INSERT INTO voters (name, email, date) VALUES ('$name', '$email', '$date');";
        if ($conn->multi_query($sql) === TRUE) {
            
         $sql= "SELECT * FROM voters WHERE email='$email'";
           $result= $conn->query($sql);

           if ($result->num_rows > 0) 
           while($row = $result->fetch_assoc()){
             $row1 = $row["id"];
             $row2 = $row["email"];
             $_SESSION['Voteid']=$row1;
             $msg="You are logged in to vote";
             header ("Location: ../exhibition?msg=$msg"). exit();
           }
        } else{
        echo "Error: " . $sql . "<br>" . $conn->error;
    } 
} 

    //unset($_SESSION['refaddress']);
   // unset($_SESSION['refreferral']);


?>