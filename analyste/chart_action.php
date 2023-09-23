<?php
session_start();
error_reporting(0);
$conn = mysqli_connect("localhost", "root", "fidele", "mudb_ims_db");
$incident1  = $_POST['incident1'];
$incident2  = $_POST['incident2'];
 $_SESSION['incident1'] = $incident1;
 $_SESSION['incident2'] = $incident2;
$sqltruncate = "TRUNCATE TABLE chart";
	$sqlr = mysqli_query($conn, $sqltruncate);


	//COUNT FOR NYAGATARE
$displayNYAGATARE ="select district_name, incident_name, count(incident_name) AS counts FROM reports WHERE incident_name='$incident1' AND district_name = 'NYAGATARE'";

	$sqlNYAGATARE = mysqli_query($conn, $displayNYAGATARE);

while($rowdisplayNYAGATARE = mysqli_fetch_array($sqlNYAGATARE))
		{
			
		$distrnameNYAGATARE =  'NYAGATARE';	
		$numcoutsNYAGATARE = $rowdisplayNYAGATARE['counts'];	
		mysqli_query($conn, $insNYAGATARE);
		}
$displayNYAGATARE1 ="select district_name, incident_name, count(incident_name) AS counts FROM reports WHERE incident_name='$incident2' AND district_name = 'NYAGATARE'";
	$sqlNYAGATARE1 = mysqli_query($conn, $displayNYAGATARE1);
while($rowdisplayNYAGATARE1 = mysqli_fetch_array($sqlNYAGATARE1))
		{
			
		$distrnameNYAGATARE1 =  'NYAGATARE';	
		$numcoutsNYAGATARE1 = $rowdisplayNYAGATARE1['counts'];	
		mysqli_query($conn, $insNYAGATARE1);
		}


$insNYAGATAREs = "insert into chart(district_name,keywords,keywords2,fist_value,second_value)VALUES ('$distrnameNYAGATARE','$incident1','$incident2','$numcoutsNYAGATARE','$numcoutsNYAGATARE1')";
		mysqli_query($conn, $insNYAGATAREs);
		
	
//COUNT FOR BURERA
$displayBURERA ="select district_name, incident_name, count(incident_name) AS counts FROM reports WHERE incident_name='$incident1' AND district_name = 'BURERA'";

	$sqlBURERA = mysqli_query($conn, $displayBURERA);

while($rowdisplayBURERA = mysqli_fetch_array($sqlBURERA))
		{
			
		$distrnameBURERA =  'BURERA';	
		$numcoutsBURERA = $rowdisplayBURERA['counts'];	
		mysqli_query($conn, $insBURERA);
		}
$displayBURERA1 ="select district_name, incident_name, count(incident_name) AS counts FROM reports WHERE incident_name='$incident2' AND district_name = 'BURERA'";
	$sqlBURERA1 = mysqli_query($conn, $displayBURERA1);
while($rowdisplayBURERA1 = mysqli_fetch_array($sqlBURERA1))
		{
			
		$distrnameBURERA1 =  'BURERA';	
		$numcoutsBURERA1 = $rowdisplayBURERA1['counts'];	
		mysqli_query($conn, $insBURERA1);
		}


$insBURERAs = "insert into chart(district_name,keywords,keywords2,fist_value,second_value)VALUES ('$distrnameBURERA','$incident1','$incident2','$numcoutsBURERA','$numcoutsBURERA1')";
		mysqli_query($conn, $insBURERAs);
//COUNT FOR MUSANZE
$displayMUSANZE ="select district_name, incident_name, count(incident_name) AS counts FROM reports WHERE incident_name='$incident1' AND district_name = 'MUSANZE'";

	$sqlMUSANZE = mysqli_query($conn, $displayMUSANZE);

while($rowdisplayMUSANZE = mysqli_fetch_array($sqlMUSANZE))
		{
			
		$distrnameMUSANZE =  'MUSANZE';	
		$numcoutsMUSANZE = $rowdisplayMUSANZE['counts'];	
		mysqli_query($conn, $insMUSANZE);
		}
$displayMUSANZE1 ="select district_name, incident_name, count(incident_name) AS counts FROM reports WHERE incident_name='$incident2' AND district_name = 'MUSANZE'";
	$sqlMUSANZE1 = mysqli_query($conn, $displayMUSANZE1);
while($rowdisplayMUSANZE1 = mysqli_fetch_array($sqlMUSANZE1))
		{
			
		$distrnameMUSANZE1 =  'MUSANZE';	
		$numcoutsMUSANZE1 = $rowdisplayMUSANZE1['counts'];	
		mysqli_query($conn, $insMUSANZE1);
		}
		

$insMUSANZEs = "insert into chart(district_name,keywords,keywords2,fist_value,second_value)VALUES ('$distrnameMUSANZE','$incident1','$incident2','$numcoutsMUSANZE','$numcoutsMUSANZE1')";
		mysqli_query($conn, $insMUSANZEs);
		
//COUNT FOR GICUMBI
$displayGICUMBI="select district_name, incident_name, count(incident_name) AS counts FROM reports WHERE incident_name='$incident1' AND district_name = 'GICUMBI'";

	$sqlGICUMBI = mysqli_query($conn, $displayGICUMBI);

while($rowdisplayGICUMBI = mysqli_fetch_array($sqlGICUMBI))
		{
			
		$distrnameGICUMBI =  'GICUMBI';	
		$numcoutsGICUMBI = $rowdisplayGICUMBI['counts'];	
		mysqli_query($conn, $insGICUMBI);
		}
$displayGICUMBI1 ="select district_name, incident_name, count(incident_name) AS counts FROM reports WHERE incident_name='$incident2' AND district_name = 'GICUMBI'";
	$sqlGICUMBI1 = mysqli_query($conn, $displayGICUMBI1);
