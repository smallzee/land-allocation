<?php	
	require_once 'inc/php.php';
	if(!login()){
		header("location:login.php");
		exit();		
	}	
	$page_title = "Land Allocation Report";
	include_once 'head.php';	
	include_once 'sidebar.php';
?>
<h3 class="page-header">Allocation Report</h3>

<form action="print_report.php" target="_blank" method="post" role="form">
	<div class="form-group">
		<label>Local Government</label>
		<select name="type" required="" class="form-control">
			<option value="">Select</option>
			<option value="All">All Local Government</option>
			<?php
				$sql = $db->query("SELECT lga FROM states WHERE state='Osun'") ;
				while($ds = $sql->fetch(PDO::FETCH_ASSOC))
				{
					echo "<option>".$ds['lga']."</option>";
				}
			?>
		</select>
	</div>

	<div class="form-group">
		<input type="submit" name="ok" class="btn btn-success" value="Generate">
	</div>
</form>

<?php include_once 'foot.php'; ?>
</body>
</html>