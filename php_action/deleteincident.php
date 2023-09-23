<html>
<head>
		<link rel="icon" href="images/app_logo.png" />					
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>IMS</title>
<meta name="keywords" content="general template, free css templates, website templates" />
<meta name="description" content="General is a Free CSS Template provided by templatemo.com" />
<link href="templatemo_stylee.css" rel="stylesheet" type="text/css" />
	<!-- bootstrap -->
	<link rel="stylesheet" href="../assests/bootstrap/css/bootstrap.min.css">
	<!-- bootstrap theme-->
	<link rel="stylesheet" href="../assests/bootstrap/css/bootstrap-theme.min.css">
	<!-- font awesome -->
	<link rel="stylesheet" href="../assests/font-awesome/css/font-awesome.min.css">

  <!-- custom css -->
  <link rel="stylesheet" href="../custom/css/custom.css">

	<!-- DataTables -->
  <link rel="stylesheet" href="../assests/plugins/datatables/jquery.dataTables.min.css">

  <!-- file input -->
  <link rel="stylesheet" href="../assests/plugins/fileinput/css/fileinput.min.css">

  <!-- jquery -->
	<script src="../assests/jquery/jquery.min.js"></script>
  <!-- jquery ui -->  
  <link rel="stylesheet" href="../assests/jquery-ui/jquery-ui.min.css">
  <script src="../assests/jquery-ui/jquery-ui.min.js"></script>

  <!-- bootstrap js -->
	<script src="../assests/bootstrap/js/bootstrap.min.js"></script>
</head>

<?php 

require_once 'db_connect.php';

$deleteincidentname = $_POST['deleteincidentname'];


$sql = "DELETE FROM incidents WHERE incident_id='$deleteincidentname'";

if ($connect->query($sql) === TRUE) {?>

<div class="alert alert-success">
<?php	
    echo "<center>"."Incident Deleted successfully"."</center>";
?>
</div>
<?php	
	echo "<script>setTimeout(\"location.href = 'http://164.187.32.129/ims/what';\",1500);</script>";
} else {?>
<div class="alert alert-warning">
<?php
    echo "Incident Delete failed." . $sql . "<br>" . $connect->error;
?>
</div>
<?php
	echo "<script>setTimeout(\"location.href = 'http://164.187.32.129/ims/what';\",1500);</script>";
	
}

$connect->close();
?>
</html>