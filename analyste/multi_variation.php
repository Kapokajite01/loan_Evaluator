<?php require_once 'includes/header1.php'; ?>
<?php
require_once("dbcontroller.php");
$db_handle = new DBController();
$query ="SELECT district_id,name as locname FROM district ORDER BY district_id DESC";
$results = $db_handle->runQuery($query);
$link = mysql_connect("localhost", "root", "fidele");
mysql_select_db("mudb_ims_db", $link);
$result = mysql_query("SELECT DISTINCT incident_id FROM incidents", $link);
$num_rows = mysql_num_rows($result);
$result1 = mysql_query("SELECT DISTINCT actors_grou_id FROM actors_group ", $link);
$num_rows1 = mysql_num_rows($result1);
$query1 ="SELECT * FROM incidents order by incident_name";
$results1 = $db_handle->runQuery($query1);
$querygr ="SELECT * FROM actors_group";
$resultsgr = $db_handle->runQuery($querygr);
?>
<?php 
//index.php
$connect = mysqli_connect("localhost", "root", "fidele", "mudb_ims_db");

$clear = "TRUNCATE TABLE chart_multiple";
$resulclear = mysqli_query($connect, $clear);

//count for january
$january = "SELECT YEAR(dateincident) AS yr, MONTHNAME(dateincident) AS m, COUNT(incident_name) AS numincident FROM reports where ((MONTH(dateincident)= 1)AND (YEAR(dateincident)=YEAR(CURDATE())))GROUP BY m order by dateincident";
$resuljanuary = mysqli_query($connect, $january);
$rowjanuary = mysqli_fetch_array($resuljanuary);
$numjanuary = $rowjanuary['numincident'];
if(!$numjanuary){
	$numjanuary=0;
}
$januaruinsert ="INSERT INTO chart_multiple (monthnumber,month,number_incidents)VALUES('1','January',$numjanuary)";
$resultinsertjanuary = mysqli_query($connect, $januaruinsert);

//count for february
$february = "SELECT YEAR(dateincident) AS yr, MONTHNAME(dateincident) AS m, COUNT(incident_name) AS numincident FROM reports where ((MONTH(dateincident)= 2)AND (YEAR(dateincident)=YEAR(CURDATE()))) GROUP BY m order by dateincident";
$resulfebruary = mysqli_query($connect, $february);
$rowfebruary = mysqli_fetch_array($resulfebruary);
$numfebruary = $rowfebruary['numincident'];
if(!$numfebruary){
	$numfebruary=0;
}
$februaryinsert ="INSERT INTO chart_multiple (monthnumber,month,number_incidents)VALUES('2','Feb',$numfebruary)";
$resultinsertfebruary = mysqli_query($connect, $februaryinsert);

//count for MARCH
$march = "SELECT YEAR(dateincident) AS yr, MONTHNAME(dateincident) AS m, COUNT(incident_name) AS numincident FROM reports where((MONTH(dateincident)= 3)AND (YEAR(dateincident)=YEAR(CURDATE()))) GROUP BY m order by dateincident";
$resulmarch = mysqli_query($connect, $march);
$rowmarch = mysqli_fetch_array($resulmarch);
$nummarch = $rowmarch['numincident'];
if(!$nummarch){
	$nummarch=0;
}
$marchinsert ="INSERT INTO chart_multiple (monthnumber,month,number_incidents)VALUES('3','March',$nummarch)";
$resultinsertmarch = mysqli_query($connect, $marchinsert);

//count for April
$april = "SELECT YEAR(dateincident) AS yr, MONTHNAME(dateincident) AS m, COUNT(incident_name) AS numincident FROM reports where ((MONTH(dateincident)= 4)AND (YEAR(dateincident)=YEAR(CURDATE()))) GROUP BY m order by dateincident";
$resulapril = mysqli_query($connect, $april);
$rowapril = mysqli_fetch_array($resulapril);
$numapril = $rowapril['numincident'];
if(!$numapril){
	$numapril=0;
}
$aprilinsert ="INSERT INTO chart_multiple (monthnumber,month,number_incidents)VALUES('4','April',$numapril)";
$resultinsertapril = mysqli_query($connect, $aprilinsert);


