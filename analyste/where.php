<!DOCTYPE html>
<head>
<?php
include_once('connect_db1.php');
require_once 'includes/header.php';

?>
		   <meta http-equiv="Content-Type" content="text/html; charset=windows-1252">	  
          <?php
require_once("dbcontroller.php");
$db_handle = new DBController();
$query ="SELECT * FROM province";
$results = $db_handle->runQuery($query);
?>

<!-- fullCalendar 2.2.5-->
    <link rel="stylesheet" href="assests/plugins/fullcalendar/fullcalendar.min.css">
    <link rel="stylesheet" href="assests/plugins/fullcalendar/fullcalendar.print.css" media="print">

		<script language="JavaScript" type="text/javascript">
	function checkDelete(){
			return confirm('Are you sure you want to delete this report?');
	}
	</script>
<script type="text/javascript">
// Retreive values for province
function ajaxFunction()
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

var str="<table width='100%'  class='table table-striped table-bordered table-hover'><tr><th align='left' bgcolor='#3CB371'>No</th><th align='left' bgcolor='#3CB371'>Province</th><th align='left' bgcolor='#3CB371'>District</th><th align='left' bgcolor='#3CB371'>Sector</th><th align='left' bgcolor='#3CB371'>Cell</th><th align='left' bgcolor='#3CB371'>Geo-description</th><th align='left' bgcolor='#3CB371'>Subject</th><th align='left' bgcolor='#3CB371'>Classification</th><th align='left' bgcolor='#3CB371'>Date</th><th align='left' bgcolor='#3CB371'>Attachments</th><th align='left' bgcolor='#3CB371'>Status</th><th align='left' bgcolor='#3CB371'>Action</th></tr>";
var color="#f1f1f1";
for(i=0;i<myObject.data.length;i++)
{ 
if((i%2)==0){color="#ffffff";}
else{color="#f1f1f1";}
if(myObject.data[i].Status =='Edited'){color="#00cec9";}
str = str + "<tr style='background-color:"+color+";'><td>" +(i+1)+ " </td><td>" + myObject.data[i].povince_name + " <strong>" + myObject.data[i].neighbor_country +'&nbsp;&nbsp;&nbsp;&nbsp;'+ myObject.data[i].neighbor_province + "</strong> </td> <td>" + myObject.data[i].district_name +"<strong>" +myObject.data[i].neighbor_district +" </strong> </td><td>" + myObject.data[i].sector_name +'<strong>'+ myObject.data[i].neighbor_district + "</.strong> </td><td>" + myObject.data[i].cell_name + '<strong>'+ myObject.data[i].neighbor_district + "</.strong>  </td><td>" + myObject.data[i].geodescription + " </td><td>" + myObject.data[i].subject + " </td><td>"+ myObject.data[i].classification_name + "</td><td>"+ myObject.data[i].dateincident + "</td><td><strong>[&nbsp;"+ myObject.data[i].noattachments + "&nbsp;]&nbsp;&nbsp;Attachment(s)</strong></td><td><strong>"+ myObject.data[i].Status + "</strong></td></td><td><a href='edit_report?id_number="+myObject.data[i].report_id+"'> View</a></td><td><a href='delete?id_number="+myObject.data[i].report_id+"' onclick='return checkDelete()'  style='color:red;'><img src='images/delete.png'>Delete</a></td></tr>"
}
str = str + "</table>" ;
document.getElementById("display").innerHTML=str;
    }
    }

var url="demo2.php";
var cat_id=document.myForm.cat_id.value;
url=url+"?cat_id="+cat_id;
url=url+"&kid="+Math.random();
//alert(url)
httpxml.onreadystatechange=stateChanged;
httpxml.open("GET",url,true);
httpxml.send(null);

document.getElementById("msg").style.background='#f1f1f1';
document.getElementById("msg").innerHTML="Please Wait ... ";
document.getElementById("msg").style.display='inline';
}
//retreive values for district
function ajaxFunction1()
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

