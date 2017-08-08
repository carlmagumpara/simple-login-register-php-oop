<?php  
	require_once('functions/session.php');
	if (!isset($_SESSION['id'])) {
		$_SESSION['error'] = 'Invalid session!';
		header('location: index.php');
	}
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
	<nav class="navbar navbar-default">
	  <div class="container-fluid">

	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      <a class="navbar-brand" href="#">Brand</a>
	    </div>

	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <ul class="nav navbar-nav navbar-right">
	        <li><a href="#">Login as <?php echo $_SESSION['name']; ?></a></li>
	        <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Setting <span class="caret"></span></a>
	          <ul class="dropdown-menu">
	            <li><a id="logout" href="functions/logout_exec.php">Logout</a></li>
	          </ul>
	        </li>
	      </ul>
	    </div>
	  </div>
	</nav>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#logout').click(function(e){
				e.preventDefault();
				$.post($(this).attr('href'), { action: 'logout' }, function(data){
					document.cookie = 'PHPSESSID=;Path=/cv;expires=Thu, 01 Jan 1970 00:00:01 GMT;';
					var res = JSON.parse(data);
					window.location = res.redirect;
				});
			});
		});
	</script>
</body>
</html>