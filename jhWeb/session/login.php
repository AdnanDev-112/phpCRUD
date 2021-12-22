
<?php


include "../connection.php";
session_start();
if(isset($_SESSION['loggedin'])){
  echo '<script>
        alert("Already Logged in!!");
        window.location.href = "../index.php";
        
        </script>';
}


if(isset( $_POST['sub'])){
  
  $Name = $_POST['nameF'];
  $Password = $_POST['passF'];
  

    $hashed = md5($Password,FALSE);
    
    $cryptkey = md5($Password.$Name,FALSE);

    $sql = "SELECT * FROM `users` WHERE `password` = '$hashed' AND `cryptkey` = '$cryptkey';";
    
    $result = mysqli_query($connection,$sql);
    $row_cnt = $result->num_rows;
    if($row_cnt == 1){
      print_r($row_cnt);
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['key'] = $cryptkey;
        header('location: ../index.php');
      }else{
        echo '<script>
        alert("Invalid Credentials");
        window.location.href = "./login.php";
        
        </script>';
      // header('location: ./login.php');
    

    }





}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  
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
<h1 class="mt-3">Login</h1>
<span id="resultDisplay"></span>
<form class="mt-4" method="post" >
  <div class="mb-3">
    <label for="userField" class="form-label">Username</label>
    <input type="name" name="nameF" class="form-control" id="userField">
    
  </div>
  <div class="mb-3">
    <label for="passwordField" class="form-label">Password</label>
    <input type="password" name="passF" class="form-control" id="passwordField">
    <div class="col-auto">
    <span class="form-text">
      Must be 8-12 characters long.
    </span>
  </div>
  </div>
  
  <button type="submit" name="sub" id="submForm" class="btn btn-primary">Submit</button>
</form>    
<p class="mt-4">Don't have an account yet? <a href="./signup.php">Click here</a></p>


    </div>






<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<script src="../login.js"></script>



</body>
</html>