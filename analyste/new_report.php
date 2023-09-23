<head>

	   <meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
           <title>Reporting  Form</title>
           <script src="jquery.min.js"></script>

		   <meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
		   		   <?php require_once 'includes/header.php'; ?>

          <?php

require_once("dbcontroller.php");
$db_handle = new DBController();
$query ="SELECT * FROM province";
$results = $db_handle->runQuery($query);

$query1 ="SELECT * FROM incidents order by incident_name";
$results1 = $db_handle->runQuery($query1);

$query2 ="SELECT * FROM actors_group order by actors_name";
$results2 = $db_handle->runQuery($query2);
?>
<html>
<head>
<TITLE>jQuery Dependent DropDown List - Countries and States</TITLE>
<head>
<style>
body{}
.frmDronpDown {border: 1px solid #7ddaff;background-color:#C8EEFD;margin: 2px 0px;padding:5px;border-radius:4px;}

</style>
<script src="jquery-3.2.1.min.js" type="text/javascript"></script>
           <script src="jquery.min.js"></script>
<link href="jquery-ui1.css" rel="stylesheet" type="text/css"/>
   <script src="jquery.min1.js"></script>
   <script src="jquery-ui.min1.js"></script>
   <?php
require_once("dbcontroller.php");
$db_handle = new DBController();
$querygr ="SELECT * FROM actors_group";
$resultsgr = $db_handle->runQuery($querygr);

$queryinst ="SELECT * FROM  institutions";
$resultsinst = $db_handle->runQuery($queryinst);
?>	   <script>
function getIngroup(val) {
	$.ajax({
	type: "POST",
	url: "getIngroup.php",
	data:'group_id='+val,
	success: function(data){
		$("#ingroup-list").html(data);

	}
	});
}
</script>

<script type="text/javascript">
$(document).ready(function(){
      $('#txtInput').bind("cut copy paste",function(e) {
          e.preventDefault();
      });
    });
</script>


   <script type="text/javascript">
       $(function() {
               $("#datesearch").datepicker({ dateFormat: "yy-mm-dd" }).val()
               $("#datesearch1").datepicker({ dateFormat: "yy-mm-dd" }).val()
       });

   </script>
<script>
function getDistrict(val) {
	$.ajax({
	type: "POST",
	url: "getDistrict.php",
	data:'disrict_id='+val,
	success: function(data){
		$("#disrict_liste").html(data);
		getSector();

	}
	});
}


function getSector(val) {
	$.ajax({
	type: "POST",
	url: "getSector.php",
	data:'sector_id='+val,
	success: function(data){
		$("#sector-list").html(data);
				getCell();

	}
	});
}
function getCell(val) {
	$.ajax({
	type: "POST",
	url: "getCell.php",
	data:'cell_id='+val,
	success: function(data){
		$("#cell_list").html(data);
	}
	});
}

function getElements(val) {
	$.ajax({
	type: "POST",
	url: "getElements.php",
	data:'element_id='+val,
	success: function(data){
		$("#element-list").html(data);

	}
	});
}
</script>

    <script type="text/javascript">
        function SelectedTextValue(ele) {
            if (ele.selectedIndex > 0) {
                var selectedText = ele.options[ele.selectedIndex].innerHTML;
                var selectedValue = ele.value;
                document.getElementById("txtContent").value = selectedText;
            }
            else {
                document.getElementById("txtContent").value = "";
            }
        }
    </script>

    <script type="text/javascript">
        function SelectedCredibility(ele) {
            if (ele.selectedIndex > 0) {
                var selectedText = ele.options[ele.selectedIndex].innerHTML;
                var selectedValue = ele.value;
                document.getElementById("credibility_name").value = selectedText;
            }
            else {
                document.getElementById("credibility_name").value = "";
            }
        }
    </script>
   <script type="text/javascript">
        function SelectedClassification(ele) {
            if (ele.selectedIndex > 0) {
                var selectedText = ele.options[ele.selectedIndex].innerHTML;
                var selectedValue = ele.value;
                document.getElementById("classification_name").value = selectedText;
            }
            else {
                document.getElementById("classification_name").value = "";
            }
        }
    </script>
 <script type="text/javascript">
        function SelectedReliability(ele) {
            if (ele.selectedIndex > 0) {
                var selectedText = ele.options[ele.selectedIndex].innerHTML;
                var selectedValue = ele.value;
                document.getElementById("reliability_name").value = selectedText;
            }
            else {
                document.getElementById("reliability_name").value = "";
            }
        }
    </script>
<script type="text/javascript">
        function SelectedSource(ele) {
            if (ele.selectedIndex > 0) {
                var selectedText = ele.options[ele.selectedIndex].innerHTML;
                var selectedValue = ele.value;
                document.getElementById("source_name").value = selectedText;
            }
            else {
                document.getElementById("source_name").value = "";
            }
        }
    </script>
 <script type="text/javascript">
        function SelectedTextValue1(ele) {
            if (ele.selectedIndex > 0) {
                var selectedText1 = ele.options[ele.selectedIndex].innerHTML;
                var selectedValue1 = ele.value;
                document.getElementById("txtContent1").value = selectedText1;
            }
            else {
                document.getElementById("txtContent1").value = "";
            }
        }
    </script>
	<script type="text/javascript">
        function SelectedKeyword(ele) {
            if (ele.selectedIndex > 0) {
                var selectedText1 = ele.options[ele.selectedIndex].innerHTML;
                var selectedValue1 = ele.value;
                document.getElementById("keywordname").value = selectedText1;
            }
            else {
                document.getElementById("keywordname").value = "";
            }
        }
    </script>
	<script type="text/javascript">
        function SelectedIncident(ele) {
            if (ele.selectedIndex > 0) {
                var selectedText1 = ele.options[ele.selectedIndex].innerHTML;
                var selectedValue1 = ele.value;
                document.getElementById("incidentname").value = selectedText1;
            }
            else {
                document.getElementById("incidentname").value = "";
            }
        }
    </script>
<script type="text/javascript">
        function SelectedGroup(ele) {
            if (ele.selectedIndex > 0) {
                var selectedText1 = ele.options[ele.selectedIndex].innerHTML;
                var selectedValue1 = ele.value;
                document.getElementById("groupname").value = selectedText1;
						document.getElementById("institution").disabled = true;
						document.getElementById("element-list").disabled = true;
						document.getElementById("institutionname").disabled = true;
						document.getElementById("elelementname").disabled = true;
						document.getElementById("memeberdescription").disabled = true;

            }
            else {
                document.getElementById("groupname").value = "";
            }
        }
    </script>
<script type="text/javascript">
        function SelectedActorGroup(ele) {
            if (ele.selectedIndex > 0) {
                var selectedText1 = ele.options[ele.selectedIndex].innerHTML;
                var selectedValue1 = ele.value;
                document.getElementById("groupactorname").value = selectedText1;
            }
            else {
                document.getElementById("groupactorname").value = "";
            }
        }
    </script>

<script type="text/javascript">
        function SelectedInstitution(ele) {
            if (ele.selectedIndex > 0) {
                var selectedText1 = ele.options[ele.selectedIndex].innerHTML;
                var selectedValue1 = ele.value;
                document.getElementById("institutionname").value = selectedText1;
				document.getElementById("enemygroup").disabled = true;
						document.getElementById("groupname").disabled = true;
						document.getElementById("ingroup-list").disabled = true;
						document.getElementById("groupactorname").disabled = true;
						document.getElementById("actoradescription").disabled = true;

            }
            else {
                document.getElementById("institutionname").value = "";
            }
        }
    </script>


<script type="text/javascript">
        function selectedElement(ele) {
            if (ele.selectedIndex > 0) {
                var selectedText1 = ele.options[ele.selectedIndex].innerHTML;
                var selectedValue1 = ele.value;
                document.getElementById("elelementname").value = selectedText1;
            }
            else {
                document.getElementById("elelementname").value = "";
            }
        }
    </script>
<script type="text/javascript">
        function SelectedTextValue2(ele) {
            if (ele.selectedIndex > 0) {
                var selectedText2 = ele.options[ele.selectedIndex].innerHTML;
                var selectedValue2= ele.value;
                document.getElementById("txtContent2").value = selectedText2;
            }
            else {
                document.getElementById("txtContent2").value = "";
            }
        }
    </script>
<script type="text/javascript">
        function SelectedTextValue3(ele) {
            if (ele.selectedIndex > 0) {
                var selectedText3 = ele.options[ele.selectedIndex].innerHTML;
                var selectedValue3= ele.value;
                document.getElementById("txtContent3").value = selectedText3;
            }
            else {
                document.getElementById("txtContent3").value = "";
            }
        }
    </script>
	<script type="text/javascript">
function CheckColors(val){
 var element=document.getElementById('otherincident');
 if(val=='OTHERSINCIDENT'){
   element.style.display='block';
   document.getElementById('otherincident').disabled = false;
 }
 else
 {
   element.style.display='none';
   document.getElementById('otherincident').disabled = true;

}
}

function CheckColors1(val){
 var element=document.getElementById('otherkeyword');
 if(val=='OTHERKEYWORDS'){
   element.style.display='block';
   document.getElementById('otherkeyword').disabled = false;
 }
 else
 {
   element.style.display='none';
   document.getElementById('otherkeyword').disabled = true;

}
}

function CheckColors2(val){
 var element=document.getElementById('othersubkeyword');
 if(val=='OTHERSUBKEYWORDS'){
   element.style.display='block';
   document.getElementById('othersubkeyword').disabled = false;
 }
 else
 {
   element.style.display='none';
   document.getElementById('othersubkeyword').disabled = true;

}
}

</script>
<script>
function startTime()
{
var today=new Date();
var h=today.getHours();
var m=today.getMinutes();
var s=today.getSeconds();
// add a zero in front of numbers<10
h=checkTime(h);
m=checkTime(m);
s=checkTime(s);
document.getElementById('txt').innerHTML=h+":"+m+":"+s;
t=setTimeout(function(){startTime()},500);
}

function checkTime(i)
{
if (i<10)
  {
  i="0" + i;
  }
return i;
}
function getKeyword(val) {
	$.ajax({
	type: "POST",
	url: "getKeyword.php",
	data:'keyword_id='+val,
	success: function(data){
		$("#keyword-list").html(data);

	}
	});
}
</script>
<script type="text/javascript">

function yesnoCheck() {
    if (document.getElementById('yesCheck').checked) {
		document.getElementById("neighberscountries").disabled = false;
		document.getElementById("neigborprovince").disabled = false;
		document.getElementById("neighberdistrict").disabled = false;
        document.getElementById('neighberscountries').style.display="block";
        document.getElementById('neigborprovince').style.display="block";
        document.getElementById('neighberdistrict').style.display="block";
		document.getElementById('province-list').style.display="none";
		document.getElementById("province-list").disabled = true;
		document.getElementById("txtContent").disabled = true;
		document.getElementById('disrict_liste').style.display="none";
				document.getElementById("disrict_liste").disabled = true;
		document.getElementById("txtContent1").disabled = true;
		document.getElementById('sector-list').style.display="none";
				document.getElementById("sector-list").disabled = true;
		document.getElementById("txtContent2").disabled = true;
		document.getElementById('cell_list').style.display="none";
				document.getElementById("cell_list").disabled = true;
		document.getElementById("txtContent3").disabled = true;
		document.getElementById('labelprov').style.display="none";
		document.getElementById('labeldistr').style.display="none";
		document.getElementById('labesect').style.display="none";
		document.getElementById('labecell').style.display="none";


    }
    else {
		document.getElementById("neighberscountries").disabled = true;
		document.getElementById("neigborprovince").disabled = true;
		document.getElementById("neighberdistrict").disabled = true;

		document.getElementById('neighberscountries').style.display="none";
		document.getElementById('neigborprovince').style.display="none";
		document.getElementById('neighberdistrict').style.display="none";
		document.getElementById('province-list').style.display="block";
		document.getElementById("province-list").disabled = false;
		document.getElementById("txtContent").disabled = false;

        document.getElementById('disrict_liste').style.display="block";
		document.getElementById("disrict_liste").disabled = false;
		document.getElementById("txtContent1").disabled = false;
        document.getElementById('sector-list').style.display="block";
			document.getElementById("sector-list").disabled = false;
		document.getElementById("txtContent2").disabled = false;
        document.getElementById('cell_list').style.display="block";
		document.getElementById("cell_list").disabled = false;
		document.getElementById("txtContent3").disabled = false;
        document.getElementById('labelprov').style.display="block";
        document.getElementById('labeldistr').style.display="block";
        document.getElementById('labesect').style.display="block";
        document.getElementById('labecell').style.display="block";

	}

}
function yesnoCheck1() {
    if (document.getElementById('yesCheck1').checked) {
		document.getElementById("element-list").disabled = false;
		document.getElementById("institution").disabled = false;
		document.getElementById("institutionname").disabled = false;
		document.getElementById("elelementname").disabled = false;
		document.getElementById("memeberdescription").disabled = false;
		document.getElementById("enemygroup").disabled = true;
		document.getElementById("groupname").disabled = true;
		document.getElementById("ingroup-list").disabled = true;
		document.getElementById("groupactorname").disabled = true;


    }
    else {
		document.getElementById("enemygroup").disabled = false;
		document.getElementById("groupname").disabled = false;
		document.getElementById("ingroup-list").disabled = false;
		document.getElementById("groupactorname").disabled = false;
		document.getElementById("element-list").disabled = true;
		document.getElementById("institution").disabled = true;
		document.getElementById("institutionname").disabled = true;
		document.getElementById("elelementname").disabled = true;
		document.getElementById("memeberdescription").disabled = true;
	}

}


function myFunction() {
    var checkBox = document.getElementById("myCheck");
    var text = document.getElementById("occurence");
    if (checkBox.checked == true){
        text.style.display = "block";
		text.disabled= false;
    } else {
       text.style.display = "none";
	   		text.disabled= true;

    }
}

</script>
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
</head>
<body  onload="startTime()">
<div id="templatemo_header_wrapper">

    <div id="templatemo_header">

        <img src="images/niss.png" style=" position: relative;float:left; top: 17px;">
        <img src="images/niss.png" style=" position: relative;float:right; top: 17px;">


	</div> <!-- end of templatemo_header -->
</div> <!-- end of templatemo_header_wrapper -->
 <!-- end of templatemo_menu_wrapper -->
<div style="background-color:DarkGray ;height: 930px;width:100%;margin:0 auto;" >
<form class="form-horizontal" method="POST" action="save_report" enctype="multipart/form-data"id="myCoolForm">
<fieldset><legend><strong><font color="white">Metadata</font></strong></legend>
<div class="frmDronpDown">


<table align="center">
<caption><strong>Subject: </strong><input type="text"  name="subject" style="width:30%;"    autocomplete="off" required></caption>
<tr><td><label>

			   <strong>Classification: </strong></label><select name="classification" id="classification" onChange="SelectedClassification(this)" required aria-required="true" aria-describedby="name-format"><option value=""></option>
                <option value="1">Restricted</option>
                <option value="2">Confidential</option>
			   <option value="3">Secret</option>
                <option value="4">Top Secret</option>

	           </select><br>			   <input type="text" name="classification_name" id="classification_name" style="display:none" required>


<label><strong>Credibility: </strong></label><select name="credibility" onChange="SelectedCredibility(this);" required aria-required="true" aria-describedby="name-format"><option value=""></option>
                 <option value="1">Confirmed</option>
			   <option value="2">Probably true</option>
                <option value="3">Possibly true</option>
                <option value="4">Doubtfull</option>
                <option value="5">Unlikely</option>
                <option value="6">Accuracy cannot be determined</option>

	           </select>
			   <input type="text" name="credibility_name" id="credibility_name" style="display:none" required>


</td><td><br>

<label><strong>Reliability: </strong></label><select name="reliability" onChange="SelectedReliability(this);"required aria-required="true" aria-describedby="name-format"><option value=""></option>
                 <option value="1">Completely reliable</option>
			   <option value="2">Usually Relaible</option>
                <option value="3">Fairy relaible</option>
                <option value="4">Usually unrelaible</option>
                <option value="5">Unrelaible</option>
                <option value="6">Reliability cannot be determined</option>

	           </select><br><input type="text" name="reliability_name" id="reliability_name" style="display:none" required>
</td>
<td><br>

<label><strong>Source: </strong></label><select name="source" onChange="SelectedSource(this);"required aria-required="true" aria-describedby="name-format"><option value=""></option>
                 <option value="1">Human Intelligence (HUMINT)</option>
			   <option value="2"> Signals Intelligence (SIGINT)</option>
                <option value="3">Open Source Intelligence (OSINT)</option>
                <option value="4">Measurement and Signatures Intelligence (MASINT)</option>
	           </select><br><input name="source_name" id="source_name" style="display:none" required>

</td></tr>
</table>
</fieldset>

 <fieldset><legend><strong><font color="white">Where</font></strong></legend>
<div class="frmDronpDown">
<div class="row">
<table align="center"><tr><td><label id ="labelprov"><strong>Province</strong></label></td><td><label id="labeldistr"><strong>Disrict</strong></label></td><td><label id="labesect"><strong>Sector</strong></label></td><td><label id="labecell"><strong>Cell</strong></label></td><td><label><strong>Latitude</strong></label></td><td><label><strong>Longitude</strong></label></td></tr>
<tr><td><select name="province" id="province-list" onChange="getDistrict(this.value);SelectedTextValue(this);" required>
<option value disabled selected value="">Select Province</option>
<?php
foreach($results as $province) {
?>
<option value="<?php echo $province["Province_id"]; ?>"><?php echo $province["province_name"]; ?></option>
<?php
}
?>
</select>
       <br> <input name="provinceName" type="text" id="txtContent" required style="display:none"/>

</td><td>

<select name="district" id="disrict_liste" onChange="getSector(this.value);SelectedTextValue1(this);" required>
<option value="">Select Disrict</option>
</select>
       <br> <input name="districtName" type="text" id="txtContent1" style="display:none" required />

</td><td>
<select name="sector" id="sector-list"  onChange="getCell(this.value);SelectedTextValue2(this);" required>
<option value="">Select Sector</option>
</select>
       <br> <input name="sectorName" type="text" id="txtContent2" style="display:none" required />

</td><td>

<select name="cell" id="cell_list" onChange="SelectedTextValue3(this);"  required>
<option value="">Select Cell</option>
</select>        <br> <input name="cellName" type="text" id="txtContent3" style="display:none" required />
</td><td>
<input type="text"  name="latitude" disabled></td><td>
<input type="text"  name="longitude" disabled></td><td>
</tr><tr><td><strong>Neighbor Countries</strong><input type="checkbox" onclick="javascript:yesnoCheck();" name="yesno" id="yesCheck"></td><td><select name="neighberscountries" id="neighberscountries" style="display:none" disabled required>
<option value disabled selected value="">Select Neighboring Country</option>

<option value="Uganda">UGANDA</option>
<option value="DRC">DR-CONGO</option>
<option value="TANZANIA">TANZANIA</option>
<option value="BURUNDI">BURUNDI</option>
</select>

</td><td><input name="neigborprovince" type="text" id="neigborprovince" required placeholder="Neighboring Region/Province"  style="display:none" disabled >

<strong>Occurence:</strong> <input type="checkbox" id="myCheck"  onclick="myFunction()"><input type="number" id="occurence" name="occurence" style="display:none" size= "2" min="0"  disabled required></td><td>
<input name="neighberdistrict" type="text" id="neighberdistrict" required placeholder="Neighboring District"  style="display:none" disabled>
</td><td>

</td><td>
</td><td>
</td></tr></table>
<table align="center">
<tr><td><label><strong>Geo-Description</strong></label></td><td><textarea name="gedodescription" rows="1" cols="80" style="width:60%" required></textarea></td></tr>
</table>
</fieldset>

<fieldset><legend><strong><font color="white">When</font></strong></legend>
<div class="frmDronpDown">
<table align="center">
<tr><td id="txtInput" ><label><strong>Date of Incident: </strong></label><input type="text" name="dateincident" id="datesearch" placeholder="Date of Incident" autocomplete="off" required aria-required='true' aria-describedby='name-format'></td><td><label><strong>Time of Entry : <?php echo date("Y-m-d");?>&nbsp;&nbsp;&nbsp;<span id="txt"></span></label></strong></td></tr>
</table>
</div>
</fieldset>


<fieldset><legend><strong><font color="white">What</font></strong></legend>
<div class="frmDronpDown">
<table align="center">
<tr><td><label><strong>Incident: </strong></label><select name="incident" id ="incident" onChange="CheckColors(this.value);SelectedIncident(this);getKeyword(this.value);" required>
<option value disabled selected value="">Select Incident</option>
<?php
foreach($results1 as $indident) {
?>
<option value="<?php echo $indident["incident_id"]; ?>"><?php echo $indident["incident_name"]; ?></option>
<?php
}
?>
<option value="OTHERSINCIDENT">Other</option>
<input type="text" name="incidentname" id="incidentname"  style="display:none"required>
<br> <input type="text" name="otherincident" id="otherincident" placeholder = "Other Incident" style='display:none;width:100%;' disabled  required/>
</select></td><td><label><strong>Keyword :<label><select class="form-control"id="keyword-list"  name="keyword" onChange="SelectedKeyword(this);" required>
<option value="">Select Keword</option>
</select> <br><input type="text" name="keywordname" id="keywordname" placeholder = "Keyword Name" style="display:none"   required/><!--<select name="keyword"  id ="keyword" onChange="CheckColors1(this.value);"required aria-required="true" aria-describedby="name-format"><option value=""></option>
                 <option value="Military">Military</option>
			   <option value="Security Situation">Security Situation</option>
                <option value="Road Bandits">Road Bandits</option>
                <option value="Education">Education</option>
                <option value="Mouvment">Mouvment</option>
                <option value="Abduction">Abduction</option>
<option value="OTHERKEYWORDS">Other keword</option>
	           </select>
<br><input type="text" name="otherkeyword" id="otherkeyword" placeholder = "Other Keyword" style='display:none;width:100%;' disabled  required/>--></td>
<td><label><strong>Sub-Keyword :<label><input type="text"  name="subkeyword" autocomplete="off" required><!--<select name="subkeyword" id="subkeyword"  onChange="CheckColors2(this.value);" required aria-required="true" aria-describedby="name-format"><option value=""></option>
                 <option value="Deployment">Deployment</option>
			   <option value="Security Situation">Attempt</option>
                <option value="Killings">Killings</option>
                <option value="Imminent attacks">Imminent attacks</option>
                <option value="Weapons smuggling">Weapons smuggling</option>
<option value="OTHERSUBKEYWORDS">Other Sub-keword</option>

	           </select><br><input type="text" name="othersubkeyword" id="othersubkeyword" placeholder = "Other Keyword" style='display:none;width:100%;' disabled  required/>--></td></tr>
</table>
<table align="center">
<tr><td><label><strong>Report Body</strong></label></td><td><textarea name="message" rows="5" cols="130" required style="width:90%"></textarea></td></tr>
</table>
</div>
</fieldset>

<fieldset><legend><strong><font color="white">Who</font></strong></legend>
<div class="frmDronpDown">
<table align="center">
<tr><td><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label><strong>Actor Group: </strong></label><br>Activate</strong><input type="checkbox" onclick="javascript:yesnoCheck1();" name="yesno1" id="yesCheck1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<select id="enemygroup" name="enemygroups" onChange="getIngroup(this.value);SelectedGroup(this);" required>
<option value disabled selected value="">Select Enemy Group</option>
<?php
foreach($results2 as $egroup) {
?>
<option value="<?php echo $egroup["actors_grou_id"]; ?>"><?php echo $egroup["actors_name"]; ?></option>
<?php
}
?>
</select>
<input type="text" name="groupname" id="groupname" style="display:none" >

<br><label><strong>Institution: </strong><br><strong></label><br><select class="form-control" name ="institution" id ="institution" onChange="getElements(this.value);SelectedInstitution(this);" required><option value=0>Select Institution</option>
<?php
foreach($resultsinst as $institutions) {
?>
<option value="<?php echo $institutions["institution_id"]; ?>"><?php echo $institutions["institution_name"]; ?></option>
<?php
}
?>
</select><input type="text" name="institutionname" id="institutionname" style="display:none" >
</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label><strong>Actor: </strong></label><select class="form-control" name="groupainctor" id ="ingroup-list" onChange="SelectedActorGroup(this);" required>
  <option value="volvo">Select Actor</option>
			  </select> <input type="text" name="groupactorname" id="groupactorname" style="display:none" >
<br>

<label><strong>Members </strong></label><select name="memebrs"id ="element-list" onChange="selectedElement(this)"  required>
  <option value="0">Select Elelement</option>
			  </select> <input type="text" name="elelementname" id="elelementname" style="display:none"  >
</td>
<td><label><strong>Actor Description: </strong></label><input type="text"  name="actoradescription" id = "actoradescription"><br>

<label><strong>Member Description: </strong></label><input type="text"  name="memeberdescription" id ="memeberdescription">

</td></tr>
</table>
<div class="input_fields_wrap">
                        <div style = "display: none" ><input type="file" name="attachment" value="Attach File" id="first_attach" >
						<a href="#" class="remove_field"  style="color:red;"><img src="/sintras/modul/compose/img/delattach.png" width="15" height="15"/><strong> Remove File 1</strong></a>
						</div>
  </div>

					<a class="add_field_button"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="/sintras/modul/compose/img/attACHMENT.png" width="15" height="15"/>Attach File(s)</strong></a>

				<br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" value="SAVE"/>

				</form>
           </div>
			</div>
		</div>


	</div>

		</fieldset>

	</section>




 <script>
            jQuery(document).ready(function() {
                jQuery("#submit").click(function(e) {
                    var sen_email = jQuery('.sen_email').val();
                    var rec_email = jQuery('.rec_email').val();
                    if (sen_email == "") {
                        alert('Sender\'s Email Address cannot be empty.');
                         e.preventDefault();
                    }
                    if (rec_email == "") {
                        alert('Receiver\'s Email Address cannot be empty.');
                         e.preventDefault();
                    }
                   /* var attach = jQuery('#first_attach').val();
                    if (attach == "") {
                        alert('Atleast one attachment is required!!!');
                        e.preventDefault();
                    }*/

                });
                // Code for creating more attachment file
                // Maximum attachment allowed
                var max_fields = 11;
                //Fields wrapper
                var wrapper = $(".input_fields_wrap");
                // Add button ID
                var add_button = $(".add_field_button");
                // Initlal attachment field count
                var x = 1;

                // Add attachment field on per click
                $(add_button).click(function(e) {
                    e.preventDefault();
                    // Max attachment allowed
                    if (x < max_fields) {
                        // Attachment increment
                        x++;
						y = x-1;
                        $(wrapper).append('<div style = " margin-left:85px"><input type="file" name="attachment' + x + '"/><a href="#" class="remove_field"  style="color:red;"><img src="/sintras/modul/compose/img/delattach.png.png" width="15" height="15"/><strong> Remove File'+y+'</strong></a></div>'); //add attachment
                        if (x == max_fields) {
                            // Hide add more attachment link
                            $(".add_field_button").hide();
                        }

                    }

                });
                // Remove attachment on per click
                $(wrapper).on("click", ".remove_field", function(e) { //user click on to remove attachment
                    e.preventDefault();
                    $(this).parent('div').remove();
                    x--;

                    if (x < max_fields) {
                        // Show add more attachment link when field < max_fields
                        $(".add_field_button").show();
                    }
                })
            });
        </script>

<script>
$("#toggle").on("click", function(){
  $("#send_to").toggle();                 // .fadeToggle() // .slideToggle()
});
$("#toggle2").on("click", function(){
  $("#bcc").toggle();                 // .fadeToggle() // .slideToggle()
});

</script>





<script>
var el = document.getElementById('myCoolForm');

el.addEventListener('submit', function(){
    return confirm('Are you sure you want to save report?');
}, false);

</script>
 </section><!-- /.content -->
 <style>
input#bigbutton {
width:150px;
background: #3e9cbf; /*the colour of the button*/
padding: 8px 14px 10px; /*apply some padding inside the button*/
border:1px solid #3e9cbf; /*required or the default border for the browser will appear*/
cursor:pointer; /*forces the cursor to change to a hand when the button is hovered*/
/*style the text*/
font-size:1.5em;
font-family:Oswald, sans-serif; /*Oswald is available from http://www.google.com/webfonts/specimen/Oswald*/
letter-spacing:.1em;
text-shadow: 0 -1px 0px rgba(0, 0, 0, 0.3); /*give the text a shadow - doesn't appear in Opera 12.02 or earlier*/
color: #fff;
/*use box-shadow to give the button some depth - see cssdemos.tupence.co.uk/box-shadow.htm#demo7 for more info on this technique*/
-webkit-box-shadow: inset 0px 1px 0px #3e9cbf, 0px 5px 0px 0px #205c73, 0px 10px 5px #999;
-moz-box-shadow: inset 0px 1px 0px #3e9cbf, 0px 5px 0px 0px #205c73, 0px 10px 5px #999;
box-shadow: inset 0px 1px 0px #3e9cbf, 0px 5px 0px 0px #205c73, 0px 10px 5px #999;
/*give the corners a small curve*/
-moz-border-radius: 10px;
-webkit-border-radius: 10px;
border-radius: 10px;
}
/***SET THE BUTTON'S HOVER AND FOCUS STATES***/
input#bigbutton:hover, input#bigbutton:focus {
color:#dfe7ea;
/*reduce the size of the shadow to give a pushed effect*/
-webkit-box-shadow: inset 0px 1px 0px #3e9cbf, 0px 2px 0px 0px #205c73, 0px 2px 5px #999;
-moz-box-shadow: inset 0px 1px 0px #3e9cbf, 0px 2px 0px 0px #205c73, 0px 2px 5px #999;
box-shadow: inset 0px 1px 0px #3e9cbf, 0px 2px 0px 0px #205c73, 0px 2px 5px #999;
}

	</style>
