<?php
error_reporting(0);

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
$email = $_POST['rec_id'];
$last = substr($email, -1);
if($last == ';'){
$email = substr_replace($email, '', -1);
}
$cc = $_POST['cc'];
$lastcc = substr($cc, -1);
if($lastcc == ';'){
$cc = substr_replace($cc, '', -1);
}
$bcc = $_POST['bcc'];
$lastbcc = substr($bcc, -1);
if($lastbcc == ';'){
$bcc = substr_replace($bcc, '', -1);
}
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

$email=str_replace(';',',',$email);

$email = explode(",",$email);

$N = count($email);

for ($i =0; $i< $N; $i++){
	$cehckemail = mysql_query("SELECT email FROM sys_users WHERE email = '$email[$i]'");
while ($rowcheck = mysql_fetch_array($cehckemail)) {

 if($email[$i] == $rowcheck['email']){
	 $exist[]=$rowcheck['email'];
	
		 }
 }
 

	
}
if (isset($exist)) { 

$cont = count($exist);

$diff= array_merge(array_diff($exist,$email),array_diff($email,$exist));
$dif = count($diff);
}
else{
$cont =-1;	
}

if($cont > 0 ){
	if($dif > 0){
	for($j = 0; $j< $cont; $j++){
	
	if (isset($_FILES) && (bool) $_FILES) {
    $files = array();
    $ext_error = "";

$rowSQL = mysql_query( "SELECT MAX( attachment_level ) AS max FROM `myfiles`;" );
$row = mysql_fetch_array( $rowSQL );
$largestlevel = $row['max'];
$largestlevel = $largestlevel+1;
			$tm = date('Y-m-d H:i:s');

			$sql=mysql_query("INSERT INTO usermails(mail_id,rec_id,sen_id,subject,message,readd,received_date,original_id)
			
VALUES('','$exist[$j]','$sender','$subject','$message','0','$tm','$last_id')");

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

}
$Mixed = $diff;
$Text = json_encode($Mixed);
$RequestText = urlencode($Text);

echo "<script>alert('Some Emails Do not Exist!!!')</script>";
	    echo "<script>window.location='http://localhost/sintras/index.php/compose?cluster=$RequestText';</script>";
}

else{

for($j = 0; $j< $cont; $j++){
	
	if (isset($_FILES) && (bool) $_FILES) {
    $files = array();
    $ext_error = "";

$rowSQL = mysql_query( "SELECT MAX( attachment_level ) AS max FROM `myfiles`;" );
$row = mysql_fetch_array( $rowSQL );
$largestlevel = $row['max'];
$largestlevel = $largestlevel+1;
			$tm = date('Y-m-d H:i:s');
			/*$l_id=mysql_query ("SELECT MAX(mail_id) AS max from usermails ");
			$row1 = mysql_fetch_array( $l_id );
			$last_id=$row1['max'];
			$last_id=$last_id;*/
			$sql=mysql_query("INSERT INTO usermails(mail_id,rec_id,sen_id,subject,message,readd,received_date,original_id)
			
VALUES('','$exist[$j]','$sender','$subject','$message','0','$tm','$last_id')");
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

}
echo "<script>alert('Email Sent Successfully!!!')</script>";
	    echo "<script>window.location='http://localhost/sintras/index.php/compose';</script>";
}
}
else{
for($s = 0; $s<$dif; $s++){
echo $diff[$s].'</br>';	
}
$Mixed = $email;
$Text = json_encode($Mixed);
$RequestText = urlencode($Text);

echo "<script>alert('Unexisting Email(s)')</script>";
	    echo "<script>window.location='http://localhost/sintras/index.php/compose?cluster=$RequestText';</script>";
	
}
//Send With Cc

if (!empty($cc)){
	$cc=str_replace(';',',',$cc);

$cc = explode(",",$cc);

$Nc = count($cc);

for ($ic =0; $ic< $Nc; $ic++){
	$cehckemailc = mysql_query("SELECT email FROM sys_users WHERE email = '$cc[$ic]'");
while ($rowcheckc = mysql_fetch_array($cehckemailc)) {

 if($cc[$ic] == $rowcheckc['email']){
	 $existc[]=$rowcheckc['email'];
	
		 }
 }
 

	
}
if (isset($existc)) { 

$contc = count($existc);

$diffc= array_merge(array_diff($existc,$cc),array_diff($cc,$existc));
$difc = count($diffc);
}
else{
$contc =-1;	
}

if($contc > 0 ){
	if($difc > 0){
	for($jc = 0; $jc< $contc; $jc++){
	
	if (isset($_FILES) && (bool) $_FILES) {
    $files = array();
    $ext_error = "";

$rowSQLc = mysql_query( "SELECT MAX( attachment_level ) AS max FROM `myfiles`;" );
$rowc = mysql_fetch_array( $rowSQLc );
$largestlevelc = $rowc['max'];
$largestlevelc = $largestlevelc+1;
			$tmc = date('Y-m-d H:i:s');
			/*$l_idc=mysql_query ("SELECT MAX(mail_id) AS max from usermails ");
			$rowc1 = mysql_fetch_array( $l_idc);
			$last_idc=$rowc1['max'];
			$last_idc=$last_idc+1;*/
			$sql=mysql_query("INSERT INTO usermails(mail_id,rec_id,sen_id,subject,message,readd,received_date,original_id,cc)
			
VALUES('','$existc[$jc]','$sender','$subject','$message','0','$tmc','$last_id','cc')");

$rowemailidc = mysql_query( "SELECT MAX( mail_id ) AS maxid FROM `usermails`;" );
$rowidc = mysql_fetch_array( $rowemailidc);
$lastidc = $rowidc['maxid'];
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
VALUES('','$lastidc','$file_name','$largestlevelc')");
	


        }
    }
	
}

}
$Mixedc = $diffc;
$Textc = json_encode($Mixedc);
$RequestTextc = urlencode($Textc);

echo "<script>alert('Some Emails Do not Exist!!!')</script>";
	    echo "<script>window.location='http://localhost/sintras/index.php/compose?clusterc=$RequestTextc';</script>";
}

else{

for($jc = 0; $jc< $contc; $jc++){
	
	if (isset($_FILES) && (bool) $_FILES) {
    $files = array();
    $ext_error = "";

$rowSQLc = mysql_query( "SELECT MAX( attachment_level ) AS max FROM `myfiles`;" );
$rowc = mysql_fetch_array( $rowSQLc );
$largestlevelc = $rowc['max'];
$largestlevelc = $largestlevelc+1;
			$tmc = date('Y-m-d H:i:s');
			/*$l_idc=mysql_query ("SELECT MAX(mail_id) AS max from usermails ");
			$rowc1 = mysql_fetch_array( $l_idc );
			$last_idc=$rowc1['max'];
			$last_idc=$last_idc+1;*/
			$sql=mysql_query("INSERT INTO usermails(mail_id,rec_id,sen_id,subject,message,readd,received_date,original_id,cc)
			
VALUES('','$existc[$jc]','$sender','$subject','$message','0','$tmc','$last_id','cc')");

$rowemailidc = mysql_query( "SELECT MAX( mail_id ) AS maxid FROM `usermails`;" );
$rowidc = mysql_fetch_array( $rowemailidc );
$lastidc = $rowidc['maxid'];
$claurianec = mysql_query("UPDATE tbl_draft SET mail_status='sent' WHERE mail_id=$mail_id");		
    
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
VALUES('','$lastidc','$file_name','$largestlevelc')");



        }
    }
	
}

}
	    echo "<script>window.location='http://localhost/sintras/index.php/compose';</script>";
}
}
else{
for($s = 0; $s<$diffc; $s++){
echo $diffc[$s].'</br>';	
}
$Mixedc = $cc;
$Textc = json_encode($Mixedc);
$RequestTextc = urlencode($Textc);

	    echo "<script>window.location='http://localhost/sintras/index.php/compose?clusterc=$RequestTextc';</script>";
	
}
	
}


//Send With BCc
if (!empty($bcc)){
	$bcc=str_replace(';',',',$bcc);

$bcc = explode(",",$bcc);

$Nbc = count($bcc);

for ($ibc =0; $ibc< $Nbc; $ibc++){
	$cehckemailbc = mysql_query("SELECT email FROM sys_users WHERE email = '$bcc[$ibc]'");
while ($rowcheckbc = mysql_fetch_array($cehckemailbc)) {

 if($bcc[$ibc] == $rowcheckbc['email']){
	 $existbc[]=$rowcheckbc['email'];
	
		 }
 }
 

	
}
if (isset($existbc)) { 

$contbc = count($existbc);

$diffbc= array_merge(array_diff($existbc,$bcc),array_diff($bcc,$existbc));
$difbc = count($diffbc);
}
else{
$contbc =-1;	
}

if($contbc > 0 ){
	if($difbc > 0){
	for($jbc = 0; $jbc< $contbc; $jbc++){
	
	if (isset($_FILES) && (bool) $_FILES) {
    $files = array();
    $ext_error = "";

$rowSQLc = mysql_query( "SELECT MAX( attachment_level ) AS max FROM `myfiles`;" );
$rowbc = mysql_fetch_array( $rowSQLc );
$largestlevelbc = $rowbc['max'];
$largestlevelbc = $largestlevelbc+1;
			$tmbc = date('Y-m-d H:i:s');
			/*$l_idbc=mysql_query ("SELECT MAX(mail_id) AS max from usermails ");
			$rowbc1 = mysql_fetch_array( $l_idbc);
			$last_idc=$rowbc1['max'];
			$last_idc=$last_idc+1;*/
			$sqlbc=mysql_query("INSERT INTO usermails(mail_id,rec_id,sen_id,subject,message,readd,received_date,original_id,bcc)
			
VALUES('','$existbc[$jbc]','$sender','$subject','$message','0','$tmbc','$last_id','bcc')");

$rowemailidc = mysql_query( "SELECT MAX( mail_id ) AS maxid FROM `usermails`;" );
$rowidc = mysql_fetch_array( $rowemailidc);
$lastidc = $rowidc['maxid'];
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
VALUES('','$lastidc','$file_name','$largestlevelbc')");
	


        }
    }
	
}

}
$Mixedc = $diffbc;
$Textc = json_encode($Mixedc);
$RequestTextc = urlencode($Textc);

echo "<script>alert('Some Emails Do not Exist!!!')</script>";
	    echo "<script>window.location='http://localhost/sintras/index.php/compose?clusterc=$RequestTextc';</script>";
}

else{

for($jbc = 0; $jbc< $contbc; $jbc++){
	
	if (isset($_FILES) && (bool) $_FILES) {
    $files = array();
    $ext_error = "";

$rowSQLc = mysql_query( "SELECT MAX( attachment_level ) AS max FROM `myfiles`;" );
$rowbc = mysql_fetch_array( $rowSQLc );
$largestlevelbc = $rowbc['max'];
$largestlevelbc = $largestlevelbc+1;
			$tmbc = date('Y-m-d H:i:s');
			/*$l_idbc=mysql_query ("SELECT MAX(mail_id) AS max from usermails ");
			$rowbc1 = mysql_fetch_array( $l_idbc );
			$last_idc=$rowbc1['max'];
			$last_idc=$last_idc+1;*/
			$sqlbc=mysql_query("INSERT INTO usermails(mail_id,rec_id,sen_id,subject,message,readd,received_date,original_id,bcc)
			
VALUES('','$existbc[$jbc]','$sender','$subject','$message','0','$tmbc','$last_id','bcc')");

$rowemailidc = mysql_query( "SELECT MAX( mail_id ) AS maxid FROM `usermails`;" );
$rowidc = mysql_fetch_array( $rowemailidc );
$lastidc = $rowidc['maxid'];
$claurianebc = mysql_query("UPDATE tbl_draft SET mail_status='sent' WHERE mail_id=$mail_id");		
    
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
VALUES('','$lastidc','$file_name','$largestlevelbc')");
	


        }
    }
	
}

}
	    echo "<script>window.location='http://localhost/sintras/index.php/compose';</script>";
}
}
else{
for($bs = 0; $bs<$diffbc; $bs++){
echo $diffbc[$bs].'</br>';	
}
$Mixedbc = $bcc;
$Textbc = json_encode($Mixedbc);
$RequestTextbc = urlencode($Textbc);

	    echo "<script>window.location='http://localhost/sintras/index.php/compose?clusterc=$RequestTextbc';</script>";
	
}
	
}

?>
<script src="js/jquery.js"></script>