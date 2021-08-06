<?php
	include_once 'inc/php.php';

?>
<?php	
	require_once 'inc/php.php';	
	if(isset($_POST['ok']))
	{		
		//GET VARIABLES
		$applicant_name = get_post('applicant_name');
		$applicant_address = get_post('applicant_address');
		$state = $_POST['state'];
		$lga = $_POST['lga'];
		$occupation = get_post('occupation');
		$email = get_post('email');
		$phone = get_post('phone');
		$lga_situated = get_post('lga_situated');
		$land_use = get_post('land_use');
		$plot_no = get_post('plot_no');
		$plot_size = get_post('plot_size');
		$block_no = get_post('block_no');
		$allocation_date = time();


		//CHECK ERRORS
		
		$sql1 = mysql_query("SELECT NULL FROM allocation WHERE lga_situated='$lga_situated' and plot_no='$plot_no' and block_no='$block_no'") ;

		$num = mysql_num_rows($sql1);

		if($num == 0){
			$save = "INSERT INTO allocation VALUES('','','$allocation_date','$applicant_name','$applicant_address','$state','$lga','$occupation','$email','$phone','$lga_situated','$land_use','$plot_no','$plot_size','$block_no','$allocation_date')";
			$in = mysql_query($save);

			$insert_id = mysql_insert_id();

			$app_id = "OSUN/".strtoupper($lga_situated)."/".num_formats($insert_id);

			$update = mysql_query("UPDATE allocation SET app_id='$app_id' WHERE id='$insert_id'") ;
			$here = "<a target='_blank' href='print_user_form.php?app_id=".$app_id."'>Here</a>";
			set_flash("Land allocated successfully, click $here to print the receipt","success");
			header("location:user_allocate.php");
			exit();
			//save
		}else{
			set_flash("Land already allocated","danger");
			header("location:user_allocate.php");
			exit();
			//error
		}

	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Land Information</title>
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
			<h2 class="page-header">Land Information</h2>
			<div class="col-md-12">
				<form action="" method="post" role="form">		
					<h4 class='page-header'>Applicant Information</h4>
					<?php flash(); ?>
					<div class="form-group">
						<label class="">Applicant Name</label>
						<input type="text" name="applicant_name" class="form-control" required="" placeholder="Applicant Name">
					</div>

					<div class="form-group">
						<label>Applicant Address</label>
						<textarea class="form-control" required="" placeholder="Applicant Address" name="applicant_address"></textarea>
					</div>

					<div class="form-group">
						<label>Applicant State</label>
						<select name="state" required="" id="state" class="form-control">
							<option value="">Select State</option>
							<?php
								$state_sql = $db->query("SELECT DISTINCT(state) FROM states") ;
								while($state_rs = $state_sql->fetch(PDO::FETCH_ASSOC))
								{
									echo "<option>".$state_rs['state']."</option>";
								}
							?>
						</select>
					</div>

					<div class="form-group">
						<label>Applicant Lga</label>
						<select name="lga" required="" class="form-control" id="lga">
							<option value="">LGA</option>
						</select>
					</div>

					<div class="form-group">
						<label>Occupation</label>
						<input type="text" name="occupation" placeholder="Applicant Occupation" required="" class="form-control">
					</div>

					<div class="form-group">
						<label>Email Address</label>
						<input type="email" name="email" required="" class="form-control" placeholder="Applicant Email Address">
					</div>

					<div class="form-group">
						<label>Phone Number</label>
						<input type="phone" name="phone" required="" class="form-control" placeholder="Applicant Phone Number">
					</div>


					<h4 class='page-header'>Land Information</h4>

					<div class="form-group">
						<label>LGA Situated</label>
						<select class="form-control" required="" name="lga_situated">
							<option value="">LGA</option>
							<?php
								$lga_sql = $db->query("SELECT lga FROM states WHERE state='Osun' ORDER BY lga") ;
								while($lga_rs = $lga_sql->fetch(PDO::FETCH_ASSOC))
								{
									echo "<option>".$lga_rs['lga']."</option>";
								}
							?>
						</select>
					</div>

					<div class="form-group">
						<label>Land Use</label>
						<input type="text" name="land_use" class="form-control" placeholder="Land Usage" required="">
					</div>

					<div class="form-group">
						<label>Plot No.</label>
						<input type="text" name="plot_no" class="form-control" placeholder="Plot No." required="">
					</div>

					<div class="form-group">
						<label>Plot Size (Width X Height)</label>
						<input type="text" name="plot_size" class="form-control" placeholder="Plot Size" required="">
					</div>

					<div class="form-group">
						<label>Block No in Layout</label>
						<input type="text" name="block_no" class="form-control" placeholder="Block Number in layout" required="">
					</div>

					<div class="form-group">
						<input type="submit" name="ok" class="btn btn-warning" value="Apply">
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