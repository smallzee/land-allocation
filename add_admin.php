<?php	
	require_once 'inc/php.php';
	if(!login()){
		header("location:login.php");
		exit();		
	}	
	if(isset($_POST['ok']))
	{
		$username = get_post("username");
		$password = get_post("password");
		$email = get_post("email");

		$in = $db->query("INSERT INTO admin(username,password,email) VALUES('$username','$password','$email')") ;

		set_flash("Admin added successfully","success");
		header("location:add_admin.php");
		exit();
	}
	$page_title = "Add New Admin";
	include_once 'head.php';	
	include_once 'sidebar.php';

	flash();	
?>

<form action="" method="post" role="form">
	<div class="form-group">
		<label>Username</label>
		<input type="text" name="username" required="" placeholder="Username" class="form-control">
	</div>
	<div class="form-group">
		<label>Email Address</label>
		<input type="text" name="email" required="" placeholder="Email Address" class="form-control">
	</div>
	<div class="form-group">
		<label>Password</label>
		<input type="password" name="password" required="" placeholder="Password" class="form-control">
	</div>
	<div class="form-group">
		<input type="submit" name="ok" class="btn btn-warning" value="Add">
	</div>
</form>

<?php include_once 'foot.php'; ?>
</body>
</html>