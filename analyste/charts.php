<?php
error_reporting(0);
?>


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
	<head>
		<style type="text/css">
		main {
			position: fixed;
			top: 145px; /* Set this to the height of the header */
			bottom: 50px; /* Set this to the height of the footer */
			left: 400px; 
			right: 400px; 
			
			overflow: auto; 
			background: #fff;
			margin-top: 20px;
			
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
			width: 350px;
			overflow: auto; /* Scrollbars will appear on this frame only when there's enough content to require scrolling. To disable scrollbars, change to "hidden", or use "scroll" to enable permanent scrollbars */
			background: #FFFFFF;
			margin-top: 115px;	
            			
		}

		#right {
			position: absolute; 
			top: 50px; /* Set this to the height of the header */
			bottom: 50px; /* Set this to the height of the footer */
			right: 0; 
			width: 400px;
			overflow: auto; /* Scrollbars will appear on this frame only when there's enough content to require scrolling. To disable scrollbars, change to "hidden", or use "scroll" to enable permanent scrollbars */
			background: #FFFFFF; 
            margin-top: 115px;		
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
 error_reporting(0);
 
 ?>
	
	
	<body>		

		<header id="header">
			<div class="innertube">
			
			
			
			
			<?php require_once 'php_action/core.php'; ?>

		
</head>
<body>
<div id="templatemo_menu_wrapper">

    <div id="templatemo_menu">
    
        <ul>		            <li><a href="multi_variation" class="current"><span class="invo">Dashboard</span></a></li>

            <li><a href="who" class="current"><span class="home">Who</span></a></li>
            <li><a href="what"><span class="bran">What</span></a></li>
            <li><a href="where"><span class="categ">Where</span></a></li>
			<li><a href="when"><span class="invoice">When</span></a></li>
            <li><a href="other"><span class="product">Other</span></a></li>
			<li><a href="reports"><span class="statistica">Report</span></a></li>
			<li><a href="statistics"><span class="invo">Statistics</span></a></li>
			<li><a href="setting"><span class="set">Settings</span></a></li>
			<li><a href="logout"><span class="logout">Logout</span></a></li>
        </ul>    	
		
		<div align="left">
		<a href="chart"><button class="btn btn-default button1"> <i class="glyphicon glyphicon-stats"></i> Diagrams Rep </button></a>
		<a href="map"><button class="btn btn-default button1"> <i class="	glyphicon glyphicon-globe"></i> Map Report</button></a>
	
    </div>
	
	
    </div> <!-- end of templatemo_menu -->
</div> <!-- end of templatemo_menu_wrapper -->    


		</header>
				
		

		<nav id="left">
			<div class="innertube">
			
			
<!--#############################################################################-->	
			
<form action="chart" method="POST">

 <?php
mysql_connect("localhost", "root","fidele") or die(mysql_error());
mysql_select_db("mudb_ims_db") or die(mysql_error());

$query = "SELECT DISTINCT incident_name FROM incidents ORDER BY incident_name ASC";
$result = mysql_query($query) or die(mysql_error()."[".$query."]");
?>

Incident:<select name="incident" style="max-width:90%;"><option value="">Select Incident</option>
<?php 
while ($row = mysql_fetch_array($result))
{
    echo "<option value='".$row['incident_name']."'>".$row['incident_name']."</option>";
}
?>        
</select>

<br>
<br>
<br>

<input type="date" name="startdate" value="" id="datesearch" placeholder="From" aria-describedby='name-format'> <br>AND<br>
<input type="date" name="enddate" value="" id="datesearch" placeholder="To" aria-describedby='name-format'> 


<input type="submit" name="Submit" value="Submit">
  
</form>



<!--###########################################################################-->



<?php

// Insert into chart default table chart before inserting new records

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

$incident=$_REQUEST['incident'];

if($incident!=0){
$sql = "INSERT INTO chart(id,district_name,incident_name,total_incidents) values('','','$incident',0)";	
}

else{
	
	
}


