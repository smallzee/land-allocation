<?php	
	require_once 'inc/php.php';
	if(!login()){
		header("location:login.php");
		exit();		
	}

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
		
		$sql1 = mysql_query("SELECT NULL FROM allocation WHERE lga_situated='$lga_situated' and plot_no='$plot_no' and block_no='$block_no'") or die(mysql_error());

		$num = mysql_num_rows($sql1);

		if($num == 0){
			$save = "INSERT INTO allocation VALUES('','','$allocation_date','$applicant_name','$applicant_address','$state','$lga','$occupation','$email','$phone','$lga_situated','$land_use','$plot_no','$plot_size','$block_no','$allocation_date')";
			$in = mysql_query($save);

			$insert_id = mysql_insert_id();

			$app_id = "OSUN/".strtoupper($lga_situated)."/".num_formats($insert_id);

			$update = mysql_query("UPDATE allocation SET app_id='$app_id' WHERE id='$insert_id'") or die(mysql_error());
			$here = "<a target='_blank' href='print_form.php?app_id=".$app_id."'>Here</a>";
			set_flash("Land allocated successfully, click $here to print the receipt","success");
			header("location:allocate.php");
			exit();
			//save
		}else{
			set_flash("Land already allocated","danger");
			header("location:allocate.php");
			exit();
			//error
		}

	}
	$page_title = "Osun Lands - Allocate Land";
	include_once 'head.php';	
	include_once 'sidebar.php';
?>

<style type="text/css">
	h4{
		color: #990000;
		margin-bottom: 20px;
		border-bottom: #333 dotted 1px;
	}
</style>

<div>	
	<fieldset>
		<legend>
			<h3><?php echo $page_title; ?></h3>
		</legend>
	</fieldset>
	<?php flash(); ?>
	<form action="" method="post" role="form">		
		<h4>Applicant Information</h4>
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
					$state_sql = mysql_query("SELECT DISTINCT(state) FROM states") or die(mysql_error());
					while($state_rs = mysql_fetch_assoc($state_sql))
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


		<h4>Land Information</h4>

		<div class="form-group">
			<label>LGA Situated</label>
			<select class="form-control" required="" name="lga_situated">
				<option value="">LGA</option>
				<?php
					$lga_sql = mysql_query("SELECT lga FROM states WHERE state='Osun' ORDER BY lga") or die(mysql_error());
					while($lga_rs = mysql_fetch_assoc($lga_sql))
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
			<input type="submit" name="ok" class="btn btn-success" value="Allocate">
		</div>
	</form>
</div>

<?php include_once 'foot.php'; ?>
</body>
</html>