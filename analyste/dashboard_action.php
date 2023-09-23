
<?php 
$sqltruncate = "TRUNCATE TABLE mydashboard";
	$sqlr = mysqli_query($connect, $sqltruncate);
	$sqltruncind= "TRUNCATE TABLE dash_incidents";
	$sqlrinc = mysqli_query($connect, $sqltruncind);
	$m = date(m);
	$Y =date(Y);
//count and insert for incidents
$mydincidents = "SELECT distinct incident_name FROM incidents";
$Mmydincidnets= mysqli_query($connect, $mydincidents);
while($rowincidents= mysqli_fetch_array($Mmydincidnets)){
$incident=$rowincidents['incident_name']; 
$occurences = "SELECT incident_name,COUNT(incident_name)AS nincidents FROM reports where (incident_name = '$incident'AND (MONTH(dateincident)= $m AND YEAR(dateincident)= $Y))";
$myoccurences = mysqli_query($connect, $occurences);
while($rowocc = mysqli_fetch_array($myoccurences)){
$numinc = $rowocc['nincidents'];
$occinsert = "INSERT INTO dash_incidents (incident_name,number_occurence)VALUES('$incident','$numinc')";
	$sqlinsert = mysqli_query($connect, $occinsert);

}
}
//end for count incidents
	//COUNT FOR NYAGATARE
$displayNYAGATARE ="select district_name,povince_name,incident_name,count(report_id) AS counts FROM reports WHERE  district_name = 'NYAGATARE' AND (MONTH(dateincident)= $m AND YEAR(dateincident)= $Y)";
	$sqlNYAGATARE = mysqli_query($connect, $displayNYAGATARE);

while($rowdisplayNYAGATARE = mysqli_fetch_array($sqlNYAGATARE))
		{
		 $distrnameNYAGATARE =  'NYAGATARE';	
		 $provinceNYAGATARE = $rowdisplayNYAGATARE['povince_name'];
		 $numcoutsNYAGATARE = $rowdisplayNYAGATARE['counts'].'</BR>';	
		$insNYAGATARE = "insert into mydashboard(district_name,province_name,report_occurence)VALUES ('$distrnameNYAGATARE','$provinceNYAGATARE','$numcoutsNYAGATARE')";
		mysqli_query($connect, $insNYAGATARE);
		}

			
//COUNT FOR BURERA
$displayBURERA ="select district_name,povince_name,incident_name,count(report_id) AS counts FROM reports WHERE district_name = 'BURERA' AND (MONTH(dateincident)= $m AND YEAR(dateincident)= $Y)";
	$sqlBURERA = mysqli_query($connect, $displayBURERA);

while($rowdisplayBURERA = mysqli_fetch_array($sqlBURERA))
		{
		$distrnameBURERA =  'BURERA';	
		$provinceBURERA = $rowdisplayBURERA['povince_name'];
		$numcoutsBURERA = $rowdisplayBURERA['counts'].'</BR>';	
		$insBURERA = "insert into mydashboard(district_name,province_name,report_occurence)VALUES ('$distrnameBURERA','$provinceBURERA','$numcoutsBURERA')";
		mysqli_query($connect, $insBURERA);
		}
//COUNT FOR MUSANZE
$displayMUSANZE ="select district_name,povince_name,incident_name,count(report_id) AS counts FROM reports WHERE district_name = 'MUSANZE' AND (MONTH(dateincident)= $m AND YEAR(dateincident)= $Y)";
	$sqlMUSANZE = mysqli_query($connect, $displayMUSANZE);

while($rowdisplayMUSANZE = mysqli_fetch_array($sqlMUSANZE))
		{
		$distrnameMUSANZE =  'MUSANZE';	
		$provinceMUSANZE = $rowdisplayMUSANZE['povince_name'];
		$numcoutsMUSANZE = $rowdisplayMUSANZE['counts'].'</BR>';	
		$insMUSANZE = "insert into mydashboard(district_name,province_name,report_occurence)VALUES ('$distrnameMUSANZE','$provinceMUSANZE','$numcoutsMUSANZE')";
		mysqli_query($connect, $insMUSANZE);
		}
		
