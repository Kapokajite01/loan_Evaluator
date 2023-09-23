<?php 
 require 'database-config.php';

 session_start();

 $username = "";
 $password = "";
 
 if(isset($_POST['username'])){
  $username = $_POST['username'];
 }
 if (isset($_POST['password'])) {
  $password = $_POST['password'];

 }
 

 $q = 'SELECT * FROM users WHERE username=:username AND password=:password';

 $query = $dbh->prepare($q);

 $query->execute(array(':username' => $username, ':password' => $password));


 if($query->rowCount() == 0){
  header('Location: index.php?err=1');
 }else{

  $row = $query->fetch(PDO::FETCH_ASSOC);

  session_regenerate_id();
  $_SESSION['userId'] = $row['user_id'];

  $_SESSION['sess_username'] = $row['username'];
        $_SESSION['sess_userrole'] = $row['role'];

        echo $_SESSION['sess_userrole'];
		echo $_SESSION['userId'];
		session_write_close();

  if( $_SESSION['sess_userrole'] == "admin"){
   header('Location: who');
  }
  if( $_SESSION['sess_userrole'] == "user"){
   header('Location: analyste/who');
  }else{

   echo "<script>alert('access denied! please try again later'); window.location='index.php'</script>";
  }
  

 }


?>