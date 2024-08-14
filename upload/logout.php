<?php

session_start();
if(session_destroy()) // Destroying All Sessions
{
$msg="You Logged Out";
header("Location: exhibition?msg=$msg"); // Redirecting To Home Page
}

?>
