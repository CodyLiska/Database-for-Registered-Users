
<?php

	// LOGIN

	// INCLUDE CSS
	echo "<link rel='stylesheet' type='text/css' href='css files/login.css' />";

	// CLEARS NO EMAIL OR PASSWORD ERROR
	error_reporting(0);

	include("connection.php");

	// SECURITY CHECK FOR UNEXPECTED CHARACTERS
	$login_email = mysqli_real_escape_string($dbc, trim($_POST['login_email']));
	$login_password = mysqli_real_escape_string($dbc, trim($_POST['login_password']));
	
	$query = mysqli_query($dbc, "SELECT * FROM users WHERE email='".$login_email."'");
	$numrows = mysqli_num_rows($query);

	
	if($_SERVER['REQUEST_METHOD'] == 'POST') {

		// CHECKS FOR AN EMAIL IN ROW 1 AND GRABS ASSOCIATED INFO
		if($numrows != 0) {

			while($row = mysqli_fetch_array($query)) {

				$dbemail = $row['email'];
				$dbpass = $row['password'];
				$dbfirstname = $row['first_name'];
			}

			// VERIFY PASSWORD
			if($login_email == $dbemail) {
				if($login_password == $dbpass) {

					echo "<p>Welcome ".$dbfirstname.", you'll be redirected to the control panel in 5 seconds.</p>";
					header('Refresh: 5; URL=output.php');
					
				} else {

					echo "Your password is incorrect! <a href='index.php'>Go back to login form</a>";
				}

			} else {

				echo "Your email is incorrect <a href='index.php'>Go back to login form</a>";
			}
		} else {

			echo "Invalid credentials! If you are not registered please register <a href='userform2.php'>HERE</a>";
		}

	} else {

		echo "<h2>Please Login... <a href='index.php'>HERE</a></h2>";
	}

?>