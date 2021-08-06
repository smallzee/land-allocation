<?php	
	require_once 'inc/php.php';
	if(!login()){
		header("location:login.php");
		exit();		
	}	
	$page_title = "Dashboard";
	include_once 'head.php';	
	include_once 'sidebar.php';
?>

<h3 class="page-header">Admin Dashboard</h3>

<p>
	Choose an option from the menu
</p>

<?php include_once 'foot.php'; ?>
</body>
</html>