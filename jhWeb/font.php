<?php


include "connection.php";

session_start();
$cryptkey = $_SESSION['key'];

$newFont = $_POST['fonts'];

//   Update Query
$sql = "UPDATE `users` SET font='$newFont'   WHERE `cryptkey` = '$cryptkey' ;";
$result = mysqli_query($connection, $sql);

$_SESSION['font'] = $newFont;

header('location: ./index.php');


?>