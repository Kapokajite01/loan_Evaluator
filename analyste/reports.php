
<?php require_once 'includes/header.php'; ?>
          <?php
require_once("dbcontroller.php");
$db_handle = new DBController();
$query ="SELECT * FROM province";
$results = $db_handle->runQuery($query);
?><!DOCTYPE html>
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


include_once('connect_db1.php');
require_once 'includes/header.php';

?>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Doc Share</title>

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

	<body class="no-skin" oncontextmenu="return false">
	<?php
$link = mysql_connect("localhost", "root", "fidele");
mysql_select_db("doc_track", $link);
$result = mysql_query("SELECT id FROM docs_sent where  view != 'Done'", $link);
$num_rows = mysql_num_rows($result);
$result1 = mysql_query("SELECT id FROM docs_sent ", $link);
$num_rows1 = mysql_num_rows($result1);
$resultn = mysql_query("SELECT id FROM docs_sent ", $link);
$num_rowsn = mysql_num_rows($resultn);

$result2= mysql_query("SELECT id FROM docs_recptions ", $link);
$num_rows2 = mysql_num_rows($result2);
$result3= mysql_query("SELECT com_id FROM doc_comments ", $link);
$num_rows3 = mysql_num_rows($result3);
 
?>


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
					
					<a href="new_report"><button  data-toggle="modal"  data-target="#addProductModal"> <i class="glyphicon glyphicon-plus-sign"></i> Add Report </button></a><br>
											<div id="faq-tab-1" class="tab-pane fade in active">
											

											<div class="space-8"></div>

											<div id="faq-list-1" class="panel-group accordion-style1 accordion-style2">
												<div class="panel panel-default">
													<div class="panel-heading">
														<a href="#faq-1-1" data-parent="#faq-list-1" data-toggle="collapse" class="accordion-toggle collapsed">
															<i class="ace-icon fa fa-chevron-left pull-right" data-icon-hide="ace-icon fa fa-chevron-down" data-icon-show="ace-icon fa fa-chevron-left"></i>
                                                      Cit-Rep &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp<?php if ($num_rows>0){echo '<strong><font color="red">'. $num_rows.'</font></strong>';}else{echo '<strong>('. $num_rows.')</strong>'; }?>
														</a>
													</div>

													<div class="panel-collapse collapse" id="faq-1-1">
														<div class="panel-body">
							
							<table id='dynamic-table' class='table table-striped  table-hover'>
                

				<?php

$result = mysql_query("SELECT * FROM docs_sent where view != 'Done' order by id DESC");
echo "<tr><th ><strong>No</th><th><strong>Doc Number</th><th><strong>DG Origine</th><th><strong>Department Origine</th><th><strong>Sender</th><th><strong>Classification</th><th><strong>Subject</th><th><strong>File Name</th><th><strong>Time Received</th><th><strong>view</th></tr>";
				for($i == 0 ; $i<=2; $i++){ 
					while ($Row = mysql_fetch_array($result)){
						
	
	echo "
    <tr>
	<td> <strong>". ++$i  ."</td>
	<td> $Row[1] </td>
	<td> $Row[2] </td>
	<td> $Row[3] </td>
	<td><strong> $Row[12] </strong></td>
	<td> $Row[5]</td>
	<td> $Row[6] </td>
	<td> $Row[8] </td>
	<td> $Row[7]</td>"; ?>
<td><strong><a class="label label-sm label-success" href="track_received?id=<?php echo $Row['1']?>"<img src="images/mycommentt.jpg"  width="10" height="10" border="0" target='_blank' />View</a></td></tr>
	<?php
}}
 

echo"</table>"; 
 ?>	
		
		</div>
			</div>
												

												<div class="panel panel-default">
													<div class="panel-heading">
														<a href="#faq-1-2" data-parent="#faq-list-1" data-toggle="collapse" class="accordion-toggle collapsed">
															<i class="ace-icon fa fa-chevron-left pull-right" data-icon-hide="ace-icon fa fa-chevron-down" data-icon-show="ace-icon fa fa-chevron-left"></i>

															Int-Rep &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp <strong><?php echo $num_rows1;?></strong>
														</a>
													</div>

													<div class="panel-collapse collapse" id="faq-1-2">
														<div class="panel-body">
															<div id="faq-list-nested-1" class="panel-group accordion-style1 accordion-style2">
																<div class="panel panel-default">
																	<div class="panel-heading">
															
									                                
							<table id='dynamic-table' class='table table-striped  table-hover'>
                

				<?php

