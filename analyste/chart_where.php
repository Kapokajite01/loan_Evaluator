<?php
error_reporting(0);
?>


<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" 
		<meta charset="utf-8" />
		<title>IMS</title>

		
		<link rel="stylesheet" href="newassets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

		

					
					

                    </div>
			      </div>
			   </div>
            </div>
		</div>
	</div><BR/>
	
<!--#####################################################################################################################-->
	

	
	<!DOCTYPE html>
<!-- Template by quackit.com -->
<html>
	<head>
	<meta name="keywords" content="website keywords, website keywords" />
  <meta http-equiv="content-type" content="text/html; charset=windows-1252" />
  <!--<link rel="stylesheet" type="text/css" href="style/style.css" />
  
  <script type="text/javascript">
       $(function() {
               $("#datesearch").datepicker({ dateFormat: "yy-mm-dd" }).val()
               $("#datesearch1").datepicker({ dateFormat: "yy-mm-dd" }).val()
       });

   </script>
   
 
	
	
<!--########################################################################-->
	
	
	
	
	

	
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>3 Rows, 3 Columns A</title>
		<style type="text/css">
		
		main {
			position: fixed;
			top: 145px; /* Set this to the height of the header */
			bottom: 50px; /* Set this to the height of the footer */
			left: 200px; 
			
			overflow: auto; 
			background: #fff;
			margin-top: 20px;
			margin-left:5px;
			width: 70%;
			
		}
			
		
	
		#header {
			position: absolute;
			top: 0;
			left: 0;
			width: 100%;
			height: 10px; 
			overflow: hidden; /* Disables scrollbars on the header frame. To enable scrollbars, change "hidden" to "scroll" */
			background: #BCCE98;
			text-align: center;
			margin-top: 0px;
			margin-right: 100px;
		}

		#footer {
			position: absolute;
			left: 0;
			bottom: 0;
			width: 100%;
			height: 50px; 
			overflow: hidden; /* Disables scrollbars on the footer frame. To enable scrollbars, change "hidden" to "scroll" */
			background: #BCCE98;
		}
				
		#left {
			position: absolute; 
			top: 50px; /* Set this to the height of the header */
			bottom: 50px; /* Set this to the height of the footer */
			left: 0; 
			width: 300px;
			overflow: auto; /* Scrollbars will appear on this frame only when there's enough content to require scrolling. To disable scrollbars, change to "hidden", or use "scroll" to enable permanent scrollbars */
			background: #FFFFFF;
			margin-top: 115px;	
			margin-left:0px;
            			
		}

		#right {
			position: absolute; 
			top: 50px; /* Set this to the height of the header */
			bottom: 50px; /* Set this to the height of the footer */
			right: 0; 
			width: 250px; /* increases the table width of displaying data */
			overflow: auto; /* Scrollbars will appear on this frame only when there's enough content to require scrolling. To disable scrollbars, change to "hidden", or use "scroll" to enable permanent scrollbars */
			background: #FFFFFF; 
            margin-top: 115px;	
            margin-right:30px;			
		}
				
		.innertube {
			margin: 15px; /* Provides padding for the content */
		}
		
		p {
			color: #555;
		}

		nav ul {
			list-style-type: none;
			margin: 0;
			padding: 0;
		}
		
		nav ul a {
			color: darkgreen;
			text-decoration: none;
		}
				
		/*IE6 fix*/
		* html body{
			padding: 50px 200px 50px 200px; /* Set the first value to the height of the header, the second value to the width of the right column, third value to the height of the footer, and last value to the width of the left column */
		}
		
		* html main{ 
			height: 80%; 
			width: 80%; 
			margin-left:500px;
		}

		</style>
		
	</head>
	
	
	
	 <?php

// Truncate table chart before inserting new records

$servername = "localhost";
$username = "root";
$password = "fidele";
$dbname = "mudb_ims_db";

// Create connection
$connt = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($connt->connect_error) {
    die("Connection failed: " . $connt->connect_error);
} 



$sqlt = "TRUNCATE TABLE chart";


if ($connt->multi_query($sqlt) === TRUE) {
    //echo "Delete";
} else {
    echo "Error: " . $sqlt . "<br>" . $connt->error;
}




// Insert into chart default table chart before inserting new records

$servername = "localhost";
$username = "root";
$password = "fidele";
$dbname = "mudb_ims_db";

