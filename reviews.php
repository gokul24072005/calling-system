<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reviews</title>
  <link rel=icon href="images/vkl.png" type="image/x-icon">
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
    .reviews{
       background-color:lightgrey;
    }
    .review{
      margin-top:50px;
    }
     .review:hover {
        transform: translateY(-8px);
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.53);
    }
  </style>

</head>
<body>

<?php include_once ("header.php"); ?>

  <div class="container-fluid pb-5 reviews">
  <div class="row justify-content-center text-center">
             <h1 class="pt-3">Testimonials</h1>
              <h3 style="font-family: cursive;">What do our clients say ?</h3>

    <!--Card 1 -->
    <div class="col-md-3 col-12 m-3">
      <div class="card border review border-2 border-dark" style="width: 100%;">
        <div class="card-body">
          <h4 class="card-title">Priya.M 👰 Bridal Client</h4>
          <p class="card-text">
            "Varnika gave me my dream bridal look! From the flawless HD makeup to the perfect saree draping, I felt so beautiful and confident walking down the aisle."
            <br>⭐️⭐️⭐️⭐️⭐️
          </p>
        </div>
      </div>
    </div>

    <!--Card 2 -->
    <div class="col-md-3 col-12 m-3">
      <div class="card review border border-2 border-dark" style="width: 100%;">
        <div class="card-body">
          <h4 class="card-title">Aarthi.S 💄 Event Client</h4>
          <p class="card-text">
            "She did my engagement, wedding, and reception looks — each one unique and exactly what I wanted. Varnika listens, and delivers beyond expectations!"
            <br>⭐️⭐️⭐️⭐️⭐️
          </p>
        </div>
      </div>
    </div>

    <!-- Card 3 -->
    <div class="col-md-3 m-3">
      <div class="card review border border-2 border-dark" style="width: 100%;">
        <div class="card-body">
          <h4 class="card-title">Sneha.V 🌸 Photoshoot Client</h4>
          <p class="card-text">
            "The makeup stayed flawless under the lights, and the styling brought out my best features. Her calm nature and eye detailing are next-level!"
            <br>⭐️⭐️⭐️⭐️⭐️
          </p>
        </div>
      </div>
    </div>

    
    <!--Card 4 -->
    <div class="col-md-3 col-12 m-3">
      <div class="card review  border border-2 border-dark" style="width: 100%;">
        <div class="card-body">
          <h4 class="card-title">Kaviya.R 💐 Saree drapingClient</h4>
          <p class="card-text">
             "I was worried about my heavy kanjeevaram, but Varnika handled it effortlessly. I got so many compliments at the wedding!"
            <br>⭐️⭐️⭐️⭐️⭐️
          </p>
        </div>
      </div>
    </div>

    
    <!--Card 5 -->
    <div class="col-md-3 col-12 m-3">
      <div class="card review  border border-2 border-dark" style="width: 100%;">
        <div class="card-body">
          <h4 class="card-title">Anu.A 💄 Reception Client</h4>
          <p class="card-text">
            "As someone who rarely wears makeup, I was nervous. But Varnika made me feel so comfortable and confident. The final look was flawless!
            <br>⭐️⭐️⭐️⭐️⭐️
          </p>
        </div>
      </div>
    </div>

      
    <!--Card 6 -->
    <div class="col-md-3 col-12 m-3">
      <div class="card review border border-2 border-dark" style="width: 100%;">
        <div class="card-body">
          <h4 class="card-title">Pooja D. <br>🌼 Haldi Client</h4>
          <p class="card-text">
            "I booked her for my Haldi and Mehndi functions — natural, dewy, and so me! Varnika’s hands are truly magical.<br> Got so many compliments!"
              <br>⭐️⭐️⭐️⭐️⭐️
          </p>
        </div>
      </div>
    </div>
  </div>
</div>
<?php include_once ("footer.php"); ?>
  <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
