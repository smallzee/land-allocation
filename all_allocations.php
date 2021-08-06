<?php
	flash();
	$sql = $db->query("SELECT id,app_id,lga_situated,plot_no,block_no FROM allocation ORDER BY id DESC") ;

	$n = $sql->rowCount();

	if($n == 0)
	{
		echo "<p>No land has been allocated</p>";
	}else{
?>

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
			<th>&nbsp;</th>
		</tr>
	</tfoot>
	<?php
		$sn = 0;
		while($rs = $sql->fetch(PDO::FETCH_ASSOC))
		{
			?>
			<tr>
				<td><?php echo ++$sn;?></td>
				<td><?php echo $rs['app_id'];?></td>
				<td><?php echo $rs['lga_situated'];?></td>
				<td><?php echo $rs['plot_no'];?></td>
				<td><?php echo $rs['block_no'];?></td>
				<td><a href="?id=<?php echo $rs['id'];?>">Edit</a></td>
			</tr>
			<?php
		}
	?>
</table>

<?php
	}
?>