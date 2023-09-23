<!DOCTYPE html>
<?php


include_once('connect_db1.php');

?>
<?php require_once 'includes/header.php'; ?>

 <?php
require_once("dbcontroller.php");
$db_handle = new DBController();
$query ="SELECT * FROM province";
$results = $db_handle->runQuery($query);

$query1 ="SELECT * FROM incidents order by incident_name";
$results1 = $db_handle->runQuery($query1);
?>
	<script language="JavaScript" type="text/javascript">
	function checkDelete(){
			return confirm('Are you sure you want to delete this report?');
	}
	</script>
<script type="text/javascript">
// Retreive values for province
function ajaxFunction222()
{

//document.writeln(val)
var httpxml;
try
  {
  // Firefox, Opera 8.0+, Safari
  httpxml=new XMLHttpRequest();
  }
catch (e)
  {
  // Internet Explorer
  try
    {
    httpxml=new ActiveXObject("Msxml2.XMLHTTP");
    }
  catch (e)
    {
    try
      {
      httpxml=new ActiveXObject("Microsoft.XMLHTTP");
      }
    catch (e)
      {
      alert("Your browser does not support AJAX!");
      return false;
      }
    }
  }

function stateChanged(){
    if(httpxml.readyState==4){

var myObject = JSON.parse(httpxml.responseText);  // Received the data 

var msg=myObject.value.message;
if(msg.length > 0){document.getElementById("msg").innerHTML=msg;}
else{document.getElementById("msg").style.display='none';}

var str="<table width='150%'  class='table table-striped table-bordered table-hover'><tr><th align='left' bgcolor='#FFE4E1'>No</th><th align='left' bgcolor='#FFE4E1'>District</th><th align='left' bgcolor='#FFE4E1'>Incident</th><th align='left' bgcolor='#FFE4E1'>Credibility</th><th align='left' bgcolor='#FFE4E1'>Reliability</th><th align='left' bgcolor='#FFE4E1'>Source</th><th align='left' bgcolor='#FFE4E1'>Subject</th><th align='left' bgcolor='#FFE4E1'>Classification</th><th align='left' bgcolor='#FFE4E1'>Date</th><th align='left' bgcolor='#FFE4E1'>Attachments</th><th align='left' bgcolor='#FFE4E1'>Status</th><th align='left' bgcolor='#FFE4E1'>Action</th></tr>";
var color="#f1f1f1";
for(i=0;i<myObject.data.length;i++)
{ 
	if((i%2)==0){color="#ffffff";}
if(myObject.data[i].Status =='Edited'){color="#00cec9";}
else{color="#f1f1f1";}

str = str + "<tr style='background-color:"+color+";'><td>" +(i+1)+ " </td><td>" + myObject.data[i].district_name + "<strong> " + myObject.data[i].neighbor_country + "</strong></td><td>" + myObject.data[i].incident_name + " </td><td>" + myObject.data[i].credidbility_name + " </td><td>" + myObject.data[i].reliability_name + " </td><td>" + myObject.data[i].source_name + " </td><td>" + myObject.data[i].subject + " </td><td>"+ myObject.data[i].classification_name + "</td><td>"+ myObject.data[i].dateincident + "</td><td><strong>[&nbsp;"+ myObject.data[i].noattachments + "&nbsp;]&nbsp;&nbsp;Attachment(s)</strong></td><td><strong>"+ myObject.data[i].Status + "</strong></td><td><a href='edit_report?id_number="+myObject.data[i].report_id+"'> View</a></td><td><a href='delete?id_number="+myObject.data[i].report_id+"' onclick='return checkDelete()'  style='color:red;'><img src='images/delete.png'>Delete</a></td></tr>"
}
str = str + "</table>" ;
document.getElementById("display").innerHTML=str;
    }
    }

var url="demo222.php";
var credibility=document.myForm.credibility.value;
url=url+"?credibility="+credibility;
url=url+"&kid="+Math.random();
//alert(url)
httpxml.onreadystatechange=stateChanged;
httpxml.open("GET",url,true);
httpxml.send(null);

document.getElementById("msg").style.background='#f1f1f1';
document.getElementById("msg").innerHTML="Please Wait ... ";
document.getElementById("msg").style.display='inline';
}

