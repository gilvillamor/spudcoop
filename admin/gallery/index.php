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

  if(isset($_SESSION['username'], $_SESSION['password'])) {

?>

<!DOCTYPE html>
<html>
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" href="../assets/img/spudicon.png" type="image/png">
	<title>SPUD-MPC</title>

  <link href="assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="assets/css/main.css" rel="stylesheet">

	  
</head>
<body>

  <?php include 'header.php'; ?>

  <section>

    
    
<!--START Para container ht main button menu -->
<div style="height:50px;"></div>
<div class="row">
<div class="well" style="width:80%; padding:auto; margin:auto">


<body>
<div class="row-fluid">
<div class="span12">

<h3 align=center>Gallery</h3>
<?php include('modal_add.php'); ?>

<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
<thead>
<tr>
<th style="text-align:center;" >Image</th>
<th style="text-align:center;">Photo Title</th>
<th style="text-align:center;">Description</th>
<th style="text-align:center;">Date</th>
<th style="text-align:center;">Action</th>
</tr>
</thead>
<tbody>
<?php

$result= mysqli_query($con, "select * from photo order by photoid ASC")or die('Error In Session');
while ($row= mysqli_fetch_array ($result) ){
$id=$row['photoid'];
?>
<tr>
<td style="text-align:center; margin-top:10px; word-break:break-all; width:450px; line-height:100px;"><a href="#<?php  echo $id;?>" data-toggle="modal">
<?php if($row['location'] != ""): ?>
<img src="upload/<?php echo $row['location']; ?>" width="100px" height="100px" style="border:1px solid #333333;">
<?php else: ?>
<img src="images/default.png" width="100px" height="100px" style="border:1px solid #333333;">
<?php endif; ?>
</a>

</td>
<td style="text-align:center; word-break:break-all; width:300px;"> <?php echo $row ['photo_title']; ?></td>
<td style="text-align:center; word-break:break-all; width:200px;"> <?php echo $row ['photo_description']; ?></td>
<td style="text-align:center; word-break:break-all; width:200px;"> <?php echo $row ['date']; ?></td>
<td style="text-align:center; width:350px;">
<a href="edit.php<?php echo '?id='.$id; ?>" class="btn btn-info">Edit</a>
<a href="#delete<?php echo $id;?>"  data-toggle="modal"  class="btn btn-danger" >Delete </a>
</td>

<!-- Modal -->
<div id="delete<?php  echo $id;?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-header">
<h3 id="myModalLabel">Delete</h3>
</div>
<div class="modal-body">
<p><div class="alert alert-danger">Are you Sure you want Delete?</p>
</div>
<hr>
<div class="modal-footer">
<button class="btn btn-inverse" data-dismiss="modal" aria-hidden="true">No</button>
<a href="delete.php<?php echo '?photoid='.$id; ?>" class="btn btn-danger">Yes</a>
</div>
</div>
</div>
</tr>

<!-- Modal Bigger Image -->
<div id="<?php  echo $id;?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-header">

<h3 id="myModalLabel"><b><?php echo $row['fname']." ".$row['lname']; ?></b></h3>
</div>
<div class="modal-body">
<?php if($row['location'] != ""): ?>
<img src="upload/<?php echo $row['location']; ?>" style="width:390px; border-radius:9px; border:5px solid #d0d0d0; margin-left: 63px; height:387px;">
<?php else: ?>
<img src="images/default.png" style="width:390px; border-radius:9px; border:5px solid #d0d0d0; margin-left: 63px; height:387px;">
<?php endif; ?>
</div>
<div class="modal-footer">
<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
</div>
</div>

<?php } ?>
</tbody>
</table>

</div>
</div>

<!--END Para container ht main button menu -->

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