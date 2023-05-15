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
                        <a class="nav-link" href="services.php">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contactus.php">Contact Us</a>
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
				<div class="container">
				  <form action="sendmessage.php" method="POST">
					<label for="Name">First Name</label>
					<input type="text" id="Name" name="Name" placeholder="Your name.."><br>

					<label for="Email">Email</label>
					<input type="text" id="Email" name="Email" placeholder="Your email.."><br>

					<label for="Phone">Phone Number</label>
					<input type="number" id="Phone" name="Phone" placeholder="Your Phone Number.."><br>
					<label for="Message">Message</label>
					<textarea id="Message" name="Message" placeholder="Write you message.." style="height:200px"></textarea><br>

					<input type="submit" value="Submit">
				  </form>
				</div>