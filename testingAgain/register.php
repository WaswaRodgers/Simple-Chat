<?php
	include("config.php");
		$Name=$_POST['name'];
	 	$Email=$_POST['email'];
	 	$County=$_POST['county'];
	 	$Username=$_POST['username'];
	 	$Password=$_POST['password'];

	if (isset($_POST['register'])) {
	 	

	 	$query="INSERT INTO users('name', 'email', 'county', 'username', 'password') VALUES($Name, $Email, $County, $Username, $Password)";
	 	$feedback=mysqli_query($connection, $query);
	 	if($feedback){
	 		echo "Data inserted successfully";
	 		echo "<table>";
	 		echo "<th><td>Name</td><td>Email</td><td>County</td></th>";
	 		echo "<tr><td>".$feedback['name']."</td><td>".$feedback['email']."</td><td>".$feedback['county']."</td></tr>";
	 		echo "</table>";
	 	} else{
	 		echo "No data inserted into the database";

	 	}
	 } 
	?>