<?php 
error_reporting(0);

session_start();
$userid = $_SESSION['userid'];
if(!$userid){
	header('location:../logout');
}
include('../mydb_connection/my_connect_db.php');
include'../mydb_connection/my_dbconnection.php';
include'../mydb_connection/My_dbinsert.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Loan Statistics</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../vendors/iconfonts/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="../vendors/css/vendor.bundle.addons.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../css/style.css">
  <!-- endinject -->

	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="../images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/noui/nouislider.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../css/util.css">
	<link rel="stylesheet" type="text/css" href="../css/main.css">
<!--===============================================================================================-->
<!--===============================================================================================-->
		<meta name="description" content="Mailbox with some customizations as described in docs" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<link rel="stylesheet" href="../assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="../assets/font-awesome/4.5.0/css/font-awesome.min.css" />
		<link rel="stylesheet" href="../assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />
	<body class="no-skin" oncontextmenu="return false">
	
 <script type="text/javascript" src="../date_time.js"></script>
 
 
													
<?php include'../left_statistics.php';?>
<form action="" method="POST">
 <table>
 <tr><td></td><td></td><td></td><td><select class="js-select2" name="loantype"  style="border-color:black"  Required>
							<option value="">Select Product</option>
							<option value= "All" >All</option>
							<option value= "Advance Salary" >Advance Salary</option>
							<option value= "Commercial Loan" >Commerical Loan</option>
							<option value= "Investment Group" >Investment Group Loan/ Cooperatives</option>
						</select></td><td></td><td></td></tr>
 
 
 <tr><td><Strong>From - </strong></td><td><select name="fromDOBMonth" id="DOBMonth" required>
<option value="">-Month-</option>
<option value="01">January</option>
<option value="02">Febuary</option>
<option value="03">March</option>
<option value="04">April</option>
<option value="05">May</option>
<option value="06">June</option>
<option value="07">July</option>
<option value="08">August</option>
<option value="09">September</option>
<option value="10">October</option>
<option value="11">November</option>
<option value="12">December</option>
</select></td><td><select name="fromDOBDayear" id="DOBYear" required>
<option value="">- Year-</option>
<option value="2025">2025</option>
<option value="2024">2024</option>
<option value="2023">2023</option>
<option value="2022">2022</option>
<option value="2021">2021</option>
<option value="2020">2020</option>
<option value="2019">2019</option>


</select></td><td></td><td><Strong>To - </strong> <select name="toDOBMonth" id="DOBMonth"required>
<option value="">-Month-</option>
<option value="01">January</option>
<option value="02">Febuary</option>
<option value="03">March</option>
<option value="04">April</option>
<option value="05">May</option>
<option value="06">June</option>
<option value="07">July</option>
<option value="08">August</option>
<option value="09">September</option>
<option value="10">October</option>
<option value="11">November</option>
<option value="12">December</option>
</select></td><td><select name="toDOBDayear" id="DOBYear"required>
<option value="">- Year-</option>
<option value="2025">2025</option>
<option value="2024">2024</option>
<option value="2023">2023</option>
<option value="2022">2022</option>
<option value="2021">2021</option>
<option value="2020">2020</option>
<option value="2019">2019</option>

</select></td><td><input type="submit" class="button" name="datedisplay" value="Submit"></td></tr></table>
</form>
<?php
$m = date(m);
$Y =date(Y);
$ctruncate = "TRUNCATE chart";
$conn->query($ctruncate);
//Select For January
  		$januarycl = "SELECT loan_tracknumber,loan_account,loan_term_type,loan_term_number,loan_interest,first_payment,last_payment,loan_type,loan_amount FROM  loan_details where (loan_type = 'Commercial Loan') AND (first_payment <= '$Y-01-31' and last_payment >='$Y-01-01')  AND (loan_status ='Deny') ORDER  BY first_payment ";
if ($resultjanuarycl=mysqli_query($con,$januarycl))
  {
while($row= $resultjanuarycl->fetch_assoc()) {
	 $tp = $row['loan_term_type'];
 $nmbr = $row['loan_term_number'];
if($tp == 'Year'){
	 $nmbr =$nmbr*12;
 }
 if($tp == 'Month'){
	 	 $nmbr =$nmbr;
 }
	$irate = $row['loan_interest'];
	$loan_amount = $row['loan_amount'];

	 $pymtjanuarycl = (($row['loan_interest'] /(100 * 12)) * $row['loan_amount']) / (1 - pow(1 + $row['loan_interest'] / 1200,  (-($nmbr))));
$pymtjanuarycl= round($pymtjanuarycl);
//echo number_format($$numjanuary ,2);
$totalcl= $totalcl + $pymtjanuarycl;

  }
  }
  if(!$totalcl){
	$totalcl=0;  
  }
  
  		$januaryAS = "SELECT loan_tracknumber,loan_account,loan_term_type,loan_term_number,loan_interest,first_payment,last_payment,loan_type,loan_amount FROM  loan_details where (loan_type = 'Advance Salary') AND (first_payment <= '$Y-01-31' and last_payment >='$Y-01-01')  AND (loan_status ='Deny') ORDER  BY first_payment ";
if ($resultas=mysqli_query($con,$januaryAS))
  {
while($row= $resultas->fetch_assoc()) {
	 $tp = $row['loan_term_type'];
 $nmbr = $row['loan_term_number'];
if($tp == 'Year'){
	 $nmbr =$nmbr*12;
 }
 if($tp == 'Month'){
	 	 $nmbr =$nmbr;
 }
	$irate = $row['loan_interest'];
	$loan_amount = $row['loan_amount'];

	 $pymtjanuaryas = (($row['loan_interest'] /(100 * 12)) * $row['loan_amount']) / (1 - pow(1 + $row['loan_interest'] / 1200,  (-($nmbr))));
$pymtjanuaryas= round($pymtjanuaryas);
//echo number_format($$numjanuary ,2);
$totalas= $totalas + $pymtjanuaryas;

  }
  }
  if(!$totalas){
	$totalas=0;  
  }
   
  		$januaryIG = "SELECT loan_tracknumber,loan_account,loan_term_type,loan_term_number,loan_interest,first_payment,last_payment,loan_type,loan_amount FROM  loan_details where (loan_type = 'Investment Group') AND (first_payment <= '$Y-01-31' and last_payment >='$Y-01-01')  AND (loan_status ='Deny') ORDER  BY first_payment ";
if ($resultIG=mysqli_query($con,$januaryIG))
  {
while($row= $resultIG->fetch_assoc()) {
	 $tp = $row['loan_term_type'];
 $nmbr = $row['loan_term_number'];
if($tp == 'Year'){
	 $nmbr =$nmbr*12;
 }
 if($tp == 'Month'){
	 	 $nmbr =$nmbr;
 }
	$irate = $row['loan_interest'];
	$loan_amount = $row['loan_amount'];

	 $pymtjanuaryIG = (($row['loan_interest'] /(100 * 12)) * $row['loan_amount']) / (1 - pow(1 + $row['loan_interest'] / 1200,  (-($nmbr))));
$pymtjanuaryIG= round($pymtjanuaryIG);
//echo number_format($$numjanuary ,2);
$totalIG= $totalIG + $pymtjanuaryIG;

  }
  }
  if(!$totalIG){
	$totalIG=0;  
  }
  $insertjanuary = "insert into chart(variation_name,keywords,keywords2,keywords3,fist_value,second_value,third_value)VALUES ('January $thyear','Commercial Loan','Advance Salary','Investment Group','$totalcl','$totalas','$totalIG')";
		$conn->query($insertjanuary); 
		
//Select For February
  		$februarycl = "SELECT loan_tracknumber,loan_account,loan_term_type,loan_term_number,loan_interest,first_payment,last_payment,loan_type,loan_amount FROM  loan_details where (loan_type = 'Commercial Loan') AND (first_payment <= '$Y-02-29' and last_payment >='$Y-02-01')  AND (loan_status ='Deny') ORDER  BY first_payment ";
if ($resultfebruarycl=mysqli_query($con,$februarycl))
  {
while($row= $resultfebruarycl->fetch_assoc()) {
	 $tp = $row['loan_term_type'];
 $nmbr = $row['loan_term_number'];
if($tp == 'Year'){
	 $nmbr =$nmbr*12;
 }
 if($tp == 'Month'){
	 	 $nmbr =$nmbr;
 }
	$irate = $row['loan_interest'];
	$loan_amount = $row['loan_amount'];

	 $pymtfebruarycl = (($row['loan_interest'] /(100 * 12)) * $row['loan_amount']) / (1 - pow(1 + $row['loan_interest'] / 1200,  (-($nmbr))));
$pymtfebruarycl= round($pymtfebruarycl);
//echo number_format($$numfebruary ,2);
$totalfebruarycl= $totalfebruarycl + $pymtfebruarycl;

  }
  }
  if(!$totalfebruarycl){
	$totalfebruarycl=0;  
  }
  
  		$februaryAS = "SELECT loan_tracknumber,loan_account,loan_term_type,loan_term_number,loan_interest,first_payment,last_payment,loan_type,loan_amount FROM  loan_details where (loan_type = 'Advance Salary') AND (first_payment <= '$Y-02-29' and last_payment >='$Y-02-01')  AND (loan_status ='Deny') ORDER  BY first_payment ";
if ($resultas=mysqli_query($con,$februaryAS))
  {
while($row= $resultas->fetch_assoc()) {
	 $tp = $row['loan_term_type'];
 $nmbr = $row['loan_term_number'];
if($tp == 'Year'){
	 $nmbr =$nmbr*12;
 }
 if($tp == 'Month'){
	 	 $nmbr =$nmbr;
 }
	$irate = $row['loan_interest'];
	$loan_amount = $row['loan_amount'];

	 $pymtfebruaryas = (($row['loan_interest'] /(100 * 12)) * $row['loan_amount']) / (1 - pow(1 + $row['loan_interest'] / 1200,  (-($nmbr))));
$pymtfebruaryas= round($pymtfebruaryas);
//echo number_format($$numfebruary ,2);
$totalfebruaryas= $totalfebruaryas + $pymtfebruaryas;

  }
  }
  if(!$totalfebruaryas){
	$totalfebruaryas=0;  
  }
   
  		$februaryIG = "SELECT loan_tracknumber,loan_account,loan_term_type,loan_term_number,loan_interest,first_payment,last_payment,loan_type,loan_amount FROM  loan_details where (loan_type = 'Investment Group') AND (first_payment <= '$Y-02-29' and last_payment >='$Y-02-01')  AND (loan_status ='Deny') ORDER  BY first_payment ";