while($rowdisplayGICUMBI1 = mysqli_fetch_array($sqlGICUMBI1))
		{
			
		$distrnameGICUMBI1 =  'GICUMBI';	
		$numcoutsGICUMBI1 = $rowdisplayGICUMBI1['counts'];	
		mysqli_query($conn, $insGICUMBI1);
		}
		

$insGICUMBIs = "insert into chart(district_name,keywords,keywords2,fist_value,second_value)VALUES ('$distrnameGICUMBI','$incident1','$incident2','$numcoutsGICUMBI','$numcoutsGICUMBI1')";
		mysqli_query($conn, $insGICUMBIs);
		
//COUNT FOR GATSIBO
$displayGATSIBO="select district_name, incident_name, count(incident_name) AS counts FROM reports WHERE incident_name='$incident1' AND district_name = 'GATSIBO'";

	$sqlGATSIBO = mysqli_query($conn, $displayGATSIBO);

while($rowdisplayGATSIBO = mysqli_fetch_array($sqlGATSIBO))
		{
			
		$distrnameGATSIBO =  'GATSIBO';	
		$numcoutsGATSIBO = $rowdisplayGATSIBO['counts'];	
		mysqli_query($conn, $insGATSIBO);
		}
$displayGATSIBO1 ="select district_name, incident_name, count(incident_name) AS counts FROM reports WHERE incident_name='$incident2' AND district_name = 'GATSIBO'";
	$sqlGATSIBO1 = mysqli_query($conn, $displayGATSIBO1);
while($rowdisplayGATSIBO1 = mysqli_fetch_array($sqlGATSIBO1))
		{
			
		$distrnameGATSIBO1 =  'GATSIBO';	
		$numcoutsGATSIBO1 = $rowdisplayGATSIBO1['counts'];	
		mysqli_query($conn, $insGATSIBO1);
		}


$insGATSIBOs = "insert into chart(district_name,keywords,keywords2,fist_value,second_value)VALUES ('$distrnameGATSIBO','$incident1','$incident2','$numcoutsGATSIBO','$numcoutsGATSIBO1')";
		mysqli_query($conn, $insGATSIBOs);
		
//COUNT FOR RULINDO
$displayRULINDO="select district_name, incident_name, count(incident_name) AS counts FROM reports WHERE incident_name='$incident1' AND district_name = 'RULINDO'";

	$sqlRULINDO = mysqli_query($conn, $displayRULINDO);

while($rowdisplayRULINDO = mysqli_fetch_array($sqlRULINDO))
		{
			
		$distrnameRULINDO =  'RULINDO';	
		$numcoutsRULINDO = $rowdisplayRULINDO['counts'];	
		mysqli_query($conn, $insRULINDO);
		}
$displayRULINDO1 ="select district_name, incident_name, count(incident_name) AS counts FROM reports WHERE incident_name='$incident2' AND district_name = 'RULINDO'";
	$sqlRULINDO1 = mysqli_query($conn, $displayRULINDO1);
while($rowdisplayRULINDO1 = mysqli_fetch_array($sqlRULINDO1))
		{
			
		$distrnameRULINDO1 =  'RULINDO';	
		$numcoutsRULINDO1 = $rowdisplayRULINDO1['counts'];	
		mysqli_query($conn, $insRULINDO1);
		}
		

$insRULINDOs = "insert into chart(district_name,keywords,keywords2,fist_value,second_value)VALUES ('$distrnameRULINDO','$incident1','$incident2','$numcoutsRULINDO','$numcoutsRULINDO1')";
		mysqli_query($conn, $insRULINDOs);
		
//COUNT FOR GAKENKE
$displayGAKENKE="select district_name, incident_name, count(incident_name) AS counts FROM reports WHERE incident_name='$incident1' AND district_name = 'GAKENKE'";

	$sqlGAKENKE = mysqli_query($conn, $displayGAKENKE);

while($rowdisplayGAKENKE = mysqli_fetch_array($sqlGAKENKE))
		{
			
		$distrnameGAKENKE =  'GAKENKE';	
		$numcoutsGAKENKE = $rowdisplayGAKENKE['counts'];	
		mysqli_query($conn, $insGAKENKE);
		}
$displayGAKENKE1 ="select district_name, incident_name, count(incident_name) AS counts FROM reports WHERE incident_name='$incident2' AND district_name = 'GAKENKE'";
	$sqlGAKENKE1 = mysqli_query($conn, $displayGAKENKE1);
while($rowdisplayGAKENKE1 = mysqli_fetch_array($sqlGAKENKE1))
		{
			
		$distrnameGAKENKE1 =  'GAKENKE';	
		$numcoutsGAKENKE1 = $rowdisplayGAKENKE1['counts'];	
		mysqli_query($conn, $insGAKENKE1);
		}
		

$insGAKENKEs = "insert into chart(district_name,keywords,keywords2,fist_value,second_value)VALUES ('$distrnameGAKENKE','$incident1','$incident2','$numcoutsGAKENKE','$numcoutsGAKENKE1')";
		mysqli_query($conn, $insGAKENKEs);
		
//COUNT FOR NYABIHU
$displayNYABIHU="select district_name, incident_name, count(incident_name) AS counts FROM reports WHERE incident_name='$incident1' AND district_name = 'NYABIHU'";

	$sqlNYABIHU = mysqli_query($conn, $displayNYABIHU);

while($rowdisplayNYABIHU = mysqli_fetch_array($sqlNYABIHU))
		{
			
		$distrnameNYABIHU =  'NYABIHU';	
		$numcoutsNYABIHU = $rowdisplayNYABIHU['counts'];	
		mysqli_query($conn, $insNYABIHU);
		}
