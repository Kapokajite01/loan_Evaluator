<head> 	   <meta http-equiv="Content-Type" content="text/html; charset=windows-1252">	  
           <title>Reporting  Form</title>
           <script src="jquery.min.js"></script>
		  
		   <meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
           <?php require_once 'php_action/core.php'; ?>	 
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
body{width:60%;font-family:calibri;margin:0 auto;}
.frmDronpDown {border: 1px solid #7ddaff;background-color:#C8EEFD;margin: 2px 0px;padding:5px;border-radius:4px;}
.row{padding-bottom:15px;}
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
		$("#disrict").html(data);
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
                document.getElementById("txtContent10").value = selectedValue;
                document.getElementById("txtContent11").value = "";
                document.getElementById("txtContent1").value = "";
				document.getElementById("txtContent2").value = "";
                document.getElementById("txtContent12").value = "";
				document.getElementById("txtContent3").value = "";
                document.getElementById("txtContent13").value = "";
            }
            else {
                document.getElementById("txtContent").value = "";
                document.getElementById("txtContent10").value = "";
            }
        }
    </script>

    <script type="text/javascript">
        function SelectedCredibility(ele) {
            if (ele.selectedIndex > 0) {
                var selectedText = ele.options[ele.selectedIndex].innerHTML;
                var selectedValue = ele.value;
                document.getElementById("credibility_name").value = selectedText;
                document.getElementById("credibility1").value = selectedValue;
            }
            else {
                document.getElementById("credibility_name").value = "";
                document.getElementById("credibility1").value = "";
            }
        }
    </script>
   <script type="text/javascript">
        function SelectedClassification(ele) {
            if (ele.selectedIndex > 0) {
                var selectedText = ele.options[ele.selectedIndex].innerHTML;
                var selectedValue = ele.value;
                document.getElementById("classification_name").value = selectedText;
                document.getElementById("classification1").value = selectedValue;
            }
            else {
                document.getElementById("classification_name").value = "";
                document.getElementById("classification1").value = "";
            }
        }
    </script>
 <script type="text/javascript">
        function SelectedReliability(ele) {
            if (ele.selectedIndex > 0) {
                var selectedText = ele.options[ele.selectedIndex].innerHTML;
                var selectedValue = ele.value;
                document.getElementById("reliability_name").value = selectedText;
                document.getElementById("reliability1").value = selectedValue;
            }
            else {
                document.getElementById("reliability_name").value = "";
                document.getElementById("reliability1").value = "";
            }
        }
    </script>
<script type="text/javascript">
        function SelectedSource(ele) {
            if (ele.selectedIndex > 0) {
                var selectedText = ele.options[ele.selectedIndex].innerHTML;
                var selectedValue = ele.value;
                document.getElementById("source_name").value = selectedText;
                document.getElementById("source1").value = selectedValue;
            }
            else {
                document.getElementById("source_name").value = "";
                document.getElementById("source1").value = "";
            }
        }
    </script>
 <script type="text/javascript">
        function SelectedTextValue1(ele) {
            if (ele.selectedIndex > 0) {
                var selectedText1 = ele.options[ele.selectedIndex].innerHTML;
                var selectedValue1 = ele.value;
                document.getElementById("txtContent1").value = selectedText1;
                document.getElementById("txtContent11").value = selectedValue1;
				document.getElementById("txtContent2").value = "";
                document.getElementById("txtContent12").value = "";
				document.getElementById("txtContent3").value = "";
                document.getElementById("txtContent13").value = "";
				
            }
            else {
                document.getElementById("txtContent1").value = "";
                document.getElementById("txtContent11").value = "";
            }
        }
    </script>
	<script type="text/javascript">
        function SelectedKeyword(ele) {
            if (ele.selectedIndex > 0) {
                var selectedText1 = ele.options[ele.selectedIndex].innerHTML;
                var selectedValue1 = ele.value;
                document.getElementById("keywordname").value = selectedText1;
                document.getElementById("keyword1").value = selectedValue1;
            }
            else {
                document.getElementById("keywordname").value = "";
                document.getElementById("keyword1").value = "";
            }
        }
    </script>
	<script type="text/javascript">
        function SelectedIncident(ele) {
            if (ele.selectedIndex > 0) {
                var selectedText1 = ele.options[ele.selectedIndex].innerHTML;
                var selectedValue1 = ele.value;
                document.getElementById("incidentname").value = selectedText1;
                document.getElementById("incident1").value = selectedValue1;
               document.getElementById("keywordname").value = "";
                document.getElementById("keyword1").value = "";
 
            }
            else {
                document.getElementById("incidentname").value = "";
                document.getElementById("incident1").value = "";
            }
        }
    </script>