// Create connection
$conni = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conni->connect_error) {
    die("Connection failed: " . $conni->connect_error);
} 

$district_name=$_REQUEST['district_name'];
$MYTIME = "ALL INCIDENTS  IN".date(' F Y ');

$sqli = "INSERT INTO chart (district_name,keywords2,keywords,keywords3,district_code, label, total_incidents) 
SELECT district_name, incident_name, actor_name,dateincident,district,CONCAT(district_name,neighbor_country),count(incident_name) 
FROM reports WHERE  MONTH(dateincident)= MONTH(CURDATE())and YEAR(dateincident)= YEAR(CURDATE()) GROUP BY incident_name";

if ($conni->multi_query($sqli) === TRUE) {
    //echo "Delete";
} else {
    echo "Error: " . $sqli . "<br>" . $conni->error;
}

$conni->close();


?>
	
	<body>		

		<header id="header">
			<div class="innertube">
			
			
			
			
			<?php require_once 'php_action/core.php'; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
		<link rel="icon" href="images/app_logo.png" />					
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>IMS</title>
<meta name="keywords" content="general template, free css templates, website templates" />
<meta name="description" content="General is a Free CSS Template provided by templatemo.com" />
<link href="templatemo_stylee.css" rel="stylesheet" type="text/css" />
	<!-- bootstrap -->
	<link rel="stylesheet" href="assests/bootstrap/css/bootstrap.min.css">
	<!-- bootstrap theme-->
	<link rel="stylesheet" href="assests/bootstrap/css/bootstrap-theme.min.css">
	<!-- font awesome -->
	<link rel="stylesheet" href="assests/font-awesome/css/font-awesome.min.css">

  <!-- custom css -->
  <link rel="stylesheet" href="custom/css/custom.css">

	<!-- DataTables -->
  <link rel="stylesheet" href="assests/plugins/datatables/jquery.dataTables.min.css">

  <!-- file input -->
  <link rel="stylesheet" href="assests/plugins/fileinput/css/fileinput.min.css">

  <!-- jquery -->
	<script src="assests/jquery/jquery.min.js"></script>
  <!-- jquery ui -->  
  <link rel="stylesheet" href="assests/jquery-ui/jquery-ui.min.css">
  <script src="assests/jquery-ui/jquery-ui.min.js"></script>

  <!-- bootstrap js -->
</head>
<body>
<div id="templatemo_header_wrapper">
	
    <div id="templatemo_header">
    
    	
        
    
        
	</div> <!-- end of templatemo_header -->
</div> <!-- end of templatemo_header_wrapper -->   
<!-- end of templatemo_banner_wrapper -->

<div id="templatemo_menu_wrapper">

    <div id="templatemo_menu">
    
        <ul>
		    <img src="images/niss.png" style=" position:absolute;left:0px; top: 30px;">
			<li><a href="index" class="current"><span class="invo">Dashboard</span></a></li>
            <li><a href="who" class="current"><span class="home">Who</span></a></li>
            <li><a href="what"><span class="bran">What</span></a></li>
            <li><a href="where"><span class="categ">Where</span></a></li>
			<li><a href="when"><span class="invoice">When</span></a></li>
            <li><a href="other"><span class="product">Other</span></a></li>
			<li><a href="reports"><span class="statistica">Report</span></a></li>
			<li><a href="statistics"><span class="invo">Statistics</span></a></li>
			<li><a href="setting"><span class="set">Settings</span></a></li>
			<li><a href="logout"><span class="logout">Logout</span></a></li>
			<img src="images/niss.png" style=" position:absolute;right:0px; top: 30px;"> 
        </ul>    	
		
		<div align="left">
		<a href="chart_where"><button class="btn btn-default button1"> <i class="glyphicon glyphicon-stats"></i> Diagrams Rep </button></a>
		<a href="map"><button class="btn btn-default button1"> <i class="	glyphicon glyphicon-globe"></i> Map Report</button></a>
    </div>
	
	
    </div> <!-- end of templatemo_menu -->
</div> <!-- end of templatemo_menu_wrapper -->    


		</header>
				
		

		<nav id="left" >
			
			
<!--############################ Form #################################################-->




<br>
<font color="maroon">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>STATISTICS <BR>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;WHAT-INCIDENT</b><br><br></font></b>

	
<form action="" method="POST">

 <?php
