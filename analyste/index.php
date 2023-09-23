<?php require_once 'includes/header.php'; 
error_reporting(0);
$connect = mysqli_connect("localhost", "root", "fidele", "mudb_ims_db");
$truncatevariation = "TRUNCATE TABLE variations";
	$sqlr = mysqli_query($connect, $truncatevariation);
$m = date(m);
$Y =date(Y);
include('dashboard_action.php');

$mydashboard = "SELECT * FROM mydashboard WHERE district_name != 'Uganda' and district_name != 'BURUNDI'  and district_name != 'TANZANIA'  and district_name != 'DRC' ORDER BY report_occurence desc";
$Mmydashboardval= mysqli_query($connect, $mydashboard);
$mymaximum = "SELECT district_name,report_occurence from mydashboard order by report_occurence DESC LIMIT 1";
$maxdashboardval= mysqli_query($connect, $mymaximum);
while($rowmax= mysqli_fetch_array($maxdashboardval)){
	$maxdistrict = $rowmax['district_name'];
	$maxoccurence = $rowmax['report_occurence'];
}

$maxincidents= "SELECT incident_name,number_occurence FROM dash_incidents ORDER BY number_occurence DESC LIMIT 1";
$maxincidentquery = mysqli_query($connect,$maxincidents);
while ($rowmaxinc = mysqli_fetch_array($maxincidentquery)){
	$maximummincident = $rowmaxinc['incident_name'];
	$maxoccurindident = $rowmaxinc['number_occurence'];
}
$province1sum = "SELECT province_name, SUM(report_occurence)AS sumprov from mydashboard WHERE province_name='Eastern Province' ";
$sumprovince1= mysqli_query($connect, $province1sum);
while($rowsumprovince1= mysqli_fetch_array($sumprovince1)){
	$sumdistrict1 = $rowsumprovince1['province_name'];
	$sumprov1 = $rowsumprovince1['sumprov'];
}
$province2sum = "SELECT province_name, SUM(report_occurence)AS sumprov from mydashboard WHERE province_name='Northern Province' ";
$sumprovince2= mysqli_query($connect, $province2sum);
while($rowsumprovince2= mysqli_fetch_array($sumprovince2)){
	$sumdistrict2 = $rowsumprovince2['province_name'];
	$sumprov2 = $rowsumprovince2['sumprov'];
}
$province3sum = "SELECT province_name, SUM(report_occurence)AS sumprov from mydashboard WHERE province_name='Western Province' ";
$sumprovince3= mysqli_query($connect, $province3sum);
while($rowsumprovince3= mysqli_fetch_array($sumprovince3)){
	$sumdistrict3 = $rowsumprovince3['province_name'];
	$sumprov3 = $rowsumprovince3['sumprov'];
}
$province4sum = "SELECT province_name, SUM(report_occurence)AS sumprov from mydashboard WHERE province_name='City of Kigali' ";
$sumprovince4= mysqli_query($connect, $province4sum);
while($rowsumprovince4= mysqli_fetch_array($sumprovince4)){
	$sumdistrict4 = $rowsumprovince4['province_name'];
	$sumprov4 = $rowsumprovince4['sumprov'];
}
$province5sum = "SELECT province_name, SUM(report_occurence)AS sumprov from mydashboard WHERE province_name='Southern Province' ";
$sumprovince5= mysqli_query($connect, $province5sum);
while($rowsumprovince5= mysqli_fetch_array($sumprovince5)){
	$sumdistrict5 = $rowsumprovince5['province_name'];
	$sumprov5 = $rowsumprovince5['sumprov'];
}
$myarr=[$sumprov1,$sumprov2,$sumprov3,$sumprov4,$sumprov5];
$mynapmes = [$sumdistrict1,$sumdistrict2,$sumdistrict3,$sumdistrict4,$sumdistrict5];
for($i=0;$i<=4;$i++){
	if(($myarr[$i])==MAX($myarr)){
		$MMM = $myarr[$i];
		$myname = $mynapmes[$i];
	}
}
//count  for incidents current month
$mydincidents = "SELECT distinct incident_name FROM incidents";
$Mmydincidnets= mysqli_query($connect, $mydincidents);
while($rowincidents= mysqli_fetch_array($Mmydincidnets)){
$incident=$rowincidents['incident_name']; 
$occurences1 = "SELECT incident_name,COUNT(incident_name)AS nincidents1 FROM reports where (incident_name = '$incident' AND (MONTH(dateincident)= $m-1 AND YEAR(dateincident)= $Y)) GROUP BY incident_name";
$myoccurences1 = mysqli_query($connect, $occurences1);
while($rowocc1 = mysqli_fetch_array($myoccurences1)){
$nameinc1[] = $rowocc1['incident_name'];
$numberinc1[]=$rowocc1['nincidents1'];

}
//Insert ofr current month
$occurences = "SELECT incident_name,COUNT(incident_name)AS nincidents FROM reports where (incident_name = '$incident' AND (MONTH(dateincident)= $m AND YEAR(dateincident)= $Y)) GROUP BY incident_name";
$myoccurences = mysqli_query($connect, $occurences);
while($rowocc = mysqli_fetch_array($myoccurences)){
$nameinc = $rowocc['incident_name'];
$numberinc=$rowocc['nincidents'];
$insertcur= "INSERT INTO variations(incident_name,current_motnh) VALUES ('$nameinc','$numberinc')";
$myinsertcur= mysqli_query($connect, $insertcur);
//Update of insert for previous month
}
}
$Number = count($numberinc1);
for($s = 0; $s < $Number; $s++){
$updatecur= "UPDATE variations SET month1 = '$numberinc1[$s]' where incident_name = '$nameinc1[$s]'";
$myupdate= mysqli_query($connect, $updatecur);
}
$increased = "SELECT incident_name,month1,current_motnh AS diff,(current_motnh-month1*100/month1)AS per FROM variations ORDER BY per DESC LIMIT 5";
$myincresed= mysqli_query($connect, $increased);
while($rowincresed = mysqli_fetch_array($myincresed)){
$perc[] = $rowincresed['per'];
 $incres[]= $rowincresed['incident_name'];
 $differe[] =$rowincresed['diff'].'<br>';	
	
}
$incincident = $incres['0'];
$disrincreas = "SELECT district_name,count(incident_name) AS numincdistr FROM reports WHERE incident_name= '$incincident' AND (MONTH(dateincident)= $m AND YEAR(dateincident)= $Y) GROUP BY district_name ORDER BY numincdistr DESC LIMIT 1";
$myincincreas= mysqli_query($connect, $disrincreas);
while($rowincincresed = mysqli_fetch_array($myincincreas)){
	$increasedistrinc=  $rowincincresed['district_name'].'&nbsp;&nbsp;';
	$numincresdistr =  $rowincincresed['numincdistr'].'<br>';
}

 $total_sum=$sumprov1+$sumprov2+$sumprov5+$sumprov3+$sumprov4;
 $percent_eastern=($sumprov1/$total_sum)*100;
 $percent_Nothern=($sumprov2/$total_sum)*100;
 $percent_Southern=($sumprov5/$total_sum)*100;
 $percent_Western=($sumprov3/$total_sum)*100;
 $percent_Kigali=($sumprov4/$total_sum)*100;
 
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

