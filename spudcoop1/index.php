<?php 
session_start();
require '../admin/connection/connect.php';
require '../admin/functions.php';

//declare han variables pati ha declare han error message
$fname = $lname = $mi = $contact_no = $email = $mem_address = $mem_position = "";
$fnameErr = $lnameErr = $miErr = $contact_noErr = $emailErr = $mem_addressErr = $mem_positionErr = "";
///pag check kun blank it textbox
if ($_SERVER["REQUEST_METHOD"] == "POST"){


if(empty($_POST["fname"])){
$fnameErr="This field is required!";
}else{
$fname=$_POST["fname"];
}

if(empty($_POST["lname"])) {
$lnameErr="This field is required!";
}else{
$lname=$_POST["lname"];
}

if(empty($_POST["mi"])) {
$miErr="This field is required!";
}else{
$mi=$_POST["mi"];
}

if(empty($_POST["contact_no"])) {
$contact_noErr="This field is required!";
}else{
$contact_no=$_POST["contact_no"];
}

if(empty($_POST["email"])) {
$emailErr="This field is required!";
}else{
$email=$_POST["email"];
}

if(empty($_POST["mem_address"])) {
$mem_addressErr="This field is required!";
}else{
$mem_address=$_POST["mem_address"];
}

if(empty($_POST["mem_position"])) {
$mem_positionErr="This field is required!";
}else{
$mem_position=$_POST["mem_position"];
}
}
/////connection pag insert hin data ha tbl_user_accounts
if($fname && $lname && $mi && $contact_no && $email && $mem_address && $mem_position){
$query = mysqli_query($con, "INSERT into members(fname, lname, mi, contact_no, email, mem_address, mem_position)values('$fname','$lname','$mi','$contact_no','$email','$mem_address','$mem_position')");
echo "<script language='javascript'>alert('You have successfully registered.')</script>";
echo "<script>window.location.href='index.php';</script>";
}
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
<a class="navbar-brand" href="index.html">SPUD Multipurpose Cooperative</a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
<span class="oi oi-menu"></span> Menu
</button>

<div class="collapse navbar-collapse" id="ftco-nav">
<ul class="navbar-nav ml-auto">
<li class="nav-item active"><a href="index.php" class="nav-link"><b>Home</b></a></li>
<li class="nav-item"><a href="about.php" class="nav-link"><b>About</b></a></li>
<li class="nav-item"><a href="blog.php" class="nav-link"><b>Blog</b></a></li>
<li class="nav-item"><a href="gallery.php" class="nav-link"><b>Gallery</b></a></li>
<li class="nav-item"><a href="event.php" class="nav-link"><b>Events</b></a></li>
<li class="nav-item"><a href="contact.php" class="nav-link"><b>Contact</b></a></li>
</ul>
</div>
</div>
</nav>
</head>
<body>

<div class="hero-wrap" style="background-image: url('images/spudbgmain.jpg');" data-stellar-background-ratio="0.5">
<div class="overlay"></div>
<div class="container">
<div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
<div class="col-md-7 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
<h1 class="mb-4" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Doing Nothing is Not An Option of Our Life</h1>
<p class="mb-5" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><b>Be A Member</b></p>

<p data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><a href="#" class="btn btn-white btn-outline-white px-4 py-3 popup-vimeo"><span class="icon-play mr-2"></span>Download App</a></p>

<a href="#be_volunteer" class="btn btn-white px-3 py-2 mt-2">Click here to register</a></p>

</div>
</div>
</div>
</div>

<!-- links are still not working in this section -->
<section class="ftco-counter ftco-intro" id="section-counter">
<div class="container">
<div class="row no-gutters">
<div class="col-md-5 d-flex justify-content-center counter-wrap ftco-animate">
<div class="block-18 color-1 align-items-stretch">
<div class="text">

