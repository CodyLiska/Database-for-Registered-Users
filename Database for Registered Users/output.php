
<?php
	
	// OUTPUTS ALL USER INFO

	echo "<h3>Control Panel</h3>";

	include('navbar.php');

	include("connection.php");

	$q = "SELECT last_name, first_name, email, DATE_FORMAT(registration_date, '%M %d, %Y %T') AS dr, id FROM users ORDER BY registration_date ASC";

	$r = mysqli_query($dbc, $q);

	// COUNTING NUMBER OF ROWS
	$num = mysqli_num_rows($r);

	if($num > 0) {

		echo "<p>There are $num registered users.</p>";

		// OUTPUT TABLE
		echo "<table align='center' border='1' cellspacing='3' cellpadding='3' width='75%'>
			<tr>

				<td align='left'><b>Edit</b></td>
				<td align='left'><b>Delete</b></td>
				<td align='left'><b>Name</b></td>
				</td><td align='left'><b>Email</b></td> 
				<td align='left'><b>Date Registered</b></td>

			</tr>";

		// OUTPUTS THE USERS
		while($row = mysqli_fetch_array($r)) {

			echo "<tr>

					<td align='left'><a href='edit_user.php?user_id=".$row['id']."&fname=".$row['first_name']."&lname=".$row['last_name']."&lemail=".$row['email']."'>Edit</a></td>

					<td align='left'><a href='delete.php?user_id=".$row['id']."&fname=".$row['first_name']."&lname=".$row['last_name']."'>Delete</a></td>

					<td align='left'>".$row['last_name'].", ".$row['first_name']."</td>

					<td align='left'>".$row['email']."</td>
					
					<td align='left'>".$row['dr']."</td>

				</tr>";
		}

		echo "</table>";

	}else {

		echo "There are currently no registered users!";
	}
	
	// SECURITY
	mysqli_close($dbc);
?>