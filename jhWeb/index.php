<!DOCTYPE html>
<?php
session_start();
include "connection.php";

if(!isset($_SESSION['loggedin'])){
  echo "<script>alert('You need to Login first');
  window.location.href = \"./session/login.php\";
  </script>";
// header('location: ./session/login.php');
}

$cryptkey = $_SESSION['key'];


?>



<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Notes App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
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
           
                <span class="text-decoration-none fs-1 m-auto text-light">Magic Notes</span>
                <form class="d-flex">
        
        <button class="btn btn-outline-danger " type="button"><a class="text-decoration-none text-light"  href="./logout.php">Logout</a></button>
      </form>
          </div>
        </div>
      </nav>

    <div class="container my-3" id="item-container">
        <h1>Welcome To Magic Notes</h1>
        <form method="post" action="add.php">
        <div class="card">
            <div class="card-body" >
                <h5 class="card-title ">Add a note</h5>
                <div class="form-group">
                    <textarea class="form-control" id="addTxt" name="noteField" rows="3" style="resize: none; " ></textarea>
                    <span class="mt-2 text-muted" id="characterCount" >500 / 500</span>
                </div>
                <button class="btn btn-primary mt-3 " id="addBtn" type="submit">Add Data</button>
            </div>
        </div>
        </form>
        <hr>
        <h1>Your Notes</h1>
        <hr>
        <div id="notes" class="row container-fluid">
<!-- PhP to Dynamically Fetch Notes -->
<table class="table" style="
table-layout: fixed;
word-wrap: break-word;
   ">
  <thead>
    <tr>
      <th scope="col" colspan="1">Sr no</th>
      <th scope="col" colspan="2" >Note</th>
      <th scope="col" colspan="1">Function</th>
      
      
    
    </tr>
  </thead>
  <tbody>
<?php


//Select Query

$sql = "SELECT * from data WHERE `cryptkey` = '$cryptkey' ";
$result = mysqli_query($connection,$sql);



//Using While Loop to display data from database
if($result)
{
 while($row = mysqli_fetch_assoc($result)){
//id of the database
    $id = $row['Id'];
    $Notes = $row['notes'];
    echo '<tr>
    <th scope="row">'.$id.'</th>
    <td colspan="2">'.$Notes.'</td>
    
    <td>
    <button class="btn- btn-warning"><a href="update.php?updateid='.$id.'" class="text-decoration-none text-dark">Update</a></button>
    <button class="btn- btn-danger"><a href="delete.php?deleteid='.$id.'" class="text-decoration-none text-light">Delete</a></button>
    
    </td>
  </tr>';
 }

}


?>




    
  </tbody>
</table>









        </div>
    </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="script.js"></script>
 
  </body>

</html>
