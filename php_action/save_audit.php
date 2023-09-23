  <!-- file input -->
  <link rel="stylesheet" href="../assests/plugins/fileinput/css/fileinput.min.css">

  <!-- jquery -->
	<script src="../assests/jquery/jquery.min.js"></script>
  <!-- jquery ui -->  
  <link rel="stylesheet" href="../assests/jquery-ui/jquery-ui.min.css">
  <script src="../assests/jquery-ui/jquery-ui.min.js"></script>

  <!-- bootstrap js -->
	<script src="../assests/bootstrap/js/bootstrap.min.js"></script>
	<style>
input#bigbutton {
width:500px;
background: #3e9cbf; /*the colour of the button*/
padding: 8px 14px 10px; /*apply some padding inside the button*/
border:1px solid #3e9cbf; /*required or the default border for the browser will appear*/
cursor:pointer; /*forces the cursor to change to a hand when the button is hovered*/
/*style the text*/
font-size:1.5em;
font-family:Oswald, sans-serif; /*Oswald is available from http://www.google.com/webfonts/specimen/Oswald*/
letter-spacing:.1em;
text-shadow: 0 -1px 0px rgba(0, 0, 0, 0.3); /*give the text a shadow - doesn't appear in Opera 12.02 or earlier*/
color: #fff;
/*use box-shadow to give the button some depth - see cssdemos.tupence.co.uk/box-shadow.htm#demo7 for more info on this technique*/
-webkit-box-shadow: inset 0px 1px 0px #3e9cbf, 0px 5px 0px 0px #205c73, 0px 10px 5px #999;
-moz-box-shadow: inset 0px 1px 0px #3e9cbf, 0px 5px 0px 0px #205c73, 0px 10px 5px #999;
box-shadow: inset 0px 1px 0px #3e9cbf, 0px 5px 0px 0px #205c73, 0px 10px 5px #999;
/*give the corners a small curve*/
-moz-border-radius: 10px;
-webkit-border-radius: 10px;
border-radius: 10px;
}
/***SET THE BUTTON'S HOVER AND FOCUS STATES***/
input#bigbutton:hover, input#bigbutton:focus {
color:#dfe7ea;
/*reduce the size of the shadow to give a pushed effect*/
-webkit-box-shadow: inset 0px 1px 0px #3e9cbf, 0px 2px 0px 0px #205c73, 0px 2px 5px #999;
-moz-box-shadow: inset 0px 1px 0px #3e9cbf, 0px 2px 0px 0px #205c73, 0px 2px 5px #999;
box-shadow: inset 0px 1px 0px #3e9cbf, 0px 2px 0px 0px #205c73, 0px 2px 5px #999;
}

form-submit-button {

background: #0066A2;

color: white;

border-style: outset;

border-color: #0066A2;

height: 20px;

width: 50px;

font: bold 15px arial, sans-serif;

text-shadow:none;

}


i.fa.fa-print{
    margin-right: 5px;
}
body {font-family: Arial;}

/* Style the tab */
.tab {
  overflow: hidden;
  border: 1px solid #ccc;
  background-color: #f1f1f1;
}

/* Style the buttons inside the tab */
.tab button {
  background-color: inherit;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.3s;
  font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #ddd;
}

/* Create an active/current tablink class */
.tab button.active {
  background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
  display: none;
  padding: 6px 12px;
  border: 1px solid #ccc;
  border-top: none;
}
.verticalLine {
  border-left: thick solid #ff0000;
}


table.blueTable {
  border: 1px solid #1C6EA4;
  background-color: #EEEEEE;
  width: 55%;
  text-align: left;
  border-collapse: collapse;
}
table.blueTable td, table.blueTable th {
  border: 1px solid #AAAAAA;
  padding: 3px 2px;
}
table.blueTable tbody td {
  font-size: 13px;
}
table.blueTable tr:nth-child(even) {
  background: #D0E4F5;
}
table.blueTable thead {
  background: #1C6EA4;
  background: -moz-linear-gradient(top, #5592bb 0%, #327cad 66%, #1C6EA4 100%);
  background: -webkit-linear-gradient(top, #5592bb 0%, #327cad 66%, #1C6EA4 100%);
  background: linear-gradient(to bottom, #5592bb 0%, #327cad 66%, #1C6EA4 100%);
  border-bottom: 2px solid #444444;
}
table.blueTable thead th {
  font-size: 15px;
  font-weight: bold;
  color: #FFFFFF;
  border-left: 2px solid #D0E4F5;
}
table.blueTable thead th:first-child {
  border-left: none;
}

table.blueTable tfoot {
  font-size: 14px;
  font-weight: bold;
  color: #FFFFFF;
  background: #D0E4F5;
  background: -moz-linear-gradient(top, #dcebf7 0%, #d4e6f6 66%, #D0E4F5 100%);
  background: -webkit-linear-gradient(top, #dcebf7 0%, #d4e6f6 66%, #D0E4F5 100%);
  background: linear-gradient(to bottom, #dcebf7 0%, #d4e6f6 66%, #D0E4F5 100%);
  border-top: 2px solid #444444;
}
table.blueTable tfoot td {
  font-size: 14px;
}
table.blueTable tfoot .links {
  text-align: right;
}
table.blueTable tfoot .links a{
  display: inline-block;
  background: #1C6EA4;
  color: #FFFFFF;
  padding: 2px 8px;
  border-radius: 5px;
}
</style>
</head>
<?php 
error_reporting(0);
session_start();
include('../mydb_connection/my_connect_db.php');
include'../mydb_connection/My_dbinsert.php';
include'../mydb_connection/my_dbconnection.php';

$userid = $_SESSION['userid'];
if(!$userid){
	header('location:logout');
}  


require_once 'db_connect.php';
$clientnumber = addslashes($_POST['clientnumber']);
$mykey="shhslkmyasdasasdasdyooouj";
$mystring =$clientnumber;
$mymyvariable = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($mykey), $mystring, MCRYPT_MODE_CBC, md5(md5($mykey))));
$mydate = $_POST['mydate'];
$lastaud_balance = $_POST['lastaud_balance'];
$lastaud_balance = str_replace(',', '', $lastaud_balance);
$typeopn = $_POST['typeopn'];
$typeopn = str_replace(',', '', $typeopn);
$dtopn = $_POST['datesearch'];
$deposit = $_POST['deposit'];
$deposit = str_replace(',', '', $deposit);
$withdrawal = $_POST['withdrawal'];
$acnumber = $_POST['acnumber'];
$myuserid = $_POST['myuserid'];
$withdrawal = str_replace(',', '', $withdrawal);
$currbalance = $_POST['currbalance'];
$currbalance = str_replace(',', '', $currbalance);
$description = addslashes($_POST['description']);
$sqlrecord = "INSERT INTO account_audit (account_aud_id,account_number,type_operation,last_audit_balance ,deposit,withdrawl,current_balance,description,mytimr,cl_id,user_id,dat_opn) VALUES 
                          ('','$acnumber','$typeopn', '$lastaud_balance', '$deposit', '$withdrawal', '$currbalance', '$description',Now(),'$clientnumber','$myuserid','$dtopn')";
 $rcordisnerted =  $conn->query($sqlrecord);

if ($rcordisnerted) {	
   echo "<script>alert('Operation Recorded Successfully!!!')</script>";
	    echo "<script>window.location='../cl_account_audit?gtrfEEESskljH=$mymyvariable';</script>";

}
 else {
	echo "<script>alert('Recorde Not save Try again')</script>";
	    echo "<script>window.location='../account_audit?error_get_last=1';</script>";
}

$connect->close();
?>  
  
  
  
