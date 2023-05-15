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
  <div class="jumbotron jumbotron-fluid">
    <div class="container text-center">
      <h1 class="display-4">Mount Airy Auto Detailing Services</h1>
      <p class="lead">We provide premium auto detailing services for all types of vehicles.</p>
      <a class="btn btn-warning btn-lg px-4 me-sm-3" href="#services" role="button">Learn More</a>
      <a class="btn btn-dark btn-lg px-4" href="contactus.php" role="button">Contact Us</a>
    </div>
  </div>
<section id="services">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h2 class="text-center">Our Services</h2>
        <hr>
      </div>
    </div>
    <div class="row">
  <div class="col-md-4">
    <div class="service-item">
      <img src="exterior.jpg" class="img-responsive" alt="" style="max-width: 100%; height: auto;">
      <h4>Exterior Detailing</h4>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus id arcu semper, luctus magna ut, sodales eros.</p>
    </div>
  </div>
  <div class="col-md-4">
    <div class="service-item">
      <img src="interior.jpg" class="img-responsive" alt="" style="max-width: 100%; height: auto;">
      <h4>Interior Detailing</h4>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus id arcu semper, luctus magna ut, sodales eros.</p>
    </div>
  </div>
  <div class="col-md-4">
    <div class="service-item">
      <img src="full.jpg" class="img-responsive" alt="" style="max-width: 100%; height: auto;">
      <h4>Full Detailing</h4>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus id arcu semper, luctus magna ut, sodales eros.</p>
    </div>
  </div>
</div>

  </div>
</section>
</html>