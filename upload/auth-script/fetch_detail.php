<?php
session_start();
///////////////////////////////////////
//////////////////////////////////////
//////////////////////////////////////
//////////////////////////////////////
if ( isset( $_SESSION['id'] ) ) 
$page_id= ($_SESSION['id']);

if(empty($page_id)){
    $page_id="";
}

    $sql = "SELECT * FROM users WHERE id='$page_id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0)
     while($row = $result->fetch_assoc()) {
    $id = $row["id"];
    $name = $row["name"];
    $email = $row["email"];
    $business = $row["business_name"];
     }
   
?>