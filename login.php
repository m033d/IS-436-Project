<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>
	<h1>Login</h1>
	<form action="login.php" method="POST">
		<label for="username">Username:</label>
		<input type="text" id="username" name="username"><br>

		<label for="password">Password:</label>
		<input type="password" id="password" name="password"><br>

		<input type="submit" value="Login">
	</form>

	<?php
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			// Retrieve form data
			$username = $_POST['username'];
			$password = $_POST['password'];

			// Connect to MySQL database
			$servername = 'studentdb-maria.gl.umbc.edu';
			$dbusername = 'nordman1';
			$dbpassword = 'nordman1';
			$dbname = 'nordman1';
			$con = mysqli_connect($servername, $dbusername, $dbpassword, $dbname);

			// Verify credentials
			$query = "SELECT * FROM Users WHERE username='$username' AND password='$password'";
			$result = mysqli_query($con, $query);
			if (mysqli_num_rows($result) == 1) {
				echo '<p>Login successful!</p>';
			} else {
				echo '<p>Login failed. Please check your username and password and try again.</p>';
			}

			// Close database connection
			mysqli_close($con);
		}
	?>
</body>
</html>
