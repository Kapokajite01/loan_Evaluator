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
if(isset($_POST['datedisplay'])){
// Bar Chart
$mtruncate = "TRUNCATE chart_multiple";
$conn->query($mtruncate);
$m = date(m);
$Y =date(Y);	
$ctruncate = "TRUNCATE chart";
$conn->query($ctruncate);
// Bar Chart
//$fromday= $_POST['fromDOBDay'];
$producttype= $_POST['loantype'];	
$fromDOBMonth =$_POST['fromDOBMonth'];
$fromDOBYear = $_POST['fromDOBDayear'];
$toDOBMonth = $_POST['toDOBMonth'];
$toDOBDayear = $_POST['toDOBDayear'];
$fromBirth = $fromDOBYear.'-'.$fromDOBMonth.'-01';
$toBirth = $toDOBDayear.'-'.$toDOBMonth.'-30';
$from = "From: ".$fromBirth;
$to = "To: ".$toBirth;
if($producttype == 'All'){
$myselect = "SELECT  MONTHNAME(time_application) as mymonth,YEAR(time_application) AS myyear,count(loan_tracknumber)as numberapp  FROM loan_details WHERE time_application>= '$fromBirth'  AND time_application <= '$toBirth' Group BY MONTH(time_application),YEAR(time_application) order by  time_application";
//Count for January

$january = "SELECT loan_tracknumber  FROM loan_details WHERE MONTH(time_application)=1  AND YEAR(time_application) = YEAR(CURRENT_DATE()) ";
if ($resultjanuary=mysqli_query($con,$january))
  {
$numjanuary= mysqli_num_rows($resultjanuary);
  }
  if(!$numjanuary){
	$numjanuary=0;  
  }
 //Count for February

$february = "SELECT loan_tracknumber  FROM loan_details WHERE MONTH(time_application)=2  AND YEAR(time_application) = YEAR(CURRENT_DATE()) ";
if ($resultfebruary=mysqli_query($con,$february))
  {
$numfebruary= mysqli_num_rows($resultfebruary);
  }
  if(!$numfebruary){
	$numfebruary=0;  
  }
 
 //Count for March
$march = "SELECT loan_tracknumber  FROM loan_details WHERE MONTH(time_application)=3 AND YEAR(time_application) = YEAR(CURRENT_DATE()) ";
if ($resultmarch=mysqli_query($con,$march))
  {
$nummarch= mysqli_num_rows($resultmarch);
  }
   if(!$nummarch){
	$nummarch=0;  
  }

 //Count for April
$april = "SELECT loan_tracknumber  FROM loan_details WHERE MONTH(time_application)=4 AND YEAR(time_application) = YEAR(CURRENT_DATE()) ";
if ($resulapril=mysqli_query($con,$april))
  {
$numapril= mysqli_num_rows($resulapril);
  }
   if(!$numapril){
	$numapril=0;  
  } //Count for May
$may = "SELECT loan_tracknumber  FROM loan_details WHERE MONTH(time_application)=5 AND YEAR(time_application) = YEAR(CURRENT_DATE()) ";
if ($resulmay=mysqli_query($con,$may))
  {
$nummay= mysqli_num_rows($resulmay);
  }
   if(!$nummay){
	$nummay=0;  
  }  
 //Count for June
$june = "SELECT loan_tracknumber  FROM loan_details WHERE MONTH(time_application)=6  AND YEAR(time_application) = YEAR(CURRENT_DATE()) ";
if ($resultjune=mysqli_query($con,$june))
  {
$numjune= mysqli_num_rows($resultjune);
  }
  if(!$numjune){
	$numjune=0;  
  }
 //Count for July
$july = "SELECT loan_tracknumber  FROM loan_details WHERE MONTH(time_application)=7  AND YEAR(time_application) = YEAR(CURRENT_DATE()) ";
if ($resultjuly=mysqli_query($con,$july))
  {
$numjuly= mysqli_num_rows($resultjuly);
  }
  if(!$numjuly){
	$numjuly=0;  
  }
  
 //Count for August
$august = "SELECT loan_tracknumber  FROM loan_details WHERE MONTH(time_application)=8  AND YEAR(time_application) = YEAR(CURRENT_DATE()) ";
if ($resultaugust=mysqli_query($con,$august))
  {
$numaugust= mysqli_num_rows($resultaugust);
  }
  if(!$numaugust){
	$numaugust=0;  
  }  
  
 //Count for Septemeber
$september = "SELECT loan_tracknumber  FROM loan_details WHERE MONTH(time_application)=9  AND YEAR(time_application) = YEAR(CURRENT_DATE()) ";
if ($resultseptemeber=mysqli_query($con,$september))
  {
$numseptember= mysqli_num_rows($resultseptemeber);
  }
  if(!$numseptember){
	$numseptember=0;  
  }  
 //Count for October
$october = "SELECT loan_tracknumber  FROM loan_details WHERE MONTH(time_application)=10  AND YEAR(time_application) = YEAR(CURRENT_DATE()) ";
if ($resuloctober=mysqli_query($con,$october))
  {
$numoctober= mysqli_num_rows($resuloctober);
  }
  if(!$numoctober){
	$numoctober=0;  
  }  
 //Count for November
$november = "SELECT loan_tracknumber  FROM loan_details WHERE MONTH(time_application)=11  AND YEAR(time_application) = YEAR(CURRENT_DATE()) ";
if ($resulnovember=mysqli_query($con,$november))
  {
$numnovember= mysqli_num_rows($resulnovember);
  }
  if(!$numnovember){
	$numnovember=0;  
  }  
    
   //Count for December
$december = "SELECT loan_tracknumber  FROM loan_details WHERE MONTH(time_application)=12  AND YEAR(time_application) = YEAR(CURRENT_DATE()) ";
if ($resuldecmber=mysqli_query($con,$december))
  {
$numdecember= mysqli_num_rows($resuldecmber);
  }
  if(!$numdecember){
	$numdecember=0;  
  }

}
else{
$myselect = "SELECT  MONTHNAME(time_application) as mymonth,YEAR(time_application) AS myyear,count(loan_tracknumber)as numberapp  FROM loan_details WHERE loan_type = '$producttype' AND time_application>= '$fromBirth'  AND time_application <= '$toBirth' Group BY MONTH(time_application),YEAR(time_application) order by  time_application";
	//Count for January

$january = "SELECT loan_tracknumber  FROM loan_details WHERE MONTH(time_application)=1  AND YEAR(time_application) = YEAR(CURRENT_DATE()) and loan_type = '$producttype' ";
if ($resultjanuary=mysqli_query($con,$january))
  {
$numjanuary= mysqli_num_rows($resultjanuary);
  }
  if(!$numjanuary){
	$numjanuary=0;  
  }
 //Count for February

$february = "SELECT loan_tracknumber  FROM loan_details WHERE MONTH(time_application)=2  AND YEAR(time_application) = YEAR(CURRENT_DATE()) and loan_type = '$producttype'  ";
if ($resultfebruary=mysqli_query($con,$february))
  {
$numfebruary= mysqli_num_rows($resultfebruary);
  }
  if(!$numfebruary){
	$numfebruary=0;  
  }
 
 //Count for March
$march = "SELECT loan_tracknumber  FROM loan_details WHERE MONTH(time_application)=3 AND YEAR(time_application) = YEAR(CURRENT_DATE()) and loan_type = '$producttype'  ";
if ($resultmarch=mysqli_query($con,$march))
  {
$nummarch= mysqli_num_rows($resultmarch);
  }
   if(!$nummarch){
	$nummarch=0;  
  }

 //Count for April
$april = "SELECT loan_tracknumber  FROM loan_details WHERE MONTH(time_application)=4 AND YEAR(time_application) = YEAR(CURRENT_DATE()) and loan_type = '$producttype'  ";
if ($resulapril=mysqli_query($con,$april))
  {
$numapril= mysqli_num_rows($resulapril);
  }
   if(!$numapril){
	$numapril=0;  
  } //Count for May
$may = "SELECT loan_tracknumber  FROM loan_details WHERE MONTH(time_application)=5 AND YEAR(time_application) = YEAR(CURRENT_DATE()) and loan_type = '$producttype'  ";
if ($resulmay=mysqli_query($con,$may))
  {
$nummay= mysqli_num_rows($resulmay);
  }
   if(!$nummay){
	$nummay=0;  
  }  
 //Count for June
$june = "SELECT loan_tracknumber  FROM loan_details WHERE MONTH(time_application)=6  AND YEAR(time_application) = YEAR(CURRENT_DATE()) and loan_type = '$producttype'  ";
if ($resultjune=mysqli_query($con,$june))
  {
$numjune= mysqli_num_rows($resultjune);
  }
  if(!$numjune){
	$numjune=0;  
  }
 //Count for July
$july = "SELECT loan_tracknumber  FROM loan_details WHERE MONTH(time_application)=7  AND YEAR(time_application) = YEAR(CURRENT_DATE()) and loan_type = '$producttype'  ";
if ($resultjuly=mysqli_query($con,$july))
  {
$numjuly= mysqli_num_rows($resultjuly);
  }
  if(!$numjuly){
	$numjuly=0;  
  }
  
 //Count for August
$august = "SELECT loan_tracknumber  FROM loan_details WHERE MONTH(time_application)=8  AND YEAR(time_application) = YEAR(CURRENT_DATE()) and loan_type = '$producttype'  ";
if ($resultaugust=mysqli_query($con,$august))
  {
$numaugust= mysqli_num_rows($resultaugust);
  }
  if(!$numaugust){
	$numaugust=0;  
  }  
  
 //Count for Septemeber
$september = "SELECT loan_tracknumber  FROM loan_details WHERE MONTH(time_application)=9  AND YEAR(time_application) = YEAR(CURRENT_DATE()) and loan_type = '$producttype'  ";
if ($resultseptemeber=mysqli_query($con,$september))
  {
$numseptember= mysqli_num_rows($resultseptemeber);
  }
  if(!$numseptember){
	$numseptember=0;  
  }  
 //Count for October
$october = "SELECT loan_tracknumber  FROM loan_details WHERE MONTH(time_application)=10  AND YEAR(time_application) = YEAR(CURRENT_DATE()) and loan_type = '$producttype'  ";
if ($resuloctober=mysqli_query($con,$october))
  {
$numoctober= mysqli_num_rows($resuloctober);
  }
  if(!$numoctober){
	$numoctober=0;  
  }  
 //Count for November
$november = "SELECT loan_tracknumber  FROM loan_details WHERE MONTH(time_application)=11  AND YEAR(time_application) = YEAR(CURRENT_DATE())  and loan_type = '$producttype' ";
if ($resulnovember=mysqli_query($con,$november))
  {
$numnovember= mysqli_num_rows($resulnovember);
  }
  if(!$numnovember){
	$numnovember=0;  
  }  
    


	
}



if ($resultmyselect=mysqli_query($con,$myselect))
  {
	  while($rowct= $resultmyselect->fetch_assoc()) {
		  $nummyselect[] = $rowct['numberapp'];
		  $mon[] = $rowct['mymonth'];
		  $yr[] = $rowct['myyear'];
	  }
  }
  $ct = COUNT($nummyselect);
  for($i = 0; $i< $ct; $i++){
  $insertall = "insert into chart(variation_name,total_incidents)VALUES ('$mon[$i]- $yr[$i]','$nummyselect[$i]')";
		$conn->query($insertall); 	  
  }


$querychart = "SELECT * FROM chart ";
$resultchart= $conn_db->query($querychart);
if ($resultchart->num_rows > 0) {
while($row= $resultchart->fetch_assoc()) {
	$line1[] = $row['variation_name'];
	$total1[] = $row['total_incidents'];
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
		
	
	
 $incident1 = 'All Aplications';
	$dataSet = new XYSeriesDataSet();
	$dataSet->addSerie($incident1, $serie1);
	$chart->setDataSet($dataSet);
	$chart->getPlot()->setGraphCaptionRatio(0.80);

	$chart->setTitle(" $producttype Applications $from    $to");
	$chart->render("generated/demo7.png");

	
	
	
	
}
else{
$ctruncate = "TRUNCATE chart";
$conn->query($ctruncate);
//Select For January
$januarylcom = "SELECT loan_tracknumber  FROM loan_details WHERE loan_type = 'Commercial Loan' AND MONTH(time_application)=1  AND YEAR(time_application) = YEAR(CURRENT_DATE()) ";
if ($resultjanuary=mysqli_query($con,$januarylcom))
  {
$numjanuarylcom= mysqli_num_rows($resultjanuary);
  }
  
  $januaryAS = "SELECT loan_tracknumber  FROM loan_details WHERE loan_type = 'Advance Salary' AND MONTH(time_application)=1  AND YEAR(time_application) = YEAR(CURRENT_DATE()) ";
if ($resultas=mysqli_query($con,$januaryAS))
  {
$numjanuaryas= mysqli_num_rows($resultas);
  }
   
   $januaryIG= "SELECT loan_tracknumber  FROM loan_details WHERE loan_type = 'Investment Group' AND MONTH(time_application)=1 AND YEAR(time_application) = YEAR(CURRENT_DATE()) ";
if ($resultIG=mysqli_query($con,$januaryIG))
  {
$numjanuaryIG= mysqli_num_rows($resultIG);
  }
  
  $insertjanuary = "insert into chart(variation_name,keywords,keywords2,keywords3,fist_value,second_value,third_value)VALUES ('January $thyear','Commercial Loan','Advance Salary','Investment Group','$numjanuarylcom','$numjanuaryas','$numjanuaryIG')";
		$conn->query($insertjanuary); 
		
//Select For February
$februarylcom = "SELECT loan_tracknumber  FROM loan_details WHERE loan_type = 'Commercial Loan' AND MONTH(time_application)=2 AND YEAR(time_application) = YEAR(CURRENT_DATE()) ";
if ($resultfebruary=mysqli_query($con,$februarylcom))
  {
$numfebruarylcom= mysqli_num_rows($resultfebruary);
  }
  
  $februaryAS = "SELECT loan_tracknumber  FROM loan_details WHERE loan_type = 'Advance Salary' AND MONTH(time_application)=2  AND YEAR(time_application) = YEAR(CURRENT_DATE()) ";
if ($resultas=mysqli_query($con,$februaryAS))
  {
$numfebruaryas= mysqli_num_rows($resultas);
  }
   
   $februaryIG= "SELECT loan_tracknumber  FROM loan_details WHERE loan_type = 'Investment Group' AND MONTH(time_application)=2 AND YEAR(time_application) = YEAR(CURRENT_DATE()) ";
if ($resultIG=mysqli_query($con,$februaryIG))
  {
$numfebruaryIG= mysqli_num_rows($resultIG);
  }
  
  $insertfebruary = "insert into chart(variation_name,keywords,keywords2,keywords3,fist_value,second_value,third_value)VALUES ('February $thyear','Commercial Loan','Advance Salary','Investment Group','$numfebruarylcom','$numfebruaryas','$numfebruaryIG')";
		$conn->query($insertfebruary); 
		
		
//Select For March
$marchlcom = "SELECT loan_tracknumber  FROM loan_details WHERE loan_type = 'Commercial Loan' AND MONTH(time_application)=3 AND YEAR(time_application) = YEAR(CURRENT_DATE()) ";
if ($resultmarch=mysqli_query($con,$marchlcom))
  {
$nummarchlcom= mysqli_num_rows($resultmarch);
  }
  
  $marchAS = "SELECT loan_tracknumber  FROM loan_details WHERE loan_type = 'Advance Salary' AND MONTH(time_application)=3 AND YEAR(time_application) = YEAR(CURRENT_DATE()) ";
if ($resultas=mysqli_query($con,$marchAS))
  {
$nummarchas= mysqli_num_rows($resultas);
  }
   
   $marchIG= "SELECT loan_tracknumber  FROM loan_details WHERE loan_type = 'Investment Group' AND MONTH(time_application)=3 AND YEAR(time_application) = YEAR(CURRENT_DATE()) ";
if ($resultIG=mysqli_query($con,$marchIG))
  {
$nummarchIG= mysqli_num_rows($resultIG);
  }
  
  $insertmarch = "insert into chart(variation_name,keywords,keywords2,keywords3,fist_value,second_value,third_value)VALUES ('March $thyear','Commercial Loan','Advance Salary','Investment Group','$nummarchlcom','$nummarchas','$nummarchIG')";
		$conn->query($insertmarch); 
		
		
//Select For April
$aprillcom = "SELECT loan_tracknumber  FROM loan_details WHERE loan_type = 'Commercial Loan' AND MONTH(time_application)=4 AND YEAR(time_application) = YEAR(CURRENT_DATE()) ";
if ($resultapril=mysqli_query($con,$aprillcom))
  {
$numaprillcom= mysqli_num_rows($resultapril);
  }
  
  $aprilAS = "SELECT loan_tracknumber  FROM loan_details WHERE loan_type = 'Advance Salary' AND MONTH(time_application)=4 AND YEAR(time_application) = YEAR(CURRENT_DATE()) ";
if ($resultas=mysqli_query($con,$aprilAS))
  {
$numaprilas= mysqli_num_rows($resultas);
  }
   
   $aprilIG= "SELECT loan_tracknumber  FROM loan_details WHERE loan_type = 'Investment Group' AND MONTH(time_application)=4 AND YEAR(time_application) = YEAR(CURRENT_DATE()) ";
if ($resultIG=mysqli_query($con,$aprilIG))
  {
$numaprilIG= mysqli_num_rows($resultIG);
  }
  
  $insertapril = "insert into chart(variation_name,keywords,keywords2,keywords3,fist_value,second_value,third_value)VALUES ('April $thyear','Commercial Loan','Advance Salary','Investment Group','$numaprillcom','$numaprilas','$numaprilIG')";
		$conn->query($insertapril); 
		
		
//Select For April
$aprillcom = "SELECT loan_tracknumber  FROM loan_details WHERE loan_type = 'Commercial Loan' AND MONTH(time_application)=5 AND YEAR(time_application) = YEAR(CURRENT_DATE()) ";
if ($resultapril=mysqli_query($con,$aprillcom))
  {
$numaprillcom= mysqli_num_rows($resultapril);
  }
  
  $aprilAS = "SELECT loan_tracknumber  FROM loan_details WHERE loan_type = 'Advance Salary' AND MONTH(time_application)=5 AND YEAR(time_application) = YEAR(CURRENT_DATE()) ";
if ($resultas=mysqli_query($con,$aprilAS))
  {
$numaprilas= mysqli_num_rows($resultas);
  }
   
   $aprilIG= "SELECT loan_tracknumber  FROM loan_details WHERE loan_type = 'Investment Group' AND MONTH(time_application)=5 AND YEAR(time_application) = YEAR(CURRENT_DATE()) ";
if ($resultIG=mysqli_query($con,$aprilIG))
  {
$numaprilIG= mysqli_num_rows($resultIG);
  }
  
  $insertapril = "insert into chart(variation_name,keywords,keywords2,keywords3,fist_value,second_value,third_value)VALUES ('May $thyear','Commercial Loan','Advance Salary','Investment Group','$numaprillcom','$numaprilas','$numaprilIG')";
		$conn->query($insertapril); 
		
//Select For JUNE
$junelcom = "SELECT loan_tracknumber  FROM loan_details WHERE loan_type = 'Commercial Loan' AND MONTH(time_application)=6  AND YEAR(time_application) = YEAR(CURRENT_DATE()) ";
if ($resultjune=mysqli_query($con,$junelcom))
  {
$numjunelcom= mysqli_num_rows($resultjune);
  }
  
  $juneAS = "SELECT loan_tracknumber  FROM loan_details WHERE loan_type = 'Advance Salary' AND MONTH(time_application)=6  AND YEAR(time_application) = YEAR(CURRENT_DATE()) ";
if ($resultas=mysqli_query($con,$juneAS))
  {
$numjuneas= mysqli_num_rows($resultas);
  }
   
   $juneIG= "SELECT loan_tracknumber  FROM loan_details WHERE loan_type = 'Investment Group' AND MONTH(time_application)=6  AND YEAR(time_application) = YEAR(CURRENT_DATE()) ";
if ($resultIG=mysqli_query($con,$juneIG))
  {
$numjuneIG= mysqli_num_rows($resultIG);
  }
 $insertjune = "insert into chart(variation_name,keywords,keywords2,keywords3,fist_value,second_value,third_value)VALUES ('June $thyear','Commercial Loan','Advance Salary','Investment Group','$numjunelcom','$numjuneas','$numjuneIG')";
 $conn->query($insertjune);

//Select For JULY
$julylcom = "SELECT loan_tracknumber  FROM loan_details WHERE loan_type = 'Commercial Loan' AND MONTH(time_application)=7 AND YEAR(time_application) = YEAR(CURRENT_DATE()) ";
if ($resultjuly=mysqli_query($con,$julylcom))
  {
$numjulylcom= mysqli_num_rows($resultjuly);
  }
  
  $julyAS = "SELECT loan_tracknumber  FROM loan_details WHERE loan_type = 'Advance Salary' AND MONTH(time_application)=7  AND YEAR(time_application) = YEAR(CURRENT_DATE()) ";
if ($resultas=mysqli_query($con,$julyAS))
  {
$numjulyas= mysqli_num_rows($resultas);
  }
   
   $julyIG= "SELECT loan_tracknumber  FROM loan_details WHERE loan_type = 'Investment Group' AND MONTH(time_application)=7  AND YEAR(time_application) = YEAR(CURRENT_DATE()) ";
if ($resultIG=mysqli_query($con,$julyIG))
  {
$numjulyIG= mysqli_num_rows($resultIG);
  }
 $insertjuly = "insert into chart(variation_name,keywords,keywords2,keywords3,fist_value,second_value,third_value)VALUES ('July $thyear','Commercial Loan','Advance Salary','Investment Group','$numjulylcom','$numjulyas','$numjulyIG')";
 $conn->query($insertjuly);

//Select For AUGUST
$augustlcom = "SELECT loan_tracknumber  FROM loan_details WHERE loan_type = 'Commercial Loan' AND MONTH(time_application)=8 AND YEAR(time_application) = YEAR(CURRENT_DATE()) ";
if ($resultaugust=mysqli_query($con,$augustlcom))
  {
$numaugustlcom= mysqli_num_rows($resultaugust);
  }
  
  $augustAS = "SELECT loan_tracknumber  FROM loan_details WHERE loan_type = 'Advance Salary' AND MONTH(time_application)=8  AND YEAR(time_application) = YEAR(CURRENT_DATE()) ";
if ($resultas=mysqli_query($con,$augustAS))
  {
$numaugustas= mysqli_num_rows($resultas);
  }
   
   $augustIG= "SELECT loan_tracknumber  FROM loan_details WHERE loan_type = 'Investment Group' AND MONTH(time_application)=8  AND YEAR(time_application) = YEAR(CURRENT_DATE()) ";
if ($resultIG=mysqli_query($con,$augustIG))
  {
$numaugustIG= mysqli_num_rows($resultIG);
  }
 $insertaugust = "insert into chart(variation_name,keywords,keywords2,keywords3,fist_value,second_value,third_value)VALUES ('August $thyear','Commercial Loan','Advance Salary','Investment Group','$numaugustlcom','$numaugustas','$numaugustIG')";
 $conn->query($insertaugust);

//Select For Septemeber
$septemberlcom = "SELECT loan_tracknumber  FROM loan_details WHERE loan_type = 'Commercial Loan' AND MONTH(time_application)=9 AND YEAR(time_application) = YEAR(CURRENT_DATE()) ";
if ($resultseptember=mysqli_query($con,$septemberlcom))
  {
$numseptemberlcom= mysqli_num_rows($resultseptember);
  }
  
  $septemberAS = "SELECT loan_tracknumber  FROM loan_details WHERE loan_type = 'Advance Salary' AND MONTH(time_application)=9  AND YEAR(time_application) = YEAR(CURRENT_DATE()) ";
if ($resultas=mysqli_query($con,$septemberAS))
  {
$numseptemberas= mysqli_num_rows($resultas);
  }
   
   $septemberIG= "SELECT loan_tracknumber  FROM loan_details WHERE loan_type = 'Investment Group' AND MONTH(time_application)=9  AND YEAR(time_application) = YEAR(CURRENT_DATE()) ";
if ($resultIG=mysqli_query($con,$septemberIG))
  {
$numseptemberIG= mysqli_num_rows($resultIG);
  }
 $insertseptember = "insert into chart(variation_name,keywords,keywords2,keywords3,fist_value,second_value,third_value)VALUES ('Septemeber $thyear','Commercial Loan','Advance Salary','Investment Group','$numseptemberlcom','$numseptemberas','$numseptemberIG')";
 $conn->query($insertseptember);

//Select For October
$octoberlcom = "SELECT loan_tracknumber  FROM loan_details WHERE loan_type = 'Commercial Loan' AND MONTH(time_application)=10 AND YEAR(time_application) = YEAR(CURRENT_DATE()) ";
if ($resultoctober=mysqli_query($con,$octoberlcom))
  {
$numoctoberlcom= mysqli_num_rows($resultoctober);
  }
  
  $octoberAS = "SELECT loan_tracknumber  FROM loan_details WHERE loan_type = 'Advance Salary' AND MONTH(time_application)=10  AND YEAR(time_application) = YEAR(CURRENT_DATE()) ";
if ($resultas=mysqli_query($con,$octoberAS))
  {
$numoctoberas= mysqli_num_rows($resultas);
  }
   
   $octoberIG= "SELECT loan_tracknumber  FROM loan_details WHERE loan_type = 'Investment Group' AND MONTH(time_application)=10 AND YEAR(time_application) = YEAR(CURRENT_DATE()) ";
if ($resultIG=mysqli_query($con,$octoberIG))
  {
$numoctoberIG= mysqli_num_rows($resultIG);
  }
 $insertoctober = "insert into chart(variation_name,keywords,keywords2,keywords3,fist_value,second_value,third_value)VALUES ('October $thyear','Commercial Loan','Advance Salary','Investment Group','$numoctoberlcom','$numoctoberas','$numoctoberIG')";
 $conn->query($insertoctober);


//Select For November
$novemberlcom = "SELECT loan_tracknumber  FROM loan_details WHERE loan_type = 'Commercial Loan' AND MONTH(time_application)=11 AND YEAR(time_application) = YEAR(CURRENT_DATE()) ";
if ($resultnovember=mysqli_query($con,$novemberlcom))
  {
$numnovemberlcom= mysqli_num_rows($resultnovember);
  }
  
  $novemberAS = "SELECT loan_tracknumber  FROM loan_details WHERE loan_type = 'Advance Salary' AND MONTH(time_application)=11  AND YEAR(time_application) = YEAR(CURRENT_DATE()) ";
if ($resultas=mysqli_query($con,$novemberAS))
  {
$numnovemberas= mysqli_num_rows($resultas);
  }
   
   $novemberIG= "SELECT loan_tracknumber  FROM loan_details WHERE loan_type = 'Investment Group' AND MONTH(time_application)=11 AND YEAR(time_application) = YEAR(CURRENT_DATE()) ";
if ($resultIG=mysqli_query($con,$novemberIG))
  {
$numnovemberIG= mysqli_num_rows($resultIG);
  }
 $insertnovember = "insert into chart(variation_name,keywords,keywords2,keywords3,fist_value,second_value,third_value)VALUES ('November $thyear','Commercial Loan','Advance Salary','Investment Group','$numnovemberlcom','$numnovemberas','$numnovemberIG')";
 $conn->query($insertnovember);

 
//Select For December
$decemberlcom = "SELECT loan_tracknumber  FROM loan_details WHERE loan_type = 'Commercial Loan' AND MONTH(time_application)=12 AND YEAR(time_application) = YEAR(CURRENT_DATE()) ";
if ($resultdecember=mysqli_query($con,$decemberlcom))
  {
$numdecemberlcom= mysqli_num_rows($resultdecember);
  }
  
  $decemberAS = "SELECT loan_tracknumber  FROM loan_details WHERE loan_type = 'Advance Salary' AND MONTH(time_application)=12  AND YEAR(time_application) = YEAR(CURRENT_DATE()) ";
if ($resultas=mysqli_query($con,$decemberAS))
  {
$numdecemberas= mysqli_num_rows($resultas);
  }
   
   $decemberIG= "SELECT loan_tracknumber  FROM loan_details WHERE loan_type = 'Investment Group' AND MONTH(time_application)=12 AND YEAR(time_application) = YEAR(CURRENT_DATE()) ";
if ($resultIG=mysqli_query($con,$decemberIG))
  {
$numdecemberIG= mysqli_num_rows($resultIG);
  }
 $insertdecember = "insert into chart(variation_name,keywords,keywords2,keywords3,fist_value,second_value,third_value)VALUES ('December $thyear','Commercial Loan','Advance Salary','Investment Group','$numdecemberlcom','$numdecemberas','$numdecemberIG')";
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
$m = date(m);
$Y =date(Y);
//Count for January

$january = "SELECT loan_tracknumber  FROM loan_details WHERE MONTH(time_application)=1  AND YEAR(time_application) = YEAR(CURRENT_DATE()) ";
if ($resultjanuary=mysqli_query($con,$january))
  {
$numjanuary= mysqli_num_rows($resultjanuary);
  }
  if(!$numjanuary){
	$numjanuary=0;  
  }
 //Count for February

$february = "SELECT loan_tracknumber  FROM loan_details WHERE MONTH(time_application)=2  AND YEAR(time_application) = YEAR(CURRENT_DATE()) ";
if ($resultfebruary=mysqli_query($con,$february))
  {
$numfebruary= mysqli_num_rows($resultfebruary);
  }
  if(!$numfebruary){
	$numfebruary=0;  
  }
 
 //Count for March
$march = "SELECT loan_tracknumber  FROM loan_details WHERE MONTH(time_application)=3 AND YEAR(time_application) = YEAR(CURRENT_DATE()) ";
if ($resultmarch=mysqli_query($con,$march))
  {
$nummarch= mysqli_num_rows($resultmarch);
  }
   if(!$nummarch){
	$nummarch=0;  
  }

 //Count for April
$april = "SELECT loan_tracknumber  FROM loan_details WHERE MONTH(time_application)=4 AND YEAR(time_application) = YEAR(CURRENT_DATE()) ";
if ($resulapril=mysqli_query($con,$april))
  {
$numapril= mysqli_num_rows($resulapril);
  }
   if(!$numapril){
	$numapril=0;  
  } //Count for May
$may = "SELECT loan_tracknumber  FROM loan_details WHERE MONTH(time_application)=5 AND YEAR(time_application) = YEAR(CURRENT_DATE()) ";
if ($resulmay=mysqli_query($con,$may))
  {
$nummay= mysqli_num_rows($resulmay);
  }
   if(!$nummay){
	$nummay=0;  
  }  
 //Count for June
$june = "SELECT loan_tracknumber  FROM loan_details WHERE MONTH(time_application)=6  AND YEAR(time_application) = YEAR(CURRENT_DATE()) ";
if ($resultjune=mysqli_query($con,$june))
  {
$numjune= mysqli_num_rows($resultjune);
  }
  if(!$numjune){
	$numjune=0;  
  }
 //Count for July
$july = "SELECT loan_tracknumber  FROM loan_details WHERE MONTH(time_application)=7  AND YEAR(time_application) = YEAR(CURRENT_DATE()) ";
if ($resultjuly=mysqli_query($con,$july))
  {
$numjuly= mysqli_num_rows($resultjuly);
  }
  if(!$numjuly){
	$numjuly=0;  
  }
  
 //Count for August
$august = "SELECT loan_tracknumber  FROM loan_details WHERE MONTH(time_application)=8  AND YEAR(time_application) = YEAR(CURRENT_DATE()) ";
if ($resultaugust=mysqli_query($con,$august))
  {
$numaugust= mysqli_num_rows($resultaugust);
  }
  if(!$numaugust){
	$numaugust=0;  
  }  
  
 //Count for Septemeber
$september = "SELECT loan_tracknumber  FROM loan_details WHERE MONTH(time_application)=9  AND YEAR(time_application) = YEAR(CURRENT_DATE()) ";
if ($resultseptemeber=mysqli_query($con,$september))
  {
$numseptember= mysqli_num_rows($resultseptemeber);
  }
  if(!$numseptember){
	$numseptember=0;  
  }  
 //Count for October
$october = "SELECT loan_tracknumber  FROM loan_details WHERE MONTH(time_application)=10  AND YEAR(time_application) = YEAR(CURRENT_DATE()) ";
if ($resuloctober=mysqli_query($con,$october))
  {
$numoctober= mysqli_num_rows($resuloctober);
  }
  if(!$numoctober){
	$numoctober=0;  
  }  
 //Count for November
$november = "SELECT loan_tracknumber  FROM loan_details WHERE MONTH(time_application)=11  AND YEAR(time_application) = YEAR(CURRENT_DATE()) ";
if ($resulnovember=mysqli_query($con,$november))
  {
$numnovember= mysqli_num_rows($resulnovember);
  }
  if(!$numnovember){
	$numnovember=0;  
  }  
    
   //Count for December
$december = "SELECT loan_tracknumber  FROM loan_details WHERE MONTH(time_application)=12  AND YEAR(time_application) = YEAR(CURRENT_DATE()) ";
if ($resuldecmber=mysqli_query($con,$december))
  {
$numdecember= mysqli_num_rows($resuldecmber);
  }
  if(!$numdecember){
	$numdecember=0;  
  }  

}
 //}       
 $insertchart ="INSERT INTO chart_multiple (year,january,february,march,april,may,june,july,august,septemeber,october,november,december)VALUES('$Y','$numjanuary','$numfebruary','$nummarch','$numapril','$nummay','$numjune','$numjuly','$numaugust','$numseptember','$numoctober','$numnovember','$numdecember')";
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
		text: "<?php echo $producttype?> Received"
	},
	subtitles: [{
		text: ""
	}],
	axisX: {
		title: "Months"
	},
	axisY: {
		title: "Number of Applications",
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
		name: "Number of Applications",
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