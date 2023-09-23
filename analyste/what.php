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
function ajaxFunction20()
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

var str="<table width='150%'  class='table table-striped table-bordered table-hover'><tr><th align='left' bgcolor='#FFE4E1'>No</th><th align='left' bgcolor='#FFE4E1'>District</th><th align='left' bgcolor='#FFE4E1'>Incident</th><th align='left' bgcolor='#FFE4E1'>Keyword</th><th align='left' bgcolor='#FFE4E1'>Source</th><th align='left' bgcolor='#FFE4E1'>Subject</th><th align='left' bgcolor='#FFE4E1'>Classification</th><th align='left' bgcolor='#FFE4E1'>Date</th><th align='left' bgcolor='#FFE4E1'>Attachments</th><th align='left' bgcolor='#FFE4E1'>Status</th><th align='left' bgcolor='#FFE4E1'>Action</th></tr>";
var color="#f1f1f1";
for(i=0;i<myObject.data.length;i++)
{ 
if((i%2)==0){color="#ffffff";}
else{color="#f1f1f1";}
if(myObject.data[i].Status =='Edited'){color="#00cec9";}
str = str + "<tr style='background-color:"+color+";'><td>" +(i+1)+ " </td><td>" + myObject.data[i].district_name + " <strong>" + myObject.data[i].neighbor_country + "</strong></td><td>" + myObject.data[i].incident_name + " </td><td>" + myObject.data[i].keyword_name + " </td><td>" + myObject.data[i].subkeword + " </td><td>" + myObject.data[i].subject + " </td><td>"+ myObject.data[i].classification_name + "</td><td>"+ myObject.data[i].dateincident + "</td><td><strong>[&nbsp;"+ myObject.data[i].noattachments + "&nbsp;]&nbsp;&nbsp;Attachment(s)</strong></td><td>"+ myObject.data[i].Status+"</td><td><a href='edit_report?id_number="+myObject.data[i].report_id+"'> View</a></td><td><a href='delete?id_number="+myObject.data[i].report_id+"' onclick='return checkDelete()'  style='color:red;'><img src='images/delete.png'>Delete</a></td></tr>"
}
str = str + "</table>" ;
document.getElementById("display").innerHTML=str;
    }
    }

var url="demo20.php";
var incident=document.myForm.incident.value;
url=url+"?incident="+incident;
url=url+"&kid="+Math.random();
//alert(url)
httpxml.onreadystatechange=stateChanged;
httpxml.open("GET",url,true);
httpxml.send(null);

document.getElementById("msg").style.background='#f1f1f1';
document.getElementById("msg").innerHTML="Please Wait ... ";
document.getElementById("msg").style.display='inline';
}


function ajaxFunction22()
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

var str="<table width='150%'  class='table table-striped table-bordered table-hover'><tr><th align='left' bgcolor='#FFE4E1'>No</th><th align='left' bgcolor='#FFE4E1'>District</th><th align='left' bgcolor='#FFE4E1'>Incident</th><th align='left' bgcolor='#FFE4E1'>Keyword</th><th align='left' bgcolor='#FFE4E1'>Subject</th><th align='left' bgcolor='#FFE4E1'>Classification</th><th align='left' bgcolor='#FFE4E1'>Date</th><th align='left' bgcolor='#FFE4E1'>Attachments</th><th align='left' bgcolor='#FFE4E1'>Status</th><th align='left' bgcolor='#FFE4E1'>Action</th></tr>";
var color="#f1f1f1";
for(i=0;i<myObject.data.length;i++)
{ 
if((i%2)==0){color="#ffffff";}
else{color="#f1f1f1";}
if(myObject.data[i].Status =='Edited'){color="#00cec9";}
str = str + "<tr bgcolor="+color+"><td>" +(i+1)+ " </td><td>" + myObject.data[i].district_name + " </td><td>" + myObject.data[i].incident_name + " </td><td>" + myObject.data[i].keyword_name + " </td><td>" + myObject.data[i].subject + " </td><td>"+ myObject.data[i].classification_name + "</td><td>"+ myObject.data[i].dateincident + "</td><td><strong>[&nbsp;"+ myObject.data[i].noattachments + "&nbsp;]&nbsp;&nbsp;Attachment(s)</strong></td><td>"+ myObject.data[i].Status+"</td><td><a href='edit_report?id_number="+myObject.data[i].report_id+"'> View</a></td><td><a href='delete?id_number="+myObject.data[i].report_id+"' onclick='return checkDelete()'  style='color:red;'><img src='images/delete.png'>Delete</a></td></tr>"
}
str = str + "</table>" ;
document.getElementById("display").innerHTML=str;
    }
    }

var url="demo22.php";
var keyword=document.myForm.keyword.value;
url=url+"?keyword="+keyword;
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

	<body class="no-skin" oncontextmenu="return false" onload="ajaxFunction20();">

<div class="row">
	
	<div class="col-md-4">
			<div class="panel panel-danger">
			<div class="panel-heading">
				
				<a href="product.php" style="text-decoration:none;color:black;">
					<strong>Incident Type</strong>
					<span class="badge pull pull-right"><?php echo "0"; ?></span>	
				</a>
				
			</div> <!--/panel-hdeaing-->
		</div> <!--/panel-->
		<div class="card">
		  <div class="cardHeader" style="background-color:#fff6f8;">
		  		     <form  name=myForm method='post' onSubmit="ajaxFunction20(this.form); return false">

		     <select  class="form-control" id="incident-list" name="incident" onChange="ajaxFunction20();getKeyword(this.value);"><option value="0">Select Incident</option>
<?php
foreach($results1 as $indident) {
?>
<option value="<?php echo $indident["incident_id"]; ?>"><?php echo $indident["incident_name"]; ?></option>
<?php
}
?>
</select>
		  </div>

		</div> 
		<br/>
		<div class="panel panel-danger">
			<div class="panel-heading">
				<a href="orders.php?o=manord" style="text-decoration:none;color:black;">
					Keyword
					<span class="badge pull pull-right"><?php echo "0"; ?></span>
				</a>
					
			</div> <!--/panel-hdeaing-->
		</div> <!--/panel-->
		<div class="card">
		  <div class="cardHeader" style="background-color:#fff6f8;">
		     <select class="form-control"id="keyword-list"  name="keyword" onChange="ajaxFunction22();" required>
<option value="0">Select Keword</option>
</select> 
		  </div>
		</div> <br/>
		
		<div class="panel panel-danger">
			<div class="panel-heading">
				<a href="product.php" style="text-decoration:none;color:black;">
					Sub Keywords
					<span class="badge pull pull-right"><?php echo "0"; ?></span>	
				</a>
				
			</div> <!--/panel-hdeaing-->
		</div> <!--/panel-->
		<div class="card">
		  <div class="cardHeader" style="background-color:#fff6f8;">
		     <select class="form-control">
  <option value="">Select Subkeyword</option>
  
			  </select> 
		  </div>

		  <div class="cardContainer">
		    <p></p>
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
