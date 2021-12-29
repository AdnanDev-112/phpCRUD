<?php

include "connection.php";
session_start();
if (isset($_SESSION['loggedin'])) {
  $Name  =  $_SESSION['Uname'];
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">


  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <title>Home</title>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Shizuru&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Open+Sans&display=swap');


    nav {
      font-family: 'Shizuru', cursive;
      font-size: 2.2rem;
    }

    .carousel-item {
      width: 100%;
      height: 31rem;
      background-color: black;
    }

    .overlay-image {
      position: absolute;
      bottom: 0;
      left: 0;
      right: 0;
      top: 0;
      background-position: center;
      background-size: cover;
      opacity: 0.5;
    }

    #logo {
      height: 4.3rem;
      width: 7.1rem;
    }
    .action-btn{
      font-family: 'Roboto', sans-serif;

    }
    .lead{
      font-family: 'Open Sans', sans-serif;
    }
  </style>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-black">
    <div class="container-fluid">
      <a class="navbar-brand" href="#"><img src="./logo.png" id="logo" alt=""></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="./home.php">Home</a>
          </li>
          <?php
          if (isset($_SESSION['loggedin'])) {
            echo '<li class="nav-item">
          <a class="nav-link" href="./index.php">Notes</a>
        </li>';
          } else {
            echo ' <li class="nav-item">
          <a class="nav-link" href="./session/login.php">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./session/signup.php">Register</a>
        </li>';
          }



          ?>


        </ul>
      </div>
    </div>
  </nav>


  <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <div class="overlay-image" style="background-image: url('https://source.unsplash.com/1920x1080/?note');"></div>
        <div class="carousel-caption  d-block">
          <?php
          if (isset($_SESSION['loggedin'])) {
            echo '<h5 class="fs-1">What are you waiting for '
              . $Name . '!</h5>
          <a href="./index.php" class="btn btn-primary action-btn">Take Notes</a>
          ';
          } else {
            echo '  <h5 class="fs-1">Start Taking Notes Today!</h5>
          <a href="./session/signup.php" class="btn action-btn btn-primary">Join Now!</a>';
          }



          ?>

        </div>
      </div>
      <div class="carousel-item">
        <div class="overlay-image" style="background-image: url('https://source.unsplash.com/1920x1080/?notes');"></div>


        <div class="carousel-caption  d-block">
          <h5 class="fs-1">Got something on mind?<br> Write it down!</h5>
        </div>
      </div>
      <div class="carousel-item">
        <div class="overlay-image" style="background-image: url('https://source.unsplash.com/1920x1080/?notetaking');"></div>


        <div class="carousel-caption  d-block">
          <h5 class="fs-1">Don't have a Pen? </h5>
          <p class="fs-3">No Problem! Use Twinkers</p>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>

  <div class="container marketing">


    <hr class="featurette-divider">

    <div class="row featurette">
      <div class="col-md-7">
        <h2 class="featurette-heading">Easy to use Interface. <span class="text-muted">It’ll blow your mind.</span></h2>
        <p class="lead"> Add notes or Delete them with the click of a button!!!</p>
      </div>
      <div class="col-md-5">
        <img src="https://source.unsplash.com/1920x1080/?note,pen" class="d-block rounded w-100" alt="">
      </div>
    </div>

    <hr class="featurette-divider">

    <div class="row featurette">
      <div class="col-md-7 order-md-2">
        <h2 class="featurette-heading">Made an Error? No problem update the notes. <span class="text-muted">Check it out.</span></h2>
        <p class="lead">Update the notes at your convineince in just One Click !!</p>
      </div>
      <div class="col-md-5 order-md-1">
        <img src="https://source.unsplash.com/1920x1080/?book,pen" class="d-block rounded w-100" alt="">
      </div>
    </div>

    <hr class="featurette-divider">

    <div class="row featurette">
      <div class="col-md-7">
        <h2 class="featurette-heading">Secure and Safe to use. <span class="text-muted">Checkmate.</span></h2>
        <p class="lead">Your notes are saved in a secured place .</p>
      </div>
      <div class="col-md-5">
        <img src="https://source.unsplash.com/1920x1080/?pen" class="d-block rounded w-100" alt="">
      </div>
    </div>

    <hr class="featurette-divider">


  </div>


  <footer class="">
    <div class="text-center">
      <span class="m-5 p-4"> © 2021 TwinKers Copyright</span>
    </div>

  </footer>



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>