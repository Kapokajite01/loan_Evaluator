<?php
# Connect
  mysql_connect('localhost', 'root', 'fidele') or die('Could not connect: ' . mysql_error());
   
  # Choose a database
  mysql_select_db('qloan_loan_valuator_db') or die('Could not select database');
?>