if ($resultIG=mysqli_query($con,$februaryIG))
  {
while($row= $resultIG->fetch_assoc()) {
	 $tp = $row['loan_term_type'];
 $nmbr = $row['loan_term_number'];
if($tp == 'Year'){
	 $nmbr =$nmbr*12;
 }
 if($tp == 'Month'){
	 	 $nmbr =$nmbr;
 }
	$irate = $row['loan_interest'];
	$loan_amount = $row['loan_amount'];

	 $pymtfebruaryIG = (($row['loan_interest'] /(100 * 12)) * $row['loan_amount']) / (1 - pow(1 + $row['loan_interest'] / 1200,  (-($nmbr))));
$pymtfebruaryIG= round($pymtfebruaryIG);
//echo number_format($$numfebruary ,2);
$totalfebruaryIG= $totalfebruaryIG + $pymtfebruaryIG;

  }
  }
  if(!$totalfebruaryIG){
	$totalfebruaryIG=0;  
  }
  $insertfebruary = "insert into chart(variation_name,keywords,keywords2,keywords3,fist_value,second_value,third_value)VALUES ('February $thyear','Commercial Loan','Advance Salary','Investment Group','$totalfebruarycl','$totalfebruaryas','$totalfebruaryIG')";
		$conn->query($insertfebruary);
		
		
//Select For March
  		$marchcl = "SELECT loan_tracknumber,loan_account,loan_term_type,loan_term_number,loan_interest,first_payment,last_payment,loan_type,loan_amount FROM  loan_details where (loan_type = 'Commercial Loan') AND (first_payment <= '$Y-03-31' and last_payment >='$Y-03-01')  AND (loan_status ='Deny') ORDER  BY first_payment ";
if ($resultmarchcl=mysqli_query($con,$marchcl))
  {
while($row= $resultmarchcl->fetch_assoc()) {
	 $tp = $row['loan_term_type'];
 $nmbr = $row['loan_term_number'];
if($tp == 'Year'){
	 $nmbr =$nmbr*12;
 }
 if($tp == 'Month'){
	 	 $nmbr =$nmbr;
 }
	$irate = $row['loan_interest'];
	$loan_amount = $row['loan_amount'];

	 $pymtmarchcl = (($row['loan_interest'] /(100 * 12)) * $row['loan_amount']) / (1 - pow(1 + $row['loan_interest'] / 1200,  (-($nmbr))));
$pymtmarchcl= round($pymtmarchcl);
//echo number_format($$nummarch ,2);
$totalmarchcl= $totalmarchcl + $pymtmarchcl;

  }
  }
  if(!$totalmarchcl){
	$totalmarchcl=0;  
  }
  
  		$marchAS = "SELECT loan_tracknumber,loan_account,loan_term_type,loan_term_number,loan_interest,first_payment,last_payment,loan_type,loan_amount FROM  loan_details where (loan_type = 'Advance Salary') AND (first_payment <= '$Y-03-31' and last_payment >='$Y-03-01')  AND (loan_status ='Deny') ORDER  BY first_payment ";
if ($resultas=mysqli_query($con,$marchAS))
  {
while($row= $resultas->fetch_assoc()) {
	 $tp = $row['loan_term_type'];
 $nmbr = $row['loan_term_number'];
if($tp == 'Year'){
	 $nmbr =$nmbr*12;
 }
 if($tp == 'Month'){
	 	 $nmbr =$nmbr;
 }
	$irate = $row['loan_interest'];
	$loan_amount = $row['loan_amount'];

	 $pymtmarchas = (($row['loan_interest'] /(100 * 12)) * $row['loan_amount']) / (1 - pow(1 + $row['loan_interest'] / 1200,  (-($nmbr))));
$pymtmarchas= round($pymtmarchas);
//echo number_format($$nummarch ,2);
$totalmarchas= $totalmarchas + $pymtmarchas;

  }
  }
  if(!$totalmarchas){
	$totalmarchas=0;  
  }
   
  		$marchIG = "SELECT loan_tracknumber,loan_account,loan_term_type,loan_term_number,loan_interest,first_payment,last_payment,loan_type,loan_amount FROM  loan_details where (loan_type = 'Investment Group') AND (first_payment <= '$Y-03-31' and last_payment >='$Y-03-01')  AND (loan_status ='Deny') ORDER  BY first_payment ";
if ($resultIG=mysqli_query($con,$marchIG))
  {
while($row= $resultIG->fetch_assoc()) {
	 $tp = $row['loan_term_type'];
 $nmbr = $row['loan_term_number'];
if($tp == 'Year'){
	 $nmbr =$nmbr*12;
 }
 if($tp == 'Month'){
	 	 $nmbr =$nmbr;
 }
	$irate = $row['loan_interest'];
	$loan_amount = $row['loan_amount'];

	 $pymtmarchIG = (($row['loan_interest'] /(100 * 12)) * $row['loan_amount']) / (1 - pow(1 + $row['loan_interest'] / 1200,  (-($nmbr))));
$pymtmarchIG= round($pymtmarchIG);
//echo number_format($$nummarch ,2);
$totalmarchIG= $totalmarchIG + $pymtmarchIG;

  }
  }
  if(!$totalmarchIG){
	$totalmarchIG=0;  
  }
  $insertmarch = "insert into chart(variation_name,keywords,keywords2,keywords3,fist_value,second_value,third_value)VALUES ('March $thyear','Commercial Loan','Advance Salary','Investment Group','$totalmarchcl','$totalmarchas','$totalmarchIG')";
		$conn->query($insertmarch);
		
		
		
//Select For April
  		$aprilcl = "SELECT loan_tracknumber,loan_account,loan_term_type,loan_term_number,loan_interest,first_payment,last_payment,loan_type,loan_amount FROM  loan_details where (loan_type = 'Commercial Loan') AND (first_payment <= '$Y-04-30' and last_payment >='$Y-04-01')  AND (loan_status ='Deny') ORDER  BY first_payment ";
if ($resultaprilcl=mysqli_query($con,$aprilcl))
  {
while($row= $resultaprilcl->fetch_assoc()) {
	 $tp = $row['loan_term_type'];
 $nmbr = $row['loan_term_number'];
if($tp == 'Year'){
	 $nmbr =$nmbr*12;
 }
 if($tp == 'Month'){
	 	 $nmbr =$nmbr;
 }
	$irate = $row['loan_interest'];
	$loan_amount = $row['loan_amount'];

	 $pymtaprilcl = (($row['loan_interest'] /(100 * 12)) * $row['loan_amount']) / (1 - pow(1 + $row['loan_interest'] / 1200,  (-($nmbr))));
$pymtaprilcl= round($pymtaprilcl);
//echo number_format($$numapril ,2);
$totalaprilcl= $totalaprilcl + $pymtaprilcl;

  }
  }
  if(!$totalaprilcl){
	$totalaprilcl=0;  
  }
  
  		$aprilAS = "SELECT loan_tracknumber,loan_account,loan_term_type,loan_term_number,loan_interest,first_payment,last_payment,loan_type,loan_amount FROM  loan_details where (loan_type = 'Advance Salary') AND (first_payment <= '$Y-04-30' and last_payment >='$Y-04-01')  AND (loan_status ='Deny') ORDER  BY first_payment ";
if ($resultas=mysqli_query($con,$aprilAS))
  {
while($row= $resultas->fetch_assoc()) {
	 $tp = $row['loan_term_type'];
 $nmbr = $row['loan_term_number'];
if($tp == 'Year'){
	 $nmbr =$nmbr*12;
 }
 if($tp == 'Month'){
	 	 $nmbr =$nmbr;
 }
	$irate = $row['loan_interest'];
	$loan_amount = $row['loan_amount'];

	 $pymtaprilas = (($row['loan_interest'] /(100 * 12)) * $row['loan_amount']) / (1 - pow(1 + $row['loan_interest'] / 1200,  (-($nmbr))));
$pymtaprilas= round($pymtaprilas);
//echo number_format($$numapril ,2);
$totalaprilas= $totalaprilas + $pymtaprilas;

  }
  }
  if(!$totalaprilas){
	$totalaprilas=0;  
  }
   
  		$aprilIG = "SELECT loan_tracknumber,loan_account,loan_term_type,loan_term_number,loan_interest,first_payment,last_payment,loan_type,loan_amount FROM  loan_details where (loan_type = 'Investment Group') AND (first_payment <= '$Y-04-30' and last_payment >='$Y-04-01')  AND (loan_status ='Deny') ORDER  BY first_payment ";
if ($resultIG=mysqli_query($con,$aprilIG))
  {
while($row= $resultIG->fetch_assoc()) {
	 $tp = $row['loan_term_type'];
 $nmbr = $row['loan_term_number'];
if($tp == 'Year'){
	 $nmbr =$nmbr*12;
 }
 if($tp == 'Month'){
	 	 $nmbr =$nmbr;
 }
	$irate = $row['loan_interest'];
	$loan_amount = $row['loan_amount'];

	 $pymtaprilIG = (($row['loan_interest'] /(100 * 12)) * $row['loan_amount']) / (1 - pow(1 + $row['loan_interest'] / 1200,  (-($nmbr))));
$pymtaprilIG= round($pymtaprilIG);
//echo number_format($$numapril ,2);
$totalaprilIG= $totalaprilIG + $pymtaprilIG;

  }
  }
  if(!$totalaprilIG){
	$totalaprilIG=0;  
  }
  $insertapril = "insert into chart(variation_name,keywords,keywords2,keywords3,fist_value,second_value,third_value)VALUES ('April $thyear','Commercial Loan','Advance Salary','Investment Group','$totalaprilcl','$totalaprilas','$totalaprilIG')";
		$conn->query($insertapril);
		
		
		
