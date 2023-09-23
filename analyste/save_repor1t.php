<?php require_once 'php_action/core.php'; ?>
<?php
include('php_action/database.php');
$id = $_SESSION['userId'];
$user_query=mysql_query("select *  from users where user_id='$id'")or die(mysql_error());
$rowclo=mysql_fetch_array($user_query); 
$directorate = $rowclo['directorate'];
error_reporting(0);
$con=mysql_pconnect('localhost','root','fidele')or die("cannot connect to server");
mysql_select_db('mudb_ims_db')or die("cannot connect to database");
// Include PHPMailerAutoload.php library file
include ("lib/PHPMailerAutoload.php");

$random =rand();
$province = $_POST['province'];
$district = $_POST['district'];
$sector = $_POST['sector'];
$cell = $_POST['cell'];
$latitude = $_POST['latitude'];
$longitude = $_POST['longitude'];
$gedodescription = $_POST['gedodescription'];
$dateincident = $_POST['dateincident'];
$dateentry = $_POST['dateentry'];
$incident = $_POST['incident'];
$incident_name = $_POST['incidentname'];
if($incident =='OTHERSINCIDENT'){
$incident_name = $_POST['otherincident'];
$otherincident_name = $_POST['otherincident'];
$insertincident=mysql_query("INSERT INTO incidents(incident_name)
VALUES('$otherincident_name')");
	
	$rowlastincident = mysql_query( "SELECT MAX(incident_id) AS maxincident FROM `incidents`;" );
$rowincid = mysql_fetch_array( $rowlastincident );
$incident = $rowincid['maxincident'];
}
$keyword = $_POST['keyword'];
$keywordname = $_POST['keywordname'];
$subkeyword = $_POST['subkeyword'];
$message = $_POST['message'];
$actorgroupa = $_POST['enemygroups'];
$actorgroupname= $_POST['groupname'];
$groupainctor =$_POST['groupainctor'];
$groupactorname =$_POST['groupactorname'];
$institution = $_POST['institution'];
$institutionname= $_POST['institutionname'];
$memebrs = $_POST['memebrs'];
$memebername = $_POST['elelementname'];
$actoradescription = $_POST['actoradescription'];
$memeberdescription = $_POST['memeberdescription'];
$classification = $_POST['classification'];
$classification_name = $_POST['classification_name'];
$credibility = $_POST['credibility'];
$credidbility_name = $_POST['credibility_name'];
$reliability = $_POST['reliability'];
$reliabaility_name=$_POST['reliability_name'];
$source = $_POST['source'];
$source_name= $_POST['source_name'];
$subject = $_POST['subject'];
$provincename= $_POST['provinceName'];
$districtname = $_POST['districtName'];
$sectorname = $_POST['sectorName'];
$cellname = $_POST['cellName'];

$reportid=mysql_query ("SELECT MAX(report_id) AS max from reports");
			$row1 = mysql_fetch_array( $reportid );
			$last_id=$row1['max'];
			$last_id=$last_id+1;
	
$rowSQL = mysql_query( "SELECT MAX(attachment_level) AS max FROM `myfiles`;" );
$row = mysql_fetch_array( $rowSQL );
$largestlevel = $row['max'];
$largestlevel = $largestlevel+1;
	if (isset($_FILES) && (bool) $_FILES) {
    $files = array();
    $ext_error = "";



			    // Define allowed extensions
	$natcment =0;
    $allowedExtentsoins = array('pdf', 'doc', 'docx', 'gif', 'jpeg', 'jpg', 'png', 'rtf', 'txt','zip','xlsx','xls','ppt','pptx','csv');
    foreach ($_FILES as $name => $file) {
        if (!$file['name'] == "") {
			$natcment = $natcment+1;
            $file_name = $file['name'];
			$file_name = $random.'_'.$file_name;
			$file_name = preg_replace('/\s+/', '_', $file_name);
			$file_name = str_replace('+','_', $file_name);
            $temp_name = $file['tmp_name'];
            $path_part = pathinfo($file_name);
            $ext = $path_part['extension'];

            // Checking for extension of attached files
            if (!in_array($ext, $allowedExtentsoins)) {
                echo "<script>alert('Sorry!!! ." . $ext ."Extension is not allowed!!! Try Again.')</script>";
                $ext_error = FALSE;
				}else{
                $ext_error = True;
            }
 
            // Store attached files in uploads folder
            $server_file = dirname(__FILE__) . "/files/" . $path_part['basename'];
            move_uploaded_file($temp_name, $server_file);
            array_push($files, $server_file);


		$sql1=mysql_query("INSERT INTO myfiles(file_id,report_id,file_name,attachment_level)
VALUES('','$last_id','$file_name','$largestlevel')");
	

        }
    }
	
}

$insert=mysql_query("INSERT INTO reports(province,district,sector,cell,latitude,longitude,geodescription,dateincident,dateentry,incident,incident_name,keyword,keyword_name,subkeword,message,actorgroup,actorgoup_name,Institution,institution_name,actor,actor_name,memebers,member_name,actor_desrciption,memberdescription,classification,classification_name,credibility,credidbility_name,reliabaility,reliability_name,source,source_name,povince_name,district_name,sector_name,cell_name,subject,noattachments,directorate)
VALUES('$province','$district','$sector','$cell','$latitude','$longitude','$gedodescription','$dateincident',Now(),'$incident','$incident_name','$keyword','$keywordname','$subkeyword','$message','$actorgroupa','$actorgroupname','$institution','$institutionname','$groupainctor','$groupactorname','$memebrs','$memebername','$actoradescription','$memeberdescription','$classification','$classification_name','$credibility','$credidbility_name','$reliability','$reliabaility_name','$source','$source_name','$provincename','$districtname','$sectorname','$cellname','$subject','$natcment','$directorate')");

if($insert){
	echo "<script>alert('Report Saved Successfully!!!')</script>";
	    echo "<script>window.location='new_report';</script>";
}
else{
	
	echo "<script>alert('Report Not save Try again')</script>";
	    echo "<script>window.location='new_report';</script>";
	
}
?>
<script src="js/jquery.js"></script>