<!-- para han rowcount -->
<!-- query for donor -->
<?php
$sql="SELECT id FROM members WHERE mem_position='Donor' ";
if ($result=mysqli_query($con,$sql))
{
// Return the number of rows in result set
$rowcount=mysqli_num_rows($result);
// Free result set
mysqli_free_result($result); 
?>

<!-- query for volunteer -->
<?php
$sql="SELECT id FROM members WHERE mem_position='Volunteer' ";
if ($result=mysqli_query($con,$sql))
{
// Return the number of rows in result set
$rowcount1=mysqli_num_rows($result);
// Free result set
mysqli_free_result($result); 
?>

<!-- query for sponsor -->
<?php
$sql="SELECT id FROM members WHERE mem_position='Sponsor' ";
if ($result=mysqli_query($con,$sql))
{
// Return the number of rows in result set
$rowcount2=mysqli_num_rows($result);
// Free result set
mysqli_free_result($result); 
?>
<style>
span{
  .test 
  color: #ffffff;
}
</style>
<span><strong class="number" data-number="<?php echo $rowcount; ?>"></strong><label style="color:yellow;">&nbsp;&nbsp;&nbsp;Loan</label></span>
<span><strong class="number" data-number="<?php echo $rowcount1; ?>"></strong><label style="color:blue;">&nbsp;&nbsp;&nbsp;Depositor</label></span>
<span><strong class="number" data-number="<?php echo $rowcount2; ?>"></strong><label style="color:green;">&nbsp;&nbsp;&nbsp;Member</label></span>


<?php } ?>
<?php } ?>
<?php } ?>
</div>
</div>
</div>
<div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
<div class="block-18 color-2 align-items-stretch">
<div class="text">
<h3 class="mb-4">Deposit Money</h3>
<p>Save for the future and become our member</p>
<p><a href="#be_volunteer" class="btn btn-white px-3 py-2 mt-2">Be Our Member</a></p>
</div>
</div>
</div>
<div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
<div class="block-18 color-3 align-items-stretch">
<div class="text">
<h3 class="mb-4">Loan</h3>
<p>Save for the future and become our member</p>
<p><a href="#be_volunteer" class="btn btn-white px-3 py-2 mt-2">Apply For Loan</a></p>
</div>
</div>
</div>
</div>
</div>
</section>

<!-- 3rd section -->
<section class="ftco-section">
<div class="container">
<div class="row">
<div class="col-md-4 d-flex align-self-stretch ftco-animate">
<div class="media block-6 d-flex services p-3 py-4 d-block">
<div class="icon d-flex mb-3"><span class="flaticon-donation-1"></span></div>
<div class="media-body pl-4">
<h3 class="heading">Secure Your Future</h3>
<p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.</p>
</div>
</div>      
</div>
<div class="col-md-4 d-flex align-self-stretch ftco-animate">
<div class="media block-6 d-flex services p-3 py-4 d-block">
<div class="icon d-flex mb-3"><span class="flaticon-charity"></span></div>
<div class="media-body pl-4">
<h3 class="heading">Become A Member</h3>
<p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.</p>
</div>
</div>      
</div>
<div class="col-md-4 d-flex align-self-stretch ftco-animate">
<div class="media block-6 d-flex services p-3 py-4 d-block">
<div class="icon d-flex mb-3"><span class="flaticon-donation"></span></div>
<div class="media-body pl-4">
<h3 class="heading">Make Loan</h3>
<p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.</p>
</div>
</div>    
</div>
</div>
</div>
</section>

<!-- START NORMAL VIEW GALLERY -->
<section class="ftco-gallery">
<div class="d-md-flex">
<?php
$result= mysqli_query($con, "select * from photo LIMIT 0 , 4")or die('Error In Session');
while ($row= mysqli_fetch_array ($result) ){
$id=$row['photoid'];
?>
<?php if($row['location'] != ""): ?>
<img src="../admin/gallery/upload/<?php echo $row['location']; ?>" class="gallery image-popup d-flex justify-content-center align-items-center img ftco-animate" style="background-image: url(upload/corp1.png);">
<?php else: ?>
<img src="../admin/gallery/upload/default.png" class="gallery image-popup d-flex justify-content-center align-items-center img ftco-animate" style="background-image: url(upload/corp1.png);">
<div class="icon d-flex justify-content-center align-items-center">
<span class="icon-search"></span>

<?php endif; ?>
<?php } ?>
</div>
</div>
</section>
<!-- END NORMAL VIEW GALLERY -->

