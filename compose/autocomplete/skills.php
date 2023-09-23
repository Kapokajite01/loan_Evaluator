<?php
    //database configuration
include_once('config_mydb.php');
    
    //connect with the database
    $db = new mysqli($dbHost,$dbUsername,$dbPassword,$dbName);
    
    //get search term
    $searchTerm = $_GET['term'];
    
    //get matched data from skills table
    $query = $db->query("SELECT * FROM sys_users WHERE email LIKE '%".$searchTerm."%' ORDER BY email ASC");
    while ($row = $query->fetch_assoc()) {
        $data[] = $row['email'];
    }
    
    //return json data
    echo json_encode($data);
?>