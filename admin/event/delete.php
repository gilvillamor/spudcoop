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


$get_id=$_GET['photoid'];

mysqli_query($con, "delete from events where photoid = '$get_id' ")or die(mysqli_error());
header('location:index.php');
?>