<?php
session_start();

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
        $_SESSION['user_id'] = $username; 
        header("Location: https://swe.umbc.edu/~nordman1/is436/");
        exit();
    } else {
        $_SESSION['login_error'] = true;
        header("Location: login.html");
        exit();
    }

    mysqli_close($con);
}
?>