//COUNT FOR GICUMBI
$displayGICUMBI ="select district_name,povince_name,incident_name,count(report_id) AS counts FROM reports WHERE district_name = 'GICUMBI' AND (MONTH(dateincident)= $m AND YEAR(dateincident)= $Y)";
	$sqlGICUMBI = mysqli_query($connect, $displayGICUMBI);

while($rowdisplayGICUMBI = mysqli_fetch_array($sqlGICUMBI))
		{
		$distrnameGICUMBI =  'GICUMBI';	
		$provinceGICUMBI = $rowdisplayGICUMBI['povince_name'];
		$numcoutsGICUMBI = $rowdisplayGICUMBI['counts'].'</BR>';	
		$insGICUMBI = "insert into mydashboard(district_name,province_name,report_occurence)VALUES ('$distrnameGICUMBI','$provinceGICUMBI','$numcoutsGICUMBI')";
		mysqli_query($connect, $insGICUMBI);
		}
		
//COUNT FOR GATSIBO
$displayGATSIBO ="select district_name,povince_name,incident_name,count(report_id) AS counts FROM reports WHERE district_name = 'GATSIBO' AND (MONTH(dateincident)= $m AND YEAR(dateincident)= $Y)";
	$sqlGATSIBO = mysqli_query($connect, $displayGATSIBO);

while($rowdisplayGATSIBO = mysqli_fetch_array($sqlGATSIBO))
		{
		$distrnameGATSIBO =  'GATSIBO';
       $provinceGATSIBO = $rowdisplayGATSIBO['povince_name'];		
		$numcoutsGATSIBO = $rowdisplayGATSIBO['counts'].'</BR>';	
		$insGATSIBO = "insert into mydashboard(district_name,province_name,report_occurence)VALUES ('$distrnameGATSIBO','$provinceGATSIBO','$numcoutsGATSIBO')";
		mysqli_query($connect, $insGATSIBO);
		}
		
//COUNT FOR RULINDO
$displayRULINDO ="select district_name,povince_name,incident_name,count(report_id) AS counts FROM reports WHERE district_name = 'RULINDO' AND (MONTH(dateincident)= $m AND YEAR(dateincident)= $Y)";
	$sqlRULINDO = mysqli_query($connect, $displayRULINDO);

while($rowdisplayRULINDO = mysqli_fetch_array($sqlRULINDO))
		{
		$distrnameRULINDO =  'RULINDO';	
       $provinceRULINDO = $rowdisplayRULINDO['povince_name'];		
		$numcoutsRULINDO = $rowdisplayRULINDO['counts'].'</BR>';	
		$insRULINDO = "insert into mydashboard(district_name,province_name,report_occurence)VALUES ('$distrnameRULINDO','$provinceRULINDO','$numcoutsRULINDO')";
		mysqli_query($connect, $insRULINDO);
		}
		
//COUNT FOR GAKENKE
$displayGAKENKE ="select district_name,povince_name,incident_name,count(report_id) AS counts FROM reports WHERE district_name = 'GAKENKE' AND (MONTH(dateincident)= $m AND YEAR(dateincident)= $Y)";
	$sqlGAKENKE = mysqli_query($connect, $displayGAKENKE);

while($rowdisplayGAKENKE = mysqli_fetch_array($sqlGAKENKE))
		{
		$distrnameGAKENKE =  'GAKENKE';
       $provinceGAKENKE = $rowdisplayGAKENKE['povince_name'];		
		$numcoutsGAKENKE = $rowdisplayGAKENKE['counts'].'</BR>';	
		$insGAKENKE = "insert into mydashboard(district_name,province_name,report_occurence)VALUES ('$distrnameGAKENKE','$provinceGAKENKE ','$numcoutsGAKENKE')";
		mysqli_query($connect, $insGAKENKE);
		}
		
//COUNT FOR NYABIHU
$displayNYABIHU ="select district_name,povince_name,incident_name,count(report_id) AS counts FROM reports WHERE district_name = 'NYABIHU' AND (MONTH(dateincident)= $m AND YEAR(dateincident)= $Y)";
	$sqlNYABIHU = mysqli_query($connect, $displayNYABIHU);

