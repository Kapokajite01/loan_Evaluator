				<?php
$servername = "localhost";
$username = "root";
$password = "fidele";
$dbname = "qloan_loan_valuator_db";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>