var str="<table width='100%'  class='table table-striped table-bordered table-hover'><tr><th align='left' bgcolor='#3CB371'>No</th><th align='left' bgcolor='#3CB371'>District</th><th align='left' bgcolor='#3CB371'>Sector</th><th align='left' bgcolor='#3CB371'>Cell</th><th align='left' bgcolor='#3CB371'>Subject</th><th align='left' bgcolor='#3CB371'>Classification</th><th align='left' bgcolor='#3CB371'>Date</th><th align='left' bgcolor='#3CB371'>Attachments</th><th align='left' bgcolor='#3CB371'>Status</th><th align='left' bgcolor='#3CB371'>Action</th></tr>";
var color="#f1f1f1";
for(i=0;i<myObject.data.length;i++)
{ 
	if((i%2)==0){color="#ffffff";}
else{color="#f1f1f1";}
if(myObject.data[i].Status =='Edited'){color="#00cec9";}
str = str + "<tr style='background-color:"+color+";'><td>" +(i+1)+ " </td><td>" + myObject.data[i].district_name + " </td><td>" + myObject.data[i].sector_name + " </td><td>" + myObject.data[i].cell_name + " </td><td>" + myObject.data[i].subject + " </td><td>"+ myObject.data[i].classification_name + "</td><td>"+ myObject.data[i].dateincident + "</td><td><strong>[&nbsp;"+ myObject.data[i].noattachments + "&nbsp;]&nbsp;&nbsp;Attachment(s)</strong><td><strong>"+ myObject.data[i].Status + "</strong></td></td><td><a href='edit_report?id_number="+myObject.data[i].report_id+"'> View</a></td><td><a href='delete?id_number="+myObject.data[i].report_id+"' onclick='return checkDelete()'  style='color:red;'><img src='images/delete.png'>Delete</a></td></tr>"
}
str = str + "</table>" ;
document.getElementById("display").innerHTML=str;
    }
    }

var url="demo3.php";
var cat_id1=document.myForm.cat_id1.value;
url=url+"?cat_id1="+cat_id1;
url=url+"&kid="+Math.random();
//alert(url)
httpxml.onreadystatechange=stateChanged;
httpxml.open("GET",url,true);
httpxml.send(null);

document.getElementById("msg").style.background='#f1f1f1';
document.getElementById("msg").innerHTML="Please Wait ... ";
document.getElementById("msg").style.display='inline';
}
//Retreive values for sectors
function ajaxFunction2()
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

var str="<table width='100%'  class='table table-striped table-bordered table-hover'><tr><th align='left' bgcolor='#3CB371'>No</th><th align='left' bgcolor='#3CB371'>Sector</th><th align='left' bgcolor='#3CB371'>Cell</th><th align='left' bgcolor='#3CB371'>Subject</th><th align='left' bgcolor='#3CB371'>Classification</th><th align='left' bgcolor='#3CB371'>Date</th><th align='left' bgcolor='#3CB371'>Attachments</th><th align='left' bgcolor='#3CB371'>Status</th><th align='left' bgcolor='#3CB371'>Action</th></tr>";
var color="#f1f1f1";
for(i=0;i<myObject.data.length;i++)
{ 
	if((i%2)==0){color="#ffffff";}
else{color="#f1f1f1";}
if(myObject.data[i].Status =='Edited'){color="#00cec9";}
str = str + "<tr style='background-color:"+color+";'><td>" +(i+1)+ " </td><td>" + myObject.data[i].sector_name + " </td><td>" + myObject.data[i].cell_name + " </td><td>" + myObject.data[i].subject + " </td><td>"+ myObject.data[i].classification_name + "</td><td>"+ myObject.data[i].dateincident + "</td><td><strong>[&nbsp;"+ myObject.data[i].noattachments + "&nbsp;]&nbsp;&nbsp;Attachment(s)</strong></td><td><strong>"+ myObject.data[i].Status + "</strong></td></td><td><a href='edit_report?id_number="+myObject.data[i].report_id+"'> View</a></td><td><a href='delete?id_number="+myObject.data[i].report_id+"' onclick='return checkDelete()'  style='color:red;'><img src='images/delete.png'>Delete</a></td></tr>"
}
str = str + "</table>" ;
document.getElementById("display").innerHTML=str;
    }
    }

var url="demo4.php";
var cat_id2=document.myForm.cat_id2.value;
url=url+"?cat_id2="+cat_id2;
url=url+"&kid="+Math.random();
//alert(url)
httpxml.onreadystatechange=stateChanged;
httpxml.open("GET",url,true);
httpxml.send(null);

document.getElementById("msg").style.background='#f1f1f1';
document.getElementById("msg").innerHTML="Please Wait ... ";
document.getElementById("msg").style.display='inline';
}

//Retreive values for Cells
function ajaxFunction3()
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

