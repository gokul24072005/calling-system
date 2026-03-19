<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gallery</title>
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
 .images{
    display: flex;
    gap:5px;
    height:60vmin;
    width: 98vw;
    
}
 .images img{
    height:100%;
    overflow: hidden;
    object-fit: cover;
    flex:1;
    transition: all 0.3s ease;
    border-radius: 18px;
    cursor: pointer;
}
.images img:hover{
    flex: 3;
    filter: brightness(1.1);
}
.hair{
    display: flex;
    gap:5px;
    height:60vmin;
    width: 98vw;
    
}
.hair img{
    height:100%;
    overflow: hidden;
    object-fit: cover;
    flex:1;
    transition: all 0.3s ease;
    border-radius: 18px;
    cursor: pointer;
}
.hair img:hover{
    flex: 3;
    filter: brightness(1.1);
}
.drape{
    display: flex;
    gap:5px;
    height:60vmin;
    width: 98vw;
    
}
.drape img{
    height:100%;
    overflow: hidden;
    object-fit: cover;
    flex:1;
    transition: all 0.3s ease;
    border-radius: 18px;
    cursor: pointer;
}
.drape img:hover{
    flex: 3;
    filter: brightness(1.1);
}
</style>

</head>
  <?php include_once ("header.php"); ?>
  <div class="container-fluid">
  <div class="row" style="background-color:lightgrey;">
    <div class="col-12 col-md-12 text-center ">
      <h1 class="top mt-3">OUR GALLERY</h1>
            <style>
                .top{
                    font-family: "Courgette", serif;
                    font-weight: 500;
                    font-style: normal;
                    color: rgb(153, 114, 165);
                    }
            </style>
    <h1 class="mt-4 mb-4">BRIDAL MAKEOVER</h1>
    <style>
        h1  {
                            font-family: "Grenze Gotisch", cursive;
                            font-weight: 400;
                            font-style: normal;
                            color: brown;
                    }
    </style>
    <div class="images">
        <img src="images/b1.jpg" width="300px" height="400px">
        <img src="images/b2.jpg" width="300px" height="400px">
        <img src="images/b3.jpg"width="300px" height="400px">
        <img src="images/b4.jpg" width="300px" height="400px">
        <img src="images/b5.jpg" width="300px" height="400px">
        <img src="images/b6.jpg" width="300px" height="400px">
        <img src="images/b7.jpg" width="300px" height="400px">
        <img src="images/b8.jpg"width="300px" height="400px">
        <img src="images/b9.jpg" width="300px" height="400px">
        <img src="images/b0.jpg" width="300px" height="400px">
        <img src="images/ba.jpg" width="300px" height="400px">
        <img src="images/bb.jpg" width="300px" height="400px">
        <img src="images/bc.jpg" width="300px" height="400px">
        <img src="images/bd.jpg" width="300px" height="400px">
        <img src="images/be.jpg" width="300px" height="400px">
        <img src="images/bf.jpg" width="300px" height="400px">
        <img src="images/bgh.jpg"width="300px" height="400px">
        <img src="images/bi.jpg" width="300px" height="400px">
        <img src="images/bj.jpg" width="300px" height="400px">
        <img src="images/bk.jpg" width="300px" height="400px">
    </div>
    <h1 class="mt-4 mb-4">HAIR MAKEOVER</h1>
    <div class="hair">
        <img src="images/h1.jpg" width="300px" height="400px">
        <img src="images/h2.jpg" width="300px" height="400px">
        <img src="images/h3.jpg" width="300px" height="400px">
        <img src="images/h4.jpg" width="300px" height="400px">
        <img src="images/h5.jpg" width="300px" height="400px">
        <img src="images/h6.jpg" width="300px" height="400px">
        <img src="images/h7.jpg" width="300px" height="400px">
        <img src="images/h8.jpg" width="300px" height="400px">
        <img src="images/h9.jpg" width="300px" height="400px">
        <img src="images/h0.jpg" width="300px" height="400px">
        <img src="images/ha.jpg" width="300px" height="400px">
        <img src="images/hb.jpg" width="300px" height="400px">
        <img src="images/hc.jpg" width="300px" height="400px">
        <img src="images/hd.jpg" width="300px" height="400px">
        <img src="images/he.jpg" width="300px" height="400px">
        <img src="images/hf.jpg" width="300px" height="400px">
        </div>
        <h1 class="mt-4 mb-4">SAREE DRAPING</h1>
    <div class="drape">
    <img src="images/d1.jpg" width="300px" height="400px">
    <img src="images/d7.jpg" width="300px" height="400px">
    <img src="images/d3.jpg" width="300px" height="400px">
    <img src="images/d5.jpg" width="300px" height="400px">
    <img src="images/d4.jpg" width="300px" height="400px">
    <img src="images/d6.jpg" width="300px" height="400px">
    <img src="images/d2.jpg" width="300px" height="400px">
    <img src="images/d8.jpg" width="300px" height="400px">
</div>
    </div>
  </div>
  </div>
  </div>
  <?php include_once ("footer.php"); ?>
  <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
