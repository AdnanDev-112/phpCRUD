<?php


include "../connection.php";
session_start();
if (isset($_SESSION['loggedin'])) {
  echo '<script>
        alert("What are you doing here?");
        window.location.href = "../index.php";
        
        </script>';
}

if (isset($_POST['sub'])) {




  $Name = (string)$_POST['nameF'];
  $Email = (string)$_POST['emailF'];
  $Password = (string) $_POST['passF'];
  $Font = "Segoe UI";



  $hashed = md5($Password, FALSE);
  $cryptkey = md5($Password . $Name, FALSE);
  // Check if username already exists
  $checkName = "SELECT `username` FROM `users` WHERE `username` = '$Name'";
  $checkquery = mysqli_query($connection, $checkName);
  if ($checkquery) {
    echo '<script>
        alert("Username Is Not Available");
        window.location.href = "./signup.php";
        
        </script>';
  }

  $sql = "INSERT INTO `users` (`username`,`email`, `password`,`cryptkey`,`font`) VALUES ('$Name','$Email', '$hashed','$cryptkey','$Font');";
  $result = mysqli_query($connection, $sql);

  if ($result) {
    session_start();
    $_SESSION['loggedin'] = true;
    $_SESSION['key'] = $cryptkey;
    $_SESSION['Uname'] = $Name;
    $_SESSION['font'] = $Font;
    header('location: ../index.php');
  } else {
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
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">

  <style>
    @import url('https://fonts.googleapis.com/css2?family=Shizuru&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');

    body{
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
      left: 93%;
      bottom: 2.5rem;
      border: none;
      cursor: pointer;
    }

    #logo {
      height: 4.3rem;
      width: 7.1rem;
    }
    button , .title{
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
            <a class="nav-link" href="./login.php">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="./signup.php">Register</a>
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
              </svg><span class=" m-5 title fs-1">Register</span>
              <form method="post">
                <input type="text" name="nameF" id="userField" class="form-control my-4 py-2" placeholder="Username" />
                <input type="email" name="emailF" id="emailField" class="form-control my-4 py-2" placeholder="Email" />
                <div>
                  <input type="password" autocomplete="on" name="passF" id="passwordField" class="form-control mt-4 py-2 mb-2" placeholder="Password" /><i class="bi bi-eye-slash" id="togglePassword"> </i>
                </div>
                <span class="form-text " id="displayer">Must be 6-10 characters long.</span>
                <div class="text-center mt-4">
                  <button type="submit" name="sub" id="submForm" class="btn btn-primary">Register</button>
                  <a href="./login.php" class="nav-link">Have an Account ?</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>






  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  <script src="../pass.js"></script>
  <script src="../login.js"></script>
  <script src="../signup.js"></script>


</body>

</html>