if ($conn->multi_query($sql) === TRUE) {
    //echo "Delete";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();


?>

<!--############################# SELECT AND INSERT INTO TABLE CHART ###################################################-->








<?php
error_reporting(0);

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


$incident=$_REQUEST['incident'];
$startdate=$_REQUEST['startdate'];
$enddate=$_REQUEST['enddate'];


$sql = "INSERT INTO chart (district_name, incident_name, total_incidents) 
SELECT district_name, incident_name, COUNT(*) as total_incidents FROM reports GROUP BY incident_name ORDER BY total_incidents DESC";



if($incident!="" AND $startdate=="" AND $enddate==""){
$sql = "INSERT INTO chart (district_name, incident_name, total_incidents) 
SELECT district_name, incident_name, count(incident_name) FROM reports WHERE incident_name='$incident' GROUP BY district_name";
	
}


elseif($incident!="" AND $startdate!="" AND $enddate!=""){
$sql = "INSERT INTO chart (district_name, incident_name, total_incidents) 
SELECT district_name, incident_name, count(incident_name) FROM reports WHERE incident_name='Insubordination' 
AND (dateincident BETWEEN '$startdate' AND '$enddate') GROUP BY district_name";
		
}





if ($conn->multi_query($sql) === TRUE) {
    //echo "New records created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

	

$conn->close();
?>


<main>
			<div class="innertube">
			
		
			
<!--########### END SELECT AND INSERT INTO CHART ##################################################################-->

  <link rel="stylesheet" type="text/css" href="style/style.css" />
  <div id="main">
    <div id="header">
      <?php

// Truncate table chart before inserting new records

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



$sql = "TRUNCATE TABLE chart";


if ($conn->multi_query($sql) === TRUE) {
    //echo "Delete";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>



<!--########################################################################################





<?php



// Insert into chart default table chart before inserting new records

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

$incident=$_REQUEST['incident'];

$sql = "INSERT INTO chart(id,district_name,incident_name,total_incidents) values('','','$incident',0)";


if ($conn->multi_query($sql) === TRUE) {
    //echo "Delete";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();


?>

<!--################################################################################-->

<?php
error_reporting(0);

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


$incident=$_REQUEST['incident'];
$startdate=$_REQUEST['startdate'];
$enddate=$_REQUEST['enddate'];



if($incident!="" AND $startdate=="" AND $enddate==""){
$sql = "INSERT INTO chart (district_name, incident_name, total_incidents) 
SELECT district_name, incident_name, count(incident_name) FROM reports WHERE incident_name='$incident' GROUP BY district_name";
	
}


elseif($incident!="" AND $startdate!="" AND $enddate!=""){
$sql = "INSERT INTO chart (district_name, incident_name, total_incidents) 
SELECT district_name, incident_name, count(incident_name) FROM reports WHERE incident_name='Insubordination' 
AND (dateincident BETWEEN '$startdate' AND '$enddate') GROUP BY district_name";
		
}

if ($conn->multi_query($sql) === TRUE) {
    //echo "New records created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

	

$conn->close();
?>
      </div>
      
    </div>
     


<?php

$incident=$_REQUEST['incident'];
echo $incident;


?>


<style type="text/css">



BODY {
    width: 1000PX;
	margin: auto;
}

#chart-container {
    width: 100%;
    height: auto;
}



</style>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/Chart.min.js"></script>


</head>
<body>
    <div id="chart-container">
        <canvas id="graphCanvas"></canvas>
    </div>

    <script>
        $(document).ready(function () {
            showGraph();
        });


        function showGraph()
        {
            {
                $.post("data.php",
                function (data)
                {
                    console.log(data);
                     var name = [];
                    var marks = [];

                    for (var i in data) {
                        name.push(data[i].district_name);
                        marks.push(data[i].total_incidents);
                    }

                    var chartdata = {
                        labels: name,
                        datasets: [
                            {
                                label: 'Records',
                                backgroundColor: '#49e2ff',
                                borderColor: '#46d5f1',
                                hoverBackgroundColor: '#CCCCCC',
                                hoverBorderColor: '#666666',
                                data: marks
                            }
                        ]
                    };

                    var graphTarget = $("#graphCanvas");

                    var barGraph = new Chart(graphTarget, {
                        type: 'bar',
                        data: chartdata
                    });
                });
            }
        }
        </script>

</body>



</html>

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

		
		</main>
				
			</div>
		</nav>	
		<div id="right">
			<div class="innertube">
		
	 <!--#############################################################################################-->
 <!--Display statistics-->
 
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
		FROM chart WHERE total_incidents!=0 ORDER BY total_incidents DESC';
		
$query = mysqli_query($conn, $sql);

if (!$query) {
	die ('SQL Error: ' . mysqli_error($conn));
}
?>

	<h1><?php echo $incident; ?><br>STATISTICS</h1>
	<table class="data-table">
		<caption class="title"></caption>
		<thead>
			<tr>
				<th>No</th>
				<th>DISTRICT</th>
				<th>INCIDENT</th>
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
					<td>'.++$I.'</td>
					<td>'.$row['district_name'].'</td>
					<td>'.$row['incident_name'].'</td>
					<td>'.$row['total_incidents'].'</td>
					
				</tr>';
			$total += $row['total_incidents'];
			$no++;
		}?>
		</tbody>
		<tfoot>
			<tr><th></th>
				<th colspan="2">TOTAL</th>
				<th><?=number_format($total)?></th>
			</tr>
		</tfoot>
	</table>
	<br>
	<form action="excel.php">
    <input type="submit" value="Download" />	
</form>
			</div>
		</div>
		
		<footer id="footer">
			<div class="innertube">
				<p>Footer...</p>
			</div>
		</footer>	
			
	
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
			min-width: 40px;
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

</html>
