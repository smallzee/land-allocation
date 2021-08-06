<?php	
	require_once 'inc/php.php';
	if(!login()){
		header("location:login.php");
		exit();		
	}	
	$page_title = "Delete Allocation";
	include_once 'head.php';	
	include_once 'sidebar.php';

	if(isset($_POST['ok'])){
		$id = $_POST['id'];
		$c = count($id);

		foreach ($id as $key) {
			$s = mysql_query("DELETE FROM allocation WHERE id='$key'") or die(mysql_error());
		}

		set_flash("$c Selected Allocations deleted successfully","success");
		header("location:delete_allocation.php");
		exit();
	}

	flash();
	$sql = mysql_query("SELECT id,app_id,lga_situated,plot_no,block_no FROM allocation ORDER BY id DESC") or die(mysql_error());

	$n = mysql_num_rows($sql);

	if($n == 0)
	{
		echo "<p>No land has been allocated</p>";
	}else{
?>
<form action="" method="post">
<table class="table table-bordered table-striped">
	<thead>
		<tr>
			<th>Sn</th>
			<th>App Id</th>
			<th>LGA Situated</th>
			<th>Plot No</th>
			<th>Block No</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tfoot>
		<tr>
			<th>Sn</th>
			<th>App Id</th>
			<th>LGA Situated</th>
			<th>Plot No</th>
			<th>Block No</th>
			<th>Mark</th>
		</tr>
	</tfoot>
	<?php
		$sn = 0;
		while($rs = mysql_fetch_assoc($sql))
		{
			?>
			<tr>
				<td><?php echo ++$sn;?></td>
				<td><?php echo $rs['app_id'];?></td>
				<td><?php echo $rs['lga_situated'];?></td>
				<td><?php echo $rs['plot_no'];?></td>
				<td><?php echo $rs['block_no'];?></td>
				<td>
					<input type='checkbox' name='id[]' value='<?php echo $rs['id'];?>'>
				</td>
			</tr>
			<?php
		}
	?>
</table>
<div class='form-group'>
	<br>
	<input type='submit' name='ok' class='btn btn-danger' value='Delete Selected'>
</div>
</form>
<?php
	}
?>

<?php include_once 'foot.php'; ?>
</body>
</html>