function ajaxFunction223()
{

//document.writeln(val)
var httpxml;
try
  {
  // Firefox, Opera 8.0+, Safari
  httpxml=new XMLHttpRequest();
  }
catch (e)
  {
  // Internet Explorer
  try
    {
    httpxml=new ActiveXObject("Msxml2.XMLHTTP");
    }
  catch (e)
    {
    try
      {
      httpxml=new ActiveXObject("Microsoft.XMLHTTP");
      }
    catch (e)
      {
      alert("Your browser does not support AJAX!");
      return false;
      }
    }
  }

function stateChanged(){
    if(httpxml.readyState==4){

var myObject = JSON.parse(httpxml.responseText);  // Received the data 

var msg=myObject.value.message;
if(msg.length > 0){document.getElementById("msg").innerHTML=msg;}
else{document.getElementById("msg").style.display='none';}

var str="<table width='150%'  class='table table-striped table-bordered table-hover'><tr><th align='left' bgcolor='#FFE4E1'>No</th><th align='left' bgcolor='#FFE4E1'>District</th><th align='left' bgcolor='#FFE4E1'>Incident</th><th align='left' bgcolor='#FFE4E1'>Credibility</th><th align='left' bgcolor='#FFE4E1'>Reliability</th><th align='left' bgcolor='#FFE4E1'>Source</th><th align='left' bgcolor='#FFE4E1'>Subject</th><th align='left' bgcolor='#FFE4E1'>Classification</th><th align='left' bgcolor='#FFE4E1'>Date</th><th align='left' bgcolor='#FFE4E1'>Attachments</th><th align='left' bgcolor='#FFE4E1'>Status</th><th align='left' bgcolor='#FFE4E1'>Action</th></tr>";
var color="#f1f1f1";
for(i=0;i<myObject.data.length;i++)
{ 
	if((i%2)==0){color="#ffffff";}
if(myObject.data[i].Status =='Edited'){color="#00cec9";}
else{color="#f1f1f1";}

str = str + "<tr style='background-color:"+color+";'><td>" +(i+1)+ " </td><td>" + myObject.data[i].district_name + "<strong> " + myObject.data[i].neighbor_country + "</strong></td><td>" + myObject.data[i].credidbility_name + " </td><td>" + myObject.data[i].reliability_name + " </td><td>" + myObject.data[i].source_name + " </td><td>" + myObject.data[i].subject + " </td><td>"+ myObject.data[i].classification_name + "</td><td>"+ myObject.data[i].dateincident + "</td><td><strong>[&nbsp;"+ myObject.data[i].noattachments + "&nbsp;]&nbsp;&nbsp;Attachment(s)</strong></td><td><strong>"+ myObject.data[i].Status + "</strong></td><td><a href='edit_report?id_number="+myObject.data[i].report_id+"'> View</a></td><td><a href='delete?id_number="+myObject.data[i].report_id+"' onclick='return checkDelete()'  style='color:red;'><img src='images/delete.png'>Delete</a></td></tr>"
}
str = str + "</table>" ;
document.getElementById("display").innerHTML=str;
    }
    }

var url="demo223.php";
var reliability=document.myForm.reliability.value;
url=url+"?reliability="+reliability;
url=url+"&kid="+Math.random();
//alert(url)
httpxml.onreadystatechange=stateChanged;
httpxml.open("GET",url,true);
httpxml.send(null);

document.getElementById("msg").style.background='#f1f1f1';
document.getElementById("msg").innerHTML="Please Wait ... ";
document.getElementById("msg").style.display='inline';
}


