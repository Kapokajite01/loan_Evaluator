          <?php
require_once("dbcontroller.php");
$db_handle = new DBController();
$query ="SELECT * FROM province";
$results = $db_handle->runQuery($query);
?><!DOCTYPE html>

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
<script type="text/javascript">
       $(function() {
               $("#datesearch").datepicker({ dateFormat: "yy-mm-dd" }).val()
               $("#datesearch1").datepicker({ dateFormat: "yy-mm-dd" }).val()
       });

   </script>
<?php
require_once 'includes/header.php';

?>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" 
		<meta charset="utf-8" />
		<title>IMS</title>

		<!-- text fonts -->

		<!-- ace styles -->
		<link rel="stylesheet" href="newassets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="newassets/css/ace-part2.min.css" class="ace-main-stylesheet" />
		<![endif]-->

		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="newassets/css/ace-ie.min.css" />
		<![endif]-->

		<!-- inline styles related to this page -->

		<!-- ace settings handler -->

		<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

		<!--[if lte IE 8]>
		<script src="newassets/js/html5shiv.min.js"></script>
		<script src="newassets/js/respond.min.js"></script>
		<![endif]-->
<style>

/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    width: 100%; /* Full width */
    height: 100%; /* Full height */
	border: 5px solid #888;
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
    background-color: #6eacbd;
    margin: 0px auto;
    padding: 5px;
    border: 1px solid #888;
    width: 100%;
}

/* The Close Button */
.close {
    color: #000000;
    float: right;
    font-size: 35px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
}
</style>
<style>
div#submitForm input {
  background: url("images/find.png") no-repeat scroll 0 0 transparent;
  color: #000000;
  cursor: pointer;
  font-weight: bold;
  height: 52px;
  padding-bottom: 2px;
  width: 53px;
  float:right;
  border-radius:10px;
}
</style>
	</head>

	<body class="no-skin" oncontextmenu="return false">


				<div class="main-content-inner">
				
					<div class="page-content">
						
							</h1>
						<!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<div class="row">
									<div class="col-xs-12">
										<div class="tabbable">
										</li><!-- /.dropdown -->
											</ul>

											<div class="tab-content no-border no-padding">
				<!-- Trigger/Open The Modal -->

 <?php
mysql_connect("localhost", "root","fidele") or die(mysql_error());
mysql_select_db("mudb_ims_db") or die(mysql_error());

$query = "SELECT * FROM incidents ORDER BY incident_name";
$result = mysql_query($query) or die(mysql_error()."[".$query."]");
$queryactorgroup = "SELECT * FROM actors_in_groups ORDER BY actors_in_group_name";
$resultactorgroup = mysql_query($queryactorgroup) or die(mysql_error()."[".$queryactorgroup."]");
?>
<form action="western_map_action" method="POST">
<div id="submitForm">
			 <input type="submit" value="" name="submit">
			 </div>
<select name="actors_group_name"><option value="">Select Actor group</option>
<?php 
while ($row = mysql_fetch_array($resultactorgroup))
{
    echo "<option value='".$row['actors_in_group_name']."'>".$row['actors_in_group_name']."</option>";
}
?>        
</select><br>
<select name="incident"><option value="">Select Incident</option>
<?php 
while ($row = mysql_fetch_array($result))
{
    echo "<option value='".$row['incident_name']."'>".$row['incident_name']."</option>";
}
?>        
</select>
			 From:<input type="date" name="startdate" id="datesearch" value="">
			 To:<input type="date" name="enddate" id="datesearch" value="">

			 
</form>
                    </div>
			      </div>
			   </div>
            </div>
		</div>
	</div><BR/>
	<img src="images/map_western.jpg" style="width:100%;">
	</div>
	</div>
	</body>


</html>
