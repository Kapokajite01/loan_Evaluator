<!DOCTYPE html>
<?php


include_once('connect_db1.php');

?>
<?php require_once 'includes/header.php'; ?>
	<script language="JavaScript" type="text/javascript">
	function checkDelete(){
			return confirm('Are you sure you want to delete this report?');
	}
	</script>

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
		getSector();

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
		getSector();

	}
	});
}
</script>

<script type="text/javascript">
// Retreive values for province
function ajaxFunction23()
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

var str="<table width='150%'  class='table table-striped table-bordered table-hover'><tr><th align='left' bgcolor='#B7E9FF'>No</th><th align='left' bgcolor='#B7E9FF'>Actor Group</th><th align='left' bgcolor='#B7E9FF'>Actor</th><th align='left' bgcolor='#B7E9FF'>Actor Description</th><th align='left' bgcolor='#B7E9FF'>Subject</th><th align='left' bgcolor='#B7E9FF'>Classification</th><th align='left' bgcolor='#B7E9FF'>Date</th><th align='left' bgcolor='#B7E9FF'>Attachments</th><th align='left' bgcolor='#B7E9FF'>Status</th><th align='left' bgcolor='#B7E9FF'>Action</th></tr>";
var color="#f1f1f1";

for(i=0;i<myObject.data.length;i++)
{ 

if((i%2)==0){color="#ffffff";}
if(myObject.data[i].Status =='Edited'){color="#00cec9";}
else{color="#f1f1f1";}

str = str + "<tr style='background-color:"+color+";'><td>" +(i+1)+ " </td><td>" + myObject.data[i].actorgoup_name + " </td><td>" + myObject.data[i].actor_name + " </td><td>" + myObject.data[i].actor_desrciption + " </td><td>" + myObject.data[i].subject + " </td><td>"+ myObject.data[i].classification_name + "</td><td>"+ myObject.data[i].dateincident + "</td><td><strong>[&nbsp;"+ myObject.data[i].noattachments + "&nbsp;]&nbsp;&nbsp;Attachment(s)</strong></td><td><strong>"+ myObject.data[i].Status + "</strong></td><td><a href='edit_report?id_number="+myObject.data[i].report_id+"'> View</a></td><td><a href='delete?id_number="+myObject.data[i].report_id+"' onclick='return checkDelete()'  style='color:red;'><img src='images/delete.png'>Delete</a></td></tr>"
}
str = str + "</table>" ;
document.getElementById("display").innerHTML=str;

    }
    }

var url="demo23.php";
var group=document.myForm.group.value;
url=url+"?group="+group;
url=url+"&kid="+Math.random();
//alert(url)
httpxml.onreadystatechange=stateChanged;
httpxml.open("GET",url,true);
httpxml.send(null);

document.getElementById("msg").style.background='#f1f1f1';
document.getElementById("msg").innerHTML="Please Wait ... ";
document.getElementById("msg").style.display='inline';
}
function ajaxFunction24()
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