//count for May
$may = "SELECT YEAR(dateincident) AS yr, MONTHNAME(dateincident) AS m, COUNT(incident_name) AS numincident FROM reports where((MONTH(dateincident)= 5)AND (YEAR(dateincident)=YEAR(CURDATE())))GROUP BY m order by dateincident";
$resulmay = mysqli_query($connect, $may);
$rowmay = mysqli_fetch_array($resulmay);
$nummay = $rowmay['numincident'];
if(!$nummay){
	$nummay=0;
}
$mayinsert ="INSERT INTO chart_multiple (monthnumber,month,number_incidents)VALUES('5','May',$nummay)";
$resultinsertmay = mysqli_query($connect, $mayinsert);


//count for June
$june = "SELECT YEAR(dateincident) AS yr, MONTHNAME(dateincident) AS m, COUNT(incident_name) AS numincident FROM reports where ((MONTH(dateincident)= 6)AND (YEAR(dateincident)=YEAR(CURDATE()))) GROUP BY m order by dateincident";
$resuljune = mysqli_query($connect, $june);
$rowjune = mysqli_fetch_array($resuljune);
$numjune= $rowjune['numincident'];
if(!$numjune){
	$numjune=0;
}
$juneinsert ="INSERT INTO chart_multiple (monthnumber,month,number_incidents)VALUES('6','June',$numjune)";
$resultinsertjune = mysqli_query($connect, $juneinsert);


//count for July
$july = "SELECT YEAR(dateincident) AS yr, MONTHNAME(dateincident) AS m, COUNT(incident_name) AS numincident FROM reports where ((MONTH(dateincident)= 7)AND (YEAR(dateincident)=YEAR(CURDATE()))) GROUP BY m order by dateincident";
$resuljuly = mysqli_query($connect, $july);
$rowjuly = mysqli_fetch_array($resuljuly);
$numjuly= $rowjuly['numincident'];
if(!$numjuly){
	$numjuly=0;
}
$julyinsert ="INSERT INTO chart_multiple (monthnumber,month,number_incidents)VALUES('7','July',$numjuly)";
$resultinsertjuly = mysqli_query($connect, $julyinsert);



//count for August
$august = "SELECT YEAR(dateincident) AS yr, MONTHNAME(dateincident) AS m, COUNT(incident_name) AS numincident FROM reports where ((MONTH(dateincident)= 8)AND (YEAR(dateincident)=YEAR(CURDATE()))) GROUP BY m order by dateincident";
$resulaugust = mysqli_query($connect, $august);
$rowaugust = mysqli_fetch_array($resulaugust);
$numaugust= $rowaugust['numincident'];
if(!$numaugust){
	$numaugust=0;
}
$augustinsert ="INSERT INTO chart_multiple (monthnumber,month,number_incidents)VALUES('8','August',$numaugust)";
$resultinsertaugust = mysqli_query($connect, $augustinsert);


//count for September
$september = "SELECT YEAR(dateincident) AS yr, MONTHNAME(dateincident) AS m, COUNT(incident_name) AS numincident FROM reports where ((MONTH(dateincident)= 9)AND (YEAR(dateincident)=YEAR(CURDATE())))GROUP BY m order by dateincident";
$resulseptember = mysqli_query($connect, $september);
$rowseptember = mysqli_fetch_array($resulseptember);
$numseptember= $rowseptember['numincident'];
if(!$numseptember){
	$numseptember=0;
}
$septemberinsert ="INSERT INTO chart_multiple (monthnumber,month,number_incidents)VALUES('9','Sept',$numseptember)";
$resultinsertseptember = mysqli_query($connect, $septemberinsert);