<!DOCTYPE html>
<html lang="en">
  <head>
    
    <title>Dashboad </title>

    
    <link href="build/css/custom.min.css" rel="stylesheet">
  </head>

  <body style="background-color:#F0F0F0;">
       <form action="dashboard_action"
      <div class="main_container">
        <!-- page content -->
        <div class="right_col" role="main">
          <!-- top tiles -->
          <div class="row tile_count">
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-line-chart"></i> Province with the highest level of incidents</span>
              <div class="count"><?php echo $MMM;?></div>
              <span class="count_bottom"> <?php echo $myname;?></span>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-line-chart"></i> District with the highest level of incindents</span>
              <div class="count"><?php echo  $maxoccurence?></div>
              <span class="count_bottom"><i class="fa fa-line-chart"> <?php echo $maxdistrict;?></span>
            </div>
			
			<div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-line-chart"></i> </span>
              <div class="count"></div>
              <span class="count_bottom"><i class="fa fa-line-chart"></span>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-line-chart"></i> The most Incresed Incident</span>
              <div class="count"><?php echo $differe[0];?></div>
              <span class="count_bottom"><i class="fa fa-line-chart"><?php echo $incres[0];?> </span>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-line-chart"></i> District with The most Increased Incident</span>
              <div class="count"><?php echo $numincresdistr;?></div>
              <span class="count_bottom"><i class="fa fa-line-chart"><?php echo $increasedistrinc;?></span>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-line-chart"></i> Total Montly Reports</span>
              <div class="count"><?php echo $total_sum;?></div>
              <span class="count_bottom"><i class="fa fa-line-chart">Current Month</span>
            </div>
          </div>
          <!-- /top tiles -->

          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="dashboard_graph">

                <div class="row x_title">
                  <div class="col-md-6">
                    
                  </div> <div class="col-md-9 col-sm-9 col-xs-12"  style="max-width:100%;height:auto;float:center">
                  <div id="chart_plot_01" style="max-width:100%;height:auto;float:center">
<!--- Line Chart area-->

<div id="chartContainer" style="height: 370px; max-width: 920px; margin: 0px auto;"></div></div>
                </div>
