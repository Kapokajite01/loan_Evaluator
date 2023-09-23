<?php 

error_reporting(0);
session_start();
$_SESSION["startdate"] = $startdate;
$_SESSION["enddate"] = $enddate;
echo $_SESSION["startdate"];
include('database-config.php');
?>
<?php
require_once 'includes/header.php';

?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>IMS</title>
	<link rel="stylesheet" href="stylesclauriane.css" />
	<link rel="icon" href="images/app_logo.png" />
	<script type="text/javascript" src="jquery-1.7.min.js"></script>

</head>
<?php
$conn = mysqli_connect("localhost", "root", "fidele", "mudb_ims_db");
	$result = '';
	$query = "SELECT total_incidents FROM map";
	$f;
	$mynum=0; 
	$sql = mysqli_query($conn, $query);
while($row = mysqli_fetch_array($sql))
		{
		$f[] = $row['total_incidents'];	
		}
				$num = count($f);
				for($i=0;$i<=$num; $i++){
					if($f[$i] >0){
						$mynum = $mynum+$f[$i];
					}
				}

?>
<body style="background-color: #ffffff ; background-image:url(images/mapdisplay.png); background-repeat: no-repeat;background-position:center;">

	<div class="lg-container">
	<?php 
echo "<strong>"."Countrywide// "."</strong>"."<font color=red>".$_SESSION['incident']."</font>"." FROM:"." TO: ";
echo "<br>";
echo "<strong>"."Total records"."&nbsp;&nbsp;&nbsp".":"."</strong>"."<font color=blue>".$mynum."</font>";
?>
					<div id="nyagatare"><span name="nyagatare" style=" position: relative;left: 660px;top: 115px;"><?php 
					if($f[0] !=0){
echo '<img src="images/mappin.png"></img>';
						echo '<font color="black"><strong>'.$f[0];

					}else{
						echo '<img src="images/elsepin.png"></img>';
					}
					?></span></div>
					<div id="burera"><span name="burera" style=" position: relative;left: 420px;top: 110px;"><?php 
					if($f[1] !=0){
						
echo '<img src="images/mappin.png"></img>';
echo $f[1];
					}else{
						echo '<img src="images/elsepin.png"></img>';
					}
					?></span></div>	
					<div id="musanze"><span name="musanze" style=" position: relative;left: 325px;top: 95px;"><?php 
					if($f[2] !=0){
echo '<img src="images/mappin.png"></img>';
						echo $f[2];

					}else{
						echo '<img src="images/elsepin.png"></img>';
					}
					?></img></span></div>	
					<div id="gicumbi"><span name="gicumbi" style=" position: relative;left: 530px;top: 100px;"><?php 
					if($f[3] !=0){
echo '<img src="images/mappin.png"></img>';
						echo $f[3];

					}else{
						echo '<img src="images/elsepin.png"></img>';
					}
					?></span></div>	
					<div id="gatsibo"><span name="gatsibo" style=" position: relative;left: 700px;top: 90px;"><?php 
					if($f[4] !=0){
echo '<img src="images/mappin.png"></img>';
						echo $f[4];

					}else{
						echo '<img src="images/elsepin.png"></img>';
					}
					?></span></div>
					<div id="rulindo"><span name="rulindo" style=" position: relative;left: 500px;top: 100px;"><?php 
					if($f[5] !=0){
echo '<img src="images/mappin.png"></img>';
						echo $f[5];

					}else{
						echo '<img src="images/elsepin.png"></img>';
					}
					?></img></span></div>
					<div id="gakenke"><span name="gakenke" style=" position: relative;left: 400px;top: 50px;"><?php 
					if($f[6] !=0){
echo '<img src="images/mappin.png"></img>';
						echo $f[6];

					}else{
						echo '<img src="images/elsepin.png"></img>';
					}
					?></span></div>	
					<div id="nyabihu"><span name="nyabihu" style=" position: relative;left: 290px;top: 0px;"><?php 
					if($f[7] !=0){
echo '<img src="images/mappin.png"></img>';
						echo $f[7];

					}else{
						echo '<img src="images/elsepin.png"></img>';
					}
					?></img></span></div>	
					<div id="rubavu"><span name="rubavu" style=" position: relative;left: 200px;top: -20px;"><?php 
					if($f[8] !=0){
echo '<img src="images/mappin.png"></img>';
						echo $f[8];

					}else{
						echo '<img src="images/elsepin.png"></img>';
					}
					?></span></div>	
					<div id="kayonza"><span name="kayonza" style=" position: relative;left: 780px;top: 20px;"><?php 
					if($f[9] !=0){
echo '<img src="images/mappin.png"></img>';
						echo $f[9];

					}else{
						echo '<img src="images/elsepin.png"></img>';
					}
					?></span></div>	
					<div id="rwamagana"><span name="rwamagana" style=" position: relative;left: 650px;top: 25px;"><?php 
					if($f[10] !=0){
echo '<img src="images/mappin.png"></img>';
						echo $f[10];

					}else{
						echo '<img src="images/elsepin.png"></img>';
					}
					?></span></div>
					<div id="gasabo"><span name="gasabo" style=" position: relative;left: 550px;top: -50px;"><?php 
					if($f[11] !=0){
echo '<img src="images/mappin.png"></img>';
						echo $f[11];

					}else{
						echo '<img src="images/elsepin.png"></img>';
					}
					?></span></div>	
					<div id="ngororero"><span name="ngororero" style=" position: relative;left: 310px;top: -85px;"><?php 
					if($f[12] !=0){
echo '<img src="images/mappin.png"></img>';
						echo $f[12];

					}else{
						echo '<img src="images/elsepin.png"></img>';
					}
					?></span></div>	
					<div id="rutsiro"><span name="rutsiro" style=" position: relative;left: 180px;top: -80px;"><?php 
					if($f[13] !=0){
echo '<img src="images/mappin.png"></img>';
						echo $f[13];

					}else{
						echo '<img src="images/elsepin.png"></img>';
					}
					?></span></div>
					<div id="kicukiro"><span name="kicukiro" style=" position: relative;left: 560px;top: -90px;"><?php 
					if($f[14] !=0){
echo '<img src="images/mappin.png"></img>';
						echo $f[14];

					}else{
						echo '<img src="images/elsepin.png"></img>';
					}
					?></span></div>
					<div id="nyarugenge"><span name="nyarugenge" style=" position: relative;left: 510px;top: -140px;"><?php 
					if($f[15] !=0){
echo '<img src="images/mappin.png"></img>';
						echo $f[15];

					}else{
						echo '<img src="images/elsepin.png"></img>';
					}
					?></img></span></div>
					<div id="kamonyi"><span name="kamonyi" style=" position: relative;left: 430px;top: -160px;"><?php 
					if($f[16] !=0){
echo '<img src="images/mappin.png"></img>';
						echo $f[16];

					}else{
						echo '<img src="images/elsepin.png"></img>';
					}
					?></span></div>	
					<div id="muhanga"><span name="muhanga" style=" position: relative;left: 360px;top: -180px;"><?php 
					if($f[17] !=0){
echo '<img src="images/mappin.png"></img>';
						echo $f[17];

					}else{
						echo '<img src="images/elsepin.png"></img>';
					}
					?></span></div>	
					<div id="karongi"><span name="karongi" style=" position: relative;left: 200px;top: -160px;"><?php 
					if($f[18] !=0){
echo '<img src="images/mappin.png"></img>';
						echo $f[18];

					}else{
						echo '<img src="images/elsepin.png"></img>';
					}
					?></span></div>	
					<div id="kirehe"><span name="kirehe" style=" position: relative;left: 800px;top: -180px;"><?php 
					if($f[19] !=0){
echo '<img src="images/mappin.png"></img>';
						echo $f[19];

					}else{
						echo '<img src="images/elsepin.png"></img>';
					}
					?></img></span></div>	
					<div id="ngoma"><span name="ngoma" style=" position: relative;left: 680px;top: -230px;"><?php 
					if($f[20] !=0){
echo '<img src="images/mappin.png"></img>';
						echo $f[20];

					}else{
						echo '<img src="images/elsepin.png"></img>';
					}
					?></span></div>
					<div id="bugesera"><span name="bugesera" style=" position: relative;left: 560px;top: -190px;"><?php 
					if($f[21] !=0){
echo '<img src="images/mappin.png"></img>';
						echo $f[21];

					}else{
						echo '<img src="images/elsepin.png"></img>';
					}
					?></img></span></div>	
					<div id="ruhango"><span name="ruhango" style=" position: relative;left: 390px;top: -280px;"><?php 
					if($f[22] !=0){
echo '<img src="images/mappin.png"></img>';
						echo $f[22];

					}else{
						echo '<img src="images/elsepin.png"></img>';
					}
					?></span></div>	
					<div id="nyanza"><span name="nyanza" style=" position: relative;left: 350px;top: -270px;"><?php 
					if($f[23] !=0){
echo '<img src="images/mappin.png"></img>';
						echo $f[23];

					}else{
						echo '<img src="images/elsepin.png"></img>';
					}
					?></span></div>	
					<div id="gisagara"><span name="gisagara" style=" position: relative;left: 430px;top: -190px;"><?php 
					if($f[24] !=0){
echo '<img src="images/mappin.png"></img>';
						echo $f[24];

					}else{
						echo '<img src="images/elsepin.png"></img>';
					}
					?></span></div>	
					<div id="nyamasheke"><span name="nyamasheke" style=" position: relative;left: 110px;top: -330px;"><?php 
					if($f[25] !=0){
echo '<img src="images/mappin.png"></img>';
						echo $f[25];

					}else{
						echo '<img src="images/elsepin.png"></img>';
					}
					?></span></div>
					<div id="nyamagabe"><span name="nyamagabe" style=" position: relative;left: 250px;top: -350px;"><?php 
					if($f[26] !=0){
echo '<img src="images/mappin.png"></img>';
						echo $f[26];

					}else{
						echo '<img src="images/elsepin.png"></img>';
					}
					?></span></div>	
					<div id="rusizi"><span name="rusizi" style=" position: relative;left: 30px;top: -270px;"><?php 
					if($f[27] !=0){
echo '<img src="images/mappin.png"></img>';
						echo $f[27];

					}else{
						echo '<img src="images/elsepin.png"></img>';
					}
					?></span></div>	
					<div id="huye"><span name="huye" style=" position: relative;left: 360px;top: -320px;"><?php 
					if($f[28] !=0){
echo '<img src="images/mappin.png"></img>';
						echo $f[28];

					}else{
						echo '<img src="images/elsepin.png"></img>';
					}
					?></span></div>	
					<div id="nyaruguru"><span name="nyaruguru" style=" position: relative;left: 280px;top: -280px;"><?php 
					if($f[29] !=0){
echo '<img src="images/mappin.png"></img>';
						echo $f[29];

					}else{
						echo '<img src="images/elsepin.png"></img>';
					}
					?></span></div>	
					<div id="Uganda"><span name="Uganda" style=" position: relative;left: 450px;top: -950px;"><?php 
					if($f[30] !=0){
echo '<img src="images/arrow_uganda.png"></img>';
						echo $f[30];

					}else{
						echo '<img src="images/elsepin.png"></img>';
					}
					?></span></div>
					<div id="DRC"><span name="DRC" style=" position: relative;left: 120px;top: -950px;"><?php 
					if($f[31] !=0){
echo '<img src="images/arrow_drc.png"></img>';
						echo $f[31];

					}else{
						echo '<img src="images/elsepin.png"></img>';
					}
					?></span></div>
					<div id="TANZANIA"><span name="TANZANIA" style=" position: relative;left: 850px;top: -1020px;"><?php 
					if($f[32] !=0){
echo '<img src="images/arrow_tanzania.png"></img>';
						echo $f[32];

					}else{
						echo '<img src="images/elsepin.png"></img>';
					}
					?></span></div>
					<div id="BURUNDI"><span name="BURUNDI" style=" position: relative;left:580px;top: -380px;"><?php 
					if($f[33] !=0){
echo '<img src="images/arrow_burundi.png"></img>';
						echo $f[33];

					}else{
						echo '<img src="images/elsepin.png"></img>';
					}
					?></span></div>


	</div>

</body>
</html>