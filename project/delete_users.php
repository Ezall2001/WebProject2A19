<?php

include 'config.php';
$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM `user_form`  WHERE id = '$id'") or die('query failed');
header('location:view_user.php');
