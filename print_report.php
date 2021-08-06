<?php	
	require_once 'inc/php.php';
	if(!login()){
		header("location:login.php");
		exit();		
	}	
	$page_title = "Allocation Report";
	include_once 'head.php';	
	//include_once 'sidebar.php';
	if(!isset($_POST['ok']))
	{
		header("location:admin.php");
		exit();
	}
	$type = $_POST['type'];
	if($type == "All" || $type == "" || $type=="all")
	{
		$name = "All Local Government";
		$sql = mysql_query("SELECT * FROM allocation ORDER BY id DESC") or die(mysql_error());
	}else{
		$name = "$type Local Government";
		$sql = mysql_query("SELECT * FROM allocation WHERE lga_situated='$type'") or die(mysql_error());
	}
?>
<div id="wrapper">

	<nav class="navbar-default navbar-static-top" role="navigation">
             <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
               <h1> <a class="navbar-brand" href="admin.php">Osun Land</a></h1>
			   </div>
			 <div class=" border-bottom">
        	<div class="full-left">        	  
            <div class="clearfix"> </div>
           </div>		   
		    
			<div class="clearfix"></div>

       
     </div>
     <div class="container">
     <div class="row">
     <div class="col-md-12">	
	<h3 class="page-header">Allocation Reports for <?php echo $name; ?></h3>
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>Sn</th>
				<th>App Id</th>
				<th>App Name</th>				
				<th>Phone</th>
				<th>Land LGA</th>
				<th>Land Use</th>
				<th>Plot No</th>
				<th>Block No</th>
				<th>Date Allocated</th>
			</tr>
		</thead>
		<tfoot>
			<tr>
				<th>Sn</th>
				<th>App Id</th>
				<th>App Name</th>				
				<th>Phone</th>
				<th>Land LGA</th>
				<th>Land Use</th>
				<th>Plot No</th>
				<th>Block No</th>
				<th>Date Allocated</th>
			</tr>
		</tfoot>
		<tbody>
			<?php
				$n = mysql_num_rows($sql);
				if($n == 0){
					echo "<tr><td colspan='9'>No Land Allocated in $name</td></tr>";
				}else{
					$sn = 0;
					while($rs = mysql_fetch_assoc($sql)){
					?>
						<tr>
							<td><?php echo ++$sn;?></td>
							<td><?php echo $rs['app_id'];?></td>
							<td><?php echo $rs['applicant_name'];?></td>
							<td><?php echo $rs['phone'];?></td>
							<td><?php echo $rs['lga_situated'];?></td>
							<td><?php echo $rs['land_use'];?></td>
							<td><?php echo $rs['plot_no'];?></td>
							<td><?php echo $rs['block_no'];?></td>						
							<td><?php echo date("d/m/Y",$rs['allocation_date']);?></td>
						</tr>

					<?php
					}//while
				}//if
			?>
		</tbody>
	</table>

<?php include_once 'foot.php'; ?>
</body>
</html>