//Select For May
  		$maycl = "SELECT loan_tracknumber,loan_account,loan_term_type,loan_term_number,loan_interest,first_payment,last_payment,loan_type,loan_amount FROM  loan_details where (loan_type = 'Commercial Loan') AND (first_payment <= '$Y-05-31' and last_payment >='$Y-05-01')  AND (loan_status ='Deny') ORDER  BY first_payment ";
if ($resultmaycl=mysqli_query($con,$maycl))
  {
while($row= $resultmaycl->fetch_assoc()) {
	 $tp = $row['loan_term_type'];
 $nmbr = $row['loan_term_number'];
if($tp == 'Year'){
	 $nmbr =$nmbr*12;
 }
 if($tp == 'Month'){
	 	 $nmbr =$nmbr;
 }
	$irate = $row['loan_interest'];
	$loan_amount = $row['loan_amount'];

	 $pymtmaycl = (($row['loan_interest'] /(100 * 12)) * $row['loan_amount']) / (1 - pow(1 + $row['loan_interest'] / 1200,  (-($nmbr))));
$pymtmaycl= round($pymtmaycl);
//echo number_format($$nummay ,2);
$totalmaycl= $totalmaycl + $pymtmaycl;

  }
  }
  if(!$totalmaycl){
	$totalmaycl=0;  
  }
  
  		$mayAS = "SELECT loan_tracknumber,loan_account,loan_term_type,loan_term_number,loan_interest,first_payment,last_payment,loan_type,loan_amount FROM  loan_details where (loan_type = 'Advance Salary') AND (first_payment <= '$Y-05-31' and last_payment >='$Y-05-01')  AND (loan_status ='Deny') ORDER  BY first_payment ";
if ($resultas=mysqli_query($con,$mayAS))
  {
while($row= $resultas->fetch_assoc()) {
	 $tp = $row['loan_term_type'];
 $nmbr = $row['loan_term_number'];
if($tp == 'Year'){
	 $nmbr =$nmbr*12;
 }
 if($tp == 'Month'){
	 	 $nmbr =$nmbr;
 }
	$irate = $row['loan_interest'];
	$loan_amount = $row['loan_amount'];

	 $pymtmayas = (($row['loan_interest'] /(100 * 12)) * $row['loan_amount']) / (1 - pow(1 + $row['loan_interest'] / 1200,  (-($nmbr))));
$pymtmayas= round($pymtmayas);
//echo number_format($$nummay ,2);
$totalmayas= $totalmayas + $pymtmayas;

  }
  }
  if(!$totalmayas){
	$totalmayas=0;  
  }
   
  		$mayIG = "SELECT loan_tracknumber,loan_account,loan_term_type,loan_term_number,loan_interest,first_payment,last_payment,loan_type,loan_amount FROM  loan_details where (loan_type = 'Investment Group') AND (first_payment <= '$Y-05-31' and last_payment >='$Y-05-01')  AND (loan_status ='Deny') ORDER  BY first_payment ";
if ($resultIG=mysqli_query($con,$mayIG))
  {
while($row= $resultIG->fetch_assoc()) {
	 $tp = $row['loan_term_type'];
 $nmbr = $row['loan_term_number'];
if($tp == 'Year'){
	 $nmbr =$nmbr*12;
 }
 if($tp == 'Month'){
	 	 $nmbr =$nmbr;
 }
	$irate = $row['loan_interest'];
	$loan_amount = $row['loan_amount'];

	 $pymtmayIG = (($row['loan_interest'] /(100 * 12)) * $row['loan_amount']) / (1 - pow(1 + $row['loan_interest'] / 1200,  (-($nmbr))));
$pymtmayIG= round($pymtmayIG);
//echo number_format($$nummay ,2);
$totalmayIG= $totalmayIG + $pymtmayIG;

  }
  }
  if(!$totalmayIG){
	$totalmayIG=0;  
  }
  $insertmay = "insert into chart(variation_name,keywords,keywords2,keywords3,fist_value,second_value,third_value)VALUES ('May $thyear','Commercial Loan','Advance Salary','Investment Group','$totalmaycl','$totalmayas','$totalmayIG')";
		$conn->query($insertmay);
		
		
		
//Select For JUNE
$junecl = "SELECT loan_tracknumber,loan_account,loan_term_type,loan_term_number,loan_interest,first_payment,last_payment,loan_type,loan_amount FROM  loan_details where (loan_type = 'Commercial Loan') AND (first_payment <= '$Y-06-30' and last_payment >='$Y-06-01')  AND (loan_status ='Deny') ORDER  BY first_payment ";
if ($resultjunecl=mysqli_query($con,$junecl))
  {
while($row= $resultjunecl->fetch_assoc()) {
	 $tp = $row['loan_term_type'];
 $nmbr = $row['loan_term_number'];
if($tp == 'Year'){
	 $nmbr =$nmbr*12;
 }
 if($tp == 'Month'){
	 	 $nmbr =$nmbr;
 }
	$irate = $row['loan_interest'];
	$loan_amount = $row['loan_amount'];

	 $pymtjunecl = (($row['loan_interest'] /(100 * 12)) * $row['loan_amount']) / (1 - pow(1 + $row['loan_interest'] / 1200,  (-($nmbr))));
$pymtjunecl= round($pymtjunecl);
//echo number_format($$numjune ,2);
$totaljunecl= $totaljunecl + $pymtjunecl;

  }
  }
  if(!$totaljunecl){
	$totaljunecl=0;  
  }
  
  		$juneAS = "SELECT loan_tracknumber,loan_account,loan_term_type,loan_term_number,loan_interest,first_payment,last_payment,loan_type,loan_amount FROM  loan_details where (loan_type = 'Advance Salary') AND (first_payment <= '$Y-06-30' and last_payment >='$Y-06-01')  AND (loan_status ='Deny') ORDER  BY first_payment ";
if ($resultas=mysqli_query($con,$juneAS))
  {
while($row= $resultas->fetch_assoc()) {
	 $tp = $row['loan_term_type'];
 $nmbr = $row['loan_term_number'];
if($tp == 'Year'){
	 $nmbr =$nmbr*12;
 }
 if($tp == 'Month'){
	 	 $nmbr =$nmbr;
 }
	$irate = $row['loan_interest'];
	$loan_amount = $row['loan_amount'];

	 $pymtjuneas = (($row['loan_interest'] /(100 * 12)) * $row['loan_amount']) / (1 - pow(1 + $row['loan_interest'] / 1200,  (-($nmbr))));
$pymtjuneas= round($pymtjuneas);
//echo number_format($$numjune ,2);
$totaljuneas= $totaljuneas + $pymtjuneas;

  }
  }
  if(!$totaljuneas){
	$totaljuneas=0;  
  }
   
  		$juneIG = "SELECT loan_tracknumber,loan_account,loan_term_type,loan_term_number,loan_interest,first_payment,last_payment,loan_type,loan_amount FROM  loan_details where (loan_type = 'Investment Group') AND (first_payment <= '$Y-06-30' and last_payment >='$Y-06-01')  AND (loan_status ='Deny') ORDER  BY first_payment ";
if ($resultIG=mysqli_query($con,$juneIG))
  {
while($row= $resultIG->fetch_assoc()) {
	 $tp = $row['loan_term_type'];
 $nmbr = $row['loan_term_number'];
if($tp == 'Year'){
	 $nmbr =$nmbr*12;
 }
 if($tp == 'Month'){
	 	 $nmbr =$nmbr;
 }
	$irate = $row['loan_interest'];
	$loan_amount = $row['loan_amount'];

	 $pymtjuneIG = (($row['loan_interest'] /(100 * 12)) * $row['loan_amount']) / (1 - pow(1 + $row['loan_interest'] / 1200,  (-($nmbr))));
$pymtjuneIG= round($pymtjuneIG);
//echo number_format($$numjune ,2);
$totaljuneIG= $totaljuneIG + $pymtjuneIG;

  }
  }
  if(!$totaljuneIG){
	$totaljuneIG=0;  
  }
  $insertjune = "insert into chart(variation_name,keywords,keywords2,keywords3,fist_value,second_value,third_value)VALUES ('June $thyear','Commercial Loan','Advance Salary','Investment Group','$totaljunecl','$totaljuneas','$totaljuneIG')";
		$conn->query($insertjune);
		
		

//Select For JULY
$julycl = "SELECT loan_tracknumber,loan_account,loan_term_type,loan_term_number,loan_interest,first_payment,last_payment,loan_type,loan_amount FROM  loan_details where (loan_type = 'Commercial Loan') AND (first_payment <= '$Y-07-31' and last_payment >='$Y-07-01')  AND (loan_status ='Deny') ORDER  BY first_payment ";
if ($resultjulycl=mysqli_query($con,$julycl))
  {
while($row= $resultjulycl->fetch_assoc()) {
	 $tp = $row['loan_term_type'];
 $nmbr = $row['loan_term_number'];
if($tp == 'Year'){
	 $nmbr =$nmbr*12;
 }
 if($tp == 'Month'){
	 	 $nmbr =$nmbr;
 }
	$irate = $row['loan_interest'];
	$loan_amount = $row['loan_amount'];

	 $pymtjulycl = (($row['loan_interest'] /(100 * 12)) * $row['loan_amount']) / (1 - pow(1 + $row['loan_interest'] / 1200,  (-($nmbr))));
$pymtjulycl= round($pymtjulycl);
//echo number_format($$numjuly ,2);
$totaljulycl= $totaljulycl + $pymtjulycl;

  }
  }
  if(!$totaljulycl){
	$totaljulycl=0;  
  }
  
  		$julyAS = "SELECT loan_tracknumber,loan_account,loan_term_type,loan_term_number,loan_interest,first_payment,last_payment,loan_type,loan_amount FROM  loan_details where (loan_type = 'Advance Salary') AND (first_payment <= '$Y-07-31' and last_payment >='$Y-07-01')  AND (loan_status ='Deny') ORDER  BY first_payment ";
