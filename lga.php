<?php
	require_once 'inc/php.php';

	if(isset($_GET['state']))
	{
		$state = $_GET['state'];		
		
		$lga_sql = $db->query("SELECT lga FROM states WHERE state='$state' ORDER BY lga") ;
		while($lga_rs = $lga_sql->fetch(PDO::FETCH_ASSOC))
		{
			echo "<option>".$lga_rs['lga']."</option>";
		}
		exit();
	}
?>