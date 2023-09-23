<?php 

require_once 'core.php';

if($_POST) {

	$valid['success'] = array('success' => false, 'messages' => array());

	$currentPassword = sha1($_POST['password']);
	$newPassword = sha1($_POST['npassword']);
	$conformPassword = sha1($_POST['cpassword']);
	$id = $_SESSION['id'];

	$sql ="SELECT * FROM users_table WHERE id = {$id}";
	$query = $connect->query($sql);
	$result = $query->fetch_assoc();

	if($currentPassword == $result['password']) {

		if($newPassword == $conformPassword) {

			$updateSql = "UPDATE users_table SET password = '$newPassword' WHERE id = {$id}";
			if($connect->query($updateSql) === TRUE) {
				$valid['success'] = true;
				$valid['messages'] = "Successfully Updated";	
					echo "<script>setTimeout('self.close()',4500);</script>";
				
			} else {
				$valid['success'] = false;
				$valid['messages'] = "Error while updating the password";	
									echo "<script>setTimeout('self.close()',4500);</script>";

			}

		} else {
			$valid['success'] = false;
			$valid['messages'] = "New password does not match with Conform password";
								echo "<script>setTimeout('self.close()',4500);</script>";

		}

	} else {
		$valid['success'] = false;
		$valid['messages'] = "Current password is incorrect";
							echo "<script>setTimeout('self.close()',4500);</script>";

	}

	$connect->close();

	echo json_encode($valid);

}

?>