$displayNYABIHU1 ="select district_name, incident_name, count(incident_name) AS counts FROM reports WHERE incident_name='$incident2' AND district_name = 'NYABIHU'";
	$sqlNYABIHU1 = mysqli_query($conn, $displayNYABIHU1);
while($rowdisplayNYABIHU1 = mysqli_fetch_array($sqlNYABIHU1))
		{
			
		$distrnameNYABIHU1 =  'NYABIHU';	
		$numcoutsNYABIHU1 = $rowdisplayNYABIHU1['counts'];	
		mysqli_query($conn, $insNYABIHU1);
		}
		

$insNYABIHUs = "insert into chart(district_name,keywords,keywords2,fist_value,second_value)VALUES ('$distrnameNYABIHU','$incident1','$incident2','$numcoutsNYABIHU','$numcoutsNYABIHU1')";
		mysqli_query($conn, $insNYABIHUs);
//COUNT FOR RUBAVU
$displayRUBAVU="select district_name, incident_name, count(incident_name) AS counts FROM reports WHERE incident_name='$incident1' AND district_name = 'RUBAVU'";

	$sqlRUBAVU = mysqli_query($conn, $displayRUBAVU);

while($rowdisplayRUBAVU = mysqli_fetch_array($sqlRUBAVU))
		{
			
		$distrnameRUBAVU =  'RUBAVU';	
		$numcoutsRUBAVU = $rowdisplayRUBAVU['counts'];	
		mysqli_query($conn, $insRUBAVU);
		}
$displayRUBAVU1 ="select district_name, incident_name, count(incident_name) AS counts FROM reports WHERE incident_name='$incident2' AND district_name = 'RUBAVU'";
	$sqlRUBAVU1 = mysqli_query($conn, $displayRUBAVU1);
while($rowdisplayRUBAVU1 = mysqli_fetch_array($sqlRUBAVU1))
		{
			
		$distrnameRUBAVU1 =  'RUBAVU';	
		$numcoutsRUBAVU1 = $rowdisplayRUBAVU1['counts'];	
		mysqli_query($conn, $insRUBAVU1);
		}
		

$insRUBAVUs = "insert into chart(district_name,keywords,keywords2,fist_value,second_value)VALUES ('$distrnameRUBAVU','$incident1','$incident2','$numcoutsRUBAVU','$numcoutsRUBAVU1')";
		mysqli_query($conn, $insRUBAVUs);

//COUNT FOR KAYONZA
$displayKAYONZA="select district_name, incident_name, count(incident_name) AS counts FROM reports WHERE incident_name='$incident1' AND district_name = 'KAYONZA'";

	$sqlKAYONZA = mysqli_query($conn, $displayKAYONZA);

while($rowdisplayKAYONZA = mysqli_fetch_array($sqlKAYONZA))
		{
			
		$distrnameKAYONZA =  'KAYONZA';	
		$numcoutsKAYONZA = $rowdisplayKAYONZA['counts'];	
		mysqli_query($conn, $insKAYONZA);
		}
$displayKAYONZA1 ="select district_name, incident_name, count(incident_name) AS counts FROM reports WHERE incident_name='$incident2' AND district_name = 'KAYONZA'";
	$sqlKAYONZA1 = mysqli_query($conn, $displayKAYONZA1);
while($rowdisplayKAYONZA1 = mysqli_fetch_array($sqlKAYONZA1))
		{
			
		$distrnameKAYONZA1 =  'KAYONZA';	
		$numcoutsKAYONZA1 = $rowdisplayKAYONZA1['counts'];	
		mysqli_query($conn, $insKAYONZA1);
		}
		

$insKAYONZAs = "insert into chart(district_name,keywords,keywords2,fist_value,second_value)VALUES ('$distrnameKAYONZA','$incident1','$incident2','$numcoutsKAYONZA','$numcoutsKAYONZA1')";
		mysqli_query($conn, $insKAYONZAs);
//COUNT FOR RWAMAGANA
$displayRWAMAGANA="select district_name, incident_name, count(incident_name) AS counts FROM reports WHERE incident_name='$incident1' AND district_name = 'RWAMAGANA'";

	$sqlRWAMAGANA = mysqli_query($conn, $displayRWAMAGANA);

while($rowdisplayRWAMAGANA = mysqli_fetch_array($sqlRWAMAGANA))
		{
			
		$distrnameRWAMAGANA =  'RWAMAGANA';	
		$numcoutsRWAMAGANA = $rowdisplayRWAMAGANA['counts'];	
		mysqli_query($conn, $insRWAMAGANA);
		}
$displayRWAMAGANA1 ="select district_name, incident_name, count(incident_name) AS counts FROM reports WHERE incident_name='$incident2' AND district_name = 'RWAMAGANA'";
	$sqlRWAMAGANA1 = mysqli_query($conn, $displayRWAMAGANA1);
while($rowdisplayRWAMAGANA1 = mysqli_fetch_array($sqlRWAMAGANA1))
		{
			
		$distrnameRWAMAGANA1 =  'RWAMAGANA';	
		$numcoutsRWAMAGANA1 = $rowdisplayRWAMAGANA1['counts'];	
		mysqli_query($conn, $insRWAMAGANA1);
		}

$insRWAMAGANAs = "insert into chart(district_name,keywords,keywords2,fist_value,second_value)VALUES ('$distrnameRWAMAGANA','$incident1','$incident2','$numcoutsRWAMAGANA','$numcoutsRWAMAGANA1')";
		mysqli_query($conn, $insRWAMAGANAs);