var str="<table width='100%'  class='table table-striped table-bordered table-hover'><tr><th align='left' bgcolor='#3CB371'>No</th><th align='left' bgcolor='#3CB371'>Cell</th><th align='left' bgcolor='#3CB371'>Subject</th><th align='left' bgcolor='#3CB371'>Classification</th><th align='left' bgcolor='#3CB371'>Date</th><th align='left' bgcolor='#3CB371'>Attachments</th><th align='left' bgcolor='#3CB371'>Status</th><th align='left' bgcolor='#3CB371'>Action</th></tr>";
var color="#f1f1f1";
for(i=0;i<myObject.data.length;i++)
{ 
	if((i%2)==0){color="#ffffff";}
else{color="#f1f1f1";}
if(myObject.data[i].Status =='Edited'){color="#00cec9";}
str = str + "<tr style='background-color:"+color+";'><td>" +(i+1)+ " </td><td>" + myObject.data[i].cell_name + " </td><td>" + myObject.data[i].subject + " </td><td>"+ myObject.data[i].classification_name + "</td><td>"+ myObject.data[i].dateincident + "</td><td><strong>[&nbsp;"+ myObject.data[i].noattachments + "&nbsp;]&nbsp;&nbsp;Attachment(s)</strong><td><strong>"+ myObject.data[i].Status + "</strong></td></td><td><a href='edit_report?id_number="+myObject.data[i].report_id+"'> View</a></td><td><a href='delete?id_number="+myObject.data[i].report_id+"' onclick='return checkDelete()'  style='color:red;'><img src='images/delete.png'>Delete</a></td></tr>"
}
str = str + "</table>" ;
document.getElementById("display").innerHTML=str;
    }
    }

var url="demo5.php";
var cat_id3=document.myForm.cat_id3.value;
url=url+"?cat_id3="+cat_id3;
url=url+"&kid="+Math.random();
//alert(url)
httpxml.onreadystatechange=stateChanged;
httpxml.open("GET",url,true);
httpxml.send(null);

document.getElementById("msg").style.background='#f1f1f1';
document.getElementById("msg").innerHTML="Please Wait ... ";
document.getElementById("msg").style.display='inline';
}


//Retreive values for countries
function ajaxFunctioncountry()
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

var str="<table width='100%'  class='table table-striped table-bordered table-hover'><tr><th align='left' bgcolor='#3CB371'>No</th><th align='left' bgcolor='#3CB371'>	Country</th><th align='left' bgcolor='#3CB371'>Province</th><th align='left' bgcolor='#3CB371'>District</th><th align='left' bgcolor='#3CB371'>Subject</th><th align='left' bgcolor='#3CB371'>Classification</th><th align='left' bgcolor='#3CB371'>Date</th><th align='left' bgcolor='#3CB371'>Attachments</th><th align='left' bgcolor='#3CB371'>Status</th><th align='left' bgcolor='#3CB371'>Action</th></tr>";
var color="#f1f1f1";
for(i=0;i<myObject.data.length;i++)
{ 
	if((i%2)==0){color="#ffffff";}
else{color="#f1f1f1";}
if(myObject.data[i].Status =='Edited'){color="#00cec9";}
str = str + "<tr style='background-color:"+color+";'><td>" +(i+1)+ " </td><td>" + myObject.data[i].neighbor_country + " </td><td>" + myObject.data[i].neighbor_province + " </td><td>" + myObject.data[i].neighbor_district + " </td><td>" + myObject.data[i].subject + " </td><td>"+ myObject.data[i].classification_name + "</td><td>"+ myObject.data[i].dateincident + "</td><td><strong>[&nbsp;"+ myObject.data[i].noattachments + "&nbsp;]&nbsp;&nbsp;Attachment(s)</strong></td><td><strong>"+ myObject.data[i].Status + "</strong></td></td><td><a href='edit_report?id_number="+myObject.data[i].report_id+"'> View</a></td><td><a href='delete?id_number="+myObject.data[i].report_id+"' onclick='return checkDelete()'  style='color:red;'><img src='images/delete.png'>Delete</a></td></tr>"
}
str = str + "</table>" ;
document.getElementById("display").innerHTML=str;
    }
    }

var url="democountry.php";
var cat_idcountry=document.myForm.cat_idcountry.value;
url=url+"?cat_idcountry="+cat_idcountry;
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

</script>
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

<?php
//////////////////////////// Your Database details here /////////////////
require "config.php"; // Database Connection 
///////////////////////////
require_once("dbcontroller.php");
$db_handle = new DBController();
$query ="SELECT * FROM province";
$results = $db_handle->runQuery($query);
?>
	</head>

	<body class="no-skin" oncontextmenu="return false" onload="ajaxFunction();">
	
