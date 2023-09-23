<?Php
//***************************************
// This is downloaded from www.plus2net.com //
/// You can distribute this code with the link to www.plus2net.com ///
//  Please don't  remove the link to www.plus2net.com ///
// This is for your learning only not for commercial use. ///////
//The author is not responsible for any type of loss or problem or damage on using this script.//
/// You can use it at your own risk. /////
//*****************************************
// 
//error_reporting(E_ERROR | E_PARSE | E_CORE_ERROR);
////// Your Database Details here /////////
////////////////////////////
require "config.php"; // Database Connection 
///////////////////////////
//////////////////////////////// Main Code sarts /////////////////////////////////////////////
@$cat_id1=$_GET['cat_id1'];
//$cat_id1=1;

if(!is_numeric($cat_id1)){
$message.="Data Error |";
exit;
}

if($cat_id1>0){
$sql="select report_id,povince_name, district_name,sector_name,cell_name,subject,classification_name,dateincident,noattachments,Status from reports WHERE district = '$cat_id1' order by report_id DESC";
}else{
$sql="select report_id,povince_name, district_name,sector_name,cell_name,subject,classification_name,dateincident,noattachments,Status from  reports order by report_id DESC";
$cat_id1=0;
}
//////// collecting data from table ////////
$row=$dbo->prepare($sql);
$row->execute();
$result=$row->fetchAll(PDO::FETCH_ASSOC);
//////////////
@$main = array('data'=>$result,'value'=>array("cat_id1"=>"$cat_id1","message"=>"$message"));
echo json_encode($main);  // Json string returned 

?>
 


