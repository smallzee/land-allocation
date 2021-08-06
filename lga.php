<?php
	require_once 'inc/php.php';

	if(isset($_GET['state']))
	{
		$state = $_GET['state'];		
		
		$lga_sql = mysql_query("SELECT lga FROM states WHERE state='$state' ORDER BY lga") or die(mysql_error());
		while($lga_rs = mysql_fetch_assoc($lga_sql))
		{
			echo "<option>".$lga_rs['lga']."</option>";
		}
		exit();
	}
?>