//COUNT FOR GASABO
$displayGASABO="select district_name, incident_name, count(incident_name) AS counts FROM reports WHERE incident_name='$incident1' AND district_name = 'GASABO'";

	$sqlGASABO = mysqli_query($conn, $displayGASABO);

while($rowdisplayGASABO = mysqli_fetch_array($sqlGASABO))
		{
			
		$distrnameGASABO =  'GASABO';	
		$numcoutsGASABO = $rowdisplayGASABO['counts'];	
		mysqli_query($conn, $insGASABO);
		}
$displayGASABO1 ="select district_name, incident_name, count(incident_name) AS counts FROM reports WHERE incident_name='$incident2' AND district_name = 'GASABO'";
	$sqlGASABO1 = mysqli_query($conn, $displayGASABO1);
while($rowdisplayGASABO1 = mysqli_fetch_array($sqlGASABO1))
		{
			
		$distrnameGASABO1 =  'GASABO';	
		$numcoutsGASABO1 = $rowdisplayGASABO1['counts'];	
		mysqli_query($conn, $insGASABO1);
		}
$insGASABOs = "insert into chart(district_name,keywords,keywords2,fist_value,second_value)VALUES ('$distrnameGASABO','$incident1','$incident2','$numcoutsGASABO','$numcoutsGASABO1')";
		mysqli_query($conn, $insGASABOs);
//COUNT FOR NGORORERO
$displayNGORORERO="select district_name, incident_name, count(incident_name) AS counts FROM reports WHERE incident_name='$incident1' AND district_name = 'NGORORERO'";

	$sqlNGORORERO = mysqli_query($conn, $displayNGORORERO);

while($rowdisplayNGORORERO = mysqli_fetch_array($sqlNGORORERO))
		{
			
		$distrnameNGORORERO =  'NGORORERO';	
		$numcoutsNGORORERO = $rowdisplayNGORORERO['counts'];	
		mysqli_query($conn, $insNGORORERO);
		}
$displayNGORORERO1 ="select district_name, incident_name, count(incident_name) AS counts FROM reports WHERE incident_name='$incident2' AND district_name = 'NGORORERO'";
	$sqlNGORORERO1 = mysqli_query($conn, $displayNGORORERO1);
while($rowdisplayNGORORERO1 = mysqli_fetch_array($sqlNGORORERO1))
		{
			
		$distrnameNGORORERO1 =  'NGORORERO';	
		$numcoutsNGORORERO1 = $rowdisplayNGORORERO1['counts'];	
		mysqli_query($conn, $insNGORORERO1);
		}

$insNGOROREROs = "insert into chart(district_name,keywords,keywords2,fist_value,second_value)VALUES ('$distrnameNGORORERO','$incident1','$incident2','$numcoutsNGORORERO','$numcoutsNGORORERO1')";
		mysqli_query($conn, $insNGOROREROs);
//COUNT FOR RUTSIRO
$displayRUTSIRO="select district_name, incident_name, count(incident_name) AS counts FROM reports WHERE incident_name='$incident1' AND district_name = 'RUTSIRO'";

	$sqlRUTSIRO = mysqli_query($conn, $displayRUTSIRO);

while($rowdisplayRUTSIRO = mysqli_fetch_array($sqlRUTSIRO))
		{
			
		$distrnameRUTSIRO =  'RUTSIRO';	
		$numcoutsRUTSIRO = $rowdisplayRUTSIRO['counts'];	
		mysqli_query($conn, $insRUTSIRO);
		}
$displayRUTSIRO1 ="select district_name, incident_name, count(incident_name) AS counts FROM reports WHERE incident_name='$incident2' AND district_name = 'RUTSIRO'";
	$sqlRUTSIRO1 = mysqli_query($conn, $displayRUTSIRO1);
while($rowdisplayRUTSIRO1 = mysqli_fetch_array($sqlRUTSIRO1))
		{
			
		$distrnameRUTSIRO1 =  'RUTSIRO';	
		$numcoutsRUTSIRO1 = $rowdisplayRUTSIRO1['counts'];	
		mysqli_query($conn, $insRUTSIRO1);
		}
$insRUTSIROs = "insert into chart(district_name,keywords,keywords2,fist_value,second_value)VALUES ('$distrnameRUTSIRO','$incident1','$incident2','$numcoutsRUTSIRO','$numcoutsRUTSIRO1')";
		mysqli_query($conn, $insRUTSIROs);
//COUNT FOR KICUKIRO
$displayKICUKIRO="select district_name, incident_name, count(incident_name) AS counts FROM reports WHERE incident_name='$incident1' AND district_name = 'KICUKIRO'";

	$sqlKICUKIRO = mysqli_query($conn, $displayKICUKIRO);

while($rowdisplayKICUKIRO = mysqli_fetch_array($sqlKICUKIRO))
		{
			
		$distrnameKICUKIRO =  'KICUKIRO';	
		$numcoutsKICUKIRO = $rowdisplayKICUKIRO['counts'];	
		mysqli_query($conn, $insKICUKIRO);
		}
$displayKICUKIRO1 ="select district_name, incident_name, count(incident_name) AS counts FROM reports WHERE incident_name='$incident2' AND district_name = 'KICUKIRO'";
	$sqlKICUKIRO1 = mysqli_query($conn, $displayKICUKIRO1);
while($rowdisplayKICUKIRO1 = mysqli_fetch_array($sqlKICUKIRO1))
		{
			
		$distrnameKICUKIRO1 =  'KICUKIRO';	
		$numcoutsKICUKIRO1 = $rowdisplayKICUKIRO1['counts'];	
		mysqli_query($conn, $insKICUKIRO1);
		}


