
	<?php
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$username = $_POST['username'];
			$password = $_POST['password'];
			$servername = 'studentdb-maria.gl.umbc.edu';
			$dbusername = 'nordman1';
			$dbpassword = 'nordman1';
			$dbname = 'nordman1';
			$con = mysqli_connect($servername, $dbusername, $dbpassword, $dbname);
			$query = "SELECT * FROM Users WHERE username='$username' AND password='$password'";
			$result = mysqli_query($con, $query);
			if (mysqli_num_rows($result) == 1) {
				echo '<p>Login successful!</p>';
				$_SESSION['valid'] = true;
                $_SESSION['username'] = $username;
				header("Location: https://swe.umbc.edu/~nordman1/is436/");
				exit();
			} else {
				echo '<p>Login failed. Please check your username and password and try again.</p>';
			}
			mysqli_close($con);
		}
	?>
