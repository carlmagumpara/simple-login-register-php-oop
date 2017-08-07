<?php
	ini_set('display_errors', 1);
	require_once('../config/database.php');
	require_once('../classes/register.php');
	$database = new Database();
	$register = new Register($database->connection());

	$errors = array();
	$data = array();

	if (isset($_POST['name'])) {
		if (empty($_POST['name'])) {
			$errors['name'] = 'name is empty!';
		} else {
			$data['name'] = $_POST['name'];
		}
	}

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
		} else if ($_POST['password'] != $_POST['retype-password']) {
			$errors['password'] = 'password didnt match to retype password!';
		} else {
			$data['password'] = crypt($_POST['password'], '$1$^R^PmUg^m$');
		}
	}

	if (!$errors) {
		if ($register->checkEmailIfExist($_POST['email'])) {
			$errors['email'] = 'email exist!';
			echo json_encode(array(
				'result' => 'error',
				'message' => $errors, 
				)
			);
		} else {
			if ($register->execute($data)) {
				echo json_encode(array(
					'result' => 'success',
					'message' => 'Registered Successfuly!', 
					)
				);
			} else {
				echo json_encode(array(
					'result' => 'error',
					'message' => 'Registration Unsuccessful!', 
					)
				);
			}
		}
	} else {
		echo json_encode(array(
			'result' => 'error',
			'message' => $errors, 
			)
		);
	}
?>