if ($resultas=mysqli_query($con,$julyAS))
  {
while($row= $resultas->fetch_assoc()) {
	 $tp = $row['loan_term_type'];
 $nmbr = $row['loan_term_number'];
if($tp == 'Year'){
	 $nmbr =$nmbr*12;
 }
 if($tp == 'Month'){
	 	 $nmbr =$nmbr;
 }
	$irate = $row['loan_interest'];
	$loan_amount = $row['loan_amount'];

	 $pymtjulyas = (($row['loan_interest'] /(100 * 12)) * $row['loan_amount']) / (1 - pow(1 + $row['loan_interest'] / 1200,  (-($nmbr))));
$pymtjulyas= round($pymtjulyas);
//echo number_format($$numjuly ,2);
$totaljulyas= $totaljulyas + $pymtjulyas;

  }
  }
  if(!$totaljulyas){
	$totaljulyas=0;  
  }
   
  		$julyIG = "SELECT loan_tracknumber,loan_account,loan_term_type,loan_term_number,loan_interest,first_payment,last_payment,loan_type,loan_amount FROM  loan_details where (loan_type = 'Investment Group') AND (first_payment <= '$Y-07-31' and last_payment >='$Y-07-01')  AND (loan_status ='Deny') ORDER  BY first_payment ";
if ($resultIG=mysqli_query($con,$julyIG))
  {
while($row= $resultIG->fetch_assoc()) {
	 $tp = $row['loan_term_type'];
 $nmbr = $row['loan_term_number'];
if($tp == 'Year'){
	 $nmbr =$nmbr*12;
 }
 if($tp == 'Month'){
	 	 $nmbr =$nmbr;
 }
	$irate = $row['loan_interest'];
	$loan_amount = $row['loan_amount'];

	 $pymtjulyIG = (($row['loan_interest'] /(100 * 12)) * $row['loan_amount']) / (1 - pow(1 + $row['loan_interest'] / 1200,  (-($nmbr))));
$pymtjulyIG= round($pymtjulyIG);
//echo number_format($$numjuly ,2);
$totaljulyIG= $totaljulyIG + $pymtjulyIG;

  }
  }
  if(!$totaljulyIG){
	$totaljulyIG=0;  
  }
  $insertjuly = "insert into chart(variation_name,keywords,keywords2,keywords3,fist_value,second_value,third_value)VALUES ('July $thyear','Commercial Loan','Advance Salary','Investment Group','$totaljulycl','$totaljulyas','$totaljulyIG')";
		$conn->query($insertjuly);
		
		

//Select For AUGUST
$augustcl = "SELECT loan_tracknumber,loan_account,loan_term_type,loan_term_number,loan_interest,first_payment,last_payment,loan_type,loan_amount FROM  loan_details where (loan_type = 'Commercial Loan') AND (first_payment <= '$Y-08-31' and last_payment >='$Y-08-01')  AND (loan_status ='Deny') ORDER  BY first_payment ";
if ($resultaugustcl=mysqli_query($con,$augustcl))
  {
while($row= $resultaugustcl->fetch_assoc()) {
	 $tp = $row['loan_term_type'];
 $nmbr = $row['loan_term_number'];
if($tp == 'Year'){
	 $nmbr =$nmbr*12;
 }
 if($tp == 'Month'){
	 	 $nmbr =$nmbr;
 }
	$irate = $row['loan_interest'];
	$loan_amount = $row['loan_amount'];

	 $pymtaugustcl = (($row['loan_interest'] /(100 * 12)) * $row['loan_amount']) / (1 - pow(1 + $row['loan_interest'] / 1200,  (-($nmbr))));
$pymtaugustcl= round($pymtaugustcl);
//echo number_format($$numaugust ,2);
$totalaugustcl= $totalaugustcl + $pymtaugustcl;

  }
  }
  if(!$totalaugustcl){
	$totalaugustcl=0;  
  }
  
  		$augustAS = "SELECT loan_tracknumber,loan_account,loan_term_type,loan_term_number,loan_interest,first_payment,last_payment,loan_type,loan_amount FROM  loan_details where (loan_type = 'Advance Salary') AND (first_payment <= '$Y-08-31' and last_payment >='$Y-08-01')  AND (loan_status ='Deny') ORDER  BY first_payment ";
if ($resultas=mysqli_query($con,$augustAS))
  {
while($row= $resultas->fetch_assoc()) {
	 $tp = $row['loan_term_type'];
 $nmbr = $row['loan_term_number'];
if($tp == 'Year'){
	 $nmbr =$nmbr*12;
 }
 if($tp == 'Month'){
	 	 $nmbr =$nmbr;
 }
	$irate = $row['loan_interest'];
	$loan_amount = $row['loan_amount'];

	 $pymtaugustas = (($row['loan_interest'] /(100 * 12)) * $row['loan_amount']) / (1 - pow(1 + $row['loan_interest'] / 1200,  (-($nmbr))));
$pymtaugustas= round($pymtaugustas);
//echo number_format($$numaugust ,2);
$totalaugustas= $totalaugustas + $pymtaugustas;

  }
  }
  if(!$totalaugustas){
	$totalaugustas=0;  
  }
   
  		$augustIG = "SELECT loan_tracknumber,loan_account,loan_term_type,loan_term_number,loan_interest,first_payment,last_payment,loan_type,loan_amount FROM  loan_details where (loan_type = 'Investment Group') AND (first_payment <= '$Y-08-31' and last_payment >='$Y-08-01')  AND (loan_status ='Deny') ORDER  BY first_payment ";
if ($resultIG=mysqli_query($con,$augustIG))
  {
while($row= $resultIG->fetch_assoc()) {
	 $tp = $row['loan_term_type'];
 $nmbr = $row['loan_term_number'];
if($tp == 'Year'){
	 $nmbr =$nmbr*12;
 }
 if($tp == 'Month'){
	 	 $nmbr =$nmbr;
 }
	$irate = $row['loan_interest'];
	$loan_amount = $row['loan_amount'];

	 $pymtaugustIG = (($row['loan_interest'] /(100 * 12)) * $row['loan_amount']) / (1 - pow(1 + $row['loan_interest'] / 1200,  (-($nmbr))));
$pymtaugustIG= round($pymtaugustIG);
//echo number_format($$numaugust ,2);
$totalaugustIG= $totalaugustIG + $pymtaugustIG;

  }
  }
  if(!$totalaugustIG){
	$totalaugustIG=0;  
  }
  $insertaugust = "insert into chart(variation_name,keywords,keywords2,keywords3,fist_value,second_value,third_value)VALUES ('August $thyear','Commercial Loan','Advance Salary','Investment Group','$totalaugustcl','$totalaugustas','$totalaugustIG')";
		$conn->query($insertaugust);
		
		

//Select For Septemeber
$septembercl = "SELECT loan_tracknumber,loan_account,loan_term_type,loan_term_number,loan_interest,first_payment,last_payment,loan_type,loan_amount FROM  loan_details where (loan_type = 'Commercial Loan') AND (first_payment <= '$Y-09-30' and last_payment >='$Y-09-01')  AND (loan_status ='Deny') ORDER  BY first_payment ";
if ($resultseptembercl=mysqli_query($con,$septembercl))
  {
while($row= $resultseptembercl->fetch_assoc()) {
	 $tp = $row['loan_term_type'];
 $nmbr = $row['loan_term_number'];
if($tp == 'Year'){
	 $nmbr =$nmbr*12;
 }
 if($tp == 'Month'){
	 	 $nmbr =$nmbr;
 }
	$irate = $row['loan_interest'];
	$loan_amount = $row['loan_amount'];

	 $pymtseptembercl = (($row['loan_interest'] /(100 * 12)) * $row['loan_amount']) / (1 - pow(1 + $row['loan_interest'] / 1200,  (-($nmbr))));
$pymtseptembercl= round($pymtseptembercl);
//echo number_format($$numseptember ,2);
$totalseptembercl= $totalseptembercl + $pymtseptembercl;

  }
  }
  if(!$totalseptembercl){
	$totalseptembercl=0;  
  }
  
  		$septemberAS = "SELECT loan_tracknumber,loan_account,loan_term_type,loan_term_number,loan_interest,first_payment,last_payment,loan_type,loan_amount FROM  loan_details where (loan_type = 'Advance Salary') AND (first_payment <= '$Y-09-30' and last_payment >='$Y-09-01')  AND (loan_status ='Deny') ORDER  BY first_payment ";
if ($resultas=mysqli_query($con,$septemberAS))
  {
while($row= $resultas->fetch_assoc()) {
	 $tp = $row['loan_term_type'];
 $nmbr = $row['loan_term_number'];
if($tp == 'Year'){
	 $nmbr =$nmbr*12;
 }
 if($tp == 'Month'){
	 	 $nmbr =$nmbr;
 }
	$irate = $row['loan_interest'];
	$loan_amount = $row['loan_amount'];

	 $pymtseptemberas = (($row['loan_interest'] /(100 * 12)) * $row['loan_amount']) / (1 - pow(1 + $row['loan_interest'] / 1200,  (-($nmbr))));
$pymtseptemberas= round($pymtseptemberas);
//echo number_format($$numseptember ,2);
$totalseptemberas= $totalseptemberas + $pymtseptemberas;

  }
  }
  if(!$totalseptemberas){
	$totalseptemberas=0;  
  }
   
  		$septemberIG = "SELECT loan_tracknumber,loan_account,loan_term_type,loan_term_number,loan_interest,first_payment,last_payment,loan_type,loan_amount FROM  loan_details where (loan_type = 'Investment Group') AND (first_payment <= '$Y-09-30' and last_payment >='$Y-09-01')  AND (loan_status ='Deny') ORDER  BY first_payment ";
