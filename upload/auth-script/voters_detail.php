<?php
///////////////////////////////////////
//////////////////////////////////////
//////////////////////////////////////
//////////////////////////////////////
if ( isset( $_SESSION['Voteid'] ) ) 
$voter_id= ($_SESSION['Voteid']);
if(empty($voter_id)){
    $voter_id="";
}

    $sql = "SELECT * FROM voters WHERE id='$voter_id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0)
     while($row = $result->fetch_assoc()) {
    $id = $row["id"];
    $name = $row["name"];
    $email = $row["email"];
    $last_vote = $row["last_vote"];
     }
   
    
?>