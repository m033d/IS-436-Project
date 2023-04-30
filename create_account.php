<!DOCTYPE html>
<html>
<head>
	<title>Create Account</title>
</head>
<body>
	<h1>Create Account</h1>
	<form action="create_account.php" method="POST">
		<label for="username">Username:</label>
		<input type="text" id="username" name="username"><br>

		<label for="password">Password:</label>
		<input type="password" id="password" name="password"><br>

		<label for="email">Email Address:</label>
		<input type="email" id="email" name="email"><br>
		
		<label for="phone">Phone:</label>
		<input type="number" id="phone" name="phone"><br>
		
		<label for="firstname">First Name:</label>
		<input type="text" id="firstname" name="firstname"><br>
		
		<label for="lastname">Last Name:</label>
		<input type="text" id="lastname" name="lastname"><br>

		<label for="address1">Address 1:</label>
		<input type="text" id="address1" name="address1"><br>

		<label for="address2">Address 2:</label>
		<input type="text" id="address2" name="address2"><br>
		
		<label for="city">City:</label>
		<input type="text" id="city" name="city"><br>
		
		<label for="state">State:</label>
		<input type="text" id="state" name="state"><br>
		
		<label for="zip">Zip:</label>
		<input type="number" id="zip" name="zip"><br>

		<input type="submit" value="Create Account">
	</form>

	<?php
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			// Retrieve form data
			$username = $_POST['username'];
			$password = $_POST['password'];
			$email = $_POST['email'];
			$phone = $_POST['phone'];
			$fname = $_POST['firstname'];
			$lname = $_POST['lastname'];
			$address1 = $_POST['address1'];
			$address2 = $_POST['address2'];
			$city = $_POST["city"];
			$state = $_POST["state"];
			$zip = $_POST["zip"];

			// Validate form data
			if (empty($username) || empty($password) || empty($email) || empty($phone)
				|| empty($address1) || empty($fname) || empty($lname) || empty($city) || empty($state) || empty($zip)){
				echo '<p>All fields except address 2 are required. Please try again.</p>';
			} else {
				// Connect to MySQL database
				$servername = 'studentdb-maria.gl.umbc.edu';
				$dbusername = 'nordman1';
				$dbpassword = 'nordman1';
				$dbname = 'nordman1';
				$con = mysqli_connect($servername, $dbusername, $dbpassword, $dbname);

				// Insert new user into database
				$query = "INSERT INTO Users (username, password, fname, lname, email, 
				address1, address2, city, state, zip, phone) VALUES ('$username', '$password', 
				'$fname', '$lname','$email', '$address1', '$address2', '$city', '$state', '$zip', '$phone')";
				$result = mysqli_query($con, $query);
				
			}
		}
?>
</body>
</html>
