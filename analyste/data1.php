<?php
header('Content-Type: application/json');

$conn = mysqli_connect("localhost","root","fidele","mudb_ims_db");




$sqlQuery = "SELECT id,district_name,keywords,keywords2,keywords3,district_code,label,total_incidents FROM chart where (label != 'BURUNDI') AND (label != 'DRC')AND (label != 'TANZANIA')AND (label != 'UGANDA')   order by district_code";

$result = mysqli_query($conn,$sqlQuery);

$data = array();
foreach ($result as $row) {
	$data[] = $row;
}

mysqli_close($conn);

echo json_encode($data);
?>