<script type="text/javascript">
        function SelectedGroup(ele) {
            if (ele.selectedIndex > 0) {
                var selectedText1 = ele.options[ele.selectedIndex].innerHTML;
                var selectedValue1 = ele.value;
                document.getElementById("groupname").value = selectedText1;
                document.getElementById("enemygroups1").value = selectedValue1;
           document.getElementById("groupactorname").value = "";
                document.getElementById("groupainctor1").value = "";
            }
            else {
                document.getElementById("groupname").value = "";
                document.getElementById("enemygroups1").value = selectedValue1;

            }
        }
    </script>	
<script type="text/javascript">
        function SelectedActorGroup(ele) {
            if (ele.selectedIndex > 0) {
                var selectedText1 = ele.options[ele.selectedIndex].innerHTML;
                var selectedValue1 = ele.value;
                document.getElementById("groupactorname").value = selectedText1;
                document.getElementById("groupainctor1").value = selectedValue1;

            }
            else {
                document.getElementById("groupactorname").value = "";
                document.getElementById("groupainctor1").value = "";

				}
        }
    </script>	

<script type="text/javascript">
        function SelectedInstitution(ele) {
            if (ele.selectedIndex > 0) {
                var selectedText1 = ele.options[ele.selectedIndex].innerHTML;
                var selectedValue1 = ele.value;
                document.getElementById("institutionname").value = selectedText1;
                document.getElementById("institution1").value = selectedValue1;
				document.getElementById("elelementname").value = "";
                document.getElementById("memebrs1").value = "";
            }
            else {
                document.getElementById("institutionname").value = "";
                document.getElementById("institution1").value = "";

            }
        }
    </script>	


<script type="text/javascript">
        function selectedElement(ele) {
            if (ele.selectedIndex > 0) {
                var selectedText1 = ele.options[ele.selectedIndex].innerHTML;
                var selectedValue1 = ele.value;
                document.getElementById("elelementname").value = selectedText1;
                document.getElementById("memebrs1").value = selectedValue1;
            }
            else {
                document.getElementById("elelementname").value = "";
                document.getElementById("memebrs1").value = "";
            }
        }
    </script>		
<script type="text/javascript">
        function SelectedTextValue2(ele) {
            if (ele.selectedIndex > 0) {
                var selectedText2 = ele.options[ele.selectedIndex].innerHTML;
                var selectedValue2= ele.value;
                document.getElementById("txtContent2").value = selectedText2;
                document.getElementById("txtContent12").value = selectedValue2;
            }
            else {
                document.getElementById("txtContent2").value = "";
                document.getElementById("txtContent12").value = "";
            }
        }
    </script>
<script type="text/javascript">
        function SelectedTextValue3(ele) {
            if (ele.selectedIndex > 0) {
                var selectedText3 = ele.options[ele.selectedIndex].innerHTML;
                var selectedValue3= ele.value;
                document.getElementById("txtContent3").value = selectedText3;
                document.getElementById("txtContent13").value = selectedValue3;
            }
            else {
                document.getElementById("txtContent3").value = "";
                document.getElementById("txtContent13").value = "";
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
        document.getElementById('classification').style.display="block";
    }
    else document.getElementById('classification').style.display="none";

}

function yesnoCheckcr() {
    if (document.getElementById('yesCheckcr').checked) {
        document.getElementById('credibility').style.display="block";
    }
    else document.getElementById('credibility').style.display="none";

}
function yesnoChecklb() {
    if (document.getElementById('yesChecklb').checked) {
        document.getElementById('reliability').style.display="block";
    }
    else document.getElementById('reliability').style.display="none";

}
function yesnoChecksc() {
    if (document.getElementById('yesChecksc').checked) {
        document.getElementById('source').style.display="block";
    }
    else document.getElementById('source').style.display="none";

}
function yesnoCheckpr() {
    if (document.getElementById('yesCheckpr').checked) {
        document.getElementById('province-list').style.display="block";
        document.getElementById('disrict').style.display="block";
        document.getElementById('sector-list').style.display="block";
        document.getElementById('cell_list').style.display="block";
    }
    else {
		document.getElementById('province-list').style.display="none";
        document.getElementById('disrict').style.display="none";
        document.getElementById('sector-list').style.display="none";
        document.getElementById('cell_list').style.display="none";
	}
}
function yesnoCheckins() {
    if (document.getElementById('yesCheckins').checked) {
        document.getElementById('incident').style.display="block";
        document.getElementById('keyword-list').style.display="block";
    }
    else{document.getElementById('incident').style.display="none";
     document.getElementById('keyword-list').style.display="none";
}

}
function yesnoCheckag() {
    if (document.getElementById('yesCheckag').checked) {
        document.getElementById('enemygroups').style.display="block";
        document.getElementById('ingroup-list').style.display="block";
    }
    else{
		
	 document.getElementById('enemygroups').style.display="none";
	 document.getElementById('ingroup-list').style.display="none";
}

}
function yesnoChecstut() {
    if (document.getElementById('yesCheckstut').checked) {
        document.getElementById('institution').style.display="block";
        document.getElementById('element-list').style.display="block";
    }
    else{
		
	 document.getElementById('institution').style.display="none";
	 document.getElementById('element-list').style.display="none";
}

}
</script>
 
        
       

