<?php

/************************ DATABASE CONNECTION  ****************************/

define ("HOSTNAME", "localhost"); // set database host
define ("USERNAME", "root"); // set database user
define ("PASSWORD","fidele"); // set database password
define ("DBNAME","qloan_loan_valuator_db"); // set database name
define ("TABLENAME","clients"); // set table name to insert data

$connection = mysqli_connect(HOSTNAME, USERNAME, PASSWORD) or die("Error : Connection Error ");
mysqli_select_db($connection,DBNAME) or die("Error : Database Not Found");

?>