while($rowdisplayNYABIHU = mysqli_fetch_array($sqlNYABIHU))
		{
		$distrnameNYABIHU =  'NYABIHU';	
       $provinceNYABIHU = $rowdisplayNYABIHU['povince_name'];		
		$numcoutsNYABIHU = $rowdisplayNYABIHU['counts'].'</BR>';	
		$insNYABIHU = "insert into mydashboard(district_name,province_name,report_occurence)VALUES ('$distrnameNYABIHU','$provinceNYABIHU','$numcoutsNYABIHU')";
		mysqli_query($connect, $insNYABIHU);
		}
//COUNT FOR RUBAVU
$displayRUBAVU ="select district_name,povince_name,incident_name,count(report_id) AS counts FROM reports WHERE district_name = 'RUBAVU' AND (MONTH(dateincident)= $m AND YEAR(dateincident)= $Y)";
	$sqlRUBAVU = mysqli_query($connect, $displayRUBAVU);

while($rowdisplayRUBAVU = mysqli_fetch_array($sqlRUBAVU))
		{
		$distrnameRUBAVU =  'RUBAVU';
       $provinceRUBAVU = $rowdisplayRUBAVU['povince_name'];		
		$numcoutsRUBAVU = $rowdisplayRUBAVU['counts'].'</BR>';	
		$insRUBAVU = "insert into mydashboard(district_name,province_name,report_occurence)VALUES ('$distrnameRUBAVU','$provinceRUBAVU','$numcoutsRUBAVU')";
		mysqli_query($connect, $insRUBAVU);
		}

//COUNT FOR KAYONZA
$displayKAYONZA ="select district_name,povince_name,incident_name,count(report_id) AS counts FROM reports WHERE district_name = 'KAYONZA' AND (MONTH(dateincident)= $m AND YEAR(dateincident)= $Y)";
	$sqlKAYONZA = mysqli_query($connect, $displayKAYONZA);

while($rowdisplayKAYONZA = mysqli_fetch_array($sqlKAYONZA))
		{
		$distrnameKAYONZA =  'KAYONZA';	
       $provinceKAYONZA = $rowdisplayKAYONZA['povince_name'];		
		$numcoutsKAYONZA = $rowdisplayKAYONZA['counts'].'</BR>';	
		$insKAYONZA = "insert into mydashboard(district_name,province_name,report_occurence)VALUES ('$distrnameKAYONZA','$provinceKAYONZA','$numcoutsKAYONZA')";
		mysqli_query($connect, $insKAYONZA);
		}
//COUNT FOR RWAMAGANA
$displayRWAMAGANA ="select district_name,povince_name,incident_name,count(report_id) AS counts FROM reports WHERE district_name = 'RWAMAGANA' AND (MONTH(dateincident)= $m AND YEAR(dateincident)= $Y)";
	$sqlRWAMAGANA = mysqli_query($connect, $displayRWAMAGANA);

while($rowdisplayRWAMAGANA = mysqli_fetch_array($sqlRWAMAGANA))
		{
		$distrnameRWAMAGANA =  'RWAMAGANA';	
       $provinceRWAMAGANA = $rowdisplayRWAMAGANA['povince_name'];		
		$numcoutsRWAMAGANA = $rowdisplayRWAMAGANA['counts'].'</BR>';	
		$insRWAMAGANA = "insert into mydashboard(district_name,province_name,report_occurence)VALUES ('$distrnameRWAMAGANA','$provinceRWAMAGANA','$numcoutsRWAMAGANA')";
		mysqli_query($connect, $insRWAMAGANA);
		}
//COUNT FOR GASABO
$displayGASABO ="select district_name,povince_name,incident_name,count(report_id) AS counts FROM reports WHERE district_name = 'GASABO' AND (MONTH(dateincident)= $m AND YEAR(dateincident)= $Y)";
	$sqlGASABO = mysqli_query($connect, $displayGASABO);

while($rowdisplayGASABO = mysqli_fetch_array($sqlGASABO))
		{
		$distrnameGASABO =  'GASABO';
       $provinceGASABO = $rowdisplayGASABO['povince_name'];		
		$numcoutsGASABO = $rowdisplayGASABO['counts'].'</BR>';	
		$insGASABO = "insert into mydashboard(district_name,province_name,report_occurence)VALUES ('$distrnameGASABO','$provinceGASABO','$numcoutsGASABO')";
		mysqli_query($connect, $insGASABO);
		}