//count for October
$october = "SELECT YEAR(dateincident) AS yr, MONTHNAME(dateincident) AS m, COUNT(incident_name) AS numincident FROM reports where ((MONTH(dateincident)= 10)AND (YEAR(dateincident)=YEAR(CURDATE()))) GROUP BY m order by dateincident";
$resuloctober = mysqli_query($connect, $october);
$rowoctober = mysqli_fetch_array($resuloctober);
$numoctober= $rowoctober['numincident'];
if(!$numoctober){
	$numoctober=0;
}
$octoberinsert ="INSERT INTO chart_multiple (monthnumber,month,number_incidents)VALUES('10','October',$numoctober)";
$resultinsertoctober = mysqli_query($connect, $octoberinsert);


//count for November
$november = "SELECT YEAR(dateincident) AS yr, MONTHNAME(dateincident) AS m, COUNT(incident_name) AS numincident FROM reports where ((MONTH(dateincident)= 11)AND (YEAR(dateincident)=YEAR(CURDATE()))) GROUP BY m order by dateincident";
$resulnovember = mysqli_query($connect, $november);
$rownovember = mysqli_fetch_array($resulnovember);
$numnovember= $rownovember['numincident'];
if(!$numnovember){
	$numnovember=0;
}
$novemberinsert ="INSERT INTO chart_multiple (monthnumber,month,number_incidents)VALUES('11','November',$numnovember)";
$resultinsertnovember = mysqli_query($connect, $novemberinsert);



//count for December
$december = "SELECT YEAR(dateincident) AS yr, MONTHNAME(dateincident) AS m, COUNT(incident_name) AS numincident FROM reports where ((MONTH(dateincident)= 12)AND (YEAR(dateincident)=YEAR(CURDATE()))) GROUP BY m order by dateincident";
$resuldecember = mysqli_query($connect, $december);
$rowdecember = mysqli_fetch_array($resuldecember);
$numdecember= $rowdecember['numincident'];
if(!$numdecember){
	$numdecember=0;
}
$decemberinsert ="INSERT INTO chart_multiple (monthnumber,month,number_incidents)VALUES('12','December',$numdecember)";
$resultinsertdecember = mysqli_query($connect, $decemberinsert);
$query = "SELECT * FROM chart_multiple";
$result = mysqli_query($connect, $query);
$chart_data = '';
while($row = mysqli_fetch_array($result))
{
 $chart_data .= "{ month:'".$row["month"]."',monthnumber:'".$row["monthnumber"]."', number_incidents:".$row["number_incidents"]."}, ";
}
$chart_data = substr($chart_data, 0, -2);

?>


<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">	  


<!-- fullCalendar 2.2.5-->
    <link rel="stylesheet" href="assests/plugins/fullcalendar/fullcalendar.min.css">
    <link rel="stylesheet" href="assests/plugins/fullcalendar/fullcalendar.print.css" media="print">


<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />

		<meta name="description" content="Mailbox with some customizations as described in docs" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->

		<!-- page specific plugin styles -->

		<!-- text fonts -->

		<!-- ace styles -->

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="newassets/css/ace-part2.min.css" class="ace-main-stylesheet" />
		<![endif]-->

		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="newassets/css/ace-ie.min.css" />
		<![endif]-->

		<!-- inline styles related to this page -->

		<!-- ace settings handler -->
		<script src="newassets/js/ace-extra.min.js"></script>

		<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

		<!--[if lte IE 8]>
		<script src="newassets/js/html5shiv.min.js"></script>
		<script src="newassets/js/respond.min.js"></script>
		<![endif]-->
					<link rel="icon" href="flag-rwanda.png" />

	</head>
  <link rel="stylesheet" href="css1/morris.css">
  <script src="js1/jquery.min.js"></script>
  <script src="js1/raphael-min.js"></script>
  <script src="js1/morris.min.js"></script>
  
 </head>
 <body>
 <div style="width: 90%; overflow: hidden; margin:auto;">
 <!-- Left options-->
 <div style="width: 400px; float: left;">

 <div class="panel panel-danger">
			<div class="panel-heading">
				
				<a href="#" style="text-decoration:none;color:black;">
					<strong>Incident Type</strong>
					<span class="badge pull pull-right"><?php echo $num_rows; ?></span>	
				</a>
				
			</div> <!--/panel-hdeaing-->
		</div> <!--/panel-->
		<div class="card">
		  <div class="cardHeader" style="background-color:#fff6f8;">
		  		     <form METHOD='POST' ACTION='action_variation'>

		     <select  class="form-control" id="incident-list" name="incident" required><option value="">Select Incident</option>
			 <option value="all">All Incidents </option>