mysql_connect("localhost", "root","fidele") or die(mysql_error());
mysql_select_db("mudb_ims_db") or die(mysql_error());

$query = "SELECT DISTINCT name FROM district ORDER BY prov_id DESC";
$result = mysql_query($query) or die(mysql_error()."[".$query."]");
?>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<select name="district_name" style="max-width:90%;" required><option value="">Select Location</option>
<option value="countrywide"> Countrywide</option>
<?php 
while ($row = mysql_fetch_array($result))
{
    echo "<option value='".$row['name']."'>".$row['name']."</option>";
	
	
}
?>        
</select>

<br>
<br>
<br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;From
<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="date" name="startdate" value="" id="datesearch" placeholder="From" aria-describedby='name-format' required> 
<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;To<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="date" name="enddate" value="" id="datesearch" placeholder="To" aria-describedby='name-format' required> 

<br>
<br>


<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="Submit" value="Submit">
  
</form>


<BR><BR>


&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <B><font color="maroon">MORE OPTIONS</font></B>
<br>
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="chart_who"><button class="btn btn-default button1"> <B>
<font color="black">Actors</B></font></button></a>
<br>
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="chart_what"><button class="btn btn-default button1"> <B>
<font color="black">Incidents</B></font></button></a>
<br>
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="chart_when"><button class="btn btn-default button1"> <B>
<font color="black">Periods</B></font></button></a>
<br>
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="chart_where"><button class="btn btn-default button1"> <B>
<font color="black">Location</B></font></button></a>
<br>
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="MultipleVerticalBarChartTest"><button class="btn btn-default button1"> <B>
<font color="black">Multiple-Incidents</B></font></button></a>
<br>
<br>
</font>
</font>


<!--###########################################################################-->