//COUNT FOR NGORORERO
$displayNGORORERO ="select district_name,povince_name,incident_name,count(report_id) AS counts FROM reports WHERE district_name = 'NGORORERO' AND (MONTH(dateincident)= $m AND YEAR(dateincident)= $Y)";
	$sqlNGORORERO = mysqli_query($connect, $displayNGORORERO);

while($rowdisplayNGORORERO = mysqli_fetch_array($sqlNGORORERO))
		{
		$distrnameNGORORERO =  'NGORORERO';	
       $provinceNGORORERO = $rowdisplayNGORORERO['povince_name'];		
		$numcoutsNGORORERO = $rowdisplayNGORORERO['counts'].'</BR>';	
		$insNGORORERO = "insert into mydashboard(district_name,province_name,report_occurence)VALUES ('$distrnameNGORORERO','$provinceNGORORERO','$numcoutsNGORORERO')";
		mysqli_query($connect, $insNGORORERO);
		}
//COUNT FOR RUTSIRO
$displayRUTSIRO ="select district_name,povince_name,incident_name,count(report_id) AS counts FROM reports WHERE district_name = 'RUTSIRO' AND (MONTH(dateincident)= $m AND YEAR(dateincident)= $Y)";
	$sqlRUTSIRO = mysqli_query($connect, $displayRUTSIRO);

while($rowdisplayRUTSIRO = mysqli_fetch_array($sqlRUTSIRO))
		{
		$distrnameRUTSIRO =  'RUTSIRO';	
       $provinceRUTSIRO = $rowdisplayRUTSIRO['povince_name'];		
		$numcoutsRUTSIRO = $rowdisplayRUTSIRO['counts'].'</BR>';	
		$insRUTSIRO = "insert into mydashboard(district_name,province_name,report_occurence)VALUES ('$distrnameRUTSIRO','$provinceRUTSIRO','$numcoutsRUTSIRO')";
		mysqli_query($connect, $insRUTSIRO);
		}
//COUNT FOR KICUKIRO
$displayKICUKIRO ="select district_name,povince_name,incident_name,count(report_id) AS counts FROM reports WHERE district_name = 'KICUKIRO' AND (MONTH(dateincident)= $m AND YEAR(dateincident)= $Y)";
	$sqlKICUKIRO = mysqli_query($connect, $displayKICUKIRO);

while($rowdisplayKICUKIRO = mysqli_fetch_array($sqlKICUKIRO))
		{
		$distrnameKICUKIRO =  'KICUKIRO';	
       $provinceKICUKIRO = $rowdisplayKICUKIRO['povince_name'];		
		$numcoutsKICUKIRO = $rowdisplayKICUKIRO['counts'].'</BR>';	
		$insKICUKIRO = "insert into mydashboard(district_name,province_name,report_occurence)VALUES ('$distrnameKICUKIRO','$provinceKICUKIRO','$numcoutsKICUKIRO')";
		mysqli_query($connect, $insKICUKIRO);
		}
//COUNT FOR NYARUGENGE
$displayNYARUGENGE ="select district_name,povince_name,incident_name,count(report_id) AS counts FROM reports WHERE district_name = 'NYARUGENGE' AND (MONTH(dateincident)= $m AND YEAR(dateincident)= $Y)";
	$sqlNYARUGENGE = mysqli_query($connect, $displayNYARUGENGE);

while($rowdisplayNYARUGENGE = mysqli_fetch_array($sqlNYARUGENGE))
		{
		$distrnameNYARUGENGE =  'NYARUGENGE';	
       $provinceNYARUGENGE = $rowdisplayNYARUGENGE['povince_name'];		
		$numcoutsNYARUGENGE = $rowdisplayNYARUGENGE['counts'].'</BR>';	
		$insNYARUGENGE = "insert into mydashboard(district_name,province_name,report_occurence)VALUES ('$distrnameNYARUGENGE','$provinceNYARUGENGE','$numcoutsNYARUGENGE')";
		mysqli_query($connect, $insNYARUGENGE);
		}
