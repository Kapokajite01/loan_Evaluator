<?php
error_reporting(0);
$conn = mysqli_connect("localhost", "root", "fidele", "mudb_ims_db");
session_start();
$incident  = $_POST['incident'];
$_SESSION['incident'] = $_POST['incident'];;
$startdate = $_POST['startdate'];
$enddate   = $_POST['enddate'];
$actors_group_name   = $_POST['actors_group_name'];
$_SESSION['actors_group_name'] = $_POST['actors_group_name'];
$sqltruncate = "TRUNCATE TABLE map";
	$sqlr = mysqli_query($conn, $sqltruncate);


if($incident!="" AND $startdate=="" AND $enddate=="" AND $actors_group_name==""){
	//COUNT FOR NYAGATARE
$displayNYAGATARE ="select district_name, incident_name, count(incident_name) AS counts FROM reports WHERE incident_name='$incident' AND district_name = 'NYAGATARE'";
	$sqlNYAGATARE = mysqli_query($conn, $displayNYAGATARE);

while($rowdisplayNYAGATARE = mysqli_fetch_array($sqlNYAGATARE))
		{
		$distrnameNYAGATARE =  'NYAGATARE';	
		$numcoutsNYAGATARE = $rowdisplayNYAGATARE['counts'].'</BR>';	
		$insNYAGATARE = "insert into map(district_name,insident_name,total_incidents)VALUES ('$distrnameNYAGATARE','$_POST[incident]','$numcoutsNYAGATARE')";
		mysqli_query($conn, $insNYAGATARE);
		}

		
		
//COUNT FOR BURERA
$displayBURERA ="select district_name, incident_name, count(incident_name) AS counts FROM reports WHERE incident_name='$incident' AND district_name = 'BURERA'";
	$sqlBURERA = mysqli_query($conn, $displayBURERA);

while($rowdisplayBURERA = mysqli_fetch_array($sqlBURERA))
		{
		$distrnameBURERA =  'BURERA';	
		$numcoutsBURERA = $rowdisplayBURERA['counts'].'</BR>';	
		$insBURERA = "insert into map(district_name,insident_name,total_incidents)VALUES ('$distrnameBURERA','$_POST[incident]','$numcoutsBURERA')";
		mysqli_query($conn, $insBURERA);
		}
//COUNT FOR MUSANZE
$displayMUSANZE ="select district_name, incident_name, count(incident_name) AS counts FROM reports WHERE incident_name='$incident' AND district_name = 'MUSANZE'";
	$sqlMUSANZE = mysqli_query($conn, $displayMUSANZE);

while($rowdisplayMUSANZE = mysqli_fetch_array($sqlMUSANZE))
		{
		$distrnameMUSANZE =  'MUSANZE';	
		$numcoutsMUSANZE = $rowdisplayMUSANZE['counts'].'</BR>';	
		$insMUSANZE = "insert into map(district_name,insident_name,total_incidents)VALUES ('$distrnameMUSANZE','$_POST[incident]','$numcoutsMUSANZE')";
		mysqli_query($conn, $insMUSANZE);
		}
		
//COUNT FOR GICUMBI
$displayGICUMBI ="select district_name, incident_name, count(incident_name) AS counts FROM reports WHERE incident_name='$incident' AND district_name = 'GICUMBI'";
	$sqlGICUMBI = mysqli_query($conn, $displayGICUMBI);

while($rowdisplayGICUMBI = mysqli_fetch_array($sqlGICUMBI))
		{
		$distrnameGICUMBI =  'GICUMBI';	
		$numcoutsGICUMBI = $rowdisplayGICUMBI['counts'].'</BR>';	
		$insGICUMBI = "insert into map(district_name,insident_name,total_incidents)VALUES ('$distrnameGICUMBI','$_POST[incident]','$numcoutsGICUMBI')";
		mysqli_query($conn, $insGICUMBI);
		}
		
//COUNT FOR GATSIBO
$displayGATSIBO ="select district_name, incident_name, count(incident_name) AS counts FROM reports WHERE incident_name='$incident' AND district_name = 'GATSIBO'";
	$sqlGATSIBO = mysqli_query($conn, $displayGATSIBO);

while($rowdisplayGATSIBO = mysqli_fetch_array($sqlGATSIBO))
		{
		$distrnameGATSIBO =  'GATSIBO';	
		$numcoutsGATSIBO = $rowdisplayGATSIBO['counts'].'</BR>';	
		$insGATSIBO = "insert into map(district_name,insident_name,total_incidents)VALUES ('$distrnameGATSIBO','$_POST[incident]','$numcoutsGATSIBO')";
		mysqli_query($conn, $insGATSIBO);
		}
		
//COUNT FOR RULINDO
$displayRULINDO ="select district_name, incident_name, count(incident_name) AS counts FROM reports WHERE incident_name='$incident' AND district_name = 'RULINDO'";
	$sqlRULINDO = mysqli_query($conn, $displayRULINDO);

while($rowdisplayRULINDO = mysqli_fetch_array($sqlRULINDO))
		{
		$distrnameRULINDO =  'RULINDO';	
		$numcoutsRULINDO = $rowdisplayRULINDO['counts'].'</BR>';	
		$insRULINDO = "insert into map(district_name,insident_name,total_incidents)VALUES ('$distrnameRULINDO','$_POST[incident]','$numcoutsRULINDO')";
		mysqli_query($conn, $insRULINDO);
		}
		
//COUNT FOR GAKENKE
$displayGAKENKE ="select district_name, incident_name, count(incident_name) AS counts FROM reports WHERE incident_name='$incident' AND district_name = 'GAKENKE'";
	$sqlGAKENKE = mysqli_query($conn, $displayGAKENKE);

while($rowdisplayGAKENKE = mysqli_fetch_array($sqlGAKENKE))
		{
		$distrnameGAKENKE =  'GAKENKE';	
		$numcoutsGAKENKE = $rowdisplayGAKENKE['counts'].'</BR>';	
		$insGAKENKE = "insert into map(district_name,insident_name,total_incidents)VALUES ('$distrnameGAKENKE','$_POST[incident]','$numcoutsGAKENKE')";
		mysqli_query($conn, $insGAKENKE);
		}
		
//COUNT FOR NYABIHU
$displayNYABIHU ="select district_name, incident_name, count(incident_name) AS counts FROM reports WHERE incident_name='$incident' AND district_name = 'NYABIHU'";
	$sqlNYABIHU = mysqli_query($conn, $displayNYABIHU);

while($rowdisplayNYABIHU = mysqli_fetch_array($sqlNYABIHU))
		{
		$distrnameNYABIHU =  'NYABIHU';	
		$numcoutsNYABIHU = $rowdisplayNYABIHU['counts'].'</BR>';	
		$insNYABIHU = "insert into map(district_name,insident_name,total_incidents)VALUES ('$distrnameNYABIHU','$_POST[incident]','$numcoutsNYABIHU')";
		mysqli_query($conn, $insNYABIHU);
		}
//COUNT FOR RUBAVU
$displayRUBAVU ="select district_name, incident_name, count(incident_name) AS counts FROM reports WHERE incident_name='$incident' AND district_name = 'RUBAVU'";
	$sqlRUBAVU = mysqli_query($conn, $displayRUBAVU);

while($rowdisplayRUBAVU = mysqli_fetch_array($sqlRUBAVU))
		{
		$distrnameRUBAVU =  'RUBAVU';	
		$numcoutsRUBAVU = $rowdisplayRUBAVU['counts'].'</BR>';	
		$insRUBAVU = "insert into map(district_name,insident_name,total_incidents)VALUES ('$distrnameRUBAVU','$_POST[incident]','$numcoutsRUBAVU')";
		mysqli_query($conn, $insRUBAVU);
		}

//COUNT FOR KAYONZA
$displayKAYONZA ="select district_name, incident_name, count(incident_name) AS counts FROM reports WHERE incident_name='$incident' AND district_name = 'KAYONZA'";
	$sqlKAYONZA = mysqli_query($conn, $displayKAYONZA);

while($rowdisplayKAYONZA = mysqli_fetch_array($sqlKAYONZA))
		{
		$distrnameKAYONZA =  'KAYONZA';	
		$numcoutsKAYONZA = $rowdisplayKAYONZA['counts'].'</BR>';	
		$insKAYONZA = "insert into map(district_name,insident_name,total_incidents)VALUES ('$distrnameKAYONZA','$_POST[incident]','$numcoutsKAYONZA')";
		mysqli_query($conn, $insKAYONZA);
		}
//COUNT FOR RWAMAGANA
$displayRWAMAGANA ="select district_name, incident_name, count(incident_name) AS counts FROM reports WHERE incident_name='$incident' AND district_name = 'RWAMAGANA'";
	$sqlRWAMAGANA = mysqli_query($conn, $displayRWAMAGANA);

while($rowdisplayRWAMAGANA = mysqli_fetch_array($sqlRWAMAGANA))
		{
		$distrnameRWAMAGANA =  'RWAMAGANA';	
		$numcoutsRWAMAGANA = $rowdisplayRWAMAGANA['counts'].'</BR>';	
		$insRWAMAGANA = "insert into map(district_name,insident_name,total_incidents)VALUES ('$distrnameRWAMAGANA','$_POST[incident]','$numcoutsRWAMAGANA')";
		mysqli_query($conn, $insRWAMAGANA);
		}
//COUNT FOR GASABO
$displayGASABO ="select district_name, incident_name, count(incident_name) AS counts FROM reports WHERE incident_name='$incident' AND district_name = 'GASABO'";
	$sqlGASABO = mysqli_query($conn, $displayGASABO);

while($rowdisplayGASABO = mysqli_fetch_array($sqlGASABO))
		{
		$distrnameGASABO =  'GASABO';	
		$numcoutsGASABO = $rowdisplayGASABO['counts'].'</BR>';	
		$insGASABO = "insert into map(district_name,insident_name,total_incidents)VALUES ('$distrnameGASABO','$_POST[incident]','$numcoutsGASABO')";
		mysqli_query($conn, $insGASABO);
		}
//COUNT FOR NGORORERO
$displayNGORORERO ="select district_name, incident_name, count(incident_name) AS counts FROM reports WHERE incident_name='$incident' AND district_name = 'NGORORERO'";
	$sqlNGORORERO = mysqli_query($conn, $displayNGORORERO);

while($rowdisplayNGORORERO = mysqli_fetch_array($sqlNGORORERO))
		{
		$distrnameNGORORERO =  'NGORORERO';	
		$numcoutsNGORORERO = $rowdisplayNGORORERO['counts'].'</BR>';	
		$insNGORORERO = "insert into map(district_name,insident_name,total_incidents)VALUES ('$distrnameNGORORERO','$_POST[incident]','$numcoutsNGORORERO')";
		mysqli_query($conn, $insNGORORERO);
		}
//COUNT FOR RUTSIRO
$displayRUTSIRO ="select district_name, incident_name, count(incident_name) AS counts FROM reports WHERE incident_name='$incident' AND district_name = 'RUTSIRO'";
	$sqlRUTSIRO = mysqli_query($conn, $displayRUTSIRO);

while($rowdisplayRUTSIRO = mysqli_fetch_array($sqlRUTSIRO))
		{
		$distrnameRUTSIRO =  'RUTSIRO';	
		$numcoutsRUTSIRO = $rowdisplayRUTSIRO['counts'].'</BR>';	
		$insRUTSIRO = "insert into map(district_name,insident_name,total_incidents)VALUES ('$distrnameRUTSIRO','$_POST[incident]','$numcoutsRUTSIRO')";
		mysqli_query($conn, $insRUTSIRO);
		}
//COUNT FOR KICUKIRO
$displayKICUKIRO ="select district_name, incident_name, count(incident_name) AS counts FROM reports WHERE incident_name='$incident' AND district_name = 'KICUKIRO'";
	$sqlKICUKIRO = mysqli_query($conn, $displayKICUKIRO);

while($rowdisplayKICUKIRO = mysqli_fetch_array($sqlKICUKIRO))
		{
		$distrnameKICUKIRO =  'KICUKIRO';	
		$numcoutsKICUKIRO = $rowdisplayKICUKIRO['counts'].'</BR>';	
		$insKICUKIRO = "insert into map(district_name,insident_name,total_incidents)VALUES ('$distrnameKICUKIRO','$_POST[incident]','$numcoutsKICUKIRO')";
		mysqli_query($conn, $insKICUKIRO);
		}
//COUNT FOR NYARUGENGE
$displayNYARUGENGE ="select district_name, incident_name, count(incident_name) AS counts FROM reports WHERE incident_name='$incident' AND district_name = 'NYARUGENGE'";
	$sqlNYARUGENGE = mysqli_query($conn, $displayNYARUGENGE);

while($rowdisplayNYARUGENGE = mysqli_fetch_array($sqlNYARUGENGE))
		{
		$distrnameNYARUGENGE =  'NYARUGENGE';	
		$numcoutsNYARUGENGE = $rowdisplayNYARUGENGE['counts'].'</BR>';	
		$insNYARUGENGE = "insert into map(district_name,insident_name,total_incidents)VALUES ('$distrnameNYARUGENGE','$_POST[incident]','$numcoutsNYARUGENGE')";
		mysqli_query($conn, $insNYARUGENGE);
		}
//COUNT FOR KAMONYI
$displayKAMONYI ="select district_name, incident_name, count(incident_name) AS counts FROM reports WHERE incident_name='$incident' AND district_name = 'KAMONYI'";
	$sqlKAMONYI = mysqli_query($conn, $displayKAMONYI);

while($rowdisplayKAMONYI = mysqli_fetch_array($sqlKAMONYI))
		{
		$distrnameKAMONYI =  'KAMONYI';	
		$numcoutsKAMONYI = $rowdisplayKAMONYI['counts'].'</BR>';	
		$insKAMONYI = "insert into map(district_name,insident_name,total_incidents)VALUES ('$distrnameKAMONYI','$_POST[incident]','$numcoutsKAMONYI')";
		mysqli_query($conn, $insKAMONYI);
		}
//COUNT FOR MUHANGA
$displayMUHANGA ="select district_name, incident_name, count(incident_name) AS counts FROM reports WHERE incident_name='$incident' AND district_name = 'MUHANGA'";
	$sqlMUHANGA = mysqli_query($conn, $displayMUHANGA);

while($rowdisplayMUHANGA = mysqli_fetch_array($sqlMUHANGA))
		{
		$distrnameMUHANGA =  'MUHANGA';	
		$numcoutsMUHANGA = $rowdisplayMUHANGA['counts'].'</BR>';	
		$insMUHANGA = "insert into map(district_name,insident_name,total_incidents)VALUES ('$distrnameMUHANGA','$_POST[incident]','$numcoutsMUHANGA')";
		mysqli_query($conn, $insMUHANGA);
		}
//COUNT FOR KARONGI
$displayKARONGI ="select district_name, incident_name, count(incident_name) AS counts FROM reports WHERE incident_name='$incident' AND district_name = 'KARONGI'";
	$sqlKARONGI = mysqli_query($conn, $displayKARONGI);

while($rowdisplayKARONGI = mysqli_fetch_array($sqlKARONGI))
		{
		$distrnameKARONGI =  'KARONGI';	
		$numcoutsKARONGI = $rowdisplayKARONGI['counts'].'</BR>';	
		$insKARONGI = "insert into map(district_name,insident_name,total_incidents)VALUES ('$distrnameKARONGI','$_POST[incident]','$numcoutsKARONGI')";
		mysqli_query($conn, $insKARONGI);
		}
//COUNT FOR KIREHE
$displayKIREHE ="select district_name, incident_name, count(incident_name) AS counts FROM reports WHERE incident_name='$incident' AND district_name = 'KIREHE'";
	$sqlKIREHE = mysqli_query($conn, $displayKIREHE);

while($rowdisplayKIREHE = mysqli_fetch_array($sqlKIREHE))
		{
		$distrnameKIREHE =  'KIREHE';	
		$numcoutsKIREHE = $rowdisplayKIREHE['counts'].'</BR>';	
		$insKIREHE = "insert into map(district_name,insident_name,total_incidents)VALUES ('$distrnameKIREHE','$_POST[incident]','$numcoutsKIREHE')";
		mysqli_query($conn, $insKIREHE);
		}
//COUNT FOR NGOMA
$displayNGOMA ="select district_name, incident_name, count(incident_name) AS counts FROM reports WHERE incident_name='$incident' AND district_name = 'NGOMA'";
	$sqlNGOMA = mysqli_query($conn, $displayNGOMA);

while($rowdisplayNGOMA = mysqli_fetch_array($sqlNGOMA))
		{
		$distrnameNGOMA =  'NGOMA';	
		$numcoutsNGOMA = $rowdisplayNGOMA['counts'].'</BR>';	
		$insNGOMA = "insert into map(district_name,insident_name,total_incidents)VALUES ('$distrnameNGOMA','$_POST[incident]','$numcoutsNGOMA')";
		mysqli_query($conn, $insNGOMA);
		}
//COUNT FOR BUGESERA
$displayBUGESERA ="select district_name, incident_name, count(incident_name) AS counts FROM reports WHERE incident_name='$incident' AND district_name = 'BUGESERA'";
	$sqlBUGESERA = mysqli_query($conn, $displayBUGESERA);

while($rowdisplayBUGESERA = mysqli_fetch_array($sqlBUGESERA))
		{
		$distrnameBUGESERA =  'BUGESERA';	
		$numcoutsBUGESERA = $rowdisplayBUGESERA['counts'].'</BR>';	
		$insBUGESERA = "insert into map(district_name,insident_name,total_incidents)VALUES ('$distrnameBUGESERA','$_POST[incident]','$numcoutsBUGESERA')";
		mysqli_query($conn, $insBUGESERA);
		}
//COUNT FOR RUHANGO
$displayRUHANGO ="select district_name, incident_name, count(incident_name) AS counts FROM reports WHERE incident_name='$incident' AND district_name = 'RUHANGO'";
	$sqlRUHANGO = mysqli_query($conn, $displayRUHANGO);

while($rowdisplayRUHANGO = mysqli_fetch_array($sqlRUHANGO))
		{
		$distrnameRUHANGO =  'RUHANGO';	
		$numcoutsRUHANGO = $rowdisplayRUHANGO['counts'].'</BR>';	
		$insRUHANGO = "insert into map(district_name,insident_name,total_incidents)VALUES ('$distrnameRUHANGO','$_POST[incident]','$numcoutsRUHANGO')";
		mysqli_query($conn, $insRUHANGO);
		}
//COUNT FOR NYANZA
$displayNYANZA ="select district_name, incident_name, count(incident_name) AS counts FROM reports WHERE incident_name='$incident' AND district_name = 'NYANZA'";
	$sqlNYANZA = mysqli_query($conn, $displayNYANZA);

while($rowdisplayNYANZA = mysqli_fetch_array($sqlNYANZA))
		{
		$distrnameNYANZA =  'NYANZA';	
		$numcoutsNYANZA = $rowdisplayNYANZA['counts'].'</BR>';	
		$insNYANZA = "insert into map(district_name,insident_name,total_incidents)VALUES ('$distrnameNYANZA','$_POST[incident]','$numcoutsNYANZA')";
		mysqli_query($conn, $insNYANZA);
		}
//COUNT FOR GISAGARA
$displayGISAGARA ="select district_name, incident_name, count(incident_name) AS counts FROM reports WHERE incident_name='$incident' AND district_name = 'GISAGARA'";
	$sqlGISAGARA = mysqli_query($conn, $displayGISAGARA);

while($rowdisplayGISAGARA = mysqli_fetch_array($sqlGISAGARA))
		{
		$distrnameGISAGARA =  'GISAGARA';	
		$numcoutsGISAGARA = $rowdisplayGISAGARA['counts'].'</BR>';	
		$insGISAGARA = "insert into map(district_name,insident_name,total_incidents)VALUES ('$distrnameGISAGARA','$_POST[incident]','$numcoutsGISAGARA')";
		mysqli_query($conn, $insGISAGARA);
		}
//COUNT FOR NYAMASHEKE
$displayNYAMASHEKE ="select district_name, incident_name, count(incident_name) AS counts FROM reports WHERE incident_name='$incident' AND district_name = 'NYAMASHEKE'";
	$sqlNYAMASHEKE = mysqli_query($conn, $displayNYAMASHEKE);

while($rowdisplayNYAMASHEKE = mysqli_fetch_array($sqlNYAMASHEKE))
		{
		$distrnameNYAMASHEKE =  'NYAMASHEKE';	
		$numcoutsNYAMASHEKE = $rowdisplayNYAMASHEKE['counts'].'</BR>';	
		$insNYAMASHEKE = "insert into map(district_name,insident_name,total_incidents)VALUES ('$distrnameNYAMASHEKE','$_POST[incident]','$numcoutsNYAMASHEKE')";
		mysqli_query($conn, $insNYAMASHEKE);
		}
//COUNT FOR NYAMAGABE
$displayNYAMAGABE ="select district_name, incident_name, count(incident_name) AS counts FROM reports WHERE incident_name='$incident' AND district_name = 'NYAMAGABE'";
	$sqlNYAMAGABE = mysqli_query($conn, $displayNYAMAGABE);

while($rowdisplayNYAMAGABE = mysqli_fetch_array($sqlNYAMAGABE))
		{
		$distrnameNYAMAGABE =  'NYAMAGABE';	
		$numcoutsNYAMAGABE = $rowdisplayNYAMAGABE['counts'].'</BR>';	
		$insNYAMAGABE = "insert into map(district_name,insident_name,total_incidents)VALUES ('$distrnameNYAMAGABE','$_POST[incident]','$numcoutsNYAMAGABE')";
		mysqli_query($conn, $insNYAMAGABE);
		}
		
//COUNT FOR RUSIZI
$displayRUSIZI ="select district_name, incident_name, count(incident_name) AS counts FROM reports WHERE incident_name='$incident' AND district_name = 'RUSIZI'";
	$sqlRUSIZI = mysqli_query($conn, $displayRUSIZI);

while($rowdisplayRUSIZI = mysqli_fetch_array($sqlRUSIZI))
		{
		$distrnameRUSIZI =  'RUSIZI';	
		$numcoutsRUSIZI = $rowdisplayRUSIZI['counts'].'</BR>';	
		$insRUSIZI = "insert into map(district_name,insident_name,total_incidents)VALUES ('$distrnameRUSIZI','$_POST[incident]','$numcoutsRUSIZI')";
		mysqli_query($conn, $insRUSIZI);
		}
//COUNT FOR HUYE
$displayHUYE ="select district_name, incident_name, count(incident_name) AS counts FROM reports WHERE incident_name='$incident' AND district_name = 'HUYE'";
	$sqlHUYE = mysqli_query($conn, $displayHUYE);

while($rowdisplayHUYE = mysqli_fetch_array($sqlHUYE))
		{
		$distrnameHUYE =  'HUYE';	
		$numcoutsHUYE = $rowdisplayHUYE['counts'].'</BR>';	
		$insHUYE = "insert into map(district_name,insident_name,total_incidents)VALUES ('$distrnameHUYE','$_POST[incident]','$numcoutsHUYE')";
		mysqli_query($conn, $insHUYE);
		}
//COUNT FOR NYARUGURU
$displayNYARUGURU ="select district_name, incident_name, count(incident_name) AS counts FROM reports WHERE incident_name='$incident' AND district_name = 'NYARUGURU'";
	$sqlNYARUGURU = mysqli_query($conn, $displayNYARUGURU);

while($rowdisplayNYARUGURU = mysqli_fetch_array($sqlNYARUGURU))
		{
		$distrnameNYARUGURU =  'NYARUGURU';	
		$numcoutsNYARUGURU = $rowdisplayNYARUGURU['counts'].'</BR>';	
		$insNYARUGURU = "insert into map(district_name,insident_name,total_incidents)VALUES ('$distrnameNYARUGURU','$_POST[incident]','$numcoutsNYARUGURU')";
		mysqli_query($conn, $insNYARUGURU);
		}
//COUNT FOR Uganda
$displayUganda ="select district_name, actor_name, neighbor_country,  count(incident_name) AS counts FROM reports WHERE incident_name='$incident' AND neighbor_country = 'Uganda'";
	$sqlUganda = mysqli_query($conn, $displayUganda);

while($rowdisplayUganda = mysqli_fetch_array($sqlUganda))
		{
		$distrnameUganda =  'Uganda';	
		$numcoutsUganda = $rowdisplayUganda['counts'].'</BR>';	
		$insUganda = "insert into map(district_name,insident_name,total_incidents)VALUES ('$distrnameUganda','$_POST[incident]','$numcoutsUganda')";
		mysqli_query($conn, $insUganda);
		}
//COUNT FOR DRC
$displayDRC ="select district_name, actor_name, neighbor_country,  count(incident_name) AS counts FROM reports WHERE incident_name='$incident' AND neighbor_country = 'DRC'";
	$sqlDRC = mysqli_query($conn, $displayDRC);

while($rowdisplayDRC = mysqli_fetch_array($sqlDRC))
		{
		$distrnameDRC =  'DRC';	
		$numcoutsDRC = $rowdisplayDRC['counts'].'</BR>';	
		$insDRC = "insert into map(district_name,insident_name,total_incidents)VALUES ('$distrnameDRC','$_POST[incident]','$numcoutsDRC')";
		mysqli_query($conn, $insDRC);
		}
//COUNT FOR TANZANIA
$displayTANZANIA ="select district_name, actor_name, neighbor_country,  count(incident_name) AS counts FROM reports WHERE incident_name='$incident' AND neighbor_country = 'TANZANIA'";
	$sqlTANZANIA = mysqli_query($conn, $displayTANZANIA);

while($rowdisplayTANZANIA = mysqli_fetch_array($sqlTANZANIA))
		{
		$distrnameTANZANIA =  'TANZANIA';	
		$numcoutsTANZANIA = $rowdisplayTANZANIA['counts'].'</BR>';	
		$insTANZANIA = "insert into map(district_name,insident_name,total_incidents)VALUES ('$distrnameTANZANIA','$_POST[incident]','$numcoutsTANZANIA')";
		mysqli_query($conn, $insTANZANIA);
		}
//COUNT FOR BURUNDI
$displayBURUNDI ="select district_name, actor_name, neighbor_country,  count(incident_name) AS counts FROM reports WHERE incident_name='$incident' AND neighbor_country = 'BURUNDI'";
	$sqlBURUNDI = mysqli_query($conn, $displayBURUNDI);

while($rowdisplayBURUNDI = mysqli_fetch_array($sqlBURUNDI))
		{
		$distrnameBURUNDI =  'BURUNDI';	
		$numcoutsBURUNDI = $rowdisplayBURUNDI['counts'].'</BR>';	
		$insBURUNDI = "insert into map(district_name,insident_name,total_incidents)VALUES ('$distrnameBURUNDI','$_POST[incident]','$numcoutsBURUNDI')";
		mysqli_query($conn, $insBURUNDI);
		}		
?>

<script>
window.location = 'northern_mapdisplay';
</script>
<?php	
}
else 
	if($incident=="" AND $startdate=="" AND $enddate=="" AND $actors_group_name!="")
	{
	//COUNT FOR NYAGATARE
$displayNYAGATARE ="select district_name, actor_name, count(actor_name) AS counts FROM reports WHERE actor_name='$actors_group_name' AND district_name = 'NYAGATARE'";
	$sqlNYAGATARE = mysqli_query($conn, $displayNYAGATARE);

while($rowdisplayNYAGATARE = mysqli_fetch_array($sqlNYAGATARE))
		{
		$distrnameNYAGATARE =  'NYAGATARE';	
		$numcoutsNYAGATARE = $rowdisplayNYAGATARE['counts'].'</BR>';	
		$insNYAGATARE = "insert into map(district_name,insident_name,total_incidents)VALUES ('$distrnameNYAGATARE','$_POST[actors_group_name]','$numcoutsNYAGATARE')";
		mysqli_query($conn, $insNYAGATARE);
		}

		
		
//COUNT FOR BURERA
$displayBURERA ="select district_name, actor_name, count(actor_name) AS counts FROM reports WHERE actor_name='$actors_group_name' AND district_name = 'BURERA'";
	$sqlBURERA = mysqli_query($conn, $displayBURERA);

while($rowdisplayBURERA = mysqli_fetch_array($sqlBURERA))
		{
		$distrnameBURERA =  'BURERA';	
		$numcoutsBURERA = $rowdisplayBURERA['counts'].'</BR>';	
		$insBURERA = "insert into map(district_name,insident_name,total_incidents)VALUES ('$distrnameBURERA','$_POST[actors_group_name]','$numcoutsBURERA')";
		mysqli_query($conn, $insBURERA);
		}
//COUNT FOR MUSANZE
$displayMUSANZE ="select district_name, actor_name, count(actor_name) AS counts FROM reports WHERE actor_name='$actors_group_name' AND district_name = 'MUSANZE'";
	$sqlMUSANZE = mysqli_query($conn, $displayMUSANZE);

while($rowdisplayMUSANZE = mysqli_fetch_array($sqlMUSANZE))
		{
		$distrnameMUSANZE =  'MUSANZE';	
		$numcoutsMUSANZE = $rowdisplayMUSANZE['counts'].'</BR>';	
		$insMUSANZE = "insert into map(district_name,insident_name,total_incidents)VALUES ('$distrnameMUSANZE','$_POST[actors_group_name]','$numcoutsMUSANZE')";
		mysqli_query($conn, $insMUSANZE);
		}
		
//COUNT FOR GICUMBI
$displayGICUMBI ="select district_name, actor_name, count(actor_name) AS counts FROM reports WHERE actor_name='$actors_group_name' AND district_name = 'GICUMBI'";
	$sqlGICUMBI = mysqli_query($conn, $displayGICUMBI);

while($rowdisplayGICUMBI = mysqli_fetch_array($sqlGICUMBI))
		{
		$distrnameGICUMBI =  'GICUMBI';	
		$numcoutsGICUMBI = $rowdisplayGICUMBI['counts'].'</BR>';	
		$insGICUMBI = "insert into map(district_name,insident_name,total_incidents)VALUES ('$distrnameGICUMBI','$_POST[actors_group_name]','$numcoutsGICUMBI')";
		mysqli_query($conn, $insGICUMBI);
		}
		
//COUNT FOR GATSIBO
$displayGATSIBO ="select district_name, actor_name, count(actor_name) AS counts FROM reports WHERE actor_name='$actors_group_name' AND district_name = 'GATSIBO'";
	$sqlGATSIBO = mysqli_query($conn, $displayGATSIBO);

while($rowdisplayGATSIBO = mysqli_fetch_array($sqlGATSIBO))
		{
		$distrnameGATSIBO =  'GATSIBO';	
		$numcoutsGATSIBO = $rowdisplayGATSIBO['counts'].'</BR>';	
		$insGATSIBO = "insert into map(district_name,insident_name,total_incidents)VALUES ('$distrnameGATSIBO','$_POST[actors_group_name]','$numcoutsGATSIBO')";
		mysqli_query($conn, $insGATSIBO);
		}
		
//COUNT FOR RULINDO
$displayRULINDO ="select district_name, actor_name, count(actor_name) AS counts FROM reports WHERE actor_name='$actors_group_name' AND district_name = 'RULINDO'";
	$sqlRULINDO = mysqli_query($conn, $displayRULINDO);

while($rowdisplayRULINDO = mysqli_fetch_array($sqlRULINDO))
		{
		$distrnameRULINDO =  'RULINDO';	
		$numcoutsRULINDO = $rowdisplayRULINDO['counts'].'</BR>';	
		$insRULINDO = "insert into map(district_name,insident_name,total_incidents)VALUES ('$distrnameRULINDO','$_POST[actors_group_name]','$numcoutsRULINDO')";
		mysqli_query($conn, $insRULINDO);
		}
		
//COUNT FOR GAKENKE
$displayGAKENKE ="select district_name, actor_name, count(actor_name) AS counts FROM reports WHERE actor_name='$actors_group_name' AND district_name = 'GAKENKE'";
	$sqlGAKENKE = mysqli_query($conn, $displayGAKENKE);

while($rowdisplayGAKENKE = mysqli_fetch_array($sqlGAKENKE))
		{
		$distrnameGAKENKE =  'GAKENKE';	
		$numcoutsGAKENKE = $rowdisplayGAKENKE['counts'].'</BR>';	
		$insGAKENKE = "insert into map(district_name,insident_name,total_incidents)VALUES ('$distrnameGAKENKE','$_POST[actors_group_name]','$numcoutsGAKENKE')";
		mysqli_query($conn, $insGAKENKE);
		}
		
//COUNT FOR NYABIHU
$displayNYABIHU ="select district_name, actor_name, count(actor_name) AS counts FROM reports WHERE actor_name='$actors_group_name' AND district_name = 'NYABIHU'";
	$sqlNYABIHU = mysqli_query($conn, $displayNYABIHU);

while($rowdisplayNYABIHU = mysqli_fetch_array($sqlNYABIHU))
		{
		$distrnameNYABIHU =  'NYABIHU';	
		$numcoutsNYABIHU = $rowdisplayNYABIHU['counts'].'</BR>';	
		$insNYABIHU = "insert into map(district_name,insident_name,total_incidents)VALUES ('$distrnameNYABIHU','$_POST[actors_group_name]','$numcoutsNYABIHU')";
		mysqli_query($conn, $insNYABIHU);
		}
//COUNT FOR RUBAVU
$displayRUBAVU ="select district_name, actor_name, count(actor_name) AS counts FROM reports WHERE actor_name='$actors_group_name' AND district_name = 'RUBAVU'";
	$sqlRUBAVU = mysqli_query($conn, $displayRUBAVU);

while($rowdisplayRUBAVU = mysqli_fetch_array($sqlRUBAVU))
		{
		$distrnameRUBAVU =  'RUBAVU';	
		$numcoutsRUBAVU = $rowdisplayRUBAVU['counts'].'</BR>';	
		$insRUBAVU = "insert into map(district_name,insident_name,total_incidents)VALUES ('$distrnameRUBAVU','$_POST[actors_group_name]','$numcoutsRUBAVU')";
		mysqli_query($conn, $insRUBAVU);
		}

//COUNT FOR KAYONZA
$displayKAYONZA ="select district_name, actor_name, count(actor_name) AS counts FROM reports WHERE actor_name='$actors_group_name' AND district_name = 'KAYONZA'";
	$sqlKAYONZA = mysqli_query($conn, $displayKAYONZA);

while($rowdisplayKAYONZA = mysqli_fetch_array($sqlKAYONZA))
		{
		$distrnameKAYONZA =  'KAYONZA';	
		$numcoutsKAYONZA = $rowdisplayKAYONZA['counts'].'</BR>';	
		$insKAYONZA = "insert into map(district_name,insident_name,total_incidents)VALUES ('$distrnameKAYONZA','$_POST[actors_group_name]','$numcoutsKAYONZA')";
		mysqli_query($conn, $insKAYONZA);
		}
//COUNT FOR RWAMAGANA
$displayRWAMAGANA ="select district_name, actor_name, count(actor_name) AS counts FROM reports WHERE actor_name='$actors_group_name' AND district_name = 'RWAMAGANA'";
	$sqlRWAMAGANA = mysqli_query($conn, $displayRWAMAGANA);

while($rowdisplayRWAMAGANA = mysqli_fetch_array($sqlRWAMAGANA))
		{
		$distrnameRWAMAGANA =  'RWAMAGANA';	
		$numcoutsRWAMAGANA = $rowdisplayRWAMAGANA['counts'].'</BR>';	
		$insRWAMAGANA = "insert into map(district_name,insident_name,total_incidents)VALUES ('$distrnameRWAMAGANA','$_POST[actors_group_name]','$numcoutsRWAMAGANA')";
		mysqli_query($conn, $insRWAMAGANA);
		}
//COUNT FOR GASABO
$displayGASABO ="select district_name, actor_name, count(actor_name) AS counts FROM reports WHERE actor_name='$actors_group_name' AND district_name = 'GASABO'";
	$sqlGASABO = mysqli_query($conn, $displayGASABO);

while($rowdisplayGASABO = mysqli_fetch_array($sqlGASABO))
		{
		$distrnameGASABO =  'GASABO';	
		$numcoutsGASABO = $rowdisplayGASABO['counts'].'</BR>';	
		$insGASABO = "insert into map(district_name,insident_name,total_incidents)VALUES ('$distrnameGASABO','$_POST[actors_group_name]','$numcoutsGASABO')";
		mysqli_query($conn, $insGASABO);
		}
//COUNT FOR NGORORERO
$displayNGORORERO ="select district_name, actor_name, count(actor_name) AS counts FROM reports WHERE actor_name='$actors_group_name' AND district_name = 'NGORORERO'";
	$sqlNGORORERO = mysqli_query($conn, $displayNGORORERO);

while($rowdisplayNGORORERO = mysqli_fetch_array($sqlNGORORERO))
		{
		$distrnameNGORORERO =  'NGORORERO';	
		$numcoutsNGORORERO = $rowdisplayNGORORERO['counts'].'</BR>';	
		$insNGORORERO = "insert into map(district_name,insident_name,total_incidents)VALUES ('$distrnameNGORORERO','$_POST[actors_group_name]','$numcoutsNGORORERO')";
		mysqli_query($conn, $insNGORORERO);
		}
//COUNT FOR RUTSIRO
$displayRUTSIRO ="select district_name, actor_name, count(actor_name) AS counts FROM reports WHERE actor_name='$actors_group_name' AND district_name = 'RUTSIRO'";
	$sqlRUTSIRO = mysqli_query($conn, $displayRUTSIRO);

while($rowdisplayRUTSIRO = mysqli_fetch_array($sqlRUTSIRO))
		{
		$distrnameRUTSIRO =  'RUTSIRO';	
		$numcoutsRUTSIRO = $rowdisplayRUTSIRO['counts'].'</BR>';	
		$insRUTSIRO = "insert into map(district_name,insident_name,total_incidents)VALUES ('$distrnameRUTSIRO','$_POST[actors_group_name]','$numcoutsRUTSIRO')";
		mysqli_query($conn, $insRUTSIRO);
		}
//COUNT FOR KICUKIRO
$displayKICUKIRO ="select district_name, actor_name, count(actor_name) AS counts FROM reports WHERE actor_name='$actors_group_name' AND district_name = 'KICUKIRO'";
	$sqlKICUKIRO = mysqli_query($conn, $displayKICUKIRO);

while($rowdisplayKICUKIRO = mysqli_fetch_array($sqlKICUKIRO))
		{
		$distrnameKICUKIRO =  'KICUKIRO';	
		$numcoutsKICUKIRO = $rowdisplayKICUKIRO['counts'].'</BR>';	
		$insKICUKIRO = "insert into map(district_name,insident_name,total_incidents)VALUES ('$distrnameKICUKIRO','$_POST[actors_group_name]','$numcoutsKICUKIRO')";
		mysqli_query($conn, $insKICUKIRO);
		}
//COUNT FOR NYARUGENGE
$displayNYARUGENGE ="select district_name, actor_name, count(actor_name) AS counts FROM reports WHERE actor_name='$actors_group_name' AND district_name = 'NYARUGENGE'";
	$sqlNYARUGENGE = mysqli_query($conn, $displayNYARUGENGE);

while($rowdisplayNYARUGENGE = mysqli_fetch_array($sqlNYARUGENGE))
		{
		$distrnameNYARUGENGE =  'NYARUGENGE';	
		$numcoutsNYARUGENGE = $rowdisplayNYARUGENGE['counts'].'</BR>';	
		$insNYARUGENGE = "insert into map(district_name,insident_name,total_incidents)VALUES ('$distrnameNYARUGENGE','$_POST[actors_group_name]','$numcoutsNYARUGENGE')";
		mysqli_query($conn, $insNYARUGENGE);
		}
//COUNT FOR KAMONYI
$displayKAMONYI ="select district_name, actor_name, count(actor_name) AS counts FROM reports WHERE actor_name='$actors_group_name' AND district_name = 'KAMONYI'";
	$sqlKAMONYI = mysqli_query($conn, $displayKAMONYI);

while($rowdisplayKAMONYI = mysqli_fetch_array($sqlKAMONYI))
		{
		$distrnameKAMONYI =  'KAMONYI';	
		$numcoutsKAMONYI = $rowdisplayKAMONYI['counts'].'</BR>';	
		$insKAMONYI = "insert into map(district_name,insident_name,total_incidents)VALUES ('$distrnameKAMONYI','$_POST[actors_group_name]','$numcoutsKAMONYI')";
		mysqli_query($conn, $insKAMONYI);
		}
//COUNT FOR MUHANGA
$displayMUHANGA ="select district_name, actor_name, count(actor_name) AS counts FROM reports WHERE actor_name='$actors_group_name' AND district_name = 'MUHANGA'";
	$sqlMUHANGA = mysqli_query($conn, $displayMUHANGA);

while($rowdisplayMUHANGA = mysqli_fetch_array($sqlMUHANGA))
		{
		$distrnameMUHANGA =  'MUHANGA';	
		$numcoutsMUHANGA = $rowdisplayMUHANGA['counts'].'</BR>';	
		$insMUHANGA = "insert into map(district_name,insident_name,total_incidents)VALUES ('$distrnameMUHANGA','$_POST[actors_group_name]','$numcoutsMUHANGA')";
		mysqli_query($conn, $insMUHANGA);
		}
//COUNT FOR KARONGI
$displayKARONGI ="select district_name, actor_name, count(actor_name) AS counts FROM reports WHERE actor_name='$actors_group_name' AND district_name = 'KARONGI'";
	$sqlKARONGI = mysqli_query($conn, $displayKARONGI);

while($rowdisplayKARONGI = mysqli_fetch_array($sqlKARONGI))
		{
		$distrnameKARONGI =  'KARONGI';	
		$numcoutsKARONGI = $rowdisplayKARONGI['counts'].'</BR>';	
		$insKARONGI = "insert into map(district_name,insident_name,total_incidents)VALUES ('$distrnameKARONGI','$_POST[actors_group_name]','$numcoutsKARONGI')";
		mysqli_query($conn, $insKARONGI);
		}
//COUNT FOR KIREHE
$displayKIREHE ="select district_name, actor_name, count(actor_name) AS counts FROM reports WHERE actor_name='$actors_group_name' AND district_name = 'KIREHE'";
	$sqlKIREHE = mysqli_query($conn, $displayKIREHE);

while($rowdisplayKIREHE = mysqli_fetch_array($sqlKIREHE))
		{
		$distrnameKIREHE =  'KIREHE';	
		$numcoutsKIREHE = $rowdisplayKIREHE['counts'].'</BR>';	
		$insKIREHE = "insert into map(district_name,insident_name,total_incidents)VALUES ('$distrnameKIREHE','$_POST[actors_group_name]','$numcoutsKIREHE')";
		mysqli_query($conn, $insKIREHE);
		}
//COUNT FOR NGOMA
$displayNGOMA ="select district_name, actor_name, count(actor_name) AS counts FROM reports WHERE actor_name='$actors_group_name' AND district_name = 'NGOMA'";
	$sqlNGOMA = mysqli_query($conn, $displayNGOMA);

while($rowdisplayNGOMA = mysqli_fetch_array($sqlNGOMA))
		{
		$distrnameNGOMA =  'NGOMA';	
		$numcoutsNGOMA = $rowdisplayNGOMA['counts'].'</BR>';	
		$insNGOMA = "insert into map(district_name,insident_name,total_incidents)VALUES ('$distrnameNGOMA','$_POST[actors_group_name]','$numcoutsNGOMA')";
		mysqli_query($conn, $insNGOMA);
		}
//COUNT FOR BUGESERA
$displayBUGESERA ="select district_name, actor_name, count(actor_name) AS counts FROM reports WHERE actor_name='$actors_group_name' AND district_name = 'BUGESERA'";
	$sqlBUGESERA = mysqli_query($conn, $displayBUGESERA);

while($rowdisplayBUGESERA = mysqli_fetch_array($sqlBUGESERA))
		{
		$distrnameBUGESERA =  'BUGESERA';	
		$numcoutsBUGESERA = $rowdisplayBUGESERA['counts'].'</BR>';	
		$insBUGESERA = "insert into map(district_name,insident_name,total_incidents)VALUES ('$distrnameBUGESERA','$_POST[actors_group_name]','$numcoutsBUGESERA')";
		mysqli_query($conn, $insBUGESERA);
		}
//COUNT FOR RUHANGO
$displayRUHANGO ="select district_name, actor_name, count(actor_name) AS counts FROM reports WHERE actor_name='$actors_group_name' AND district_name = 'RUHANGO'";
	$sqlRUHANGO = mysqli_query($conn, $displayRUHANGO);

while($rowdisplayRUHANGO = mysqli_fetch_array($sqlRUHANGO))
		{
		$distrnameRUHANGO =  'RUHANGO';	
		$numcoutsRUHANGO = $rowdisplayRUHANGO['counts'].'</BR>';	
		$insRUHANGO = "insert into map(district_name,insident_name,total_incidents)VALUES ('$distrnameRUHANGO','$_POST[actors_group_name]','$numcoutsRUHANGO')";
		mysqli_query($conn, $insRUHANGO);
		}
//COUNT FOR NYANZA
$displayNYANZA ="select district_name, actor_name, count(actor_name) AS counts FROM reports WHERE actor_name='$actors_group_name' AND district_name = 'NYANZA'";
	$sqlNYANZA = mysqli_query($conn, $displayNYANZA);

while($rowdisplayNYANZA = mysqli_fetch_array($sqlNYANZA))
		{
		$distrnameNYANZA =  'NYANZA';	
		$numcoutsNYANZA = $rowdisplayNYANZA['counts'].'</BR>';	
		$insNYANZA = "insert into map(district_name,insident_name,total_incidents)VALUES ('$distrnameNYANZA','$_POST[actors_group_name]','$numcoutsNYANZA')";
		mysqli_query($conn, $insNYANZA);
		}
//COUNT FOR GISAGARA
$displayGISAGARA ="select district_name, actor_name, count(actor_name) AS counts FROM reports WHERE actor_name='$actors_group_name' AND district_name = 'GISAGARA'";
	$sqlGISAGARA = mysqli_query($conn, $displayGISAGARA);

while($rowdisplayGISAGARA = mysqli_fetch_array($sqlGISAGARA))
		{
		$distrnameGISAGARA =  'GISAGARA';	
		$numcoutsGISAGARA = $rowdisplayGISAGARA['counts'].'</BR>';	
		$insGISAGARA = "insert into map(district_name,insident_name,total_incidents)VALUES ('$distrnameGISAGARA','$_POST[actors_group_name]','$numcoutsGISAGARA')";
		mysqli_query($conn, $insGISAGARA);
		}
//COUNT FOR NYAMASHEKE
$displayNYAMASHEKE ="select district_name, actor_name, count(actor_name) AS counts FROM reports WHERE actor_name='$actors_group_name' AND district_name = 'NYAMASHEKE'";
	$sqlNYAMASHEKE = mysqli_query($conn, $displayNYAMASHEKE);

while($rowdisplayNYAMASHEKE = mysqli_fetch_array($sqlNYAMASHEKE))
		{
		$distrnameNYAMASHEKE =  'NYAMASHEKE';	
		$numcoutsNYAMASHEKE = $rowdisplayNYAMASHEKE['counts'].'</BR>';	
		$insNYAMASHEKE = "insert into map(district_name,insident_name,total_incidents)VALUES ('$distrnameNYAMASHEKE','$_POST[actors_group_name]','$numcoutsNYAMASHEKE')";
		mysqli_query($conn, $insNYAMASHEKE);
		}
//COUNT FOR NYAMAGABE
$displayNYAMAGABE ="select district_name, actor_name, count(actor_name) AS counts FROM reports WHERE actor_name='$actors_group_name' AND district_name = 'NYAMAGABE'";
	$sqlNYAMAGABE = mysqli_query($conn, $displayNYAMAGABE);

while($rowdisplayNYAMAGABE = mysqli_fetch_array($sqlNYAMAGABE))
		{
		$distrnameNYAMAGABE =  'NYAMAGABE';	
		$numcoutsNYAMAGABE = $rowdisplayNYAMAGABE['counts'].'</BR>';	
		$insNYAMAGABE = "insert into map(district_name,insident_name,total_incidents)VALUES ('$distrnameNYAMAGABE','$_POST[actors_group_name]','$numcoutsNYAMAGABE')";
		mysqli_query($conn, $insNYAMAGABE);
		}
		
//COUNT FOR RUSIZI
$displayRUSIZI ="select district_name, actor_name, count(actor_name) AS counts FROM reports WHERE actor_name='$actors_group_name' AND district_name = 'RUSIZI'";
	$sqlRUSIZI = mysqli_query($conn, $displayRUSIZI);

while($rowdisplayRUSIZI = mysqli_fetch_array($sqlRUSIZI))
		{
		$distrnameRUSIZI =  'RUSIZI';	
		$numcoutsRUSIZI = $rowdisplayRUSIZI['counts'].'</BR>';	
		$insRUSIZI = "insert into map(district_name,insident_name,total_incidents)VALUES ('$distrnameRUSIZI','$_POST[actors_group_name]','$numcoutsRUSIZI')";
		mysqli_query($conn, $insRUSIZI);
		}
//COUNT FOR HUYE
$displayHUYE ="select district_name, actor_name, count(actor_name) AS counts FROM reports WHERE actor_name='$actors_group_name' AND district_name = 'HUYE'";
	$sqlHUYE = mysqli_query($conn, $displayHUYE);

while($rowdisplayHUYE = mysqli_fetch_array($sqlHUYE))
		{
		$distrnameHUYE =  'HUYE';	
		$numcoutsHUYE = $rowdisplayHUYE['counts'].'</BR>';	
		$insHUYE = "insert into map(district_name,insident_name,total_incidents)VALUES ('$distrnameHUYE','$_POST[actors_group_name]','$numcoutsHUYE')";
		mysqli_query($conn, $insHUYE);
		}
//COUNT FOR NYARUGURU
$displayNYARUGURU ="select district_name, actor_name, count(actor_name) AS counts FROM reports WHERE actor_name='$actors_group_name' AND district_name = 'NYARUGURU'";
	$sqlNYARUGURU = mysqli_query($conn, $displayNYARUGURU);

while($rowdisplayNYARUGURU = mysqli_fetch_array($sqlNYARUGURU))
		{
		$distrnameNYARUGURU =  'NYARUGURU';	
		$numcoutsNYARUGURU = $rowdisplayNYARUGURU['counts'].'</BR>';	
		$insNYARUGURU = "insert into map(district_name,insident_name,total_incidents)VALUES ('$distrnameNYARUGURU','$_POST[actors_group_name]','$numcoutsNYARUGURU')";
		mysqli_query($conn, $insNYARUGURU);
		}
//COUNT FOR Uganda
$displayUganda ="select district_name, actor_name, neighbor_country,  count(actor_name) AS counts FROM reports WHERE actor_name='$actors_group_name' AND neighbor_country = 'Uganda'";
	$sqlUganda = mysqli_query($conn, $displayUganda);

while($rowdisplayUganda = mysqli_fetch_array($sqlUganda))
		{
		$distrnameUganda =  'Uganda';	
		$numcoutsUganda = $rowdisplayUganda['counts'].'</BR>';	
		$insUganda = "insert into map(district_name,insident_name,total_incidents)VALUES ('$distrnameUganda','$_POST[actors_group_name]','$numcoutsUganda')";
		mysqli_query($conn, $insUganda);
		}
//COUNT FOR DRC
$displayDRC ="select district_name, actor_name, neighbor_country,  count(actor_name) AS counts FROM reports WHERE actor_name='$actors_group_name' AND neighbor_country = 'DRC'";
	$sqlDRC = mysqli_query($conn, $displayDRC);

while($rowdisplayDRC = mysqli_fetch_array($sqlDRC))
		{
		$distrnameDRC =  'DRC';	
		$numcoutsDRC = $rowdisplayDRC['counts'].'</BR>';	
		$insDRC = "insert into map(district_name,insident_name,total_incidents)VALUES ('$distrnameDRC','$_POST[actors_group_name]','$numcoutsDRC')";
		mysqli_query($conn, $insDRC);
		}
//COUNT FOR TANZANIA
$displayTANZANIA ="select district_name, actor_name, neighbor_country,  count(actor_name) AS counts FROM reports WHERE actor_name='$actors_group_name' AND neighbor_country = 'TANZANIA'";
	$sqlTANZANIA = mysqli_query($conn, $displayTANZANIA);

while($rowdisplayTANZANIA = mysqli_fetch_array($sqlTANZANIA))
		{
		$distrnameTANZANIA =  'TANZANIA';	
		$numcoutsTANZANIA = $rowdisplayTANZANIA['counts'].'</BR>';	
		$insTANZANIA = "insert into map(district_name,insident_name,total_incidents)VALUES ('$distrnameTANZANIA','$_POST[actors_group_name]','$numcoutsTANZANIA')";
		mysqli_query($conn, $insTANZANIA);
		}
//COUNT FOR BURUNDI
$displayBURUNDI ="select district_name, actor_name, neighbor_country,  count(actor_name) AS counts FROM reports WHERE actor_name='$actors_group_name' AND neighbor_country = 'BURUNDI'";
	$sqlBURUNDI = mysqli_query($conn, $displayBURUNDI);

while($rowdisplayBURUNDI = mysqli_fetch_array($sqlBURUNDI))
		{
		$distrnameBURUNDI =  'BURUNDI';	
		$numcoutsBURUNDI = $rowdisplayBURUNDI['counts'].'</BR>';	
		$insBURUNDI = "insert into map(district_name,insident_name,total_incidents)VALUES ('$distrnameBURUNDI','$_POST[actors_group_name]','$numcoutsBURUNDI')";
		mysqli_query($conn, $insBURUNDI);
		}		
		
?>

<script>
window.location = 'northern_map_display';
</script>
<?php
	}


$connect->close();
?>