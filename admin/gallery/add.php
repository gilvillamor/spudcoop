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
$photo_title= $_POST['photo_title'];
$photo_description= $_POST['photo_description'];
$date= $_POST['date'];


mysqli_query($con,"insert into photo (photo_title,photo_description,date,location) 
values('$photo_title','$photo_description','$date','$location')")or die(mysqli_error());

}
// this will show after saving nahirapan ako dito hayss
	echo "<script type='text/javascript'>alert('Succesfully saved!');
	window.location='index.php';
	</script>";
	

}
}
?>								