//COUNT FOR KAMONYI
$displayKAMONYI ="select district_name,povince_name,incident_name,count(report_id) AS counts FROM reports WHERE district_name = 'KAMONYI' AND (MONTH(dateincident)= $m AND YEAR(dateincident)= $Y)";
	$sqlKAMONYI = mysqli_query($connect, $displayKAMONYI);

while($rowdisplayKAMONYI = mysqli_fetch_array($sqlKAMONYI))
		{
		$distrnameKAMONYI =  'KAMONYI';	
       $provinceKAMONYI = $rowdisplayKAMONYI['povince_name'];		
		$numcoutsKAMONYI = $rowdisplayKAMONYI['counts'].'</BR>';	
		$insKAMONYI = "insert into mydashboard(district_name,province_name,report_occurence)VALUES ('$distrnameKAMONYI','$provinceKAMONYI','$numcoutsKAMONYI')";
		mysqli_query($connect, $insKAMONYI);
		}
//COUNT FOR MUHANGA
$displayMUHANGA ="select district_name,povince_name,incident_name,count(report_id) AS counts FROM reports WHERE district_name = 'MUHANGA' AND (MONTH(dateincident)= $m AND YEAR(dateincident)= $Y)";
	$sqlMUHANGA = mysqli_query($connect, $displayMUHANGA);

while($rowdisplayMUHANGA = mysqli_fetch_array($sqlMUHANGA))
		{
		$distrnameMUHANGA =  'MUHANGA';	
       $provinceMUHANGA = $rowdisplayMUHANGA['povince_name'];		
		$numcoutsMUHANGA = $rowdisplayMUHANGA['counts'].'</BR>';	
		$insMUHANGA = "insert into mydashboard(district_name,province_name,report_occurence)VALUES ('$distrnameMUHANGA','$provinceMUHANGA','$numcoutsMUHANGA')";
		mysqli_query($connect, $insMUHANGA);
		}
//COUNT FOR KARONGI
$displayKARONGI ="select district_name,povince_name,incident_name,count(report_id) AS counts FROM reports WHERE district_name = 'KARONGI' AND (MONTH(dateincident)= $m AND YEAR(dateincident)= $Y)";
	$sqlKARONGI = mysqli_query($connect, $displayKARONGI);

while($rowdisplayKARONGI = mysqli_fetch_array($sqlKARONGI))
		{
		$distrnameKARONGI =  'KARONGI';	
       $provinceKARONGI = $rowdisplayKARONGI['povince_name'];		
		$numcoutsKARONGI = $rowdisplayKARONGI['counts'].'</BR>';	
		$insKARONGI = "insert into mydashboard(district_name,province_name,report_occurence)VALUES ('$distrnameKARONGI','$provinceKARONGI','$numcoutsKARONGI')";
		mysqli_query($connect, $insKARONGI);
		}
//COUNT FOR KIREHE
$displayKIREHE ="select district_name,povince_name,incident_name,count(report_id) AS counts FROM reports WHERE district_name = 'KIREHE' AND (MONTH(dateincident)= $m AND YEAR(dateincident)= $Y)";
	$sqlKIREHE = mysqli_query($connect, $displayKIREHE);

while($rowdisplayKIREHE = mysqli_fetch_array($sqlKIREHE))
		{
		$distrnameKIREHE =  'KIREHE';
       $provinceKIREHE = $rowdisplayKIREHE['povince_name'];		
		$numcoutsKIREHE = $rowdisplayKIREHE['counts'].'</BR>';	
		$insKIREHE = "insert into mydashboard(district_name,province_name,report_occurence)VALUES ('$distrnameKIREHE','$provinceKIREHE','$numcoutsKIREHE')";
		mysqli_query($connect, $insKIREHE);
		}
//COUNT FOR NGOMA
$displayNGOMA ="select district_name,povince_name,incident_name,count(report_id) AS counts FROM reports WHERE district_name = 'NGOMA' AND (MONTH(dateincident)= $m AND YEAR(dateincident)= $Y)";
	$sqlNGOMA = mysqli_query($connect, $displayNGOMA);