function ajaxFunction224()
{

//document.writeln(val)
var httpxml;
try
  {
  // Firefox, Opera 8.0+, Safari
  httpxml=new XMLHttpRequest();
  }
catch (e)
  {
  // Internet Explorer
  try
    {
    httpxml=new ActiveXObject("Msxml2.XMLHTTP");
    }
  catch (e)
    {
    try
      {
      httpxml=new ActiveXObject("Microsoft.XMLHTTP");
      }
    catch (e)
      {
      alert("Your browser does not support AJAX!");
      return false;
      }
    }
  }

function stateChanged(){
    if(httpxml.readyState==4){

var myObject = JSON.parse(httpxml.responseText);  // Received the data 

var msg=myObject.value.message;
if(msg.length > 0){document.getElementById("msg").innerHTML=msg;}
else{document.getElementById("msg").style.display='none';}

var str="<table width='150%'  class='table table-striped table-bordered table-hover'><tr><th align='left' bgcolor='#FFE4E1'>No</th><th align='left' bgcolor='#FFE4E1'>District</th><th align='left' bgcolor='#FFE4E1'>Incident</th><th align='left' bgcolor='#FFE4E1'>Credibility</th><th align='left' bgcolor='#FFE4E1'>Reliability</th><th align='left' bgcolor='#FFE4E1'>Source</th><th align='left' bgcolor='#FFE4E1'>Subject</th><th align='left' bgcolor='#FFE4E1'>Classification</th><th align='left' bgcolor='#FFE4E1'>Date</th><th align='left' bgcolor='#FFE4E1'>Attachments</th><th align='left' bgcolor='#FFE4E1'>Status</th><th align='left' bgcolor='#FFE4E1'>Action</th></tr>";
var color="#f1f1f1";
for(i=0;i<myObject.data.length;i++)
{ 
	if((i%2)==0){color="#ffffff";}
if(myObject.data[i].Status =='Edited'){color="#00cec9";}
else{color="#f1f1f1";}

str = str + "<tr style='background-color:"+color+";'><td>" +(i+1)+ " </td><td>" + myObject.data[i].district_name + "<strong> " + myObject.data[i].neighbor_country + "</strong></td><td>" + myObject.data[i].incident_name + " </td><td>" + myObject.data[i].credidbility_name + " </td><td>" + myObject.data[i].reliability_name + " </td><td>" + myObject.data[i].source_name + " </td><td>" + myObject.data[i].subject + " </td><td>"+ myObject.data[i].classification_name + "</td><td>"+ myObject.data[i].dateincident + "</td><td><strong>[&nbsp;"+ myObject.data[i].noattachments + "&nbsp;]&nbsp;&nbsp;Attachment(s)</strong></td><td><strong>"+ myObject.data[i].Status + "</strong></td><td><a href='edit_report?id_number="+myObject.data[i].report_id+"'> View</a></td><td><a href='delete?id_number="+myObject.data[i].report_id+"' onclick='return checkDelete()'  style='color:red;'><img src='images/delete.png'>Delete</a></td></tr>"
}
str = str + "</table>" ;
document.getElementById("display").innerHTML=str;
    }
    }

var url="demo224.php";
var saurce=document.myForm.saurce.value;
url=url+"?saurce="+saurce;
url=url+"&kid="+Math.random();
//alert(url)
httpxml.onreadystatechange=stateChanged;
httpxml.open("GET",url,true);
httpxml.send(null);

document.getElementById("msg").style.background='#f1f1f1';
document.getElementById("msg").innerHTML="Please Wait ... ";
document.getElementById("msg").style.display='inline';
}