<?php
if (isset($_POST["Submit"])) {
error_reporting(0);
$servername = "localhost";
$username = "root";
$password = "fidele";
$dbname = "mudb_ims_db";

// Create connection
$connt = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($connt->connect_error) {
    die("Connection failed: " . $connt->connect_error);
} 



$sqlt = "TRUNCATE TABLE chart";


if ($connt->multi_query($sqlt) === TRUE) {
    //echo "Delete";
} else {
    echo "Error: " . $sqlt . "<br>" . $connt->error;
}

// Selecting from the original table and insert into a new table called chart

$servername = "localhost";
$username = "root";
$password = "fidele";
$dbname = "mudb_ims_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


$district_name=$_REQUEST['district_name'];
$startdate=$_REQUEST['startdate'];
$enddate=$_REQUEST['enddate'];
$newDate = date("d-m-Y", strtotime($startdate));
$enddate=$_REQUEST['enddate'];
$newDate1 = date("d-m-Y", strtotime($enddate));


if($district_name!="" AND $startdate=="" AND $enddate==""){
$sql = "INSERT INTO chart (id,district_name, keywords,keywords2,keywords3,district_code,label, total_incidents) 
SELECT '', district_name, actor_name,incident_name,dateincident,incident,CONCAT(district_name,neighbor_country) AS label, count(incident_name) 
FROM reports WHERE (district_name='$district_name' OR neighbor_country='$district_name')
 GROUP BY label,incident_name";
$MYTIME = " INCIDENTS IN ".$district_name ." FROM ".$newDate." TO ". $newDate1."";
	
}
if($district_name!="" AND $startdate!="" AND $enddate!=""){
$sql = "INSERT INTO chart (id,district_name, keywords,keywords2,keywords3,district_code,label, total_incidents) 
SELECT '', district_name, actor_name,incident_name,dateincident,incident,CONCAT(district_name,neighbor_country),
count(incident_name) FROM reports WHERE (district_name='$district_name' OR neighbor_country='$district_name') 
AND (dateincident BETWEEN '$startdate' AND '$enddate') GROUP BY district_name, incident_name";
$MYTIME = " INCIDENTS IN ".$district_name ." FROM ".$newDate." TO ". $newDate1."";

}
if($district_name == "countrywide" AND $startdate!="" AND $enddate!=""){
$sql = "INSERT INTO chart (id,district_name, keywords,keywords2,keywords3,district_code,label, total_incidents) 
SELECT '',district_name, actor_name,incident_name,dateincident,incident,CONCAT(district_name,neighbor_country),
count(incident_name) FROM reports WHERE ((dateincident BETWEEN '$startdate' AND '$enddate')AND incident != 53 AND incident != 33) GROUP BY  incident_name";
$MYTIME = " INCIDENTS IN ".$district_name ." FROM ".$newDate." TO ". $newDate1."";

		
}

if(($district_name=="Eastern Province" OR $district_name=="Western Province" OR 
$district_name=="Northern Province" OR $district_name=="Southern Province" OR 
$district_name=="City of Kigali") AND ($startdate=="" AND $enddate=="")){
$sql = "INSERT INTO chart (id,district_name, keywords,keywords2,keywords3,district_code,label,total_incidents) 
SELECT '', povince_name, actor_name,incident_name,dateincident,incident,CONCAT(povince_name,neighbor_country),
count(incident_name) FROM reports WHERE povince_name='$district_name' GROUP BY povince_name, incident_name";
$MYTIME = " INCIDENTS IN ".$district_name ." FROM ".$newDate." TO ". $newDate1."";

}

if(($district_name=="Eastern Province" OR $district_name=="Western Province" OR 
$district_name=="Northern Province" OR $district_name=="Southern Province" OR 
$district_name=="City of Kigali") AND ($startdate!="" AND $enddate!="")){
$sql = "INSERT INTO chart (id,district_name, keywords,keywords2,keywords3,district_code,label,total_incidents) 
SELECT '', povince_name, actor_name,incident_name,dateincident,incident,CONCAT(povince_name,neighbor_country),
count(incident_name) FROM reports WHERE povince_name='$district_name' AND 
(dateincident BETWEEN '$startdate' AND '$enddate') GROUP BY povince_name,incident_name";
$MYTIME = " INCIDENTS IN ".$district_name ." FROM ".$newDate." TO ". $newDate1."";
		
}

if ($conn->multi_query($sql) === TRUE) {
    //echo "New records created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
}
?>

<main>
			<div class="innertube">

	<!DOCTYPE HTML>
<html>

<head>
  <title>statistics</title>
  <!--<meta name="description" content="website description" />-->
  <meta name="keywords" content="website keywords, website keywords" />
  <meta http-equiv="content-type" content="text/html; charset=windows-1252" />
  <link rel="stylesheet" type="text/css" href="style/style.css" />
</head>
<script type="text/javascript">
       $(function() {
               $("#datesearch").datepicker({ dateFormat: "yy-mm-dd" }).val()
               $("#datesearch1").datepicker({ dateFormat: "yy-mm-dd" }).val()
       });

   </script>

<body>
 
		
		

<!DOCTYPE html>
<html>
<head>
<title>Statistics</title>


<style type="text/css">



BODY {
    width: 1500PX;
	margin: 10%;
}

#chart-container {
    width: 100%;
    height: auto;
	margin-left:2px;
}



</style>

	<?php


mysql_connect("localhost", "root","fidele") or die(mysql_error());
mysql_select_db("mudb_ims_db") or die(mysql_error());
$query = "SELECT * FROM chart WHERE label!='BURUNDI'AND label!='DRC' AND label!='TANZANIA' AND  label!='UGANDA' order by total_incidents DESC";
$result = mysql_query($query) or die(mysql_error()."[".$query."]");
while ($row = mysql_fetch_array($result))
{
	$incid[] = $row['keywords2'];
	$total[] = $row['total_incidents'];
	
}
$N = count($incid);

    
	include "libchart1/classes/libchart.php";

	$chart = new VerticalBarChart();

	$dataSet = new XYDataSet();
	for($i =0 ; $i<$N-1; $i++){
		$j = $i+1;
	$dataSet->addPoint(new Point($incid[$i],$total[$i]));
	}
	$chart->setDataSet($dataSet);

	$chart->setTitle($MYTIME);
	$chart->render("generated/demo1.png");
?>
<head>
	<strong><title>IMS Chart Generation</title></strong>
	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-15" />
</head>
   

<body>
	<img alt="Vertical bars chart" src="generated/demo1.png" style="border: 1px solid gray;"/>
</body>





</body>
</html>


<!--##########################################################################-->

<!--###############################START CIRCLE CHART #################################################################################-->	

<?php
//  Codes for chart


 $con = mysqli_connect('localhost','root','fidele','mudb_ims_db');