</head>
<body  onload="startTime()">
<div style="background-color:DarkGray ;height: 930px;width:100%;margin:0 auto;" >
<?php
$id_number= $_GET['id_number'];
    $conn = mysqli_connect("localhost", "root", "fidele", "mudb_ims_db");
    
$query = "SELECT * FROM reports WHERE report_id ='$id_number'";

	$sql = mysqli_query($conn, $query);
	while($row = mysqli_fetch_array($sql))
		{
		$subject = $row['subject'];	
		$classification = $row['classification'];
		$classification_name = $row['classification_name'];
		$credibility= $row['credibility'];
		$credibility_name = $row['credidbility_name'];
		$reliability =$row['reliabaility'];
		$reliability_name = $row['reliability_name'];
		$source = $row['source'];
		$source_name = $row['source_name'];
		$provinceid = $row['province'];
		$province_name = $row['povince_name'];
		$districtid = $row['district'];
		$disrict_name = $row['district_name'];
		$sectorid = $row['sector'];
		$sector_name = $row['sector_name'];
		$cellid = $row['cell'];
		$cell_name = $row['cell_name'];
		$geodescription = $row['geodescription'];
		$date_incident= $row['dateincident'];
		$incidentid = $row['incident'];
		$incident_name = $row['incident_name'];
		$keyword_name = $row['keyword_name'];
		$keywordid = $row['keyword'];
		$subkeyword = $row['subkeword'];
		$report_body = $row['message'];
		$actor_groupid = $row['actorgroup'];
		$actor_groupname = $row['actorgoup_name'];
		$actor_id = $row['actor'];
		$actor_name = $row['actor_name'];
		$actor_description = $row['actor_desrciption'];
		$insitution_id = $row['Institution'];
		$insitution_name = $row['institution_name'];
		$member_id = $row['memebers'];
		$member_name = $row['member_name'];
		$memeber_description = $row['memberdescription'];
		}
?>
<form class="form-horizontal" role="form" method="post"  enctype="multipart/form-data"id="myCoolForm">
<fieldset><legend><strong><font color="white">Metadata</font></strong></legend>
<div class="frmDronpDown">
<strong>Subject: </strong></label><input type="text"  name="subject" value="<?php echo $subject;?>" style="width:30%;" required autocomplete="off"><br>
<table align="center">
<tr><td> 
			   <br>
			  <input type="text" name ="classification1" id ="classification1" value="<?php echo $classification?>"style="display:none"><label><strong>Classification:</strong></label><input type="checkbox" onclick="javascript:yesnoCheck();" name="yesno" id="yesCheck"><br> <select name="classification" id="classification" onChange="SelectedClassification(this)" style="display:none" ><option value=""></option>
                <option value="1">Restricted</option>
                <option value="2">Confidential</option>
			   <option value="3">Secret</option>
                <option value="4">Top Secret</option>
				
	           </select><input type="text" name="classification_name" id="classification_name" value="<?php echo $classification_name;?>" readonly required><br>


<label><strong>Credibility: </strong></label><input type="checkbox" onclick="javascript:yesnoCheckcr();" name="yesno" id="yesCheckcr"><br><select id="credibility"  name="credibility" style="display:none" onChange="SelectedCredibility(this);"><option value=""></option>
                 <option value="1">Confirmed</option>   
			   <option value="2">Probably true</option>
                <option value="3">Possibly true</option>
                <option value="4">Doubtfull</option>
                <option value="5">Unlikely</option>
                <option value="6">Accuracy cannot be determined</option>

	           </select><input type="text" name="credibility1" id="credibility1" style="display:none" value="<?php echo $credibility;?>" readonly required><input type="text" name="credibility_name" id="credibility_name" value="<?php echo $credibility_name;?>" readonly required>


