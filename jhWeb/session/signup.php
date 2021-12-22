<?php


include "../connection.php";
session_start();
if(isset($_SESSION['loggedin'])){
  echo '<script>
        alert("What are you doing here?");
        window.location.href = "../index.php";
        
        </script>';
}

if(isset( $_POST['sub'])){

    $Name = (string)$_POST['nameF'];
    $Password = (string) $_POST['passF'];
    $hashed = md5($Password,FALSE);
    $cryptkey = md5($Password.$Name,FALSE);
    // Check if username already exists
    $checkName = "SELECT `username` FROM `users` WHERE `username` = '$Name'";
    $checkquery = mysqli_query($connection,$checkName);
    if($checkquery){
      echo '<script>
        alert("Username Is Not Available");
        window.location.href = "./signup.php";
        
        </script>';
    }

    $sql = "INSERT INTO `users` (`username`, `password`,`cryptkey`) VALUES ('$Name', '$hashed','$cryptkey');";
    $result = mysqli_query($connection,$sql);

    if($result){
      session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['key'] = $cryptkey;
        header('location: ../index.php');
    }else{
        echo "Sql Failed" . mysqli_error($connection);
    }
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>


<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid text-center">
          <a class="navbar-brand fs-3" href="#">Notes</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
           
                <span class="text-decoration-none fs-1 m-auto text-light">Magic Notes</span>
              
          </div>
        </div>
      </nav>








    <div class="container">
<h1 class="mt-3">Register</h1>
<form class="mt-4" method="post">
  <div class="mb-3">
    <label for="nameField" class="form-label">Username</label>
    <input type="text" name="nameF" class="form-control" id="nameField">
  </div>
  <div class="mb-3">
    <label for="passwordField" class="form-label">Password</label>
    <input type="password" name="passF" class="form-control" id="passwordField">
  </div>
  
  <button type="submit" name="sub" class="btn btn-primary">Submit</button>
</form>    

<p class="mt-4">Already have a  account ? <a href="./login.php">Click here to Login</a></p>

    </div>









<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>