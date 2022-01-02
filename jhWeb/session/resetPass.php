<?php
session_start();
$name = $_SESSION['Tn'];
$tempK = $_SESSION['Tc'];


include "../connection.php";
if (isset($_SESSION['loggedin'])) {
    unset($_SESSION['Tn']);
    unset($_SESSION['Tc']);
    echo '<script>
          alert("Not Allowed!");
          window.location.href = "../index.php";
          
          </script>';
  }
  if(!isset($_SESSION['Tn']) || !isset($_SESSION['Tc'])){
    echo '<script>
          alert("Not Allowed!");
          window.location.href = "../home.php";
          
          </script>';
  }
  
if(isset($_GET['token'])){
    $token = $_GET['token'];
    $checkToken = "SELECT `token` FROM `users` WHERE `token` = '$token' ";

    if(mysqli_query($connection,$checkToken)->num_rows == 0){
        unset($_SESSION['Tn']);
        unset($_SESSION['Tc']);
        echo '<script>
        alert("Not Allowed!");
        window.location.href = "../home.php";
        
        </script>';
    }
}
  if (isset($_POST['sub'])) {
      $Password = $_POST['passF'];

    //   Update Password
    
    $hashed = md5($Password, FALSE);
    $cryptkey = md5($Password . $name,FALSE);
    // Remove FK Check
    $setFK = "SET FOREIGN_KEY_CHECKS = 0";
    mysqli_query($connection,$setFK);
    // Queries
    $setPass = "UPDATE `users` SET `password`= '$hashed', `cryptkey` = '$cryptkey' WHERE `token`= '$token'";
    $setc =  "UPDATE `data` SET `cryptkey` = '$cryptkey' WHERE `cryptkey` = '$tempK';";
    $setStatus = mysqli_query($connection,$setPass) or die(mysqli_error($connection));
    $setC = mysqli_query($connection,$setc) or die(mysqli_error($connection));
    if($setStatus && $setC){
        $nullToken = "UPDATE `users` SET `token` = '' WHERE `token` = '$token';";
        $result = mysqli_query($connection,$nullToken);
        if($result){
            unset($_SESSION['Tn']);
            unset($_SESSION['Tc']);
            $resetFK ="SET FOREIGN_KEY_CHECKS = 1";
            mysqli_query($connection,$resetFK);
            echo '<script>
            alert("Password Reset Successfull");
            window.location.href = "./login.php";
            </script>';
        }
    }

  }



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset</title> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
  
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Shizuru&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');

    body {
      font-size: 1.1rem;
      background-color: rgb(255, 245, 225);
    }

    nav {
      font-family: 'Shizuru', cursive;
      font-size: 2.2rem;
    }

    .warnings {
      color: red;

    }

    i {
      position: relative;
      left: 90%;
      bottom: 3.2rem;
      border: none;
      cursor: pointer;
    }
    .secondLi {
      bottom: 2.3rem;
    }

    #logo {
      height: 4.3rem;
      width: 7.1rem;
    }

    button,
    .title {
      font-family: 'Roboto', sans-serif;
    }
  </style>
</head>
<body>
    
  <nav class="navbar navbar-expand-lg navbar-dark bg-black">
    <div class="container-fluid">
      <a class="navbar-brand" href="../home.php"><img src="../logo.png" id="logo" alt=""></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link " aria-current="page" href="../home.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="./login.php">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./signup.php">Register</a>
          </li>

        </ul>
      </div>
    </div>
  </nav>

  <section>
    <div class="container mt-5 pt-5">
      <div class="row">
        <div class="col-12 col-sm-7 col-md-6 m-auto">
          <div class="card border-0 shadow">
            <div class="card-body">
              <svg class="mx-auto my-3" xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
              </svg><span class=" m-5 title fs-1">Reset</span>
              <form method="post">
                <h3 class="mt-2" >Enter new Password</h3>
                <input type="password" autocomplete="off" name="passF" id="passwordField" class="form-control my-4 py-2 passBox" placeholder="Password" /><i class="bi bi-eye-slash" id="togglePassword1"> </i>
                <input type="password" autocomplete="off" name="cpassF" id="cPasswordField" class="form-control my-1 py-2 passBox" placeholder="Confirm Password" /><i class="secondLi bi bi-eye-slash" id="togglePassword2"> </i>
                <span class="form-text" id="displayer">&nbsp;</span>
                <div class="text-center mt-3">
                  <button type="submit" name="sub" id="submForm" class="btn btn-primary">Reset</button>
                  <a href="./signup.php" class="nav-link">Don't have an Account yet? </a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <script src="./Resetscript.js"></script>
  <script src="./toggle.js"></script>
</body>
</html>