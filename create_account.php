<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
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
    if (empty($username) || empty($password) || empty($email) || empty($phone)
        || empty($address1) || empty($fname) || empty($lname) || empty($city) || empty($state) || empty($zip)){
        echo '<p>All fields except address 2 are required. Please try again.</p>';
    } else {
        $servername = 'studentdb-maria.gl.umbc.edu';
        $dbusername = 'nordman1';
        $dbpassword = 'nordman1';
        $dbname = 'nordman1';
        $con = mysqli_connect($servername, $dbusername, $dbpassword, $dbname);
        $stmt = mysqli_prepare($con, "INSERT INTO Users (username, password, fname, lname, email, address1, address2, city, state, zip, phone) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        mysqli_stmt_bind_param($stmt, "sssssssssss", $username, $password, $fname, $lname, $email, $address1, $address2, $city, $state, $zip, $phone);
        $result = mysqli_stmt_execute($stmt);
        if (!$result) {
            echo '<p>Error inserting data into database. Please try again later.</p>';
            echo '<p>Error message: ' . mysqli_error($con) . '</p>';
        } else {
            echo '<p>User created successfully!</p>';
			header("Location: https://swe.umbc.edu/~nordman1/is436/");
			exit();
        }

        mysqli_stmt_close($stmt);
        mysqli_close($con);
    }
}
?>

