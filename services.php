<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Services</title>
  <link rel=icon href="images/vkl.png" type="image/x-icon">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
 
    .service-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.53);
    }
    .card-title {
        color: #d63384; /* Soft pink accent */
    }
    .services{
  background-image:"images/bg.png";
    }
</style>

</head>
<body>
    <?php include_once ("header.php") ?>
    <div class="section p-0">
  <div class="container">
    <h2 class="text-center  mb-4 fw-bold mb-5 pt-5">✨ Our Signature Services ✨</h2>
    <div class="row">
      
      <!-- Service 1 -->
      <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-3 mb-4">
        <div class="card service-card h-100 w-60 border border-3 p-3">
          <img src="images/bc.jpg" class="card-img-top" alt="bridal">
          <div class="card-body text-center">
            <h4 class="card-title fw-semibold">👰 Bridal Makeover</h4>
            <p class="card-text text-muted">HD & Airbrush bridal makeup, saree draping, and long-lasting finish for your big day.</p>
          </div>
        </div>
      </div>

      
      <!-- Service 2 -->
      <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-3 col-xl-3 mb-4">
        <div class="card service-card h-100 border border-3  p-3">
          <img src="images/b2.jpg" class="card-img-top" alt="party">
          <div class="card-body text-center">
            <h4 class="card-title fw-semibold">💄 Party Makeup</h4>
            <p class="card-text text-muted">Get party-ready with glowy skin, bold eyes, and picture-perfect lips for any celebration.</p>
          </div>
        </div>
      </div>

      <!-- Service 3 -->
      <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-3 mb-4">
        <div class="card service-card h-100 border border-3  p-3">
          <img src="images/photo.jpg" height=280; class="card-img-top" alt="photoshoot">
          <div class="card-body text-center">
            <h4 class="card-title fw-semibold">📸 Photoshoot Glam</h4>
            <p class="card-text text-muted">Flawless, camera-ready makeup for your indoor/outdoor photo sessions or reels.</p>
          </div>
        </div>
      </div>

      <!-- Service 4 -->
      <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-3 mb-4">
        <div class="card service-card h-100 border border-3 p-3">
          <img src="images/haldi.jpg" class="card-img-top" alt="haldi">
          <div class="card-body text-center">
            <h4 class="card-title fw-semibold">👰 Haldi Look</h4>
            <p class="card-text text-muted">Dewy makeup with golden glow, waterproof finish, and floral hair style. Bright and natural for your haldi ceremony.</p>
          </div>
        </div>
      </div>

      <!-- Service 5 -->
      <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-3 mb-4">
        <div class="card service-card h-100 border border-3  p-3">
        <img src="images/mehndi.jpg" class="card-img-top" alt="mehndi">
        <div class="card-body text-center">
            <h4 class="card-title fw-semibold">💅 Mehndi</h4>
            <p class="card-text text-muted">Whether you love bold colors or soft elegance, we tailor your Mehndi look to match your outfit, personality, and comfort.</p>
          </div>
        </div>
      </div>

      <!-- Service 6 -->
      <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-3 mb-4">
        <div class="card service-card h-100 border border-3 p-3">
          <img src="images/pic.jpg"height=350; class="card-img-top" alt="class">
          <div class="card-body text-center">
            <h4 class="card-title fw-semibold">🎓 Makeup Classes</h4>
            <p class="card-text text-muted">1:1 and group training sessions for beginners and aspiring makeup artists.</p>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

      </div>
        </div>
      </div>
<?php include_once ("footer.php") ?>
</body>