if ($resultIG=mysqli_query($con,$septemberIG))
  {
while($row= $resultIG->fetch_assoc()) {
	 $tp = $row['loan_term_type'];
 $nmbr = $row['loan_term_number'];
if($tp == 'Year'){
	 $nmbr =$nmbr*12;
 }
 if($tp == 'Month'){
	 	 $nmbr =$nmbr;
 }
	$irate = $row['loan_interest'];
	$loan_amount = $row['loan_amount'];

	 $pymtseptemberIG = (($row['loan_interest'] /(100 * 12)) * $row['loan_amount']) / (1 - pow(1 + $row['loan_interest'] / 1200,  (-($nmbr))));
$pymtseptemberIG= round($pymtseptemberIG);
//echo number_format($$numseptember ,2);
$totalseptemberIG= $totalseptemberIG + $pymtseptemberIG;

  }
  }
  if(!$totalseptemberIG){
	$totalseptemberIG=0;  
  }
  $insertseptember = "insert into chart(variation_name,keywords,keywords2,keywords3,fist_value,second_value,third_value)VALUES ('September $thyear','Commercial Loan','Advance Salary','Investment Group','$totalseptembercl','$totalseptemberas','$totalseptemberIG')";
		$conn->query($insertseptember);
		
		

//Select For October
$octobercl = "SELECT loan_tracknumber,loan_account,loan_term_type,loan_term_number,loan_interest,first_payment,last_payment,loan_type,loan_amount FROM  loan_details where (loan_type = 'Commercial Loan') AND (first_payment <= '$Y-10-31' and last_payment >='$Y-10-01')  AND (loan_status ='Deny') ORDER  BY first_payment ";
if ($resultoctobercl=mysqli_query($con,$octobercl))
  {
while($row= $resultoctobercl->fetch_assoc()) {
	 $tp = $row['loan_term_type'];
 $nmbr = $row['loan_term_number'];
if($tp == 'Year'){
	 $nmbr =$nmbr*12;
 }
 if($tp == 'Month'){
	 	 $nmbr =$nmbr;
 }
	$irate = $row['loan_interest'];
	$loan_amount = $row['loan_amount'];

	 $pymtoctobercl = (($row['loan_interest'] /(100 * 12)) * $row['loan_amount']) / (1 - pow(1 + $row['loan_interest'] / 1200,  (-($nmbr))));
$pymtoctobercl= round($pymtoctobercl);
//echo number_format($$numoctober ,2);
$totaloctobercl= $totaloctobercl + $pymtoctobercl;

  }
  }
  if(!$totaloctobercl){
	$totaloctobercl=0;  
  }
  
  		$octoberAS = "SELECT loan_tracknumber,loan_account,loan_term_type,loan_term_number,loan_interest,first_payment,last_payment,loan_type,loan_amount FROM  loan_details where (loan_type = 'Advance Salary') AND (first_payment <= '$Y-10-31' and last_payment >='$Y-10-01')  AND (loan_status ='Deny') ORDER  BY first_payment ";
if ($resultas=mysqli_query($con,$octoberAS))
  {
while($row= $resultas->fetch_assoc()) {
	 $tp = $row['loan_term_type'];
 $nmbr = $row['loan_term_number'];
if($tp == 'Year'){
	 $nmbr =$nmbr*12;
 }
 if($tp == 'Month'){
	 	 $nmbr =$nmbr;
 }
	$irate = $row['loan_interest'];
	$loan_amount = $row['loan_amount'];

	 $pymtoctoberas = (($row['loan_interest'] /(100 * 12)) * $row['loan_amount']) / (1 - pow(1 + $row['loan_interest'] / 1200,  (-($nmbr))));
$pymtoctoberas= round($pymtoctoberas);
//echo number_format($$numoctober ,2);
$totaloctoberas= $totaloctoberas + $pymtoctoberas;

  }
  }
  if(!$totaloctoberas){
	$totaloctoberas=0;  
  }
   
  		$octoberIG = "SELECT loan_tracknumber,loan_account,loan_term_type,loan_term_number,loan_interest,first_payment,last_payment,loan_type,loan_amount FROM  loan_details where (loan_type = 'Investment Group') AND (first_payment <= '$Y-10-31' and last_payment >='$Y-10-01')  AND (loan_status ='Deny') ORDER  BY first_payment ";
if ($resultIG=mysqli_query($con,$octoberIG))
  {
while($row= $resultIG->fetch_assoc()) {
	 $tp = $row['loan_term_type'];
 $nmbr = $row['loan_term_number'];
if($tp == 'Year'){
	 $nmbr =$nmbr*12;
 }
 if($tp == 'Month'){
	 	 $nmbr =$nmbr;
 }
	$irate = $row['loan_interest'];
	$loan_amount = $row['loan_amount'];

	 $pymtoctoberIG = (($row['loan_interest'] /(100 * 12)) * $row['loan_amount']) / (1 - pow(1 + $row['loan_interest'] / 1200,  (-($nmbr))));
$pymtoctoberIG= round($pymtoctoberIG);
//echo number_format($$numoctober ,2);
$totaloctoberIG= $totaloctoberIG + $pymtoctoberIG;

  }
  }
  if(!$totaloctoberIG){
	$totaloctoberIG=0;  
  }
  $insertoctober = "insert into chart(variation_name,keywords,keywords2,keywords3,fist_value,second_value,third_value)VALUES ('October $thyear','Commercial Loan','Advance Salary','Investment Group','$totaloctobercl','$totaloctoberas','$totaloctoberIG')";
		$conn->query($insertoctober);
		
		

//Select For November
$novembercl = "SELECT loan_tracknumber,loan_account,loan_term_type,loan_term_number,loan_interest,first_payment,last_payment,loan_type,loan_amount FROM  loan_details where (loan_type = 'Commercial Loan') AND (first_payment <= '$Y-11-30' and last_payment >='$Y-11-01')  AND (loan_status ='Deny') ORDER  BY first_payment ";
if ($resultnovembercl=mysqli_query($con,$novembercl))
  {
while($row= $resultnovembercl->fetch_assoc()) {
	 $tp = $row['loan_term_type'];
 $nmbr = $row['loan_term_number'];
if($tp == 'Year'){
	 $nmbr =$nmbr*12;
 }
 if($tp == 'Month'){
	 	 $nmbr =$nmbr;
 }
	$irate = $row['loan_interest'];
	$loan_amount = $row['loan_amount'];

	 $pymtnovembercl = (($row['loan_interest'] /(100 * 12)) * $row['loan_amount']) / (1 - pow(1 + $row['loan_interest'] / 1200,  (-($nmbr))));
$pymtnovembercl= round($pymtnovembercl);
//echo number_format($$numnovember ,2);
$totalnovembercl= $totalnovembercl + $pymtnovembercl;

  }
  }
  if(!$totalnovembercl){
	$totalnovembercl=0;  
  }
  
  		$novemberAS = "SELECT loan_tracknumber,loan_account,loan_term_type,loan_term_number,loan_interest,first_payment,last_payment,loan_type,loan_amount FROM  loan_details where (loan_type = 'Advance Salary') AND (first_payment <= '$Y-11-30' and last_payment >='$Y-11-01')  AND (loan_status ='Deny') ORDER  BY first_payment ";
if ($resultas=mysqli_query($con,$novemberAS))
  {
while($row= $resultas->fetch_assoc()) {
	 $tp = $row['loan_term_type'];
 $nmbr = $row['loan_term_number'];
if($tp == 'Year'){
	 $nmbr =$nmbr*12;
 }
 if($tp == 'Month'){
	 	 $nmbr =$nmbr;
 }
	$irate = $row['loan_interest'];
	$loan_amount = $row['loan_amount'];

	 $pymtnovemberas = (($row['loan_interest'] /(100 * 12)) * $row['loan_amount']) / (1 - pow(1 + $row['loan_interest'] / 1200,  (-($nmbr))));
$pymtnovemberas= round($pymtnovemberas);
//echo number_format($$numnovember ,2);
$totalnovemberas= $totalnovemberas + $pymtnovemberas;

  }
  }
  if(!$totalnovemberas){
	$totalnovemberas=0;  
  }
   
  		$novemberIG = "SELECT loan_tracknumber,loan_account,loan_term_type,loan_term_number,loan_interest,first_payment,last_payment,loan_type,loan_amount FROM  loan_details where (loan_type = 'Investment Group') AND (first_payment <= '$Y-11-30' and last_payment >='$Y-11-01')  AND (loan_status ='Deny') ORDER  BY first_payment ";
if ($resultIG=mysqli_query($con,$novemberIG))
  {
while($row= $resultIG->fetch_assoc()) {
	 $tp = $row['loan_term_type'];
 $nmbr = $row['loan_term_number'];
if($tp == 'Year'){
	 $nmbr =$nmbr*12;
 }
 if($tp == 'Month'){
	 	 $nmbr =$nmbr;
 }
	$irate = $row['loan_interest'];
	$loan_amount = $row['loan_amount'];

	 $pymtnovemberIG = (($row['loan_interest'] /(100 * 12)) * $row['loan_amount']) / (1 - pow(1 + $row['loan_interest'] / 1200,  (-($nmbr))));
$pymtnovemberIG= round($pymtnovemberIG);
//echo number_format($$numnovember ,2);
$totalnovemberIG= $totalnovemberIG + $pymtnovemberIG;

  }
  }
  if(!$totalnovemberIG){
	$totalnovemberIG=0;  
  }
  $insertnovember = "insert into chart(variation_name,keywords,keywords2,keywords3,fist_value,second_value,third_value)VALUES ('November $thyear','Commercial Loan','Advance Salary','Investment Group','$totalnovembercl','$totalnovemberas','$totalnovemberIG')";
		$conn->query($insertnovember);
		
		

