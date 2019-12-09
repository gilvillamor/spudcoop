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
$query=mysqli_query($con,"select * from photo where photoid='$ID'")or die('Error In Session');
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
<h4>Edit Image Information</h4>
<hr>
<div class="control-group">
<label class="control-label" for="inputPassword">Photo Title</label>
<div class="controls">
<input type="text" name="photo_title" required value=<?php echo $row['photo_title']; ?>>
</div>
</div>
<div class="control-group">
<label class="control-label" for="inputPassword">Description</label>
<div class="controls">
<textarea name="photo_description"><?php echo $row['photo_description']; ?>
</textarea>
</div>
</div>
<div class="control-group">
<label class="control-label" for="inputEmail">Date</label>
<div class="controls">
<input type="date" name="date" required value=<?php echo $row['date']; ?>>
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

mysqli_query($con,"UPDATE photo SET location='$location' WHERE photoid = '$id' ")or die('Error In Session');
// this will show after updating
echo "<script type='text/javascript'>alert('Succesfully updated image!');
</script>";
}
?>

<?php
$id=$_REQUEST['id'];

$result = mysqli_query($con, "SELECT * FROM photo WHERE photoid = '$id'");
$test = mysqli_fetch_array($result);
if (!$result) 
{
die("Error: Data not found..");
}

$photo_title= $test['photo_title'];
$photo_description= $test['photo_description'];
$date= $test['date'];




if (isset($_POST['update'])) {

$photo_title_save= $_POST['photo_title'];
$photo_description_save= $_POST['photo_description'];
$date_save= $_POST['date'];


mysqli_query($con, "UPDATE photo SET photo_title = '$photo_title_save' , photo_description = '$photo_description_save' , date ='$date_save' WHERE photoid = '$id'") or die('Error In Session'); 	

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