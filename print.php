<?php	
	require_once 'inc/php.php';
	if(!login()){
		header("location:login.php");
		exit();		
	}	
	$page_title = "Print Application Receipt";
	include_once 'head.php';	
	include_once 'sidebar.php';
?>

<form action="print_form.php" method="get" target="_blank">
	<div class="form-group">
		<label>Application Id</label>
		<select name="app_id" class="form-control" required="">
			<option value="">Select</option>
			<?php
				$sql = mysql_query("SELECT app_id FROM allocation ORDER BY id DESC") or die(mysql_error());

				while($rs = mysql_fetch_assoc($sql))
				{
					echo "<option>".$rs['app_id']."</option>";
				}
			?>
		</select>
	</div>

	<div class="form-group">
		<button class="btn btn-success" type="submit">
			<i class="fa fa-print"></i> Print
		</button>
	</div>
</form>

<?php include_once 'foot.php'; ?>
</body>
</html>