//Select For December
$decembercl = "SELECT loan_tracknumber,loan_account,loan_term_type,loan_term_number,loan_interest,first_payment,last_payment,loan_type,loan_amount FROM  loan_details where (loan_type = 'Commercial Loan') AND (first_payment <= '$Y-12-31' and last_payment >='$Y-12-01')  AND (loan_status ='Deny') ORDER  BY first_payment ";
if ($resultdecembercl=mysqli_query($con,$decembercl))
  {
while($row= $resultdecembercl->fetch_assoc()) {
	 $tp = $row['loan_term_type'];
 $nmbr = $row['loan_term_number'];
if($tp == 'Year'){
	 $nmbr =$nmbr*12;
 }
 if($tp == 'Month'){
	 	 $nmbr =$nmbr;
 }
	$irate = $row['loan_interest'];
	$loan_amount = $row['loan_amount'];

	 $pymtdecembercl = (($row['loan_interest'] /(100 * 12)) * $row['loan_amount']) / (1 - pow(1 + $row['loan_interest'] / 1200,  (-($nmbr))));
$pymtdecembercl= round($pymtdecembercl);
//echo number_format($$numdecember ,2);
$totaldecembercl= $totaldecembercl + $pymtdecembercl;

  }
  }
  if(!$totaldecembercl){
	$totaldecembercl=0;  
  }
  
  		$decemberAS = "SELECT loan_tracknumber,loan_account,loan_term_type,loan_term_number,loan_interest,first_payment,last_payment,loan_type,loan_amount FROM  loan_details where (loan_type = 'Advance Salary') AND (first_payment <= '$Y-12-31' and last_payment >='$Y-12-01')  AND (loan_status ='Deny') ORDER  BY first_payment ";
if ($resultas=mysqli_query($con,$decemberAS))
  {
while($row= $resultas->fetch_assoc()) {
	 $tp = $row['loan_term_type'];
 $nmbr = $row['loan_term_number'];
if($tp == 'Year'){
	 $nmbr =$nmbr*12;
 }
 if($tp == 'Month'){
	 	 $nmbr =$nmbr;
 }
	$irate = $row['loan_interest'];
	$loan_amount = $row['loan_amount'];

	 $pymtdecemberas = (($row['loan_interest'] /(100 * 12)) * $row['loan_amount']) / (1 - pow(1 + $row['loan_interest'] / 1200,  (-($nmbr))));
$pymtdecemberas= round($pymtdecemberas);
//echo number_format($$numdecember ,2);
$totaldecemberas= $totaldecemberas + $pymtdecemberas;

  }
  }
  if(!$totaldecemberas){
	$totaldecemberas=0;  
  }
   
  		$decemberIG = "SELECT loan_tracknumber,loan_account,loan_term_type,loan_term_number,loan_interest,first_payment,last_payment,loan_type,loan_amount FROM  loan_details where (loan_type = 'Investment Group') AND (first_payment <= '$Y-12-31' and last_payment >='$Y-12-01')  AND (loan_status ='Deny') ORDER  BY first_payment ";
if ($resultIG=mysqli_query($con,$decemberIG))
  {
while($row= $resultIG->fetch_assoc()) {
	 $tp = $row['loan_term_type'];
 $nmbr = $row['loan_term_number'];
if($tp == 'Year'){
	 $nmbr =$nmbr*12;
 }
 if($tp == 'Month'){
	 	 $nmbr =$nmbr;
 }
	$irate = $row['loan_interest'];
	$loan_amount = $row['loan_amount'];

	 $pymtdecemberIG = (($row['loan_interest'] /(100 * 12)) * $row['loan_amount']) / (1 - pow(1 + $row['loan_interest'] / 1200,  (-($nmbr))));
$pymtdecemberIG= round($pymtdecemberIG);
//echo number_format($$numdecember ,2);
$totaldecemberIG= $totaldecemberIG + $pymtdecemberIG;

  }
  }
  if(!$totaldecemberIG){
	$totaldecemberIG=0;  
  }
  $insertdecember = "insert into chart(variation_name,keywords,keywords2,keywords3,fist_value,second_value,third_value)VALUES ('December $thyear','Commercial Loan','Advance Salary','Investment Group','$totaldecembercl','$totaldecemberas','$totaldecemberIG')";
		$conn->query($insertdecember);
		
		
	
$querychart = "SELECT * FROM chart ";
$resultchart= $conn_db->query($querychart);
if ($resultchart->num_rows > 0) {
while($row= $resultchart->fetch_assoc()) {
	$line1[] = $row['variation_name'];
	$total1[] = $row['fist_value'];
	$line2[] = $row['keywords2'];
	$total2[] = $row['second_value'];	
	$line3[] = $row['keywords3'];
	$total3[] = $row['third_value'];	
}
}
$N = count($line1);
$N1 = count($line1);
$N2 = count($line1);
$NMAX = max($N,$N1,$N2);
	include "classes/libchart.php";

	$chart = new VerticalBarChart();

	$serie1 = new XYDataSet();
	for($i =0 ; $i<$NMAX; $i++){
	$serie1->addPoint(new Point($line1[$i],$total1[$i]));
	}
		
	$serie2 = new XYDataSet();
	for($j =0 ; $j<$NMAX; $j++){
	$serie2->addPoint(new Point($line2[$j],$total2[$j]));
	}
		$serie3 = new XYDataSet();
	for($k =0 ; $k<$NMAX; $k++){
	$serie3->addPoint(new Point($line3[$k],$total3[$k]));
	}
 $incident1 = 'Commercial Loan';
$incident2 = 'Advance Salary';
$incident3 = 'Investment Group';
	$dataSet = new XYSeriesDataSet();
	$dataSet->addSerie($incident1, $serie1);
	$dataSet->addSerie($incident2, $serie2);
	$dataSet->addSerie($incident3, $serie3);
	$chart->setDataSet($dataSet);
	$chart->getPlot()->setGraphCaptionRatio(0.80);

	$chart->setTitle("All Applicatuions In $thyear");
	$chart->render("generated/demo7.png");	
	
	
	
	
$thyear =  date("Y"); 


//---------------------------------------------------------------------------------------------------------------------------------------------------------------
// Bar Chart
$mtruncate = "TRUNCATE chart_multiple";
$conn->query($mtruncate);

//Sum for January

  		$january = "SELECT loan_tracknumber,loan_account,loan_term_type,loan_term_number,loan_interest,first_payment,last_payment,loan_type,loan_amount FROM  loan_details where (first_payment <= '$Y-01-31' and last_payment >='$Y-01-01')  AND (loan_status ='Deny') ORDER  BY first_payment ";
if ($resultjanuary=mysqli_query($con,$january))
  {
while($row= $resultjanuary->fetch_assoc()) {
	 $tp = $row['loan_term_type'];
 $nmbr = $row['loan_term_number'];
if($tp == 'Year'){
	 $nmbr =$nmbr*12;
 }
 if($tp == 'Month'){
	 	 $nmbr =$nmbr;
 }
	$irate = $row['loan_interest'];
	$loan_amount = $row['loan_amount'];

	 $pymtjanuary = (($row['loan_interest'] /(100 * 12)) * $row['loan_amount']) / (1 - pow(1 + $row['loan_interest'] / 1200,  (-($nmbr))));
$pymtjanuary= round($pymtjanuary);
//echo number_format($$numjanuary ,2);
$totamontlypaymetjanuary = $totamontlypaymetjanuary + $pymtjanuary;

  }
  }
  if(!$totamontlypaymetjanuary){
	$totamontlypaymetjanuary=0;  
  }
 //Sum for February
$february = "SELECT loan_tracknumber,loan_account,loan_term_type,loan_term_number,loan_interest,first_payment,last_payment,loan_type,loan_amount FROM  loan_details where (first_payment <= '$Y-02-29' and last_payment >='$Y-02-01')  AND (loan_status ='Deny') ORDER  BY first_payment ";
if ($resultfebruary=mysqli_query($con,$february))
  {
while($row= $resultfebruary->fetch_assoc()) {
	 $tp = $row['loan_term_type'];
 $nmbr = $row['loan_term_number'];
if($tp == 'Year'){
	 $nmbr =$nmbr*12;
 }
 if($tp == 'Month'){
	 	 $nmbr =$nmbr;
 }
	$irate = $row['loan_interest'];
	$loan_amount = $row['loan_amount'];
	 $pymtfebruary = (($row['loan_interest'] /(100 * 12)) * $row['loan_amount']) / (1 - pow(1 + $row['loan_interest'] / 1200,  (-($nmbr))));
$pymtfebruary= round($pymtfebruary);
//echo number_format($$numjanuary ,2);
$totamontlypaymetfebruary = $totamontlypaymetfebruary + $pymtfebruary;

  }  }
  if(!$totamontlypaymetfebruary){
	$totamontlypaymetfebruary=0;  
  }
 //Sum for March
$march = "SELECT loan_tracknumber,loan_account,loan_term_type,loan_term_number,loan_interest,first_payment,last_payment,loan_type,loan_amount FROM  loan_details where (first_payment <= '$Y-03-31' and last_payment >='$Y-03-01')  AND (loan_status ='Deny') ORDER  BY first_payment ";
if ($resultmarch=mysqli_query($con,$march))
  {
while($row= $resultmarch->fetch_assoc()) {
	 $tp = $row['loan_term_type'];
 $nmbr = $row['loan_term_number'];
if($tp == 'Year'){
	 $nmbr =$nmbr*12;
 }
 if($tp == 'Month'){
	 	 $nmbr =$nmbr;
 }
	$irate = $row['loan_interest'];
	$loan_amount = $row['loan_amount'];
	 $pymtmarch= (($row['loan_interest'] /(100 * 12)) * $row['loan_amount']) / (1 - pow(1 + $row['loan_interest'] / 1200,  (-($nmbr))));
$pymtmarch= round($pymtmarch);
//echo number_format($$numjanuary ,2);
$totamontlypaymetmarch = $totamontlypaymetmarch + $pymtmarch;

  }  }

  if(!$totamontlypaymetmarch){
	$totamontlypaymetmarch=0;  
  }
 //echo 'March'.$totamontlypaymetmarch;
 //Sum for April
