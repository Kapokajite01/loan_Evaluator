<?php  
session_start();
include "../../inc/config.php";
$sender=$db->fetch_single_row('sys_users','id',$_SESSION['id_user'])->email;



 $connect = mysqli_connect("localhost", "root", "%9,l6rTDZ=k1", "sintras");
 if(isset($_POST["postTitle"]) && isset($_POST["postDescription"]))
 {
  $rec_id = mysqli_real_escape_string($connect, $_POST["reciever"]);
  $subject = mysqli_real_escape_string($connect, $_POST["postTitle"]);
  $message = mysqli_real_escape_string($connect, $_POST["postDescription"]);
  if($_POST["postId"] != '')  
  {  
    //update post  
    $sql = "UPDATE tbl_draft SET rec_id = '".$rec_id."', subject = '".$subject."', message = '".$message."' WHERE mail_id = '".$_POST["postId"]."'";  
    mysqli_query($connect, $sql);  
  }  
  else  
  {  
    //insert post  
    $sql = "INSERT INTO tbl_draft(rec_id, sen_id, subject, message, mail_status) VALUES ('".$rec_id."', '".$sender."', '".$subject."', '".$message."', 'draft')";  
    mysqli_query($connect, $sql);  
    echo mysqli_insert_id($connect);  
  }
 }  
 ?>