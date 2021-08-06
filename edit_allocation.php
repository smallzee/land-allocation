<?php
	extract($rs);
?>
<form action="" method="post" role="form">		
		<h4>Applicant Information</h4>
		<div class="form-group">
			<label>Applicant Name</label>
			<input type="text" name="applicant_name" class="form-control" required="" placeholder="Applicant Name" value="<?php echo $applicant_name;?>">
			<input type="hidden" name="id" value="<?php echo $id;?>">
		</div>

		<div class="form-group">
			<label>Applicant Address</label>
			<textarea class="form-control" required="" placeholder="Applicant Address" name="applicant_address"><?php echo $applicant_address;?></textarea>
			<input type="hidden" name="app_id" value="<?php echo $app_id; ?>">
		</div>

		<div class="form-group">
			<label>Applicant State</label>
			<select name="state" required="" id="state" class="form-control">				
				<option><?php echo $state;?></option>
				<?php
					$state_sql = mysql_query("SELECT DISTINCT(state) FROM states") or die(mysql_error());
					while($state_rs = mysql_fetch_assoc($state_sql))
					{
						echo "<option>".$state_rs['state']."</option>";
					}
				?>
			</select>
		</div>

		<div class="form-group">
			<label>Applicant Lga</label>
			<select name="lga" required="" class="form-control" id="lga">				
				<option><?php echo $lga;?></option>
			</select>
		</div>

		<div class="form-group">
			<label>Occupation</label>
			<input type="text" name="occupation" placeholder="Applicant Occupation" required="" class="form-control"  value="<?php echo $occupation;?>">
		</div>

		<div class="form-group">
			<label>Email Address</label>
			<input type="email" name="email" required="" class="form-control" placeholder="Applicant Email Address" value="<?php echo $email;?>">
		</div>

		<div class="form-group">
			<label>Phone Number</label>
			<input type="phone" name="phone" required="" class="form-control" placeholder="Applicant Phone Number" value="<?php echo $phone;?>">
		</div>


		<h4>Land Information</h4>

		<div class="form-group">
			<label>LGA Situated</label>
			<select class="form-control" required="" name="lga_situated" disabled="">
				<option><?php echo $lga_situated;?></option>
				<?php
					/*$lga_sql = mysql_query("SELECT lga FROM states WHERE state='Osun' ORDER BY lga") or die(mysql_error());
					while($lga_rs = mysql_fetch_assoc($lga_sql))
					{
						echo "<option>".$lga_rs['lga']."</option>";
					}*/
				?>
			</select>
		</div>

		<div class="form-group">
			<label>Land Use</label>
			<input type="text" name="land_use" class="form-control" placeholder="Land Usage" required="" value="<?php echo $land_use;?>">
		</div>

		<div class="form-group">
			<label>Plot No.</label>
			<input type="text" name="plot_no" class="form-control" placeholder="Plot No." required="" value="<?php echo $plot_no;?>">
		</div>

		<div class="form-group">
			<label>Plot Size</label>
			<input type="text" name="plot_size" class="form-control" placeholder="Plot Size" required="" value="<?php echo $plot_size;?>">
		</div>

		<div class="form-group">
			<label>Block No in Layout</label>
			<input type="text" name="block_no" class="form-control" placeholder="Block Number in layout" required="" value="<?php echo $block_no;?>">
		</div>

		<div class="form-group">
			<input type="submit" name="ok" class="btn btn-success" value="Update">
		</div>
	</form>