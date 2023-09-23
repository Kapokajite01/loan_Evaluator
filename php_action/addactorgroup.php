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
session_start();
$_SESSION['AddActorGroup']  = addslashes($_POST['AddActorGroup']);
$AddActorGroup = $_SESSION['AddActorGroup'];


$sql = "INSERT INTO actors_group (actors_name)
VALUES ('$AddActorGroup')";

if ($connect->query($sql) === TRUE) {?>

<div class="alert alert-success">
<?php	
    echo "<center>"."New record created successfully"."</center>";
?>
</div>
<?php	
	echo "<script>setTimeout(\"location.href = 'http://164.187.32.129/ims/who';\",1500);</script>";
} else {?>
<div class="alert alert-warning">
<?php
    echo "New record creation failed." . $sql . "<br>" . $connect->error;
?>
</div>
<?php
	echo "<script>setTimeout(\"location.href = 'http://164.187.32.129/ims/who';\",1500);</script>";
	
}

$connect->close();
?>
</html>