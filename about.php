<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>About</title>
  <link rel=icon href="images/vkl.png" type="image/x-icon">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="style.css">
  <link href="https://fonts.googleapis.com/css2?family=Marck+Script&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Cormorant+Upright:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Grenze+Gotisch:wght@100..900&display=swap" rel="stylesheet"/>
  <style>
    .circle-logo {
      width: 60px;
      height: 60px;
      border-radius: 50%;
      border: 2px solid black;
    }
    .navbar-links a {
      text-decoration: none;
      color:white;
      margin-right: 15px;
      font-weight: 500;
    }
    a:hover{
        color:yellow;
    }
    @media (max-width:778px) {
      .navbar-links {
        justify-content: start;
      }
    }
    .content{
        background-image: url(images/gr.jpg);
        background-repeat: no-repeat;
        background-size: cover;
        width:100%;
        height:100%;
    }
    .about{
        background-image:url(images/ab\ bg.jpg) ;
        background-repeat: no-repeat;
        background-size: cover;
    }
</style>

</head>
  <?php include_once ("header.php"); ?>
  <div class="container-fluid about">
  <div class="row text-center d-flex justify-content-center">
    <div class="col-12 col-md-6">

    <!-- Add image for intro -->
    <img src="images/vk.png" alt="Makeover tools" class="img-fluid rounded mb-3 mt-2" style="max-width: 400px;">

    <h5  style="font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">Your Beauty, Our Passion
      Founded in 2020, <br>Varnika Makeover has become a trusted name in Tamil Nadu’s beauty industry. 
      <br>With over 5 years of experience, we specialize in delivering elegant, skin-friendly, <br>and long-lasting looks for every occasion — from weddings and parties to photoshoots and festive events.
    </h5><br><br>

    <h4>🛍️ Premium Brands, Trusted Results</h4><br><br>

    <!-- Add image for brands -->
    <img src="images/brands.jpg" alt="Top makeup brands" class="img-fluid mb-3 img-rounded p-3" style="max-width: 400px;border-radius:20%;">

    <h5 class="mt-2 text-black" style="font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">At Varnika Makeover, quality is our promise. We use only branded, dermatologist-tested, and internationally trusted products to ensure your skin stays healthy and<br> your look stays flawless.
      We work with top-tier beauty brands including:<br><br></h5>
<p style=" align-items-left">
  <ol>
      ✨MAC<br>✨Huda Beauty<br>✨NARS<br>✨Bobbi Brown<br>✨Charlotte Tilbury<br>✨Fenty Beauty
      <br>✨Anastasia Beverly Hills<br>✨Maybelline & L'Oréal (for soft glam options)
</ol>
    <br><br></p>
    <h4 >🧼 Hygiene & Safety First</h4><br><br>

    <!-- Add image for hygiene -->
    <img src="images/brush.jpg" class="img-fluid p-2 mb-2 img-rounded" alt="Sanitized tools" style="width: 400px;  height:300px;">

    <h5 class="mt-2"  style="font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">We follow strict hygiene practices to keep our tools clean and safe:<br><br>
      • Every brush is sanitized before use<br>
      • Use of disposable mascara wands, sponges, and applicators<br>
      • Skin prep done with non-comedogenic and hypoallergenic products<br>
      • Personalized makeup kits for bridal clients on request
    </h5><br>
  </div>
</div>
    </div>
  </div></div>

  <?php include_once ("footer.php"); ?>
</body>
        