$insKICUKIROs = "insert into chart(district_name,keywords,keywords2,fist_value,second_value)VALUES ('$distrnameKICUKIRO','$incident1','$incident2','$numcoutsKICUKIRO','$numcoutsKICUKIRO1')";
		mysqli_query($conn, $insKICUKIROs);
//COUNT FOR NYARUGENGE
$displayNYARUGENGE="select district_name, incident_name, count(incident_name) AS counts FROM reports WHERE incident_name='$incident1' AND district_name = 'NYARUGENGE'";

	$sqlNYARUGENGE = mysqli_query($conn, $displayNYARUGENGE);

while($rowdisplayNYARUGENGE = mysqli_fetch_array($sqlNYARUGENGE))
		{
			
		$distrnameNYARUGENGE =  'NYARUGENGE';	
		$numcoutsNYARUGENGE = $rowdisplayNYARUGENGE['counts'];	
		mysqli_query($conn, $insNYARUGENGE);
		}
$displayNYARUGENGE1 ="select district_name, incident_name, count(incident_name) AS counts FROM reports WHERE incident_name='$incident2' AND district_name = 'NYARUGENGE'";
	$sqlNYARUGENGE1 = mysqli_query($conn, $displayNYARUGENGE1);
while($rowdisplayNYARUGENGE1 = mysqli_fetch_array($sqlNYARUGENGE1))
		{
			
		$distrnameNYARUGENGE1 =  'NYARUGENGE';	
		$numcoutsNYARUGENGE1 = $rowdisplayNYARUGENGE1['counts'];	
		mysqli_query($conn, $insNYARUGENGE1);
		}


$insNYARUGENGEs = "insert into chart(district_name,keywords,keywords2,fist_value,second_value)VALUES ('$distrnameNYARUGENGE','$incident1','$incident2','$numcoutsNYARUGENGE','$numcoutsNYARUGENGE1')";
		mysqli_query($conn, $insNYARUGENGEs);
//COUNT FOR KAMONYI
$displayKAMONYI="select district_name, incident_name, count(incident_name) AS counts FROM reports WHERE incident_name='$incident1' AND district_name = 'KAMONYI'";

	$sqlKAMONYI = mysqli_query($conn, $displayKAMONYI);

while($rowdisplayKAMONYI = mysqli_fetch_array($sqlKAMONYI))
		{
			
		$distrnameKAMONYI =  'KAMONYI';	
		$numcoutsKAMONYI = $rowdisplayKAMONYI['counts'];	
		mysqli_query($conn, $insKAMONYI);
		}
$displayKAMONYI1 ="select district_name, incident_name, count(incident_name) AS counts FROM reports WHERE incident_name='$incident2' AND district_name = 'KAMONYI'";
	$sqlKAMONYI1 = mysqli_query($conn, $displayKAMONYI1);
while($rowdisplayKAMONYI1 = mysqli_fetch_array($sqlKAMONYI1))
		{
			
		$distrnameKAMONYI1 =  'KAMONYI';	
		$numcoutsKAMONYI1 = $rowdisplayKAMONYI1['counts'];	
		mysqli_query($conn, $insKAMONYI1);
		}
		

$insKAMONYIs = "insert into chart(district_name,keywords,keywords2,fist_value,second_value)VALUES ('$distrnameKAMONYI','$incident1','$incident2','$numcoutsKAMONYI','$numcoutsKAMONYI1')";
		mysqli_query($conn, $insKAMONYIs);
//COUNT FOR MUHANGA
$displayMUHANGA="select district_name, incident_name, count(incident_name) AS counts FROM reports WHERE incident_name='$incident1' AND district_name = 'MUHANGA'";

	$sqlMUHANGA = mysqli_query($conn, $displayMUHANGA);

while($rowdisplayMUHANGA = mysqli_fetch_array($sqlMUHANGA))
		{
			
		$distrnameMUHANGA =  'MUHANGA';	
		$numcoutsMUHANGA = $rowdisplayMUHANGA['counts'];	
		mysqli_query($conn, $insMUHANGA);
		}
$displayMUHANGA1 ="select district_name, incident_name, count(incident_name) AS counts FROM reports WHERE incident_name='$incident2' AND district_name = 'MUHANGA'";
	$sqlMUHANGA1 = mysqli_query($conn, $displayMUHANGA1);
while($rowdisplayMUHANGA1 = mysqli_fetch_array($sqlMUHANGA1))
		{
			
		$distrnameMUHANGA1 =  'MUHANGA';	
		$numcoutsMUHANGA1 = $rowdisplayMUHANGA1['counts'];	
		mysqli_query($conn, $insMUHANGA1);
		}
		

$insMUHANGAs = "insert into chart(district_name,keywords,keywords2,fist_value,second_value)VALUES ('$distrnameMUHANGA','$incident1','$incident2','$numcoutsMUHANGA','$numcoutsMUHANGA1')";
		mysqli_query($conn, $insMUHANGAs);
		
//COUNT FOR KARONGI
$displayKARONGI="select district_name, incident_name, count(incident_name) AS counts FROM reports WHERE incident_name='$incident1' AND district_name = 'KARONGI'";

	$sqlKARONGI = mysqli_query($conn, $displayKARONGI);

while($rowdisplayKARONGI = mysqli_fetch_array($sqlKARONGI))
		{
			
		$distrnameKARONGI =  'KARONGI';	
		$numcoutsKARONGI = $rowdisplayKARONGI['counts'];	
		mysqli_query($conn, $insKARONGI);
		}
$displayKARONGI1 ="select district_name, incident_name, count(incident_name) AS counts FROM reports WHERE incident_name='$incident2' AND district_name = 'KARONGI'";
	$sqlKARONGI1 = mysqli_query($conn, $displayKARONGI1);
