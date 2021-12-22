<!DOCTYPE html>
<?php
session_start();

include "connection.php";
$cryptkey = $_SESSION['key'];


$id = $_GET['updateid'];

//To Display data in the fields
$detailsQuery = "SELECT * from data WHERE Id='$id' AND `cryptkey` = '$cryptkey'  ;";
$reslt = mysqli_query($connection,$detailsQuery);
$row = mysqli_fetch_assoc($reslt);
$id = $row['Id'];
$Note = $row['notes'];






if(isset($_POST['sub'])){
    $RecievedNote = $_POST['noteField'];

//   Update Query
    $sql = "UPDATE `data` SET notes='$RecievedNote'   WHERE `Id`='$id' AND `cryptkey` = '$cryptkey' ;";
    $result = mysqli_query($connection,$sql);
    
    
    if($result){
     header('location: index.php');
    }else{
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

</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid text-center">
          <a class="navbar-brand" href="index.php">Notes</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              
              <li class="nav-item text-center">
                  </li>
                </ul>
                <span class="text-decoration-none fs-1 m-auto text-light">Magic Notes</span>
          </div>
        </div>
      </nav>

      <div class="container my-3">
        <h1>Update Note</h1>
        <form method="post">
        <div class="card">
            <div class="card-body">
                
                <div class="form-group">
                    <textarea class="form-control" id="addTxt" name="noteField" rows="3" style="resize: none;" ><?=$Note?></textarea>
                    <span class="mt-2 text-muted" id="characterCount"></span>
                </div>
                <button class="btn btn-primary mt-3" id="addBtn" name="sub" type="submit">Update</button>
            </div>
        </div>
        </form>
      </div>






<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="updateScript.js"></script>
</body>
</html>