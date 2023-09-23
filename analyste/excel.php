<?php
error_reporting(0);
// Connect database.
$dbhost = 'localhost'; //Host Name
$dbuser = 'root'; //DB User
$dbpass = 'fidele'; //DB password
 
$conn = mysql_connect($dbhost, $dbuser, $dbpass) or die ('Error connecting to mysql');
 
$dbname = 'mudb_ims_db'; // DB Name
mysql_select_db($dbname);
// Get data records from table.
$filter = $_GET['ev'];
$result=mysql_query("SELECT * FROM details"); //DB Query
 
$titer = str_replace(" ","_",$filter);
// Functions for export to excel.
function xlsBOF() {
echo pack("ssssss", 0x809, 0x8, 0x0, 0x10, 0x0, 0x0);
return;
}
function xlsEOF() {
echo pack("ss", 0x0A, 0x00);
return;
}
function xlsWriteNumber($Row, $Col, $Value) {
echo pack("sssss", 0x203, 14, $Row, $Col, 0x0);
echo pack("d", $Value);
return;
}
function xlsWriteLabel($Row, $Col, $Value ) {
$L = strlen($Value);
echo pack("ssssss", 0x204, 8 + $L, $Row, $Col, 0x0, $L);
echo $Value;
return;
}
header("Pragma: public");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Content-Type: application/force-download");
header("Content-Type: application/octet-stream");
header("Content-Type: application/download");;
header("Content-Disposition: attachment;filename=Excel.xls "); //File Name
header("Content-Transfer-Encoding: binary ");
 
xlsBOF();
 
/*
Make a top line on your excel sheet at line 1 (starting at 0).
The first number is the row number and the second number is the column, both are start at '0'
*/
 
//xlsWriteLabel(0,0,"Title"); //Top Title
 
// Make column labels. (at line 3)

xlsWriteLabel(0,0,"Location"); // Row Name
xlsWriteLabel(0,1,"ACTOR"); // Row Name
xlsWriteLabel(0,2,"INCIDENT"); // Row Name
xlsWriteLabel(0,3,"DATE"); // Row Name
xlsWriteLabel(0,4,"TOTAL"); // Row Name

 
 
 
 
$xlsRow = 3;
 
// Put data records from mysql by while loop.
while($row=mysql_fetch_array($result)){
 
 

xlsWriteLabel($xlsRow,0,$row['6']); //Each DB Row
xlsWriteLabel($xlsRow,1,$row['3']); //Each DB Row
xlsWriteLabel($xlsRow,2,$row['4']); //Each DB Row
xlsWriteLabel($xlsRow,3,$row['5']); //Each DB Row
xlsWriteLabel($xlsRow,4,$row['7']); //Each DB Row



 
 
 
 
$xlsRow++;
}
xlsEOF();
exit();
?>
