<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $Name = $_POST['Name'];
    $Email = $_POST['Email'];
    $Phone = $_POST['Phone'];
    $Message = $_POST['Message'];
    
    if (empty($Name) || empty($Email) || empty($Phone) || empty($Message)){
        echo '<p>All fields are required. Please try again.</p>';
    } else {
        $servername = 'studentdb-maria.gl.umbc.edu';
        $dbusername = 'nordman1';
        $dbpassword = 'nordman1';
        $dbname = 'nordman1';
        $con = mysqli_connect($servername, $dbusername, $dbpassword, $dbname);
        
        $sql = "INSERT INTO Comments(Name, Email, Phone, Message)
                VALUES ('$Name', '$Email', '$Phone', '$Message')";
        
        if (!mysqli_query($con, $sql)) {
            echo '<p>Error inserting data into database. Please try again later.</p>';
            echo '<p>Error message: ' . mysqli_error($con) . '</p>';
        } else {
            echo '<p>Message created successfully!</p>';
            header("Location: https://swe.umbc.edu/~nordman1/is436/");
            exit();
        }
        
        mysqli_close($con);
    }
}
?>