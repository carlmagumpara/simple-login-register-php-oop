<?php  
	require_once('functions/session.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
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
					<h1>REGISTER</h1>
					<div id="form-alert" class="alert hide bg-red" role="alert"></div>
					<form id="register-form" action="functions/register_exec.php" method="post" autocomplete="off">
						<div class="form-group">
							<input type="text" name="name" class="form-control input-lg" placeholder="Name">
						</div>
						<div class="form-group">
							<input type="email" name="email" class="form-control input-lg" placeholder="Email">
						</div>
						<div class="form-group">
							<input type="password" name="password" class="form-control input-lg" placeholder="Passsword">
						</div>
						<div class="form-group">
							<input type="password" name="retype-password" class="form-control input-lg" placeholder="Retype Passsword">
						</div>
						<div class="form-group right">
							<h4 class="f-left">Have an account <a href="index.php">login here!</a></h4>
							<button type="submit" class="btn btn-lg bg-teal">REGISTER</button>
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