<?php
foreach($results1 as $indident) {
?>
<option value="<?php echo $indident["incident_name"]; ?>"><?php echo $indident["incident_name"]; ?></option>
<?php
}
?>
</select>
		  </div>

		</div> 
		<BR><BR> 
		<div class="panel panel-success">
			<div class="panel-heading">
				
				<a href="#" style="text-decoration:none;color:black;">
					<strong>Location</strong>
					<span class="badge pull pull-right"><?php echo "35"; ?></span>	
				</a>
				
			</div> <!--/panel-hdeaing-->
		</div> <!--/panel-->
		<div class="card">
		  <div class="cardHeader" style="background-color: #5dc17a;">


		  
		     <select  class="form-control" name="mylocation" required><option value="">Select Location</option>
			 <option value="Countrywide">Countrywide </option>
<?php
foreach($results as $mlocation) {
?>
<option value="<?php echo $mlocation["locname"]; ?>"><?php echo $mlocation["locname"]; ?></option>
<?php
}
?>
</select>
		  </div>

		</div> 
		
		<br><br>
	<div class="panel panel-danger">
			<div class="panel-heading">
				
				<a href="#" style="text-decoration:none;color:black;">
					<strong>Period</strong>
				</a>
				
			</div> <!--/panel-hdeaing-->
		</div>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;From
<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="date" name="startdate"  id="datesearch" class="form-control" placeholder="From" aria-describedby='name-format'> 
<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;To<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="date" name="enddate"  id="datesearch" class="form-control" placeholder="To" aria-describedby='name-format'> 
		  <br><br><br>
		<div class="panel panel-info">
			<div class="panel-heading">
				
				<a href="#" style="text-decoration:none;color:black;">
					Actor Group
					<span class="badge pull pull-right"><?php echo $num_rows1; ?></span>	
				</a>
				
			</div> <!--/panel-hdeaing-->
		</div> <!--/panel-->
		<div class="card">
		  <div class="cardHeader" style="background-color:  #f4fafc ;">

		     <select class="form-control" id="group-list" name="group" ><option value="0">Select Actor Group</option>
<?php
foreach($resultsgr as $group) {
?>
<option value="<?php echo $group["actors_name"]; ?>"><?php echo $group["actors_name"]; ?></option>
<?php
}
?>
</select>
		  </div>

		</div>
		  <br><br>
		  <input type="submit" name="mysbmit" id="mysbmit" value="Show Satistics" class="btn btn-success"/>
</form>
</div>
	<!--Chart eria-->	
<div style="margin-left: 420px;margin-right: 420px;">	
<h2 align = "center"><strong><i>Combined Statistics</i></strong></h2><hr>	
   <div id="chart"></div>
   
   <br />
   <div id="chart1"></div>
   </div>
  </div>
  	</div>

 </body>
</html>

<script>
Morris.Bar({
 element : 'chart',
 data:[<?php echo $chart_data; ?>],
 xkey:'month',
 ykeys:['number_incidents'],
 labels:['Number of Incidents'],
 hideHover:'auto',
 stacked:true
});
</script><script>
Morris.Line({
 element : 'chart1',
 data:[<?php echo $chart_data; ?>],
 xkey:'monthnumber',
 ykeys:['number_incidents'],
 labels:['Number Of  Incidents'],
 hideHover:'auto',
 stacked:true
});
</script>
