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
error_reporting(0);
require_once 'db_connect.php';
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname']; 
  $uname = $_POST['uname'];
  $pwd = sha1($_POST['pwd']);
  $rol = $_POST['rol'];
  $branch = $_POST['branch'];
  $email = $_POST['email'];


$sql = "INSERT INTO users_table (First_Nmae,lname, username, password, role,branch,email) VALUES 
                          ('$firstname', '$lastname', '$uname', '$pwd', '$rol', '$branch','$email' )";


if ($connect->query($sql) === TRUE) {?>

<div class="alert alert-success">
<?php	
    echo "<center>"."New User Created Successfully"."</center>";
?>
</div>
<?php	
	echo "<script>setTimeout(\"location.href = '../users_homepage';\",1500);</script>";
} else {?>
<div class="alert alert-warning">
<?php
    echo "New User creation failed." . $sql . "<br>" . $connect->error;
?>
</div>
<?php
	echo "<script>setTimeout(\"location.href = '../users_homepage';\",1500);</script>";
	
}

$connect->close();
?>
</html>
