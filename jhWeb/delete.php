<?php
session_start();
$cryptkey = $_SESSION['key'];

include 'connection.php';

//Get the Id to Delete
if(isset($_GET['deleteid'])){

    $id= $_GET['deleteid'];

    //Delete Query
    $sql = "DELETE FROM `data` WHERE `Id` = $id AND `cryptkey` = '$cryptkey'";
    $result = mysqli_query($connection ,$sql);





    if($result){
   echo "Deleted  Sucessfully";
     header('location: index.php');

  

 }
  }else{
     die(mysqli_error($connection));
}



?>