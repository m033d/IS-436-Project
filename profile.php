<!doctype html>
<?php
session_start();
function usersession() {
    if (isset($_SESSION['user_id'])) {
        $loggedInUser = $_SESSION['user_id'];
        echo '<a href="profile.php?id=">' . $loggedInUser . '</a> | <a href="logout.php">Logout</a>';
    } else {
        echo '<a href="login.html">Login</a> | <a href="createaccount.html">Create Account</a>';
    }
}
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-l3EouX8lNn0bqlNlJQ30hWGOe8/k1YIH+7HdtQ2xuV7X9jJh5V7RKc3r3uM0I5e5JfVtO5gBLf+EPdOaO+BHhw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Mount Airy Auto Detailing</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="https://swe.umbc.edu/~nordman1/is436/">Mount Airy Auto Detailing</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="https://swe.umbc.edu/~nordman1/is436/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#services">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Contact Us</a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <?php usersession(); ?>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
	</body>
<?php
	$servername = 'studentdb-maria.gl.umbc.edu';
	$dbusername = 'nordman1';
	$dbpassword = 'nordman1';
	$dbname = 'nordman1';
	$con = mysqli_connect($servername, $dbusername, $dbpassword, $dbname);
	if (!$con) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

	$loggedInUser = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';
	$query = "SELECT * FROM Users WHERE username = '$loggedInUser'"; 
	$result = mysqli_query($con, $query);

	if ($result) {
		if (mysqli_num_rows($result) > 0) {
			echo "<table border='1'>
				<tr>
				<h1>User Info</h1>
				<th>Username</th>
				<th>Email</th>
				<th>Phone</th>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Address 1</th>
				<th>Address 2</th>
				<th>City</th>
				<th>State</th>
				<th>Zip</th>
				</tr>";

			while ($row = mysqli_fetch_array($result)) {
				echo "<tr>";
				echo "<td>" . $row['username'] . "</td>";
				echo "<td>" . $row['email'] . "</td>";
				echo "<td>" . $row['phone'] . "</td>";
				echo "<td>" . $row['fname'] . "</td>";
				echo "<td>" . $row['lname'] . "</td>";
				echo "<td>" . $row['address1'] . "</td>";
				echo "<td>" . $row['address2'] . "</td>";
				echo "<td>" . $row['city'] . "</td>";
				echo "<td>" . $row['state'] . "</td>";
				echo "<td>" . $row['zip'] . "</td>";
				echo "</tr>";
			}
			echo "</table>";
		} else {
			echo "No records found.";
		}
	} else {
		echo "Query error: " . mysqli_error($con);
	}

	mysqli_close($con);
?>

<br>

<?php
	$servername = 'studentdb-maria.gl.umbc.edu';
	$dbusername = 'nordman1';
	$dbpassword = 'nordman1';
	$dbname = 'nordman1';
	$con = mysqli_connect($servername, $dbusername, $dbpassword, $dbname);
	if (!$con) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

	$loggedInUser = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';
	$query = "SELECT * FROM Appointments WHERE Cname = '$loggedInUser'"; 
	$result = mysqli_query($con, $query);

	if ($result) {
		if (mysqli_num_rows($result) > 0) {
			echo "<table border='1'>
				<tr>
				<h1>Appointments</h1>
				<th>AID</th>
				<th>VID</th>
				<th>Cname</th>
				<th>Date</th>
				<th>EstCompletion</th>
				<th>ActCompletion</th>
				<th>Status</th>
				</tr>";

			while ($row = mysqli_fetch_array($result)) {
				echo "<tr>";
				echo "<td>" . $row['AID'] . "</td>";
				echo "<td>" . $row['VID'] . "</td>";
				echo "<td>" . $row['Cname'] . "</td>";
				echo "<td>" . $row['Date'] . "</td>";
				echo "<td>" . $row['EstCompletion'] . "</td>";
				echo "<td>" . $row['ActCompletion'] . "</td>";
				echo "<td>" . $row['Status'] . "</td>";
				echo "</tr>";
			}
			echo "</table>";
		} else {
			echo "No records found.";
		}
	} else {
		echo "Query error: " . mysqli_error($con);
	}

	mysqli_close($con);
?>

<br>

<?php
	$servername = 'studentdb-maria.gl.umbc.edu';
	$dbusername = 'nordman1';
	$dbpassword = 'nordman1';
	$dbname = 'nordman1';
	$con = mysqli_connect($servername, $dbusername, $dbpassword, $dbname);
	if (!$con) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

	$loggedInUser = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';
	$query = "SELECT * FROM Vehicle WHERE Cname = '$loggedInUser'"; 
	$result = mysqli_query($con, $query);

	if ($result) {
		if (mysqli_num_rows($result) > 0) {
			echo "<table border='1'>
				<tr>
				<h1>Vehicles</h1>
				<th>VID</th>
				<th>CName</th>
				<th>VMake</th>
				<th>VModel</th>
				<th>Coating</th>
				<th>Coatinglife</th>
				</tr>";

			while ($row = mysqli_fetch_array($result)) {
				echo "<tr>";
				echo "<td>" . $row['VID'] . "</td>";
				echo "<td>" . $row['CName'] . "</td>";
				echo "<td>" . $row['VMake'] . "</td>";
				echo "<td>" . $row['VModel'] . "</td>";
				echo "<td>" . $row['Coating'] . "</td>";
				echo "<td>" . $row['Coatinglife'] . "</td>";
				echo "</tr>";
			}
			echo "</table>";
		} else {
			echo "No records found.";
		}
	} else {
		echo "Query error: " . mysqli_error($con);
	}

	mysqli_close($con);
?>

<br>

<body>
	<a href="https://swe.umbc.edu/~nordman1/is436/addvehicle.php">Add Vehicle</a>
</body>
