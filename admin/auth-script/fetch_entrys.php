<?php
$sql = "SELECT * FROM users ORDER BY ID DESC";
$result = $conn->query($sql);
$users = mysqli_fetch_all($result, MYSQLI_ASSOC);
mysqli_free_result($result);


$sql = "SELECT * FROM entry ORDER BY vote DESC";
$result = $conn->query($sql);
$entrys = mysqli_fetch_all($result, MYSQLI_ASSOC);
mysqli_free_result($result);


$sql = "SELECT * FROM voters ORDER BY casted_vote DESC";
$result = $conn->query($sql);
$voters = mysqli_fetch_all($result, MYSQLI_ASSOC);
mysqli_free_result($result);

$sql = "SELECT * FROM models ORDER BY paid DESC";
$result = $conn->query($sql);
$models = mysqli_fetch_all($result, MYSQLI_ASSOC);
mysqli_free_result($result);

?>