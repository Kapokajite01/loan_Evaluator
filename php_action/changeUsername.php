<?php 
require_once 'core.php';
$id = $_SESSION['id'];

if($_POST) {

	$valid['success'] = array('success' => false, 'messages' => array());

	$username = $_POST['username'];

	$sql = "UPDATE users_table SET username = '$username' WHERE id= {$id}";
	if($connect->query($sql) === TRUE) {
		$valid['success'] = true;
		$valid['messages'] = "Successfully Update";	
			echo "<script>setTimeout('self.close()',1500);</script>";

	} else {
		$valid['success'] = false;
		$valid['messages'] = "Error while updating product info";
					echo "<script>setTimeout('self.close()',1500);</script>";

	}

	$connect->close();

	echo json_encode($valid);

}

?>