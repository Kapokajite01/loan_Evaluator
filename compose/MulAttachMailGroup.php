<?php
//error_reporting(0);

// Include PHPMailerAutoload.php library file
include ("lib/PHPMailerAutoload.php");

//db conection
$random =rand();
//error_reporting (0);
$con=mysql_pconnect('localhost','root','%9,l6rTDZ=k1')or die("cannot connect to server");
mysql_select_db('sintras')or die("cannot connect to database");
$sen_name = "";
$sen_email = "";
$rec_email = "";
$email_sub = "";
$box_msg = "";
// Retrieving & storing user's submitted information
/*if (isset($_POST['sen_name'])) {
    $sen_name = $_POST['sen_name'];
}
if (isset($_POST['sen_email'])) {
    $sen_email = $_POST['sen_email'];
}
if (isset($_POST['rec_email'])) {
    $rec_email = $_POST['rec_email'];
}
if (isset($_POST['email_sub'])) {
    $email_sub = $_POST['email_sub'];
}
if (isset($_POST['box_msg'])) {
    $box_msg = $_POST['box_msg'];
}*/

session_start();
include "../../inc/config.php";
$connect = mysql_connect("localhost","root","%9,l6rTDZ=k1"); 
mysql_select_db("sintras",$connect);

  $key_value = "k€yv@lµ€"; 
  $key_size =  strlen($key_value);


$mail_id = $_POST['mail_id'];
$sender=$db->fetch_single_row('sys_users','id',$_SESSION['id_user'])->email;
$fname=$db->fetch_single_row('sys_users','id',$_SESSION['id_user'])->first_name;
$lname=$db->fetch_single_row('sys_users','id',$_SESSION['id_user'])->last_name;
$ip= $_SERVER["REMOTE_ADDR"];
$hostname=gethostbyaddr($_SERVER['REMOTE_ADDR']);
$email = $_POST['country_id'];
// $sen_name = $_POST['sen_name'];
 $subject = $_POST['subject'];
$keyvalue = "Kivuye";
$Clear = addslashes($_POST['message']);       

$message = fnEncrypt($Clear, $keyvalue);  

function fnEncrypt($sValue, $sSecretKey)
{
    return rtrim(
        base64_encode(
            mcrypt_encrypt(
                MCRYPT_RIJNDAEL_256,
                $sSecretKey, $sValue, 
                MCRYPT_MODE_ECB, 
                mcrypt_create_iv(
                    mcrypt_get_iv_size(
                        MCRYPT_RIJNDAEL_256, 
                        MCRYPT_MODE_ECB
                    ), 
                    MCRYPT_RAND)
                )
            ), "\0"
        );
}
			$l_id=mysql_query ("SELECT MAX(mail_id) AS max from usermails ");
			$row1 = mysql_fetch_array( $l_id );
			$last_id=$row1['max'];
			$last_id=$last_id+1;
$cehckemail = mysql_query("SELECT groupid FROM groupmails where group_name = '$email'");
$rowcheck = mysql_fetch_array($cehckemail);
$mygroupid = $rowcheck['groupid'];
	
$cehckemailgroup = mysql_query("SELECT email_viewer FROM group_viewer WHERE group_id = '$mygroupid'");
while ($rowcheckmgroup= mysql_fetch_array($cehckemailgroup)) {

$myfroupmail[] =  $rowcheckmgroup['email_viewer'];
}
if (isset($myfroupmail)) { 
$ngrm= count($myfroupmail);
}
else{
	$ngrm = -1;
}


if($ngrm > 0){
for($t = 0; $t < $ngrm; $t++){
	if (isset($_FILES) && (bool) $_FILES) {
    $files = array();
    $ext_error = "";

$rowSQL = mysql_query( "SELECT MAX( attachment_level ) AS max FROM `myfiles`;" );
$row = mysql_fetch_array( $rowSQL );
$largestlevel = $row['max'];
$largestlevel = $largestlevel+1;
			$tm = date('Y-m-d H:i:s');
			
			$sql=mysql_query("INSERT INTO usermails(mail_id,rec_id,sen_id,subject,message,readd,received_date,original_id,cc)
			
VALUES('','$myfroupmail[$t]','$sender','$subject','$message','0','$tm','$last_id','cc')");
$sqld=mysql_query("INSERT INTO logs (log_id,first_name,lastname,email,action,client_IP,hostname,time)VALUES('','$fname','$lname','$sender','Send an email','$ip','$hostname',now())");
$rowemailid = mysql_query( "SELECT MAX( mail_id ) AS maxid FROM `usermails`;" );
$rowid = mysql_fetch_array( $rowemailid );
$lastid = $rowid['maxid'];
$clauriane = mysql_query("UPDATE tbl_draft SET mail_status='sent' WHERE mail_id=$mail_id");		
    
    // Define allowed extensions
	
    $allowedExtentsoins = array('pdf', 'doc', 'docx', 'gif', 'jpeg', 'jpg', 'png', 'rtf', 'txt','zip','xlsx','xls','ppt','pptx','csv');
    foreach ($_FILES as $name => $file) {
        if (!$file['name'] == "") {
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
            $server_file = dirname(__FILE__) . "/../inbox/files/" . $path_part['basename'];
            move_uploaded_file($temp_name, $server_file);
            array_push($files, $server_file);



			$sql1=mysql_query("INSERT INTO myfiles(att_id,mail_id,file_name,attachment_level)
VALUES('','$lastid','$file_name','$largestlevel')");

        }
    }
	
}


echo "<script>alert('Email Sent Successfully!!!')</script>";
	    echo "<script>window.location='http://localhost/sintras/index.php/mygroupmail';</script>";


}	
}
else{
echo "<script>alert('You are not Belonging To This Group Mail!!!')</script>";
	    echo "<script>window.location='http://localhost/sintras/index.php/mygroupmail';</script>";
	
	
}
if(!$sql){
echo "<script>alert('Email Was not Sent!!!')</script>";
	    echo "<script>window.location='http://localhost/sintras/index.php/mygroupmail';</script>";

	
	
}

?>
