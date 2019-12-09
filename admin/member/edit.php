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
$query=mysqli_query($con,"select * from members where id='$ID'")or die('Error In Session');
$row=mysqli_fetch_array($query);
?>
<form class="form-horizontal" method="post"  enctype="multipart/form-data"">


<h3>Member Information</h3>
<br>
<div class="control-group">
<label class="control-label">First Name</label>
<div class="controls">
<input type="text" name="fname" required value=<?php echo $row['fname']; ?> readonly>
</div>
</div>
<div class="control-group">
<label class="control-label">Middle Name</label>
<div class="controls">
<input type="text" name="mi" required value=<?php echo $row['mi']; ?> readonly>
</div>
</div>
<div class="control-group">
<label class="control-label">Last Name</label>
<div class="controls">
<input type="text" name="lname" required value=<?php echo $row['lname']; ?> readonly>
</div>
</div>
<div class="control-group">
<label class="control-label">Member Description</label>
<div class="controls">
<input type="text" name="mem_position" required value=<?php echo $row['mem_position']; ?> readonly>
</div>
</div>
<div class="control-group">
<label class="control-label">Contact No</label>
<div class="controls">
<input type="text" name="contact_no" required value=<?php echo $row['contact_no']; ?> readonly>
</div>
</div>
<div class="control-group">
<label class="control-label">Email</label>
<div class="controls">
<input type="text" name="email" required value=<?php echo $row['email']; ?> readonly>
</div>
</div>
<div class="control-group">
<label class="control-label">Address</label>
<div class="controls">
<input type="text" name="mem_address" required value=<?php echo $row['mem_address']; ?> readonly>
</div>
</div>


<div class="control-group">
<div class="controls">

<a class="btn btn-primary" href="index.php">Back</a>
</div>
</div>
</form>



<?php
$id=$_REQUEST['id'];

$result = mysqli_query($con, "SELECT * FROM members WHERE id = '$id'");
$test = mysqli_fetch_array($result);
if (!$result) 
{
die("Error: Data not found..");
}

$fname= $test['fname'];
$lname= $test['lname'];
$mi= $test['mi'];
$contact_no= $test['contact_no'];
$email= $test['email'];
$mem_address= $test['mem_address'];
$mem_position= $test['mem_position'];



// if (isset($_POST['update'])) {

// $fname_save= $_POST['fname'];
// $lname_save= $_POST['lname'];
// $mi_save= $_POST['mi'];
// $contact_no_save= $_POST['contact_no'];
// $email_save= $_POST['email'];
// $mem_address_save= $_POST['mem_address'];
// $mem_address_save= $_POST['mem_address'];




// mysqli_query($con, "UPDATE members SET fname = '$fname_save' , lname = '$lname_save' , mi = '$mi_save' , contact_no = '$contact_no_save' , email ='$email_save' , mem_address = '$mem_address_save'  WHERE photoid = '$id'") or die('Error In Session'); 	

// // this will show after updating
// echo "<script type='text/javascript'>alert('Succesfully updated!');
// window.location='index.php';
// </script>";



// }
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