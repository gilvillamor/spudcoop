<?php 
session_start();
require '../admin/connection/connect.php';
require '../admin/functions.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>SPUD-MPC</title>
<link rel="icon" href="../admin/assets/img/spudicon.png" type="image/png">
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Dosis:200,300,400,500,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Overpass:300,400,400i,600,700" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">

     <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
      <a class="navbar-brand" href="index.php">SPUD Multipurpose Cooperative</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="oi oi-menu"></span> Menu
      </button>

      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item"><a href="index.php" class="nav-link"><b>Home</b></a></li>
          <li class="nav-item"><a href="about.php" class="nav-link"><b>About</b></a></li>
          <li class="nav-item active"><a href="blog.php" class="nav-link"><b>Blog</b></a></li>
          <li class="nav-item"><a href="gallery.php" class="nav-link"><b>Gallery</b></a></li>
          <li class="nav-item"><a href="event.php" class="nav-link"><b>Events</b></a></li>
          <li class="nav-item"><a href="contact.php" class="nav-link"><b>Contact</b></a></li>
        </ul>
      </div>
    </div>
  </nav>


</head>
<!-- END nav -->

<div class="hero-wrap" style="background-image: url('images/spudbgmain.jpg');" data-stellar-background-ratio="0.5">
<div class="overlay"></div>
<div class="container">



<div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
<div class="col-md-7 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
<p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-2"><a href="index.php">Home</a></span> <span>Blog</span></p>
<h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Blog</h1>

</div>
</div>
</div>
</div>



<!-- EVENT -->
<section class="ftco-section">
<div class="container">
<div class="row justify-content-center mb-5 pb-3">
<div class="col-md-7 heading-section ftco-animate text-center">

</div>
</div>
<div class="row">
<div class="col-md-4 d-flex ftco-animate">
<div class="blog-entry align-self-stretch">
<?php
$result= mysqli_query($con, "select * from photo order by photoid ASC")or die('Error In Session');
while ($row= mysqli_fetch_array ($result) ){
$id=$row['photoid'];
?>

<?php if($row['location'] != ""): ?>
<img src="../admin/gallery/upload/<?php echo $row['location']; ?>" class="block-20">
<?php else: ?>
<img src="upload/corp1.png" width="100px" height="100px" style="border:1px solid #333333;">
<span class="icon-search"></span>
<div class="icon d-flex justify-content-center align-items-center">
</div>
<?php endif; ?>

<div class="text p-4 d-block">
<div class="meta mb-3">
<div><a href="#"><?php echo $row ['date']?></a></div>
<div></div>
</div>
<h3 class="heading mb-4"><a href="#"><?php echo $row ['photo_title']?></a></h3>
<p><?php echo $row ['photo_description']?></p>

</div>
</div>
</div>
<div class="col-md-4 d-flex ftco-animate">
<div class="blog-entry align-self-stretch">
<?php } ?>
</div>
</div>
</div>
</div>
</section>



<?php include 'webfooter.php' ?>
<!-- loader -->
<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


<script src="js/jquery.min.js"></script>
<script src="js/jquery-migrate-3.0.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.easing.1.3.js"></script>
<script src="js/jquery.waypoints.min.js"></script>
<script src="js/jquery.stellar.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/aos.js"></script>
<script src="js/jquery.animateNumber.min.js"></script>
<script src="js/bootstrap-datepicker.js"></script>
<script src="js/jquery.timepicker.min.js"></script>
<script src="js/scrollax.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
<script src="js/google-map.js"></script>
<script src="js/main.js"></script>

</body>
</html>