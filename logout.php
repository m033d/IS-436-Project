<?php
session_start();
unset($_SESSION["user_id"]);

echo 'You have logged out';
header('Refresh: 2; URL = https://swe.umbc.edu/~nordman1/is436/');
exit();
?>
