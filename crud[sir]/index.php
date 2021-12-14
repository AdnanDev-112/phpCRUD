<!doctype html>
<?php


//connect the php file
include 'process.php';

//checking the value of the database and inserting the data from the form
// if(isset($_POST['sub'])){
//   $Name = $_POST['fname'];
//   $Location = $_POST['locate'];

// $sql = "INSERT INTO `data` (`Id`, `name`, `location`) VALUES ('', '$Name', '$Location')";
// $result = mysqli_query($conn,$sql);


// if($result)
// {
//   echo "Submitted Sucessfully";
  // header('location: display.php');
// }else{

//   echo "not Submitted";
// }

// }

if(isset($_POST['sub'])){
$Name = $_POST['fname'];
$Location = $_POST['locate'];

$sql = "INSERT INTO `data` (`Id`, `name`, `location`) VALUES ('', '$Name', '$Location');";
$result = mysqli_query($conn,$sql);


if($result){

  echo "Submitted";
  header('location: display.php');
}else{
  echo "Not Submitted";
}

}





?>


<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
   <center><h1>Register</h1></center> 


   

<div class="container">

<form method="post">
  <div class="col-md-4 position-relative">
    <label for="validationTooltip01" class="form-label">First name</label>
    <input type="text" class="form-control" name="fname" id="validationTooltip01" required>
    
  </div>
  <div class="col-md-4 position-relative">
    <label for="validationTooltip02" class="form-label">Location</label>
    <input type="text" name="locate" class="form-control" id="validationTooltip02"  required>
    
  </div><br><br>
  
  <div class="col-12">
    <button class="btn btn-primary" type="submit" name="sub">Submit form</button>
  </div>
</form>

</div>


  


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

   
  </body>
</html>