var str="<table width='150%'  class='table table-striped table-bordered table-hover'><tr><th align='left' bgcolor='#B7E9FF'>No</th><th align='left' bgcolor='#B7E9FF'>Actor</th><th align='left' bgcolor='#B7E9FF'>Actor Description</th><th align='left' bgcolor='#B7E9FF'>Subject</th><th align='left' bgcolor='#B7E9FF'>Classification</th><th align='left' bgcolor='#B7E9FF'>Date</th><th align='left' bgcolor='#B7E9FF'>Attachments</th><th align='left' bgcolor='#B7E9FF'>Status</th><th align='left' bgcolor='#B7E9FF'>Action</th></tr>";
var color="#f1f1f1";
for(i=0;i<myObject.data.length;i++)
{ 
	if((i%2)==0){color="#ffffff";}
if(myObject.data[i].Status =='Edited'){color="#00cec9";}
else{color="#f1f1f1";}
str = str + "<tr style='background-color:"+color+";'><td>" +(i+1)+ " </td><td>" + myObject.data[i]. 	actor_name + " </td><td>" + myObject.data[i].actor_desrciption + " </td><td>" + myObject.data[i].subject + " </td><td>"+ myObject.data[i].classification_name + "</td><td>"+ myObject.data[i].dateincident + "</td><td><strong>[&nbsp;"+ myObject.data[i].noattachments + "&nbsp;]&nbsp;&nbsp;Attachment(s)</strong></td><td><strong>"+ myObject.data[i].Status +"</strong></td><td><a href='edit_report?id_number="+myObject.data[i].report_id+"'> View</a></td><td><a href='delete?id_number="+myObject.data[i].report_id+"' onclick='return checkDelete()'  style='color:red;'><img src='images/delete.png'>Delete</a></td></tr>"
}
str = str + "</table>" ;
document.getElementById("display").innerHTML=str;
    }
    }

var url="demo24.php";
var actor=document.myForm.actor.value;
url=url+"?actor="+actor;
url=url+"&kid="+Math.random();
//alert(url)
httpxml.onreadystatechange=stateChanged;
httpxml.open("GET",url,true);
httpxml.send(null);

document.getElementById("msg").style.background='#f1f1f1';
document.getElementById("msg").innerHTML="Please Wait ... ";
document.getElementById("msg").style.display='inline';
}



function ajaxFunction25()
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

var str="<table width='150%'  class='table table-striped table-bordered table-hover'><tr><th align='left' bgcolor='#B7E9FF'>No</th><th align='left' bgcolor='#B7E9FF'>Institution</th><th align='left' bgcolor='#B7E9FF'>Member Description</th><th align='left' bgcolor='#B7E9FF'>Subject</th><th align='left' bgcolor='#B7E9FF'>Classification</th><th align='left' bgcolor='#B7E9FF'>Date</th><th align='left' bgcolor='#B7E9FF'>Attachments</th><th align='left' bgcolor='#B7E9FF'>Status</th><th align='left' bgcolor='#B7E9FF'>Action</th></tr>";
var color="#f1f1f1";
for(i=0;i<myObject.data.length;i++)
{ 
	if((i%2)==0){color="#ffffff";}
if(myObject.data[i].Status =='Edited'){color="#00cec9";}
else{color="#f1f1f1";}
str = str + "<tr style='background-color:"+color+";'><td>" +(i+1)+ " </td><td>" + myObject.data[i].institution_name + " </td><td>" + myObject.data[i].member_name + " </td><td>" + myObject.data[i].subject + " </td><td>"+ myObject.data[i].classification_name + "</td><td>"+ myObject.data[i].dateincident + "</td><td><strong>[&nbsp;"+ myObject.data[i].noattachments + "&nbsp;]&nbsp;&nbsp;Attachment(s)</strong></td><td><strong>"+ myObject.data[i].Status +"</strong></td><td><a href='edit_report?id_number="+myObject.data[i].report_id+"'> View</a></td><td><a href='delete?id_number="+myObject.data[i].report_id+"' onclick='return checkDelete()'  style='color:red;'><img src='images/delete.png'>Delete</a></td></tr>"
}
str = str + "</table>" ;
document.getElementById("display").innerHTML=str;
    }
    }

var url="demo25.php";
var institution=document.myForm.institution.value;
url=url+"?institution="+institution;
url=url+"&kid="+Math.random();
//alert(url)
httpxml.onreadystatechange=stateChanged;
httpxml.open("GET",url,true);
httpxml.send(null);

document.getElementById("msg").style.background='#f1f1f1';
document.getElementById("msg").innerHTML="Please Wait ... ";
document.getElementById("msg").style.display='inline';
}



function ajaxFunction26()
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

