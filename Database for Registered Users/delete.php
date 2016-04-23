
<?php
	
	// DELETE

	// INCLUDE CSS
	echo "<link rel='stylesheet' type='text/css' href='style.css' />";
	
	// VERIFY NOT A DUPLICATE ENTRY
	if($_SERVER['REQUEST_METHOD'] == 'POST') {

		include('connection.php');

		// SECURITY CHECK FOR UNEXPECTED CHARACTERS
		$id_user = mysqli_real_escape_string($dbc, trim($_POST['user_id']));

		mysqli_query($dbc, "DELETE FROM users WHERE id='$id_user'");

		echo "The user has been successfully been deleted!";

	}
?>

<h2>Are you sure you want to delete this user?</h2>

<div id="deleteFormDiv">

	<!-- DELETE USER FORM-->
	<form method="post" action="delete.php">
		<p>User ID:  <input id="delUserId" type='text' name='user_id' value="<?php echo $_GET['user_id']; ?>" /></p>

		<p>First Name:  <input id="delFName" type='text' name='first_name' value="<?php echo $_GET['fname']; ?>" /></p>

		<p>Last Name:  <input id="delLName" type='text' name='last_name' value="<?php echo $_GET['lname']; ?>" /></p>

		<p><input class="button" type="submit" name='submit' value='Yes' /></p>

	</form> 

</div>

<p><a href="output.php">Go Back</a></p>