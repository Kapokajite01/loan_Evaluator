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
@$cat_idcountry=$_GET['cat_idcountry'];
//$cat_id1=1;

if(!is_numeric($cat_idcountry)){
$message.="Data Error |";
exit;
}

if($cat_idcountry>0){
	if($cat_idcountry == 71){
	$sql="select report_id,neighbor_country, neighbor_province,neighbor_district,subject,classification_name,dateincident,noattachments from reports WHERE neighbor_country = 'Uganda' order by report_id DESC";
	
	}
	if($cat_idcountry == 72){
	$sql="select neighbor_country, neighbor_province,neighbor_district,subject,classification_name,dateincident,noattachments from reports WHERE neighbor_country = 'BURUNDI' order by report_id DESC";
	
	}
	if($cat_idcountry == 73){
	$sql="select report_id,neighbor_country, neighbor_province,neighbor_district,subject,classification_name,dateincident,noattachments from reports WHERE neighbor_country = 'TANZANIA' order by report_id DESC";
	
	}
		if($cat_idcountry == 74){
	$sql="select report_id,neighbor_country, neighbor_province,neighbor_district,subject,classification_name,dateincident,noattachments from reports WHERE neighbor_country = 'DRC' order by report_id DESC";
	
	}
	if($cat_idcountry == 100){
$sql="select report_id,neighbor_country, neighbor_province,neighbor_district,subject,classification_name,dateincident,noattachments from  reports WHERE neighbor_country != '' order by report_id DESC";
	
	}
}


//////// collecting data from table ////////
$row=$dbo->prepare($sql);
$row->execute();
$result=$row->fetchAll(PDO::FETCH_ASSOC);
//////////////
@$main = array('data'=>$result,'value'=>array("cat_idcountry"=>"$cat_idcountry","message"=>"$message"));
echo json_encode($main);  // Json string returned 

?>
 