<!-- EVENT -->
<section class="ftco-section">
<div class="container">
<div class="row justify-content-center mb-5 pb-3">
<div class="col-md-7 heading-section ftco-animate text-center">
<h2 class="mb-4">Events and Updates</h2>
</div>
</div>
<div class="row">
<div class="col-md-4 d-flex ftco-animate">
<div class="blog-entry align-self-stretch">
<?php
$result= mysqli_query($con, "select * from events LIMIT 0 , 3")or die('Error In Session');
while ($row= mysqli_fetch_array ($result) ){
$id=$row['photoid'];
?>

<?php if($row['location'] != ""): ?>
<img src="../admin/event/upload/<?php echo $row['location']; ?>" class="block-20">
<?php else: ?>
<img src="../admin/event/upload/default.png" width="100px" height="100px" style="border:1px solid #333333;">
<span class="icon-search"></span>
<div class="icon d-flex justify-content-center align-items-center">
</div>
<?php endif; ?>

<div class="text p-4 d-block">
<div class="meta mb-3">
<div><a href="#"><?php echo $row ['event_date']?></a></div>
<div></div>
</div>
<h3 class="heading mb-4"><a href="#"><?php echo $row ['event_title']?></a></h3>
<p class="time-loc"><span class="mr-2"><i class="icon-clock-o"></i> <?php echo $row ['event_time']?></span> <span><i class="icon-map-o"></i> <?php echo $row ['event_address']?></span></p>
<p><?php echo $row['event_description']; ?></p>
<p><a href="event.php">View More Event <i class="ion-ios-arrow-forward"></i></a></p>
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

<!-- BLOGS -->

<div class="container">
<div class="row justify-content-center mb-5 pb-3">
<div class="col-md-7 heading-section ftco-animate text-center">
<h2 class="mb-4">Recent from blog</h2>
<p>Far far away, behind the word mountains, there live the blind texts.</p>
</div>
</div>
<div class="row">
<div class="col-md-4 d-flex ftco-animate">
<div class="blog-entry align-self-stretch">
<?php
$result= mysqli_query($con, "select * from photo LIMIT 0 , 6")or die('Error In Session');
while ($row= mysqli_fetch_array ($result) ){
$id=$row['photoid'];
?>

<?php if($row['location'] != ""): ?>
<img src="../admin/gallery/upload/<?php echo $row['location']; ?>" class="block-20">
<?php else: ?>
<img src="../admin/gallery/upload/default.png" width="100px" height="100px" style="border:1px solid #333333;">
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
<p><a href="gallery.php">View More Blogs <i class="ion-ios-arrow-forward"></i></a></p>
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
<br>

<form method="POST" action="<?php htmlspecialchars("PHP_SELF"); ?>">
<section class="ftco-section-3 img" id="be_volunteer" style="background-image: url(images/spudbgmembership.jpg);">
<div class="overlay"></div>
<div class="container">
<div class="row d-md-flex">
<div class="col-md-6 d-flex ftco-animate">
<div class="img img-2 align-self-stretch" style="background-image: url(images/spudbgmembership.jpg);"></div>
</div>
<div class="col-md-6 volunteer pl-md-5 ftco-animate">
<h3 class="mb-3">Membership Registration</h3>

<input type="text" class="form-control" placeholder="First Name" name="fname" value="<?php echo $fname; ?>">
<span class="error"><?php echo $fnameErr; ?></span><br>
<input type="text" class="form-control" placeholder="Middle Name" name="mi" value="<?php echo $mi; ?>">
<span class="error"><?php echo $miErr; ?></span><br>
<input type="text" class="form-control" placeholder="Last Name" name="lname" value="<?php echo $lname; ?>">
<span class="error"><?php echo $lnameErr; ?></span><br>
<select class="form-control" name="mem_position">
<option>Select Membership..</option>
<option>Loans</option>
<option>Depositors</option>
<option>Members</option>
</select><br>
<!-- para ine hea han number only na input -->
<script>
function isNumberKey(evt){
var charCode = (evt.which) ? evt.which : evt.keyCode
if (charCode > 31 && (charCode < 48 || charCode > 57))
return false;
return true;
}
</script>
<input type="number" onkeypress="return isNumberKey(event)" class="form-control" placeholder="Contact Number" name="contact_no" value="<?php echo $contact_no; ?>">
<span class="error"><?php echo $contact_noErr; ?></span><br>
<input type="text" class="form-control" placeholder="Email" name="email" value="<?php echo $email; ?>">
<span class="error"><?php echo $emailErr; ?></span><br>
<textarea cols="30" rows="3" class="form-control" placeholder="Address" name="mem_address" value="<?php echo $mem_address; ?>"></textarea>
<span class="error"><?php echo $mem_addressErr; ?></span><br>
<input type="submit" value="Register" class="btn btn-white py-3 px-5">
</div>          
</div>
</div>
</section>
</form>

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