<?php
	include_once 'inc/php.php';
	if(login())
	{
		header("location:admin.php");
		exit();
	}

	if(isset($_POST['ok']))
	{
		$username = get_post('username');
		$password = get_post('password');

		$sql = "SELECT * FROM admin WHERE username='$username' and password='$password'";
		$query = $db->query($sql);

		$total = $query->rowCount();
		if($total == 0){
			set_flash("Invalid login details","warning");
			header("location:login.php");
			exit();
		}else{
			$_SESSION['admin'] = $username;
			header("location:admin.php");
			exit();
		}

	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Login</title>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="IE=Edge"/> 		
	<meta name="viewport" content="width=device-width,initial-scale=1.0" />		
	<link rel="stylesheet" type="text/css" href="lib/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="lib/font-awesome/font-awesome.min.css">
</head>
<body>

<?php
	include_once 'nav.php';
?>

<section id="body">
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-warning">
					<div class="panel-heading"><h3 class="page-title">Admin Login</h3></div>
					<div class="panel-body">
					<p>
						Login to the admin panel
					</p>
						<form action="" method="post" role="form">
							<?php flash(); ?>
							<div class="form-group">
								<label>Username:</label>
								<div class="input-group">									
									<input type="text" name="username" class="form-control" required="" placeholder="Username">
									<span class="input-group-addon">
										<i class="fa fa-user"></i>
									</span>
								</div>
							</div>

							<div class="form-group">
								<label>Password:</label>
								<div class="input-group">									
									<input type="password" name="password" class="form-control" required="" placeholder="Password">
									<span class="input-group-addon">
										<i class="fa fa-lock"></i>
									</span>
								</div>
							</div>

							<div class="form-group">
								<input type="submit" name="ok" class="btn btn-warning" value="Login">
							</div>						
						</form>
					</div>
					<div class="panel-footer">&nbsp;</div>
				</div>
			</div>
		</div>
	</div>
</section>
<section id="footer">
	&copy; 2016 - Ministry of Lands, Physical Planning and Urban Development
</section>
<script type="text/javascript" src="lib/jquery/jquery.min.js"></script>
<script type="text/javascript" src="lib/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/main.js"></script>
</body>
</html>