
<?php

	// UPDATING PASSWORDS

	// INCLUDE CSS
	echo "<link rel='stylesheet' type='text/css' href='style.css' />";
	
	if($_SERVER['REQUEST_METHOD'] == 'POST') {

		include('connection.php');

		// ERROR ARRAY
		$errors = array();

		// EMAIL VERIFICATION
		if(empty($_POST['email'])) {

			$errors[] = 'You forgot to enter your email';

		} else {

			// SECURITY CHECK FOR UNEXPECTED CHARACTERS 
			$e = mysqli_real_escape_string($dbc, trim($_POST['email']));
		}

		// CHECKS FOR A PASSWORD
		if(empty($_POST['pass'])) {

			$errors[] = 'You forgot to enter your password';

		} else {

			// SECURITY CHECK FOR UNEXPECTED CHARACTERS
			$p = mysqli_real_escape_string($dbc, trim($_POST['pass']));
		}


		// COMPAIRING OLD AND NEW PASSWORDS
		if(!empty($_POST['pass1'])) {

			if($_POST['pass1'] != $_POST['pass2']) {

				$errors[] = 'Your new password does not match the confirmed password';

			} else {

				$np = mysqli_real_escape_string($dbc, trim($_POST['pass1']));
			}

			} else {
 
				$errors[] = 'You forgot to enter your new password';
			}

		// ERROR CHECK
		if(empty($errors)) {

			// VERIFY EMAIL AND PASSWORD MATCH
			$q = "SELECT id FROM users WHERE (email='$e' AND password='$p')";
			$r = mysqli_query($dbc, $q);
			$num = mysqli_num_rows($r);

			// GET USER ID
			if($num == 1) {

				$row = mysqli_fetch_array($r, MYSQLI_NUM);

				// UPDATE
				$q = "UPDATE users SET password='$np' WHERE id='$row[0]'";
				$r = mysqli_query($dbc, $q);

				if(mysqli_affected_rows($dbc) == 1) {

					// OK MESSAGE
					echo "Thanks! You have updated your password";

				} else {

					echo "Your password could not be changed due to a system error";

				}

				// SECURITY CLOSE THE CONNECTION
				mysqli_close($dbc);
			} else {

				echo "The email and password do not match our records";
			}
		} else {

			// ECHO ERROR ARRAY
			echo "Error! The following error occurred: <br />";

			foreach($errors as $msg) {

				echo $msg."<br />";

			}
		}
	}
?>

<h2>Change Password</h2>
	
	<div id="passFormDiv">
		<!-- PASSWORD FORM -->
		<form action="password.php" method="post">

			<p>Email: <input id="passEmail" type="text" name="email" size="30" maxlength="50" value="<?php if(isset($_POST['email'])){echo $_POST['email'];} ?>" /></p>

			<p>Current Password: <input id="curPass" type="password" name="pass" size="19" maxlength="50" value="<?php if(isset($_POST['pass'])){echo $_POST['pass'];} ?>" /></p>

			<p>New Password: <input id="newPass" type="password" name="pass1" size="18" maxlength="50" value="<?php if(isset($_POST['pass1'])){echo $_POST['pass1'];} ?>"/></p>

			<p>Confirm Password: <input id="conPass" type="password" name="pass2" size="18" maxlength="50" value="<?php if(isset($_POST['pass2'])){echo $_POST['pass2'];} ?>" /></p>

			<p><input class="button" type="submit" name="submit" value="Save" /></p>

		</form>

	</div>