<div class="col-md-3 col-sm-3 col-xs-12 bg-white">
                  <div class="x_title">
                    <h2>Top 5 Incresed Incidents This Month</h2>
                    <div class="clearfix"></div>
                  </div>

                  <div class="col-md-12 col-sm-12 col-xs-6">
                    <div>
                      <?php echo $incres[0];?> <?php echo $differe[0];?>
                      <div class="">
                        <div class="progress progress_sm" >
                          <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="<?php echo $differe[0];?>"></div>
                        </div>
                      </div>
                    </div>
                    <div>
                   <?php echo $incres[1];?> <?php echo $differe[1];?>
                      <div class="">
                        <div class="progress progress_sm">
                          <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="<?php echo $differe[1];?>"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12 col-sm-12 col-xs-6">
                    <div>
                   <?php echo $incres[2];?> <?php echo $differe[2];?>
                      <div class="">
                        <div class="progress progress_sm" >
                          <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="<?php echo $differe[2];?>"></div>
                        </div>
                      </div>
                    </div>
                    <div>
                   <?php echo $incres[3];?> <?php echo $differe[3];?>
                      <div class="">
                        <div class="progress progress_sm">
                          <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="<?php echo $differe[3];?>"></div>
                        </div>
                      </div>
                    </div>
					<div>
                   <?php echo $incres[4];?> <?php echo $differe[4];?>
                      <div class="">
                        <div class="progress progress_sm">
                          <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="<?php echo $differe[4];?>"></div>
                        </div>
                      </div>
                    </div>
                  </div>

                </div>

                <div class="clearfix"></div>
              </div>
            </div>

          </div>
          <br />

          <div class="row">






          </div>


          <div class="row">
                       <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="x_panel tile fixed_height_320 overflow_hidden">
                                <div class="x_content">

   
 <!--############# Pie chart ########################-->
 
<table style="float:left;">
                    		
                    <tr>
                      <th>
<!--#############################  start chart ###################-->
	<?php

 $con = mysqli_connect('localhost','root','fidele','mudb_ims_db');
?>
<!DOCTYPE HTML>
<html>
<head>

<style>
 
div.c {
    position: absolute;
    top: -18px;
	left: -30px;
   
} 