<div class="row">
	
	<div class="col-md-4">
		<div class="panel panel-success">
			<div class="panel-heading">
				
				<a href="#" style="text-decoration:none;color:black;">
					Province
					<span class="badge pull pull-right"><?php echo "0"; ?></span>	
				</a>
				
			</div> <!--/panel-hdeaing-->
		</div> <!--/panel-->
		<div class="card">
		  <div class="cardHeader" style="background-color: #5dc17a;">
		     <form  name=myForm method='post' onSubmit="ajaxFunction(this.form); return false">


<select class="form-control" id="province-list" name="cat_id" onChange="ajaxFunction();getDistrict(this.value);"><option value=0>Select Province</option>
<?php
foreach($results as $province) {
?>
<option value="<?php echo $province["Province_id"]; ?>"><?php echo $province["province_name"]; ?></option>
<?php
}
?>
</select>
		  </div>

		</div> 
		<br/>
		<div class="panel panel-success">
			<div class="panel-heading">
				<a href="#" style="text-decoration:none;color:black;">
					District
					<span class="badge pull pull-right"><?php echo "0"; ?></span>
				</a>
					
			</div> <!--/panel-hdeaing-->
		</div> <!--/panel-->
		<div class="card">
		  <div class="cardHeader" style="background-color: #5dc17a;">
			  <select class="form-control" id="disrict_liste" name="cat_id1" onChange="ajaxFunction1();getSector(this.value);" required> 
<option value="">Select Disrict</option>
</select>
		  </div>
		</div> <br/>
		<div class="panel panel-success">
			<div class="panel-heading">
				<a href="#" style="text-decoration:none;color:black;">
					Sector
					<span class="badge pull pull-right"><?php echo "0"; ?></span>	
				</a>
				
			</div> <!--/panel-hdeaing-->
		</div> <!--/panel-->
		<div class="card">
		  <div class="cardHeader" style="background-color: #5dc17a;">
		     <select class="form-control"id="sector-list"  name="cat_id2" onChange="ajaxFunction2();getCell(this.value);" required>
<option value="">Select Sector</option>
</select>
		  </div>

		</div> <br/>
		<div class="panel panel-success">
			<div class="panel-heading">
				<a href="#" style="text-decoration:none;color:black;">
					Cell
					<span class="badge pull pull-right"><?php echo "0"; ?></span>	
				</a>
				
			</div> <!--/panel-hdeaing-->
		</div> <!--/panel-->
		<div class="card">
		  <div class="cardHeader" style="background-color: #5dc17a;">
		     <select class="form-control"id="cell_list" name="cat_id3" onChange="ajaxFunction3();" required>
<option value="">Select Cell</option>
</select>
		  </div>

		  <div class="cardContainer">
		    <p></p>
		  </div>
		</div> 
		
<div class="panel panel-success">
			<div class="panel-heading">
				<a href="#" style="text-decoration:none;color:black;">
					Neighbor Countries 
					<span class="badge pull pull-right"><?php echo "0"; ?></span>	
				</a>
				
			</div> <!--/panel-hdeaing-->
		</div> <!--/panel-->
		<div class="card">
		  <div class="cardHeader" style="background-color: #5dc17a;">
		     <select class="form-control"id="cell_list" name="cat_idcountry" onChange="ajaxFunctioncountry();" required>
<option value="100">Select Country</option>
<option value="71">UGANDA</option>
<option value="72">BURUNDI</option>
<option value="73">TANZANIA</option>
<option value="74">DR CONGO</option>
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

<div id=msg style="position:absolute;  z-index:1; left: 1100px; top: 0px;" >Message area</div>

<div id="display"><b>Records Area</b></div>

</div>
													</div>
												</div>

												
												
											</div>
										</div>
			
		</div>
			</div>	
		</div>
		
	</div>

	
</div> <!--/row-->

<!-- fullCalendar 2.2.5 -->
<script src="assests/plugins/moment/moment.min.js"></script>
<script src="assests/plugins/fullcalendar/fullcalendar.min.js"></script>


<script type="text/javascript">
	$(function () {
			// top bar active
	$('#navDashboard').addClass('active');

      //Date for the calendar events (dummy data)
      var date = new Date();
      var d = date.getDate(),
      m = date.getMonth(),
      y = date.getFullYear();

      $('#calendar').fullCalendar({
        header: {
          left: '',
          center: 'title'
        },
        buttonText: {
          today: 'today',
          month: 'month'          
        }        
      });


    });
</script>

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
