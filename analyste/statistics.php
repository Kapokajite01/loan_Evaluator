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
					
					<a href="chart_where"><button class="btn btn-default button1"> <i class="glyphicon glyphicon-stats"></i> Diagrams Rep </button></a>
					<a href="map"><button class="btn btn-default button1"> <i class="	glyphicon glyphicon-globe"></i>Country Map Rep</button></a>
					<a href="eastern_map"><button> <i class="	glyphicon glyphicon-globe"></i>Eatern Map Rep</button></a>
					<a href="northern_map"><button > <i class="	glyphicon glyphicon-globe"></i>Northern Map Rep</button></a>
					<a href="southern_map"><button "> <i class="	glyphicon glyphicon-globe"></i>Southern Map Rep</button></a>
					<a href="western_map"><button > <i class="	glyphicon glyphicon-globe"></i>Western Map Rep</button></a>
					<a href="kigali_map"><button > <i class="	glyphicon glyphicon-globe"></i>City of kigali Map Rep</button></a>


                    </div>
			      </div>
			   </div>
            </div>
		</div>
	</div><BR/>
	<img src="images/mapbg1.jpg" style="width:100%;">
	</div>
	</div>
	</body>


</html>
