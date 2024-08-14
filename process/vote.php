<?php
session_start();
include '../include/connection.php';
///////////////////////////////////////
//////////////////////////////////////
//////////////////////////////////////
//////////////////////////////////////
if ( isset( $_SESSION['Voteid'] ) ) 
$voter= ($_SESSION['Voteid']);
if(empty($voter)){
    header ("location: ../exhibition?login=block"). exit("");
}


if ($_SERVER["REQUEST_METHOD"] == "POST"){
$id = ($_POST['Id']);
$voter = ($_POST['VoterId']);
$email = ($_POST['Email']);
}

        
       $sql= "SELECT * FROM users WHERE email='$email'";
       $result= $conn->query($sql);
       
       if ($result->num_rows > 0) 
        while($row = $result->fetch_assoc()) {
            $msg="You cant vote on any entry as you are a contestant, share your link so others can vote for you";
            header ("location: ../exhibition?msg=$msg"). exit("");
        }else{
            
             
       $sql= "SELECT * FROM voters WHERE email='$email'";
       $result= $conn->query($sql);
       
       if ($result->num_rows > 0) 
        while($row = $result->fetch_assoc()) {
            
            $sql = "UPDATE entry SET vote=vote+1 WHERE id='$id'";
            if ($conn->multi_query($sql) === TRUE) {
            //header ("location: ../login?done=block");
        }
    }
}
        
            $sql = "UPDATE voters SET casted_vote= casted_vote+1, last_vote= '$id' WHERE email='$email'";
            if ($conn->multi_query($sql) === TRUE) {
          header ("location: ../exhibition#$id");
            }else{
                echo("");
            }

     
    //unset($_SESSION['refaddress']);
   // unset($_SESSION['refreferral']);

?>