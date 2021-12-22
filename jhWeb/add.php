<?php

include "connection.php";

session_start();
$cryptkey = $_SESSION['key'];


 $Note = $_POST['noteField'];
 

//  ORDER BY Id DESC LIMIT 1

// Check last ID 
  $checker =   "SELECT Id FROM data WHERE `cryptkey` = '$cryptkey'  ORDER BY Id DESC LIMIT 1 ;";
  $checkDone = mysqli_query($connection,$checker);
  if($checkDone){
    $idQuery = mysqli_fetch_assoc($checkDone);
    $lastID = (int)$idQuery['Id'];
    $lastID = ++$lastID;
  }else{
    echo "Query Never Ran";
  }




    
    $sql = "INSERT INTO `data` (`Id`, `notes`,`cryptkey`) VALUES ('$lastID', '$Note','$cryptkey');";
    $result = mysqli_query($connection,$sql);
    
    
    if($result){
    
      header('location: index.php');
    }else{
      echo "Not Submitted: " . mysqli_error($connection);
    }
    









?>