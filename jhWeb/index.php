<!DOCTYPE html>
<?php
session_start();
include "connection.php";

if (!isset($_SESSION['loggedin'])) {
  echo "<script>alert('You need to Login first');
  window.location.href = \"./session/login.php\";
  </script>";
}

$cryptkey = $_SESSION['key'];
$UName = $_SESSION['Uname'];
$Font = $_SESSION['font'];

?>



<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Notes App</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="index.css">
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
            <a class="nav-link " aria-current="page" href="./home.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="./home.php">Notes</a>
          </li>


        </ul>
        <form class="d-flex">
          <button class="btn btn-outline-danger" type="submit"><a class="text-decoration-none text-light fs-3" href="./logout.php">Logout</a></button>
        </form>
      </div>
    </div>
  </nav>

  <div class="container my-4" id="item-container">
    <h1>Welcome <?= $UName ?> !</h1>
    <form method="post" action="add.php">
      <div class="card">
        <div class="card-body">
          <div class="form-group">
            <textarea placeholder="Add  📝" class="form-control" id="addTxt" name="noteField" rows="3" style="resize: none; font-family:'<?=$Font?>'; "></textarea>
            <span class="mt-2 " id="characterCount">500 / 500</span>
          </div>
          <button class="btn btn-primary mt-3 " id="addBtn" type="submit" >Add</button>
        </div>
      </div>
    </form>
    <hr>
    <!-- <h2>Your Notes</h2> -->
    <form action="./font.php" method="POST">
      <label for="nFont">Notes Font:</label>

      <select name="fonts" id="nFont">
        <option value=""></option>
        <option value="Segoe UI" style="font-family: 'Segoe UI';">Default</option>
        <option value="Poppins" style="font-family: 'Poppins';">Notes</option>
        <option value="Pushster" style="font-family: 'Pushster';">Notes</option>
        <option value="Lato" style="font-family: 'Lato';">Notes</option>
        <option value="Chewy" style="font-family: 'Chewy';">Notes</option>
        <option value="Archivo Black" style="font-family: 'Archivo Black';">Notes</option>
        <option value="Montserrat" style="font-family: 'Montserrat';">Notes</option>

      </select>
      <button class="btn btn-success m-2">Apply</button>
     
    </form>

    <hr>
    <div id="notes" class="row container-fluid">
      <!-- PhP to Dynamically Fetch Notes -->
      <table class="table" style="
table-layout: fixed;
word-wrap: break-word;
   ">
        <thead>
          <tr>
            <th scope="col" colspan="1">Sr no &nbsp; <i class="bi bi-list-ol"></i> </th>
            <th scope="col" colspan="2">Note &nbsp; 📓</th>
            <th scope="col" colspan="1">Task &nbsp; <i class="bi bi-cpu"></i></th>



          </tr>
        </thead>
        <tbody>
          <?php


          //Select Query

          $sql = "SELECT * from data WHERE `cryptkey` = '$cryptkey' ";
          $result = mysqli_query($connection, $sql);

          $orderIds = "SELECT `Id` from data WHERE `cryptkey`='$cryptkey' ";
          $Idquery = mysqli_query($connection, $orderIds);
          $idsort = mysqli_num_rows($Idquery);



          // Loop to display data from database
          if ($result) {
            $tempVari = 0;

            for ($i = 0; $i < $idsort; $i++) {

              $row = mysqli_fetch_assoc($result);
              $id = $row['Id'];
              $Notes = $row['notes'];
              $tempNumb = ++$tempVari;
              echo '<tr>
  <th scope="row">' . $tempNumb . '</th>
  <td colspan="2"  style="font-family:' . $Font . ';"><p class="userNotes" id="'.$tempNumb.'"> ' . $Notes . '<button class="copy-btn" onclick="copyText('.$tempNumb.')"><span class="copy-txt">Copy Note</span><i class="bi bi-clipboard"></i></button></p></td>
  
  <td>
  <button class="btn- btn-warning m-1"><a href="update.php?updateid=' . $id . '" class="text-decoration-none text-dark">Update</a></button>
  <button class="btn- btn-danger m-1"><a href="delete.php?deleteid=' . $id . '" class="text-decoration-none text-light trash-icon"><i class="bi bi-trash"></i></a></button>
  
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
