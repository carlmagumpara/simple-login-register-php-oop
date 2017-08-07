<?php  
	require_once('functions/session.php');
	if (isset($_SESSION['id'])) {
		if (!empty($_SESSION['id'])) {
			header('location: welcome.php');
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>LOGIN</title>
	<?php  
		include('includes/header.php');
	?>
</head>
<body>
<div class="container">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<div class="panel" id="login-panel">
				<div class="panel-body">
					<?php 
						if (isset($_SESSION['error'])) {
							if (!empty($_SESSION['error'])) {
								echo '<div id="session-alert" class="alert alert-danger bg-red" role="alert">'.$_SESSION['error'].'</div>';
								$_SESSION['error'] = '';
							}
						}
					?>
					<h1>LOGIN</h1>
					<div id="form-alert" class="alert alert-danger hide bg-red" role="alert"></div>
					<form id="login-form" action="functions/login_exec.php" method="post">
						<div class="form-group">
							<input type="text" name="email" class="form-control input-lg" placeholder="Email">
						</div>
						<div class="form-group">
							<input type="password" name="password" class="form-control input-lg" placeholder="Password">
						</div>
						<div class="form-group right">
							<h4 class="f-left">No account yet <a href="register.php">register here!</a></h4>
							<button type="submit" class="btn btn-lg bg-teal">LOGIN</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<?php  
	include('includes/footer.php');
?>
</body>
</html>