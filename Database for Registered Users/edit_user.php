<?php

	// EDIT 

	// INCLUDE CSS
	echo "<link rel='stylesheet' type='text/css' href='style.css' />";

	// CONNECT TO SERVER
	if($_SERVER['REQUEST_METHOD'] == 'POST') {

		include('connection.php');

		$idnow = $_POST['userid'];
		$demail = $_POST['xemail'];
		$ffname = $_POST['firstname'];
		$llname = $_POST['lastname'];

		$q = "UPDATE users SET first_name='$ffname', last_name='$llname', email='$demail' WHERE id='$idnow'";

		$r = mysqli_query($dbc, $q);

		if(mysqli_affected_rows($dbc) == 1) {

			echo "The user info has been changed successfully";

		} else

			echo "Error! Something went wrong!";
	}
?>

<h2>Edit User</h2>

	<div id="editFormDiv">

		<!-- EDIT USER FORM -->
		<form action="edit_user.php" method="post">
			<p><input id="editUserId" type="hidden" name="userid" size="20" maxlength="50" value="<?php echo $_GET['user_id']; ?>" /></p> 

			<p>First Name: <input id="editUserFName" type="text" name="firstname" size="20" maxlength="50" value="<?php echo $_GET['fname']; ?>" /></p>

			<p>Last Name:  <input id="editUserLName" type="text" name="lastname" size="20" maxlength="50" value="<?php echo $_GET['lname']; ?>" /></p> 

			<p>Email:  <input id="editUserEmail" type="text" name="xemail" size="20" maxlength="50" value="<?php echo $_GET['lemail']; ?>" /></p> 
			
			<p><input class="button" type="submit" name="submit" value="Save" /></p> 

		</form>

	</div>

<a href="output.php">See Records</a>