while($rowdisplayNGOMA = mysqli_fetch_array($sqlNGOMA))
		{
		$distrnameNGOMA =  'NGOMA';	
       $provinceNGOMA = $rowdisplayNGOMA['povince_name'];		
		$numcoutsNGOMA = $rowdisplayNGOMA['counts'].'</BR>';	
		$insNGOMA = "insert into mydashboard(district_name,province_name,report_occurence)VALUES ('$distrnameNGOMA','$provinceNGOMA','$numcoutsNGOMA')";
		mysqli_query($connect, $insNGOMA);
		}
//COUNT FOR BUGESERA
$displayBUGESERA ="select district_name,povince_name,incident_name,count(report_id) AS counts FROM reports WHERE district_name = 'BUGESERA' AND (MONTH(dateincident)= $m AND YEAR(dateincident)= $Y)";
	$sqlBUGESERA = mysqli_query($connect, $displayBUGESERA);

while($rowdisplayBUGESERA = mysqli_fetch_array($sqlBUGESERA))
		{
		$distrnameBUGESERA =  'BUGESERA';
       $provinceBUGESERA= $rowdisplayBUGESERA['povince_name'];		
		$numcoutsBUGESERA = $rowdisplayBUGESERA['counts'].'</BR>';	
		$insBUGESERA = "insert into mydashboard(district_name,province_name,report_occurence)VALUES ('$distrnameBUGESERA','$provinceBUGESERA','$numcoutsBUGESERA')";
		mysqli_query($connect, $insBUGESERA);
		}
//COUNT FOR RUHANGO
$displayRUHANGO ="select district_name,povince_name,incident_name,count(report_id) AS counts FROM reports WHERE district_name = 'RUHANGO' AND (MONTH(dateincident)= $m AND YEAR(dateincident)= $Y)";
	$sqlRUHANGO = mysqli_query($connect, $displayRUHANGO);

while($rowdisplayRUHANGO = mysqli_fetch_array($sqlRUHANGO))
		{
		$distrnameRUHANGO =  'RUHANGO';	
       $provinceRUHANGO= $rowdisplayRUHANGO['povince_name'];		
		$numcoutsRUHANGO = $rowdisplayRUHANGO['counts'].'</BR>';	
		$insRUHANGO = "insert into mydashboard(district_name,province_name,report_occurence)VALUES ('$distrnameRUHANGO','$provinceRUHANGO','$numcoutsRUHANGO')";
		mysqli_query($connect, $insRUHANGO);
		}
//COUNT FOR NYANZA
$displayNYANZA ="select district_name,povince_name,incident_name,count(report_id) AS counts FROM reports WHERE district_name = 'NYANZA' AND (MONTH(dateincident)= $m AND YEAR(dateincident)= $Y)";
	$sqlNYANZA = mysqli_query($connect, $displayNYANZA);

while($rowdisplayNYANZA = mysqli_fetch_array($sqlNYANZA))
		{
		$distrnameNYANZA =  'NYANZA';	
       $provinceNYANZA= $rowdisplayNYANZA['povince_name'];		
		$numcoutsNYANZA = $rowdisplayNYANZA['counts'].'</BR>';	
		$insNYANZA = "insert into mydashboard(district_name,province_name,report_occurence)VALUES ('$distrnameNYANZA','$provinceNYANZA','$numcoutsNYANZA')";
		mysqli_query($connect, $insNYANZA);
		}
//COUNT FOR GISAGARA
$displayGISAGARA ="select district_name,povince_name,incident_name,count(report_id) AS counts FROM reports WHERE district_name = 'GISAGARA' AND (MONTH(dateincident)= $m AND YEAR(dateincident)= $Y)";
	$sqlGISAGARA = mysqli_query($connect, $displayGISAGARA);

while($rowdisplayGISAGARA = mysqli_fetch_array($sqlGISAGARA))
		{
		$distrnameGISAGARA =  'GISAGARA';
       $provinceGISAGARA= $rowdisplayGISAGARA['povince_name'];		
		$numcoutsGISAGARA = $rowdisplayGISAGARA['counts'].'</BR>';	
		$insGISAGARA = "insert into mydashboard(district_name,province_name,report_occurence)VALUES ('$distrnameGISAGARA','$provinceGISAGARA','$numcoutsGISAGARA')";
		mysqli_query($connect, $insGISAGARA);
		}
