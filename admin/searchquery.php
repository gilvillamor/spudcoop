<?php 


	 require '../admin/connection/connect.php';
	require 'functions.php';

	$s = clean($_GET['s']);

	$query = "SELECT fname, lname, contact_no, email, mem_position, CONCAT(fname, ' ', lname) as fullname 
	FROM members WHERE CONCAT(fname, ' ', lname) LIKE '".$s."%' OR lname LIKE '".$s."%' ORDER BY lname DESC LIMIT 5";

	if($result = mysqli_query($con, $query)) {

		if(mysqli_num_rows($result) == 0) {
			echo "<ul><li class='none'>No results to display</li></ul>";
		} else {

			echo "<ul>";

			while($row = mysqli_fetch_assoc($result)) {
				echo "<li>";
				echo "<span class='name'>".$row['fullname']."</span>";
			
				echo "<div class='details'>";
				echo "<span><strong>membership: </strong>".$row['mem_position']."</span>";
				echo "<span><strong>#: </strong>".$row['contact_no']."</span>";
				echo "<span><strong>email: </strong>".$row['email']."</span>";
				

				echo "</div></li>";

			}

			echo "</ul>";

		}

	} else {
		die("Error with the query");
	}

	mysqli_close($con);

?>
