<?php
error_reporting(0);
include('../mydb_connection/my_connect_db.php');
include'../mydb_connection/My_dbinsert.php';
include'../mydb_connection/my_dbconnection.php';

require_once 'db-configs.php';

if (isset($_POST["submit"])) {
$mymaximum = "SELECT MAX( audit_level ) AS maxlevel FROM clients";


$result = mysqli_query($conn, "SELECT MAX( audit_level ) AS maxlevel FROM clients");
$row = mysqli_fetch_array($result);
$maximum =  $row[0];
$maximum = $maximum +1;




/****** Include the EXCEL Reader Factory ***********/
set_include_path(get_include_path() . PATH_SEPARATOR . 'Classes/');
include 'PHPExcel/IOFactory.php';  

$auditname= $_POST['auditname'];

//print_r($_FILES['excelupload']);
$namearr = explode(".",$_FILES['excelupload']['name']);
if(end($namearr) != 'xls' && end($namearr) != 'xlsx')
	{
	$auditname = '';	
		?>
    <script>

alert('Invalid File Type'); window.location='upload_newAudit';

// Closes the new window
</script> 
<?php
	}
	else{

if($invalid != 1)
	{
$response = move_uploaded_file($_FILES['excelupload']['tmp_name'],$_FILES['excelupload']['name']); // Upload the file to the current folder
if($response)
	{
error_reporting(0); 

	try {
		$objPHPExcel = PHPExcel_IOFactory::load($_FILES['excelupload']['name']);
	} catch(Exception $e) {
		die('Error : Unable to load the file : "'.pathinfo($_FILES['excelupload']['name'],PATHINFO_BASENAME).'": '.$e->getMessage());
	}

$allDataInSheet = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
$arrayCount = count($allDataInSheet);  // Total Number of rows in the uploaded EXCEL file

$string = "INSERT INTO ".TABLENAME." (client_account,client_firstname,client_lastname,cl_account_type,account_atatus,Auditname,last_audit,audit_level,time_upload) VALUES ";

for($i=2;$i<=$arrayCount;$i++){

mysqli_real_escape_string($string);

$accountnumber = mysqli_real_escape_string($connection,$allDataInSheet[$i]["A"]);
$firstname= mysqli_real_escape_string($connection,$allDataInSheet[$i]["B"]);
$lastname = mysqli_real_escape_string($connection,$allDataInSheet[$i]["C"]);
$accounttype = mysqli_real_escape_string($connection,$allDataInSheet[$i]["D"]);
$accountstatus = mysqli_real_escape_string($connection,$allDataInSheet[$i]["E"]);
$alast_audi_balance = mysqli_real_escape_string($connection,$allDataInSheet[$i]["F"]);
//$names = trim($allDataInSheet[$i]["A"]);
//$email = trim($allDataInSheet[$i]["B"]);
//$password = trim($allDataInSheet[$i]["C"]);
//$proffession = trim($allDataInSheet[$i]["D"]);
//$district = trim($allDataInSheet[$i]["E"]);
//$country = trim($allDataInSheet[$i]["F"]);
//$website = trim($allDataInSheet[$i]["G"]);

$string .= "('".$accountnumber."','".$firstname."','".$lastname."','".$accounttype."','".$accountstatus."','".$auditname."','".$alast_audi_balance."','".$maximum."',Now()),";
}
$string = substr($string,0,-1);
$insertexcel =  $conn->query($string);        // Insert all the data into one query
if($insertexcel){
?>
<script>

alert('File Uploaded Successfully');

</script>
<script>
    window.onunload = refreshParent;
    function refreshParent() {
        window.opener.location.reload();
	}
</script>
<script type='text/javascript'>
         window.location='upload_newAudit';
    </script>
<?php
}
else{
	?>
<script>

alert('Upload Failed');

</script>
<script>
    window.onunload = refreshParent;
    function refreshParent() {
        window.opener.location.reload();
	}
</script>
<script type='text/javascript'>
         self.close();
    </script>
<?php
}
}

}// End Invalid Condition
} 
}
?>