function ajaxFunction225()
{

//document.writeln(val)
var httpxml;
try
  {
  // Firefox, Opera 8.0+, Safari
  httpxml=new XMLHttpRequest();
  }
catch (e)
  {
  // Internet Explorer
  try
    {
    httpxml=new ActiveXObject("Msxml2.XMLHTTP");
    }
  catch (e)
    {
    try
      {
      httpxml=new ActiveXObject("Microsoft.XMLHTTP");
      }
    catch (e)
      {
      alert("Your browser does not support AJAX!");
      return false;
      }
    }
  }

function stateChanged(){
    if(httpxml.readyState==4){

var myObject = JSON.parse(httpxml.responseText);  // Received the data 

var msg=myObject.value.message;
if(msg.length > 0){document.getElementById("msg").innerHTML=msg;}
else{document.getElementById("msg").style.display='none';}

var str="<table width='150%'  class='table table-striped table-bordered table-hover'><tr><th align='left' bgcolor='#FFE4E1'>No</th><th align='left' bgcolor='#FFE4E1'>District</th><th align='left' bgcolor='#FFE4E1'>Incident</th><th align='left' bgcolor='#FFE4E1'>Credibility</th><th align='left' bgcolor='#FFE4E1'>Reliability</th><th align='left' bgcolor='#FFE4E1'>Source</th><th align='left' bgcolor='#FFE4E1'>Subject</th><th align='left' bgcolor='#FFE4E1'>Classification</th><th align='left' bgcolor='#FFE4E1'>Date</th><th align='left' bgcolor='#FFE4E1'>Attachments</th><th align='left' bgcolor='#FFE4E1'>Status</th><th align='left' bgcolor='#FFE4E1'>Action</th></tr>";
var color="#f1f1f1";
for(i=0;i<myObject.data.length;i++)
{ 
if((i%2)==0){color="#ffffff";}
if(myObject.data[i].Status =='Edited'){color="#00cec9";}
else{color="#f1f1f1";}

str = str + "<tr style='background-color:"+color+";'><td>" +(i+1)+ " </td><td>" + myObject.data[i].district_name + "<strong> " + myObject.data[i].neighbor_country + "</strong></td><td>" + myObject.data[i].incident_name + " </td><td>" + myObject.data[i].credidbility_name + " </td><td>" + myObject.data[i].reliability_name + " </td><td>" + myObject.data[i].source_name + " </td><td>" + myObject.data[i].subject + " </td><td>"+ myObject.data[i].classification_name + "</td><td>"+ myObject.data[i].dateincident + "</td><td><strong>[&nbsp;"+ myObject.data[i].noattachments + "&nbsp;]&nbsp;&nbsp;Attachment(s)</strong></td><td><strong>"+ myObject.data[i].Status + "</strong></td><td><a href='edit_report?id_number="+myObject.data[i].report_id+"'> View</a></td><td><a href='delete?id_number="+myObject.data[i].report_id+"' onclick='return checkDelete()'  style='color:red;'><img src='images/delete.png'>Delete</a></td></tr>"
}
str = str + "</table>" ;
document.getElementById("display").innerHTML=str;
    }
    }

var url="demo225.php";
var classification=document.myForm.classification.value;
url=url+"?classification="+classification;
url=url+"&kid="+Math.random();
//alert(url)
httpxml.onreadystatechange=stateChanged;
httpxml.open("GET",url,true);
httpxml.send(null);

document.getElementById("msg").style.background='#f1f1f1';
document.getElementById("msg").innerHTML="Please Wait ... ";
document.getElementById("msg").style.display='inline';
}
function getKeyword(val) {
	$.ajax({
	type: "POST",
	url: "getKeyword.php",
	data:'keyword_id='+val,
	success: function(data){
		$("#keyword-list").html(data);
				getCell();

	}
	});
}
</script>

		   <meta http-equiv="Content-Type" content="text/html; charset=windows-1252">	  


<!-- fullCalendar 2.2.5-->
    <link rel="stylesheet" href="assests/plugins/fullcalendar/fullcalendar.min.css">
    <link rel="stylesheet" href="assests/plugins/fullcalendar/fullcalendar.print.css" media="print">


<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />

		<meta name="description" content="Mailbox with some customizations as described in docs" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="newassets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="newassets/font-awesome/4.5.0/css/font-awesome.min.css" />

		<!-- page specific plugin styles -->

		<!-- text fonts -->
		<link rel="stylesheet" href="newassets/css/fonts.googleapis.com.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="newassets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="newassets/css/ace-part2.min.css" class="ace-main-stylesheet" />
		<![endif]-->
		<link rel="stylesheet" href="newassets/css/ace-skins.min.css" />
		<link rel="stylesheet" href="newassets/css/ace-rtl.min.css" />

		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="newassets/css/ace-ie.min.css" />
		<![endif]-->

		<!-- inline styles related to this page -->

		<!-- ace settings handler -->
		<script src="newassets/js/ace-extra.min.js"></script>

		<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

		<!--[if lte IE 8]>
		<script src="newassets/js/html5shiv.min.js"></script>
		<script src="newassets/js/respond.min.js"></script>
		<![endif]-->
					<link rel="icon" href="flag-rwanda.png" />

	</head>

	<body class="no-skin" oncontextmenu="return false" onload="ajaxFunction222();">