$result11 = mysql_query("SELECT * FROM docs_sent  ORDER BY id DESC");
echo "<tr><th ><strong>No</th><th><strong>Doc Number</th><th><strong>Classification</th><th><strong>Subject</th><th><strong>Recipient</th><th><strong>File Name</th><th><strong>Time Sent</th><th><strong>view</th></tr>";
				for($j == 0 ; $j<=$result1; $j++){ 
					while ($Row1 = mysql_fetch_array($result11)){
						
	
	echo "
    <tr>
	<td> <strong>". ++$j  ."</td>
	<td> $Row1[1] </td>
	<td> $Row1[5]</td>
	<td> $Row1[6] </td>
	<td><strong> $Row1[13] </strong></td>
	<td> $Row1[8] </td>
	<td> $Row1[7]</td>"; ?>
<td><strong><a class="label label-sm label-success" href="track_sent?id=<?php echo $Row1['1']?>"<img src="images/mycommentt.jpg"  width="10" height="10" border="0" target='_blank' />View</a></td></tr>
	<?php
}}
 

echo"</table>"; 
 ?>	
																	</div>

																</div>

															</div>
														</div>
													</div>
												</div>

												<div class="panel panel-default">
													<div class="panel-heading">
														<a href="#faq-1-3" data-parent="#faq-list-1" data-toggle="collapse" class="accordion-toggle collapsed">
															<i class="ace-icon fa fa-chevron-left pull-right" data-icon-hide="ace-icon fa fa-chevron-down" data-icon-show="ace-icon fa fa-chevron-left"></i>

																Montly-Report &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp <strong><?php echo  $num_rows2;?></strong>
														
														</a>
													</div>

													<div class="panel-collapse collapse" id="faq-1-3">
														<div class="panel-body">
								
								<table id='dynamic-table' class='table table-striped table-bordered table-hover'>
								<?php 
										$result2= mysql_query("SELECT * FROM docs_recptions ORDER BY id DESC");
							
									echo "<tr><th ><strong>No</th><th><strong>Doc Number</th><th><strong>Classification</th><th><strong>Subject</th><th><strong>File Name</th><th><strong>Date Initiated</th><th><strong>View</th></tr>";
                                              for($a == 0 ; $a<=$num_rows2; $a++){ 
					                       while ($Row = mysql_fetch_array($result2)){
	
	                                       echo "
                                                 <tr>
	                                                 <td> <strong>". ++$a  ."</strong></td>
													 <td> $Row[1] </td>
	                                                 <td> $Row[4] </td>
	                                                 <td> $Row[5] </td>
	                                                 <td> $Row[7] </td>
	                                                 <td> $Row[11] </td>";
													 ?>
<td><strong><a class="label label-sm label-success" href="track?id=<?php echo $Row['1']?>"<img src="images/mycommentt.jpg"  width="10" height="10" border="0" target='_blank' />View</a></td>
<?php echo " </tr>";
										   }}
									?>
									</table>
														</div>
													</div>
												</div>

												<div class="panel panel-default">
													<div class="panel-heading">
														<a href="#faq-1-4" data-parent="#faq-list-1" data-toggle="collapse" class="accordion-toggle collapsed">
															<i class="ace-icon fa fa-chevron-left pull-right" data-icon-hide="ace-icon fa fa-chevron-down" data-icon-show="ace-icon fa fa-chevron-left"></i>

															Yeahly-Report &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp <strong><?php echo  $num_rows3;?></strong>
														</a>
													</div>

													<div class="panel-collapse collapse" id="faq-1-4">
														<div class="panel-body">
								<table id='dynamic-table' class='table table-striped table-bordered table-hover'>
								<?php 
										$result3= mysql_query("SELECT * FROM doc_comments WHERE  MONTH(date)= MONTH(CURDATE()) ORDER BY id DESC");
							
									echo "<tr><th ><strong>No</th><th><strong>Doc Number</th><th><strong>Filename</th><th><strong>Time</th><th><strong>View</th></tr>";
                                              for($d == 0 ; $d<=$num_rows3; $d++){ 
					                       while ($Row3 = mysql_fetch_array($result3)){
	
	                                       echo "
                                                 <tr>
	                                                 <td> <strong>". ++$d  ."</strong></td>
													 <td> $Row3[1] </td>
	                                                 <td> $Row3[10] </td>
	                                                 <td> $Row3[3] </td>";												 ?>
<td><strong><a class="label label-sm label-success" href="Mycomments?id=<?php echo $Row3['1']?>"<img src="images/mycommentt.jpg"  width="10" height="10" border="0" target='_blank' />View</a></td>
<?php 
echo " </tr>";
										   }}?>
									</table>
														</div>
													</div>
												</div>
	
												
											</div>
										</div>
											
											
												
				
			
		</div><!-- /.main-container -->
</html>