while($rowdisplayKARONGI1 = mysqli_fetch_array($sqlKARONGI1))
		{
			
		$distrnameKARONGI1 =  'KARONGI';	
		$numcoutsKARONGI1 = $rowdisplayKARONGI1['counts'];	
		mysqli_query($conn, $insKARONGI1);
		}
		

$insKARONGIs = "insert into chart(district_name,keywords,keywords2,fist_value,second_value)VALUES ('$distrnameKARONGI','$incident1','$incident2','$numcoutsKARONGI','$numcoutsKARONGI1')";
		mysqli_query($conn, $insKARONGIs);
		
//COUNT FOR KIREHE
$displayKIREHE="select district_name, incident_name, count(incident_name) AS counts FROM reports WHERE incident_name='$incident1' AND district_name = 'KIREHE'";

	$sqlKIREHE = mysqli_query($conn, $displayKIREHE);

while($rowdisplayKIREHE = mysqli_fetch_array($sqlKIREHE))
		{
			
		$distrnameKIREHE =  'KIREHE';	
		$numcoutsKIREHE = $rowdisplayKIREHE['counts'];	
		mysqli_query($conn, $insKIREHE);
		}
$displayKIREHE1 ="select district_name, incident_name, count(incident_name) AS counts FROM reports WHERE incident_name='$incident2' AND district_name = 'KIREHE'";
	$sqlKIREHE1 = mysqli_query($conn, $displayKIREHE1);
while($rowdisplayKIREHE1 = mysqli_fetch_array($sqlKIREHE1))
		{
			
		$distrnameKIREHE1 =  'KIREHE';	
		$numcoutsKIREHE1 = $rowdisplayKIREHE1['counts'];	
		mysqli_query($conn, $insKIREHE1);
		}
		

$insKIREHEs = "insert into chart(district_name,keywords,keywords2,fist_value,second_value)VALUES ('$distrnameKIREHE','$incident1','$incident2','$numcoutsKIREHE','$numcoutsKIREHE1')";
		mysqli_query($conn, $insKIREHEs);
//COUNT FOR NGOMA
$displayNGOMA="select district_name, incident_name, count(incident_name) AS counts FROM reports WHERE incident_name='$incident1' AND district_name = 'NGOMA'";

	$sqlNGOMA = mysqli_query($conn, $displayNGOMA);

while($rowdisplayNGOMA = mysqli_fetch_array($sqlNGOMA))
		{
			
		$distrnameNGOMA =  'NGOMA';	
		$numcoutsNGOMA = $rowdisplayNGOMA['counts'];	
		mysqli_query($conn, $insNGOMA);
		}
$displayNGOMA1 ="select district_name, incident_name, count(incident_name) AS counts FROM reports WHERE incident_name='$incident2' AND district_name = 'NGOMA'";
	$sqlNGOMA1 = mysqli_query($conn, $displayNGOMA1);
while($rowdisplayNGOMA1 = mysqli_fetch_array($sqlNGOMA1))
		{
			
		$distrnameNGOMA1 =  'NGOMA';	
		$numcoutsNGOMA1 = $rowdisplayNGOMA1['counts'];	
		mysqli_query($conn, $insNGOMA1);
		}
		

$insNGOMAs = "insert into chart(district_name,keywords,keywords2,fist_value,second_value)VALUES ('$distrnameNGOMA','$incident1','$incident2','$numcoutsNGOMA','$numcoutsNGOMA1')";
		mysqli_query($conn, $insNGOMAs);
//COUNT FOR BUGESERA
$displayBUGESERA="select district_name, incident_name, count(incident_name) AS counts FROM reports WHERE incident_name='$incident1' AND district_name = 'BUGESERA'";

	$sqlBUGESERA = mysqli_query($conn, $displayBUGESERA);

while($rowdisplayBUGESERA = mysqli_fetch_array($sqlBUGESERA))
		{
			
		$distrnameBUGESERA =  'BUGESERA';	
		$numcoutsBUGESERA = $rowdisplayBUGESERA['counts'];	
		mysqli_query($conn, $insBUGESERA);
		}
$displayBUGESERA1 ="select district_name, incident_name, count(incident_name) AS counts FROM reports WHERE incident_name='$incident2' AND district_name = 'BUGESERA'";
	$sqlBUGESERA1 = mysqli_query($conn, $displayBUGESERA1);
while($rowdisplayBUGESERA1 = mysqli_fetch_array($sqlBUGESERA1))
		{
			
		$distrnameBUGESERA1 =  'BUGESERA';	
		$numcoutsBUGESERA1 = $rowdisplayBUGESERA1['counts'];	
		mysqli_query($conn, $insBUGESERA1);
		}
		

$insBUGESERAs = "insert into chart(district_name,keywords,keywords2,fist_value,second_value)VALUES ('$distrnameBUGESERA','$incident1','$incident2''$numcoutsBUGESERA,','$numcoutsBUGESERA1')";
		mysqli_query($conn, $insBUGESERAs);
//COUNT FOR RUHANGO
$displayRUHANGO="select district_name, incident_name, count(incident_name) AS counts FROM reports WHERE incident_name='$incident1' AND district_name = 'RUHANGO'";

	$sqlRUHANGO = mysqli_query($conn, $displayRUHANGO);

while($rowdisplayRUHANGO = mysqli_fetch_array($sqlRUHANGO))
		{
			
		$distrnameRUHANGO =  'RUHANGO';	
		$numcoutsRUHANGO = $rowdisplayRUHANGO['counts'];	
		mysqli_query($conn, $insRUHANGO);
		}
$displayRUHANGO1 ="select district_name, incident_name, count(incident_name) AS counts FROM reports WHERE incident_name='$incident2' AND district_name = 'RUHANGO'";
	$sqlRUHANGO1 = mysqli_query($conn, $displayRUHANGO1);
