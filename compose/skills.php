<?php



 //database configuration
include_once('config_mydb.php');
    
    //connect with the database
    $db1 = new mysqli($dbHost,$dbUsername,$dbPassword,$dbName);
  
    //get search term
    $searchTerm = $_GET['term'];
	$sender = $_GET['sen'];
    
    //get matched data from skills tablel
    $query = $db1->query("SELECT DISTINCT rec_id AS mydata FROM usermails WHERE ((sen_id LIKE '%".$searchTerm."%') AND (sen_id LIKE '".$sender."'))
	UNION SELECT DISTINCT sen_id AS mydata FROM usermails WHERE ((rec_id LIKE '%".$searchTerm."%') AND (rec_id LIKE '%".$sender."'))
	UNION SELECT DISTINCT email AS mydata FROM contact WHERE ((email LIKE '%".$searchTerm."%') AND (contact_by LIKE '%".$sender."'))");
	
    while ($row = $query->fetch_assoc()) {
        $data[] = $row['mydata'];
    }
    
    //return json data
    echo json_encode($data);
?>