var str="<table width='150%'  class='table table-striped table-bordered table-hover'><tr><th align='left' bgcolor='#B7E9FF'>No</th><th align='left' bgcolor='#B7E9FF'>Member Description</th><th align='left' bgcolor='#B7E9FF'>Subject</th><th align='left' bgcolor='#B7E9FF'>Classification</th><th align='left' bgcolor='#B7E9FF'>Date</th><th align='left' bgcolor='#B7E9FF'>Attachments</th><th align='left' bgcolor='#B7E9FF'>Status</th><th align='left' bgcolor='#B7E9FF'>Action</th></tr>";
var color="#f1f1f1";
for(i=0;i<myObject.data.length;i++)
{ 
	if((i%2)==0){color="#ffffff";}
if(myObject.data[i].Status =='Edited'){color="#00cec9";}
else{color="#f1f1f1";}
str = str + "<tr style='background-color:"+color+";'><td>" +(i+1)+ " </td><td>" + myObject.data[i].member_name + " </td><td>" + myObject.data[i].subject + " </td><td>"+ myObject.data[i].classification_name + "</td><td>"+ myObject.data[i].dateincident + "</td><td><strong>[&nbsp;"+ myObject.data[i].noattachments + "&nbsp;]&nbsp;&nbsp;Attachment(s)</strong></td><td><strong>"+ myObject.data[i].Status +"</strong></td><td><a href='edit_report?id_number="+myObject.data[i].report_id+"'> View</a></td></tr>"
}
str = str + "</table>" ;
document.getElementById("display").innerHTML=str;
    }
    }

var url="demo26.php";
var members=document.myForm.members.value;
url=url+"?members="+members;
url=url+"&kid="+Math.random();
//alert(url)
httpxml.onreadystatechange=stateChanged;
httpxml.open("GET",url,true);
httpxml.send(null);

document.getElementById("msg").style.background='#f1f1f1';
document.getElementById("msg").innerHTML="Please Wait ... ";
document.getElementById("msg").style.display='inline';
}
</script>



<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">	  


<!-- fullCalendar 2.2.5-->
    <link rel="stylesheet" href="assests/plugins/fullcalendar/fullcalendar.min.css">
    <link rel="stylesheet" href="assests/plugins/fullcalendar/fullcalendar.print.css" media="print">
<link rel="stylesheet" href="newcss/bootstrap.min.css"/>
<link rel="stylesheet" href="newcss/jquery-ui.css"/> 
<link rel="stylesheet" href="newcss/jquery-ui.css"/>

<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />

		<meta name="description" content="Mailbox with some customizations as described in docs" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
  <link rel="stylesheet" href="assests/plugins/fullcalendar/fullcalendar.min.css">
    <link rel="stylesheet" href="assests/plugins/fullcalendar/fullcalendar.print.css" media="print">
		<!-- bootstrap & fontawesome -->

		<!-- page specific plugin styles -->

		<!-- text fonts -->

		<!-- ace styles -->

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="newassets/css/ace-part2.min.css" class="ace-main-stylesheet" />
		<![endif]-->

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

	<body class="no-skin" oncontextmenu="return false" onload="ajaxFunction23();">
	
<div class="row">
	
	<div class="col-md-4">
		<div class="panel panel-info">
			<div class="panel-heading">
				
				<a href="product.php" style="text-decoration:none;color:black;">
					Actor Group
					<span class="badge pull pull-right"><?php echo "0"; ?></span>	
				</a>
				
			</div> <!--/panel-hdeaing-->
		</div> <!--/panel-->
		<div class="card">
		  <div class="cardHeader" style="background-color:  #f4fafc ;">
		  		  		     <form  name=myForm method='post' onSubmit="ajaxFunction23(this.form); return false">

		     <select class="form-control" id="group-list" name="group" onChange="getIngroup(this.value);ajaxFunction23();"><option value="0">Select Actor Group</option>
