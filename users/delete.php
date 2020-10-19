<?php
include('../connection.php');
$ss = $_GET['id'];
$getdata = "DELETE FROM `users` WHERE id='$ss'";
$result = $db->query($getdata);
header("location:index.php")
?>