</td><td><br><br><br><br>

<label><strong>Reliability: </strong></label><input type="checkbox" onclick="javascript:yesnoChecklb();" name="yesno" id="yesChecklb"><br><select name="reliability" id="reliability" style="display:none"  onChange="SelectedReliability(this);"><option value=""></option>
                 <option value="1">Completely reliable</option>   
			   <option value="2">Usually Relaible</option>
                <option value="3">Fairy relaible</option>
                <option value="4">Usually unrelaible</option>
                <option value="5">Unrelaible</option>
                <option value="6">Reliability cannot be determined</option>

	           </select><input type="text" name="reliability1" id="reliability1" style="display:none" value="<?php echo $reliability;?>" readonly required><input type="text" name="reliability_name" id="reliability_name"  value="<?php echo $reliability_name;?>" readonly required>
</td>
<td><br><br><br><br>

<label><strong>Source: </strong></label><input type="checkbox" onclick="javascript:yesnoChecksc();" name="yesno" id="yesChecksc"><br><select name="source" id="source" onChange="SelectedSource(this);"style="display:none"><option value=""></option>
                 <option value="1">Human Intelligence (HUMINT)</option>   
			   <option value="2"> Signals Intelligence (SIGINT)</option>
                <option value="3">Open Source Intelligence (OSINT)</option>
                <option value="4">Measurement and Signatures Intelligence (MASINT)</option>
	           </select><input type="text" name="source1" id="source1" value="<?php echo $source;?>" style="display:none" readonly required><input name="source_name" id="source_name" value = "<?php echo $source_name;?>" readonly required>

</td></tr>
</table>
</fieldset>

 <fieldset><legend><strong><font color="white">Where</font></strong></legend>
<div class="frmDronpDown">
<div class="row">
<table align="center"><tr><td><label><strong>Province</strong></label><input type="checkbox" onclick="javascript:yesnoCheckpr();" name="yesno" id="yesCheckpr"></td><td><label><strong>Disrict</strong></label></td><td><label><strong>Sector</strong></label></td><td><label><strong>Cell</strong></label></td></tr>
<tr><td><select name="province" id="province-list" onChange="getDistrict(this.value);SelectedTextValue(this);" style="display:none">
<option value disabled selected value="">Select Province</option>
<?php
foreach($results as $province) {
?>
<option value="<?php echo $province["Province_id"]; ?>"><?php echo $province["province_name"]; ?></option>
<?php
}
?>
</select><input name="province" type="text" id="txtContent10" style="display:none" value="<?php echo $provinceid;?>" style="display:none"  required readonly/>
        <input name="provinceName" type="text" id="txtContent" value="<?php echo $province_name;?>" required readonly/>

</td><td>

<select name="district" id="disrict" onChange="getSector(this.value);SelectedTextValue1(this);" style="display:none" > 
<option value="">Select Disrict</option>
</select><input name="district" type="text" id="txtContent11" value="<?php echo $districtid;?>" style="display:none"  required readonly/>
        <input name="districtName" type="text" id="txtContent1" value="<?php echo $disrict_name;?>" readonly required />

</td><td>
<select name="sector" id="sector-list"  onChange="getCell(this.value);SelectedTextValue2(this);" style="display:none" >
<option value="">Select Sector</option>
</select><input name="sector" type="text" id="txtContent12" value="<?php echo $sectorid ;?>" style="display:none"  required readonly/>
        <input name="sectorName" type="text" id="txtContent2" value="<?php echo $sector_name;?>" readonly required />

</td><td>

<select name="cell" id="cell_list" onChange="SelectedTextValue3(this);"  style="display:none" >
<option value="">Select Cell</option>
</select>  <input name="cell" type="text" id="txtContent13" value="<?php echo $cellid ;?>" style="display:none"  required readonly/><input name="cellName" type="text" id="txtContent3" value="<?php echo $cell_name;?>" readonly  required />
</td></tr>
</table>
<table align="center">
<tr><td><label><strong>Geo-Description</strong></label></td><td><textarea name="gedodescription" rows="1" cols="80" style="width:60%" required><?php echo $geodescription ;?></textarea></td></tr>
</table>
</fieldset>

