<?php  
	require_once('../functions/session.php');
	if (isset($_POST['action'])) {
		if ($_POST['action'] === 'logout') {
			session_unset();
			session_destroy();
			echo json_encode(array('redirect' => 'index.php',));
		}
	}
?>