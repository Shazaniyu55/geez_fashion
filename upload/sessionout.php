<?php

session_start();
if(session_destroy()) // Destroying All Sessions
{
$msg="You Logged Out";
header("Location: model"); // Redirecting To Home Page
}

?>
