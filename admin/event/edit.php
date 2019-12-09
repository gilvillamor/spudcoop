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

  require '../functions.php';
  include ('header.php'); 
  $ID=$_GET['id'];

  if(isset($_SESSION['username'], $_SESSION['password'])) {

?>
<body>


<div class="container">
<div class="hero-unit-header">
<div class="container-con">
<!-- end banner & menunav -->

<div class="container">
<div class="row-fluid">
<div class="span12">
<div class="row-fluid">
<div class="span3"></div>
<div class="span6">


<div class="hero-unit-3">
<center>

<?php
$query=mysqli_query($con,"select * from events where photoid='$ID'")or die('Error In Session');
$row=mysqli_fetch_array($query);
?>
<form class="form-horizontal" method="post"  enctype="multipart/form-data" style="float: right;">
<legend><h3>Image and Details</h3></legend>
<h4>Replace Image</h4>
<hr>
<div class="control-group">
<label class="control-label" for="inputPassword">
<?php if($row['location'] != ""): ?>
<img src="upload/<?php echo $row['location']; ?>" width="100px" height="100px" style="border:1px solid #333333;">
<?php else: ?>
<img src="images/default.png" width="100px" height="100px" style="border:1px solid #333333;">
<?php endif; ?>
</label>
<div class="controls">
<input type="file" name="image" style="margin-left:27px;">
<button type="submit" name="image" class="btn btn-success" style="margin-top: 20px; margin-right: 131px;">Update</button>
</div>
</div>
<hr>
<h4>Edit Event Information</h4>
<hr>
<div class="control-group">
<label class="control-label" for="inputPassword">Photo Title</label>
<div class="controls">
<input type="text" name="event_title" required value=<?php echo $row['event_title']; ?>>
</div>
</div>
<div class="control-group">
<label class="control-label" for="inputPassword">Event Description</label>
<div class="controls">
<textarea name="event_description"><?php echo $row['event_description']; ?>
</textarea>
</div>
</div>
<div class="control-group">
<label class="control-label" for="inputPassword">Event Venue</label>
<div class="controls">
<textarea name="event_address"><?php echo $row['event_address']; ?>
</textarea>
</div>
</div>
<div class="control-group">
<label class="control-label" for="inputEmail">Event Date</label>
<div class="controls">
<input type="date" name="event_date" required value=<?php echo $row['event_date']; ?>>
</div>
</div>
<div class="control-group">
<label class="control-label" for="inputEmail">Event Time</label>
<div class="controls">
<input type="time" name="event_time" required value=<?php echo $row['event_time']; ?>>
</div>
</div>

<div class="control-group">
<div class="controls">

<button type="submit" name="update" class="btn btn-success" style="margin-right: 65px;">Save</button>
<a class="btn btn-primary" href="index.php">Back</a>
</div>
</div>
</form>

<?php
$id=$_REQUEST['id'];
if (isset($_POST['image'])) {


$image = $_FILES["image"] ["name"];
$image_name= addslashes($_FILES['image']['name']);
$size = $_FILES["image"] ["size"];

move_uploaded_file($_FILES["image"]["tmp_name"],"upload/" . $_FILES["image"]["name"]);			
$location=$_FILES["image"]["name"];

mysqli_query($con,"UPDATE events SET location='$location' WHERE photoid = '$id' ")or die('Error In Session');
// this will show after updating
echo "<script type='text/javascript'>alert('Succesfully updated image!');
</script>";
}
?>

<?php
$id=$_REQUEST['id'];

$result = mysqli_query($con, "SELECT * FROM events WHERE photoid = '$id'");
$test = mysqli_fetch_array($result);
if (!$result) 
{
die("Error: Data not found..");
}

$event_title= $test['event_title'];
$event_description= $test['event_description'];
$event_address= $test['event_address'];
$event_date= $test['event_date'];
$event_time= $test['event_time'];



if (isset($_POST['update'])) {

$event_title_save= $_POST['event_title'];
$event_description_save= $_POST['event_description'];
$event_address_save= $_POST['event_address'];
$event_date_save= $_POST['event_date'];
$event_time_save= $_POST['event_time'];



mysqli_query($con, "UPDATE events SET event_title = '$event_title_save' , event_description = '$event_description_save' , event_address = '$event_address_save' , event_date = '$event_date_save' , event_time ='$event_time_save' WHERE photoid = '$id'") or die('Error In Session'); 	

// this will show after updating
echo "<script type='text/javascript'>alert('Succesfully updated!');
window.location='index.php';
</script>";



}
?>
</center>
</center>

</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
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