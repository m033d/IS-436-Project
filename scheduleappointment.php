<!DOCTYPE html>
<?php
	session_start();
	function usersession() {
		if (isset($_SESSION['user_id'])) {
			$loggedInUser = $_SESSION['user_id'];
			echo '<a href="profile.php?id=' . $loggedInUser . '">' . $loggedInUser . '</a> | <a href="logout.php">Logout</a>';
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
<?php
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $VID = $_POST['VID'];
    $CName = $_SESSION['user_id'];
    $Coating = $_POST['Coating'];
    $Coatinglife = $_POST['Coatinglife'];
    $Date = $_POST['date'];

    if (empty($VID) || empty($CName) || empty($Coating) || empty($Coatinglife) || empty($Date)) {
        echo '<p>All fields are required. Please try again.</p>';
    } else {
        $servername = 'studentdb-maria.gl.umbc.edu';
        $dbusername = 'nordman1';
        $dbpassword = 'nordman1';
        $dbname = 'nordman1';
        $con = mysqli_connect($servername, $dbusername, $dbpassword, $dbname);
        $vehicleQuery = "INSERT INTO Vehicle (VID, Coating, Coatinglife) VALUES ('$VID', '$Coating', '$Coatinglife')";
        if (!mysqli_query($con, $vehicleQuery)) {
            echo '<p>Error inserting data into Vehicle table. Please try again later.</p>';
            echo '<p>Error message: ' . mysqli_error($con) . '</p>';
        }
        $appointmentQuery = "INSERT INTO Appointments (VID, CName, Date) VALUES ('$VID', '$CName', '$Date')";
        if (!mysqli_query($con, $appointmentQuery)) {
            echo '<p>Error inserting data into Appointment table. Please try again later.</p>';
            echo '<p>Error message: ' . mysqli_error($con) . '</p>';
        } else {
            echo '<p>Appointment Scheduled Successfully!</p>';
            header("Location: payment.php");
            exit();
        }

        mysqli_close($con);
    }
}
?>
	<body>
    <h1>Schedule Appointment</h1>
    <form method="post" action="scheduleappointment.php">
        <?php
        $servername = 'studentdb-maria.gl.umbc.edu';
        $dbusername = 'nordman1';
        $dbpassword = 'nordman1';
        $dbname = 'nordman1';
        $con = mysqli_connect($servername, $dbusername, $dbpassword, $dbname);
        $selectedVID = isset($_POST['VID']) ? $_POST['VID'] : '';
        $query = "SELECT VMake, VModel FROM Vehicle WHERE VID = '$selectedVID'";
        $result = mysqli_query($con, $query);
        $row = mysqli_fetch_assoc($result);
        $selectedVMake = $row['VMake'];
        $selectedVModel = $row['VModel'];
        ?>
        <label for="VID">Vehicle ID:</label>
		<select id="VID" name="VID" required>
		<?php
			$query = "SELECT VID, VMake, VModel FROM Vehicle";
			$result = mysqli_query($con, $query);

			while ($row = mysqli_fetch_assoc($result)) {
				$vid = $row['VID'];
				$vMake = $row['VMake'];
				$vModel = $row['VModel'];

				// Set the selected attribute for the current VID
				$selected = ($selectedVID == $vid) ? 'selected' : '';

				echo '<option value="' . $vid . '" ' . $selected . '>' . $vid . '</option>';
			}
		?>
		</select><br>
		<label for="VMake">Vehicle Make:</label>
		<input type="text" id="VMake" name="VMake" value=""><br>

		<label for="VModel">Vehicle Model:</label>
		<input type="text" id="VModel" name="VModel" value=""><br>	

		<label for="Coating">Coating:</label>
		<select id="Coating" name="Coating" required>
		  <option value="Wax">Wax 250$</option>
		  <option value="Sealant">Sealant 250$</option>
		  <option value="Ceramic">Ceramic 400$</option>
		</select><br>

		<label for="Coatinglife">Coatinglife:</label>
		<select id="Coatinglife" name="Coatinglife" required>
		  <option value="1">1 year</option>
		  <option value="2">2 years</option>
		  <option value="3">3 years</option>
		</select><br>

		<label for="date">Select an appointment date:</label>
		<input type="date" id="date" name="date">

		<input type="submit" value="Submit">
	  </form>
	</body>
</html>