//COUNT FOR NYAMASHEKE
$displayNYAMASHEKE ="select district_name,povince_name,incident_name,count(report_id) AS counts FROM reports WHERE district_name = 'NYAMASHEKE' AND (MONTH(dateincident)= $m AND YEAR(dateincident)= $Y)";
	$sqlNYAMASHEKE = mysqli_query($connect, $displayNYAMASHEKE);

while($rowdisplayNYAMASHEKE = mysqli_fetch_array($sqlNYAMASHEKE))
		{
		$distrnameNYAMASHEKE =  'NYAMASHEKE';	
       $provinceNYAMASHEKE= $rowdisplayNYAMASHEKE['povince_name'];		
		$numcoutsNYAMASHEKE = $rowdisplayNYAMASHEKE['counts'].'</BR>';	
		$insNYAMASHEKE = "insert into mydashboard(district_name,province_name,report_occurence)VALUES ('$distrnameNYAMASHEKE','$provinceNYAMASHEKE','$numcoutsNYAMASHEKE')";
		mysqli_query($connect, $insNYAMASHEKE);
		}
//COUNT FOR NYAMAGABE
$displayNYAMAGABE ="select district_name,povince_name,incident_name,count(report_id) AS counts FROM reports WHERE district_name = 'NYAMAGABE' AND (MONTH(dateincident)= $m AND YEAR(dateincident)= $Y)";
	$sqlNYAMAGABE = mysqli_query($connect, $displayNYAMAGABE);

while($rowdisplayNYAMAGABE = mysqli_fetch_array($sqlNYAMAGABE))
		{
		$distrnameNYAMAGABE =  'NYAMAGABE';	
       $provinceNYAMAGABE= $rowdisplayNYAMAGABE['povince_name'];		
		$numcoutsNYAMAGABE = $rowdisplayNYAMAGABE['counts'].'</BR>';	
		$insNYAMAGABE = "insert into mydashboard(district_name,province_name,report_occurence)VALUES ('$distrnameNYAMAGABE','$provinceNYAMAGABE','$numcoutsNYAMAGABE')";
		mysqli_query($connect, $insNYAMAGABE);
		}
		
//COUNT FOR RUSIZI
$displayRUSIZI ="select district_name,povince_name,incident_name,count(report_id) AS counts FROM reports WHERE district_name = 'RUSIZI' AND (MONTH(dateincident)= $m AND YEAR(dateincident)= $Y)";
	$sqlRUSIZI = mysqli_query($connect, $displayRUSIZI);

while($rowdisplayRUSIZI = mysqli_fetch_array($sqlRUSIZI))
		{
		$distrnameRUSIZI =  'RUSIZI';	
       $provinceRUSIZI= $rowdisplayRUSIZI['povince_name'];		
		$numcoutsRUSIZI = $rowdisplayRUSIZI['counts'].'</BR>';	
		$insRUSIZI = "insert into mydashboard(district_name,province_name,report_occurence)VALUES ('$distrnameRUSIZI','$provinceRUSIZI','$numcoutsRUSIZI')";
		mysqli_query($connect, $insRUSIZI);
		}
//COUNT FOR HUYE
$displayHUYE ="select district_name,povince_name,incident_name,count(report_id) AS counts FROM reports WHERE district_name = 'HUYE' AND (MONTH(dateincident)= $m AND YEAR(dateincident)= $Y)";
	$sqlHUYE = mysqli_query($connect, $displayHUYE);

while($rowdisplayHUYE = mysqli_fetch_array($sqlHUYE))
		{
		$distrnameHUYE =  'HUYE';	
       $provinceHUYE= $rowdisplayHUYE['povince_name'];		
		$numcoutsHUYE = $rowdisplayHUYE['counts'].'</BR>';	
		$insHUYE = "insert into mydashboard(district_name,province_name,report_occurence)VALUES ('$distrnameHUYE','$provinceHUYE','$numcoutsHUYE')";
		mysqli_query($connect, $insHUYE);
		}
