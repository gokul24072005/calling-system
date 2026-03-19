<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>VARNIKA MAKEOVER</title>
  <link rel=icon href="images/vkl.png">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    .content{
        background-image: url(images/gr.jpg);
        background-repeat: no-repeat;
        background-size: cover;
        width:100%;
        height:100%;
}
.img:has(:hover) .img-fluid-rounded:not(:hover)
{
        filter: grayscale(1)brightness(0.6);
        transform:scale(0.95);
}
.img-fluid-rounded{
  height:100%;
  width:100%;
  object-fit: cover;
}
.section-title {
      border-left: 5px solid #f8bbd0;
      padding-left: 15px;
      color: #e91e63;
      margin-bottom: 30px;
    }

    .review-box {
      background-image:"images/back.jpg";
      padding: 20px;
      border-left: 5px solid #ec407a;
      margin-bottom: 20px;
    }

  </style>

</head>
<body>
  <?php include_once ("header.php"); ?>
   <div class="container-fluid px-0 img">
  <div class="row gx-0">
    <div class="col-6 col-md-3">
      <img src="images/bgh.jpg" class="img-fluid-rounded" alt="Makeup Image 2">
    </div>
    <div class="col-6 col-md-3">
      <img src="images/img4.jpg" class="img-fluid-rounded" alt="Makeup Image 2">
    </div>
    <div class="col-6 col-md-3">
      <img src="images/img3.jpg" class="img-fluid-rounded" alt="Makeup Image 3">
    </div>
    <div class="col-6 col-md-3">
      <img src="images/img5.jpg" class="img-fluid-rounded" alt="Makeup Image 3">
    </div>
  </div>

  <!-- About -->
  <section class="py-5">
    <div class="container">
      <h2 class="section-title">About Us</h2>
      <p>Varnika Makeover is a trusted name in Tamil Nadu, specializing in bridal transformations since 2020. We bring elegance, precision, and personal care to every look we create—be it traditional or modern glam.</p>
      <a class="text-center my-4 btn btn-primary btn-lg me-auto" href="about.php">Explore more</a>
    </div>
  </section>

  <!-- Services -->
  <section class="py-5 px-0 bg-light">
    <div class="container">
      <h2 class="section-title">Our Services</h2>
      <div class="row">
        <div class="col-md-4 mb-3">
          <ul class="list-unstyled">
            <li>💄 Bridal Makeup (HD / Airbrush)</li>
            <li>🌸 Engagement & Reception Styling</li>
            <li>💛 Haldi & Mehndi Looks</li>
            <li>🎉 Party/Event Makeup</li>
            <li>📸 Pre-Wedding Shoots</li>
          </ul>
          <center>
          <a class="text-center my-4 btn btn-primary btn-lg me-auto" href="gal.php">View our gallery</a>
          </center>
        </div>
        <div class="col-md-8">
          <img src="images/bg.jpg" width=50% alt="Makeover Services" class="img-fluid rounded">
        </div>
      </div>
    </div>
  </section>

  <!-- Reviews -->
  <section class="py-5">
    <div class="container">
      <h2 class="section-title">Client Reviews</h2>
      <div class="row">
        <div class="col-md-6">
          <div class="review-box">
            “Absolutely flawless work on my wedding day. Varnika made me feel like royalty.”  
            <br><strong>- Swathi P.</strong>
            <br>⭐️⭐️⭐️⭐️⭐️
          </div>
        </div>
        <div class="col-md-6">
          <div class="review-box">
            “Booked her for haldi and reception – every look was picture perfect. Highly recommend!”  
            <br><strong>- Anusha M.</strong>
            <br>⭐️⭐️⭐️⭐️⭐️
          </div>
        </div>
      </div>
    </div>
  </section>

  
  <div class="container px-0">
    <div class="row">
      <div class="col-12 col-md-12">
        <video width=100% height=100% controls autoplay muted loop>
  <source src="images/makeup.mp4" type="video/mp4">
  Your browser does not support the video tag.
  </video>
  </div>
  </div>
  </div>
  <center>
  <a class="text-center text-white my-4 btn btn-danger btn-lg me-auto" href="contact.php">Book now</a><center>
  <?php include_once ("footer.php") ?>
  </body>
</html>
