<?php
error_reporting(0);

$connect = mysqli_connect("localhost", "root", "fidele", "mudb_ims_db");

$Y =date(Y);

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


//count for february
$february = "SELECT YEAR(dateincident) AS yr, MONTHNAME(dateincident) AS m, COUNT(incident_name) AS numincident FROM reports where ((MONTH(dateincident)= 2)AND (YEAR(dateincident)=YEAR(CURDATE()))) GROUP BY m order by dateincident";
$resulfebruary = mysqli_query($connect, $february);
$rowfebruary = mysqli_fetch_array($resulfebruary);
$numfebruary = $rowfebruary['numincident'];
if(!$numfebruary){
	$numfebruary=0;
}


//count for MARCH
$march = "SELECT YEAR(dateincident) AS yr, MONTHNAME(dateincident) AS m, COUNT(incident_name) AS numincident FROM reports where((MONTH(dateincident)= 3)AND (YEAR(dateincident)=YEAR(CURDATE()))) GROUP BY m order by dateincident";
$resulmarch = mysqli_query($connect, $march);
$rowmarch = mysqli_fetch_array($resulmarch);
$nummarch = $rowmarch['numincident'];
if(!$nummarch){
	$nummarch=0;
}

//count for April
$april = "SELECT YEAR(dateincident) AS yr, MONTHNAME(dateincident) AS m, COUNT(incident_name) AS numincident FROM reports where ((MONTH(dateincident)= 4)AND (YEAR(dateincident)=YEAR(CURDATE()))) GROUP BY m order by dateincident";
$resulapril = mysqli_query($connect, $april);
$rowapril = mysqli_fetch_array($resulapril);
$numapril = $rowapril['numincident'];
if(!$numapril){
	$numapril=0;
}


//count for May
$may = "SELECT YEAR(dateincident) AS yr, MONTHNAME(dateincident) AS m, COUNT(incident_name) AS numincident FROM reports where((MONTH(dateincident)= 5)AND (YEAR(dateincident)=YEAR(CURDATE())))GROUP BY m order by dateincident";
$resulmay = mysqli_query($connect, $may);
$rowmay = mysqli_fetch_array($resulmay);
$nummay = $rowmay['numincident'];
if(!$nummay){
	$nummay=0;
}

//count for June
$june = "SELECT YEAR(dateincident) AS yr, MONTHNAME(dateincident) AS m, COUNT(incident_name) AS numincident FROM reports where ((MONTH(dateincident)= 6)AND (YEAR(dateincident)=YEAR(CURDATE()))) GROUP BY m order by dateincident";
$resuljune = mysqli_query($connect, $june);
$rowjune = mysqli_fetch_array($resuljune);
$numjune= $rowjune['numincident'];
if(!$numjune){
	$numjune=0;
}

//count for July
$july = "SELECT YEAR(dateincident) AS yr, MONTHNAME(dateincident) AS m, COUNT(incident_name) AS numincident FROM reports where ((MONTH(dateincident)= 7)AND (YEAR(dateincident)=YEAR(CURDATE()))) GROUP BY m order by dateincident";
$resuljuly = mysqli_query($connect, $july);
$rowjuly = mysqli_fetch_array($resuljuly);
$numjuly= $rowjuly['numincident'];
if(!$numjuly){
	$numjuly=0;
}


//count for August
$august = "SELECT YEAR(dateincident) AS yr, MONTHNAME(dateincident) AS m, COUNT(incident_name) AS numincident FROM reports where ((MONTH(dateincident)= 8)AND (YEAR(dateincident)=YEAR(CURDATE()))) GROUP BY m order by dateincident";
$resulaugust = mysqli_query($connect, $august);
$rowaugust = mysqli_fetch_array($resulaugust);
$numaugust= $rowaugust['numincident'];
if(!$numaugust){
	$numaugust=0;
}


//count for September
$september = "SELECT YEAR(dateincident) AS yr, MONTHNAME(dateincident) AS m, COUNT(incident_name) AS numincident FROM reports where ((MONTH(dateincident)= 9)AND (YEAR(dateincident)=YEAR(CURDATE())))GROUP BY m order by dateincident";
$resulseptember = mysqli_query($connect, $september);
$rowseptember = mysqli_fetch_array($resulseptember);
$numseptember= $rowseptember['numincident'];
if(!$numseptember){
	$numseptember=0;
}