<fieldset><legend><strong><font color="white">When</font></strong></legend>
<div class="frmDronpDown">
<table align="center">
<tr><td><label><strong>Date of Incident: </strong></label><input type="text" name="dateincident" id="datesearch" placeholder="Date of Incident" value="<?php echo $date_incident;?>" required aria-required='true' aria-describedby='name-format'></td><td><label><strong>Time of Entry : <?php echo date("Y-m-d");?>&nbsp;&nbsp;&nbsp;<span id="txt"></span></label></strong></td></tr>
</table>
</div>
</fieldset>


<fieldset><legend><strong><font color="white">What</font></strong></legend>
<div class="frmDronpDown">
<table align="center">
<tr><td><label><strong>Incident: </strong></label><input type="checkbox" onclick="javascript:yesnoCheckins();" name="yesno" id="yesCheckins"><br><select name="incident" id ="incident" onChange="CheckColors(this.value);SelectedIncident(this);getKeyword(this.value);"style="display:none">
<option value disabled selected value="">Select Incident</option>
<?php
foreach($results1 as $indident) {
?>
<option value="<?php echo $indident["incident_id"]; ?>"><?php echo $indident["incident_name"]; ?></option>
<?php
}
?>
<option value="OTHERSINCIDENT">Other</option>

<br> 
</select><input type="text" name="incident1" id="incident1"  value="<?php echo $incidentid;?>" style="display:none" readonly required><input type="text" name="incidentname" id="incidentname"  value="<?php echo $incident_name;?>" readonly required><br><input type="text" name="otherincident" id="otherincident" placeholder = "Other Incident" style='display:none;width:100%;' disabled  required/></td><td><label><strong>Keyword :<label><br><br><select class="form-control"id="keyword-list"  name="keyword" onChange="SelectedKeyword(this);" style="display:none" >
<option value="">Select Keyword</option>
</select> <input type="text" name="keyword1" id="keyword1"  value="<?php echo $keywordid;?>" style="display:none" readonly required><input type="text" name="keywordname" id="keywordname"  value="<?php echo $keyword_name;?>" readonly   required/><!--<select name="keyword"  id ="keyword" onChange="CheckColors1(this.value);"required aria-required="true" aria-describedby="name-format"><option value=""></option>
                 <option value="Military">Military</option>   
			   <option value="Security Situation">Security Situation</option>
                <option value="Road Bandits">Road Bandits</option>
                <option value="Education">Education</option>
                <option value="Mouvment">Mouvment</option>
                <option value="Abduction">Abduction</option>
<option value="OTHERKEYWORDS">Other keword</option>
	           </select>
<br><input type="text" name="otherkeyword" id="otherkeyword" placeholder = "Other Keyword" style='display:none;width:100%;' disabled  required/>--></td>
<td><br><label><strong>Sub-Keyword :<label><input type="text"  name="subkeyword"  value="<?php echo $subkeyword;?>"required><!--<select name="subkeyword" id="subkeyword"  onChange="CheckColors2(this.value);" required aria-required="true" aria-describedby="name-format"><option value=""></option>
                 <option value="Deployment">Deployment</option>   
			   <option value="Security Situation">Attempt</option>
                <option value="Killings">Killings</option>
                <option value="Imminent attacks">Imminent attacks</option>
                <option value="Weapons smuggling">Weapons smuggling</option>
<option value="OTHERSUBKEYWORDS">Other Sub-keword</option>

	           </select><br><input type="text" name="othersubkeyword" id="othersubkeyword" placeholder = "Other Keyword" style='display:none;width:100%;' disabled  required/>--></td></tr>
</table>
<table align="center">
<tr><td><label><strong>Report Body</strong></label></td><td><textarea name="message" rows="5" cols="130" required style="width:90%"><?php echo $report_body;?></textarea></td></tr>
</table>
</div>
</fieldset>

<fieldset><legend><strong><font color="white">Who</font></strong></legend>
<div class="frmDronpDown">
<table align="center">
<tr><td><label><strong>Actor Group: </strong></label><input type="checkbox" onclick="javascript:yesnoCheckag();" name="yesno" id="yesCheckag"><br><select  name="enemygroups" id="enemygroups" style="display:none" onChange="getIngroup(this.value);SelectedGroup(this);">
<option value disabled selected value="">Select Enemy Group</option>
<?php
foreach($results2 as $egroup) {
?>
<option value="<?php echo $egroup["actors_grou_id"]; ?>"><?php echo $egroup["actors_name"]; ?></option>
<?php
}
?>
</select><input type="text" name="enemygroups1" id="enemygroups1"  value="<?php echo $actor_groupid;?>"  style="display:none" readonly required><br>
<input type="text" name="groupname" id="groupname"  value="<?php echo $actor_groupname;?>"  readonly required>

