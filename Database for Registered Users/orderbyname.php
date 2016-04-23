
<?php
	
	// ORDER BY NAME

	include("connection.php");

	$r = mysqli_query($dbc, "SELECT * FROM users");

	echo "<p><a href='output.php'><b>Order by Email</b></a></p>";

	// OUTPUT TABLE
	echo "<table align='center' border='1' cellspacing='3' cellpadding='3' width='75%'>
	<tr>
		<td align='left'><b>Name</b></td><td align='left'><b>Email</b></td>
	</tr>";

	// OUTPUTS THE USERS INFO
	while($row = mysqli_fetch_array($r)) {

		echo "<tr><td align='left'>".$row['last_name'].", ".$row['first_name']."</td><td align='left'>".$row['email']."</td></tr>";

	}
	
	// SECURITY
	mysqli_close($dbc);
?>