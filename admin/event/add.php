<?php
include'../connection/connect.php';

if (!isset($_FILES['image']['tmp_name'])) {
echo "";
}else{
$file=$_FILES['image']['tmp_name'];
$image = $_FILES["image"] ["name"];
$image_name= addslashes($_FILES['image']['name']);
$size = $_FILES["image"] ["size"];
$error = $_FILES["image"] ["error"];

if ($error > 0){
die("Error uploading file! Code $error.");
}else{
if($size > 9000000000) //conditions for the file
{
die("Format is not allowed or file size is too big!");
}

else
{

move_uploaded_file($_FILES["image"]["tmp_name"],"upload/" . $_FILES["image"]["name"]);			
$location=$_FILES["image"]["name"];
$event_title= $_POST['event_title'];
$event_description= $_POST['event_description'];
$event_address= $_POST['event_address'];
$event_date= $_POST['event_date'];
$event_time= $_POST['event_time'];


mysqli_query($con,"insert into events (event_title,event_description,event_address,event_date,event_time,location) 
values('$event_title','$event_description','$event_address','$event_date','$event_time','$location')")or die(mysqli_error());

}
// this will show after saving 
	echo "<script type='text/javascript'>alert('Succesfully saved!');
	window.location='index.php';
	</script>";
	

}
}
?>								