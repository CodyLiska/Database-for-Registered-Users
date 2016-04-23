
<?php 

	// USER INPUT FORM

	// INCLUDE CSS
	echo "<link rel='stylesheet' type='text/css' href='style.css' />";
	
	// SECURITY CHECKS THAT INFO IS NOT COMMING FROM A BOT
	if($_SERVER['REQUEST_METHOD'] == 'POST') {

		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$email = $_POST['email'];
		$gender = $_POST['gender'];
		$age = $_POST['age'];
		$comments = $_POST['comments'];
		$password = $_POST['password'];
 
		// CHECKING FOR AN EMPTY INPUT
		if(!empty($fname) && !empty($lname) && !empty($email) && !empty($gender) && !empty($age) && !empty($comments) && !empty($password)) {

			include('connection.php');

			mysqli_query($dbc, "INSERT INTO users(first_name, last_name, email, gender, age, comments, password, registration_date) VALUES('$fname','$lname','$email','$gender','$age','$comments','$password', NOW())");

			$registered = mysqli_affected_rows($dbc);

			echo "<h3>You have registered succesfully! Please login <a href='index.php'>HERE</a></h3>";

		} else {

			echo "<p style='color:red;'>Error: You left some fields blank</p>";
		}

	} else {

		echo "<h2>Please complete the form</h2>";
	}
?>

<html>

<head>
<title></title>
</head>

<body>

	<div id="userFormDiv">

	<!-- USER FORM -->
	<form action="userform2.php" method="post">

		<p>First Name:  <input id="uFName" type="text" name="fname" size="30" maxlength="50" /></p>

		<p>Last Name:  <input id="uLName" type="text" name="lname" size="30" maxlength="50" /></p>

		<p>Email:  <input id="uEmail" type="text" name="email" size="30" maxlength="50" /></p>

		<p>Gender:  <input type="radio" name="gender" value="M" </> Male
		<input type="radio" name="gender" value="F" </> Female</p>

		<p>Age:  <select name="age">

					<option value="0-29">Under 30</option>
					<option value="30-60">Between 30 and 60</option>
					<option value="60+">Over 60</option>

				</select></p>

		<p>Comments:<br /><textarea id="uComments" name="comments" rows="3" cols="40" maxlength="200"></textarea></p>

		<p>Password:  <input id="uPassword" type="password" name="password" maxlength="50"></p>


		<p><input class="button" type="submit" name="submit" value="Submit" /></p>

	</form>

	</div>

	<a href="index.php">Go back to loging page</a>
	
</body>
</html>