</style>


 <meta charset="utf-8">
 <title>TechJunkGigs</title>
 <script type="text/javascript" src="js/jsapi"></script>
 <script type="text/javascript">
 google.load("visualization", "1", {packages:["corechart"]});
 google.setOnLoadCallback(drawChart);
 function drawChart() {
 var data = google.visualization.arrayToDataTable([
 
 ['class Name','Students'],
 <?php 
			$query = "SELECT province_name, sum(report_occurence) AS TOTAL FROM mydashboard GROUP BY province_name";
 
			 $exec = mysqli_query($con,$query);
			 while($row = mysqli_fetch_array($exec)){
 
			 echo "['".$row['province_name']."',".$row['TOTAL']."],";
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


</head>
<body>
 <div id="columnchart12" class="c" style="width:50%; height:280px;"></div>
 </div>

 
</body>
</html>
		   
					   
 <!--############# end chart ########################-->
 
 
 <?php
 
 $total_sum=$sumprov1+$sumprov2+$sumprov5+$sumprov3+$sumprov4;
 $percent_eastern=($sumprov1/$total_sum)*100;
 $percent_Nothern=($sumprov2/$total_sum)*100;
 $percent_Southern=($sumprov5/$total_sum)*100;
 $percent_Western=($sumprov3/$total_sum)*100;
 $percent_Kigali=($sumprov4/$total_sum)*100;
 
 ?>
                      </th></tr></table>
					  <table style="float:right; position:relative; top:-35px;">
					  
					  <tr>
                      <th>
                          <p class="">Province</p>
					  </th>
                      <th>
					      <p class="">Total&nbsp;&nbsp;&nbsp;</p>
					  </th>

                      </th>
					  <th>	
                          <p class="">Percentage</p>
                      </th>
					  </tr>
					  <tr>
					  <th>&nbsp;</th>
					  </tr>
                      <tr>
					  <th>&nbsp;</th>
					  </tr>	
                      <tr>
					  <th>&nbsp;</th>
					  </tr>					  
					  <tr>
					  <strong>
                            <th>
                              <p><i class="fa fa-square" style="color:#FF8C00"></i>Eastern </p>
                            </th>
                            <th><?php echo $sumprov1;?></th>
							 <td><?php echo round($percent_eastern, 1)."%"; ?></td>
							 </strong>
                      </tr>
                      <tr>
                            <td>
                              <p><i class="fa fa-square"  style="color:#008000"></i>Nothern</p>
                            </td>
                            <td><?php echo $sumprov2;?></td>
							<td><?php  echo round($percent_Nothern, 1)."%"; ?></td>
                      </tr>
                      <tr>
                            <td>
                              <p><i class="fa fa-square" style="color:#800080"></i>Southern&nbsp;&nbsp;</p>
                            </td>
                            <td><?php echo $sumprov5;?></td>
							<td><?php  echo round($percent_Southern, 1)."%"; ?></td>
                      </tr>
                      <tr>
                            <td>
                              <p><i class="fa fa-square"style="color:#00BFFF"></i>Western</p>
                            </td>
                            <td><?php echo $sumprov3;?></td>
							<td><?php  echo round($percent_Western, 1)."%"; ?></td>
                      </tr>
                      <tr>
                            <td>
                              <p><i class="fa fa-square"style="color:#FF4500"></i>Kigali </p>
                            </td>
                            <td><?php echo $sumprov4;?></td>
							<td><?php  echo round($percent_Kigali, 1)."%"; ?></td>
                      </tr>
					  </b>
                        
                      
                    
                  </table>

                 
					
                </div>
              </div>
            </div>


            <div class="col-md-8 col-sm-8 col-xs-12">



              <div class="row">

                <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="x_panel">
                    <div class="x_title">
                      <h2><strong> Districts with total reports</strong></h2>
                      <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li class="dropdown">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                          <ul class="dropdown-menu" role="menu">
                            <li><a href="#">Settings 1</a>
                            </li>
                            <li><a href="#">Settings 2</a>
                            </li>
                          </ul>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                      </ul>
                      <div class="clearfix"></div>
                    </div>
					 <?php 
			$query1 = "SELECT  sum(report_occurence) AS TOTAL1 FROM mydashboard ";
 
			 $exec1 = mysqli_query($con,$query1);
			 while($row1 = mysqli_fetch_array($exec1)){
              
			
			 $totalincident = $row1['TOTAL1'];
			 }		 
 ?> 
                    <div class="x_content">
                      <div class="dashboard-widget-content">
                        <div class="col-md-4 hidden-small">

                          <table class="countries_list">
                            <tbody>
							<tr>
							<th><font color="#9f192d"><h5><strong>District Name</strong></h5></font></th>
							<th><font color="#9f192d"><h5><strong>Total Reports</strong></h5></font></th>
							</tr>
                              <?php
							  while($row= mysqli_fetch_array($Mmydashboardval)){
							  ?>
							  <tr><td><?php echo $row['district_name'];?></td>
							      <td><?php echo $row['report_occurence'];?></td>
								  </tr>
							  <?php
							  }
							  ?>

                            </tbody>
                          </table>
                        </div>
                        <div class="col-md-8 col-sm-12 col-xs-12" style="height:530px;">
							<img src="images/map.png" style="width:100%;">

						</div>
                      </div>
                    </div>
                  </div>
                </div>

              </div>

                <!-- end of weather widget -->
             
            
          </div>
        </div>
        <!-- /page content -->

             </div>
    </div>
</form>
    <!-- jQuery -->
    <!-- Bootstrap -->
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <link href="vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

      <script src="vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>

    <!-- Flot -->
    
    <!-- Flot plugins -->
   
    <!-- DateJS -->
    <script src="vendors/DateJS/build/date.js"></script>
    <!-- JQVMap -->

    <!-- bootstrap-daterangepicker -->
    <script src="vendors/moment/min/moment.min.js"></script>
    <script src="vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="build/js/custom.min.js"></script>
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
						width: 1000,
						height: 300
						}
				});
				$('#myTable5').gvChart({
					chartType: 'PieChart',
					gvSettings: {
						vAxis: {title: 'Incident reported by provinces'},
						hAxis: {title: 'Month'},
						width: 720,
						height: 300
						}
				});
				
				
				
			});
		});
		</script>
	<script>
window.onload = function () {

var options = {
	exportEnabled: true,
	animationEnabled: true,
	title:{
		text: "Annual Reports "
	},
	subtitles: [{
		text: ""
	}],
	axisX: {
		title: "Months"
	},
	axisY: {
		title: "Number of Reports",
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
		name: "Number of Reports",
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
<script type="text/javascript" src="loader.js"></script>

<script type="text/javascript">
// Load google charts
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

// Draw the chart and set the chart values
function drawChart() {
  var data = google.visualization.arrayToDataTable([
  ['Reports', 'Per Provinces'],
  ['Eastern', <?php echo  $sumprov1;?>],
  ['Northern',<?php echo  $sumprov2;?>],
  ['Southern', <?php echo  $sumprov5;?>],
  ['Western', <?php echo  $sumprov3;?>],
  ['City Of Kigali', <?php echo  $sumprov4;?>]
]);

  // Optional; add a title and set the width and height of the chart
  var options = {'title':'Provinces Reports and Their percentages', 'width':350, 'height':300};

  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.PieChart(document.getElementById('piechart'));
  chart.draw(data, options);
}
</script>

  </body>
</html>

<script src="jquery-1.11.1.min.js"></script>
<script src="jquery.canvasjs.min.js"></script>
