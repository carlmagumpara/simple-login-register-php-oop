<?php  
	ini_set('display_errors', 1);
	require_once('../config/database.php');
	require_once('../classes/login.php');
	require_once('../functions/session.php');

	$database = new Database();
	$login = new Login($database->connection());

	$errors = array();
	$data = array();

	if (isset($_POST['email'])) {
		if (empty($_POST['email'])) {
			$errors['email'] = 'email is empty!';
		} else {
			$data['email'] = $_POST['email'];
		}
	}

	if (isset($_POST['password'])) {
		if (empty($_POST['password'])) {
			$errors['password'] = 'password is empty!';
		} else {
			$data['password'] = crypt($_POST['password'], '$1$gagooo$');
		}
	}

	if (!$errors) {
		if ($data = $login->execute($data)) {
			$_SESSION['id'] = $data['id'];
			$_SESSION['name'] = $data['name'];
			$_SESSION['email'] = $data['email'];
			echo json_encode(array(
				'result' => 'success',
				'message' => 'Login Successfuly', 
				)
			);
		} else {
			$errors['email'] = 'Invalid email or password!';
			echo json_encode(array(
				'result' => 'error',
				'message' => $errors, 
				)
			);
		}
	} else {
		echo json_encode(array(
			'result' => 'error',
			'message' => $errors, 
			)
		);
	}

?>