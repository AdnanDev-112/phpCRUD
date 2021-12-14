<?php


include 'process.php';

//to get the id from the display
if(isset($_GET['deleteid'])){


    $id= $_GET['deleteid'];

    //using the delete query
    $sql = "DELETE FROM `data` WHERE `data`.`Id` = $id";
    $result = mysqli_query($conn,$sql);
    if($result)
{
   echo "Deleted  Sucessfully";
  header('location: display.php');
}else{

  die(mysqli_error($conn));
}

}







?>