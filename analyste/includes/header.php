<?php require_once 'php_action/core.php'; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
		<link rel="icon" href="../images/banner22.jpg" />					
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>IMS</title>
<meta name="keywords" content="general template, free css templates, website templates" />
<meta name="description" content="General is a Free CSS Template provided by templatemo.com" />
<link href="templatemo_stylee.css" rel="stylesheet" type="text/css" />
	<!-- bootstrap -->
	<link rel="stylesheet" href="assests/bootstrap/css/bootstrap.min.css">
	<!-- bootstrap theme-->
	<!-- font awesome -->

  <!-- custom css -->

	<!-- DataTables -->

  <!-- file input -->

  <!-- jquery -->
	<script src="assests/jquery/jquery.min.js"></script>
  <!-- jquery ui -->  
  <script src="assests/jquery-ui/jquery-ui.min.js"></script>

  <!-- bootstrap js -->
</head>
<body>
<div id="templatemo_header_wrapper">
	
    <div id="templatemo_header">
    <?php
					include('php_action/database.php');
					$id = $_SESSION['userId'];
					$user_query=mysql_query("select *  from users where user_id='$id'")or die(mysql_error());
					$row=mysql_fetch_array($user_query); 
				?>
				
				    
					<a style="color:#fff;text-shadow: 3px 2px green;"><?php echo "<strong>"."Welcome:". "&nbsp"."</strong>";echo $row['fname'];echo '&nbsp';echo $row['lname'];echo "&nbsp"."/"."&nbsp".$row['directorate']; ?></a>
					
    	
        <img src="images/niss.png" style=" position: relative;float:left; top: 17px;">
        <img src="images/niss.png" style=" position: relative;float:right; top: 17px;"> 
    
        
	</div> <!-- end of templatemo_header -->
</div> <!-- end of templatemo_header_wrapper -->   
<!-- end of templatemo_banner_wrapper -->

<div id="templatemo_menu_wrapper">

    <div id="templatemo_menu">
    
        <ul>
			<li><a href="index" class="current"><span class="invo">Dashboard</span></a></li>
            <li><a href="who" class="current"><span class="home">Who</span></a></li>
            <li><a href="what"><span class="bran">What</span></a></li>
            <li><a href="where"><span class="categ">Where</span></a></li>
			<li><a href="when"><span class="invoice">When</span></a></li>
            <li><a href="other"><span class="product">Other</span></a></li>
			<li><a href="new_report"><span class="statistica">Report</span></a></li>
			<li><a href="statistics"><span class="invo">Statistics</span></a></li>
			<li><a href="setting"><span class="set">Settings</span></a></li>
			<li><a href="modified"><span class="modi">Modified</span></a></li>
			<li><a href="logout"><span class="logout">Logout</span></a></li>
        </ul>    	
    
    </div> <!-- end of templatemo_menu -->
</div> <!-- end of templatemo_menu_wrapper -->    

<div class="container">