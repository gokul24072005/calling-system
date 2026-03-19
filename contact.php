<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact</title>
  <link rel=icon href="images/vkl.png" type="image/x-icon">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

</head>
    <?php include_once ("header.php"); ?>
<body style="background-color: #fffaf7;">

  <div class="container py-5">
    <div class="text-center mb-5">
      <h2 class="fw-bold">💌 Book Your Look</h2>
      <p class="text-muted">Let us know your dream look — we'll make it happen!</p>
    </div>

    <div class="row g-4">
      <!-- Contact Form -->
      <div class="col-md-6">
        <form>
          <div class="mb-3">
            <label for="name" class="form-label">Name *</label>
            <input type="text" class="form-control" id="name" placeholder="Enter your name" required>
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email id *</label>
            <input type="text" class="form-control" id="email" placeholder="Enter your email id" required>
          </div>
          <div class="mb-3">
            <label for="phone" class="form-label">Mobile Number *</label>
            <input type="tel" class="form-control" id="phone" placeholder="Enter your number" required>
          </div>
          <div class="mb-3">
            <label for="date" class="form-label">Preferred Date</label>
            <input type="date" class="form-control" id="date" min="<?php echo date('Y-m-d');?>" required>
          </div>
          <div class="mb-3">
            <label for="service" class="form-label">Service Type</label>
            <select class="form-select" id="service">
              <option selected disabled>Choose...</option>
              <option>Bridal Makeup</option>
              <option>Reception Look</option>
              <option>Haldi Ceremony</option>
              <option>Mehndi Event</option>
              <option>Photoshoot Look</option>
              <option>Casual/Party Glam</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="message" class="form-label">Message</label>
            <textarea class="form-control" id="message" rows="3" placeholder="Tell us your style or preferences..."></textarea>
          </div>
          <button type="submit" class="btn btn-dark w-100">Submit Request</button>
          
        </form>
      </div>

       <!-- Contact Info -->
      <div class="col-md-6">
        <div class="p-4 rounded shadow-sm bg-light">
          <h5 class="fw-bold mb-3">📞 Contact Information</h5>
          <p><strong>Location:</strong> Varnika Studio,Chennai, Tamil Nadu</p>
          <p><strong>Phone:</strong> +91 98765 43210</p>
          <p><strong>Email:</strong> <a href="https://mail.google.com/" target="_blank">varnikamakeover@gmail.com</a></p>
          <p><strong>Instagram:</strong> <a href="https://www.instagram.com" target="_blank">@varnikamakeover</a></p>
          <hr>
          <p>📷 Follow us on social media to see our latest work and client transformations!</p>
        </div>
      </div>
    </div>
  </div>

      <!-- Online Classes Section -->
<section id="online-classes" class="container py-5">
  <div class="text-center mb-4">
    <h2>🎓 Online Beauty Classes</h2>
    <p class="lead">Learn professional makeup, saree draping, and mehndi art from the comfort of your home!</p>
  </div>

  <div class="row text-center">
    <!-- Class 1 -->
    <div class="col-md-4 mb-4">
      <div class="card h-100 shadow-sm" style="background-color:lightpink";>
        <div class="card-body">
          <h5 class="card-title">💄 Basic Makeup Course</h5>
          <p class="card-text">Perfect for beginners. Learn everyday and party looks with product knowledge.</p>
          <p><strong>Duration:</strong> 2 Weeks</p>
          <p><strong>Mode:</strong> Pre-recorded + Live</p>
          <a href="class.php" class="btn btn-outline-dark btn-sm mt-2">Join Now</a>
        </div>
      </div>
    </div>

    <!-- Class 2 -->
    <div class="col-md-4 mb-4">
      <div class="card h-100 shadow-sm" style="background-color:lightpink";>
        <div class="card-body">
          <h5 class="card-title">💐 Saree Draping Styles</h5>
          <p class="card-text">Master bridal, party, and traditional saree draping in various styles.</p>
          <p><strong>Duration:</strong> 1 Week</p>
          <p><strong>Mode:</strong> Live + Demo Videos</p>
          <a href="class2.php" class="btn btn-outline-dark btn-sm mt-2">Join Now</a>
        </div>
      </div>
    </div>

    <!-- Class 3 -->
    <div class="col-md-4 mb-4">
      <div class="card h-100 shadow-sm" style="background-color:lightpink";>
        <div class="card-body">
          <h5 class="card-title">🌿 Mehndi Art Workshop</h5>
          <p class="card-text">Learn beginner to advanced bridal mehndi designs step by step.</p>
          <p><strong>Duration:</strong> 3 Days</p>
          <p><strong>Mode:</strong> Live Workshop</p>
          <a href="class3.php" class="btn btn-outline-dark btn-sm mt-2">Join Now</a>
        </div>
      </div>
    </div>
  </div>
</section>
    <?php include_once ("footer.php"); ?>
</body>
</html>
