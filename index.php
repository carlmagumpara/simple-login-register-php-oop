<?php  
	require_once('functions/auth.php');
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
			<div class="full-height flex-center">
				<div class="panel" id="login-panel">
					<div class="panel-body">
						<?php 
							if (isset($_SESSION['error'])) {
								if (!empty($_SESSION['error'])) {
									echo '<div id="session-alert" class="alert bg-red" role="alert">'.$_SESSION['error'].'</div>';
									$_SESSION['error'] = '';
								}
							}
						?>
						<h2>LOGIN</h2>
						<div id="form-alert" class="alert display-none bg-red" role="alert"></div>
						<form id="login-form" action="functions/login_exec.php" method="post">
							<div class="form-group">
								<div class="input-group input-group-lg">
								  <span class="input-group-addon" id="email-icon">
								  	<span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
								  </span>
								  <input type="text" name="email" class="form-control input-lg" placeholder="Email" aria-describedby="sizing-addon1">
								</div>
							</div>
							<div class="form-group">
								<div class="input-group input-group-lg">
								  <span class="input-group-addon" id="eye-icon">
								  	<span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
								  </span>
								  <input type="password" name="password" class="form-control input-lg" placeholder="Password" aria-describedby="sizing-addon1">
								</div>
							</div>
							<div class="form-group right">
								<h5 class="f-left">No account yet <a href="register.php">register here!</a></h5>
								<button type="submit" class="btn btn-lg bg-teal">LOGIN</button>
							</div>
						</form>
					</div>
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