</td><td><label><strong>Actor: </strong></label><br><select class="form-control" name="groupainctor" id ="ingroup-list" style="display:none"  onChange="SelectedActorGroup(this);">
  <option value="">Select Actor</option>
			  </select><input type="text" name="groupainctor1" id="groupainctor1"   value="<?php echo $actor_id;?>"  style="display:none" readonly required> <input type="text" name="groupactorname" id="groupactorname"   value="<?php echo $actor_name;?>" readonly required>
</td>
<td><label><strong>Actor Description: </strong></label><br><input type="text"   value="<?php echo $actor_description;?>" name="actoradescription">

</td></tr>

<tr><td>
<label><strong>Institution: </strong></label><input type="checkbox" onclick="javascript:yesnoChecstut();" name="yesno" id="yesCheckstut"><br><select class="form-control" name ="institution" id ="institution" style="display:none"  onChange="getElements(this.value);SelectedInstitution(this);"><option value=0>Select Institution</option>
<?php
foreach($resultsinst as $institutions) {
?>
<option value="<?php echo $institutions["institution_id"]; ?>"><?php echo $institutions["institution_name"]; ?></option>
<?php
}
?>
</select><input type="text" name="institution1" id="institution1" value="<?php echo $insitution_id;?>" style="display:none" readonly  required> <input type="text" name="institutionname" id="institutionname" value="<?php echo $insitution_name;?>" readonly  required>
</td><td><label><strong>Members </strong></label><select name="memebrs"id ="element-list" onChange="selectedElement(this)" style="display:none">
  <option value="0">Select Elelement</option>
			  </select><input type="text" name="memebrs1" id="memebrs1" value="<?php echo $member_id;?>" style="display:none"  readonly  required> <br><input type="text" name="elelementname" id="elelementname" value="<?php echo $member_name;?>"  readonly  required> 
</td><td><label><strong>Member Description: </strong></label><br><input type="text"  name="memeberdescription" value="<?php echo $memeber_description;?>" >

</td></tr>
</table>
<div class="input_fields_wrap">
<div style = "display: none" ><input type="file" name="attachment" value="Attach File" id="first_attach" >
<a href="#" class="remove_field"  style="color:red;"><img src="/sintras/modul/compose/img/delattach.png" width="15" height="15"/><strong> Remove File 1</strong></a>
</div>
</div>

<a class="add_field_button"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="/sintras/modul/compose/img/attACHMENT.png" width="15" height="15"/>Attach File(s)</strong></a><br>
	<?php				
  $connect = mysql_connect("localhost","root","fidele"); 
mysql_select_db("mudb_ims_db",$connect);
  $att = $_GET['id_number'];
 $attachments = mysql_query( "SELECT reports.report_id,myfiles.report_id,myfiles.file_name from reports INNER JOIN myfiles ON reports.report_id=myfiles.report_id WHERE myfiles.report_id = $att");
 $num_rows = mysql_num_rows($attachments);?>
					<strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="/sintras/modul/compose/img/attACHMENT.png" width="15" height="15"/>Attachment(s)&nbsp;&nbsp;[<?php if($num_rows > 0) echo $num_rows; else{ echo 'None';}?>]</strong>
<table>
	 <?php
	 
$num =0;
        // loop through results of database query, displaying them in the table
        while($row = mysql_fetch_array( $attachments )) {
                $num++;
                // echo out the contents of each row into a table
              $filename = $row['file_name'];
                ?><tr><td><img src="/sintras/modul/compose/img/attACHMENT.png" width="15" height="15"/></td>
				<td><a href="files/<?=$filename ;?>" target="_blanck"><?=$filename ;?></a></td>
			<?php
		 } 
		 echo '</tr></table>';
        // close table>
        