<div class="row">
	
	<div class="col-md-4">
			<div class="panel panel-danger">
			<div class="panel-heading">
				
				<a href="product.php" style="text-decoration:none;color:black;">
					<strong>Credibility</strong>
					<span class="badge pull pull-right"><?php echo "0"; ?></span>	
				</a>
				
			</div> <!--/panel-hdeaing-->
		</div> <!--/panel-->
		<div class="card">
		  <div class="cardHeader" style="background-color:#fff6f8;">
		  		     <form  name=myForm method='post' onSubmit="ajaxFunction222(this.form); return false">

		     <select  class="form-control" id="credibility-list" name="credibility" onChange="ajaxFunction222();"><option value="0">Select Credibility</option>
                 <option value="1">Confirmed</option>   
			   <option value="2">Probably true</option>
                <option value="3">Possibly true</option>
                <option value="4">Doubtfull</option>
                <option value="5">Unlikely</option>
                <option value="6">Accuracy cannot be determined</option>
	           </select>

		  </div>

		</div> 
		<br/>
		<div class="panel panel-danger">
			<div class="panel-heading">
				<a href="orders.php?o=manord" style="text-decoration:none;color:black;">
					<strong>Reliability </strong>
					<span class="badge pull pull-right"><?php echo "0"; ?></span>
				</a>
					
			</div> <!--/panel-hdeaing-->
		</div> <!--/panel-->
		<div class="card">
		  <div class="cardHeader" style="background-color:#fff6f8;">
		     <select  class="form-control"  id="reliability-list" name="reliability" onChange="ajaxFunction223();"><option value="0">Select Reliability</option>
                 <option value="1">Completely reliable</option>   
			   <option value="2">Usually Relaible</option>
                <option value="3">Fairy relaible</option>
                <option value="4">Usually unrelaible</option>
                <option value="5">Unrelaible</option>
                <option value="6">Reliability cannot be determined</option>

	           </select>
		  </div>
		</div> 
		
		<div class="panel panel-danger">
			<div class="panel-heading">
				<a href="orders.php?o=manord" style="text-decoration:none;color:black;">
					<strong>Source </strong>
					<span class="badge pull pull-right"><?php echo "0"; ?></span>
				</a>
					
			</div> <!--/panel-hdeaing-->
		</div> <!--/panel-->
		<div class="card">
		  <div class="cardHeader" style="background-color:#fff6f8;">
		     <select  class="form-control" id="saurce-list" name="saurce" onChange="ajaxFunction224();"><option value="0">Select Source</option>
                  <option value="1">Human Intelligence (HUMINT)</option>   
			   <option value="2"> Signals Intelligence (SIGINT)</option>
                <option value="3">Open Source Intelligence (OSINT)</option>
                <option value="4">Measurement and Signatures Intelligence (MASINT)</option>
	           </select>
		  </div>
		</div> 
		
		<div class="panel panel-danger">
			<div class="panel-heading">
				<a href="orders.php?o=manord" style="text-decoration:none;color:black;">
					<strong>Classification </strong>
					<span class="badge pull pull-right"><?php echo "0"; ?></span>
				</a>
					
			</div> <!--/panel-hdeaing-->
		</div> <!--/panel-->
		<div class="card">
		  <div class="cardHeader" style="background-color:#fff6f8;">
		     <select  class="form-control" id="classification-list" name="classification" onChange="ajaxFunction225();"><option value="0">Select Classification</option>
                  <option value="1">Restricted</option>
                <option value="2">Confidential</option>
			   <option value="3">Secret</option>
                <option value="4">Top Secret</option>
				
	           </select>
		  </div>
		</div> 

	</div>
</form>

	<div class="col-md-8">
			<div class="panel-heading"> <strong><i class="glyphicon glyphicon-calendar"></i> Reports</strong></div>
			<div class="panel-body">


				
				

											<div id="faq-list-1" class="panel-group accordion-style1 accordion-style2">

<div id=msg style="position:absolute;  z-index:1; left: 500px; top: 0px;" >Message area</div>

<div id="display"><b>Records Area</b></div>

</div>
													</div>
												</div>
										</div>
											
											
												
				
			
		</div><!-- /.main-container -->

		<!-- basic scripts -->

		<!--[if !IE]> -->
		<script src="newassets/js/jquery-2.1.4.min.js"></script>

		<!-- <![endif]-->

		<!--[if IE]>
<script src="newassets/js/jquery-1.11.3.min.js"></script>
<![endif]-->
		<script type="text/javascript">
		</script>
		<script src="newassets/js/bootstrap.min.js"></script>

		<!-- page specific plugin scripts -->
		<script src="newassets/js/bootstrap-tag.min.js"></script>
		<script src="newassets/js/jquery.hotkeys.index.min.js"></script>
		<script src="newassets/js/bootstrap-wysiwyg.min.js"></script>

		<!-- ace scripts -->
		<script src="newassets/js/ace-elements.min.js"></script>
		<script src="newassets/js/ace.min.js"></script>

		<!-- inline scripts related to this page -->
		
	</body>
</html>