while($rowdisplayRUHANGO1 = mysqli_fetch_array($sqlRUHANGO1))
		{
			
		$distrnameRUHANGO1 =  'RUHANGO';	
		$numcoutsRUHANGO1 = $rowdisplayRUHANGO1['counts'];	
		mysqli_query($conn, $insRUHANGO1);
		}
		

$insRUHANGOs = "insert into chart(district_name,keywords,keywords2,fist_value,second_value)VALUES ('$distrnameRUHANGO','$incident1','$incident2','$numcoutsRUHANGO','$numcoutsRUHANGO1')";
		mysqli_query($conn, $insRUHANGOs);
//COUNT FOR NYANZA
$displayNYANZA="select district_name, incident_name, count(incident_name) AS counts FROM reports WHERE incident_name='$incident1' AND district_name = 'NYANZA'";

	$sqlNYANZA = mysqli_query($conn, $displayNYANZA);

while($rowdisplayNYANZA = mysqli_fetch_array($sqlNYANZA))
		{
			
		$distrnameNYANZA =  'NYANZA';	
		$numcoutsNYANZA = $rowdisplayNYANZA['counts'];	
		mysqli_query($conn, $insNYANZA);
		}
$displayNYANZA1 ="select district_name, incident_name, count(incident_name) AS counts FROM reports WHERE incident_name='$incident2' AND district_name = 'NYANZA'";
	$sqlNYANZA1 = mysqli_query($conn, $displayNYANZA1);
while($rowdisplayNYANZA1 = mysqli_fetch_array($sqlNYANZA1))
		{
			
		$distrnameNYANZA1 =  'NYANZA';	
		$numcoutsNYANZA1 = $rowdisplayNYANZA1['counts'];	
		mysqli_query($conn, $insNYANZA1);
		}
		

$insNYANZAs = "insert into chart(district_name,keywords,keywords2,fist_value,second_value)VALUES ('$distrnameNYANZA','$incident1','$incident2','$numcoutsNYANZA','$numcoutsNYANZA1')";
		mysqli_query($conn, $insNYANZAs);
//COUNT FOR GISAGARA
$displayGISAGARA="select district_name, incident_name, count(incident_name) AS counts FROM reports WHERE incident_name='$incident1' AND district_name = 'GISAGARA'";

	$sqlGISAGARA = mysqli_query($conn, $displayGISAGARA);

while($rowdisplayGISAGARA = mysqli_fetch_array($sqlGISAGARA))
		{
			
		$distrnameGISAGARA =  'GISAGARA';	
		$numcoutsGISAGARA = $rowdisplayGISAGARA['counts'];	
		mysqli_query($conn, $insGISAGARA);
		}
$displayGISAGARA1 ="select district_name, incident_name, count(incident_name) AS counts FROM reports WHERE incident_name='$incident2' AND district_name = 'GISAGARA'";
	$sqlGISAGARA1 = mysqli_query($conn, $displayGISAGARA1);
while($rowdisplayGISAGARA1 = mysqli_fetch_array($sqlGISAGARA1))
		{
			
		$distrnameGISAGARA1 =  'GISAGARA';	
		$numcoutsGISAGARA1 = $rowdisplayGISAGARA1['counts'];	
		mysqli_query($conn, $insGISAGARA1);
		}
		

$insGISAGARAs = "insert into chart(district_name,keywords,keywords2,fist_value,second_value)VALUES ('$distrnameGISAGARA','$incident1','$incident2','$numcoutsGISAGARA','$numcoutsGISAGARA1')";
		mysqli_query($conn, $insGISAGARAs);
//COUNT FOR NYAMASHEKE
$displayNYAMASHEKE="select district_name, incident_name, count(incident_name) AS counts FROM reports WHERE incident_name='$incident1' AND district_name = 'NYAMASHEKE'";

	$sqlNYAMASHEKE = mysqli_query($conn, $displayNYAMASHEKE);

while($rowdisplayNYAMASHEKE = mysqli_fetch_array($sqlNYAMASHEKE))
		{
			
		$distrnameNYAMASHEKE =  'NYAMASHEKE';	
		$numcoutsNYAMASHEKE = $rowdisplayNYAMASHEKE['counts'];	
		mysqli_query($conn, $insNYAMASHEKE);
		}
$displayNYAMASHEKE1 ="select district_name, incident_name, count(incident_name) AS counts FROM reports WHERE incident_name='$incident2' AND district_name = 'NYAMASHEKE'";
	$sqlNYAMASHEKE1 = mysqli_query($conn, $displayNYAMASHEKE1);
while($rowdisplayNYAMASHEKE1 = mysqli_fetch_array($sqlNYAMASHEKE1))
		{
			
		$distrnameNYAMASHEKE1 =  'NYAMASHEKE';	
		$numcoutsNYAMASHEKE1 = $rowdisplayNYAMASHEKE1['counts'];	
		mysqli_query($conn, $insNYAMASHEKE1);
		}
		

$insNYAMASHEKEs = "insert into chart(district_name,keywords,keywords2,fist_value,second_value)VALUES ('$distrnameNYAMASHEKE','$incident1','$incident2','$numcoutsNYAMASHEKE','$numcoutsNYAMASHEKE1')";
		mysqli_query($conn, $insNYAMASHEKEs);
//COUNT FOR NYAMAGABE
$displayNYAMAGABE="select district_name, incident_name, count(incident_name) AS counts FROM reports WHERE incident_name='$incident1' AND district_name = 'NYAMAGABE'";

	$sqlNYAMAGABE = mysqli_query($conn, $displayNYAMAGABE);