//COUNT FOR NYARUGURU
$displayNYARUGURU ="select district_name,povince_name,incident_name,count(report_id) AS counts FROM reports WHERE district_name = 'NYARUGURU' AND (MONTH(dateincident)= $m AND YEAR(dateincident)= $Y)";
	$sqlNYARUGURU = mysqli_query($connect, $displayNYARUGURU);

while($rowdisplayNYARUGURU = mysqli_fetch_array($sqlNYARUGURU))
		{
		$distrnameNYARUGURU =  'NYARUGURU';	
       $provinceNYARUGURU= $rowdisplayNYARUGURU['povince_name'];		
		$numcoutsNYARUGURU = $rowdisplayNYARUGURU['counts'].'</BR>';	
		$insNYARUGURU = "insert into mydashboard(district_name,province_name,report_occurence)VALUES ('$distrnameNYARUGURU','$provinceNYARUGURU','$numcoutsNYARUGURU')";
		mysqli_query($connect, $insNYARUGURU);
		}
//COUNT FOR Uganda
$displayUganda ="select district_name, actor_name, neighbor_country,  count(report_id) AS counts FROM reports WHERE neighbor_country = 'Uganda' AND (MONTH(dateincident)= $m AND YEAR(dateincident)= $Y)";
	$sqlUganda = mysqli_query($connect, $displayUganda);

while($rowdisplayUganda = mysqli_fetch_array($sqlUganda))
		{
		$distrnameUganda =  'Uganda';	
		$numcoutsUganda = $rowdisplayUganda['counts'].'</BR>';	
		$insUganda = "insert into mydashboard(district_name,report_occurence)VALUES ('$distrnameUganda','$numcoutsUganda')";
		mysqli_query($connect, $insUganda);
		}
//COUNT FOR DRC
$displayDRC ="select district_name, actor_name, neighbor_country,  count(report_id) AS counts FROM reports WHERE neighbor_country = 'DRC' AND (MONTH(dateincident)= $m AND YEAR(dateincident)= $Y)";
	$sqlDRC = mysqli_query($connect, $displayDRC);

while($rowdisplayDRC = mysqli_fetch_array($sqlDRC))
		{
		$distrnameDRC =  'DRC';	
		$numcoutsDRC = $rowdisplayDRC['counts'].'</BR>';	
		$insDRC = "insert into mydashboard(district_name,report_occurence)VALUES ('$distrnameDRC','$numcoutsDRC')";
		mysqli_query($connect, $insDRC);
		}
//COUNT FOR TANZANIA
$displayTANZANIA ="select district_name, actor_name, neighbor_country,  count(report_id) AS counts FROM reports WHERE neighbor_country = 'TANZANIA' AND (MONTH(dateincident)= $m AND YEAR(dateincident)= $Y)";
	$sqlTANZANIA = mysqli_query($connect, $displayTANZANIA);

while($rowdisplayTANZANIA = mysqli_fetch_array($sqlTANZANIA))
		{
		$distrnameTANZANIA =  'TANZANIA';	
		$numcoutsTANZANIA = $rowdisplayTANZANIA['counts'].'</BR>';	
		$insTANZANIA = "insert into mydashboard(district_name,report_occurence)VALUES ('$distrnameTANZANIA','$numcoutsTANZANIA')";
		mysqli_query($connect, $insTANZANIA);
		}
//COUNT FOR BURUNDI
$displayBURUNDI ="select district_name, actor_name, neighbor_country,  count(report_id) AS counts FROM reports WHERE neighbor_country = 'BURUNDI' AND (MONTH(dateincident)= $m AND YEAR(dateincident)= $Y)";
	$sqlBURUNDI = mysqli_query($connect, $displayBURUNDI);

while($rowdisplayBURUNDI = mysqli_fetch_array($sqlBURUNDI))
		{
		$distrnameBURUNDI =  'BURUNDI';	
		$numcoutsBURUNDI = $rowdisplayBURUNDI['counts'].'</BR>';	
		$insBURUNDI = "insert into mydashboard(district_name,report_occurence)VALUES ('$distrnameBURUNDI','$numcoutsBURUNDI')";
		mysqli_query($connect, $insBURUNDI);
		}	
?>
