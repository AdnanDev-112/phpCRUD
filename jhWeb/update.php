<!DOCTYPE html>
<?php
session_start();

include "connection.php";
$cryptkey = $_SESSION['key'];


$id = $_GET['updateid'];

//To Display data in the fields
$detailsQuery = "SELECT * from data WHERE Id='$id' AND `cryptkey` = '$cryptkey'  ;";
$reslt = mysqli_query($connection, $detailsQuery);
$row = mysqli_fetch_assoc($reslt);
$id = $row['Id'];
$Note = $row['notes'];






if (isset($_POST['sub'])) {
  $RecievedNote = $_POST['noteField'];

  //   Update Query
  $sql = "UPDATE `data` SET notes='$RecievedNote'   WHERE `Id`='$id' AND `cryptkey` = '$cryptkey' ;";
  $result = mysqli_query($connection, $sql);


  if ($result) {
    header('location: index.php');
  } else {
    echo "Not Submitted: " . mysqli_error($connection);
  }
}




?>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Shizuru&display=swap');
  @import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');


    nav {
      font-family: 'Shizuru', cursive;
      font-size: 2.2rem;
    }

    #logo {
      height: 4.3rem;
      width: 7.1rem;
    }

    .warnings {
      color: red;

    }
    .container button {
    font-family: 'Roboto', sans-serif;
  }
  </style>
</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-dark bg-black">
    <div class="container-fluid">
      <a class="navbar-brand" href="./home.php"><img src="./logo.png" id="logo" alt=""></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="./home.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./index.php">Notes</a>
          </li>


        </ul>
        <form class="d-flex">

          <button class="btn btn-outline-danger" type="submit"><a class="text-decoration-none text-light fs-3" href="./logout.php">Logout</a></button>
        </form>
      </div>
    </div>
  </nav>

  <div class="container my-3">
    <h1>Update Note</h1>
    <form method="post">
      <div class="card">
        <div class="card-body">

          <div class="form-group">
            <textarea class="form-control" id="addTxt" name="noteField" rows="3" style="resize: none;"><?= $Note ?></textarea>
            <span class="mt-2 text-muted" id="characterCount"></span>
          </div>
          <button class="btn btn-primary mt-3" id="addBtn" name="sub" type="submit">Update</button>
        </div>
      </div>
    </form>
  </div>


  <footer class="">
    <div class="text-center">
      <span class="m-5 p-4"> © 2021 EasyNotes Copyright</span>
    </div>

  </footer>



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="updateScript.js"></script>
</body>

</html>