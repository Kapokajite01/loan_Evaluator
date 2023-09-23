<?php
error_reporting(0);

// Include PHPMailerAutoload.php library file



session_start();
include "../../inc/config.php";
$sender=$db->fetch_single_row('sys_users','id',$_SESSION['id_user'])->email;
// PDO connect *********
function connect() {
    return new PDO('mysql:host=localhost;dbname=sintras', 'root', '%9,l6rTDZ=k1', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
}

$pdo = connect();
$keyword = '%'.$_POST['keyword'].'%';
$sql = "SELECT distinct group_id,email_viewer,groupid,group_name  FROM group_viewer JOIN groupmails on groupmails.groupid =group_viewer.group_id  WHERE email_viewer = '$sender' AND group_name LIKE (:keyword)";
$query = $pdo->prepare($sql);
$query->bindParam(':keyword', $keyword, PDO::PARAM_STR);
$query->execute();
$list = $query->fetchAll();
foreach ($list as $rs) {
	// put in bold the written text
	$group_name = str_replace($_POST['keyword'], '<b>'.$_POST['keyword'].'</b>', $rs['group_name']);
	// add new option
    echo '<li onclick="set_item(\''.str_replace("'", "\'", $rs['group_name']).'\')">'.$group_name.'</li>';
}
?>