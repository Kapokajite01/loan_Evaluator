<?php 
error_reporting(0);

require_once 'includes/header1.php'; 
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
<?PHP
if (isset($_POST['mysbmit'])) {

//Get post values
$incident = $_POST['incident'];
$mylocation = $_POST['mylocation'];
$from = $_POST['startdate'];
$to = $_POST['enddate'];
 $newDate = date("Y-m-d", strtotime($from));
 $newDates = date("d-m-Y", strtotime($from));
 $newDate1 = date("Y-m-d", strtotime($to));
 $newDates1 = date("d-m-Y", strtotime($to));


$connect = mysqli_connect("localhost", "root", "fidele", "mudb_ims_db");

$clear = "TRUNCATE TABLE chart_multiple";
$resulclear = mysqli_query($connect, $clear);

//count for january
if($incident =='all' AND $mylocation =='Countrywide'){
	$january = "(SELECT YEAR(dateincident) AS yr, MONTHNAME(dateincident) AS m, COUNT(incident_name) AS numincident FROM reports where ((MONTH(dateincident)= 1) AND ((dateincident >= '$newDate')AND (dateincident <= '$newDate1')))GROUP BY m order by dateincident)";

}
if($incident =='all' AND $mylocation !='Countrywide'){
$january = "(SELECT YEAR(dateincident) AS yr, MONTHNAME(dateincident) AS m, COUNT(incident_name) AS numincident FROM reports where ((MONTH(dateincident)= 1) AND((district_name ='$mylocation')OR(povince_name ='$mylocation'))AND ((dateincident >= '$newDate')AND (dateincident <= '$newDate1')))GROUP BY m order by dateincident)";
}
if($incident !='all' AND $mylocation =='Countrywide'){
$january = "(SELECT YEAR(dateincident) AS yr, MONTHNAME(dateincident) AS m, COUNT(incident_name) AS numincident FROM reports where ((MONTH(dateincident)= 1)AND (incident_name='$incident') AND ((dateincident >= '$newDate')AND (dateincident <= '$newDate1')))GROUP BY m order by dateincident)";
}
if($incident !='all' AND $mylocation !='Countrywide'){
$january = "(SELECT YEAR(dateincident) AS yr, MONTHNAME(dateincident) AS m, COUNT(incident_name) AS numincident FROM reports where ((MONTH(dateincident)= 1) AND ((district_name ='$mylocation')OR(povince_name ='$mylocation')) AND (incident_name='$incident') AND ((dateincident >= '$newDate')AND (dateincident <= '$newDate1')))GROUP BY m order by dateincident)";
}


$resuljanuary = mysqli_query($connect, $january);
$rowjanuary = mysqli_fetch_array($resuljanuary);
$numjanuary = $rowjanuary['numincident'];
if(!$numjanuary){
	$numjanuary=0;
}
$januaruinsert ="INSERT INTO chart_multiple (monthnumber,month,number_incidents)VALUES('1','January',$numjanuary)";
$resultinsertjanuary = mysqli_query($connect, $januaruinsert);
//end count for january

//count for February
if($incident =='all' AND $mylocation =='Countrywide'){
	$february = "(SELECT YEAR(dateincident) AS yr, MONTHNAME(dateincident) AS m, COUNT(incident_name) AS numincident FROM reports where ((MONTH(dateincident)= 2) AND ((dateincident >= '$newDate')AND (dateincident <= '$newDate1')))GROUP BY m order by dateincident)";

}
if($incident =='all' AND $mylocation !='Countrywide'){
$february = "(SELECT YEAR(dateincident) AS yr, MONTHNAME(dateincident) AS m, COUNT(incident_name) AS numincident FROM reports where ((MONTH(dateincident)= 2) AND((district_name ='$mylocation')OR(povince_name ='$mylocation'))AND ((dateincident >= '$newDate')AND (dateincident <= '$newDate1')))GROUP BY m order by dateincident)";
}
if($incident !='all' AND $mylocation =='Countrywide'){
$february = "(SELECT YEAR(dateincident) AS yr, MONTHNAME(dateincident) AS m, COUNT(incident_name) AS numincident FROM reports where ((MONTH(dateincident)= 2)AND (incident_name='$incident') AND ((dateincident >= '$newDate')AND (dateincident <= '$newDate1')))GROUP BY m order by dateincident)";
}
if($incident !='all' AND $mylocation !='Countrywide'){
$february = "(SELECT YEAR(dateincident) AS yr, MONTHNAME(dateincident) AS m, COUNT(incident_name) AS numincident FROM reports where ((MONTH(dateincident)= 2) AND ((district_name ='$mylocation')OR(povince_name ='$mylocation')) AND (incident_name='$incident') AND ((dateincident >= '$newDate')AND (dateincident <= '$newDate1')))GROUP BY m order by dateincident)";
}


$resulfebruary = mysqli_query($connect, $february);
$rowjanuary = mysqli_fetch_array($resulfebruary);
$numfebruary = $rowjanuary['numincident'];
if(!$numfebruary){
	$numfebruary=0;
}
$februaryinsert ="INSERT INTO chart_multiple (monthnumber,month,number_incidents)VALUES('2','February',$numfebruary)";
$resultinsertfebruary = mysqli_query($connect, $februaryinsert);
//end count for February


//count for March
if($incident =='all' AND $mylocation =='Countrywide'){
	$march = "(SELECT YEAR(dateincident) AS yr, MONTHNAME(dateincident) AS m, COUNT(incident_name) AS numincident FROM reports where ((MONTH(dateincident)= 3) AND ((dateincident >= '$newDate')AND (dateincident <= '$newDate1')))GROUP BY m order by dateincident)";

}
if($incident =='all' AND $mylocation !='Countrywide'){
$march = "(SELECT YEAR(dateincident) AS yr, MONTHNAME(dateincident) AS m, COUNT(incident_name) AS numincident FROM reports where ((MONTH(dateincident)= 3) AND((district_name ='$mylocation')OR(povince_name ='$mylocation'))AND ((dateincident >= '$newDate')AND (dateincident <= '$newDate1')))GROUP BY m order by dateincident)";
}
if($incident !='all' AND $mylocation =='Countrywide'){
$march = "(SELECT YEAR(dateincident) AS yr, MONTHNAME(dateincident) AS m, COUNT(incident_name) AS numincident FROM reports where ((MONTH(dateincident)= 3)AND (incident_name='$incident') AND ((dateincident >= '$newDate')AND (dateincident <= '$newDate1')))GROUP BY m order by dateincident)";
}
if($incident !='all' AND $mylocation !='Countrywide'){
$march = "(SELECT YEAR(dateincident) AS yr, MONTHNAME(dateincident) AS m, COUNT(incident_name) AS numincident FROM reports where ((MONTH(dateincident)= 3) AND ((district_name ='$mylocation')OR(povince_name ='$mylocation')) AND (incident_name='$incident') AND ((dateincident >= '$newDate')AND (dateincident <= '$newDate1')))GROUP BY m order by dateincident)";
}


$resulmarch = mysqli_query($connect, $march);
$rowmarch = mysqli_fetch_array($resulmarch);
$nummarch = $rowmarch['numincident'];
if(!$nummarch){
	$nummarch=0;
}
$marchinsert ="INSERT INTO chart_multiple (monthnumber,month,number_incidents)VALUES('3','March',$nummarch)";
$resultinsertmarch = mysqli_query($connect, $marchinsert);
//end count for March



//count for April
if($incident =='all' AND $mylocation =='Countrywide'){
	$april = "(SELECT YEAR(dateincident) AS yr, MONTHNAME(dateincident) AS m, COUNT(incident_name) AS numincident FROM reports where ((MONTH(dateincident)= 4) AND ((dateincident >= '$newDate')AND (dateincident <= '$newDate1')))GROUP BY m order by dateincident)";

}
if($incident =='all' AND $mylocation !='Countrywide'){
$april = "(SELECT YEAR(dateincident) AS yr, MONTHNAME(dateincident) AS m, COUNT(incident_name) AS numincident FROM reports where ((MONTH(dateincident)= 4) AND((district_name ='$mylocation')OR(povince_name ='$mylocation'))AND ((dateincident >= '$newDate')AND (dateincident <= '$newDate1')))GROUP BY m order by dateincident)";
}
if($incident !='all' AND $mylocation =='Countrywide'){
$april = "(SELECT YEAR(dateincident) AS yr, MONTHNAME(dateincident) AS m, COUNT(incident_name) AS numincident FROM reports where ((MONTH(dateincident)= 4)AND (incident_name='$incident') AND ((dateincident >= '$newDate')AND (dateincident <= '$newDate1')))GROUP BY m order by dateincident)";
}
if($incident !='all' AND $mylocation !='Countrywide'){
$april = "(SELECT YEAR(dateincident) AS yr, MONTHNAME(dateincident) AS m, COUNT(incident_name) AS numincident FROM reports where ((MONTH(dateincident)= 4) AND ((district_name ='$mylocation')OR(povince_name ='$mylocation')) AND (incident_name='$incident') AND ((dateincident >= '$newDate')AND (dateincident <= '$newDate1')))GROUP BY m order by dateincident)";
}


$resulapril = mysqli_query($connect, $april);
$rowapril = mysqli_fetch_array($resulapril);
$numapril = $rowapril['numincident'];
if(!$numapril){
	$numapril=0;
}
$aprilinsert ="INSERT INTO chart_multiple (monthnumber,month,number_incidents)VALUES('4','April',$numapril)";
$resultinsertapril = mysqli_query($connect, $aprilinsert);
//end count for April


//count for May
if($incident =='all' AND $mylocation =='Countrywide'){
	$may = "(SELECT YEAR(dateincident) AS yr, MONTHNAME(dateincident) AS m, COUNT(incident_name) AS numincident FROM reports where ((MONTH(dateincident)= 5) AND ((dateincident >= '$newDate')AND (dateincident <= '$newDate1')))GROUP BY m order by dateincident)";

}
if($incident =='all' AND $mylocation !='Countrywide'){
$may = "(SELECT YEAR(dateincident) AS yr, MONTHNAME(dateincident) AS m, COUNT(incident_name) AS numincident FROM reports where ((MONTH(dateincident)= 5) AND((district_name ='$mylocation')OR(povince_name ='$mylocation'))AND ((dateincident >= '$newDate')AND (dateincident <= '$newDate1')))GROUP BY m order by dateincident)";
}
if($incident !='all' AND $mylocation =='Countrywide'){
$may = "(SELECT YEAR(dateincident) AS yr, MONTHNAME(dateincident) AS m, COUNT(incident_name) AS numincident FROM reports where ((MONTH(dateincident)= 5)AND (incident_name='$incident') AND ((dateincident >= '$newDate')AND (dateincident <= '$newDate1')))GROUP BY m order by dateincident)";
}
if($incident !='all' AND $mylocation !='Countrywide'){
$may = "(SELECT YEAR(dateincident) AS yr, MONTHNAME(dateincident) AS m, COUNT(incident_name) AS numincident FROM reports where ((MONTH(dateincident)= 5) AND ((district_name ='$mylocation')OR(povince_name ='$mylocation')) AND (incident_name='$incident') AND ((dateincident >= '$newDate')AND (dateincident <= '$newDate1')))GROUP BY m order by dateincident)";
}


$resulmay = mysqli_query($connect, $may);
$rowmay = mysqli_fetch_array($rowmay);
$nummay = $rowapril['numincident'];
if(!$nummay){
	$nummay=0;
}
$aprilinsert ="INSERT INTO chart_multiple (monthnumber,month,number_incidents)VALUES('5','May',$nummay)";
$resultinsertapril = mysqli_query($connect, $aprilinsert);
//end count for May



//count for June
if($incident =='all' AND $mylocation =='Countrywide'){
	$june = "(SELECT YEAR(dateincident) AS yr, MONTHNAME(dateincident) AS m, COUNT(incident_name) AS numincident FROM reports where ((MONTH(dateincident)= 6) AND ((dateincident >= '$newDate')AND (dateincident <= '$newDate1')))GROUP BY m order by dateincident)";

}
if($incident =='all' AND $mylocation !='Countrywide'){
$june = "(SELECT YEAR(dateincident) AS yr, MONTHNAME(dateincident) AS m, COUNT(incident_name) AS numincident FROM reports where ((MONTH(dateincident)= 6) AND((district_name ='$mylocation')OR(povince_name ='$mylocation'))AND ((dateincident >= '$newDate')AND (dateincident <= '$newDate1')))GROUP BY m order by dateincident)";
}
if($incident !='all' AND $mylocation =='Countrywide'){
$june = "(SELECT YEAR(dateincident) AS yr, MONTHNAME(dateincident) AS m, COUNT(incident_name) AS numincident FROM reports where ((MONTH(dateincident)= 6)AND (incident_name='$incident') AND ((dateincident >= '$newDate')AND (dateincident <= '$newDate1')))GROUP BY m order by dateincident)";
}
if($incident !='all' AND $mylocation !='Countrywide'){
$june = "(SELECT YEAR(dateincident) AS yr, MONTHNAME(dateincident) AS m, COUNT(incident_name) AS numincident FROM reports where ((MONTH(dateincident)= 6) AND ((district_name ='$mylocation')OR(povince_name ='$mylocation')) AND (incident_name='$incident') AND ((dateincident >= '$newDate')AND (dateincident <= '$newDate1')))GROUP BY m order by dateincident)";
}


$resuljune = mysqli_query($connect, $june);
$rowjune = mysqli_fetch_array($resuljune);
$numjune = $rowjune['numincident'];
if(!$numjune){
	$numjune=0;
}
$juneinsert ="INSERT INTO chart_multiple (monthnumber,month,number_incidents)VALUES('6','June',$numjune)";
$resultinsertjune = mysqli_query($connect, $juneinsert);
//end count for June

//count for July
if($incident =='all' AND $mylocation =='Countrywide'){
	$july = "(SELECT YEAR(dateincident) AS yr, MONTHNAME(dateincident) AS m, COUNT(incident_name) AS numincident FROM reports where ((MONTH(dateincident)= 7) AND ((dateincident >= '$newDate')AND (dateincident <= '$newDate1')))GROUP BY m order by dateincident)";

}
if($incident =='all' AND $mylocation !='Countrywide'){
$july = "(SELECT YEAR(dateincident) AS yr, MONTHNAME(dateincident) AS m, COUNT(incident_name) AS numincident FROM reports where ((MONTH(dateincident)= 7) AND((district_name ='$mylocation')OR(povince_name ='$mylocation'))AND ((dateincident >= '$newDate')AND (dateincident <= '$newDate1')))GROUP BY m order by dateincident)";
}
if($incident !='all' AND $mylocation =='Countrywide'){
$july = "(SELECT YEAR(dateincident) AS yr, MONTHNAME(dateincident) AS m, COUNT(incident_name) AS numincident FROM reports where ((MONTH(dateincident)= 7)AND (incident_name='$incident') AND ((dateincident >= '$newDate')AND (dateincident <= '$newDate1')))GROUP BY m order by dateincident)";
}
if($incident !='all' AND $mylocation !='Countrywide'){
$july = "(SELECT YEAR(dateincident) AS yr, MONTHNAME(dateincident) AS m, COUNT(incident_name) AS numincident FROM reports where ((MONTH(dateincident)= 7) AND ((district_name ='$mylocation')OR(povince_name ='$mylocation')) AND (incident_name='$incident') AND ((dateincident >= '$newDate')AND (dateincident <= '$newDate1')))GROUP BY m order by dateincident)";
}


$resuljuly = mysqli_query($connect, $july);
$rowjuly = mysqli_fetch_array($resuljuly);
$numjuly = $rowjuly['numincident'];
if(!$numjuly){
	$numjuly=0;
}
$julyinsert ="INSERT INTO chart_multiple (monthnumber,month,number_incidents)VALUES('7','july',$numjuly)";
$resultinsertjuly = mysqli_query($connect, $julyinsert);
//end count for July

//count for August
if($incident =='all' AND $mylocation =='Countrywide'){
	$august = "(SELECT YEAR(dateincident) AS yr, MONTHNAME(dateincident) AS m, COUNT(incident_name) AS numincident FROM reports where ((MONTH(dateincident)= 8) AND ((dateincident >= '$newDate')AND (dateincident <= '$newDate1')))GROUP BY m order by dateincident)";

}
if($incident =='all' AND $mylocation !='Countrywide'){
$august = "(SELECT YEAR(dateincident) AS yr, MONTHNAME(dateincident) AS m, COUNT(incident_name) AS numincident FROM reports where ((MONTH(dateincident)= 8) AND((district_name ='$mylocation')OR(povince_name ='$mylocation'))AND ((dateincident >= '$newDate')AND (dateincident <= '$newDate1')))GROUP BY m order by dateincident)";
}
if($incident !='all' AND $mylocation =='Countrywide'){
$august = "(SELECT YEAR(dateincident) AS yr, MONTHNAME(dateincident) AS m, COUNT(incident_name) AS numincident FROM reports where ((MONTH(dateincident)= 8)AND (incident_name='$incident') AND ((dateincident >= '$newDate')AND (dateincident <= '$newDate1')))GROUP BY m order by dateincident)";
}
if($incident !='all' AND $mylocation !='Countrywide'){
$august = "(SELECT YEAR(dateincident) AS yr, MONTHNAME(dateincident) AS m, COUNT(incident_name) AS numincident FROM reports where ((MONTH(dateincident)= 8) AND ((district_name ='$mylocation')OR(povince_name ='$mylocation')) AND (incident_name='$incident') AND ((dateincident >= '$newDate')AND (dateincident <= '$newDate1')))GROUP BY m order by dateincident)";
}


$resulaugust = mysqli_query($connect, $august);
$rowaugust = mysqli_fetch_array($resulaugust);
$numaugust = $rowaugust['numincident'];
if(!$numaugust){
	$numaugust=0;
}
$augustinsert ="INSERT INTO chart_multiple (monthnumber,month,number_incidents)VALUES('8','August',$numaugust)";
$resultinsertaugust = mysqli_query($connect, $augustinsert);
//end count for August


//count for September
if($incident =='all' AND $mylocation =='Countrywide'){
	$september = "(SELECT YEAR(dateincident) AS yr, MONTHNAME(dateincident) AS m, COUNT(incident_name) AS numincident FROM reports where ((MONTH(dateincident)= 9) AND ((dateincident >= '$newDate')AND (dateincident <= '$newDate1')))GROUP BY m order by dateincident)";

}
if($incident =='all' AND $mylocation !='Countrywide'){
$september = "(SELECT YEAR(dateincident) AS yr, MONTHNAME(dateincident) AS m, COUNT(incident_name) AS numincident FROM reports where ((MONTH(dateincident)= 9) AND((district_name ='$mylocation')OR(povince_name ='$mylocation'))AND ((dateincident >= '$newDate')AND (dateincident <= '$newDate1')))GROUP BY m order by dateincident)";
}
if($incident !='all' AND $mylocation =='Countrywide'){
$september = "(SELECT YEAR(dateincident) AS yr, MONTHNAME(dateincident) AS m, COUNT(incident_name) AS numincident FROM reports where ((MONTH(dateincident)= 9)AND (incident_name='$incident') AND ((dateincident >= '$newDate')AND (dateincident <= '$newDate1')))GROUP BY m order by dateincident)";
}
if($incident !='all' AND $mylocation !='Countrywide'){
$september = "(SELECT YEAR(dateincident) AS yr, MONTHNAME(dateincident) AS m, COUNT(incident_name) AS numincident FROM reports where ((MONTH(dateincident)= 9) AND ((district_name ='$mylocation')OR(povince_name ='$mylocation')) AND (incident_name='$incident') AND ((dateincident >= '$newDate')AND (dateincident <= '$newDate1')))GROUP BY m order by dateincident)";
}


$resulseptember = mysqli_query($connect, $september);
$rowseptember = mysqli_fetch_array($resulseptember);
$numaseptember = $rowseptember['numincident'];
if(!$numaseptember){
	$numaseptember=0;
}
$septemberinsert ="INSERT INTO chart_multiple (monthnumber,month,number_incidents)VALUES('9','September',$numaseptember)";
$resultinsertseptember = mysqli_query($connect, $septemberinsert);
//end count for September


//count for October
if($incident =='all' AND $mylocation =='Countrywide'){
	$october = "(SELECT YEAR(dateincident) AS yr, MONTHNAME(dateincident) AS m, COUNT(incident_name) AS numincident FROM reports where ((MONTH(dateincident)= 10) AND ((dateincident >= '$newDate')AND (dateincident <= '$newDate1')))GROUP BY m order by dateincident)";

}
if($incident =='all' AND $mylocation !='Countrywide'){
$october = "(SELECT YEAR(dateincident) AS yr, MONTHNAME(dateincident) AS m, COUNT(incident_name) AS numincident FROM reports where ((MONTH(dateincident)= 10) AND((district_name ='$mylocation')OR(povince_name ='$mylocation'))AND ((dateincident >= '$newDate')AND (dateincident <= '$newDate1')))GROUP BY m order by dateincident)";
}
if($incident !='all' AND $mylocation =='Countrywide'){
$october = "(SELECT YEAR(dateincident) AS yr, MONTHNAME(dateincident) AS m, COUNT(incident_name) AS numincident FROM reports where ((MONTH(dateincident)= 10)AND (incident_name='$incident') AND ((dateincident >= '$newDate')AND (dateincident <= '$newDate1')))GROUP BY m order by dateincident)";
}
if($incident !='all' AND $mylocation !='Countrywide'){
$october = "(SELECT YEAR(dateincident) AS yr, MONTHNAME(dateincident) AS m, COUNT(incident_name) AS numincident FROM reports where ((MONTH(dateincident)= 10) AND ((district_name ='$mylocation')OR(povince_name ='$mylocation')) AND (incident_name='$incident') AND ((dateincident >= '$newDate')AND (dateincident <= '$newDate1')))GROUP BY m order by dateincident)";
}


$resuloctober = mysqli_query($connect, $october);
$rowoctober = mysqli_fetch_array($resuloctober);
$numoctober = $rowoctober['numincident'];
if(!$numoctober){
	$numoctober=0;
}
$octoberinsert ="INSERT INTO chart_multiple (monthnumber,month,number_incidents)VALUES('10','October',$numoctober)";
$resultinsertoctober = mysqli_query($connect, $octoberinsert);
//end count for September


//count for November
if($incident =='all' AND $mylocation =='Countrywide'){
	$november = "(SELECT YEAR(dateincident) AS yr, MONTHNAME(dateincident) AS m, COUNT(incident_name) AS numincident FROM reports where ((MONTH(dateincident)= 11) AND ((dateincident >= '$newDate')AND (dateincident <= '$newDate1')))GROUP BY m order by dateincident)";

}
if($incident =='all' AND $mylocation !='Countrywide'){
$november = "(SELECT YEAR(dateincident) AS yr, MONTHNAME(dateincident) AS m, COUNT(incident_name) AS numincident FROM reports where ((MONTH(dateincident)= 11) AND((district_name ='$mylocation')OR(povince_name ='$mylocation'))AND ((dateincident >= '$newDate')AND (dateincident <= '$newDate1')))GROUP BY m order by dateincident)";
}
if($incident !='all' AND $mylocation =='Countrywide'){
$november = "(SELECT YEAR(dateincident) AS yr, MONTHNAME(dateincident) AS m, COUNT(incident_name) AS numincident FROM reports where ((MONTH(dateincident)= 11)AND (incident_name='$incident') AND ((dateincident >= '$newDate')AND (dateincident <= '$newDate1')))GROUP BY m order by dateincident)";
}
if($incident !='all' AND $mylocation !='Countrywide'){
$november = "(SELECT YEAR(dateincident) AS yr, MONTHNAME(dateincident) AS m, COUNT(incident_name) AS numincident FROM reports where ((MONTH(dateincident)= 11) AND ((district_name ='$mylocation')OR(povince_name ='$mylocation')) AND (incident_name='$incident') AND ((dateincident >= '$newDate')AND (dateincident <= '$newDate1')))GROUP BY m order by dateincident)";
}


$resulnovember = mysqli_query($connect, $november);
$rownovember = mysqli_fetch_array($resulnovember);
$numnovember = $rownovember['numincident'];
if(!$numnovember){
	$numnovember=0;
}
$octoberinsert ="INSERT INTO chart_multiple (monthnumber,month,number_incidents)VALUES('11','November',$numnovember)";
$resultinsertoctober = mysqli_query($connect, $octoberinsert);
//end count for November



//count for December
if($incident =='all' AND $mylocation =='Countrywide'){
	$december = "(SELECT YEAR(dateincident) AS yr, MONTHNAME(dateincident) AS m, COUNT(incident_name) AS numincident FROM reports where ((MONTH(dateincident)= 12) AND ((dateincident >= '$newDate')AND (dateincident <= '$newDate1')))GROUP BY m order by dateincident)";

}
if($incident =='all' AND $mylocation !='Countrywide'){
$december = "(SELECT YEAR(dateincident) AS yr, MONTHNAME(dateincident) AS m, COUNT(incident_name) AS numincident FROM reports where ((MONTH(dateincident)= 12) AND((district_name ='$mylocation')OR(povince_name ='$mylocation'))AND ((dateincident >= '$newDate')AND (dateincident <= '$newDate1')))GROUP BY m order by dateincident)";
}
if($incident !='all' AND $mylocation =='Countrywide'){
$december = "(SELECT YEAR(dateincident) AS yr, MONTHNAME(dateincident) AS m, COUNT(incident_name) AS numincident FROM reports where ((MONTH(dateincident)= 12)AND (incident_name='$incident') AND ((dateincident >= '$newDate')AND (dateincident <= '$newDate1')))GROUP BY m order by dateincident)";
}
if($incident !='all' AND $mylocation !='Countrywide'){
$december = "(SELECT YEAR(dateincident) AS yr, MONTHNAME(dateincident) AS m, COUNT(incident_name) AS numincident FROM reports where ((MONTH(dateincident)= 12) AND ((district_name ='$mylocation')OR(povince_name ='$mylocation')) AND (incident_name='$incident') AND ((dateincident >= '$newDate')AND (dateincident <= '$newDate1')))GROUP BY m order by dateincident)";
}


$resuldecember = mysqli_query($connect, $december);
$rowdecember = mysqli_fetch_array($resuldecember);
$numdecember = $rowdecember['numincident'];
if(!$numdecember){
	$numdecember=0;
}
$decemberinsert ="INSERT INTO chart_multiple (monthnumber,month,number_incidents)VALUES('12','December',$numdecember)";
$resultinsertdecember = mysqli_query($connect, $decemberinsert);
//end count for December
$query = "SELECT * FROM chart_multiple";
$result = mysqli_query($connect, $query);
$chart_data = '';
while($row = mysqli_fetch_array($result))
{
 $chart_data .= "{ month:'".$row["month"]."',monthnumber:'".$row["monthnumber"]."', number_incidents:".$row["number_incidents"]."}, ";
}
$chart_data = substr($chart_data, 0, -2);


}


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
		  		     <form METHOD='POST' ACTION=''>

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



		     <select  class="form-control" name="mylocation"><option value="">Select Location</option>
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
<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="date" name="startdate" value="" id="datesearch" class="form-control" placeholder="From" aria-describedby='name-format'> 
<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;To<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="date" name="enddate" value="" id="datesearch" class="form-control" placeholder="To" aria-describedby='name-format'> 
		<br><br>
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

		     <select class="form-control" id="group-list" name="group"><option value="0">Select Actor Group</option>
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

</div>
	<!--Chart eria-->	
	
<div style="margin-left: 420px;margin-right: 420px;">	
<font color="#336699"><?php echo $incident;?></font></strong>&nbsp;&nbsp;&nbsp;&nbsp;<i>LOCATION:</i><strong><font color="#336699">&nbsp;<?php echo $mylocation;?></font></strong>&nbsp;&nbsp;&nbsp;&nbsp;<i>From:</i><strong><font color="#336699"><?php echo $newDates;?></font></strong>&nbsp;&nbsp;&nbsp;&nbsp;<i>To:</i><strong><font color="#336699"><?php echo $newDates1;?></font></strong></h3>  <hr>	
	
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