?>
<!DOCTYPE HTML>
<html>
<head>
 <meta charset="utf-8">
 <title>TechJunkGigs</title>
 <script type="text/javascript" src="js/jsapi"></script>
  <script type="text/javascript" src="js/loader.js"></script>
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
 <script type="text/javascript">
 google.load("visualization", "1", {packages:["corechart"]});
 google.setOnLoadCallback(drawChart);
 function drawChart() {
 var data = google.visualization.arrayToDataTable([
 
 ['class Name','Students'],
 <?php 
			$query = "SELECT * FROM chart ORDER BY total_incidents DESC";
 
			 $exec = mysqli_query($con,$query);
			 while($row = mysqli_fetch_array($exec)){
 
			 echo "['".$row['district_name']."',".$row['total_incidents']."],";
			 }
			 ?> 
 
 ]);
 
 var options = {
 //title: 'Number of Students according to their class',
  pieHole: 0.5,
          pieSliceTextStyle: {
            color: 'black',
          },
          legend: 'none'
 };
 var chart = new google.visualization.PieChart(document.getElementById("columnchart12"));
 chart.draw(data,options);
 }
	
    </script>
	
<!--###############################END CIRCLE CHART ###########################################-->	

</head>
<body>
 <div id="columnchart12" style="width: 100%; height: 800px;"></div>
 </div>
 
 <!--stop-->


		</h1>
       
      </div>
    </div>
    <!--<div id="footer">
     
    </div>-->
  </div>
</body>
</html>

	<!--###################################-->
	
			</div>
		
		</main>
				
			</div>
		</nav>	
		<div id="right">
			<div class="innertube">
			
			
	 <!--#############################################################################################-->
 <!--Display statistics-->
 
 <?php

// Truncate table details before inserting new records

$servername = "localhost";
$username = "root";
$password = "fidele";
$dbname = "mudb_ims_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 



$sql = "TRUNCATE TABLE details";


