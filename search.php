<?php
	include_once 'inc/php.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Search Land</title>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="IE=Edge"/> 		
	<meta name="viewport" content="width=device-width,initial-scale=1.0" />	
	<link rel="stylesheet" type="text/css" href="lib/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="lib/font-awesome/font-awesome.min.css">
</head>
<body>

<?php
	include_once 'nav.php';
	/*
?>
<section id="slider">
	<div id="carousel-id" class="carousel slide" data-ride="carousel">
	    <ol class="carousel-indicators">
	        <li data-target="#carousel-id" data-slide-to="0" class=""></li>
	        <li data-target="#carousel-id" data-slide-to="1" class=""></li>
	        <li data-target="#carousel-id" data-slide-to="2" class="active"></li>
	    </ol>
	    <div class="carousel-inner">
	        <div class="item">
	            <img src="img/slide1.jpg" class="img-responsive">
	            <div class="container">
	                <div class="carousel-caption">	                    
	                    <h1>Ministry of Lands, Physical Planning and Urban Development</h1>
	                    <p>
	                    	State of Osun Government Secretariat, Abere Osogbo
	                    </p>
	                </div>
	            </div>
	        </div>
	        <div class="item">
	        	<img src="img/slide2.jpg" class="img-responsive">
	            <div class="container">
	                <div class="carousel-caption">
	                    <h1>Ministry of Lands, Physical Planning and Urban Development</h1>
	                    <p>
	                    	State of Osun Government Secretariat, Abere Osogbo
	                    </p>
	                </div>
	            </div>
	        </div>
	        <div class="item active">
	        	<img src="img/slide3.jpg" class="img-responsive">
	            <div class="container">
	                <div class="carousel-caption">
	                    <h1>Ministry of Lands, Physical Planning and Urban Development</h1>
	                    <p>
	                    	State of Osun Government Secretariat, Abere Osogbo
	                    </p>
	                </div>
	            </div>
	        </div>
	    </div>
	    <a class="left carousel-control" href="#carousel-id" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
	    <a class="right carousel-control" href="#carousel-id" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
	</div>
</section>
*/
?>
<section id="body">
	<div class="container">
		<div class="row" style='margin-top: 40px;'>
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-warning">
					<div class="panel-heading"><i class="fa fa-search"></i> Search</div>
					<div class="panel-body">
						<?php
							if(isset($_GET['lga_situated'])){
								$lga_situated = $_GET['lga_situated'];
								$plot_no = $_GET['plot_no'];
								$block_no = $_GET['block_no'];

								$sql ="SELECT applicant_name FROM allocation WHERE lga_situated='$lga_situated' and plot_no='$plot_no' and block_no='$block_no'";

								$num = $db->query($sql);
								if($num->rowCount() == 0)
								{
									echo "<div class='well'>No land with Block Number $block_no and Plot Number $plot_no has been allocated in $lga_situated Local Government</div>";
								}else{
									$rs = $num->fetch(PDO::FETCH_ASSOC);
									$name = "<b>".$rs['applicant_name']."</b>";
									echo "<div class='well well'>Land with Block Number $block_no and Plot Number $plot_no has been allocated to $name in $lga_situated Local Government</div>";
								}
							}
						?>
						<legend><h3 class="page-title">Search For Land</h3></legend>
						<form action="" method="get">
							<div class="form-group">
								<label>Local Government</label>
								<select class="form-control" required="" name="lga_situated">
									<option value="">LGA</option>
									<?php
										$lga_sql = $db->query("SELECT lga FROM states WHERE state='Osun' ORDER BY lga") ;
										while($lga_rs = $lga_sql->fetch(PDO::FETCH_ASSOC))
										{
											echo "<option>".$lga_rs['lga']."</option>";
										}
									?>
								</select>
							</div>
							
							<div class="form-group">
								<label>Plot No.</label>
								<input type="text" name="plot_no" class="form-control" placeholder="Plot No." required="" value="<?php echo @$_GET['plot_no']; ?>">
							</div>							

							<div class="form-group">
								<label>Block No.</label>
								<input type="text" name="block_no" class="form-control" placeholder="Block Number" required="" value="<?php echo @$_GET['block_no']; ?>">
							</div>

							<div class="form-group">
								<button class="btn btn-sm btn-warning">
									<i class="fa fa-search"></i> Search
								</button>
							</div>
						</form>						
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<section id="footer">
	&copy; 2016 - Ministry of Lands, Physical Planning and Urban Development
</section>
<script type="text/javascript" src="lib/jquery/jquery.min.js"></script>

<script type="text/javascript" src="lib/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/main.js"></script>

<script type="text/javascript">
	
</script>
</body>
</html>