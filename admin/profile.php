<?php 

//this will direct you to home page
  session_start();
  //connection of the database
  $host = "localhost";
  $username = "root";
  $password = "";
  $db_name = "db_spud";
  $con = mysqli_connect($host, $username, $password, $db_name);

  if(!$con) {
    die("Cannot connect to the database");
  }
   //end of connection of the database

  require 'functions.php';

if(isset($_SESSION['username'], $_SESSION['password'])) {

?>

<!DOCTYPE html>
<html>
<head>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>SPUD-MPC</title>
<link rel="icon" href="../admin/assets/img/spudicon.png" type="image/png">
<link href="assets/css/bootstrap.min.css" rel="stylesheet">
<link href="assets/css/main.css" rel="stylesheet">

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

</head>
<body>

<?php include 'header.php'; ?>

<section>

<div class="container">
<strong class="title">Administrator Account</strong>
</div>


<div class="profile-box box-left">

<?php

if(isset($_SESSION['prompt'])) {
showPrompt();
}


$query = "SELECT * FROM user WHERE username = '".$_SESSION['username']."' AND password = '".$_SESSION['password']."'";

;

if($result = mysqli_query($con, $query)) {

$row = mysqli_fetch_assoc($result);

echo "<div class='info'><strong>Account Owner:</strong> <span>".$row['firstname']." ".$row['lastname']."</span></div>";
echo "<div class='info'><strong>Admin Account Password:</strong> <span>".$row['password']."</span></div>";



} else {

die("Error with the query in the database");

}

?>

<div class="options">
<a class="btn btn-primary" href="home.php">Back to Home</a>
<a class="btn btn-success" href="changepassword.php">Change Password</a>
</div>


</div>

</section>


<script src="assets/js/jquery-3.1.1.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/main.js"></script>
</body>
</html>

<?php


} else {
header("location:index.php");
exit;
}

unset($_SESSION['prompt']);
mysqli_close($con);

?>