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
  <style>
  body {
      background-color: #fff0f5;
      font-family: 'Segoe UI', sans-serif;
    }
    .form-box {
      background: #ffe4ec;
      padding: 30px;
      border-radius: 15px;
      box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }
    h2 {
      font-weight: bold;
      color: #d63384;
    }
    .btn-pink {
      color: white;
    }
    .btn-pink:hover {
      background-color: #1ea8adff;
    }
  </style>
</head>
    <?php include_once ("header.php"); ?>
    <div class="container my-5">
  <div class="text-center mb-4">
    <h2>💄 Join Our Online Beauty Class</h2>
    <p class="text-muted">Become confident in makeup from home</p>
  </div>

  <div class="row g-4">
    <div class="col-md-6">
      <div class="form-box">
        <h5>📝 Course Details</h5>
        <ul>
          <li><strong>Course:</strong> Basic Makeup</li>
          <li><strong>Mode:</strong> Live + Pre-recorded</li>
          <li><strong>Duration:</strong> 3 Days to 2 Weeks</li>
          <li><strong>Level:</strong> Beginner Friendly</li>
          <li><strong>Language:</strong> Tamil & English</li>
        </ul>

        <h5 class="mt-4">🎓 Trainer</h5>
        <p>Certified professional with 5+ years in bridal & fashion industry.</p>

        <h5 class="mt-4">🎁 What You’ll Learn</h5>
        <ul>
          <li>Makeup product knowledge</li>
          <li>Daily & party makeup looks</li>
        </ul>

        <h5 class="mt-4">💰 Fee</h5>
        <p><strong>Starts at ₹499</strong></p>
      </div>
    </div>

    <div class="col-md-6">
      <div class="form-box">
        <form action="#" method="post" enctype="multipart/form-data">
          <h5>📌 Registration Form</h5>

          <div class="mb-3">
            <label for="name" class="form-label">Full Name *</label>
            <input type="text" class="form-control" id="name" required>
          </div>

          <div class="mb-3">
            <label for="email" class="form-label">Email ID *</label>
            <input type="email" class="form-control" id="email" required>
          </div>

          <div class="mb-3">
            <label for="course" class="form-label">Select Course *</label>
            <select class="form-select" id="course" required>
              <option value="">-- Choose --</option>
              <option>Basic Makeup Course</option>
              <option>Saree Draping Styles</option>
              <option>Mehndi Art Workshop</option>
            </select>
          </div>

          <div class="mb-3">
            <label for="mode" class="form-label">Preferred Mode</label>
            <select class="form-select" id="mode">
              <option>Live + Pre-recorded</option>
              <option>Live Only</option>
              <option>Demo Videos</option>
            </select>
          </div>

          <div class="mb-3">
            <label for="payment" class="form-label">Upload Payment Screenshot *</label>
            <input type="file" class="form-control" id="payment" required>
          </div>

          <button type="submit" class="btn btn-pink w-100 mt-3">Submit & Join Now</button>
        </form>
      </div>
    </div>
  </div>
</div>
<?php include_once ("footer.php"); ?>
</body>
</html>