?> 


				<br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" onClick="return confirm('Are you sure you want to Update report?')" name="update" value="UPDATE" id="bigbutton"/>
	
				</form>
               <?php 
               if(isset($_POST['update']))
               {
                error_reporting(1);
                $con=mysql_pconnect('localhost','root','fidele')or die("cannot connect to server");
                mysql_select_db('mudb_ims_db')or die("cannot connect to database");
                $id = $_SESSION['userId'];
                $user_query=mysql_query("select *  from users where user_id='$id'")or die(mysql_error());
                $rowclo=mysql_fetch_array($user_query); 
                $directorate = $rowclo['directorate'];
                error_reporting(0);
                $con=mysql_pconnect('localhost','root','fidele')or die("cannot connect to server");
                mysql_select_db('mudb_ims_db')or die("cannot connect to database");
                // Include PHPMailerAutoload.php library file
                include ("lib/PHPMailerAutoload.php");
                $repoid=$_GET['id_number'];
                $random =rand();
                $province = $_POST['province'];
                $district = $_POST['district'];
                $sector = $_POST['sector'];
                $cell = $_POST['cell'];
                $latitude = $_POST['latitude'];
                $longitude = $_POST['longitude'];
                $gedodescription = $_POST['gedodescription'];
                $dateincident = $_POST['dateincident'];
                $dateentry = $_POST['dateentry'];
                $incident = $_POST['incident1'];
                $incident_name = $_POST['incidentname'];
                if($incident =='OTHERSINCIDENT'){
                $incident_name = $_POST['otherincident'];
                $otherincident_name = $_POST['otherincident'];
                $insertincident=mysql_query("INSERT INTO incidents(incident_name)
                VALUES('$otherincident_name')");
                    
                    $rowlastincident = mysql_query( "SELECT MAX(incident_id) AS maxincident FROM `incidents`;" );
                $rowincid = mysql_fetch_array( $rowlastincident );
                $incident = $rowincid['maxincident'];
                }
                $keyword = $_POST['keyword1'];
                $keywordname = $_POST['keywordname'];
                $subkeyword = $_POST['subkeyword'];
                $message = $_POST['message'];
                $actorgroupa = $_POST['enemygroups1'];
                $actorgroupname= $_POST['groupname'];
                $groupainctor =$_POST['groupainctor1'];
                $groupactorname =$_POST['groupactorname'];
                $institution = $_POST['institution1'];
                $institutionname= $_POST['institutionname'];
                $memebrs = $_POST['memebrs1'];
                $memebername = $_POST['elelementname'];
                $actoradescription = $_POST['actoradescription'];
                $memeberdescription = $_POST['memeberdescription'];
                $classification = $_POST['classification1'];
                $classification_name = $_POST['classification_name'];
                $credibility = $_POST['credibility1'];
                $credidbility_name = $_POST['credibility_name'];
                $reliability = $_POST['reliability1'];
                $reliabaility_name=$_POST['reliability_name'];
                $source = $_POST['source1'];
                $source_name= $_POST['source_name'];
                $subject = $_POST['subject'];
                $provincename= $_POST['provinceName'];
                $districtname = $_POST['districtName'];
                $sectorname = $_POST['sectorName'];
                $cellname = $_POST['cellName'];
                
                $reportid=mysql_query ("SELECT MAX(report_id) AS max from reports");
                            $row1 = mysql_fetch_array( $reportid );
                            $last_id=$row1['max'];
                            $last_id=$last_id+1;
                    
                $rowSQL = mysql_query( "SELECT MAX(attachment_level) AS max FROM `myfiles`;" );
                $row = mysql_fetch_array( $rowSQL );
                $largestlevel = $row['max'];
                $largestlevel = $largestlevel+1;
                    if (isset($_FILES) && (bool) $_FILES) {
                    $files = array();
                    $ext_error = "";
                
                
                
                                // Define allowed extensions
                    $natcment =0;
                    $allowedExtentsoins = array('pdf', 'doc', 'docx', 'gif', 'jpeg', 'jpg', 'png', 'rtf', 'txt','zip','xlsx','xls','ppt','pptx','csv');
                    foreach ($_FILES as $name => $file) {
                        if (!$file['name'] == "") {
                            $natcment = $natcment+1;
                            $file_name = $file['name'];
                            $file_name = $random.'_'.$file_name;
                            $file_name = preg_replace('/\s+/', '_', $file_name);
                            $file_name = str_replace('+','_', $file_name);
                            $temp_name = $file['tmp_name'];
                            $path_part = pathinfo($file_name);
                            $ext = $path_part['extension'];
                
                            // Checking for extension of attached files
                            if (!in_array($ext, $allowedExtentsoins)) {
                                echo "<script>alert('Sorry!!! ." . $ext ."Extension is not allowed!!! Try Again.')</script>";
                                $ext_error = FALSE;
                                }else{
                                $ext_error = True;
                            }
                 
                            // Store attached files in uploads folder
                            $server_file = dirname(__FILE__) . "/files/" . $path_part['basename'];
                            move_uploaded_file($temp_name, $server_file);
                            array_push($files, $server_file);
                
                
                        $sql1=mysql_query("INSERT INTO myfiles(file_id,report_id,file_name,attachment_level)
                VALUES('','$last_id','$file_name','$largestlevel')");
                    
                
                        }
                    }
                    
                }

                $backup=mysql_query("INSERT INTO report_archive(report_id,province,district,sector,cell,latitude,longitude,geodescription,dateincident,dateentry,incident,incident_name,keyword,keyword_name,subkeword,message,actorgroup,actorgoup_name,Institution,institution_name,actor,actor_name,memebers,member_name,actor_desrciption,memberdescription,classification,classification_name,credibility,credidbility_name,reliabaility,reliability_name,source,source_name,povince_name,district_name,sector_name,cell_name,subject,noattachments,directorate,neighbor_country,neighbor_province,neighbor_district) select report_id,province,district,sector,cell,latitude,longitude,geodescription,dateincident,dateentry,incident,incident_name,keyword,keyword_name,subkeword,message,actorgroup,actorgoup_name,Institution,institution_name,actor,actor_name,memebers,member_name,actor_desrciption,memberdescription,classification,classification_name,credibility,credidbility_name,reliabaility,reliability_name,source,source_name,povince_name,district_name,sector_name,cell_name,subject,noattachments,directorate,neighbor_country,neighbor_province,neighbor_district from reports where report_id='".$repoid."'") ;
                
                
                if($backup)
                {
                   
                    $up=mysql_query("UPDATE `mudb_ims_db`.`reports` SET `province` = '".$province."', `district` = '".$district."', `sector` = '".$sector."', `cell` = '".$cell."', `latitude` = '".$latitude."', `longitude` = '".$longitude."', `geodescription` = '".$gedodescription."', `dateincident` = '".$dateincident."', `dateentry` = Now(), `incident` = '".$incident."', `incident_name` = '".$incident_name."', `keyword` = '".$keyword."', `keyword_name` = '".$keywordname."', `subkeword` = '".$subkeyword."', `message` = '".$message."', `actorgroup` = '".$actorgroupa."', `actorgoup_name` = '".$actorgroupname."', `Institution` = '".$institution."', `institution_name` = '".$institutionname."', `actor` = '".$groupainctor."', `actor_name` = '".$groupactorname."', `memebers` = '".$memebrs."', `member_name` = '".$memebername."', `actor_desrciption` = '".$actoradescription."', `memberdescription` = '".$memeberdescription."', `classification` = '".$classification."', `classification_name` = '".$classification_name."', `credibility` = '".$credibility."', `credidbility_name` = '".$credidbility_name."', `reliabaility` = '".$reliability."', `reliability_name` = '".$reliabaility_name."', `source` = '".$source."', `source_name` = '".$source_name."', `povince_name` = '".$provincename."', `district_name` = '".$districtname."', `sector_name` = '".$sectorname."', `cell_name` = '".$cellname."', `subject` = '".$subject."', `noattachments` = '".$natcment."', `directorate` = '".$directorate."', `neighbor_country` = '".$neighbor_country."', `neighbor_province` = '".$neighbor_province."', `neighbor_district` = '".$neighbor_district."', `user_id` = '".$id."',`Status`='Edited' WHERE `reports`.`report_id` = '".$repoid."'");
                    
                    if($up )
                    {
                        
                        $up2=mysql_query("UPDATE `mudb_ims_db`.`report_archive` SET `Status`='Archive_Edited', `user_id` = '".$id."' WHERE `report_archive`.`report_id` = '".$repoid."'");
                        if($up2){
                    echo "<script>alert('Report Updated Successfully!!!')</script>";
                        echo "<script>window.location='who';</script>";
                        }else{
                            echo "<script>alert('Error!!!')</script>";
                        // echo "<script>window.location='who';</script>";
                        }
                    }
                    else{
                        echo "<script>alert('Report Not save Try again')</script>";
                        echo mysql_error();
                        // echo "<script>window.location='who';</script>";
                    }
                }
                else{
                    
                    echo "<script>alert('Report Not save Try again')</script>";
                        echo "<script>window.location='edit_report';</script>";
                    
                }
                
               }
               ?>
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

// el.addEventListener('submit', function(){
//     var conf=;
//     if (conf == true){
// return alert('Report updating...');
//     }
//     else{
//         window.location='edit_report';
//     }
// }, false);

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