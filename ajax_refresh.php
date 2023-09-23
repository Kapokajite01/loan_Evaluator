<?php
// PDO connect *********
function connect() {
    return new PDO('mysql:host=localhost;dbname=qloan_loan_valuator_db', 'root', 'fidele', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
}

$pdo = connect();
$keyword = '%'.$_POST['keyword'].'%';
$sql = "SELECT distinct client_account FROM clients WHERE client_account LIKE (:keyword) ORDER BY clinet_id DESC ";
$query = $pdo->prepare($sql);
$query->bindParam(':keyword', $keyword, PDO::PARAM_STR);
$query->execute();
$list = $query->fetchAll();
foreach ($list as $rs) {
	// put in bold the written text
	$client_account = str_replace($_POST['keyword'], '<b>'.$_POST['keyword'].'</b>', $rs['client_account']);
	// add new option
    echo '<li onclick="set_item(\''.str_replace("'", "\'", $rs['client_account']).'\')">'.$client_account.'</li>';
}
?>