$april = "SELECT loan_tracknumber,loan_account,loan_term_type,loan_term_number,loan_interest,first_payment,last_payment,loan_type,loan_amount FROM  loan_details where (first_payment <= '$Y-04-30' and last_payment >='$Y-04-01')  AND (loan_status ='Deny') ORDER  BY first_payment ";
if ($resulapril=mysqli_query($con,$april))
{
  while($row= $resulapril->fetch_assoc()) {
	 $tp = $row['loan_term_type'];
 $nmbr = $row['loan_term_number'];
if($tp == 'Year'){
	 $nmbr =$nmbr*12;
 }
 if($tp == 'Month'){
	 	 $nmbr =$nmbr;
 }
	$irate = $row['loan_interest'];
	$loan_amount = $row['loan_amount'];
	 $pymtapril= (($row['loan_interest'] /(100 * 12)) * $row['loan_amount']) / (1 - pow(1 + $row['loan_interest'] / 1200,  (-($nmbr))));
$pymtapril= round($pymtapril);
//echo number_format($$numjanuary ,2);
$totamontlypaymetapril = $totamontlypaymetapril + $pymtapril;

  }
}
  if(!$totamontlypaymetapril){
	$totamontlypaymetapril=0;  
  }
//echo 'April'.$totamontlypaymetapril;
//Sum for May
$may = "SELECT loan_tracknumber,loan_account,loan_term_type,loan_term_number,loan_interest,first_payment,last_payment,loan_type,loan_amount FROM  loan_details where (first_payment <= '$Y-05-31' and last_payment >='$Y-05-01')  AND (loan_status ='Deny') ORDER  BY first_payment ";
if ($resulmay=mysqli_query($con,$may))
  {
 while($row= $resulmay->fetch_assoc()) {
	 $tp = $row['loan_term_type'];
 $nmbr = $row['loan_term_number'];
if($tp == 'Year'){
	 $nmbr =$nmbr*12;
 }
 if($tp == 'Month'){
	 	 $nmbr =$nmbr;
 }
	$irate = $row['loan_interest'];
	$loan_amount = $row['loan_amount'];
	 $pymtmay= (($row['loan_interest'] /(100 * 12)) * $row['loan_amount']) / (1 - pow(1 + $row['loan_interest'] / 1200,  (-($nmbr))));
$pymtmay= round($pymtmay);
//echo number_format($$numjanuary ,2);
$totamontlypaymetpymtmay = $totamontlypaymetpymtmay + $pymtmay;

  }

  
  }
   if(!$totamontlypaymetpymtmay){
	$totamontlypaymetpymtmay=0;  
  }  
 //Sum for June
$june = "SELECT loan_tracknumber,loan_account,loan_term_type,loan_term_number,loan_interest,first_payment,last_payment,loan_type,loan_amount FROM  loan_details where (first_payment <= '$Y-06-30' and last_payment >='$Y-06-01')  AND (loan_status ='Deny') ORDER  BY first_payment";
if ($resultjune=mysqli_query($con,$june))
  {
while($row= $resultjune->fetch_assoc()) {
	 $tp = $row['loan_term_type'];
 $nmbr = $row['loan_term_number'];
if($tp == 'Year'){
	 $nmbr =$nmbr*12;
 }
 if($tp == 'Month'){
	 	 $nmbr =$nmbr;
 }
	$irate = $row['loan_interest'];
	$loan_amount = $row['loan_amount'];
	 $pymtjune= (($row['loan_interest'] /(100 * 12)) * $row['loan_amount']) / (1 - pow(1 + $row['loan_interest'] / 1200,  (-($nmbr))));
$pymtjune= round($pymtjune);
//echo number_format($$numjanuary ,2);
$totamontlypaymetpymtjune = $totamontlypaymetpymtjune + $pymtjune;

  }

  
  }
   if(!$totamontlypaymetpymtjune){
	$totamontlypaymetpymtjune=0;  
  } 
 //Sum for July
$july = "SELECT loan_tracknumber,loan_account,loan_term_type,loan_term_number,loan_interest,first_payment,last_payment,loan_type,loan_amount FROM  loan_details where (first_payment <= '$Y-07-31' and last_payment >='$Y-07-01')  AND (loan_status ='Deny') ORDER  BY first_payment";
if ($resultjuly=mysqli_query($con,$july))
  {
while($row= $resultjuly->fetch_assoc()) {
	 $tp = $row['loan_term_type'];
 $nmbr = $row['loan_term_number'];
if($tp == 'Year'){
	 $nmbr =$nmbr*12;
 }
 if($tp == 'Month'){
	 	 $nmbr =$nmbr;
 }
	$irate = $row['loan_interest'];
	$loan_amount = $row['loan_amount'];
	 $pymtjuly= (($row['loan_interest'] /(100 * 12)) * $row['loan_amount']) / (1 - pow(1 + $row['loan_interest'] / 1200,  (-($nmbr))));
$pymtjuly= round($pymtjuly);
//echo number_format($$numjanuary ,2);
$totamontlypaymetpymtjuly = $totamontlypaymetpymtjuly + $pymtjuly;

  }

  
  }
   if(!$totamontlypaymetpymtjuly){
	$totamontlypaymetpymtjuly=0;  
  } 
 //Sum for August
$august = "SELECT loan_tracknumber,loan_account,loan_term_type,loan_term_number,loan_interest,first_payment,last_payment,loan_type,loan_amount FROM  loan_details where (first_payment <= '$Y-08-31' and last_payment >='$Y-08-01')  AND (loan_status ='Deny') ORDER  BY first_payment";
if ($resultaugust=mysqli_query($con,$august))
  {
while($row= $resultaugust->fetch_assoc()) {
	 $tp = $row['loan_term_type'];
 $nmbr = $row['loan_term_number'];
if($tp == 'Year'){
	 $nmbr =$nmbr*12;
 }
 if($tp == 'Month'){
	 	 $nmbr =$nmbr;
 }
	$irate = $row['loan_interest'];
	$loan_amount = $row['loan_amount'];
	 $pymtaugust= (($row['loan_interest'] /(100 * 12)) * $row['loan_amount']) / (1 - pow(1 + $row['loan_interest'] / 1200,  (-($nmbr))));
$pymtaugust= round($pymtaugust);
//echo number_format($$numjanuary ,2);
$totamontlypaymetpymtaugust = $totamontlypaymetpymtaugust + $pymtaugust;

  }

  
  }
   if(!$totamontlypaymetpymtaugust){
	$totamontlypaymetpymtaugust=0;  
  } 
  
 //Sum for Septemeber
$september = "SELECT loan_tracknumber,loan_account,loan_term_type,loan_term_number,loan_interest,first_payment,last_payment,loan_type,loan_amount FROM  loan_details where (first_payment <= '$Y-09-30' and last_payment >='$Y-09-01')  AND (loan_status ='Deny') ORDER  BY first_payment";
if ($resultseptemeber=mysqli_query($con,$september))
  {
while($row= $resultseptemeber->fetch_assoc()) {
	 $tp = $row['loan_term_type'];
 $nmbr = $row['loan_term_number'];
if($tp == 'Year'){
	 $nmbr =$nmbr*12;
 }
 if($tp == 'Month'){
	 	 $nmbr =$nmbr;
 }
	$irate = $row['loan_interest'];
	$loan_amount = $row['loan_amount'];
	 $pymtsept= (($row['loan_interest'] /(100 * 12)) * $row['loan_amount']) / (1 - pow(1 + $row['loan_interest'] / 1200,  (-($nmbr))));
$pymtsept= round($pymtsept);
//echo number_format($$numjanuary ,2);
$totamontlypaymetpymtseptt = $totamontlypaymetpymtseptt + $pymtsept;

  }

  
  }
   if(!$totamontlypaymetpymtseptt){
	$totamontlypaymetpymtseptt=0;  
  } 
  
 //Sum  for October
$october = "SELECT loan_tracknumber,loan_account,loan_term_type,loan_term_number,loan_interest,first_payment,last_payment,loan_type,loan_amount FROM  loan_details where (first_payment <= '$Y-10-31' and last_payment >='$Y-10-01')  AND (loan_status ='Deny') ORDER  BY first_payment";
if ($resuloctober=mysqli_query($con,$october))
  {
while($row= $resuloctober->fetch_assoc()) {
	 $tp = $row['loan_term_type'];
 $nmbr = $row['loan_term_number'];
if($tp == 'Year'){
	 $nmbr =$nmbr*12;
 }
 if($tp == 'Month'){
	 	 $nmbr =$nmbr;
 }
	$irate = $row['loan_interest'];
	$loan_amount = $row['loan_amount'];
	 $pymtoct= (($row['loan_interest'] /(100 * 12)) * $row['loan_amount']) / (1 - pow(1 + $row['loan_interest'] / 1200,  (-($nmbr))));
$pymtoct= round($pymtoct);
//echo number_format($$numjanuary ,2);
$totamontlypaymetpymtoct = $totamontlypaymetpymtoct + $pymtoct;

  }

  
  }
   if(!$totamontlypaymetpymtoct){
	$totamontlypaymetpymtoct=0;  
  } 
 //Sum for November
