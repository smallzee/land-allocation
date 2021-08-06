<?php
	include_once 'inc/php.php';
	if(isset($_POST['ok']))
	{
		$name = get_post('name');
		$email = get_post('email');
		$msg = get_post('msg');
		$to = "admin@example.com";
		$subject = "Contact Message From $name , $email";
		@mail($to, $subject, $msg);
		set_flash("Your message has been sent successfully!","success");
		header("location:contact.php");
		exit();
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Contact Us</title>
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
			<div class="col-md-12">
				<h3 class="page-title page-header">Contact us</h3>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<h3>Send us a message</h3>
				<form action="" method="post" role="form" autocomplete="off">
					<?php flash(); ?>
					<div class="row">
						<div class="col-sm-6 form-group">
							<label>Name</label>
							<input type="text" name="name" required="" placeholder="Enter your name" class="form-control">
						</div>
						
						<div class="col-sm-6 form-group">
							<label>Email</label>
							<input type="email" name="email" required="" class="form-control" placeholder="Enter your email address">
						</div>
					</div>

					<div class="form-group">
						<label>Message</label>
						<textarea name="msg" class="form-control" placeholder="Enter your message" rows="8"></textarea>
					</div>
					<div class="form-group">
						<button type="submit" name="ok" class="btn btn-success">
							<i class="fa fa-envelope"></i> Send Message
						</button>
					</div>
				</form>
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