//count for October
$october = "SELECT YEAR(dateincident) AS yr, MONTHNAME(dateincident) AS m, COUNT(incident_name) AS numincident FROM reports where ((MONTH(dateincident)= 10)AND (YEAR(dateincident)=YEAR(CURDATE()))) GROUP BY m order by dateincident";
$resuloctober = mysqli_query($connect, $october);
$rowoctober = mysqli_fetch_array($resuloctober);
$numoctober= $rowoctober['numincident'];
if(!$numoctober){
	$numoctober=0;
}


//count for November
$november = "SELECT YEAR(dateincident) AS yr, MONTHNAME(dateincident) AS m, COUNT(incident_name) AS numincident FROM reports where ((MONTH(dateincident)= 11)AND (YEAR(dateincident)=YEAR(CURDATE()))) GROUP BY m order by dateincident";
$resulnovember = mysqli_query($connect, $november);
$rownovember = mysqli_fetch_array($resulnovember);
$numnovember= $rownovember['numincident'];
if(!$numnovember){
	$numnovember=0;
}



//count for December
$december = "SELECT YEAR(dateincident) AS yr, MONTHNAME(dateincident) AS m, COUNT(incident_name) AS numincident FROM reports where ((MONTH(dateincident)= 12)AND (YEAR(dateincident)=YEAR(CURDATE()))) GROUP BY m order by dateincident";
$resuldecember = mysqli_query($connect, $december);
$rowdecember = mysqli_fetch_array($resuldecember);
$numdecember= $rowdecember['numincident'];
if(!$numdecember){
	$numdecember=0;
}
$insert ="INSERT INTO chart_multiple (year,january,february,march,april,may,june,july,august,septemeber,october,november,december)VALUES('2018','$numjanuary','$numfebruary','$nummarch','$numapril','$nummay','$numjune','$numjuly','$numaugust','$numseptember','$numoctober','$numnovember','$numdecember')";
$result = mysqli_query($connect, $insert);

$queryselect = "SELECT * FROM chart_multiple";
$resultselect = mysqli_query($connect, $queryselect);
$chart_data = '';
while($rowselect = mysqli_fetch_array($resultselect))
{
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

?>
		

			<table id='myTable1'>
				<caption>Reports Evolution in <?php echo $Y;?></caption>
				<thead>
					<tr>
						<th></th>
						<th>Jan</th>
						<th>Feb</th>
						<th>Mar</th>
						<th>Apr</th>
						<th>May</th>
						<th>Jun</th>
						<th>Jul</th>
						<th>Aug</th>
						<th>Sep</th>
						<th>Oct</th>
						<th>Nov</th>
						<th>Dec</th>
					</tr>
				</thead>
					<tbody>
					
					<tr>
						<th><?php echo $Y;?></th>
						<td><?php echo $januaryqty;?></td>
						<td><?php echo $februaryqty;?></td>
						<td><?php echo $marchqty;?></td>
						<td><?php echo $aprilqty;?></td>
						<td><?php echo $mayqty;?></td>
						<td><?php echo $juneqty;?></td>
						<td><?php echo $julyqty;?></td>
						<td><?php echo $augustqty;?></td>
						<td><?php echo $septemebrqty;?></td>
						<td><?php echo $octoberqty;?></td>
						<td><?php echo $novemberqty;?></td>
						<td><?php echo $decemberqty;?></td>
					</tr>
				</tbody>
			</table>
			
		<script src="DTjs/jquery.min.js"></script>
		<script type="text/javascript" src="DTjs/jquery.gvChart.min.js"></script>
		<script type="text/javascript">
		$(document).ready(function(){
			googleLoaded.done( function(){
				$('#myTable1').gvChart({
					chartType: 'AreaChart',
					gvSettings: {
						vAxis: {title: 'Number of Reports'},
						hAxis: {title: 'Month'},
						width: 720,
						height: 300
						}
				});
				
				
				
			});
		});
		</script>
   
	</body>
</html>

