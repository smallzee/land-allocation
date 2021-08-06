<?php	
	require_once 'inc/php.php';
	if(!login()){
		header("location:login.php");
		exit();		
	}
	if(isset($_POST['ok']))
	{
		$applicant_name = get_post('applicant_name');
		$applicant_address = get_post('applicant_address');
		$state = $_POST['state'];
		$lga = $_POST['lga'];
		$occupation = get_post('occupation');
		$email = get_post('email');
		$phone = get_post('phone');
		//$lga_situated = get_post('lga_situated');
		$land_use = get_post('land_use');
		$plot_no = get_post('plot_no');
		$plot_size = get_post('plot_size');
		$block_no = get_post('block_no');
		$id = $_POST['id'];
		$date_updated = time();

		$update = mysql_query("UPDATE allocation SET 
			applicant_name='$applicant_name', applicant_address='$applicant_address', state='$state', lga='$lga', occupation='$occupation', email='$email', phone='$phone',  land_use='$land_use', plot_no='$plot_no', plot_size='$plot_size', block_no='$block_no', date_updated='$date_updated' WHERE id='$id'") or die(mysql_error());
		
		$app_id = get_post('app_id');
		$here = "<a target='_blank' href='print_form.php?app_id=".$app_id."'>Here</a>";
		set_flash("Land Allocation updated successfully, click $here to print the receipt","success");
		//set_flash("Allocation updated successfully","success");		
		header("location:update_allocation.php");
		exit();
	}
	if(isset($_GET['id'])){
		$id = $_GET['id'];
		$sql = mysql_query("SELECT * FROM allocation WHERE id='$id'") or die(mysql_error());
		$n = mysql_num_rows($sql);
		if($n == 0){
			header("location:update_allocation.php");
			exit();
		}
		$rs = mysql_fetch_assoc($sql);
		$page_title = "Update Allocation - ".$rs['app_id'];
	}else{
		$page_title = "Update Allocation";
	}
	include_once 'head.php';	
	include_once 'sidebar.php';

	if(isset($_GET['id'])){
		include_once 'edit_allocation.php';
	}else{
		include_once 'all_allocations.php';
	}
?>

<?php include_once 'foot.php'; ?>
</body>
</html>