while($rowdisplayNYAMAGABE = mysqli_fetch_array($sqlNYAMAGABE))
		{
			
		$distrnameNYAMAGABE =  'NYAMAGABE';	
		$numcoutsNYAMAGABE = $rowdisplayNYAMAGABE['counts'];	
		mysqli_query($conn, $insNYAMAGABE);
		}
$displayNYAMAGABE1 ="select district_name, incident_name, count(incident_name) AS counts FROM reports WHERE incident_name='$incident2' AND district_name = 'NYAMAGABE'";
	$sqlNYAMAGABE1 = mysqli_query($conn, $displayNYAMAGABE1);
while($rowdisplayNYAMAGABE1 = mysqli_fetch_array($sqlNYAMAGABE1))
		{
			
		$distrnameNYAMAGABE1 =  'NYAMAGABE';	
		$numcoutsNYAMAGABE1 = $rowdisplayNYAMAGABE1['counts'];	
		mysqli_query($conn, $insNYAMAGABE1);
		}
		

$insNYAMAGABEs = "insert into chart(district_name,keywords,keywords2,fist_value,second_value)VALUES ('$distrnameNYAMAGABE','$incident1','$incident2','$numcoutsNYAMAGABE','$numcoutsNYAMAGABE1')";
		mysqli_query($conn, $insNYAMAGABEs);
		
//COUNT FOR RUSIZI
$displayRUSIZI="select district_name, incident_name, count(incident_name) AS counts FROM reports WHERE incident_name='$incident1' AND district_name = 'RUSIZI'";

	$sqlRUSIZI = mysqli_query($conn, $displayRUSIZI);

while($rowdisplayRUSIZI = mysqli_fetch_array($sqlRUSIZI))
		{
			
		$distrnameRUSIZI =  'RUSIZI';	
		$numcoutsRUSIZI = $rowdisplayRUSIZI['counts'];	
		mysqli_query($conn, $insRUSIZI);
		}
$displayRUSIZI1 ="select district_name, incident_name, count(incident_name) AS counts FROM reports WHERE incident_name='$incident2' AND district_name = 'RUSIZI'";
	$sqlRUSIZI1 = mysqli_query($conn, $displayRUSIZI1);
while($rowdisplayRUSIZI1 = mysqli_fetch_array($sqlRUSIZI1))
		{
			
		$distrnameRUSIZI1 =  'RUSIZI';	
		$numcoutsRUSIZI1 = $rowdisplayRUSIZI1['counts'];	
		mysqli_query($conn, $insRUSIZI1);
		}
		

$insRUSIZIs = "insert into chart(district_name,keywords,keywords2,fist_value,second_value)VALUES ('$distrnameRUSIZI','$incident1','$incident2','$numcoutsRUSIZI','$numcoutsRUSIZI1')";
		mysqli_query($conn, $insRUSIZIs);
//COUNT FOR HUYE
$displayHUYE="select district_name, incident_name, count(incident_name) AS counts FROM reports WHERE incident_name='$incident1' AND district_name = 'HUYE'";

	$sqlHUYE = mysqli_query($conn, $displayHUYE);

while($rowdisplayHUYE = mysqli_fetch_array($sqlHUYE))
		{
			
		$distrnameHUYE =  'HUYE';	
		$numcoutsHUYE = $rowdisplayHUYE['counts'];	
		mysqli_query($conn, $insHUYE);
		}
$displayHUYE1 ="select district_name, incident_name, count(incident_name) AS counts FROM reports WHERE incident_name='$incident2' AND district_name = 'HUYE'";
	$sqlHUYE1 = mysqli_query($conn, $displayHUYE1);
while($rowdisplayHUYE1 = mysqli_fetch_array($sqlHUYE1))
		{
			
		$distrnameHUYE1 =  'HUYE';	
		$numcoutsHUYE1 = $rowdisplayHUYE1['counts'];	
		mysqli_query($conn, $insHUYE1);
		}
		

$insHUYEs = "insert into chart(district_name,keywords,keywords2,fist_value,second_value)VALUES ('$distrnameHUYE','$incident1','$incident2','$numcoutsHUYE','$numcoutsHUYE1')";
		mysqli_query($conn, $insHUYEs);
//COUNT FOR NYARUGURU
$displayNYARUGURU="select district_name, incident_name, count(incident_name) AS counts FROM reports WHERE incident_name='$incident1' AND district_name = 'NYARUGURU'";

	$sqlNYARUGURU = mysqli_query($conn, $displayNYARUGURU);

while($rowdisplayNYARUGURU = mysqli_fetch_array($sqlNYARUGURU))
		{
			
		$distrnameNYARUGURU =  'NYARUGURU';	
		$numcoutsNYARUGURU = $rowdisplayNYARUGURU['counts'];	
		mysqli_query($conn, $insNYARUGURU);
		}
$displayNYARUGURU1 ="select district_name, incident_name, count(incident_name) AS counts FROM reports WHERE incident_name='$incident2' AND district_name = 'NYARUGURU'";
	$sqlNYARUGURU1 = mysqli_query($conn, $displayNYARUGURU1);
while($rowdisplayNYARUGURU1 = mysqli_fetch_array($sqlNYARUGURU1))
		{
			
		$distrnameNYARUGURU1 =  'NYARUGURU';	
		$numcoutsNYARUGURU1 = $rowdisplayNYARUGURU1['counts'];	
		mysqli_query($conn, $insNYARUGURU1);
		}
		

$insNYARUGURUs = "insert into chart(district_name,keywords,keywords2,fist_value,second_value)VALUES ('$distrnameNYARUGURU','$incident1','$incident2','$numcoutsNYARUGURU','$numcoutsNYARUGURU1')";
		mysqli_query($conn, $insNYARUGURUs);
		


$conn->close();
?>