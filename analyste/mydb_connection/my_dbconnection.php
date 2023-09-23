<?php
$servername = "localhost";
$username = "root";
$password = "fidele";
$dbname = "qloan_loan_valuator_db";

// Create connection
$conn_db = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn_db->connect_error) {
    die("Connection failed: " . $conn_db->connect_error);
}
?>