<?php
foreach($resultsgr as $group) {
?>
<option value="<?php echo $group["actors_grou_id"]; ?>"><?php echo $group["actors_name"]; ?></option>
<?php
}
?>
</select>
		  </div>

		</div> 
		<br/>
		
		<div class="panel panel-info">
			<div class="panel-heading">
				<a href="product.php" style="text-decoration:none;color:black;">
					Actor (Actor Group)
					<span class="badge pull pull-right"><?php echo "0"; ?></span>	
				</a>
				
			</div> <!--/panel-hdeaing-->
		</div> <!--/panel-->
		<div class="card">
		  <div class="cardHeader" style="background-color: #f4fafc ;">
		     <select class="form-control" id ="ingroup-list" name = "actor" onChange="ajaxFunction24();"">
  <option value="0">Select Actor</option>
			  </select> 
		  </div>

		</div><br/>
		<div class="panel panel-info">
			<div class="panel-heading">
				
				<a href="product.php" style="text-decoration:none;color:black;">
					Institution
					<span class="badge pull pull-right"><?php echo "0"; ?></span>	
				</a>
				
			</div> <!--/panel-hdeaing-->
		</div> <!--/panel-->
		<div class="card">
		  <div class="cardHeader" style="background-color: #f4fafc ;">
		     <select class="form-control" id="group-list" name="institution" onChange="getElements(this.value);ajaxFunction25();"><option value=0>Select Institution</option>
<?php
foreach($resultsinst as $institutions) {
?>
<option value="<?php echo $institutions["institution_id"]; ?>"><?php echo $institutions["institution_name"]; ?></option>
<?php
}
?>
</select>
		  </div>

		</div> 
		<br/>		
				<div class="panel panel-info">
			<div class="panel-heading">
				
				<a href="" style="text-decoration:none;color:black;">
					Actor (Institution)
					<span class="badge pull pull-right"><?php echo "0"; ?></span>	
				</a>
				
			</div> <!--/panel-hdeaing-->
		</div> <!--/panel-->
		<div class="card">
		  <div class="cardHeader" style="background-color: #f4fafc ;">
		     <select class="form-control" id ="element-list" name = "members" onChange="ajaxFunction26();">
  <option value="0">Select Elelement</option>
			  </select>  
		  </div>
		  <div class="cardContainer">
		    <p></p>
		  </div>
		</div> 
<div class="cardHeader" style="background-color: #fafffc; ">


	<input type="text" name="From" id="From" class="form-control" placeholder="From Date"/>
	</div>
		  <div class="cardHeader" style="background-color: #fafffc; ">

<input type="text" name="to" id="to" class="form-control" placeholder="To Date"/>
		  </div>
	</div>
</form>
	<div class="col-md-8">
		<div class="panel panel-default">
			<div class="col-md-8">
			<div class="panel-heading"> <strong><i class="glyphicon glyphicon-calendar"></i> Reports</strong></div>
			<div class="panel-body">


				
				

											<div id="faq-list-1" class="panel-group accordion-style1 accordion-style2">

<div id=msg style="position:absolute;  z-index:1; left: 500px; top: 0px;" >Message area</div>

<div id="display"><b>Records Area</b></div>

</div>
													</div>		</div>
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
	<script src="newjs/jquery.min.js"></script>
<script src="newjs/jquery-ui.js"></script>
<!-- Script -->
<script>
$(document).ready(function(){
	$.datepicker.setDefaults({
		dateFormat: 'yy-mm-dd'
	});
	$(function(){
		$("#From").datepicker();
		$("#to").datepicker();
	});
	$('#range').click(function(){
		var From = $('#From').val();
		var to = $('#to').val();
		if(From != '' && to != '')
		{
			$.ajax({
				url:"range.php",
				method:"POST",
				data:{From:From, to:to},
				success:function(data)
				{
					$('#purchase_order').html(data);
				}
			});
		}
		else
		{
			alert("Please Select the Date");
		}
	});
});
</script>
</html>