if ($conn->multi_query($sql) === TRUE) {
    //echo "Delete";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>



<?php
$db_host = 'localhost'; // Server Name
$db_user = 'root'; // Username
$db_pass = 'fidele'; // Password
$db_name = 'mudb_ims_db'; // Database Name

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if (!$conn) {
	die ('Failed to connect to MySQL: ' . mysqli_connect_error());	
}



$district_name=$_REQUEST['district_name'];
$startdate=$_REQUEST['startdate'];
$enddate=$_REQUEST['enddate'];


if($district_name!="" AND $startdate!="" AND $enddate!=""){
$sql = "INSERT INTO details (district_name, prov_district, keywords,keywords2,keywords3, label, total_incidents) 
SELECT district_name, povince_name, actor_name,incident_name,dateincident,CONCAT(district_name,neighbor_country), 
count(incident_name) FROM reports WHERE (district_name='$district_name' OR neighbor_country='$district_name') 
AND (dateincident BETWEEN '$startdate' AND '$enddate') 
GROUP BY district_name, incident_name,actor_name, dateincident";
}
if($district_name == "countrywide" AND $startdate!="" AND $enddate!=""){
$sql = "INSERT INTO details (district_name, prov_district, keywords,keywords2,keywords3, label, total_incidents) 
SELECT district_name, povince_name, actor_name,incident_name,dateincident,CONCAT(district_name,neighbor_country), 
count(incident_name) FROM reports WHERE ((dateincident BETWEEN '$startdate' AND '$enddate') AND incident != 53 AND incident != 33)
GROUP BY incident_name";		
}

if(($district_name=="Eastern Province" OR $district_name=="Western Province" OR 
$district_name=="Northern Province" OR $district_name=="Southern Province" OR 
$district_name=="City of Kigali") AND ($startdate!="" AND $enddate!="")){
$sql = "INSERT INTO details (district_name,prov_district, keywords,keywords2,keywords3, label, total_incidents) 
SELECT povince_name,district_name, actor_name,incident_name,dateincident,CONCAT(povince_name,neighbor_country),
count(incident_name) FROM reports WHERE povince_name='$district_name' AND 
(dateincident BETWEEN '$startdate' AND '$enddate') GROUP BY povince_name,incident_name";

}
		
$query = mysqli_query($conn, $sql);

if (!$query) {
	die ('SQL Error: ' . mysqli_error($conn));
}
?>
 
 
 <?php
$db_host = 'localhost'; // Server Name
$db_user = 'root'; // Username
$db_pass = 'fidele'; // Password
$db_name = 'mudb_ims_db'; // Database Name

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if (!$conn) {
	die ('Failed to connect to MySQL: ' . mysqli_connect_error());	
}

$sql = 'SELECT * 
		FROM details WHERE total_incidents!=0 ORDER BY label,prov_district,district_name,keywords2 ASC';
		
$query = mysqli_query($conn, $sql);

if (!$query) {
	die ('SQL Error: ' . mysqli_error($conn));
}
?>
<html>
<head>
	<title>Displaying MySQL Data in HTML Table</title>
	<style type="text/css">
	
	
	table {
    border: 1px solid green;
    border-collapse: collapse;
    width: 100%;
}

table td {
    border: 1px solid green;
}

table td.shrink {
    white-space:nowrap
}
table td.expand {
    width: 1%
}
	
	
	
		body {
			font-size: 15px;
			color: #343d44;
			font-family: "segoe-ui", "open-sans", tahoma, arial;
			padding: 0;
			margin: 0;
		}
		table {
			margin: auto;
			font-family: "Lucida Sans Unicode", "Lucida Grande", "Segoe Ui";
			font-size: 12px;
		}

		h1 {
			margin: 25px auto 0;
			text-align: center;
			text-transform: uppercase;
			font-size: 17px;
		}

		table td {
			transition: all .5s;
		}
		
		
			/* Table */
		.data-table {
			border-collapse: collapse;
			font-size: 10px;
			min-width: 200px;
		}

		.data-table th, 
		.data-table td {
			border: 1px solid #e1edff;
			padding: 7px 17px;
		}
		.data-table caption {
			margin: 7px;
		}

		/* Table Header */
		.data-table thead th {
			background-color: #508abb;
			color: #DC143C;
			border-color: #6ea1cc !important;
			text-transform: uppercase;
			text-align: left;
		}

		/* Table Body */
		.data-table tbody td {
			color: #353535;
		}
		.data-table tbody td:first-child,
		.data-table tbody td:nth-child(4),
		.data-table tbody td:last-child {
			text-align: left;
		}

		.data-table tbody tr:nth-child(odd) td {
			background-color: #f4fbff;
		}
		.data-table tbody tr:hover td {
			background-color: #ffffa2;
			border-color: #ffff0f;
		}

		/* Table Footer */
		.data-table tfoot th {
			background-color: #e5f5ff;
			text-align: left;
			color: #DC143C
		}
		.data-table tfoot th:first-child {
			text-align: left;
			
		}
		.data-table tbody td:empty
		{
			background-color: #ffcccc;
			color: #DC143C
		}
	</style>
</head>
<body>
	<h1><?php echo $incident; ?><br>STATISTICS</h1>
	<table class="data-table">
		<caption class="title"></caption>
		<thead>
			<tr>
				<th>DETAILS</th>
				<th>FQ</th>
			</tr>
		</thead>
		<tbody>	
		<?php
		$no 	= 1;
		$total 	= 0;
		while ($row = mysqli_fetch_array($query))
		{
			echo '<tr>
 <td>Location:&nbsp;&nbsp;'.$row['label'].'<br>Incident:&nbsp;&nbsp;'.$row['keywords2'].'<br>Actor:&nbsp;&nbsp;'.$row['keywords'].
			'<br>Date:&nbsp;&nbsp;'.$row['keywords3'].'</td>
            <td>'.$row['total_incidents'].'</td>	
				</tr>';
			$total += $row['total_incidents'];
			$no++;
		}?>
		
		
		</tbody>
		<tfoot>
			<tr>
				<th colspan="1">TOTAL</th>
				<th><?=number_format($total)?></th>
			</tr>
		</tfoot>
	</table>
	<br>
	<form action="excel.php">
    <input type="submit" value="Download" />	
</form>
	
	
</body>
</html>
 
 <!--End display statistics ##################################################################################-->		
				
			</div>
		</div>
		
		<footer id="footer">
			<div class="innertube">
				<p>Footer...</p>
			</div>
		</footer>	
			
	</body>
</html>
	
<!--#####################################################################################################################-->
	
	</div>
	</div>
	</body>


</html>