$november = "SELECT loan_tracknumber,loan_account,loan_term_type,loan_term_number,loan_interest,first_payment,last_payment,loan_type,loan_amount FROM  loan_details where (first_payment <= '$Y-11-30' and last_payment >='$Y-11-01')  AND (loan_status ='Deny') ORDER  BY first_payment";
if ($resulnovember=mysqli_query($con,$november))
  {
while($row= $resulnovember->fetch_assoc()) {
	 $tp = $row['loan_term_type'];
 $nmbr = $row['loan_term_number'];
if($tp == 'Year'){
	 $nmbr =$nmbr*12;
 }
 if($tp == 'Month'){
	 	 $nmbr =$nmbr;
 }
	$irate = $row['loan_interest'];
	$loan_amount = $row['loan_amount'];
	 $pymtnov= (($row['loan_interest'] /(100 * 12)) * $row['loan_amount']) / (1 - pow(1 + $row['loan_interest'] / 1200,  (-($nmbr))));
$pymtnov= round($pymtnov);
//echo number_format($$numjanuary ,2);
$totamontlypaymetpymtnov = $totamontlypaymetpymtnov + $pymtnov;

  }

  
  }
   if(!$totamontlypaymetpymtnov){
	$totamontlypaymetpymtnov=0;  
  } 
   //Sum for December
$december = "SELECT loan_tracknumber,loan_account,loan_term_type,loan_term_number,loan_interest,first_payment,last_payment,loan_type,loan_amount FROM  loan_details where (first_payment <= '$Y-12-31' and last_payment >='$Y-12-01')  AND (loan_status ='Deny') ORDER  BY first_payment";
if ($resuldecmber=mysqli_query($con,$december))
  {
while($row= $resuldecmber->fetch_assoc()) {
	 $tp = $row['loan_term_type'];
 $nmbr = $row['loan_term_number'];
if($tp == 'Year'){
	 $nmbr =$nmbr*12;
 }
 if($tp == 'Month'){
	 	 $nmbr =$nmbr;
 }
	$irate = $row['loan_interest'];
	$loan_amount = $row['loan_amount'];
	 $pymtdec= (($row['loan_interest'] /(100 * 12)) * $row['loan_amount']) / (1 - pow(1 + $row['loan_interest'] / 1200,  (-($nmbr))));
$pymtdec= round($pymtdec);
//echo number_format($$numjanuary ,2);
$totamontlypaymetpymtdec = $totamontlypaymetpymtdec+ $pymtdec;

  }

  
  }
   if(!$totamontlypaymetpymtdec){
	$totamontlypaymetpymtdec=0;  
  } 
//}
 //}       
 $insertchart ="INSERT INTO chart_multiple (year,january,february,march,april,may,june,july,august,septemeber,october,november,december)VALUES('$Y','$totamontlypaymetjanuary','$totamontlypaymetfebruary','$totamontlypaymetmarch','$totamontlypaymetapril','$totamontlypaymetpymtmay','$totamontlypaymetpymtjune','$totamontlypaymetpymtjuly','$totamontlypaymetpymtaugust','$totamontlypaymetpymtseptt','$totamontlypaymetpymtoct','$totamontlypaymetpymtnov','$totamontlypaymetpymtdec')";
$conn->query($insertchart);

$queryselect = "SELECT * FROM chart_multiple";
$resultchart = $conn_db->query($queryselect);
 if ($resultchart->num_rows > 0) {
while($rowselect= $resultchart->fetch_assoc()) {
	$januaryqty = $rowselect['january'];
	$februaryqty = $rowselect['february'];
	$marchqty = $rowselect['march'];
	$aprilqty = $rowselect['april'];
	$mayqty = $rowselect['may'];
	$juneqty = $rowselect['june'];
	$julyqty = $rowselect['july'];
	$augustqty = $rowselect['august'];
	$septemebrqty = $rowselect['septemeber'];
	$octoberqty = $rowselect['october'];
	$novemberqty = $rowselect['november'];
	$decemberqty = $rowselect['december'];
}
 }
 
 
?>
<br><br>
<div id="chartContainer" style="height: 370px; max-width: 920px; margin: 0px auto;"></div>

<br><br>

		
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/Chart.min.js"></script>
<?php

?>

	<img alt="Line chart" src="generated/demo7.png" style="border: 0px solid gray;"/>


	
	







</div>



              
 
	<script>
window.onload = function () {

var options = {
	exportEnabled: true,
	animationEnabled: true,
	title:{
		text: "Repayment Chart In <?php echo $Y;?>"
	},
	subtitles: [{
		text: ""
	}],
	axisX: {
		title: "Months"
	},
	axisY: {
		title: "Repayment Amount",
		titleFontColor: "#4F81BC",
		lineColor: "#4F81BC",
		labelFontColor: "#4F81BC",
		tickColor: "#4F81BC",
		includeZero: false
	},
	
	toolTip: {
		shared: true
	},
	legend: {
		cursor: "pointer",
		itemclick: toggleDataSeries
	},
	data: [{
		type: "spline",
		name: "Repayment Amount",
		showInLegend: true,
		xValueFormatString: "MMM YYYY",
		yValueFormatString: "#,##0 ",
		dataPoints: [
			{ x: new Date(<?php echo $Y;?>, 0, 1),  y: <?php echo $januaryqty;?> },
			{ x: new Date(<?php echo $Y;?>, 1, 1), y: <?php echo $februaryqty;?>},
			{ x: new Date(<?php echo $Y;?>, 2, 1), y: <?php echo $marchqty;?>},
			{ x: new Date(<?php echo $Y;?>, 3, 1),  y: <?php echo $aprilqty;?> },
			{ x: new Date(<?php echo $Y;?>, 4, 1),  y: <?php echo $mayqty;?> },
			{ x: new Date(<?php echo $Y;?>, 5, 1),  y: <?php echo $juneqty;?> },
			{ x: new Date(<?php echo $Y;?>, 6, 1), y: <?php echo $julyqty;?> },
			{ x: new Date(<?php echo $Y;?>, 7, 1), y: <?php echo $augustqty;?> },
			{ x: new Date(<?php echo $Y;?>, 8, 1),  y: <?php echo $septemebrqty;?> },
			{ x: new Date(<?php echo $Y;?>, 9, 1),  y: <?php echo $octoberqty;?> },
			{ x: new Date(<?php echo $Y;?>, 10, 1),  y: <?php echo $novemberqty;?> },
			{ x: new Date(<?php echo $Y;?>, 11, 1), y: <?php echo $decemberqty;?> }
		]
	}]
};
$("#chartContainer").CanvasJSChart(options);

function toggleDataSeries(e) {
	if (typeof (e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
		e.dataSeries.visible = false;
	} else {
		e.dataSeries.visible = true;
	}
	e.chart.render();
}

}
</script>	

  </body>
</html>

<script src="../jquery-1.11.1.min.js"></script>
<script src="../jquery.canvasjs.min.js"></script>
						<!-- /.col -->
								</div><!-- /.row -->

								
								<!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
		<!-- /.main-content -->
     
        <!--  ends -->
        <!-- partial:partials/_footer.html -->
         <!--  ends -->
        <!-- partial:../../partials/_footer.html -->
        
        <!-- partial -->
      <!-- main-panel ends -->
    <!-- page-body-wrapper ends -->
  </div>  </div>
          <div class="container-fluid clearfix">
		  <br><br><br><br><br><br><br><br><br><br><br><br><br><br>
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block"><strong>Copyright © 2019</strong>
              <a href="http://www.qloan.rw" target="_blank"><strong>Q-loan</a>. All rights reserved.</strong></span>
             <span class="text-muted d-block text-right "><strong><i>Your satisfaction is our duty</i></strong>            </span>
          </div>
        </footer><!-- container-scroller -->
  <!-- plugins:js -->

   

<style>
form-submit-button {

background: #0066A2;

color: white;

border-style: outset;

border-color: #0066A2;

height: 20px;

width: 50px;

font: bold 15px arial, sans-serif;

text-shadow:none;

}


i.fa.fa-print{
    margin-right: 5px;
}
body {font-family: Arial;}

/* Style the tab */
.tab {
  overflow: hidden;
  border: 1px solid #ccc;
  background-color: #f1f1f1;
}

/* Style the buttons inside the tab */
.tab button {
  background-color: inherit;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.3s;
  font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #ddd;
}

/* Create an active/current tablink class */
.tab button.active {
  background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
  display: none;
  padding: 6px 12px;
  border: 1px solid #ccc;
  border-top: none;
}
.verticalLine {
  border-left: thick solid #ff0000;
}


table.blueTable {
  border: 1px solid #1C6EA4;
  background-color: #EEEEEE;
  width: 55%;
  text-align: left;
  border-collapse: collapse;
}
table.blueTable td, table.blueTable th {
  border: 1px solid #AAAAAA;
  padding: 3px 2px;
}
table.blueTable tbody td {
  font-size: 13px;
}
table.blueTable tr:nth-child(even) {
  background: #D0E4F5;
}
table.blueTable thead {
  background: #1C6EA4;
  background: -moz-linear-gradient(top, #5592bb 0%, #327cad 66%, #1C6EA4 100%);
  background: -webkit-linear-gradient(top, #5592bb 0%, #327cad 66%, #1C6EA4 100%);
  background: linear-gradient(to bottom, #5592bb 0%, #327cad 66%, #1C6EA4 100%);
  border-bottom: 2px solid #444444;
}
table.blueTable thead th {
  font-size: 15px;
  font-weight: bold;
  color: #FFFFFF;
  border-left: 2px solid #D0E4F5;
}
table.blueTable thead th:first-child {
  border-left: none;
}

table.blueTable tfoot {
  font-size: 14px;
  font-weight: bold;
  color: #FFFFFF;
  background: #D0E4F5;
  background: -moz-linear-gradient(top, #dcebf7 0%, #d4e6f6 66%, #D0E4F5 100%);
  background: -webkit-linear-gradient(top, #dcebf7 0%, #d4e6f6 66%, #D0E4F5 100%);
  background: linear-gradient(to bottom, #dcebf7 0%, #d4e6f6 66%, #D0E4F5 100%);
  border-top: 2px solid #444444;
}
table.blueTable tfoot td {
  font-size: 14px;
}
table.blueTable tfoot .links {
  text-align: right;
}
table.blueTable tfoot .links a{
  display: inline-block;
  background: #1C6EA4;
  color: #FFFFFF;
  padding: 2px 8px;
  border-radius: 5px;
}
</style>
</html>