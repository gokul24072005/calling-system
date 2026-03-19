<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <style>
        .circle-logo {
      width: 60px;
      height: 60px;
      border-radius: 50%;
      border: 2px solid black;
    }
    @media (max-width: 768px) {
  .navbar-collapse {
    background-color:grey; 
    width: 15%;
    height: 100vh;
    position: fixed;
    top: 0;
    right: 0;
    padding: 2rem 1rem;
    z-index: 999;
}
</style>
</head>
<body>
    <!---Header-->
<nav class="navbar navbar-expand-lg  navbar-expand-md navbar-dark" style="background-color:#be0e3a;">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
      <img src="images/vkl.png" alt="Logo" class="circle-logo">
    </a>
    <h5 class="text-white me-auto">VARNIKA <br>MAKEOVER</h5>
    <p class="text-white ms-5 mt-3 me-auto">Where Beauty Begins & Memory Lasts</p>
    <button class="navbar-toggler ms-sm-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse mt-sm-0 mt-md-0 justify-content-end" id="navbarNav" style="font-family:cursive;">
      <ul class="navbar-nav">
        <li class="nav-item" >
          <a class="nav-link active" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="about.php">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="services.php">Services</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="gal.php">Gallery</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="reviews.php">Reviews</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contact.php">Contact</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<script src="js/bootstrap.bundle.min.js"></script>
</body>
